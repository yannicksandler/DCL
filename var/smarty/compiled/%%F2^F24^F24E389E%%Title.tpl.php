<?php /* Smarty version 2.6.26, created on 2016-05-03 09:13:47
         compiled from Backend/OrdenPago/Title.tpl */ ?>
            <div class="listTop">
                <div>
                    <table border="0" cellpadding="0" cellspacing="0">
                        <tr>
                            
                            
                            
                            <td width="10%"><a href="/<?php echo $this->_tpl_vars['varController']; ?>
/<?php echo $this->_tpl_vars['varAction']; ?>
/<?php if ($this->_tpl_vars['FechaDesde']): ?>FechaDesde/<?php echo $this->_tpl_vars['FechaDesde']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['FechaHasta']): ?>FechaHasta/<?php echo $this->_tpl_vars['FechaHasta']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['Pagado']): ?>Pagado/<?php echo $this->_tpl_vars['Pagado']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['ProveedorId']): ?>ProveedorId/<?php echo $this->_tpl_vars['ProveedorId']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['Tipo']): ?>Tipo/<?php echo $this->_tpl_vars['Tipo']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['OrdenDeCompraId']): ?>OrdenDeCompraId/<?php echo $this->_tpl_vars['OrdenDeCompraId']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['OrdenDePagoId']): ?>OrdenDePagoId/<?php echo $this->_tpl_vars['OrdenDePagoId']; ?>
/<?php endif; ?>pagesize/<?php echo $this->_tpl_vars['list']['pageSize']; ?>
/page/<?php echo $this->_tpl_vars['list']['page']; ?>
/order/Fecha_<?php if ($this->_tpl_vars['order'] == 'DESC'): ?>ASC<?php else: ?>DESC<?php endif; ?><?php if ($this->_tpl_vars['search']): ?>/search/<?php echo $this->_tpl_vars['search']; ?>
<?php endif; ?>" class="<?php if ($this->_tpl_vars['orderBy'] == 'Fecha'): ?><?php if ($this->_tpl_vars['order'] == 'ASC'): ?>orderUp<?php else: ?>orderDown<?php endif; ?><?php else: ?>orderNone<?php endif; ?>" title="Fecha">Fecha</a></td>
                            <td width="10%"><a href="/<?php echo $this->_tpl_vars['varController']; ?>
/<?php echo $this->_tpl_vars['varAction']; ?>
/<?php if ($this->_tpl_vars['FechaDesde']): ?>FechaDesde/<?php echo $this->_tpl_vars['FechaDesde']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['FechaHasta']): ?>FechaHasta/<?php echo $this->_tpl_vars['FechaHasta']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['Pagado']): ?>Pagado/<?php echo $this->_tpl_vars['Pagado']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['ProveedorId']): ?>ProveedorId/<?php echo $this->_tpl_vars['ProveedorId']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['Tipo']): ?>Tipo/<?php echo $this->_tpl_vars['Tipo']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['OrdenDeCompraId']): ?>OrdenDeCompraId/<?php echo $this->_tpl_vars['OrdenDeCompraId']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['OrdenDePagoId']): ?>OrdenDePagoId/<?php echo $this->_tpl_vars['OrdenDePagoId']; ?>
/<?php endif; ?>pagesize/<?php echo $this->_tpl_vars['list']['pageSize']; ?>
/page/<?php echo $this->_tpl_vars['list']['page']; ?>
/order/Id_<?php if ($this->_tpl_vars['order'] == 'DESC'): ?>ASC<?php else: ?>DESC<?php endif; ?><?php if ($this->_tpl_vars['search']): ?>/search/<?php echo $this->_tpl_vars['search']; ?>
<?php endif; ?>" class="<?php if ($this->_tpl_vars['orderBy'] == 'Id'): ?><?php if ($this->_tpl_vars['order'] == 'ASC'): ?>orderUp<?php else: ?>orderDown<?php endif; ?><?php else: ?>orderNone<?php endif; ?>" title="Orden de pago">Orden de pago</a></td>
                            <td width="10%"><a href="/<?php echo $this->_tpl_vars['varController']; ?>
/<?php echo $this->_tpl_vars['varAction']; ?>
/<?php if ($this->_tpl_vars['FechaDesde']): ?>FechaDesde/<?php echo $this->_tpl_vars['FechaDesde']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['FechaHasta']): ?>FechaHasta/<?php echo $this->_tpl_vars['FechaHasta']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['Pagado']): ?>Pagado/<?php echo $this->_tpl_vars['Pagado']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['ProveedorId']): ?>ProveedorId/<?php echo $this->_tpl_vars['ProveedorId']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['Tipo']): ?>Tipo/<?php echo $this->_tpl_vars['Tipo']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['OrdenDeCompraId']): ?>OrdenDeCompraId/<?php echo $this->_tpl_vars['OrdenDeCompraId']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['OrdenDePagoId']): ?>OrdenDePagoId/<?php echo $this->_tpl_vars['OrdenDePagoId']; ?>
/<?php endif; ?>pagesize/<?php echo $this->_tpl_vars['list']['pageSize']; ?>
/page/<?php echo $this->_tpl_vars['list']['page']; ?>
/order/Importe_<?php if ($this->_tpl_vars['order'] == 'DESC'): ?>ASC<?php else: ?>DESC<?php endif; ?><?php if ($this->_tpl_vars['search']): ?>/search/<?php echo $this->_tpl_vars['search']; ?>
<?php endif; ?>" class="<?php if ($this->_tpl_vars['orderBy'] == 'Importe'): ?><?php if ($this->_tpl_vars['order'] == 'ASC'): ?>orderUp<?php else: ?>orderDown<?php endif; ?><?php else: ?>orderNone<?php endif; ?>" title="Importe total">Importe</a></td>
                            <td width="20%"><p href="/<?php echo $this->_tpl_vars['varController']; ?>
/<?php echo $this->_tpl_vars['varAction']; ?>
/<?php if ($this->_tpl_vars['FechaDesde']): ?>FechaDesde/<?php echo $this->_tpl_vars['FechaDesde']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['FechaHasta']): ?>FechaHasta/<?php echo $this->_tpl_vars['FechaHasta']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['Pagado']): ?>Pagado/<?php echo $this->_tpl_vars['Pagado']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['ProveedorId']): ?>ProveedorId/<?php echo $this->_tpl_vars['ProveedorId']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['Tipo']): ?>Tipo/<?php echo $this->_tpl_vars['Tipo']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['OrdenDeCompraId']): ?>OrdenDeCompraId/<?php echo $this->_tpl_vars['OrdenDeCompraId']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['OrdenDePagoId']): ?>OrdenDePagoId/<?php echo $this->_tpl_vars['OrdenDePagoId']; ?>
/<?php endif; ?>pagesize/<?php echo $this->_tpl_vars['list']['pageSize']; ?>
/page/<?php echo $this->_tpl_vars['list']['page']; ?>
/order/Id_<?php if ($this->_tpl_vars['order'] == 'DESC'): ?>ASC<?php else: ?>DESC<?php endif; ?><?php if ($this->_tpl_vars['search']): ?>/search/<?php echo $this->_tpl_vars['search']; ?>
<?php endif; ?>" class="<?php if ($this->_tpl_vars['orderBy'] == 'Id'): ?><?php if ($this->_tpl_vars['order'] == 'ASC'): ?>orderUp<?php else: ?>orderDown<?php endif; ?><?php else: ?>orderNone<?php endif; ?>" title="Proveedor">Proveedor</p></td>
                            <td width="15%"><p href="/<?php echo $this->_tpl_vars['varController']; ?>
/<?php echo $this->_tpl_vars['varAction']; ?>
/<?php if ($this->_tpl_vars['FechaDesde']): ?>FechaDesde/<?php echo $this->_tpl_vars['FechaDesde']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['FechaHasta']): ?>FechaHasta/<?php echo $this->_tpl_vars['FechaHasta']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['Pagado']): ?>Pagado/<?php echo $this->_tpl_vars['Pagado']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['ProveedorId']): ?>ProveedorId/<?php echo $this->_tpl_vars['ProveedorId']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['Tipo']): ?>Tipo/<?php echo $this->_tpl_vars['Tipo']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['OrdenDeCompraId']): ?>OrdenDeCompraId/<?php echo $this->_tpl_vars['OrdenDeCompraId']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['OrdenDePagoId']): ?>OrdenDePagoId/<?php echo $this->_tpl_vars['OrdenDePagoId']; ?>
/<?php endif; ?>pagesize/<?php echo $this->_tpl_vars['list']['pageSize']; ?>
/page/<?php echo $this->_tpl_vars['list']['page']; ?>
/order/Id_<?php if ($this->_tpl_vars['order'] == 'DESC'): ?>ASC<?php else: ?>DESC<?php endif; ?><?php if ($this->_tpl_vars['search']): ?>/search/<?php echo $this->_tpl_vars['search']; ?>
<?php endif; ?>" class="<?php if ($this->_tpl_vars['orderBy'] == 'Id'): ?><?php if ($this->_tpl_vars['order'] == 'ASC'): ?>orderUp<?php else: ?>orderDown<?php endif; ?><?php else: ?>orderNone<?php endif; ?>" title="Ordenes de compra o facturas asociadas">Liquidacion</p></td>
                            
                            <td width="10%"><p href="/<?php echo $this->_tpl_vars['varController']; ?>
/<?php echo $this->_tpl_vars['varAction']; ?>
/<?php if ($this->_tpl_vars['FechaDesde']): ?>FechaDesde/<?php echo $this->_tpl_vars['FechaDesde']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['FechaHasta']): ?>FechaHasta/<?php echo $this->_tpl_vars['FechaHasta']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['Pagado']): ?>Pagado/<?php echo $this->_tpl_vars['Pagado']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['ProveedorId']): ?>ProveedorId/<?php echo $this->_tpl_vars['ProveedorId']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['Tipo']): ?>Tipo/<?php echo $this->_tpl_vars['Tipo']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['OrdenDeCompraId']): ?>OrdenDeCompraId/<?php echo $this->_tpl_vars['OrdenDeCompraId']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['OrdenDePagoId']): ?>OrdenDePagoId/<?php echo $this->_tpl_vars['OrdenDePagoId']; ?>
/<?php endif; ?>pagesize/<?php echo $this->_tpl_vars['list']['pageSize']; ?>
/page/<?php echo $this->_tpl_vars['list']['page']; ?>
/order/Id_<?php if ($this->_tpl_vars['order'] == 'DESC'): ?>ASC<?php else: ?>DESC<?php endif; ?><?php if ($this->_tpl_vars['search']): ?>/search/<?php echo $this->_tpl_vars['search']; ?>
<?php endif; ?>" class="<?php if ($this->_tpl_vars['orderBy'] == 'Id'): ?><?php if ($this->_tpl_vars['order'] == 'ASC'): ?>orderUp<?php else: ?>orderDown<?php endif; ?><?php else: ?>orderNone<?php endif; ?>" title="Vigente o anulada">Estado</p></td>
                              
                            
                            <td width="5%"><p>Acciones</p></td>
                        </tr>
                    </table>
                </div>
            </div> <!-- /listadoTop -->