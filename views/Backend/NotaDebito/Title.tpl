            <div class="listTop">
                <div>
                    <table border="0" cellpadding="0" cellspacing="0">
                        <tr>
                            
                            
                            
                            <td width="10%"><a href="/{$varController}/{$varAction}/{if $FechaDesde}FechaDesde/{$FechaDesde}/{/if}{if $FechaHasta}FechaHasta/{$FechaHasta}/{/if}{if $Pagado}Pagado/{$Pagado}/{/if}{if $ProveedorId}ProveedorId/{$ProveedorId}/{/if}{if $OrdenDeCompraId}OrdenDeCompraId/{$OrdenDeCompraId}/{/if}{if $OrdenDePagoId}OrdenDePagoId/{$OrdenDePagoId}/{/if}pagesize/{$list.pageSize}/page/{$list.page}/order/Fecha_{if $order eq 'DESC'}ASC{else}DESC{/if}{if $search}/search/{$search}{/if}" class="{if $orderBy eq 'Fecha'}{if $order eq 'ASC'}orderUp{else}orderDown{/if}{else}orderNone{/if}" title="Fecha">Fecha</a></td>
                            <td width="10%"><a href="/{$varController}/{$varAction}/{if $FechaDesde}FechaDesde/{$FechaDesde}/{/if}{if $FechaHasta}FechaHasta/{$FechaHasta}/{/if}{if $Pagado}Pagado/{$Pagado}/{/if}{if $ProveedorId}ProveedorId/{$ProveedorId}/{/if}{if $OrdenDeCompraId}OrdenDeCompraId/{$OrdenDeCompraId}/{/if}{if $OrdenDePagoId}OrdenDePagoId/{$OrdenDePagoId}/{/if}pagesize/{$list.pageSize}/page/{$list.page}/order/Id_{if $order eq 'DESC'}ASC{else}DESC{/if}{if $search}/search/{$search}{/if}" class="{if $orderBy eq 'Id'}{if $order eq 'ASC'}orderUp{else}orderDown{/if}{else}orderNone{/if}" title="Orden de pago">ND</a></td>
                            <td width="10%"><a href="/{$varController}/{$varAction}/{if $FechaDesde}FechaDesde/{$FechaDesde}/{/if}{if $FechaHasta}FechaHasta/{$FechaHasta}/{/if}{if $Pagado}Pagado/{$Pagado}/{/if}{if $ProveedorId}ProveedorId/{$ProveedorId}/{/if}{if $OrdenDeCompraId}OrdenDeCompraId/{$OrdenDeCompraId}/{/if}{if $OrdenDePagoId}OrdenDePagoId/{$OrdenDePagoId}/{/if}pagesize/{$list.pageSize}/page/{$list.page}/order/Importe_{if $order eq 'DESC'}ASC{else}DESC{/if}{if $search}/search/{$search}{/if}" class="{if $orderBy eq 'Importe'}{if $order eq 'ASC'}orderUp{else}orderDown{/if}{else}orderNone{/if}" title="Importe total">Importe</a></td>
                            <td width="20%"><p href="/{$varController}/{$varAction}/{if $FechaDesde}FechaDesde/{$FechaDesde}/{/if}{if $FechaHasta}FechaHasta/{$FechaHasta}/{/if}{if $Pagado}Pagado/{$Pagado}/{/if}{if $ProveedorId}ProveedorId/{$ProveedorId}/{/if}{if $OrdenDeCompraId}OrdenDeCompraId/{$OrdenDeCompraId}/{/if}{if $OrdenDePagoId}OrdenDePagoId/{$OrdenDePagoId}/{/if}pagesize/{$list.pageSize}/page/{$list.page}/order/Id_{if $order eq 'DESC'}ASC{else}DESC{/if}{if $search}/search/{$search}{/if}" class="{if $orderBy eq 'Id'}{if $order eq 'ASC'}orderUp{else}orderDown{/if}{else}orderNone{/if}" title="Proveedor">Cliente</p></td>
                            
                            <td width="5%"><p>Acciones</p></td>
                        </tr>
                    </table>
                </div>
            </div> <!-- /listadoTop -->