<?php
/**
* @author Gaston
* @version 1.0
* @created 16-mar-2010 06:00:02 p.m.
*/
class IDS_Controller_Action_Helper_List
{
    const DEFAULT_PRIORITY  =       5;
    const DEFAULT_PAGESIZE  =       20;
            
    private $_controller;     
      protected $_options     =     array(
                                                      'deleteErrorMessage'   =>    'Ha ocurrido un error al intentar eliminar',
                                                      'deleteSuccessMessage' =>  'Se ha eliminado correctamente',
                                                      'updateErrorMessage'    =>    'Ha ocurrido un error al intentar actualizar',
                                                      'updateSuccessMessage' =>  'Se ha actualizado correctamente',
                                                      'exportErrorMessage'   =>    'Ha ocurrido un error al intentar exportar',
                                                      'exportSuccessMessage' =>  'Se ha exportado correctamente',
                                                      'listErrorMessage'            =>    'Ha ocurrido un error al intentar listar',
                                                      'listSuccessMessage'    =>    'Se ha listado correctamente',
                                                      'orderSeparator'        =>    '_'
                                               );
            
      /*
      */
    public function __construct( IDS_Controller_IAction $controller  )
    {
        $this->_controller      = $controller;
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
      
      /*    *     VER SI SE VA A USAR O SE DESCARTA
            *     Crea un Doctrine_Query a partir de un data source de tipo Doctrine Table o un string con el nombre del Modelo
            *
            *     @param      string|Doctrine_Query|Doctrine_Table $dataSource      
            *
            *     @return Doctrine_Query
      */
      public function GetQuery( $dataSource = null )
      {
            if( is_null($dataSource) )
                  throw new IDS_Controller_Action_Helper_Exception('Sin data source');
                  
            if( $dataSource instanceof Doctrine_Table )
            $query      = $dataSource->CreateQuery();
        else if( $dataSource instanceof Doctrine_Query )
            $query      = $dataSource;
        else
            $query      = Doctrine::GetTable( $dataSource )->CreateQuery();
                  
            return $query;    
      }
      
      /*
            *     Elimina una serie de registros identificados mediante el array del segundo parámetro ($ids)
            *
            *     @param Doctrine_Table $dataSource         Modelo sobre el cual eliminar los registros
            *     @param array $ids                                     Array de Ids de los registros a eliminar
            *
            *     @return Doctrine_Collection               Colección de registros afectados
      */
      public function Delete(Doctrine_Table $dataSource, $ids = null)
      {           
            return  $dataSource->CreateQuery()
                        ->Delete()
                        ->WhereIn('Id', $ids )
                        ->Execute();
      }
            
      /*
            *     Actualiza el campo indicado en $columnName con el valor indicado en $newValue
            *     en una serie de registros identificados mediante el array del segundo parámetro ($ids) 
            *
            *     @param Doctrine_Table $dataSource         Modelo sobre el cual eliminar los registros
            *     @param array $ids                                     Array de Ids de los registros a actualizar
            *     @param string $columnName                       Nombre de la columna del modelo a actualizar
            *     @param object $newValue                         Nuevo valor de los registros para la columna indicada
            *
            *     @return Doctrine_Collection               Colección de registros afectados
      */          
      public function Update(Doctrine_Table $dataSource, $ids = null, $columnName, $newValue)
      {
            return  $dataSource->CreateQuery()
                        ->Update()
                        ->Set($columnName, $newValue)
                        ->WhereIn('Id', $ids )
                        ->Execute();
      }
            
      /*
            *     Realiza el proceso normal de un listado en base a opciones enviadas por parámetro
            *
            *     @param Doctrine_Table $table              Modelo sobre el cual realizar el proceso
            *     @param Array $params                            Parámetros para armar el listado ( page, pagesize, action, listaction )
            *     @param Array $return                            Variable por referencia donde se volcaran todos los datos como resultado de la operación
            *     @param Array $options                           Opciones parametrizables
            *     @param IDS_IView $view                          Vista a la que asignar los valores de la operación
            *
            *     @return bool                                          Retorna falso en caso de error o true en caso que la operación se realizó con éxito
      */
      
      public function ProcessList(Doctrine_Table $table, $params, &$return, $options, IDS_IView $view = null)
      {
            $this->_processList( $table, null, $params, $return, $options, $view );
      }
      
      public function ProcessListQuery(Doctrine_Table $table, Doctrine_Query $query = null, $params, &$return, $options, IDS_IView $view = null)
      {
            $this->_processList( $table, $query, $params, $return, $options, $view );
      }
      
      protected function _processList(Doctrine_Table $table, Doctrine_Query $query = null, $params, &$return, $options, IDS_IView $view = null)
      {
            $request    = $this->GetController()->GetRequest();
            $status           = true;
            $listAction = ( isset($params["listAction"]) and !is_null($params["listAction"]) ) ? $params["listAction"] : 'list';
                  
        if( isset($params['postAction']) )
        {
            switch( ucwords($params['postAction']) )
            {
                case 'Delete':
                              try
                              {
                                    $ids        =     isset($options['deleteField']) ?
                                                                  $request->Post($options['deleteField']) :
                                                                        $request->Post('toDelete');
                                          
                                    if( is_array($ids) and count($ids) )
                                    {
                                          $return['affectedRows']             =   $this->Delete($table, $ids);
                                                
                                          $return['deleteSuccessMessage'] =   isset($options['deleteSuccessMessage']) ?
                                                                                                      $options['deleteSuccessMessage'] :
                                                                                                            $this->_options['deleteSuccessMessage'];
                                    }
                              }
                              catch(Exception $Exception)
                              {
                                    $return['deleteErrorMessage'] =      isset($options['deleteErrorMessage'])   ?
                                                                                                $options['deleteErrorMessage']   :
                                                                                                      $this->_options['deleteErrorMessage'];
                                          
                                    $return['deleteErrorException'] =   $Exception;
                                    $status     = false;
                              }
                    break;
                              
                case 'Update':
                              try
                              {
                                    $ids        =     isset($options['updateField']) ?
                                                                  $request->Post($options['updateField']) :
                                                                        $request->Post('toUpdate');
                                          
                                    if( is_array($ids) and count($ids) and $options['updateColumn'] )
                                    {
                                          $value            =      isset($options['updateValue']) ?
                                                                        $request->Post($options['updateValue']) :
                                                                              $request->Post('updateNewValue');
                                                
                                          $return['affectedRows'] =     $this->Update($table, $ids, $options['updateColumn'], $value);
                                                
                                          $return['updateSuccessMessage'] =   isset($options['updateSuccessMessage']) ?
                                                                                                      $options['updateSuccessMessage'] :
                                                                                                            $this->_options['updateSuccessMessage'];
                                    }
                              }
                              catch(Exception $Exception)
                              {
                                    $return['updateErrorMessage']   =      isset($options['updateErrorMessage']) ?
                                                                                                $options['updateErrorMessage'] :
                                                                                                      $this->_options['updateErrorMessage'];
                                          
                                    $return['updateErrorException'] =   $Exception;
                                    $status     = false;
                              }
                    break;
            }
        }
                  
            if( isset($listAction) )
            {
                  switch( ucwords($listAction) )
                  {
                        case 'Export':
                              try
                              {
                                    $return           =     $this->Export();
                                    
                                    $return['exportSuccessMessage'] =   isset($options['exportSuccessMessage'])   ?
                                                                                                $options['exportSuccessMessage'] :
                                                                                                      $this->_options['exportSuccessMessage'];
                              }
                              catch(Exception $Exception)
                              {
                                    $return['exportErrorMessage']       =      isset($options['exportErrorMessage'])  ?
                                                                                                $options['exportErrorMessage']  :
                                                                                                      $this->_options['exportErrorMessage'];
                                          
                                    $return['exportErrorException'] =   $Exception;
                                    $status     = false;
                              }
                              break;
                              
                        case 'List':
                        default:
                              try
                              {
                                    $config     =     $this->GetController()->GetConfig();
                                          
                                    $page             =     isset($params['page'])        ?      $params['page']   :  1;
                                    $pagesize   =     isset($params['pagesize'])    ?      $params['pagesize']  :  $config->Get('ids.page_size');
                                    $range            =     isset($params['range'])       ?   $params['range']  :    $config->Get('ids.pager_range');
                                    $order            =     isset($params['order'])       ?       $params['order']  :  null;
                                          
                                    if( $request->Param("search") )
                                    {
                                    	
                                          $searchParam      = isset( $options['searchField']) ? $options['searchField'] : 'Name';
                                          $params['filters'][$searchParam]    =     array(
                                                                                                                  'type'  =>  'like',
                                                                                                                  'value' =>  urldecode($params["search"])
                                                                                                            );
                                    }
                                    
                                    $orderSeparator   =   isset($options['orderSeparator'])      ?
                                                                              $options['orderSeparator'] :
                                                                                    $this->_options['orderSeparator'];                                      
                                          
                                    $query                        =     $query      ? $query : $this->GetList($table);
                                          
                                    if( isset($params['filters']) and is_array($params['filters']) and count($params['filters']) )
                                    {
                                          $return['filters']                  =      $params['filters'];
                                          $this->FilterList($query, $params['filters']);
                                    }
                                          
                                    if( isset($params['order']) )
                                    {
                                          $query->addOrderBy(str_replace($orderSeparator,' ',$params['order']));
                                          list($return['orderBy'],
                                                $return['order'] )            =       explode($orderSeparator,$params['order']);
                                    }
                                          
                                    $return['list']                           =     $this->Paginate($query, $page, $pagesize, $range);
                                          
                                    $return['listSuccessMessage']       =   isset($options['listSuccessMessage'])     ?
                                                                                                $options['listSuccessMessage'] :
                                                                                                      $this->_options['listSuccessMessage'];
                              }
                              catch(Exception $Exception)
                              {
                                    $return['listErrorMessage']         =      isset($options['listErrorMessage'])  ?
                                                                                                $options['listErrorMessage']  :
                                                                                                      $this->_options['listErrorMessage'];
                                          
                                    $return['listErrorException']       =     $Exception;
                                    $status     = false;
                              }
                              break;
                  }
            }
                  
            if( !is_null($view) )
                  $view->SetParam($return);
                  
            return $status;
      }
      
      /*
           *     En base a la query recibida y el array de filtros, recorre el array y modifica la query con los mismos
           *
           *     @param Doctrine_Query $query        Query base sobre la cual aplicar filtros
           *     @param Array $filters                     Array de filtros a aplicar
      */
      public function FilterList( Doctrine_Query &$query, $filters )
    {
        foreach( $filters as $column => $filter )
            {
            	if(is_array($filter))
            	{
                  if( !array_key_exists('type', $filter) )
                        continue;
                       
                  switch( strtolower($filter['type']) )
                  {
                        case 'equal':
                              $query      =     $this->FilterEqualTo($query, $column, $filter);
                              break;
                        case 'like':
                              $query      =     $this->FilterLike($query, $column, $filter);
                              break;
                        case 'fulltext':
                              $query      =     $this->FilterFullText($query, $column, $filter);
                              break;
                        case 'range':
                              $query      =     $this->FilterRange($query, $column, $filter);
                              break;
                  }
            	}
            }
    }
      
      /*
            *     Agrega filtro de igualdad a la query para el filtro enviado
            *     
            *     @param Doctrine_Query $query Query sobre la que aplicar el filtro
            *     @param String $column               Nombre de la columna sobre la cual se aplica la condición
            *     @param String $filter               Array con datos "column", "negation", "value"
            *     
            *     @return Doctrine_Query              Retorna la query
      */
      public function FilterEqualTo($query, $column, $filter)
      {
            if( is_array($filter['value']) and count($filter['value']) )
            {
                  if( isset($filter['negation']) and $filter['negation'] )
                        $query->andWhereNotIn($column, $filter['value']);
                  else
                        $query->andWhereIn($column, $filter['value']);
            }
            else
            {
                  if( isset($filter['negation']) and $filter['negation'] )
                        $query->addWhere($column." != ?", $filter['value']);
                  else
                        $query->addWhere($column." = ?", $filter['value']);
            }
                  
            return $query;
      }
      
      /*
            *     Agrega filtro por like a la query para el filtro enviado
            *     
            *     @param Doctrine_Query $query Query sobre la que aplicar el filtro
            *     @param String $column               Nombre de la columna sobre la cual se aplica la condición
            *     @param String $filter               Array con datos "column", "negation", "value"
            *     
            *     @return Doctrine_Query              Retorna la query
      */    
      public function FilterLike($query, $column, $filter)
      {
            if( isset($filter['negation']) and $filter['negation'] )
                  $query->addWhere($column." NOT LIKE ?", $filter['value']);
            else
                  $query->addWhere($column." LIKE ?", array( '%'.$filter['value'].'%') );
                        
            return $query;
      }
      
      /*
            *     Agrega filtro por fulltext a la query para el filtro enviado
            *     
            *     @param Doctrine_Query $query Query sobre la que aplicar el filtro
            *     @param String $column               Nombre de la columna sobre la cual se aplica la condición           
            *     @param String $filter               Array con datos "column", "negation", "value"
            *     
            *     @return Doctrine_Query              Retorna la query
      */                
      public function FilterFullText($query, $column, $filter)
      {
            if( isset($filter['negation']) and $filter['negation'] )
                  $query->addWhere($column." NOT LIKE ?", $filter['value']);
            else
                  $query->addWhere($column." LIKE ?", array( '%'.$filter['value'].'%') );
      }
            
      /*
            *     Agrega filtro por rango a la query para el filtro enviado
            *     
            *     @param Doctrine_Query $query Query sobre la que aplicar el filtro
            *     @param String $column               Nombre de la columna sobre la cual se aplica la condición           
            *     @param String $filter               Array con datos "column", "negation", "value"
            *     
            *     @return Doctrine_Query              Retorna la query
      */
    public function FilterRange($query, $column, $filter)
      {
            if( isset($filter['negation']) and $filter['negation'] )
                  $query->addWhere($column." NOT BETWEEN ? AND ?", array( $filter['valueFrom'], $filter['valueTo']));
            else
                  $query->addWhere($column." BETWEEN ? AND ?", array( $filter['valueFrom'], $filter['valueTo']));         
      }
            
      /*
           *     Devuelve una query que produce como resultado todos los registros del modelo indicado por parámetro
           *
           *     @param Doctrine_Table $dataSource         Modelo sobre el que se solicita listar
           *
           *     @return Doctrine_Query                          Query sobre el modelo solicitado
      */
      public function GetList(Doctrine_Table $dataSource)
      {
            return  $dataSource->CreateQuery();       
      }
            
      /*
           *     Página mediante el objeto Doctrine_Pager la query enviada según los parámetros
           *
           *     @param Doctrine_Query $query                    Query a paginar
           *     @param int $page                                Página actual
           *     @param int $pageSize                            Registros por página
           *     @param int $range                                     Cantidad de páginas a mostrar en el paginador
           *
           *     @return Array                                         
      */
    public function Paginate( Doctrine_Query $query, $page  = 1, $pageSize = self::DEFAULT_PAGESIZE, $range = null )
    {
        $return                     =     array();
                  
        $pager                      =     new Doctrine_Pager( $query, $page, $pageSize );
        $rs                         =     $pager->Execute();
                  
        $return['data']         =   $rs->GetData();
            $return['pager']        =     $pager;
        $return['page']         =   $pager->GetPage();
        $return['pageCount']    =   $pager->GetLastPage();
        $return['pageSize']     =   $pager->GetMaxPerPage();
        $return['previousPage'] =   $pager->GetPreviousPage();
            $return['nextPage']     =     $pager->GetNextPage();  
                  
        if( $range != null )
        {
            $chunk              =   new Doctrine_Pager_Range_Sliding( array('chunk' => $range), $pager);
            $return['range']    =   $chunk->rangeAroundPage();
        }
        else
        {
            $return['range']    =   range( $return['pageCount'] > 0 ? 1 : 0, $return['pageCount']);
        }
                  
        return $return;
    }
            
      /*
            *     Exporta los resultados de la query enviada al formato solicitado
            *
            *     @param Doctrine_Query $query        Query sobre la que obtener los resultados
            *     @param String @extension                  Extensión indicando el formato a exportar
            *
            *     @return Array                                   Especficar luego
      */
      public function Export(Doctrine_Query $query, $extension = 'csv')
      {
            return array();
      }
}
?>