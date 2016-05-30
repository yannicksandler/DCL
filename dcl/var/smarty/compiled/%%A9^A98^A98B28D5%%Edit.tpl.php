<?php /* Smarty version 2.6.26, created on 2014-09-17 17:28:13
         compiled from Backend/Cobranza/Edit.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'count', 'Backend/Cobranza/Edit.tpl', 437, false),)), $this); ?>
<?php $this->assign('IDS_Layout_Class', 'Backend_Layouts_Default'); ?>
<?php $this->assign('IDS_Layout_Method', 'Default'); ?>

<!-- date picker -->
<link type="text/css" href="/styles/ui-lightness/jquery-ui-1.8.2.custom.css" rel="stylesheet" />
<script type="text/javascript" src="/scripts/jquery/jquery.ui.datepicker.js"></script>
<script type="text/javascript" src="/scripts/jquery/jquery.ui.core.js"></script>
<script type="text/javascript" src="/scripts/jquery/jquery.ui.widget.js"></script>

<script type="text/javascript" src="/scripts/Edit.js"></script>

<!-- dialog -->
<script type="text/javascript" src="/scripts/jquery/jquery-ui-1.8.4.custom.min.js"></script>
<!-- dialog -->

<?php echo '
<script type="text/javascript">

$(document).ready(function(){
    $("#FrmEdit").validate();

    $(\'#FechaAnulacion\').datepicker({
		changeMonth: true,
		changeYear: true,
        dateFormat: \'dd/mm/yy\'
	});
	
    var availableTags = [
							'; ?>
<?php echo $this->_tpl_vars['ArrayClientes']; ?>
<?php echo '
                 ];

    '; ?>

        <?php if ($this->_tpl_vars['Cliente'] && ! $this->_tpl_vars['data']['Id']): ?>
        GetFacturasPendientesDeCobro();
        <?php endif; ?>
    <?php echo '

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
        if( $(this).val() == \'\' )
            $(this).val( $(this).attr("defaultValue") );
    });

    $("#cliente_autocomplete").focus(function(){
        if( $(this).val() == $(this).attr("defaultValue"))
            $(this).val(\'\');
    });

    $(".Print").click(function(){
        
        var url	=	\'/Cobranza/View/id/\' + $(\'#CobranzaId\').val();
        
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
        
		var url	=	\'/CuentaCorriente/ListCliente/ClienteId/\' + GetClienteId();
        
		var opciones="toolbar=no, location=no, directories=no, status=no, menubar=yes, scrollbars=yes, resizable=yes, width=1000, height=700, top=85, left=140";

		abrirPopUp(url, opciones);        

        return false;
    });
	
    
});

function SetClienteSeleccionar(NombreCliente)
{
	inputText	=	NombreCliente;
	// setear valor select selected por texto de option / set option selected by text
	//$("#"+dropdown_id+" option:contains(" + inputText + ")").attr(\'selected\', \'selected\');
	
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
	var $selected 	=	$("#SeleccionarCliente").find(\'option:selected\');
	var $clienteid	=	$selected.val();

	'; ?>

        <?php if ($this->_tpl_vars['Cliente']): ?>
        // Si el clienteid fue pasado por GET
        var $clienteid	=	<?php echo $this->_tpl_vars['Cliente']['Id']; ?>
;
        <?php endif; ?>
    <?php echo '
	
	// control
	if( $clienteid < 0 )
	{
		alert(\'El cliente seleccionado no es correcto\');
	}
	
	// cargar FC pendientes por ajax
	$.ajax({
		type: "POST",
		url: \'/Cobranza/GetFacturasPendientesDeCobro\',
		dataType: "text/html",
		data: {
			\'ClienteId\': $clienteid,
			\'TipoCobranza\': GetTipoCobranza(),
		},
		success: function(html){
			$("#FacturasPendientesDeCobro").html(html);
			GetPagos(\'list\', null);
			ResetImportes();
		}

	});
}

function SetClienteInitTextValue()
{
	NombreCliente = GetSelectedTextValue("SeleccionarCliente");
	if(NombreCliente != \'Seleccionar\')
		$("input#cliente_autocomplete").val(NombreCliente);
}

function GetSelectedTextValue(dropdownid)
{
	var $selected 	=	$("#"+dropdownid).find(\'option:selected\');
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
	if(accion == \'del\')
	{
		PagoId	=	CobranzaId;
	}

	var TipoPagoId	=	$("#PagoTipoId option:selected").val();
	//alert(TipoPagoId);
	//cheque tercero
	if(TipoPagoId == 4)
	{
		var banco	=	$(\'#BancoItem\').val();
		var cuenta	=	 $(\'#CuentaItem\').val();
		var sucursal	=	$(\'#SucursalItem\').val();
	}
	// transferencia
	if(TipoPagoId == 13)
	{
		var banco	=	$("#BancoTransfItem option:selected").val();
		var cuenta	=	 $(\'#CuentaTransfItem\').val();
		var sucursal	=	$(\'#SucursaTransflItem\').val();
	}
	
	var notacreditoid = $(\'#NotaCreditoId\').val();
	if(notacreditoid > 0)
	{
		TipoPagoId=12;
	}
	// al borrar es CobranzaDetalleId
	$.ajax({
		type: "POST",
		url: \'/Cobranza/GetPagos\',
		dataType: "text/html",
		data: {
			\'Accion\': accion,
			\'CobranzaId\': CobranzaId,
			\'data[CobranzaId]\': $(\'#CobranzaId\').val(),
			\'data[ClienteId]\': GetClienteId(),
			\'data[Importe]\': $(\'#ImportePagoItem\').val(),
			\'data[PagoTipoId]\': TipoPagoId,
			\'data[Detalle]\': $(\'#DetallePagoItem\').val(),
			\'data[PagoId]\': PagoId,
			\'data[Banco]\': banco,
			\'data[Sucursal]\': sucursal,
			\'data[ImporteCheque]\': $(\'#ImporteChequeItem\').val(),
			\'data[ImporteTransferencia]\': $(\'#ImporteTransferenciaItem\').val(),
			\'data[Localidad]\': $(\'#LocalidadItem\').val(),
			\'data[Numero]\': $(\'#NumeroItem\').val(),
			\'data[Cuenta]\': cuenta,
			\'data[FechaCheque]\': $(\'#FechaChequeItem\').val(),
			\'data[FechaCobro]\': $(\'#FechaCobroItem\').val(),
			\'data[Firmante]\': $(\'#FirmanteItem\').val(),
			\'data[Cuit]\': $(\'#CuitItem\').val(),
			\'data[NotaCreditoId]\': notacreditoid
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
	var importe	=	parseFloat($(\'#TotalPago\').val()).toFixed(2);
	
	$(\'#ImporteTotalPagado\').html(\'<label>$ \'+ importe + \'</label>\');
	$(\'#ImporteTotalPagadoInput\').val(importe);
	
	SetImporteRestante();
}

function IsSetCliente()
{
	var $selected 	=	$("#SeleccionarCliente").find(\'option:selected\');
	var $id	=	$selected.val();
	// control
	if($id > 0)
		return true;

	return false;
}

function GetTipoCobranza()
{
	if($("#TipoB").attr(\'checked\'))
	{
		return $("#TipoB").val();
	}

	if($("#TipoN").attr(\'checked\'))
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
		url: \'/Cobranza/GetLiquidacion\',
		dataType: "text/html",
		data: {
			\'Accion\': accion,
			\'CobranzaId\': $(\'#CobranzaId\').val(),
			\'data[Tipo]\': GetTipoCobranza(),
			\'data[CobranzaId]\': CobranzaId,
			\'data[NumeroFactura]\': $(\'#NumeroItem\').val(),
			\'data[Importe]\': $(\'#ImporteItem\').val()
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
	var $selected 	=	$("#SeleccionarCliente").find(\'option:selected\');
	var $id	=	$selected.val();
	// control
	if($id > 0)
		return $id;

	//alert(\'Ingrese el proveedor\');

	return false;
}

function ResetImportes()
{
	$(\'#TotalPago\').val(0);
	$(\'#ImporteTotalPagado\').html(\'<label>$ 0.0</label>\');
	$(\'#ImporteTotalPagadoInput\').val(0);
	$(\'#ImporteTotalLiquidadoInput\').val(0);
	$(\'#ImporteTotalLiquidado\').html(\'<label>$ 0.0</label>\');
	$(\'#ImporteRestante\').html(\'<label>$ 0.0</label>\');
	$(\'#ImporteRestanteInput\').val(0);
}

function SetImporteRestante()
{
	var importeRestante	= parseFloat($(\'#ImporteTotalLiquidadoInput\').val()).toFixed(2) - parseFloat($(\'#ImporteTotalPagadoInput\').val()).toFixed(2);	
	
	$(\'#ImporteRestante\').html(\'<label>$ \'+ importeRestante.toFixed(2) + \'</label>\');
	$(\'#ImporteRestanteInput\').val(importeRestante.toFixed(2));
}


</script>
'; ?>



<h1><?php if ($this->_tpl_vars['data']['Id']): ?>Editar<?php else: ?>Nueva<?php endif; ?> cobranza &raquo; <span><?php echo $this->_tpl_vars['data']['Numero']; ?>
 (Interno <?php echo $this->_tpl_vars['data']['Id']; ?>
)</span></h1>

		<?php if ($this->_tpl_vars['data']['Id']): ?>        
         <input type="reset" value="Imprimir" id="<?php echo $this->_tpl_vars['data']['Id']; ?>
" class="btDark Print" title="Imprimir" />
        <?php endif; ?>


<form id="FrmEdit" enctype="multipart/form-data" action="" method="post">
    <input type="hidden" id="CobranzaId" name="data[Id]" value="<?php echo $this->_tpl_vars['data']['Id']; ?>
" />
    
        
    <div class="form">
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "Backend/Cobranza/ColumnForm.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
            
        <div class="contentEditor"> <!-- formulario de edicion de contenido -->   
        
                
            <div class="productsEditorContent">
            
                        <div class="filtersBox filtersInfoBox">
                
                <ul>
                	<li>
                		
                		<label class="blue"><img src="/images/icons/status_online.png" title=""/> Cliente</label>
						<input id="cliente_autocomplete" value="<?php if ($this->_tpl_vars['Cliente']): ?><?php echo $this->_tpl_vars['Cliente']['Nombre']; ?>
<?php endif; ?>" <?php if ($this->_tpl_vars['data']['Id']): ?>readonly="readonly" disabled<?php endif; ?>/>
						
						<select name="data[ClienteId]" class="required CambiarCliente" id="SeleccionarCliente">
                        <option value="">Seleccionar</option>
                        <?php $_from = $this->_tpl_vars['Clientes']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['c']):
?>
                        <option value="<?php echo $this->_tpl_vars['c']['Id']; ?>
" <?php if ($this->_tpl_vars['c']['Id'] == $this->_tpl_vars['data']['ClienteId']): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['c']['Nombre']; ?>
</option>
                        <?php endforeach; endif; unset($_from); ?>
                    	</select>
                		
                	</li>
                    <li>
	                	    <label class="blue"><img src="/images/icons/error.png" title="Importe "/> Importe liquidado</label>       
							 
							<input type="hidden" class="required number" readonly="readonly" disabled id="ImporteTotalLiquidadoInput" name="data[ImporteLiquidado]" value="<?php if ($this->_tpl_vars['data']['ImporteLiquidado']): ?><?php echo $this->_tpl_vars['data']['ImporteLiquidado']; ?>
<?php else: ?>0.0<?php endif; ?>">
							
							<div id="ImporteTotalLiquidado"><label><?php if ($this->_tpl_vars['Factura']): ?><?php echo $this->_tpl_vars['Factura']['ImporteLiquidado']; ?>
<?php elseif ($this->_tpl_vars['data']['ImporteLiquidado']): ?>$ <?php echo $this->_tpl_vars['data']['ImporteLiquidado']; ?>
<?php else: ?>$ 0.0<?php endif; ?></label></div>
	                    </li>
	                    <li>
	                	    <label class="blue"><img src="/images/icons/money.png" title="Importe "/> Importe pagado</label>       
							 
							<input type="hidden" class="required number" readonly="readonly" disabled id="ImporteTotalPagadoInput" name="data[ImportePagado]" value="<?php if ($this->_tpl_vars['data']['ImportePagado']): ?><?php echo $this->_tpl_vars['data']['ImportePagado']; ?>
<?php else: ?>0.0<?php endif; ?>">
							
							<div id="ImporteTotalPagado"><label>$ 0.0</label></div>
	                    </li>
	                    <li>
                	    <label class="blue"><img src="/images/icons/exclamation.png" title="Importe "/> Importe restante</label>       
						 
						<input type="hidden" class="required number" readonly="readonly" disabled id="ImporteRestanteInput" name="data[ImporteRestante]" value="<?php echo $this->_tpl_vars['data']['ImporteRestante']; ?>
">
						
						<div id="ImporteRestante"><label>$ 0.0</label></div>
                    	</li>
                    	<li>
                    		<label class="check">Externa</label>
		                    <input class="check SetTipoCobranza" id="TipoB" type="radio" name="Tipo" value="B" <?php if ($this->_tpl_vars['data']['Tipo'] == 'B'): ?>checked="checked"<?php else: ?>checked="checked"<?php endif; ?>/>
		                    
                    	</li>
                    	<li>
                    		
		                    <label class="check">Interna</label>
		                    <input class="check SetTipoCobranza" id="TipoN" type="radio" name="Tipo" value="N" <?php if ($this->_tpl_vars['dataTipo'] == 'N'): ?>checked="checked"<?php endif; ?>/>
		                    
                    	</li>
                    	<li>
                	    	<label class="blue"><img src="/images/icons/help.png" title="Importe "/> Saldo</label>       
						
							<div id="saldo"><label><?php echo $this->_tpl_vars['Saldo']; ?>
</label></div>
							<p><a id="open_cliente" class="VerCuentaCorriente" href="" title=""><img src="/images/icons/zoom_in.png" title="Ver cuenta corriente"/>Detalle Cta Cte</a></p>
                    	</li>
                    	<li>
                    		<a id="mostrarFacturasPendientes"><img src="/images/icons/zoom_in.png" title="Ver"/> Facturas pendientes</a>
        					<a id="mostrarDetalleDePago"><img src="/images/icons/zoom_in.png" title="Ver"/> Detalle de pago</a>
                    	</li>
                </ul>
            </div> <!-- /filtersBox-->
            
            <?php if ($this->_tpl_vars['editSuccessMessage']): ?>
		            <p class="success" style="width:61%;"><?php echo $this->_tpl_vars['editSuccessMessage']; ?>
 <img src="/images/icons/tick.png" /></p>
		            <script>//volver()</script>
		        <?php elseif ($this->_tpl_vars['editErrorMessage']): ?>
		            <p class="error" style="width:61%;"><?php echo $this->_tpl_vars['editErrorMessage']; ?>
</p>
		        <?php endif; ?>
		        
		        <?php if ($this->_tpl_vars['data']['FechaAnulacion']): ?>
		            <p class="error" style="width:61%;">Cobranza anulada</p>
		        <?php endif; ?>
            
            
		        <div id="FacturasPendientesDeCobro">
		        	<!-- ajax SetProveedor -->
		       	</div>
		       	
		       	<div id="FacturasLiquidadas">
		        	<?php if (count($this->_tpl_vars['FacturasLiquidadas'])): ?>   
            			<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "Backend/Cobranza/FacturasLiquidadas.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
         			<?php endif; ?>
		       	</div>
                            
                
                <!-- pagos -->
                <div id="Pagos">
                	<!-- pagos por ajax -->
                	<?php if (count($this->_tpl_vars['Pagos'])): ?>   
            			<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "Backend/Cobranza/GetPagos.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
         			<?php endif; ?>
                </div>
                
                
         
         		<div class="contentTitles">
                    <label class="blue">Comentario</label>
                    <textarea name="data[Comentario]" cols="45" rows="5" class="" <?php if ($this->_tpl_vars['data']['Id']): ?>readonly="readonly" disabled<?php endif; ?>><?php echo $this->_tpl_vars['data']['Comentario']; ?>
</textarea>
                </div> <!-- /contentTitles -->  
             
            </div> <!-- /productsEditorContent -->
        </div>  <!-- /contentEditor -->
    </div> <!-- /form -->
</form>