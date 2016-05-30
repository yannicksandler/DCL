<?php /* Smarty version 2.6.26, created on 2014-09-02 10:05:46
         compiled from Backend/Cheque/Record.tpl */ ?>
                    <!-- item -->
                    <tr<?php echo $this->_tpl_vars['className']; ?>
>
                    <!-- 
                        <td width="2%"><input type="checkbox" class="check" name="selectId[]" value="<?php echo $this->_tpl_vars['record']['Id']; ?>
" /></td>
                         -->
                        
                        <td width="10%"><p href="/<?php echo $this->_tpl_vars['varController']; ?>
/Edit/id/<?php echo $this->_tpl_vars['record']['Id']; ?>
"><?php echo $this->_tpl_vars['record']['NombreBanco']; ?>
</p></td>
                        
                        <td width="10%"><p href="/<?php echo $this->_tpl_vars['varController']; ?>
/Edit/id/<?php echo $this->_tpl_vars['record']['Id']; ?>
"><?php echo $this->_tpl_vars['record']['Numero']; ?>
 (<?php echo $this->_tpl_vars['record']['Tipo']; ?>
)</p></td>
                        
                        <td width="10%"><p href="/<?php echo $this->_tpl_vars['varController']; ?>
/Edit/id/<?php echo $this->_tpl_vars['record']['Id']; ?>
"><?php echo $this->_tpl_vars['record']['Importe']; ?>
</p></td>
                        
                        <td width="10%"><p href="/<?php echo $this->_tpl_vars['varController']; ?>
/Edit/id/<?php echo $this->_tpl_vars['record']['Id']; ?>
"><?php echo $this->_tpl_vars['record']['Estado']; ?>
</p></td>
                        
                        <td width="10%"><p href="/<?php echo $this->_tpl_vars['varController']; ?>
/Edit/id/<?php echo $this->_tpl_vars['record']['Id']; ?>
"><?php echo $this->_tpl_vars['record']['FechaEmision']; ?>
</p></td>
                        <td width="10%"><p href="/<?php echo $this->_tpl_vars['varController']; ?>
/Edit/id/<?php echo $this->_tpl_vars['record']['Id']; ?>
"><?php echo $this->_tpl_vars['record']['FechaCobro']; ?>
</p></td>
                        <td width="10%"><p href="/<?php echo $this->_tpl_vars['varController']; ?>
/Edit/id/<?php echo $this->_tpl_vars['record']['Id']; ?>
"><?php echo $this->_tpl_vars['record']['FechaVencimiento']; ?>
</p></td>
                        
                        <td width="10%"><p href="/<?php echo $this->_tpl_vars['varController']; ?>
/Edit/id/<?php echo $this->_tpl_vars['record']['Id']; ?>
"><?php echo $this->_tpl_vars['record']['Cliente']['Nombre']; ?>
</p></td>
                        <td width="10%"><p href="/<?php echo $this->_tpl_vars['varController']; ?>
/Edit/id/<?php echo $this->_tpl_vars['record']['Id']; ?>
"><?php echo $this->_tpl_vars['record']['Proveedor']['Nombre']; ?>
</p></td>
                       
                        
                        <td width="6%" align="center">
	                        <?php if ($this->_tpl_vars['record']['PuedeAnularse']): ?>
	                        <td width="10%"><a class="anular" href="/<?php echo $this->_tpl_vars['varController']; ?>
/Anular/id/<?php echo $this->_tpl_vars['record']['Id']; ?>
"><img src="/images/icons/error_delete.png" alt="item" title="Anular"/></a></td>
	                        <?php endif; ?>
                        <!-- 
                            <input type="button" class="btEdit" onclick="location.href = '/<?php echo $this->_tpl_vars['varController']; ?>
/Edit/id/<?php echo $this->_tpl_vars['record']['Id']; ?>
';" title="Editar"/>
                             -->
                        </td>
                    </tr>
                    <!-- /item -->