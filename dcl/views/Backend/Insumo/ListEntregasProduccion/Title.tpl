
            <div class="listTop">
                <div>
                    <table border="0" cellpadding="0" cellspacing="0">
                        <tr>
                            <!--<td width="2%"><input type="checkbox" class="check" id="check_all" /></td>-->
                            
                            <td width="5%"><p href="/{$varController}/{$varAction}/{if $Pagado}Pagado/{$Pagado}/{/if}{if $EstadoId >= 0}EstadoOrdenTrabajoId/{$EstadoId}/{/if}{if $NombreProveedor}NombreProveedor/{$NombreProveedor}/{/if}{if $OrdenDeCompraId}OrdenDeCompraId/{$OrdenDeCompraId}/{/if}pagesize/{$list.pageSize}/page/{$list.page}/order/Insumo.Orden.Id_{if $order eq 'DESC'}ASC{else}DESC{/if}{if $search}/search/{$search}{/if}" class="{if $orderBy eq 'Insumo.Orden.Id'}{if $order eq 'ASC'}orderUp{else}orderDown{/if}{else}orderNone{/if}" title="Orden de trabajo">Orden</p></td>
                            <td width="10%"><p href="/{$varController}/{$varAction}/{if $Pagado}Pagado/{$Pagado}/{/if}{if $EstadoId >= 0}EstadoOrdenTrabajoId/{$EstadoId}/{/if}{if $NombreProveedor}NombreProveedor/{$NombreProveedor}/{/if}{if $OrdenDeCompraId}OrdenDeCompraId/{$OrdenDeCompraId}/{/if}pagesize/{$list.pageSize}/page/{$list.page}/order/Nombre_{if $order eq 'DESC'}ASC{else}DESC{/if}{if $search}/search/{$search}{/if}" class="{if $orderBy eq 'Nombre'}{if $order eq 'ASC'}orderUp{else}orderDown{/if}{else}orderNone{/if}" title="Nombre">Nombre</p></td>
                            <td width="10%"><p href="/{$varController}/{$varAction}/{if $Pagado}Pagado/{$Pagado}/{/if}{if $EstadoId >= 0}EstadoOrdenTrabajoId/{$EstadoId}/{/if}{if $NombreProveedor}NombreProveedor/{$NombreProveedor}/{/if}{if $OrdenDeCompraId}OrdenDeCompraId/{$OrdenDeCompraId}/{/if}pagesize/{$list.pageSize}/page/{$list.page}/order/Insumo.Proveedor.Nombre_{if $order eq 'DESC'}ASC{else}DESC{/if}{if $search}/search/{$search}{/if}" class="{if $orderBy eq 'Insumo.Proveedor.Nombre'}{if $order eq 'ASC'}orderUp{else}orderDown{/if}{else}orderNone{/if}" title="Proveedor">Proveedor</p></td>
                            
                            <td width="8%"><p href="/{$varController}/{$varAction}/{if $Pagado}Pagado/{$Pagado}/{/if}{if $EstadoId >= 0}EstadoOrdenTrabajoId/{$EstadoId}/{/if}{if $NombreProveedor}NombreProveedor/{$NombreProveedor}/{/if}{if $OrdenDeCompraId}OrdenDeCompraId/{$OrdenDeCompraId}/{/if}pagesize/{$list.pageSize}/page/{$list.page}/order/Insumo.Orden.Estado.Nombre_{if $order eq 'DESC'}ASC{else}DESC{/if}{if $search}/search/{$search}{/if}" class="{if $orderBy eq 'Insumo.Orden.Estado.Nombre'}{if $order eq 'ASC'}orderUp{else}orderDown{/if}{else}orderNone{/if}" title="Estado de orden">Estado</p></td>
                            <td width="10%"><p href="/{$varController}/{$varAction}/{if $Pagado}Pagado/{$Pagado}/{/if}{if $EstadoId >= 0}EstadoOrdenTrabajoId/{$EstadoId}/{/if}{if $NombreProveedor}NombreProveedor/{$NombreProveedor}/{/if}{if $OrdenDeCompraId}OrdenDeCompraId/{$OrdenDeCompraId}/{/if}pagesize/{$list.pageSize}/page/{$list.page}/order/Insumo.Orden.Cliente.Nombre_{if $order eq 'DESC'}ASC{else}DESC{/if}{if $search}/search/{$search}{/if}" class="{if $orderBy eq 'Insumo.Orden.Cliente.Nombre'}{if $order eq 'ASC'}orderUp{else}orderDown{/if}{else}orderNone{/if}" title="Cliente">Cliente</p></td>
                            
                            <td width="8%"><p href="/{$varController}/{$varAction}/{if $Pagado}Pagado/{$Pagado}/{/if}{if $EstadoId >= 0}EstadoOrdenTrabajoId/{$EstadoId}/{/if}{if $NombreProveedor}NombreProveedor/{$NombreProveedor}/{/if}{if $OrdenDeCompraId}OrdenDeCompraId/{$OrdenDeCompraId}/{/if}pagesize/{$list.pageSize}/page/{$list.page}/order/Insumo.OrdenDeCompra.Fecha_{if $order eq 'DESC'}ASC{else}DESC{/if}{if $search}/search/{$search}{/if}" class="{if $orderBy eq 'Insumo.OrdenDeCompra.Fecha'}{if $order eq 'ASC'}orderUp{else}orderDown{/if}{else}orderNone{/if}" title="Fecha Orden de compra">Dias restantes</p></td>
                            
                            <td width="8%"><p href="/{$varController}/{$varAction}/{if $OrdenEstadoId >= 0}EstadoOrdenTrabajoId/{$OrdenEstadoId}/{/if}{if $NombreCliente}NombreCliente/{$NombreCliente}/{/if}{if $OrdenDeTrabajoId}OrdenDeTrabajoId/{$OrdenDeTrabajoId}/{/if}{if $SelectedPrioridadId}PrioridadId/{$SelectedPrioridadId}/{/if}pagesize/{$list.pageSize}/page/{$list.page}/order/o.Estado.Nombre_{if $order eq 'DESC'}ASC{else}DESC{/if}{if $search}/search/{$search}{/if}" class="{if $orderBy eq 'o.Estado.Nombre'}{if $order eq 'ASC'}orderUp{else}orderDown{/if}{else}orderNone{/if}" title="Dias para finalizar proyecto y entregar al cliente">Finalizacion</p></td>
                            
                            <td width="10%"><p title="Total s/IVA">Total s/IVA</p></td>
                              
                            <td width="10%"><p>Acciones</p></td>
                            
                        </tr>
                    </table>
                </div>
            </div> <!-- /listadoTop -->