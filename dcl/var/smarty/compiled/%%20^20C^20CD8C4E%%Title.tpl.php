<?php /* Smarty version 2.6.26, created on 2014-09-19 12:10:33
         compiled from Backend/Orden/ListVentas/Title.tpl */ ?>
            <div class="listTop">
                <div>
                    <table border="0" cellpadding="0" cellspacing="0">
                        <tr>
                            
                            
                            <td width="5%"><p href="/<?php echo $this->_tpl_vars['varController']; ?>
/<?php echo $this->_tpl_vars['varAction']; ?>
/<?php if ($this->_tpl_vars['OrdenEstadoId'] >= 0): ?>EstadoOrdenTrabajoId/<?php echo $this->_tpl_vars['OrdenEstadoId']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['NombreCliente']): ?>NombreCliente/<?php echo $this->_tpl_vars['NombreCliente']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['OrdenDeTrabajoId']): ?>OrdenDeTrabajoId/<?php echo $this->_tpl_vars['OrdenDeTrabajoId']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['SelectedPrioridadId']): ?>PrioridadId/<?php echo $this->_tpl_vars['SelectedPrioridadId']; ?>
/<?php endif; ?>pagesize/<?php echo $this->_tpl_vars['list']['pageSize']; ?>
/page/<?php echo $this->_tpl_vars['list']['page']; ?>
/order/Id_<?php if ($this->_tpl_vars['order'] == 'DESC'): ?>ASC<?php else: ?>DESC<?php endif; ?><?php if ($this->_tpl_vars['search']): ?>/search/<?php echo $this->_tpl_vars['search']; ?>
<?php endif; ?>" class="<?php if ($this->_tpl_vars['orderBy'] == 'Id'): ?><?php if ($this->_tpl_vars['order'] == 'ASC'): ?>orderUp<?php else: ?>orderDown<?php endif; ?><?php else: ?>orderNone<?php endif; ?>" title="Numero">Numero</p></td>
                            
                            <td width="10%"><p href="/<?php echo $this->_tpl_vars['varController']; ?>
/<?php echo $this->_tpl_vars['varAction']; ?>
/<?php if ($this->_tpl_vars['OrdenEstadoId'] >= 0): ?>EstadoOrdenTrabajoId/<?php echo $this->_tpl_vars['OrdenEstadoId']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['NombreCliente']): ?>NombreCliente/<?php echo $this->_tpl_vars['NombreCliente']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['OrdenDeTrabajoId']): ?>OrdenDeTrabajoId/<?php echo $this->_tpl_vars['OrdenDeTrabajoId']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['SelectedPrioridadId']): ?>PrioridadId/<?php echo $this->_tpl_vars['SelectedPrioridadId']; ?>
/<?php endif; ?>pagesize/<?php echo $this->_tpl_vars['list']['pageSize']; ?>
/page/<?php echo $this->_tpl_vars['list']['page']; ?>
/order/Producto_<?php if ($this->_tpl_vars['order'] == 'DESC'): ?>ASC<?php else: ?>DESC<?php endif; ?><?php if ($this->_tpl_vars['search']): ?>/search/<?php echo $this->_tpl_vars['search']; ?>
<?php endif; ?>" class="<?php if ($this->_tpl_vars['orderBy'] == 'Producto'): ?><?php if ($this->_tpl_vars['order'] == 'ASC'): ?>orderUp<?php else: ?>orderDown<?php endif; ?><?php else: ?>orderNone<?php endif; ?>" title="Producto">Producto</p></td>
                            <td width="10%"><p href="/<?php echo $this->_tpl_vars['varController']; ?>
/<?php echo $this->_tpl_vars['varAction']; ?>
/<?php if ($this->_tpl_vars['OrdenEstadoId'] >= 0): ?>EstadoOrdenTrabajoId/<?php echo $this->_tpl_vars['OrdenEstadoId']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['NombreCliente']): ?>NombreCliente/<?php echo $this->_tpl_vars['NombreCliente']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['OrdenDeTrabajoId']): ?>OrdenDeTrabajoId/<?php echo $this->_tpl_vars['OrdenDeTrabajoId']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['SelectedPrioridadId']): ?>PrioridadId/<?php echo $this->_tpl_vars['SelectedPrioridadId']; ?>
/<?php endif; ?>pagesize/<?php echo $this->_tpl_vars['list']['pageSize']; ?>
/page/<?php echo $this->_tpl_vars['list']['page']; ?>
/order/OrdenDeTrabajo.Cliente.Nombre_<?php if ($this->_tpl_vars['order'] == 'DESC'): ?>ASC<?php else: ?>DESC<?php endif; ?><?php if ($this->_tpl_vars['search']): ?>/search/<?php echo $this->_tpl_vars['search']; ?>
<?php endif; ?>" class="<?php if ($this->_tpl_vars['orderBy'] == 'OrdenDeTrabajo.Cliente.Nombre'): ?><?php if ($this->_tpl_vars['order'] == 'ASC'): ?>orderUp<?php else: ?>orderDown<?php endif; ?><?php else: ?>orderNone<?php endif; ?>" title="Nombre cliente">Nombre cliente</p></td>
                            <td width="10%"><p href="/<?php echo $this->_tpl_vars['varController']; ?>
/<?php echo $this->_tpl_vars['varAction']; ?>
/<?php if ($this->_tpl_vars['OrdenEstadoId'] >= 0): ?>EstadoOrdenTrabajoId/<?php echo $this->_tpl_vars['OrdenEstadoId']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['NombreCliente']): ?>NombreCliente/<?php echo $this->_tpl_vars['NombreCliente']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['OrdenDeTrabajoId']): ?>OrdenDeTrabajoId/<?php echo $this->_tpl_vars['OrdenDeTrabajoId']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['SelectedPrioridadId']): ?>PrioridadId/<?php echo $this->_tpl_vars['SelectedPrioridadId']; ?>
/<?php endif; ?>pagesize/<?php echo $this->_tpl_vars['list']['pageSize']; ?>
/page/<?php echo $this->_tpl_vars['list']['page']; ?>
/order/OrdenDeTrabajo.Estado.Nombre_<?php if ($this->_tpl_vars['order'] == 'DESC'): ?>ASC<?php else: ?>DESC<?php endif; ?><?php if ($this->_tpl_vars['search']): ?>/search/<?php echo $this->_tpl_vars['search']; ?>
<?php endif; ?>" class="<?php if ($this->_tpl_vars['orderBy'] == 'OrdenDeTrabajo.Estado.Nombre'): ?><?php if ($this->_tpl_vars['order'] == 'ASC'): ?>orderUp<?php else: ?>orderDown<?php endif; ?><?php else: ?>orderNone<?php endif; ?>" title="Estado">Estado</p></td>
                            
                            <td width="10%"><p href="/<?php echo $this->_tpl_vars['varController']; ?>
/<?php echo $this->_tpl_vars['varAction']; ?>
/<?php if ($this->_tpl_vars['OrdenEstadoId'] >= 0): ?>EstadoOrdenTrabajoId/<?php echo $this->_tpl_vars['OrdenEstadoId']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['NombreCliente']): ?>NombreCliente/<?php echo $this->_tpl_vars['NombreCliente']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['OrdenDeTrabajoId']): ?>OrdenDeTrabajoId/<?php echo $this->_tpl_vars['OrdenDeTrabajoId']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['SelectedPrioridadId']): ?>PrioridadId/<?php echo $this->_tpl_vars['SelectedPrioridadId']; ?>
/<?php endif; ?>pagesize/<?php echo $this->_tpl_vars['list']['pageSize']; ?>
/page/<?php echo $this->_tpl_vars['list']['page']; ?>
/order/DescripcionDeTrabajo_<?php if ($this->_tpl_vars['order'] == 'DESC'): ?>ASC<?php else: ?>DESC<?php endif; ?><?php if ($this->_tpl_vars['search']): ?>/search/<?php echo $this->_tpl_vars['search']; ?>
<?php endif; ?>" class="<?php if ($this->_tpl_vars['orderBy'] == 'DescripcionDeTrabajo'): ?><?php if ($this->_tpl_vars['order'] == 'ASC'): ?>orderUp<?php else: ?>orderDown<?php endif; ?><?php else: ?>orderNone<?php endif; ?>" title="Costo total de insumos elegidos al momento de pasar a Produccion">Costo congelado</p></td>
                            <td width="10%"><p href="/<?php echo $this->_tpl_vars['varController']; ?>
/<?php echo $this->_tpl_vars['varAction']; ?>
/<?php if ($this->_tpl_vars['OrdenEstadoId'] >= 0): ?>EstadoOrdenTrabajoId/<?php echo $this->_tpl_vars['OrdenEstadoId']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['NombreCliente']): ?>NombreCliente/<?php echo $this->_tpl_vars['NombreCliente']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['OrdenDeTrabajoId']): ?>OrdenDeTrabajoId/<?php echo $this->_tpl_vars['OrdenDeTrabajoId']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['SelectedPrioridadId']): ?>PrioridadId/<?php echo $this->_tpl_vars['SelectedPrioridadId']; ?>
/<?php endif; ?>pagesize/<?php echo $this->_tpl_vars['list']['pageSize']; ?>
/page/<?php echo $this->_tpl_vars['list']['page']; ?>
/order/DescripcionDeTrabajo_<?php if ($this->_tpl_vars['order'] == 'DESC'): ?>ASC<?php else: ?>DESC<?php endif; ?><?php if ($this->_tpl_vars['search']): ?>/search/<?php echo $this->_tpl_vars['search']; ?>
<?php endif; ?>" class="<?php if ($this->_tpl_vars['orderBy'] == 'DescripcionDeTrabajo'): ?><?php if ($this->_tpl_vars['order'] == 'ASC'): ?>orderUp<?php else: ?>orderDown<?php endif; ?><?php else: ?>orderNone<?php endif; ?>" title="Costo total de insumos elegidos que tienen orden de compra (si una OC es anulada, el insumo pasa a estar no elegido)">Costo total</p></td>
                            <td width="10%"><p href="/<?php echo $this->_tpl_vars['varController']; ?>
/<?php echo $this->_tpl_vars['varAction']; ?>
/<?php if ($this->_tpl_vars['OrdenEstadoId'] >= 0): ?>EstadoOrdenTrabajoId/<?php echo $this->_tpl_vars['OrdenEstadoId']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['NombreCliente']): ?>NombreCliente/<?php echo $this->_tpl_vars['NombreCliente']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['OrdenDeTrabajoId']): ?>OrdenDeTrabajoId/<?php echo $this->_tpl_vars['OrdenDeTrabajoId']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['SelectedPrioridadId']): ?>PrioridadId/<?php echo $this->_tpl_vars['SelectedPrioridadId']; ?>
/<?php endif; ?>pagesize/<?php echo $this->_tpl_vars['list']['pageSize']; ?>
/page/<?php echo $this->_tpl_vars['list']['page']; ?>
/order/DescripcionDeTrabajo_<?php if ($this->_tpl_vars['order'] == 'DESC'): ?>ASC<?php else: ?>DESC<?php endif; ?><?php if ($this->_tpl_vars['search']): ?>/search/<?php echo $this->_tpl_vars['search']; ?>
<?php endif; ?>" class="<?php if ($this->_tpl_vars['orderBy'] == 'DescripcionDeTrabajo'): ?><?php if ($this->_tpl_vars['order'] == 'ASC'): ?>orderUp<?php else: ?>orderDown<?php endif; ?><?php else: ?>orderNone<?php endif; ?>" title="Diferencia entre costo total y costo congelado">Diferencia</p></td>
                            <td width="10%"><p href="/<?php echo $this->_tpl_vars['varController']; ?>
/<?php echo $this->_tpl_vars['varAction']; ?>
/<?php if ($this->_tpl_vars['OrdenEstadoId'] >= 0): ?>EstadoOrdenTrabajoId/<?php echo $this->_tpl_vars['OrdenEstadoId']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['NombreCliente']): ?>NombreCliente/<?php echo $this->_tpl_vars['NombreCliente']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['OrdenDeTrabajoId']): ?>OrdenDeTrabajoId/<?php echo $this->_tpl_vars['OrdenDeTrabajoId']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['SelectedPrioridadId']): ?>PrioridadId/<?php echo $this->_tpl_vars['SelectedPrioridadId']; ?>
/<?php endif; ?>pagesize/<?php echo $this->_tpl_vars['list']['pageSize']; ?>
/page/<?php echo $this->_tpl_vars['list']['page']; ?>
/order/DescripcionDeTrabajo_<?php if ($this->_tpl_vars['order'] == 'DESC'): ?>ASC<?php else: ?>DESC<?php endif; ?><?php if ($this->_tpl_vars['search']): ?>/search/<?php echo $this->_tpl_vars['search']; ?>
<?php endif; ?>" class="<?php if ($this->_tpl_vars['orderBy'] == 'DescripcionDeTrabajo'): ?><?php if ($this->_tpl_vars['order'] == 'ASC'): ?>orderUp<?php else: ?>orderDown<?php endif; ?><?php else: ?>orderNone<?php endif; ?>" title="Precio de venta sin IVA de la orden">Precio venta</p></td>
                            <td width="10%"><p href="/<?php echo $this->_tpl_vars['varController']; ?>
/<?php echo $this->_tpl_vars['varAction']; ?>
/<?php if ($this->_tpl_vars['OrdenEstadoId'] >= 0): ?>EstadoOrdenTrabajoId/<?php echo $this->_tpl_vars['OrdenEstadoId']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['NombreCliente']): ?>NombreCliente/<?php echo $this->_tpl_vars['NombreCliente']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['OrdenDeTrabajoId']): ?>OrdenDeTrabajoId/<?php echo $this->_tpl_vars['OrdenDeTrabajoId']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['SelectedPrioridadId']): ?>PrioridadId/<?php echo $this->_tpl_vars['SelectedPrioridadId']; ?>
/<?php endif; ?>pagesize/<?php echo $this->_tpl_vars['list']['pageSize']; ?>
/page/<?php echo $this->_tpl_vars['list']['page']; ?>
/order/DescripcionDeTrabajo_<?php if ($this->_tpl_vars['order'] == 'DESC'): ?>ASC<?php else: ?>DESC<?php endif; ?><?php if ($this->_tpl_vars['search']): ?>/search/<?php echo $this->_tpl_vars['search']; ?>
<?php endif; ?>" class="<?php if ($this->_tpl_vars['orderBy'] == 'DescripcionDeTrabajo'): ?><?php if ($this->_tpl_vars['order'] == 'ASC'): ?>orderUp<?php else: ?>orderDown<?php endif; ?><?php else: ?>orderNone<?php endif; ?>" title="Ganancia de la orden: precio de venta menos la sumatoria de insumos elegidos">Ganancia</p></td>
                            <td width="10%"><p href="/<?php echo $this->_tpl_vars['varController']; ?>
/<?php echo $this->_tpl_vars['varAction']; ?>
/<?php if ($this->_tpl_vars['OrdenEstadoId'] >= 0): ?>EstadoOrdenTrabajoId/<?php echo $this->_tpl_vars['OrdenEstadoId']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['NombreCliente']): ?>NombreCliente/<?php echo $this->_tpl_vars['NombreCliente']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['OrdenDeTrabajoId']): ?>OrdenDeTrabajoId/<?php echo $this->_tpl_vars['OrdenDeTrabajoId']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['SelectedPrioridadId']): ?>PrioridadId/<?php echo $this->_tpl_vars['SelectedPrioridadId']; ?>
/<?php endif; ?>pagesize/<?php echo $this->_tpl_vars['list']['pageSize']; ?>
/page/<?php echo $this->_tpl_vars['list']['page']; ?>
/order/DescripcionDeTrabajo_<?php if ($this->_tpl_vars['order'] == 'DESC'): ?>ASC<?php else: ?>DESC<?php endif; ?><?php if ($this->_tpl_vars['search']): ?>/search/<?php echo $this->_tpl_vars['search']; ?>
<?php endif; ?>" class="<?php if ($this->_tpl_vars['orderBy'] == 'DescripcionDeTrabajo'): ?><?php if ($this->_tpl_vars['order'] == 'ASC'): ?>orderUp<?php else: ?>orderDown<?php endif; ?><?php else: ?>orderNone<?php endif; ?>" title="Numero de factura">Factura</p></td>
                              
                            
                            <td width="6%"><p>Opciones</p></td>
                        </tr>
                    </table>
                </div>
            </div> <!-- /listadoTop -->