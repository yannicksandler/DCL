
            <div class="listTop">
                <div>
                    <table border="0" cellpadding="0" cellspacing="0">
                        <tr>
                            
                            <td width="15%"><p href="/{$varController}/{$varAction}/{if $Pagado}Pagado/{$Pagado}/{/if}{if $EstadoId >= 0}EstadoOrdenTrabajoId/{$EstadoId}/{/if}{if $NombreProveedor}NombreProveedor/{$NombreProveedor}/{/if}{if $OrdenDeCompraId}OrdenDeCompraId/{$OrdenDeCompraId}/{/if}pagesize/{$list.pageSize}/page/{$list.page}/order/Nombre_{if $order eq 'DESC'}ASC{else}DESC{/if}{if $search}/search/{$search}{/if}" class="{if $orderBy eq 'Nombre'}{if $order eq 'ASC'}orderUp{else}orderDown{/if}{else}orderNone{/if}" title="Nombre del insumo de la orden de compra">Nombre</p></td>
                            <td width="10%"><p title="Total">Importe</p></td>
                            <td width="10%"><p title="Condicion de pago">Condicion</p></td>
                            <td width="10%"><p href="/{$varController}/{$varAction}/{if $Pagado}Pagado/{$Pagado}/{/if}{if $EstadoId >= 0}EstadoOrdenTrabajoId/{$EstadoId}/{/if}{if $NombreProveedor}NombreProveedor/{$NombreProveedor}/{/if}{if $OrdenDeCompraId}OrdenDeCompraId/{$OrdenDeCompraId}/{/if}pagesize/{$list.pageSize}/page/{$list.page}/order/i.Proveedor.Nombre_{if $order eq 'DESC'}ASC{else}DESC{/if}{if $search}/search/{$search}{/if}" class="{if $orderBy eq 'i.Proveedor.Nombre'}{if $order eq 'ASC'}orderUp{else}orderDown{/if}{else}orderNone{/if}" title="Proveedor">Proveedor</p></td>
                            
                            <td width="10%"><p href="/{$varController}/{$varAction}/{if $Pagado}Pagado/{$Pagado}/{/if}{if $EstadoId >= 0}EstadoOrdenTrabajoId/{$EstadoId}/{/if}{if $NombreProveedor}NombreProveedor/{$NombreProveedor}/{/if}{if $OrdenDeCompraId}OrdenDeCompraId/{$OrdenDeCompraId}/{/if}pagesize/{$list.pageSize}/page/{$list.page}/order/OrdenId_{if $order eq 'DESC'}ASC{else}DESC{/if}{if $search}/search/{$search}{/if}" class="{if $orderBy eq 'OrdenId'}{if $order eq 'ASC'}orderUp{else}orderDown{/if}{else}orderNone{/if}" title="Orden de trabajo">O.T.</p></td>
                            
                            <td width="10%"><p href="/{$varController}/{$varAction}/{if $Pagado}Pagado/{$Pagado}/{/if}{if $EstadoId >= 0}EstadoOrdenTrabajoId/{$EstadoId}/{/if}{if $NombreProveedor}NombreProveedor/{$NombreProveedor}/{/if}{if $OrdenDeCompraId}OrdenDeCompraId/{$OrdenDeCompraId}/{/if}pagesize/{$list.pageSize}/page/{$list.page}/order/i.Orden.Cliente.Nombre_{if $order eq 'DESC'}ASC{else}DESC{/if}{if $search}/search/{$search}{/if}" class="{if $orderBy eq 'i.Orden.Cliente.Nombre'}{if $order eq 'ASC'}orderUp{else}orderDown{/if}{else}orderNone{/if}" title="Cliente">Cliente</p></td>
                              
                            <td width="10%"><p>Acciones</p></td>
                            
                        </tr>
                    </table>
                </div>
            </div> <!-- /listadoTop -->