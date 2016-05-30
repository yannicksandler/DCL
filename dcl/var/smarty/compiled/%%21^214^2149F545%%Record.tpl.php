<?php /* Smarty version 2.6.26, created on 2014-07-17 09:47:31
         compiled from Backend/Rubro/Record.tpl */ ?>
                    <!-- item -->
                    <tr<?php echo $this->_tpl_vars['className']; ?>
>
                        <td width="2%"><input type="checkbox" class="check" name="selectId[]" value="<?php echo $this->_tpl_vars['record']['Id']; ?>
" /></td>
                        
                        
                        <td width="15%"><a href="/<?php echo $this->_tpl_vars['varController']; ?>
/Edit/id/<?php echo $this->_tpl_vars['record']['Id']; ?>
"><?php echo $this->_tpl_vars['record']['Nombre']; ?>
</a></td>
                        
                        <td width="10%"><a href="/<?php echo $this->_tpl_vars['varController']; ?>
/Edit/id/<?php echo $this->_tpl_vars['record']['Id']; ?>
"><?php if ($this->_tpl_vars['record']['TipoEntidad'] == 'CLI'): ?>Cliente<?php endif; ?><?php if ($this->_tpl_vars['record']['TipoEntidad'] == 'PRO'): ?>Proveedor<?php endif; ?></a></td>
                       
                        
                        <td width="6%" align="center">
                            <input type="button" class="btEdit" onclick="location.href = '/<?php echo $this->_tpl_vars['varController']; ?>
/Edit/id/<?php echo $this->_tpl_vars['record']['Id']; ?>
';" title="Editar"/>
                            
                        </td>
                    </tr>
                    <!-- /item -->