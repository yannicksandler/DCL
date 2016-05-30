<?php /* Smarty version 2.6.26, created on 2014-09-16 11:29:37
         compiled from Backend/Insumo/Record.tpl */ ?>
                    <!-- item -->
                    <tr<?php echo $this->_tpl_vars['className']; ?>
>
                        
                        
                        
                        <td width="15%" align="center"><?php if ($this->_tpl_vars['record']['OrdenDeCompraId']): ?><a title="Ver orden" class="hasOrdenCompra" id="<?php echo $this->_tpl_vars['record']['Id']; ?>
" OrdenCompraId="<?php echo $this->_tpl_vars['record']['OrdenDeCompraId']; ?>
" href="#"><?php echo $this->_tpl_vars['record']['Nombre']; ?>
</a><?php else: ?><p><?php echo $this->_tpl_vars['record']['Nombre']; ?>
</p><?php endif; ?></td>
                        <td width="10%"><p><?php echo $this->_tpl_vars['record']['Total']; ?>
</p></td>
                        <td width="10%"><p>Forma de pago: <?php if ($this->_tpl_vars['record']['FormaDePago']): ?><?php echo $this->_tpl_vars['record']['FormaDePago']; ?>
<?php else: ?><img src="/images/icons/error.png" title="Debe ingresar la forma de pago al insumo"/><?php endif; ?> <br>(<?php echo $this->_tpl_vars['record']['CondicionDePago']; ?>
)</p></td>
                        <td width="10%"><?php if ($this->_tpl_vars['record']['OrdenDeCompraId']): ?><a title="Ver orden" class="hasOrdenCompra" id="<?php echo $this->_tpl_vars['record']['Id']; ?>
" OrdenCompraId="<?php echo $this->_tpl_vars['record']['OrdenDeCompraId']; ?>
" href="#"><?php echo $this->_tpl_vars['record']['Proveedor']['Nombre']; ?>
</a><?php else: ?><p><?php echo $this->_tpl_vars['record']['Proveedor']['Nombre']; ?>
</p><?php endif; ?></td>
                        
                        <td width="10%"><?php if ($this->_tpl_vars['record']['OrdenDeCompraId']): ?><a title="Ver orden" class="hasOrdenCompra" id="<?php echo $this->_tpl_vars['record']['Id']; ?>
" OrdenCompraId="<?php echo $this->_tpl_vars['record']['OrdenDeCompraId']; ?>
" href="#"><?php echo $this->_tpl_vars['record']['OrdenId']; ?>
</a><?php else: ?><p><?php echo $this->_tpl_vars['record']['OrdenId']; ?>
</p><?php endif; ?></td>
                        
                        <td width="10%"><?php if ($this->_tpl_vars['record']['OrdenDeCompraId']): ?><a title="Ver orden" class="hasOrdenCompra" id="<?php echo $this->_tpl_vars['record']['Id']; ?>
" OrdenCompraId="<?php echo $this->_tpl_vars['record']['OrdenDeCompraId']; ?>
" href="#"><?php echo $this->_tpl_vars['record']['Orden']['Cliente']['RazonSocial']; ?>
</a><?php else: ?><p><?php echo $this->_tpl_vars['record']['Orden']['Cliente']['RazonSocial']; ?>
</p><?php endif; ?></td>
                        
                        

                        <td width="10%" align="center">
                            
                            <a title="Ver orden de trabajo" class="VerOrdenDeTrabajo" href="/Orden/Edit/id/<?php echo $this->_tpl_vars['record']['OrdenId']; ?>
"><img src="/images/icons/layout_edit.png" title="Editar"/> Ver orden de trabajo</a>
                            
                        </td>
                        
                            
                            
                        </td>
                    </tr>
                    <!-- /item -->