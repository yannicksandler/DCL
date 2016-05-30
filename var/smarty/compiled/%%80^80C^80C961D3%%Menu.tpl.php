<?php /* Smarty version 2.6.26, created on 2016-05-05 13:19:14
         compiled from Backend/Layouts/Include/Menu.tpl */ ?>
<div id="Menu">
    <ul>
        <?php $_from = $this->_tpl_vars['Menu']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['menuItem']):
?>
        <li>
            <a <?php if ($this->_tpl_vars['menuItem']['MenuId'] == $this->_tpl_vars['activeMenu']['Id']): ?>class="active"<?php endif; ?> href="<?php echo $this->_tpl_vars['menuItem']['Menu']['UrlDefault']; ?>
" title="<?php echo $this->_tpl_vars['menuItem']['Menu']['Name']; ?>
"><?php echo $this->_tpl_vars['menuItem']['Menu']['Name']; ?>
</a>
        </li>
        <?php endforeach; endif; unset($_from); ?>
    </ul>
</div> <!-- /Menu -->

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "Backend/Layouts/Include/SubMenu.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>