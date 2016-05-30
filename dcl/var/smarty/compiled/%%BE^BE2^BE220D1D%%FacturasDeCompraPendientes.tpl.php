<?php /* Smarty version 2.6.26, created on 2014-09-18 15:43:22
         compiled from Backend/OrdenPago/FacturasDeCompraPendientes.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'count', 'Backend/OrdenPago/FacturasDeCompraPendientes.tpl', 177, false),)), $this); ?>
<?php echo '
<script type="text/javascript">
$(document).ready(function(){

    $(".AgregarFacturaDeCompra").click(function(){
        var FacturaDeCompraId	=	$(this).attr(\'id\');
        
        
        if(FacturaDeCompraId > 0)
        	AgregarFacturaDeCompra(FacturaDeCompraId);
        else
            alert(\'La factura de compra no es correcta\');
        
        return false;
        
    });

    $(".importe").blur(function(){
        if( $(this).val() == \'\' )
            $(this).val( $(this).attr("defaultValue") );
    });

    $(".importe").focus(function(){
        if( $(this).val() == $(this).attr("defaultValue"))
            $(this).val(\'\');
    });
});

/* agrega importe liquidado de OP a sesion */
function AgregarFacturaDeCompra(FacturaDeCompraId)
{
	var url = "/OrdenPago/LiquidarFacturaCompra";

	if(FacturaDeCompraId && url)
	{
		var ImporteAbonadoId	=	\'#importe_\'+FacturaDeCompraId;
		var ImporteAbonado = $(ImporteAbonadoId).val();
		var TipoIvaId = $(ImporteAbonadoId).attr(\'TipoIvaId\');
		var ProveedorId	=	GetProveedorId();
		//var TipoIvaId	=	GetTipoIvaId();

		if((ImporteAbonado <= 0) || (ImporteAbonado == \'\') || (ImporteAbonado == \'Importe\'))
		{
			alert(\'Debe ingresar un importe para liquidar\');
			return;
		}

		if(ProveedorId && ImporteAbonado && TipoIvaId)
		{	
			$.ajax({
				type: "POST",
				url: url,
				dataType: "text/html",
				data: {
					\'data[FacturaNumero]\': FacturaDeCompraId,
					\'data[ImporteLiquidado]\': ImporteAbonado,
					\'data[ProveedorId]\': ProveedorId,
					\'data[TipoIvaId]\': TipoIvaId
				},
				success: function(html){
					var id	=	\'#\'+FacturaDeCompraId;
					$(id).html(html);
					GetImporteTotalLiquidado();
				}
		
			});
		}
	}
	else
		alert(\'Parametro para agregar la orden incorrectos\');
}

function GetImporteTotalLiquidado()
{
	url	=	\'/OrdenPago/GetImporteTotalLiquidado\';
	// obtener importe total liquidado en session
	$.ajax({
		type: "POST",
		url: url,
		dataType: "text/html",
		success: function(html){
			SetImporteLiquidado(html);
			SetImporteRestante();
		}

	});
}

function SetImporteLiquidado(importe)
{
	var id	=	\'#ImporteTotalLiquidado\';
	var importeLiquidado = parseFloat(importe).toFixed(2);
	
	$(id).html(\'<label>$ \'+importeLiquidado+\'</label>\');
	$(\'#ImporteTotalLiquidadoInput\').val(importeLiquidado);
}


function GetProveedorId()
{
	// dropdown
	var $selected 	=	$("#SeleccionarProveedor").find(\'option:selected\');
	var $proveedorid	=	$selected.val();
	// control
	if( $proveedorid < 0 )
	{
		alert(\'El proveedor seleccionado no es correcto\');
	}

	return $proveedorid;
}
/*
function GetTipoIvaId()
{
	alert(\'resolver tipo iva\');
	return 1;
}
*/
function GetOrdenesDeCompraLiquidadas()
{
	var url = "/FacturaCompra/GetOrdenesDeCompraLiquidadas";

	if(url)
	{
			
	$.ajax({
		type: "POST",
		url: url,
		dataType: "text/html",
		data: {
			\'data[FacturaDeCompraId]\': FacturaDeCompraId,
			\'data[ImporteLiquidado]\': ImporteAbonado
		},
		success: function(html){
			var id	=	\'#\'+FacturaDeCompraId;
			$(id).html(html);
			//GetOrdenesDeCompraLiquidadas();
		}

	});
	}
	else
		alert(\'Parametro para agregar la orden incorrectos\');	
}

function SumarTotal(importe)
{
	if((importe < 0) || (importe == \'\') || (importe == \'Importe\'))
	{
		alert(\'Debe ingresar un importe para liquidar de la orden de la compra\');
		return;
	}

	// cuando no exite valor agregar primer importe, luego en proximas liquidaciones sumar importe
	if($(\'#ImporteTotal\').val() == \'\')
		var total = parseFloat(importe);
	else
		var total = parseFloat($(\'#ImporteTotal\').val())+parseFloat(importe);
	
	$(\'#ImporteTotal\').val(total);
	return;
}
</script>
'; ?>



<h1>Facturas de compra pendientes de pago</h1>

<?php if ($this->_tpl_vars['deleteErrorMessage']): ?><p class="error"><?php echo $this->_tpl_vars['deleteErrorMessage']; ?>
</p><?php endif; ?>
<?php if ($this->_tpl_vars['successMessage']): ?><p class="success"><?php echo $this->_tpl_vars['successMessage']; ?>
  <img src="/images/icons/tick.png" /></p><?php endif; ?>

<div class="list">
<!--  
<h2>Importe total de ordenes de compra seleccionadas</h2>
<input type="text" id="totalOrdenes" value="0" DISABLED></input>
-->
<h2><img src="/images/icons/bullet_go.png" alt="item" title="Item"/> Cantidad pendientes: <?php echo count($this->_tpl_vars['Pendientes']); ?>
</h2>
<p><img src="/images/icons/help.png" alt="item" title="Item"/> Debe ingresar el importe a abonar de cada factura de Compra.</p>

	<div class="list">

        		<div class="listTop">
					<div>
						<table border="0" cellpadding="0" cellspacing="0">
							<tr>
								<td width="10%"><p>Fecha</p></td>
								<td width="10%"><p title="Numero">FC</p></td>
								<td width="15%"><p title="Importe">Importe</p></td>
								<td width="15%"><p title="Importe pendiente de pago. La factura puede tener liquidaciones parciales o anticipos">Pendiente</p></td> 
								<td width="20%"><p>Liquidacion</p></td>
							</tr>
						</table>
					</div>
                </div> <!-- /listadoTop -->
                
        <div class="listItems listItemsScroll">
                        
				<table border="0" cellpadding="0" cellspacing="0">
				
					<?php if (! count($this->_tpl_vars['Pendientes'])): ?>
						<h2>No hay facturas de compra pendientes de liquidar</h2>
					<?php else: ?>
					<!-- items -->
					
					<?php $_from = $this->_tpl_vars['Pendientes']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['pendiente']):
?>
						<tr>
							<td width="10%">
								<p class="">
										<?php echo $this->_tpl_vars['pendiente']['Fecha']; ?>

								</p>
							</td>
							<td width="10%">
								<p class="">
								
										# <?php echo $this->_tpl_vars['pendiente']['Numero']; ?>

										<img src="/images/icons/zoom_in.png" title="<?php echo $this->_tpl_vars['pendiente']['TextOrdenesDeCompraLiquidacionOrdenDePago']; ?>
"/>
								</p>
							</td>
							
							<td width="15%">
								
								<p class="">
										$ <?php echo $this->_tpl_vars['pendiente']['Importe']; ?>

								</p>
							</td>
							
							<td width="15%">
								<p class="">
										$ <?php echo $this->_tpl_vars['pendiente']['ImportePendienteDePago']; ?>

								</p>
							</td>
							
							<td width="20%" align="center">
								    <input type="text" value="Importe" name="ImporteItem" id="importe_<?php echo $this->_tpl_vars['pendiente']['Numero']; ?>
" tipoivaid="<?php echo $this->_tpl_vars['pendiente']['TipoIvaId']; ?>
" class="importe"/>
								    <a class="AgregarFacturaDeCompra" id="<?php echo $this->_tpl_vars['pendiente']['Numero']; ?>
"
								    ><img src="/images/icons/add.png" title="Liquidar"/> Liquidar </a>
								                        
							</td>
						</tr>
                    <?php endforeach; endif; unset($_from); ?>
					<!-- items -->
					<?php endif; ?>
				</table>
            </div> <!-- /listItems -->

</div> <!-- /list -->            
</div> <!-- /list -->