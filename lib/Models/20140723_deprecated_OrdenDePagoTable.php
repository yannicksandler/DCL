<?php
/**
 */
class OrdenDePagoTable extends Doctrine_Table
{
	public function GetByFilter($filters)
	{
		$subselect	=	'(
        SELECT SUM(p.importe)
		FROM pago p
		WHERE op.id = p.ordendepagoid
        ) as TotalPagos';
		$q	=	Doctrine_Query::create()
					->select('*, '.$subselect)
                    ->from('OrdenDePago op');
            
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
        	/*
			if(isset($filters['OrdenDeCompraId']) and is_numeric($filters['OrdenDeCompraId']))
            {
                $OrdenDeCompraId	=	$filters['OrdenDeCompraId'];	
                $q->andWhere('oc.Id = ?', $OrdenDeCompraId);
                
            }
            
            if(isset($filters['OrdenDeTrabajoId']))
            {
            	$ordenid	=	$filters['OrdenDeTrabajoId'];
            	
            	$q->innerJoin('oc.Insumo i')
            		->innerJoin('i.Orden o')
            		->andWhere('o.Id = ?', $ordenid);
            }
			*/
        return $q;
	}
	

    public function GetResumen($filters)
    {
    	$r = array();
    	
    	$q	=	$this->GetByFilter($filters);
    	
    	$ordenes	=	$q->execute();
    	
    	$total=0;
    	
    	foreach($ordenes as $o)
    	{
    		/* contar importe de las no anuladas */
    		if(! $o->FechaAnulacion)
    		{
    			$total += $o->GetPagoTotal();
    		}
    	}
    	
    	$r['TotalPagos'] = $total;
    	
    	return $r;
    }	
    
    public function GetOrdenesDePagoConFacturaCompra()
    {
    	$q	=	Doctrine_Query::create()
    		->from('OrdenDePago op')
    		->innerJoin('op.FacturasCompra');
    	
    	return $q;
    }
}