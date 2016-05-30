<?php /* Smarty version 2.6.26, created on 2014-09-16 16:35:42
         compiled from Backend/Insumo/ListEntregasProduccion/Record.tpl */ ?>
                    <!-- item -->
                    <tr<?php echo $this->_tpl_vars['className']; ?>
>
                        <!--<td width="2%"><input type="checkbox" class="check" name="selectId[]" value="<?php echo $this->_tpl_vars['record']['Id']; ?>
" /></td>-->
                        
                        <td width="5%"><?php if ($this->_tpl_vars['record']['OrdenDeCompraId']): ?><a title="Ver orden" class="hasOrdenCompra" id="<?php echo $this->_tpl_vars['record']['Id']; ?>
" OrdenCompraId="<?php echo $this->_tpl_vars['record']['OrdenDeCompraId']; ?>
" href="#"><?php echo $this->_tpl_vars['record']['OrdenId']; ?>
</a><?php else: ?><p><?php echo $this->_tpl_vars['record']['OrdenId']; ?>
</p><?php endif; ?></td>
                        
                        <td width="10%"><?php if ($this->_tpl_vars['record']['OrdenDeCompraId']): ?><a title="Ver orden" class="hasOrdenCompra" id="<?php echo $this->_tpl_vars['record']['Id']; ?>
" OrdenCompraId="<?php echo $this->_tpl_vars['record']['OrdenDeCompraId']; ?>
" href="#"><?php echo $this->_tpl_vars['record']['Nombre']; ?>
</a><?php else: ?><p><?php echo $this->_tpl_vars['record']['Nombre']; ?>
</p><?php endif; ?></td>
                        <td width="10%">
                        	<p><?php echo $this->_tpl_vars['record']['Proveedor']['Nombre']; ?>
<br>
                        	<?php if ($this->_tpl_vars['record']['Proveedor']['Telefono']): ?>Tel: <?php echo $this->_tpl_vars['record']['Proveedor']['Telefono']; ?>
<?php endif; ?>
                        	<?php if ($this->_tpl_vars['record']['Proveedor']['PersonaEmail']): ?>
                        	<a href="mailto:<?php echo $this->_tpl_vars['record']['Proveedor']['PersonaEmail']; ?>
" title="Hacer click para enviar email"><img src="/images/icons/email_add.png" title="email"/> <?php echo $this->_tpl_vars['record']['Proveedor']['PersonaEmail']; ?>
</a>
                        	<?php endif; ?>
                        	</p>
                        </td>
                        <td width="8%"><?php if ($this->_tpl_vars['record']['OrdenDeCompraId']): ?><a title="Ver orden" class="hasOrdenCompra" id="<?php echo $this->_tpl_vars['record']['Id']; ?>
" OrdenCompraId="<?php echo $this->_tpl_vars['record']['OrdenDeCompraId']; ?>
" href="#"><?php echo $this->_tpl_vars['record']['Orden']['Estado']['Nombre']; ?>
</a><?php else: ?><p><?php echo $this->_tpl_vars['record']['Orden']['Estado']['Nombre']; ?>
</p><?php endif; ?></td>
                        <td width="10%"><?php if ($this->_tpl_vars['record']['OrdenDeCompraId']): ?><a title="Ver orden" class="hasOrdenCompra" id="<?php echo $this->_tpl_vars['record']['Id']; ?>
" OrdenCompraId="<?php echo $this->_tpl_vars['record']['OrdenDeCompraId']; ?>
" href="#"><?php echo $this->_tpl_vars['record']['Orden']['Cliente']['RazonSocial']; ?>
</a><?php else: ?><p><?php echo $this->_tpl_vars['record']['Orden']['Cliente']['RazonSocial']; ?>
</p><?php endif; ?></td>
                        
                        <td width="8%"><p><?php if ($this->_tpl_vars['record']['DiasRestantesEntrega']): ?><?php echo $this->_tpl_vars['record']['DiasRestantesEntrega']; ?>
<?php else: ?><img src="/images/icons/error.png" title="Ingrese dias de entrega en el insumo"/><?php endif; ?></p></td>
                        
                        <td width="8%"><p><?php if ($this->_tpl_vars['record']['DiasParaFinalizar']): ?><?php echo $this->_tpl_vars['record']['DiasParaFinalizar']; ?>
 dias<?php else: ?>Ingresar fecha <img src="/images/icons/exclamation.png" title="exclamacion"/><?php endif; ?></p></td>
                        
                        
                        <td width="10%"><?php if ($this->_tpl_vars['record']['OrdenDeCompraId']): ?><a title="Ver orden" class="hasOrdenCompra" id="<?php echo $this->_tpl_vars['record']['Id']; ?>
" OrdenCompraId="<?php echo $this->_tpl_vars['record']['OrdenDeCompraId']; ?>
" href="#">$ <?php echo $this->_tpl_vars['record']['Cantidad']*$this->_tpl_vars['record']['PrecioUnitarioSinIVA']; ?>
</a><?php else: ?><p>$ <?php echo $this->_tpl_vars['record']['Cantidad']*$this->_tpl_vars['record']['PrecioUnitarioSinIVA']; ?>
</p><?php endif; ?></td>
                        

                        <td width="10%" align="center">
                                <br></br>                      
                            <a title="Ver orden de compra" class="hasOrdenCompra" id="<?php echo $this->_tpl_vars['record']['Id']; ?>
" OrdenCompraId="<?php echo $this->_tpl_vars['record']['OrdenDeCompraId']; ?>
" href="#"><img src="/images/icons/layout_edit.png" title="Editar"/> Ver orden de compra</a>
                            
                            <br><a title="Ver orden de trabajo" class="VerOrdenDeTrabajo" href="/Orden/Edit/id/<?php echo $this->_tpl_vars['record']['OrdenId']; ?>
"><img src="/images/icons/layout_edit.png" title="Editar"/> Ver orden de trabajo</a>
                            
                            <br><a title="Marcar Insumo como entregado" class="InsumoEntregado" href="/Insumo/SetEntregado/Produccion/true/id/<?php echo $this->_tpl_vars['record']['Id']; ?>
"><img src="/images/icons/add.png" title="Editar"/> Entregado</a>
                            
                            <br><img src="/images/icons/layout_edit.png" title="Editar"/> <a href="#" 
                                            onclick="window.open(	'/Insumo/Edit/Orden/<?php echo $this->_tpl_vars['record']['OrdenId']; ?>
/id/<?php echo $this->_tpl_vars['record']['Id']; ?>
', 
                                                    'windowname1', 
                                                    'width=980, height=700, scrollbars = yes'); 
                                                    return false;">
                                            Editar insumo&nbsp;	
                                        </a>
                            <br></br>
                        </td>
                        
                            
                            
                        </td>
                    </tr>
                    <!-- /item -->