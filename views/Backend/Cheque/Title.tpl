            <div class="listTop">
                <div>
                    <table border="0" cellpadding="0" cellspacing="0">
                        <tr>
                        <!-- 
                            <td width="2%"><input type="checkbox" class="check" id="check_all" /></td>
                             -->
                            
                            <td width="10%"><a href="/{$varController}/{$varAction}/{if $Nombre}Nombre/{$Nombre}/{/if}{if $filters.NombreProveedor && $filters.NombreProveedor != 'Nombre proveedor'}NombreProveedor/{$filters.NombreProveedor}/{/if}{if $filters.Numero && $filters.Numero != 'Numero'}Numero/{$filters.Numero}/{/if}{if $filters.Estado}Estado/{$filters.Estado}/{/if}{if $filters.FechaDesde && $filters.FechaDesde != 'Fecha cobro desde'}FechaDesde/{$filters.FechaDesde}/{/if}{if $filters.FechaHasta && $filters.FechaHasta != 'Fecha cobro hasta'}FechaHasta/{$filters.FechaHasta}/{/if}{if $filters.NombreCliente && $filters.NombreCliente != 'Nombre cliente'}NombreCliente/{$filters.NombreCliente}/{/if}{if $Codigo}Codigo/{$Codigo}/{/if}pagesize/{$list.pageSize}/page/{$list.page}/order/Numero_{if $order eq 'DESC'}ASC{else}DESC{/if}{if $search}/search/{$search}{/if}" class="{if $orderBy eq 'Numero'}{if $order eq 'ASC'}orderUp{else}orderDown{/if}{else}orderNone{/if}" title="Nombre">Banco</a></td>
                            
                            <td width="10%"><a href="/{$varController}/{$varAction}/{if $Nombre}Nombre/{$Nombre}/{/if}{if $filters.NombreProveedor && $filters.NombreProveedor != 'Nombre proveedor'}NombreProveedor/{$filters.NombreProveedor}/{/if}{if $filters.Numero && $filters.Numero != 'Numero'}Numero/{$filters.Numero}/{/if}{if $filters.Estado}Estado/{$filters.Estado}/{/if}{if $filters.FechaDesde && $filters.FechaDesde != 'Fecha cobro desde'}FechaDesde/{$filters.FechaDesde}/{/if}{if $filters.FechaHasta && $filters.FechaHasta != 'Fecha cobro hasta'}FechaHasta/{$filters.FechaHasta}/{/if}{if $filters.NombreCliente && $filters.NombreCliente != 'Nombre cliente'}NombreCliente/{$filters.NombreCliente}/{/if}{if $Codigo}Codigo/{$Codigo}/{/if}pagesize/{$list.pageSize}/page/{$list.page}/order/Numero_{if $order eq 'DESC'}ASC{else}DESC{/if}{if $search}/search/{$search}{/if}" class="{if $orderBy eq 'Numero'}{if $order eq 'ASC'}orderUp{else}orderDown{/if}{else}orderNone{/if}" title="Numero">Numero</a></td>
                            
                            <td width="10%"><a href="/{$varController}/{$varAction}/{if $Nombre}Nombre/{$Nombre}/{/if}{if $filters.NombreProveedor && $filters.NombreProveedor != 'Nombre proveedor'}NombreProveedor/{$filters.NombreProveedor}/{/if}{if $filters.Numero && $filters.Numero != 'Numero'}Numero/{$filters.Numero}/{/if}{if $filters.Estado}Estado/{$filters.Estado}/{/if}{if $filters.FechaDesde && $filters.FechaDesde != 'Fecha cobro desde'}FechaDesde/{$filters.FechaDesde}/{/if}{if $filters.FechaHasta && $filters.FechaHasta != 'Fecha cobro hasta'}FechaHasta/{$filters.FechaHasta}/{/if}{if $filters.NombreCliente && $filters.NombreCliente != 'Nombre cliente'}NombreCliente/{$filters.NombreCliente}/{/if}{if $Codigo}Codigo/{$Codigo}/{/if}pagesize/{$list.pageSize}/page/{$list.page}/order/Importe_{if $order eq 'DESC'}ASC{else}DESC{/if}{if $search}/search/{$search}{/if}" class="{if $orderBy eq 'Importe'}{if $order eq 'ASC'}orderUp{else}orderDown{/if}{else}orderNone{/if}" title="Indica el estado">Importe</a></td>
                            
                            <td width="10%"><a href="/{$varController}/{$varAction}/{if $Nombre}Nombre/{$Nombre}/{/if}{if $filters.NombreProveedor && $filters.NombreProveedor != 'Nombre proveedor'}NombreProveedor/{$filters.NombreProveedor}/{/if}{if $filters.Numero && $filters.Numero != 'Numero'}Numero/{$filters.Numero}/{/if}{if $filters.Estado}Estado/{$filters.Estado}/{/if}{if $filters.FechaDesde && $filters.FechaDesde != 'Fecha cobro desde'}FechaDesde/{$filters.FechaDesde}/{/if}{if $filters.FechaHasta && $filters.FechaHasta != 'Fecha cobro hasta'}FechaHasta/{$filters.FechaHasta}/{/if}{if $filters.NombreCliente && $filters.NombreCliente != 'Nombre cliente'}NombreCliente/{$filters.NombreCliente}/{/if}{if $Codigo}Codigo/{$Codigo}/{/if}pagesize/{$list.pageSize}/page/{$list.page}/order/Estado_{if $order eq 'DESC'}ASC{else}DESC{/if}{if $search}/search/{$search}{/if}" class="{if $orderBy eq 'Estado'}{if $order eq 'ASC'}orderUp{else}orderDown{/if}{else}orderNone{/if}" title="Indica el estado">Estado</a></td>
                            
                            <td width="10%"><a href="/{$varController}/{$varAction}/{if $Nombre}Nombre/{$Nombre}/{/if}{if $filters.NombreProveedor && $filters.NombreProveedor != 'Nombre proveedor'}NombreProveedor/{$filters.NombreProveedor}/{/if}{if $filters.Numero && $filters.Numero != 'Numero'}Numero/{$filters.Numero}/{/if}{if $filters.Estado}Estado/{$filters.Estado}/{/if}{if $filters.FechaDesde && $filters.FechaDesde != 'Fecha cobro desde'}FechaDesde/{$filters.FechaDesde}/{/if}{if $filters.FechaHasta && $filters.FechaHasta != 'Fecha cobro hasta'}FechaHasta/{$filters.FechaHasta}/{/if}{if $filters.NombreCliente && $filters.NombreCliente != 'Nombre cliente'}NombreCliente/{$filters.NombreCliente}/{/if}{if $Codigo}Codigo/{$Codigo}/{/if}pagesize/{$list.pageSize}/page/{$list.page}/order/FechaEmision_{if $order eq 'DESC'}ASC{else}DESC{/if}{if $search}/search/{$search}{/if}" class="{if $orderBy eq 'FechaEmision'}{if $order eq 'ASC'}orderUp{else}orderDown{/if}{else}orderNone{/if}" title="">Emision</a></td>
                            <td width="10%"><a href="/{$varController}/{$varAction}/{if $Nombre}Nombre/{$Nombre}/{/if}{if $filters.NombreProveedor && $filters.NombreProveedor != 'Nombre proveedor'}NombreProveedor/{$filters.NombreProveedor}/{/if}{if $filters.Numero && $filters.Numero != 'Numero'}Numero/{$filters.Numero}/{/if}{if $filters.Estado}Estado/{$filters.Estado}/{/if}{if $filters.FechaDesde && $filters.FechaDesde != 'Fecha cobro desde'}FechaDesde/{$filters.FechaDesde}/{/if}{if $filters.FechaHasta && $filters.FechaHasta != 'Fecha cobro hasta'}FechaHasta/{$filters.FechaHasta}/{/if}{if $filters.NombreCliente && $filters.NombreCliente != 'Nombre cliente'}NombreCliente/{$filters.NombreCliente}/{/if}{if $Codigo}Codigo/{$Codigo}/{/if}pagesize/{$list.pageSize}/page/{$list.page}/order/FechaCobro_{if $order eq 'DESC'}ASC{else}DESC{/if}{if $search}/search/{$search}{/if}" class="{if $orderBy eq 'FechaCobro'}{if $order eq 'ASC'}orderUp{else}orderDown{/if}{else}orderNone{/if}" title="">Cobro</a></td>
                            <td width="10%"><a href="/{$varController}/{$varAction}/{if $Nombre}Nombre/{$Nombre}/{/if}{if $filters.NombreProveedor && $filters.NombreProveedor != 'Nombre proveedor'}NombreProveedor/{$filters.NombreProveedor}/{/if}{if $filters.Numero && $filters.Numero != 'Numero'}Numero/{$filters.Numero}/{/if}{if $filters.Estado}Estado/{$filters.Estado}/{/if}{if $filters.FechaDesde && $filters.FechaDesde != 'Fecha cobro desde'}FechaDesde/{$filters.FechaDesde}/{/if}{if $filters.FechaHasta && $filters.FechaHasta != 'Fecha cobro hasta'}FechaHasta/{$filters.FechaHasta}/{/if}{if $filters.NombreCliente && $filters.NombreCliente != 'Nombre cliente'}NombreCliente/{$filters.NombreCliente}/{/if}{if $Codigo}Codigo/{$Codigo}/{/if}pagesize/{$list.pageSize}/page/{$list.page}/order/FechaVencimiento_{if $order eq 'DESC'}ASC{else}DESC{/if}{if $search}/search/{$search}{/if}" class="{if $orderBy eq 'FechaVencimiento'}{if $order eq 'ASC'}orderUp{else}orderDown{/if}{else}orderNone{/if}" title="">Vencimiento</a></td>
                            
                            <td width="10%"><a href="/{$varController}/{$varAction}/{if $Nombre}Nombre/{$Nombre}/{/if}{if $filters.NombreProveedor && $filters.NombreProveedor != 'Nombre proveedor'}NombreProveedor/{$filters.NombreProveedor}/{/if}{if $filters.Numero && $filters.Numero != 'Numero'}Numero/{$filters.Numero}/{/if}{if $filters.Estado}Estado/{$filters.Estado}/{/if}{if $filters.FechaDesde && $filters.FechaDesde != 'Fecha cobro desde'}FechaDesde/{$filters.FechaDesde}/{/if}{if $filters.FechaHasta && $filters.FechaHasta != 'Fecha cobro hasta'}FechaHasta/{$filters.FechaHasta}/{/if}{if $filters.NombreCliente && $filters.NombreCliente != 'Nombre cliente'}NombreCliente/{$filters.NombreCliente}/{/if}{if $Codigo}Codigo/{$Codigo}/{/if}pagesize/{$list.pageSize}/page/{$list.page}/order/cl.Nombre_{if $order eq 'DESC'}ASC{else}DESC{/if}{if $search}/search/{$search}{/if}" class="{if $orderBy eq 'cl.Nombre'}{if $order eq 'ASC'}orderUp{else}orderDown{/if}{else}orderNone{/if}" title="">Cliente</a></td>
                            <td width="10%"><a href="/{$varController}/{$varAction}/{if $Nombre}Nombre/{$Nombre}/{/if}{if $filters.NombreProveedor && $filters.NombreProveedor != 'Nombre proveedor'}NombreProveedor/{$filters.NombreProveedor}/{/if}{if $filters.Numero && $filters.Numero != 'Numero'}Numero/{$filters.Numero}/{/if}{if $filters.Estado}Estado/{$filters.Estado}/{/if}{if $filters.FechaDesde && $filters.FechaDesde != 'Fecha cobro desde'}FechaDesde/{$filters.FechaDesde}/{/if}{if $filters.FechaHasta && $filters.FechaHasta != 'Fecha cobro hasta'}FechaHasta/{$filters.FechaHasta}/{/if}{if $filters.NombreCliente && $filters.NombreCliente != 'Nombre cliente'}NombreCliente/{$filters.NombreCliente}/{/if}{if $Codigo}Codigo/{$Codigo}/{/if}pagesize/{$list.pageSize}/page/{$list.page}/order/p.Nombre_{if $order eq 'DESC'}ASC{else}DESC{/if}{if $search}/search/{$search}{/if}" class="{if $orderBy eq 'p.Nombre'}{if $order eq 'ASC'}orderUp{else}orderDown{/if}{else}orderNone{/if}" title="">Proveedor</a></td>
                            
                            
                            <td width="6%"><p>Acciones</p></td>
                        </tr>
                    </table>
                </div>
            </div> <!-- /listadoTop -->