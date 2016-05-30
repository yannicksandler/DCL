<?php
/* crea factura A, B o N:negro */
    class Classes_FacturaCompraFactory
    {
    	private $proveedorObj;
    	private $fecha;
    	private $numero;
    	private $tipoIvaId;
    	private $importe;
    	private $comentario;
    	private $fechaVencimiento;
    	private $data;
    	
    	
        public function __construct(Proveedor $Proveedor, $data)
        {
        	//$proveedorId = $data['ProveedorId'];
        	$Fecha = $data['Fecha'];
        	//$importe = $data['Importe'];
        	//$tipoIvaId = $data['TipoIvaId'];
        	$numero = $data['Numero'];
        	$comentario = $data['Comentario'];
        	if(isset($data['FechaVencimiento']))
        		$fechaVencimiento = $data['FechaVencimiento'];
        	else
        		$fechaVencimiento = null;
        	
        	if(is_object($Proveedor) and ($Fecha != '') and ($Fecha != 'Fecha de factura') and
        			 (is_numeric($numero)) 
        			)
        	{
        		$this->proveedorObj	=	$Proveedor;
        		$this->fecha	=	$Fecha;
        		$this->numero	=	$numero;
        		//$this->importe	=	$importe;
        		$this->comentario	=	$comentario;
        		//$this->tipoIvaId	=	$tipoIvaId;
        		$this->fechaVencimiento	=	$fechaVencimiento;
        		$this->data	=	$data;
        	}
        	else
        	{
        		throw new Exception('Debe ingresar los datos para crear una factura');
        	}
        	
        }
        
        public function CrearFactura()
        {
        	$f	=	new FacturaCompra();
        	
        	if(!is_object($f))
        	{
        		throw new Exception('No fue creada la factura');
        	}
        	
        	$f->ProveedorId	=	$this->proveedorObj->Id;
        	$f->Fecha	=	$this->fecha;
        	$f->FechaVencimiento	=	$this->fechaVencimiento;
        	$f->Numero	=	$this->numero;
        	$f->Comentario	=	$this->comentario;
        	// al crear una OC negro, se crea autoaticamente una FC negro
        	if(isset($this->data['TipoIvaId']))
        		$f->TipoIvaId =	$this->data['TipoIvaId'];
        	else
        	{
        		if($this->proveedorObj->TipoIvaId == 0)
        			throw new Exception('No se puede crear la factura de compra porque el proveedor no tiene un tipo de iva');
        		
        		$f->TipoIvaId	=	$this->proveedorObj->TipoIvaId;
        	}
        	// deja de estar pendiente de pago cuando se liquida totalmente en ordenes de pago (es posible liquidar en distintas OP)
        	$f->PendienteDePago = 'SI';
        	
        	if(isset($this->data['TipoGastoId']))
        		$f->TipoGastoId = $this->data['TipoGastoId'];
        	else
        		$f->TipoGastoId = $this->proveedorObj->TipoGastoId;
        	// en caso de tener, crear percepciones
        	$this->CrearDetalle($f);
        	
        	// verificar si la factura ya existe para el proveedor (no anulada, mismo tipo iva, proveedor y numero)
        	if($this->proveedorObj->ExisteFactura($f))
        		throw new Exception('La factura numero '.$f->Numero.' ya existe para el proveedor '.$this->proveedorObj->Nombre);
        	
        	// CONTROL: El importe total validado de las (muchas) órdenes de 
        	// 			compra validadas no supere el importe total de la factura de compra
        	$s	=	new Classes_Session();
        	// deben haber OC liquidadas
		//	var_dump(number_format($s->GetImporteLiquidadoFacturaCompra(),2, '.',''));
//var_dump(number_format(($f->GetImporteTotal()-$f->GetImportePercepciones()),2, '.',''));
//        		var_dump($f->GetImporteTotal());
  //      		var_dump($f->GetImportePercepciones());
        	if(count($s->GetOrdenesDeCompraLiquidadas()) > 0)
        	{
        		if(number_format($s->GetImporteLiquidadoFacturaCompra(),2, '.','') != 
        				(number_format(($f->GetImporteTotal()-$f->GetImportePercepciones()),2, '.','')))
        			throw new Exception('El importe total liquidado debe ser igual al importe total de la factura (no incluye percepciones)');
        	}
        	
        	// controlar si el importe liquidado es igual al importe de la factura
        	/*
        	if($f->GetImporteLiquidado() != $f->Importe)
        		throw new Exception('El importe de la factura no coincide con la liquidacion');
        	*/
        	/*
        	$conn = Doctrine_Manager::connection();
		
			try
			{
			                
				$conn->beginTransaction();
			*/
				$f->save();
				// agregar validaciones de ordenes de compra
				$f->AgregarLiquidacion();
			/*
				$conn->commit();
				
			}
			catch(Doctrine_Exception $e)
			{
				$conn->rollback();
				throw new Exception($e->errorMessage('No fue posible crear la factura de compra'));
			}*/
        	
        	  	
        	return $f;
        }
        
        // cuando genero factura en negro a consecuencia de haber generado una OC en negro,
        // se agrega liquidacion de la OC
        public function AgregarLiquidacion(OrdenDeCompra $oc)
        {
        	$data['OrdenDeCompraId'] = $oc->Id;
        	$data['ImporteLiquidado'] = $oc->Importe;
        	
        	$oc->AgregarOrdenDeCompraAFactura($data);
        }
        
        public function CrearDetalle(FacturaCompra $f)
        {	 
        	if(isset($this->data['ImporteNetoNoGravado']) && $this->data['ImporteNetoNoGravado'] > 0)
        	{
        		$f->ImporteNetoNoGravado	=	$this->data['ImporteNetoNoGravado'];
        	}
        	if(isset($this->data['ImporteNetoGravado21']) && $this->data['ImporteNetoGravado21'] > 0)
        	{
        		$f->ImporteNetoGravado21	=	$this->data['ImporteNetoGravado21'];
        	}
        	if(isset($this->data['ImporteNetoGravado27']) && $this->data['ImporteNetoGravado27'] > 0)
        	{
        		$f->ImporteNetoGravado27	=	$this->data['ImporteNetoGravado27'];
        	}
        	if(isset($this->data['ImporteNetoGravado10_5']) && $this->data['ImporteNetoGravado10_5'] > 0)
        	{
        		$f->ImporteNetoGravado10_5	=	$this->data['ImporteNetoGravado10_5'];
        	}
        	if(isset($this->data['ImporteIva21']) && $this->data['ImporteIva21'] > 0)
        	{
        		$f->ImporteIva21	=	$this->data['ImporteIva21'];
        	}
        	if(isset($this->data['ImporteIva27']) && $this->data['ImporteIva27'] > 0)
        	{
        		$f->ImporteIva27	=	$this->data['ImporteIva27'];
        	}
        	if(isset($this->data['ImporteIva10_5']) && $this->data['ImporteIva10_5'] > 0)
        	{
        		$f->ImporteIva10_5	=	$this->data['ImporteIva10_5'];
        	}
        	
        	
        	if(isset($this->data['ImporteCreditoACuenta']) && $this->data['ImporteCreditoACuenta'] > 0)
        	{
        		$f->ImporteCreditoACuenta	=	$this->data['ImporteCreditoACuenta'];
        	}
        	
        	if(isset($this->data['ImportePercepcionesIva']) && $this->data['ImportePercepcionesIva'] > 0)
        	{
        		$f->ImportePercepcionesIva	=	$this->data['ImportePercepcionesIva'];
        		
        		$p	=	new Percepcion();
        		$p->Importe	=	$f->ImportePercepcionesIva;
        		$p->FacturaCompraNumero	=	$f->Numero;
        		$p->ProveedorId	=	$f->ProveedorId;
        		$p->TipoIvaId	=	$f->TipoIvaId;
        		$p->PagoTipoId	=	14; //Percepcion IVA
        		$p->FechaGrabacion	=	date('Y-m-d h:i:s');
        		$p->save();
        	}
        	
        	if(isset($this->data['ImportePercepcionesIngresosBrutosCaba']) && $this->data['ImportePercepcionesIngresosBrutosCaba'] > 0)
        	{
        		$f->ImportePercepcionesIngresosBrutosCaba	=	$this->data['ImportePercepcionesIngresosBrutosCaba'];
        		
        		$p	=	new Percepcion();
        		$p->Importe	=	$f->ImportePercepcionesIngresosBrutosCaba;
        		$p->FacturaCompraNumero	=	$f->Numero;
        		$p->ProveedorId	=	$f->ProveedorId;
        		$p->TipoIvaId	=	$f->TipoIvaId;
        		$p->PagoTipoId	=	15; //Percepcion IIBB CABA
        		$p->FechaGrabacion	=	date('Y-m-d h:i:s');
        		$p->save();
        	}
        	
        	if(isset($this->data['ImportePercepcionesIngresosBrutosBsAs']) && $this->data['ImportePercepcionesIngresosBrutosBsAs'] > 0)
        	{
        		$f->ImportePercepcionesIngresosBrutosBsAs	=	$this->data['ImportePercepcionesIngresosBrutosBsAs'];
        		
        		$p	=	new Percepcion();
        		$p->Importe	=	$f->ImportePercepcionesIngresosBrutosBsAs;
        		$p->FacturaCompraNumero	=	$f->Numero;
        		$p->ProveedorId	=	$f->ProveedorId;
        		$p->TipoIvaId	=	$f->TipoIvaId;
        		$p->PagoTipoId	=	16; //Percepcion IIBB bs as
        		$p->FechaGrabacion	=	date('Y-m-d h:i:s');
        		$p->save();
        	}
        	
        	// ND o NC, nota de credito o debito del proveedor es cargada con importe negativo
        	if(isset($this->data['TipoNota']) && (($this->data['TipoNota']=='NC') || ($this->data['TipoNota']=='ND')))
        	{
        		$f->TipoNota	=	$this->data['TipoNota'];
        		$f->Importe	=	$f->GetImporteTotal()*(-1); // importe negativo
        		// se crea como paga porque es Nota credito o debito y son utilizadas como medio de pago
        		$f->PendienteDePago = 'NO';
        	}
        	else
        		$f->Importe	=	$f->GetImporteTotal();
        }
    }
?>