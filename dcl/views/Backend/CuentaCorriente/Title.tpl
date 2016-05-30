
            <div class="listTop">
                <div>
                    <table border="0" cellpadding="0" cellspacing="0">
                        <tr>
                            <td width="10%"><p href="/{$varController}/{$varAction}/pagesize/{$list.pageSize}/page/{$list.page}/order/Id_{if $order eq 'DESC'}ASC{else}DESC{/if}{if $search}/search/{$search}{/if}" class="{if $orderBy eq 'Id'}{if $order eq 'ASC'}orderUp{else}orderDown{/if}{else}orderNone{/if}" title="Numero">Fecha</p></td>
                            {if !$BancoId}
                            <td width="10%"><p href="/{$varController}/{$varAction}/pagesize/{$list.pageSize}/page/{$list.page}/order/Id_{if $order eq 'DESC'}ASC{else}DESC{/if}{if $search}/search/{$search}{/if}" class="{if $orderBy eq 'Id'}{if $order eq 'ASC'}orderUp{else}orderDown{/if}{else}orderNone{/if}" title="Documento de negocio">Documento</p></td>
                            {/if}
                            <td width="40%"><p href="/{$varController}/{$varAction}/pagesize/{$list.pageSize}/page/{$list.page}/order/Id_{if $order eq 'DESC'}ASC{else}DESC{/if}{if $search}/search/{$search}{/if}" class="{if $orderBy eq 'Id'}{if $order eq 'ASC'}orderUp{else}orderDown{/if}{else}orderNone{/if}" title="Numero">Detalle</p></td>
                            
                            <td width="10%"><p href="/{$varController}/{$varAction}/pagesize/{$list.pageSize}/page/{$list.page}/order/Id_{if $order eq 'DESC'}ASC{else}DESC{/if}{if $search}/search/{$search}{/if}" class="{if $orderBy eq 'Id'}{if $order eq 'ASC'}orderUp{else}orderDown{/if}{else}orderNone{/if}" title="Numero">Debe</p></td>
                            <td width="10%"><p href="/{$varController}/{$varAction}/pagesize/{$list.pageSize}/page/{$list.page}/order/Id_{if $order eq 'DESC'}ASC{else}DESC{/if}{if $search}/search/{$search}{/if}" class="{if $orderBy eq 'Id'}{if $order eq 'ASC'}orderUp{else}orderDown{/if}{else}orderNone{/if}" title="Numero">Haber</p></td>
                            <td width="10%"><p href="/{$varController}/{$varAction}/pagesize/{$list.pageSize}/page/{$list.page}/order/Id_{if $order eq 'DESC'}ASC{else}DESC{/if}{if $search}/search/{$search}{/if}" class="{if $orderBy eq 'Id'}{if $order eq 'ASC'}orderUp{else}orderDown{/if}{else}orderNone{/if}" title="Numero">Saldo</p></td>
                            
                            {if $BancoId and $IsPerfilAdministrador}
                            <td width="10%"><p href="/{$varController}/{$varAction}/pagesize/{$list.pageSize}/page/{$list.page}/order/Id_{if $order eq 'DESC'}ASC{else}DESC{/if}{if $search}/search/{$search}{/if}" class="{if $orderBy eq 'Id'}{if $order eq 'ASC'}orderUp{else}orderDown{/if}{else}orderNone{/if}" title="Accion">Accion</p></td>
                            {/if}  
                            
                        </tr>
                    </table>
                </div>
            </div> <!-- /listadoTop -->