<!-- date picker -->
<link type="text/css" href="/styles/ui-lightness/jquery-ui-1.8.2.custom.css" rel="stylesheet" />
<script type="text/javascript" src="/scripts/jquery/jquery.ui.datepicker.js"></script>
<script type="text/javascript" src="/scripts/jquery/jquery.ui.core.js"></script>
<script type="text/javascript" src="/scripts/jquery/jquery.ui.widget.js"></script>

<!-- dialog -->
<script type="text/javascript" src="/scripts/jquery/jquery-ui-1.8.4.custom.min.js"></script>
<!-- dialog -->

{literal}
<script type="text/javascript">
$(document).ready(function(){

    $('.VerUltimas').click(function(){
        var url	=	'/Orden/ListCotizaciones/order/Id_DESC';
        
		window.location = url;
		
    });

	$('.VerOrdenDeTrabajo').click(function() {
        
        var url 		= $(this).attr('href');
        var opciones="toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=yes, width=1000, height=700, top=85, left=140";

		abrirPopUp(url, opciones);

		return false;
    });

    $('.VerComentario').click(function(){
        var comentarioid = $(this).attr('id');
        
		VerComentario("dialog_"+comentarioid);
		
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


function abrirPopUp(pagina, opciones)
{
	window.open(pagina,"",opciones);
}

function reload()
{
	//window.location.reload();
	$('#frmAction').submit();
}

function VerComentario(comentarioid)
{
	var id = "#"+comentarioid;
	
	$(id).dialog({
		resizable: true,
		height:200,
		width: 400, 
		modal: true,
		buttons: {
			'Aceptar': function() {
				$(this).dialog('close');
			}
		}
	});
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
			    <td rowspan="3">
			    	<img src="/images/icons/layout_edit.png" alt="Cliente" title="Ingresar nombre del cliente"/>
			    </td>
			    <td>
		
		      
			    </td>
			  </tr>
			  <tr>
			    <td>
				  
		        <input type="text" value="{if $filters.NombreCliente}{$filters.NombreCliente}{else}Nombre cliente{/if}" name="filters[NombreCliente]" id="NombreCliente"/>
		        
		      
		
				</td>
			  </tr>
			  <tr>
			    <td>
			    
			    </td>
			    </tr>
			</table>
    </div>
	
</td>
    
        <td width="30%">
        
			<h2><img src="/images/icons/bullet_go.png" alt="item" title="Item"/> Cantidad de ordenes a cotizar encontradas: {$CantidadEncontrados}</h2>
        </td>
  </tr>
  <tr>
    <td width="20%">
    <input type="reset" value="Ver ultimas" class="btDark VerUltimas" title="Ver ultimas ordenes" />
    </td>
    <td width="20%"><div class="contInputs" >
					
		            <div class="buttonsCont" style="clear: left;">
						<input type="submit" id="buscar" value="Buscar" class="btDark" title="Buscar" />
						
						
		            </div>
		            
				</div></td>
	<td width="20%">
	
	
	</td>
			       	
  </tr>
</table>
			
<h2>Ordenes de trabajo en estado Sin empezar o Buscando</h2>
<p><img src="/images/icons/bullet_go.png" alt="item" title="Item"/> Debe buscar insumos para cada orden, elegirlos y cambiar el estado a "Cotizado".<br></br><img src="/images/icons/bullet_go.png" alt="item" title="Item"/> Una orden sale del listado modificando el estado a "Cotizado" para que sea realizado el Presupuesto. Al agregar el primer insumo a una orden cambia a estado Buscando</p>
		       	
			<div id="Message"></div>	
	
            </div>