<?php
/**
 */
class NotaDebitoTable extends Doctrine_Table
{
	public function GetByFilter($filters)
	{
		$q	=	Doctrine_Query::create()
				->from('NotaDebito nd');
	
		if(isset($filters['OrdenDePagoId']) and is_numeric($filters['OrdenDePagoId']))
		{
			$OrdenDePagoId	=	$filters['OrdenDePagoId'];
	
			$q->andWhere('op.Numero = ?', $OrdenDePagoId);
			 
		}
	
		if(isset($filters['FechaDesde']) and ($filters['FechaDesde'] != 'Fecha desde'))
		{
			$FechaDesde	=	$filters['FechaDesde'];
			if($FechaDesde != '')
			{
	
				$dateHelper = new Classes_DateHelper();
	
				$q->andWhere('op.Fecha >= ?', $dateHelper->fromViewFormat($FechaDesde));
			}
		}
	
	
		if(isset($filters['FechaHasta']) and ($filters['FechaHasta'] != 'Fecha hasta'))
		{
			$FechaHasta = $filters['FechaHasta'];
	
			if($FechaHasta != '')
			{
	
				$dateHelper = new Classes_DateHelper();
	
				$q->andWhere('op.Fecha <= ?', $dateHelper->fromViewFormat($FechaHasta));
			}
		}
	
	
		if(isset($filters['ProveedorId']) and is_numeric($filters['ProveedorId']))
		{
			$ProveedorId	=	$filters['ProveedorId'];
	
			$q->andWhere('op.ProveedorId = ?', $ProveedorId);
		}
		
		return $q;
	}
	
}