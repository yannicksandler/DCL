<?php
/*
   Movimiento  C�d.  Formulario que lo genera  Columna  
   ---------------------------------------------------
   Facturas FC  Comprobantes de Compra   Haber 
   Notas de Cr�dito  NC  Comprobantes de Compra   Debe 
   Notas de D�bito ND  Comprobantes de Compra   Haber 
   Ordenes de pago OP  Pagos a Proveedores   Debe 
   Saldo Inicial Deudor ID  Movimientos Cta.Cte.Proveedores   Haber 
   Saldo Inicial Acreedor IA  Movimientos Cta.Cte.Proveedores    Debe 

*/
    class Classes_CuentaCorrienteManager
    {   
 		private $Proveedor;
 		private $Cliente;
 		private $FechaDesde;
		private $SaldoInicial; // del cliente o proveedor segun corresponda
 		
    	public function __construct($filters=null)
        {
        	if(isset($filters['ProveedorId']) and ($filters['ProveedorId'] != '') and ($filters['ProveedorId'] != 'Nombre proveedor'))
            {
                $ProveedorId = $filters['ProveedorId'];
                $this->Proveedor = Doctrine::GetTable ( 'Proveedor' )->FindOneById($ProveedorId);        
				$this->SaldoInicial	=	$this->Proveedor->SaldoInicial;
            }
            
        	if(isset($filters['ClienteId']) and ($filters['ClienteId'] != '') and ($filters['ClienteId'] != 'Nombre proveedor'))
            {
                $ClienteId = $filters['ClienteId'];
                $this->Cliente = Doctrine::GetTable ( 'Cliente' )->FindOneById($ClienteId);        
				$this->SaldoInicial	=	$this->Cliente->SaldoInicial;
            }
            
            $this->FechaDesde = $this->SetFechaDesdeCuentaCorriente();
        }
        
        public function GetProveedor()
        {
        	return $this->Proveedor;
        }
        /* devuelve array con elementos doctrine records 
        	de ordenes de compra y ordenes de pago segun ordenado por fecha
        	*/
        public function GetByProveedor($filters)
        {
        	$records = array();
        	$filters['limit'] = 50;
        	/* facturas de compra no anuladas desde Fecha Cta Cte */
			//$insumos = $this->GetInsumosConOrdenDeCompraNoAnulada($filters);
			$facturasCompra = $this->GetFacturasDeCompraNoAnuladas($filters);
    		/* ordenes de pago no anuladas desde fecha cta cte */ 
    		$ordenesDePago = $this->GetOrdenesDePagoNoAnuladas($filters);
			
			/* ej1
    		$q = Doctrine_Manager::getInstance()->getCurrentConnection();
			$result = $q->execute(" -- RAW SQL HERE -- ");
			
			*/
			/* ej2: http://stackoverflow.com/questions/2774947/using-raw-sql-with-doctrine
			$pdo = Doctrine_Manager::getInstance()->getCurrentConnection()->getDbh();

			$query = "SELECT * FROM table WHERE param1 = :param1 AND param2 = :param2";
			$stmt = $pdo->prepare($query);

			$params = array(
			  "param1"  => "value1",
			  "param2"  => "value2"
			);
			$stmt->execute($params);

			$results = $stmt->fetchAll();  
			*/
			
			/* ej3: http://roysimkes.net/blog/2010/04/how-to-run-native-sql-queries-with-doctrine/
			it�s just an array and not a Doctrine_Collection
			//Assume that you have connected to a database instance...
			$statement = Doctrine_Manager::getInstance()->connection();
			$results = $statement->execute("SELECT * FROM users WHERE id = ?", array(1));
			var_dump($results->fetchAll());
			*/
        	foreach($facturasCompra as $f)
        	{
        		/* refactor GetDetalle(): string*/
        		$fc  = array();
        		
        		if(($f->TipoNota == 'NC'))
        		{
        			// debe figurar el importe en el debe y sumar saldo
        			$fc['Id'] = $f->TipoNota . ' ' . $f->Numero;
        			$fc['Link'] = '/FacturaCompra/Edit/FacturaNumero/'.$f->Numero.'/ProveedorId/'.$f->ProveedorId.'/TipoIvaId/'.$f->TipoIvaId;
        			$fc['Debe'] = $f->Importe*(-1);
        			$fc['Fecha'] = $f->Fecha;
        			$fc['Detalle'] = $f->GetTextDetalleLiquidacion();
        			 
        			list($dia, $mes, $anio) = explode('/', $f->Fecha);
        			$fc['Stamp'] = $this->convert_datetime(str_replace(' ', '', $anio).'-'.$mes.'-'.$dia.' 00:00:00');
        			/* obtener saldo hasta la fecha */
        			$filters['FechaHasta'] = $f->Fecha;
        			$fc['Saldo'] = $this->GetSaldoProveedor($filters);
        		}
        		if(($f->TipoNota == 'ND'))
        		{
        			// debe figurar el importe en el debe y sumar saldo
        			$fc['Id'] = $f->TipoNota . ' ' . $f->Numero;
        			$fc['Link'] = '/FacturaCompra/Edit/FacturaNumero/'.$f->Numero.'/ProveedorId/'.$f->ProveedorId.'/TipoIvaId/'.$f->TipoIvaId;
        			$fc['Haber'] = $f->Importe*(-1);
        			$fc['Fecha'] = $f->Fecha;
        			$fc['Detalle'] = $f->GetTextDetalleLiquidacion();
        		
        			list($dia, $mes, $anio) = explode('/', $f->Fecha);
        			$fc['Stamp'] = $this->convert_datetime(str_replace(' ', '', $anio).'-'.$mes.'-'.$dia.' 00:00:00');
        			/* obtener saldo hasta la fecha */
        			$filters['FechaHasta'] = $f->Fecha;
        			$fc['Saldo'] = $this->GetSaldoProveedor($filters);
        		}
        		else
        		{
        			$fc['Entidad'] = 'FC';
			        $fc['Id'] = 'FC '.$f->Numero;
			        $fc['Link'] = '/FacturaCompra/Edit/FacturaNumero/'.$f->Numero.'/ProveedorId/'.$f->ProveedorId.'/TipoIvaId/'.$f->TipoIvaId;
			        $fc['Haber'] = $f->Importe;
			        $fc['Fecha'] = $f->Fecha;
			        $fc['Detalle'] = $f->GetTextDetalleLiquidacion();

			        $ordenes = $f->GetOrdenesDeCompraLiquidadas();
			        //print_r(count($ordenes));
			        
			        foreach($ordenes as $ord)
			        {
			        	$link	=	'/OrdenCompra/Edit/id/'.$ord->OrdenDeCompraId;
			        	
			        	$fc['Items'][] = "<a class=\"popup\" href=\"".$link."\">OC ".$ord->OrdenDeCompraId.' ( $'. $ord->ImporteLiquidado." )"."</a>";
			        }
			        
			        
			        list($dia, $mes, $anio) = explode('/', $f->Fecha);
			        $fc['Stamp'] = $this->convert_datetime(str_replace(' ', '', $anio).'-'.$mes.'-'.$dia.' 00:00:00');
			        /* obtener saldo hasta la fecha */
			        $filters['FechaHasta'] = $f->Fecha;
			        $fc['Saldo'] = $this->GetSaldoProveedor($filters);
        		}
		        $records[] = $fc;
        		
        	}
        	
        	foreach($ordenesDePago as $p)
	       	{
	       			$op  = array();
	        		$op['Id'] = 'OP '.$p->Numero;
	        		$op['Link'] = '/OrdenPago/Edit/id/'.$p->Id;
	        		$op['Debe'] = $p->GetPagoTotal();
	        		$op['Fecha'] = $p->Fecha;
	        		list($dia, $mes, $anio) = explode('/', $p->Fecha);
		        	$op['Stamp'] = $this->convert_datetime($anio.'-'.$mes.'-'.$dia.' 00:00:00');
	        		$ordenesDeCompraAbonadas = $p->OrdenDePagoOrdenDeCompra;
	        		$op['Detalle'] = $p->GetTextDetalleLiquidacion();
		        	if($p->Comentario)
		        	{
		        		$op['Detalle'] = $op['Detalle'] . 'Comentario: ' . $p->Comentario;
		        	
		        	}
		        	
		        	$ordenes = $p->GetLiquidacionOrdenesDeCompra();
			        
			        foreach($ordenes as $or)
			        {
			        	$link	=	'/OrdenCompra/Edit/id/'.$or->OrdenDeCompraId;
			        	
			        	$op['Items'][] = "<a class=\"popup\" href=\"".$link."\">OC ".$or->OrdenDeCompraId.' ( $'. $or->ImporteAbonado." )"."</a>";
			        }
		        	

		        	$filters['FechaHasta'] = $p->Fecha;
	        		$op['Saldo'] = $this->GetSaldoProveedor($filters);
	        		
	        		$records[] = $op;
	       	}

        	//$array_ordenadito = $this->orderMultiDimensionalArray($records, 'Stamp');
        	/* ordenar por fecha ascendiente */
        	$array_ordenadito = $this->ordenar_array($records, 'Stamp', SORT_DESC);
        	
        	//print_r($records);        	
        	/* raw query */
        	/*
        	$q = new Doctrine_RawSql();
			$q->select('{o.*}')
			->from('ordendepago o')
			->addComponent('o', 'OrdenDePago');
			  
			echo $q->getSqlQuery();
			*/
			//$users = $q->execute();
			//print_r($users->toArray());
			/*
        	$q = Doctrine_Query::create()
            ->from('Cliente');
            */
            //$clientes = $q->execute();
            /*
        	->select('f.*,
        		    		(SELECT SUM(pa.Importe) FROM Pago pa WHERE f.Id = pa.FacturaId) AS Pagado,
        		    		(f.Importe - (SELECT SUM(pag.Importe) FROM Pago pag WHERE f.Id = pag.FacturaId)) as Pendiente,
        		    		(SELECT SUM(cre.Importe) FROM Credito cre WHERE cre.ClienteId = f.ClienteId) as Credito'
        		    )
        	*/
        	
            //echo $q->getSqlQuery();
            //return $q->execute()->toArray();
            //return $records;
            return $array_ordenadito;
            //return $q;
        }
        
        /* sumar o restar de acuerdo a Debe o Haber
         * del registro
         */
        /* @deprecated */
        public function CalcularSaldo($record, $saldo)
        {
        	
        	if(isset($record['Debe']) and is_numeric($record['Debe']))
        	{
        		$saldo = ($saldo - $record['Debe']);
        	}
        	
        	if(isset($record['Haber']) and is_numeric($record['Haber']))
        	{
        		$saldo = ($saldo - $record['Haber']);
        	}
        	//echo $saldo;
        	return number_format($saldo,2,'.','');
        }
        
        /* la diferencia entre (ambos desde "fecha desde cuenta corriente"):
         * - importe de facturas de compra no anuladas (importe a abonar) {HABER}
         * menos
         * - importe de pagos de ordenes de pago no anuladas {DEBE}
         */
        public function GetSaldoProveedor($filters)
        {
        	/* FC no anuladas desde Fecha Cta Cte */
			$facturasCompra = $this->GetFacturasDeCompraNoAnuladas($filters);
            $totalFacturasCompra = $this->GetTotalFacturasCompra($facturasCompra);
            
    		/* ordenes de pago no anuladas desde fecha cta cte */ 
    		$ordenesDePago = $this->GetOrdenesDePagoNoAnuladas($filters);
	        $totalPagos = $this->GetTotalPagos($ordenesDePago);
	        
	        /* debe - haber */
    		$saldo = $this->SaldoInicial + $totalPagos - $totalFacturasCompra;
        	
        	return number_format($saldo,2,'.','');
        }
        
        public function GetFacturasDeCompraNoAnuladas($filters)
        {
        	$fechaDesde = $this->GetFechaDesdeCuentaCorriente();
        	/* Facturas de compra no anuladas desde Fecha Cta Cte */
        	$q  = Doctrine_Query::create()
        	->from('FacturaCompra f')
        	->andWhere('ISNULL(f.fechaanulacion)')
        	->andWhere('f.Fecha >= ?', $fechaDesde)
        	->orderBy('f.Fecha ASC');
        	
        	
        	if(isset($filters['FechaHasta']))
        	{
        		$FechaHasta = $filters['FechaHasta'];
        		 
        		$FechaHasta = str_replace("_", "/", $FechaHasta);
        		$dateHelper = new Classes_DateHelper();
        	
        		$q->andWhere('f.Fecha <= ?', substr($dateHelper->fromViewFormat($FechaHasta),0,10) . '23:59:59');
        	}
        	
        	if(isset($filters['ProveedorId']) and ($filters['ProveedorId'] != '') and ($filters['ProveedorId'] != 'Nombre proveedor'))
        	{
        		$ProveedorId = $filters['ProveedorId'];
        		$q->andWhere('f.ProveedorId = ?', $filters['ProveedorId']);
        	}
        	if(isset($filters['limit']))
        	{
        		$q->limit(50);
        	}
        	//echo $q->getSqlQuery();
        	$facturasCompra = $q->execute();
        	
        	return $facturasCompra;
        }
        
        public function GetInsumosConOrdenDeCompraNoAnulada($filters)
        {
        	$fechaDesde = $this->GetFechaDesdeCuentaCorriente();				
			/* insumos con OC no anuladas desde Fecha Cta Cte */
        	$q  = Doctrine_Query::create()
                ->from('Insumo i')
                ->innerJoin('i.OrdenDeCompra o')
                ->where('i.Elegido = ?', 'SI')
                ->andWhere('ISNULL(o.fechaanulacion)')
                ->andWhere('o.Fecha >= ?', $fechaDesde)
                ->orderBy('o.Fecha DESC');
                
            
            if(isset($filters['FechaHasta']))
            {
            	$FechaHasta = $filters['FechaHasta'];
            	
                $FechaHasta = str_replace("_", "/", $FechaHasta);
                $dateHelper = new Classes_DateHelper();

                $q->andWhere('o.Fecha <= ?', substr($dateHelper->fromViewFormat($FechaHasta),0,10) . '23:59:59');
            }
            
        	if(isset($filters['ProveedorId']) and ($filters['ProveedorId'] != '') and ($filters['ProveedorId'] != 'Nombre proveedor'))
            {
                $ProveedorId = $filters['ProveedorId'];
                $q->andWhere('i.ProveedorId = ?', $filters['ProveedorId']);
            }
            if(isset($filters['limit']))
            {
            	$q->limit(50);
            }
        //echo $q->getSqlQuery();	
            $insumos = $q->execute();
            
            return $insumos;
            
        }
        
        public function GetOrdenesDePagoNoAnuladas($filters)
        {
        	$fechaDesde = $this->GetFechaDesdeCuentaCorriente();
        	$q	=	Doctrine_Query::create()
	                    ->from('OrdenDePago o')
	                    ->andWhere('ISNULL(o.fechaanulacion)')
	                    ->andWhere('o.Fecha >= ?', $fechaDesde)
	                    ->orderBy('o.Fecha DESC');
	                    
	                    
	        if(isset($filters['FechaHasta']))
            {
            	
            	$FechaHasta = $filters['FechaHasta'];
            	
                $FechaHasta = str_replace("_", "/", $FechaHasta);
                $dateHelper = new Classes_DateHelper();

                $q->andWhere('o.Fecha <= ?', substr($dateHelper->fromViewFormat($FechaHasta),0,10) . '23:59:59');
            }
                        
        	if(isset($filters['ProveedorId']) and ($filters['ProveedorId'] != '') and ($filters['ProveedorId'] != 'Nombre proveedor'))
            {
                $ProveedorId = $filters['ProveedorId'];
                $q->andWhere('o.ProveedorId = ?', $filters['ProveedorId']);
            }
        	if(isset($filters['limit']) and is_numeric($filters['limit']))
            {
            	$q->limit(50);
            }
            //echo $q->getSqlQuery();                 
	        $pagos = $q->execute();
	        
	        return $pagos;
        }
        
		public function GetFechaDesdeCuentaCorriente()
		{
			return $this->FechaDesde;
		}
		
    	public function SetFechaDesdeCuentaCorriente()
		{
			/*
	    	 * agregar fecha desde donde contar importes 
	    	 */
	                
	    	$factory	= IDS_Factory_Manager::GetFactory();
			$config		= $factory->GetConfig();
			
			$Default	=	$config->Get('bussiness.fecha_desde_cuenta_corriente');
			
			if(isset($Default) and is_numeric($Default))
			{
				$fechaDesde = $Default;
			}
			else
			{
				$fechaDesde = '2011-10-01';
			}
			
			return $fechaDesde;
		}

		public function GetTotalFacturasCompra($facturas=null)
		{
	        $total=0;
	    	
	    	foreach($facturas as $f)
	    	{
	    		$total += ($f->Importe);
	    	}
	    	
	    	return $total;
				
		}
		
		public function GetTotalPagos($pagos)
		{
	        $totalPagos = 0;
	        foreach($pagos as $p)
	    	{
	    		$totalPagos += $p->GetPagoTotal();
	    		
	    	}	
			
	    	return $totalPagos;
		}
        
  public function compararFechas($primera, $segunda)  
 {  
  $valoresPrimera = explode ("/", $primera);     
  $valoresSegunda = explode ("/", $segunda);   
  $diaPrimera    = $valoresPrimera[0];    
  $mesPrimera  = $valoresPrimera[1];    
  $anyoPrimera   = $valoresPrimera[2];   
  $diaSegunda   = $valoresSegunda[0];    
  $mesSegunda = $valoresSegunda[1];    
  $anyoSegunda  = $valoresSegunda[2];  
  $diasPrimeraJuliano = gregoriantojd($mesPrimera, $diaPrimera, $anyoPrimera);    
  $diasSegundaJuliano = gregoriantojd($mesSegunda, $diaSegunda, $anyoSegunda);       
  if(!checkdate($mesPrimera, $diaPrimera, $anyoPrimera)){  
    // "La fecha ".$primera." no es v�lida";  
    return 0;  
  }elseif(!checkdate($mesSegunda, $diaSegunda, $anyoSegunda)){  
    // "La fecha ".$segunda." no es v�lida";  
    return 0;  
  }else{  
    return  $diasPrimeraJuliano - $diasSegundaJuliano;  
  }   
}  
    	public function GetCliente()
        {
        	return $this->Cliente;
        }
        
        public function GetByCliente($filters)
        {
        	$records = array();
        	$filters['limit'] = 20;
			$facturas = $this->GetFacturasNoAnuladas($filters);
    		 
    		$cobranzas = $this->GetCobranzasNoAnuladas($filters);
    		
    		$notasdebito = $this->GetNotasDebitoNoAnuladas($filters);
    		
    		$notascredito = $this->GetNotasCreditoNoAnuladas($filters);
    		
        	foreach($facturas as $f)
        	{
        		$oc  = array();
		        $oc['Id'] = 'FA '.$f->Id;
		        $oc['Link'] = '/Facturacion/FacturaImprimible/FacturaId/'.$f->Id;
		        $oc['Debe'] = $f->Importe;
		        $oc['Fecha'] = $f->Fecha;
		        list($dia, $mes, $anio) = explode('/', $f->Fecha);
		        $stamp = substr($anio,0,4).'-'.$mes.'-'.$dia.' 00:00:00';
		        //echo $stamp."\n";
		        $oc['Stamp'] = $this->convert_datetime($stamp);
		        //echo $oc['Stamp']."\n";
		        $oc['Detalle'] = '';

				/*$ordenes = $f->GetOrdenes();
		        //print_r(count($ordenes));
		        foreach($ordenes as $or)
		        {
		        	$link	=	'/Orden/Edit/id/'.$or->Id;
		        	//$oc['Items'][] = $link;
		        	$oc['Detalle'] = $oc['Detalle'] . 'OT '.$or->Id.' '.$or->Producto.'<br>';
		        	$oc['Items'][] = "<a class=\"popup\" href=\"".$link."\">OT ".$or->Id." ".$or->Producto."</a>";
		        }*/
				$orden = $f->getOrdenDeTrabajo();
				$link	=	'/Orden/Edit/id/'.$orden->Id;
				$oc['Detalle'] = $oc['Detalle'] . 'OT '.$orden->Id.' '.$orden->Producto.'<br>';
				$oc['Items'][] = "<a class=\"popup\" href=\"".$link."\">OT ".$orden->Id." ".$orden->Producto."</a>";

		        $filters['FechaHasta'] = $f->Fecha;
	        	$oc['Saldo'] = $this->GetSaldoCliente($filters);
		        
		        $records[] = $oc;
        	}
        	
        	foreach($cobranzas as $c)
	       	{
	       		$op  = array();
        		$op['Id'] = 'Cobranza '.$c->Numero;
        		$op['Link'] = '/Cobranza/Edit/id/'.$c->Id;
        		$op['Haber'] = $c->GetPagoTotal();
        		$op['Fecha'] = $c->Fecha;
        		list($dia, $mes, $anio) = explode('/', $c->Fecha);
		        $stamp = substr($anio,0,4).'-'.$mes.'-'.$dia.' 00:00:00';
		        //echo $stamp."\n";
		        $op['Stamp'] = $this->convert_datetime($stamp);
		        
        		$detalles = $c->GetFacturasLiquidadas();
        		$op['Detalle'] = '';
        		foreach ($detalles as $det)
        		{
        			//echo $det->Importe;
        			$op['Detalle'] = $op['Detalle'] .'FA ' . $det['FacturaId'] . ' ( $ '. $det->Importe . ' )' . '<br>';
        			
        		}
        		$filters['FechaHasta'] = $c->Fecha;
	        	$op['Saldo'] = $this->GetSaldoCliente($filters);
        		
        		$records[] = $op;
	       	}
	       	
	       	foreach($notasdebito as $n)
	       	{
	       		$nc  = array();
	       		$nc['Id'] = 'ND '.$n->Numero;
	       		$nc['Link'] = '/NotaDebito/Edit/id/'.$n->Id;
	       		$nc['Debe'] = $n->Importe;
	       		$nc['Fecha'] = $n->Fecha;
	       		list($dia, $mes, $anio) = explode('/', $n->Fecha);
	       		$stamp = substr($anio,0,4).'-'.$mes.'-'.$dia.' 00:00:00';
	       		//echo $stamp."\n";
	       		$nc['Stamp'] = $this->convert_datetime($stamp);
	       		//echo $oc['Stamp']."\n";
	       		$nc['Detalle'] = $n->Comentario;
	       		$filters['FechaHasta'] = $n->Fecha;
	       		$nc['Saldo'] = $this->GetSaldoCliente($filters);
	       	
	       		$records[] = $nc;
	       	}
	       	
	       	foreach($notascredito as $n1)
	       	{
	       		$nd  = array();
	       		$nd['Id'] = 'NC '.$n1->Numero;
	       		$nd['Link'] = '/NotaCredito/Edit/id/'.$n1->Id;
	       		$nd['Haber'] = $n1->Importe;
	       		$nd['Fecha'] = $n1->Fecha;
	       		list($dia, $mes, $anio) = explode('/', $n1->Fecha);
	       		$stamp = substr($anio,0,4).'-'.$mes.'-'.$dia.' 00:00:00';
	       		//echo $stamp."\n";
	       		$nd['Stamp'] = $this->convert_datetime($stamp);
	       		//echo $oc['Stamp']."\n";
	       		$nd['Detalle'] = $n1->Descripcion;
	       		$filters['FechaHasta'] = $n1->Fecha;
	       		$nd['Saldo'] = $this->GetSaldoCliente($filters);
	       		
	       		$records[] = $nd;
	       	}
	       	
	       	$array_ordenadito = $this->ordenar_array($records, 'Stamp', SORT_DESC);
        	//print_r($array_ordenadito);
            return $array_ordenadito;
        }
        
        
        
    	/* la diferencia entre (ambos desde "fecha desde cuenta corriente"):
         * - importe de factura no anuladas {DEBE}
         * menos
         * - importe de cobranzas no anuladas {HABER}
         * NOTA CREDITO
         * NOTA DEBITO
         */
        public function GetSaldoCliente($filters)
        {
			$facturas = $this->GetFacturasNoAnuladas($filters);
            $totalFacturas = $this->GetTotalFacturasNoAnuladas($facturas);
             
    		$cobranzas = $this->GetCobranzasNoAnuladas($filters);
	        $totalCobranzas = $this->GetTotalCobranzasNoAnuladas($cobranzas);
	        
	        $notasdebito = $this->GetNotasDebitoNoAnuladas($filters);
	        $totalNotasDebito = $this->GetTotalNotasDebitoNoAnuladas($notasdebito);
	        
	        $notascredito = $this->GetNotasCreditoNoAnuladas($filters);
	        $totalNotasCredito = $this->GetTotalNotasCreditoNoAnuladas($notascredito);
	        //echo 'total cobranzas:'.$totalCobranzas;
	        /* debe - haber */
    		$saldo = 	$this->SaldoInicial +
    					$totalFacturas - $totalCobranzas +
    					$totalNotasDebito - $totalNotasCredito;
    		 
    		return number_format($saldo,2,'.','');
        	
        	return number_format($saldo,2,'.','');
        }        
        
        public function GetFacturasNoAnuladas($filters)
        {
        	$fechaDesde = $this->GetFechaDesdeCuentaCorriente();
        	$q	=	Doctrine_Query::create()
	                    ->from('Factura f')
	                    ->andWhere('f.fechaanulacion IS NULL')
	                    ->andWhere('f.Fecha >= ?', $fechaDesde)
	                    ->orderBy('f.Fecha DESC');
	                    
	        if(isset($filters['FechaHasta']))
            {
            	$FechaHasta = $filters['FechaHasta'];
            	
                $FechaHasta = str_replace("_", "/", $FechaHasta);
                $dateHelper = new Classes_DateHelper();

                $q->andWhere('f.Fecha <= ?', substr($dateHelper->fromViewFormat($FechaHasta),0,10) . '23:59:59');
            }
                        
	                    
        	if(isset($filters['ClienteId']) and ($filters['ClienteId'] != '') and ($filters['ClienteId'] != 'Nombre proveedor'))
            {
                $ClienteId = $filters['ClienteId'];
                $q->andWhere('f.ClienteId = ?', $filters['ClienteId']);  
            }	   
        	if(isset($filters['limit']))
            {
            	$q->limit(50);
            }
            //echo $q->getSqlQuery();                 
	        $facturas = $q->execute();
	        
	        return $facturas;
        }
        
        public function GetNotasDebitoNoAnuladas($filters)
        {
        	$fechaDesde = $this->GetFechaDesdeCuentaCorriente();
        	$q	=	Doctrine_Query::create()
        	->from('NotaDebito n')
        	->andWhere('n.fechaanulacion IS NULL')
        	->andWhere('n.Fecha >= ?', $fechaDesde)
        	->orderBy('n.Fecha DESC');
        	 
        	if(isset($filters['FechaHasta']))
        	{
        		$FechaHasta = $filters['FechaHasta'];
        		 
        		$FechaHasta = str_replace("_", "/", $FechaHasta);
        		$dateHelper = new Classes_DateHelper();
        
        		$q->andWhere('n.Fecha <= ?', substr($dateHelper->fromViewFormat($FechaHasta),0,10) . '23:59:59');
        	}
        
        	 
        	if(isset($filters['ClienteId']) and ($filters['ClienteId'] != '') and ($filters['ClienteId'] != 'Nombre cliente'))
        	{
        		$ClienteId = $filters['ClienteId'];
        		$q->andWhere('n.ClienteId = ?', $filters['ClienteId']);
        	}
        	if(isset($filters['limit']))
        	{
        		$q->limit(50);
        	}
        	//echo $q->getSqlQuery();
        	$notasdebito = $q->execute();
        	 
        	return $notasdebito;
        }
        
        public function GetNotasCreditoNoAnuladas($filters)
        {
        	$fechaDesde = $this->GetFechaDesdeCuentaCorriente();
        	$q	=	Doctrine_Query::create()
        	->from('NotaCredito n')
        	->andWhere('n.fechaanulacion IS NULL')
        	->andWhere('n.Fecha >= ?', $fechaDesde)
        	->orderBy('n.Fecha DESC');
        
        	if(isset($filters['FechaHasta']))
        	{
        		$FechaHasta = $filters['FechaHasta'];
        		 
        		$FechaHasta = str_replace("_", "/", $FechaHasta);
        		$dateHelper = new Classes_DateHelper();
        
        		$q->andWhere('n.Fecha <= ?', substr($dateHelper->fromViewFormat($FechaHasta),0,10) . '23:59:59');
        	}
        
        
        	if(isset($filters['ClienteId']) and ($filters['ClienteId'] != '') and ($filters['ClienteId'] != 'Nombre cliente'))
        	{
        		$ClienteId = $filters['ClienteId'];
        		$q->andWhere('n.ClienteId = ?', $filters['ClienteId']);
        	}
        	if(isset($filters['limit']))
        	{
        		$q->limit(50);
        	}
        	//echo $q->getSqlQuery();
        	$notascredito = $q->execute();
        
        	return $notascredito;
        }
        
    	public function GetCobranzasNoAnuladas($filters)
        {
        	$fechaDesde = $this->GetFechaDesdeCuentaCorriente();
        	$q	=	Doctrine_Query::create()
	                    ->from('Cobranza c')
	                    ->andWhere('c.FechaAnulacion IS NULL')
	                    ->andWhere('c.Fecha >= ?', $fechaDesde)
	                    ->orderBy('c.Fecha DESC');
	                    
	        if(isset($filters['FechaHasta']))
            {
            	$FechaHasta = $filters['FechaHasta'];
            	
                $FechaHasta = str_replace("_", "/", $FechaHasta);
                $dateHelper = new Classes_DateHelper();

                $q->andWhere('c.Fecha <= ?', substr($dateHelper->fromViewFormat($FechaHasta),0,10) . '23:59:59');
            }
                        
        	if(isset($filters['ClienteId']) and ($filters['ClienteId'] != '') and ($filters['ClienteId'] != 'Nombre proveedor'))
            {
                $ClienteId = $filters['ClienteId'];
                $q->andWhere('c.ClienteId = ?', $filters['ClienteId']);  
            }	   
        	if(isset($filters['limit']))
            {
            	$q->limit(50);
            }
            //echo $q->getSqlQuery();                 
	        $cobranzas = $q->execute();
	        
	        return $cobranzas;
        }
        
    	public function GetTotalFacturasNoAnuladas($facturas)
		{
	        $total=0;
	    	
	    	foreach($facturas as $f)
	    	{
	    		$total += $f->Importe;	
	    	}
	    	
	    	return $total;
				
		}
		
    	public function GetTotalCobranzasNoAnuladas($cobranzas)
		{
	        $total=0;
	    	
	    	foreach($cobranzas as $c)
	    	{
	    		$total += $c->GetPagoTotal();
	    	}
	    	
	    	return $total;
				
		}
		
		public function GetTotalNotasDebitoNoAnuladas($notas)
		{
			$total=0;
		
			foreach($notas as $nd)
			{
				$total += $nd->Importe;
			}
		
			return $total;
		
		}
		
		public function GetTotalNotasCreditoNoAnuladas($notas)
		{
			$total=0;
		
			foreach($notas as $nd)
			{
				$total += $nd->Importe;
			}
		
			return $total;
		
		}
		
		public function orderMultiDimensionalArray ($toOrderArray, $field, $inverse = false) {  
		    $position = array();  
		    $newRow = array();  
		    foreach ($toOrderArray as $key => $row) {  
		            $position[$key]  = $row[$field];  
		            $newRow[$key] = $row;  
		    }  
		    if ($inverse) {  
		        arsort($position);  
		    }  
		    else {  
		        asort($position);  
		    }  
		    $returnArray = array();  
		    foreach ($position as $key => $pos) {       
		        $returnArray[] = $newRow[$key];  
		    }  
		    return $returnArray;  
		} 		

		public function ordenar_array() { 
  $n_parametros = func_num_args(); // Obenemos el n�mero de par�metros 
  if ($n_parametros<3 || $n_parametros%2!=1) { // Si tenemos el n�mero de parametro mal... 
    return false; 
  } else { // Hasta aqu� todo correcto...veamos si los par�metros tienen lo que debe ser... 
    $arg_list = func_get_args(); 
 
    if (!(is_array($arg_list[0]) && is_array(current($arg_list[0])))) { 
      return false; // Si el primero no es un array...MALO! 
    } 
    for ($i = 1; $i<$n_parametros; $i++) { // Miramos que el resto de par�metros tb est�n bien... 
      if ($i%2!=0) {// Par�metro impar...tiene que ser un campo del array... 
        if (!array_key_exists($arg_list[$i], current($arg_list[0]))) { 
          return false; 
        } 
      } else { // Par, no falla...si no es SORT_ASC o SORT_DESC...a la calle! 
        if ($arg_list[$i]!=SORT_ASC && $arg_list[$i]!=SORT_DESC) { 
          return false; 
        } 
      } 
    } 
    $array_salida = $arg_list[0]; 
 
    // Una vez los par�metros se que est�n bien, proceder� a ordenar... 
    $a_evaluar = "foreach (\$array_salida as \$fila){\n"; 
    for ($i=1; $i<$n_parametros; $i+=2) { // Ahora por cada columna... 
      $a_evaluar .= "  \$campo{$i}[] = \$fila['$arg_list[$i]'];\n"; 
    } 
    $a_evaluar .= "}\n"; 
    $a_evaluar .= "array_multisort(\n"; 
    for ($i=1; $i<$n_parametros; $i+=2) { // Ahora por cada elemento... 
      $a_evaluar .= "  \$campo{$i}, SORT_REGULAR, \$arg_list[".($i+1)."],\n"; 
    } 
    $a_evaluar .= "  \$array_salida);"; 
    // La verdad es que es m�s complicado de lo que cre�a en principio... :) 
 
    eval($a_evaluar); 
    return $array_salida; 
  } 
}

    /*
* Function to turn a mysql datetime (YYYY-MM-DD HH:MM:SS) into a unix timestamp
* @param str
*     The string to be formatted
*/

public function convert_datetime($str) {

    list($date, $time) = explode(' ', $str);
    
    list($year, $month, $day) = explode('-', $date);
    list($hour, $minute, $second) = explode(':', $time);
    
    $timestamp = mktime($hour, $minute, $second, $month, $day, $year);
    
    return $timestamp;
}

public function GetByBanco($filters)
{
	if(is_numeric($filters['BancoId']))
	{
		$q	=	Doctrine_Query::create()
		->from('BancoCuentaCorriente c')
		->andWhere('c.BancoId = ?', $filters['BancoId'])
		->andWhere('c.FechaAnulacion IS NULL')
		->orderBy('c.Id DESC')
		->limit(50);
		
		return $q->execute();
	}
}

// casos particulares
// crear retencion del banco para liquidar en una OP de IIBB, IVA, etc (see Model BancoCuentaCorriente)
public function AddConceptoBancoCuentaCorriente($data)
{
	if(isset($data['Detalle']) && ($data['Detalle'] == 'Extraccion para caja con cheque'))
	{
		if(isset($data['Debe']))
			throw new Exception('No es posible extraer con la operacion Acreditar');
		
		if($data['Tipo']=='Debe')
			throw new Exception('No es posible extraer con la operacion Acreditar');
		 
	}
	
	if(isset($data['Detalle']) && ($data['Detalle'] == 'Deposito de efectivo desde Caja'))
	{
	
		if($data['Tipo']=='Haber')
			throw new Exception('No es posible depositar con la operacion Debitar');		
	}
	
	if(isset($data['Detalle']) && ($data['Detalle'] == 'Extraccion efectivo para Caja'))
	{
	
		if($data['Tipo']=='Debe')
			throw new Exception('No es posible extraer efectivo con la operacion Acreditar');
	}
	
	$linea	=	new BancoCuentaCorriente();
	$linea->Fecha	=	date('Y-m-d');
	
	if(isset($data['Haber']))
		$linea->Haber	=	$data['Haber'];
	
	if(isset($data['Debe']))
		$linea->Debe	=	$data['Debe'];
	
	if(isset($data['Tipo']))
	{
		if($data['Tipo']=='Debe')
			$linea->Debe	=	$data['Importe'];
		
		if($data['Tipo']=='Haber')
			$linea->Haber	=	$data['Importe'];
	}
	
	if(isset($data['Saldo']))
		$linea->Saldo	=	$data['Saldo'];
	
	$linea->BancoId	=	$data['BancoId'];
	$linea->Detalle	=	$data['Detalle'];
	
	$linea->save();
	
	return $linea;
}

public function GetBanco($filters)
{
	$banco = Doctrine::GetTable ( 'Banco' )->FindOneById($filters['BancoId']);
	
	return $banco;
}

public function GetSaldoBanco($filters)
{
	$banco = Doctrine::GetTable ( 'Banco' )->FindOneById($filters['BancoId']);
	
	return $banco->SaldoCuenta;
}

public function AnularItemCuentaCorriente($itemid)
{
	$item = Doctrine::GetTable ( 'BancoCuentaCorriente' )->FindOneById($itemid);
	
	if(!is_object($item))
		throw new Exception('El item de cuenta corriente no fue encontrado');
	
	if($item->FechaAnulacion)
		throw new Exception('El item ya fue anulado');
	
	if($item->FueUtilizadoEnCobranza())
		throw new Exception('El item no puede anularse porque fue utilizado en una cobranza');
	
	// actualizacion: el importe del item debe ser debitado o acreditado a cada item posterioir al anulado
	// obtener items posteriores del mismo banco
	$q	=	Doctrine_Query::create()
	->from('BancoCuentaCorriente c')
	->andWhere('c.BancoId = ?', $item->BancoId)
	->andWhere('c.Id > ?', $item->Id)
	->andWhere('c.FechaAnulacion IS NULL');
	// cta cte
	$items = $q->execute();
	
	// actualizar saldo del banco
	$banco = Doctrine::GetTable ( 'Banco' )->FindOneById($item->BancoId);
	
	if(!is_object($banco))
		throw new Exception('El banco no existe');
	
	// anular item y actualizar valores de saldos de items posteriores del banco
	$item->FechaAnulacion = date('Y-m-d');
	$item->save();
	// determinar importe a actualizar en cada item posterioir para actualziar saldo
	if($item->Debe > 0)
	{
		$importeParaActualizar = $item->Debe;
		$banco->SaldoCuenta -= $item->Debe;
	}
	else
	{
		// haber
		$importeParaActualizar = $item->Haber;
		$banco->SaldoCuenta += $item->Haber;
	}

	$banco->save();
	
	foreach($items as $i)
	{
			// operacion inversa
			if($i->Debe > 0)
			{
				$i->Saldo += $importeParaActualizar;
				//$banco->SaldoCuenta -= $i->Debe;
			}
			else
			{
				// haber
				$i->Saldo -= $importeParaActualizar;//pasar a preUpdate del item
				//$banco->SaldoCuenta += $i->Haber;
			}
			
			$i->save();
			//$banco->save();
	}
	
	
	
}
    
    }
?>