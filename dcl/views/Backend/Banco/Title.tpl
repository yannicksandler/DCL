            <div class="listTop">
                <div>
                    <table border="0" cellpadding="0" cellspacing="0">
                        <tr>
                            <td width="2%"><input type="checkbox" class="check" id="check_all" /></td>
                            
                            <td width="10%"><a href="/{$varController}/{$varAction}/pagesize/{$list.pageSize}/page/{$list.page}/order/Codigo_{if $order eq 'DESC'}ASC{else}DESC{/if}{if $search}/search/{$search}{/if}" class="{if $orderBy eq 'Codigo'}{if $order eq 'ASC'}orderUp{else}orderDown{/if}{else}orderNone{/if}" title="Numero">Codigo</a></td>
                            <td width="10%"><a href="/{$varController}/{$varAction}/pagesize/{$list.pageSize}/page/{$list.page}/order/Nombre_{if $order eq 'DESC'}ASC{else}DESC{/if}{if $search}/search/{$search}{/if}" class="{if $orderBy eq 'Nombre'}{if $order eq 'ASC'}orderUp{else}orderDown{/if}{else}orderNone{/if}" title="Nombre">Nombre</a></td>
                            <td width="10%"><a href="/{$varController}/{$varAction}/pagesize/{$list.pageSize}/page/{$list.page}/order/TipoBanco_{if $order eq 'DESC'}ASC{else}DESC{/if}{if $search}/search/{$search}{/if}" class="{if $orderBy eq 'TipoBanco'}{if $order eq 'ASC'}orderUp{else}orderDown{/if}{else}orderNone{/if}" title="">Tipo</a></td>
                              
                            
                            <td width="6%"><p>Opciones</p></td>
                        </tr>
                    </table>
                </div>
            </div> <!-- /listadoTop -->