function isMenorFechaInicio(timeFrom, timeTo)
{
	if((timeFrom	== '') || (timeTo == ''))
	{
		return false;
	}
	
	// seperar hora de am/pm
	var arrayTimeFrom	=	timeFrom.split(" ");
	var arrayTimeTo		=	timeTo.split(" ");
	//alert(arrayTimeFrom[1]);

	// son los dos AM o PM
	if (arrayTimeFrom[1] == arrayTimeTo[1])
	{
		// comparar hora y minutos
		var arrayTimeFromHoraMinuto	=	arrayTimeFrom[0].split(":");
		var arrayTimeToHoraMinuto	=	arrayTimeTo[0].split(":");

		//alert(String(arrayTimeFromHoraMinuto[0])+'--'+  String(arrayTimeToHoraMinuto[0]));
		if (Number(arrayTimeFromHoraMinuto[0]) < Number(arrayTimeToHoraMinuto[0]))	
		{
			//alert(arrayTimeFromHoraMinuto + '--' + arrayTimeToHoraMinuto);
			return true;
		}
		else
		{
			if (Number(arrayTimeFromHoraMinuto[0]) == Number(arrayTimeToHoraMinuto[0]))
			{
				if (Number(arrayTimeFromHoraMinuto[1]) < Number(arrayTimeToHoraMinuto[1]))
				{
					//alert(arrayTimeFromHoraMinuto + '--' + arrayTimeToHoraMinuto);
					return true;
				}
				else
				{
					return false;
				}
			}
			return false;
		}
	}
	else
	{
		// puede haber ingresado a mano HH:MM:SS, en este caso no va a funcionar
		// o
		// el horario con am debe ser timeFrom y pm timeTo
		// ej horario de 11am a 2pm
		if ((arrayTimeFrom[1] == 'am') && (arrayTimeTo[1] == 'pm'))
		{
			return true;
		}
		else
		{
			return false;
		}
	}

}

function calcularDuracion(timeFrom, timeTo)
{
	var arrayTimeFrom	=	timeFrom.split(" ");
	var arrayTimeTo		=	timeTo.split(" ");

	var valorHoraInicio	=	arrayTimeFrom[0];
	var valorHoraFin	=	arrayTimeTo[0];
	
	var arrayHoraInicio	=	valorHoraInicio.split(":");
	var arrayHoraFin	=	valorHoraFin.split(":");

	//alert(arrayHoraFin[0]); alert(arrayHoraInicio[0]);
	//alert(String(arrayHoraFin[1]) + String(arrayHoraInicio[1]));
	if (arrayTimeFrom[1] == arrayTimeTo[1])
	{
    	var duracionHoras	=	Number(arrayHoraFin[0]) - Number(arrayHoraInicio[0]);
    	
    	if (Number(arrayHoraFin[1]) > Number(arrayHoraInicio[1]))
    	{
    		var duracionMinutos	=	Number(arrayHoraFin[1]) - Number(arrayHoraInicio[1]);
        }
    	else
    	{
    		var duracionMinutos	=	Number(arrayHoraInicio[1]) - Number(arrayHoraFin[1]);
    	}
	}
	else
	{
		var duracionHoras	=	(12 - Number(arrayHoraInicio[0])) + Number(arrayHoraFin[0]);
		
    	if (Number(arrayHoraFin[1]) > Number(arrayHoraInicio[1]))
    	{
    		var duracionMinutos	=	Number(arrayHoraFin[1]) - Number(arrayHoraInicio[1]);
        }
    	else
    	{
    		var duracionMinutos	=	Number(arrayHoraInicio[1]) - Number(arrayHoraFin[1]);
    	}
	}
	
	return String(duracionHoras) + ':' + String(duracionMinutos);
}