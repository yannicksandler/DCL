<?php /* Smarty version 2.6.26, created on 2016-01-19 12:31:46
         compiled from Backend/Cobranza/Record.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'count', 'Backend/Cobranza/Record.tpl', 11, false),)), $this); ?>
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
"><?php if ($this->_tpl_vars['record']['ImportePagado']): ?>$ <?php echo $this->_tpl_vars['record']['ImportePagado']; ?>
<?php else: ?><img src="/images/icons/error.png" title="Debe ingresar pagos a la orden"/><?php endif; ?></a></td>
                        <td width="20%"><a class="AbrirPopup" href="/<?php echo $this->_tpl_vars['varController']; ?>
/Edit/id/<?php echo $this->_tpl_vars['record']['Id']; ?>
"><?php echo $this->_tpl_vars['record']['Cliente']['Nombre']; ?>
</a></td>
                        <td width="15%">
                        
                        	<?php if (count($this->_tpl_vars['record']['CobranzaLiquidaciones'])): ?>
                                <?php $_from = $this->_tpl_vars['record']['CobranzaLiquidaciones']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['li']):
?>
					
											<table border="0" cellpadding="0" cellspacing="0">
													<tr>    
						                                <td><p>&raquo; Factura: <?php echo $this->_tpl_vars['li']['FacturaId']; ?>
 - Importe: $ <?php echo $this->_tpl_vars['li']['Importe']; ?>
</p>
						                                </td>            
						                            </tr>
						                    </table>
								<?php endforeach; endif; unset($_from); ?>
                            <?php else: ?>        
                                <span title="No tiene liquidaciones asociadas" class="inactive"></span>
                            <?php endif; ?> 
                        </td>
                        <td width="5%" align="center">
                        	<?php if ($this->_tpl_vars['record']['FechaAnulacion']): ?>
                            <img src="/images/icons/delete.png" alt="item" title="La factura fue anulada. <?php echo $this->_tpl_vars['record']['MotivoAnulacion']; ?>
" />
                            <?php else: ?>                            
                            <img src="/images/icons/tick.png" alt="item" title="factura activa" />
							<?php endif; ?>
                        </td>
                        <td width="5%" align="center">
                                                      
                            <a class="EditarOrdenDePago" href="/Cobranza/Edit/id/<?php echo $this->_tpl_vars['record']['Id']; ?>
"><img src="/images/icons/layout_edit.png" title="Editar"/></a>
                            
                            <?php if (! $this->_tpl_vars['record']['FechaAnulacion']): ?>
                            <br>&raquo; <a class="Anular" href="/Cobranza/Anular/CobranzaId/<?php echo $this->_tpl_vars['record']['Id']; ?>
">Anular</a>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <!-- /item -->