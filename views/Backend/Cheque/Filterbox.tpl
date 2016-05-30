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
	
	$('#frmAction').submit(function() {
		
    	if(AdvancedSearch())
			return false;

    	return false;
  	});
  	
	$("#FechaDesde").attr('value', $("#FechaDesde").val().replace("_", "/").replace("_", "/"));
    $("#FechaHasta").attr('value', $("#FechaHasta").val().replace("_", "/").replace("_", "/"));
    $("#NombreProveedor").attr('value', $("#NombreProveedor").val().replace("_", " ").replace("_", " ").replace("_", " "));
    $("#NombreCliente").attr('value', $("#NombreCliente").val().replace("_", " ").replace("_", " ").replace("_", " "));
	
	var availableTags = [
							{/literal}{$ArrayProveedores}{literal}
                 ];


	$("input#NombreProveedor").autocomplete({
	     source: availableTags
	});

	$("#NombreProveedor").blur(function(){
        if( $(this).val() == '' )
            $(this).val( $(this).attr("defaultValue") );
    });

    $("#NombreProveedor").focus(function(){
        if( $(this).val() == $(this).attr("defaultValue"))
            $(this).val('');
    });

    $("#NombreCliente").blur(function(){
        if( $(this).val() == '' )
            $(this).val( $(this).attr("defaultValue") );
    });

    $("#NombreCliente").focus(function(){
        if( $(this).val() == $(this).attr("defaultValue"))
            $(this).val('');
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

	$('.anular').click(function() {
		
		var url = $(this).attr('href');
		var r = confirm('Esta seguro que desea anular el cheque?');
		
		if(r)
		{
			$.ajax({
				type: "POST",
				url: url,
				dataType: "text/html",
				success: function(html){
					$("#Anular").html(html);
					//window.location.reload();
				}
			});

			return false;
		}	
		else
			return false;
  	});
    
    $("#Numero").blur(function(){
        if( $(this).val() == '' )
            $(this).val( $(this).attr("defaultValue") );
    });

    $("#Numero").focus(function(){
        if( $(this).val() == $(this).attr("defaultValue"))
            $(this).val('');
    });

    
});

function AdvancedSearch()
{
	var Estado	=	$("#estadoId option:selected").val();
    var Numero	=	$("#Numero").val();
	var NombreProveedor	=	$("#NombreProveedor").val();
	var NombreCliente	=	$("#NombreCliente").val();
    var FechaDesde	=	$("#FechaDesde").val();
    var FechaHasta	=	$("#FechaHasta").val();
	

	if( (Estado != '') || (Numero != "Numero") 
			|| (NombreProveedor != "Nombre proveedor")
			|| (NombreCliente != "Nombre cliente")
			|| (FechaDesde != "Fecha cobro desde") || (FechaHasta != "Fecha cobro hasta") 
			)
    {
        // url
        var url = '/Cheque/List/order/Numero_DESC';
	
		if(NombreProveedor != 'Nombre proveedor')
		{
			// quitar espacios
			NombreProveedor = NombreProveedor.replace(" ", "_").replace(" ", "_").replace(" ", "_").replace(" ", "_");

			url = url + '/NombreProveedor/' + NombreProveedor;
		}

		if(NombreCliente != 'Nombre cliente')
		{
			// quitar espacios
			NombreCliente = NombreCliente.replace(" ", "_").replace(" ", "_").replace(" ", "_").replace(" ", "_");

			url = url + '/NombreCliente/' + NombreCliente;
		}

		if(FechaDesde != 'Fecha cobro desde')
		{
            FechaDesde = FechaDesde.replace("/", "_").replace("/", "_");
            
			url = url + '/FechaDesde/' + FechaDesde;
		}
        
        if(FechaHasta != 'Fecha cobro hasta')
		{
            FechaHasta  =   FechaHasta.replace("/", "_").replace("/", "_");
			url = url + '/FechaHasta/' + FechaHasta;
		}
	
		if(Numero != 'Numero')
		{
			url = url + '/Numero/' + Numero;
		}

		if(Estado != '')
		{
			url = url + '/Estado/' + escape(Estado);
		}

        //alert(url);
        //var res = encodeURIComponent(url);
        
        window.location	=	url;
    
		return true;
    }
	
	return false;
}


</script>
{/literal}

<div id="Anular"></div>

<!-- dialog confirm -->
	<div id="reglas_aprobacion" title="Reglas para aprobar presupuesto" style="display:none">
	
		<h2>Si acepta la orden pasara a estado "Aprobado"</h2>
		<p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 40px 40px 0;"></span>	
			<ul>
				<li>Verificar fechas comprometidas con los proveedores</li>
				<li>Verificar si es un proyecto que requiera anticipo</li>
				<li>Verificar conformidad de cliente via email</li>
				<li>Verificar firma de prototipo</li>
			</ul>
			
		</p>
	</div>

	        <div class="selectFile" style="clear: left;">
	
		<table height="80" width="60%"  border="0">
  <tr>
    
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
				  
		        	<input type="text" value="{if $filters.Numero}{$filters.Numero}{else}Numero{/if}" name="filters[Numero]" id="Numero"/>
		      
		
				</td>
			  </tr>
			  <tr>
			    <td>
			    
			    	<select name="filters[Estado]" class="selCategory" id="estadoId">
	                        <option value="">Seleccionar estado</option>
	                        {foreach from=$Estados item="a" key="key"}
	                        <option value="{$key}" {if $key eq $filters.Estado}selected="selected"{/if}>{$a}</option>
	                        {/foreach}
	                 </select>
			    
			    </td>
			    </tr>
			</table>
    </div>
	
</td>
    
    	<td width="30%">
	
			
		    <table width=""  border="0" cellspacing="0">
			  <tr>
			    <td rowspan="2">  <img src="/images/icons/date.png" title="Seleccionar intervalo de fechas"/></td>
			    <td><input type="text" value="{if $filters.FechaDesde}{$filters.FechaDesde}{else}Fecha cobro desde{/if}" name="filters[FechaDesde]" id="FechaDesde"/></td>
			  </tr>
			  <tr>
			    <td><input type="text" value="{if $filters.FechaHasta}{$filters.FechaHasta}{else}Fecha cobro hasta{/if}" name="filters[FechaHasta]" id="FechaHasta"/></td>
			  </tr>
			</table>
		    
	    
	    
		</td>
		<td width="30%">
	
			
		    <table width=""  border="0" cellspacing="0">
			  <tr>
			    <td rowspan="2">  <img src="/images/icons/editPerfilModify.png" alt="icon" title="Seleccionar intervalo de ordenes detrabajo"/></td>
			    <td><input type="text" value="{if $filters.NombreProveedor}{$filters.NombreProveedor}{else}Nombre proveedor{/if}" name="filters[NombreProveedor]" id="NombreProveedor"/></td>
			  </tr>
			  <tr>
			    <td><input type="text" value="{if $filters.NombreCliente}{$filters.NombreCliente}{else}Nombre cliente{/if}" name="filters[NombreCliente]" id="NombreCliente"/></td>
			  </tr>
			</table>
		    
	    
	    
		</td>
        <td width="30%">
        
			<h2><img src="/images/icons/bullet_go.png" alt="item" title="Item"/> Cantidad encontrados: {$CantidadEncontrados}</h2>
        </td>
  </tr>
  <tr>
    <td width="20%">
    
    <div class="buttonsCont" style="clear: left;">
						<input type="submit" id="buscar" value="Buscar" class="btDark" title="Buscar" />
						
						
		            </div>
    	<!-- 
    	<input type="reset" value="Ver ultimas" class="btDark VerUltimas" title="Ver ultimas ordenes" />
    	 -->
    </td>
    <td width="20%"><div class="contInputs" >
					
		            
		            
				</div></td>
	<td width="20%">
	
	
	</td>
			       	
  </tr>
</table>
			
			<div id="Message">
					{if $SuccessMessage}<p class="success">{$SuccessMessage}</p>{/if}
			</div>	
				
            </div>