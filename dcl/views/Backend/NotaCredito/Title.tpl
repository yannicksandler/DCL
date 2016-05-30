{literal}
<script>

$(document).ready(function(){

	
});
</script>
{/literal}
            <div class="listTop">
                <div>
                    <table border="0" cellpadding="0" cellspacing="0">
                        <tr>
                            
                            
                            <td width="10%"><a href="/{$varController}/{$varAction}/pagesize/{$list.pageSize}/page/{$list.page}/order/Fecha_{if $order eq 'DESC'}ASC{else}DESC{/if}{if $search}/search/{$search}{/if}" class="{if $orderBy eq 'Fecha'}{if $order eq 'ASC'}orderUp{else}orderDown{/if}{else}orderNone{/if}" title="Razon social">Fecha</a></td>
                            <td width="10%"><a href="/{$varController}/{$varAction}/pagesize/{$list.pageSize}/page/{$list.page}/order/Id_{if $order eq 'DESC'}ASC{else}DESC{/if}{if $search}/search/{$search}{/if}" class="{if $orderBy eq 'Id'}{if $order eq 'ASC'}orderUp{else}orderDown{/if}{else}orderNone{/if}" title="Razon social">Numero</a></td>
                            <td width="10%"><p href="/{$varController}/{$varAction}/pagesize/{$list.pageSize}/page/{$list.page}/order/Credito.Cliente.RazonSocial_{if $order eq 'DESC'}ASC{else}DESC{/if}{if $search}/search/{$search}{/if}" class="{if $orderBy eq 'Credito.Cliente.RazonSocial'}{if $order eq 'ASC'}orderUp{else}orderDown{/if}{else}orderNone{/if}" title="Razon social">Cliente</p></td>
                            <td width="10%"><p href="/{$varController}/{$varAction}/pagesize/{$list.pageSize}/page/{$list.page}/order/Descripcion_{if $order eq 'DESC'}ASC{else}DESC{/if}{if $search}/search/{$search}{/if}" class="{if $orderBy eq 'Descripcion'}{if $order eq 'ASC'}orderUp{else}orderDown{/if}{else}orderNone{/if}" title="Razon social">Detalle</p></td>
                            <td width="10%"><p href="/{$varController}/{$varAction}/pagesize/{$list.pageSize}/page/{$list.page}/order/Importe_{if $order eq 'DESC'}ASC{else}DESC{/if}{if $search}/search/{$search}{/if}" class="{if $orderBy eq 'Importe'}{if $order eq 'ASC'}orderUp{else}orderDown{/if}{else}orderNone{/if}" title="Importe">Importe</p></td>
                       
                            
                            <td width="6%"><p>Acciones</p></td>
                        </tr>
                    </table>
                </div>
            </div> <!-- /listadoTop -->