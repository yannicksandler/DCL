<?php /* Smarty version 2.6.26, created on 2014-09-18 15:43:27
         compiled from Backend/OrdenPago/LiquidarFacturaCompra.tpl */ ?>
<?php if ($this->_tpl_vars['successMessage']): ?>
<img src="/images/icons/accept.png" title="Factura de compra agregada correctamente"/>
<?php else: ?>
<img src="/images/icons/error_delete.png" title="<?php echo $this->_tpl_vars['deleteErrorMessage']; ?>
"/>
<?php endif; ?>