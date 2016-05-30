<?php /* Smarty version 2.6.26, created on 2014-09-19 13:06:14
         compiled from Backend/Layouts/Include/SubMenu.tpl */ ?>
<?php if ($this->_tpl_vars['activeMenu']['SubMenu']): ?>
<div class="subMenu">
    <ul>
        <?php $_from = $this->_tpl_vars['activeMenu']['SubMenu']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['subMenu']):
?>
        <li>
            <a href="<?php echo $this->_tpl_vars['subMenu']['Url']; ?>
" title="<?php echo $this->_tpl_vars['subMenu']['Name']; ?>
"><?php echo $this->_tpl_vars['subMenu']['Name']; ?>
</a>
        </li>
        <?php endforeach; endif; unset($_from); ?>
    </ul>
</div>
<?php endif; ?>