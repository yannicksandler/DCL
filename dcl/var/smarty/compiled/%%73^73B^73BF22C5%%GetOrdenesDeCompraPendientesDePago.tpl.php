<?php /* Smarty version 2.6.26, created on 2014-09-03 16:54:11
         compiled from Backend/OrdenPago/GetOrdenesDeCompraPendientesDePago.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'count', 'Backend/OrdenPago/GetOrdenesDeCompraPendientesDePago.tpl', 143, false),)), $this); ?>
<?php echo '
<script type="text/javascript">
$(document).ready(function(){

    $(".AgregarOrdenDeCompra").click(function(){
        var OrdenDeCompraId	=	$(this).attr(\'id\');
        
        
        if(OrdenDeCompraId > 0)
        	AgregarOrdenDeCompra(OrdenDeCompraId);
        else
            alert(\'La orden de compra no es correcta\');
        
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

/* agrega importe liquidado de OC a sesion */
function AgregarOrdenDeCompra(OrdenDeCompraId)
{
	var url = "/OrdenPago/AgregarOrdenDeCompra";

	if(OrdenDeCompraId && url)
	{
		var ImporteAbonadoId	=	\'#importe_\'+OrdenDeCompraId;
		var ImporteAbonado = $(ImporteAbonadoId).val();

		if((ImporteAbonado <= 0) || (ImporteAbonado == \'\') || (ImporteAbonado == \'Importe\'))
		{
			alert(\'Debe ingresar un importe correcto para liquidar de la orden de la compra\');
			return;
		}
			
		$.ajax({
			type: "POST",
			url: url,
			dataType: "text/html",
			data: {
				\'data[OrdenDeCompraId]\': OrdenDeCompraId,
				\'data[Compensatoria]\': false,
				\'data[ImporteLiquidado]\': ImporteAbonado
			},
			success: function(html){
				var id	=	\'#\'+OrdenDeCompraId;
				$(id).html(html);
		        GetImporteTotalLiquidado();
			}
	
		});
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
			var importe	=	parseFloat(html).toFixed(2);
			$(\'#ImporteTotalLiquidadoInput\').val(importe);
			$(\'#ImporteTotalLiquidado\').html(\'<label>$ \' + importe + \'</label>\');
			
	        SetImporteRestante()
		}

	});
}

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
			\'data[OrdenDeCompraId]\': OrdenDeCompraId,
			\'data[ImporteLiquidado]\': ImporteAbonado
		},
		success: function(html){
			var id	=	\'#\'+OrdenDeCompraId;
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



<h1>Ordenes de compra pendientes de validar</h1>

<?php if ($this->_tpl_vars['deleteErrorMessage']): ?><p class="error"><?php echo $this->_tpl_vars['deleteErrorMessage']; ?>
</p><?php endif; ?>
<?php if ($this->_tpl_vars['successMessage']): ?><p class="success"><?php echo $this->_tpl_vars['successMessage']; ?>
  <img src="/images/icons/tick.png" /></p><?php endif; ?>

<div class="list">
 <!-- 
<h2>Importe total liquidado</h2>
<input type="text" class="required number" readonly="readonly" id="ImporteTotalLiquidadoN" name="data[ImporteLiquidado]" value="<?php if ($this->_tpl_vars['data']['Importe']): ?><?php echo $this->_tpl_vars['data']['Importe']; ?>
<?php elseif ($this->_tpl_vars['ImporteLiquidadoFacturaCompra']): ?><?php echo $this->_tpl_vars['ImporteLiquidadoFacturaCompra']; ?>
<?php endif; ?>">
 -->
<h2><img src="/images/icons/bullet_go.png" alt="item" title="Item"/> Cantidad pendientes: <?php echo count($this->_tpl_vars['OrdenesDeCompraPendientes']); ?>
</h2>
<p><img src="/images/icons/help.png" alt="item" title="Item"/> Debe ingresar el importe a abonar de cada Orden de Compra.</p>

	<div class="list">

        		<div class="listTop">
					<div>
						<table border="0" cellpadding="0" cellspacing="0">
							<tr>
								<td width="10%"><p>Fecha</p></td>
								<td width="10%"><p title="Numero de orden de compra">OC</p></td>
								<td width="20%"><p>Insumo</p></td>
								<td width="12%"><p title="Total">Total</p></td>
								<td width="12%"><p title="Importe pendiente de pago. La orden de compra puede tener liquidaciones parciales">Pendiente</p></td> 
								<td width="30%"><p>Acciones</p></td>
							</tr>
						</table>
					</div>
                </div> <!-- /listadoTop -->
                
        <div class="listItems listItemsScroll">
                        
				<table border="0" cellpadding="0" cellspacing="0">
				
					<?php if (! count($this->_tpl_vars['OrdenesDeCompraPendientes'])): ?>
						<h2>No hay ordenes de compra pendientes de liquidar</h2>
					<?php else: ?>
					<!-- items -->
					
					<?php $_from = $this->_tpl_vars['OrdenesDeCompraPendientes']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
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
										# <?php echo $this->_tpl_vars['pendiente']['Id']; ?>

										<img src="/images/icons/zoom_in.png" title="(<?php echo $this->_tpl_vars['pendiente']['Entregado']; ?>
) - <?php echo $this->_tpl_vars['pendiente']['FormaDePago']; ?>
"/>
								</p>
							</td>
							<td width="20%">
								
								<table border="0" cellspacing="0">
								  <tr>
								    <td>
								    <p><img src="/images/icons/bullet_go.png" alt="item" title="Item"/> <?php echo $this->_tpl_vars['pendiente']['InsumoNombre']; ?>
</p>
								    </td>
								  </tr>
								</table>
								
							</td>
							
							<td width="12%">
								
								<p class="">
								
										$ <?php echo $this->_tpl_vars['pendiente']['Importe']; ?>

								</p>
							</td>
							
							<td width="12%">
								<p class="">
								
										$ <?php echo $this->_tpl_vars['pendiente']['ImportePendienteDePago']; ?>

								</p>
							</td>
							
							<td width="30%" align="center">
								    <input type="text" value="Importe" name="ImporteItem" id="importe_<?php echo $this->_tpl_vars['pendiente']['Id']; ?>
" class="importe"/>
								    <a class="AgregarOrdenDeCompra" id="<?php echo $this->_tpl_vars['pendiente']['Id']; ?>
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