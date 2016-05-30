            <div class="listTop">
                <div>
                    <table border="0" cellpadding="0" cellspacing="0">
                        <tr>
                            <td width="2%"><input type="checkbox" class="check" id="check_all" /></td>
                            
                            
                            <td width="15%"><p href="/{$varController}/{$varAction}/pagesize/{$list.pageSize}/page/{$list.page}/order/Nombre_{if $order eq 'DESC'}ASC{else}DESC{/if}{if $search}/search/{$search}{/if}" class="{if $orderBy eq 'Nombre'}{if $order eq 'ASC'}orderUp{else}orderDown{/if}{else}orderNone{/if}" title="Nombre">Nombre</p></td>
                            
                            
                            
                            <td width="6%"><p>Acciones</p></td>
                        </tr>
                    </table>
                </div>
            </div> <!-- /listadoTop -->