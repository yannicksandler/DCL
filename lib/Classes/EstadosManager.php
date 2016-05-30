<?php
    class Classes_EstadosManager
    {
        private $_orden    =  null;
        
        public function __construct($ordenDeTrabajo){
        	if(!is_object($ordenDeTrabajo))
        		throw Exception('Orden de trabajo no es un objeto');
        		
        	$this->_orden = $ordenDeTrabajo;
        }
        
        public function GetOrden()
        {
        	return $this->_orden;
        }
        
		public function SetEstadoProduccion()
		{
			$this->GetOrden()->SetEstadoProduccion();
		}
		
		public function ControlarCambiosDeEstado()
		{
			
			if(!$this->ComprobarMatrizTransicionEstados())
			{
				// pasaje de estado incorrecto, debe volver a estado anterioir
				$estadoAnterior	=	$this->GetOrden()->GetEstadoAnterior();
				if(!is_object($estadoAnterior))
					$estadoAnteriorId	=	0; // sin estado anterioir
				else
					$estadoAnteriorId	=	$estadoAnterior->OrdenEstadoId;

				$this->GetOrden()->EstadoId = $estadoAnteriorId;
				return;
			}
			
			$this->ControlarCambioEstadoFinalizado();
			$this->ControlarCambioProduccion();
			$this->ControlarCambioPresupuestado();
			$this->ControlarCambioCotizado();
			
		}
		
		public function ComprobarMatrizTransicionEstados()
		{
			// plantear matriz de estados
			// representa pasaje de estado anterior al estado actual, segun id de estado como index
			
			// sin estado, sin empezar, buscando, cotizado, presupuestado, aprobado, produccion, finalizado, cobrado, anulado
			$matriz	=	array(
							9    => array(9    => 0,0    => 1,7    => 0,1    => 0,2    => 0,8    => 0,3    => 0,4    => 0,5    => 0,6    => 0),	// estado inicial (sin estado anterior a sin empezar)
							0    => array(9    => 0,0    => 0,7    => 1,1    => 0,2    => 0,8    => 0,3    => 0,4    => 0,5    => 0,6    => 1),
							7    => array(9    => 0,0    => 0,7    => 0,1    => 1,2    => 0,8    => 0,3    => 0,4    => 0,5    => 0,6    => 1),
							1    => array(9    => 0,0    => 0,7    => 0,1    => 0,2    => 1,8    => 0,3    => 0,4    => 0,5    => 0,6    => 1),
							2    => array(9    => 0,0    => 0,7    => 0,1    => 0,2    => 0,8    => 1,3    => 0,4    => 0,5    => 0,6    => 1),
							8    => array(9    => 0,0    => 0,7    => 0,1    => 0,2    => 0,8    => 0,3    => 1,4    => 0,5    => 0,6    => 1),
							3    => array(9    => 0,0    => 0,7    => 0,1    => 0,2    => 0,8    => 0,3    => 0,4    => 1,5    => 0,6    => 1),
							4    => array(9    => 0,0    => 0,7    => 0,1    => 0,2    => 1,8    => 0,3    => 0,4    => 0,5    => 1,6    => 1),
							5    => array(9    => 0,0    => 0,7    => 0,1    => 0,2    => 1,8    => 0,3    => 0,4    => 0,5    => 0,6    => 0), // estado final (cobrado)
							6    => array(9    => 0,0    => 0,7    => 0,1    => 0,2    => 1,8    => 0,3    => 0,4    => 0,5    => 0,6    => 0)	// estado final (anulado)
						);
			
			$estadoAnterior	=	$this->GetOrden()->GetEstadoAnterior();
			if(!is_object($estadoAnterior))
				$estadoAnteriorId	=	0; // sin estado anterior
			else
				$estadoAnteriorId	=	$estadoAnterior->OrdenEstadoId;
			
			$estadoActualId	=	$this->GetOrden()->EstadoId;
			//echo $matriz[$estadoAnteriorId][$estadoActualId];
			return $matriz[$estadoAnteriorId][$estadoActualId];
		}
		
		/* si cambio a estado finalizado, elimino prioridad */
		/* solo cambiar a finalizado si todos los insumos
		 * fueron entregados
		 */
		public function ControlarCambioEstadoFinalizado($data=null)
		{
			if( $this->GetOrden()->Estado->Nombre == 'Finalizado')
			{
				if(!$this->GetOrden()->HasAllInsumosEntregados())
				{
					throw new Exception('No estan entregados todos los insumos. Para finalizar la Orden de trabajo deben estar todos los insumos entregados');
				}
			}
			
			if(isset($data['EstadoId']))
			{
				$estado		= Doctrine::getTable('OrdenEstado')->FindOneById( $data['EstadoId'] );
				if( $estado->Nombre == 'Finalizado')
				{
					if(!$this->GetOrden()->HasAllInsumosEntregados())
					{
						throw new Exception('No estan entregados todos los insumos. Para finalizar la Orden de trabajo deben estar todos los insumos entregados');
					}
					$this->GetOrden()->AnularPrioridad();
				}
			}
		}
		
    	public function ControlarCambioProduccion()
		{
			if( $this->GetOrden()->Estado->Nombre == 'En produccion')
			{
				$o = $this->GetOrden();
				
				if(!$o->HasInsumos())
				{
					//echo 'La orden de trabajo no tiene insumos agregados. No puede pasar a estado Produccion';
					throw new Exception('La orden de trabajo no tiene insumos agregados. No puede pasar a estado Produccion');
				}
			}
		}
		
    	public function ControlarCambioPresupuestado()
		{
			if( $this->GetOrden()->Estado->Nombre == 'Presupuestado')
			{
				$o = $this->GetOrden();
				/* debe tener insumos agregados para crear el presupuesto */
				$o->ControlarCreacionPresupuesto();
				
			}
		}
		
		/*
		 * debe tener al menos un insumo
		 */
    	public function ControlarCambioCotizado()
		{
			if( $this->GetOrden()->Estado->Nombre == 'Cotizado')
			{
				$o = $this->GetOrden();
				
				if(!$o->HasInsumos())
				{
					//echo 'La orden de trabajo no tiene insumos agregados. No puede pasar a estado Cotizado';
					throw new Exception('La orden de trabajo no tiene insumos agregados. No puede pasar a estado Cotizado');
				}				
			}
		}
		
		public function ControlarCambioBuscando()
		{
			echo 'buscando';
			$orden	=	$this->GetOrden();
			// crear metodo
			$estado		= Doctrine::getTable('OrdenEstado')->FindOneByNombre( 'Buscando' );
			if(is_object($estado))
			{
				/* solo cambia a estado "Buscando" cuando agrego primer insumo */
				if(($orden->GetCantidadInsumos() == 0) ||
						($orden->GetCantidadInsumos() == 1))
				{
					$orden->EstadoId	=	$estado->Id;
					$orden->save();
			
					return true;
				}
			}
			
			return false;
		}
		
    	public function SetEstadoAprobado()
		{
			$this->GetOrden()->SetEstadoAprobado();
		}
		
		public function HasChangeFechaEstimada($data)
		{
			$orden = $this->GetOrden();
			
			if(! $orden->HasTiempoEstimado())
			{
				if(isset($data['TiempoEstimado']))
				{
					return true;
				}
				
				return false;
			}
		}
		
    	public function SetEstadoCotizado()
		{
			$this->GetOrden()->SetEstadoCotizado();
		}
		/* usado en orden de trabajo edit para no controlar estados
		 * si anulo orden 
		 */
		public function IsEstadoAnulado($data)
		{
			if(isset($data['EstadoId']))
			{
				$estado		= Doctrine::getTable('OrdenEstado')->FindOneByNombre( 'Anulado' );
				if($estado->Id == $data['EstadoId'])
				{
					return true;
				}
			}
			
			return false;
		}
		
		public function IsEstadoSinEmpezar()
		{
			$o = $this->GetOrden();
			
			if($o->IsEstado('Sin empezar'))
			{
				return true;
			}
			
			return false;
		}
    }
?>