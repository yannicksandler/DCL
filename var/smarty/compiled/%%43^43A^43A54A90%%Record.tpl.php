<?php /* Smarty version 2.6.26, created on 2016-05-05 11:24:35
         compiled from Backend/Orden/ListCotizaciones/Record.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'Backend/Orden/ListCotizaciones/Record.tpl', 5, false),array('modifier', 'nl2br', 'Backend/Orden/ListCotizaciones/Record.tpl', 28, false),)), $this); ?>
                    <!-- item -->
                    <tr <?php if ($this->_tpl_vars['record']['FechaFin']): ?>bgcolor="#FFCC33" title="La orden tiene fecha de finalizacion y es prioridad"<?php else: ?><?php echo $this->_tpl_vars['className']; ?>
<?php endif; ?>>
                        <td width="2%"><input type="checkbox" class="check" name="selectId[]" value="<?php echo $this->_tpl_vars['record']['Id']; ?>
" /></td>
                        <td width="5%"><a href="/<?php echo $this->_tpl_vars['varController']; ?>
/Edit/id/<?php echo $this->_tpl_vars['record']['Id']; ?>
"><?php echo $this->_tpl_vars['record']['Id']; ?>
</a></td>
                        <td width="10%"><a href="/<?php echo $this->_tpl_vars['varController']; ?>
/Edit/id/<?php echo $this->_tpl_vars['record']['Id']; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['record']['Producto'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'htmlall') : smarty_modifier_escape($_tmp, 'htmlall')); ?>
</a></td>
                        <td width="10%"><a href="/<?php echo $this->_tpl_vars['varController']; ?>
/Edit/id/<?php echo $this->_tpl_vars['record']['Id']; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['record']['Cliente']['Nombre'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'htmlall') : smarty_modifier_escape($_tmp, 'htmlall')); ?>
</a></td>
                        <td width="10%"><a href="/<?php echo $this->_tpl_vars['varController']; ?>
/Edit/id/<?php echo $this->_tpl_vars['record']['Id']; ?>
"><?php if ($this->_tpl_vars['record']['Estado']['Nombre'] == 'Cobrado'): ?><span title="Cobrado" class="active" title="Cobrado"></span><?php elseif ($this->_tpl_vars['record']['Estado']['Nombre'] == 'Anulado'): ?><span title="Anulado" class="inactive"></span><?php else: ?><?php echo $this->_tpl_vars['record']['Estado']['Nombre']; ?>
<?php endif; ?></a></td>
                        <td width="10%"><a href="/<?php echo $this->_tpl_vars['varController']; ?>
/Edit/id/<?php echo $this->_tpl_vars['record']['Id']; ?>
" title="<?php echo $this->_tpl_vars['record']['FechaEntrega']; ?>
"><?php if ($this->_tpl_vars['record']['DiasProximoCambioEstado']): ?><?php echo $this->_tpl_vars['record']['DiasProximoCambioEstado']; ?>
 dias<?php else: ?>hoy <img src="/images/icons/exclamation.png" title="exclamacion"/><?php endif; ?></a></td>
                        
                        
                        <td width="10%">
                        <!--  @see Filterbox.tpl para definicion de clase CambiarPrioridad -->
                        	<select title="<?php if ($this->_tpl_vars['record']['PrioridadComentario']): ?><?php echo $this->_tpl_vars['record']['PrioridadComentario']; ?>
<?php else: ?>No tiene comentario<?php endif; ?>" href="/<?php echo $this->_tpl_vars['varController']; ?>
/SetPrioridad/OrdenId/<?php echo $this->_tpl_vars['record']['Id']; ?>
" class="CambiarPrioridad" id="Prioridad__">
		                        <option value="">Seleccionar</option>
		                        <?php $_from = $this->_tpl_vars['Prioridades']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['p']):
?>
		                        <option value="<?php echo $this->_tpl_vars['p']['Id']; ?>
" <?php if ($this->_tpl_vars['p']['Id'] == $this->_tpl_vars['record']['PrioridadId']): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['p']['Nombre']; ?>
</option>
		                        
		                        <?php endforeach; endif; unset($_from); ?>
		                    </select>
		                
                        </td>
                        
                        <td width="12%">
                        	<a class="VerComentario" id="comentario_<?php echo $this->_tpl_vars['record']['Id']; ?>
" title="<?php echo $this->_tpl_vars['record']['DescripcionDeTrabajo']; ?>
">Leer descripcion</a>
                        	<!-- dialog confirm -->
							<div id="dialog_comentario_<?php echo $this->_tpl_vars['record']['Id']; ?>
" title="Descripcion de la orden de trabajo" style="display:none">
								<p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 40px 40px 0;"></span>
									<?php echo ((is_array($_tmp=$this->_tpl_vars['record']['DescripcionDeTrabajo'])) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>

								</p>
							</div>
                        </td>
                        
                        <td width="8%" align="center">
                            
                            <a type="button" class="btEdit VerOrdenDeTrabajo" title="Editar orden de trabajo" href="/<?php echo $this->_tpl_vars['varController']; ?>
/Edit/id/<?php echo $this->_tpl_vars['record']['Id']; ?>
/popup/true" /><img src="/images/icons/layout_edit.png" title="Ver presupuesto"/> Editar OT</a>
                            
                        </td>
                    </tr>
                    <!-- /item -->