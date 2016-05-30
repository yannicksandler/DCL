<?php /* Smarty version 2.6.26, created on 2014-09-19 12:10:34
         compiled from Backend/Orden/ListVentas/Record.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'Backend/Orden/ListVentas/Record.tpl', 6, false),)), $this); ?>
                    <!-- item -->
                    <tr<?php echo $this->_tpl_vars['className']; ?>
>
                        
                        <td width="5%"><a href="/<?php echo $this->_tpl_vars['varController']; ?>
/Edit/id/<?php echo $this->_tpl_vars['record']['Id']; ?>
"><?php echo $this->_tpl_vars['record']['Id']; ?>
<?php if ($this->_tpl_vars['record']['EsFicticia'] == 'SI'): ?><br></br><img src="/images/icons/bell.png" title="Orden ficticia"/><?php endif; ?></a></td>
                        
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
                        	<?php if ($this->_tpl_vars['record']['CostosDeInicioProduccion']): ?>
                        		<a href="/<?php echo $this->_tpl_vars['varController']; ?>
/Edit/id/<?php echo $this->_tpl_vars['record']['Id']; ?>
" title="Total de costos al cambiar a estado Produccion"></a><?php echo $this->_tpl_vars['record']['CostosDeInicioProduccion']; ?>

                        	
                        	<?php endif; ?>
                        </td>
                        <td width="10%">
                        	<?php if ($this->_tpl_vars['record']['CostoTotal']): ?>
                        		<a href="/<?php echo $this->_tpl_vars['varController']; ?>
/Edit/id/<?php echo $this->_tpl_vars['record']['Id']; ?>
" title="Costo de insumos elegidos con orden de compra"><img src="/images/icons/bullet_go.png"/> <?php echo $this->_tpl_vars['record']['CostoTotal']; ?>
</a>
                        	<?php else: ?>
                        		<img src="/images/icons/clock_error.png" title="La orden no tiene costos. Asignar insumos y crear ordenes de compra a la orden para generar costos"/>
                        	<?php endif; ?>
                        	<br>
                        	<?php if ($this->_tpl_vars['record']['CostoInsumosElegidos']): ?>
                        		<a href="/<?php echo $this->_tpl_vars['varController']; ?>
/Edit/id/<?php echo $this->_tpl_vars['record']['Id']; ?>
" title="Costo de insumos elegidos"><img src="/images/icons/bullet_go.png"/> <?php echo $this->_tpl_vars['record']['CostoInsumosElegidos']; ?>
</a>
                        	<?php else: ?>
                        		<img src="/images/icons/error.png" title="La orden no tiene insumos elegidos. Asignar insumos y elegirlos"/>
                        	<?php endif; ?>
                        
                        	
                        </td>
                        <td width="10%">
                        	<?php if ($this->_tpl_vars['record']['CostosDeInicioProduccion'] && $this->_tpl_vars['record']['CostoTotal']): ?>
                        		<a href="/<?php echo $this->_tpl_vars['varController']; ?>
/Edit/id/<?php echo $this->_tpl_vars['record']['Id']; ?>
" title="Total de costos al cambiar a estado Produccion"></a><?php if (( $this->_tpl_vars['record']['CostoTotal']-$this->_tpl_vars['record']['CostosDeInicioProduccion'] ) > 0): ?><img src="/images/icons/exclamation.png" title="exclamacion"/><?php endif; ?> <?php echo $this->_tpl_vars['record']['CostoTotal']-$this->_tpl_vars['record']['CostosDeInicioProduccion']; ?>

                        	
                        	<?php endif; ?>
                        </td>
                        <td width="10%">
                        	<?php if ($this->_tpl_vars['record']['TotalSinIva']): ?>
                        		<a href="/<?php echo $this->_tpl_vars['varController']; ?>
/Edit/id/<?php echo $this->_tpl_vars['record']['Id']; ?>
" title="Precio de venta sin IVA"></a><?php echo $this->_tpl_vars['record']['TotalSinIva']; ?>

                        	<?php else: ?>
                        		<img src="/images/icons/money_add.png" title="Asignar precio de venta"/>
                        	<?php endif; ?>
                        </td>
                        <td width="10%"><a href="/<?php echo $this->_tpl_vars['varController']; ?>
/Edit/id/<?php echo $this->_tpl_vars['record']['Id']; ?>
" title="Ganancia"></a><?php if (( $this->_tpl_vars['record']['TotalSinIva']-$this->_tpl_vars['record']['CostoTotal'] ) < 0): ?><img src="/images/icons/exclamation.png" title="exclamacion"/><?php endif; ?><?php echo $this->_tpl_vars['record']['TotalSinIva']-$this->_tpl_vars['record']['CostoInsumosElegidos']; ?>
</td>
                        <td width="10%">
                        	<?php if ($this->_tpl_vars['record']['FacturaId']): ?>
                        	<a href="/<?php echo $this->_tpl_vars['varController']; ?>
/Edit/id/<?php echo $this->_tpl_vars['record']['Id']; ?>
" title="Factura"></a><?php echo $this->_tpl_vars['record']['FacturaId']; ?>

                        	<?php else: ?>
                        	<img src="/images/icons/error.png" alt="La orden no fue facturada" title="La orden no fue facturada"/>
                        	<?php endif; ?>
                        </td>
                        
                        <td width="6%" align="center">
                        	<a type="button" class="btEdit VerOrdenDeTrabajo" title="Editar orden de trabajo" href="/<?php echo $this->_tpl_vars['varController']; ?>
/Edit/id/<?php echo $this->_tpl_vars['record']['Id']; ?>
/popup/true" />Editar</a>
                            <input type="button" class="btEdit VerOrdenDeTrabajo" title="Editar orden de trabajo" href="/<?php echo $this->_tpl_vars['varController']; ?>
/Edit/id/<?php echo $this->_tpl_vars['record']['Id']; ?>
/popup/true" />
                            <?php if ($this->_tpl_vars['record']['PresupuestoId']): ?>
                            <br><a title="Ver el formulario del presupuesto" class="Presupuestar" id=<?php echo $this->_tpl_vars['record']['Id']; ?>
 presupuesto="<?php echo $this->_tpl_vars['record']['PresupuestoId']; ?>
"><img src="/images/icons/layout_edit.png" title="Ver presupuesto"/> Ver presupuesto</a>
                            <!-- 
                            <br><a title="Aprobar presupuesto" class="" id=<?php echo $this->_tpl_vars['record']['Id']; ?>
 presupuesto="<?php echo $this->_tpl_vars['record']['PresupuestoId']; ?>
"><img src="/images/icons/error.png" title="Aprobar presupuesto"/> Aprobar presupuesto (hacer)</a>
                             -->
                            <?php else: ?>
                            <br><a title="Ver el formulario para crear un presupuesto" class="Presupuestar" id=<?php echo $this->_tpl_vars['record']['Id']; ?>
 presupuesto="<?php echo $this->_tpl_vars['record']['PresupuestoId']; ?>
"><img src="/images/icons/money.png" title="Presupuestar"/> Presupuestar</a>
                            <?php endif; ?>
                            <br></br>
                        </td>
                    </tr>
                    <!-- /item -->