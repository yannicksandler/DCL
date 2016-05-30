<?php /* Smarty version 2.6.26, created on 2016-04-12 20:03:06
         compiled from Backend/Presupuesto/Aprobar.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "Backend/Layouts/Include/Header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<body class="popupLayout">

	<div class="lightbox" id="FileLightbox" style="display:block;">

		<?php if ($this->_tpl_vars['SuccessMessage']): ?>
            <p class="success" style="width:61%;"><?php echo $this->_tpl_vars['SuccessMessage']; ?>
</p>
        <?php elseif ($this->_tpl_vars['ErrorMessage']): ?>
            <p class="error" style="width:61%;"><?php echo $this->_tpl_vars['ErrorMessage']; ?>
</p>
        <?php endif; ?>
	   	        
	</div> <!-- end filelightbox --> 

</body>
</html>