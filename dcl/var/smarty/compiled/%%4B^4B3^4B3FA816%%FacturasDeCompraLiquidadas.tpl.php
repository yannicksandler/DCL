<?php /* Smarty version 2.6.26, created on 2014-09-18 15:43:40
         compiled from Backend/OrdenPago/FacturasDeCompraLiquidadas.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'count', 'Backend/OrdenPago/FacturasDeCompraLiquidadas.tpl', 35, false),)), $this); ?>
<?php echo '
<script type="text/javascript">
$(document).ready(function(){
    $(".EliminarOrdenDePagoOrdenDeCompra").click(function(){
        var OrdenDeCompraId	=	$(this).attr(\'OrdenDePagoOrdenDeCompra\');
        
      //alert(OrdenDeCompraId);  
        if(OrdenDeCompraId > 0)
        	EliminarOrdenDeCompra(OrdenDeCompraId);
        else
            alert(\'La orden de compra no es correcta\');
        
        return false;
    });

    $(".EditarInsumo").click(function(){
        url	=	$(this).attr(\'href\');

		var opciones="toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=yes, width=1000, height=700, top=85, left=140";

		abrirPopUp(url, opciones);

        return false;
    });
    
});

</script>
'; ?>



<div class="list">
<h1>Facturas de compra liquidadas</h1>

<h2>Cantidad: <?php echo count($this->_tpl_vars['FacturasDeCompraLiquidadas']); ?>
</h2>
        		<div class="listTop">
					<div>
						<table border="0" cellpadding="0" cellspacing="0">
							<tr>
								<td width="10%"><p>Fecha de grabacion</p></td>
								<td width="10%"><p>FC</p></td>
								
								<td width="10%"><p>Liquidado</p></td>
							</tr>
						</table>
					</div>
                </div> <!-- /listadoTop -->
                
        <div class="listItems listItemsScroll">
                        
				<table border="0" cellpadding="0" cellspacing="0">
				
					<?php if (! count($this->_tpl_vars['FacturasDeCompraLiquidadas'])): ?>
						<h2>No hay ordenes de compra agregadas</h2>
					<?php else: ?>
					<!-- items -->
					
					<?php $_from = $this->_tpl_vars['FacturasDeCompraLiquidadas']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['agregada']):
?>
						<tr>
							<td width="10%">
								<p class="">
										<?php echo $this->_tpl_vars['agregada']['FechaGrabacion']; ?>

								</p>
							</td>
							<td width="10%">
								<p class="">
										<!-- puedo lista de base de datos o de sesion -->
										# <?php echo $this->_tpl_vars['agregada']['FacturaNumero']; ?>

								</p>
							</td>
							<td width="10%">
								<p class="">
										$ <?php echo $this->_tpl_vars['agregada']['ImporteLiquidado']; ?>

								</p>
							</td>
						</tr>
                    <?php endforeach; endif; unset($_from); ?>
					<!-- items -->
					<?php endif; ?>
				</table>
            </div> <!-- /listItems -->
            
</div> <!-- /list -->         					