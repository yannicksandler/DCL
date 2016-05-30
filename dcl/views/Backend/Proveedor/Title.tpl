            <div class="listTop">
                <div>
                    <table border="0" cellpadding="0" cellspacing="0">
                        <tr>
                            <td width="2%"><input type="checkbox" class="check" id="check_all" /></td>
                            
                            <td width="15%"><a href="/{$varController}/{$varAction}/pagesize/{$list.pageSize}/page/{$list.page}/order/Nombre_{if $order eq 'DESC'}ASC{else}DESC{/if}{if $search}/search/{$search}{/if}" class="{if $orderBy eq 'Nombre'}{if $order eq 'ASC'}orderUp{else}orderDown{/if}{else}orderNone{/if}" title="Nombre">Nombre</a></td>
                            <td width="15%"><a href="/{$varController}/{$varAction}/pagesize/{$list.pageSize}/page/{$list.page}/order/Nombre_{if $order eq 'DESC'}ASC{else}DESC{/if}{if $search}/search/{$search}{/if}" class="{if $orderBy eq 'Nombre'}{if $order eq 'ASC'}orderUp{else}orderDown{/if}{else}orderNone{/if}" title="Nombre">Rubro</a></td>
                            <td width="12%"><a href="/{$varController}/{$varAction}/pagesize/{$list.pageSize}/page/{$list.page}/order/Localidad_{if $order eq 'DESC'}ASC{else}DESC{/if}{if $search}/search/{$search}{/if}" class="{if $orderBy eq 'Localidad'}{if $order eq 'ASC'}orderUp{else}orderDown{/if}{else}orderNone{/if}" title="Localidad">Localidad</a></td>
                            <td width="15%"><a href="/{$varController}/{$varAction}/pagesize/{$list.pageSize}/page/{$list.page}/order/Direccion_{if $order eq 'DESC'}ASC{else}DESC{/if}{if $search}/search/{$search}{/if}" class="{if $orderBy eq 'Direccion'}{if $order eq 'ASC'}orderUp{else}orderDown{/if}{else}orderNone{/if}" title="Direccion">Direccion</a></td>
                            <td width="10%"><a href="/{$varController}/{$varAction}/pagesize/{$list.pageSize}/page/{$list.page}/order/CodigoPostal_{if $order eq 'DESC'}ASC{else}DESC{/if}{if $search}/search/{$search}{/if}" class="{if $orderBy eq 'CodigoPostal'}{if $order eq 'ASC'}orderUp{else}orderDown{/if}{else}orderNone{/if}" title="Codigo postal">Codigo postal</a></td>
                            <td width="10%"><a href="/{$varController}/{$varAction}/pagesize/{$list.pageSize}/page/{$list.page}/order/Telefono_{if $order eq 'DESC'}ASC{else}DESC{/if}{if $search}/search/{$search}{/if}" class="{if $orderBy eq 'Telefono'}{if $order eq 'ASC'}orderUp{else}orderDown{/if}{else}orderNone{/if}" title="Telefono">Telefono</a></td>
                            <td width="10%"><a href="/{$varController}/{$varAction}/pagesize/{$list.pageSize}/page/{$list.page}/order/Fax_{if $order eq 'DESC'}ASC{else}DESC{/if}{if $search}/search/{$search}{/if}" class="{if $orderBy eq 'Fax'}{if $order eq 'ASC'}orderUp{else}orderDown{/if}{else}orderNone{/if}" title="Fax">Fax</a></td>
                              
                            
                            <td width="6%"><p>Opciones</p></td>
                        </tr>
                    </table>
                </div>
            </div> <!-- /listadoTop -->