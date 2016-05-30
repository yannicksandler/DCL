<?php
/**
 */
class FacturaCompraTable extends Doctrine_Table
{
	public function ExisteFactura(FacturaCompra $f)
	{
		$q	=	Doctrine_Query::create()
				->from('FacturaCompra fc')
				->where('fc.Numero = ?', $f->Numero)
				->andWhere('fc.TipoIvaId = ?', $f->TipoIvaId)
				->andWhere('fc.ProveedorId = ?', $f->ProveedorId)
				->andWhere('fc.FechaAnulacion IS NULL');
		
		if(count($q) >= 1)
			return true;
		
		return false;
	}
	
	/* una factura pendiente de pago es cuando
	 * - no esta anulada
	 * - la suma total liquidada en las ordenes de pago es menor al importe de la factura
	 */
	public function GetPendientesDePago($filters)
	{
		// obtener IDs de las facturas no paga y agregar where in
		//$OrdenesDePagoIds	=	Doctrine_Query::create()
			//						->from('OrdenDePago');
		
		$q	=	$this->GetByFilter($filters);
		
		$q->andWhere('f.FechaAnulacion IS NULL');
		// dado que Doctrine hace complejo hacer querys complejos
		// se agrega atributo PendienteDePago = SI/NO
		$q->andWhere('f.PendienteDePago = ?', 'SI');
		
		if(isset($filters['TipoDePago']))
		{
			if($filters['TipoDePago'] == 'B')
			{
				$q->andWhereIn('f.TipoIvaId', array(1,2,3,4,5,6,7,8,9,10,11,13,14));
			}
			if($filters['TipoDePago'] == 'N')
			{
				$q->andWhereIn('f.TipoIvaId', array(12));
			}
		}
		$q->orderBy('f.FechaVencimiento DESC');
		
		return $q;
	}
	
	public function GetByFilter($filters)
	{
		$q	=	Doctrine_Query::create()
			->from('FacturaCompra f');
		
	
		if(isset($filters['FechaDesde']) and ($filters['FechaDesde'] != 'Fecha desde') and ($filters['FechaDesde'] != ''))
		{
			$FechaDesde	=	str_replace("_", "/", $filters['FechaDesde']);
				
	
			$dateHelper = new Classes_DateHelper();
	
	
			$q->andWhere('f.Fecha >= ?', $dateHelper->fromViewFormat($FechaDesde));
		}
	
		if(isset($filters['FechaHasta'])  and ($filters['FechaHasta'] != 'Fecha hasta') and ($filters['FechaHasta'] != ''))
		{
	
			$FechaHasta	=	str_replace("_", "/", $filters['FechaHasta']);
	
			$dateHelper = new Classes_DateHelper();
	
	
			$q->andWhere('f.Fecha <= ?', $dateHelper->fromViewFormat($FechaHasta));
		}
	
		
		if(isset($filters['Numero']) and is_numeric($filters['Numero']))
		{
			$q->andWhere('f.Numero = ?', $filters['Numero']);
		}
	
		if(isset($filters['ProveedorNombre']) and ($filters['ProveedorNombre'] != 'Nombre proveedor') and ($filters['ProveedorNombre'] != ''))
		{
			$nombre	=	$filters['ProveedorNombre'];
				
	
			$q->innerJoin('f.Proveedor p')
			->andWhere('p.Nombre LIKE ?', '%'.$nombre.'%');
		}
	
		if(isset($filters['FacturaTipo']))
		{
			$tipo	=	$filters['FacturaTipo'];
	
			if(($tipo == 'A') or ($tipo == 'B') or ($tipo == 'N'))
			{
				$q->innerJoin('f.TipoIva t')
				->andWhere('t.letra_comp = ?', $tipo);
			}
		}
		
		if(isset($filters['ProveedorId']) and is_numeric($filters['ProveedorId']))
		{
			$q->andWhere('f.ProveedorId = ?', $filters['ProveedorId']);
		}
		
		if(isset($filters['TipoIvaId']) and is_numeric($filters['TipoIvaId']))
		{
			$q->andWhere('f.TipoIvaId = ?', $filters['TipoIvaId']);
		}
		//echo $q->getSqlQuery();
		return $q;
	}
	
	public function GetProximoNumeroFactura($letra)
	{
		$numero;
		// si es factura en negro 
		// (se usa cuando se genera una factura en negro porque se genero una OC negro)
		if($letra == 'N')
		{
			$q	=	Doctrine_Query::create()
			->from('FacturaCompra f')
			->innerJoin('f.TipoIva t')
			->andWhere('t.letra_comp = ?', $letra)
			->andWhere('f.FechaAnulacion IS NULL')
			->orderBy('f.Numero DESC') // tener en cuenta el orden porque si anulo pone prefijo ANULADA_
			->limit(1);
			
			//echo $q->getSqlQuery();
			$fc	=	$q->fetchOne();
			if(is_object($fc))
				return ($fc->Numero + 1);
			
			
			return 1000000;
			
		}
	}
	
	// obtiene una factura de compra para marcarla pendiente de pago cuando se anula OP
	public function BuscarFactura($filters)
	{
		$facturas = $this->GetByFilter($filters)->execute();
		
		foreach($facturas as $f)
		{
			return $f;
		}
	}
	
}