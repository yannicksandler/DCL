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
		
		$Numero  =   $this->GetRequest()->Param('Numero');
		if(isset($Numero) && is_numeric($Numero))
		{
			$layout->SetParam ( 'Numero', $Numero );
		}
		
		$Estado  =   $this->GetRequest()->Param('Estado');
		if(isset($Estado) && ($Estado != ''))
		{
			$layout->SetParam ( 'EstadoSeleccionado', $Estado );
		}
		
		$filters['Numero'] = $Numero;
		$filters['Estado'] = $Estado;
		
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