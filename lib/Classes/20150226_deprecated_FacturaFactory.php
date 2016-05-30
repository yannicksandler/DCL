<?php
/* crea factura A, B o N:negro */
    class Classes_FacturaFactory
    {
    	/* ordenes de trabajo */
        private $ordenes    =  null;
        private $cliente    =  null;
        private $fecha		= null;
        private $factura	= null;
        private $data		=	null;
        private $ordenesId = null;
        
        public function __construct($Cliente, $Fecha, $OrdenesId, $data=null)
        {
        	//$Cliente =  Doctrine_Core::getTable('Producto')->findOneById($ClienteId);
        	//throw new Exception('Error: debe ingresar un cliente para crear una facturar');
        	
        	
        	if(count($OrdenesId) == 0)
        		throw new Exception('Debe seleccionar ordenes de trabajo para facturar');
        	
        	if(is_object($Cliente) and ($Fecha != '') and ($Fecha != 'Fecha de factura') and is_array($OrdenesId) and (count($OrdenesId) > 0))
        	{
        		$this->cliente	=	$Cliente;
        		$this->fecha	=	$Fecha;
        		
        		$this->ordenesId	=	$OrdenesId;
        		
        		$q	=	Doctrine_Query::create()
						->from('OrdenDeTrabajo ot')
						->WhereIn('ot.Id', $OrdenesId);
			
        		$this->ordenes	=	$q->execute();
        		
        		if(is_array($data))
        			$this->data		= $data;
        	}
        	else
        	{
        		throw new Exception('Error: debe ingresar un cliente, fecha y al menos una orden de trabajo para crear una facturar');
        	}
        	
        }
        /* una factura esta formada por ordenes de trabajo
         * y una linea ,as para comentario e importe
         */
        public function CrearFactura()
        {
        	$this->factura	=	new Factura();
        	
        	if(!is_object($this->factura))
        	{
        		throw new Exception('No fue creada la factura');
        	}
        	
        	$this->factura->Fecha = $this->fecha;
        	$this->factura->ClienteId	=	$this->cliente->Id;
        	$this->factura->TipoIvaId = $this->GetTipoIva();
        	$this->factura->FechaVencimiento	=	$this->data['FechaPosibleDeCobro'];
        	
        	/* nueva linea de factura */
        	$this->factura->Comentario = $this->GetComentario();
        	$this->factura->ComentarioImporte	=	$this->GetComentarioImporte();
        	
        	switch ($this->GetLetraFactura())
        	{
        		case 'A': {$this->CrearFacturaA(); break;}
        		case 'B': {$this->CrearFacturaB(); break;}
        		case 'N': {$this->CrearFacturaN(); break;}
        		default: {$this->CrearFacturaN(); break;}
        	}
        	
        	
        	//echo $this->factura->Id.'-';echo $this->factura->ClienteId.'-';echo $this->factura->Importe.'-';echo $this->factura->TipoIvaId;
        	
        	$conn = Doctrine_Manager::connection();
		
			try
			{
			                
				$conn->beginTransaction();
				
				$this->factura->save();
				//actualizar ordenes asociadas a la factura
				$this->AsociarOrdenesDeTrabajo();
			
				$conn->commit();
			}
			catch(Doctrine_Exception $e)
			{
				$conn->rollback();
				throw new Exception($e->errorMessage('Error en transaccion de crecion de factura'));
			}
        	
        	  	
        	return $this->factura;
        }
        
        public function GetQueryUpdateOrdenes()
        {
        	$q =	Doctrine_Query::create()
							->from('OrdenDeTrabajo ot')
	                        ->Update()
	                        ->Set('FacturaId', $this->factura->Id)
	                        ->andWhere('ot.ClienteId = ?', $this->cliente->Id)
	                        ->andWhereIn('ot.Id', $this->ordenesId) // ordenes seleccionadas
	                        ->andWhere('ISNULL(facturaid)');
            //echo $q->getSqlQuery();
	        return $q;
        }
        
        public function GetTipoIva()
        {
        	if(isset($this->data['TipoIvaId']))
        	{
        		return $this->data['TipoIvaId'];
        	}
        	//var_dump($this->cliente->TipoIvaId);
        	if($this->cliente->TipoIvaId)
        		return $this->cliente->TipoIvaId;
        	/* cargar tipo de iva por defecto de configuracion file (FACTURA N)*/
        	$factory	= IDS_Factory_Manager::GetFactory();
			$config		= $factory->GetConfig();
						
			$Default	=	$config->Get('bussiness.tipo_iva_default');
			
			if(is_numeric($Default))
			{
				return $Default;
			}
				
        	return 12;
        }
        
        public function GetComentario()
        {
        	if(isset($this->data['Comentario']))
        		return $this->data['Comentario'];
        }
        
    	public function GetComentarioImporte()
        {
        	if(isset($this->data['ComentarioImporte']))
        		return $this->data['ComentarioImporte'];
        }
        
        public function GetLetraFactura()
        {
        	/* primero obtener letra desde el tipo de iva seleccionado
        	 * -sino desde el cliente
        	 */
        	$tipoivaid = $this->GetTipoIva();
        	
        	$TipoIva	=	Doctrine::getTable('TipoIva')->FindOneById($tipoivaid);
        	if(is_object($TipoIva))
        	{
        		return $TipoIva->Letra_comp;
        	}
        	/* traer de config.ini bussiness.letra_factura_default=N*/
        	return $this->cliente->GetLetraFactura();
        }
        
        public function CrearFacturaA() 
        {
        	$this->factura->Id = $this->GetUltimoNumeroFactura('A') + 1;
        	
        	$this->factura->Importe = $this->CalcularImportesFacturaA();
        }
        
        public function CalcularImportesFacturaA()
        {
			$ordenes = $this->ordenes;
			
			$subtotal = 0;
			foreach($ordenes as $o)
			{
				$subtotal = $subtotal + ($o->TotalSinIva);
			}
			
			if($this->GetComentarioImporte() > 0)
				$subtotal	=	$subtotal + $this->GetComentarioImporte();
			
			$porcentaje	=	$this->GetPorcentajeIva();
			$porcentajeDiscriminado = ($porcentaje/100);
			$importeIva = $porcentajeDiscriminado*$subtotal;
			$this->factura->ImporteIva	=	$importeIva;
			$this->factura->ImporteSubtotal	=	$subtotal;
			
			/* 1.21 * subtotal normalmente */
			$porcentajeDiscriminado += 1;
			$total = $subtotal*$porcentajeDiscriminado;
			return $total;
        }
        
        public function CalcularImportesFacturaB()
        {
			$ordenes = $this->ordenes;
			
			$subtotal = 0;
			foreach($ordenes as $o)
			{
				$subtotal = $subtotal + ($o->TotalSinIva);
			}
			
			if($this->GetComentarioImporte() > 0)
				$subtotal	=	$subtotal + $this->GetComentarioImporte();
			
			$porcentajeIncluido = $this->GetPorcentajeIva()/100;
			$importeIva = $porcentajeIncluido*$subtotal;
			$this->factura->ImporteIva	=	$importeIva;
			$this->factura->ImporteSubtotal	=	$subtotal + $importeIva;
			
			$porcentajeIncluido += 1;
			$total = $subtotal + $importeIva;
			return $total;
        }
        
    	public function CalcularImportesFacturaN()
        {
			$ordenes = $this->ordenes;
			
			$subtotal = 0;
			foreach($ordenes as $o)
			{
				$subtotal = $subtotal + ($o->TotalSinIva);
			}
			
			if($this->GetComentarioImporte() > 0)
				$subtotal	=	$subtotal + $this->GetComentarioImporte();
			
			$this->factura->ImporteSubtotal	=	$subtotal;
			
			$total = $subtotal;
			return $total;
        }
        
    	public function CrearFacturaB() 
    	{
        	$this->factura->Id = $this->GetUltimoNumeroFactura('B') + 1;
        	
        	$this->factura->Importe = $this->CalcularImportesFacturaB();
        }
        
    	public function CrearFacturaN() 
    	{
        	$this->factura->Id = $this->GetUltimoNumeroFactura('N') + 1;
        	
        	$this->factura->Importe = $this->CalcularImportesFacturaN();
        }
        
        public function AsociarOrdenesDeTrabajo()
        {
        	$q =	$this->GetQueryUpdateOrdenes();
        	$q->execute();
        }

		public function GetUltimoNumeroFactura($LetraFactura = null)
		{
			if(isset($LetraFactura))
			{
				switch ($LetraFactura)
				{
					case 'A': {
						return $this->GetUltimoNumeroFacturaA(); break;
					}
					case 'B': {
						return $this->GetUltimoNumeroFacturaB(); break;
					}
					case 'N': {
						return $this->GetUltimoNumeroFacturaN(); break;
					}
					default: {
						return $this->GetUltimoNumeroFacturaA(); break;
					}
				}
			}
			else
			{
				switch ($this->GetLetraFactura())
	        	{
	        		case 'A': {return $this->GetUltimoNumeroFacturaA(); break;}
	        		case 'B': {return $this->GetUltimoNumeroFacturaB(); break;}
	        		case 'N': {return $this->GetUltimoNumeroFacturaN(); break;}
	        		default: {return $this->GetUltimoNumeroFacturaA(); break;}
	        	}
			}			
		}
		
		public function GetUltimoNumeroFacturaA()
		{
						/* si es factura A: obtener numero */
			$q	=	Doctrine_Query::create()
						->from('Factura f')
						->orderBy('f.Id DESC')
						->innerJoin('f.TipoIva ti')
						->andWhere('ti.Letra_comp = ?', 'A')
						->limit(1);
						
			if(is_object($q->fetchOne()))
				$fv	= $q->fetchOne();

			$q1	=	Doctrine_Query::create()
			->from('NotaCredito nc')
			->orderBy('nc.Id DESC')
			->innerJoin('nc.TipoIva ti')
			->andWhere('ti.Letra_comp = ?', 'A')
			->limit(1);
			
			if(is_object($q1->fetchOne()))
				$nc	= $q1->fetchOne();
			
			if(is_object($nc))
			{
				if($nc->Numero > $fv->Id)
					return $nc->Numero;
			}
			else
				return $fv->Id;
	
			$factory	= IDS_Factory_Manager::GetFactory();
			$config		= $factory->GetConfig();
					
			$Default	=	$config->Get('bussiness.numerofacturaA');
			if(isset($Default) and is_numeric($Default))
				return $Default;
			else
				return 1;
		}
		
		public function GetUltimoNumeroFacturaB()
		{
				/* obtener ultimo numero de facturas tipo B 
				 * */
						$q	=	Doctrine_Query::create()
						->select('f.Id')
						->from('Factura f')
						//->andWhereIn('f.TipoIvaId', $tiposDeIvaFacturaB)
						->innerJoin('f.TipoIva ti')
						->andWhere('ti.Letra_comp = ?', 'B')
						->orderBy('f.Id DESC')
						->limit(1);
						
						
						$facturaB	=	$q->fetchOne();
						if(is_object($facturaB))
							$fv	= $facturaB; 
						
						$q1	=	Doctrine_Query::create()
						->from('NotaCredito nc')
						->orderBy('nc.Id DESC')
						->innerJoin('nc.TipoIva ti')
						->andWhere('ti.Letra_comp = ?', 'B')
						->limit(1);
							
						if(is_object($q1->fetchOne()))
							$nc	= $q1->fetchOne();
							
						if($nc->Numero > $fv->Id)
							return $nc->Numero;
						else
							return $fv->Id;
				
						$factory	= IDS_Factory_Manager::GetFactory();
						$config		= $factory->GetConfig();
						
						$Default	=	$config->Get('bussiness.numerofacturaB');
						
						if(isset($Default) and is_numeric($Default))
							return $Default;
						else
							return 5999;
		}
		
    	public function GetUltimoNumeroFacturaN()
		{
				/* obtener ultimo numero de facturas tipo B 
				 * */
						$q	=	Doctrine_Query::create()
						->select('f.Id')
						->from('Factura f')
						//->andWhereIn('f.TipoIvaId', $tiposDeIvaFacturaB)
						->innerJoin('f.TipoIva ti')
						->andWhere('ti.Letra_comp = ?', 'N')
						->orderBy('f.Id DESC')
						->limit(1);
						
						
						$factura	=	$q->fetchOne();
						if(is_object($factura))
							$fv	= $factura; 
						
						$q1	=	Doctrine_Query::create()
						->from('NotaCredito nc')
						->orderBy('nc.Id DESC')
						->innerJoin('nc.TipoIva ti')
						->andWhere('ti.Letra_comp = ?', 'N')
						->limit(1);
							
						$nc	=$q1->fetchOne();
						if(is_object($nc) and is_object($fv))
						{
							if($nc->Numero > $fv->Id)
								return $nc->Numero;
							else
								return $fv->Id;
						}
						else
						{
							return $fv->Id;
						}
						
						$factory	= IDS_Factory_Manager::GetFactory();
						$config		= $factory->GetConfig();
						
						$Default	=	$config->Get('bussiness.numerofacturaN');
						
						if(isset($Default) and is_numeric($Default))
							return $Default;
						else
							return 9999999;
		}
		
	    public function GetPorcentajeIva()
		{
			if(isset($this->data['TipoIvaId']))
			{
	        	$TipoIva	=	Doctrine::getTable('TipoIva')->FindOneById($this->data['TipoIvaId']);
	        	if(is_object($TipoIva))
	        	{
				    switch ($this->GetLetraFactura())
		        	{
		        		case 'A': {return $TipoIva->Discriminado; break;}
		        		case 'B': {return $TipoIva->Incluido; break;}
		        		case 'N': {return $TipoIva->Incluido; break;}
		        		default: {return $TipoIva->Incluido; break;}
		        	}
	        	}
			}
			else
				return 0;
		}
	}
?>