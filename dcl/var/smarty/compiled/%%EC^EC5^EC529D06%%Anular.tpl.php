<?php /* Smarty version 2.6.26, created on 2014-09-02 10:02:37
         compiled from Backend/Cheque/Anular.tpl */ ?>
<?php if ($this->_tpl_vars['ErrorMessage']): ?><p class="error"><?php echo $this->_tpl_vars['ErrorMessage']; ?>
</p><?php endif; ?>
                        
<?php if ($this->_tpl_vars['SuccessMessage']): ?><p class="success"><?php echo $this->_tpl_vars['SuccessMessage']; ?>
</p><?php endif; ?>
<?php if ($this->_tpl_vars['mensaje']): ?><script>alert("<?php echo $this->_tpl_vars['mensaje']; ?>
");</script><?php endif; ?>