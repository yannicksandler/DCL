            <div class="listTop">
                <div>
                    <table border="0" cellpadding="0" cellspacing="0">
                        <tr>
                            <td width="2%"><input type="checkbox" class="check" id="check_all" /></td>
                            
                            <td width="5%"><a href="/{$varController}/{$varAction}/{if $OrdenEstadoId >= 0}EstadoOrdenTrabajoId/{$OrdenEstadoId}/{/if}{if $NombreCliente}NombreCliente/{$NombreCliente}/{/if}{if $OrdenDeTrabajoId}OrdenDeTrabajoId/{$OrdenDeTrabajoId}/{/if}{if $SelectedPrioridadId}PrioridadId/{$SelectedPrioridadId}/{/if}pagesize/{$list.pageSize}/page/{$list.page}/order/Id_{if $order eq 'DESC'}ASC{else}DESC{/if}{if $search}/search/{$search}{/if}" class="{if $orderBy eq 'Id'}{if $order eq 'ASC'}orderUp{else}orderDown{/if}{else}orderNone{/if}" title="Numero">Numero</a></td>
                            
                            <td width="10%"><p href="/{$varController}/{$varAction}/{if $OrdenEstadoId >= 0}EstadoOrdenTrabajoId/{$OrdenEstadoId}/{/if}{if $NombreCliente}NombreCliente/{$NombreCliente}/{/if}{if $OrdenDeTrabajoId}OrdenDeTrabajoId/{$OrdenDeTrabajoId}/{/if}{if $SelectedPrioridadId}PrioridadId/{$SelectedPrioridadId}/{/if}pagesize/{$list.pageSize}/page/{$list.page}/order/Producto_{if $order eq 'DESC'}ASC{else}DESC{/if}{if $search}/search/{$search}{/if}" class="{if $orderBy eq 'Producto'}{if $order eq 'ASC'}orderUp{else}orderDown{/if}{else}orderNone{/if}" title="Producto">Producto</p></td>
                            <td width="10%"><p href="/{$varController}/{$varAction}/{if $OrdenEstadoId >= 0}EstadoOrdenTrabajoId/{$OrdenEstadoId}/{/if}{if $NombreCliente}NombreCliente/{$NombreCliente}/{/if}{if $OrdenDeTrabajoId}OrdenDeTrabajoId/{$OrdenDeTrabajoId}/{/if}{if $SelectedPrioridadId}PrioridadId/{$SelectedPrioridadId}/{/if}pagesize/{$list.pageSize}/page/{$list.page}/order/o.Cliente.Nombre_{if $order eq 'DESC'}ASC{else}DESC{/if}{if $search}/search/{$search}{/if}" class="{if $orderBy eq 'o.Cliente.Nombre'}{if $order eq 'ASC'}orderUp{else}orderDown{/if}{else}orderNone{/if}" title="Nombre cliente">Nombre cliente</p></td>
                            <td width="10%"><p href="/{$varController}/{$varAction}/{if $OrdenEstadoId >= 0}EstadoOrdenTrabajoId/{$OrdenEstadoId}/{/if}{if $NombreCliente}NombreCliente/{$NombreCliente}/{/if}{if $OrdenDeTrabajoId}OrdenDeTrabajoId/{$OrdenDeTrabajoId}/{/if}{if $SelectedPrioridadId}PrioridadId/{$SelectedPrioridadId}/{/if}pagesize/{$list.pageSize}/page/{$list.page}/order/o.Estado.Nombre_{if $order eq 'DESC'}ASC{else}DESC{/if}{if $search}/search/{$search}{/if}" class="{if $orderBy eq 'o.Estado.Nombre'}{if $order eq 'ASC'}orderUp{else}orderDown{/if}{else}orderNone{/if}" title="Estado">Estado</p></td>
                            <td width="10%"><p href="/{$varController}/{$varAction}/{if $OrdenEstadoId >= 0}EstadoOrdenTrabajoId/{$OrdenEstadoId}/{/if}{if $NombreCliente}NombreCliente/{$NombreCliente}/{/if}{if $OrdenDeTrabajoId}OrdenDeTrabajoId/{$OrdenDeTrabajoId}/{/if}{if $SelectedPrioridadId}PrioridadId/{$SelectedPrioridadId}/{/if}pagesize/{$list.pageSize}/page/{$list.page}/order/o.DiasProximoCambioEstado_{if $order eq 'DESC'}ASC{else}DESC{/if}{if $search}/search/{$search}{/if}" class="{if $orderBy eq 'o.DiasProximoCambioEstado'}{if $order eq 'ASC'}orderUp{else}orderDown{/if}{else}orderNone{/if}" title="Dias para proximo cambio de estado">Proximo cambio</p></td>
                            
                            <td width="10%"><p href="/{$varController}/{$varAction}/{if $OrdenEstadoId >= 0}EstadoOrdenTrabajoId/{$OrdenEstadoId}/{/if}{if $NombreCliente}NombreCliente/{$NombreCliente}/{/if}{if $OrdenDeTrabajoId}OrdenDeTrabajoId/{$OrdenDeTrabajoId}/{/if}{if $SelectedPrioridadId}PrioridadId/{$SelectedPrioridadId}/{/if}pagesize/{$list.pageSize}/page/{$list.page}/order/PrioridadId_{if $order eq 'DESC'}ASC{else}DESC{/if}{if $search}/search/{$search}{/if}" class="{if $orderBy eq 'PrioridadId'}{if $order eq 'ASC'}orderUp{else}orderDown{/if}{else}orderNone{/if}" title="Prioridad">Prioridad</p></td>
                            <td width="12%"><p href="/{$varController}/{$varAction}/{if $OrdenEstadoId >= 0}EstadoOrdenTrabajoId/{$OrdenEstadoId}/{/if}{if $NombreCliente}NombreCliente/{$NombreCliente}/{/if}{if $OrdenDeTrabajoId}OrdenDeTrabajoId/{$OrdenDeTrabajoId}/{/if}{if $SelectedPrioridadId}PrioridadId/{$SelectedPrioridadId}/{/if}pagesize/{$list.pageSize}/page/{$list.page}/order/DescripcionDeTrabajo_{if $order eq 'DESC'}ASC{else}DESC{/if}{if $search}/search/{$search}{/if}" class="{if $orderBy eq 'DescripcionDeTrabajo'}{if $order eq 'ASC'}orderUp{else}orderDown{/if}{else}orderNone{/if}" title="Descripcion">Descripcion</p></td>
                              
                            
                            <td width="8%"><p>Opciones</p></td>
                        </tr>
                    </table>
                </div>
            </div> <!-- /listadoTop -->