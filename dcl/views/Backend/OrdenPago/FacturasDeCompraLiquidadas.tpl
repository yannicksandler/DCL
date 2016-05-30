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
<h1>Facturas de compra liquidadas</h1>

<h2>Cantidad: {$FacturasDeCompraLiquidadas|@count}</h2>
        		<div class="listTop">
					<div>
						<table border="0" cellpadding="0" cellspacing="0">
							<tr>
								<td width="10%"><p>Fecha de grabacion</p></td>
								<td width="10%"><p>FC</p></td>
								
								<td width="10%"><p>Liquidado</p></td>
							</tr>
						</table>
					</div>
                </div> <!-- /listadoTop -->
                
        <div class="listItems listItemsScroll">
                        
				<table border="0" cellpadding="0" cellspacing="0">
				
					{if !$FacturasDeCompraLiquidadas|@count}
						<h2>No hay ordenes de compra agregadas</h2>
					{else}
					<!-- items -->
					
					{foreach from=$FacturasDeCompraLiquidadas item="agregada"}
						<tr>
							<td width="10%">
								<p class="">
										{$agregada.FechaGrabacion}
								</p>
							</td>
							<td width="10%">
								<p class="">
										<!-- puedo lista de base de datos o de sesion -->
										# {$agregada.FacturaNumero}
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