<?php
class Backend_Controllers_ChequeController extends IDS_Controller_Action_Standard {
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
		//$searchPaciente	=	$request->Param("search");
		$proveedores	=	Doctrine::getTable('Proveedor')->FindAllArray();
		$layout->SetParam("ArrayProveedores", $proveedores);

		$layout->SetParam ( 'titleFile', 'Backend/Cheque/Title.tpl' );
		$layout->SetParam ( 'recordFile', 'Backend/Cheque/Record.tpl' );
		$layout->SetParam ( 'sectionTitle', 'Cheques' );
		//$layout->SetParam ( 'subTitle', 'Listado de creditos de clientes. Puede agregar un nuevo credito o editar uno existente' );
		// debe ser el substring delante de Controller en el nombre de la clase
		$layout->SetParam ( 'varController', 'Cheque' );
		$layout->SetParam ( 'varAction', 'List' );
		//$layout->SetParam ( 'search', $searchPaciente );
		$layout->SetParam ( 'filterBox', 'Backend/Cheque/Filterbox.tpl' );
		$layout->SetParam ( 'notAdd', true );

		$g = new Classes_GestionEconomicaManager();
		$estadosCheques = $g->GetEstadosCheques();
		$layout->SetParam ( 'Estados', $estadosCheques );
		
		/*
		 obtener parametros de busqueda POST
		*/
		$filters  =   $this->GetRequest()->Param('filters');
		
		/*
		 obtener parametros de busqueda GET
		*/
		$NombreCliente  =   $this->GetRequest()->Param('NombreCliente');
		$NombreProveedor  =   $this->GetRequest()->Param('NombreProveedor');
		$Estado  =   $this->GetRequest()->Param('Estado');
		$Numero  =   $this->GetRequest()->Param('Numero');
		$FechaDesde  =   $this->GetRequest()->Param('FechaDesde');
		$FechaHasta  =   $this->GetRequest()->Param('FechaHasta');
		$FechaDesde	=	 str_replace("_", "/", $FechaDesde) ;
		$FechaHasta	=	 str_replace("_", "/", $FechaHasta) ;
		
		if(isset($NombreCliente) and ($NombreCliente != 'Nombre cliente'))
		{
			$filters['NombreCliente'] = str_replace("_", " ", $NombreCliente);
		}
		if(isset($NombreProveedor) and ($NombreProveedor != 'Nombre proveedor'))
			$filters['NombreProveedor'] = str_replace("_", " ", $NombreProveedor);
		
		if(is_numeric($Estado))
			$filters['Estado'] = $Estado;
		
		if(is_numeric($Numero))
			$filters['Numero'] = $Numero;
		
		if(($FechaDesde != 'Fecha desde') and (($FechaDesde != '')))
			$filters['FechaDesde'] = str_replace("_", " ", $FechaDesde);
		
		if(($FechaHasta != 'Fecha hasta') and (($FechaHasta != '')))
			$filters['FechaHasta'] = str_replace("_", " ", $FechaHasta);
		
		$return = array ();

		$q	=	Doctrine::getTable('Cheque')->GetByFilter($filters);
		$layout->SetParam ( 'CantidadEncontrados', count($q) );
		
		$this->List->ProcessListQuery ( Doctrine::GetTable ( 'Cheque' ),
                                  $q,
                                  $this->GetRequest ()->Params (),
                                  $return,
                                  array ('updateColumn' => 'Status',
                                                  'updateField' => 'selectId',
                                                  'deleteField' => 'selectId' ),
                                                    $this->View->LayoutView () );
		/* convert date format to erate slashes '/' */
		if(isset($filters['FechaDesde']))// != 'Fecha cobro desde')
			$filters['FechaDesde'] = str_replace("/", "_", $filters['FechaDesde']);
		
		if(isset($filters['FechaHasta']))// != 'Fecha cobro hasta')
			$filters['FechaHasta'] = str_replace("/", "_", $filters['FechaHasta']);
		
		if(isset($filters['FechaDesde']))// != 'Fecha cobro desde')
			$filters['FechaDesde'] = str_replace(" ", "_", $filters['FechaDesde']);
		
		if(isset($filters['NombreProveedor']) and ($NombreCliente != 'Nombre proveedor'))// != 'Fecha cobro hasta')
			$filters['NombreProveedor'] = str_replace(" ", "_", $filters['NombreProveedor']);
		
		if(isset($filters['NombreCliente']) and ($NombreCliente != 'Nombre cliente'))// != 'Fecha cobro hasta')
			$filters['NombreCliente'] = str_replace(" ", "_", $filters['NombreCliente']);
		
		$layout->SetParam ( 'filters', $filters );
		
		/* set params ORDER BY */
		/*
		if(isset($NombreCliente) and ($NombreCliente != 'Nombre cliente'))
		{
			$layout->SetParam ( 'NombreCliente', $NombreCliente );
		}
		
		if(isset($NombreProveedor) and ($NombreProveedor != 'Nombre_proveedor'))
			$layout->SetParam ( 'NombreProveedor', $NombreProveedor );
		
		if(is_numeric($Numero))
			$layout->SetParam ( 'Numero', $Numero );
		
		if($FechaDesde != 'Fecha desde')
			$layout->SetParam ( 'FechaDesde', str_replace("/", "_", $FechaDesde) ); //
		
		if($FechaHasta != 'Fecha hasta')
			$layout->SetParam ( 'FechaHasta', str_replace("/", "_", $FechaHasta) ); //str_replace("_", "/", $FechaHastaSearch)
		 */
	}

	public function AnularAction()
	{
		try {
	
			$this->View->RenderLayout(false);
			$request	=	$this->GetRequest();
	
			$a	=	new Classes_Session();
			$a->Session();
	
			if($a->IsLoggedIn())
			{
				$c	=	new Classes_GestionEconomicaManager();
				 
				$view       =   $this->View->View();
				$chequeid	=	$this->GetRequest ()->Param ( "id" );
	
				$c->AnularCheque($chequeid);
	
				$view->SetParam("mensaje", 'Anulado correctamente');
			}
	
		} catch (Exception $e) {
			$view->SetParam("mensaje", $e->getMessage());
		}
	}
}
?>