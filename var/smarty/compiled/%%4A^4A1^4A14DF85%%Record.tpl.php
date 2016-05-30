<?php /* Smarty version 2.6.26, created on 2016-04-28 09:09:40
         compiled from Backend/Banco/Record.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'Backend/Banco/Record.tpl', 6, false),)), $this); ?>
                    <!-- item -->
                    <tr<?php echo $this->_tpl_vars['className']; ?>
>
                        <td width="2%"><input type="checkbox" class="check" name="selectId[]" value="<?php echo $this->_tpl_vars['record']['Id']; ?>
" /></td>
                        
                        <td width="10%"><a href="/<?php echo $this->_tpl_vars['varController']; ?>
/Edit/id/<?php echo $this->_tpl_vars['record']['Id']; ?>
"><?php echo $this->_tpl_vars['record']['Codigo']; ?>
</a></td>
                        <td width="10%"><a href="/<?php echo $this->_tpl_vars['varController']; ?>
/Edit/id/<?php echo $this->_tpl_vars['record']['Id']; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['record']['Nombre'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'htmlall') : smarty_modifier_escape($_tmp, 'htmlall')); ?>
</a></td>
                        <td width="10%"><a href="/<?php echo $this->_tpl_vars['varController']; ?>
/Edit/id/<?php echo $this->_tpl_vars['record']['Id']; ?>
"><?php if ($this->_tpl_vars['record']['TipoBanco'] == 'P'): ?>Propio<?php endif; ?><?php if ($this->_tpl_vars['record']['TipoBanco'] == 'T'): ?>Tercero<?php endif; ?></a></td>

                        
                        <td width="6%" align="center">
                            <input type="button" class="btEdit" onclick="location.href = '/<?php echo $this->_tpl_vars['varController']; ?>
/EditBanco/id/<?php echo $this->_tpl_vars['record']['Id']; ?>
';" />
                            
                        </td>
                    </tr>
                    <!-- /item -->