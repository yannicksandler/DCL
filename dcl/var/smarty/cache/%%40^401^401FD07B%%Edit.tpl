252
a:4:{s:8:"template";a:3:{s:26:"Backend/OrdenPago/Edit.tpl";b:1;s:32:"Backend/OrdenPago/ColumnForm.tpl";b:1;s:48:"Backend/OrdenPago/FacturasDeCompraLiquidadas.tpl";b:1;}s:9:"timestamp";i:1411065820;s:7:"expires";i:1411065820;s:13:"cache_serials";a:0:{}}
<!-- date picker -->
<link type="text/css" href="/styles/ui-lightness/jquery-ui-1.8.2.custom.css" rel="stylesheet" />
<script type="text/javascript" src="/scripts/jquery/jquery.ui.datepicker.js"></script>
<script type="text/javascript" src="/scripts/jquery/jquery.ui.core.js"></script>
<script type="text/javascript" src="/scripts/jquery/jquery.ui.widget.js"></script>

<script type="text/javascript" src="/scripts/Edit.js"></script>

<!-- dialog -->
<script type="text/javascript" src="/scripts/jquery/jquery-ui-1.8.4.custom.min.js"></script>
<!-- dialog -->


<script type="text/javascript">
$(document).ready(function(){
    $("#FrmEdit").validate();

	$('#FrmEdit').submit(function() {

		var importeTotalLiquidado	=	$('#ImporteTotalLiquidadoInput').val();
		var importeTotalPagado	=	$('#ImporteTotalPagadoInput').val();

		if(importeTotalPagado == 0)
		{
			alert('El importe pagado no puede ser cero');
			return false;
		}

		if(importeTotalLiquidado == 0)
		{
			alert('El importe liquidado no puede ser cero');
			return false;
		}

		// si no esta marcada como adelanto, debe permitir pagar aunque no coincida importe liquidado
		if($('#Adelanto').is(':checked'))
		{  
			$('#Adelanto').attr('value', 'SI');
			
			if(importeTotalLiquidado >= importeTotalPagado)
			{
				alert('El importe pagado debe ser mayor al liquidado para que sea un adelanto');
				return false;
			}
		}
		else
		{
			if(importeTotalLiquidado != importeTotalPagado)
			{
				alert('El importe liquidado es distinto al importe total pagado. Debe marcar la orden como adelanto y guardarla nuevamente');
				return false;
			}
		}
		
  	});

    //OcultarFacturasPendientes();

    $("#SeleccionarProveedor").hide();
      

    $('.CambiarProveedor').change(function(){
    	
		var $selected 	=	$(this).find('option:selected');
		var $proveedorId	=	$selected.val();
		
		if( $proveedorId > 0 )
		{
			SetProveedor($proveedorId);
		}
		else
			alert('El proveedor seleccionado no es correcto');
    });
    

    $(".PrintOrdenDePago").click(function(){
        
        var url	=	'/OrdenPago/View/id/' + $(this).attr('id');
        
		var opciones="toolbar=no, location=no, directories=no, status=no, menubar=yes, scrollbars=yes, resizable=yes, width=1000, height=700, top=85, left=140";

		abrirPopUp(url, opciones);        

        return false;
    });

    $(".EditarInsumo").click(function(){
        url	=	$(this).attr('href');

		var opciones="toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=yes, width=1000, height=700, top=85, left=140";

		abrirPopUp(url, opciones);

        return false;
    });

    $(".EliminarOrdenDeCompra").click(function(){
        var OrdenDeCompraId	=	$(this).attr('ordencompra');
        
        
        if(OrdenDeCompraId > 0)
        	EliminarOrdenDeCompra(OrdenDeCompraId);
        else
            alert('La orden de compra no es correcta');
        
        return false;
    });

    $('#FechaAnulacion').datepicker({
		changeMonth: true,
		changeYear: true,
        dateFormat: 'dd/mm/yy'
	});

    
        	//GetLiquidacion('list', 1694);
    	//GetFacturasDeCompraLiquidadas();
    	//GetOrdenesDeCompraAgregadas(1694);
    	GetPagos('list', 1694);
    
            	
    
    var availableTags = [
							"Grafica","Grafica Warnes/zocan grafica","Ernesto Costaldo","Calcos Closas","Marplex","Helioday","Silvio Morales","Explotter","Ochaxa","Garber Cintas","Fleet","Madergold","CMYB","Acrilicos Pulbilet","Celulosa Campana","Laura montajes","FULL HANGER","ARTECOLOR","BALBER PUBLICIDAD","ACRILICOS PUBLILET","El fenix","Atech J y G","Alabi Chiche","Pontus","Leandro","CUATRO REINAS","kol or","GARBER","SIVISA FLET","Victoria soncini","Dcl group","Maytok","Cativiela Hnos","Doldan","Impro","Tango Publicidad","Platt Grupo impresor","correo argentino","Grafica Calgaro","Jaime Zamler","eduardo cazala","Plasticos Lavalleja","Casa Cesto","NORBERTO SNAIDERMAN","PINTURERIA MARCOS SA","COOP CARDONES","EL MUNDO DE LA BOLSA","BAITOR SA","SACABOCADOS DOLDAN","Bordados sin nomre","macona sa","distribuidora maio","MARCELO RIVEROL","CATIVIELA HNOS SA","UNIVERSO GOB","CASEROS INOXIDABLE SA","PINTURERIA DEL CENTRO","PLATT GRUPO IMPRESOR_repetido","COPIFIL","LIBRERIA IUVIDAN","SISTECO","RUPERTO ANTON","Jorge Cartelero","Ideas Argentinas","ALLEKOTE ROBERTO","Alpha","El rey del bordado","jv articulos promocionales","zecat","bazar chef","Compre licores","G y A","L.M.R Deportes","Algodonera paso viejo","Digistamp","Viniltodo","Routec","Ferreteria scopazo","publios","Acrylux","Vidrieria x","Rms gigantografias","Viste Design","Multiopticas","serigrafia san martin","Bulonera vietri","Hierros rati","Imprenta Packman","Centro Box","Andres Oliveto","Abasto shoping","Taxi","Jeremias Slacius","Luis Ducant","la casa de los 1000 envases","Mercado Libre","Jose Gargaglione","DecorLine","Gabriel Ekbor","Matias Fudim","Dixtron","n y n","Diamonds","Mac Pad - Grupo Impresor S.A ","PCTronix","Vidrios srl","Vidrieria Sarandi","Sofia Mac Mullen","Pim Pam","Hijos de Garber S.R.L","Warnes Trailer","Osvaldo Leiva","Furia","Emprego Arg.","Ferreteria Industrial","Easy Almagro","Franco Zampini","Grafica DPI","JORGE HOCHMAN","MARIA FERNANDA RODRIGUEZ","martin zaszczynski","MORATORIA","PSA FINANCE PEUGEOT","Expensas","EDESUR","GABRIEL EKBOIR - CUOTA","INGRESOS BRUTOS","MATIAS TOKAR - PROGRAMADOR","Maria Ge","Maridajes ","Blue menu","Carlos Alberto Juan","Federico Levy","ALEJANDRA ZANGARO COCHERA FRIAS","Regina Failenbogen","Transporte Arlequin","CAJA CHICA","Vicente Alcalde","Digital Impres","AFIP Ganancias","EZEQUIEL NASSIMOFF - ALQUILER OFICINA","Flete Madergold","Expreso Brio SRL","Moto Oeste","Ccm digital","TELECENTRO","Morales Fletes","Paola Nuñez","Remis zona oeste Moron","Printers serigrafia","La crianza de Oxum","Heling","Todomicro","Gustavo Towner","vidrieria Libertad","Imprenta digital","Julio carpintero","Casa Paso ","uces","suss martin zaszczynski","SEKTZER MARCELO","ABL","ISAAC GUINI","nextel","Telecom","La viruta","IVA","Juan Manuel Renzacci","Shemesh Pack","Laura Moizeszowicz","ac-bolsas","Imprenta Mendez","Imprenta Viagraf","carpas y eventos","Maderera La Esperanza","H.KOCH","Romina Paola Minujin","Marcelo Passerini","Pixelgraf","Cartoneria San jose","Sur express SA","RO-El PLAST  SRL","Lamigraf","Estudio Kon y Asociados","Bolsas impresas","Daniele Construcciones","Boker Arbolito","Gravent SA","Alejandro Logiuoco","Ortiz Hernan Federico","IMG envases","Mosh Imagen","Envap","Grafilak","Laminow","Pampa laminados","Leandro Matayoshi","Ingraf S.H","Resmacom","Ser-Car","Maderera Gascon","Fernanda de la Vega","Impresora Serratea","Adler Packaging","APF","Fotopolimeros Pichincha","Sindicato Unico de la Publicidad","Fabian","Herrería Cerrajería","Daniel Seguro Auto","Nahuel","Movistar","Mónica Fatala","Ki interiores","GRADO ALFA SRL","Mensajería Bs As","Ncativiela SRL","Cablefix","TABACALERA SARANDI SA","Siris remiseria","Troquel Ideas","Eduardo s Cazala ","Cecilia Volpe","Doree","Autonomo","Papirus y Compañia","Raal","Lamiart","STENFAR","CLINGSOR","IMP S/CRED EN CTA CTE","IMP S/DEBITOS EN CTA CTE","Sacabocados Arales","AFIP 3379/12","Fibertel","Nicar srl","Juan Pablo Caserta","TOVBEIN","Pol pack srl","Co Print","El Maiten","Todoplastic","Mouron","Montajes Alejandro ","Papá de Fer","Sebastian Pendola","porta banner argentina","todo cuadernos","JB JUSTO SA","Marroquineria Warnes 525","Diverthia","Marroquineria Alberto A","papelera del mar","Operadora de estaciones de servicio sa","Grupo Brabo","Macondo","super servicios","makro","Serflo Srl","HOTEL SKORPIOS","Ale Casas","Shutterstock Inc","Roberto","Manyplast","EG3 SA","Kansas","Visa","PLASTICOS VG SRL","Latin technology srl","Los tepues","Rapiarte","Tahira Ltda","Coto","Carrefour","falabella sa","Factorinet","justo rodero e hijos","Qkie","cooperativa armado","Encuadernacion Atela","Encuadernacion Fer-Lin","Encuadernación Ingraf","Digito A","Debolsas","martín péndola","BRD SAICFI","Santiago Duro","BARACAR SRL","BAEZ 227 SA","Estación del aire SRL","Damian Piliavsky","Armytech technologies sa","Forestcar","Mastercard","Copy Luar SRL","Deheza saicfei","Jumbo Retail Argentina SA","Red de servicios rurales srl","Impto Bienes personales","Trabajos Artes y oficios","Liquidador retenciones","el server","Julio Oscar Vidal","Bayres al Sur"
                 ];

    $("input#proveedor_autocomplete").autocomplete({
        source: availableTags,
      //define select handler
		select: function(e, ui) {
			var valor = ui.item.value;
			SetProveedorSeleccionar(valor);
		}    
    });  

    SetProveedorInitTextValue();

    $("#proveedor_autocomplete").blur(function(){
        if( $(this).val() == '' )
            $(this).val( $(this).attr("defaultValue") );
    });

    $("#proveedor_autocomplete").focus(function(){
        if( $(this).val() == $(this).attr("defaultValue"))
            $(this).val('');
    });
    

	$('.Anticipo').click(function(){

		if($(this).is(':checked'))
		{  
			var proveedorId	=	GetProveedorId();
			
			if( proveedorId > 0)
			{
				GetOrdenesDeCompraPendientesDePago(proveedorId);
			}
			else
			{
				alert('Debe seleccionar un proveedor');
				$(this).attr('checked', false);
				$(this).attr('value', 'true');
			}     
        }
		else
		{
			$("#OrdenesDeCompraPendientes").html('');
			$(this).attr('checked', false);
		}
    });
	
	$("#mostrarFacturasPendientes").click(function () {
    	$("#FacturasDeCompraPendientes").toggle("slow");
   	});

	$("#mostrarDetalleDePago").click(function () {
    	$("#Pagos").toggle("slow");
   	});

	$(".VerCuentaCorriente").click(function(){
        
		var url	=	'/CuentaCorriente/ListProveedor/ProveedorId/' + GetProveedorId();
        
		var opciones="toolbar=no, location=no, directories=no, status=no, menubar=yes, scrollbars=yes, resizable=yes, width=1000, height=700, top=85, left=140";

		abrirPopUp(url, opciones);        

        return false;
    });
   	
	
	$(".SetTipoCobranza").click(function(){
        
		GetFacturasDeCompraPendientes();
    });

	$( "#accordion" ).accordion();
});

function GetOrdenesDeCompraPendientesDePago(ProveedorId)
{
	if(ProveedorId > 0)
	{
		// ajax
		var url = "/OrdenPago/GetOrdenesDeCompraPendientesDePago";

		if(ProveedorId && url)
		{	
		$.ajax({
			type: "POST",
			url: url,
			dataType: "text/html",
			data: {
				'ProveedorId': ProveedorId,
				'data[TipoDePago]': GetTipoOrdenDePago()
			},
			success: function(html){
				
				$("#OrdenesDeCompraPendientes").html(html);
			}

		});
		
		}
		else
			alert('Parametro para cargar las ordenes son incorrectos');
	}
	else
	{
		alert('Debe seleecionar el proveedor para obtener las ordenes de compra sin validar');
	}
}

function OcultarFacturasPendientes()
{
	var id = GetProveedorId();
	// si el proveedor es APIF IVA
	if(id==175)
	{
		$("#FacturasDeCompraPendientes").toggle("slow");
	}
}

function SetProveedorInitTextValue()
{
	NombreProveedor = GetSelectedTextValue("SeleccionarProveedor");
	if(NombreProveedor != 'Seleccionar')
		$("input#proveedor_autocomplete").val(NombreProveedor);
}

function GetSelectedTextValue(dropdownid)
{
	var $selected 	=	$("#"+dropdownid).find('option:selected');
	var $selectedtext	=	$selected.html();

	return $selectedtext;
}

function SetProveedor(ProveedorId)
{
	var OrdenDePagoId	= $('#OrdenDePagoId').val();
	var	ProveedorAnterior	=	$('#ProveedorId').val();

	// control
	if(ProveedorAnterior)
	{	
		var rta	=	confirm('Tenga en cuenta que si cambia el proveedor, todas '+
	    			'las ordenes de compra asociadas seran eliminadas. Esta de acuerdo?');
		if(!rta)
		{
			return false;			
		}
	}

	if(OrdenDePagoId > 0)
	{
		
		$.ajax({
			type: "POST",
			url: '/OrdenPago/SetProveedor',
			dataType: "text/html",
			data: {
				'ProveedorId': ProveedorId,
				'OrdenDePagoId': OrdenDePagoId
			},
			success: function(html){
				$("#OrdenesDeCompraPendientes").html(html);
				/* se borran todas las ordenes de compra asociadas */
				$("#OrdenesDeCompraAgregadas").html('');
				
			}
	
		});

	}
	else
		alert('Orden de pago incorrecta');


	return false;
}

function EliminarOrdenDeCompra(OrdenDeCompraId)
{
	var url = "/OrdenPago/EliminarOrdenDeCompra";
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
			/*
			var id	=	'#delete' + OrdenDeCompraId;
			$(id).html(html);*/
			$("#OrdenesDeCompraAgregadas").html(html);
		}

	});
	}
	else
		alert('Parametro para eliminar la orden incorrectos');
}

function GetOrdenesDeCompraAgregadas(OrdenDePagoId)
{
	var url = "/OrdenPago/GetOrdenesDeCompra";
	var OrdenDePagoId = $('#OrdenDePagoId').val();

	if(OrdenDePagoId && url)
	{	
	$.ajax({
		type: "POST",
		url: url,
		dataType: "text/html",
		data: {
			'OrdenDePagoId': OrdenDePagoId
		},
		success: function(html){
			
			$("#OrdenesDeCompraAgregadas").html(html);
		}

	});
	}
	else
		alert('Parametro para cargar las ordenes son incorrectos');
}

function IsSetProveedor()
{
	var $selected 	=	$("#SeleccionarProveedor").find('option:selected');
	var $proveedorid	=	$selected.val();
	// control
	if($proveedorid > 0)
		return true;

	return false;
}

function GetProveedorId()
{
	var $selected 	=	$("#SeleccionarProveedor").find('option:selected');
	var $proveedorid	=	$selected.val();
	// control
	if($proveedorid > 0)
		return $proveedorid;

	//alert('Ingrese el proveedor');

	return false;
}

function GetPagos(accion, OrdenDePagoId)
{
	var PagoId;
	var ProveedorId	=	GetProveedorId();
	// cuando accion es delete, el parametro es PagoId en lugar de OrdenDePagoId
	if(accion == 'del')
	{
		PagoId	=	OrdenDePagoId;
	}

	var TipoPagoId	=	$("#PagoTipoId option:selected").val();
	//alert(TipoPagoId);
	//cheque propio
	if(TipoPagoId == 1)
	{
		var banco	=	$("#BancoItem option:selected").val();
		var cuenta	=	 $('#CuentaItem').val();
		var sucursal	=	$('#SucursalItem').val();
	}
	// transferencia
	if(TipoPagoId == 13)
	{
		var banco	=	$("#BancoTransfItem option:selected").val();
		var cuenta	=	 $('#CuentaTransfItem').val();
		var sucursal	=	$('#SucursaTransflItem').val();
	}
	
	var chequeid = $('#ChequeId').val();
	if(chequeid > 0)
	{
		TipoPagoId=4;
	}
/*
	var NCid = $('#NotaCreditoId').val();
	if(NCid > 0)
	{
		TipoPagoId=12;
	}*/
	// al borrar es PagoId
	$.ajax({
		type: "POST",
		url: '/OrdenPago/GetPagos',
		dataType: "text/html",
		data: {
			'Accion': accion,
			'OrdenDePagoId': OrdenDePagoId,
			'data[TipoDePago]': GetTipoOrdenDePago(),
			'data[OrdenDePagoId]': $('#OrdenDePagoId').val(),
			'data[Importe]': $('#ImportePagoItem').val(),
			'data[PagoTipoId]': $("#PagoTipoId option:selected").val(),
			'data[Detalle]': $('#DetallePagoItem').val(),
			'data[ProveedorId]': ProveedorId,
			'data[ChequeId]': chequeid,
			'data[PagoId]': PagoId,
			'data[Banco]': banco,
			'data[Sucursal]': sucursal,
			'data[ImporteCheque]': $('#ImporteChequeItem').val(),
			'data[ImporteTransferencia]': $('#ImporteTransferenciaItem').val(),
			'data[Localidad]': $('#LocalidadItem').val(),
			'data[Numero]': $('#NumeroItem').val(),
			'data[Cuenta]': cuenta,
			'data[FechaCheque]': $('#FechaChequeItem').val(),
			'data[FechaCobro]': $('#FechaCobroItem').val(),
			'data[Firmante]': $('#FirmanteItem').val(),
			'data[Cuit]': $('#CuitItem').val(),
			'data[RetencionId]': $('#RetencionId').val(),
			'data[PercepcionId]': $('#PercepcionId').val(),
			'data[NotaCreditoId]': $('#NotaCreditoId').val()
		},
		success: function(html){
			//$(html).insertAfter("#docenteLabel");
			$("#Pagos").html(html);
			SetImportePagado();
		}

	});

	return false;
}

function SetImportePagado()
{
	var importe	=	parseFloat($('#TotalPago').val()).toFixed(2);
	
	$('#ImporteTotalPagado').html('<label>$ '+ importe + '</label>');
	$('#ImporteTotalPagadoInput').val(importe);
	
	SetImporteRestante();
}

function GetLiquidacion(accion, OrdenDePagoId)
{
	
	// al borrar es PagoId
	$.ajax({
		type: "POST",
		url: '/OrdenPago/GetLiquidacion',
		dataType: "text/html",
		data: {
			'Accion': accion,
			'OrdenDePagoId': OrdenDePagoId,
			'data[OrdenDePagoId]': $('#OrdenDePagoId').val(),
			'data[Fecha]': $('#FechaItem').val(),
			'data[NumeroFactura]': $('#NumeroItem').val(),
			'data[Importe]': $('#ImporteItem').val(),
			'data[Detalle]': $('#DetalleItem').val()
		},
		success: function(html){
			
			$("#Liquidacion").html(html);
		}

	});

	return false;
}

//lo usa el popup editar insumo
function guardarObtenerInsumos(insumo, action)
{
	//window.location.reload();
    $('#FrmEdit').submit();
}


function volver()
{
	window.location	=	'/OrdenCompra/List/order/OrdenDePagoId_ASC';
}

function abrirPopUp(pagina, opciones)
{
	window.open(pagina,"",opciones);
}

function SetProveedorSeleccionar(NombreProveedor)
{
	inputText	=	NombreProveedor;
	// setear valor select selected por texto de option / set option selected by text
	//$("#"+dropdown_id+" option:contains(" + inputText + ")").attr('selected', 'selected');
	
	$("#SeleccionarProveedor option").each(function () {
        if ($(this).html() == inputText) {
            $(this).attr("selected", "selected");
            return;
        }
	});

	GetFacturasDeCompraPendientes();

	//OcultarFacturasPendientes();
	
}


function GetFacturasDeCompraPendientes()
{
	// dropdown
	var $selected 	=	$("#SeleccionarProveedor").find('option:selected');
	var $proveedorid	=	$selected.val();
	// control
	if( $proveedorid < 0 )
	{
		alert('El proveedor seleccionado no es correcto');
	}
	
	// cargar FC pendientes por ajax
	$.ajax({
		type: "POST",
		url: '/OrdenPago/GetFacturasDeCompraPendientes',
		dataType: "text/html",
		data: {
			'ProveedorId': $proveedorid,
			'data[TipoDePago]': GetTipoOrdenDePago()
		},
		success: function(html){
			$("#FacturasDeCompraPendientes").html(html);
			$("#OrdenesDeCompraPendientes").html('');
			$('#Anticipo').attr('checked', false);
			GetPagos('list', null);
			ResetImportes();
			
		}

	});
}

function GetTipoOrdenDePago()
{
		if($("#TipoB").attr('checked'))
		{
			return $("#TipoB").val();
		}

		if($("#TipoN").attr('checked'))
		{
			return $("#TipoN").val();
		}
}

function ResetImportes()
{
	$('#TotalPago').val(0);
	$('#ImporteTotalPagado').html('<label>$ 0.0</label>');
	$('#ImporteTotalPagadoInput').val(0);
	$('#ImporteTotalLiquidadoInput').val(0);
	$('#ImporteTotalLiquidado').html('<label>$ 0.0</label>');
	$('#ImporteRestante').html('<label>$ 0.0</label>');
	$('#ImporteRestanteInput').val(0);
}

function SetImporteRestante()
{
	var importeRestante	= parseFloat($('#ImporteTotalLiquidadoInput').val()).toFixed(2) - parseFloat($('#ImporteTotalPagadoInput').val()).toFixed(2);	
	
	$('#ImporteRestante').html('<label>$ '+ importeRestante.toFixed(2) + '</label>');
	$('#ImporteRestanteInput').val(importeRestante.toFixed(2));
}

</script>



<h1>Editar orden de pago &raquo; <span>560 (Interno 1694)</span></h1>

		        
         <input type="reset" value="Imprimir" id="1694" class="btDark PrintOrdenDePago" title="Buscar" />
        
<form id="FrmEdit" enctype="multipart/form-data" action="" method="post">
    <input type="hidden" id="OrdenDePagoId" name="data[Id]" value="1694" />
    <input type="hidden" name="data[Fecha]" value="18/09/2014" />
        
    <div class="form">
        <div id="FormsColumn"> <!-- contiene toda la columna -->

    <div class="formButtons">
        <div class="info">
        <input type="button" class="btMinimize btBlock" value="" title="Bloquear arriba" />
        <!-- al clickear, que desactive el movimiento, y quede bloqueado arriba -->
        
        <div id="formButtonsContent">
        
            <ul>

                <li class="buttonsTop">
                                <input type="reset" value="Volver" class="btGray" title="Volver" onclick="window.location='/GestionAdministrativa/Main/Tab/TabPagosPendientes'"/>
                </li>
            </ul>
            
        </div> <!-- /formButtonsContent -->
        
        </div> <!-- /info -->
    </div> <!-- /formButtons -->

</div> <!-- /FormsColumn -->            
                    <p class="success" style="width:61%;">Orden de Pago creada correctamente. <img src="/images/icons/tick.png" /></p>
            <script>//volver()</script>
                
                
        
            
        <div class="contentEditor"> <!-- formulario de edicion de contenido -->
                
            <div class="productsEditorContent">
            
                 <div class="filtersBox filtersInfoBox">
	            	
	                <ul>
	                    <li>
							<label class="blue"><img src="/images/icons/status_online.png" title=""/> Proveedor</label>
							<input id="proveedor_autocomplete" value="Autonomo" readonly="readonly" disabled/>
							<!-- no usado 
							<input type="hidden" value="238" id="ProveedorId"></input>
							 -->
							<select name="data[ProveedorId]" class="required" id="SeleccionarProveedor">
	                        <option value="">Seleccionar</option>
	                        	                        <option value="91" >Abasto shoping</option>
	                        	                        <option value="170" >ABL</option>
	                        	                        <option value="179" >ac-bolsas</option>
	                        	                        <option value="20" >ACRILICOS PUBLILET</option>
	                        	                        <option value="14" >Acrilicos Pulbilet</option>
	                        	                        <option value="80" >Acrylux</option>
	                        	                        <option value="213" >Adler Packaging</option>
	                        	                        <option value="247" >AFIP 3379/12</option>
	                        	                        <option value="148" >AFIP Ganancias</option>
	                        	                        <option value="23" >Alabi Chiche</option>
	                        	                        <option value="277" >Ale Casas</option>
	                        	                        <option value="142" >ALEJANDRA ZANGARO COCHERA FRIAS</option>
	                        	                        <option value="197" >Alejandro Logiuoco</option>
	                        	                        <option value="74" >Algodonera paso viejo</option>
	                        	                        <option value="65" >ALLEKOTE ROBERTO</option>
	                        	                        <option value="66" >Alpha</option>
	                        	                        <option value="90" >Andres Oliveto</option>
	                        	                        <option value="214" >APF</option>
	                        	                        <option value="308" >Armytech technologies sa</option>
	                        	                        <option value="18" >ARTECOLOR</option>
	                        	                        <option value="22" >Atech J y G</option>
	                        	                        <option value="238" selected="selected">Autonomo</option>
	                        	                        <option value="305" >BAEZ 227 SA</option>
	                        	                        <option value="48" >BAITOR SA</option>
	                        	                        <option value="19" >BALBER PUBLICIDAD</option>
	                        	                        <option value="304" >BARACAR SRL</option>
	                        	                        <option value="321" >Bayres al Sur</option>
	                        	                        <option value="70" >bazar chef</option>
	                        	                        <option value="139" >Blue menu</option>
	                        	                        <option value="195" >Boker Arbolito</option>
	                        	                        <option value="193" >Bolsas impresas</option>
	                        	                        <option value="50" >Bordados sin nomre</option>
	                        	                        <option value="302" >BRD SAICFI</option>
	                        	                        <option value="86" >Bulonera vietri</option>
	                        	                        <option value="228" >Cablefix</option>
	                        	                        <option value="145" >CAJA CHICA</option>
	                        	                        <option value="4" >Calcos Closas</option>
	                        	                        <option value="140" >Carlos Alberto Juan</option>
	                        	                        <option value="182" >carpas y eventos</option>
	                        	                        <option value="290" >Carrefour</option>
	                        	                        <option value="188" >Cartoneria San jose</option>
	                        	                        <option value="43" >Casa Cesto</option>
	                        	                        <option value="166" >Casa Paso </option>
	                        	                        <option value="56" >CASEROS INOXIDABLE SA</option>
	                        	                        <option value="33" >Cativiela Hnos</option>
	                        	                        <option value="54" >CATIVIELA HNOS SA</option>
	                        	                        <option value="153" >Ccm digital</option>
	                        	                        <option value="236" >Cecilia Volpe</option>
	                        	                        <option value="15" >Celulosa Campana</option>
	                        	                        <option value="89" >Centro Box</option>
	                        	                        <option value="243" >CLINGSOR</option>
	                        	                        <option value="13" >CMYB</option>
	                        	                        <option value="253" >Co Print</option>
	                        	                        <option value="71" >Compre licores</option>
	                        	                        <option value="46" >COOP CARDONES</option>
	                        	                        <option value="295" >cooperativa armado</option>
	                        	                        <option value="59" >COPIFIL</option>
	                        	                        <option value="311" >Copy Luar SRL</option>
	                        	                        <option value="38" >correo argentino</option>
	                        	                        <option value="289" >Coto</option>
	                        	                        <option value="26" >CUATRO REINAS</option>
	                        	                        <option value="307" >Damian Piliavsky</option>
	                        	                        <option value="219" >Daniel Seguro Auto</option>
	                        	                        <option value="194" >Daniele Construcciones</option>
	                        	                        <option value="31" >Dcl group</option>
	                        	                        <option value="300" >Debolsas</option>
	                        	                        <option value="98" >DecorLine</option>
	                        	                        <option value="312" >Deheza saicfei</option>
	                        	                        <option value="109" >Diamonds</option>
	                        	                        <option value="75" >Digistamp</option>
	                        	                        <option value="147" >Digital Impres</option>
	                        	                        <option value="299" >Digito A</option>
	                        	                        <option value="52" >distribuidora maio</option>
	                        	                        <option value="267" >Diverthia</option>
	                        	                        <option value="107" >Dixtron</option>
	                        	                        <option value="34" >Doldan</option>
	                        	                        <option value="237" >Doree</option>
	                        	                        <option value="122" >Easy Almagro</option>
	                        	                        <option value="133" >EDESUR</option>
	                        	                        <option value="41" >eduardo cazala</option>
	                        	                        <option value="235" >Eduardo s Cazala </option>
	                        	                        <option value="281" >EG3 SA</option>
	                        	                        <option value="21" >El fenix</option>
	                        	                        <option value="254" >El Maiten</option>
	                        	                        <option value="47" >EL MUNDO DE LA BOLSA</option>
	                        	                        <option value="67" >El rey del bordado</option>
	                        	                        <option value="319" >el server</option>
	                        	                        <option value="120" >Emprego Arg.</option>
	                        	                        <option value="296" >Encuadernacion Atela</option>
	                        	                        <option value="297" >Encuadernacion Fer-Lin</option>
	                        	                        <option value="298" >Encuadernación Ingraf</option>
	                        	                        <option value="202" >Envap</option>
	                        	                        <option value="3" >Ernesto Costaldo</option>
	                        	                        <option value="306" >Estación del aire SRL</option>
	                        	                        <option value="192" >Estudio Kon y Asociados</option>
	                        	                        <option value="132" >Expensas</option>
	                        	                        <option value="8" >Explotter</option>
	                        	                        <option value="151" >Expreso Brio SRL</option>
	                        	                        <option value="149" >EZEQUIEL NASSIMOFF - ALQUILER OFICINA</option>
	                        	                        <option value="217" >Fabian</option>
	                        	                        <option value="292" >Factorinet</option>
	                        	                        <option value="291" >falabella sa</option>
	                        	                        <option value="141" >Federico Levy</option>
	                        	                        <option value="211" >Fernanda de la Vega</option>
	                        	                        <option value="121" >Ferreteria Industrial</option>
	                        	                        <option value="78" >Ferreteria scopazo</option>
	                        	                        <option value="248" >Fibertel</option>
	                        	                        <option value="11" >Fleet</option>
	                        	                        <option value="150" >Flete Madergold</option>
	                        	                        <option value="309" >Forestcar</option>
	                        	                        <option value="215" >Fotopolimeros Pichincha</option>
	                        	                        <option value="123" >Franco Zampini</option>
	                        	                        <option value="17" >FULL HANGER</option>
	                        	                        <option value="119" >Furia</option>
	                        	                        <option value="72" >G y A</option>
	                        	                        <option value="134" >GABRIEL EKBOIR - CUOTA</option>
	                        	                        <option value="99" >Gabriel Ekbor</option>
	                        	                        <option value="28" >GARBER</option>
	                        	                        <option value="10" >Garber Cintas</option>
	                        	                        <option value="224" >GRADO ALFA SRL</option>
	                        	                        <option value="1" >Grafica</option>
	                        	                        <option value="39" >Grafica Calgaro</option>
	                        	                        <option value="124" >Grafica DPI</option>
	                        	                        <option value="2" >Grafica Warnes/zocan grafica</option>
	                        	                        <option value="203" >Grafilak</option>
	                        	                        <option value="196" >Gravent SA</option>
	                        	                        <option value="271" >Grupo Brabo</option>
	                        	                        <option value="162" >Gustavo Towner</option>
	                        	                        <option value="184" >H.KOCH</option>
	                        	                        <option value="160" >Heling</option>
	                        	                        <option value="6" >Helioday</option>
	                        	                        <option value="218" >Herrería Cerrajería</option>
	                        	                        <option value="87" >Hierros rati</option>
	                        	                        <option value="116" >Hijos de Garber S.R.L</option>
	                        	                        <option value="276" >HOTEL SKORPIOS</option>
	                        	                        <option value="64" >Ideas Argentinas</option>
	                        	                        <option value="200" >IMG envases</option>
	                        	                        <option value="244" >IMP S/CRED EN CTA CTE</option>
	                        	                        <option value="245" >IMP S/DEBITOS EN CTA CTE</option>
	                        	                        <option value="164" >Imprenta digital</option>
	                        	                        <option value="180" >Imprenta Mendez</option>
	                        	                        <option value="88" >Imprenta Packman</option>
	                        	                        <option value="181" >Imprenta Viagraf</option>
	                        	                        <option value="212" >Impresora Serratea</option>
	                        	                        <option value="35" >Impro</option>
	                        	                        <option value="315" >Impto Bienes personales</option>
	                        	                        <option value="207" >Ingraf S.H</option>
	                        	                        <option value="135" >INGRESOS BRUTOS</option>
	                        	                        <option value="171" >ISAAC GUINI</option>
	                        	                        <option value="175" >IVA</option>
	                        	                        <option value="40" >Jaime Zamler</option>
	                        	                        <option value="265" >JB JUSTO SA</option>
	                        	                        <option value="93" >Jeremias Slacius</option>
	                        	                        <option value="63" >Jorge Cartelero</option>
	                        	                        <option value="125" >JORGE HOCHMAN</option>
	                        	                        <option value="97" >Jose Gargaglione</option>
	                        	                        <option value="176" >Juan Manuel Renzacci</option>
	                        	                        <option value="250" >Juan Pablo Caserta</option>
	                        	                        <option value="165" >Julio carpintero</option>
	                        	                        <option value="320" >Julio Oscar Vidal</option>
	                        	                        <option value="313" >Jumbo Retail Argentina SA</option>
	                        	                        <option value="293" >justo rodero e hijos</option>
	                        	                        <option value="68" >jv articulos promocionales</option>
	                        	                        <option value="282" >Kansas</option>
	                        	                        <option value="223" >Ki interiores</option>
	                        	                        <option value="27" >kol or</option>
	                        	                        <option value="73" >L.M.R Deportes</option>
	                        	                        <option value="95" >la casa de los 1000 envases</option>
	                        	                        <option value="159" >La crianza de Oxum</option>
	                        	                        <option value="174" >La viruta</option>
	                        	                        <option value="241" >Lamiart</option>
	                        	                        <option value="191" >Lamigraf</option>
	                        	                        <option value="204" >Laminow</option>
	                        	                        <option value="285" >Latin technology srl</option>
	                        	                        <option value="178" >Laura Moizeszowicz</option>
	                        	                        <option value="16" >Laura montajes</option>
	                        	                        <option value="25" >Leandro</option>
	                        	                        <option value="206" >Leandro Matayoshi</option>
	                        	                        <option value="60" >LIBRERIA IUVIDAN</option>
	                        	                        <option value="318" >Liquidador retenciones</option>
	                        	                        <option value="286" >Los tepues</option>
	                        	                        <option value="94" >Luis Ducant</option>
	                        	                        <option value="110" >Mac Pad - Grupo Impresor S.A </option>
	                        	                        <option value="51" >macona sa</option>
	                        	                        <option value="272" >Macondo</option>
	                        	                        <option value="210" >Maderera Gascon</option>
	                        	                        <option value="183" >Maderera La Esperanza</option>
	                        	                        <option value="12" >Madergold</option>
	                        	                        <option value="274" >makro</option>
	                        	                        <option value="280" >Manyplast</option>
	                        	                        <option value="186" >Marcelo Passerini</option>
	                        	                        <option value="53" >MARCELO RIVEROL</option>
	                        	                        <option value="126" >MARIA FERNANDA RODRIGUEZ</option>
	                        	                        <option value="137" >Maria Ge</option>
	                        	                        <option value="138" >Maridajes </option>
	                        	                        <option value="5" >Marplex</option>
	                        	                        <option value="268" >Marroquineria Alberto A</option>
	                        	                        <option value="266" >Marroquineria Warnes 525</option>
	                        	                        <option value="301" >martín péndola</option>
	                        	                        <option value="129" >martin zaszczynski</option>
	                        	                        <option value="310" >Mastercard</option>
	                        	                        <option value="106" >Matias Fudim</option>
	                        	                        <option value="136" >MATIAS TOKAR - PROGRAMADOR</option>
	                        	                        <option value="32" >Maytok</option>
	                        	                        <option value="226" >Mensajería Bs As</option>
	                        	                        <option value="96" >Mercado Libre</option>
	                        	                        <option value="222" >Mónica Fatala</option>
	                        	                        <option value="260" >Montajes Alejandro </option>
	                        	                        <option value="155" >Morales Fletes</option>
	                        	                        <option value="130" >MORATORIA</option>
	                        	                        <option value="201" >Mosh Imagen</option>
	                        	                        <option value="152" >Moto Oeste</option>
	                        	                        <option value="259" >Mouron</option>
	                        	                        <option value="221" >Movistar</option>
	                        	                        <option value="84" >Multiopticas</option>
	                        	                        <option value="108" >n y n</option>
	                        	                        <option value="220" >Nahuel</option>
	                        	                        <option value="227" >Ncativiela SRL</option>
	                        	                        <option value="172" >nextel</option>
	                        	                        <option value="249" >Nicar srl</option>
	                        	                        <option value="44" >NORBERTO SNAIDERMAN</option>
	                        	                        <option value="9" >Ochaxa</option>
	                        	                        <option value="270" >Operadora de estaciones de servicio sa</option>
	                        	                        <option value="198" >Ortiz Hernan Federico</option>
	                        	                        <option value="118" >Osvaldo Leiva</option>
	                        	                        <option value="205" >Pampa laminados</option>
	                        	                        <option value="156" >Paola Nuñez</option>
	                        	                        <option value="261" >Papá de Fer</option>
	                        	                        <option value="269" >papelera del mar</option>
	                        	                        <option value="239" >Papirus y Compañia</option>
	                        	                        <option value="111" >PCTronix</option>
	                        	                        <option value="115" >Pim Pam</option>
	                        	                        <option value="57" >PINTURERIA DEL CENTRO</option>
	                        	                        <option value="45" >PINTURERIA MARCOS SA</option>
	                        	                        <option value="187" >Pixelgraf</option>
	                        	                        <option value="42" >Plasticos Lavalleja</option>
	                        	                        <option value="284" >PLASTICOS VG SRL</option>
	                        	                        <option value="37" >Platt Grupo impresor</option>
	                        	                        <option value="58" >PLATT GRUPO IMPRESOR_repetido</option>
	                        	                        <option value="252" >Pol pack srl</option>
	                        	                        <option value="24" >Pontus</option>
	                        	                        <option value="263" >porta banner argentina</option>
	                        	                        <option value="158" >Printers serigrafia</option>
	                        	                        <option value="131" >PSA FINANCE PEUGEOT</option>
	                        	                        <option value="79" >publios</option>
	                        	                        <option value="294" >Qkie</option>
	                        	                        <option value="240" >Raal</option>
	                        	                        <option value="287" >Rapiarte</option>
	                        	                        <option value="314" >Red de servicios rurales srl</option>
	                        	                        <option value="143" >Regina Failenbogen</option>
	                        	                        <option value="157" >Remis zona oeste Moron</option>
	                        	                        <option value="208" >Resmacom</option>
	                        	                        <option value="82" >Rms gigantografias</option>
	                        	                        <option value="190" >RO-El PLAST  SRL</option>
	                        	                        <option value="279" >Roberto</option>
	                        	                        <option value="185" >Romina Paola Minujin</option>
	                        	                        <option value="77" >Routec</option>
	                        	                        <option value="62" >RUPERTO ANTON</option>
	                        	                        <option value="246" >Sacabocados Arales</option>
	                        	                        <option value="49" >SACABOCADOS DOLDAN</option>
	                        	                        <option value="303" >Santiago Duro</option>
	                        	                        <option value="262" >Sebastian Pendola</option>
	                        	                        <option value="169" >SEKTZER MARCELO</option>
	                        	                        <option value="209" >Ser-Car</option>
	                        	                        <option value="275" >Serflo Srl</option>
	                        	                        <option value="85" >serigrafia san martin</option>
	                        	                        <option value="177" >Shemesh Pack</option>
	                        	                        <option value="278" >Shutterstock Inc</option>
	                        	                        <option value="7" >Silvio Morales</option>
	                        	                        <option value="216" >Sindicato Unico de la Publicidad</option>
	                        	                        <option value="230" >Siris remiseria</option>
	                        	                        <option value="61" >SISTECO</option>
	                        	                        <option value="29" >SIVISA FLET</option>
	                        	                        <option value="114" >Sofia Mac Mullen</option>
	                        	                        <option value="242" >STENFAR</option>
	                        	                        <option value="273" >super servicios</option>
	                        	                        <option value="189" >Sur express SA</option>
	                        	                        <option value="168" >suss martin zaszczynski</option>
	                        	                        <option value="229" >TABACALERA SARANDI SA</option>
	                        	                        <option value="288" >Tahira Ltda</option>
	                        	                        <option value="36" >Tango Publicidad</option>
	                        	                        <option value="92" >Taxi</option>
	                        	                        <option value="154" >TELECENTRO</option>
	                        	                        <option value="173" >Telecom</option>
	                        	                        <option value="264" >todo cuadernos</option>
	                        	                        <option value="161" >Todomicro</option>
	                        	                        <option value="258" >Todoplastic</option>
	                        	                        <option value="251" >TOVBEIN</option>
	                        	                        <option value="316" >Trabajos Artes y oficios</option>
	                        	                        <option value="144" >Transporte Arlequin</option>
	                        	                        <option value="231" >Troquel Ideas</option>
	                        	                        <option value="167" >uces</option>
	                        	                        <option value="55" >UNIVERSO GOB</option>
	                        	                        <option value="146" >Vicente Alcalde</option>
	                        	                        <option value="30" >Victoria soncini</option>
	                        	                        <option value="163" >vidrieria Libertad</option>
	                        	                        <option value="113" >Vidrieria Sarandi</option>
	                        	                        <option value="81" >Vidrieria x</option>
	                        	                        <option value="112" >Vidrios srl</option>
	                        	                        <option value="76" >Viniltodo</option>
	                        	                        <option value="283" >Visa</option>
	                        	                        <option value="83" >Viste Design</option>
	                        	                        <option value="117" >Warnes Trailer</option>
	                        	                        <option value="69" >zecat</option>
	                        	                    	</select>
	                    </li>
	                    <li>
	                    	
	                    	<label class="blue"><img src="/images/icons/money.png" title=""/> Anticipo</label>
	                    	<input type="checkbox" name="data[Anticipo]" value="data[Anticipo]" class="Anticipo" id="Anticipo" readonly="readonly" disabled>
	                    	
	                    </li>
	                    <li>
                    		<label class="check">Externa</label>
		                    <input class="check SetTipoCobranza" id="TipoB" type="radio" name="Tipo" value="B" checked="checked" readonly="readonly" disabled/>
		                    
                    	</li>
                    	<li>
                    		
		                    <label class="check">Interna</label>
		                    <input class="check SetTipoCobranza" id="TipoN" type="radio" name="Tipo" value="N"  readonly="readonly" disabled/>
		                    
                    	</li>
	                    <li>
	                	    <label class="blue"><img src="/images/icons/error.png" title="Importe "/> Importe liquidado</label>       
							 
							<input type="hidden" class="required number" readonly="readonly" disabled id="ImporteTotalLiquidadoInput" name="data[ImporteLiquidado]" value="1738.98">
							
							<div id="ImporteTotalLiquidado"><label>$ 1738.98</label></div>
	                    </li>
	                    <li>
	                	    <label class="blue"><img src="/images/icons/money.png" title="Importe "/> Importe pagado</label>       
							 
							<input type="hidden" class="required number" readonly="readonly" disabled id="ImporteTotalPagadoInput" name="data[ImportePagado]" value="0.0">
							
							<div id="ImporteTotalPagado"><label>$ 0.0</label></div>
	                    </li>
	                    <li>
                	    <label class="blue"><img src="/images/icons/exclamation.png" title="Importe "/> Importe restante</label>       
						 
						<input type="hidden" class="required number" readonly="readonly" disabled id="ImporteRestanteInput" name="data[ImporteRestante]" value="1738.98">
						
						<div id="ImporteRestante"><label>$ 0.0</label></div>
                    	</li>
                    	<li>
                	    	<label class="blue"><img src="/images/icons/help.png" title="Importe "/> Saldo</label>       
						
							<div id=""><label>-1738.98</label></div>
							<p><a id="" class="VerCuentaCorriente" href="" title=""><img src="/images/icons/zoom_in.png" title="Ver cuenta corriente"/>Detalle Cta Cte</a></p>
                    	</li>
                    	<li>
	                    	
	                    	<label class="blue"><img src="/images/icons/exclamation.png" title=""/> Adelanto</label>
	                    	<input type="checkbox" name="data[Adelanto]" value="NO" class="Adelanto" id="Adelanto" readonly="readonly" disabled>
	                    	
	                    </li>
                    	<li>
                    		<a id="mostrarFacturasPendientes"><img src="/images/icons/zoom_in.png" title="Ver"/> Facturas pendientes</a>
        					<a id="mostrarDetalleDePago"><img src="/images/icons/zoom_in.png" title="Ver"/> Detalle de pago</a>
                    	</li>
	                </ul>
	            </div> <!-- /filtersBox-->            
       
            	<div id="FacturasDeCompraPendientes">
		        	<!-- ajax SetProveedor -->
		       	</div>
		       	
		    
		       	
		       	<div id="FacturasDeCompraLiquidadas">
		        	   
            			
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



<div class="list">
<h1>Facturas de compra liquidadas</h1>

<h2>Cantidad: 1</h2>
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
				
										<!-- items -->
					
											<tr>
							<td width="10%">
								<p class="">
										2014-09-18 15:43:40
								</p>
							</td>
							<td width="10%">
								<p class="">
										<!-- puedo lista de base de datos o de sesion -->
										# 34234234
								</p>
							</td>
							<td width="10%">
								<p class="">
										$ 1738.98
								</p>
							</td>
						</tr>
                    					<!-- items -->
									</table>
            </div> <!-- /listItems -->
            
</div> <!-- /list -->         					         					       	</div>
                
		       	<div id="OrdenesDeCompraPendientes">
		        	<!-- ajax SetProveedor -->
		       	</div>
		        
		    
            	
                <!-- ordenes de compra agregadas -->
                <div id="OrdenesDeCompraAgregadas">
		        	<!-- por ajax -->
		        			        </div> 
		        <!-- fin ordenes de compra agregadas -->
		        
                	<!-- pagos -->
                <div id="Pagos">
                	<!-- pagos por ajax -->
                	                </div>
                            
                
                
                <div class="contentTitles">
                    <input type="hidden" id="" class="number" name="data[Importe]" value="1738.98">
                </div> <!-- /contentTitles -->
                
         
         		<div class="contentTitles">
                    <label class="blue">Comentario</label>
                    <textarea name="data[Comentario]" cols="45" rows="5" class="" readonly="readonly"></textarea>
                </div> <!-- /contentTitles -->      
                
            </div> <!-- /productsEditorContent -->
        </div>  <!-- /contentEditor -->
    </div> <!-- /form -->
</form>