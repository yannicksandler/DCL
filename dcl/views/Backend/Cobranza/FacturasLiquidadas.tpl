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
<h1>Facturas liquidadas</h1>

<h2>Cantidad: {$FacturasLiquidadas|@count}</h2>
        		<div class="listTop">
					<div>
						<table border="0" cellpadding="0" cellspacing="0">
							<tr>
								<td width="10%"><p>FA</p></td>
								
								<td width="10%"><p>Liquidado</p></td>
							</tr>
						</table>
					</div>
                </div> <!-- /listadoTop -->
                
        <div class="listItems listItemsScroll">
                        
				<table border="0" cellpadding="0" cellspacing="0">
				
					{if !$FacturasLiquidadas|@count}
						<h2>No hay ordenes de compra agregadas</h2>
					{else}
					<!-- items -->
					
					{foreach from=$FacturasLiquidadas item="agregada"}
						<tr>
							<td width="10%">
								<p class="">
										<!-- puedo lista de base de datos o de sesion -->
										# {$agregada.FacturaId}
								</p>
							</td>
							<td width="10%">
								<p class="">
										$ {$agregada.Importe}
								</p>
							</td>
						</tr>
                    {/foreach}
					<!-- items -->
					{/if}
				</table>
            </div> <!-- /listItems -->
            
</div> <!-- /list -->         					