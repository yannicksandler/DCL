<?php /* Smarty version 2.6.26, created on 2014-09-19 13:06:14
         compiled from Backend/Layouts/Include/Paginator.tpl */ ?>
            <div class="listPaginador">
            
               <ul class="paginadorOptions">
                  <li>
                      <span>Seleccionados:</span>
                  </li>
                  <li>
                      <a href="#" class="print"><img src="/images/icons/printer.png" title="Imprimir pagina"/> Imprimir</a> 
                  </li>
                  <li>
                      <a href="#" class="delete"><img src="/images/icons/page_delete.png" title="Eliminar elementos seleccionados"/> Eliminar</a>
                  </li>
               </ul> <!-- /paginadorOptions -->
                
               <div class="paginadorCant">
                  <p>Mostrar 
                     <a href="/<?php echo $this->_tpl_vars['varController']; ?>
/<?php echo $this->_tpl_vars['varAction']; ?>
/<?php if ($this->_tpl_vars['Pagado']): ?>Pagado/<?php echo $this->_tpl_vars['Pagado']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['Pendientes']): ?>Pendientes/<?php echo $this->_tpl_vars['Pendientes']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['ProveedorId']): ?>ProveedorId/<?php echo $this->_tpl_vars['ProveedorId']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['Tipo']): ?>Tipo/<?php echo $this->_tpl_vars['Tipo']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['Nombre']): ?>Nombre/<?php echo $this->_tpl_vars['Nombre']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['EstadoSeleccionado']): ?>Estado/<?php echo $this->_tpl_vars['EstadoSeleccionado']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['FechaDesde']): ?>FechaDesde/<?php echo $this->_tpl_vars['FechaDesde']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['FechaHasta']): ?>FechaHasta/<?php echo $this->_tpl_vars['FechaHasta']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['EstadoId'] >= 0 && $this->_tpl_vars['EstadoId']): ?>EstadoOrdenTrabajoId/<?php echo $this->_tpl_vars['EstadoId']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['NombreProveedor']): ?>NombreProveedor/<?php echo $this->_tpl_vars['NombreProveedor']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['OrdenDeCompraId']): ?>OrdenDeCompraId/<?php echo $this->_tpl_vars['OrdenDeCompraId']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['OrdenDePagoId']): ?>OrdenDePagoId/<?php echo $this->_tpl_vars['OrdenDePagoId']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['OrdenEstadoId'] >= 0 && $this->_tpl_vars['OrdenEstadoId']): ?>EstadoOrdenTrabajoId/<?php echo $this->_tpl_vars['OrdenEstadoId']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['NombreCliente']): ?>NombreCliente/<?php echo $this->_tpl_vars['NombreCliente']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['ProveedorNombre']): ?>ProveedorNombre/<?php echo $this->_tpl_vars['ProveedorNombre']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['FacturaId']): ?>FacturaId/<?php echo $this->_tpl_vars['FacturaId']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['FacturaTipo']): ?>FacturaTipo/<?php echo $this->_tpl_vars['FacturaTipo']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['OrdenDeTrabajoId']): ?>OrdenDeTrabajoId/<?php echo $this->_tpl_vars['OrdenDeTrabajoId']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['OrdenEstadoId'] >= 0): ?>EstadoOrdenTrabajoId/<?php echo $this->_tpl_vars['OrdenEstadoId']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['SelectedPrioridadId']): ?>PrioridadId/<?php echo $this->_tpl_vars['SelectedPrioridadId']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['filters']['NombreProveedor'] && $this->_tpl_vars['filters']['NombreProveedor'] != 'Nombre proveedor'): ?>NombreProveedor/<?php echo $this->_tpl_vars['filters']['NombreProveedor']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['filters']['Numero'] && $this->_tpl_vars['filters']['Numero'] != 'Numero'): ?>Numero/<?php echo $this->_tpl_vars['filters']['Numero']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['filters']['Estado']): ?>Estado/<?php echo $this->_tpl_vars['filters']['Estado']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['filters']['FechaDesde'] && $this->_tpl_vars['filters']['FechaDesde'] != 'Fecha cobro desde'): ?>FechaDesde/<?php echo $this->_tpl_vars['filters']['FechaDesde']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['filters']['FechaHasta'] && $this->_tpl_vars['filters']['FechaHasta'] != 'Fecha cobro hasta'): ?>FechaHasta/<?php echo $this->_tpl_vars['filters']['FechaHasta']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['filters']['NombreCliente'] && $this->_tpl_vars['filters']['NombreCliente'] != 'Nombre cliente'): ?>NombreCliente/<?php echo $this->_tpl_vars['filters']['NombreCliente']; ?>
/<?php endif; ?>pagesize/15/page/<?php echo $this->_tpl_vars['list']['page']; ?>
<?php if ($this->_tpl_vars['orderBy']): ?>/order/<?php echo $this->_tpl_vars['orderBy']; ?>
_<?php echo $this->_tpl_vars['order']; ?>
<?php endif; ?><?php if ($this->_tpl_vars['search']): ?>/search/<?php echo $this->_tpl_vars['search']; ?>
<?php endif; ?>" <?php if ($this->_tpl_vars['list']['pageSize'] == 15): ?>class="active"<?php endif; ?>>15</a> | 
                     <a href="/<?php echo $this->_tpl_vars['varController']; ?>
/<?php echo $this->_tpl_vars['varAction']; ?>
/<?php if ($this->_tpl_vars['Pagado']): ?>Pagado/<?php echo $this->_tpl_vars['Pagado']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['Pendientes']): ?>Pendientes/<?php echo $this->_tpl_vars['Pendientes']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['ProveedorId']): ?>ProveedorId/<?php echo $this->_tpl_vars['ProveedorId']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['Tipo']): ?>Tipo/<?php echo $this->_tpl_vars['Tipo']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['Nombre']): ?>Nombre/<?php echo $this->_tpl_vars['Nombre']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['EstadoSeleccionado']): ?>Estado/<?php echo $this->_tpl_vars['EstadoSeleccionado']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['FechaDesde']): ?>FechaDesde/<?php echo $this->_tpl_vars['FechaDesde']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['FechaHasta']): ?>FechaHasta/<?php echo $this->_tpl_vars['FechaHasta']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['EstadoId'] >= 0 && $this->_tpl_vars['EstadoId']): ?>EstadoOrdenTrabajoId/<?php echo $this->_tpl_vars['EstadoId']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['NombreProveedor']): ?>NombreProveedor/<?php echo $this->_tpl_vars['NombreProveedor']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['OrdenDeCompraId']): ?>OrdenDeCompraId/<?php echo $this->_tpl_vars['OrdenDeCompraId']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['OrdenDePagoId']): ?>OrdenDePagoId/<?php echo $this->_tpl_vars['OrdenDePagoId']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['OrdenEstadoId'] >= 0 && $this->_tpl_vars['OrdenEstadoId']): ?>EstadoOrdenTrabajoId/<?php echo $this->_tpl_vars['OrdenEstadoId']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['NombreCliente']): ?>NombreCliente/<?php echo $this->_tpl_vars['NombreCliente']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['ProveedorNombre']): ?>ProveedorNombre/<?php echo $this->_tpl_vars['ProveedorNombre']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['FacturaId']): ?>FacturaId/<?php echo $this->_tpl_vars['FacturaId']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['FacturaTipo']): ?>FacturaTipo/<?php echo $this->_tpl_vars['FacturaTipo']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['OrdenDeTrabajoId']): ?>OrdenDeTrabajoId/<?php echo $this->_tpl_vars['OrdenDeTrabajoId']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['OrdenEstadoId'] >= 0): ?>EstadoOrdenTrabajoId/<?php echo $this->_tpl_vars['OrdenEstadoId']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['SelectedPrioridadId']): ?>PrioridadId/<?php echo $this->_tpl_vars['SelectedPrioridadId']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['filters']['NombreProveedor'] && $this->_tpl_vars['filters']['NombreProveedor'] != 'Nombre proveedor'): ?>NombreProveedor/<?php echo $this->_tpl_vars['filters']['NombreProveedor']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['filters']['Numero'] && $this->_tpl_vars['filters']['Numero'] != 'Numero'): ?>Numero/<?php echo $this->_tpl_vars['filters']['Numero']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['filters']['Estado']): ?>Estado/<?php echo $this->_tpl_vars['filters']['Estado']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['filters']['FechaDesde'] && $this->_tpl_vars['filters']['FechaDesde'] != 'Fecha cobro desde'): ?>FechaDesde/<?php echo $this->_tpl_vars['filters']['FechaDesde']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['filters']['FechaHasta'] && $this->_tpl_vars['filters']['FechaHasta'] != 'Fecha cobro hasta'): ?>FechaHasta/<?php echo $this->_tpl_vars['filters']['FechaHasta']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['filters']['NombreCliente'] && $this->_tpl_vars['filters']['NombreCliente'] != 'Nombre cliente'): ?>NombreCliente/<?php echo $this->_tpl_vars['filters']['NombreCliente']; ?>
/<?php endif; ?>pagesize/50/page/<?php echo $this->_tpl_vars['list']['page']; ?>
<?php if ($this->_tpl_vars['orderBy']): ?>/order/<?php echo $this->_tpl_vars['orderBy']; ?>
_<?php echo $this->_tpl_vars['order']; ?>
<?php endif; ?><?php if ($this->_tpl_vars['search']): ?>/search/<?php echo $this->_tpl_vars['search']; ?>
<?php endif; ?>" <?php if ($this->_tpl_vars['list']['pageSize'] == 50): ?>class="active"<?php endif; ?>>50</a> | 
                     <a href="/<?php echo $this->_tpl_vars['varController']; ?>
/<?php echo $this->_tpl_vars['varAction']; ?>
/<?php if ($this->_tpl_vars['Pagado']): ?>Pagado/<?php echo $this->_tpl_vars['Pagado']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['Pendientes']): ?>Pendientes/<?php echo $this->_tpl_vars['Pendientes']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['ProveedorId']): ?>ProveedorId/<?php echo $this->_tpl_vars['ProveedorId']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['Tipo']): ?>Tipo/<?php echo $this->_tpl_vars['Tipo']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['Nombre']): ?>Nombre/<?php echo $this->_tpl_vars['Nombre']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['EstadoSeleccionado']): ?>Estado/<?php echo $this->_tpl_vars['EstadoSeleccionado']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['FechaDesde']): ?>FechaDesde/<?php echo $this->_tpl_vars['FechaDesde']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['FechaHasta']): ?>FechaHasta/<?php echo $this->_tpl_vars['FechaHasta']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['EstadoId'] >= 0 && $this->_tpl_vars['EstadoId']): ?>EstadoOrdenTrabajoId/<?php echo $this->_tpl_vars['EstadoId']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['NombreProveedor']): ?>NombreProveedor/<?php echo $this->_tpl_vars['NombreProveedor']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['OrdenDeCompraId']): ?>OrdenDeCompraId/<?php echo $this->_tpl_vars['OrdenDeCompraId']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['OrdenDePagoId']): ?>OrdenDePagoId/<?php echo $this->_tpl_vars['OrdenDePagoId']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['OrdenEstadoId'] >= 0 && $this->_tpl_vars['OrdenEstadoId']): ?>EstadoOrdenTrabajoId/<?php echo $this->_tpl_vars['OrdenEstadoId']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['NombreCliente']): ?>NombreCliente/<?php echo $this->_tpl_vars['NombreCliente']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['ProveedorNombre']): ?>ProveedorNombre/<?php echo $this->_tpl_vars['ProveedorNombre']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['FacturaId']): ?>FacturaId/<?php echo $this->_tpl_vars['FacturaId']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['FacturaTipo']): ?>FacturaTipo/<?php echo $this->_tpl_vars['FacturaTipo']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['OrdenDeTrabajoId']): ?>OrdenDeTrabajoId/<?php echo $this->_tpl_vars['OrdenDeTrabajoId']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['OrdenEstadoId'] >= 0): ?>EstadoOrdenTrabajoId/<?php echo $this->_tpl_vars['OrdenEstadoId']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['SelectedPrioridadId']): ?>PrioridadId/<?php echo $this->_tpl_vars['SelectedPrioridadId']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['filters']['NombreProveedor'] && $this->_tpl_vars['filters']['NombreProveedor'] != 'Nombre proveedor'): ?>NombreProveedor/<?php echo $this->_tpl_vars['filters']['NombreProveedor']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['filters']['Numero'] && $this->_tpl_vars['filters']['Numero'] != 'Numero'): ?>Numero/<?php echo $this->_tpl_vars['filters']['Numero']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['filters']['Estado']): ?>Estado/<?php echo $this->_tpl_vars['filters']['Estado']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['filters']['FechaDesde'] && $this->_tpl_vars['filters']['FechaDesde'] != 'Fecha cobro desde'): ?>FechaDesde/<?php echo $this->_tpl_vars['filters']['FechaDesde']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['filters']['FechaHasta'] && $this->_tpl_vars['filters']['FechaHasta'] != 'Fecha cobro hasta'): ?>FechaHasta/<?php echo $this->_tpl_vars['filters']['FechaHasta']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['filters']['NombreCliente'] && $this->_tpl_vars['filters']['NombreCliente'] != 'Nombre cliente'): ?>NombreCliente/<?php echo $this->_tpl_vars['filters']['NombreCliente']; ?>
/<?php endif; ?>pagesize/100/page/<?php echo $this->_tpl_vars['list']['page']; ?>
<?php if ($this->_tpl_vars['orderBy']): ?>/order/<?php echo $this->_tpl_vars['orderBy']; ?>
_<?php echo $this->_tpl_vars['order']; ?>
<?php endif; ?><?php if ($this->_tpl_vars['search']): ?>/search/<?php echo $this->_tpl_vars['search']; ?>
<?php endif; ?>" <?php if ($this->_tpl_vars['list']['pageSize'] == 100): ?>class="active"<?php endif; ?>>100</a>
                  </p>
               </div> <!-- /paginadorCant -->
                
               <div class="paginadorGoTo">
                  <input type="text" class="goTo" value="Ir a pag." />
                  <input type="hidden" class="goToPage" value="/<?php echo $this->_tpl_vars['varController']; ?>
/<?php echo $this->_tpl_vars['varAction']; ?>
/<?php if ($this->_tpl_vars['Pagado']): ?>Pagado/<?php echo $this->_tpl_vars['Pagado']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['Pendientes']): ?>Pendientes/<?php echo $this->_tpl_vars['Pendientes']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['ProveedorId']): ?>ProveedorId/<?php echo $this->_tpl_vars['ProveedorId']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['Tipo']): ?>Tipo/<?php echo $this->_tpl_vars['Tipo']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['Nombre']): ?>Nombre/<?php echo $this->_tpl_vars['Nombre']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['EstadoSeleccionado']): ?>Estado/<?php echo $this->_tpl_vars['EstadoSeleccionado']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['FechaDesde']): ?>FechaDesde/<?php echo $this->_tpl_vars['FechaDesde']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['FechaHasta']): ?>FechaHasta/<?php echo $this->_tpl_vars['FechaHasta']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['EstadoId'] >= 0 && $this->_tpl_vars['EstadoId']): ?>EstadoOrdenTrabajoId/<?php echo $this->_tpl_vars['EstadoId']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['NombreProveedor']): ?>NombreProveedor/<?php echo $this->_tpl_vars['NombreProveedor']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['OrdenDeCompraId']): ?>OrdenDeCompraId/<?php echo $this->_tpl_vars['OrdenDeCompraId']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['OrdenEstadoId'] >= 0 && $this->_tpl_vars['OrdenEstadoId']): ?>EstadoOrdenTrabajoId/<?php echo $this->_tpl_vars['OrdenEstadoId']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['NombreCliente']): ?>NombreCliente/<?php echo $this->_tpl_vars['NombreCliente']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['ProveedorNombre']): ?>ProveedorNombre/<?php echo $this->_tpl_vars['ProveedorNombre']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['FacturaId']): ?>FacturaId/<?php echo $this->_tpl_vars['FacturaId']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['FacturaTipo']): ?>FacturaTipo/<?php echo $this->_tpl_vars['FacturaTipo']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['OrdenDeTrabajoId']): ?>OrdenDeTrabajoId/<?php echo $this->_tpl_vars['OrdenDeTrabajoId']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['OrdenEstadoId'] >= 0): ?>EstadoOrdenTrabajoId/<?php echo $this->_tpl_vars['OrdenEstadoId']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['SelectedPrioridadId']): ?>PrioridadId/<?php echo $this->_tpl_vars['SelectedPrioridadId']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['filters']['NombreProveedor'] && $this->_tpl_vars['filters']['NombreProveedor'] != 'Nombre proveedor'): ?>NombreProveedor/<?php echo $this->_tpl_vars['filters']['NombreProveedor']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['filters']['Numero'] && $this->_tpl_vars['filters']['Numero'] != 'Numero'): ?>Numero/<?php echo $this->_tpl_vars['filters']['Numero']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['filters']['Estado']): ?>Estado/<?php echo $this->_tpl_vars['filters']['Estado']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['filters']['FechaDesde'] && $this->_tpl_vars['filters']['FechaDesde'] != 'Fecha cobro desde'): ?>FechaDesde/<?php echo $this->_tpl_vars['filters']['FechaDesde']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['filters']['FechaHasta'] && $this->_tpl_vars['filters']['FechaHasta'] != 'Fecha cobro hasta'): ?>FechaHasta/<?php echo $this->_tpl_vars['filters']['FechaHasta']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['filters']['NombreCliente'] && $this->_tpl_vars['filters']['NombreCliente'] != 'Nombre cliente'): ?>NombreCliente/<?php echo $this->_tpl_vars['filters']['NombreCliente']; ?>
/<?php endif; ?>pagesize/<?php echo $this->_tpl_vars['list']['pageSize']; ?>
/page/GOTO<?php if ($this->_tpl_vars['orderBy']): ?>/order/<?php echo $this->_tpl_vars['orderBy']; ?>
_<?php echo $this->_tpl_vars['order']; ?>
<?php endif; ?><?php if ($this->_tpl_vars['search']): ?>/search/<?php echo $this->_tpl_vars['search']; ?>
<?php endif; ?>" />
                  <input type="button" class="btText" id="goToPage" value="Ir &raquo;" title="Ir &raquo;" />
               </div> <!-- /paginadorCant -->
               
               <ul class="paginadorPages">
                  <li>
                     <a href="/<?php echo $this->_tpl_vars['varController']; ?>
/<?php echo $this->_tpl_vars['varAction']; ?>
/<?php if ($this->_tpl_vars['Pagado']): ?>Pagado/<?php echo $this->_tpl_vars['Pagado']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['Pendientes']): ?>Pendientes/<?php echo $this->_tpl_vars['Pendientes']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['ProveedorId']): ?>ProveedorId/<?php echo $this->_tpl_vars['ProveedorId']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['Tipo']): ?>Tipo/<?php echo $this->_tpl_vars['Tipo']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['Nombre']): ?>Nombre/<?php echo $this->_tpl_vars['Nombre']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['EstadoSeleccionado']): ?>Estado/<?php echo $this->_tpl_vars['EstadoSeleccionado']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['FechaDesde']): ?>FechaDesde/<?php echo $this->_tpl_vars['FechaDesde']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['FechaHasta']): ?>FechaHasta/<?php echo $this->_tpl_vars['FechaHasta']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['EstadoId'] >= 0 && $this->_tpl_vars['EstadoId']): ?>EstadoOrdenTrabajoId/<?php echo $this->_tpl_vars['EstadoId']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['NombreProveedor']): ?>NombreProveedor/<?php echo $this->_tpl_vars['NombreProveedor']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['OrdenDeCompraId']): ?>OrdenDeCompraId/<?php echo $this->_tpl_vars['OrdenDeCompraId']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['OrdenEstadoId'] >= 0 && $this->_tpl_vars['OrdenEstadoId']): ?>EstadoOrdenTrabajoId/<?php echo $this->_tpl_vars['OrdenEstadoId']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['NombreCliente']): ?>NombreCliente/<?php echo $this->_tpl_vars['NombreCliente']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['ProveedorNombre']): ?>ProveedorNombre/<?php echo $this->_tpl_vars['ProveedorNombre']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['FacturaId']): ?>FacturaId/<?php echo $this->_tpl_vars['FacturaId']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['FacturaTipo']): ?>FacturaTipo/<?php echo $this->_tpl_vars['FacturaTipo']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['OrdenDeTrabajoId']): ?>OrdenDeTrabajoId/<?php echo $this->_tpl_vars['OrdenDeTrabajoId']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['OrdenEstadoId'] >= 0): ?>EstadoOrdenTrabajoId/<?php echo $this->_tpl_vars['OrdenEstadoId']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['SelectedPrioridadId']): ?>PrioridadId/<?php echo $this->_tpl_vars['SelectedPrioridadId']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['filters']['NombreProveedor'] && $this->_tpl_vars['filters']['NombreProveedor'] != 'Nombre proveedor'): ?>NombreProveedor/<?php echo $this->_tpl_vars['filters']['NombreProveedor']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['filters']['Numero'] && $this->_tpl_vars['filters']['Numero'] != 'Numero'): ?>Numero/<?php echo $this->_tpl_vars['filters']['Numero']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['filters']['Estado']): ?>Estado/<?php echo $this->_tpl_vars['filters']['Estado']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['filters']['FechaDesde'] && $this->_tpl_vars['filters']['FechaDesde'] != 'Fecha cobro desde'): ?>FechaDesde/<?php echo $this->_tpl_vars['filters']['FechaDesde']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['filters']['FechaHasta'] && $this->_tpl_vars['filters']['FechaHasta'] != 'Fecha cobro hasta'): ?>FechaHasta/<?php echo $this->_tpl_vars['filters']['FechaHasta']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['filters']['NombreCliente'] && $this->_tpl_vars['filters']['NombreCliente'] != 'Nombre cliente'): ?>NombreCliente/<?php echo $this->_tpl_vars['filters']['NombreCliente']; ?>
/<?php endif; ?>pagesize/<?php echo $this->_tpl_vars['list']['pageSize']; ?>
/page/1<?php if ($this->_tpl_vars['orderBy']): ?>/order/<?php echo $this->_tpl_vars['orderBy']; ?>
_<?php echo $this->_tpl_vars['order']; ?>
<?php endif; ?><?php if ($this->_tpl_vars['search']): ?>/search/<?php echo $this->_tpl_vars['search']; ?>
<?php endif; ?>" title="Primera">&laquo; Primera</a>
                  </li>
                  <li>
                     <a href="/<?php echo $this->_tpl_vars['varController']; ?>
/<?php echo $this->_tpl_vars['varAction']; ?>
/<?php if ($this->_tpl_vars['Pagado']): ?>Pagado/<?php echo $this->_tpl_vars['Pagado']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['Pendientes']): ?>Pendientes/<?php echo $this->_tpl_vars['Pendientes']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['ProveedorId']): ?>ProveedorId/<?php echo $this->_tpl_vars['ProveedorId']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['Tipo']): ?>Tipo/<?php echo $this->_tpl_vars['Tipo']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['Nombre']): ?>Nombre/<?php echo $this->_tpl_vars['Nombre']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['EstadoSeleccionado']): ?>Estado/<?php echo $this->_tpl_vars['EstadoSeleccionado']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['FechaDesde']): ?>FechaDesde/<?php echo $this->_tpl_vars['FechaDesde']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['FechaHasta']): ?>FechaHasta/<?php echo $this->_tpl_vars['FechaHasta']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['EstadoId'] >= 0 && $this->_tpl_vars['EstadoId']): ?>EstadoOrdenTrabajoId/<?php echo $this->_tpl_vars['EstadoId']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['NombreProveedor']): ?>NombreProveedor/<?php echo $this->_tpl_vars['NombreProveedor']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['OrdenDeCompraId']): ?>OrdenDeCompraId/<?php echo $this->_tpl_vars['OrdenDeCompraId']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['OrdenEstadoId'] >= 0 && $this->_tpl_vars['OrdenEstadoId']): ?>EstadoOrdenTrabajoId/<?php echo $this->_tpl_vars['OrdenEstadoId']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['NombreCliente']): ?>NombreCliente/<?php echo $this->_tpl_vars['NombreCliente']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['ProveedorNombre']): ?>ProveedorNombre/<?php echo $this->_tpl_vars['ProveedorNombre']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['FacturaId']): ?>FacturaId/<?php echo $this->_tpl_vars['FacturaId']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['FacturaTipo']): ?>FacturaTipo/<?php echo $this->_tpl_vars['FacturaTipo']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['OrdenDeTrabajoId']): ?>OrdenDeTrabajoId/<?php echo $this->_tpl_vars['OrdenDeTrabajoId']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['OrdenEstadoId'] >= 0): ?>EstadoOrdenTrabajoId/<?php echo $this->_tpl_vars['OrdenEstadoId']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['SelectedPrioridadId']): ?>PrioridadId/<?php echo $this->_tpl_vars['SelectedPrioridadId']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['filters']['NombreProveedor'] && $this->_tpl_vars['filters']['NombreProveedor'] != 'Nombre proveedor'): ?>NombreProveedor/<?php echo $this->_tpl_vars['filters']['NombreProveedor']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['filters']['Numero'] && $this->_tpl_vars['filters']['Numero'] != 'Numero'): ?>Numero/<?php echo $this->_tpl_vars['filters']['Numero']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['filters']['Estado']): ?>Estado/<?php echo $this->_tpl_vars['filters']['Estado']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['filters']['FechaDesde'] && $this->_tpl_vars['filters']['FechaDesde'] != 'Fecha cobro desde'): ?>FechaDesde/<?php echo $this->_tpl_vars['filters']['FechaDesde']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['filters']['FechaHasta'] && $this->_tpl_vars['filters']['FechaHasta'] != 'Fecha cobro hasta'): ?>FechaHasta/<?php echo $this->_tpl_vars['filters']['FechaHasta']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['filters']['NombreCliente'] && $this->_tpl_vars['filters']['NombreCliente'] != 'Nombre cliente'): ?>NombreCliente/<?php echo $this->_tpl_vars['filters']['NombreCliente']; ?>
/<?php endif; ?>pagesize/<?php echo $this->_tpl_vars['list']['pageSize']; ?>
/page/<?php if ($this->_tpl_vars['list']['previousPage'] > 0): ?><?php echo $this->_tpl_vars['list']['previousPage']; ?>
<?php else: ?>1<?php endif; ?><?php if ($this->_tpl_vars['orderBy']): ?>/order/<?php echo $this->_tpl_vars['orderBy']; ?>
_<?php echo $this->_tpl_vars['order']; ?>
<?php endif; ?><?php if ($this->_tpl_vars['search']): ?>/search/<?php echo $this->_tpl_vars['search']; ?>
<?php endif; ?>" title="Anterior">Anterior</a>
                  </li>
                  <li>
                     <?php $_from = $this->_tpl_vars['list']['range']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['pageNum']):
?>
                        <a href="/<?php echo $this->_tpl_vars['varController']; ?>
/<?php echo $this->_tpl_vars['varAction']; ?>
/<?php if ($this->_tpl_vars['Pagado']): ?>Pagado/<?php echo $this->_tpl_vars['Pagado']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['Pendientes']): ?>Pendientes/<?php echo $this->_tpl_vars['Pendientes']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['ProveedorId']): ?>ProveedorId/<?php echo $this->_tpl_vars['ProveedorId']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['Tipo']): ?>Tipo/<?php echo $this->_tpl_vars['Tipo']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['Nombre']): ?>Nombre/<?php echo $this->_tpl_vars['Nombre']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['EstadoSeleccionado']): ?>Estado/<?php echo $this->_tpl_vars['EstadoSeleccionado']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['FechaDesde']): ?>FechaDesde/<?php echo $this->_tpl_vars['FechaDesde']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['FechaHasta']): ?>FechaHasta/<?php echo $this->_tpl_vars['FechaHasta']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['EstadoId'] >= 0 && $this->_tpl_vars['EstadoId']): ?>EstadoOrdenTrabajoId/<?php echo $this->_tpl_vars['EstadoId']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['NombreProveedor']): ?>NombreProveedor/<?php echo $this->_tpl_vars['NombreProveedor']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['OrdenDeCompraId']): ?>OrdenDeCompraId/<?php echo $this->_tpl_vars['OrdenDeCompraId']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['OrdenEstadoId'] >= 0 && $this->_tpl_vars['OrdenEstadoId']): ?>EstadoOrdenTrabajoId/<?php echo $this->_tpl_vars['OrdenEstadoId']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['NombreCliente']): ?>NombreCliente/<?php echo $this->_tpl_vars['NombreCliente']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['ProveedorNombre']): ?>ProveedorNombre/<?php echo $this->_tpl_vars['ProveedorNombre']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['FacturaId']): ?>FacturaId/<?php echo $this->_tpl_vars['FacturaId']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['FacturaTipo']): ?>FacturaTipo/<?php echo $this->_tpl_vars['FacturaTipo']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['OrdenDeTrabajoId']): ?>OrdenDeTrabajoId/<?php echo $this->_tpl_vars['OrdenDeTrabajoId']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['OrdenEstadoId'] >= 0): ?>EstadoOrdenTrabajoId/<?php echo $this->_tpl_vars['OrdenEstadoId']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['SelectedPrioridadId']): ?>PrioridadId/<?php echo $this->_tpl_vars['SelectedPrioridadId']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['filters']['NombreProveedor'] && $this->_tpl_vars['filters']['NombreProveedor'] != 'Nombre proveedor'): ?>NombreProveedor/<?php echo $this->_tpl_vars['filters']['NombreProveedor']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['filters']['Numero'] && $this->_tpl_vars['filters']['Numero'] != 'Numero'): ?>Numero/<?php echo $this->_tpl_vars['filters']['Numero']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['filters']['Estado']): ?>Estado/<?php echo $this->_tpl_vars['filters']['Estado']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['filters']['FechaDesde'] && $this->_tpl_vars['filters']['FechaDesde'] != 'Fecha cobro desde'): ?>FechaDesde/<?php echo $this->_tpl_vars['filters']['FechaDesde']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['filters']['FechaHasta'] && $this->_tpl_vars['filters']['FechaHasta'] != 'Fecha cobro hasta'): ?>FechaHasta/<?php echo $this->_tpl_vars['filters']['FechaHasta']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['filters']['NombreCliente'] && $this->_tpl_vars['filters']['NombreCliente'] != 'Nombre cliente'): ?>NombreCliente/<?php echo $this->_tpl_vars['filters']['NombreCliente']; ?>
/<?php endif; ?>pagesize/<?php echo $this->_tpl_vars['list']['pageSize']; ?>
/page/<?php echo $this->_tpl_vars['pageNum']; ?>
<?php if ($this->_tpl_vars['orderBy']): ?>/order/<?php echo $this->_tpl_vars['orderBy']; ?>
_<?php echo $this->_tpl_vars['order']; ?>
<?php endif; ?><?php if ($this->_tpl_vars['search']): ?>/search/<?php echo $this->_tpl_vars['search']; ?>
<?php endif; ?>" title="Página <?php echo $this->_tpl_vars['pageNum']; ?>
" <?php if ($this->_tpl_vars['pageNum'] == $this->_tpl_vars['list']['page']): ?>class="active"<?php endif; ?>><?php echo $this->_tpl_vars['pageNum']; ?>
</a>
                     <?php endforeach; endif; unset($_from); ?>
                  </li>
                  <li>
                     <a href="/<?php echo $this->_tpl_vars['varController']; ?>
/<?php echo $this->_tpl_vars['varAction']; ?>
/<?php if ($this->_tpl_vars['Pagado']): ?>Pagado/<?php echo $this->_tpl_vars['Pagado']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['Pendientes']): ?>Pendientes/<?php echo $this->_tpl_vars['Pendientes']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['ProveedorId']): ?>ProveedorId/<?php echo $this->_tpl_vars['ProveedorId']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['Tipo']): ?>Tipo/<?php echo $this->_tpl_vars['Tipo']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['Nombre']): ?>Nombre/<?php echo $this->_tpl_vars['Nombre']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['EstadoSeleccionado']): ?>Estado/<?php echo $this->_tpl_vars['EstadoSeleccionado']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['FechaDesde']): ?>FechaDesde/<?php echo $this->_tpl_vars['FechaDesde']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['FechaHasta']): ?>FechaHasta/<?php echo $this->_tpl_vars['FechaHasta']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['EstadoId'] >= 0 && $this->_tpl_vars['EstadoId']): ?>EstadoOrdenTrabajoId/<?php echo $this->_tpl_vars['EstadoId']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['NombreProveedor']): ?>NombreProveedor/<?php echo $this->_tpl_vars['NombreProveedor']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['OrdenDeCompraId']): ?>OrdenDeCompraId/<?php echo $this->_tpl_vars['OrdenDeCompraId']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['OrdenEstadoId'] >= 0 && $this->_tpl_vars['OrdenEstadoId']): ?>EstadoOrdenTrabajoId/<?php echo $this->_tpl_vars['OrdenEstadoId']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['NombreCliente']): ?>NombreCliente/<?php echo $this->_tpl_vars['NombreCliente']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['ProveedorNombre']): ?>ProveedorNombre/<?php echo $this->_tpl_vars['ProveedorNombre']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['FacturaId']): ?>FacturaId/<?php echo $this->_tpl_vars['FacturaId']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['FacturaTipo']): ?>FacturaTipo/<?php echo $this->_tpl_vars['FacturaTipo']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['OrdenDeTrabajoId']): ?>OrdenDeTrabajoId/<?php echo $this->_tpl_vars['OrdenDeTrabajoId']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['OrdenEstadoId'] >= 0): ?>EstadoOrdenTrabajoId/<?php echo $this->_tpl_vars['OrdenEstadoId']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['SelectedPrioridadId']): ?>PrioridadId/<?php echo $this->_tpl_vars['SelectedPrioridadId']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['filters']['NombreProveedor'] && $this->_tpl_vars['filters']['NombreProveedor'] != 'Nombre proveedor'): ?>NombreProveedor/<?php echo $this->_tpl_vars['filters']['NombreProveedor']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['filters']['Numero'] && $this->_tpl_vars['filters']['Numero'] != 'Numero'): ?>Numero/<?php echo $this->_tpl_vars['filters']['Numero']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['filters']['Estado']): ?>Estado/<?php echo $this->_tpl_vars['filters']['Estado']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['filters']['FechaDesde'] && $this->_tpl_vars['filters']['FechaDesde'] != 'Fecha cobro desde'): ?>FechaDesde/<?php echo $this->_tpl_vars['filters']['FechaDesde']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['filters']['FechaHasta'] && $this->_tpl_vars['filters']['FechaHasta'] != 'Fecha cobro hasta'): ?>FechaHasta/<?php echo $this->_tpl_vars['filters']['FechaHasta']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['filters']['NombreCliente'] && $this->_tpl_vars['filters']['NombreCliente'] != 'Nombre cliente'): ?>NombreCliente/<?php echo $this->_tpl_vars['filters']['NombreCliente']; ?>
/<?php endif; ?>pagesize/<?php echo $this->_tpl_vars['list']['pageSize']; ?>
/page/<?php if ($this->_tpl_vars['list']['nextPage'] < $this->_tpl_vars['list']['pageCount']): ?><?php echo $this->_tpl_vars['list']['nextPage']; ?>
<?php else: ?><?php echo $this->_tpl_vars['list']['pageCount']; ?>
<?php endif; ?><?php if ($this->_tpl_vars['orderBy']): ?>/order/<?php echo $this->_tpl_vars['orderBy']; ?>
_<?php echo $this->_tpl_vars['order']; ?>
<?php endif; ?><?php if ($this->_tpl_vars['search']): ?>/search/<?php echo $this->_tpl_vars['search']; ?>
<?php endif; ?>" title="Siguiente">Siguiente</a>
                  </li>
                  <li>
                     <a href="/<?php echo $this->_tpl_vars['varController']; ?>
/<?php echo $this->_tpl_vars['varAction']; ?>
/<?php if ($this->_tpl_vars['Pagado']): ?>Pagado/<?php echo $this->_tpl_vars['Pagado']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['Pendientes']): ?>Pendientes/<?php echo $this->_tpl_vars['Pendientes']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['ProveedorId']): ?>ProveedorId/<?php echo $this->_tpl_vars['ProveedorId']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['Tipo']): ?>Tipo/<?php echo $this->_tpl_vars['Tipo']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['Nombre']): ?>Nombre/<?php echo $this->_tpl_vars['Nombre']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['EstadoSeleccionado']): ?>Estado/<?php echo $this->_tpl_vars['EstadoSeleccionado']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['FechaDesde']): ?>FechaDesde/<?php echo $this->_tpl_vars['FechaDesde']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['FechaHasta']): ?>FechaHasta/<?php echo $this->_tpl_vars['FechaHasta']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['EstadoId'] >= 0 && $this->_tpl_vars['EstadoId']): ?>EstadoOrdenTrabajoId/<?php echo $this->_tpl_vars['EstadoId']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['NombreProveedor']): ?>NombreProveedor/<?php echo $this->_tpl_vars['NombreProveedor']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['OrdenDeCompraId']): ?>OrdenDeCompraId/<?php echo $this->_tpl_vars['OrdenDeCompraId']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['OrdenEstadoId'] >= 0 && $this->_tpl_vars['OrdenEstadoId']): ?>EstadoOrdenTrabajoId/<?php echo $this->_tpl_vars['OrdenEstadoId']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['NombreCliente']): ?>NombreCliente/<?php echo $this->_tpl_vars['NombreCliente']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['ProveedorNombre']): ?>ProveedorNombre/<?php echo $this->_tpl_vars['ProveedorNombre']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['FacturaId']): ?>FacturaId/<?php echo $this->_tpl_vars['FacturaId']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['FacturaTipo']): ?>FacturaTipo/<?php echo $this->_tpl_vars['FacturaTipo']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['OrdenDeTrabajoId']): ?>OrdenDeTrabajoId/<?php echo $this->_tpl_vars['OrdenDeTrabajoId']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['OrdenEstadoId'] >= 0): ?>EstadoOrdenTrabajoId/<?php echo $this->_tpl_vars['OrdenEstadoId']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['SelectedPrioridadId']): ?>PrioridadId/<?php echo $this->_tpl_vars['SelectedPrioridadId']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['filters']['NombreProveedor'] && $this->_tpl_vars['filters']['NombreProveedor'] != 'Nombre proveedor'): ?>NombreProveedor/<?php echo $this->_tpl_vars['filters']['NombreProveedor']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['filters']['Numero'] && $this->_tpl_vars['filters']['Numero'] != 'Numero'): ?>Numero/<?php echo $this->_tpl_vars['filters']['Numero']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['filters']['Estado']): ?>Estado/<?php echo $this->_tpl_vars['filters']['Estado']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['filters']['FechaDesde'] && $this->_tpl_vars['filters']['FechaDesde'] != 'Fecha cobro desde'): ?>FechaDesde/<?php echo $this->_tpl_vars['filters']['FechaDesde']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['filters']['FechaHasta'] && $this->_tpl_vars['filters']['FechaHasta'] != 'Fecha cobro hasta'): ?>FechaHasta/<?php echo $this->_tpl_vars['filters']['FechaHasta']; ?>
/<?php endif; ?><?php if ($this->_tpl_vars['filters']['NombreCliente'] && $this->_tpl_vars['filters']['NombreCliente'] != 'Nombre cliente'): ?>NombreCliente/<?php echo $this->_tpl_vars['filters']['NombreCliente']; ?>
/<?php endif; ?>pagesize/<?php echo $this->_tpl_vars['list']['pageSize']; ?>
/page/<?php echo $this->_tpl_vars['list']['pageCount']; ?>
<?php if ($this->_tpl_vars['orderBy']): ?>/order/<?php echo $this->_tpl_vars['orderBy']; ?>
_<?php echo $this->_tpl_vars['order']; ?>
<?php endif; ?><?php if ($this->_tpl_vars['search']): ?>/search/<?php echo $this->_tpl_vars['search']; ?>
<?php endif; ?>" title="Última">Ultima &raquo;</a>
                  </li>
               </ul> <!-- /paginadorOptions -->
            
            </div> <!-- /listPaginador -->