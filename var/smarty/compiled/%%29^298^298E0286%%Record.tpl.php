<?php /* Smarty version 2.6.26, created on 2015-03-17 13:37:03
         compiled from Backend/TipoGasto/Record.tpl */ ?>
                    <!-- item -->
                    <tr<?php echo $this->_tpl_vars['className']; ?>
>
                        <td width="2%"><input type="checkbox" class="check" name="selectId[]" value="<?php echo $this->_tpl_vars['record']['Id']; ?>
" /></td>
                        
                        
                        <td width="15%"><a href="/<?php echo $this->_tpl_vars['varController']; ?>
/Edit/id/<?php echo $this->_tpl_vars['record']['Id']; ?>
"><?php echo $this->_tpl_vars['record']['Nombre']; ?>
</a></td>
                        
                       
                        
                        <td width="6%" align="center">
                            <input type="button" class="btEdit" onclick="location.href = '/<?php echo $this->_tpl_vars['varController']; ?>
/Edit/id/<?php echo $this->_tpl_vars['record']['Id']; ?>
';" title="Editar"/>
                            
                        </td>
                    </tr>
                    <!-- /item -->