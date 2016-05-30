<?php /* Smarty version 2.6.26, created on 2014-09-01 11:38:06
         compiled from Backend/BancoTipoConcepto/Record.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'Backend/BancoTipoConcepto/Record.tpl', 6, false),)), $this); ?>
                    <!-- item -->
                    <tr<?php echo $this->_tpl_vars['className']; ?>
>
                        <td width="2%"><input type="checkbox" class="check" name="selectId[]" value="<?php echo $this->_tpl_vars['record']['Id']; ?>
" /></td>
                        
                        
                        <td width="10%"><a href="/<?php echo $this->_tpl_vars['varController']; ?>
/Edit/id/<?php echo $this->_tpl_vars['record']['Id']; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['record']['Nombre'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'htmlall') : smarty_modifier_escape($_tmp, 'htmlall')); ?>
</a></td>
                        

                        
                        <td width="6%" align="center">
                            <input type="button" class="btEdit" onclick="location.href = '/<?php echo $this->_tpl_vars['varController']; ?>
/EditBancoTipoConcepto/id/<?php echo $this->_tpl_vars['record']['Id']; ?>
';" />
                            
                        </td>
                    </tr>
                    <!-- /item -->