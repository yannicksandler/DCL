<?php
/**
 */
class InsumoTable extends Doctrine_Table
{
    public function GetElegidos()
    {
        $q  = Doctrine_Query::create()
                ->from('Insumo')
                ->innerJoin('Insumo.OrdenDeCompra oc')
                ->where('Insumo.Elegido = \'SI\'');
                //->orderBy('ocOrden.Fecha DESC');
                
        //echo $q->GetSqlQuery();
                
        return $q;
    }
    
    public function GetEntregasPendientesProduccion($filters)
    {
    	$enProduccion	=	Doctrine::getTable('OrdenEstado')->FindOneByNombre('En produccion');
    	if(!is_object($enProduccion))
    		echo 'Error: no fue encontrado el estado En produccion';
    		
    	$subselectDiasRestantesEntrega	=	'(select datediff(DATE_ADD(oc.fecha, INTERVAL i.plazodeentrega DAY), date_format(now(), \'%Y-%m-%d\'))) as DiasRestantesEntrega';
    	$subselect	=	'(select datediff(ot.fechafin, date_format(now(), \'%Y-%m-%d\'))) as DiasParaFinalizar,'.$subselectDiasRestantesEntrega;
    	
    	$q  = Doctrine_Query::create()
    			->select('*, '.$subselect)
                ->from('Insumo i')
                ->innerJoin('i.OrdenDeCompra oc')
                ->innerJoin('i.Orden ot')
                ->where('i.Elegido = ?','SI')
                ->andWhere('ot.EstadoId = ?',$enProduccion->Id)
                ->andWhere('ISNULL(i.fechadeentrega)')
                ->orderBy('DiasRestantesEntrega ASC');
                
    		if(isset($filters['NombreProveedor']) and ($filters['NombreProveedor'] != 'Nombre proveedor'))
            {
                $NombreProveedor = $filters['NombreProveedor'];
                $q->innerJoin('i.Proveedor p')
                            ->andWhere('p.Nombre LIKE ?', '%'.$NombreProveedor.'%');
                
                
            }
            
           	if(isset($filters['NombreInsumo']) and ($filters['NombreInsumo'] != 'Nombre insumo'))
            {
                $NombreInsumo = $filters['NombreInsumo'];
                $q->andWhere('i.Nombre LIKE ?', '%'.$NombreInsumo.'%');
                
                
            }
            
        
            
        	
            
            if(isset($filters['OrdenDeTrabajoId']) and (is_numeric($filters['OrdenDeTrabajoId'])))
            {
                $q->andWhere('ot.Id = ?', $filters['OrdenDeTrabajoId']);
                
            }                
/*
					$factory	= IDS_Factory_Manager::GetFactory();
					$config		= $factory->GetConfig();
					
					$Default	=	$config->Get('entorno.ordendetrabajoid');
                var_dump($Default);*/
        // filtrar por numero de orden para no contar las viejas
                
        //echo $q->GetSqlQuery();
                
        return $q;
    }
    
    public function getInsumos(	$NombreProveedor, $estadoOrdenId, $OrdenDeCompraId, 
    							$FechaDesde, $FechaHasta, $Pagado)
    {
            
            $insumosQuery   =   $this->GetElegidos();
            
            
                if(isset($FechaDesde) and ($FechaDesde != 'Fecha desde'))
            {
                $FechaDesde = str_replace("_", "/", $FechaDesde);
                $dateHelper = new Classes_DateHelper();
                //echo $dateHelper->fromViewFormat($FechaDesde);
            
                $insumosQuery
                //->innerJoin('Insumo.OrdenDeCompra oc')
                            ->andWhere('oc.Fecha >= ?', $dateHelper->fromViewFormat($FechaDesde));
            }
            
            
            if(isset($FechaHasta) and ($FechaHasta != 'Fecha hasta'))
            {
                $FechaHasta = str_replace("_", "/", $FechaHasta);
                $dateHelper = new Classes_DateHelper();

                //if(!(isset($FechaDesde)))
                //{
                //    $insumosQuery->innerJoin('Insumo.OrdenDeCompra oc');
                //}

                $insumosQuery->andWhere('oc.Fecha <= ?', substr($dateHelper->fromViewFormat($FechaHasta),0,10) . '23:59:59');
            }
            
            
    		if( ($Pagado == 'S' ) or ($Pagado == 'N') )
            {
                
                
                if($Pagado == 'S')
                {
                	
                	$insumosQuery
                			//->innerJoin('Insumo.OrdenDeCompra oc3')
                            ->andWhere('oc.Pagado = ?', 'S');
                }
                           
                
            	if($Pagado == 'N')
                {
              
                	$insumosQuery
                			//->andWhere('ISNULL(o.pagado)');
                			//->innerJoin('Insumo.OrdenDeCompra oc3')
                            ->andWhere('oc.Pagado <> \'S\'');
              
                }
                
                
                
            }
            
            if(isset($NombreProveedor) and ($NombreProveedor != 'Nombre_proveedor') )
            {
                
                //var_dump($NombreProveedor);
                $NombreProveedor = str_replace("_", " ", $NombreProveedor);
                //echo $NombreProveedor;
                $insumosQuery->innerJoin('Insumo.Proveedor p')
                            ->andWhere('p.Nombre LIKE ?', '%'.$NombreProveedor.'%');
                
                
            }
            
        	
            
            if(is_numeric($estadoOrdenId))
            {
                //echo $estadoOrdenId;
                $insumosQuery->innerJoin('Insumo.Orden o')
                            ->andWhere('o.EstadoId = ?', $estadoOrdenId);
                
                
            }
            
            
            if(is_numeric($OrdenDeCompraId))
            {
                //echo $estadoOrdenId;
                $insumosQuery->andWhere('Insumo.OrdenDeCompraId = ?', $OrdenDeCompraId);
                
            }
            
            //echo $insumosQuery->getSqlQuery();
            
            return $insumosQuery;
    }
    
    public function Total($NombreProveedor, $estadoOrdenId, $OrdenDeCompraId, $FechaDesde, $FechaHasta, $Pagado)
    {
            $insumosQuery  = Doctrine_Query::create()
                ->select('SUM(i.Cantidad * i.PrecioUnitarioSinIVA) as Total')
                ->from('Insumo i')
                ->where('i.Elegido = \'SI\'');
            
            if(isset($FechaDesde) and ($FechaDesde != 'Fecha desde'))
            {
                $FechaDesde = str_replace("_", "/", $FechaDesde);
                $dateHelper = new Classes_DateHelper();
                //echo $dateHelper->fromViewFormat($FechaDesde);
            
                $insumosQuery->innerJoin('i.OrdenDeCompra oc')
                            ->andWhere('oc.Fecha >= ?', $dateHelper->fromViewFormat($FechaDesde));
            }
            
            
            if(isset($FechaHasta) and ($FechaHasta != 'Fecha hasta'))
            {
                $FechaHasta = str_replace("_", "/", $FechaHasta);
                $dateHelper = new Classes_DateHelper();
                
                if(!(isset($FechaDesde)))
                {
                    $insumosQuery->innerJoin('i.OrdenDeCompra oc');
                }

                $insumosQuery->andWhere('oc.Fecha <= ?', substr($dateHelper->fromViewFormat($FechaHasta),0,10) . '23:59:59');
            }
            
    		if( ($Pagado == 'S' ) or ($Pagado == 'N') )
            {
                
                
                if($Pagado == 'S')
                {
                	$insumosQuery
                			//->innerJoin('i.OrdenDeCompra oc1')
                            ->andWhere('oc.Pagado = ?', 'S');
                }
                else
            	{
                	$insumosQuery
                            ->andWhere('oc.Pagado != ?', 'S');
                            //->innerJoin('i.OrdenDeCompra oc1')
                            //->andWhere('ISNULL(oc1.Pagado)');
                            
                            //echo $insumosQuery->getSqlQuery();
                           
                }
                
                
                
            }
            
            if(isset($NombreProveedor) and ($NombreProveedor != 'Nombre_proveedor') )
            {
                
                //var_dump($NombreProveedor);
                $NombreProveedor = str_replace("_", " ", $NombreProveedor);
                //echo $NombreProveedor;
                $insumosQuery->innerJoin('i.Proveedor p')
                            ->andWhere('p.Nombre LIKE ?', '%'.$NombreProveedor.'%');
                
                
            }
            
        	
            
            if(is_numeric($estadoOrdenId))
            {
                //echo $estadoOrdenId;
                $insumosQuery->innerJoin('i.Orden o')
                            ->andWhere('o.EstadoId = ?', $estadoOrdenId);
                
                
            }
            
            
            if(is_numeric($OrdenDeCompraId))
            {
                //echo $estadoOrdenId;
                $insumosQuery->andWhere('i.OrdenDeCompraId = ?', $OrdenDeCompraId);
                
            }
            
            //echo $insumosQuery->getSqlQuery();
            return $insumosQuery;
    }
    
    public function GetPendientesDePagoIds()
    {
    	$ids = array();
    	//$s = new Classes_Session();
    	
    	$q  = Doctrine_Query::create()
                ->from('Insumo i')
                ->innerJoin('i.OrdenDeCompra o')
                ->where('i.Elegido = ?', 'SI')
                ->andWhere('ISNULL(o.fechaanulacion)')
                ->andWhere('ISNULL(o.ordendepagoid)');
                //->andWhere('o.Fecha >= ?', $s->GetFechaDesde());
        //echo $q->getSqlQuery();        
        $insumos = $q->execute();
        
        foreach($insumos as $i)
        {
        	if($i->TieneImportePendiente())
        	{
        		$ids[] = $i->Id;
        	}
        }   

        return $ids;
    }
    /* insumos con ordenes de compra pendientes de pago 
	 * - no tienen orden de pago asociada
	 * - no estan anuladas
	 * - la suma de importe abonado es menor que importe total del insumo
	 */
    public function GetPendientesDePago($filters)
    {
    		//$s = new Classes_Session();
    	$subselect	=	'(
        SELECT SUM(o3.importeabonado)
		FROM OrdenDePagoOrdenDeCompra o3
		WHERE o3.ordendecompraid = o.id 
        ) as ImporteAbonado';
		
    	$q  = Doctrine_Query::create()
    			->select('*, '.$subselect)
                ->from('Insumo i')
                ->innerJoin('i.OrdenDeCompra o')
                ->where('i.Elegido = ?', 'SI')
                ->andWhere('ISNULL(o.fechaanulacion)')
                ->andWhere('ISNULL(o.ordendepagoid)')
                ->andWhereIn('i.Id', $this->GetPendientesDePagoIds());
                //->andWhere('o.Fecha >= ?', $s->GetFechaDesde());
                //->having('ImporteAbonado > (i.preciounitariosiniva*i.cantidad)');
                
               //echo $q->getSqlQuery();
    	/*
    	 * agregar fecha desde donde contar importes 
    	 */
                /*
    	$factory	= IDS_Factory_Manager::GetFactory();
		$config		= $factory->GetConfig();
		
		$Default	=	$config->Get('bussiness.fechadesdepagospendientes');
		
		if(isset($Default) and is_numeric($Default))
			return $Default;
		*/
    	// filters
    	
            if(isset($filters['FechaDesde']) and ($filters['FechaDesde'] != 'Fecha desde') and ($filters['FechaDesde'] != ''))
            {
                $FechaDesde = str_replace("_", "/", $filters['FechaDesde']);
                $dateHelper = new Classes_DateHelper();
             
            
                $q->andWhere('o.Fecha >= ?', $dateHelper->fromViewFormat($FechaDesde));
            }
            
            
            if(isset($filters['FechaHasta']) and ($filters['FechaHasta'] != 'Fecha hasta') and ($filters['FechaHasta'] != ''))
            {
                $FechaHasta = str_replace("_", "/", $filters['FechaHasta']);
                $dateHelper = new Classes_DateHelper();

                $q->andWhere('o.Fecha <= ?', substr($dateHelper->fromViewFormat($FechaHasta),0,10) . '23:59:59');
            }
                
    		if(isset($filters['NombreProveedor']) and ($filters['NombreProveedor'] != '') and ($filters['NombreProveedor'] != 'Nombre proveedor'))
            {
                $NombreProveedor = $filters['NombreProveedor'];
                $q->innerJoin('i.Proveedor p')
                            ->andWhere('p.Nombre LIKE ?', '%'.$NombreProveedor.'%');
                
                
            }
            
            /* cta cte */
    		if(isset($filters['ProveedorId']) and ($filters['ProveedorId'] != '') and ($filters['ProveedorId'] != 'Nombre proveedor'))
            {
                $ProveedorId = $filters['ProveedorId'];
                $q->andWhere('i.ProveedorId = ?', $filters['ProveedorId']);
                
                
            }
            
           	if(isset($filters['NombreInsumo']) and ($filters['NombreInsumo'] != 'Nombre insumo'))
            {
                $NombreInsumo = $filters['NombreInsumo'];
                $q->andWhere('i.Nombre LIKE ?', '%'.$NombreInsumo.'%');
                
                
            }
        
            if(isset($filters['OrdenDeTrabajoId']) and (is_numeric($filters['OrdenDeTrabajoId'])))
            {
                $q->andWhere('i.OrdenId = ?', $filters['OrdenDeTrabajoId']);
                
            }
            
            
    		if(isset($filters['OrdenDeCompraId']) and (is_numeric($filters['OrdenDeCompraId'])))
            {
                $q->andWhere('o.Id = ?', $filters['OrdenDeCompraId']);
                
            }
            
            //echo $q->getSqlQuery();
    	return $q;
    }
    
    /* suma total de importes totales de c/OC
     * menos importes parciales abonados
     */
    public function GetResumenPendientesDePago($filters)
    {
    	$r = array();
    	
    	$q	=	$this->GetPendientesDePago($filters);
    	
    	$insumos	=	$q->execute();
    	
    	$total=0;
    	
    	foreach($insumos as $i)
    	{
    		$total += ($i->Cantidad*$i->PrecioUnitarioSinIVA);
    		
    		if($i->HasOrdenDeCompra())
    		{
	    		if( $i->TieneImportePendiente() )
	    		{
	    			$total = ($total - $i->GetImporteAbonado());
	    		}
    		}
    		
    	}
    	
    	$r['TotalCostos'] = $total;
    	
    	return $r;
    }
    
    /*
     * insumos elegidos que no tienen orden de compra
     */
    public function Previsiones($filters)
    {
    	// Estados: Aprobado, Produccion. Finalizado, Cobrado
    	$estados	=	array(8,3,4,5);
    	$q  = Doctrine_Query::create()
	    	->from('Insumo i')
	    	->innerJoin('i.Orden o')
	    	->where('i.Elegido = ?','SI')
	    	->andWhere('i.OrdenDeCompraId IS NULL')
	    	->whereIn('o.EstadoId', $estados);
    	
    	if(isset($filters['NombreProveedor']) and ($filters['NombreProveedor'] != 'Nombre proveedor')
    			and ($filters['NombreProveedor'] != '')
    			)
    	{
    		$NombreProveedor = $filters['NombreProveedor'];
    		$q->innerJoin('i.Proveedor p')
    		->andWhere('p.Nombre LIKE ?', '%'.$NombreProveedor.'%');
    	
    	
    	}
    	
    	if(isset($filters['NombreCliente']) and ($filters['NombreCliente'] != 'Nombre cliente')
    			and ($filters['NombreCliente'] != '')
    			)
    	{
    		$q->innerJoin('o.Cliente c')
    		->andWhere('c.Nombre LIKE ?', '%'.$filters['NombreCliente'].'%');
    		 
    	}
    	
    	if(isset($filters['OrdenDeTrabajoId']) and ($filters['OrdenDeTrabajoId'] != 'Nro de orden')
    			and ($filters['OrdenDeTrabajoId'] > 0)
    			)
    	{
    		$q->andWhere('i.OrdenId = ?', $filters['OrdenDeTrabajoId']);
    	}
    	/*
    	if(isset($filters['NombreInsumo']) and ($filters['NombreInsumo'] != 'Nombre insumo'))
    	{
    		$NombreInsumo = $filters['NombreInsumo'];
    		$q->andWhere('i.Nombre LIKE ?', '%'.$NombreInsumo.'%');
    	
    	
    	}
    	*/
    	//echo $q->GetSqlQuery();
    	return $q;
    }
}