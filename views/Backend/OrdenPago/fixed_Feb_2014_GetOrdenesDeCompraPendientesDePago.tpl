{literal}
<script type="text/javascript">
$(document).ready(function(){

    $(".AgregarOrdenDeCompra").click(function(){
        var OrdenDeCompraId	=	$(this).attr('id');
        
        
        if(OrdenDeCompraId > 0)
        	AgregarOrdenDeCompra(OrdenDeCompraId);
        else
            alert('La orden de compra no es correcta');
        
        return false;
        
    });

    $(".importe").blur(function(){
        if( $(this).val() == '' )
            $(this).val( $(this).attr("defaultValue") );
    });

    $(".importe").focus(function(){
        if( $(this).val() == $(this).attr("defaultValue"))
            $(this).val('');
    });
});

/* agrega importe liquidado de OC a sesion */
function AgregarOrdenDeCompra(OrdenDeCompraId)
{
	var url = "/OrdenPago/AgregarOrdenDeCompra";

	if(OrdenDeCompraId && url)
	{
		var ImporteAbonadoId	=	'#importe_'+OrdenDeCompraId;
		var ImporteAbonado = $(ImporteAbonadoId).val();

		if((ImporteAbonado <= 0) || (ImporteAbonado == '') || (ImporteAbonado == 'Importe'))
		{
			alert('Debe ingresar un importe correcto para liquidar de la orden de la compra');
			return;
		}
			
		$.ajax({
			type: "POST",
			url: url,
			dataType: "text/html",
			data: {
				'data[OrdenDeCompraId]': OrdenDeCompraId,
				'data[ImporteLiquidado]': ImporteAbonado
			},
			success: function(html){
				var id	=	'#'+OrdenDeCompraId;
				$(id).html(html);
		        GetImporteTotalLiquidado();
			}
	
		});
	}
	else
		alert('Parametro para agregar la orden incorrectos');
}

function GetImporteTotalLiquidado()
{
	url	=	'/OrdenPago/GetImporteTotalLiquidado';
	// obtener importe total liquidado en session
	$.ajax({
		type: "POST",
		url: url,
		dataType: "text/html",
		success: function(html){
			var importe	=	parseFloat(html).toFixed(2);
			$('#ImporteTotalLiquidadoInput').val(importe);
			$('#ImporteTotalLiquidado').html('<label>$ ' + importe + '</label>');
			
	        SetImporteRestante()
		}

	});
}

function GetOrdenesDeCompraLiquidadas()
{
	var url = "/FacturaCompra/GetOrdenesDeCompraLiquidadas";

	if(url)
	{
			
	$.ajax({
		type: "POST",
		url: url,
		dataType: "text/html",
		data: {
			'data[OrdenDeCompraId]': OrdenDeCompraId,
			'data[ImporteLiquidado]': ImporteAbonado
		},
		success: function(html){
			var id	=	'#'+OrdenDeCompraId;
			$(id).html(html);
			//GetOrdenesDeCompraLiquidadas();
		}

	});
	}
	else
		alert('Parametro para agregar la orden incorrectos');	
}

function SumarTotal(importe)
{
	if((importe < 0) || (importe == '') || (importe == 'Importe'))
	{
		alert('Debe ingresar un importe para liquidar de la orden de la compra');
		return;
	}

	// cuando no exite valor agregar primer importe, luego en proximas liquidaciones sumar importe
	if($('#ImporteTotal').val() == '')
		var total = parseFloat(importe);
	else
		var total = parseFloat($('#ImporteTotal').val())+parseFloat(importe);
	
	$('#ImporteTotal').val(total);
	return;
}
</script>
{/literal}


<h1>Ordenes de compra pendientes de validar</h1>

{if $deleteErrorMessage}<p class="error">{$deleteErrorMessage}</p>{/if}
{if $successMessage}<p class="success">{$successMessage}  <img src="/images/icons/tick.png" /></p>{/if}

<div class="list">
 <!-- 
<h2>Importe total liquidado</h2>
<input type="text" class="required number" readonly="readonly" id="ImporteTotalLiquidadoN" name="data[ImporteLiquidado]" value="{if $data.Importe}{$data.Importe}{elseif $ImporteLiquidadoFacturaCompra}{$ImporteLiquidadoFacturaCompra}{/if}">
 -->
<h2><img src="/images/icons/bullet_go.png" alt="item" title="Item"/> Cantidad pendientes: {$OrdenesDeCompraPendientes|@count}</h2>
<p><img src="/images/icons/help.png" alt="item" title="Item"/> Debe ingresar el importe a abonar de cada Orden de Compra.</p>

	<div class="list">

        		<div class="listTop">
					<div>
						<table border="0" cellpadding="0" cellspacing="0">
							<tr>
								<td width="10%"><p>Fecha</p></td>
								<td width="10%"><p title="Numero de orden de compra">OC</p></td>
								<td width="20%"><p>Insumo</p></td>
								<td width="12%"><p title="Total">Total</p></td>
								<td width="12%"><p title="Importe pendiente de pago. La orden de compra puede tener liquidaciones parciales">Pendiente</p></td> 
								<td width="30%"><p>Acciones</p></td>
							</tr>
						</table>
					</div>
                </div> <!-- /listadoTop -->
                
        <div class="listItems listItemsScroll">
                        
				<table border="0" cellpadding="0" cellspacing="0">
				
					{if !$OrdenesDeCompraPendientes|@count}
						<h2>No hay ordenes de compra pendientes de liquidar</h2>
					{else}
					<!-- items -->
					
					{foreach from=$OrdenesDeCompraPendientes item="pendiente"}
						<tr>
							<td width="10%">
								<p class="">
										{$pendiente.Fecha}
								</p>
							</td>
							<td width="10%">
								<p class="">
										# {$pendiente.Id}
										<img src="/images/icons/zoom_in.png" title="({$pendiente.Entregado}) - {$pendiente.FormaDePago}"/>
								</p>
							</td>
							<td width="20%">
								
								<table border="0" cellspacing="0">
								  <tr>
								    <td>
								    <p><img src="/images/icons/bullet_go.png" alt="item" title="Item"/> {$pendiente.InsumoNombre}</p>
								    </td>
								  </tr>
								</table>
								
							</td>
							
							<td width="12%">
								
								<p class="">
								
										$ {$pendiente.Importe}
								</p>
							</td>
							
							<td width="12%">
								<p class="">
								
										$ {$pendiente.ImportePendienteDePago}
								</p>
							</td>
							
							<td width="30%" align="center">
								    <input type="text" value="Importe" name="ImporteItem" id="importe_{$pendiente.Id}" class="importe"/>
								    <a class="AgregarOrdenDeCompra" id="{$pendiente.Id}"
								    
								    ><img src="/images/icons/add.png" title="Liquidar"/> Liquidar </a>
								                        
							</td>
						</tr>
                    {/foreach}
					<!-- items -->
					{/if}
				</table>
            </div> <!-- /listItems -->

</div> <!-- /list -->            
</div> <!-- /list -->