<?php /* Smarty version 2.6.26, created on 2014-09-11 12:54:48
         compiled from Backend/Cobranza/LiquidarFactura.tpl */ ?>
<?php if ($this->_tpl_vars['successMessage']): ?>
<img src="/images/icons/accept.png" title="Factura agregada correctamente"/>
<?php else: ?>
<img src="/images/icons/error_delete.png" title="<?php echo $this->_tpl_vars['deleteErrorMessage']; ?>
"/>
<?php endif; ?>