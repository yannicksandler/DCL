<?php
/**
 */
class OrdenDeTrabajoTable extends Doctrine_Table
{
    public function filter($NombreCliente, $estadoOrdenId, $OrdenDeTrabajoId, $PrioridadId, $order, $fechaProximoCambioEstado, $filters=null)
    {
    	$subselectDiaProximoCambioEstado	=	'(select datediff(o.fechaentrega, date_format(now(), \'%Y-%m-%d\'))) as DiasProximoCambioEstado';
    	$subselect	=	'(select datediff(o.fechafin, date_format(now(), \'%Y-%m-%d\'))) as DiasParaFinalizar,'.$subselectDiaProximoCambioEstado;
    	
    	
        $q  =   Doctrine_Query::create()
        			->select('*, '.$subselect)
                    ->from('OrdenDeTrabajo o');
                    
		if(isset($order) and ($order == false))                    
        	$q->orderBy('o.PrioridadId DESC, o.Id ASC');
        	/*
        if(isset($order) and ($order == 'o.DiasProximoCambioEstado_ASC'))                    
        	$q->orderBy('o.DiasProximoCambioEstado ASC');
              */      
        if($NombreCliente != 'Nombre cliente' and isset($NombreCliente))
        {
            $NombreCliente = str_replace("_", " ", $NombreCliente);
            
            $q->innerJoin('o.Cliente')
                ->where('o.Cliente.Nombre LIKE ?', '%'.$NombreCliente.'%');
        }
        
        if(is_numeric($estadoOrdenId))
        {
            $q->andWhere('o.EstadoId = ?', $estadoOrdenId);
        }
        
        
    	if(is_numeric($PrioridadId))
        {
            $q->andWhere('o.PrioridadId = ?', $PrioridadId);
        }
        
    	if(is_numeric($OrdenDeTrabajoId))
        {
            $q->andWhere('o.Id = ?', $OrdenDeTrabajoId);
        }
        
        if(isset($fechaProximoCambioEstado))
        {
                //$FechaDesde = str_replace("_", "/", $FechaDesde);
                $dateHelper = new Classes_DateHelper();
                //echo $dateHelper->fromViewFormat($FechaDesde);
            
                $q->andWhere('o.FechaEntrega >= ?', $dateHelper->fromViewFormat($fechaProximoCambioEstado));
        }
        
    	if(isset($filters['FacturaId']) and is_numeric($filters['FacturaId']))
        {
            $q->andWhere('o.FacturaId = ?', $filters['FacturaId']);
        }
        
        $s	=	new Classes_Session();
        if($s->EsPerfil('Ventas'))
        {
        	if(is_numeric($s->GetUser()->Id))
        	{
        		$q->andWhere('o.CreadorUsuarioId = ?', $s->GetUser()->Id);
        	}
        	
        }
        //echo $q->getSqlQuery();
        return $q;
                    
    }
    
    public function GetByFilter($filters)
    {
    	//inner join OrdenDeCompra oc on oc.id = i.ordendecompraid
    	// and isnull(oc.fechaanulacion)
    	/* outer join con Orden de trabajo */
    	$subselectCostoInsumosElegidos	=	'(
        SELECT ROUND(SUM(in.cantidad*in.preciounitariosiniva),2)
		FROM insumo in
		WHERE in.ordenid = ot.id and in.elegido = \'SI\'
        ) as CostoInsumosElegidos';
    	/* costos de insumos con ordenes de compra NO anuladas */
    	$subselectDiaProximoCambioEstado	=	'(select datediff(ot.fechaentrega, date_format(now(), \'%Y-%m-%d\'))) as DiasProximoCambioEstado';
    	$subselectCantidadInsumosSinEntregar = '(select count(*) from insumo i where i.ordenid=ot.id and ISNULL(i.fechadeentrega)) as InsumosPendientes';
    	//$subselectDiasDesdeAprobacionPresupuesto = '(select datediff(presupuesto.fechaaprobacion, date_format(now(), \'%Y-%m-%d\')) from presupuesto as p where presupuesto.id=ot.presupuestoid) as DiasDesdeAprobacionPresupuesto';
    	$subselectDiasFinalizar	=	'(select datediff(ot.fechafin, date_format(now(), \'%Y-%m-%d\'))) as DiasParaFinalizar,'.$subselectDiaProximoCambioEstado.','.$subselectCantidadInsumosSinEntregar.','.$subselectCostoInsumosElegidos;
    	/* bug: seleccionar ordenes de compra no anuladas (sino no es real) */
        $subselect	=	'(
        SELECT ROUND(SUM(i.cantidad*i.preciounitariosiniva),2)
		FROM insumo i
		WHERE i.ordenid = ot.id and NOT ISNULL(i.ordendecompraid) and i.elegido = \'SI\'
        ) as CostoTotal,'.$subselectDiasFinalizar;
        
		$q	=	Doctrine_Query::create()
					->select('ot.*, '.$subselect)
                    ->from('OrdenDeTrabajo ot');
                    /*
                    ->leftJoin('ot.Insumos in')
                    ->leftJoin('i.OrdenDeCompra oc');*/

		if(isset($filters['NombreCliente']))  
		{               
			$NombreCliente	=	$filters['NombreCliente'];
			
	        if($NombreCliente != 'Nombre cliente')
	        {
	            $NombreCliente = str_replace("_", " ", $NombreCliente);
	            
	            $q->innerJoin('ot.Cliente')
	                ->where('ot.Cliente.Nombre LIKE ?', '%'.$NombreCliente.'%');
	        }
		}
		
		if(isset($filters['EstadoOrdenTrabajoId']))
		{
			$estadoOrdenId	=	$filters['EstadoOrdenTrabajoId'];
			
	        if(is_numeric($estadoOrdenId))
	        {
	            $q->andWhere('ot.EstadoId = ?', $estadoOrdenId);
	        }
		}
        
        if(isset($filters['OrdenDeTrabajoIdInicio']))
        {
        	$inicio	=	$filters['OrdenDeTrabajoIdInicio'];
	    	if(is_numeric($inicio))
	        {
	            $q->andWhere('ot.Id >= ?', $inicio);
	        }
        }
        
    	if(isset($filters['OrdenDeTrabajoIdFinal']))
        {
        	$Final	=	$filters['OrdenDeTrabajoIdFinal'];
	    	if(is_numeric($Final))
	        {
	            $q->andWhere('ot.Id <= ?', $Final);
	        }
        }
        
    		if(isset($filters['FechaDesde']) and ($filters['FechaDesde'] != ''))
			{
				if(($filters['FechaDesde'] != 'Fecha desde') and 
				($filters['FechaDesde'] != 'Fecha factura desde'))
				{
				$FechaDesde	=	$filters['FechaDesde'];
				
				$dateHelper = new Classes_DateHelper();
				
            	$q->innerJoin('ot.Factura f')
                	->andWhere('f.Fecha >= ?', $dateHelper->fromViewFormat($FechaDesde));
                	
                $flag	=	true;
				}
            }
            
			if(isset($filters['FechaHasta']) and ($filters['FechaHasta'] != ''))
			{
				if(($filters['FechaHasta'] != 'Fecha hasta') and 
				($filters['FechaHasta'] != 'Fecha factura hasta'))
				{
				$FechaHasta	=	$filters['FechaHasta'];
				
				$dateHelper = new Classes_DateHelper();
            
				if($flag)
				{
                	$q->andWhere('f.Fecha <= ?', $dateHelper->fromViewFormat($FechaHasta));
				}
				else
				{
					
					$q->innerJoin('ot.Factura f')
                		->andWhere('f.Fecha <= ?', $dateHelper->fromViewFormat($FechaHasta));
                			
				}
				}	
            }

    	if(isset($filters['FacturaId']))
        {
        	$FacturaId	=	$filters['FacturaId'];
	    	if(is_numeric($FacturaId))
	        {
	            $q->andWhere('ot.FacturaId = ?', $FacturaId);
	        }
        }
        
    	$s	=	new Classes_Session();
        if($s->EsPerfil('Ventas'))
        {
        	if(is_numeric($s->GetUser()->Id))
        	{
        		$q->andWhere('ot.CreadorUsuarioId = ?', $s->GetUser()->Id);
        	}
        	
        }        
        //echo $q->getSqlQuery();
        return $q;
                    
    }

    public function GetTotales($filters)
    {
    	$resumen	=	array();
    	$fechaDesde = $this->GetFechaDesde();
    	$ordenesQuery	=	Doctrine::getTable('OrdenDeTrabajo')->GetByFilter($filters);
    	/* obtener fecha desde cuando contar importes de OT
    	 * @see config.ini 
    	 * */
    	$ordenesQuery->andWhere('ot.fechainicio >= ?', $fechaDesde);
    	
    	//echo $ordenesQuery->GetSqlQuery();
    	$ordenes	=	$ordenesQuery->execute();
    	
    	$resumen['FechaDesde'] = $fechaDesde;
    	$resumen['TotalCostos']	=	0;
    	$resumen['TotalPrecioVenta']	=	0;
    	$resumen['TotalGanancia']	=	0;
    	$resumen['CantidadOrdenesEncontradas']	=	count($ordenes);
    	
    	foreach($ordenes as $o)
    	{
    		//echo $o->CostoTotal;
    		
    		//deprecated 2011-12-31 por costos de insumos elegidos (decision de martin porq se conoce previo a las OC)
    		//$resumen['TotalCostos']	=	$resumen['TotalCostos'] + $o->GetCostoOrdenesDeCompra();
    		$resumen['TotalCostos']	=	$resumen['TotalCostos'] + $o->GetCosto(); // costo de insumos elegidos
	    	$resumen['TotalPrecioVenta']	=	$resumen['TotalPrecioVenta'] + $o->TotalSinIva;
	    	$resumen['TotalGanancia']	=	$resumen['TotalGanancia'] + ($o->TotalSinIva - $o->GetCosto());	
    	}
    	
    	$resumen['TotalCostos']	=	number_format($resumen['TotalCostos'],2,'.','');
    	$resumen['TotalPrecioVenta']	=	number_format($resumen['TotalPrecioVenta'],2,'.','');
    	$resumen['TotalGanancia']	=	number_format($resumen['TotalGanancia'],2,'.','');
    	
        return $resumen;
                    
    }

    public function GetOrdenesDeTrabajoSinFacturar($filters=null)
    {
    	$estados = array();
    	$produccion	=	Doctrine::getTable('OrdenEstado')->FindOneByNombre('En produccion');
    	$finalizado	=	Doctrine::getTable('OrdenEstado')->FindOneByNombre('Finalizado');
    	$aprobado	=	Doctrine::getTable('OrdenEstado')->FindOneByNombre('Aprobado');
    	
    	if(is_object($produccion) and is_object($finalizado))
    	{
    		$estados[] = $produccion->Id;
    		$estados[] = $finalizado->Id;
    		$estados[] = $aprobado->Id;
    	}
    	
		$q	=	Doctrine_Query::create()
                    ->from('OrdenDeTrabajo o')
                    ->andWhere('o.facturaid IS NULL')
                    ->andWhereIn('o.EstadoId', $estados)
                    ->orderBy('o.Id DESC');
                    
    	if(isset($filters['ClienteId']) and is_numeric($filters['ClienteId']))
        {
            $q->andWhere('o.ClienteId = ?', $filters['ClienteId']);
        }
        
        if(isset($filters['NombreCliente']))  
		{               
			$NombreCliente	=	$filters['NombreCliente'];
			
	        if($NombreCliente != 'Nombre cliente')
	        {
	            $NombreCliente = str_replace("_", " ", $NombreCliente);
	            
	            $q->innerJoin('o.Cliente c')
	                ->andWhere('c.Nombre LIKE ?', '%'.$NombreCliente.'%');
	        }
		}
        
        if(isset($filters['OrdenDeTrabajoIdInicio']))
        {
        	$inicio	=	$filters['OrdenDeTrabajoIdInicio'];
	    	if(is_numeric($inicio))
	        {
	            $q->andWhere('o.Id >= ?', $inicio);
	        }
        }
        
    	if(isset($filters['OrdenDeTrabajoIdFinal']))
        {
        	$Final	=	$filters['OrdenDeTrabajoIdFinal'];
	    	if(is_numeric($Final))
	        {
	            $q->andWhere('o.Id <= ?', $Final);
	        }
        }
		
        $factory	= IDS_Factory_Manager::GetFactory();
		$config		= $factory->GetConfig();			
		$fechainicio	=	$config->Get('facturacion.fechainicio');
		
		if(isset($fechainicio))
		{
			$q->andWhere('o.FechaInicio >= ?', $fechainicio);
		}
        //echo $q->getSqlQuery();
        return $q;

    }
    
    public function GetSinCotizar($filters)
    {
    	/* set estados sin cotizar para filtrar (Sin empezar y buscando)*/
    	$estados = array();
    	$buscando	=	Doctrine::getTable('OrdenEstado')->FindOneByNombre('Buscando');
    	$sinEmpezar	=	Doctrine::getTable('OrdenEstado')->FindOneByNombre('Sin empezar');
    	
    	if(is_object($buscando) and is_object($sinEmpezar))
    	{
    		$estados[] = $buscando->Id;
    		$estados[] = $sinEmpezar->Id;
    	}
    	
    	$q = $this->GetByFilter($filters);
    	$q->andWhereIn('ot.EstadoId', $estados);
    	if(!isset($filters['order']))
    		$q->orderBy('DiasProximoCambioEstado ASC, ot.PrioridadId ASC');
    	//echo $q->getSqlQuery();
    	
    	return $q;
    }
    
	public function GetEnProduccion($filters)
    {
    	$enProduccion	=	Doctrine::getTable('OrdenEstado')->FindOneByNombre('En produccion');
    	if(!is_object($enProduccion))
    		echo 'Estado en produccion no encontrado';

    	$subselectDiaProximoCambioEstado	=	'(select datediff(ot.fechaentrega, date_format(now(), \'%Y-%m-%d\'))) as DiasProximoCambioEstado';
    	$subselectCantidadInsumosSinEntregar = '(select count(*) from insumo where ordenid=ot.id and ISNULL(fechadeentrega) and (elegido=\'SI\')) as InsumosPendientes';
    	$subselectDiasFinalizar	=	'(select datediff(ot.fechafin, date_format(now(), \'%Y-%m-%d\'))) as DiasParaFinalizar,'.$subselectDiaProximoCambioEstado.','.$subselectCantidadInsumosSinEntregar;
    	
        
		$q	=	Doctrine_Query::create()
					->select('*, '.$subselectDiasFinalizar)
                    ->from('OrdenDeTrabajo ot');

		if(isset($filters['NombreCliente']))  
		{               
			$NombreCliente	=	$filters['NombreCliente'];
			
	        if($NombreCliente != 'Nombre cliente')
	        {
	            $NombreCliente = str_replace("_", " ", $NombreCliente);
	            
	            $q->innerJoin('ot.Cliente')
	                ->where('ot.Cliente.Nombre LIKE ?', '%'.$NombreCliente.'%');
	        }
		}
		
		if(isset($filters['EstadoOrdenTrabajoId']))
		{
			$estadoOrdenId	=	$filters['EstadoOrdenTrabajoId'];
			
	        if(is_numeric($estadoOrdenId))
	        {
	            $q->andWhere('ot.EstadoId = ?', $estadoOrdenId);
	        }
		}
        
        if(isset($filters['OrdenDeTrabajoIdInicio']))
        {
        	$inicio	=	$filters['OrdenDeTrabajoIdInicio'];
	    	if(is_numeric($inicio))
	        {
	            $q->andWhere('ot.Id >= ?', $inicio);
	        }
        }
        
    	if(isset($filters['OrdenDeTrabajoIdFinal']))
        {
        	$Final	=	$filters['OrdenDeTrabajoIdFinal'];
	    	if(is_numeric($Final))
	        {
	            $q->andWhere('ot.Id <= ?', $Final);
	        }
        }
        
    		if(isset($filters['FechaDesde']) and ($filters['FechaDesde'] != ''))
			{
				if(($filters['FechaDesde'] != 'Fecha desde') and ($filters['FechaHasta'] != 'Fecha factura desde'))
				{
				$FechaDesde	=	$filters['FechaDesde'];
				
				$dateHelper = new Classes_DateHelper();
				/*
            	$q->innerJoin('ot.OrdenEstadoHistorial h')
                	->andWhere('h.Fecha >= ?', $dateHelper->fromViewFormat($FechaDesde));
                	*/
                $flag	=	true;
				}
            }
            
			if(isset($filters['FechaHasta']) and ($filters['FechaHasta'] != ''))
			{
				if(($filters['FechaHasta'] != 'Fecha hasta') and ($filters['FechaHasta'] != 'Fecha factura hasta'))
				{
				$FechaHasta	=	$filters['FechaHasta'];
				
				$dateHelper = new Classes_DateHelper();
            
				if($flag)
				{
                	//$q->andWhere('h.Fecha <= ?', $dateHelper->fromViewFormat($FechaHasta));
				}
				else
				{
					/*
					$q->innerJoin('ot.OrdenEstadoHistorial h')
                		->andWhere('h.Fecha <= ?', $dateHelper->fromViewFormat($FechaHasta));
                		*/	
				}
				}	
            }

    	if(isset($filters['FacturaId']))
        {
        	$FacturaId	=	$filters['FacturaId'];
	    	if(is_numeric($FacturaId))
	        {
	            $q->andWhere('ot.FacturaId = ?', $FacturaId);
	        }
        }
    		
    	//$q = $this->GetByFilter($filters);
    	$q->andWhere('ot.EstadoId = ?', $enProduccion);
    	$q->orderBy('DiasParaFinalizar ASC, ot.PrioridadId ASC');
    	//echo $q->getSqlQuery();
    	
    	return $q;
    }
    
    public function GetVentas($filters)
    {
    	$q	=	Doctrine::getTable('OrdenDeTrabajo')->GetByFilter($filters);
    	
    	if(!isset($filters['order']))
    		$q->orderBy('ot.Id DESC, ot.PrioridadId ASC');
    		
    	return $q;
    	
    	
    }
    
    public function GetPreproduccion($filters)
    {
    	$estados = array();
    	$presupuestado	=	Doctrine::getTable('OrdenEstado')->FindOneByNombre('Presupuestado');
    	$aprobado	=	Doctrine::getTable('OrdenEstado')->FindOneByNombre('Aprobado');
    	
    	if(is_object($presupuestado) and is_object($aprobado))
    	{
    		$estados[] = $presupuestado->Id;
    		$estados[] = $aprobado->Id;
    	}
    	
    	$q = $this->GetByFilter($filters);
    	/*
    	$subselectDiasDesdeAprobacionPresupuesto	=	'(select datediff(p.fechaaprobacion, date_format(now(), \'%Y-%m-%d\'))) as DiasDesdeAprobacionPresupuesto';
    	$q->select('*, '.$subselectDiasDesdeAprobacionPresupuesto)
    		->innerJoin('ot.Presupuesto p');
    	*/
    	$q->andWhereIn('ot.EstadoId', $estados);
    	if(!isset($filters['order']))
    		$q->orderBy('ot.EstadoId DESC, ot.PrioridadId ASC');
    	//echo $q->getSqlQuery();
    	
    	return $q;
    }
    
		public function GetFechaDesde()
		{
	    	$factory	= IDS_Factory_Manager::GetFactory();
			$config		= $factory->GetConfig();
			
			$Default	=	$config->Get('bussiness.fecha_desde_ventas');
			
			if(isset($Default) and is_numeric($Default))
			{
				return $Default;
			}
			else
			{
				return '2011-01-01';
			}
		}
    
}