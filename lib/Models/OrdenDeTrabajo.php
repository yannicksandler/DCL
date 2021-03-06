<?php

/**
 * OrdenDeTrabajo
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    ##PACKAGE##
 * @subpackage ##SUBPACKAGE##
 * @author     ##NAME## <##EMAIL##>
 * @version    SVN: $Id: Builder.php 6820 2009-11-30 17:27:49Z jwage $
 */
class OrdenDeTrabajo extends BaseOrdenDeTrabajo
{
    public function setUp()
    {
        parent::setUp();
        
        $this->hasAccessorMutator('FechaInicio', 'FechaInicioAccessor', 'FechaInicioMutator');
        $this->hasAccessorMutator('FechaFin', 'FechaFinAccessor', 'FechaFinMutator');
        $this->hasAccessorMutator('FechaEntrega', 'FechaEntregaAccessor', 'FechaEntregaMutator');
        $this->hasAccessorMutator('FechaFactura', 'FechaFacturaAccessor', 'FechaFacturaMutator');

        //$this->hasAccessor('DescripcionDeTrabajo', 'DescripcionDeTrabajoAccessor');
    
    }
    
    /* verificar cambios de estado y lanzar eventos */
	public function preUpdate( $event)
    {
        $invoker = $event->getInvoker();
        
        $mgr = new Classes_EstadosManager($this);
        $mgr->ControlarCambiosDeEstado();
        
		$this->RegistrarEstado();
    }
    
        /* trazabilidad de estados */
	public function postInsert( $event)
    {
        $invoker = $event->getInvoker();

		$this->RegistrarEstado();
    }

	public function preInsert( $event)
    {
        $invoker = $event->getInvoker();
		// si es ficticia, debe crearse en finalizado y no respeta diagrama de transicion de estados
        if($this->EsFicticia != 'SI')
        {
			$mgr = new Classes_EstadosManager($this);
	        $mgr->ControlarCambiosDeEstado();
        }
        
        $s	=	new Classes_Session();
        $this->CreadorUsuarioId	=	$s->GetUser()->Id;
    }

	public function RegistrarEstado()
	{
		$now    =   new DateTime();
		
		$h	=	new OrdenEstadoHistorial();
		$h->Fecha	=	$now->format('Y-m-d');
		$h->OrdenDeTrabajoId	=	$this->Id;
		$h->OrdenEstadoId		=	$this->EstadoId;
		$h->save();
	}
	/**
	 * @deprecated 2012-09-07 se graba con elementos HTML en DB, error
	 * @return string
	 */
	/*
	public function DescripcionDeTrabajoAccessor()
    {
    	//return	nl2br($this->_get('DescripcionDeTrabajo'));
    	return	nl2br(htmlentities(stripslashes(trim(($this->_get('DescripcionDeTrabajo'))))));
    	
    }
      */  
    public function FechaInicioMutator( $value )
    {
        $dateHelper =   new Classes_DateHelper();
    	$date 	=	$dateHelper->fromViewFormat($value);
    	
    	
        $this->_set('FechaInicio', $date);
    }
    
    public function FechaInicioAccessor()
    {
    	$timestamp	=	$this->_get('FechaInicio');
    	
    	if ($timestamp)
    	{
    		// convertir timestamp a dd/mm/aaaa
            $dateHelper =   new Classes_DateHelper();
        	$date 	=	$dateHelper->toViewFormat($timestamp);
        	
        	
        	return $date;
    	}
    	else
    		return '';
    }
    
    public function FechaFinMutator( $value )
    {
        $dateHelper =   new Classes_DateHelper();
    	$date 	=	$dateHelper->fromViewFormat($value);
    	
        $this->_set('FechaFin', $date);
    }
    
    public function FechaFinAccessor()
    {
    	$timestamp	=	$this->_get('FechaFin');
    	
    	if ($timestamp)
    	{
    		// convertir timestamp a dd/mm/aaaa
            $dateHelper =   new Classes_DateHelper();
        	$date 	=	$dateHelper->toViewFormat($timestamp);
        	
        	
        	return $date;
    	}
    	else
    		return '';
    }
    
    public function FechaEntregaMutator( $value )
    {
        $dateHelper =   new Classes_DateHelper();
    	$date 	=	$dateHelper->fromViewFormat($value);
    	
        $this->_set('FechaEntrega', $date);
    }
    
    public function FechaEntregaAccessor()
    {
    	$timestamp	=	$this->_get('FechaEntrega');
    	
    	if ($timestamp)
    	{
    		// convertir timestamp a dd/mm/aaaa
            $dateHelper =   new Classes_DateHelper();
        	$date 	=	$dateHelper->toViewFormat($timestamp);
        	
        	return $date;
    	}
    	else
    		return '';
    }
    
	public function FechaFacturaMutator( $value )
    {
        $dateHelper =   new Classes_DateHelper();
    	$date 	=	$dateHelper->fromViewFormat($value);
    	
        $this->_set('FechaFactura', $date);
    }
    
    public function FechaFacturaAccessor()
    {
    	$timestamp	=	$this->_get('FechaFactura');
    	
    	if ($timestamp)
    	{
    		// convertir timestamp a dd/mm/aaaa
            $dateHelper =   new Classes_DateHelper();
        	$date 	=	$dateHelper->toViewFormat($timestamp);
        	
        	return $date;
    	}
    	else
    		return '';
    }
	public function BorrarInsumo( $insumoId )
	{
		// generar query this.id and insumoid
		$insumo		= Doctrine::getTable('Insumo')->FindOneById( $insumoId );
		
		if(!$insumo->HasOrdenDeCompra())
		{
			$insumo->delete();
			return true;
		}
		
		return false;

	}
	
	/* costo de insumos elegidos */
	public function GetCosto()
	{
        $q = Doctrine_Query::create()
            ->select('SUM(i.Cantidad*i.PrecioUnitarioSinIVA) as TotalSinIVA')
            ->from('Insumo i')
            ->where('i.OrdenId = ?', $this->Id)
            ->andWhere('i.Elegido = ?', 'SI');
			
            //echo $q->getSqlQuery();
            return $q->FetchOne()->TotalSinIVA;
	}
	
	/* insumos elegidos con OC no anuladas */
	public function GetCostoOrdenesDeCompra()
	{
        $q = Doctrine_Query::create()
            ->select('SUM(i.Cantidad*i.PrecioUnitarioSinIVA) as CostoTotalOrdenesDeCompra')
            ->from('Insumo i')
            ->innerJoin('i.OrdenDeCompra o')
            ->where('i.OrdenId = ?', $this->Id)
            ->andWhere('ISNULL(o.fechaanulacion)')
            ->andWhere('i.Elegido = ?', 'SI');
			
            //echo $q->getSqlQuery();
            return $q->FetchOne()->CostoTotalOrdenesDeCompra;
	}
	
	public function GetFletes()
	{
		$q = Doctrine_Query::create()
            ->from('Insumo i')
            ->where('i.OrdenId = ?', $this->Id)
            ->andWhere('i.EsFlete = ?', 'SI');
			
            //echo $q->getSqlQuery();
            return $q;
	}
	
	public function GetCostoFlete()
	{
        $q = Doctrine_Query::create()
            ->select('SUM(i.Cantidad*i.PrecioUnitarioSinIVA) as TotalFlete')
            ->from('Insumo i')
            ->where('i.OrdenId = ?', $this->Id)
            ->andWhere('i.Elegido = ?', 'SI')
            ->andWhere('i.EsFlete = ?', 'SI');
			
            //echo $q->getSqlQuery();
            
        $insumosQ = Doctrine_Query::create()
        ->from('Insumo i')
        ->innerJoin('i.OrdenDeCompra oc')
        ->where('i.OrdenId = ?', $this->Id)
        ->andWhere('i.Elegido = ?', 'SI')
        ->andWhere('i.EsFlete = ?', 'SI')
        ->andWhere('oc.ImporteCompensatorio IS NOT NULL');
        	
        $insumos = $insumosQ->execute();
        	
        $importeCompensatorioSinIva = 0;
        foreach ($insumos as $i)
        {
        	$importeCompensatorioSinIva += $i->OrdenDeCompra->GetImporteCompensatorioSinIVA();
        }
        
            return $q->FetchOne()->TotalFlete+$importeCompensatorioSinIva;
	}
	
	public function GetInsumosVarios()
	{
		$q = Doctrine_Query::create()
            ->from('Insumo i')
            ->where('i.OrdenId = ?', $this->Id)
            ->andWhere('i.EsFlete = ?', 'NO')
            ->andWhere('i.EsManoDeObra = ?', 'NO')
            ->andWhere('i.EsComercializacion <> ?', 'SI');
			
            //echo $q->getSqlQuery();
            return $q;
	}
	
	public function GetManoDeObra()
	{
		$q = Doctrine_Query::create()
            ->from('Insumo i')
            ->where('i.OrdenId = ?', $this->Id)
            ->andWhere('i.EsManoDeObra = ?', 'SI');
			
            //echo $q->getSqlQuery();
            return $q;
	}
	
	public function GetCostoManoDeObra()
	{
        $q = Doctrine_Query::create()
            ->select('SUM(i.Cantidad*i.PrecioUnitarioSinIVA) as TotalManoDeObra')
            ->from('Insumo i')
            ->where('i.OrdenId = ?', $this->Id)
            ->andWhere('i.Elegido = ?', 'SI')
            ->andWhere('i.EsManoDeObra = ?', 'SI');
			
            //echo $q->getSqlQuery();
            
        $insumosQ = Doctrine_Query::create()
        ->from('Insumo i')
        ->innerJoin('i.OrdenDeCompra oc')
        ->where('i.OrdenId = ?', $this->Id)
        ->andWhere('i.Elegido = ?', 'SI')
            ->andWhere('i.EsManoDeObra = ?', 'SI')
        ->andWhere('oc.ImporteCompensatorio IS NOT NULL');
         
        $insumos = $insumosQ->execute();
         
        $importeCompensatorioSinIva = 0;
        foreach ($insumos as $i)
        {
        	$importeCompensatorioSinIva += $i->OrdenDeCompra->GetImporteCompensatorioSinIVA();
        }
        
            return $q->FetchOne()->TotalManoDeObra+$importeCompensatorioSinIva;
	}
	
	public function GetComercializacion()
	{
		$q = Doctrine_Query::create()
            ->from('Insumo i')
            ->where('i.OrdenId = ?', $this->Id)
            ->andWhere('i.EsComercializacion = ?', 'SI');
			
            //echo $q->getSqlQuery();
            return $q;
	}
	
	public function GetCostoComercializacion()
	{
        $q = Doctrine_Query::create()
            ->select('SUM(i.Cantidad*i.PrecioUnitarioSinIVA) as TotalComercializacion')
            ->from('Insumo i')
            ->where('i.OrdenId = ?', $this->Id)
            ->andWhere('i.Elegido = ?', 'SI')
            ->andWhere('i.EsComercializacion = ?', 'SI');
			
            //echo $q->getSqlQuery();
            
        $insumosQ = Doctrine_Query::create()
        ->from('Insumo i')
        ->innerJoin('i.OrdenDeCompra oc')
        ->where('i.OrdenId = ?', $this->Id)
        ->andWhere('i.Elegido = ?', 'SI')
            ->andWhere('i.EsComercializacion = ?', 'SI')
        ->andWhere('oc.ImporteCompensatorio IS NOT NULL');
         
        $insumos = $insumosQ->execute();
         
        $importeCompensatorioSinIva = 0;
        foreach ($insumos as $i)
        {
        	$importeCompensatorioSinIva += $i->OrdenDeCompra->GetImporteCompensatorioSinIVA();
        }
        
            return $q->FetchOne()->TotalComercializacion+$importeCompensatorioSinIva;
	}
	
	public function GetResumen()
	{
		$r	=	array();
		
		$r['IngresosBrutos']	=	number_format($this->GetIngresosBrutos(),2,'.','');
		$r['ImpuestosBancarios']	=	number_format($this->GetImpuestoBancario(),2,'.','');
		
		/*costos*/
		$r['TotalInsumosVarios']	=	number_format($this->GetCostoInsumosVarios(),2,'.','');
		$r['TotalFlete']	=	number_format($this->GetCostoFlete(),2,'.','');
		$r['TotalManoDeObra']	=	number_format($this->GetCostoManoDeObra(),2,'.','');
		$r['TotalComercializacion']	=	number_format($this->GetCostoComercializacion(),2,'.','');
		
		$r['CostoTotalSinIVA']	=	number_format($this->GetCostoTotalSinIva(),2,'.','');
		$r['CostoTotalConIVA']	=	number_format($this->GetCostoTotalConIva(),2,'.','');
		
		
		return $r;
	}
	
	public function GetCostoInsumosVarios()
	{
		$q = Doctrine_Query::create()
            ->select('SUM(i.Cantidad*i.PrecioUnitarioSinIVA) as TotalInsumosVarios')
            ->from('Insumo i')
            ->where('i.OrdenId = ?', $this->Id)
            ->andWhere('i.Elegido = ?', 'SI')
            ->andWhere('i.EsManoDeObra <> ?', 'SI')
            ->andWhere('i.EsFlete <> ?', 'SI')
			->andWhere('i.EsComercializacion <> ?', 'SI');
            //echo $q->getSqlQuery();
            //$a	=	$q->fetchOne()->TotalInsumosVarios;
        
			$insumosQ = Doctrine_Query::create()
			->from('Insumo i')
			->innerJoin('i.OrdenDeCompra oc')
			->where('i.OrdenId = ?', $this->Id)
			->andWhere('i.Elegido = ?', 'SI')
			->andWhere('i.EsManoDeObra <> ?', 'SI')
			->andWhere('i.EsFlete <> ?', 'SI')
			->andWhere('i.EsComercializacion <> ?', 'SI')
			->andWhere('oc.ImporteCompensatorio IS NOT NULL');
			
			$insumos = $insumosQ->execute();
			
			$importeCompensatorioSinIva = 0;
			foreach ($insumos as $i)
			{
				$importeCompensatorioSinIva += $i->OrdenDeCompra->GetImporteCompensatorioSinIVA();
			}
		
            return $q->fetchOne()->TotalInsumosVarios + $importeCompensatorioSinIva;
	}
	
	
	public function GetCostoImpuestos()
	{
		return $this->GetIngresosBrutos() + $this->GetImpuestoBancario();
	}
	
	private function GetIngresosBrutos()
	{
		// 3 % del precio de venta sin iva
		return $this->TotalSinIva*0.03;
	}
	
	private function GetImpuestoBancario()
	{
		// 1.2 % del precio de venta con iva
		return ($this->TotalSinIva*1.21)*0.012;
	}
	
	public function GetCostoTotalSinIva()
	{
		
		$total	=	0;
		// varios + flete + mano de obra
		
		$total	=	$this->GetCosto() + $this->GetCostoImpuestos();
		return $total;
	}
	
	public function GetCostoTotalConIva()
	{
		$total	=	0;
		
		$total	=	$this->GetCostoInsumosVarios() + $this->GetCostoFlete() + $this->GetCostoComercializacion();
		// aplicarIVa
		$total	=	$total	* 1.21;
		$total =	$total + $this->GetCostoManoDeObra() + $this->GetCostoImpuestos();
		
		return $total;
	}
	
	public function SetPrioridad($prioridad)
	{
		$prioridades	=	$this->GetPrioridades();
		
		if(is_numeric($prioridad) and $prioridad > 0)
		{
			foreach($prioridades as $p)
			{
				if($p->Id == $prioridad)
				{
					// la prioridad elegida in prioridades disponibles
					$this->PrioridadId	=	$prioridad;
					
					$this->save();
					//echo 'guardado';exit;
					return true;
				}
			}
		}
		
		return false;
	}
	
	private function GetPrioridades()
	{
		$q = Doctrine_Query::create()
            ->from('Prioridad p');
            
        return $q->execute();
	}
	
	public function IsPaga()
	{
		$ordenesDeCompra	=	$this->GetOrdenesDeCompra();
		//echo count($ordenesDeCompra);
		foreach($ordenesDeCompra as $o)
		{
			/** si alguna orden de compra no esta paga
			 * entonces la orden de trabajo tampoco
			 */
			if(! $o->IsPaga())
				return false;
		}
		/**
		 * si todas las OC estan pagas => la OT tambien
		 */
		return true;
	}
	
	public function GetOrdenesDeCompra()
	{
		$filter	=	array();
		$filter['OrdenDeTrabajoId']	=	$this->Id;
		
		$ordenesQuery		= Doctrine::getTable('OrdenDeCompra')->GetByFilter( $filter );
		$ordenesQuery->getSqlQuery();
		return $ordenesQuery->execute();
	}
	
	public function SetEstadoFinalizado()
	{
		if(!$this->HasAllInsumosEntregados())
		{
			throw new Exception('No estan entregados todos los insumos. Para finalizar la Orden de trabajo deben estar todos los insumos entregados');
		}
		
		// crear metodo
		$estadoFin		= Doctrine::getTable('OrdenEstado')->FindOneByNombre( 'Finalizado' );
		//$finalidadoId	=	4;
		if(is_object($estadoFin))
		{
			
				if($this->IsCobrada())
				{
					// si esta cobrada, cambiar igual a finalizado
					$this->EstadoId	=	$estadoFin->Id; // set estado finalizado
				}
				else
					$this->EstadoId	=	$estadoFin->Id; // set estado finalizado
				
				/* anular prioridad */
				$this->AnularPrioridad();
				
				$now    =   new DateTime();
				
				$this->FechaFin	=	$now->format('d/m/Y'); // mutator lo convierte preinsert	
				$this->save();
		}
		else
			echo 'Error al encontrar el estado finalizado. No fue posible cambiar de estado la orden de trabajo';
			
	}
	
	public function SetEstadoPresupuestado()
	{
		
		$estado		= Doctrine::getTable('OrdenEstado')->FindOneByNombre( 'Presupuestado' );
		
		if(is_object($estado))
		{
			// @see table orden_estado
			
			$this->EstadoId	=	$estado->Id;	
			$this->save();
		}
			
	}
	
	/*
	 * @see Orden edit controller action
	 * - cambia a cotizado cuando agrego dias estimados para el proyecto
	 */
	public function SetEstadoCotizado()
	{
		// crear metodo
		$estado		= Doctrine::getTable('OrdenEstado')->FindOneByNombre( 'Cotizado' );
		if(is_object($estado))
		{
				$this->EstadoId	=	$estado->Id;	
				$this->save();
			
		}
			
	}
	
	public function SetEstadoBuscando()
	{
		// crear metodo
		$estado		= Doctrine::getTable('OrdenEstado')->FindOneByNombre( 'Buscando' );
		if(is_object($estado))
		{
			/* solo cambia a estado "Buscando" cuando agrego primer insumo */
			if($this->GetCantidadInsumos() == 0)
			{
				$this->EstadoId	=	$estado->Id;	
				$this->save();
				
				return true;
			}
		}
		
		return false;
			
	}
	
	public function GetCantidadInsumos()
	{
		return count($this->Insumos);
	}
	
	public function HasInsumos()
	{
		if (count($this->Insumos) > 0)
			return true;
			
		return false;
				
	}
	
	public function SetEstadoProduccion()
	{
		/* tomar desde configuracion table */
		if(!$this->HasInsumos())
			throw new Exception('La orden de trabajo no tiene insumos agregados. No puede pasar a estado Produccion');
		
		$estado		= Doctrine::getTable('OrdenEstado')->FindOneByNombre( 'En produccion' );
		if(is_object($estado))
		{
			$conn = Doctrine_Manager::connection();
		
			try
			{
				$this->EstadoId	=	$estado;
				
				$conn->beginTransaction();
				
				//echo $this->EstadoId;				
				
				//$this->refresh();
				
				if($this->IsPrimerOrdenDeCompra())
				{
					$this->SetFechaFinalizacion();
					/* 
					 * guardar costos de todos los insumos elegidos
					 * al momento que entra a produccion
					 * - sirva para comprar los costos iniciales cuando entra a produccion
					 * contra los costos reales cuando finaliza una la orden de trabajo
					 * - permite saber la perdida
					 */
					$this->GuardarCostosDePreproduccion();
				}
				
				$this->save();
				$conn->commit();
			}
			
			catch(Doctrine_Exception $e)
			{
				$conn->rollback();
				echo $e->errorMessage('No fue posible cambiar a estado Produccion');
			}
			
			echo 'Estado de orden en produccion';
		}
			
	}
	
	public function IsPrimerOrdenDeCompra()
	{
		$filters = array();
		$filters['OrdenDeTrabajoId'] = $this->Id;
		
		$ordenesDeCompra		= Doctrine::getTable('OrdenDeCompra')->GetByFilter($filters)->execute();
		if(count($ordenesDeCompra) == 1)
			return true;
			
		return false;
	}
	
	public function GuardarCostosDePreproduccion()
	{
		$total = 0;
		$insumos = $this->Insumos;
		foreach($insumos as $i)
		{
			if($i->Elegido == 'SI')
			{
				$total = $total + ($i->GetTotal());
			}
		}
		/* sirva para comparar inicio de costos de produccion con
		 * los costos reales cuando finaliza
		 * -ver perdida por orden de trabajo
		 */
		$this->CostosDeInicioProduccion	=	$total;
		//echo $total;
		//$this->save();
	}
	
	/* suma cantidad de dias establecidos
	 * en el Presupuesto de la Orden de trabajo
	 * a la fecha actual o de la orden de trabajo a la fecha actual
	 */
	public function SetFechaFinalizacion()
	{
		/*
		echo date('z').'--';
		
		$diaDelAnio	= date('z') + $this->Presupuesto->PlazoDeEntrega;
		echo $diaDelAnio;
		$fecha = date("d/m/Y",mktime(0,0,0,0,$diaDelAnio,date("Y")));
		//echo date("M-d-Y", mktime(0, 0, 0, 0, 181, 2006));
		 * 
		 */
		//if(!isset($this->PresupuestoId))
			//throw new Exception('Debe tener un presupuesto con el plazo de entrega en dias');
		////'Debe tener una fecha de plazo de entrega en dias para establecer la fecha de finalizacion
		
		if(is_numeric($this->PresupuestoId))
		{
			$diasPresupuestados = $this->Presupuesto->PlazoDeEntrega;
			
			if(!is_numeric($diasPresupuestados))
			{
				echo "Fecha de finalizacion de orden de trabajo guardada desde la estimacion de la orden: ".$this->cambiarFecha($this->TiempoEstimado)."<br>";
				$this->FechaFin = $this->cambiarFecha($this->TiempoEstimado);
				$this->save();
			}
			else
			{
				echo "Fecha de finalizacion de orden de trabajo guardada: ".$this->cambiarFecha($diasPresupuestados)."<br>";
			
				$this->FechaFin = $this->cambiarFecha($diasPresupuestados);
				$this->save();//ojo q repite el save en otra parte refactor
			}
		}
		else
			echo 'Debe ingresar un presupuesto. ';
	
	}
	
	public function SetFechaProximoCambioDeEstado()
	{
		if(is_numeric($this->PresupuestoId))
		{
			$diasPresupuestados = $this->Presupuesto->PlazoDeEntrega;
			
			if(!is_numeric($diasPresupuestados))
			{
				$this->FechaEntrega = $this->cambiarFecha($this->TiempoEstimado);
				$this->save();
			}
			else
			{
				$this->FechaEntrega = $this->cambiarFecha($diasPresupuestados);
				$this->save();//ojo q repite el save en otra parte refactor
			}
		}
		else
			echo 'Debe ingresar un presupuesto. ';		
	}
	
	/* permite sumar fecha +1, restar -1, fecha actual 0*/
	private function cambiarFecha($dias){
   if ($dias>0){    
      return date('d/m/Y', strtotime('+'.$dias.' days'));
   }
   return date('d/m/Y', strtotime('-'.$dias.' days'));

	}	            
	
	
	
	public function SetPresupuesto($PresupuestoId)
	{	
		if(is_numeric($PresupuestoId))
		{
			
		
			$conn = Doctrine_Manager::connection();
		
			try
			{
				$conn->beginTransaction();
				
				$this->PresupuestoId	=	$PresupuestoId;
				
				$this->SetEstadoPresupuestado();
			
				$conn->commit();
			}
			catch(Doctrine_Exception $e)
			{
				$conn->rollback();
				echo $e->errorMessage('No fue posible cambiar a estado Produccion. '.$e->getMessage());
			}
		}	
		else
			echo 'el presuesto para asociar no es numerico';
	}
	
	public function ControlarCreacionPresupuesto()
	{
		/* debe existir presupuesto para pasar a estado presupuestado?? */	
		if(count($this->Insumos) == 0)
		{
			//echo 'La orden de trabajo no tiene insumos agregados. No puede crear un presupuesto ni pasar a estado presupuestado';
			throw new Exception('La orden de trabajo no tiene insumos agregados. No puede crear un presupuesto ni pasar a estado presupuestado');
		}
	}
	
	public function AnularPrioridad()
	{
		$this->PrioridadId 	=	NULL;
		//$this->save();
	}
	
	public function SetEstadoAprobado()
	{
		$estado		= Doctrine::getTable('OrdenEstado')->FindOneByNombre( 'Aprobado' );
		
		if(is_object($estado))
		{
			// @see table orden_estado
			$this->EstadoId	=	$estado->Id;	
			$this->save();
		}		
	}
	
	public function HasTiempoEstimado()
	{
		if($this->TiempoEstimado > 0)
			return true;
			
		return false;
	}
	
	public function CrearOrdenFicticia()
	{
		$estado		= Doctrine::getTable('OrdenEstado')->FindOneByNombre( 'Finalizado' );
		
		if(is_object($estado))
		{
			$orden = new OrdenDeTrabajo();
			
			$orden->EstadoId = $estado->Id;
			$orden->ClienteId	=	$this->ClienteId;
			$orden->Producto = $this->Producto;
			$orden->TotalSinIva = 0.0;
			$orden->Cantidad = 1;
			$orden->DescripcionDeTrabajo	=	'Orden ficticia creada a partir de OT '.$this->Id.'. '.$this->DescripcionDeTrabajo;
			$orden->FechaInicio	=	date('d/m/Y');
			$orden->FechaEntrega	=	date('d/m/Y');
			$orden->EsFicticia = 'SI';
			
			$orden->save();
			
			return $orden;
		}
	}
	
	/* se utiliza para pasar a estado finalizado de una
	 * OT
	 * - todos los insumos elegidos de la OT que tengan OC vigentes (no anuladas)
	 */
	public function HasAllInsumosEntregados()
	{
		$q = Doctrine_Query::create()
            ->from('Insumo i')
            //->innerJoin('i.OrdenDeCompra oc')
            ->andWhere('i.OrdenId = ?', $this->Id)
            ->andWhere('i.Elegido = ?', 'SI');
			//->andWhere('oc.FechaAnulacion IS NULL');
		
        //echo $q->getSqlQuery();
		$insumos = $q->execute();
		
		foreach($insumos as $i)
		{
		// bug 20/05/2013. No permite finalizar OT que tenga ordenes de compra anuladas
		// el insumo fue elegido, pero su OC fue anulada
			if(!$i->TieneOrdenDeCompraAnulada())
			{
				if(!$i->IsEntregado())
				{
					return false;
				}
			}
		}
		
		return true;
	}
	
	public function IsEstado($estado)
	{
		if($estado == $this->Estado->Nombre)
		{
			return true;
		}
		
		return false;
	}
	
	public function IsCobrada()
	{
		return $this->IsEstado('Cobrado');	
	}
	
	public function SetEstadoCobrado()
	{
		$estado		= Doctrine::getTable('OrdenEstado')->FindOneByNombre( 'Cobrado' );
	
		if(is_object($estado))
		{
			// @see table orden_estado
			$this->EstadoId	=	$estado->Id;
			$this->save();
		}
	}
	
	public function GetInsumoById($InsumoId)
	{
		$insumo		= Doctrine::getTable('Insumo')->FindOneById( $InsumoId );
		
		if(!is_object($insumo))
			throw new Exception('El insumo buscado no existe');
		
		return $insumo;
	}
	
	public function GetFechaDeAprobacion()
	{
		// la primera fecha de aprobacion registrada
		$EstadoAprobado	=	8; // Constante, escribir en clase Constantes
		$q = Doctrine_Query::create()
		->from('OrdenEstadoHistorial e')
		->andWhere('e.OrdenEstadoId = ?', $EstadoAprobado)
		->andWhere('e.OrdenDeTrabajoId = ?', $this->Id)
		->orderBy('e.Fecha DESC')
		->limit(1);
		
		//echo $q->getSqlQuery();
		$estadoHistorial = $q->fetchOne();
		if(is_object($estadoHistorial))
		{
			// convertir timestamp a dd/mm/aaaa
			$dateHelper =   new Classes_DateHelper();
			
			return $dateHelper->toViewFormat($estadoHistorial->Fecha);
		}
	}
	
	/* 2013.05.22
	 * permite cobranza anticipada si la OT esta en estado produccion
	 * Estados: Presupuestado, En produccion
	 * utilizada para no pasar a estado Cobrada cuando esta en Produccion 
	 * (sino se pierde proceso produccion)
	 */
	public function PermiteCobranzaAnticipada()
	{
		if($this->EstadoId == 3) //En produccion
			return true;
		
		return false;
	}
	
	public function GetCondicionDeCobro()
	{
		if($this->Presupuesto->FormasDePago)
			return $this->Presupuesto->FormasDePago;
		
		return 'Sin condicion';
	}
	
	public function GetEstadoAnterior()
	{
		$q	=	Doctrine_Query::create()
			->from('OrdenEstadoHistorial e')
			->andWhere('e.OrdenDeTrabajoId = ?', $this->Id)
			->orderBy('e.Id DESC')
			->limit(1);
		//echo $q->getSqlQuery();
		$estado	=	$q->fetchOne();
		if(!is_object($estado))
			return 0;
		return $estado;
	}
}