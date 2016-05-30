<!-- date picker -->
<link type="text/css" href="/styles/ui-lightness/jquery-ui-1.8.2.custom.css" rel="stylesheet" />
<script type="text/javascript" src="/scripts/jquery/jquery.ui.datepicker.js"></script>
<script type="text/javascript" src="/scripts/jquery/jquery.ui.core.js"></script>
<script type="text/javascript" src="/scripts/jquery/jquery.ui.widget.js"></script>

{literal}
<script type="text/javascript">
$(document).ready(function(){

    
    $('.hasOrdenCompra').click(function() {
        
        var insumoId 		= $(this).attr('id');
        var OrdenCompraId 	= $(this).attr('OrdenCompraId');
        
        editOrdenCompra(insumoId, OrdenCompraId);
    });

	$('.VerOrdenDeTrabajo').click(function() {
        
        var url 		= $(this).attr('href');
        var opciones="toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=yes, width=1000, height=700, top=85, left=140";

		abrirPopUp(url, opciones);

		return false;
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
    
    $("#NombreProveedor").blur(function(){
        if( $(this).val() == '' )
            $(this).val( $(this).attr("defaultValue") );
    });

    $("#NombreProveedor").focus(function(){
        if( $(this).val() == $(this).attr("defaultValue"))
            $(this).val('');
    });

    $("#NombreInsumo").blur(function(){
        if( $(this).val() == '' )
            $(this).val( $(this).attr("defaultValue") );
    });

    $("#NombreInsumo").focus(function(){
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
    
    $('.InsumoEntregado').click(function() {
        
        //var href 		= $(this).attr('href');
       	r	=	confirm('Esta seguro que quiere marcar el insumo como entregado? (Pasara a ser visto por Contaduria para pagar)');

	if(r)
	{
		return true;
        //Entregado(url);
	}
        return false;
    });

    
    var availableTags = [
							{/literal}{$ArrayProveedores}{literal}
                       ];
    

    $("input#NombreProveedor").autocomplete({
        source: availableTags
    });    
    
    
});

//lo usa el popup editar orden de compra
function reload()
{
	window.location.reload();
}

function abrirPopUp(pagina, opciones)
{
	window.open(pagina,"",opciones);
}

function Entregado(url)
{
	r	=	confirm('Esta seguro que quiere marcar el insumo como entregado? (Pasara a ser visto por Contaduria para pagar)');

	if(r && url)
	{
    	$.ajax({
    		type: "POST",
    		url: url,
    		dataType: "text/html",
    		success: function(html){
    			$('#Message').html(html);
    		},
    	 	error: function(request,error){
    			$('#Message').html('<p class="error"><img src="/images/icons/error_delete.png" title="Error"/>Error al borrar la orden de compra. Intente nuevamente</p>');
    	 	  }
    	});
	}

}

function editOrdenCompra(insumoId, OrdenCompraId)
{
	window.open(	'/OrdenCompra/Edit/id/' + OrdenCompraId + '/InsumoId/' + insumoId, 
					'windowname1', 
					'width=980, height=700, scrollbars = yes');    
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
	    <td><input type="text" value="{if $filters.OrdenDeTrabajoId}{$filters.OrdenDeTrabajoId}{else}Orden de trabajo{/if}" name="filters[OrdenDeTrabajoId]" id="inicio"/></td>
	  </tr>
	  <tr>
	    <td>
	    
	    </td>
	  </tr>
	</table>
    
    
    
</td>
    <td width="30%">
	
	<div class="contInputs">
		<table width=""  border="0" cellspacing="0">
			  <tr>
			    <td rowspan="3">
			    	<img src="/images/icons/layout_edit.png" alt="" title="Ingresar nombre del proveedor"/>
			    </td>
			    <td>
		
		      
			    </td>
			  </tr>
			  <tr>
			    <td>
				  
		        <input type="text" value="{if $filters.NombreProveedor}{$filters.NombreProveedor}{else}Nombre proveedor{/if}" name="filters[NombreProveedor]" id="NombreProveedor"/>
		        
		
				</td>
			  </tr>
			  <tr>
			    <td>
			    	<input type="text" value="{if $filters.NombreInsumo}{$filters.NombreInsumo}{else}Nombre insumo{/if}" name="filters[NombreInsumo]" id="NombreInsumo"/>
			    </td>
			    </tr>
			</table>
    </div>
	
</td>
    
        <td width="30%">
			<h2><img src="/images/icons/bullet_go.png" alt="item" title="Item"/> Cantidad de insumos pendientes encontrados: {$CantidadEncontrados}</h2>        
			
        </td>
  </tr>
  <tr>
    <td width="20%">
    

    </td>
    <td width="20%"><div class="contInputs" >
					
		            <div class="buttonsCont" style="clear: left;">
						<input type="submit" id="buscar" value="Buscar" class="btDark" title="Buscar" />
						
								
		            </div>
		            
				</div></td>
	<td width="20%">
	
    		<div class="contInputs" >
					
		            <div class="buttonsCont" style="clear: left;">
						<a href="/Orden/ListProduccion"><img src="/images/icons/bullet_go.png" alt="item" title="Item"/> Ver ordenes de trabajo en produccion</a>
						
								
		            </div>
		            
				</div>	
	</td>
			       	
  </tr>
</table>
			
<h2>Insumos elegidos con Orden de compra de todas la Ordenes de trabajo en estado "Produccion" pendientes de entrega</h2>
<p><img src="/images/icons/bullet_go.png" alt="item" title="Item"/> Debe marcar cada insumo como entregado cuando corresponda</p>

       	
			<div id="Message"></div>	
	
            </div>