<?php /* Smarty version 2.6.26, created on 2016-05-03 08:53:29
         compiled from Backend/FacturaCompra/SetOrdenDeCompra.tpl */ ?>
<?php if ($this->_tpl_vars['successMessage']): ?>
<img src="/images/icons/accept.png" title="Orden de compra agregada correctamente"/>
<?php else: ?>
<img src="/images/icons/error_delete.png" title="<?php echo $this->_tpl_vars['deleteErrorMessage']; ?>
"/>
<script>alert("<?php echo $this->_tpl_vars['deleteErrorMessage']; ?>
");</script>
<?php endif; ?>