<?php
    class Backend_Controllers_OrdenPagoController extends IDS_Controller_Action_Standard
    {
        public function init()
        {
            $this->SetHelper('IDS_Controller_Action_Helper_View', 'View');
        }
        
        public function ListAction() {
            $this->SetHelper ( 'IDS_Controller_Action_Helper_List', 'List' );
            
            $layout = $this->View->LayoutView ();
            
            $layout->SetParam ( 'titleFile', 'Backend/OrdenPago/Title.tpl' );
            $layout->SetParam ( 'recordFile', 'Backend/OrdenPago/Record.tpl' );
            $layout->SetParam ( 'sectionTitle', 'Pagos a proveedores' );
            // debe ser el substring delante de Controller en el nombre de la clase
            $layout->SetParam ( 'varController', 'OrdenPago' );
            $layout->SetParam ( 'varAction', 'List' );
            //$layout->SetParam ( 'notAdd', TRUE );
            // busqueda avanzada
            $layout->SetParam ( 'filterBox', 'Backend/OrdenPago/FilterBox.tpl' );
            
            $proveedores	=	Doctrine::getTable('Proveedor')->FindAllArray();
			$layout->SetParam("ArrayProveedores", $proveedores);
			            /*
             obtener parametros de busqueda
            */
            $ProveedorId  =   $this->GetRequest()->Param('ProveedorId');
            $OrdenDePagoId  =   $this->GetRequest()->Param('OrdenDePagoId');
            $FechaDesde  =   $this->GetRequest()->Param('FechaDesde');
            $FechaHasta  =   $this->GetRequest()->Param('FechaHasta');
            $FechaDesde	=	 str_replace("_", "/", $FechaDesde) ;
            $FechaHasta	=	 str_replace("_", "/", $FechaHasta) ; 
            $Tipo	=	$this->GetRequest()->Param("Tipo");
            
            $return = array ();
            $filters	=	array();
            
            $filters['ProveedorId']	=	$ProveedorId;
            $filters['OrdenDePagoId']	=	$OrdenDePagoId;
            $filters['FechaDesde']	=	$FechaDesde;
            $filters['FechaHasta']	=	$FechaHasta;
            $filters['Tipo']	=	$Tipo;
            
            $ordenesDePago	=	Doctrine::GetTable ( 'OrdenDePago' )->GetByFilter($filters);
            $layout->SetParam ( 'Cantidad', count($ordenesDePago) );
            $layout->SetParam ( 'Resumen', Doctrine::GetTable ( 'OrdenDePago' )->GetResumen($filters) );				
            $this->List->ProcessListQuery ( Doctrine::GetTable ( 'OrdenDePago' ),
                                        $ordenesDePago,
                                        $this->GetRequest ()->Params (),
                                        $return,
                                        array ('updateColumn' => 'Status',
                                               'updateField' => 'selectId',
                                               'deleteField' => 'selectId',
                                               'searchField' => 'Nombre' ),
                                        $this->View->LayoutView () );
            
            /* set params */
                                        
            if(is_numeric($ProveedorId))
            {
            	$layout->SetParam ( 'ProveedorId', $ProveedorId );
            }
            if(is_numeric($OrdenDePagoId))
            	$layout->SetParam ( 'OrdenDePagoId', $OrdenDePagoId );
            if($FechaDesde != 'Fecha desde')
            	$layout->SetParam ( 'FechaDesde', str_replace("/", "_", $FechaDesde) ); //
            if($FechaHasta != 'Fecha hasta')
            	$layout->SetParam ( 'FechaHasta', str_replace("/", "_", $FechaHasta) ); //str_replace("_", "/", $FechaHastaSearch)
            
            if($Tipo != '')
            	$layout->SetParam ( 'Tipo', $Tipo );
            //$layout->SetParam ( 'Pagado', $Pagado );
            
           	$tblp	= new IDS_Doctrine_Table( Doctrine::getTable('Proveedor') );
			$layout->SetParam("Proveedores", $tblp->FindAll());
            
            
    }
        
        
    public function EditAction() 
    {
    	
    	try 
    	{
    		$this->SetHelper ( 'IDS_Controller_Action_Helper_Edit', 'Edit' );
    		
    		
    		$view = $this->View->View ();
    		$request	=	$this->GetRequest();
    		
    		$return = array ();
    		/*********************************************/
    		// set view params
    		$OrdenDePagoId = $request->Param('id');
    		$data = $request->Param ( "data" );
    		
    		if(isset($data['Id']) and is_numeric($data['Id']))
    		{
    			$OrdenDePagoId = $data['Id'];
    		}
    		
    		
    		$proveedores	=	Doctrine::getTable('Proveedor')->FindAllArray();
    		$view->SetParam("ArrayProveedores", $proveedores);
    		
    		$tblp	= new IDS_Doctrine_Table( Doctrine::getTable('Proveedor') );
    		$view->SetParam("Proveedores", $tblp->FindAll());
    		
    		/******** si paso parametro ProveedorId, cargar FC pendientes por ajax *******/
    		$ProveedorId = $request->Param('ProveedorId');
    		if(isset($ProveedorId) and is_numeric($ProveedorId))
    		{
    			$Proveedor		= Doctrine::getTable('Proveedor')->FindOneById( $ProveedorId );
    				
    			if(!is_object($Proveedor))
    				throw new Exception('Proveedor no encontrado');
    			
    			$view->SetParam("Proveedor", $Proveedor);
    			
    			$filters	=	array();
    			$filters['ProveedorId']	=	$Proveedor->Id;
    			$cc	=	new Classes_CuentaCorrienteManager($filters);
    			$CtaCte = $cc->GetByProveedor($filters);
    			$view->SetParam ( 'Saldo', $cc->GetSaldoProveedor($filters) );
    		}
    		// si es POST y no esta creada la OP, crear OP
    		if( $request->IsPost() )
    		{	
    			if(isset($data['ProveedorId']) and is_numeric($data['ProveedorId']))
    			{
    				$Proveedor		= Doctrine::getTable('Proveedor')->FindOneById( $data['ProveedorId'] );
    			
    				if(!isset($Proveedor))
    					throw new Exception('Proveedor no encontrado');
    				 
    				$view->SetParam("Proveedor", $Proveedor);
    				
    				$filters	=	array();
    				$filters['ProveedorId']	=	$Proveedor->Id;
    				$cc	=	new Classes_CuentaCorrienteManager($filters);
    				$CtaCte = $cc->GetByProveedor($filters);
    				$view->SetParam ( 'Saldo', $cc->GetSaldoProveedor($filters) );
    			}
    		
    			if(!isset($OrdenDePagoId))
    			{
	    			$OrdenDePago	=	$Proveedor->CrearOrdenDePago($data);
	    			if(!isset($OrdenDePago))
	    				throw new Exception('La orden de pago no fue creada');
	    		
	    			$s = new Classes_Session();
	    			$s->LimpiarOrdenDePago();
	    			
	    			$view->SetParam("data", $OrdenDePago);
	    			$view->SetParam("FacturasDeCompraLiquidadas", $OrdenDePago->GetFacturasDeCompraLiquidadas());
	    			//$view->SetParam("Pagos", $OrdenDePago->GetDetalleDePago());
	    			$view->SetParam("editSuccessMessage", 'Orden de Pago creada correctamente.');
    			}
    		}
    		    		
    		// si existe la orden de pago (pase id por GET)
    		if(isset($OrdenDePagoId) and is_numeric($OrdenDePagoId))
    		{
    			$OrdenDePago		= Doctrine::getTable('OrdenDePago')->FindOneById( $OrdenDePagoId );
    		
    			if(!is_object($OrdenDePago))
    				throw new Exception('Orden de pago no encontrada');
    				
    			$view->SetParam("data", $OrdenDePago);
    			$view->SetParam("Proveedor", $OrdenDePago->Proveedor);
    			$view->SetParam("FacturasDeCompraLiquidadas", $OrdenDePago->GetFacturasDeCompraLiquidadas());
    			$view->SetParam("Pagos", $OrdenDePago->Pagos);
    			$view->SetParam("OrdenesDeCompraLiquidadas", $OrdenDePago->OrdenDePagoOrdenDeCompra);
    			$view->SetParam("TotalPago", $OrdenDePago->GetPagoTotal());
    			$view->SetParam ( "PagoTipos", Doctrine::GetTable ( "PagoTipo" )->FindAll () );
    		
    		}
    		
    	} catch (Exception $e) 
    	{
    		$view->SetParam("editErrorMessage", 'Error al guardar la Orden de pago. '.$e->getMessage());
    	}
		
	}
	
	/**
	 * ajax
	 */
    public function GetPagosAction()
    {
        $this->View->RenderLayout(false);
        	
        $view       =   $this->View->View();
            
        $a	=	new Classes_Session();
        $a->Session();
        
	        try
	        {
	        	if(!$a->IsLoggedIn())
	        		throw new Exception('Debe estar loggueado');
			    // si existe la orden de pago
				$OrdenDePagoId    = $this->GetRequest()->Param('OrdenDePagoId');
				
				$action    = $this->GetRequest()->Param('Accion');
				$data    = $this->GetRequest()->Param('data');
				
				$view->SetParam ( "PagoTipos", Doctrine::GetTable ( "PagoTipo" )->GetTiposOrdenDePago() );
				
				$g	=	new Classes_GestionEconomicaManager();
					
				$view->SetParam("Efectivo", $g->GetSaldoEfectivo());
				$view->SetParam("Bancos", $g->GetBancosPropios());
				
				
				$view->SetParam("Percepciones", $g->GetPercepcionesPendientes($data));
				
				// listar pagos en session
				$view->SetParam("Pagos", $a->GetPagosLiquidadosOrdenDePago());
				$view->SetParam("TotalPago", $a->GetTotalPagosLiquidadosOrdenDePago());
				
				if( $action == 'add' )
				{
					/* controlar parametros */
					if(is_numeric($data['ProveedorId']))
					{
						$Proveedor		= Doctrine::getTable('Proveedor')->FindOneById( $data['ProveedorId'] );
				
						if(is_object($Proveedor))
						{
							$Proveedor->AgregarPagoAOrdenDePago($data);
				
							$view->SetParam("Pagos", $a->GetPagosLiquidadosOrdenDePago());
							$view->SetParam("TotalPago", $a->GetTotalPagosLiquidadosOrdenDePago());
				
							$view->SetParam("successMessage", 'Pago agregado con exito');
						}
						else
						{
							throw new Exception('El proveedor no existe');
						}
					}
					else
						throw new Exception('Debe ingresar el numero de proveedor');
					//$view->SetParam("deleteErrorMessage", 'No se pudo agregar el pago. Verifique los datos ingresados');
							 
				}
				
				if( $action == 'list' )
				{
					/* si existe la orden de pago */
					if(is_numeric($OrdenDePagoId))
					{
						$op		= Doctrine::getTable('OrdenDePago')->FindOneById( $OrdenDePagoId );
					
						if(is_object($op))
						{
							$view->SetParam("Pagos", $op->GetDetalleDePago());
							$view->SetParam("TotalPago", $op->GetPagoTotal());
							$view->SetParam("ExisteOrdenDePago", true);
						}
						else
						{
							throw new Exception('El proveedor no existe');
						}
					}
					else
					{
						
						$view->SetParam("Pagos", $a->GetPagosLiquidadosOrdenDePago());
						$view->SetParam("TotalPago", $a->GetTotalPagosLiquidadosOrdenDePago());
					}
						
					
				}
			
				if($action == 'del')
				{
					// si es delete, eliminar pago del array de session
			        $a->EliminarPagoLiquidadoOrdenDePago($data['PagoId']);
			        
			        $view->SetParam("Pagos", $a->GetPagosLiquidadosOrdenDePago());
			        $view->SetParam("TotalPago", $a->GetTotalPagosLiquidadosOrdenDePago());
				}
				// pasa a cargar aca porque si agrego o elimino un cheque del detalle, no se refleja al cargar el primero
				$cheques		= Doctrine::getTable('Cheque')->ChequesTerceros($data);
				$view->SetParam("Cheques", $cheques->execute());
				
				$view->SetParam("Notas", $g->GetNotasCreditoDebitoPendientes($data));
				
				
				if($g->MostrarRetenciones($data))
					$view->SetParam("Retenciones", $g->GetRetencionesPendientes($data));
	        }
	        catch (Exception $e) {
	        	$view->SetParam("deleteErrorMessage", 'Error al obtener los pagos. '. $e->getMessage());
	        }
    }
	/*
	 * ajax
	 */
    
    public function GetLiquidacionAction()
    {
        $this->View->RenderLayout(false);
        	
        $view       =   $this->View->View();
            

        try
        {
	
		    // si se borra registro es PagoId
			$OrdenDePagoId    = $this->GetRequest()->Param('OrdenDePagoId');
			
			$action    = $this->GetRequest()->Param('Accion');
			$data    = $this->GetRequest()->Param('data');
		
		    $OrdenDePago		= Doctrine::getTable('OrdenDePago')->FindOneById( $OrdenDePagoId );
		    
		    
	    	/** 
	    	 * borrar o agregar un pago
	    	 */
            if( $action  == 'del' )
            {
            	$LiquidacionId	=	$OrdenDePagoId;
            	$LiquidacionTable	=	Doctrine::getTable('Liquidacion');
                if($LiquidacionTable->BorrarLiquidacion( $LiquidacionId ))
                {
                	$view->SetParam("successMessage", 'Liquidacion eliminada con exito');
                	
                }
                else
                {
                	$view->SetParam("deleteErrorMessage", 'No se puedo borrar la liquidacion');
                }
            }
            else {
                if( $action == 'add' )
                {
					// agregar liquidacion a una orden de pago
					
					
					if($OrdenDePago->AgregarLiquidacion($data))
						$view->SetParam("successMessage", 'Liquidacion agregada con exito');
					else
						$view->SetParam("deleteErrorMessage", 'No se pudo agregar la liquidacion. Verifique los datos ingresados');
                }
            }	
        

	        /* listar pagos de la orden */
            if(isset($OrdenDePago) and ($action  != 'del'))
		    {
	            $view->SetParam("Liquidaciones", $OrdenDePago->Liquidaciones);
	            
	        }
	        else
	        {
	        	// si es delete, orden de pago viene con data
	        	$OrdenDePago		= Doctrine::getTable('OrdenDePago')->FindOneById( $data['OrdenDePagoId'] );
	        	$view->SetParam("Liquidaciones", $OrdenDePago->Liquidaciones);
	        }	

	        $view->SetParam ( "TotalLiquidaciones",  $OrdenDePago->GetTotalLiquidaciones());
	        //$view->SetParam ( "PagoTipos", Doctrine::GetTable ( "PagoTipo" )->FindAll () );
            	
        }
        catch (Exception $e) {
        	$view->SetParam("deleteErrorMessage", 'Hubo un error al obtener los pagos de la orden de pago. '. $e->getMessage());
        }

    }
        
    public function ViewAction()
    {
        $this->View->RenderLayout(false);
        	
        $view       =   $this->View->View();
            

        try
        {
	
			$OrdenDePagoId    = $this->GetRequest()->Param('id');
		
		    $OrdenDePago		= Doctrine::getTable('OrdenDePago')->FindOneById( $OrdenDePagoId );
		    
			if(!$OrdenDePago)
				$view->SetParam("deleteErrorMessage", 'La orden de pago no existe');
	        
			$view->SetParam ( "Resumen", $OrdenDePago->GetResumen() );
            	
        }
        catch (Exception $e) {
        	
        	$view->SetParam("deleteErrorMessage", 'Error al obtener la orden de pago.' . $e->getMessage());
        }

    }
    
    /* 
     * cuando un pago es anticipo, se permite liquidar ordenes de compra
     * - mostrar condicion de pago
     * - mostrar si esta o no entregado
     */
    public function GetOrdenesDeCompraPendientesDePagoAction()
    {
        $this->View->RenderLayout(false);
        	
        $view       =   $this->View->View();
        //$this->View->SetViewTemplate('Backend/OrdenPago/OrdenesDeCompraPendientesDePago.tpl');

        try
        {
        	/* obtener parametros */
			$ProveedorId    = $this->GetRequest()->Param('ProveedorId');
			$Accion    = $this->GetRequest()->Param('Accion');
			$data    = $this->GetRequest()->Param('data');
		
			/* controlar parametros */
			if(is_numeric($ProveedorId))
			{
		        $Proveedor		= Doctrine::getTable('Proveedor')->FindOneById( $ProveedorId );
		        
				if(is_object($Proveedor))
			    {
	        		$view->SetParam("OrdenesDeCompraPendientes", $Proveedor->GetOrdenesDeCompraPendientesDePago($data));
			    }
			    else
			    {
			    	throw new Exception('Error la orden de pago no existe');
			    }
			}
			else
            	throw new Exception('Los parametros ingresados no son numericos');
        }
        catch (Exception $e) {
        	$view->SetParam("deleteErrorMessage", 'Error al obtener las ordenes de compra asociadas.'. $e->getMessage());
        }

    }
    
    
    public function GetFacturasDeCompraPendientesAction()
    {
    	$this->View->RenderLayout(false);
    		
    	$view       =   $this->View->View();
    	$this->View->SetViewTemplate('Backend/OrdenPago/FacturasDeCompraPendientes.tpl');
    
    	try
    	{
    		//$c = new Classes_Session();
    		//if($c->IsLoggedIn())
    		//{
    		/* obtener parametros */
    		$ProveedorId    = $this->GetRequest()->Param('ProveedorId');
    		$data    = $this->GetRequest()->Param('data');
    
    		/* controlar parametros */
    		if(is_numeric($ProveedorId))
    		{
    			$Proveedor		= Doctrine::getTable('Proveedor')->FindOneById( $ProveedorId );
    
    			if(is_object($Proveedor))
    			{
    				$view->SetParam("Pendientes", $Proveedor->GetFacturasDeCompraPendientes($data));
    				//$view->SetParam("successMessage", 'Seleccionar facturas de compra para liquidar');
    			}
    			else
    			{
    				throw new Exception('El proveedor no existe');
    			}
    		}
    		else
    			throw new Exception('Los parametros ingresados no son numericos');
    		//}
    	}
    	catch (Exception $e) {
    		$view->SetParam("deleteErrorMessage", 'Hubo un error al obtener las facturas de compra. '. $e->getMessage());
    	}
    
    }
    
    public function LiquidarFacturaCompraAction()
    {
    	$this->View->RenderLayout(false);
    		
    	$view       =   $this->View->View();
    
    	try
    	{
    		/* obtener parametros */
    		$data    = $this->GetRequest()->Param('data');
    
    		/* controlar parametros */
    		if(is_numeric($data['ProveedorId']))
    		{
    			$Proveedor		= Doctrine::getTable('Proveedor')->FindOneById( $data['ProveedorId'] );
    
    			if(is_object($Proveedor))
    			{
    				$Proveedor->AgregarFacturaCompraAOrdenDePago($data);
    				
    				//$q = Doctrine_Manager::getInstance()->getCurrentConnection();
					//$result = $q->execute("select 1111 from orden_de_pago limit 1");
					//echo $result;
					
    				$view->SetParam("successMessage", true);
    			}
    			else
    			{
    				throw new Exception('El proveedor no existe');
    			}
    		}
    		else
    			throw new Exception('Debe ingresar el numero de proveedor');
    	}
    	catch (Exception $e) {
    		$view->SetParam("deleteErrorMessage", 'Error al agregar la orden de compra. '. $e->getMessage());
    	}
    
    }
    
    public function AnularAction()
    {
    	try
    	{
    		$this->View->RenderLayout(false);
    
    		//		$a	=	new Classes_Session();
    		//		$a->Session();
    
    		//	        if($a->IsLoggedIn())
    		//        {
    		$request    =   $this->GetRequest();
    		$params     =   $request->Params();
    		$view       =   $this->View->View();
    
    		$OrdenDePagoId	=	$request->Param("OrdenDePagoId");
    			
    		if(isset($OrdenDePagoId) and is_numeric($OrdenDePagoId))
    		{
    			$OrdenDePago	=	Doctrine::getTable('OrdenDePago')->FindOneById($OrdenDePagoId);
    			if(!is_object($OrdenDePago))
    			{
    				throw new Exception('La orden de pago no existe');
    			}
    		}
    		
    		$OrdenDePago->Anular();
    			
    		$view->SetParam("SuccessMessage",
    				'Orden de pago '.$OrdenDePago->Id.' anulado');
    	}
    	catch (Exception $e)
    	{
    		$view->SetParam("ErrorMessage",
    				'Error al anular la orden de pago. Es posible que el numero de OP '. $OrdenDePago->Id . ' no exista. Verifique en listado de OP. ' . $e->getMessage());
    
    	}
    
    }
    
    public function GetImporteTotalLiquidadoAction()
    {
    	try
    	{
    		$this->View->RenderLayout(false);
    
    		$a	=	new Classes_Session();
    		$a->Session();
    
    		if($a->IsLoggedIn())
    		{
    			$request    =   $this->GetRequest();
    			$params     =   $request->Params();
    			$view       =   $this->View->View();
    				
    			//$view->SetParam("Importe", number_format($a->GetImporteLiquidadoFacturaCompra(),2));
    			$view->SetParam("Importe", $a->GetImporteLiquidadoOrdenDePago());
    		}
    		else
    		{
    			$view->SetParam("Importe", 'Debe ingresar al sistema');
    		}
    	}
    	catch (Exception $e)
    	{
    		$view->SetParam("Importe",
    				'Error al obtener importe.' . $e->getMessage());
    
    	}
    
    }
    
    public function AgregarOrdenDeCompraAction()
    {
    	$this->View->RenderLayout(false);
    		
    	$view       =   $this->View->View();
    
    	try
    	{
    		/* obtener parametros */
    		$data    = $this->GetRequest()->Param('data');
    
    		/* controlar parametros */
    		if(is_numeric($data['OrdenDeCompraId']))
    		{
    			$OrdenDeCompra		= Doctrine::getTable('OrdenDeCompra')->FindOneById( $data['OrdenDeCompraId'] );
    
    			if(is_object($OrdenDeCompra))
    			{
    				$OrdenDeCompra->AgregarOrdenDeCompraAOrdenDePago($data);
    					
    				$view->SetParam("successMessage", true);
    			}
    			else
    			{
    				throw new Exception('La orden de compra no existe');
    			}
    		}
    		else
    			throw new Exception('Debe ingresar el numero de orden de compra');
    	}
    	catch (Exception $e) {
    		$view->SetParam("deleteErrorMessage", 'Error al agregar la orden de compra. '. $e->getMessage());
    	}
    
    }
    
    public function GetChequesTercerosAction()
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
    
    public function GetRetencionesAction()
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
    
    			$g	=	new Classes_GestionEconomicaManager();
    
    			$view->SetParam("Retenciones", $g->GetRetencionesPendientes($data));
    
    		}
    
    	} catch (Exception $e) {
    		$view->SetParam("editErrorMessage", $e->getMessage());
    	}
    }
    
    public function GetPercepcionesAction()
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
    
    			$g	=	new Classes_GestionEconomicaManager();
    
    			$view->SetParam("Percepciones", $g->GetPercepcionesPendientes($data));
    
    		}
    
    	} catch (Exception $e) {
    		$view->SetParam("editErrorMessage", $e->getMessage());
    	}
    }
    
    public function GetNotasAction()
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
    
    			$g	=	new Classes_GestionEconomicaManager();
    
    			$view->SetParam("Notas", $g->GetNotasCreditoDebitoPendientes($data));
    
    		}
    
    	} catch (Exception $e) {
    		$view->SetParam("editErrorMessage", $e->getMessage());
    	}
    }
    
}
?>