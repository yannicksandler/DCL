            <div class="listTop">
                <div>
                    <table border="0" cellpadding="0" cellspacing="0">
                        <tr>
                            
                            <td width="10%"><a href="/{$varController}/{$varAction}/{if $FechaDesde}FechaDesde/{$FechaDesde}/{/if}{if $FechaHasta}FechaHasta/{$FechaHasta}/{/if}{if $FacturaId}FacturaId/{$FacturaId}/{/if}{if $ClienteNombre}ClienteNombre/{$ClienteNombre}/{/if}pagesize/{$list.pageSize}/page/{$list.page}/order/NumeroInterno_{if $order eq 'DESC'}ASC{else}DESC{/if}{if $search}/search/{$search}{/if}" class="{if $orderBy eq 'NumeroInterno'}{if $order eq 'ASC'}orderUp{else}orderDown{/if}{else}orderNone{/if}" title="Numero">Interno</a></td>
                            <td width="10%"><p href="/{$varController}/{$varAction}/{if $FechaDesde}FechaDesde/{$FechaDesde}/{/if}{if $FechaHasta}FechaHasta/{$FechaHasta}/{/if}{if $FacturaId}FacturaId/{$FacturaId}/{/if}{if $ClienteNombre}ClienteNombre/{$ClienteNombre}/{/if}pagesize/{$list.pageSize}/page/{$list.page}/order/Id_{if $order eq 'DESC'}ASC{else}DESC{/if}{if $search}/search/{$search}{/if}" class="{if $orderBy eq 'Id'}{if $order eq 'ASC'}orderUp{else}orderDown{/if}{else}orderNone{/if}" title="Numero">Numero</p></td>
                            <td width="10%"><p href="/{$varController}/{$varAction}/{if $FechaDesde}FechaDesde/{$FechaDesde}/{/if}{if $FechaHasta}FechaHasta/{$FechaHasta}/{/if}{if $FacturaId}FacturaId/{$FacturaId}/{/if}{if $ClienteNombre}ClienteNombre/{$ClienteNombre}/{/if}pagesize/{$list.pageSize}/page/{$list.page}/order/Fecha_{if $order eq 'DESC'}ASC{else}DESC{/if}{if $search}/search/{$search}{/if}" class="{if $orderBy eq 'Fecha'}{if $order eq 'ASC'}orderUp{else}orderDown{/if}{else}orderNone{/if}" title="Fecha">Fecha</p></td>
                            <td width="10%"><p href="/{$varController}/{$varAction}/{if $FechaDesde}FechaDesde/{$FechaDesde}/{/if}{if $FechaHasta}FechaHasta/{$FechaHasta}/{/if}{if $FacturaId}FacturaId/{$FacturaId}/{/if}{if $ClienteNombre}ClienteNombre/{$ClienteNombre}/{/if}pagesize/{$list.pageSize}/page/{$list.page}/order/Factura.Cliente.RazonSocial_{if $order eq 'DESC'}ASC{else}DESC{/if}{if $search}/search/{$search}{/if}" class="{if $orderBy eq 'Factura.Cliente.RazonSocial'}{if $order eq 'ASC'}orderUp{else}orderDown{/if}{else}orderNone{/if}" title="Proveedor">Proveedor</p></td>
                            <td width="10%"><p href="/{$varController}/{$varAction}/{if $FechaDesde}FechaDesde/{$FechaDesde}/{/if}{if $FechaHasta}FechaHasta/{$FechaHasta}/{/if}{if $FacturaId}FacturaId/{$FacturaId}/{/if}{if $ClienteNombre}ClienteNombre/{$ClienteNombre}/{/if}pagesize/{$list.pageSize}/page/{$list.page}/order/Importe_{if $order eq 'DESC'}ASC{else}DESC{/if}{if $search}/search/{$search}{/if}" class="{if $orderBy eq 'Importe'}{if $order eq 'ASC'}orderUp{else}orderDown{/if}{else}orderNone{/if}" title="Importe total">Total</p></td>
                            
                            <td width="10%"><p href="/{$varController}/{$varAction}/{if $FechaDesde}FechaDesde/{$FechaDesde}/{/if}{if $FechaHasta}FechaHasta/{$FechaHasta}/{/if}{if $FacturaId}FacturaId/{$FacturaId}/{/if}{if $ClienteNombre}ClienteNombre/{$ClienteNombre}/{/if}pagesize/{$list.pageSize}/page/{$list.page}/order/Importe_{if $order eq 'DESC'}ASC{else}DESC{/if}{if $search}/search/{$search}{/if}" class="{if $orderBy eq 'Importe'}{if $order eq 'ASC'}orderUp{else}orderDown{/if}{else}orderNone{/if}" title="Importe pendiente de pago">Pendiente</p></td>
                            
                            <td width="10%"><p href="/{$varController}/{$varAction}/{if $FechaDesde}FechaDesde/{$FechaDesde}/{/if}{if $FechaHasta}FechaHasta/{$FechaHasta}/{/if}{if $FacturaId}FacturaId/{$FacturaId}/{/if}{if $ClienteNombre}ClienteNombre/{$ClienteNombre}/{/if}pagesize/{$list.pageSize}/page/{$list.page}/order/Importe_{if $order eq 'DESC'}ASC{else}DESC{/if}{if $search}/search/{$search}{/if}" class="{if $orderBy eq 'Importe'}{if $order eq 'ASC'}orderUp{else}orderDown{/if}{else}orderNone{/if}" title="Tipo de factura">Tipo</p></td>
                            
                            <td width="20%"><p href="/{$varController}/{$varAction}/{if $FechaDesde}FechaDesde/{$FechaDesde}/{/if}{if $FechaHasta}FechaHasta/{$FechaHasta}/{/if}{if $FacturaId}FacturaId/{$FacturaId}/{/if}{if $ClienteNombre}ClienteNombre/{$ClienteNombre}/{/if}pagesize/{$list.pageSize}/page/{$list.page}/order/Importe_{if $order eq 'DESC'}ASC{else}DESC{/if}{if $search}/search/{$search}{/if}" class="{if $orderBy eq 'Importe'}{if $order eq 'ASC'}orderUp{else}orderDown{/if}{else}orderNone{/if}" title="Importe pendiente de pago">Validacion</p></td>
                            
                            
                            <td width="10%"><p>Acciones</p></td>
                        </tr>
                    </table>
                </div>
            </div> <!-- /listadoTop -->