{assign var='IDS_Layout_Class' value='Backend_Layouts_Default'}
{assign var='IDS_Layout_Method' value='Default'}

<!-- date picker -->
<link type="text/css" href="/styles/ui-lightness/jquery-ui-1.8.2.custom.css" rel="stylesheet" />
<script type="text/javascript" src="/scripts/jquery/jquery.ui.datepicker.js"></script>
<script type="text/javascript" src="/scripts/jquery/jquery.ui.core.js"></script>
<script type="text/javascript" src="/scripts/jquery/jquery.ui.widget.js"></script>

<script type="text/javascript" src="/scripts/Edit.js"></script>

<!-- dialog -->
<script type="text/javascript" src="/scripts/jquery/jquery-ui-1.8.4.custom.min.js"></script>
<!-- dialog -->

{literal}
<script type="text/javascript">

$(document).ready(function(){
    $("#FrmEdit").validate();

    $('#FechaAnulacion').datepicker({
		changeMonth: true,
		changeYear: true,
        dateFormat: 'dd/mm/yy'
	});
	
    var availableTags = [
							{/literal}{$ArrayClientes}{literal}
                 ];

    {/literal}
        {if $Cliente && !$data.Id}
        GetFacturasPendientesDeCobro();
        {/if}
    {literal}

    $("input#cliente_autocomplete").autocomplete({
        source: availableTags,
      //define select handler
		select: function(e, ui) {
			var valor = ui.item.value;
			SetClienteSeleccionar(valor);
			GetFacturasPendientesDeCobro();
		}    
    });  

    SetClienteInitTextValue();
    SetClienteSeleccionar($("input#cliente_autocomplete").val());

    $("#cliente_autocomplete").blur(function(){
        if( $(this).val() == '' )
            $(this).val( $(this).attr("defaultValue") );
    });

    $("#cliente_autocomplete").focus(function(){
        if( $(this).val() == $(this).attr("defaultValue"))
            $(this).val('');
    });

    $(".Print").click(function(){
        
        var url	=	'/Cobranza/View/id/' + $('#CobranzaId').val();
        
		var opciones="toolbar=no, location=no, directories=no, status=no, menubar=yes, scrollbars=yes, resizable=yes, width=1000, height=700, top=85, left=140";

		abrirPopUp(url, opciones);        

        return false;
    });

	$("#mostrarFacturasPendientes").click(function () {
    	$("#FacturasPendientesDeCobro").toggle("slow");
   	});

	$("#mostrarDetalleDePago").click(function () {
    	$("#Pagos").toggle("slow");
   	});

	$("#SeleccionarCliente").hide();

    $(".SetTipoCobranza").click(function(){
        
    	GetFacturasPendientesDeCobro();
    });

	$(".VerCuentaCorriente").click(function(){
        
		var url	=	'/CuentaCorriente/ListCliente/ClienteId/' + GetClienteId();
        
		var opciones="toolbar=no, location=no, directories=no, status=no, menubar=yes, scrollbars=yes, resizable=yes, width=1000, height=700, top=85, left=140";

		abrirPopUp(url, opciones);        

        return false;
    });
	
    
});

function SetClienteSeleccionar(NombreCliente)
{
	inputText	=	NombreCliente;
	// setear valor select selected por texto de option / set option selected by text
	//$("#"+dropdown_id+" option:contains(" + inputText + ")").attr('selected', 'selected');
	
	$("#SeleccionarCliente option").each(function () {
        if ($(this).html() == inputText) {
            $(this).attr("selected", "selected");
            return;
        }
	});

	
}

function GetFacturasPendientesDeCobro()
{
	// dropdown
	var $selected 	=	$("#SeleccionarCliente").find('option:selected');
	var $clienteid	=	$selected.val();

	{/literal}
        {if $Cliente}
        // Si el clienteid fue pasado por GET
        var $clienteid	=	{$Cliente.Id};
        {/if}
    {literal}
	
	// control
	if( $clienteid < 0 )
	{
		alert('El cliente seleccionado no es correcto');
	}
	
	// cargar FC pendientes por ajax
	$.ajax({
		type: "POST",
		url: '/Cobranza/GetFacturasPendientesDeCobro',
		dataType: "text/html",
		data: {
			'ClienteId': $clienteid,
			'TipoCobranza': GetTipoCobranza(),
		},
		success: function(html){
			$("#FacturasPendientesDeCobro").html(html);
			GetPagos('list', null);
			ResetImportes();
		}

	});
}

function SetClienteInitTextValue()
{
	NombreCliente = GetSelectedTextValue("SeleccionarCliente");
	if(NombreCliente != 'Seleccionar')
		$("input#cliente_autocomplete").val(NombreCliente);
}

function GetSelectedTextValue(dropdownid)
{
	var $selected 	=	$("#"+dropdownid).find('option:selected');
	var $selectedtext	=	$selected.html();

	return $selectedtext;
}


function abrirPopUp(pagina, opciones)
{
	window.open(pagina,"",opciones);
}

function GetPagos(accion, CobranzaId)
{
	var PagoId;
	// cuando accion es delete, el parametro es PagoId en lugar de OrdenDePagoId
	if(accion == 'del')
	{
		PagoId	=	CobranzaId;
	}

	var TipoPagoId	=	$("#PagoTipoId option:selected").val();
	//alert(TipoPagoId);
	//cheque tercero
	if(TipoPagoId == 4)
	{
		var banco	=	$('#BancoItem').val();
		var cuenta	=	 $('#CuentaItem').val();
		var sucursal	=	$('#SucursalItem').val();
	}
	// transferencia
	if(TipoPagoId == 13)
	{
		var banco	=	$("#BancoTransfItem option:selected").val();
		var cuenta	=	 $('#CuentaTransfItem').val();
		var sucursal	=	$('#SucursaTransflItem').val();
	}
	
	var notacreditoid = $('#NotaCreditoId').val();
	if(notacreditoid > 0)
	{
		TipoPagoId=12;
	}
	// al borrar es CobranzaDetalleId
	$.ajax({
		type: "POST",
		url: '/Cobranza/GetPagos',
		dataType: "text/html",
		data: {
			'Accion': accion,
			'CobranzaId': CobranzaId,
			'data[CobranzaId]': $('#CobranzaId').val(),
			'data[ClienteId]': GetClienteId(),
			'data[Importe]': $('#ImportePagoItem').val(),
			'data[PagoTipoId]': TipoPagoId,
			'data[Detalle]': $('#DetallePagoItem').val(),
			'data[PagoId]': PagoId,
			'data[Banco]': banco,
			'data[Sucursal]': sucursal,
			'data[ImporteCheque]': $('#ImporteChequeItem').val(),
			'data[ImporteTransferencia]': $('#ImporteTransferenciaItem').val(),
			'data[Localidad]': $('#LocalidadItem').val(),
			'data[Numero]': $('#NumeroItem').val(),
			'data[Cuenta]': cuenta,
			'data[FechaCheque]': $('#FechaChequeItem').val(),
			'data[FechaCobro]': $('#FechaCobroItem').val(),
			'data[Firmante]': $('#FirmanteItem').val(),
			'data[Cuit]': $('#CuitItem').val(),
			'data[NotaCreditoId]': notacreditoid
		},
		success: function(html){
			$("#Pagos").html(html);
			SetImportePagado();
		}

	});

	return false;
}

function SetImportePagado()
{
	var importe	=	parseFloat($('#TotalPago').val()).toFixed(2);
	
	$('#ImporteTotalPagado').html('<label>$ '+ importe + '</label>');
	$('#ImporteTotalPagadoInput').val(importe);
	
	SetImporteRestante();
}

function IsSetCliente()
{
	var $selected 	=	$("#SeleccionarCliente").find('option:selected');
	var $id	=	$selected.val();
	// control
	if($id > 0)
		return true;

	return false;
}

function GetTipoCobranza()
{
	if($("#TipoB").attr('checked'))
	{
		return $("#TipoB").val();
	}

	if($("#TipoN").attr('checked'))
	{
		return $("#TipoN").val();
	}
}
/*
function GetLiquidacion(accion, CobranzaId)
{
	
	// al borrar es CobranzaLiquidacionId
	$.ajax({
		type: "POST",
		url: '/Cobranza/GetLiquidacion',
		dataType: "text/html",
		data: {
			'Accion': accion,
			'CobranzaId': $('#CobranzaId').val(),
			'data[Tipo]': GetTipoCobranza(),
			'data[CobranzaId]': CobranzaId,
			'data[NumeroFactura]': $('#NumeroItem').val(),
			'data[Importe]': $('#ImporteItem').val()
		},
		success: function(html){
			
			$("#Liquidacion").html(html);
		}

	});

	return false;
}
*/
function GetClienteId()
{
	var $selected 	=	$("#SeleccionarCliente").find('option:selected');
	var $id	=	$selected.val();
	// control
	if($id > 0)
		return $id;

	//alert('Ingrese el proveedor');

	return false;
}

function ResetImportes()
{
	$('#TotalPago').val(0);
	$('#ImporteTotalPagado').html('<label>$ 0.0</label>');
	$('#ImporteTotalPagadoInput').val(0);
	$('#ImporteTotalLiquidadoInput').val(0);
	$('#ImporteTotalLiquidado').html('<label>$ 0.0</label>');
	$('#ImporteRestante').html('<label>$ 0.0</label>');
	$('#ImporteRestanteInput').val(0);
}

function SetImporteRestante()
{
	var importeRestante	= parseFloat($('#ImporteTotalLiquidadoInput').val()).toFixed(2) - parseFloat($('#ImporteTotalPagadoInput').val()).toFixed(2);	
	
	$('#ImporteRestante').html('<label>$ '+ importeRestante.toFixed(2) + '</label>');
	$('#ImporteRestanteInput').val(importeRestante.toFixed(2));
}


</script>
{/literal}


<h1>{if $data.Id}Editar{else}Nueva{/if} cobranza &raquo; <span>{$data.Numero} (Interno {$data.Id})</span></h1>

		{if $data.Id}        
         <input type="reset" value="Imprimir" id="{$data.Id}" class="btDark Print" title="Imprimir" />
        {/if}


<form id="FrmEdit" enctype="multipart/form-data" action="" method="post">
    <input type="hidden" id="CobranzaId" name="data[Id]" value="{$data.Id}" />
    
        
    <div class="form">
        {include file="Backend/Cobranza/ColumnForm.tpl"}
            
        <div class="contentEditor"> <!-- formulario de edicion de contenido -->   
        
                
            <div class="productsEditorContent">
            
                        <div class="filtersBox filtersInfoBox">
                
                <ul>
                	<li>
                		
                		<label class="blue"><img src="/images/icons/status_online.png" title=""/> Cliente</label>
						<input id="cliente_autocomplete" value="{if $Cliente}{$Cliente.Nombre}{/if}" {if $data.Id}readonly="readonly" disabled{/if}/>
						
						<select name="data[ClienteId]" class="required CambiarCliente" id="SeleccionarCliente">
                        <option value="">Seleccionar</option>
                        {foreach from=$Clientes item="c"}
                        <option value="{$c.Id}" {if $c.Id eq $data.ClienteId}selected="selected"{/if}>{$c.Nombre}</option>
                        {/foreach}
                    	</select>
                		
                	</li>
                    <li>
	                	    <label class="blue"><img src="/images/icons/error.png" title="Importe "/> Importe liquidado</label>       
							 
							<input type="hidden" class="required number" readonly="readonly" disabled id="ImporteTotalLiquidadoInput" name="data[ImporteLiquidado]" value="{if $data.ImporteLiquidado}{$data.ImporteLiquidado}{else}0.0{/if}">
							
							<div id="ImporteTotalLiquidado"><label>{if $Factura}{$Factura.ImporteLiquidado}{elseif $data.ImporteLiquidado}$ {$data.ImporteLiquidado}{else}$ 0.0{/if}</label></div>
	                    </li>
	                    <li>
	                	    <label class="blue"><img src="/images/icons/money.png" title="Importe "/> Importe pagado</label>       
							 
							<input type="hidden" class="required number" readonly="readonly" disabled id="ImporteTotalPagadoInput" name="data[ImportePagado]" value="{if $data.ImportePagado}{$data.ImportePagado}{else}0.0{/if}">
							
							<div id="ImporteTotalPagado"><label>$ 0.0</label></div>
	                    </li>
	                    <li>
                	    <label class="blue"><img src="/images/icons/exclamation.png" title="Importe "/> Importe restante</label>       
						 
						<input type="hidden" class="required number" readonly="readonly" disabled id="ImporteRestanteInput" name="data[ImporteRestante]" value="{$data.ImporteRestante}">
						
						<div id="ImporteRestante"><label>$ 0.0</label></div>
                    	</li>
                    	<li>
                    		<label class="check">Externa</label>
		                    <input class="check SetTipoCobranza" id="TipoB" type="radio" name="Tipo" value="B" {if $data.Tipo == 'B'}checked="checked"{else}checked="checked"{/if}/>
		                    
                    	</li>
                    	<li>
                    		
		                    <label class="check">Interna</label>
		                    <input class="check SetTipoCobranza" id="TipoN" type="radio" name="Tipo" value="N" {if $dataTipo == 'N'}checked="checked"{/if}/>
		                    
                    	</li>
                    	<li>
                	    	<label class="blue"><img src="/images/icons/help.png" title="Importe "/> Saldo</label>       
						
							<div id="saldo"><label>{$Saldo}</label></div>
							<p><a id="open_cliente" class="VerCuentaCorriente" href="" title=""><img src="/images/icons/zoom_in.png" title="Ver cuenta corriente"/>Detalle Cta Cte</a></p>
                    	</li>
                    	<li>
                    		<a id="mostrarFacturasPendientes"><img src="/images/icons/zoom_in.png" title="Ver"/> Facturas pendientes</a>
        					<a id="mostrarDetalleDePago"><img src="/images/icons/zoom_in.png" title="Ver"/> Detalle de pago</a>
                    	</li>
                </ul>
            </div> <!-- /filtersBox-->
            
            {if $editSuccessMessage}
		            <p class="success" style="width:61%;">{$editSuccessMessage} <img src="/images/icons/tick.png" /></p>
		            <script>//volver()</script>
		        {elseif $editErrorMessage}
		            <p class="error" style="width:61%;">{$editErrorMessage}</p>
		        {/if}
		        
		        {if $data.FechaAnulacion}
		            <p class="error" style="width:61%;">Cobranza anulada</p>
		        {/if}
            
            
		        <div id="FacturasPendientesDeCobro">
		        	<!-- ajax SetProveedor -->
		       	</div>
		       	
		       	<div id="FacturasLiquidadas">
		        	{if $FacturasLiquidadas|@count}   
            			{include file="Backend/Cobranza/FacturasLiquidadas.tpl"}
         			{/if}
		       	</div>
                            
                
                <!-- pagos -->
                <div id="Pagos">
                	<!-- pagos por ajax -->
                	{if $Pagos|@count}   
            			{include file="Backend/Cobranza/GetPagos.tpl"}
         			{/if}
                </div>
                
                
         
         		<div class="contentTitles">
                    <label class="blue">Comentario</label>
                    <textarea name="data[Comentario]" cols="45" rows="5" class="" {if $data.Id}readonly="readonly" disabled{/if}>{$data.Comentario}</textarea>
                </div> <!-- /contentTitles -->  
             
            </div> <!-- /productsEditorContent -->
        </div>  <!-- /contentEditor -->
    </div> <!-- /form -->
</form>