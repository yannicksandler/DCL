<?php
/**
 * @author Gaston
 * @version 1.0
 * @created 16-mar-2010 06:00:02 p.m.
 */
class IDS_Controller_Action_Helper_Edit implements IDS_Controller_Action_IHelper
{
    const DEFAULT_PRIORITY  = 10;
    
    private $_controller;
	protected $_options 	=	array(
									'editError' 	=>	'Ha ocurrido un error al intentar guardar',
									'editSuccess' 	=> 	'El registro se guardo con exito'
								);    
    
    public function __construct( IDS_Controller_IAction $controller  )
    {
        $this->_controller      = $controller;
        $this->_autoRelations   = new IDS_Collection_Array();
    }
        
    /*
        *   Retorna un Doctrine_Record a partir de un modelo y un array de datos
        *
        *   @param Doctrine_Table $table    El modelo correspondiente al tipo de registro a editar
        *   @param Array $data              Array de datos del registro
        *
        *   @return Doctrine_Record         Un registro nuevo o existente dependiendo de si se indico el PK en el array $data
    */
	public function ResolveRecord( Doctrine_Table $table, $data = array() )
	{
		$tableId	= $table->GetIdentifier();
        $id         = false;
        
        if( is_array( $tableId ) )
        {
            foreach(  $tableId as $colName )
            {
                if( array_key_exists( $colName, $data) )
                    $id[$colName]   = $data[$colName];
            }
        }
        else
        {
            $id         = isset( $data[$tableId]) ? $data[$tableId] : false;
        }
		
        $recordClass    = $table->GetComponentName();
            
        if(  $id === false or !$id  )
        {
            $record = new $recordClass();
        }
        else
        {
            $record =   $table->Find( $id );
            
            if( is_array( $id ) && !$record )
            {
                $record = new $recordClass();
            }
        }
                
		if( !$record )
			throw new IDS_Controller_Action_Helper_Exception('Cannot resolve record');
			
		return $record;
	}
        
    /*
        *   Guarda los nuevos datos en el registro
        *
        *   @param Doctrine_Record $record  El registro a modificar
        *   @param Array $data              Datos del registro
        *
        *   @return Doctrine_Record         Retorna el registro modificado
    */
    public function Save( Doctrine_Record $record, $data = array() )
    {
		/*
			TODO: MEJORAR ESTO CON UNA FUNCION RECURSIVA O VER SI HAY ALGUNA PROPIEDAD
			DE DOCTRINE QUE INTERPRETE LO VACIO COMO NULL
		*/
        foreach( $data as $key => &$value )
        {
            if( $value == '' )
                $value = NULL;
        }
		
        $record->merge($data);
		$record->save();
		
		return $record;
    }
        
    /*
        *   Sube los archivos posteados asociados al registro en edición
        *
        *   @param Doctrine_Record $record  El registro a modificar
        *   @param Array $files             Array de archivos posteados
        *
        *   @return Doctrine_Record         Retorna el registro modificado
    */
    public function ManageFiles( Doctrine_Record $record, $files, $options)
    {
        $request    =   $this->GetController()->GetRequest();

		if( !isset($options['uploadDir']) )
			throw new IDS_Controller_Action_Helper_Exception('uploadDir must be defined to upload a file');
			
		if( !$options['publicPath'] )
			$options['publicPath']	= '';
		
        foreach( $files as $fileName )
        {
            $file   =   $request->GetFile($fileName);
			
			if( !$file )
				continue;
				
			if( $file->GetError() )
            {
                throw new IDS_Controller_Action_Helper_Exception('File '.$fileName.' uploaded with error '.$file->GetError());
            }
            else
            {	
                $record[$fileName]  =   IDS_File_Utils::MoveAndRenameUploaded(
                                            $file->GetTemporaryName(),
                                            $options['uploadDir'].$options['publicPath'].$file->GetOriginalName(),
                                            true,
                                            $options
                                        );
				
				$record[$fileName] 	= str_replace( $options['uploadDir'], '', $record[$fileName] );
            }
        }
            
        $record->save();
		
		return $record;
    }
        
	/*
		*	Realiza el proceso normal de una edicion en base a opciones enviadas por parámetro
		*
		*	@param Doctrine_Table $table 			Modelo sobre el cual realizar el proceso
		*	@param Array $data 					    Array con los datos a updatear en el registro
		*	@param Array $return 					Variable por referencia donde se volcaran todos los datos como resultado de la operación
		*	@param Array $options 					Opciones parametrizables
		*	@param IDS_IView $view 					Vista a la que asignar los valores de la operación
		*
		*	@return bool 							Retorna falso en caso de error o true en caso que la operación se realizó con éxito
	*/ 
    public function ProcessFormEdit(Doctrine_Table $table, $data, &$return, $options, IDS_IView $view = null)
    {
        $saveAllways    =   isset($options['saveAllways']) ?
                                (bool)$options['saveAllways'] :
									false;
			
        $request        =   $this->GetController()->GetRequest();    
        $conn           =   Doctrine_Manager::GetInstance()->GetCurrentConnection();
		$config			= 	$this->GetController()->GetConfig();
        $view->SetParam("InstanceId", $config->Get("instance.id"));
			
        if( ($request->IsPost() || $saveAllways) and is_array($data) and count($data) )
        {
            try
            {
                $conn->BeginTransaction();
                    
                $record  = $this->Save( $this->ResolveRecord( $table, $data ) , $data);
                    
                if( $request->GetFileCount() > 0 )
                    $record	= $this->ManageFiles($record, $request->GetFiles(),$options);
                    
                $conn->Commit();
                    
                $return['editSuccessMessage'] 	=	isset($options['editSuccess']) ?
														$options['editSuccess'] :
															$this->_options['editSuccess'];
					
				$return['data']					=	$record;
                    
				if( !is_null($view) )
					$view->SetParam($return);
					
				return true;
            }
            catch( Exception $e )
            {
                $conn->Rollback();
                    
                $return['editErrorMessage']   	=   isset($options['editError']) ?
														$options['editError']   :
															$this->_options['editError'];
															
				if( $config->Get('ids.throw_exceptions') == true )
					$return['editErrorMessage']	.=	IDS_Exception::FormatMessage($e);
				
                $return['editErrorException'] 	=	$e;
				$record					        =	$this->ResolveRecord( $table, $data );
                $record->merge($data);
                $return['data']                 =   $record;
                
				if( !is_null($view) )  
					$view->SetParam($return);
                
				return false;
            }
        }
        else
        {
            $id     =   $request->Param("id");
                
            if( $id and !is_null($view) )
                $return['data']     =   $table->Find($id);

            if( !is_null($view) )  
				$view->SetParam($return);
        }
    }
    
    /*
    */
	public function EventPostExecute()
    {
    }

	/*
    */
    public function EventPostInit()
    {
        
    }

	/*
    */
    public function EventPreExecute()
    {
        
    }

	/*
    */
    public function EventPreInit()
    {
        
    }
    
    /*
    */
    public function GetController()
    {
        return $this->_controller;
    }
    
    /*
    */
    public function GetDefaultPriority()
    {
        return self::DEFAULT_PRIORITY;
    }
    
    /*
    */
    public function SetController( IDS_Controller_IAction $controller )
    {
        $this->_controller = $controller;
    }
}
?>