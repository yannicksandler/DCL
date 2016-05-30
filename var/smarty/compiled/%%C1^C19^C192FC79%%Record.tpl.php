<?php /* Smarty version 2.6.26, created on 2016-04-29 13:34:41
         compiled from Backend/OrdenCompra/Record.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'count', 'Backend/OrdenCompra/Record.tpl', 20, false),)), $this); ?>
                    <!-- item -->
                    <tr<?php echo $this->_tpl_vars['className']; ?>
>
                        
                        <td width="10%"><a class="AbrirPopup" href="/<?php echo $this->_tpl_vars['varController']; ?>
/Edit/id/<?php echo $this->_tpl_vars['record']['Id']; ?>
"><?php echo $this->_tpl_vars['record']['Fecha']; ?>
</a></td>
                        <td width="10%"><a class="AbrirPopup" href="/<?php echo $this->_tpl_vars['varController']; ?>
/Edit/id/<?php echo $this->_tpl_vars['record']['Id']; ?>
" title="<?php echo $this->_tpl_vars['record']['FechaEntregaInsumo']; ?>
"><?php echo $this->_tpl_vars['record']['Id']; ?>
 <br>(<?php echo $this->_tpl_vars['record']['Entregado']; ?>
)</a></td>
                        <td width="10%"><a class="AbrirPopup" href="/<?php echo $this->_tpl_vars['varController']; ?>
/Edit/id/<?php echo $this->_tpl_vars['record']['Id']; ?>
"><?php echo $this->_tpl_vars['record']['OrdenDeTrabajo']['Id']; ?>
</a></td>
                        <td width="20%">
                        	<a class="AbrirPopup" href="/<?php echo $this->_tpl_vars['varController']; ?>
/Edit/id/<?php echo $this->_tpl_vars['record']['Id']; ?>
"><?php echo $this->_tpl_vars['record']['NombreProveedor']; ?>
</a>
                        </td>
                        <td width="10%"><a class="AbrirPopup" href="/<?php echo $this->_tpl_vars['varController']; ?>
/Edit/id/<?php echo $this->_tpl_vars['record']['Id']; ?>
">$ <?php echo $this->_tpl_vars['record']['Importe']; ?>
</a></td>
                        <td width="10%"><a class="AbrirPopup" href="/<?php echo $this->_tpl_vars['varController']; ?>
/Edit/id/<?php echo $this->_tpl_vars['record']['Id']; ?>
">$ <?php echo $this->_tpl_vars['record']['TotalValidadoEnFacturaCompra']; ?>
<br><?php if ($this->_tpl_vars['record']['ImporteCompensatorio']): ?>(Comp. $ <?php echo $this->_tpl_vars['record']['ImporteCompensatorio']; ?>
)<?php endif; ?></a></td>
                        <td width="10%">
                        	<a class="AbrirPopup" href="/<?php echo $this->_tpl_vars['varController']; ?>
/Edit/id/<?php echo $this->_tpl_vars['record']['Id']; ?>
"><?php if ($this->_tpl_vars['record']['FechaAnulacion']): ?><img src="/images/icons/delete.png" title="Orden de compra anulada el dia <?php echo $this->_tpl_vars['record']['FechaAnulacion']; ?>
"/> Anulada<?php else: ?><img src="/images/icons/tick.png" title="ok"/> Vigente<?php endif; ?></a>
                        </td>
                        <td width="10%">
                        
                        	<a class="" href="/OrdenPago/Edit/id/<?php echo $this->_tpl_vars['record']['OrdenDePagoId']; ?>
/ProveedorId/<?php echo $this->_tpl_vars['record']['ProveedorId']; ?>
"><?php if ($this->_tpl_vars['record']['OrdenDePagoId']): ?>&raquo; Orden de pago: <?php echo $this->_tpl_vars['record']['OrdenDePagoId']; ?>
<?php endif; ?></a>
                        	
                            
                            <?php if (count($this->_tpl_vars['record']['OrdenDePagoOrdenDeCompra'])): ?>
								<?php $_from = $this->_tpl_vars['record']['OrdenDePagoOrdenDeCompra']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['opoc']):
?>
					
											<table border="0" cellpadding="0" cellspacing="0">
													<tr>    
						                                <td><p><a href="/OrdenPago/Edit/id/<?php echo $this->_tpl_vars['opoc']['OrdenDePagoId']; ?>
//ProveedorId/<?php echo $this->_tpl_vars['record']['ProveedorId']; ?>
">&raquo; Orden de pago: <?php echo $this->_tpl_vars['opoc']['OrdenDePagoId']; ?>
 (Importe: $ <?php echo $this->_tpl_vars['opoc']['ImporteAbonado']; ?>
)</a></p>
						                                </td>            
						                            </tr>
						                    </table>
								<?php endforeach; endif; unset($_from); ?>
							<?php else: ?>
                            	sin orden de pago
							<?php endif; ?>
                        </td>
                        
                        
                        <td width="10%" align="center">
                            &raquo; <a class="AbrirPopup" href="/<?php echo $this->_tpl_vars['varController']; ?>
/Edit/id/<?php echo $this->_tpl_vars['record']['Id']; ?>
">Ver Orden de compra</a>
                            <!-- 
                            <br> <a class="CrearOrdenDePago_" href="/OrdenPago/Edit/ProveedorId/<?php echo $this->_tpl_vars['record']['ProveedorId']; ?>
"><img src="/images/icons/add.png" title="Agregar"/> Crear Orden de pago</a>
                             -->
                            <!-- 
                            <br> <a class="CrearOrdenDePago_" href="/FacturaCompra/Edit/ProveedorId/<?php echo $this->_tpl_vars['record']['ProveedorId']; ?>
"><img src="/images/icons/add.png" title="Agregar"/> Crear Factura de compra</a>
							 -->
                            
                        	<br><a class="VerOrdenDeTrabajo" href="/Orden/Edit/id/<?php $_from = $this->_tpl_vars['record']['Insumo']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['i']):
?><?php echo $this->_tpl_vars['i']['OrdenId']; ?>
<?php endforeach; endif; unset($_from); ?>">&raquo; Ver Orden de trabajo</a>
                        	<br></br>
                        </td>
                    </tr>
                    <!-- /item -->