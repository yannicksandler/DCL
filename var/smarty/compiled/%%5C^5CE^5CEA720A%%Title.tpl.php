<?php /* Smarty version 2.6.26, created on 2016-04-29 11:48:24
         compiled from Backend/Facturacion/Title.tpl */ ?>
            <div class="listTop">
                <div>
                    <table border="0" cellpadding="0" cellspacing="0">
                        <tr>
                            
                            
                            <td width="5%"><a href="/<?php echo $this->_tpl_vars['varController']; ?>
/<?php echo $this->_tpl_vars['varAction']; ?>
/<?php if ($this->_tpl_vars['FechaDesde']): ?>FechaDesde/<?php echo $this->_tpl_vars['FechaDesde']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['FechaHasta']): ?>FechaHasta/<?php echo $this->_tpl_vars['FechaHasta']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['FacturaId']): ?>FacturaId/<?php echo $this->_tpl_vars['FacturaId']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['ClienteNombre']): ?>ClienteNombre/<?php echo $this->_tpl_vars['ClienteNombre']; ?>
/<?php endif; ?>pagesize/<?php echo $this->_tpl_vars['list']['pageSize']; ?>
/page/<?php echo $this->_tpl_vars['list']['page']; ?>
/order/Id_<?php if ($this->_tpl_vars['order'] == 'DESC'): ?>ASC<?php else: ?>DESC<?php endif; ?><?php if ($this->_tpl_vars['search']): ?>/search/<?php echo $this->_tpl_vars['search']; ?>
<?php endif; ?>" class="<?php if ($this->_tpl_vars['orderBy'] == 'Id'): ?><?php if ($this->_tpl_vars['order'] == 'ASC'): ?>orderUp<?php else: ?>orderDown<?php endif; ?><?php else: ?>orderNone<?php endif; ?>" title="Numero">Numero</a></td>
                            <td width="10%"><a href="/<?php echo $this->_tpl_vars['varController']; ?>
/<?php echo $this->_tpl_vars['varAction']; ?>
/<?php if ($this->_tpl_vars['FechaDesde']): ?>FechaDesde/<?php echo $this->_tpl_vars['FechaDesde']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['FechaHasta']): ?>FechaHasta/<?php echo $this->_tpl_vars['FechaHasta']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['FacturaId']): ?>FacturaId/<?php echo $this->_tpl_vars['FacturaId']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['ClienteNombre']): ?>ClienteNombre/<?php echo $this->_tpl_vars['ClienteNombre']; ?>
/<?php endif; ?>pagesize/<?php echo $this->_tpl_vars['list']['pageSize']; ?>
/page/<?php echo $this->_tpl_vars['list']['page']; ?>
/order/Fecha_<?php if ($this->_tpl_vars['order'] == 'DESC'): ?>ASC<?php else: ?>DESC<?php endif; ?><?php if ($this->_tpl_vars['search']): ?>/search/<?php echo $this->_tpl_vars['search']; ?>
<?php endif; ?>" class="<?php if ($this->_tpl_vars['orderBy'] == 'Fecha'): ?><?php if ($this->_tpl_vars['order'] == 'ASC'): ?>orderUp<?php else: ?>orderDown<?php endif; ?><?php else: ?>orderNone<?php endif; ?>" title="Fecha">Fecha</a></td>
                            <td width="15%"><a href="/<?php echo $this->_tpl_vars['varController']; ?>
/<?php echo $this->_tpl_vars['varAction']; ?>
/<?php if ($this->_tpl_vars['FechaDesde']): ?>FechaDesde/<?php echo $this->_tpl_vars['FechaDesde']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['FechaHasta']): ?>FechaHasta/<?php echo $this->_tpl_vars['FechaHasta']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['FacturaId']): ?>FacturaId/<?php echo $this->_tpl_vars['FacturaId']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['ClienteNombre']): ?>ClienteNombre/<?php echo $this->_tpl_vars['ClienteNombre']; ?>
/<?php endif; ?>pagesize/<?php echo $this->_tpl_vars['list']['pageSize']; ?>
/page/<?php echo $this->_tpl_vars['list']['page']; ?>
/order/Factura.Cliente.RazonSocial_<?php if ($this->_tpl_vars['order'] == 'DESC'): ?>ASC<?php else: ?>DESC<?php endif; ?><?php if ($this->_tpl_vars['search']): ?>/search/<?php echo $this->_tpl_vars['search']; ?>
<?php endif; ?>" class="<?php if ($this->_tpl_vars['orderBy'] == 'Factura.Cliente.RazonSocial'): ?><?php if ($this->_tpl_vars['order'] == 'ASC'): ?>orderUp<?php else: ?>orderDown<?php endif; ?><?php else: ?>orderNone<?php endif; ?>" title="Cliente">Cliente</a></td>
                            <td width="10%"><a href="/<?php echo $this->_tpl_vars['varController']; ?>
/<?php echo $this->_tpl_vars['varAction']; ?>
/<?php if ($this->_tpl_vars['FechaDesde']): ?>FechaDesde/<?php echo $this->_tpl_vars['FechaDesde']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['FechaHasta']): ?>FechaHasta/<?php echo $this->_tpl_vars['FechaHasta']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['FacturaId']): ?>FacturaId/<?php echo $this->_tpl_vars['FacturaId']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['ClienteNombre']): ?>ClienteNombre/<?php echo $this->_tpl_vars['ClienteNombre']; ?>
/<?php endif; ?>pagesize/<?php echo $this->_tpl_vars['list']['pageSize']; ?>
/page/<?php echo $this->_tpl_vars['list']['page']; ?>
/order/Importe_<?php if ($this->_tpl_vars['order'] == 'DESC'): ?>ASC<?php else: ?>DESC<?php endif; ?><?php if ($this->_tpl_vars['search']): ?>/search/<?php echo $this->_tpl_vars['search']; ?>
<?php endif; ?>" class="<?php if ($this->_tpl_vars['orderBy'] == 'Importe'): ?><?php if ($this->_tpl_vars['order'] == 'ASC'): ?>orderUp<?php else: ?>orderDown<?php endif; ?><?php else: ?>orderNone<?php endif; ?>" title="Importe">Importe total</a></td>
                            <td width="10%"><p href="/<?php echo $this->_tpl_vars['varController']; ?>
/<?php echo $this->_tpl_vars['varAction']; ?>
/<?php if ($this->_tpl_vars['FechaDesde']): ?>FechaDesde/<?php echo $this->_tpl_vars['FechaDesde']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['FechaHasta']): ?>FechaHasta/<?php echo $this->_tpl_vars['FechaHasta']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['FacturaId']): ?>FacturaId/<?php echo $this->_tpl_vars['FacturaId']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['ClienteNombre']): ?>ClienteNombre/<?php echo $this->_tpl_vars['ClienteNombre']; ?>
/<?php endif; ?>pagesize/<?php echo $this->_tpl_vars['list']['pageSize']; ?>
/page/<?php echo $this->_tpl_vars['list']['page']; ?>
/order/Importe_<?php if ($this->_tpl_vars['order'] == 'DESC'): ?>ASC<?php else: ?>DESC<?php endif; ?><?php if ($this->_tpl_vars['search']): ?>/search/<?php echo $this->_tpl_vars['search']; ?>
<?php endif; ?>" class="<?php if ($this->_tpl_vars['orderBy'] == 'Importe'): ?><?php if ($this->_tpl_vars['order'] == 'ASC'): ?>orderUp<?php else: ?>orderDown<?php endif; ?><?php else: ?>orderNone<?php endif; ?>" title="Importe pendiente de cobro">Por cobrar</p></td>
                            
                            <td width="15%"><p title="Importe abonado en Ordenes de pago">Abonado</p></td>
                            
                            <td width="10%"><p href="/<?php echo $this->_tpl_vars['varController']; ?>
/<?php echo $this->_tpl_vars['varAction']; ?>
/<?php if ($this->_tpl_vars['FechaDesde']): ?>FechaDesde/<?php echo $this->_tpl_vars['FechaDesde']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['FechaHasta']): ?>FechaHasta/<?php echo $this->_tpl_vars['FechaHasta']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['FacturaId']): ?>FacturaId/<?php echo $this->_tpl_vars['FacturaId']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['ClienteNombre']): ?>ClienteNombre/<?php echo $this->_tpl_vars['ClienteNombre']; ?>
/<?php endif; ?>pagesize/<?php echo $this->_tpl_vars['list']['pageSize']; ?>
/page/<?php echo $this->_tpl_vars['list']['page']; ?>
/order/Importe_<?php if ($this->_tpl_vars['order'] == 'DESC'): ?>ASC<?php else: ?>DESC<?php endif; ?><?php if ($this->_tpl_vars['search']): ?>/search/<?php echo $this->_tpl_vars['search']; ?>
<?php endif; ?>" class="<?php if ($this->_tpl_vars['orderBy'] == 'Importe'): ?><?php if ($this->_tpl_vars['order'] == 'ASC'): ?>orderUp<?php else: ?>orderDown<?php endif; ?><?php else: ?>orderNone<?php endif; ?>" title="Tipo de factura">Tipo</p></td>
                            <td width="8%"><a href="/<?php echo $this->_tpl_vars['varController']; ?>
/<?php echo $this->_tpl_vars['varAction']; ?>
/<?php if ($this->_tpl_vars['FechaDesde']): ?>FechaDesde/<?php echo $this->_tpl_vars['FechaDesde']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['FechaHasta']): ?>FechaHasta/<?php echo $this->_tpl_vars['FechaHasta']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['FacturaId']): ?>FacturaId/<?php echo $this->_tpl_vars['FacturaId']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['ClienteNombre']): ?>ClienteNombre/<?php echo $this->_tpl_vars['ClienteNombre']; ?>
/<?php endif; ?>pagesize/<?php echo $this->_tpl_vars['list']['pageSize']; ?>
/page/<?php echo $this->_tpl_vars['list']['page']; ?>
/order/FechaAnulacion_<?php if ($this->_tpl_vars['order'] == 'DESC'): ?>ASC<?php else: ?>DESC<?php endif; ?><?php if ($this->_tpl_vars['search']): ?>/search/<?php echo $this->_tpl_vars['search']; ?>
<?php endif; ?>" class="<?php if ($this->_tpl_vars['orderBy'] == 'FechaAnulacion'): ?><?php if ($this->_tpl_vars['order'] == 'ASC'): ?>orderUp<?php else: ?>orderDown<?php endif; ?><?php else: ?>orderNone<?php endif; ?>" title="Anulada o vigente">Estado</a></td>
                            
                            
                            <td width="15%"><p>Acciones</p></td>
                        </tr>
                    </table>
                </div>
            </div> <!-- /listadoTop -->