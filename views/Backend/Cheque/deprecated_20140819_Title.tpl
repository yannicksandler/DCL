            <div class="listTop">
                <div>
                    <table border="0" cellpadding="0" cellspacing="0">
                        <tr>
                        <!-- 
                            <td width="2%"><input type="checkbox" class="check" id="check_all" /></td>
                             -->
                            
                            <td width="10%"><p href="/{$varController}/{$varAction}/pagesize/{$list.pageSize}/page/{$list.page}/order/Nombre_{if $order eq 'DESC'}ASC{else}DESC{/if}{if $search}/search/{$search}{/if}" class="{if $orderBy eq 'Nombre'}{if $order eq 'ASC'}orderUp{else}orderDown{/if}{else}orderNone{/if}" title="Nombre">Banco</p></td>
                            
                            <td width="10%"><p href="/{$varController}/{$varAction}/{if $Nombre}Nombre/{$Nombre}/{/if}{if $Codigo}Codigo/{$Codigo}/{/if}pagesize/{$list.pageSize}/page/{$list.page}/order/FechaBaja_{if $order eq 'DESC'}ASC{else}DESC{/if}{if $search}/search/{$search}{/if}" class="{if $orderBy eq 'FechaBaja'}{if $order eq 'ASC'}orderUp{else}orderDown{/if}{else}orderNone{/if}" title="Indica el estado">Numero</p></td>
                            
                            <td width="10%"><p href="/{$varController}/{$varAction}/{if $Nombre}Nombre/{$Nombre}/{/if}{if $Codigo}Codigo/{$Codigo}/{/if}pagesize/{$list.pageSize}/page/{$list.page}/order/FechaBaja_{if $order eq 'DESC'}ASC{else}DESC{/if}{if $search}/search/{$search}{/if}" class="{if $orderBy eq 'FechaBaja'}{if $order eq 'ASC'}orderUp{else}orderDown{/if}{else}orderNone{/if}" title="Indica el estado">Importe</p></td>
                            
                            <td width="10%"><p href="/{$varController}/{$varAction}/{if $Nombre}Nombre/{$Nombre}/{/if}{if $Codigo}Codigo/{$Codigo}/{/if}pagesize/{$list.pageSize}/page/{$list.page}/order/FechaBaja_{if $order eq 'DESC'}ASC{else}DESC{/if}{if $search}/search/{$search}{/if}" class="{if $orderBy eq 'FechaBaja'}{if $order eq 'ASC'}orderUp{else}orderDown{/if}{else}orderNone{/if}" title="Indica el estado">Estado</p></td>
                            
                            <td width="10%"><p href="/{$varController}/{$varAction}/{if $Nombre}Nombre/{$Nombre}/{/if}{if $Codigo}Codigo/{$Codigo}/{/if}pagesize/{$list.pageSize}/page/{$list.page}/order/FechaBaja_{if $order eq 'DESC'}ASC{else}DESC{/if}{if $search}/search/{$search}{/if}" class="{if $orderBy eq 'FechaBaja'}{if $order eq 'ASC'}orderUp{else}orderDown{/if}{else}orderNone{/if}" title="Indica el estado">Emision</p></td>
                            <td width="10%"><p href="/{$varController}/{$varAction}/{if $Nombre}Nombre/{$Nombre}/{/if}{if $Codigo}Codigo/{$Codigo}/{/if}pagesize/{$list.pageSize}/page/{$list.page}/order/FechaBaja_{if $order eq 'DESC'}ASC{else}DESC{/if}{if $search}/search/{$search}{/if}" class="{if $orderBy eq 'FechaBaja'}{if $order eq 'ASC'}orderUp{else}orderDown{/if}{else}orderNone{/if}" title="Indica el estado">Cobro</p></td>
                            <td width="10%"><p href="/{$varController}/{$varAction}/{if $Nombre}Nombre/{$Nombre}/{/if}{if $Codigo}Codigo/{$Codigo}/{/if}pagesize/{$list.pageSize}/page/{$list.page}/order/FechaBaja_{if $order eq 'DESC'}ASC{else}DESC{/if}{if $search}/search/{$search}{/if}" class="{if $orderBy eq 'FechaBaja'}{if $order eq 'ASC'}orderUp{else}orderDown{/if}{else}orderNone{/if}" title="Indica el estado">Vencimiento</p></td>
                            
                            <td width="10%"><p href="/{$varController}/{$varAction}/{if $Nombre}Nombre/{$Nombre}/{/if}{if $Codigo}Codigo/{$Codigo}/{/if}pagesize/{$list.pageSize}/page/{$list.page}/order/FechaBaja_{if $order eq 'DESC'}ASC{else}DESC{/if}{if $search}/search/{$search}{/if}" class="{if $orderBy eq 'FechaBaja'}{if $order eq 'ASC'}orderUp{else}orderDown{/if}{else}orderNone{/if}" title="Indica el estado">Cliente</p></td>
                            <td width="10%"><p href="/{$varController}/{$varAction}/{if $Nombre}Nombre/{$Nombre}/{/if}{if $Codigo}Codigo/{$Codigo}/{/if}pagesize/{$list.pageSize}/page/{$list.page}/order/FechaBaja_{if $order eq 'DESC'}ASC{else}DESC{/if}{if $search}/search/{$search}{/if}" class="{if $orderBy eq 'FechaBaja'}{if $order eq 'ASC'}orderUp{else}orderDown{/if}{else}orderNone{/if}" title="Indica el estado">Proveedor</p></td>
                            
                            
                            <td width="6%"><p>Acciones</p></td>
                        </tr>
                    </table>
                </div>
            </div> <!-- /listadoTop -->