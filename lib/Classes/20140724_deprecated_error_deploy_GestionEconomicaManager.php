<?php
    class Classes_GestionEconomicaManager
    {   
 		private $SaldoEfectivo;
 		private $ImporteCheques;
 		private $SaldoBancos;
 		private $Acreditar;
 		private $Debitar;
 		
    	public function __construct()
        {
            $Configuracion = Doctrine::GetTable ( 'Configuracion' )->FindOneByNombre('SaldoEfectivo');        
			$this->SaldoEfectivo	=	$Configuracion->Valor;
			
			$this->ImporteCheques	=	$this->GetImporteCheques();
			
			$this->SaldoBancos	=	$this->GetSaldoBancos();
            
        }
        
        public function GetImporteCheques()
        {
        	$importe	=	0;
        	
        	$q		= Doctrine::getTable('Cheque')->GetChequesVigentesDePago();
        	$cheques 	=	$q->execute();
        	
        	foreach ($cheques as $ch)
        	{
        		$importe +=	$ch->Importe;
        	}
        	
        	return $importe;
        }
        
        public function GetSaldoBancos()
        {
        	$importe	=	0;
        	
        	$q		= Doctrine::getTable('Banco')->GetCuentasBancosPropios();
        	$bancos 	=	$q->execute();
        	
        	foreach ($bancos as $b)
        	{
        		$importe +=	$b->SaldoCuenta;
        	}
        	
        	return $importe;
        }
        
        public function GetSaldoEfectivo()
        {
        	return $this->SaldoEfectivo;
        }
        
        public function GetBancosPropios()
        {
        	$q		= Doctrine::getTable('Banco')->GetCuentasBancosPropios();
        	$bancos 	=	$q->execute();
        	 
        	return $bancos;
        }
        
        public function GetSaldosClientes()
        {
        	$clientes	=	array();
        	
        	$q	=	Doctrine_Query::create()
        	->from('Cliente c')
        	//->andWhere('c.SaldoActual > 0')
        	->orderBy('c.SaldoActual DESC');
        	
        	$cli	=	$q->execute();
        	
        	return $cli;
        	/*
        	foreach ($cli as $c)
        	{
        		if($c->Saldo > 0)
        			$clientes[]	=	$c;
        	}
        	
        	return $clientes;
        	*/
        }
        
        public function GetSaldoTotalClientes()
        {
        	/*
        	 * si se usa campo en cliente, todas las operaciones de cta cte
        	 * deben actualizar el saldo en el cliente
        	$query	=	"
        	select sum(c.saldoactual) as Total
        	from cliente c
        	";
        	
        	//Assume that you have connected to a database instance...
        	$statement = Doctrine_Manager::getInstance()->connection();
        	//$results = $statement->execute("SELECT * FROM paciente WHERE id = ?", array(1));
        	$results = $statement->execute($query);
        	$dataset	=	$results->fetchAll();
        	//var_dump($dataset);
        	if($dataset[0]['Total'] > 0)
        		return number_format($dataset[0]['Total'],2,'.','');
        	
        	$total=0;
        	*/
        	$q	=	Doctrine_Query::create()
        	->from('Cliente c');
        	
        	$cli	=	$q->execute();
        	$total = 0;
        	foreach ($cli as $c)
        	{
        			$saldoActual	=	$c->GetSaldo();
        			$c->SaldoActual	=	$saldoActual;
        			$c->save();
					// sumar saldo total de cada cliente
        			$total	+= $saldoActual;
        	}
        	
        	return $total;
        }
        
        public function GetSaldosProveedores()
        {
        	$clientes	=	array();
        	
        	// No mostrar Insumos a contabilizar, exite otro procedimiento para tratarlas
        	$CONST_InsumosAContabilizarId = 5;
        	 
        	$q	=	Doctrine_Query::create()
        	->from('Proveedor c')
        	->innerJoin('c.FacturasCompra f')
        	->andWhere('f.TipoGastoId <> ?', $CONST_InsumosAContabilizarId)
        	//->andWhere('c.SaldoActual < 0')
        	->groupBy('c.Id')
        	->orderBy('c.SaldoActual DESC');
        	//echo $q->getSqlQuery();
        	$cli	=	$q->execute();

        	return $cli;
        	/*
        	foreach ($cli as $c)
        	{
        		if($c->Saldo < 0)
        			$proveedores[]	=	$c;
        	}
        	
        	return $proveedores;
        	*/
        }
        
        public function GetSaldoTotalProveedores()
        {
        	/*
        	$query	=	"
        	select sum(p.saldoactual) as Total
        	from proveedor p
        	";
        	
        	//Assume that you have connected to a database instance...
        	$statement = Doctrine_Manager::getInstance()->connection();
        	//$results = $statement->execute("SELECT * FROM paciente WHERE id = ?", array(1));
        	$results = $statement->execute($query);
        	$dataset	=	$results->fetchAll();
        	//var_dump($dataset);
        	if($dataset[0]['Total'] < 0)
        		return number_format($dataset[0]['Total'],2,'.','');
        	*/
        	
        
        	// No mostrar Insumos a contabilizar, exite otro procedimiento para tratarlas
        	// Insumos a contabilizar
        	$CONST_InsumosAContabilizarId = 5;
        	
        	$q	=	Doctrine_Query::create()
        	->from('Proveedor c')
        	->innerJoin('c.FacturasCompra f')
        	->andWhere('f.TipoGastoId <> ?', $CONST_InsumosAContabilizarId)
        	->groupBy('c.Id');
        //echo $q->getSqlQuery();
        	$cli	=	$q->execute();
        	$total=0;
        	foreach ($cli as $c)
        	{
        			$saldoActual	=	$c->GetSaldo();
        			$c->SaldoActual	=	$saldoActual;
        			$c->save();
					// sumar saldo total de cada cliente
        			$total	+= $saldoActual;
        	}
        
        	return $total;
        }
        
        public function GetTotalPendienteAcreditar()
        {
        	$query	=	"
        	select sum(c.importe) PendienteAcreditar
        	from cheque c
        	where c.estado='Pendiente acreditar'
        	and c.fechaanulacion is null
        
        	";
        
        	//Assume that you have connected to a database instance...
        	$statement = Doctrine_Manager::getInstance()->connection();
        	//$results = $statement->execute("SELECT * FROM paciente WHERE id = ?", array(1));
        	$results = $statement->execute($query);
        	$dataset	=	$results->fetchAll();
        	//var_dump($dataset);
        	return number_format($dataset[0]['PendienteAcreditar'],2,'.','');
        }
        
        public function GetTotalPendienteDebitar()
        {
        	$query	=	"
        	select sum(c.importe) PendienteDebitar
        	from cheque c
        	where c.estado='Pendiente debitar'
        	and c.fechaanulacion is null
        
        	";
        
        	//Assume that you have connected to a database instance...
        	$statement = Doctrine_Manager::getInstance()->connection();
        	//$results = $statement->execute("SELECT * FROM paciente WHERE id = ?", array(1));
        	$results = $statement->execute($query);
        	$dataset	=	$results->fetchAll();
        	//var_dump($dataset);
        	return number_format($dataset[0]['PendienteDebitar'],2,'.','');
        }
        
        public function GetPrevisiones($CondicionDePago=null)
        {
        	if($CondicionDePago=='B') // si es en blanco
        	{
        		$query	=	"
						select sum(i.cantidad*i.preciounitariosiniva) as Previsiones
			        	from insumo i
			        	inner join orden_de_trabajo ot on ot.id=i.ordenid
			        	where i.ordendecompraid is null
			        	and ot.estadoid in (8,3,4,5)
			        	and i.elegido = 'SI'
			        	and i.condiciondepago='B'
        				";
        	}
        	if($CondicionDePago=='N') // si es en blanco
        	{
        		$query	=	"
        		select sum(i.cantidad*i.preciounitariosiniva) as Previsiones
        		from insumo i
        		inner join orden_de_trabajo ot on ot.id=i.ordenid
        		where i.ordendecompraid is null
        		and ot.estadoid in (8,3,4,5)
        		and i.elegido = 'SI'
        		and i.condiciondepago='N'
        		";
        	}
        
			//Assume that you have connected to a database instance...
			$statement = Doctrine_Manager::getInstance()->connection();
			//$results = $statement->execute("SELECT * FROM paciente WHERE id = ?", array(1));
			$results = $statement->execute($query);
			$dataset	=	$results->fetchAll();
			//var_dump($dataset);
			return number_format($dataset[0]['Previsiones'],2,'.','');
        }
        
        public function GetImportePendienteDeFacturar()
        {
        	
        	$factory	= IDS_Factory_Manager::GetFactory();
        	$config		= $factory->GetConfig();
        	$fechainicio	=	$config->Get('facturacion.fechainicio');
        	
        	$query	=	"
        	select sum(ot.totalsiniva) as Total
			        	from orden_de_trabajo ot
						where
					      	ot.estadoid in (8,3,4)
							and ot.facturaid is null
						and ot.fechainicio>=".$fechainicio;
        	 
        	//Assume that you have connected to a database instance...
        	$statement = Doctrine_Manager::getInstance()->connection();
        	//$results = $statement->execute("SELECT * FROM paciente WHERE id = ?", array(1));
        	$results = $statement->execute($query);
        	$dataset	=	$results->fetchAll();
        	//var_dump($dataset);
        	return number_format($dataset[0]['Total'],2,'.','');
        }
        
        
        public function ActualizarSaldoEfectivo($data)
        {
        	if(!isset($data['Importe']))
        		throw new Exception('Debe ingresar el importe');
        	
        	if(isset($data['Importe']))
        	{
        		$Configuracion = Doctrine::GetTable ( 'Configuracion' )->FindOneByNombre('SaldoEfectivo');
        		
        		$Configuracion->Valor	=	$Configuracion->Valor + $data['Importe'];
        		$Configuracion->save();
        		
        		$data['Saldo']	=	$Configuracion->Valor;
        		$data['Debe']	=	$data['Importe'];
        		
        		$this->AddHistorialEfectivo($data);
        	}
        }
        
        public function AddHistorialEfectivo($data)
        {
        	$linea	=	new HistorialEfectivo();
        	
        	$linea->Fecha	=	date('d/m/Y');
        	if(isset($data['Debe']))
        		$linea->Debe	= $data['Debe'];
        	if(isset($data['Haber']))
        		$linea->Haber	= $data['Haber'];
        	$linea->Detalle	=	$data['Detalle'];
        	$linea->Saldo	=	$data['Saldo'];
        	
        	$linea->save();
        	
        	return $linea;
        }
        
        public function DepositarCheque($data)
        {
        	if(!isset($data['ChequeId']))
        		throw new Exception('Debe ingresar el numero de cheque');
        	 
        	if(isset($data['BancoId']))
        	{
        		$Banco = Doctrine::GetTable ( 'Banco' )->FindOneById($data['BancoId']);
        		$Cheque = Doctrine::GetTable ( 'Cheque' )->FindOneById($data['ChequeId']);
        		
        		$Cheque->Cuenta	=	$Banco->NumeroDeCuenta;
        		$Cheque->BancoId	=	$Banco->Id;
        		$Cheque->Estado	=	'Pendiente acreditar';
        		$Cheque->save();
        	}
        }
        
        public function AnularCheque($chequeid)
        {
        	if(!isset($chequeid))
        		throw new Exception('Debe ingresar el numero de cheque');
        
        	$Cheque = Doctrine::GetTable ( 'Cheque' )->FindOneById($chequeid);
        
        	$Cheque->Anular();
        }
        
        public function AcreditarCheque($data)
        {
        	if(!isset($data['ChequeId']))
        		throw new Exception('Debe ingresar el numero de cheque');
        
        	$Cheque = Doctrine::GetTable ( 'Cheque' )->FindOneById($data['ChequeId']);
        	if(!is_object($Cheque))
        		throw new Exception('El nro de cheque no existe');
        	
        		$Banco = Doctrine::GetTable ( 'Banco' )->FindOneByNumeroDeCuenta($Cheque->Cuenta);

        		$Cheque->Estado	=	'Acreditado';
        		$Cheque->save();
        		
        		$ctacte		=	new Classes_CuentaCorrienteManager();
        		$data['Debe']	=	$Cheque->Importe;
        		$data['Saldo']	=	$Banco->SaldoCuenta;
        		$data['BancoId']	=	$Banco->Id;
        		$data['Detalle']	=	'Cheque '.$Cheque->BancoCodigo.' '.$Cheque->Numero. ' acreditado';
        		$ctacte->AddConceptoBancoCuentaCorriente($data);
        	
        }
        
        public function DebitarCheque($data)
        {
        	if(!isset($data['ChequeId']))
        		throw new Exception('Debe ingresar el numero de cheque');
        
        	$Cheque = Doctrine::GetTable ( 'Cheque' )->FindOneById($data['ChequeId']);
        	if(!is_object($Cheque))
        		throw new Exception('El nro de cheque no existe');
        	 
        	$Banco = Doctrine::GetTable ( 'Banco' )->FindOneByNumeroDeCuenta($Cheque->Cuenta);
        
        	$Cheque->Estado	=	'Debitado';
        	$Cheque->save();
        
        	$ctacte		=	new Classes_CuentaCorrienteManager();
        	$data['Haber']	=	$Cheque->Importe;
        	$data['Saldo']	=	$Banco->SaldoCuenta;
        	$data['BancoId']	=	$Banco->Id;
        	$data['Detalle']	=	'Cheque '.$Cheque->BancoCodigo.' '.$Cheque->Numero. ' debitado';
        	$ctacte->AddConceptoBancoCuentaCorriente($data);
        	 
        }
        
        public function RechazarCheque($data)
        {
        	if(!isset($data['ChequeId']))
        		throw new Exception('Debe ingresar el numero de cheque');
        
        	$Cheque = Doctrine::GetTable ( 'Cheque' )->FindOneById($data['ChequeId']);
        	if(!is_object($Cheque))
        		throw new Exception('El nro de cheque no existe');
        	
        	// si el cheque esta en estado 'Pendiente de acreditar'
        	if($Cheque->Estado == 'Pendiente acreditar')
        	{
        		
        		//$Config = Doctrine::GetTable ( 'Configuracion' )->FindOneByNombre('CostoChequeRechazo');
        		if(isset($data['CostoRechazo']))
        			$costoRechazo	=	$data['CostoRechazo'];
        		else
        			$costoRechazo	=	0;
        		
        		$nd	=	new NotaDebito();
        		$nd->Fecha=date('d/m/Y');
        		// buscar cliente que pago con el cheque rechazado
        		$nd->ClienteId=$Cheque->ClienteId;
        		if(!is_numeric($Cheque->Cliente->TipoIvaId))
        		{
        			throw new Exception('El cliente '. $Cheque->Cliente->Nombre.' no tiene definido un tipo de IVA');
        		}
        		$nd->TipoIvaId=$Cheque->Cliente->TipoIvaId;
        		$nd->Tipo=$Cheque->Tipo;
        		
        		$letra = $Cheque->Cliente->TipoIva->GetLetraFactura();
        		if(($letra == 'A') || ($letra=='B') || ($letra=='C'))
        		{
        			$nd->Importe=($Cheque->Importe+$costoRechazo)*
        					(1 + ($this->GetPorcentajeIva($Cheque->Cliente->TipoIvaId)/100));
        			
        			$nd->Comentario='Cheque #'.$Cheque->Numero.' con importe $ '.
		          					$Cheque->Importe.' rechazado. Costo de rechazo: $ '.$costoRechazo.'. IVA: '.
		        					$this->GetPorcentajeIva($Cheque->Cliente->TipoIvaId) . ' %';
        			
        			$nd->Numero	=	($nd->GetUltimoNumeroExterno()+1);
        		}
        		else
        		{
        			// letra N: negro
        			$nd->Importe=($Cheque->Importe+$costoRechazo);
        			
        			$nd->Comentario='Cheque #'.$Cheque->Numero.' con importe $ '.
        				$Cheque->Importe.' rechazado. Costo de rechazo: $ '.$costoRechazo;
        			
        			$nd->Numero	=	($nd->GetUltimoNumeroInterno()+1);
        		}
        		
        		$nd->save();
        		
        		$Banco = Doctrine::GetTable ( 'Banco' )->FindOneByNumeroDeCuenta($Cheque->Cuenta);
        		if(!is_object($Banco))
        			throw new Exception('El banco no existe');
        		// acreditar y debitar cheque para ver operacion
        		$cc	=	new Classes_CuentaCorrienteManager();
        		$data['Debe']	=	$Cheque->Importe;
        		$data['Saldo']	=	$Banco->SaldoCuenta;
        		$data['BancoId']	=	$Banco->Id;
        		$data['Detalle']	=	'Cheque #'.$Cheque->Numero.' del banco '.$Cheque->GetNombreBanco().' '. ' acreditado';
        		$cc->AddConceptoBancoCuentaCorriente($data);
        		
        		$data['Haber']	=	$Cheque->Importe;
        		$data['Debe']	=	null;
        		$data['Saldo']	=	$Banco->SaldoCuenta;
        		$data['BancoId']	=	$Banco->Id;
        		$data['Detalle']	=	'Cheque #'.$Cheque->Numero.' del banco '.$Cheque->GetNombreBanco().' '. ' debitado';
        		$cc->AddConceptoBancoCuentaCorriente($data);
        		
        		$Cheque->Estado='Rechazado';
        		$Cheque->save();
        		
        		return $nd;
        	}
        
        }
        
        public function GetPorcentajeIva($TipoIvaId)
        {
        	if(!isset($TipoIvaId))
        		throw new Exception('Debe ingresar el tipo de iva' );
        	
        		$TipoIva	=	Doctrine::getTable('TipoIva')->FindOneById($TipoIvaId);
        		if(is_object($TipoIva))
        		{
        			switch ($TipoIva->GetLetraFactura())
        			{
        				case 'A': {
        					return $TipoIva->Discriminado; break;
        				}
        				case 'B': {
        					return $TipoIva->Incluido; break;
        				}
        				case 'N': {
        					return $TipoIva->Incluido; break;
        				}
        				default: {
        					return $TipoIva->Incluido; break;
        				}
        			}
        		}
        }
        
        public function GetPercepciones()
        {
        	$q	=	Doctrine_Query::create()
        	->from('Percepcion p')
        	->andWhere('p.FechaAnulacion IS NULL')
        	->andWhere('p.FechaUtilizacion IS NULL')
        	->orderBy('p.FechaGrabacion DESC');
        		
        	return $q->execute();
        }
        
        public function GetPercepcionesPendientes($data)
        {
        	/*
        	 $q	=	Doctrine_Query::create()
        	->from('Pago p')
        	->innerJoin('p.OrdenDePago op')
        	->andWhere('op.FechaAnulacion IS NULL')
        	->andWhere('p.RetencionUtilizada = ?', 'NO')
        	->andWhereIn('p.PagoTipoId', array(6,7,8,9,10,11));
        	*/
        	$q	=	Doctrine_Query::create()
        	->from('Percepcion p')
        	->andWhere('p.FechaAnulacion IS NULL')
        	->andWhere('p.FechaUtilizacion IS NULL')
        	->andWhereIn('p.PagoTipoId', array(14,15,16));
        	
        	 
        	if(isset($data['TipoPercepcion']))
        	{
        		$q->andWhere('p.PagoTipoId = ?', $data['TipoPercepcion']);
        	}
        	// si el un proveedor de impuestos de retencion, filtrar por proveedor
        	// ej AFIP iva, IIBB, etc.
        	if(isset($data['ProveedorId']))
        	{
        		// relacionar proveedor con tipo de pago que tengo a favor para saldar
        		if($data['ProveedorId'] == 175) // afip iva
        		{
        			$q->andWhere('p.PagoTipoId = ?', 9);
        		}
        	}
        	 
        	$q->orderBy('p.PagoTipoId DESC');
        	//echo $q->getSqlQuery();
        	return $q->execute();
        }
        
        
        public function GetRetenciones()
        {
        	$q	=	Doctrine_Query::create()
        	->from('Pago p')
        	->innerJoin('p.OrdenDePago op')
        	->andWhere('op.FechaAnulacion IS NULL')
        	->andWhereIn('p.PagoTipoId', array(6,7,8,9,10,11))
        	->orderBy('op.Fecha DESC');
        	
        	return $q->execute();
        }
        
        public function GetRetencionesPendientes($data)
        {
        	/*
        	$q	=	Doctrine_Query::create()
        	->from('Pago p')
        	->innerJoin('p.OrdenDePago op')
        	->andWhere('op.FechaAnulacion IS NULL')
        	->andWhere('p.RetencionUtilizada = ?', 'NO')
        	->andWhereIn('p.PagoTipoId', array(6,7,8,9,10,11));
        	*/
        	$q	=	Doctrine_Query::create()
        	->from('CobranzaDetalle cd')
        	->innerJoin('cd.Cobranza c')
        	->innerJoin('c.Cliente cl')
        	->andWhere('c.FechaAnulacion IS NULL')
        	->andWhere('cd.RetencionUtilizada = ?', 'NO')
        	->andWhereIn('cd.PagoTipoId', array(6,7,8,9,10,11));
        	
        	if(isset($data['TipoRetencion']))
        	{
        		$q->andWhere('cd.PagoTipoId = ?', $data['TipoRetencion']);
        	}
        	// si el un proveedor de impuestos de retencion, filtrar por proveedor
        	// ej AFIP iva, IIBB, etc.
        	if(isset($data['ProveedorId']))
        	{
        		// relacionar proveedor con tipo de pago que tengo a favor para saldar
        		if($data['ProveedorId'] == 175) // afip iva
        		{
        			$q->andWhere('cd.PagoTipoId = ?', 9);
        		}
        		/*
        		if($data['ProveedorId'] == 175) // afip iva
        		{
        			$q->andWhere('p.PagoTipoId = ?', 9);
        		}
        		
        		if($data['ProveedorId'] == 175) // afip iva
        		{
        			$q->andWhere('p.PagoTipoId = ?', 9);
        		}
        		
        		if($data['ProveedorId'] == 175) // afip iva
        		{
        			$q->andWhere('p.PagoTipoId = ?', 9);
        		}
        		
        		($data['ProveedorId']==168)||($data['ProveedorId']==175)||
        		($data['ProveedorId']==130)||($data['ProveedorId']==135))
        		*/
        	}
        	
        	// quitar las agregadas en session
	        $s	=	new Classes_Session();
			$s->Session();
			$pagos	=	$s->GetPagosLiquidadosOrdenDePago();
			
			if(count($pagos))
			{
				foreach ($pagos as $p)
				{
					if(isset($p['RetencionId']))
					{
						$q->andWhere('cd.Id <> ?', $p['RetencionId']);
					}
				}
				
			}
        	
        	$q->orderBy('cd.PagoTipoId DESC, c.Fecha ASC');
        	 //echo $q->getSqlQuery();
        	return $q->execute();
        }
        
        public function GetRetencionesPendientesAgrupadasPorTipo($data)
        {
        	$query	=	"
        	select sum(p.importe) as Importe, pt.nombre PagoTipoNombre, pt.id PagoTipoId
        	from cobranza_detalle p
        	inner join cobranza op on op.id=p.cobranzaid
        	left join pago_tipo pt on pt.id=p.pagotipoid
        	where op.fechaanulacion IS NULL
        	and p.pagotipoid in (6,7,8,9,10,11)
        	and p.retencionutilizada='NO'
			group by p.pagotipoid
        	";
        	
        	//Assume that you have connected to a database instance...
        	$statement = Doctrine_Manager::getInstance()->connection();
        	//$results = $statement->execute("SELECT * FROM paciente WHERE id = ?", array(1));
        	$results = $statement->execute($query);
        	$dataset	=	$results->fetchAll();
        	
        	return $dataset;
        	/*
        	$q	=	Doctrine_Query::create()
        	->select('(select pt.Nombre from PagoTipo pt where pt.Id=cd.PagoTipoId) Tipo, SUM(cd.Importe) Total')
        	->from('CobranzaDetalle cd')
        	->innerJoin('cd.Cobranza c')
        	->andWhere('c.FechaAnulacion IS NULL')
        	->andWhere('cd.RetencionUtilizada = ?', 'NO')
        	->andWhereIn('cd.PagoTipoId', array(6,7,8,9,10,11))
        	->groupBy('cd.PagoTipoId');
        	 
        	if(isset($data['TipoRetencion']))
        	{
        		$q->andWhere('cd.PagoTipoId = ?', $data['TipoRetencion']);
        	}
        	 
        	$q->orderBy('1 DESC');
        	echo $q->getSqlQuery();
        	return $q->execute();
        	*/
        }
        
        public function GetTotalPercepciones()
        {
        	$query	=	"
        	select sum(p.importe) as Total
        	from percepcion p
        	where p.fechaanulacion IS NULL
        	and p.fechautilizacion IS NULL
        	";
        	
        	//Assume that you have connected to a database instance...
        	$statement = Doctrine_Manager::getInstance()->connection();
        	//$results = $statement->execute("SELECT * FROM paciente WHERE id = ?", array(1));
        	$results = $statement->execute($query);
        	$dataset	=	$results->fetchAll();
        	//var_dump($dataset);
        	return number_format($dataset[0]['Total'],2,'.','');
        }
        
        public function GetTotalRetenciones()
        {
        	$query	=	"
        	select sum(p.importe) as Total
        	from cobranza_detalle p
        	inner join cobranza op on op.id=p.cobranzaid
        	where op.fechaanulacion IS NULL
        	and p.pagotipoid in (6,7,8,9,10,11)
        	and p.retencionutilizada='NO'
        	";
        	 
        	//Assume that you have connected to a database instance...
        	$statement = Doctrine_Manager::getInstance()->connection();
        	//$results = $statement->execute("SELECT * FROM paciente WHERE id = ?", array(1));
        	$results = $statement->execute($query);
        	$dataset	=	$results->fetchAll();
        	//var_dump($dataset);
        	return number_format($dataset[0]['Total'],2,'.','');
        }
        
        // solo mostrar retenciones para proveedores IIBB, IVA, etc
        public function MostrarRetenciones($data)
        {
        	if(isset($data['ProveedorId']))
        	{
        		if(($data['ProveedorId']==168)||($data['ProveedorId']==175)||
        				($data['ProveedorId']==130)||($data['ProveedorId']==135))
        				return true;
        	}
        	
        	return false;
        }
        
        public function GetConceptosBancarios()
        {
        	$q	=	Doctrine_Query::create()
        	->from('BancoTipoConcepto b');
        	
        	return $q->execute();
        }
        
        public function GetHistorialEfectivo()
        {
        	$q	=	Doctrine_Query::create()
        	->from('HistorialEfectivo h')
        	->orderBy('h.Id DESC')
        	->limit(30);
        	 
        	return $q->execute();
        }
        
        /* 	- al anular una OP con cheque propio o tercero, anular cheque
        * 			- permitir anular OP si fue debitado el cheque propio?
        - al anular OP con transferencia, modificar saldo bancario
        - al anular OP con efectivo, modificar saldo efectivo
        - al anular OP con retencion, dejar vigente nuevamente la retencion
        */
        public function AnularOrdenDePago(OrdenDePago $op)
        {
        	$detalleDePago	=	$op->GetDetalleDePago();
        	
        	foreach ($detalleDePago as $d)
        	{
        		$PagoTipoId	=	$d->PagoTipoId;
        		
        		// si es un tipo de pago: Cheque propio (id = 1)
        		if($PagoTipoId == 1)
        		{
        			$Cheque		= Doctrine::getTable('Cheque')->FindOneById($d->ChequeId);
        			if(!is_object($Cheque))
        				throw new Exception('No existe el cheque para anular');
        			 
        			$Cheque->Estado	=	'Anulado';
        			$Cheque->FechaAnulacion	=	date('Y-m-d');
        			$Cheque->save();
        		}
        		// si pago con cheque tercero en cartera, cambiar estado
        		if($PagoTipoId == 4)
        		{
        			$Cheque		= Doctrine::getTable('Cheque')->FindOneById($d->ChequeId);
        			if(!is_object($Cheque))
        				throw new Exception('No existe el cheque para anular');
        			 
        			$Cheque->Estado	=	'En cartera';
        			$Cheque->save();
        		}
        		
        		// si pague con retencion, la creo nuevamente al anular
        		if(($PagoTipoId == 6)||($PagoTipoId ==7)||($PagoTipoId == 8)
        				||($PagoTipoId == 9)||($PagoTipoId == 10)||($PagoTipoId == 11))
        		{
        			
        			$detalle		= Doctrine::getTable('CobranzaDetalle')->FindOneById($d->RetencionUtilizadaId);
        			if(!is_object($detalle))
        				throw new Exception('No existe la retencion');
        			// se marca la retencion utilizada
        			$detalle->RetencionUtilizada	=	'NO';
        			$detalle->save();
        		}
        		
        		// si es efectivo, incrementar saldo en efectivo
        		if($PagoTipoId == 2)
        		{
        			$Configuracion = Doctrine::GetTable ( 'Configuracion' )->FindOneByNombre('SaldoEfectivo');
        			$Configuracion->Valor +=	$d->Importe;
        			$Configuracion->save();
        			
        			$data['Detalle'] = 'OP #' . $op->Id . ' anulada';
        			$data['Importe']	=	$d->Importe;
        			$data['Saldo']	=	$Configuracion->Valor;
        			$data['Debe']	=	$data['Importe'];
        			
        			$g = new Classes_GestionEconomicaManager();
        			$g->AddHistorialEfectivo($data);
        		}
        		
        		// si es un tipo de pago: transferencia (id = 13),
        		// - actualizar saldo de la cuenta de banco asociada
        		if($PagoTipoId == 13)
        		{
        			list($banco, $cuenta)	=	explode('-', $d->Detalle);
        			
        			if(isset($cuenta) && is_numeric($cuenta))
        			{
        		
        				$banco		= Doctrine::getTable('Banco')->FindOneByNumeroDeCuenta($cuenta);
        				if(!is_object($banco))
        					throw new Exception('El banco ingresado no existe');
        		
        				$ctacte		=	new Classes_CuentaCorrienteManager();
        				$data['Debe']	=	$d->Importe;
        				$data['Saldo']	=	$banco->SaldoCuenta;
        				$data['BancoId']	=	$banco->Id;
        				$data['Detalle']	=	'Tranferencia bancaria de OP '.$op->Numero. ' anulada';
        				$ctacte->AddConceptoBancoCuentaCorriente($data);
        			}
        		}
        		
        	}
        }
        
        /* 	- al anular una CO con cheque tercero
         * 			- permitir anular CO si fue debitado el cheque propio?
        - al anular CO con transferencia, modificar saldo bancario
        - al anular CO con efectivo, modificar saldo efectivo
        - al anular CO con retencion, no debe existir mas la retencion
        */
        public function AnularCobranza(Cobranza $co)
        {
        	$detalleDePago	=	$co->GetDetalleDePago();
        	 
        	foreach ($detalleDePago as $d)
        	{
        		$PagoTipoId	=	$d->PagoTipoId;
        
        		// si pago con cheque tercero en cartera, cambiar estado
        		if($PagoTipoId == 4)
        		{
        			$Cheque		= Doctrine::getTable('Cheque')->FindOneById($d->ChequeId);
        			if(!is_object($Cheque))
        				throw new Exception('No existe el cheque para anular');
        
        			$Cheque->Estado	=	'Anulado';
        			$Cheque->save();
        		}
        
        		// si pague con retencion, al anular cobranza, no queda mas para utilizar
        		if(($PagoTipoId == 6)||($PagoTipoId ==7)||($PagoTipoId == 8)
        				||($PagoTipoId == 9)||($PagoTipoId == 10)||($PagoTipoId == 11))
        		{
        			 
        			// no hacer nada porque no son mas mostradas por tener fecha de anulacion
        		}
        
        		// si es efectivo, decrementar saldo en efectivo
        		if($PagoTipoId == 2)
        		{
        			$Configuracion = Doctrine::GetTable ( 'Configuracion' )->FindOneByNombre('SaldoEfectivo');
        			$Configuracion->Valor -=	$d->Importe;
        			$Configuracion->save();
        
        			$data['Detalle'] = 'CO #' . $co->Id . ' anulada';
        			$data['Importe']	=	$co->Importe;
        			$data['Saldo']	=	$Configuracion->Valor;
        			$data['Haber']	=	$data['Importe'];
        
        			$g = new Classes_GestionEconomicaManager();
        			$g->AddHistorialEfectivo($data);
        		}

        		// si es un tipo de pago: transferencia (id = 13),
        		// - actualizar saldo de la cuenta de banco asociada
        		if($PagoTipoId == 13)
        		{
        			list($banco, $cuenta)	=	explode('-', $d->Detalle);
        			
        			if(isset($cuenta) && is_numeric($cuenta))
        			{
        				$banco		= Doctrine::getTable('Banco')->FindOneByNumeroDeCuenta($cuenta);
        				if(!is_object($banco))
        					throw new Exception('El banco ingresado no existe');
        
        				$ctacte		=	new Classes_CuentaCorrienteManager();
        				$data['Haber']	=	$d->Importe;
        				$data['Saldo']	=	$banco->SaldoCuenta;
        				$data['BancoId']	=	$banco->Id;
        				$data['Detalle']	=	'Tranferencia bancaria de CO '.$co->Numero. ' anulada';
        				$ctacte->AddConceptoBancoCuentaCorriente($data);
        			}
        		}
        
        	}
        }
        
        public function GetNotasCreditoPendientes($data)
        {
        	$q	=	Doctrine_Query::create()
        	->from('NotaCredito n')
        	->andWhere('n.FechaAnulacion IS NULL')
        	->andWhere('n.OrdenDePagoId IS NULL');
        	 
        	if(isset($data['ClienteId']))
        	{
        		$q->andWhere('n.ClienteId = ?', $data['ClienteId']);
        	}
        	
        	return $q->execute();
        }
        /*
         * puede ser blanco o negro
         */
        public function GetTotalOrdenesDeCompraPendientesDePago($CondicionDePago=null)
        {
        	$filters=array();
        	$OCQuery	=	Doctrine::GetTable ( 'OrdenDeCompra' )->GetPendientesDePago($filters);
        	
        	if($CondicionDePago=='B')
        	{
        		$OCQuery->andWhere('oc.TipoIvaId <> ?', 12); // que no sea en negro
        	}
        	if($CondicionDePago=='N')
        	{
        		$OCQuery->andWhere('oc.TipoIvaId = ?', 12); // 12: en negro
        	}
        	
        	$ordenes	= $OCQuery->execute();
        	
        	$total = 0;
        	foreach ($ordenes as $o)
        	{
        		$total += $o->ImportePendienteDePago;
        	}
        	
        	return $total;
        }
        
        public function GetTotalChequesBlanco()
        {
        	$filters=array();
        	$filters['TipoDePago'] = 'B';
        	$q	=	Doctrine::GetTable ( 'Cheque' )->ChequesTerceros($filters);
        	$cheques	= $q->execute();
        	 
        	$total = 0;
        	foreach ($cheques as $o)
        	{
        		$total += $o->Importe;
        	}
        	 
        	return $total;
        }
        
        public function GetTotalChequesNegro()
        {
        	$filters=array();
        	$filters['TipoDePago'] = 'N';
        	$q	=	Doctrine::GetTable ( 'Cheque' )->ChequesTerceros($filters);
        	$cheques	= $q->execute();
        
        	$total = 0;
        	foreach ($cheques as $o)
        	{
        		$total += $o->Importe;
        	}
        
        	return $total;
        }
        
        public function GetNotasCreditoDebitoPendientes($data)
        {
        	if(isset($data['ProveedorId']))
        	{
        		$q	=	Doctrine_Query::create()
        		->from('FacturaCompra fc')
        		->andWhere('fc.FechaAnulacion IS NULL')
        		->andWhere('fc.TipoNota IS NOT NULL')
        		->andWhere('fc.OrdenDePagoId IS NULL')
        		// NC o ND
        		->andWhere('fc.ProveedorId = ?', $data['ProveedorId']);
        		
        		// quitar las agregadas en session
        		$s	=	new Classes_Session();
        		$s->Session();
        		$pagos	=	$s->GetPagosLiquidadosOrdenDePago();
        			
        		if(count($pagos))
        		{
        			foreach ($pagos as $p)
        			{
        				if(isset($p['NotaCreditoId']))
        				{
        					$q->andWhere('fc.NumeroInterno <> ?', $p['NotaCreditoId']);
        				}
        			}
        		
        		}
        		
        		return $q->execute();
        	}	
        }
        
        public function GetEstadosCheques()
        {
        	$estados = array();
        	
        	/*
        	 *  Debitado
				Pagado
				Acreditado
				Pendiente debitar
				Anulado
				Pendiente acreditar
				En cartera
        	 */
        	
        	$estados[1] = 'Debitado';
        	$estados[2] = 'Pagado';
        	$estados[3] = 'Acreditado';
        	$estados[4] = 'Pendiente debitar';
        	$estados[5] = 'Pendiente acreditar';
        	$estados[6] = 'En cartera';
        	$estados[7] = 'Anulado';

        	return $estados;
        	/*
        	$query	=	"
        	select distinct c.estado Nombre 
			from cheque c
        	";
        	
        	//Assume that you have connected to a database instance...
        	$statement = Doctrine_Manager::getInstance()->connection();
        	//$results = $statement->execute("SELECT * FROM paciente WHERE id = ?", array(1));
        	$results = $statement->execute($query);
        	$dataset	=	$results->fetchAll();
        	
        	return $dataset;
        	//return number_format($dataset[0]['PendienteAcreditar'],2,'.','');
        	 * 
        	 */
        }
        
        public function GetNotasCredito($filters)
        {
        	$q = Doctrine_Query::create()
        	->from('NotaCredito nc');
        	//->whereIn('u.id', array(1, 2, 3));
        	
        	return $q;
        }
        
    }
?>