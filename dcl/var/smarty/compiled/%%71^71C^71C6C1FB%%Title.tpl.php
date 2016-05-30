<?php /* Smarty version 2.6.26, created on 2014-09-16 11:29:37
         compiled from Backend/Insumo/Title.tpl */ ?>

            <div class="listTop">
                <div>
                    <table border="0" cellpadding="0" cellspacing="0">
                        <tr>
                            
                            <td width="15%"><p href="/<?php echo $this->_tpl_vars['varController']; ?>
/<?php echo $this->_tpl_vars['varAction']; ?>
/<?php if ($this->_tpl_vars['Pagado']): ?>Pagado/<?php echo $this->_tpl_vars['Pagado']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['EstadoId'] >= 0): ?>EstadoOrdenTrabajoId/<?php echo $this->_tpl_vars['EstadoId']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['NombreProveedor']): ?>NombreProveedor/<?php echo $this->_tpl_vars['NombreProveedor']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['OrdenDeCompraId']): ?>OrdenDeCompraId/<?php echo $this->_tpl_vars['OrdenDeCompraId']; ?>
/<?php endif; ?>pagesize/<?php echo $this->_tpl_vars['list']['pageSize']; ?>
/page/<?php echo $this->_tpl_vars['list']['page']; ?>
/order/Nombre_<?php if ($this->_tpl_vars['order'] == 'DESC'): ?>ASC<?php else: ?>DESC<?php endif; ?><?php if ($this->_tpl_vars['search']): ?>/search/<?php echo $this->_tpl_vars['search']; ?>
<?php endif; ?>" class="<?php if ($this->_tpl_vars['orderBy'] == 'Nombre'): ?><?php if ($this->_tpl_vars['order'] == 'ASC'): ?>orderUp<?php else: ?>orderDown<?php endif; ?><?php else: ?>orderNone<?php endif; ?>" title="Nombre del insumo de la orden de compra">Nombre</p></td>
                            <td width="10%"><p title="Total">Importe</p></td>
                            <td width="10%"><p title="Condicion de pago">Condicion</p></td>
                            <td width="10%"><p href="/<?php echo $this->_tpl_vars['varController']; ?>
/<?php echo $this->_tpl_vars['varAction']; ?>
/<?php if ($this->_tpl_vars['Pagado']): ?>Pagado/<?php echo $this->_tpl_vars['Pagado']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['EstadoId'] >= 0): ?>EstadoOrdenTrabajoId/<?php echo $this->_tpl_vars['EstadoId']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['NombreProveedor']): ?>NombreProveedor/<?php echo $this->_tpl_vars['NombreProveedor']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['OrdenDeCompraId']): ?>OrdenDeCompraId/<?php echo $this->_tpl_vars['OrdenDeCompraId']; ?>
/<?php endif; ?>pagesize/<?php echo $this->_tpl_vars['list']['pageSize']; ?>
/page/<?php echo $this->_tpl_vars['list']['page']; ?>
/order/i.Proveedor.Nombre_<?php if ($this->_tpl_vars['order'] == 'DESC'): ?>ASC<?php else: ?>DESC<?php endif; ?><?php if ($this->_tpl_vars['search']): ?>/search/<?php echo $this->_tpl_vars['search']; ?>
<?php endif; ?>" class="<?php if ($this->_tpl_vars['orderBy'] == 'i.Proveedor.Nombre'): ?><?php if ($this->_tpl_vars['order'] == 'ASC'): ?>orderUp<?php else: ?>orderDown<?php endif; ?><?php else: ?>orderNone<?php endif; ?>" title="Proveedor">Proveedor</p></td>
                            
                            <td width="10%"><p href="/<?php echo $this->_tpl_vars['varController']; ?>
/<?php echo $this->_tpl_vars['varAction']; ?>
/<?php if ($this->_tpl_vars['Pagado']): ?>Pagado/<?php echo $this->_tpl_vars['Pagado']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['EstadoId'] >= 0): ?>EstadoOrdenTrabajoId/<?php echo $this->_tpl_vars['EstadoId']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['NombreProveedor']): ?>NombreProveedor/<?php echo $this->_tpl_vars['NombreProveedor']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['OrdenDeCompraId']): ?>OrdenDeCompraId/<?php echo $this->_tpl_vars['OrdenDeCompraId']; ?>
/<?php endif; ?>pagesize/<?php echo $this->_tpl_vars['list']['pageSize']; ?>
/page/<?php echo $this->_tpl_vars['list']['page']; ?>
/order/OrdenId_<?php if ($this->_tpl_vars['order'] == 'DESC'): ?>ASC<?php else: ?>DESC<?php endif; ?><?php if ($this->_tpl_vars['search']): ?>/search/<?php echo $this->_tpl_vars['search']; ?>
<?php endif; ?>" class="<?php if ($this->_tpl_vars['orderBy'] == 'OrdenId'): ?><?php if ($this->_tpl_vars['order'] == 'ASC'): ?>orderUp<?php else: ?>orderDown<?php endif; ?><?php else: ?>orderNone<?php endif; ?>" title="Orden de trabajo">O.T.</p></td>
                            
                            <td width="10%"><p href="/<?php echo $this->_tpl_vars['varController']; ?>
/<?php echo $this->_tpl_vars['varAction']; ?>
/<?php if ($this->_tpl_vars['Pagado']): ?>Pagado/<?php echo $this->_tpl_vars['Pagado']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['EstadoId'] >= 0): ?>EstadoOrdenTrabajoId/<?php echo $this->_tpl_vars['EstadoId']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['NombreProveedor']): ?>NombreProveedor/<?php echo $this->_tpl_vars['NombreProveedor']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['OrdenDeCompraId']): ?>OrdenDeCompraId/<?php echo $this->_tpl_vars['OrdenDeCompraId']; ?>
/<?php endif; ?>pagesize/<?php echo $this->_tpl_vars['list']['pageSize']; ?>
/page/<?php echo $this->_tpl_vars['list']['page']; ?>
/order/i.Orden.Cliente.Nombre_<?php if ($this->_tpl_vars['order'] == 'DESC'): ?>ASC<?php else: ?>DESC<?php endif; ?><?php if ($this->_tpl_vars['search']): ?>/search/<?php echo $this->_tpl_vars['search']; ?>
<?php endif; ?>" class="<?php if ($this->_tpl_vars['orderBy'] == 'i.Orden.Cliente.Nombre'): ?><?php if ($this->_tpl_vars['order'] == 'ASC'): ?>orderUp<?php else: ?>orderDown<?php endif; ?><?php else: ?>orderNone<?php endif; ?>" title="Cliente">Cliente</p></td>
                              
                            <td width="10%"><p>Acciones</p></td>
                            
                        </tr>
                    </table>
                </div>
            </div> <!-- /listadoTop -->