<!-- date picker -->
<link type="text/css" href="/styles/ui-lightness/jquery-ui-1.8.2.custom.css" rel="stylesheet" />
<script type="text/javascript" src="/scripts/jquery/jquery.ui.datepicker.js"></script>
<script type="text/javascript" src="/scripts/jquery/jquery.ui.core.js"></script>
<script type="text/javascript" src="/scripts/jquery/jquery.ui.widget.js"></script>

{literal}
<script type="text/javascript">
$(document).ready(function(){

	$('.VerOrdenDeTrabajo').click(function() {
        
        var url 		= $(this).attr('href');
        var opciones="toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=yes, width=1000, height=700, top=85, left=140";

		abrirPopUp(url, opciones);

		return false;
    });

	$('.Presupuestar').click(function(){
        var ordenid	= $(this).attr('id');
        var presupuestoid	= $(this).attr('presupuesto');		
        Presupuestar(ordenid, presupuestoid);
        
        return false;
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

    $('#FechaDesde').datepicker({
		changeMonth: true,
		changeYear: true,
        dateFormat: 'dd/mm/yy'
	});
    
    $('#FechaHasta').datepicker({
		changeMonth: true,
		changeYear: true,
        dateFormat: 'dd/mm/yy'
	});
    
    $("#NombreCliente").blur(function(){
        if( $(this).val() == '' )
            $(this).val( $(this).attr("defaultValue") );
    });

    $("#NombreCliente").focus(function(){
        if( $(this).val() == $(this).attr("defaultValue"))
            $(this).val('');
    });

    $("#inicio").blur(function(){
        if( $(this).val() == '' )
            $(this).val( $(this).attr("defaultValue") );
    });

    $("#inicio").focus(function(){
        if( $(this).val() == $(this).attr("defaultValue"))
            $(this).val('');
    });

    $("#fin").blur(function(){
        if( $(this).val() == '' )
            $(this).val( $(this).attr("defaultValue") );
    });

    $("#fin").focus(function(){
        if( $(this).val() == $(this).attr("defaultValue"))
            $(this).val('');
    });
});

function Presupuestar(OrdenId, PresupuestoId)
{
	if(OrdenId > 0)
	{
		var url	=	'/Presupuesto/Edit/popup/true/OrdenId/' + OrdenId;

		if(PresupuestoId > 0)
			url	=	url + '/id/' + PresupuestoId;
	    
		var opciones="toolbar=no, location=no, directories=no, status=no, menubar=yes, scrollbars=yes, resizable=yes, width=1000, height=700, top=85, left=140";
	
		abrirPopUp(url, opciones);        
	}
	else
		alert('El numero de orden no es correcto');
}

function reload()
{
	//window.location.reload();
	$('#frmAction').submit();
}

function abrirPopUp(pagina, opciones)
{
	window.open(pagina,"",opciones);
}

function SetPrioridad(url, $prioridadId)
{
	if($prioridadId > 0)
	{
		
		url	=	url + '/PrioridadId/' + $prioridadId + '/Ventas/SI';
	    
	    window.location	= url;
	}
}
</script>
{/literal}


	        <div class="selectFile" style="clear: left;">
	
		<table height="80" width="60%"  border="0">
  <tr>
    <td width="30%">
	
	<div class="contInputs">
    
    <table width=""  border="0" cellspacing="0">
	  <tr>
	    <td rowspan="2">  <img src="/images/icons/date.png" alt="Ordenes" title="Seleccionar intervalo de ordenes detrabajo"/></td>
	    <td><input type="text" value="{if $filters.OrdenDeTrabajoIdInicio}{$filters.OrdenDeTrabajoIdInicio}{else}Orden inicial{/if}" name="filters[OrdenDeTrabajoIdInicio]" id="inicio"/></td>
	  </tr>
	  <tr>
	    <td><input type="text" value="{if $filters.OrdenDeTrabajoIdFinal}{$filters.OrdenDeTrabajoIdFinal}{else}Orden final{/if}" name="filters[OrdenDeTrabajoIdFinal]" id="fin"/></td>
	  </tr>
	</table>
    
    
    
</td>
    <td width="30%">
	
	<div class="contInputs">
    
    <table width=""  border="0" cellspacing="0">
	  <tr>
	    <td rowspan="2">  <img src="/images/icons/date.png" title="Seleccionar intervalo de fechas"/></td>
	    <td><input type="text" value="{if $filters.FechaDesde}{$filters.FechaDesde}{else}Fecha factura desde{/if}" name="filters[FechaDesde]" id="FechaDesde"/></td>
	  </tr>
	  <tr>
	    <td><input type="text" value="{if $filters.FechaHasta}{$filters.FechaHasta}{else}Fecha factura hasta{/if}" name="filters[FechaHasta]" id="FechaHasta"/></td>
	  </tr>
	</table>
    
    
    
</td>
    <td width="30%">
	
	<div class="contInputs">
    

    
    
    <table width=""  border="0" cellspacing="0">
	  <tr>
	    <td rowspan="2">
	    	<img src="/images/icons/report_go.png" alt="Estado" title="Seleccionar estado actual de una orden"/>
	    </td>
	    <td>
	      <!-- drop down -->
    {$filters.EstadoOrdenDeTrabajoId}
      				<select name="filters[EstadoOrdenTrabajoId]" class="selCategory" id=""  title="Seleccionar estado actual de una orden">
	                        <option value="">Seleccionar estado</option>
	                        {foreach from=$EstadosOrden item="a"}
	                        <option value="{$a.Id}" {if $a.Id eq $filters.EstadoOrdenTrabajoId}selected="selected"{/if}>{$a.Nombre}</option>
	                        {/foreach}
	                 </select>
      
	    </td>
	  </tr>
	  <tr>
	    <td></td>
	  </tr>
	</table>
    
    </div>
	
</td>
    
        <td width="30%">
        
	<div class="contInputs">
		<table width=""  border="0" cellspacing="0">
			  <tr>
			    <td rowspan="3">
			    	<img src="/images/icons/layout_edit.png" alt="Cliente" title="Ingresar nombre del cliente"/>
			    </td>
			    <td>
		
		      
			    </td>
			  </tr>
			  <tr>
			    <td>
				  
		        <input type="text" value="{if $filters.NombreCliente}{$filters.NombreCliente}{elseif $NombreCliente}{$NombreCliente}{else}Nombre cliente{/if}" name="filters[NombreCliente]" id="NombreCliente"/>
		        
		      
		
				</td>
			  </tr>
			  <tr>
			    <td>&nbsp;</td>
			    </tr>
			</table>
    </div>		
        </td>
  </tr>
  <tr>
    <td width="20%"></td>
    <td width="20%"><div class="contInputs" >
					
		            <div class="buttonsCont" style="clear: left;">
						<input type="submit" id="buscar" value="Buscar" class="btDark" title="Buscar" />
						
								
		            </div>
		            
				</div></td>
	<td width="20%">
	
	
	</td>
			       	
  </tr>
</table>
			
<table border="0" cellspacing="0">
  <tr>
    <td>
					<ul class="statsList">
                        <li>
                            <h1 class="big">$ {$Resumen.TotalCostos}</h1>
                            <h2 title="Costo de insumos elegidos">Total de costos</h2>
                            <p><img src="/images/icons/help.png" alt="item" title="Costo de insumos elegidos"/></p>
                        </li>
                    </ul> <!-- /statsList -->    
    </td>
    <td>
                    <ul class="statsList">
                        <li>
                            <h1 class="big">$ {$Resumen.TotalPrecioVenta}</h1>
                            <h2>Total de precios de venta</h2>
                            <p><img src="/images/icons/help.png" alt="item" title="Asignado a las Ordenes de trabajo"/></p>
                        </li>
                    </ul> <!-- /statsList -->    
    </td>
    <td>
                	<ul class="statsList">
                        <li>
                            <h1 class="big">$ {$Resumen.TotalGanancia}</h1>
                            <h2>Ganancia total</h2>
                            <p><img src="/images/icons/help.png" alt="item" title="Precios de venta menos costos de insumos elegidos"/></p>
                        </li>
                    </ul> <!-- /statsList -->    
    </td>
    <td>
                	<ul class="statsList">
                        <li>
                            <h1 class="big">{$Resumen.CantidadOrdenesEncontradas}</h1>
                            <h2>Ordenes encontradas</h2>
                        </li>
                    </ul> <!-- /statsList -->    
    </td>
    
  </tr>
</table>
		       	
		       	<p><img src="/images/icons/help.png" alt="item" title="Item"/> Todos los costos son tomados a partir de Ordenes de Trabajo con fecha de inicio {$Resumen.FechaDesde}</p>
		       	
			<div id="Message"></div>	
	
            </div>