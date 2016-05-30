<!-- date picker -->
<link type="text/css" href="/styles/ui-lightness/jquery-ui-1.8.2.custom.css" rel="stylesheet" />
<script type="text/javascript" src="/scripts/jquery/jquery.ui.datepicker.js"></script>
<script type="text/javascript" src="/scripts/jquery/jquery.ui.core.js"></script>
<script type="text/javascript" src="/scripts/jquery/jquery.ui.widget.js"></script>

{literal}
<script type="text/javascript">
$(document).ready(function(){

	$('#btnExport').click(function(e){
		debugger;
		e.preventDefault();
		e.stopPropagation();

		AdvancedSearch(1);
	});

	$('#frmAction').submit(function(e) {
		e.preventDefault();
		debugger;
		if(AdvancedSearch())
			return false;

		return false;
	});

    // ocultar site header
    $('div.header').hide();
    
    $("#FechaDesde").attr('value', $("#FechaDesde").val().replace("_", "/").replace("_", "/"));
    $("#FechaHasta").attr('value', $("#FechaHasta").val().replace("_", "/").replace("_", "/"));
    $("#ClienteNombre").attr('value', $("#ClienteNombre").val().replace("_", " ").replace("_", " "));

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

    $('.AnularFactura').click(function() {
        var r = confirm('Esta seguro que desea anular la factura? Esto anulara tambien todas las prestaciones asociadas');

        if(r)
        {
			var url	=	$(this).attr("href");
	
			AnularFactura(url);
        }
		return false;
		
	});

    $('.VerFactura').click(function() {

		var id	=	$(this).attr("id");
		var url	=	'/Facturacion/FacturaImprimible/FacturaId/' + id;
	
		var opciones="toolbar=yes, location=no, directories=no, status=no, menubar=yes, scrollbars=yes, resizable=yes, width=800, height=600, top=10, left=40";
		abrirPopUp(url, opciones);		
		
		return false;
		
	});  	

	$('.SeleccionarCliente').click(function() {
		
		var pagina	= '/Cliente/Seleccionar';

		var opciones="toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=yes, width=1000, height=700, top=85, left=140";

		abrirPopUp(pagina, opciones);
		
		return false;
  	});

	$('.CrearCobranza').click(function() {
		
		var response = confirm("Esta seguro que desea crear una cobranza ?");

		if(response)
			return true;
		
		return false;
  	});
	

});

function SetCliente(ClienteId)
{
	$('#ClienteNombre').val(ClienteId);
}

function abrirPopUp(pagina, opciones)
{
	window.open(pagina,"",opciones);
}

function AdvancedSearch(forExport)
{
	var params = {
		 FechaDesde:	$("#FechaDesde").val(),
		 FechaHasta:	$("#FechaHasta").val(),
		 FacturaId:	$("#FacturaId").val(),
		 ClienteNombre:	$("#ClienteNombre").val(),
		 TipoA:	$("#TipoA:checked").val(),
		 TipoB:	$("#TipoB:checked").val(),
		 TipoN:	$("#TipoN:checked").val(),
	};
	var paramsStr = '';

    if(ValidateParams(params)){

        if(params.FechaDesde != 'Fecha desde')
		{
            var FechaDesde = params.FechaDesde.replace("/", "_").replace("/", "_");
			paramsStr = paramsStr + '/FechaDesde/' + FechaDesde;
		}
        
        if(params.FechaHasta != 'Fecha hasta')
		{
            var FechaHasta  =   params.FechaHasta.replace("/", "_").replace("/", "_");
			paramsStr = paramsStr + '/FechaHasta/' + FechaHasta;
		}

		if(params.FacturaId != 'Nro de factura')
		{
			paramsStr	=	paramsStr + '/FacturaId/' + params.FacturaId;
		}

		if(params.ClienteNombre != 'Nombre de cliente')
		{
			var ClienteNombre = params.ClienteNombre.replace(" ", "_").replace(" ", "_");
			paramsStr	=	paramsStr + '/ClienteNombre/' + ClienteNombre;
		}

		if(params.TipoA)
		{
			paramsStr	=	paramsStr + '/FacturaTipo/' + params.TipoA;
		}

		if(params.TipoB)
		{
			paramsStr	=	paramsStr + '/FacturaTipo/' + params.TipoB;
		}

		if(params.TipoN)
		{
			paramsStr	=	paramsStr + '/FacturaTipo/' + params.TipoN;
		}
    }

	// url
	if(forExport){
		paramsStr = paramsStr + '/listAction/Export';
	}

	var url = '/Facturacion/List/order/Id_DESC';
	window.location	=	url + paramsStr;
	
	return false;
}

function ValidateParams(params) {
	if( (params.FechaDesde != "Fecha desde") || (params.FechaHasta != "Fecha hasta")
			|| (params.FacturaId != "Nro de factura")
			|| (params.ClienteNombre != "Nombre de cliente")
			|| (params.TipoA == "A")
			|| (params.TipoB == "B")
			|| (params.TipoN == "N")
	){
		return true;
	}

	return false;
}

function AnularFactura(url)
{
	if(url)
	{
		$.ajax({
			type: "GET",
			url: url,
			dataType: "text/html",
			success: function(html){
				$("#AnularFactura").html(html);

				window.location.reload();
				

			}
	
		});
	}
}

function reload()
{
	window.location.reload();
}

</script>
{/literal}

<a href="/Orden/ListSinFacturar" class="linkSendHome"><img src="/images/icons/money_add.png" title="Ver ordenes de trabajo pendientes para facturar"/> Ver ordenes de trabajo pendientes para facturar &raquo;</a>
<a href="/Facturacion/List/PendienteCobro/SI" class="linkSendHome"><img src="/images/icons/money_dollar.png" title=""/> Ver facturas pendientes de cobro &raquo;</a>
<a href="/Cobranza/List/order/Fecha_DESC" class="linkSendHome"><img src="/images/icons/money_dollar.png" title=""/> Ver cobranzas realizadas &raquo;</a>


	        <div class="selectFile" style="clear: left;">
	        
		        <table border="0" cellspacing="0">
				  <tr height="50">
				    <td>
				    
				    	        	<div class="contInputs" style="clear: left;">
	
		                    <table width=""  border="0" cellspacing="0">
							  <tr>
							    <td rowspan="2">  <img src="/images/icons/date.png" alt="Fecha" title="Seleccionar intervalo de fechas"/></td>
							    <td><input type="text" value="{if $FechaDesde}{$FechaDesde}{else}Fecha desde{/if}" name="FechaDesde" id="FechaDesde"/></td>
							  </tr>
							  <tr>
							    <td><input type="text" value="{if $FechaHasta}{$FechaHasta}{else}Fecha hasta{/if}" name="FechaHasta" id="FechaHasta"/></td>
							  </tr>
							</table>
		
							            
						</div>
				    
				    </td>
				    <td>
				    
				    <div class="contInputs" style="clear: left;">
	        	
	                <table width=""  border="0" cellspacing="0">
					  <tr>
					    <td rowspan="2">  <img src="/images/icons/editPerfilModify.png" /></td>
					    <td><input type="text" value="{if $ClienteNombre}{$ClienteNombre}{else}Nombre de cliente{/if}" name="ClienteNombre" id="ClienteNombre"/></td>
					  </tr>
					  <tr>
					    <td><input type="text" value="{if $FacturaId}{$FacturaId}{else}Nro de factura{/if}" name="FacturaId" id="FacturaId"/></td>
					  </tr>
					</table>
	        
					</div> <!-- continputs -->
				    
				    </td>
				    <td>
				    
			
				    </td>
				    <td>
				    
				    <div class="contInputs" style="clear: left;">
	        	
	                <table width=""  border="0" cellspacing="0">
					  <tr>
					    <td rowspan="2">  <img src="/images/icons/report_go.png" /></td>
					    <td>
							    
		                    <label class="blue">Tipo de factura</label>
							    
					    </td>
					  </tr>
					  <tr>
					    <td align="center">
					    	<input class="check" id="TipoA" type="radio" name="FacturaTipo" value="A" {if $FacturaTipo == 'A'}checked="checked"{/if}/>
		                    <label class="check blue">A</label>
		                    <input class="check" id="TipoB" type="radio" name="FacturaTipo" value="B" {if $FacturaTipo == 'B'}checked="checked"{/if}/>
		                    <label class="check blue">B</label>
		                    <input class="check" id="TipoN" type="radio" name="FacturaTipo" value="N" {if $FacturaTipo == 'N'}checked="checked"{/if}/>
		                    <label class="check blue">N</label>
					   	</td>
					  </tr>
					</table>
	        
					</div> <!-- continputs -->
				    
				    </td>
				    <td>
				    	
				    </td>
				  </tr>
				  <tr height="50">
				    <td>
				    
					    <div class="buttonsCont" style="clear: left;">
							<input type="submit" id="buscar" value="Buscar" class="btDark" title="Buscar" />
							
			        	</div>
				    
				    </td>
				    <td>
				    <h2><img src="/images/icons/bullet_go.png" alt="item" title="Item"/> Cantidad de facturas encontradas: {$CantidadEncontrados}</h2>
				    </td>
				    <td>

						<div class="buttonsCont" style="clear: left;">
							<form action="/Facturacion/Export" metho="POST">
								<input type="submit" id="btnExport" value="Exportar" class="btDark" title="Exportar" />
							</form>

						</div>
				    
				    </td>
				    <td>
				    
				    	<div class="buttonsCont" style="clear: left;">
				    	<!-- 
							<input type="reset" id="" value="Cobranzas" class="btDark" title="Ver cobranzas" onclick="window.location='/Cobranza/List'"/>
							 -->
			        	</div>
				    
				    </td>
				  </tr>
				</table>
			
            <div id="AnularFactura"></div>
            
            </div><!-- select file -->    