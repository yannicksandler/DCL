<?php /* Smarty version 2.6.26, created on 2016-04-26 10:46:15
         compiled from Backend/Cliente/GetOrdenesDeTrabajoSinFacturar.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'count', 'Backend/Cliente/GetOrdenesDeTrabajoSinFacturar.tpl', 91, false),)), $this); ?>
<?php echo '
<script type="text/javascript">
$(document).ready(function(){

	$(\'.ActualizarTotal\').click(function() {
		
		var importe =  $(this).attr(\'importe\');
		if(IsNumeric(importe))
		{
		if($(this).attr(\'checked\'))
		{
			SumarTotal(importe);
		}
		else
		{
			RestarTotal(importe);
		}
		}
		else
		{
			$(this).attr(\'checked\', \'\');
			alert(\'La orden no tiene importe de venta. Debe asignarlo antes de facturar\');
		}
	});

	$(\'.CrearOrdenFicticia\').click(function() {

		var c = confirm(\'Esta seguro que desea crear una Orden Ficticia para facturar ?\');

		if(c)
		{
			var href =  $(this).attr(\'href\');
			window.location = href;
		}
	});

	$(\'.VerOrdenDeTrabajo\').click(function() {
        
        var url 		= $(this).attr(\'href\');
        var opciones="toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=yes, width=1000, height=700, top=85, left=140";

		abrirPopUp(url, opciones);

		return false;
    });
    
});

function IsNumeric(input)
{
    return (input - 0) == input && input.length > 0;
}

function abrirPopUp(pagina, opciones)
{
	window.open(pagina,"",opciones);
}

</script>
'; ?>


		<div class="filtersBox filtersInfoBox">
                <ul>
                    <li>
                        <p>Cliente: <br><span><?php echo $this->_tpl_vars['Resumen']['Cliente']['Nombre']; ?>
</span></p>
                    </li>
                    <li>
						<p>CUIT: <br><span><?php echo $this->_tpl_vars['Resumen']['ClienteCuit']; ?>
</span></p>
                    </li>
                    <li>
                    	<p>Tipo de factura: <span><?php echo $this->_tpl_vars['Resumen']['LetraFactura']; ?>
</span></p>
                    	<p>IVA: <span><?php if ($this->_tpl_vars['Resumen']['ClienteTipoIva']): ?><?php echo $this->_tpl_vars['Resumen']['ClienteTipoIva']; ?>
<?php else: ?><img src="/images/icons/error.png" title="ingresar tipo de iva en el cliente"/><?php endif; ?></span></p>
                    </li>
                    <li>  
                    	<p>Factura numero: <br><span><?php echo $this->_tpl_vars['Resumen']['FacturaNumero']; ?>
</span></p>
                    </li>
                    <li>
						<p>Cantidad de ordenes sin facturar:  <span><?php echo $this->_tpl_vars['Resumen']['CantidadOrdenesSinFactura']; ?>
</span> </p>
                    </li>
                </ul>
            </div> <!-- /filtersBox-->


<h1>Ordenes de trabajo sin facturar</h1>

<?php if ($this->_tpl_vars['deleteErrorMessage']): ?><p class="error"><?php echo $this->_tpl_vars['deleteErrorMessage']; ?>
</p><?php endif; ?>
<?php if ($this->_tpl_vars['successMessage']): ?><p class="success"><?php echo $this->_tpl_vars['successMessage']; ?>
  <img src="/images/icons/tick.png" /></p><?php endif; ?>

<div class="list">

<h2><img src="/images/icons/bullet_go.png" alt="item" title="Item"/> Cantidad pendientes: <?php echo count($this->_tpl_vars['Pendientes']); ?>
</h2>
<p><img src="/images/icons/bullet_go.png" alt="item" title="Item"/> Ordenes no facturadas en estado "En produccion", "Finalizado" o "Aprobado"</p>

        		<div class="listTop">
					<div>
						<table border="0" cellpadding="0" cellspacing="0">
							<tr>
								<td width="10%"><p>Orden</p></td>
								<td width="10%"><p title="Fecha de inicio">Fecha</p></td>
								<td width="15%"><p>Producto</p></td>
								<td width="10%"><p>Cantidad</p></td>
								<td width="10%"><p title="total sin iva">Total</p></td>
								
								<td width="15%"><p>Seleccionar</p></td>
							</tr>
						</table>
					</div>
                </div> <!-- /listadoTop -->
                
        <div class="listItems listItemsScroll">
                        
				<table border="0" cellpadding="0" cellspacing="0">
				
					<?php if (! count($this->_tpl_vars['Pendientes'])): ?>
						<h2 align="center"><img src="/images/icons/error.png" title=""/> No hay ordenes de trabajo pendientes</h2>
					<?php else: ?>
					<!-- items -->
					
					<?php $_from = $this->_tpl_vars['Pendientes']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['p']):
?>
						<tr>
							<td width="10%">
								<p class="" title="<?php echo $this->_tpl_vars['p']['Estado']['Nombre']; ?>
">
										<?php echo $this->_tpl_vars['p']['Id']; ?>

										<br>
										<p><?php echo $this->_tpl_vars['p']['CondicionDeCobro']; ?>
</p>
								</p>
							</td>
							<td width="10%">
								<p class="">
										<?php echo $this->_tpl_vars['p']['FechaInicio']; ?>

								</p>
							</td>
							<td width="15%">
								<p class="">
										<?php echo $this->_tpl_vars['p']['Producto']; ?>

								</p>
							</td>
							<td width="10%">
								<p class="">
										<?php if ($this->_tpl_vars['p']['Cantidad'] > 0): ?><?php echo $this->_tpl_vars['p']['Cantidad']; ?>
<?php else: ?><img src="/images/icons/error.png" title="ingresar cantidad en la orden"/><?php endif; ?>
								</p>
							</td>
							<td width="10%">
								<p class="">
										<?php if ($this->_tpl_vars['p']['TotalSinIva'] > 0): ?><?php echo $this->_tpl_vars['p']['TotalSinIva']; ?>
<?php else: ?><img src="/images/icons/error.png" title="ingresar importe en la orden"/><?php endif; ?>
								</p>
							</td>
							
							<td width="15%" align="center">
								    
								    <input type="checkbox" class="check ActualizarTotal" name="OrdenesId[]" value="<?php echo $this->_tpl_vars['p']['Id']; ?>
" importe="<?php echo $this->_tpl_vars['p']['TotalSinIva']; ?>
"/>                   
								    
								    <a class="CrearOrdenFicticia" href="/Orden/CrearOrdenFicticia/OrdenId/<?php echo $this->_tpl_vars['p']['Id']; ?>
">Crear Orden de trabajo ficticia</a>
								    <br><a title="Modificar orden de trabajo" class="VerOrdenDeTrabajo" href="/Orden/Edit/id/<?php echo $this->_tpl_vars['p']['Id']; ?>
/popup/true"><img src="/images/icons/layout_edit.png" title="Editar orden de trabajo"/></a> 
							</td>
						</tr>
                    <?php endforeach; endif; unset($_from); ?>
					<!-- items -->
					<?php endif; ?>
				</table>
            </div> <!-- /listItems -->
            
</div> <!-- /list -->         					