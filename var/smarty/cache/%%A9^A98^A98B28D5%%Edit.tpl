282
a:4:{s:8:"template";a:4:{s:25:"Backend/Cobranza/Edit.tpl";b:1;s:31:"Backend/Cobranza/ColumnForm.tpl";b:1;s:39:"Backend/Cobranza/FacturasLiquidadas.tpl";b:1;s:29:"Backend/Cobranza/GetPagos.tpl";b:1;}s:9:"timestamp";i:1462381151;s:7:"expires";i:1462381151;s:13:"cache_serials";a:0:{}}
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

    $('#FechaAnulacion').datepicker({
		changeMonth: true,
		changeYear: true,
        dateFormat: 'dd/mm/yy'
	});
	
    var availableTags = [
							"Havanna","clona","PATAGONIA MEDICAL SA","diego goria","Bausch y Lomb","cristal depot","abd","eki plus","AACREA","calver-maldito glam","corte final","CACIC SPORTS VISION","Turner","Lens Depot","JyG","Il Gatto","Bermuda","Geuna Boats","Drager","Tactica Consulting","PETRESKY IGNACIO MARIO","NETSOL","INTERDREAMERS","TUTI FRUTI","Viste Design","Daiu","Peperoni Jeans","Tucci","Gaelle","Rafaela Motores","AET","Astillero Geuna","All Over","Mica","Ernesto Automotores","Nathan","Kane","Lilitex","Old Brigde","Caimanes de Formoza","Casa Cesto","Optica Lennon","El pollo Azul","Ciclismo","Mali","Polygraph","Pontus","Buenos Aires Key","DecorLine","Hathor","Sony","Cabaña Argentina","Drams","Sound Quality","Maspel","Rosita Curcho","FilmaBonito","Kolor","Iszak Hermanos","Sticom","Cancilleria de Relaciones exteriores","Apehi","Maxtrip","paralelo cero","Boston seguros","Imprenta Packman","estela do sul","biosintex","Zecat","Samsonite","Marine pool","Hebraica","Gilera Ya","Pura Piel","LAHER SRL - Gepetto","estrela do sul","Ivecco","Furia","Importadora Sudamericana ","Distriwash","Descuento City","Comercio Pet","Comision Nacional de Comunicacion","Scis Medicina Prepeaga","Todo Correas","Rayban","Porotitos","Capo Mafia","Susana Zaszczynski","Glucolvil","Ergo Renova","Visa Argentina ","Jenny","Ledesma","DCL Group","Jonatan Kusnier","Romano marine","Gotico","distribuidora M & M","Aurelia S.A.C.I.F","Nadia Scolnic","Ocular Lens","Gerardo Towner","Estancia La Pelada","Mariano Silberberg","NATURAL OPTIC SRL","SILVER VISION SRL","DESCO - Gepetto","Alejandro Amarilla","Adfunky","Santiago Lorente","Guia Oleo","Gatorade","Norali","Mosh Imagen","Lacroix Pollich Alejandro","Ortiz Hernan Federico","Love Toys SRL","Richard Escalera Segovia","99 centavos","Estudio edison","Maria Marte Mallea","Levitex","Batanga Media","YMF-LAB","bepoketprint","Gurruchaga outlet","Full time producciones","RETAIL & RESEARCH S.R.L","Boker Arbolito","Banco Patagonia","Danone","Agencia Creativa","Crossfit Andino","Cristian Almiron","Almiron Cristian","Korn propiedades","Selsa","Tregar","Diamonds","Estilo Griscan","Barcelona Vinos","Carlos Encargado","Cepas Argentina","Abbott ","Primon","Estudio Grin","Pet Por","Q4 MKT","Fundación Programa Integrar","Awassi","Gotas pc","Cetrogar","Allergan","Pucherito","Fundacion Carlos Díaz Vélez","Cittadella","Barra Tres","Kinderinos","Shurita","Matias Fudim","LA MAQUINITA","Active Cosmetic","kinobovio","Zanella","Bratislava marketing group","Prodea. Productos de agua SA (Cunnington)","Ringo","Wath Land","QIX"
                 ];

    
            

    $("input#cliente_autocomplete").autocomplete({
        source: availableTags,
      //define select handler
		select: function(e, ui) {
			var valor = ui.item.value;
			SetClienteSeleccionar(valor);
			GetFacturasPendientesDeCobro();
		}    
    });  

    SetClienteInitTextValue();
    SetClienteSeleccionar($("input#cliente_autocomplete").val());

    $("#cliente_autocomplete").blur(function(){
        if( $(this).val() == '' )
            $(this).val( $(this).attr("defaultValue") );
    });

    $("#cliente_autocomplete").focus(function(){
        if( $(this).val() == $(this).attr("defaultValue"))
            $(this).val('');
    });

    $(".Print").click(function(){
        
        var url	=	'/Cobranza/View/id/' + $('#CobranzaId').val();
        
		var opciones="toolbar=no, location=no, directories=no, status=no, menubar=yes, scrollbars=yes, resizable=yes, width=1000, height=700, top=85, left=140";

		abrirPopUp(url, opciones);        

        return false;
    });

	$("#mostrarFacturasPendientes").click(function () {
    	$("#FacturasPendientesDeCobro").toggle("slow");
   	});

	$("#mostrarDetalleDePago").click(function () {
    	$("#Pagos").toggle("slow");
   	});

	$("#SeleccionarCliente").hide();

    $(".SetTipoCobranza").click(function(){
        
    	GetFacturasPendientesDeCobro();
    });

	$(".VerCuentaCorriente").click(function(){
        
		var url	=	'/CuentaCorriente/ListCliente/ClienteId/' + GetClienteId();
        
		var opciones="toolbar=no, location=no, directories=no, status=no, menubar=yes, scrollbars=yes, resizable=yes, width=1000, height=700, top=85, left=140";

		abrirPopUp(url, opciones);        

        return false;
    });
	
    
});

function SetClienteSeleccionar(NombreCliente)
{
	inputText	=	NombreCliente;
	// setear valor select selected por texto de option / set option selected by text
	//$("#"+dropdown_id+" option:contains(" + inputText + ")").attr('selected', 'selected');
	
	$("#SeleccionarCliente option").each(function () {
        if ($(this).html() == inputText) {
            $(this).attr("selected", "selected");
            return;
        }
	});

	
}

function GetFacturasPendientesDeCobro()
{
	// dropdown
	var $selected 	=	$("#SeleccionarCliente").find('option:selected');
	var $clienteid	=	$selected.val();

	
                // Si el clienteid fue pasado por GET
        var $clienteid	=	52;
            
	
	// control
	if( $clienteid < 0 )
	{
		alert('El cliente seleccionado no es correcto');
	}
	
	// cargar FC pendientes por ajax
	$.ajax({
		type: "POST",
		url: '/Cobranza/GetFacturasPendientesDeCobro',
		dataType: "text/html",
		data: {
			'ClienteId': $clienteid,
			'TipoCobranza': GetTipoCobranza(),
		},
		success: function(html){
			$("#FacturasPendientesDeCobro").html(html);
			GetPagos('list', null);
			ResetImportes();
		}

	});
}

function SetClienteInitTextValue()
{
	NombreCliente = GetSelectedTextValue("SeleccionarCliente");
	if(NombreCliente != 'Seleccionar')
		$("input#cliente_autocomplete").val(NombreCliente);
}

function GetSelectedTextValue(dropdownid)
{
	var $selected 	=	$("#"+dropdownid).find('option:selected');
	var $selectedtext	=	$selected.html();

	return $selectedtext;
}


function abrirPopUp(pagina, opciones)
{
	window.open(pagina,"",opciones);
}

function GetPagos(accion, CobranzaId)
{
	var PagoId;
	// cuando accion es delete, el parametro es PagoId en lugar de OrdenDePagoId
	if(accion == 'del')
	{
		PagoId	=	CobranzaId;
	}

	var TipoPagoId	=	$("#PagoTipoId option:selected").val();
	//alert(TipoPagoId);
	//cheque tercero
	if(TipoPagoId == 4)
	{
		var banco	=	$('#BancoItem').val();
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
	
	var notacreditoid = $('#NotaCreditoId').val();
	if(notacreditoid > 0)
	{
		TipoPagoId=12;
	}
	// al borrar es CobranzaDetalleId
	$.ajax({
		type: "POST",
		url: '/Cobranza/GetPagos',
		dataType: "text/html",
		data: {
			'Accion': accion,
			'CobranzaId': CobranzaId,
			'data[CobranzaId]': $('#CobranzaId').val(),
			'data[ClienteId]': GetClienteId(),
			'data[Importe]': $('#ImportePagoItem').val(),
			'data[PagoTipoId]': TipoPagoId,
			'data[Detalle]': $('#DetallePagoItem').val(),
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
			'data[NotaCreditoId]': notacreditoid
		},
		success: function(html){
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

function IsSetCliente()
{
	var $selected 	=	$("#SeleccionarCliente").find('option:selected');
	var $id	=	$selected.val();
	// control
	if($id > 0)
		return true;

	return false;
}

function GetTipoCobranza()
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
/*
function GetLiquidacion(accion, CobranzaId)
{
	
	// al borrar es CobranzaLiquidacionId
	$.ajax({
		type: "POST",
		url: '/Cobranza/GetLiquidacion',
		dataType: "text/html",
		data: {
			'Accion': accion,
			'CobranzaId': $('#CobranzaId').val(),
			'data[Tipo]': GetTipoCobranza(),
			'data[CobranzaId]': CobranzaId,
			'data[NumeroFactura]': $('#NumeroItem').val(),
			'data[Importe]': $('#ImporteItem').val()
		},
		success: function(html){
			
			$("#Liquidacion").html(html);
		}

	});

	return false;
}
*/
function GetClienteId()
{
	var $selected 	=	$("#SeleccionarCliente").find('option:selected');
	var $id	=	$selected.val();
	// control
	if($id > 0)
		return $id;

	//alert('Ingrese el proveedor');

	return false;
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



<h1>Editar cobranza &raquo; <span>271 (Interno 322)</span></h1>

		        
         <input type="reset" value="Imprimir" id="322" class="btDark Print" title="Imprimir" />
        

<form id="FrmEdit" enctype="multipart/form-data" action="" method="post">
    <input type="hidden" id="CobranzaId" name="data[Id]" value="322" />
    
        
    <div class="form">
        <div id="FormsColumn"> <!-- contiene toda la columna -->

    <div class="formButtons">
        <div class="info">
        <input type="button" class="btMinimize btBlock" value="" title="Bloquear arriba" />
        <!-- al clickear, que desactive el movimiento, y quede bloqueado arriba -->
        
        <div id="formButtonsContent">
        
            <ul>

                <li class="buttonsTop">
                                <input type="reset" value="Volver" class="btGray" title="Volver" onclick="window.location='/GestionAdministrativa/Main/Tab/TabCobranzasPendientes'"/>
                </li>
            </ul>
            
        </div> <!-- /formButtonsContent -->
        
        </div> <!-- /info -->
    </div> <!-- /formButtons -->

</div> <!-- /FormsColumn -->            
        <div class="contentEditor"> <!-- formulario de edicion de contenido -->   
        
                
            <div class="productsEditorContent">
            
                        <div class="filtersBox filtersInfoBox">
                
                <ul>
                	<li>
                		
                		<label class="blue"><img src="/images/icons/status_online.png" title=""/> Cliente</label>
						<input id="cliente_autocomplete" value="Cabaña Argentina" readonly="readonly" disabled/>
						
						<select name="data[ClienteId]" class="required CambiarCliente" id="SeleccionarCliente">
                        <option value="">Seleccionar</option>
                                                <option value="128" >99 centavos</option>
                                                <option value="9" >AACREA</option>
                                                <option value="160" >Abbott </option>
                                                <option value="7" >abd</option>
                                                <option value="178" >Active Cosmetic</option>
                                                <option value="118" >Adfunky</option>
                                                <option value="31" >AET</option>
                                                <option value="141" >Agencia Creativa</option>
                                                <option value="117" >Alejandro Amarilla</option>
                                                <option value="33" >All Over</option>
                                                <option value="169" >Allergan</option>
                                                <option value="147" >Almiron Cristian</option>
                                                <option value="62" >Apehi</option>
                                                <option value="32" >Astillero Geuna</option>
                                                <option value="105" >Aurelia S.A.C.I.F</option>
                                                <option value="166" >Awassi</option>
                                                <option value="139" >Banco Patagonia</option>
                                                <option value="157" >Barcelona Vinos</option>
                                                <option value="173" >Barra Tres</option>
                                                <option value="132" >Batanga Media</option>
                                                <option value="5" >Bausch y Lomb</option>
                                                <option value="134" >bepoketprint</option>
                                                <option value="17" >Bermuda</option>
                                                <option value="68" >biosintex</option>
                                                <option value="138" >Boker Arbolito</option>
                                                <option value="65" >Boston seguros</option>
                                                <option value="181" >Bratislava marketing group</option>
                                                <option value="48" >Buenos Aires Key</option>
                                                <option value="52" selected="selected">Cabaña Argentina</option>
                                                <option value="12" >CACIC SPORTS VISION</option>
                                                <option value="40" >Caimanes de Formoza</option>
                                                <option value="10" >calver-maldito glam</option>
                                                <option value="61" >Cancilleria de Relaciones exteriores</option>
                                                <option value="91" >Capo Mafia</option>
                                                <option value="158" >Carlos Encargado</option>
                                                <option value="41" >Casa Cesto</option>
                                                <option value="159" >Cepas Argentina</option>
                                                <option value="168" >Cetrogar</option>
                                                <option value="44" >Ciclismo</option>
                                                <option value="172" >Cittadella</option>
                                                <option value="2" >clona</option>
                                                <option value="83" >Comercio Pet</option>
                                                <option value="84" >Comision Nacional de Comunicacion</option>
                                                <option value="11" >corte final</option>
                                                <option value="6" >cristal depot</option>
                                                <option value="143" >Cristian Almiron</option>
                                                <option value="142" >Crossfit Andino</option>
                                                <option value="26" >Daiu</option>
                                                <option value="140" >Danone</option>
                                                <option value="98" >DCL Group</option>
                                                <option value="49" >DecorLine</option>
                                                <option value="116" >DESCO - Gepetto</option>
                                                <option value="82" >Descuento City</option>
                                                <option value="155" >Diamonds</option>
                                                <option value="4" >diego goria</option>
                                                <option value="102" >distribuidora M & M</option>
                                                <option value="81" >Distriwash</option>
                                                <option value="19" >Drager</option>
                                                <option value="53" >Drams</option>
                                                <option value="8" >eki plus</option>
                                                <option value="43" >El pollo Azul</option>
                                                <option value="94" >Ergo Renova</option>
                                                <option value="35" >Ernesto Automotores</option>
                                                <option value="109" >Estancia La Pelada</option>
                                                <option value="67" >estela do sul</option>
                                                <option value="156" >Estilo Griscan</option>
                                                <option value="77" >estrela do sul</option>
                                                <option value="129" >Estudio edison</option>
                                                <option value="162" >Estudio Grin</option>
                                                <option value="57" >FilmaBonito</option>
                                                <option value="136" >Full time producciones</option>
                                                <option value="171" >Fundacion Carlos Díaz Vélez</option>
                                                <option value="165" >Fundación Programa Integrar</option>
                                                <option value="79" >Furia</option>
                                                <option value="29" >Gaelle</option>
                                                <option value="121" >Gatorade</option>
                                                <option value="108" >Gerardo Towner</option>
                                                <option value="18" >Geuna Boats</option>
                                                <option value="73" >Gilera Ya</option>
                                                <option value="93" >Glucolvil</option>
                                                <option value="167" >Gotas pc</option>
                                                <option value="101" >Gotico</option>
                                                <option value="120" >Guia Oleo</option>
                                                <option value="135" >Gurruchaga outlet</option>
                                                <option value="50" >Hathor</option>
                                                <option value="1" >Havanna</option>
                                                <option value="72" >Hebraica</option>
                                                <option value="16" >Il Gatto</option>
                                                <option value="80" >Importadora Sudamericana </option>
                                                <option value="66" >Imprenta Packman</option>
                                                <option value="23" >INTERDREAMERS</option>
                                                <option value="59" >Iszak Hermanos</option>
                                                <option value="78" >Ivecco</option>
                                                <option value="96" >Jenny</option>
                                                <option value="99" >Jonatan Kusnier</option>
                                                <option value="15" >JyG</option>
                                                <option value="37" >Kane</option>
                                                <option value="174" >Kinderinos</option>
                                                <option value="179" >kinobovio</option>
                                                <option value="58" >Kolor</option>
                                                <option value="148" >Korn propiedades</option>
                                                <option value="177" >LA MAQUINITA</option>
                                                <option value="124" >Lacroix Pollich Alejandro</option>
                                                <option value="76" >LAHER SRL - Gepetto</option>
                                                <option value="97" >Ledesma</option>
                                                <option value="14" >Lens Depot</option>
                                                <option value="131" >Levitex</option>
                                                <option value="38" >Lilitex</option>
                                                <option value="126" >Love Toys SRL</option>
                                                <option value="45" >Mali</option>
                                                <option value="130" >Maria Marte Mallea</option>
                                                <option value="110" >Mariano Silberberg</option>
                                                <option value="71" >Marine pool</option>
                                                <option value="55" >Maspel</option>
                                                <option value="176" >Matias Fudim</option>
                                                <option value="63" >Maxtrip</option>
                                                <option value="34" >Mica</option>
                                                <option value="123" >Mosh Imagen</option>
                                                <option value="106" >Nadia Scolnic</option>
                                                <option value="36" >Nathan</option>
                                                <option value="111" >NATURAL OPTIC SRL</option>
                                                <option value="22" >NETSOL</option>
                                                <option value="122" >Norali</option>
                                                <option value="107" >Ocular Lens</option>
                                                <option value="39" >Old Brigde</option>
                                                <option value="42" >Optica Lennon</option>
                                                <option value="125" >Ortiz Hernan Federico</option>
                                                <option value="64" >paralelo cero</option>
                                                <option value="3" >PATAGONIA MEDICAL SA</option>
                                                <option value="27" >Peperoni Jeans</option>
                                                <option value="163" >Pet Por</option>
                                                <option value="21" >PETRESKY IGNACIO MARIO</option>
                                                <option value="46" >Polygraph</option>
                                                <option value="47" >Pontus</option>
                                                <option value="90" >Porotitos</option>
                                                <option value="161" >Primon</option>
                                                <option value="182" >Prodea. Productos de agua SA (Cunnington)</option>
                                                <option value="170" >Pucherito</option>
                                                <option value="75" >Pura Piel</option>
                                                <option value="164" >Q4 MKT</option>
                                                <option value="186" >QIX</option>
                                                <option value="30" >Rafaela Motores</option>
                                                <option value="89" >Rayban</option>
                                                <option value="137" >RETAIL & RESEARCH S.R.L</option>
                                                <option value="127" >Richard Escalera Segovia</option>
                                                <option value="183" >Ringo</option>
                                                <option value="100" >Romano marine</option>
                                                <option value="56" >Rosita Curcho</option>
                                                <option value="70" >Samsonite</option>
                                                <option value="119" >Santiago Lorente</option>
                                                <option value="85" >Scis Medicina Prepeaga</option>
                                                <option value="153" >Selsa</option>
                                                <option value="175" >Shurita</option>
                                                <option value="115" >SILVER VISION SRL</option>
                                                <option value="51" >Sony</option>
                                                <option value="54" >Sound Quality</option>
                                                <option value="60" >Sticom</option>
                                                <option value="92" >Susana Zaszczynski</option>
                                                <option value="20" >Tactica Consulting</option>
                                                <option value="88" >Todo Correas</option>
                                                <option value="154" >Tregar</option>
                                                <option value="28" >Tucci</option>
                                                <option value="13" >Turner</option>
                                                <option value="24" >TUTI FRUTI</option>
                                                <option value="95" >Visa Argentina </option>
                                                <option value="25" >Viste Design</option>
                                                <option value="184" >Wath Land</option>
                                                <option value="133" >YMF-LAB</option>
                                                <option value="180" >Zanella</option>
                                                <option value="69" >Zecat</option>
                                            	</select>
                		
                	</li>
                    <li>
	                	    <label class="blue"><img src="/images/icons/error.png" title="Importe "/> Importe liquidado</label>       
							 
							<input type="hidden" class="required number" readonly="readonly" disabled id="ImporteTotalLiquidadoInput" name="data[ImporteLiquidado]" value="4799.66">
							
							<div id="ImporteTotalLiquidado"><label>$ 4799.66</label></div>
	                    </li>
	                    <li>
	                	    <label class="blue"><img src="/images/icons/money.png" title="Importe "/> Importe pagado</label>       
							 
							<input type="hidden" class="required number" readonly="readonly" disabled id="ImporteTotalPagadoInput" name="data[ImportePagado]" value="4799.66">
							
							<div id="ImporteTotalPagado"><label>$ 0.0</label></div>
	                    </li>
	                    <li>
                	    <label class="blue"><img src="/images/icons/exclamation.png" title="Importe "/> Importe restante</label>       
						 
						<input type="hidden" class="required number" readonly="readonly" disabled id="ImporteRestanteInput" name="data[ImporteRestante]" value="0">
						
						<div id="ImporteRestante"><label>$ 0.0</label></div>
                    	</li>
                    	<li>
                    		<label class="check">Externa</label>
		                    <input class="check SetTipoCobranza" id="TipoB" type="radio" name="Tipo" value="B" checked="checked"/>
		                    
                    	</li>
                    	<li>
                    		
		                    <label class="check">Interna</label>
		                    <input class="check SetTipoCobranza" id="TipoN" type="radio" name="Tipo" value="N" />
		                    
                    	</li>
                    	<li>
                	    	<label class="blue"><img src="/images/icons/help.png" title="Importe "/> Saldo</label>       
						
							<div id="saldo"><label>295866.46</label></div>
							<p><a id="open_cliente" class="VerCuentaCorriente" href="" title=""><img src="/images/icons/zoom_in.png" title="Ver cuenta corriente"/>Detalle Cta Cte</a></p>
                    	</li>
                    	<li>
                    		<a id="mostrarFacturasPendientes"><img src="/images/icons/zoom_in.png" title="Ver"/> Facturas pendientes</a>
        					<a id="mostrarDetalleDePago"><img src="/images/icons/zoom_in.png" title="Ver"/> Detalle de pago</a>
                    	</li>
                </ul>
            </div> <!-- /filtersBox-->
            
            		            <p class="success" style="width:61%;">Cobranza creada correctamente. <img src="/images/icons/tick.png" /></p>
		            <script>//volver()</script>
		        		        
		                    
            
		        <div id="FacturasPendientesDeCobro">
		        	<!-- ajax SetProveedor -->
		       	</div>
		       	
		       	<div id="FacturasLiquidadas">
		        	   
            			
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
<h1>Facturas liquidadas</h1>

<h2>Cantidad: 1</h2>
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
				
										<!-- items -->
					
											<tr>
							<td width="10%">
								<p class="">
										<!-- puedo lista de base de datos o de sesion -->
										# 2000048
								</p>
							</td>
							<td width="10%">
								<p class="">
										$ 4799.66
								</p>
							</td>
						</tr>
                    					<!-- items -->
									</table>
            </div> <!-- /listItems -->
            
</div> <!-- /list -->         					         					       	</div>
                            
                
                <!-- pagos -->
                <div id="Pagos">
                	<!-- pagos por ajax -->
                	   
            			
<script type="text/javascript">
$(document).ready(function(){
    $(".AgregarPago").click(function(){

        if(IsSetCliente())
        {
        	GetPagos('add', $('#CobranzaId').val());
        }
        else
            alert('Ingrese el cliente');
          

        return false;
    });

    $(".BorrarPago").click(function(){
        var PagoId	=	$(this).attr('id');
        
        if(PagoId)
        	GetPagos('del', PagoId);

        return false;
    });

    $("#ImportePagoItem").blur(function(){
        if( $(this).val() == '' )
            $(this).val( $(this).attr("defaultValue") );
    });

    $("#ImportePagoItem").focus(function(){
        if( $(this).val() == $(this).attr("defaultValue"))
            $(this).val('');
    });

    $("#DetallePagoItem").blur(function(){
        if( $(this).val() == '' )
            $(this).val( $(this).attr("defaultValue") );
    });

    $("#DetallePagoItem").focus(function(){
        if( $(this).val() == $(this).attr("defaultValue"))
            $(this).val('');
    });


    $('#FechaChequeItem').datepicker({
		changeMonth: true,
		changeYear: true,
        dateFormat: 'dd/mm/yy'
	});

    $('#FechaCobroItem').datepicker({
		changeMonth: true,
		changeYear: true,
        dateFormat: 'dd/mm/yy'
	});
	
    $('#PagoTipoId').change(function(){
    	var PagoTipoId	=	$("#PagoTipoId option:selected").val();
    	// si el tipo de pago es Cheque tercero = 4
    	if(PagoTipoId == 4)
    	{
    		$("#FormEfectivo").hide();
    		$("#FormTransferencia").hide();
    		$("#FormCheque").show();
    		return;
    	}
    	// transferencia, mostrar form
    	if(PagoTipoId == 13)
    	{
    		$("#FormEfectivo").hide();
    		$("#FormCheque").hide();
    		$("#FormTransferencia").show();
    		return;
    	}
    	else
    	{
    		$("#FormEfectivo").show();
    		$("#FormCheque").hide();
    		$("#FormTransferencia").hide();
    		return;
    	}
    });

    //$("#FormCheque").hide();
});

function abrirPopUp(pagina, opciones)
{
	window.open(pagina,"",opciones);
}

</script>



<!-- insumos -->
<h1>Detalle de cobro</h1>
<!-- 
 -->

<h2>Total del cobro: $ 4799.66</h2>
<input type="hidden" id="TotalPago" name="" value="4799.66" />
	<div class="list">
			      
           <div class="listTop">
                <div>
                    <table border="0" cellpadding="0" cellspacing="0">
							<tr>    
                                <td width="10%"><p>Tipo de pago</p> </td>
                                <td width="10%"><p>Importe</p> </td>
                                <td width="20%"><p>Detalle</p> </td>
                                
                                <td width="10%"><p>Cobro</p> </td>
                                
                                <td width="10%"><p>Acciones</p></td>
                            </tr>
                    </table>
                </div>
            </div> <!-- /listadoTop -->
                        
                    <div class="listItems">
                    	<table border="0" cellpadding="0" cellspacing="0" width="100%">
                                                
												    <tr >
                                <td width="10%">Transferencia bancaria </td>
                                <td width="10%">$ 4601.32 </td>
                                <td width="20%">ICBC-05280210159072 </td>
                                <!-- usado desde array session y como propiedad de CobranzaDetalle -->
                                <td width="10%"> </td>
                                
                                <td width="10%">
                                                                </td>
						    </tr>
												    <tr >
                                <td width="10%">Retencion ganacias </td>
                                <td width="10%">$ 79.34 </td>
                                <td width="20%">0001-00014111 </td>
                                <!-- usado desde array session y como propiedad de CobranzaDetalle -->
                                <td width="10%"> </td>
                                
                                <td width="10%">
                                                                </td>
						    </tr>
												    <tr >
                                <td width="10%">Retencion IIBB CABA </td>
                                <td width="10%">$ 119.00 </td>
                                <td width="20%">0001-00003310 </td>
                                <!-- usado desde array session y como propiedad de CobranzaDetalle -->
                                <td width="10%"> </td>
                                
                                <td width="10%">
                                                                </td>
						    </tr>
						                        
                                                </table>
                    </div> <!-- /listItems -->
                    
                    <!-- si existe la orden de pago, no se pueden agregar pagos -->
                                    </div> <!-- /list -->
<!-- end pagos -->         			                </div>
                
                
         
         		<div class="contentTitles">
                    <label class="blue">Comentario</label>
                    <textarea name="data[Comentario]" cols="45" rows="5" class="" readonly="readonly" disabled></textarea>
                </div> <!-- /contentTitles -->  
             
            </div> <!-- /productsEditorContent -->
        </div>  <!-- /contentEditor -->
    </div> <!-- /form -->
</form>