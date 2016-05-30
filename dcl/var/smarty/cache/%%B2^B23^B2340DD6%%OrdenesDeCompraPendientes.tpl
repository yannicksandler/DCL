173
a:4:{s:8:"template";a:1:{s:51:"Backend/FacturaCompra/OrdenesDeCompraPendientes.tpl";b:1;}s:9:"timestamp";i:1411065211;s:7:"expires";i:1411065211;s:13:"cache_serials";a:0:{}}
<script type="text/javascript">
$(document).ready(function(){

	// marcar tipo de gasto del proveedor por defecto
	SetTipoDeGastoDefault();
	SetTipoIvaDefault();

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


/* agrega importe liquidado de OC a sesion */
function AgregarOrdenDeCompra(OrdenDeCompraId)
{
	var url = "/FacturaCompra/SetOrdenDeCompra";

	if(OrdenDeCompraId && url)
	{
		var ImporteAbonadoId	=	'#importe_'+OrdenDeCompraId;
		var ImporteAbonado = $(ImporteAbonadoId).val();

		var CompensatoriaId	=	'#compensatoria_'+OrdenDeCompraId;
		var Compensatoria = $(CompensatoriaId).attr('checked');

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
				'data[Compensatoria]': Compensatoria,
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
	url	=	'/FacturaCompra/GetImporteTotalLiquidado';
	// obtener importe total liquidado en session
	$.ajax({
		type: "POST",
		url: url,
		dataType: "text/html",
		success: function(html){
			var id	=	'#ImporteTotalLiquidado';
			$(id).html('<label>$ '+html+'</label>');
			$('#ImporteTotalLiquidadoInput').val(html);
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

function SetTipoDeGastoDefault()
{
	var tipogastoseleccionado = $('#SeleccionarTipoGasto').val();

	// si ya tiene un tipo de gasto seleccionado, no setear el default
	if(!(tipogastoseleccionado > 0)) 
	{
		var tipogastoid = $('#ProveedorTipoGastoId').val();
		if(!tipogastoid)
		{
			alert('Debe ingresar un tipo de gasto al proveedor para ser utilizado por defecto');
		}
	
	  	var select_id	=	'SeleccionarTipoGasto';
	  	var	option_val	=	tipogastoid;
	
		$('#'+select_id+' option:selected').removeAttr('selected');
	  	$('#'+select_id+' option[value='+option_val+']').attr('selected','selected');
	}
}

/*
 * FC
	- un proveedor tiene un tipo de iva asociado
	- al seleccionar un proveedor, solo se deben mostrar los campos del tipo de iva a asociado, 
	ademas, existe un boton, "mostrar todo", para los casos donde un proveedor tiene multiples tipos de iva en caso de quere
	- por defecto tomar tipo de iva del proveedor
 */
function SetTipoIvaDefault()
{
	var tipoivaid = $('#ProveedorTipoIvaId').val();
	if(!tipoivaid)
	{
		alert('Debe ingresar un tipo de IVA al proveedor para ser utilizado por defecto');
	}

	if(tipoivaid == 1)//responsable inscripto
	{
		// ocultar todo menos RI 21% 
		$('#gravado27').hide();
		$('#gravado10_5').hide();
		$('#percepciones').hide();

		// agregar clase "required" para que campos sean obligatorios
	}
}

</script>



<h1>Ordenes de compra pendientes de validar</h1>


<div class="list">
 <!-- 
<h2>Importe total liquidado</h2>
<input type="text" class="required number" readonly="readonly" id="ImporteTotalLiquidadoN" name="data[ImporteLiquidado]" value="">
 -->
<h2><img src="/images/icons/bullet_go.png" alt="item" title="Item"/> Cantidad pendientes: 0</h2>
<p><img src="/images/icons/help.png" alt="item" title="Item"/> Debe ingresar el importe a validar de cada Orden de Compra.</p>

<!-- utilizado para setear valor inicial de tipo de gasto de un proveedor -->
<input type="hidden" value="" id="ProveedorTipoGastoId"/>
<!-- utilizado para mostrar campos segun el tipo de IVA de un proveedor -->
<input type="hidden" value="12" id="ProveedorTipoIvaId"/>

	<div class="list">

        		<div class="listTop">
					<div>
						<table border="0" cellpadding="0" cellspacing="0">
							<tr>
								<td width="10%"><p>Fecha</p></td>
								<td width="10%"><p title="Numero de orden de compra">OC</p></td>
								<td width="20%"><p>Insumo</p></td>
								<td width="12%"><p title="Total">Total</p></td>
								<td width="12%"><p title="Importe pendiente de validar. La orden de compra puede tener validaciones en distintas facturas de compra">Pendiente</p></td> 
								<td width="30%"><p>Importe validado</p></td>
							</tr>
						</table>
					</div>
                </div> <!-- /listadoTop -->
                
        <div class="listItems listItemsScroll">
                        
				<table border="0" cellpadding="0" cellspacing="0">
				
											<h2>No hay ordenes de compra pendientes de validar</h2>
									</table>
            </div> <!-- /listItems -->

</div> <!-- /list -->            
</div> <!-- /list -->