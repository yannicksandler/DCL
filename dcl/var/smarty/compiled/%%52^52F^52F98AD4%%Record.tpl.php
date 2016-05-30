<?php /* Smarty version 2.6.26, created on 2013-11-14 11:12:39
         compiled from Backend/Orden/ListSinFacturar/Record.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'Backend/Orden/ListSinFacturar/Record.tpl', 5, false),)), $this); ?>
                    <!-- item -->
                    <tr <?php echo $this->_tpl_vars['className']; ?>
>
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
                        
                        <td width="10%">
                        	<?php if ($this->_tpl_vars['record']['TotalSinIva']): ?>
                        		<a href="/<?php echo $this->_tpl_vars['varController']; ?>
/Edit/id/<?php echo $this->_tpl_vars['record']['Id']; ?>
" title="Precio de venta sin IVA"></a><?php echo $this->_tpl_vars['record']['TotalSinIva']; ?>

                        	<?php else: ?>
                        		<img src="/images/icons/error.png" title="Asignar precio de venta"/>
                        	<?php endif; ?>
                        </td>
                        <!-- 
                        <td width="12%">
                        	<a class="VerComentario" id="comentario_<?php echo $this->_tpl_vars['record']['Id']; ?>
" title="<?php echo $this->_tpl_vars['record']['DescripcionDeTrabajo']; ?>
">Leer descripcion</a>
                        	
							<div id="dialog_comentario_<?php echo $this->_tpl_vars['record']['Id']; ?>
" title="Descripcion de la orden de trabajo" style="display:none">
								<p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 40px 40px 0;"></span>
									<?php echo $this->_tpl_vars['record']['DescripcionDeTrabajo']; ?>

								</p>
							</div>
                        </td>
                         -->
                        
                        <td width="8%" align="center">
                            <a type="button" class="btEdit VerOrdenDeTrabajo" title="Editar orden de trabajo" href="/<?php echo $this->_tpl_vars['varController']; ?>
/Edit/id/<?php echo $this->_tpl_vars['record']['Id']; ?>
/popup/true" /><img src="/images/icons/bullet_go.png" alt="item" title="Item"/> Editar</a>
                            <br><a type="button" class="btEdit" title="" href="/Facturacion/Facturar/ClienteId/<?php echo $this->_tpl_vars['record']['ClienteId']; ?>
" /><img src="/images/icons/add.png" alt="item" title="Item"/> Crear factura</a>
                        
                        </td>
                    </tr>
                    <!-- /item -->