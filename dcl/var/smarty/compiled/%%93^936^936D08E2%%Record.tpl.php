<?php /* Smarty version 2.6.26, created on 2014-09-17 17:24:32
         compiled from Backend/Facturacion/Record.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'count', 'Backend/Facturacion/Record.tpl', 14, false),)), $this); ?>
                    <!-- item -->
                    <tr<?php echo $this->_tpl_vars['className']; ?>
>
                        
                        <td width="5%"><a class="VerFactura" id="<?php echo $this->_tpl_vars['record']['Id']; ?>
" ><?php echo $this->_tpl_vars['record']['Id']; ?>
</a></td>
                        <td width="10%"><a class="VerFactura" id="<?php echo $this->_tpl_vars['record']['Id']; ?>
" ><?php echo $this->_tpl_vars['record']['Fecha']; ?>
</a></td>
                        <td width="15%"><a class="VerFactura" id="<?php echo $this->_tpl_vars['record']['Id']; ?>
" ><?php echo $this->_tpl_vars['record']['Cliente']['Nombre']; ?>
</a></td>
                        <td width="10%"><a class="VerFactura" id="<?php echo $this->_tpl_vars['record']['Id']; ?>
" >$ <?php echo $this->_tpl_vars['record']['Importe']; ?>
</a></td>
                        <td width="10%"><a class="VerFactura" id="<?php echo $this->_tpl_vars['record']['Id']; ?>
" >$ <?php echo $this->_tpl_vars['record']['ImportePendienteDeCobro']; ?>
</a></td>
                        
                        
                        <td width="15%">
                        
							
							<?php if (count($this->_tpl_vars['record']['CobranzaLiquidaciones'])): ?>
							
							<?php $_from = $this->_tpl_vars['record']['CobranzaLiquidaciones']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['cob']):
?>
							<p>
								<a  href="/Cobranza/Edit/id/<?php echo $this->_tpl_vars['cob']['CobranzaId']; ?>
">
								<img src="/images/icons/bullet_go.png" alt="item" title="Item"/>
										Ver Cobranza #<?php echo $this->_tpl_vars['cob']['CobranzaId']; ?>
<br>Importe: $ <?php echo $this->_tpl_vars['cob']['Importe']; ?>
 <?php if ($this->_tpl_vars['cob']['Cobranza']['FechaAnulacion']): ?><img src="/images/icons/delete.png" title="Cobranza anulada"/><?php endif; ?>
								</a>
							</p>
							<?php endforeach; endif; unset($_from); ?>
								<br>
							<?php else: ?>
								<a title="Crear cobranza" href="/Cobranza/Edit/ClienteId/<?php echo $this->_tpl_vars['record']['ClienteId']; ?>
">
										<img src="/images/icons/error.png" title="Agregar orden de pago"/> 
										Tiene importe pendiente
								</a>
							<?php endif; ?>
							
						</td>
                        
                        <td width="10%"><a class="VerFactura" id="<?php echo $this->_tpl_vars['record']['Id']; ?>
" ><?php echo $this->_tpl_vars['record']['TipoIva']['Letra_comp']; ?>
</a></td>
                        <td width="8%">
                        
                            <p class="AbrirPopup" href="/<?php echo $this->_tpl_vars['varController']; ?>
/Edit/id/<?php echo $this->_tpl_vars['record']['Id']; ?>
"><?php if ($this->_tpl_vars['record']['FechaAnulacion']): ?><img src="/images/icons/delete.png" title="Orden de compra anulada el dia <?php echo $this->_tpl_vars['record']['FechaAnulacion']; ?>
"/> Anulada<?php else: ?><img src="/images/icons/tick.png" title="ok"/> Vigente<?php endif; ?></p>
                            
                        </td>
                                                
                        <td width="15%" align="center">
                        	<br>&raquo; <a class="VerFactura" id="<?php echo $this->_tpl_vars['record']['Id']; ?>
" >Ver factura</a>
                        	<?php if (! $this->_tpl_vars['record']['FechaAnulacion']): ?>
                        	<br>&raquo; <a href="/Orden/ListVentas/FacturaId/<?php echo $this->_tpl_vars['record']['Id']; ?>
">Ver ordenes incluidas</a>
                        	<?php endif; ?>
                        	
                        	<?php if (( ! $this->_tpl_vars['record']['FechaAnulacion'] )): ?>
                        	<!-- no se permite anular factura que tenga cobranzas -->
                        	<?php if (! $this->_tpl_vars['record']['TieneCobranzasVigentes']): ?>
                        	<br>&raquo; <a class="AnularFactura" href="/Facturacion/Anular/FacturaId/<?php echo $this->_tpl_vars['record']['Id']; ?>
">Anular</a>
                        	<?php endif; ?>
                        	<?php endif; ?>
                        	
                        	<?php if (( ! $this->_tpl_vars['record']['FechaAnulacion'] ) && ( $this->_tpl_vars['record']['ImportePendienteDeCobro'] > 0 )): ?>
                        	<br>&raquo; <a class="CrearCobranza_" href="/Cobranza/Edit/ClienteId/<?php echo $this->_tpl_vars['record']['ClienteId']; ?>
">Cobrar</a>
							<?php endif; ?>
							
                        </td>
                    </tr>
                    <!-- /item -->