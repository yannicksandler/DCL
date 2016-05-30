<?php
    class Backend_Controllers_GestionAdministrativaController extends IDS_Controller_Action_Standard
    {
        public function init()
        {
            $this->SetHelper('IDS_Controller_Action_Helper_View', 'View');
        }
        
        public function MainAction()
        {
    	    $view       =   $this->View->View();        
            
        	$view->SetParam ( 'varController', 'GestionAdministrativa' );
        	$g	=	new Classes_GestionEconomicaManager();
        	
        	// parametro pasado para abrir tab correspondiente a Pagos, Cobranzas etc
        	$Tab  =   urldecode($this->GetRequest()->Param('Tab'));
        	$view->SetParam("Tab", $Tab);
        	
        	$proveedores	=	Doctrine::getTable('Proveedor')->FindAllArray();
        	$view->SetParam("ArrayProveedores", $proveedores);
    	
        	$tblp	= new IDS_Doctrine_Table( Doctrine::getTable('Proveedor') );
        	$view->SetParam("Proveedores", $tblp->FindAll());
        	
        	$tblp	= new IDS_Doctrine_Table( Doctrine::getTable('Cliente') );
        	$view->SetParam("Clientes", $tblp->FindAll());
        	
        	$proveedores	=	Doctrine::getTable('Cliente')->FindAllArray();
        	$view->SetParam("ArrayClientes", $proveedores);
        	
        	if(count(Doctrine::getTable('Notificacion')->GetPendientes()))
        		$view->SetParam("NotificacionesPendientes", true);
        	else
        		$view->SetParam("NotificacionesPendientes", false);
        	
        	$filters	=	array();
        	$FQuery	=	Doctrine::GetTable ( 'Factura' )->GetPendientesDeCobro($filters);
        	$view->SetParam("PendienteDeCobro", count($FQuery->execute()));
        	
        	$FacturasQuery	=	Doctrine::GetTable ( 'FacturaCompra' )->GetPendientesDePago($filters);
        	$OCQuery	=	Doctrine::GetTable ( 'OrdenDeCompra' )->GetPendientesDeValidar($filters);
        	$view->SetParam("PagosPendientes", count($OCQuery) + count($FacturasQuery) );
        	
        	$ordenQuery	=	Doctrine::getTable('OrdenDeTrabajo')->GetOrdenesDeTrabajoSinFacturar($filters);
        	$view->SetParam("PendienteDeFacturar", count($ordenQuery));;
        	$data=array();
        	$view->SetParam("CantidadChequesCartera", count(Doctrine::getTable('Cheque')->ChequesTerceros($data)));
        	$view->SetParam("CantidadPendientesAcreditar", count(Doctrine::getTable('Cheque')->ChequesPendientesAcreditar($data)));
        	$view->SetParam("CantidadPendientesDebitar", count(Doctrine::getTable('Cheque')->ChequesPendientesDebitar($data)));
        	
        	$view->SetParam("Retenciones", $g->GetTotalRetenciones());
        	$view->SetParam("Percepciones", $g->GetTotalPercepciones());
        	
	    	$a	=	new Classes_Session();
			$a->Session();
			            
	        if($a->GetUser()->Id)
	        {
	        	$usuario	= Doctrine::getTable('Usuario')->FindOneById($a->GetUser()->Id);
	        	
	        	if(is_object($usuario))
	        	{
					//$request	=	$this->GetRequest ();
					//$params     =   $request->Params();
	        		
	        		
					
	        	}
	        	else
	        	{
	        		echo 'error, no se ha encontrado el objeto usuario';
	        	}
				
	        }
	    
        	
        }
        
        public function CobranzasPendientesAction()
        {
        	$this->View->RenderLayout(false);
        
        	$a	=	new Classes_Session();
        	$a->Session();
        	 
        	if($a->IsLoggedIn())
        	{
        		$view       =   $this->View->View();

        		$filters	=	array();
        		$FQuery	=	Doctrine::GetTable ( 'Factura' )->GetPendientesDeCobro($filters);
        		$view->SetParam("PendienteDeCobro", $FQuery->execute());
        	}
        }
                
        public function PagosPendientesAction()
        {
        	$this->View->RenderLayout(false);
        
        	$a	=	new Classes_Session();
        	$a->Session();
        
        	if($a->IsLoggedIn())
        	{
        		$view       =   $this->View->View();
        
        		$filters	=	array();

        		$FacturasQuery	=	Doctrine::GetTable ( 'FacturaCompra' )->GetPendientesDePagoDistintasDeInsumosContabilizar($filters);
				$view->SetParam("FCPendientes", $FacturasQuery->execute());
				$OCPendientes	=	Doctrine::GetTable ( 'OrdenDeCompra' )->GetPendientesDeValidar($filters);
				$view->SetParam("OrdenesDeCompraPendientes", $OCPendientes);
        	}
        }

        public function FacturacionPendienteAction()
        {
        	$this->View->RenderLayout(false);
        
        	$a	=	new Classes_Session();
        	$a->Session();
        
        	if($a->IsLoggedIn())
        	{
        		$view       =   $this->View->View();
        
        		$filters	=	array();
        		$ordenQuery	=	Doctrine::getTable('OrdenDeTrabajo')->GetOrdenesDeTrabajoSinFacturar($filters);
				$view->SetParam("PendienteDeFacturar", $ordenQuery->execute());
        	}
        }

        public function NotificacionesAction()
        {
        	$this->View->RenderLayout(false);
        
        	$a	=	new Classes_Session();
        	$a->Session();
        
        	if($a->IsLoggedIn())
        	{
        		$view       =   $this->View->View();
        
        		$filters	=	array();
        		$view->SetParam("Notificaciones", Doctrine::getTable('Notificacion')->findAll());
        	}
        }
}
?>