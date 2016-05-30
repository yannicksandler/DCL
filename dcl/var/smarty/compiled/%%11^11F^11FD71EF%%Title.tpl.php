<?php /* Smarty version 2.6.26, created on 2014-09-02 10:05:45
         compiled from Backend/Cheque/Title.tpl */ ?>
            <div class="listTop">
                <div>
                    <table border="0" cellpadding="0" cellspacing="0">
                        <tr>
                        <!-- 
                            <td width="2%"><input type="checkbox" class="check" id="check_all" /></td>
                             -->
                            
                            <td width="10%"><a href="/<?php echo $this->_tpl_vars['varController']; ?>
/<?php echo $this->_tpl_vars['varAction']; ?>
/<?php if ($this->_tpl_vars['Nombre']): ?>Nombre/<?php echo $this->_tpl_vars['Nombre']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['filters']['NombreProveedor'] && $this->_tpl_vars['filters']['NombreProveedor'] != 'Nombre proveedor'): ?>NombreProveedor/<?php echo $this->_tpl_vars['filters']['NombreProveedor']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['filters']['Numero'] && $this->_tpl_vars['filters']['Numero'] != 'Numero'): ?>Numero/<?php echo $this->_tpl_vars['filters']['Numero']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['filters']['Estado']): ?>Estado/<?php echo $this->_tpl_vars['filters']['Estado']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['filters']['FechaDesde'] && $this->_tpl_vars['filters']['FechaDesde'] != 'Fecha cobro desde'): ?>FechaDesde/<?php echo $this->_tpl_vars['filters']['FechaDesde']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['filters']['FechaHasta'] && $this->_tpl_vars['filters']['FechaHasta'] != 'Fecha cobro hasta'): ?>FechaHasta/<?php echo $this->_tpl_vars['filters']['FechaHasta']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['filters']['NombreCliente'] && $this->_tpl_vars['filters']['NombreCliente'] != 'Nombre cliente'): ?>NombreCliente/<?php echo $this->_tpl_vars['filters']['NombreCliente']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['Codigo']): ?>Codigo/<?php echo $this->_tpl_vars['Codigo']; ?>
/<?php endif; ?>pagesize/<?php echo $this->_tpl_vars['list']['pageSize']; ?>
/page/<?php echo $this->_tpl_vars['list']['page']; ?>
/order/Numero_<?php if ($this->_tpl_vars['order'] == 'DESC'): ?>ASC<?php else: ?>DESC<?php endif; ?><?php if ($this->_tpl_vars['search']): ?>/search/<?php echo $this->_tpl_vars['search']; ?>
<?php endif; ?>" class="<?php if ($this->_tpl_vars['orderBy'] == 'Numero'): ?><?php if ($this->_tpl_vars['order'] == 'ASC'): ?>orderUp<?php else: ?>orderDown<?php endif; ?><?php else: ?>orderNone<?php endif; ?>" title="Nombre">Banco</a></td>
                            
                            <td width="10%"><a href="/<?php echo $this->_tpl_vars['varController']; ?>
/<?php echo $this->_tpl_vars['varAction']; ?>
/<?php if ($this->_tpl_vars['Nombre']): ?>Nombre/<?php echo $this->_tpl_vars['Nombre']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['filters']['NombreProveedor'] && $this->_tpl_vars['filters']['NombreProveedor'] != 'Nombre proveedor'): ?>NombreProveedor/<?php echo $this->_tpl_vars['filters']['NombreProveedor']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['filters']['Numero'] && $this->_tpl_vars['filters']['Numero'] != 'Numero'): ?>Numero/<?php echo $this->_tpl_vars['filters']['Numero']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['filters']['Estado']): ?>Estado/<?php echo $this->_tpl_vars['filters']['Estado']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['filters']['FechaDesde'] && $this->_tpl_vars['filters']['FechaDesde'] != 'Fecha cobro desde'): ?>FechaDesde/<?php echo $this->_tpl_vars['filters']['FechaDesde']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['filters']['FechaHasta'] && $this->_tpl_vars['filters']['FechaHasta'] != 'Fecha cobro hasta'): ?>FechaHasta/<?php echo $this->_tpl_vars['filters']['FechaHasta']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['filters']['NombreCliente'] && $this->_tpl_vars['filters']['NombreCliente'] != 'Nombre cliente'): ?>NombreCliente/<?php echo $this->_tpl_vars['filters']['NombreCliente']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['Codigo']): ?>Codigo/<?php echo $this->_tpl_vars['Codigo']; ?>
/<?php endif; ?>pagesize/<?php echo $this->_tpl_vars['list']['pageSize']; ?>
/page/<?php echo $this->_tpl_vars['list']['page']; ?>
/order/Numero_<?php if ($this->_tpl_vars['order'] == 'DESC'): ?>ASC<?php else: ?>DESC<?php endif; ?><?php if ($this->_tpl_vars['search']): ?>/search/<?php echo $this->_tpl_vars['search']; ?>
<?php endif; ?>" class="<?php if ($this->_tpl_vars['orderBy'] == 'Numero'): ?><?php if ($this->_tpl_vars['order'] == 'ASC'): ?>orderUp<?php else: ?>orderDown<?php endif; ?><?php else: ?>orderNone<?php endif; ?>" title="Numero">Numero</a></td>
                            
                            <td width="10%"><a href="/<?php echo $this->_tpl_vars['varController']; ?>
/<?php echo $this->_tpl_vars['varAction']; ?>
/<?php if ($this->_tpl_vars['Nombre']): ?>Nombre/<?php echo $this->_tpl_vars['Nombre']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['filters']['NombreProveedor'] && $this->_tpl_vars['filters']['NombreProveedor'] != 'Nombre proveedor'): ?>NombreProveedor/<?php echo $this->_tpl_vars['filters']['NombreProveedor']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['filters']['Numero'] && $this->_tpl_vars['filters']['Numero'] != 'Numero'): ?>Numero/<?php echo $this->_tpl_vars['filters']['Numero']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['filters']['Estado']): ?>Estado/<?php echo $this->_tpl_vars['filters']['Estado']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['filters']['FechaDesde'] && $this->_tpl_vars['filters']['FechaDesde'] != 'Fecha cobro desde'): ?>FechaDesde/<?php echo $this->_tpl_vars['filters']['FechaDesde']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['filters']['FechaHasta'] && $this->_tpl_vars['filters']['FechaHasta'] != 'Fecha cobro hasta'): ?>FechaHasta/<?php echo $this->_tpl_vars['filters']['FechaHasta']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['filters']['NombreCliente'] && $this->_tpl_vars['filters']['NombreCliente'] != 'Nombre cliente'): ?>NombreCliente/<?php echo $this->_tpl_vars['filters']['NombreCliente']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['Codigo']): ?>Codigo/<?php echo $this->_tpl_vars['Codigo']; ?>
/<?php endif; ?>pagesize/<?php echo $this->_tpl_vars['list']['pageSize']; ?>
/page/<?php echo $this->_tpl_vars['list']['page']; ?>
/order/Importe_<?php if ($this->_tpl_vars['order'] == 'DESC'): ?>ASC<?php else: ?>DESC<?php endif; ?><?php if ($this->_tpl_vars['search']): ?>/search/<?php echo $this->_tpl_vars['search']; ?>
<?php endif; ?>" class="<?php if ($this->_tpl_vars['orderBy'] == 'Importe'): ?><?php if ($this->_tpl_vars['order'] == 'ASC'): ?>orderUp<?php else: ?>orderDown<?php endif; ?><?php else: ?>orderNone<?php endif; ?>" title="Indica el estado">Importe</a></td>
                            
                            <td width="10%"><a href="/<?php echo $this->_tpl_vars['varController']; ?>
/<?php echo $this->_tpl_vars['varAction']; ?>
/<?php if ($this->_tpl_vars['Nombre']): ?>Nombre/<?php echo $this->_tpl_vars['Nombre']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['filters']['NombreProveedor'] && $this->_tpl_vars['filters']['NombreProveedor'] != 'Nombre proveedor'): ?>NombreProveedor/<?php echo $this->_tpl_vars['filters']['NombreProveedor']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['filters']['Numero'] && $this->_tpl_vars['filters']['Numero'] != 'Numero'): ?>Numero/<?php echo $this->_tpl_vars['filters']['Numero']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['filters']['Estado']): ?>Estado/<?php echo $this->_tpl_vars['filters']['Estado']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['filters']['FechaDesde'] && $this->_tpl_vars['filters']['FechaDesde'] != 'Fecha cobro desde'): ?>FechaDesde/<?php echo $this->_tpl_vars['filters']['FechaDesde']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['filters']['FechaHasta'] && $this->_tpl_vars['filters']['FechaHasta'] != 'Fecha cobro hasta'): ?>FechaHasta/<?php echo $this->_tpl_vars['filters']['FechaHasta']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['filters']['NombreCliente'] && $this->_tpl_vars['filters']['NombreCliente'] != 'Nombre cliente'): ?>NombreCliente/<?php echo $this->_tpl_vars['filters']['NombreCliente']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['Codigo']): ?>Codigo/<?php echo $this->_tpl_vars['Codigo']; ?>
/<?php endif; ?>pagesize/<?php echo $this->_tpl_vars['list']['pageSize']; ?>
/page/<?php echo $this->_tpl_vars['list']['page']; ?>
/order/Estado_<?php if ($this->_tpl_vars['order'] == 'DESC'): ?>ASC<?php else: ?>DESC<?php endif; ?><?php if ($this->_tpl_vars['search']): ?>/search/<?php echo $this->_tpl_vars['search']; ?>
<?php endif; ?>" class="<?php if ($this->_tpl_vars['orderBy'] == 'Estado'): ?><?php if ($this->_tpl_vars['order'] == 'ASC'): ?>orderUp<?php else: ?>orderDown<?php endif; ?><?php else: ?>orderNone<?php endif; ?>" title="Indica el estado">Estado</a></td>
                            
                            <td width="10%"><a href="/<?php echo $this->_tpl_vars['varController']; ?>
/<?php echo $this->_tpl_vars['varAction']; ?>
/<?php if ($this->_tpl_vars['Nombre']): ?>Nombre/<?php echo $this->_tpl_vars['Nombre']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['filters']['NombreProveedor'] && $this->_tpl_vars['filters']['NombreProveedor'] != 'Nombre proveedor'): ?>NombreProveedor/<?php echo $this->_tpl_vars['filters']['NombreProveedor']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['filters']['Numero'] && $this->_tpl_vars['filters']['Numero'] != 'Numero'): ?>Numero/<?php echo $this->_tpl_vars['filters']['Numero']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['filters']['Estado']): ?>Estado/<?php echo $this->_tpl_vars['filters']['Estado']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['filters']['FechaDesde'] && $this->_tpl_vars['filters']['FechaDesde'] != 'Fecha cobro desde'): ?>FechaDesde/<?php echo $this->_tpl_vars['filters']['FechaDesde']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['filters']['FechaHasta'] && $this->_tpl_vars['filters']['FechaHasta'] != 'Fecha cobro hasta'): ?>FechaHasta/<?php echo $this->_tpl_vars['filters']['FechaHasta']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['filters']['NombreCliente'] && $this->_tpl_vars['filters']['NombreCliente'] != 'Nombre cliente'): ?>NombreCliente/<?php echo $this->_tpl_vars['filters']['NombreCliente']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['Codigo']): ?>Codigo/<?php echo $this->_tpl_vars['Codigo']; ?>
/<?php endif; ?>pagesize/<?php echo $this->_tpl_vars['list']['pageSize']; ?>
/page/<?php echo $this->_tpl_vars['list']['page']; ?>
/order/FechaEmision_<?php if ($this->_tpl_vars['order'] == 'DESC'): ?>ASC<?php else: ?>DESC<?php endif; ?><?php if ($this->_tpl_vars['search']): ?>/search/<?php echo $this->_tpl_vars['search']; ?>
<?php endif; ?>" class="<?php if ($this->_tpl_vars['orderBy'] == 'FechaEmision'): ?><?php if ($this->_tpl_vars['order'] == 'ASC'): ?>orderUp<?php else: ?>orderDown<?php endif; ?><?php else: ?>orderNone<?php endif; ?>" title="">Emision</a></td>
                            <td width="10%"><a href="/<?php echo $this->_tpl_vars['varController']; ?>
/<?php echo $this->_tpl_vars['varAction']; ?>
/<?php if ($this->_tpl_vars['Nombre']): ?>Nombre/<?php echo $this->_tpl_vars['Nombre']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['filters']['NombreProveedor'] && $this->_tpl_vars['filters']['NombreProveedor'] != 'Nombre proveedor'): ?>NombreProveedor/<?php echo $this->_tpl_vars['filters']['NombreProveedor']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['filters']['Numero'] && $this->_tpl_vars['filters']['Numero'] != 'Numero'): ?>Numero/<?php echo $this->_tpl_vars['filters']['Numero']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['filters']['Estado']): ?>Estado/<?php echo $this->_tpl_vars['filters']['Estado']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['filters']['FechaDesde'] && $this->_tpl_vars['filters']['FechaDesde'] != 'Fecha cobro desde'): ?>FechaDesde/<?php echo $this->_tpl_vars['filters']['FechaDesde']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['filters']['FechaHasta'] && $this->_tpl_vars['filters']['FechaHasta'] != 'Fecha cobro hasta'): ?>FechaHasta/<?php echo $this->_tpl_vars['filters']['FechaHasta']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['filters']['NombreCliente'] && $this->_tpl_vars['filters']['NombreCliente'] != 'Nombre cliente'): ?>NombreCliente/<?php echo $this->_tpl_vars['filters']['NombreCliente']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['Codigo']): ?>Codigo/<?php echo $this->_tpl_vars['Codigo']; ?>
/<?php endif; ?>pagesize/<?php echo $this->_tpl_vars['list']['pageSize']; ?>
/page/<?php echo $this->_tpl_vars['list']['page']; ?>
/order/FechaCobro_<?php if ($this->_tpl_vars['order'] == 'DESC'): ?>ASC<?php else: ?>DESC<?php endif; ?><?php if ($this->_tpl_vars['search']): ?>/search/<?php echo $this->_tpl_vars['search']; ?>
<?php endif; ?>" class="<?php if ($this->_tpl_vars['orderBy'] == 'FechaCobro'): ?><?php if ($this->_tpl_vars['order'] == 'ASC'): ?>orderUp<?php else: ?>orderDown<?php endif; ?><?php else: ?>orderNone<?php endif; ?>" title="">Cobro</a></td>
                            <td width="10%"><a href="/<?php echo $this->_tpl_vars['varController']; ?>
/<?php echo $this->_tpl_vars['varAction']; ?>
/<?php if ($this->_tpl_vars['Nombre']): ?>Nombre/<?php echo $this->_tpl_vars['Nombre']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['filters']['NombreProveedor'] && $this->_tpl_vars['filters']['NombreProveedor'] != 'Nombre proveedor'): ?>NombreProveedor/<?php echo $this->_tpl_vars['filters']['NombreProveedor']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['filters']['Numero'] && $this->_tpl_vars['filters']['Numero'] != 'Numero'): ?>Numero/<?php echo $this->_tpl_vars['filters']['Numero']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['filters']['Estado']): ?>Estado/<?php echo $this->_tpl_vars['filters']['Estado']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['filters']['FechaDesde'] && $this->_tpl_vars['filters']['FechaDesde'] != 'Fecha cobro desde'): ?>FechaDesde/<?php echo $this->_tpl_vars['filters']['FechaDesde']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['filters']['FechaHasta'] && $this->_tpl_vars['filters']['FechaHasta'] != 'Fecha cobro hasta'): ?>FechaHasta/<?php echo $this->_tpl_vars['filters']['FechaHasta']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['filters']['NombreCliente'] && $this->_tpl_vars['filters']['NombreCliente'] != 'Nombre cliente'): ?>NombreCliente/<?php echo $this->_tpl_vars['filters']['NombreCliente']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['Codigo']): ?>Codigo/<?php echo $this->_tpl_vars['Codigo']; ?>
/<?php endif; ?>pagesize/<?php echo $this->_tpl_vars['list']['pageSize']; ?>
/page/<?php echo $this->_tpl_vars['list']['page']; ?>
/order/FechaVencimiento_<?php if ($this->_tpl_vars['order'] == 'DESC'): ?>ASC<?php else: ?>DESC<?php endif; ?><?php if ($this->_tpl_vars['search']): ?>/search/<?php echo $this->_tpl_vars['search']; ?>
<?php endif; ?>" class="<?php if ($this->_tpl_vars['orderBy'] == 'FechaVencimiento'): ?><?php if ($this->_tpl_vars['order'] == 'ASC'): ?>orderUp<?php else: ?>orderDown<?php endif; ?><?php else: ?>orderNone<?php endif; ?>" title="">Vencimiento</a></td>
                            
                            <td width="10%"><a href="/<?php echo $this->_tpl_vars['varController']; ?>
/<?php echo $this->_tpl_vars['varAction']; ?>
/<?php if ($this->_tpl_vars['Nombre']): ?>Nombre/<?php echo $this->_tpl_vars['Nombre']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['filters']['NombreProveedor'] && $this->_tpl_vars['filters']['NombreProveedor'] != 'Nombre proveedor'): ?>NombreProveedor/<?php echo $this->_tpl_vars['filters']['NombreProveedor']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['filters']['Numero'] && $this->_tpl_vars['filters']['Numero'] != 'Numero'): ?>Numero/<?php echo $this->_tpl_vars['filters']['Numero']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['filters']['Estado']): ?>Estado/<?php echo $this->_tpl_vars['filters']['Estado']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['filters']['FechaDesde'] && $this->_tpl_vars['filters']['FechaDesde'] != 'Fecha cobro desde'): ?>FechaDesde/<?php echo $this->_tpl_vars['filters']['FechaDesde']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['filters']['FechaHasta'] && $this->_tpl_vars['filters']['FechaHasta'] != 'Fecha cobro hasta'): ?>FechaHasta/<?php echo $this->_tpl_vars['filters']['FechaHasta']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['filters']['NombreCliente'] && $this->_tpl_vars['filters']['NombreCliente'] != 'Nombre cliente'): ?>NombreCliente/<?php echo $this->_tpl_vars['filters']['NombreCliente']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['Codigo']): ?>Codigo/<?php echo $this->_tpl_vars['Codigo']; ?>
/<?php endif; ?>pagesize/<?php echo $this->_tpl_vars['list']['pageSize']; ?>
/page/<?php echo $this->_tpl_vars['list']['page']; ?>
/order/cl.Nombre_<?php if ($this->_tpl_vars['order'] == 'DESC'): ?>ASC<?php else: ?>DESC<?php endif; ?><?php if ($this->_tpl_vars['search']): ?>/search/<?php echo $this->_tpl_vars['search']; ?>
<?php endif; ?>" class="<?php if ($this->_tpl_vars['orderBy'] == 'cl.Nombre'): ?><?php if ($this->_tpl_vars['order'] == 'ASC'): ?>orderUp<?php else: ?>orderDown<?php endif; ?><?php else: ?>orderNone<?php endif; ?>" title="">Cliente</a></td>
                            <td width="10%"><a href="/<?php echo $this->_tpl_vars['varController']; ?>
/<?php echo $this->_tpl_vars['varAction']; ?>
/<?php if ($this->_tpl_vars['Nombre']): ?>Nombre/<?php echo $this->_tpl_vars['Nombre']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['filters']['NombreProveedor'] && $this->_tpl_vars['filters']['NombreProveedor'] != 'Nombre proveedor'): ?>NombreProveedor/<?php echo $this->_tpl_vars['filters']['NombreProveedor']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['filters']['Numero'] && $this->_tpl_vars['filters']['Numero'] != 'Numero'): ?>Numero/<?php echo $this->_tpl_vars['filters']['Numero']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['filters']['Estado']): ?>Estado/<?php echo $this->_tpl_vars['filters']['Estado']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['filters']['FechaDesde'] && $this->_tpl_vars['filters']['FechaDesde'] != 'Fecha cobro desde'): ?>FechaDesde/<?php echo $this->_tpl_vars['filters']['FechaDesde']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['filters']['FechaHasta'] && $this->_tpl_vars['filters']['FechaHasta'] != 'Fecha cobro hasta'): ?>FechaHasta/<?php echo $this->_tpl_vars['filters']['FechaHasta']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['filters']['NombreCliente'] && $this->_tpl_vars['filters']['NombreCliente'] != 'Nombre cliente'): ?>NombreCliente/<?php echo $this->_tpl_vars['filters']['NombreCliente']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['Codigo']): ?>Codigo/<?php echo $this->_tpl_vars['Codigo']; ?>
/<?php endif; ?>pagesize/<?php echo $this->_tpl_vars['list']['pageSize']; ?>
/page/<?php echo $this->_tpl_vars['list']['page']; ?>
/order/p.Nombre_<?php if ($this->_tpl_vars['order'] == 'DESC'): ?>ASC<?php else: ?>DESC<?php endif; ?><?php if ($this->_tpl_vars['search']): ?>/search/<?php echo $this->_tpl_vars['search']; ?>
<?php endif; ?>" class="<?php if ($this->_tpl_vars['orderBy'] == 'p.Nombre'): ?><?php if ($this->_tpl_vars['order'] == 'ASC'): ?>orderUp<?php else: ?>orderDown<?php endif; ?><?php else: ?>orderNone<?php endif; ?>" title="">Proveedor</a></td>
                            
                            
                            <td width="6%"><p>Acciones</p></td>
                        </tr>
                    </table>
                </div>
            </div> <!-- /listadoTop -->