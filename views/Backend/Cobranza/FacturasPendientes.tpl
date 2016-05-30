{literal}
<script type="text/javascript">
$(document).ready(function(){

    $(".AgregarOrdenDeCompra").click(function(){
        var OrdenDeCompraId	=	$(this).attr('id');
        var Total = $(this).attr('total');
        
        SumarTotal(Total);
        
        if(OrdenDeCompraId > 0)
        	SetOrdenDeCompra(OrdenDeCompraId);
        else
            alert('La orden de compra no es correcta');
        
        return false;
    });
});

function SumarTotal(importe)
{
	var total = parseFloat($('#totalOrdenes').val())+parseFloat(importe);
	$('#totalOrdenes').attr('value',total);
}

function RestarTotal(importe)
{
	var total = parseFloat($('#totalOrdenes').val())-parseFloat(importe);
	$('#totalOrdenes').attr('value',total);
}

function SetOrdenDeCompra(OrdenDeCompraId)
{
	var url = "/OrdenPago/SetOrdenDeCompra";
	var OrdenDePagoId = $('#OrdenDePagoId').val();

	if(OrdenDePagoId && OrdenDeCompraId && url)
	{
	$.ajax({
		type: "POST",
		url: url,
		dataType: "text/html",
		data: {
			'OrdenDeCompraId': OrdenDeCompraId,
			'OrdenDePagoId': OrdenDePagoId
		},
		success: function(html){
			var id	=	'#'+OrdenDeCompraId;
			$(id).html(html);
			GetOrdenesDeCompraAgregadas(OrdenDePagoId);
		}

	});
	}
	else
		alert('Parametro para agregar la orden incorrectos');
}

function GetOrdenesDeCompraAgregadas(OrdenDePagoId)
{
	if(OrdenDePagoId)
	{
		url = '/OrdenPago/GetOrdenesDeCompra'
		$.ajax({
			type: "POST",
			url: url,
			dataType: "text/html",
			data: {
				'OrdenDePagoId': OrdenDePagoId
			},
			success: function(html){
				$('#OrdenesDeCompraAgregadas').html(html);
			}

		});
	}
	else
		alert('Debe ingresar el numerode orden de pago para obter las OC asociadas');
}

</script>
{/literal}


<h1>Facturas pendientes de cobro</h1>

{if $deleteErrorMessage}<p class="error">{$deleteErrorMessage}</p>{/if}
{if $successMessage}<p class="success">{$successMessage}  <img src="/images/icons/tick.png" /></p>{/if}

<div class="list">

<h2><img src="/images/icons/bullet_go.png" alt="item" title="Item"/> Cantidad pendientes: {$Pendientes|@count}</h2>
<p><img src="/images/icons/bullet_go.png" alt="item" title="Item"/> Se consideran facturas pendientes si la liquidacion de cobros es menor al importe de la factura (falta importe)</p>
<p><img src="/images/icons/bullet_go.png" alt="item" title="Item"/> Es posible cobrar una factura de $100 en 2 cobros de $50 (cobros parciales)</p>

<h2><img src="/images/icons/bullet_go.png" alt="item" title="Item"/> Importe total de facturas pendientes: $ {$TotalPendientes}</h2>
        		<div class="listTop">
					<div>
						<table border="0" cellpadding="0" cellspacing="0">
							<tr>
								<td width="10%"><p>Fecha</p></td>
								<td width="8%"><p title="Numero de factura">Numero</p></td>
								<td width="15%"><p>Importe</p></td>
								<td width="25%"><p>Abonado</p></td>
								<td width="20%"><p>Detalle</p></td>
							</tr>
						</table>
					</div>
                </div> <!-- /listadoTop -->
                
        <div class="listItems listItemsScroll">
                        
				<table border="0" cellpadding="0" cellspacing="0">
				
					{if !$Pendientes|@count}
						<h2>No hay facturas pendientes</h2>
					{else}
					<!-- items -->
					
					{foreach from=$Pendientes item="p"}
						<tr>
							<td width="10%">
								<p class="">
										{$p.Fecha}
								</p>
							</td>
							<td width="8%">
								<p class="">
										{$p.Id}
								</p>
							</td>
							<td width="15%">
								<p class="">
										$ {$p.Importe}
								</p>
							</td>
							<td width="25%">
								<p>
								
								{foreach from=$p.CobranzaLiquidaciones item="cob"}
									<a class="" href="/Cobranza/Edit/id/{$cob.CobranzaId}">
									<img src="/images/icons/bullet_go.png" alt="item" title="Item"/>
											Ver Cobranza #{$cob.CobranzaId}<br>Importe: $ {$cob.Importe} {if $cob.Cobranza.FechaAnulacion}<img src="/images/icons/delete.png" title="Cobranza anulada"/>{/if}
									</a>
									<br>
								{/foreach}
								</p>
							</td>
							<td width="20%">
								{foreach from=$p.OrdenesDeTrabajo item="or"}
								<p class="">
										{$or.Id} - {$or.Producto} 
								</p>
								{/foreach}
							</td>
							
						</tr>
                    {/foreach}
					<!-- items -->
					{/if}
				</table>
            </div> <!-- /listItems -->
            
</div> <!-- /list -->