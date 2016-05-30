<?php /* Smarty version 2.6.26, created on 2016-05-02 12:41:33
         compiled from Backend/FacturaCompra/Record.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'count', 'Backend/FacturaCompra/Record.tpl', 14, false),)), $this); ?>
                    <!-- item -->
                    <tr<?php echo $this->_tpl_vars['className']; ?>
>
                        
                        <td width="10%"><a class="VerFactura" id="" ><?php echo $this->_tpl_vars['record']['NumeroInterno']; ?>
</a></td>
                        <td width="10%"><a class="VerFactura" id="" ><?php echo $this->_tpl_vars['record']['Numero']; ?>
</a></td>
                        <td width="10%"><a class="VerFactura" id="" ><?php echo $this->_tpl_vars['record']['Fecha']; ?>
</a></td>
                        <td width="10%"><a class="VerFactura" id="" ><?php echo $this->_tpl_vars['record']['Proveedor']['Nombre']; ?>
</a></td>
                        <td width="10%"><a class="VerFactura" id="" >$ <?php if ($this->_tpl_vars['record']['Importe']): ?><?php echo $this->_tpl_vars['record']['Importe']; ?>
<?php else: ?><?php echo $this->_tpl_vars['record']['ImporteTotal']; ?>
<?php endif; ?></a></td>
                        <td width="10%"><a class="VerFactura" id="" >$ <?php echo $this->_tpl_vars['record']['ImportePendienteDePago']; ?>
</a></td>
                        
                        <td width="10%"><a class="VerFactura" id="" ><?php echo $this->_tpl_vars['record']['TipoIva']['Letra_comp']; ?>
</a></td>
                        
                        <td width="20%"><a class="VerFactura" id="" >
                        	<?php if (count($this->_tpl_vars['record']['Liquidacion'])): ?>
                        		<?php $_from = $this->_tpl_vars['record']['Liquidacion']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['liq']):
?>
									<p><?php echo $this->_tpl_vars['liq']['TextDescripcionOrdenDeCompra']; ?>
</p><br>
								<?php endforeach; endif; unset($_from); ?>
							<?php else: ?>
								<p>No existen ordenes de compra liquidadas</p>
							<?php endif; ?>
										</a>
						</td>
                                                
                        <td width="10%" align="center">
                        	
                        	<div id="_FacturaCompra_Anular_FacturaNumero_<?php echo $this->_tpl_vars['record']['Numero']; ?>
_ProveedorId_<?php echo $this->_tpl_vars['record']['ProveedorId']; ?>
_TipoIvaId_<?php echo $this->_tpl_vars['record']['TipoIvaId']; ?>
">
	                        	<?php if (( ! $this->_tpl_vars['record']['FechaAnulacion'] )): ?>
	                        	<br><a class="PagarFactura" href="/OrdenPago/Edit/FacturaNumero/<?php echo $this->_tpl_vars['record']['Numero']; ?>
/ProveedorId/<?php echo $this->_tpl_vars['record']['ProveedorId']; ?>
/TipoIvaId/<?php echo $this->_tpl_vars['record']['TipoIvaId']; ?>
"><img src="/images/icons/pagos.png" width="32px" title=""/> Pagar</a>
								<?php endif; ?>
								
								<?php if (( ! $this->_tpl_vars['record']['FechaAnulacion'] )): ?>
	                        	<br><a class="" href="/FacturaCompra/Edit/FacturaNumero/<?php echo $this->_tpl_vars['record']['Numero']; ?>
/ProveedorId/<?php echo $this->_tpl_vars['record']['ProveedorId']; ?>
/TipoIvaId/<?php echo $this->_tpl_vars['record']['TipoIvaId']; ?>
"><img src="/images/icons/bullet_go.png" title=""/> Ver</a>
								<?php else: ?>
								<br><a><img src="/images/icons/delete.png" title="Factura anulada"/> Anulada</a>
								<?php endif; ?>
								
	                        	<?php if (( ! $this->_tpl_vars['record']['FechaAnulacion'] )): ?>
	                        	<br><a class="AnularFactura" href="/FacturaCompra/Anular/FacturaNumero/<?php echo $this->_tpl_vars['record']['Numero']; ?>
/ProveedorId/<?php echo $this->_tpl_vars['record']['ProveedorId']; ?>
/TipoIvaId/<?php echo $this->_tpl_vars['record']['TipoIvaId']; ?>
"><img src="/images/icons/delete.png" title=""/> Anular</a>
	                        	<?php endif; ?>
							</div>
                        </td>
                    </tr>
                    <!-- /item -->