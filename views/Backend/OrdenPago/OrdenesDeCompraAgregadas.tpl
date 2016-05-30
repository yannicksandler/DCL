{if $OrdenesDeCompraAgregadas|@count}
{literal}
<script type="text/javascript">
$(document).ready(function(){
    $(".EliminarOrdenDePagoOrdenDeCompra").click(function(){
        var OrdenDeCompraId	=	$(this).attr('OrdenDePagoOrdenDeCompra');
        
      //alert(OrdenDeCompraId);  
        if(OrdenDeCompraId > 0)
        	EliminarOrdenDeCompra(OrdenDeCompraId);
        else
            alert('La orden de compra no es correcta');
        
        return false;
    });

    $(".EditarInsumo").click(function(){
        url	=	$(this).attr('href');

		var opciones="toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=yes, width=1000, height=700, top=85, left=140";

		abrirPopUp(url, opciones);

        return false;
    });
    
});

</script>
{/literal}


<div class="list">
<h1>Ordenes de compra asociadas</h1>

<h2>Total: $ {$TotalOrdenesDeCompraAgregadas}</h2>
<h2>Cantidad: {$OrdenesDeCompraAgregadas|@count}</h2>
        		<div class="listTop">
					<div>
						<table border="0" cellpadding="0" cellspacing="0">
							<tr>
								<td width="10%"><p>Fecha</p></td>
								<td width="10%"><p>Codigo</p></td>
								<td width="30%"><p>Insumo</p></td>
								
								<td width="10%"><p>Cantidad</p></td>
								<td width="10%"><p title="Importe unitario sin IVA">Importe</p></td>
								<td width="10%"><p>Total</p></td>
								<td width="10%"><p>Abonado</p></td>
								
								<td width="10%"><p>Acciones</p></td>
							</tr>
						</table>
					</div>
                </div> <!-- /listadoTop -->
                
        <div class="listItems listItemsScroll">
                        
				<table border="0" cellpadding="0" cellspacing="0">
				
					{if !$OrdenesDeCompraAgregadas|@count}
						<h2>No hay ordenes de compra agregadas</h2>
					{else}
					<!-- items -->
					
					{foreach from=$OrdenesDeCompraAgregadas item="agregada"}
						<tr>
							<td width="10%">
								<p class="">
										{$agregada.Fecha}
								</p>
							</td>
							<td width="10%">
								<p class="">
										{$agregada.Id}
								</p>
							</td>
							<td width="30%">
								{foreach from=$agregada.Insumo item="i"}
								<table border="0" cellspacing="0">
								  <tr>
								    <td>
								    <p><img src="/images/icons/bullet_go.png" alt="item" title="Item"/> {$i.Nombre}</p>
								    </td>
								  </tr>
								  <tr>
								    <td>
								    <p><img src="/images/icons/money.png" title=""/> Forma de pago: {if $i.FormaDePago}{$i.FormaDePago}{else}<img src="/images/icons/error.png" title="Debe ingresar la forma de pago al insumo"/>{/if}</p>
								    </td>
								  </tr>
								</table>
								{/foreach}
								
								
							</td>
							<td width="10%">
								{foreach from=$agregada.Insumo item="in"}
								<p class="">
										{$in.Cantidad}
								</p>
								{/foreach}
							</td>
							<td width="10%">
								{foreach from=$agregada.Insumo item="insum"}
								<p class="">
										$ {$insum.PrecioUnitarioSinIVA}
								</p>
								{/foreach}
							</td>
							<td width="10%">
								{foreach from=$agregada.Insumo item="i4"}
								<p class="">
										$ {$i4.PrecioUnitarioSinIVA*$i4.Cantidad}
								</p>
								{/foreach}
							</td>
							<td width="10%">
								<p class="">
										$ {$agregada.ImporteAbonado}
								</p>
							</td>
							<td width="10%" align="center">
								    
								    <p id="delete{$agregada.Id}">
								    <input type="button" class="EliminarOrdenDePagoOrdenDeCompra btDelete" OrdenDePagoOrdenDeCompra="{foreach from=$agregada.OrdenDePagoOrdenDeCompra item="opocom"}{$opocom.Id}{/foreach}" title="Eliminar orden de compra">
								    </p>
								    {foreach from=$agregada.Insumo item="insumo"}
										<a class="EditarInsumo" href="/Insumo/Edit/Orden/{$insumo.OrdenId}/id/{$insumo.Id}"><img src="/images/icons/layout_edit.png" title="Editar insumo"/></a>
									{/foreach}                    
							</td>
						</tr>
                    {/foreach}
					<!-- items -->
					{/if}
				</table>
            </div> <!-- /listItems -->
            
</div> <!-- /list -->         		
{/if}			