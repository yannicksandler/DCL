<?php /* Smarty version 2.6.26, created on 2014-04-11 12:55:31
         compiled from Backend/FacturaCompra/UpdateFacturaCompra.tpl */ ?>
<?php if ($this->_tpl_vars['successMessage']): ?>
Fecha de vencimiento actualizada
<?php elseif ($this->_tpl_vars['errorMessage']): ?>
<?php echo $this->_tpl_vars['errorMessage']; ?>

<?php else: ?>
Error al actualizar la fecha
<?php endif; ?>