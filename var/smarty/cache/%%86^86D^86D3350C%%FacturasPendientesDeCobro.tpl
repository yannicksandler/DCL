168
a:4:{s:8:"template";a:1:{s:46:"Backend/Cobranza/FacturasPendientesDeCobro.tpl";b:1;}s:9:"timestamp";i:1462381049;s:7:"expires";i:1462381049;s:13:"cache_serials";a:0:{}}
<script type="text/javascript">
$(document).ready(function(){

    $(".AgregarFactura").click(function(){
        var FacturaDeCompraId	=	$(this).attr('id');
        
        if(FacturaDeCompraId > 0)
        	AgregarFactura(FacturaDeCompraId);
        else
            alert('La factura no es correcta');
        
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

/* agrega importe liquidado de OP a sesion */
function AgregarFactura(FacturaDeCompraId)
{
	var url = "/Cobranza/LiquidarFactura";

	if(FacturaDeCompraId && url)
	{
		var ImporteAbonadoId	=	'#importe_'+FacturaDeCompraId;
		var ImporteAbonado = $(ImporteAbonadoId).val();
		var TipoIvaId = $(ImporteAbonadoId).attr('TipoIvaId');
		var ClienteId	=	GetClienteId();
		//var TipoIvaId	=	GetTipoIvaId();

		if((ImporteAbonado <= 0) || (ImporteAbonado == '') || (ImporteAbonado == 'Importe'))
		{
			alert('Debe ingresar un importe para liquidar');
			return;
		}

		if(ClienteId && ImporteAbonado && TipoIvaId)
		{	
			$.ajax({
				type: "POST",
				url: url,
				dataType: "text/html",
				data: {
					'data[FacturaNumero]': FacturaDeCompraId,
					'data[ImporteLiquidado]': ImporteAbonado,
					'data[ClienteId]': ClienteId,
					'data[TipoIvaId]': TipoIvaId
				},
				success: function(html){
					var id	=	'#'+FacturaDeCompraId;
					$(id).html(html);
					GetImporteTotalLiquidado();
				}
		
			});
		}
	}
	else
		alert('Parametro para agregar la orden incorrectos');
}

function GetImporteTotalLiquidado()
{
	url	=	'/Cobranza/GetImporteTotalLiquidado';
	// obtener importe total liquidado en session
	$.ajax({
		type: "POST",
		url: url,
		dataType: "text/html",
		success: function(html){
			SetImporteLiquidado(html);
			SetImporteRestante();
		}

	});
}

function SetImporteLiquidado(importe)
{
	var id	=	'#ImporteTotalLiquidado';
	var importeLiquidado = parseFloat(importe).toFixed(2);
	
	$(id).html('<label>$ '+importeLiquidado+'</label>');
	$('#ImporteTotalLiquidadoInput').val(importeLiquidado);
}


function GetClienteId()
{
	// dropdown
	var $selected 	=	$("#SeleccionarCliente").find('option:selected');
	var $ClienteId	=	$selected.val();
	// control
	if( $ClienteId < 0 )
	{
		alert('El proveedor seleccionado no es correcto');
	}

	return $ClienteId;
}
/*
function GetTipoIvaId()
{
	alert('resolver tipo iva');
	return 1;
}
*/
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
			'data[FacturaDeCompraId]': FacturaDeCompraId,
			'data[ImporteLiquidado]': ImporteAbonado
		},
		success: function(html){
			var id	=	'#'+FacturaDeCompraId;
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



<h1>Facturas pendientes de cobro</h1>


<div class="list">
<!--  
<h2>Importe total de ordenes de compra seleccionadas</h2>
<input type="text" id="totalOrdenes" value="0" DISABLED></input>
-->
<h2><img src="/images/icons/bullet_go.png" alt="item" title="Item"/> Cantidad pendientes: 7</h2>
<p><img src="/images/icons/help.png" alt="item" title="Item"/> Debe ingresar el importe a cobrar de cada factura.</p>

	<div class="list">

        		<div class="listTop">
					<div>
						<table border="0" cellpadding="0" cellspacing="0">
							<tr>
								<td width="10%"><p>Fecha</p></td>
								<td width="10%"><p title="Numero">FA</p></td>
								<td width="15%"><p title="Importe">Importe</p></td>
								<td width="15%"><p title="Importe pendiente de cobro. La factura puede tener cobros parciales">Pendiente</p></td> 
								<td width="20%"><p>Liquidacion</p></td>
							</tr>
						</table>
					</div>
                </div> <!-- /listadoTop -->
                
        <div class="listItems listItemsScroll">
                        
				<table border="0" cellpadding="0" cellspacing="0">
				
										<!-- items -->
					
											<tr>
							<td width="10%">
								<p class="">
										24/03/2016 
								</p>
							</td>
							<td width="10%">
								<p class="">
								
										# 2000048
										
								</p>
							</td>
							
							<td width="15%">
								
								<p class="">
										$ 4799.66
										
								</p>
							</td>
							
							<td width="15%">
								<p class="">
										$ 4799.66
										 
								</p>
							</td>
							
							<td width="20%" align="center">
								    <input type="text" value="" name="ImporteItem" id="importe_2000048" tipoivaid="1" class="importe"/>
								    <a class="AgregarFactura" id="2000048"
								    ><img src="/images/icons/add.png" title="Liquidar"/> Liquidar </a>
								                        
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										01/04/2016 
								</p>
							</td>
							<td width="10%">
								<p class="">
								
										# 2000051
										
								</p>
							</td>
							
							<td width="15%">
								
								<p class="">
										$ 83248.00
										
								</p>
							</td>
							
							<td width="15%">
								<p class="">
										$ 83248.00
										 
								</p>
							</td>
							
							<td width="20%" align="center">
								    <input type="text" value="" name="ImporteItem" id="importe_2000051" tipoivaid="1" class="importe"/>
								    <a class="AgregarFactura" id="2000051"
								    ><img src="/images/icons/add.png" title="Liquidar"/> Liquidar </a>
								                        
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										01/04/2016 
								</p>
							</td>
							<td width="10%">
								<p class="">
								
										# 2000052
										
								</p>
							</td>
							
							<td width="15%">
								
								<p class="">
										$ 96445.35
										
								</p>
							</td>
							
							<td width="15%">
								<p class="">
										$ 96445.35
										 
								</p>
							</td>
							
							<td width="20%" align="center">
								    <input type="text" value="" name="ImporteItem" id="importe_2000052" tipoivaid="1" class="importe"/>
								    <a class="AgregarFactura" id="2000052"
								    ><img src="/images/icons/add.png" title="Liquidar"/> Liquidar </a>
								                        
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										01/04/2016 
								</p>
							</td>
							<td width="10%">
								<p class="">
								
										# 2000053
										
								</p>
							</td>
							
							<td width="15%">
								
								<p class="">
										$ 4799.67
										
								</p>
							</td>
							
							<td width="15%">
								<p class="">
										$ 4799.67
										 
								</p>
							</td>
							
							<td width="20%" align="center">
								    <input type="text" value="" name="ImporteItem" id="importe_2000053" tipoivaid="1" class="importe"/>
								    <a class="AgregarFactura" id="2000053"
								    ><img src="/images/icons/add.png" title="Liquidar"/> Liquidar </a>
								                        
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										01/04/2016 
								</p>
							</td>
							<td width="10%">
								<p class="">
								
										# 2000054
										
								</p>
							</td>
							
							<td width="15%">
								
								<p class="">
										$ 3630.00
										
								</p>
							</td>
							
							<td width="15%">
								<p class="">
										$ 3630.00
										 
								</p>
							</td>
							
							<td width="20%" align="center">
								    <input type="text" value="" name="ImporteItem" id="importe_2000054" tipoivaid="1" class="importe"/>
								    <a class="AgregarFactura" id="2000054"
								    ><img src="/images/icons/add.png" title="Liquidar"/> Liquidar </a>
								                        
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										01/04/2016 
								</p>
							</td>
							<td width="10%">
								<p class="">
								
										# 2000056
										
								</p>
							</td>
							
							<td width="15%">
								
								<p class="">
										$ 55708.40
										
								</p>
							</td>
							
							<td width="15%">
								<p class="">
										$ 55708.40
										 
								</p>
							</td>
							
							<td width="20%" align="center">
								    <input type="text" value="" name="ImporteItem" id="importe_2000056" tipoivaid="1" class="importe"/>
								    <a class="AgregarFactura" id="2000056"
								    ><img src="/images/icons/add.png" title="Liquidar"/> Liquidar </a>
								                        
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										01/04/2016 
								</p>
							</td>
							<td width="10%">
								<p class="">
								
										# 2000058
										
								</p>
							</td>
							
							<td width="15%">
								
								<p class="">
										$ 48687.38
										
								</p>
							</td>
							
							<td width="15%">
								<p class="">
										$ 48687.38
										 
								</p>
							</td>
							
							<td width="20%" align="center">
								    <input type="text" value="" name="ImporteItem" id="importe_2000058" tipoivaid="1" class="importe"/>
								    <a class="AgregarFactura" id="2000058"
								    ><img src="/images/icons/add.png" title="Liquidar"/> Liquidar </a>
								                        
							</td>
						</tr>
                    					<!-- items -->
									</table>
            </div> <!-- /listItems -->

</div> <!-- /list -->            
</div> <!-- /list -->