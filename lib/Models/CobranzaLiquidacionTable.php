<?php
/**
 */
class CobranzaLiquidacionTable extends Doctrine_Table
{
	public function GetByFilter($filters)
	{
		$q	=	Doctrine_Query::create()
				->from('CobranzaLiquidacion cl');
				
		if(isset($filters['FacturaId']) and is_numeric($filters['FacturaId']))
		{
				$FacturaId	=	$filters['FacturaId'];
            
                $q->andWhere('cl.FacturaId = ?', $FacturaId);
                	
        }

        // ANULADAS: SI/NO
        if(isset($filters['Anuladas']))
        {
        	$FacturaId	=	$filters['Anuladas'];
        
        	$q->innerJoin('cl.Cobranza c')	
        		->andWhere('c.FechaAnulacion IS NULL');
        	 
        }
            
        return $q;
	}
}