<?php
/**
 */
class FacturaTable extends Doctrine_Table
{
	public function GetByFilter($filters)
	{
			$q	=	Doctrine_Query::create()
					->from('Factura')
					->leftJoin('Factura.CobranzaLiquidaciones cl');

			if(isset($filters['FechaDesde']) and ($filters['FechaDesde'] != 'Fecha desde') and ($filters['FechaDesde'] != ''))
			{
				$FechaDesde	=	$filters['FechaDesde'];
			
				
				$dateHelper = new Classes_DateHelper();
            
            
                $q->andWhere('Factura.Fecha >= ?', $dateHelper->fromViewFormat($FechaDesde));
            }
            
			if(isset($filters['FechaHasta'])  and ($filters['FechaHasta'] != 'Fecha hasta') and ($filters['FechaHasta'] != ''))
			{
				
				$FechaHasta	=	$filters['FechaHasta'];
				
				
				$dateHelper = new Classes_DateHelper();
            
            
                $q->andWhere('Factura.Fecha <= ?', $dateHelper->fromViewFormat($FechaHasta));
            }
            
			if(isset($filters['FacturaId']) and is_numeric($filters['FacturaId']))
			{
				$FacturaId	=	$filters['FacturaId'];
			
            
                $q->andWhere('Factura.Id = ?', $FacturaId);
            }
            
			if(isset($filters['ClienteNombre']) and ($filters['ClienteNombre'] != 'Nombre de cliente'))
			{
				$Cliente	=	$filters['ClienteNombre'];
			
            
                $q->innerJoin('Factura.Cliente c')
                	->andWhere('c.Nombre LIKE ?', '%'.$Cliente.'%');
            }
            
			if(isset($filters['FacturaTipo']))
			{
				$tipo	=	$filters['FacturaTipo'];
				
				if(($tipo == 'A') or ($tipo == 'B') or ($tipo == 'N'))
				{
	                $q->innerJoin('Factura.TipoIva t')
	                	->andWhere('t.letra_comp = ?', $tipo);	
				}
            }
					
			return $q;
	}
	
	public function GetSaldos($filters)
	{
		//$q	=	$this->GetByFilter($filters);
		// facturas no pagas y no anuladas
			 $q = Doctrine_Query::create()
        		    ->select('f.*,
        		    		(SELECT SUM(pa.Importe) FROM Pago pa WHERE f.Id = pa.FacturaId) AS Pagado,
        		    		(f.Importe - (SELECT SUM(pag.Importe) FROM Pago pag WHERE f.Id = pag.FacturaId)) as Pendiente,
        		    		(SELECT SUM(cre.Importe) FROM Credito cre WHERE cre.ClienteId = f.ClienteId) as Credito'
        		    )
            			->from('Factura f')
            			->AndWhere('ISNULL(f.Pagado)')
            			->AndWhere('ISNULL(f.FechaAnulacion)')
            			->orderBy('Pendiente ASC');
				
				if(isset($filters['FechaDesde']) and ($filters['FechaDesde'] != 'Fecha desde') and ($filters['FechaDesde'] != ''))
			{
				$FechaDesde	=	$filters['FechaDesde'];
			
				
				$dateHelper = new Classes_DateHelper();
            
            
                $q->andWhere('f.Fecha >= ?', $dateHelper->fromViewFormat($FechaDesde));
            }
            
			if(isset($filters['FechaHasta'])  and ($filters['FechaHasta'] != 'Fecha hasta') and ($filters['FechaHasta'] != ''))
			{
				
				$FechaHasta	=	$filters['FechaHasta'];
				
				
				$dateHelper = new Classes_DateHelper();
            
            
                $q->andWhere('f.Fecha <= ?', $dateHelper->fromViewFormat($FechaHasta));
            }
            
			if(isset($filters['VendedorId']) and is_numeric($filters['VendedorId']))
			{
				$VendedorId	=	$filters['VendedorId'];
				
					$q->leftJoin('f.Cliente c')
                		->andWhere('c.VendedorId = ?', $VendedorId)
                		->orderBy('c.RazonSocial ASC');
            }
            
			if(isset($filters['ClienteNombre']) and ($filters['ClienteNombre'] != 'Nombre de cliente'))
			{
				$Cliente	=	$filters['ClienteNombre'];
			
            
                $q->innerJoin('f.Cliente cli')
                	->andWhere('cli.RazonSocial LIKE ?', '%'.$Cliente.'%');
            }
	
            //echo $q->getSqlQuery();
			return $q;
		
	}
	
	public function GetImporteTotal($filters)
	{		
            // facturas no pagas y no anuladas
			 $q = Doctrine_Query::create()
        		    ->select('SUM(f.Importe) as Importe')
            			->from('Factura f')
            			->AndWhere('ISNULL(f.Pagado)')
            			->AndWhere('ISNULL(f.FechaAnulacion)');	
		
			if(isset($filters['FechaDesde']) and ($filters['FechaDesde'] != 'Fecha desde') and ($filters['FechaDesde'] != ''))
			{
				$FechaDesde	=	$filters['FechaDesde'];
			
				$dateHelper = new Classes_DateHelper();
            
                $q->andWhere('f.Fecha >= ?', $dateHelper->fromViewFormat($FechaDesde));
            }
            
			if(isset($filters['FechaHasta'])  and ($filters['FechaHasta'] != 'Fecha hasta') and ($filters['FechaHasta'] != ''))
			{
				
				$FechaHasta	=	$filters['FechaHasta'];
				
				
				$dateHelper = new Classes_DateHelper();
            
            
                $q->andWhere('f.Fecha <= ?', $dateHelper->fromViewFormat($FechaHasta));
            }
            
			if(isset($filters['VendedorId']) and is_numeric($filters['VendedorId']))
			{
				$VendedorId	=	$filters['VendedorId'];
				
					$q->leftJoin('f.Cliente c')
                		->andWhere('c.VendedorId = ?', $VendedorId);
            }
            
			if(isset($filters['ClienteNombre']) and ($filters['ClienteNombre'] != 'Nombre de cliente'))
			{
				$Cliente	=	$filters['ClienteNombre'];
			
            
                $q->innerJoin('f.Cliente cli')
                	->andWhere('cli.RazonSocial LIKE ?', '%'.$Cliente.'%');
            }
    
            $p	=	$q->fetchOne();
			return $p['Importe'];
		
	}
	
	public function GetImportePagado($filters)
	{
		// importe pagado de facturas no pagas ni anuladas
		$q = Doctrine_Query::create()
        		    ->select('SUM(p.Importe) AS Pagado')
            			->from('Factura f')
            			->innerJoin('f.Pagos p')
            			->AndWhere('ISNULL(f.Pagado)')
            			->AndWhere('ISNULL(f.FechaAnulacion)');
			
				if(isset($filters['FechaDesde']) and ($filters['FechaDesde'] != 'Fecha desde') and ($filters['FechaDesde'] != ''))
			{
				$FechaDesde	=	$filters['FechaDesde'];
			
				
				$dateHelper = new Classes_DateHelper();
            
            
                $q->andWhere('f.Fecha >= ?', $dateHelper->fromViewFormat($FechaDesde));
            }
            
			if(isset($filters['FechaHasta'])  and ($filters['FechaHasta'] != 'Fecha hasta') and ($filters['FechaHasta'] != ''))
			{
				
				$FechaHasta	=	$filters['FechaHasta'];
				
				
				$dateHelper = new Classes_DateHelper();
            
            
                $q->andWhere('f.Fecha <= ?', $dateHelper->fromViewFormat($FechaHasta));
            }
            
			if(isset($filters['VendedorId']) and is_numeric($filters['VendedorId']))
			{
				$VendedorId	=	$filters['VendedorId'];
				
					$q->leftJoin('f.Cliente c')
                		->andWhere('c.VendedorId = ?', $VendedorId);
            }
            
			if(isset($filters['ClienteNombre']) and ($filters['ClienteNombre'] != 'Nombre de cliente'))
			{
				$Cliente	=	$filters['ClienteNombre'];
			
            
                $q->innerJoin('f.Cliente cli')
                	->andWhere('cli.RazonSocial LIKE ?', '%'.$Cliente.'%');
            }
            
            
				
	
            //echo $q->getSqlQuery();
            $p	=	$q->fetchOne();
			return $p['Pagado'];
		
	}
	
	public function GetUltimoNumeroFactura($LetraFactura = null)
	{
		if(isset($LetraFactura) and ($LetraFactura == 'B'))
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
						return $facturaB->Id; 
			
					$factory	= IDS_Factory_Manager::GetFactory();
					$config		= $factory->GetConfig();
					
					$Default	=	$config->Get('bussiness.numerofacturaB');
					
					return $Default;
		}
		
		/* si es factura A: obtener numero */
		
		
		$q	=	Doctrine_Query::create()
					->select('f.Id')
					->from('Factura f')
					->orderBy('f.Id DESC')
					->innerJoin('f.TipoIva ti')
					->andWhere('ti.Letra_comp = ?', 'A')
					->limit(1);
					
		if(is_object($q->fetchOne()))
			return $q->fetchOne()->Id; 

		$factory	= IDS_Factory_Manager::GetFactory();
		$config		= $factory->GetConfig();
				
		$Default	=	$config->Get('bussiness.numerofactura');
		
		
		return $Default;
					
	}
	
	/* falta terminar query
	 * -se realizo delegando a factura cuando es el total cobrado
	 * - se realiza en metodo cliente->getfacturaspendientes
	 * @2011-11-28
	 */
	public function GetPendientesDeCobro($filters)
	{
		$subselect	=	'(
        SELECT SUM(o3.importe)
		FROM CobranzaLiquidacion o3
		WHERE o3.facturaid = f.id 
        ) as ImporteAbonado';
		
		$q	=	Doctrine_Query::create()
				->from('Factura f')
				->leftJoin('f.CobranzaLiquidaciones cl')
				->leftJoin('f.OrdenesDeTrabajo ot')
				->AndWhere('f.fechaanulacion IS NULL')
				->andWhereIn('f.Id', $this->GetPendientesDeCobroIds())
				->OrderBy('f.FechaVencimiento ASC');
				
				
			if(isset($filters['ClienteId']) and is_numeric($filters['ClienteId']))
			{
				$ClienteId	=	$filters['ClienteId'];
			
                	//->innerJoin('f.CobranzaLiquidaciones cl')
            
                $q->andWhere('f.ClienteId = ?', $ClienteId);
                	//->andWhere('f.Importe > (select SUM(c.importe) from CobranzaLiquidacion as c where c.facturaid = f.id)');
                	
            }
            //echo $q->getSqlQuery();
        return $q;
	}
	
	/* - todas las facturas cuya suma de importes liquidados
	 * no superen el importe de la factura
	 */
    public function GetPendientesDeCobroIds()
    {
    	$ids = array();
    	
    	$q  = Doctrine_Query::create()
                ->from('Factura f')
                ->andWhere('ISNULL(f.fechaanulacion)');
//echo $q->GetSqlQuery();                
        $facturas = $q->execute();
        
        foreach($facturas as $f)
        {
        	if($f->TieneImportePendiente())
        	{
        		$ids[] = $f->Id;
        	}
        }   

        return $ids;
    }	
	public function GetLiquidadasEnCobranza($filters)
	{
		$q	=	Doctrine_Query::create()
					->from('Factura f')
					->innerJoin('f.CobranzaLiquidaciones co')
					->where('co.cobranzaid = ?', $filters['CobranzaId']);
		return $q;
	}
	
	/* 
	 * @deprecated 2011-12-21
	 */
	public function __GetSaldos($filters)
	{
		//$q	=	$this->GetByFilter($filters);
		// facturas no pagas y no anuladas
			 $q = Doctrine_Query::create()
        		    ->select('f.*,
        		    		(SELECT SUM(pa.Importe) FROM Pago pa WHERE f.Id = pa.FacturaId) AS Pagado,
        		    		(f.Importe - (SELECT SUM(pag.Importe) FROM Pago pag WHERE f.Id = pag.FacturaId)) as Pendiente,
        		    		(SELECT SUM(cre.Importe) FROM Credito cre WHERE cre.ClienteId = f.ClienteId) as Credito'
        		    )
            			->from('Factura f')
            			->AndWhere('ISNULL(f.Pagado)')
            			->AndWhere('ISNULL(f.FechaAnulacion)')
            			->orderBy('Pendiente ASC');
				
				if(isset($filters['FechaDesde']) and ($filters['FechaDesde'] != 'Fecha desde') and ($filters['FechaDesde'] != ''))
			{
				$FechaDesde	=	$filters['FechaDesde'];
			
				
				$dateHelper = new Classes_DateHelper();
            
            
                $q->andWhere('f.Fecha >= ?', $dateHelper->fromViewFormat($FechaDesde));
            }
            
			if(isset($filters['FechaHasta'])  and ($filters['FechaHasta'] != 'Fecha hasta') and ($filters['FechaHasta'] != ''))
			{
				
				$FechaHasta	=	$filters['FechaHasta'];
				
				
				$dateHelper = new Classes_DateHelper();
            
            
                $q->andWhere('f.Fecha <= ?', $dateHelper->fromViewFormat($FechaHasta));
            }
            
			if(isset($filters['VendedorId']) and is_numeric($filters['VendedorId']))
			{
				$VendedorId	=	$filters['VendedorId'];
				
					$q->leftJoin('f.Cliente c')
                		->andWhere('c.VendedorId = ?', $VendedorId)
                		->orderBy('c.RazonSocial ASC');
            }
            
			if(isset($filters['ClienteNombre']) and ($filters['ClienteNombre'] != 'Nombre de cliente'))
			{
				$Cliente	=	$filters['ClienteNombre'];
			
            
                $q->innerJoin('f.Cliente cli')
                	->andWhere('cli.RazonSocial LIKE ?', '%'.$Cliente.'%');
            }
	
            //echo $q->getSqlQuery();
			return $q;
		
	}
	
}