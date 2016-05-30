<?php /* Smarty version 2.6.26, created on 2016-05-05 13:19:11
         compiled from Backend/Orden/ListPreproduccion/Title.tpl */ ?>
            <div class="listTop">
                <div>
                    <table border="0" cellpadding="0" cellspacing="0">
                        <tr>
                            <td width="2%"><input type="checkbox" class="check" id="check_all" /></td>
                            
                            <td width="5%"><a href="/<?php echo $this->_tpl_vars['varController']; ?>
/<?php echo $this->_tpl_vars['varAction']; ?>
/<?php if ($this->_tpl_vars['OrdenEstadoId'] >= 0): ?>EstadoOrdenTrabajoId/<?php echo $this->_tpl_vars['OrdenEstadoId']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['NombreCliente']): ?>NombreCliente/<?php echo $this->_tpl_vars['NombreCliente']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['OrdenDeTrabajoId']): ?>OrdenDeTrabajoId/<?php echo $this->_tpl_vars['OrdenDeTrabajoId']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['SelectedPrioridadId']): ?>PrioridadId/<?php echo $this->_tpl_vars['SelectedPrioridadId']; ?>
/<?php endif; ?>pagesize/<?php echo $this->_tpl_vars['list']['pageSize']; ?>
/page/<?php echo $this->_tpl_vars['list']['page']; ?>
/order/Id_<?php if ($this->_tpl_vars['order'] == 'DESC'): ?>ASC<?php else: ?>DESC<?php endif; ?><?php if ($this->_tpl_vars['search']): ?>/search/<?php echo $this->_tpl_vars['search']; ?>
<?php endif; ?>" class="<?php if ($this->_tpl_vars['orderBy'] == 'Id'): ?><?php if ($this->_tpl_vars['order'] == 'ASC'): ?>orderUp<?php else: ?>orderDown<?php endif; ?><?php else: ?>orderNone<?php endif; ?>" title="Numero">Numero</a></td>
                            
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
/order/o.Cliente.Nombre_<?php if ($this->_tpl_vars['order'] == 'DESC'): ?>ASC<?php else: ?>DESC<?php endif; ?><?php if ($this->_tpl_vars['search']): ?>/search/<?php echo $this->_tpl_vars['search']; ?>
<?php endif; ?>" class="<?php if ($this->_tpl_vars['orderBy'] == 'o.Cliente.Nombre'): ?><?php if ($this->_tpl_vars['order'] == 'ASC'): ?>orderUp<?php else: ?>orderDown<?php endif; ?><?php else: ?>orderNone<?php endif; ?>" title="Nombre cliente">Nombre cliente</p></td>
                            <td width="10%"><p href="/<?php echo $this->_tpl_vars['varController']; ?>
/<?php echo $this->_tpl_vars['varAction']; ?>
/<?php if ($this->_tpl_vars['OrdenEstadoId'] >= 0): ?>EstadoOrdenTrabajoId/<?php echo $this->_tpl_vars['OrdenEstadoId']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['NombreCliente']): ?>NombreCliente/<?php echo $this->_tpl_vars['NombreCliente']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['OrdenDeTrabajoId']): ?>OrdenDeTrabajoId/<?php echo $this->_tpl_vars['OrdenDeTrabajoId']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['SelectedPrioridadId']): ?>PrioridadId/<?php echo $this->_tpl_vars['SelectedPrioridadId']; ?>
/<?php endif; ?>pagesize/<?php echo $this->_tpl_vars['list']['pageSize']; ?>
/page/<?php echo $this->_tpl_vars['list']['page']; ?>
/order/o.Estado.Nombre_<?php if ($this->_tpl_vars['order'] == 'DESC'): ?>ASC<?php else: ?>DESC<?php endif; ?><?php if ($this->_tpl_vars['search']): ?>/search/<?php echo $this->_tpl_vars['search']; ?>
<?php endif; ?>" class="<?php if ($this->_tpl_vars['orderBy'] == 'o.Estado.Nombre'): ?><?php if ($this->_tpl_vars['order'] == 'ASC'): ?>orderUp<?php else: ?>orderDown<?php endif; ?><?php else: ?>orderNone<?php endif; ?>" title="Estado">Estado</p></td>
                            <td width="10%"><p href="/<?php echo $this->_tpl_vars['varController']; ?>
/<?php echo $this->_tpl_vars['varAction']; ?>
/<?php if ($this->_tpl_vars['OrdenEstadoId'] >= 0): ?>EstadoOrdenTrabajoId/<?php echo $this->_tpl_vars['OrdenEstadoId']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['NombreCliente']): ?>NombreCliente/<?php echo $this->_tpl_vars['NombreCliente']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['OrdenDeTrabajoId']): ?>OrdenDeTrabajoId/<?php echo $this->_tpl_vars['OrdenDeTrabajoId']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['SelectedPrioridadId']): ?>PrioridadId/<?php echo $this->_tpl_vars['SelectedPrioridadId']; ?>
/<?php endif; ?>pagesize/<?php echo $this->_tpl_vars['list']['pageSize']; ?>
/page/<?php echo $this->_tpl_vars['list']['page']; ?>
/order/o.DiasProximoCambioEstado_<?php if ($this->_tpl_vars['order'] == 'DESC'): ?>ASC<?php else: ?>DESC<?php endif; ?><?php if ($this->_tpl_vars['search']): ?>/search/<?php echo $this->_tpl_vars['search']; ?>
<?php endif; ?>" class="<?php if ($this->_tpl_vars['orderBy'] == 'o.DiasProximoCambioEstado'): ?><?php if ($this->_tpl_vars['order'] == 'ASC'): ?>orderUp<?php else: ?>orderDown<?php endif; ?><?php else: ?>orderNone<?php endif; ?>" title="">Finalizacion</p></td>
                            
                            <td width="10%"><p href="/<?php echo $this->_tpl_vars['varController']; ?>
/<?php echo $this->_tpl_vars['varAction']; ?>
/<?php if ($this->_tpl_vars['OrdenEstadoId'] >= 0): ?>EstadoOrdenTrabajoId/<?php echo $this->_tpl_vars['OrdenEstadoId']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['NombreCliente']): ?>NombreCliente/<?php echo $this->_tpl_vars['NombreCliente']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['OrdenDeTrabajoId']): ?>OrdenDeTrabajoId/<?php echo $this->_tpl_vars['OrdenDeTrabajoId']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['SelectedPrioridadId']): ?>PrioridadId/<?php echo $this->_tpl_vars['SelectedPrioridadId']; ?>
/<?php endif; ?>pagesize/<?php echo $this->_tpl_vars['list']['pageSize']; ?>
/page/<?php echo $this->_tpl_vars['list']['page']; ?>
/order/PrioridadId_<?php if ($this->_tpl_vars['order'] == 'DESC'): ?>ASC<?php else: ?>DESC<?php endif; ?><?php if ($this->_tpl_vars['search']): ?>/search/<?php echo $this->_tpl_vars['search']; ?>
<?php endif; ?>" class="<?php if ($this->_tpl_vars['orderBy'] == 'PrioridadId'): ?><?php if ($this->_tpl_vars['order'] == 'ASC'): ?>orderUp<?php else: ?>orderDown<?php endif; ?><?php else: ?>orderNone<?php endif; ?>" title="Prioridad">Prioridad</p></td>
                            <td width="12%"><p href="/<?php echo $this->_tpl_vars['varController']; ?>
/<?php echo $this->_tpl_vars['varAction']; ?>
/<?php if ($this->_tpl_vars['OrdenEstadoId'] >= 0): ?>EstadoOrdenTrabajoId/<?php echo $this->_tpl_vars['OrdenEstadoId']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['NombreCliente']): ?>NombreCliente/<?php echo $this->_tpl_vars['NombreCliente']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['OrdenDeTrabajoId']): ?>OrdenDeTrabajoId/<?php echo $this->_tpl_vars['OrdenDeTrabajoId']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['SelectedPrioridadId']): ?>PrioridadId/<?php echo $this->_tpl_vars['SelectedPrioridadId']; ?>
/<?php endif; ?>pagesize/<?php echo $this->_tpl_vars['list']['pageSize']; ?>
/page/<?php echo $this->_tpl_vars['list']['page']; ?>
/order/DescripcionDeTrabajo_<?php if ($this->_tpl_vars['order'] == 'DESC'): ?>ASC<?php else: ?>DESC<?php endif; ?><?php if ($this->_tpl_vars['search']): ?>/search/<?php echo $this->_tpl_vars['search']; ?>
<?php endif; ?>" class="<?php if ($this->_tpl_vars['orderBy'] == 'DescripcionDeTrabajo'): ?><?php if ($this->_tpl_vars['order'] == 'ASC'): ?>orderUp<?php else: ?>orderDown<?php endif; ?><?php else: ?>orderNone<?php endif; ?>" title="Descripcion">Descripcion</p></td>
                              
                            
                            <td width="8%"><p>Opciones</p></td>
                        </tr>
                    </table>
                </div>
            </div> <!-- /listadoTop -->