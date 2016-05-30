<?php

/**
 * los mutator y accesor que usan date o timestamp
 * lo usan para formatear fecha
 * 
 * @author Matias Tokar
 *
 */
class Classes_DateHelper 
{
		/**
		 * formato por defecto
		 */
		private $dateFormat;
		
		public function __construct()
		{
			/*
				$factory	= IDS_Factory_Manager::GetFactory();
				$config		= $factory->GetConfig();
				
				$this->dateFormat		=	'dd/mm/yyyy';
				
				$this->dateFormat	=	$config->Get('ids.dateformat');
			*/
				
		}
		
    	/**
    	 * modifica formato date time a DD/MM/AAAA
    	 * toma fecha de DB y lo pasa a la vista
    	 * @param $timetamp
    	 */
    	 public function toViewFormat($timestamp)
    	{
				if ($timestamp)
						return $this->getDate($timestamp);
    	}
		
    	
    	/**
    	 * cambia formato DD/MM/AAAA a date time para
    	 * guardar en DB
    	 * @param $fecha
    	 */
    	public function fromViewFormat($fecha)
    	{
				if ($fecha)
						return $this->setDate($fecha);
    	}
		
		private function getDate($timestamp)
		{
				/*
				if (!$this->is_timestamp($timestamp))
				{
						// convert date to timestamp
				}
				
				*/
				
				//echo date("m/d/y". $timestamp);
				
				switch ($this->dateFormat)
				{
						case 'dd/mm/yyyy':
								//list($fecha, $hora) = explode(" ", $timestamp);
								$fecha	=	substr($timestamp, 0, 10);
								
								list($anio, $mes, $dia) = explode("-", $fecha);
								
								if ($hora == '00:00:00')
										return $dia.'/'.$mes.'/'.$anio;
								else
										return $dia.'/'.$mes.'/'.$anio. ' '.$hora;
						case 'mm/dd/yyyy':
								list($fecha, $hora) = explode(" ", $timestamp);
								list($anio, $mes, $dia) = explode("-", $fecha);
								
								return $mes.'/'.$dia.'/'.$anio;
						default:
								//list($fecha, $hora) = explode(" ", $timestamp);
								$fecha	=	substr($timestamp, 0, 10);
								
								$hora	=	substr($timestamp, 11, 8);
								
								
								list($anio, $mes, $dia) = explode("-", $fecha);
								
								if ($hora == '00:00:00')
										return $dia.'/'.$mes.'/'.$anio;
								else
										return $dia.'/'.$mes.'/'.$anio. ' '.$hora;
				}
				
		}
    	
		private function setDate($fecha)
		{
				
				$fechaHora = explode(" ", $fecha);
				
				if(isset($fechaHora[0]))
						$fecha	=	$fechaHora[0];
				
				if(isset($fechaHora[1]))
						$hora	=	$fechaHora[1];
				
				switch ($this->dateFormat)
				{
						case 'dd/mm/yyyy':
								if (isset($hora))
								{
										list($dia, $mes, $anio) = explode("/", $fecha);
										$date	=	$anio.'-'.$mes.'-'.$dia.' '.$hora;
								}
								else
								{
										list($dia, $mes, $anio) = explode("/", $fecha);
										$date	=	$anio.'-'.$mes.'-'.$dia.' '.'00:00:00';
								}
								
					
								return $date;
						case 'mm/dd/yyyy':
								list($mes, $dia, $anio) = explode("/", $fecha);
								$date	=	$anio.'-'.$mes.'-'.$dia.' '.'00:00:00';
					
								return $date;
						default:
								//list($dia, $mes, $anio) = explode("/", $fecha);
								
								$dia	=	substr($fecha, 0, 2);
								$mes	=	substr($fecha, 3, 2);
								$anio	=	substr($fecha, 6, 4);
								
								$date	=	$anio.'-'.$mes.'-'.$dia;
					
								if (isset($hora))
								{
									$date	=	$date .' '.$hora;
								}
								
								return $date;
				}

		}
		
		private function is_timestamp ($d)
        {
				return date("m/d/y". $d);
		}
		
		/**
		 *
				@param $fecha en formato DD/MM/YYYY
				@see ExamenActaController
				La funcion regresa el numero correspondiente a la lista siguiente:
				1 Lunes
				2 Martes
				3 Miercoles
				4 Jueves
				5 Viernes
				6 Sabado
				7 Domingo
		 */
		public function Weekday($fecha)
		{
				$fecha=str_replace("/","-",$fecha);
			
				list($dia,$mes,$anio)=explode("-",$fecha);
			
				return ((((mktime ( 0, 0, 0, $mes, $dia, $anio) - mktime ( 0, 0, 0, 7, 17, 2006))/(60*60*24))+700000) % 7) + 1;

		}



}

?>