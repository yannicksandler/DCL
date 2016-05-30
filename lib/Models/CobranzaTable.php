<?php
/**
 */
class CobranzaTable extends Doctrine_Table
{
	public function GetByFilter($filters)
	{
		/*
		$subselect	=	'(
        SELECT SUM(d.importe)
		FROM cobranzadetalle d
		WHERE c.id = d.cobranzaid
        ) as TotalPagos';
        */
		$q	=	Doctrine_Query::create()
					//->select('*, '.$subselect)
					->select('*')
                    ->from('Cobranza c')
                    ->innerJoin('c.Cliente cl');
            
            if(isset($filters['CobranzaId']) and is_numeric($filters['CobranzaId']))
            {
            	$CobranzaId	=	$filters['CobranzaId'];
           	
                $q->andWhere('c.Id = ?', $CobranzaId);
             
            }
            
			if(isset($filters['FechaDesde']) and ($filters['FechaDesde'] != 'Fecha desde'))
            {
            	$FechaDesde	=	$filters['FechaDesde'];
            	if($FechaDesde != '')
            	{
                
                $dateHelper = new Classes_DateHelper();
            
                $q->andWhere('c.Fecha >= ?', $dateHelper->fromViewFormat($FechaDesde));
            	}
            }
            
            
            if(isset($filters['FechaHasta']) and ($filters['FechaHasta'] != 'Fecha hasta'))
            {
                $FechaHasta = $filters['FechaHasta'];
                
               	if($FechaHasta != '')
            	{
            
                $dateHelper = new Classes_DateHelper();

                $q->andWhere('c.Fecha <= ?', $dateHelper->fromViewFormat($FechaHasta));
            	}
            }
            
        
        	if(isset($filters['ClienteId']) and is_numeric($filters['ClienteId']))
        	{
        		$ClienteId	=	$filters['ClienteId'];
        		
     			$q->andWhere('c.ClienteId = ?', $ClienteId);   		
        	}
        	
        	if(isset($filters['Numero']) and is_numeric($filters['Numero']))
        	{
        		$Numero	=	$filters['Numero'];
        	
        		$q->andWhere('c.Numero = ?', $Numero);
        		 
        	}
        	//echo $q->getSqlQuery();
        return $q;
	}
	

    public function GetResumen($filters)
    {
    	$r = array();
    	
    	$q	=	$this->GetByFilter($filters);
    	
    	$cobros	=	$q->execute();
    	
    	$total=0;
    	
    	foreach($cobros as $c)
    	{
    		/* contar importe de las no anuladas */
    		if(! $c->FechaAnulacion)
    		{
    			$total += $c->GetPagoTotal();
    		}
    	}
    	
    	$r['TotalPagos'] = $total;
    	
    	return $r;
    }
}