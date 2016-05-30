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

        if (	BuscarCheque()  )
        {
        	return false;
        }

  	  	return false;
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

function BuscarCheque()
{
	var Estado	=	$("#estadoId option:selected").val();
    var Numero	=	$("#Numero").val();
    
	

	if( Estado || Numero)
    {
        // url
        var url = '/Cheque/List/order/Numero_DESC';
		
		if(Numero != 'Numero')
		{
			url = url + '/Numero/' + Numero;
		}

		if(Estado != '')
		{
			url = url + '/Estado/' + encodeURIComponent(Estado);
		}

        //alert(url);
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
				  
		        <input type="text" value="{if $Numero}{$Numero}{else}Numero{/if}" name="filters[OrdenDeTrabajoIdInicio]" id="Numero"/>
		      
		
				</td>
			  </tr>
			  <tr>
			    <td>
			    
			    	<select name="EstadoId" class="selCategory" id="estadoId">
	                        <option value="">Seleccionar estado</option>
	                        {foreach from=$Estados item="a"}
	                        <option value="{$a.Nombre}" {if $a.Nombre eq $EstadoSeleccionado}selected="selected"{/if}>{$a.Nombre}</option>
	                        {/foreach}
	                 </select>
			    
			    </td>
			    </tr>
			</table>
    </div>
	
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