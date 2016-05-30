<?php /* Smarty version 2.6.26, created on 2016-05-03 09:13:48
         compiled from Backend/OrdenPago/Record.tpl */ ?>
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
<?php endif; ?> (<?php echo $this->_tpl_vars['record']['TipoDePago']; ?>
)</a></td>
                        <td width="10%"><a class="AbrirPopup" href="/<?php echo $this->_tpl_vars['varController']; ?>
/Edit/id/<?php echo $this->_tpl_vars['record']['Id']; ?>
"><?php if ($this->_tpl_vars['record']['TotalPagos']): ?><?php echo $this->_tpl_vars['record']['TotalPagos']; ?>
<?php else: ?><img src="/images/icons/error.png" title="Debe ingresar pagos a la orden"/><?php endif; ?></a></td>
                        <td width="20%"><a class="AbrirPopup" href="/<?php echo $this->_tpl_vars['varController']; ?>
/Edit/id/<?php echo $this->_tpl_vars['record']['Id']; ?>
"><?php echo $this->_tpl_vars['record']['Proveedor']['Nombre']; ?>
</a></td>
                        <td width="15%">
                        
                        	<p><?php echo $this->_tpl_vars['record']['TextDetalleLiquidacionHtmlConLinkPopUp']; ?>
</p>
                        </td>
                        <td width="10%" align="center">
                        
                        	<?php if ($this->_tpl_vars['record']['FechaAnulacion']): ?>
                        		<img src="/images/icons/delete.png" title="Orden de compra anulada el dia <?php echo $this->_tpl_vars['record']['FechaAnulacion']; ?>
"/> Anulada
							<?php else: ?>
								<img src="/images/icons/tick.png" title="ok"/> Vigente
							<?php endif; ?>
                        </td>
                        <td width="5%" align="center">
                                                      
                            <a class="EditarOrdenDePago" href="/OrdenPago/Edit/id/<?php echo $this->_tpl_vars['record']['Id']; ?>
"><img src="/images/icons/layout_edit.png" title="Editar"/></a>
                            
                            <?php if (( ! $this->_tpl_vars['record']['FechaAnulacion'] )): ?>
	                        	<br><a class="Anular" href="/OrdenPago/Anular/OrdenDePagoId/<?php echo $this->_tpl_vars['record']['Id']; ?>
"><img src="/images/icons/delete.png" title=""/> Anular</a>
	                        <?php endif; ?>
                            
                        </td>
                    </tr>
                    <!-- /item -->