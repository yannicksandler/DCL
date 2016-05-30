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

	$('.VerOrdenDeTrabajo').click(function() {
        
        var url 		= $(this).attr('href');
        var opciones="toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=yes, width=1000, height=700, top=85, left=140";

		abrirPopUp(url, opciones);

		return false;
    });
    
});

function abrirPopUp(pagina, opciones)
{
	window.open(pagina,"",opciones);
}

</script>
{/literal}


<div class="list">
<h1>Ordenes de compra validadas</h1>

<h2>Cantidad: {$OrdenesDeCompraLiquidadas|@count}</h2>
        		<div class="listTop">
					<div>
						<table border="0" cellpadding="0" cellspacing="0">
							<tr>
								<td width="10%"><p>Fecha</p></td>
								<td width="10%"><p>OC</p></td>
								<td width="30%"><p>Insumo</p></td>
								
								<td width="10%"><p>Total</p></td>
								<td width="10%"><p>Validado</p></td>
							</tr>
						</table>
					</div>
                </div> <!-- /listadoTop -->
                
        <div class="listItems listItemsScroll">
                        
				<table border="0" cellpadding="0" cellspacing="0">
				
					{if !$OrdenesDeCompraLiquidadas|@count}
						<h2>No hay ordenes de compra agregadas</h2>
					{else}
					<!-- items -->
					
					{foreach from=$OrdenesDeCompraLiquidadas item="agregada"}
						<tr>
							<td width="10%">
								<p class="">
										{$agregada.OrdenDeCompra.Fecha}
								</p>
							</td>
							<td width="10%">
								<p class="">
										<!-- puedo lista de base de datos o de sesion -->
										# {if $agregada.OrdenDeCompra.Id}{$agregada.OrdenDeCompra.Id}{else}{$agregada.OrdenDeCompraId}{/if}
										
										<a class="VerOrdenDeTrabajo" href="/Orden/Edit/id/{$agregada.OrdenDeCompra.OrdenDeTrabajoId}"> 
											<img src="/images/icons/zoom_in.png" title="({$agregada.OrdenDeCompra.Entregado}) - {$agregada.OrdenDeCompra.FormaDePago}"/>
										</a>
								</p>
							</td>
							<td width="30%">
								<p class="">
									<img src="/images/icons/bullet_go.png" alt="item" title="Item"/> 
										{$agregada.OrdenDeCompra.NombreInsumo}
								</p>
								
							</td>
							<td width="10%">
								
								<p class="">
										$ {$agregada.OrdenDeCompra.Importe}
								</p>
								
							</td>
							<td width="10%">
								<p class="">
										$ {$agregada.ImporteLiquidado}
								</p>
							</td>
						</tr>
                    {/foreach}
					<!-- items -->
					{/if}
				</table>
            </div> <!-- /listItems -->
            
</div> <!-- /list -->         					