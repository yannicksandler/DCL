<?php
class Backend_Controllers_NotaCreditoController extends IDS_Controller_Action_Standard {
	public function init() {
		$this->SetHelper ( 'IDS_Controller_Action_Helper_View', 'View' );
	}

	/* permite listar todos /List
	 * los de un cliente // /List/Cliente/ClienteId
	 * busqueda avanzada con: nombre, apellido, documento, cliente
	 */
	public function ListAction() {
		$this->SetHelper ( 'IDS_Controller_Action_Helper_List', 'List' );

		$layout = $this->View->LayoutView ();

		$request	=	$this->GetRequest ();
		$searchPaciente	=	$request->Param("search");

		$layout->SetParam ( 'titleFile', 'Backend/NotaCredito/Title.tpl' );
		$layout->SetParam ( 'recordFile', 'Backend/NotaCredito/Record.tpl' );
		$layout->SetParam ( 'sectionTitle', 'Notas de credito' );
		//$layout->SetParam ( 'subTitle', 'Listado de creditos de clientes. Puede agregar un nuevo credito o editar uno existente' );
		// debe ser el substring delante de Controller en el nombre de la clase
		$layout->SetParam ( 'varController', 'NotaCredito' );
		$layout->SetParam ( 'varAction', 'List' );
		$layout->SetParam ( 'search', $searchPaciente );

		$return = array ();
/*
		$this->List->ProcessList ( Doctrine::GetTable ( 'NotaCredito' ), 
				$this->GetRequest ()->Params (), $return, 
				array ('updateColumn' => 'Status', 'updateField' => 'selectId', 
						'deleteField' => 'selectId', 'searchField' => 'Nombre' ), 
				$this->View->LayoutView () );
	*/	
		$filters	=	array();
		$g	=	new Classes_GestionEconomicaManager();
		$notasCreditoQ	=	$g->GetNotasCredito($filters);
		
		$this->List->ProcessListQuery ( Doctrine::GetTable ( 'NotaCredito' ),
				$notasCreditoQ,
				$this->GetRequest ()->Params (),
				$return,
				array ('updateColumn' => 'Status',
						'updateField' => 'selectId',
						'deleteField' => 'selectId',
						'searchField' => 'Id' ),
				$this->View->LayoutView () );
		
	}

	public function EditAction() {
		$this->SetHelper ( 'IDS_Controller_Action_Helper_Edit', 'Edit' );
		
		$view = $this->View->View ();
		$return = array ();
		
		$request	=	$this->GetRequest ();
		$id	=	$request->Param("id");
		
		$clientes	=	Doctrine::getTable('Cliente')->FindAllArray();
		$view->SetParam("ArrayClientes", $clientes);
		
		$iva	= new IDS_Doctrine_Table( Doctrine::getTable('TipoIva') );
		$view->SetParam("TiposDeIva", $iva->FindAll());
		
		$data	=	$request->Param ( "data" );
		// si es post y no esta seteado el id
		if ($request->IsPost())
		{
			if(!is_numeric($data['Id']))
			{
				$Credito	=	new NotaCredito();
				
				$nc	=	$Credito->Create($data);
				$data['Id']		=	$nc->Id;
		
			}
			//else
//			{
	//			$Credito->Update($data);
		//	}
			$view->SetParam("data", $data);
		}
		
		if(isset($id) and is_numeric($id))
		{
			$this->Edit->ProcessFormEdit ( Doctrine::GetTable ( 'NotaCredito' ), //nombre del modelo
					$data, $return, null, $view );
		
			//$view->SetParam("data", $return['data']);
		}
		//else
		//echo 'La factura ingresada no existe';
		//$view->SetParam ( 'View', $ResumenView);
		
		$cliente	= new IDS_Doctrine_Table( Doctrine::getTable('Cliente') );
		$view->SetParam("Clientes", $cliente->FindAll());
		
		if(isset($clienteId))
		{
			$view->SetParam("ClienteId", $clienteId);
		}
		
		
	}
	
	
	public function NotaCreditoViewAction() 
	{
			$this->View->RenderLayout(false);
	
		$a	=	new Classes_Session();
		$a->Session();
		            
        if($a->IsLoggedIn())
        {
			$request    =   $this->GetRequest();
			$params     =   $request->Params();
			$view       =   $this->View->View();
			
			$CreditoId	=	$request->Param("id");
			
	
			if(isset($CreditoId) and is_numeric($CreditoId))
			{
				$Credito	=	Doctrine::getTable('NotaCredito')->FindOneById($CreditoId);
				
				if(is_object($Credito))
					$view->SetParam ( 'NotaCredito', $Credito);
				else
					echo 'La nota de credito ingresado no existe';
			}
		}
		else
			echo 'No tiene permiso para realizar esta accion';
	}
}
?>