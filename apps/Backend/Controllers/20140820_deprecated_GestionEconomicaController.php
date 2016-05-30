<?php
class Backend_Controllers_GestionEconomicaController extends IDS_Controller_Action_Standard {
	
	public function init() {
		$this->SetHelper ( 'IDS_Controller_Action_Helper_View', 'View' );
	}
		
	public function MainAction()
	{
		$view       =   $this->View->View();
	
		$view->SetParam ( 'varController', 'GestionAdministrativa' );
	
		$a	=	new Classes_Session();
		$a->Session();
		 
		if($a->GetUser()->Id)
		{
			$usuario	= Doctrine::getTable('Usuario')->FindOneById($a->GetUser()->Id);
	
			if(is_object($usuario))
			{
				//$request	=	$this->GetRequest ();
				//$params     =   $request->Params();
				$g	=	new Classes_GestionEconomicaManager();
				 
				$view->SetParam("Efectivo", $g->GetSaldoEfectivo());
				$view->SetParam("ChequesB", $g->GetTotalChequesBlanco());
				$view->SetParam("ChequesN", $g->GetTotalChequesNegro());
				$view->SetParam("SaldoBancos", $g->GetSaldoBancos());
				$view->SetParam("PrevisionesBlanco", $g->GetPrevisiones('B'));
				$view->SetParam("PrevisionesNegro", $g->GetPrevisiones('N'));
				$view->SetParam("Retenciones", $g->GetTotalRetenciones());
				$view->SetParam("Percepciones", $g->GetTotalPercepciones());
				$view->SetParam("ImportePendienteDeFacturar", $g->GetImportePendienteDeFacturar());
				$view->SetParam("PendienteAcreditar", $g->GetTotalPendienteAcreditar());
				$view->SetParam("PendienteDebitar", $g->GetTotalPendienteDebitar());
				
				$view->SetParam("TotalOrdenesDeCompraPendientesDePagoBlanco", $g->GetTotalOrdenesDeCompraPendientesDePago('B'));
				$view->SetParam("TotalOrdenesDeCompraPendientesDePagoNegro", $g->GetTotalOrdenesDeCompraPendientesDePago('N'));
				
				
				$view->SetParam("Bancos", $g->GetBancosPropios());
				
				$view->SetParam("SaldoTotalClientes", $g->GetSaldoTotalClientes());
				$view->SetParam("SaldoTotalProveedores", $g->GetSaldoTotalProveedores());
				/*
				 * $view->SetParam("SaldoTotalClientesBlanco", $g->GetSaldoTotalClientesBlanco());
				$view->SetParam("SaldoTotalClientesNegro", $g->GetSaldoTotalClientesNegro());
				$view->SetParam("SaldoTotalProveedoresBlanco", $g->GetSaldoTotalProveedoresBlanco());
				$view->SetParam("SaldoTotalProveedoresNegro", $g->GetSaldoTotalProveedoresNegro());
				 */
				
				$view->SetParam("Administrador", $a->EsPerfil('Administrador'));
			}
			else
			{
				echo 'error, no se ha encontrado el objeto usuario';
			}
	
		}
		 
		 
	}
	
	public function EditBancoAction() {
		
		$this->SetHelper ( 'IDS_Controller_Action_Helper_Edit', 'Edit' );
		$this->View->SetViewTemplate('Backend/Banco/Edit.tpl');
		
		$view = $this->View->View ();
		$return = array ();
		
		$this->Edit->ProcessFormEdit ( Doctrine::GetTable ( 'Banco' ), 
			$this->GetRequest ()->Param ( "data" ), $return, null, $view );
		
	}
	
	public function EditChequeAction() {
	
		$this->SetHelper ( 'IDS_Controller_Action_Helper_Edit', 'Edit' );
		$this->View->SetViewTemplate('Backend/Cheque/Edit.tpl');
	
		$view = $this->View->View ();
		$return = array ();
		
		$data =	$this->GetRequest ()->Param ( "data" );
		
		$now    =   new DateTime();
		$data['FechaCreacion']	=	$now->format('Y-m-d');
		
		$tblpri	= new IDS_Doctrine_Table( Doctrine::getTable('Banco') );
		$view->SetParam("Bancos", $tblpri->FindAll());
	
		$this->Edit->ProcessFormEdit ( Doctrine::GetTable ( 'Cheque' ),
				$data, $return, null, $view );
	
	}
	
	public function SaldosClientesAction()
	{
		$this->View->RenderLayout(false);
	
		$a	=	new Classes_Session();
		$a->Session();
	
		if($a->IsLoggedIn())
		{
			$view       =   $this->View->View();
	
			$filters	=	array();
			$g	=	new Classes_GestionEconomicaManager();
			$view->SetParam("Clientes", $g->GetSaldosClientes());
			$view->SetParam("SaldoTotalClientes", $g->GetSaldoTotalClientes());
			
		}
	}
	
	public function SaldosProveedoresAction()
	{
		$this->View->RenderLayout(false);
	
		$a	=	new Classes_Session();
		$a->Session();
	
		if($a->IsLoggedIn())
		{
			$view       =   $this->View->View();
	
			$filters	=	array();
			$g	=	new Classes_GestionEconomicaManager();
			$view->SetParam("Proveedores", $g->GetSaldosProveedores());
			$view->SetParam("SaldoTotalProveedores", $g->GetSaldoTotalProveedores());
		}
	}
	
	public function ActualizarSaldoEfectivoAction()
	{
		try {
		
			$this->View->RenderLayout(false);
			$request	=	$this->GetRequest();
		
			$a	=	new Classes_Session();
			$a->Session();
		
			if($a->IsLoggedIn())
			{
				$view       =   $this->View->View();
		
				$g	=	new Classes_GestionEconomicaManager();
				$view->SetParam("Efectivo", $g->GetSaldoEfectivo());
				
				if($request->IsPost())
				{
					$data	=	$this->GetRequest ()->Param ( "data" );
					$g->ActualizarSaldoEfectivo($data);
					
					$view->SetParam("editSuccessMessage", 'Actualizado correctamente');
				}
			}
			
		} catch (Exception $e) {
			$view->SetParam("editErrorMessage", $e->getMessage());
		}
	}
	
	public function ChequesTercerosAction()
	{
	
		$this->View->RenderLayout(false);
		
		$view       =   $this->View->View();
		
		try
		{
			/* obtener parametros */
			$data    = $this->GetRequest()->Param('data');
		
			/* controlar parametros */
			$cheques		= Doctrine::getTable('Cheque')->ChequesTerceros($data);
			$view->SetParam("Cheques", $cheques->execute());
		}
		catch (Exception $e) {
			$view->SetParam("deleteErrorMessage", 'Error al cargar los cheques. '. $e->getMessage());
		}
		
		
	}
	
	public function ChequesEmitidosAction()
	{
	
		$this->View->RenderLayout(false);
	
		$view       =   $this->View->View();
	
		try
		{
			/* obtener parametros */
			$data    = $this->GetRequest()->Param('data');
	
			/* controlar parametros */
			$cheques		= Doctrine::getTable('Cheque')->ChequesEmitidos();
			$view->SetParam("Cheques", $cheques->execute());
		}
		catch (Exception $e) {
			$view->SetParam("deleteErrorMessage", 'Error al cargar los cheques. '. $e->getMessage());
		}
	
	
	}
	
	public function ChequesPendientesAcreditarAction()
	{
	
		$this->View->RenderLayout(false);
	
		$view       =   $this->View->View();
	
		try
		{
			/* obtener parametros */
			$data    = $this->GetRequest()->Param('data');
			$BancoId    = $this->GetRequest()->Param('BancoId');
			$data['BancoId']	=	$BancoId;
	
			/* controlar parametros */
			$cheques		= Doctrine::getTable('Cheque')->ChequesPendientesAcreditar($data);
			$view->SetParam("Cheques", $cheques->execute());
		}
		catch (Exception $e) {
			$view->SetParam("deleteErrorMessage", 'Error al cargar los cheques. '. $e->getMessage());
		}
	
	
	}
	
	public function ChequesPendientesDebitarAction()
	{
	
		$this->View->RenderLayout(false);
	
		$view       =   $this->View->View();
	
		try
		{
			/* obtener parametros */
			$data    = $this->GetRequest()->Param('data');
			$BancoId    = $this->GetRequest()->Param('BancoId');
			$data['BancoId']	=	$BancoId;
	
			/* controlar parametros */
			$cheques		= Doctrine::getTable('Cheque')->ChequesPendientesDebitar($data);
			$view->SetParam("Cheques", $cheques->execute());
		}
		catch (Exception $e) {
			$view->SetParam("deleteErrorMessage", 'Error al cargar los cheques. '. $e->getMessage());
		}
	
	
	}
	
	public function DepositarChequeAction()
	{
		try {
	
			$this->View->RenderLayout(false);
			$this->View->SetViewTemplate('Backend/Cheque/Depositar.tpl');
			$request	=	$this->GetRequest();
	
			$a	=	new Classes_Session();
			$a->Session();
	
			if($a->IsLoggedIn())
			{
				$view       =   $this->View->View();
				$data	=	$this->GetRequest ()->Param ( "data" );
				$ChequeId	=	$this->GetRequest ()->Param ( "ChequeId" );

				$g	=	new Classes_GestionEconomicaManager();
				
				$view->SetParam("Bancos", $g->GetBancosPropios());
				
				if($ChequeId > 0)
				{
					$Cheque	=	Doctrine::getTable('Cheque')->findOneById($ChequeId);
					if(is_object($Cheque))
					{
						$view->SetParam("Cheque", $Cheque);
					}
				}

				if($request->IsPost())
				{
					$g->DepositarCheque($data);
					$view->SetParam("editSuccessMessage", 'Actualizado correctamente');
				}
			}
				
		} catch (Exception $e) {
			$view->SetParam("editErrorMessage", $e->getMessage());
		}
	}
	
	public function AcreditarChequeAction()
	{
		try {
	
			$this->View->RenderLayout(false);
			$this->View->SetViewTemplate('Backend/Cheque/Acreditar.tpl');
			$request	=	$this->GetRequest();
	
			$a	=	new Classes_Session();
			$a->Session();
	
			if($a->IsLoggedIn())
			{
				$view       =   $this->View->View();
				$data	=	$this->GetRequest ()->Param ( "data" );
				$ChequeId	=	$this->GetRequest ()->Param ( "ChequeId" );
	
				if($ChequeId > 0)
				{
					$Cheque	=	Doctrine::getTable('Cheque')->findOneById($ChequeId);
					if(is_object($Cheque))
					{
						$data['ChequeId']	=	$ChequeId;
						$g	=	new Classes_GestionEconomicaManager();
						$g->AcreditarCheque($data);
						$view->SetParam("editSuccessMessage", 'Acreditado correctamente');
						$view->SetParam("Cheque", $Cheque);
					}
				}
	
				if($request->IsPost())
				{
					$g->AcreditarCheque($data);
					$view->SetParam("editSuccessMessage", 'Actualizado correctamente');
				}
			}
	
		} catch (Exception $e) {
			$view->SetParam("editErrorMessage", $e->getMessage());
		}
	}
	
	public function DebitarChequeAction()
	{
		try {
	
			$this->View->RenderLayout(false);
			$this->View->SetViewTemplate('Backend/Cheque/Debitar.tpl');
			$request	=	$this->GetRequest();
	
			$a	=	new Classes_Session();
			$a->Session();
	
			if($a->IsLoggedIn())
			{
				$view       =   $this->View->View();
				$data	=	$this->GetRequest ()->Param ( "data" );
				$ChequeId	=	$this->GetRequest ()->Param ( "ChequeId" );
	
				if($ChequeId > 0)
				{
					$Cheque	=	Doctrine::getTable('Cheque')->findOneById($ChequeId);
					if(is_object($Cheque))
					{
						$data['ChequeId']	=	$ChequeId;
						$g	=	new Classes_GestionEconomicaManager();
						$g->DebitarCheque($data);
						$view->SetParam("editSuccessMessage", 'Debitado correctamente');
						$view->SetParam("Cheque", $Cheque);
					}
				}
				/*
				if($request->IsPost())
				{
					$g->AcreditarCheque($data);
					$view->SetParam("editSuccessMessage", 'Actualizado correctamente');
				}
				*/
			}
	
		} catch (Exception $e) {
			$view->SetParam("editErrorMessage", $e->getMessage());
		}
	}
	
	public function RechazarChequeAction()
	{
		try {
	
			$this->View->RenderLayout(false);
			$this->View->SetViewTemplate('Backend/Cheque/Rechazar.tpl');
			$request	=	$this->GetRequest();

			$a	=	new Classes_Session();
			$a->Session();
	
			if($a->IsLoggedIn())
			{
				$view       =   $this->View->View();
				$data	=	$this->GetRequest ()->Param ( "data" );
				$ChequeId	=	$this->GetRequest ()->Param ( "ChequeId" );
				$CostoRechazo	=	$this->GetRequest ()->Param ( "CostoRechazo" );
	
				if($ChequeId > 0)
				{
					$Cheque	=	Doctrine::getTable('Cheque')->findOneById($ChequeId);
					if(is_object($Cheque))
					{
						$view->SetParam("Cheque", $Cheque);
						$data['ChequeId']	=	$ChequeId;
						$data['CostoRechazo']	=	$CostoRechazo;
						
						//if($request->IsPost())
						//{
							$g	=	new Classes_GestionEconomicaManager();
							$NotaDebito	=	$g->RechazarCheque($data);
							
							$view->SetParam("editSuccessMessage", 'Rechazado correctamente');
							if(is_object($NotaDebito))
							{
								$view->SetParam("NotaDebitoId", $NotaDebito->GetUltimoNumero());
							}
						//}
						
					}
				}
				
			}
	
		} catch (Exception $e) {
			$view->SetParam("editErrorMessage", $e->getMessage());
		}
	}
	
	public function BancosAction()
	{
		try {
	
			$this->View->RenderLayout(false);
			//$this->View->SetViewTemplate('Backend/Cheque/Debitar.tpl');
			$request	=	$this->GetRequest();
	
			$a	=	new Classes_Session();
			$a->Session();
	
			if($a->IsLoggedIn())
			{
				$view       =   $this->View->View();
				//$data	=	$this->GetRequest ()->Param ( "data" );
				
				$g	=	new Classes_GestionEconomicaManager();
				
				$view->SetParam("Bancos", $g->GetBancosPropios());
	
			}
	
		} catch (Exception $e) {
			$view->SetParam("editErrorMessage", $e->getMessage());
		}
	}
	
	public function PercepcionesAction()
	{
		try {
	
			$this->View->RenderLayout(false);
			$request	=	$this->GetRequest();
	
			$a	=	new Classes_Session();
			$a->Session();
	
			if($a->IsLoggedIn())
			{
				$view       =   $this->View->View();
				//$data	=	$this->GetRequest ()->Param ( "data" );
	
				$g	=	new Classes_GestionEconomicaManager();
	
				$view->SetParam("Percepciones", $g->GetPercepciones());
	
			}
	
		} catch (Exception $e) {
			$view->SetParam("editErrorMessage", $e->getMessage());
		}
	}
	
	
	public function OrdenesDeCompraPendientesDePagoAction()
	{
		try {
	
			$this->View->RenderLayout(false);
			$request	=	$this->GetRequest();
	
			$a	=	new Classes_Session();
			$a->Session();
	
			if($a->IsLoggedIn())
			{
				$view       =   $this->View->View();
				$data	=	$this->GetRequest ()->Param ( "data" );
	
				$filters=array();
				$OCQuery	=	Doctrine::GetTable ( 'OrdenDeCompra' )->GetPendientesDePago($filters);
				$view->SetParam("OrdenesDeCompraPendientes", $OCQuery->execute());
	
			}
	
		} catch (Exception $e) {
			$view->SetParam("editErrorMessage", $e->getMessage());
		}
	}
	
	public function RetencionesAction()
	{
		try {
	
			$this->View->RenderLayout(false);
			$request	=	$this->GetRequest();
	
			$a	=	new Classes_Session();
			$a->Session();
	
			if($a->IsLoggedIn())
			{
				$view       =   $this->View->View();
				$data	=	$this->GetRequest ()->Param ( "data" );
				$TipoRetencion	=	$this->GetRequest ()->Param ( "TipoRetencion" );
	
				$g	=	new Classes_GestionEconomicaManager();
	
				if(isset($TipoRetencion) && (is_numeric($TipoRetencion)))
				{
					// si se pasa el tipo de retencion, muestra el detalle
					$data['TipoRetencion'] = $TipoRetencion;
					$view->SetParam("Retenciones", $g->GetRetencionesPendientes($data));
					$view->SetParam("OcultarAccion", true);
				}
				else
					$view->SetParam("Retenciones", $g->GetRetencionesPendientesAgrupadasPorTipo($data));
	
			}
	
		} catch (Exception $e) {
			$view->SetParam("editErrorMessage", $e->getMessage());
		}
	}
	
	public function NotaDebitoViewAction()
	{
		try {
	
			$this->View->RenderLayout(false);
			$this->View->SetViewTemplate('Backend/NotaDebito/View.tpl');
			$request	=	$this->GetRequest();
	
			$a	=	new Classes_Session();
			$a->Session();
	
			if($a->IsLoggedIn())
			{
				$view       =   $this->View->View();
				$id	=	$this->GetRequest ()->Param ( "id" );
	
				$NotaDebito	=	Doctrine::getTable('NotaDebito')->findOneById($id);
					if(is_object($NotaDebito))
					{
						$view->SetParam("NotaDebito", $NotaDebito);
					}
	
			}
	
		} catch (Exception $e) {
			$view->SetParam("editErrorMessage", $e->getMessage());
		}
	}
	
	public function ListBancosAction() {
		$this->SetHelper ( 'IDS_Controller_Action_Helper_List', 'List' );
	
		$layout = $this->View->LayoutView ();
	
		$layout->SetParam ( 'titleFile', 'Backend/Banco/Title.tpl' );
		$layout->SetParam ( 'recordFile', 'Backend/Banco/Record.tpl' );
		$layout->SetParam ( 'sectionTitle', 'Bancos' );
		// debe ser el substring delante de Controller en el nombre de la clase
		$layout->SetParam ( 'varController', 'GestionEconomica' );
		$layout->SetParam ( 'varAction', 'ListBancos' );
		$layout->SetParam ( 'notAdd', TRUE );
		$layout->SetParam('specialLink',  '<a href="/GestionEconomica/EditBanco" class="linkSendHome"><img src="/images/icons/add.png" title="Agregar"/> Agregar nuevo &raquo;</a>');
	
	
		$search = str_replace(' ', '_', $this->GetRequest()->Param('search'));
		$search	= urldecode(str_replace('25', '', $search ));
		//echo $search;
		$layout->SetParam ( 'search', $search);
	
		$return = array ();
	
		$this->List->ProcessList ( Doctrine::GetTable ( 'Banco' ),
				$this->GetRequest ()->Params (), 
					$return, array ('updateColumn' => 'Status', 
								'updateField' => 'selectId', 
							'deleteField' => 'selectId', 
							'searchField' => 'Nombre' ), 
				$this->View->LayoutView () );
	}
	
	public function ListConceptosBancariosAction() {
		$this->SetHelper ( 'IDS_Controller_Action_Helper_List', 'List' );
	
		$layout = $this->View->LayoutView ();
	
		$layout->SetParam ( 'titleFile', 'Backend/BancoTipoConcepto/Title.tpl' );
		$layout->SetParam ( 'recordFile', 'Backend/BancoTipoConcepto/Record.tpl' );
		$layout->SetParam ( 'sectionTitle', 'Conceptos bancarios' );
		// debe ser el substring delante de Controller en el nombre de la clase
		$layout->SetParam ( 'varController', 'GestionEconomica' );
		$layout->SetParam ( 'varAction', 'ListConceptosBancarios' );
		$layout->SetParam('filterBox',    'Backend/BancoTipoConcepto/FilterBox.tpl');
		$layout->SetParam ( 'notAdd', TRUE );
	
	
		$search = str_replace(' ', '_', $this->GetRequest()->Param('search'));
		$search	= urldecode(str_replace('25', '', $search ));
		//echo $search;
		$layout->SetParam ( 'search', $search);
	
		$return = array ();
	
		$this->List->ProcessList ( Doctrine::GetTable ( 'BancoTipoConcepto' ),
				$this->GetRequest ()->Params (),
				$return, array ('updateColumn' => 'Status',
						'updateField' => 'selectId',
						'deleteField' => 'selectId',
						'searchField' => 'Nombre' ),
				$this->View->LayoutView () );
	}
	
	public function EditBancoTipoConceptoAction() {
	
		$this->SetHelper ( 'IDS_Controller_Action_Helper_Edit', 'Edit' );
		$this->View->SetViewTemplate('Backend/BancoTipoConcepto/Edit.tpl');
	
		$view = $this->View->View ();
		$return = array ();
	
		$this->Edit->ProcessFormEdit ( Doctrine::GetTable ( 'BancoTipoConcepto' ),
				$this->GetRequest ()->Param ( "data" ), $return, null, $view );
	
	}
	
	public function HistorialEfectivoAction()
	{
	
		$this->View->RenderLayout(false);
	
		$view       =   $this->View->View();
	
		try
		{
			/* obtener parametros */
			$data    = $this->GetRequest()->Param('data');
	
			/* controlar parametros */
			$g	=	new Classes_GestionEconomicaManager();
			$view->SetParam("Historial", $g->GetHistorialEfectivo());
		}
		catch (Exception $e) {
			$view->SetParam("deleteErrorMessage", 'Error al cargar los cheques. '. $e->getMessage());
		}
	
	
	}
	
	
}
?>