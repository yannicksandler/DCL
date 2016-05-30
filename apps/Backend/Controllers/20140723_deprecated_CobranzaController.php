<?php
    class Backend_Controllers_CobranzaController extends IDS_Controller_Action_Standard
    {
        public function init()
        {
            $this->SetHelper('IDS_Controller_Action_Helper_View', 'View');
        }
        
        public function ListAction() {
            $this->SetHelper ( 'IDS_Controller_Action_Helper_List', 'List' );
            
            $layout = $this->View->LayoutView ();
            
            $layout->SetParam ( 'titleFile', 'Backend/Cobranza/Title.tpl' );
            $layout->SetParam ( 'recordFile', 'Backend/Cobranza/Record.tpl' );
            $layout->SetParam ( 'sectionTitle', 'Cobranzas a clientes' );
            // debe ser el substring delante de Controller en el nombre de la clase
            $layout->SetParam ( 'varController', 'Cobranza' );
            $layout->SetParam ( 'varAction', 'List' );
            $layout->SetParam ( 'notAdd', TRUE );
            // busqueda avanzada
            $layout->SetParam ( 'filterBox', 'Backend/Cobranza/FilterBox.tpl' );
            
            
            /*
             obtener parametros de busqueda
            */
            $ClienteId  =   $this->GetRequest()->Param('ClienteId');
            $CobranzaId  =   $this->GetRequest()->Param('CobranzaId');
            $Numero  =   $this->GetRequest()->Param('Numero');
            $FechaDesde  =   $this->GetRequest()->Param('FechaDesde');
            $FechaHasta  =   $this->GetRequest()->Param('FechaHasta');
            $FechaDesde	=	 str_replace("_", "/", $FechaDesde) ;
            $FechaHasta	=	 str_replace("_", "/", $FechaHasta) ; 
            
            $return = array ();
            $filters	=	array();
            
            $filters['ClienteId']	=	$ClienteId;
            $filters['CobranzaId']	=	$CobranzaId;
            $filters['Numero']	=	$Numero;
            $filters['FechaDesde']	=	$FechaDesde;
            $filters['FechaHasta']	=	$FechaHasta;
            
            $cobranzas	=	Doctrine::GetTable ( 'Cobranza' )->GetByFilter($filters);
            
            $layout->SetParam ( 'Cantidad', count($cobranzas) );
            $layout->SetParam ( 'Resumen', Doctrine::GetTable ( 'Cobranza' )->GetResumen($filters) );
            				
            $this->List->ProcessListQuery ( Doctrine::GetTable ( 'Cobranza' ),
                                        $cobranzas,
                                        $this->GetRequest ()->Params (),
                                        $return,
                                        array ('updateColumn' => 'Status',
                                               'updateField' => 'selectId',
                                               'deleteField' => 'selectId',
                                               'searchField' => 'Nombre' ),
                                        $this->View->LayoutView () );
            
            /* set params */
                                        
            if(is_numeric($ClienteId))
            {
            	$layout->SetParam ( 'ClienteId', $ClienteId );
            }
            if(is_numeric($CobranzaId))
            	$layout->SetParam ( 'CobranzaId', $CobranzaId );
            if(is_numeric($Numero))
            	$layout->SetParam ( 'CobranzaNumero', $Numero );
            if($FechaDesde != 'Fecha desde')
            	$layout->SetParam ( 'FechaDesde', str_replace("/", "_", $FechaDesde) ); //
            if($FechaHasta != 'Fecha hasta')
            	$layout->SetParam ( 'FechaHasta', str_replace("/", "_", $FechaHasta) ); //str_replace("_", "/", $FechaHastaSearch)
            //$layout->SetParam ( 'Pagado', $Pagado );
            
           	$tblp	= new IDS_Doctrine_Table( Doctrine::getTable('Cliente') );
			$layout->SetParam("Clientes", $tblp->FindAll());
            
            
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
    		$CobranzaId = $request->Param('id');
    		$data = $request->Param ( "data" );
    	
    		if(isset($data['Id']) and is_numeric($data['Id']))
    		{
    			$CobranzaId = $data['Id'];
    		}
    	
    	
    		$clientes	=	Doctrine::getTable('Cliente')->FindAllArray();
    		$view->SetParam("ArrayClientes", $clientes);
    	
    		$tblp	= new IDS_Doctrine_Table( Doctrine::getTable('Cliente') );
    		$view->SetParam("Clientes", $tblp->FindAll());
    	
    		/******** si paso parametro ClienteId, cargar FC pendientes por ajax *******/
    		$ClienteId = $request->Param('ClienteId');
    		if(isset($ClienteId) and is_numeric($ClienteId))
    		{
    			$Cliente		= Doctrine::getTable('Cliente')->FindOneById( $ClienteId );
    	
    			if(!is_object($Cliente))
    				throw new Exception('Cliente no encontrado');
    			 
    			$view->SetParam("Cliente", $Cliente);
    			
    			$filters	=	array();
    			$filters['ClienteId']	=	$Cliente->Id;
    			$cc	=	new Classes_CuentaCorrienteManager($filters);
    			$view->SetParam ( 'Saldo', $cc->GetSaldoCliente($filters) );
    		}
    		// si es POST y no esta creada la CB, crear CB
    		if( $request->IsPost() )
    		{
    			if(isset($data['ClienteId']) and is_numeric($data['ClienteId']))
    			{
    				$Cliente		= Doctrine::getTable('Cliente')->FindOneById( $data['ClienteId'] );
    				 
    				if(!isset($Cliente))
    					throw new Exception('Cliente no encontrado');
    					
    				$view->SetParam("Cliente", $Cliente);
    				
    				$filters	=	array();
    				$filters['ClienteId']	=	$Cliente->Id;
    				$cc	=	new Classes_CuentaCorrienteManager($filters);
    				$view->SetParam ( 'Saldo', $cc->GetSaldoCliente($filters) );
    			}
    	
    			if(!isset($CobranzaId))
    			{
    				$Cobranza	=	$Cliente->CrearCobranza($data);
    				if(!isset($Cobranza))
    					throw new Exception('La cobranza no fue creada');
    		   
    				$s = new Classes_Session();
    				$s->LimpiarCobranza();
    	
    				$view->SetParam("data", $Cobranza);
    				$view->SetParam("FacturasLiquidadas", $Cobranza->GetFacturasLiquidadas());
    				$view->SetParam("Pagos", $Cobranza->GetDetalleDePago());
    				$view->SetParam("TotalPago", $Cobranza->GetImportePagado());
    				$view->SetParam("ExisteCobranza", true);
    				$view->SetParam("editSuccessMessage", 'Cobranza creada correctamente.');
    			}
    		}
    	
    		// si existe la cobranza (pase id por GET)
    		if(isset($CobranzaId) and is_numeric($CobranzaId))
    		{
    			$Cobranza		= Doctrine::getTable('Cobranza')->FindOneById( $CobranzaId );
    	
    			if(!is_object($Cobranza))
    				throw new Exception('Cobranza no encontrada');
    	
    			$view->SetParam("data", $Cobranza);
    			$view->SetParam("Cliente", $Cobranza->Cliente);
    			$view->SetParam("FacturasLiquidadas", $Cobranza->GetFacturasLiquidadas());
    			$view->SetParam("Pagos", $Cobranza->GetDetalleDePago());
    			$view->SetParam("TotalPago", $Cobranza->GetImportePagado());
    			$view->SetParam ( "PagoTipos", Doctrine::GetTable ( "PagoTipo" )->FindAll () );
    			
    			$filters	=	array();
    			$filters['ClienteId']	=	$Cobranza->ClienteId;
    			$cc	=	new Classes_CuentaCorrienteManager($filters);
    			$view->SetParam ( 'Saldo', $cc->GetSaldoCliente($filters) );
    	
    		}
    	
    	} catch (Exception $e)
    	{
    		$view->SetParam("editErrorMessage", 'Error al guardar la Cobranza. '.$e->getMessage());
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
				$CobranzaId    = $this->GetRequest()->Param('CobranzaId');
				
				$action    = $this->GetRequest()->Param('Accion');
				$data    = $this->GetRequest()->Param('data');
				$view->SetParam("Pagos", $a->GetPagosLiquidadosCobranza());
				$view->SetParam("TotalPago", $a->GetTotalPagosLiquidadosCobranza());
				
				$g	=	new Classes_GestionEconomicaManager();
				$view->SetParam("Bancos", $g->GetBancosPropios());
				
				$view->SetParam("NotasCredito", $g->GetNotasCreditoPendientes($data));
				
				$view->SetParam ( "PagoTipos", Doctrine::GetTable ( "PagoTipo" )->GetTiposCobranza() );
				
				if( $action == 'add' )
				{
					/* controlar parametros */
					if(is_numeric($data['ClienteId']))
					{
						$Cliente		= Doctrine::getTable('Cliente')->FindOneById( $data['ClienteId'] );
				
						if(is_object($Cliente))
						{
							$Cliente->AgregarPagoACobranza($data);
				
							$view->SetParam("Pagos", $a->GetPagosLiquidadosCobranza());
							$view->SetParam("TotalPago", $a->GetTotalPagosLiquidadosCobranza());
				
							$view->SetParam("successMessage", 'Pago agregado con exito');
						}
						else
						{
							throw new Exception('El Cliente no existe');
						}
					}
					else
						throw new Exception('Debe ingresar el numero de Cliente');
					//$view->SetParam("deleteErrorMessage", 'No se pudo agregar el pago. Verifique los datos ingresados');
							 
				}
				
				if( $action == 'list' )
				{
					/* si existe la orden de pago */
					if(is_numeric($CobranzaId))
					{
						$c		= Doctrine::getTable('Cobranza')->FindOneById( $CobranzaId );
					
						if(is_object($c))
						{
							$view->SetParam("Pagos", $c->GetDetalleDePago());
							$view->SetParam("TotalPago", $c->GetImportePagado());
							$view->SetParam("ExisteCobranza", true);
						}
						else
						{
							throw new Exception('El Cliente no existe');
						}
					}
					else
					{
						
						$view->SetParam("Pagos", $a->GetPagosLiquidadosCobranza());
						$view->SetParam("TotalPago", $a->GetTotalPagosLiquidadosCobranza());
					}
						
					
				}
			
				if($action == 'del')
				{
					// si es delete, eliminar pago del array de session
			        $a->EliminarPagoLiquidadoCobranza($data['PagoId']);
			        
			        $view->SetParam("Pagos", $a->GetPagosLiquidadosCobranza());
			        $view->SetParam("TotalPago", $a->GetTotalPagosLiquidadosCobranza());
				}

	            	
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
			$CobranzaId    = $this->GetRequest()->Param('CobranzaId');
			
			$action    = $this->GetRequest()->Param('Accion');
			$data    = $this->GetRequest()->Param('data');
		
		    $Cobranza		= Doctrine::getTable('Cobranza')->FindOneById( $CobranzaId );
		    
		    if(is_object($Cobranza))
		    {
	    	/** 
	    	 * borrar o agregar un pago
	    	 */
            if( $action  == 'del' )
            {
            	$LiquidacionId	=	$data['CobranzaId'];
                if($Cobranza->BorrarLiquidacion( $LiquidacionId ))
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
					// agregar liquidacion a una cobranza
					if($Cobranza->AgregarLiquidacion($data))
						$view->SetParam("successMessage", 'Liquidacion agregada con exito');
					else
						$view->SetParam("deleteErrorMessage", 'No se pudo agregar la liquidacion. Verifique los datos ingresados');
                }
            }	
        

	        /* listar pagos de la cobranza */
            $Cobranza->refresh();
            $view->SetParam("Liquidaciones", $Cobranza->GetLiquidaciones());
			$view->SetParam ( "TotalLiquidaciones",  $Cobranza->GetTotalLiquidacion());
			
		    }
        }
        catch (Exception $e) {
        	$view->SetParam("deleteErrorMessage", 'Hubo un error al obtener la cobranzas. Intente nuevamente'. $e->getMessage());
        }

    }
    
    public function ViewAction()
    {
        $this->View->RenderLayout(false);
        	
        $view       =   $this->View->View();
            

        try
        {
	
		    // si se borra registro es PagoId
			$CobranzaId    = $this->GetRequest()->Param('id');
		
		    $Cobranza		= Doctrine::getTable('Cobranza')->FindOneById( $CobranzaId );
		    
			if(!$Cobranza)
				$view->SetParam("deleteErrorMessage", 'Hubo un error al obtener la cobranza');
	        
			$view->SetParam ( "Resumen", $Cobranza->GetResumen() );
            	
        }
        catch (Exception $e) {
        	
        	$view->SetParam("deleteErrorMessage", 'Hubo un error al obtener la orden de pago.' . $e->getMessage());
        }

    }
    
    public function GetFacturasPendientesDeCobroAction()
    {
    	$this->View->RenderLayout(false);
    
    	$view       =   $this->View->View();
    	$this->View->SetViewTemplate('Backend/Cobranza/FacturasPendientesDeCobro.tpl');
    
    	try
    	{
    		//$c = new Classes_Session();
    		//if($c->IsLoggedIn())
    		//{
    		/* obtener parametros */
    		$ClienteId    = $this->GetRequest()->Param('ClienteId');
    		$TipoCobranza    = $this->GetRequest()->Param('TipoCobranza');
    
    		/* controlar parametros */
    		if(is_numeric($ClienteId))
    		{
    			$Cliente		= Doctrine::getTable('Cliente')->FindOneById( $ClienteId );
    
    			if(is_object($Cliente))
    			{
    				$view->SetParam("Pendientes", $Cliente->GetFacturasPendientesDeCobro($TipoCobranza));
    				//$view->SetParam("successMessage", 'Seleccionar facturas de compra para liquidar');
    			}
    			else
    			{
    				throw new Exception('El Cliente no existe');
    			}
    		}
    		else
    			throw new Exception('Los parametros ingresados no son numericos');
    		//}
    	}
    	catch (Exception $e) {
    		$view->SetParam("deleteErrorMessage", 'Hubo un error al obtener las facturas. '. $e->getMessage());
    	}
    
    }
    
    public function LiquidarFacturaAction()
    {
    	$this->View->RenderLayout(false);
    
    	$view       =   $this->View->View();
    
    	try
    	{
    		/* obtener parametros */
    		$data    = $this->GetRequest()->Param('data');
    
    		/* controlar parametros */
    		if(is_numeric($data['ClienteId']))
    		{
    			$Cliente		= Doctrine::getTable('Cliente')->FindOneById( $data['ClienteId'] );
    
    			if(is_object($Cliente))
    			{
    				$Cliente->AgregarFacturaACobranza($data);
    
    				$view->SetParam("successMessage", true);
    			}
    			else
    			{
    				throw new Exception('El Cliente no existe');
    			}
    		}
    		else
    			throw new Exception('Debe ingresar el numero de Cliente');
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
    
    		$CobranzaId	=	$request->Param("CobranzaId");
    		 
    		if(isset($CobranzaId) and is_numeric($CobranzaId))
    		{
    			$Cobranza	=	Doctrine::getTable('Cobranza')->FindOneById($CobranzaId);
    			if(!is_object($Cobranza))
    			{
    				throw new Exception('La orden de pago no existe');
    			}
    		}
    
    		$Cobranza->Anular();
    		 
    		$view->SetParam("SuccessMessage",
    				'Cobranza '.$Cobranza->Numero.' anulada');
    	}
    	catch (Exception $e)
    	{
    		$view->SetParam("ErrorMessage",
    				'Error al anular la cobranza. Es posible que el numero '. $Cobranza->Id . ' no exista.'. $e->getMessage());
    
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
    			$view->SetParam("Importe", $a->GetImporteLiquidadoCobranza());
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
   
}
?>