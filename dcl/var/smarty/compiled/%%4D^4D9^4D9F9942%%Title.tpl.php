<?php /* Smarty version 2.6.26, created on 2014-09-16 16:35:42
         compiled from Backend/Insumo/ListEntregasProduccion/Title.tpl */ ?>

            <div class="listTop">
                <div>
                    <table border="0" cellpadding="0" cellspacing="0">
                        <tr>
                            <!--<td width="2%"><input type="checkbox" class="check" id="check_all" /></td>-->
                            
                            <td width="5%"><p href="/<?php echo $this->_tpl_vars['varController']; ?>
/<?php echo $this->_tpl_vars['varAction']; ?>
/<?php if ($this->_tpl_vars['Pagado']): ?>Pagado/<?php echo $this->_tpl_vars['Pagado']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['EstadoId'] >= 0): ?>EstadoOrdenTrabajoId/<?php echo $this->_tpl_vars['EstadoId']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['NombreProveedor']): ?>NombreProveedor/<?php echo $this->_tpl_vars['NombreProveedor']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['OrdenDeCompraId']): ?>OrdenDeCompraId/<?php echo $this->_tpl_vars['OrdenDeCompraId']; ?>
/<?php endif; ?>pagesize/<?php echo $this->_tpl_vars['list']['pageSize']; ?>
/page/<?php echo $this->_tpl_vars['list']['page']; ?>
/order/Insumo.Orden.Id_<?php if ($this->_tpl_vars['order'] == 'DESC'): ?>ASC<?php else: ?>DESC<?php endif; ?><?php if ($this->_tpl_vars['search']): ?>/search/<?php echo $this->_tpl_vars['search']; ?>
<?php endif; ?>" class="<?php if ($this->_tpl_vars['orderBy'] == 'Insumo.Orden.Id'): ?><?php if ($this->_tpl_vars['order'] == 'ASC'): ?>orderUp<?php else: ?>orderDown<?php endif; ?><?php else: ?>orderNone<?php endif; ?>" title="Orden de trabajo">Orden</p></td>
                            <td width="10%"><p href="/<?php echo $this->_tpl_vars['varController']; ?>
/<?php echo $this->_tpl_vars['varAction']; ?>
/<?php if ($this->_tpl_vars['Pagado']): ?>Pagado/<?php echo $this->_tpl_vars['Pagado']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['EstadoId'] >= 0): ?>EstadoOrdenTrabajoId/<?php echo $this->_tpl_vars['EstadoId']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['NombreProveedor']): ?>NombreProveedor/<?php echo $this->_tpl_vars['NombreProveedor']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['OrdenDeCompraId']): ?>OrdenDeCompraId/<?php echo $this->_tpl_vars['OrdenDeCompraId']; ?>
/<?php endif; ?>pagesize/<?php echo $this->_tpl_vars['list']['pageSize']; ?>
/page/<?php echo $this->_tpl_vars['list']['page']; ?>
/order/Nombre_<?php if ($this->_tpl_vars['order'] == 'DESC'): ?>ASC<?php else: ?>DESC<?php endif; ?><?php if ($this->_tpl_vars['search']): ?>/search/<?php echo $this->_tpl_vars['search']; ?>
<?php endif; ?>" class="<?php if ($this->_tpl_vars['orderBy'] == 'Nombre'): ?><?php if ($this->_tpl_vars['order'] == 'ASC'): ?>orderUp<?php else: ?>orderDown<?php endif; ?><?php else: ?>orderNone<?php endif; ?>" title="Nombre">Nombre</p></td>
                            <td width="10%"><p href="/<?php echo $this->_tpl_vars['varController']; ?>
/<?php echo $this->_tpl_vars['varAction']; ?>
/<?php if ($this->_tpl_vars['Pagado']): ?>Pagado/<?php echo $this->_tpl_vars['Pagado']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['EstadoId'] >= 0): ?>EstadoOrdenTrabajoId/<?php echo $this->_tpl_vars['EstadoId']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['NombreProveedor']): ?>NombreProveedor/<?php echo $this->_tpl_vars['NombreProveedor']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['OrdenDeCompraId']): ?>OrdenDeCompraId/<?php echo $this->_tpl_vars['OrdenDeCompraId']; ?>
/<?php endif; ?>pagesize/<?php echo $this->_tpl_vars['list']['pageSize']; ?>
/page/<?php echo $this->_tpl_vars['list']['page']; ?>
/order/Insumo.Proveedor.Nombre_<?php if ($this->_tpl_vars['order'] == 'DESC'): ?>ASC<?php else: ?>DESC<?php endif; ?><?php if ($this->_tpl_vars['search']): ?>/search/<?php echo $this->_tpl_vars['search']; ?>
<?php endif; ?>" class="<?php if ($this->_tpl_vars['orderBy'] == 'Insumo.Proveedor.Nombre'): ?><?php if ($this->_tpl_vars['order'] == 'ASC'): ?>orderUp<?php else: ?>orderDown<?php endif; ?><?php else: ?>orderNone<?php endif; ?>" title="Proveedor">Proveedor</p></td>
                            
                            <td width="8%"><p href="/<?php echo $this->_tpl_vars['varController']; ?>
/<?php echo $this->_tpl_vars['varAction']; ?>
/<?php if ($this->_tpl_vars['Pagado']): ?>Pagado/<?php echo $this->_tpl_vars['Pagado']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['EstadoId'] >= 0): ?>EstadoOrdenTrabajoId/<?php echo $this->_tpl_vars['EstadoId']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['NombreProveedor']): ?>NombreProveedor/<?php echo $this->_tpl_vars['NombreProveedor']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['OrdenDeCompraId']): ?>OrdenDeCompraId/<?php echo $this->_tpl_vars['OrdenDeCompraId']; ?>
/<?php endif; ?>pagesize/<?php echo $this->_tpl_vars['list']['pageSize']; ?>
/page/<?php echo $this->_tpl_vars['list']['page']; ?>
/order/Insumo.Orden.Estado.Nombre_<?php if ($this->_tpl_vars['order'] == 'DESC'): ?>ASC<?php else: ?>DESC<?php endif; ?><?php if ($this->_tpl_vars['search']): ?>/search/<?php echo $this->_tpl_vars['search']; ?>
<?php endif; ?>" class="<?php if ($this->_tpl_vars['orderBy'] == 'Insumo.Orden.Estado.Nombre'): ?><?php if ($this->_tpl_vars['order'] == 'ASC'): ?>orderUp<?php else: ?>orderDown<?php endif; ?><?php else: ?>orderNone<?php endif; ?>" title="Estado de orden">Estado</p></td>
                            <td width="10%"><p href="/<?php echo $this->_tpl_vars['varController']; ?>
/<?php echo $this->_tpl_vars['varAction']; ?>
/<?php if ($this->_tpl_vars['Pagado']): ?>Pagado/<?php echo $this->_tpl_vars['Pagado']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['EstadoId'] >= 0): ?>EstadoOrdenTrabajoId/<?php echo $this->_tpl_vars['EstadoId']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['NombreProveedor']): ?>NombreProveedor/<?php echo $this->_tpl_vars['NombreProveedor']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['OrdenDeCompraId']): ?>OrdenDeCompraId/<?php echo $this->_tpl_vars['OrdenDeCompraId']; ?>
/<?php endif; ?>pagesize/<?php echo $this->_tpl_vars['list']['pageSize']; ?>
/page/<?php echo $this->_tpl_vars['list']['page']; ?>
/order/Insumo.Orden.Cliente.Nombre_<?php if ($this->_tpl_vars['order'] == 'DESC'): ?>ASC<?php else: ?>DESC<?php endif; ?><?php if ($this->_tpl_vars['search']): ?>/search/<?php echo $this->_tpl_vars['search']; ?>
<?php endif; ?>" class="<?php if ($this->_tpl_vars['orderBy'] == 'Insumo.Orden.Cliente.Nombre'): ?><?php if ($this->_tpl_vars['order'] == 'ASC'): ?>orderUp<?php else: ?>orderDown<?php endif; ?><?php else: ?>orderNone<?php endif; ?>" title="Cliente">Cliente</p></td>
                            
                            <td width="8%"><p href="/<?php echo $this->_tpl_vars['varController']; ?>
/<?php echo $this->_tpl_vars['varAction']; ?>
/<?php if ($this->_tpl_vars['Pagado']): ?>Pagado/<?php echo $this->_tpl_vars['Pagado']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['EstadoId'] >= 0): ?>EstadoOrdenTrabajoId/<?php echo $this->_tpl_vars['EstadoId']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['NombreProveedor']): ?>NombreProveedor/<?php echo $this->_tpl_vars['NombreProveedor']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['OrdenDeCompraId']): ?>OrdenDeCompraId/<?php echo $this->_tpl_vars['OrdenDeCompraId']; ?>
/<?php endif; ?>pagesize/<?php echo $this->_tpl_vars['list']['pageSize']; ?>
/page/<?php echo $this->_tpl_vars['list']['page']; ?>
/order/Insumo.OrdenDeCompra.Fecha_<?php if ($this->_tpl_vars['order'] == 'DESC'): ?>ASC<?php else: ?>DESC<?php endif; ?><?php if ($this->_tpl_vars['search']): ?>/search/<?php echo $this->_tpl_vars['search']; ?>
<?php endif; ?>" class="<?php if ($this->_tpl_vars['orderBy'] == 'Insumo.OrdenDeCompra.Fecha'): ?><?php if ($this->_tpl_vars['order'] == 'ASC'): ?>orderUp<?php else: ?>orderDown<?php endif; ?><?php else: ?>orderNone<?php endif; ?>" title="Fecha Orden de compra">Dias restantes</p></td>
                            
                            <td width="8%"><p href="/<?php echo $this->_tpl_vars['varController']; ?>
/<?php echo $this->_tpl_vars['varAction']; ?>
/<?php if ($this->_tpl_vars['OrdenEstadoId'] >= 0): ?>EstadoOrdenTrabajoId/<?php echo $this->_tpl_vars['OrdenEstadoId']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['NombreCliente']): ?>NombreCliente/<?php echo $this->_tpl_vars['NombreCliente']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['OrdenDeTrabajoId']): ?>OrdenDeTrabajoId/<?php echo $this->_tpl_vars['OrdenDeTrabajoId']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['SelectedPrioridadId']): ?>PrioridadId/<?php echo $this->_tpl_vars['SelectedPrioridadId']; ?>
/<?php endif; ?>pagesize/<?php echo $this->_tpl_vars['list']['pageSize']; ?>
/page/<?php echo $this->_tpl_vars['list']['page']; ?>
/order/o.Estado.Nombre_<?php if ($this->_tpl_vars['order'] == 'DESC'): ?>ASC<?php else: ?>DESC<?php endif; ?><?php if ($this->_tpl_vars['search']): ?>/search/<?php echo $this->_tpl_vars['search']; ?>
<?php endif; ?>" class="<?php if ($this->_tpl_vars['orderBy'] == 'o.Estado.Nombre'): ?><?php if ($this->_tpl_vars['order'] == 'ASC'): ?>orderUp<?php else: ?>orderDown<?php endif; ?><?php else: ?>orderNone<?php endif; ?>" title="Dias para finalizar proyecto y entregar al cliente">Finalizacion</p></td>
                            
                            <td width="10%"><p title="Total s/IVA">Total s/IVA</p></td>
                              
                            <td width="10%"><p>Acciones</p></td>
                            
                        </tr>
                    </table>
                </div>
            </div> <!-- /listadoTop -->