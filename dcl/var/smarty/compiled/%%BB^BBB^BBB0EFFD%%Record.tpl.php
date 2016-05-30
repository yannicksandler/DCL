<?php /* Smarty version 2.6.26, created on 2014-08-21 16:28:59
         compiled from Backend/NotaDebito/Record.tpl */ ?>
                    <!-- item -->
                    <tr<?php echo $this->_tpl_vars['className']; ?>
>
                        
                        
                        <td width="10%"><a class="AbrirPopup" href="/<?php echo $this->_tpl_vars['varController']; ?>
/Edit/id/<?php echo $this->_tpl_vars['record']['Id']; ?>
"><?php echo $this->_tpl_vars['record']['Fecha']; ?>
</a></td>
                        <td width="10%"><a class="AbrirPopup" href="/<?php echo $this->_tpl_vars['varController']; ?>
/Edit/id/<?php echo $this->_tpl_vars['record']['Id']; ?>
"><?php if ($this->_tpl_vars['record']['Numero']): ?><?php echo $this->_tpl_vars['record']['Numero']; ?>
<?php else: ?><?php echo $this->_tpl_vars['record']['Id']; ?>
<?php endif; ?> (<?php echo $this->_tpl_vars['record']['Tipo']; ?>
)</a></td>
                        <td width="10%"><a class="AbrirPopup" href="/<?php echo $this->_tpl_vars['varController']; ?>
/Edit/id/<?php echo $this->_tpl_vars['record']['Id']; ?>
"><?php echo $this->_tpl_vars['record']['Importe']; ?>
</a></td>
                        <td width="20%"><a class="AbrirPopup" href="/<?php echo $this->_tpl_vars['varController']; ?>
/Edit/id/<?php echo $this->_tpl_vars['record']['Id']; ?>
"><?php echo $this->_tpl_vars['record']['Cliente']['Nombre']; ?>
</a></td>
                        
                        <td width="5%" align="center">
                                                      
                            <a class="EditarOrdenDePago" href="/NotaDebito/Edit/id/<?php echo $this->_tpl_vars['record']['Id']; ?>
"><img src="/images/icons/layout_edit.png" title="Editar"/></a>
                            
                            
                        </td>
                    </tr>
                    <!-- /item -->