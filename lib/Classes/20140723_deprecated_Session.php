<?php
    class Classes_Session
    {   
    	private	$_session;// refactor: PONER LA SESION ACA~ y getSession
    	private $paginaInicio;
    	/* fecha desde es usada para filtrar las entidades del negocio
    	 * >>impacta en contabilidad
    	 * -ordenes de trabajo
    	 * -ordenes de compra
    	 * -ordenes de pago
    	 * -facturas
    	 * -recibo de pago
    	 * -cuentas corriente
    	 * 
    	 */
    	private $FechaDesde;
    	
        public function __construct()
        {
                //session_start();
              $this->Session();
        
			  header("Expires: Tue, 01 Jul 2001 06:00:00 GMT");
			  header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
			  header("Cache-Control: no-store, no-cache, must-revalidate");
			  header("Cache-Control: post-check=0, pre-check=0", false);
			  header("Pragma: no-cache");
			  
			  $this->SetFechaDesde();
			  
        }     
        
        public function Session()
        {
        	//ini_set('session.cache_expire', 3600); 
        	session_cache_limiter ('nocache');
        	
        	//if(! isset( $_SESSION["UserId"]))
        	if(!isset( $_SESSION))
        		session_start();
        		
        	//echo session_cache_expire();
        }
        
        public function GetUser()
        {
        	if($this->IsLoggedIn() and isset($_SESSION["UserId"]))
        	{
        		return Doctrine::getTable('Usuario')->FindOneById($_SESSION["UserId"]);
        	}
        	else
        		$this->Logout();
        		//throw new Exception('El usuario no esta guardado en la sesion o no ha iniciado la sesion');
        }
        
        public function SetUserId($UserId)
        {
        	if($this->IsLoggedIn())
        	{
        		$_SESSION["UserId"] = $UserId;

        		
	            $a	=	new Classes_Trazabilidad();
	            $a->AddLog('LoggedIn');
        	}
        	else
        		$this->Logout();	
        }
        
        public function IsLoggedIn()
        {        	
        	
            if (isset($_SESSION["IsLoggedIn"]) and ($_SESSION["IsLoggedIn"] == true))
            {
            	//si esta loguin, calculamos el tiempo transcurrido
			    $fechaGuardada = $_SESSION["UltimoAcceso"];
			    $ahora = date("Y-n-j H:i:s");
			    $tiempo_transcurrido = (strtotime($ahora)-strtotime($fechaGuardada));
			
			    //comparamos el tiempo transcurrido
			    if($tiempo_transcurrido >= 4800)
			    {
			     //si pasaron 80 minutos o más
			      return false;
			      //sino, actualizo la fecha de la sesión
			    }
			    else 
			    {
			    	$_SESSION["UltimoAcceso"] = $ahora;
			    } 
            	
            	return true;
            }
            
            return false;
        }
        
        public function SetLoggedIn()
        {
        	session_start();
        	
            $_SESSION["IsLoggedIn"] = true;
            $_SESSION["UltimoAcceso"] = date("Y-n-j H:i:s");
            
        }
        
        public function Logout()
        {
        	$traza	=	new Classes_Trazabilidad();
            $traza->AddLog('LoggedOut');
            
            session_start();
            
            //session_unset($_SESSION["IsLoggedIn"]);
            //session_unset($_SESSION["UserId"]);
            session_unset();
            
            
			session_destroy();
			
        }

    
        public function HasAccess($uri)
        {
 			if(isset($uri))
 			{
 				$url	=	array();
 				
 				$url	=	explode("/", $uri);
 				
 				// /controller/action
 				//$acceso	=	'/'.$url[1].'/'.$url[2];
 				
 				// controlar acceso por controlador, menos fino
 				$controller	=	$url[1];
 				
 				$accionesDePerfil	=	$this->GetUser()->UsuarioPerfil->UsuarioPerfilControllerActions;
 				
 				foreach($accionesDePerfil as $accion)
 				{
 					
 					if($accion->ControllerAction->ControllerAction	== $controller)
 					{ 						
 						
 						// si user es cliente verificar que sea ese cliente!!!!
 						// si esta en ACL
 						return true;
 					}	
 				}
 				
 				
 				// sin acceso
 				return false;
 			}

 			
 			return false;
        }
        
        /* cambia la pagina de inicio dependiendo 
         * el perfil, deberia hacer refactor, poco claro
         * -definir en archivo de configuracion cada pagina (configurabilidad)
         */
        public function RedirigirPaginaInicio()
        {
        	
			$factory	= IDS_Factory_Manager::GetFactory();
			$config		= $factory->GetConfig();
			$DefaultPage	=	$config->Get('user.administrativo.paginainicio');
			
        	$u = $this->GetUser();
        	if(is_object($u))
        		header("Location: ". $u->UsuarioPerfil->UrlInicio);
        	else
        		header("Location: ". $DefaultPage);        	
        }
        
        public function GoBack()
        {
        	$url = htmlspecialchars($_SERVER['HTTP_REFERER']);
  			//echo "<a href='$url'>back</a>";
  			header("Location: ". $url);
        }
        
        /**
         * agregar fecha desde donde contar OT's
         */
    	public function SetFechaDesde()
		{
			/*
	    	 * agregar fecha desde donde contar importes 
	    	 */
	                
	    	$factory	= IDS_Factory_Manager::GetFactory();
			$config		= $factory->GetConfig();
			
			$Default	=	$config->Get('bussiness.fecha_desde_cuenta_corriente');
			
			if(isset($Default) and is_numeric($Default))
			{
				$this->FechaDesde = $Default;
			}
			else
			{
				$this->FechaDesde = '2011-10-01';
			}
		}
		
    	public function GetFechaDesde()
		{
			return $this->FechaDesde;
		}
		
		/****************************** BEGIN: Liquidacion de orden de compra *****************/
		
		/* utlizado para agregar ordenes de compra a factura de compra */
		public function AgregarOrdenDeCompraLiquidacionFacturaCompra($data)
		{
			$this->Session();
			
			$oc	=	$data['OrdenDeCompraId'];
			
			$array = array('OrdenDeCompraId' => $data['OrdenDeCompraId'],
							'Compensatoria' => $data['Compensatoria'],
							'ImporteLiquidado' => $data['ImporteLiquidado']);
			
			$_SESSION['OrdenesDeCompraArray'][$oc] = $array;
			

			//var_dump($_SESSION['OrdenesDeCompraArray']);
		}
		
		public function LimpiarOrdenDeCompraLiquidacionFacturaCompra()
		{
			$this->Session();
			
			$_SESSION["OrdenesDeCompraArray"] = array();
			
		}
		
		public function GetOrdenesDeCompraLiquidadas()
		{
			$this->Session();
			if(isset($_SESSION["OrdenesDeCompraArray"]))
				return $_SESSION["OrdenesDeCompraArray"];
			
			return array();
		}
		
		/****************************** END: Liquidacion de factura de compra *****************/
		public function EsPerfil($NombrePerfil)
		{
			if($this->GetNombrePerfil() == $NombrePerfil)
				return true;
			
			return false;
		}
		
		public function GetNombrePerfil()
		{
			return $this->GetUser()->GetNombrePerfil();
		}
		
		
		/****************************** BEGIN: Liquidacion de orden de pago *****************/
		
		public function GetImporteLiquidadoFacturaCompra()
		{
			$ordenesDeCompraLiquidadas = $this->GetOrdenesDeCompraLiquidadas();
			
			$total = 0;
			foreach ($ordenesDeCompraLiquidadas  as $ol)
			{
				$total = $total + $ol['ImporteLiquidado'];
			}
				
			//return number_format($total,2,',','.');
			return $total;
		}
		
		public function GetImporteLiquidadoOrdenDePago()
		{
			$FacturasDeCompraLiquidadas = $this->GetFacturasDeCompraLiquidadas();
			$OrdenesDeCompraLiquidadas	=	$this->GetOrdenesDeCompraLiquidadas();
			
			$total = 0;
			foreach ($FacturasDeCompraLiquidadas  as $f)
			{
				$total = $total + $f['ImporteLiquidado'];
			}
			
			foreach ($OrdenesDeCompraLiquidadas  as $oc)
			{
				$total = $total + $oc['ImporteLiquidado'];
			}
				
			return $total;
		}
		
		public function GetFacturasDeCompraLiquidadas()
		{
			$this->Session();
			if(isset($_SESSION["FacturasDeCompraArray"]))
				return $_SESSION["FacturasDeCompraArray"];
			
			return array();
		}
		
		public function AgregarFacturaCompraLiquidacionOrdenDePago($data)
		{
			//session_start();
			$this->Session();
				
			$oc	=	$data['FacturaNumero'];
			
			$array = array(		'FacturaNumero' => $data['FacturaNumero'], 
								'ImporteLiquidado' => $data['ImporteLiquidado'],
								'TipoIvaId' => $data['TipoIvaId']
					);
			
			$_SESSION['FacturasDeCompraArray'][$oc] = $array;
				
			
			//var_dump($_SESSION['OrdenesDeCompraArray']);			
		}
		
		
		public function LimpiarFacturasDeCompraLiquidacionOrdenDePago()
		{
			$this->Session();
			$_SESSION["FacturasDeCompraArray"] = array();
		}
		/****************************** END: Liquidacion de orden de pago *****************/
		
		/***************************** init Detalle de pagos de una orden de pago ************/
		public function AgregarPagoAOrdenDePago($data)
		{
			$this->Session();
			
			// validaciones
			if($data['FechaCheque'] == 'Fecha cheque')
				$data['FechaCheque'] = null;
			
			$PosicionId	=	count($_SESSION['PagosArray']);
			
			if(isset($data['ChequeId']) && ($data['ChequeId'] > 0))
			{
				$chequeid	=	$data['ChequeId'];
				$data['PagoTipoId']		=	4; // cheque tercero
			}
			else
				$chequeid	=	null;
			/*
			 * caso donde no se selecciono un tipo de pago, 
			 * asigna un tipo de retencion segun proveedor del gobierno (iva, suss, iibb)
			 */
			if(isset($data['RetencionId']) && ($data['RetencionId'] > 0))
			{
				$PagoTipo	=	Doctrine::getTable('CobranzaDetalle')->findOneById($data['RetencionId']);
				if(!is_object($PagoTipo))
					throw new Exception('Debe ingresar una retencion correcta');
				
				$data['PagoTipoId']	=	$PagoTipo->PagoTipoId;
				/*
				if($data['ProveedorId'] == 175)
					$data['PagoTipoId']		=	9; // pagar con retenciones IVA
				else
					$data['PagoTipoId']		=	11; // pagar con retenciones varias
					*/
				/*
				if($data['ProveedorId'] == 175)
					$data['PagoTipoId']		=	8; // pagar con retenciones IVA
				
				if($data['ProveedorId'] == 175)
					$data['PagoTipoId']		=	7; // pagar con retenciones IVA
				
				if($data['ProveedorId'] == 175)
					$data['PagoTipoId']		=	6; // pagar con retenciones IVA
				*/
			}
			
			if(isset($data['PercepcionId']) && ($data['PercepcionId'] > 0))
			{
				$PagoTipo	=	Doctrine::getTable('Percepcion')->findOneById($data['PercepcionId']);
				if(!is_object($PagoTipo))
					throw new Exception('Debe ingresar una percepcion correcta');
			
				$data['PagoTipoId']	=	$PagoTipo->PagoTipoId;
			}
			
			if(isset($data['NotaCreditoId']) && ($data['NotaCreditoId'] > 0))
			{
				$fc	=	Doctrine::getTable('FacturaCompra')->findOneByNumeroInterno($data['NotaCreditoId']);
				if(!is_object($fc))
					throw new Exception('Debe ingresar una NC correcta');
					
				$data['PagoTipoId']	=	12;
			}
			
			$PagoTipo	=	Doctrine::getTable('PagoTipo')->findOneById($data['PagoTipoId']);
			if(!is_object($PagoTipo))
				throw new Exception('Debe ingresar un tipo de pago');
			
			// si paga con cheque tercero, obtener datos
			switch ($PagoTipo->Id)
			{
				case 4: {
					$Cheque	=	Doctrine::getTable('Cheque')->findOneById($data['ChequeId']);
					$importe	=	$Cheque->Importe;
					$detalle	=	$Cheque->GetNombreBanco() . '-' . $Cheque->Numero;
					$fechaCheque	=	$Cheque->FechaEmision; 
					break;
				}
				case 1: {
					$importe	=	$data['ImporteCheque'];
					$banco		= Doctrine::getTable('Banco')->FindOneById($data['Banco']);
					$detalle	=	$banco->Nombre .'-'.$banco->NumeroDeCuenta;
					$fechaCheque	=	$data['FechaCheque']; 
					break;
				}
				case 6: {
					// una proveedor AFIP se paga con retenciones obtenidas de pagos de otros proveedores
					$Pago	=	Doctrine::getTable('CobranzaDetalle')->findOneById($data['RetencionId']);
					$importe	=	$Pago->Importe;
					$detalle	=	'Retencion';
					$fechaCheque	=	'';
					break;
				}
				case 7: {
					// una proveedor AFIP se paga con retenciones obtenidas de pagos de otros proveedores
					$Pago	=	Doctrine::getTable('CobranzaDetalle')->findOneById($data['RetencionId']);
					$importe	=	$Pago->Importe;
					$detalle	=	'Retencion';
					$fechaCheque	=	'';
					break;
				}
				case 8: {
					// una proveedor AFIP se paga con retenciones obtenidas de pagos de otros proveedores
					$Pago	=	Doctrine::getTable('CobranzaDetalle')->findOneById($data['RetencionId']);
					$importe	=	$Pago->Importe;
					$detalle	=	'Retencion';
					$fechaCheque	=	'';
					break;
				}
				case 9: {
					// una proveedor AFIP se paga con retenciones obtenidas de pagos de otros proveedores
					$Pago	=	Doctrine::getTable('CobranzaDetalle')->findOneById($data['RetencionId']);
					$importe	=	$Pago->Importe;
					$detalle	=	'Retencion';
					$fechaCheque	=	'';
					break;
				}
				case 10: {
					// una proveedor AFIP se paga con retenciones obtenidas de pagos de otros proveedores
					$Pago	=	Doctrine::getTable('CobranzaDetalle')->findOneById($data['RetencionId']);
					$importe	=	$Pago->Importe;
					$detalle	=	'Retencion';
					$fechaCheque	=	'';
					break;
				}
				case 11: {
					// una proveedor AFIP se paga con retenciones obtenidas de pagos de otros proveedores
					$Pago	=	Doctrine::getTable('CobranzaDetalle')->findOneById($data['RetencionId']);
					$importe	=	$Pago->Importe;
					$detalle	=	'Retencion';
					$fechaCheque	=	'';
					break;
				}
				case 12: {
					$nc	=	Doctrine::getTable('FacturaCompra')->findOneByNumeroInterno($data['NotaCreditoId']);
					$importe	=	$nc->Importe*(-1);
					$detalle	=	'Nota de credito # '. $nc->Numero;
					$fechaCheque	=	'-';
					break;
				}
				case 13: {
					$importe	=	$data['ImporteTransferencia'];
					$banco		= Doctrine::getTable('Banco')->FindOneById($data['Banco']);
					$detalle	=	$banco->Nombre .'-'.$banco->NumeroDeCuenta;
					$fechaCheque	=	'';
					break;
				}
				case 14: {
					// una proveedor AFIP se paga con percepciones obtenidas de FC de proveedores
					$Pago	=	Doctrine::getTable('Percepcion')->findOneById($data['PercepcionId']);
					$importe	=	$Pago->Importe;
					$detalle	=	'Percepcion';
					$fechaCheque	=	'';
					break;
				}
				case 15: {
					// una proveedor AFIP se paga con percepciones obtenidas de FC de proveedores
					$Pago	=	Doctrine::getTable('Percepcion')->findOneById($data['PercepcionId']);
					$importe	=	$Pago->Importe;
					$detalle	=	'Percepcion';
					$fechaCheque	=	'';
					break;
				}
				case 16: {
					// una proveedor AFIP se paga con percepciones obtenidas de FC de proveedores
					$Pago	=	Doctrine::getTable('Percepcion')->findOneById($data['PercepcionId']);
					$importe	=	$Pago->Importe;
					$detalle	=	'Percepcion';
					$fechaCheque	=	'';
					break;
				}
				default: {
					$importe	=	$data['Importe'];
					$detalle	=	$data['Detalle'];
					$fechaCheque	=	$data['FechaCheque']; 
					break;
				}
			}
			
			if(isset($data['Banco']))
				$banco	=	$data['Banco'];
			else 
				$banco	=	null;
			
			if(isset($data['Sucursal']))
				$sucursal	=	$data['Sucursal'];
			else
				$sucursal	=	null;
			
			if(isset($data['Cuenta']))
				$cuenta	=	$data['Cuenta'];
			else
				$cuenta	=	null;
			
			if(isset($data['RetencionId']))
				$retencionid	=	$data['RetencionId'];
			else
				$retencionid	=	null;
			
			if(isset($data['PercepcionId']))
				$percepcionid	=	$data['PercepcionId'];
			else
				$percepcionid	=	null;
			
			if(isset($data['NotaCreditoId']))
				$ncid	=	$data['NotaCreditoId'];
			else
				$ncid	=	null;
			
			$array = array(		
					'Detalle' => $detalle,
					'FechaCheque' => $fechaCheque,
					'Importe' => $importe,
					'PagoTipoId' => $data['PagoTipoId'],
					'NombrePagoTipo' => $PagoTipo->Nombre,
					'ChequeId' => $chequeid,
					'Id' => $PosicionId,
					'Banco' => $banco,
					'Sucursal' => $sucursal,
					'Cuenta' => $cuenta,
					'FechaCobro' => $data['FechaCobro'],
					'RetencionId' => $retencionid,
					'PercepcionId' => $percepcionid,
					'NotaCreditoId' => $ncid
			);
			
			$_SESSION['PagosArray'][] = $array;
			
			//var_dump($_SESSION['PagosArray']);
		}
		
		public function LimpiarPagosLiquidacionOrdenDePago()
		{
			$this->Session();
			$_SESSION["PagosArray"] = array();
		}
		
		public function GetPagosLiquidadosOrdenDePago()
		{
			$this->Session();
			if(isset($_SESSION["PagosArray"]))
				return $_SESSION["PagosArray"];
		}
		
		public function GetTotalPagosLiquidadosOrdenDePago()
		{
			$pagosLiquidados = $this->GetPagosLiquidadosOrdenDePago();
			//var_dump(count($pagosLiquidados));
			if(count($pagosLiquidados) == 0)
				return 0.0;
			
			$total = 0;
			foreach ($pagosLiquidados  as $o)
			{
				$total = $total + $o['Importe'];
			}
			
			return $total;
		}
		
		public function EliminarPagoLiquidadoOrdenDePago($Id)
		{
			$pagosLiquidados = $this->GetPagosLiquidadosOrdenDePago();
				
			foreach ($pagosLiquidados  as $o)
			{
				if($o['Id'] == $Id)
				{
					unset($_SESSION["PagosArray"][$Id]);
				}
			}
			
			//var_dump($_SESSION["PagosArray"]);
		}
		
		public function LimpiarOrdenDePago()
		{
			$this->LimpiarFacturasDeCompraLiquidacionOrdenDePago();
			$this->LimpiarPagosLiquidacionOrdenDePago();
			$this->LimpiarOrdenesDeCompraLiquidacionOrdenDePago();
		}
		
		public function AgregarOrdenDeCompraLiquidacionOrdenDePago($data)
		{
			$this->AgregarOrdenDeCompraLiquidacionFacturaCompra($data);
		}
		
		public function LimpiarOrdenesDeCompraLiquidacionOrdenDePago()
		{
			$this->LimpiarOrdenDeCompraLiquidacionFacturaCompra();
		}
		/***************************** END Detalle de pagos de una orden de pago ************/
		
		/////////////////// cobranza /////////////////////////////////////////////////
		public function AgregarFacturaLiquidacionCobranza($data)
		{
			//session_start();
			$this->Session();
		
			$oc	=	$data['FacturaNumero'];
		
			$array = array(		'FacturaNumero' => $data['FacturaNumero'],
					'ImporteLiquidado' => $data['ImporteLiquidado'],
					'TipoIvaId' => $data['TipoIvaId']
			);
		
			$_SESSION['FacturasArray'][$oc] = $array;
		
		
			//var_dump($_SESSION['FacturasDeCompraArray']);
		}
		
		public function AgregarPagoACobranza($data)
		{
			$this->Session();
				
			// validaciones
			if($data['FechaCheque'] == 'Fecha cheque')
				$data['FechaCheque'] = null;
				
			if(isset($_SESSION['PagosArray']))
        		$PosicionId	=	count($_SESSION['PagosArray']);
        	else
        		$PosicionId =	0;
        	
			$PagoTipo	=	Doctrine::getTable('PagoTipo')->findOneById($data['PagoTipoId']);
			if(!is_object($PagoTipo))
				throw new Exception('Debe ingresar un tipo de pago');
			
			// si paga con cheque tercero, obtener datos
			switch ($PagoTipo->Id)
			{
				case 4: {
					$importe	=	$data['ImporteCheque'];
					$banco		= Doctrine::getTable('Banco')->FindOneByCodigo($data['Banco']);
						
					if(!is_object($banco))
					{
						throw new Exception('El codigo de banco ingresado no existe. Debe existir el banco y codigo');
					}
					$detalle	=	$banco->Nombre .'-'.$data['Numero'];
					$fechaCheque	=	$data['FechaCheque'];// es la fecha de emision
					break;
				}
				case 13: {
					$importe	=	$data['ImporteTransferencia'];
					$banco		= Doctrine::getTable('Banco')->FindOneById($data['Banco']);
					$detalle	=	$banco->Nombre .'-'.$banco->NumeroDeCuenta;
					$fechaCheque	=	'';
					break;
				}
				case 12: {
					// marcar nota de credito como utilizada
					
					$nc		= Doctrine::getTable('NotaCredito')->FindOneById($data['NotaCreditoId']);
					$detalle	=	'Nota de credito #'.$nc->Numero;
					$importe	=	$nc->Importe;
					$fechaCheque	=	'';
					break;
				}
				default: {
					$importe	=	$data['Importe'];
					$detalle	=	$data['Detalle'];
					$fechaCheque	=	$data['FechaCheque'];
					break;
				}
			}
			
			if(isset($data['Banco']))
				$banco	=	$data['Banco'];
			else
				$banco	=	null;
				
			if(isset($data['Sucursal']))
				$sucursal	=	$data['Sucursal'];
			else
				$sucursal	=	null;
				
			if(isset($data['Cuenta']))
				$cuenta	=	$data['Cuenta'];
			else
				$cuenta	=	null;
				
			$array = array(
					'Detalle' => $detalle,
					'FechaCheque' => $fechaCheque,
					'Importe' => $importe,
					'PagoTipoId' => $data['PagoTipoId'],
					'NombrePagoTipo' => $PagoTipo->Nombre,
					'Id' => $PosicionId,
					'Banco' => $banco,
					'Sucursal' => $sucursal,
					'Localidad' => $data['Localidad'],
					'Numero' => $data['Numero'],
					'Cuenta' => $cuenta,
					'FechaCobro' => $data['FechaCobro'],
					'Firmante' => $data['Firmante'],
					'Cuit' => $data['Cuit']
			);
		
			$_SESSION['PagosArray'][] = $array;
				
			//var_dump($_SESSION['PagosArray']);
		}
		
		public function GetPagosLiquidadosCobranza()
		{
			$this->Session();
			if(isset($_SESSION["PagosArray"]))
				return $_SESSION["PagosArray"];
		}
		
		public function GetTotalPagosLiquidadosCobranza()
		{
			$pagosLiquidados = $this->GetPagosLiquidadosCobranza();
			//var_dump(count($pagosLiquidados));
			if(count($pagosLiquidados) == 0)
				return 0.0;
				
			$total = 0;
			foreach ($pagosLiquidados  as $o)
			{
				$total = $total + $o['Importe'];
			}
				
			return $total;
		}
		
		public function EliminarPagoLiquidadoCobranza($Id)
		{
			$pagosLiquidados = $this->GetPagosLiquidadosCobranza();
		
			foreach ($pagosLiquidados  as $o)
			{
				if($o['Id'] == $Id)
				{
					unset($_SESSION["PagosArray"][$Id]);
				}
			}
				
			//var_dump($_SESSION["PagosArray"]);
		}
		
		public function LimpiarCobranza()
		{
			$this->Session();
			$_SESSION["FacturasArray"] = array();
			$_SESSION["PagosArray"] = array();
			
		}
		
		public function LimpiarFacturasLiquidacionCobranza()
		{
			$this->Session();
			$_SESSION["FacturasArray"] = array();
		}
		
		public function LimpiarPagosLiquidacionCobranza()
		{
			$this->Session();
			$_SESSION["PagosArray"] = array();
		}
		
		public function GetImporteLiquidadoCobranza()
		{
			$facturas = $this->GetFacturasLiquidadasCobranza();
			//var_dump($ordenesDeCompraLiquidadas);
			$total = 0;
			foreach ($facturas  as $o)
			{
				$total = $total + $o['ImporteLiquidado'];
			}
		
			return $total;
		}
		
		public function GetFacturasLiquidadasCobranza()
		{
			$this->Session();
			if(isset($_SESSION["FacturasArray"]))
				return $_SESSION["FacturasArray"];
				
			return array();
		}
		
		
    }
?>