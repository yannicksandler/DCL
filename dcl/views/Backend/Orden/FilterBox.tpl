<!-- date picker -->
<link type="text/css" href="/styles/ui-lightness/jquery-ui-1.8.2.custom.css" rel="stylesheet" />
<script type="text/javascript" src="/scripts/jquery/jquery.ui.datepicker.js"></script>
<script type="text/javascript" src="/scripts/jquery/jquery.ui.core.js"></script>
<script type="text/javascript" src="/scripts/jquery/jquery.ui.widget.js"></script>


{literal}
<script type="text/javascript">
$(document).ready(function(){
	
    $('#frmAction').submit(function() {

    	var FechaCambio	=	$("#FechaCambio").val();
    	if(FechaCambio != 'Fecha cambio')
        	return true;
    	
        if (	isChangeValues()  )
        {
        	return false;
        }

  	  	return false;
  	});

    $('.VerUltimas').click(function(){
        var url	=	'/Orden/List/order/Id_DESC';
        
    	var cliente	=   $('#NombreCliente').val();
    	if(cliente != 'Nombre cliente')
    	{
			url = url + '/NombreCliente/' + cliente;
    	}
        	
		window.location = url;
		
    });

    $('.CambiarPrioridad').change(function(){
        
        var url	=   $(this).attr("href");

		var $selected 	=	$(this).find('option:selected');
		var $prioridadId	=	$selected.val();
			
		if( $prioridadId > 0 )
		{
			SetPrioridad(url, $prioridadId);
		}
    });

    ConvertDescripcion();


    $("#NombreCliente").blur(function(){
        if( $(this).val() == '' )
            $(this).val( $(this).attr("defaultValue") );
    });

    $("#NombreCliente").focus(function(){
        if( $(this).val() == $(this).attr("defaultValue"))
            $(this).val('');
    });
    
    $('#FechaCambio').datepicker({
		changeMonth: true,
		changeYear: true,
        dateFormat: 'dd/mm/yy'
	});
});

function ConvertDescripcion()
{
	var start	=	0;
	var length	=	25;

	var d	=	$('a.Descripcion');

	d.each(function(){
		
		var descripcion	=	$(this).text();
		descripcion.substr(start,length);
		$(this).text(descripcion.substr(start,length) + ' ...');
	});
	
}

function SetPrioridad(url, $prioridadId)
{
	if($prioridadId > 0)
	{
		url	=	url + '/PrioridadId/' + $prioridadId + '/order/PrioridadId_DESC';
	    
	    window.location	= url;
	}
}

function isChangeValues()
{
	var EstadoId	=	$("#estadoId option:selected").val();
	var PrioridadId	=	$("#PrioridadId option:selected").val();
	var NombreCliente	=	$("#NombreCliente").val();
    var OrdenDeTrabajoId	=	$("#OrdenDeTrabajoId").val();
    
	

	if( EstadoId || (NombreCliente != "Nombre cliente") || OrdenDeTrabajoId || PrioridadId)
    {
        // url
        var url = '/Orden/List/order/PrioridadId_DESC';
		
		if(OrdenDeTrabajoId != 'Nro de orden')
		{
			url = url + '/OrdenDeTrabajoId/' + OrdenDeTrabajoId;
		}

		if(EstadoId != '')
		{
			url = url + '/EstadoOrdenTrabajoId/' + EstadoId;
		}

		if(PrioridadId)
		{
			url = url + '/PrioridadId/' + PrioridadId;
		}
		
		if(NombreCliente != 'Nombre cliente')
		{
			// quitar espacios
			NombreCliente = NombreCliente.replace(" ", "_").replace(" ", "_").replace(" ", "_").replace(" ", "_");

			url = url + '/NombreCliente/' + escape(NombreCliente);
		}
        //alert(url);
        window.location	=	url;
    
		return true;
    }
	
	return false;
}


</script>
{/literal}
	       	
	       	<form id="frmAction" action="" method="post">
	        <p>
				<div class="contInputs" style="clear: left;">
	                
	                <select name="EstadoOrdenTrabajoId" class="selCategory" id="estadoId">
	                        <option value="">Seleccionar estado</option>
	                        {foreach from=$EstadosOrden item="a"}
	                        <option value="{$a.Id}" {if $a.Id eq $OrdenEstadoId}selected="selected"{/if}>{$a.Nombre}</option>
	                        {/foreach}
	                 </select>
	                 
	                 <input type="text" value="{if $NombreCliente}{$NombreCliente}{else}Nombre cliente{/if}" name="NombreCliente" id="NombreCliente"/>
	                 
	                 <input type="text" value="{if $OrdenDeTrabajoId}{$OrdenDeTrabajoId}{else}Nro de orden{/if}" name="OrdenDeTrabajoId" id="OrdenDeTrabajoId"/>
	                 
	                 <select href="/{$varController}/SetPrioridad/OrdenId/{$record.Id}" id="PrioridadId" name="PrioridadId">
		                        <option value="">Prioridad</option>
		                        {foreach from=$Prioridades item="p"}
		                        <option value="{$p.Id}" {if $p.Id eq $SelectedPrioridadId}selected="selected"{/if}>{$p.Nombre}</option>
		                        {/foreach}
		             </select>
		             
		             <input type="text" value="{if $FechaCambio}{$FechaCambio}{else}Fecha cambio{/if}" name="FechaCambio" id="FechaCambio" title="Selecciona ordenes con fecha de proximo cambio de estado iguales o mayores a la fecha seleccionada"/>
		       	</div>
		       	</p>
		       	<p> <br></br></p>
		       	<div class="contInputs" >

		            <div class="buttonsCont" style="clear: left;">
						<input type="submit" value="Buscar" class="btDark" title="Buscar" />
						<input type="reset" value="Ver ultimas" class="btDark VerUltimas" title="Ver ultimas. Si ingresa el nombre de un cliente puede ver las ultimas ordenes de un cliente. Sino ultimas de todos los clientes" />
		            </div>
		            
				</div>
				
				<input type="hidden" name="updateNewValue" id="updateValue" value="" />
	            <input type="hidden" name="postAction" id="action" value="" />
	            <input type="hidden" name="listAction" id="listAction" value="list" />
            </form>    