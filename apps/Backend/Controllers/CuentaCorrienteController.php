<?php
    class Backend_Controllers_CuentaCorrienteController extends IDS_Controller_Action_Standard
    {
        public function init()
        {
            $this->SetHelper('IDS_Controller_Action_Helper_View', 'View');
        }
        
        public function MainAction()
        {
        	//$t	=	new Classes_Trazabilidad();
	        ///$c	=	"Consulta inicio Frontend";
	        //$t->AddLog($c);
	        
    	    $view       =   $this->View->View();        
            
            //$PacienteId     =   $this->GetRequest()->Param("PacienteId");
            //$ExamenTipoId     =   $this->GetRequest()->Param("ExamenTipoId");
            //$view->SetParam("editErrorMessage", 'Hubo un error al mostrar el examen. Es posible que el numero no exista.');
        	$view->SetParam ( 'varController', 'CuentaCorriente' );
    	
    	$proveedores	=	Doctrine::getTable('Proveedor')->FindAllArray();
			$view->SetParam("ArrayProveedores", $proveedores);
		
    	$a	=	new Classes_Session();
		$a->Session();
		            
        if($a->GetUser()->Id)
        {
        	$usuario	= Doctrine::getTable('Usuario')->FindOneById($a->GetUser()->Id);
        	
        	if(is_object($usuario))
        	{
				//$request	=	$this->GetRequest ();
				//$params     =   $request->Params();
				
				//$p	=	$cliente->GetUltimasPrestaciones(5);
			//echo count($p);
			//var_dump($p);
				
				$tblp	= new IDS_Doctrine_Table( Doctrine::getTable('Proveedor') );
				$view->SetParam("Proveedores", $tblp->FindAll());
				
				$tblp	= new IDS_Doctrine_Table( Doctrine::getTable('Cliente') );
				$view->SetParam("Clientes", $tblp->FindAll());
		
				//$view->SetParam("Usuario", $usuario);
        	}
        	else
        	{
        		echo 'error, no se ha encontrado el objeto usuario';
        	}
			
        }
    
        	
        }
        
        public function ListProveedorAction() 
        {
            $this->SetHelper ( 'IDS_Controller_Action_Helper_List', 'List' );
            
            
            
            $layout = $this->View->LayoutView ();
            
            $layout->SetParam ( 'titleFile', 'Backend/CuentaCorriente/Title.tpl' );
            $layout->SetParam ( 'recordFile', 'Backend/CuentaCorriente/Record.tpl' );
            
            // debe ser el substring delante de Controller en el nombre de la clase
            $layout->SetParam ( 'varController', 'CuentaCorriente' );
            $layout->SetParam ( 'varAction', 'ListProveedor' );
            $layout->SetParam ( 'notAdd', TRUE );
            // busqueda avanzada
            $layout->SetParam ( 'filterBox', 'Backend/CuentaCorriente/FilterBox.tpl' );
            
            // ocultar site header y footer
            $layout->SetParam ( 'classHide', 'classHide' );
            /*
             obtener parametros de busqueda
            */
            $ProveedorId    = $this->GetRequest()->Param('ProveedorId');
            $ClienteId  =   $this->GetRequest()->Param('ClienteId');
            $CobranzaId  =   $this->GetRequest()->Param('CobranzaId');
            $FechaDesde  =   $this->GetRequest()->Param('FechaDesde');
            $FechaHasta  =   $this->GetRequest()->Param('FechaHasta');
            $FechaDesde	=	 str_replace("_", "/", $FechaDesde) ;
            $FechaHasta	=	 str_replace("_", "/", $FechaHasta) ;

            if(!isset($ProveedorId))
            	throw new Exception('Debe ingresar el proveedor');
            
            $return = array ();
            $filters	=	array();
            
            $filters['ClienteId']	=	$ClienteId;
            $filters['CobranzaId']	=	$CobranzaId;
            /*
             * sin uso porque afecta CuentaCorriente->GetSaldo proveedor
             * fecha hasta
             *
             *
            $filters['FechaDesde']	=	$FechaDesde;
            $filters['FechaHasta']	=	$FechaHasta;
            */
            $filters['ProveedorId']	=	$ProveedorId;
            
            
            $cc	=	new Classes_CuentaCorrienteManager($filters);
			
            /* array ordenado por fecha ASC con OC y OP */
			$CtaCte = $cc->GetByProveedor($filters); 
            $layout->SetParam ( 'sectionTitle', 'Cuenta corriente del proveedor '.$cc->GetProveedor()->Nombre );
            $layout->SetParam ( 'Proveedor', $cc->GetProveedor() );
            $list = array();
            $list['data'] = $CtaCte;
            $layout->SetParam ( 'list', $list );
            $layout->SetParam ( 'Saldo', $cc->GetSaldoProveedor($filters) );
            $layout->SetParam ( 'FechaDesdeCtaCte', $cc->GetFechaDesdeCuentaCorriente() );
            /*				
            $this->List->ProcessListQuery ( Doctrine::GetTable ( 'OrdenDeCompra' ),
                                        $qCtaCte,
                                        $this->GetRequest ()->Params (),
                                        $return,
                                        array ('updateColumn' => 'Status',
                                               'updateField' => 'selectId',
                                               'deleteField' => 'selectId',
                                               'searchField' => 'Nombre' ),
                                        $this->View->LayoutView () );
            */
                                        
            
        	if(is_numeric($ProveedorId))
            {
            	$layout->SetParam ( 'ProveedorId', $ProveedorId );
            }
            if(is_numeric($CobranzaId))
            	$layout->SetParam ( 'CobranzaId', $CobranzaId );
            if($FechaDesde != 'Fecha desde')
            	$layout->SetParam ( 'FechaDesde', str_replace("/", "_", $FechaDesde) ); //
            if($FechaHasta != 'Fecha hasta')
            	$layout->SetParam ( 'FechaHasta', str_replace("/", "_", $FechaHasta) ); //str_replace("_", "/", $FechaHastaSearch)
            
            
            
    }
        
    
        public function ListClienteAction() 
        {
            $this->SetHelper ( 'IDS_Controller_Action_Helper_List', 'List' );
            
            
            
            $layout = $this->View->LayoutView ();
            
            $layout->SetParam ( 'titleFile', 'Backend/CuentaCorriente/Title.tpl' );
            $layout->SetParam ( 'recordFile', 'Backend/CuentaCorriente/Record.tpl' );
            
            // debe ser el substring delante de Controller en el nombre de la clase
            $layout->SetParam ( 'varController', 'GestionAdministrativa' );
            $layout->SetParam ( 'varAction', 'Main' );
            $layout->SetParam ( 'notAdd', TRUE );
            // busqueda avanzada
            $layout->SetParam ( 'filterBox', 'Backend/CuentaCorriente/FilterBox.tpl' );
            
            // ocultar site header y footer
            $layout->SetParam ( 'classHide', 'classHide' );
            
            /*
             obtener parametros de busqueda
            */
            $ProveedorId    = $this->GetRequest()->Param('ProveedorId');
            $ClienteId  =   $this->GetRequest()->Param('ClienteId');
            $CobranzaId  =   $this->GetRequest()->Param('CobranzaId');
            $FechaDesde  =   $this->GetRequest()->Param('FechaDesde');
            $FechaHasta  =   $this->GetRequest()->Param('FechaHasta');
            $FechaDesde	=	 str_replace("_", "/", $FechaDesde) ;
            $FechaHasta	=	 str_replace("_", "/", $FechaHasta) ; 
            
            if(!isset($ClienteId))
            	throw new Exception('Debe ingresar el cliente');
            
            $return = array ();
            $filters	=	array();
            
            $filters['ClienteId']	=	$ClienteId;
            $filters['CobranzaId']	=	$CobranzaId;
            $filters['FechaDesde']	=	$FechaDesde;
            $filters['FechaHasta']	=	$FechaHasta;
            $filters['ProveedorId']	=	$ProveedorId;
            
            
            $cc	=	new Classes_CuentaCorrienteManager($filters);
			
            /* array ordenado por fecha ASC con OC y OP */
			$CtaCte = $cc->GetByCliente($filters); 
            $layout->SetParam ( 'sectionTitle', 'Cuenta corriente del cliente '.$cc->GetCliente()->Nombre );
            $layout->SetParam ( 'Cliente', $cc->GetCliente() );
            $list = array();
            $list['data'] = $CtaCte;
            $layout->SetParam ( 'list', $list );
            $layout->SetParam ( 'Saldo', $cc->GetSaldoCliente($filters) );
            $layout->SetParam ( 'FechaDesdeCtaCte', $cc->GetFechaDesdeCuentaCorriente() );

            if(is_numeric($ClienteId))
            {
            	$layout->SetParam ( 'ClienteId', $ClienteId );
            }
            if(is_numeric($CobranzaId))
            	$layout->SetParam ( 'CobranzaId', $CobranzaId );
            if($FechaDesde != 'Fecha desde')
            	$layout->SetParam ( 'FechaDesde', str_replace("/", "_", $FechaDesde) ); //
            if($FechaHasta != 'Fecha hasta')
            	$layout->SetParam ( 'FechaHasta', str_replace("/", "_", $FechaHasta) ); //str_replace("_", "/", $FechaHastaSearch)
            
            
            
    }
    
    public function ListBancoAction()
    {
    	$this->SetHelper ( 'IDS_Controller_Action_Helper_List', 'List' );
    
    	$layout = $this->View->LayoutView ();
    
    	$layout->SetParam ( 'titleFile', 'Backend/CuentaCorriente/Title.tpl' );
    	$layout->SetParam ( 'recordFile', 'Backend/CuentaCorriente/Record.tpl' );
    
    	// debe ser el substring delante de Controller en el nombre de la clase
    	$layout->SetParam ( 'varController', 'CuentaCorriente' );
    	$layout->SetParam ( 'varAction', 'Main' );
    	$layout->SetParam ( 'notAdd', TRUE );
    	// busqueda avanzada
    	$layout->SetParam ( 'filterBox', 'Backend/CuentaCorriente/FilterBox.tpl' );
    
    	// ocultar site header y footer
    	$layout->SetParam ( 'classHide', 'classHide' );
    	
    	$a	=	new Classes_Session();
    	$layout->SetParam("IsPerfilAdministrador", $a->GetUser()->IsPerfilAdministrador());
    	
    	try {
    		
    	
    	/*
    	 obtener parametros de busqueda
    	*/
    	$BancoId    = $this->GetRequest()->Param('BancoId');
    	$banco = Doctrine::GetTable ( 'Banco' )->FindOneById($BancoId);
    	if(!is_object($banco))
    		throw new Exception('El banco ingresado no existe');
    	
    	// verificar si deben realizarse acciones
    	$action    = $this->GetRequest()->Param('accion');
    	
    	if(isset($action) && $action == 'anular')
    	{
    		$itemid    = $this->GetRequest()->Param('id');
    		$banco->AnularItemCuentaCorriente($itemid);
    		$layout->SetParam ( 'updateSuccessMessage', 'Item de cuenta corriente anulado y saldos actualizados' );
    	}
    	
    
    	$return = array ();
    	$filters	=	array();
    
    	$filters['BancoId']	=	$BancoId;
    	$cc	=	new Classes_CuentaCorrienteManager($filters);

    	$CtaCte = $cc->GetByBanco($filters);
    	$layout->SetParam ( 'sectionTitle', 'Cuenta corriente del banco '.$cc->GetBanco($filters)->Nombre );
    	$layout->SetParam ( 'Banco', $cc->GetBanco($filters) );
    	$list = array();
    	$list['data'] = $CtaCte;
    	$layout->SetParam ( 'list', $list );
    	$layout->SetParam ( 'Saldo', $cc->GetSaldoBanco($filters) );
    	$layout->SetParam ( 'FechaDesdeCtaCte', $cc->GetFechaDesdeCuentaCorriente() );
    	
    	$data['BancoId']	=	$banco->Id;
    	$layout->SetParam ( 'ChequesPendientesAcreditar', 
    			count(Doctrine::getTable('Cheque')->ChequesPendientesAcreditar($data)) );
    	$layout->SetParam ( 'ChequesPendientesDebitar', 
    			count(Doctrine::getTable('Cheque')->ChequesPendientesDebitar($data)) );
    
    	if(is_numeric($BancoId))
    	{
    		$layout->SetParam ( 'BancoId', $BancoId );
    	}
    	
    	} catch (Exception $e) {
    		$layout->SetParam ( 'deleteSuccessMessage', $e->getMessage() );
    		
    	}
    }
    
    
    public function AgregarConceptoBancoAction()
    {
    	try {
    
    		$this->View->RenderLayout(false);
    		$request	=	$this->GetRequest();
    
    		$a	=	new Classes_Session();
    		$a->Session();
    
    		if($a->IsLoggedIn())
    		{
    			
    			$g	=	new Classes_CuentaCorrienteManager();
    			$c	=	new Classes_GestionEconomicaManager();
    			
    			$view       =   $this->View->View();
    			$data	=	$this->GetRequest ()->Param ( "data" );
    			$bancoid	=	$this->GetRequest ()->Param ( "BancoId" );
    			$view->SetParam("Conceptos", $c->GetConceptosBancarios());
    
    			if($request->IsPost())
    			{
    				
	    			$concepto = $g->AddConceptoBancoCuentaCorriente($data);
	    			
	    			if(isset($data['Detalle']) && ($data['Detalle'] == 'Extraccion para caja con cheque'))
	    			{
	    				$cheque = $concepto->ExtraccionParaCajaConCheque();
	    				if(is_object($cheque))
	    				{
	    					$detalle	=	'Extraccion bancaria para caja con cheque #'.$cheque->Numero;
	    					$view->SetParam("mensaje", $detalle);
	    				}
	    				
	    			}
	    			
	    			if(isset($data['Detalle']) && ($data['Detalle'] == 'Extraccion efectivo para Caja'))
	    			{
	    				$linea = $concepto->ExtraccionEfectivoParaCaja();
	    				if(is_object($linea))
	    				{
	    					$detalle	=	'Extraccion de $'. $linea->Debe.' en efectivo para Caja';
	    					$view->SetParam("mensaje", $detalle);
	    				}
	    			}
	    			
	    			if(isset($data['Detalle']) && ($data['Detalle'] == 'Deposito de efectivo desde Caja'))
	    			{
	    				$linea = $concepto->DepositoEfectivoDesdeCaja();
	    				if(is_object($linea))
	    				{
	    					$detalle	=	'Deposito de $'. $linea->Haber .' en efectivo desde Caja a banco';
	    					$view->SetParam("mensaje", $detalle);
	    				}
	    			}
	    			
	    			$view->SetParam("editSuccessMessage", 'Agregado correctamente');
    			}
    			
    			$view->SetParam("BancoId", $bancoid);
    		}
    
    	} catch (Exception $e) {
    		$view->SetParam("editErrorMessage", $e->getMessage());
    	}
    }
}
?>