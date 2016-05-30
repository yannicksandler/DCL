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

	$('#FrmEdit').submit(function() {

		var importeTotalLiquidado	=	$('#ImporteTotalLiquidadoInput').val();
		var importeTotalPagado	=	$('#ImporteTotalPagadoInput').val();

		if(importeTotalPagado == 0)
		{
			alert('El importe pagado no puede ser cero');
			return false;
		}

		if(importeTotalLiquidado == 0)
		{
			alert('El importe liquidado no puede ser cero');
			return false;
		}

		// si no esta marcada como adelanto, debe permitir pagar aunque no coincida importe liquidado
		if($('#Adelanto').is(':checked'))
		{  
			$('#Adelanto').attr('value', 'SI');
			
			if(importeTotalLiquidado >= importeTotalPagado)
			{
				alert('El importe pagado debe ser mayor al liquidado para que sea un adelanto');
				return false;
			}
		}
		else
		{
			if(importeTotalLiquidado != importeTotalPagado)
			{
				alert('El importe liquidado es distinto al importe total pagado. Debe marcar la orden como adelanto y guardarla nuevamente');
				return false;
			}
		}
		
  	});

    //OcultarFacturasPendientes();

    $("#SeleccionarProveedor").hide();
      

    $('.CambiarProveedor').change(function(){
    	
		var $selected 	=	$(this).find('option:selected');
		var $proveedorId	=	$selected.val();
		
		if( $proveedorId > 0 )
		{
			SetProveedor($proveedorId);
		}
		else
			alert('El proveedor seleccionado no es correcto');
    });
    

    $(".PrintOrdenDePago").click(function(){
        
        var url	=	'/OrdenPago/View/id/' + $(this).attr('id');
        
		var opciones="toolbar=no, location=no, directories=no, status=no, menubar=yes, scrollbars=yes, resizable=yes, width=1000, height=700, top=85, left=140";

		abrirPopUp(url, opciones);        

        return false;
    });

    $(".EditarInsumo").click(function(){
        url	=	$(this).attr('href');

		var opciones="toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=yes, width=1000, height=700, top=85, left=140";

		abrirPopUp(url, opciones);

        return false;
    });

    $(".EliminarOrdenDeCompra").click(function(){
        var OrdenDeCompraId	=	$(this).attr('ordencompra');
        
        
        if(OrdenDeCompraId > 0)
        	EliminarOrdenDeCompra(OrdenDeCompraId);
        else
            alert('La orden de compra no es correcta');
        
        return false;
    });

    $('#FechaAnulacion').datepicker({
		changeMonth: true,
		changeYear: true,
        dateFormat: 'dd/mm/yy'
	});

    {/literal}
    {if $data.Id}
    	//GetLiquidacion('list', {$data.Id});
    	//GetFacturasDeCompraLiquidadas();
    	//GetOrdenesDeCompraAgregadas({$data.Id});
    	GetPagos('list', {$data.Id});
    {/if}

    {if $Proveedor && !$data.Id}
    	GetFacturasDeCompraPendientes();
    {/if}
        	
    {literal}
    var availableTags = [
							{/literal}{$ArrayProveedores}{literal}
                 ];

    $("input#proveedor_autocomplete").autocomplete({
        source: availableTags,
      //define select handler
		select: function(e, ui) {
			var valor = ui.item.value;
			SetProveedorSeleccionar(valor);
		}    
    });  

    SetProveedorInitTextValue();

    $("#proveedor_autocomplete").blur(function(){
        if( $(this).val() == '' )
            $(this).val( $(this).attr("defaultValue") );
    });

    $("#proveedor_autocomplete").focus(function(){
        if( $(this).val() == $(this).attr("defaultValue"))
            $(this).val('');
    });
    

	$('.Anticipo').click(function(){

		if($(this).is(':checked'))
		{  
			var proveedorId	=	GetProveedorId();
			
			if( proveedorId > 0)
			{
				GetOrdenesDeCompraPendientesDePago(proveedorId);
			}
			else
			{
				alert('Debe seleccionar un proveedor');
				$(this).attr('checked', false);
				$(this).attr('value', 'true');
			}     
        }
		else
		{
			$("#OrdenesDeCompraPendientes").html('');
			$(this).attr('checked', false);
		}
    });
	
	$("#mostrarFacturasPendientes").click(function () {
    	$("#FacturasDeCompraPendientes").toggle("slow");
   	});

	$("#mostrarDetalleDePago").click(function () {
    	$("#Pagos").toggle("slow");
   	});

	$(".VerCuentaCorriente").click(function(){
        
		var url	=	'/CuentaCorriente/ListProveedor/ProveedorId/' + GetProveedorId();
        
		var opciones="toolbar=no, location=no, directories=no, status=no, menubar=yes, scrollbars=yes, resizable=yes, width=1000, height=700, top=85, left=140";

		abrirPopUp(url, opciones);        

        return false;
    });
   	
	
	$(".SetTipoCobranza").click(function(){
        
		GetFacturasDeCompraPendientes();
    });

	$( "#accordion" ).accordion();
});

function GetOrdenesDeCompraPendientesDePago(ProveedorId)
{
	if(ProveedorId > 0)
	{
		// ajax
		var url = "/OrdenPago/GetOrdenesDeCompraPendientesDePago";

		if(ProveedorId && url)
		{	
		$.ajax({
			type: "POST",
			url: url,
			dataType: "text/html",
			data: {
				'ProveedorId': ProveedorId,
				'data[TipoDePago]': GetTipoOrdenDePago()
			},
			success: function(html){
				
				$("#OrdenesDeCompraPendientes").html(html);
			}

		});
		
		}
		else
			alert('Parametro para cargar las ordenes son incorrectos');
	}
	else
	{
		alert('Debe seleecionar el proveedor para obtener las ordenes de compra sin validar');
	}
}

function OcultarFacturasPendientes()
{
	var id = GetProveedorId();
	// si el proveedor es APIF IVA
	if(id==175)
	{
		$("#FacturasDeCompraPendientes").toggle("slow");
	}
}

function SetProveedorInitTextValue()
{
	NombreProveedor = GetSelectedTextValue("SeleccionarProveedor");
	if(NombreProveedor != 'Seleccionar')
		$("input#proveedor_autocomplete").val(NombreProveedor);
}

function GetSelectedTextValue(dropdownid)
{
	var $selected 	=	$("#"+dropdownid).find('option:selected');
	var $selectedtext	=	$selected.html();

	return $selectedtext;
}

function SetProveedor(ProveedorId)
{
	var OrdenDePagoId	= $('#OrdenDePagoId').val();
	var	ProveedorAnterior	=	$('#ProveedorId').val();

	// control
	if(ProveedorAnterior)
	{	
		var rta	=	confirm('Tenga en cuenta que si cambia el proveedor, todas '+
	    			'las ordenes de compra asociadas seran eliminadas. Esta de acuerdo?');
		if(!rta)
		{
			return false;			
		}
	}

	if(OrdenDePagoId > 0)
	{
		
		$.ajax({
			type: "POST",
			url: '/OrdenPago/SetProveedor',
			dataType: "text/html",
			data: {
				'ProveedorId': ProveedorId,
				'OrdenDePagoId': OrdenDePagoId
			},
			success: function(html){
				$("#OrdenesDeCompraPendientes").html(html);
				/* se borran todas las ordenes de compra asociadas */
				$("#OrdenesDeCompraAgregadas").html('');
				
			}
	
		});

	}
	else
		alert('Orden de pago incorrecta');


	return false;
}

function EliminarOrdenDeCompra(OrdenDeCompraId)
{
	var url = "/OrdenPago/EliminarOrdenDeCompra";
	var OrdenDePagoId = $('#OrdenDePagoId').val();

	if(OrdenDePagoId && OrdenDeCompraId && url)
	{
	$.ajax({
		type: "POST",
		url: url,
		dataType: "text/html",
		data: {
			'OrdenDeCompraId': OrdenDeCompraId,
			'OrdenDePagoId': OrdenDePagoId
		},
		success: function(html){
			/*
			var id	=	'#delete' + OrdenDeCompraId;
			$(id).html(html);*/
			$("#OrdenesDeCompraAgregadas").html(html);
		}

	});
	}
	else
		alert('Parametro para eliminar la orden incorrectos');
}

function GetOrdenesDeCompraAgregadas(OrdenDePagoId)
{
	var url = "/OrdenPago/GetOrdenesDeCompra";
	var OrdenDePagoId = $('#OrdenDePagoId').val();

	if(OrdenDePagoId && url)
	{	
	$.ajax({
		type: "POST",
		url: url,
		dataType: "text/html",
		data: {
			'OrdenDePagoId': OrdenDePagoId
		},
		success: function(html){
			
			$("#OrdenesDeCompraAgregadas").html(html);
		}

	});
	}
	else
		alert('Parametro para cargar las ordenes son incorrectos');
}

function IsSetProveedor()
{
	var $selected 	=	$("#SeleccionarProveedor").find('option:selected');
	var $proveedorid	=	$selected.val();
	// control
	if($proveedorid > 0)
		return true;

	return false;
}

function GetProveedorId()
{
	var $selected 	=	$("#SeleccionarProveedor").find('option:selected');
	var $proveedorid	=	$selected.val();
	// control
	if($proveedorid > 0)
		return $proveedorid;

	//alert('Ingrese el proveedor');

	return false;
}

function GetPagos(accion, OrdenDePagoId)
{
	var PagoId;
	var ProveedorId	=	GetProveedorId();
	// cuando accion es delete, el parametro es PagoId en lugar de OrdenDePagoId
	if(accion == 'del')
	{
		PagoId	=	OrdenDePagoId;
	}

	var TipoPagoId	=	$("#PagoTipoId option:selected").val();
	//alert(TipoPagoId);
	//cheque propio
	if(TipoPagoId == 1)
	{
		var banco	=	$("#BancoItem option:selected").val();
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
	
	var chequeid = $('#ChequeId').val();
	if(chequeid > 0)
	{
		TipoPagoId=4;
	}
/*
	var NCid = $('#NotaCreditoId').val();
	if(NCid > 0)
	{
		TipoPagoId=12;
	}*/
	// al borrar es PagoId
	$.ajax({
		type: "POST",
		url: '/OrdenPago/GetPagos',
		dataType: "text/html",
		data: {
			'Accion': accion,
			'OrdenDePagoId': OrdenDePagoId,
			'data[TipoDePago]': GetTipoOrdenDePago(),
			'data[OrdenDePagoId]': $('#OrdenDePagoId').val(),
			'data[Importe]': $('#ImportePagoItem').val(),
			'data[PagoTipoId]': $("#PagoTipoId option:selected").val(),
			'data[Detalle]': $('#DetallePagoItem').val(),
			'data[ProveedorId]': ProveedorId,
			'data[ChequeId]': chequeid,
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
			'data[RetencionId]': $('#RetencionId').val(),
			'data[PercepcionId]': $('#PercepcionId').val(),
			'data[NotaCreditoId]': $('#NotaCreditoId').val()
		},
		success: function(html){
			//$(html).insertAfter("#docenteLabel");
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

function GetLiquidacion(accion, OrdenDePagoId)
{
	
	// al borrar es PagoId
	$.ajax({
		type: "POST",
		url: '/OrdenPago/GetLiquidacion',
		dataType: "text/html",
		data: {
			'Accion': accion,
			'OrdenDePagoId': OrdenDePagoId,
			'data[OrdenDePagoId]': $('#OrdenDePagoId').val(),
			'data[Fecha]': $('#FechaItem').val(),
			'data[NumeroFactura]': $('#NumeroItem').val(),
			'data[Importe]': $('#ImporteItem').val(),
			'data[Detalle]': $('#DetalleItem').val()
		},
		success: function(html){
			
			$("#Liquidacion").html(html);
		}

	});

	return false;
}

//lo usa el popup editar insumo
function guardarObtenerInsumos(insumo, action)
{
	//window.location.reload();
    $('#FrmEdit').submit();
}


function volver()
{
	window.location	=	'/OrdenCompra/List/order/OrdenDePagoId_ASC';
}

function abrirPopUp(pagina, opciones)
{
	window.open(pagina,"",opciones);
}

function SetProveedorSeleccionar(NombreProveedor)
{
	inputText	=	NombreProveedor;
	// setear valor select selected por texto de option / set option selected by text
	//$("#"+dropdown_id+" option:contains(" + inputText + ")").attr('selected', 'selected');
	
	$("#SeleccionarProveedor option").each(function () {
        if ($(this).html() == inputText) {
            $(this).attr("selected", "selected");
            return;
        }
	});

	GetFacturasDeCompraPendientes();

	//OcultarFacturasPendientes();
	
}


function GetFacturasDeCompraPendientes()
{
	// dropdown
	var $selected 	=	$("#SeleccionarProveedor").find('option:selected');
	var $proveedorid	=	$selected.val();
	// control
	if( $proveedorid < 0 )
	{
		alert('El proveedor seleccionado no es correcto');
	}
	
	// cargar FC pendientes por ajax
	$.ajax({
		type: "POST",
		url: '/OrdenPago/GetFacturasDeCompraPendientes',
		dataType: "text/html",
		data: {
			'ProveedorId': $proveedorid,
			'data[TipoDePago]': GetTipoOrdenDePago()
		},
		success: function(html){
			$("#FacturasDeCompraPendientes").html(html);
			$("#OrdenesDeCompraPendientes").html('');
			$('#Anticipo').attr('checked', false);
			GetPagos('list', null);
			ResetImportes();
			
		}

	});
}

function GetTipoOrdenDePago()
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


<h1>{if $data.Id}Editar{else}Nueva{/if} orden de pago &raquo; <span>{$data.Numero} (Interno {$data.Id})</span></h1>

		{if $data.Id}        
         <input type="reset" value="Imprimir" id="{$data.Id}" class="btDark PrintOrdenDePago" title="Buscar" />
        {/if}

<form id="FrmEdit" enctype="multipart/form-data" action="" method="post">
    <input type="hidden" id="OrdenDePagoId" name="data[Id]" value="{$data.Id}" />
    <input type="hidden" name="data[Fecha]" value="{if $data.Fecha}{$data.Fecha}{else}{$smarty.now|date_format:'%d/%m/%Y %H:%M:%S'}{/if}" />
        
    <div class="form">
        {include file="Backend/OrdenPago/ColumnForm.tpl"}
            
        {if $editSuccessMessage}
            <p class="success" style="width:61%;">{$editSuccessMessage} <img src="/images/icons/tick.png" /></p>
            <script>//volver()</script>
        {elseif $editErrorMessage}
            <p class="error" style="width:61%;">{$editErrorMessage}</p>
        {/if}
        
        {if $data.FechaAnulacion}
        	<p class="error" style="width:61%;">Orden de Pago anulada la fecha {$data.FechaAnulacion}</p>
        {/if}
        
        
            
        <div class="contentEditor"> <!-- formulario de edicion de contenido -->
                
            <div class="productsEditorContent">
            
                 <div class="filtersBox filtersInfoBox">
	            	
	                <ul>
	                    <li>
							<label class="blue"><img src="/images/icons/status_online.png" title=""/> Proveedor</label>
							<input id="proveedor_autocomplete" value="{if $Proveedor}{$Proveedor.Nombre}{/if}" {if $data.Id}readonly="readonly" disabled{/if}/>
							<!-- no usado 
							<input type="hidden" value="{$data.ProveedorId}" id="ProveedorId"></input>
							 -->
							<select name="data[ProveedorId]" class="required" id="SeleccionarProveedor">
	                        <option value="">Seleccionar</option>
	                        {foreach from=$Proveedores item="c"}
	                        <option value="{$c.Id}" {if $c.Id eq $Proveedor.Id}selected="selected"{/if}>{$c.Nombre}</option>
	                        {/foreach}
	                    	</select>
	                    </li>
	                    <li>
	                    	
	                    	<label class="blue"><img src="/images/icons/money.png" title=""/> Anticipo</label>
	                    	<input type="checkbox" name="data[Anticipo]" value="data[Anticipo]" class="Anticipo" id="Anticipo" {if $data.Id}readonly="readonly" disabled{/if}>
	                    	
	                    </li>
	                    <li>
                    		<label class="check">Externa</label>
		                    <input class="check SetTipoCobranza" id="TipoB" type="radio" name="Tipo" value="B" {if $data.TipoDePago == 'B'}checked="checked"{else}checked="checked"{/if} {if $data.Id}readonly="readonly" disabled{/if}/>
		                    
                    	</li>
                    	<li>
                    		
		                    <label class="check">Interna</label>
		                    <input class="check SetTipoCobranza" id="TipoN" type="radio" name="Tipo" value="N" {if $data.TipoDePago == 'N'}checked="checked"{/if} {if $data.Id}readonly="readonly" disabled{/if}/>
		                    
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
                	    	<label class="blue"><img src="/images/icons/help.png" title="Importe "/> Saldo</label>       
						
							<div id=""><label>{$Saldo}</label></div>
							<p><a id="" class="VerCuentaCorriente" href="" title=""><img src="/images/icons/zoom_in.png" title="Ver cuenta corriente"/>Detalle Cta Cte</a></p>
                    	</li>
                    	<li>
	                    	
	                    	<label class="blue"><img src="/images/icons/exclamation.png" title=""/> Adelanto</label>
	                    	<input type="checkbox" name="data[Adelanto]" value="NO" class="Adelanto" id="Adelanto" {if $data.Id}readonly="readonly" disabled{else}readonly="readonly" disabled{/if}>
	                    	
	                    </li>
                    	<li>
                    		<a id="mostrarFacturasPendientes"><img src="/images/icons/zoom_in.png" title="Ver"/> Facturas pendientes</a>
        					<a id="mostrarDetalleDePago"><img src="/images/icons/zoom_in.png" title="Ver"/> Detalle de pago</a>
                    	</li>
	                </ul>
	            </div> <!-- /filtersBox-->            
       
            	<div id="FacturasDeCompraPendientes">
		        	<!-- ajax SetProveedor -->
		       	</div>
		       	
		    
		       	
		       	<div id="FacturasDeCompraLiquidadas">
		        	{if $FacturasDeCompraLiquidadas|@count}   
            			{include file="Backend/OrdenPago/FacturasDeCompraLiquidadas.tpl"}
         			{/if}
		       	</div>
                
		       	<div id="OrdenesDeCompraPendientes">
		        	<!-- ajax SetProveedor -->
		       	</div>
		        
		    
            	
                <!-- ordenes de compra agregadas -->
                <div id="OrdenesDeCompraAgregadas">
		        	<!-- por ajax -->
		        	{if $OrdenesDeCompraLiquidadas|@count}   
            			{include file="Backend/OrdenPago/OrdenesDeCompraLiquidadas.tpl"}
         			{/if}
		        </div> 
		        <!-- fin ordenes de compra agregadas -->
		        
                	<!-- pagos -->
                <div id="Pagos">
                	<!-- pagos por ajax -->
                	{if $Pagos|@count}   
            			{include file="Backend/OrdenPago/GetPagos.tpl"}
         			{/if}
                </div>
                            
                
                
                <div class="contentTitles">
                    <input type="hidden" id="" class="number" name="data[Importe]" value="{$data.Importe}">
                </div> <!-- /contentTitles -->
                
         
         		<div class="contentTitles">
                    <label class="blue">Comentario</label>
                    <textarea name="data[Comentario]" cols="45" rows="5" class="" {if $data.Id}readonly="readonly"{/if}>{$data.Comentario}</textarea>
                </div> <!-- /contentTitles -->      
                
            </div> <!-- /productsEditorContent -->
        </div>  <!-- /contentEditor -->
    </div> <!-- /form -->
</form>