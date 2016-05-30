152
a:4:{s:8:"template";a:1:{s:30:"Backend/FacturaCompra/Edit.tpl";b:1;}s:9:"timestamp";i:1411065232;s:7:"expires";i:1411065232;s:13:"cache_serials";a:0:{}}
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

	//SetCliente();
	
	$('.MostrarTodo').click(function() {
		
		if($('#MostrarTodo').is(':checked'))
		{  
			$('#gravado27').show();
			$('#gravado10_5').show();
			$('#percepciones').show();
		}
		else
		{
			$('#gravado27').hide();
			$('#gravado10_5').hide();
			$('#percepciones').hide();
		}
        
	});
	    
    $('.sumar').change(function() {
        $('#total').val($('#total').val()+$(this).val());
	});

    $('.total').change(function() {
        SetImporteTotal();
	});

    $('#ImporteTotal').change(function() {
        // total - liquidado - percepciones
        SetImporteRestante();
        
	});
    
	$('#FrmEdit').submit(function() {
		
		var importeTotalLiquidado	=	$('#ImporteTotalLiquidadoInput').val();
		
		var importeTotal	= $('#ImporteTotalInput').val();

		var $selected 	=	$("#SeleccionarNotaCreditoDebito").find('option:selected');
		var $tiponota	=	$selected.val();
		
		if( ($tiponota == 'ND') || ($tiponota == 'NC'))
		{
			var r	=	confirm('Esta seguro que desea crear una Nota de credito o debito?');

			if(r)
				return true;
			else
				return false;
			/*
			alert(importeTotal);
			if(!importeTotal)
			{
				alert('Si selecciona crear una Nota de credito o debito, debe ser un importe negativo');
				return false;
			}
			else
			{
				// BUG 2013/11/27: no suma bien
				if(importeTotal >=0)
				{
					//alert('Si selecciona crear una Nota de credito o debito, debe ser un importe negativo');
					return true;
				}
				else
					return true; // si ingresa importe negativo, enviar formulario
			}
			*/
		}
	
		if(importeTotal == 0)
		{
			alert('Debe liquidar un importe mayor que cero');
			return false;
		}

		if(importeTotalLiquidado > 0)
		{
			// no se puede liquidar mas del total
			if(importeTotalLiquidado > importeTotal)
			{
				var msg	=	'El importe liquidado no puede ser mayor que el importe total';
				alert(msg);
				return false;
			}
		}
		
		if(importeTotalLiquidado == 0)
		{
			var conf	=	$('#ConfirmacionMostrada').attr('value');
			
			if(conf != 'SI')
			{
				$('#MostrarConfirmacion').val('NO');
				
				$("#dialog-confirm").dialog({
					resizable: true,
					height:200,
					width: 400, 
					modal: true,
					buttons: {
						'Aceptar': function() {
							$(this).dialog('close');
							if(importeTotalLiquidado == 0)
							{
								var conf = confirm('La factura no tiene ordenes de compra asociadas. Desea crear la factura?');
								if(conf)
									$('#FrmEdit').submit();
								else
								{
									$('#MostrarConfirmacion').val('SI');
									$('#ConfirmacionMostrada').attr('value', 'NO');
								}
							}

							$('#MostrarConfirmacion').val('SI');
							$('#ConfirmacionMostrada').attr('value', 'NO');
							
						},
						'Cancelar': function() {
							$(this).dialog('close');
							$('#ConfirmacionMostrada').attr('value', 'NO');
							return false;
						}
					}
				});
				// flag 
				$('#ConfirmacionMostrada').attr('value', 'SI');
				$('#MostrarConfirmacion').val('SI');
				return false;
			}
		}
  	});

    $('#FechaFactura').datepicker({
		changeMonth: true,
		changeYear: true,
        dateFormat: 'dd/mm/yy'
	});

    $('#FechaFacturaVencimiento').datepicker({
		changeMonth: true,
		changeYear: true,
        dateFormat: 'dd/mm/yy'
	});

    $(".PrintOrdenDePago").click(function(){
        
        var url	=	'/OrdenPago/View/id/' + $(this).attr('id');
        
		var opciones="toolbar=no, location=no, directories=no, status=no, menubar=yes, scrollbars=yes, resizable=yes, width=1000, height=700, top=85, left=140";

		abrirPopUp(url, opciones);        

        return false;
    });

    $('#ComentarioImporte').change(function(){
        var importe=   $(this).attr("value");

        SumarTotal(importe);
    });

	$('.CambiarProveedor').change(function(){
    	
		var $selected 	=	$(this).find('option:selected');
		var $proveedorid	=	$selected.val();
		
		if( $proveedorid < 0 )
		{
			alert('El proveedor seleccionado no es correcto');
		}
    });

    var availableTags = [
							"Grafica","Grafica Warnes/zocan grafica","Ernesto Costaldo","Calcos Closas","Marplex","Helioday","Silvio Morales","Explotter","Ochaxa","Garber Cintas","Fleet","Madergold","CMYB","Acrilicos Pulbilet","Celulosa Campana","Laura montajes","FULL HANGER","ARTECOLOR","BALBER PUBLICIDAD","ACRILICOS PUBLILET","El fenix","Atech J y G","Alabi Chiche","Pontus","Leandro","CUATRO REINAS","kol or","GARBER","SIVISA FLET","Victoria soncini","Dcl group","Maytok","Cativiela Hnos","Doldan","Impro","Tango Publicidad","Platt Grupo impresor","correo argentino","Grafica Calgaro","Jaime Zamler","eduardo cazala","Plasticos Lavalleja","Casa Cesto","NORBERTO SNAIDERMAN","PINTURERIA MARCOS SA","COOP CARDONES","EL MUNDO DE LA BOLSA","BAITOR SA","SACABOCADOS DOLDAN","Bordados sin nomre","macona sa","distribuidora maio","MARCELO RIVEROL","CATIVIELA HNOS SA","UNIVERSO GOB","CASEROS INOXIDABLE SA","PINTURERIA DEL CENTRO","PLATT GRUPO IMPRESOR_repetido","COPIFIL","LIBRERIA IUVIDAN","SISTECO","RUPERTO ANTON","Jorge Cartelero","Ideas Argentinas","ALLEKOTE ROBERTO","Alpha","El rey del bordado","jv articulos promocionales","zecat","bazar chef","Compre licores","G y A","L.M.R Deportes","Algodonera paso viejo","Digistamp","Viniltodo","Routec","Ferreteria scopazo","publios","Acrylux","Vidrieria x","Rms gigantografias","Viste Design","Multiopticas","serigrafia san martin","Bulonera vietri","Hierros rati","Imprenta Packman","Centro Box","Andres Oliveto","Abasto shoping","Taxi","Jeremias Slacius","Luis Ducant","la casa de los 1000 envases","Mercado Libre","Jose Gargaglione","DecorLine","Gabriel Ekbor","Matias Fudim","Dixtron","n y n","Diamonds","Mac Pad - Grupo Impresor S.A ","PCTronix","Vidrios srl","Vidrieria Sarandi","Sofia Mac Mullen","Pim Pam","Hijos de Garber S.R.L","Warnes Trailer","Osvaldo Leiva","Furia","Emprego Arg.","Ferreteria Industrial","Easy Almagro","Franco Zampini","Grafica DPI","JORGE HOCHMAN","MARIA FERNANDA RODRIGUEZ","martin zaszczynski","MORATORIA","PSA FINANCE PEUGEOT","Expensas","EDESUR","GABRIEL EKBOIR - CUOTA","INGRESOS BRUTOS","MATIAS TOKAR - PROGRAMADOR","Maria Ge","Maridajes ","Blue menu","Carlos Alberto Juan","Federico Levy","ALEJANDRA ZANGARO COCHERA FRIAS","Regina Failenbogen","Transporte Arlequin","CAJA CHICA","Vicente Alcalde","Digital Impres","AFIP Ganancias","EZEQUIEL NASSIMOFF - ALQUILER OFICINA","Flete Madergold","Expreso Brio SRL","Moto Oeste","Ccm digital","TELECENTRO","Morales Fletes","Paola Nuñez","Remis zona oeste Moron","Printers serigrafia","La crianza de Oxum","Heling","Todomicro","Gustavo Towner","vidrieria Libertad","Imprenta digital","Julio carpintero","Casa Paso ","uces","suss martin zaszczynski","SEKTZER MARCELO","ABL","ISAAC GUINI","nextel","Telecom","La viruta","IVA","Juan Manuel Renzacci","Shemesh Pack","Laura Moizeszowicz","ac-bolsas","Imprenta Mendez","Imprenta Viagraf","carpas y eventos","Maderera La Esperanza","H.KOCH","Romina Paola Minujin","Marcelo Passerini","Pixelgraf","Cartoneria San jose","Sur express SA","RO-El PLAST  SRL","Lamigraf","Estudio Kon y Asociados","Bolsas impresas","Daniele Construcciones","Boker Arbolito","Gravent SA","Alejandro Logiuoco","Ortiz Hernan Federico","IMG envases","Mosh Imagen","Envap","Grafilak","Laminow","Pampa laminados","Leandro Matayoshi","Ingraf S.H","Resmacom","Ser-Car","Maderera Gascon","Fernanda de la Vega","Impresora Serratea","Adler Packaging","APF","Fotopolimeros Pichincha","Sindicato Unico de la Publicidad","Fabian","Herrería Cerrajería","Daniel Seguro Auto","Nahuel","Movistar","Mónica Fatala","Ki interiores","GRADO ALFA SRL","Mensajería Bs As","Ncativiela SRL","Cablefix","TABACALERA SARANDI SA","Siris remiseria","Troquel Ideas","Eduardo s Cazala ","Cecilia Volpe","Doree","Autonomo","Papirus y Compañia","Raal","Lamiart","STENFAR","CLINGSOR","IMP S/CRED EN CTA CTE","IMP S/DEBITOS EN CTA CTE","Sacabocados Arales","AFIP 3379/12","Fibertel","Nicar srl","Juan Pablo Caserta","TOVBEIN","Pol pack srl","Co Print","El Maiten","Todoplastic","Mouron","Montajes Alejandro ","Papá de Fer","Sebastian Pendola","porta banner argentina","todo cuadernos","JB JUSTO SA","Marroquineria Warnes 525","Diverthia","Marroquineria Alberto A","papelera del mar","Operadora de estaciones de servicio sa","Grupo Brabo","Macondo","super servicios","makro","Serflo Srl","HOTEL SKORPIOS","Ale Casas","Shutterstock Inc","Roberto","Manyplast","EG3 SA","Kansas","Visa","PLASTICOS VG SRL","Latin technology srl","Los tepues","Rapiarte","Tahira Ltda","Coto","Carrefour","falabella sa","Factorinet","justo rodero e hijos","Qkie","cooperativa armado","Encuadernacion Atela","Encuadernacion Fer-Lin","Encuadernación Ingraf","Digito A","Debolsas","martín péndola","BRD SAICFI","Santiago Duro","BARACAR SRL","BAEZ 227 SA","Estación del aire SRL","Damian Piliavsky","Armytech technologies sa","Forestcar","Mastercard","Copy Luar SRL","Deheza saicfei","Jumbo Retail Argentina SA","Red de servicios rurales srl","Impto Bienes personales","Trabajos Artes y oficios","Liquidador retenciones","el server","Julio Oscar Vidal","Bayres al Sur"
                    ];
 

	 $("input#proveedor_autocomplete").autocomplete({
	     source: availableTags,
	   //define select handler
			select: function(e, ui) {
				var valor = ui.item.value;
				SetProveedor(valor);
			} 
	 }); 


	$("#SeleccionarProveedor").hide();

    $("#proveedor_autocomplete").blur(function(){
        if( $(this).val() == '' )
            $(this).val( $(this).attr("defaultValue") );
    });

    $("#proveedor_autocomplete").focus(function(){
        if( $(this).val() == $(this).attr("defaultValue"))
            $(this).val('');
    });

    
        
    
});

function SetProveedor(NombreProveedor)
{
	inputText	=	NombreProveedor;
	// setear valor select selected por texto de option / set option selected by text
	//$("#"+dropdown_id+" option:contains(" + inputText + ")").attr('selected', 'selected');
	
	// recorrer dropdown valores
	$("#SeleccionarProveedor option").each(function () {
        if ($(this).html() == inputText) {
            $(this).attr("selected", "selected");
            //return;
        }
	});
	// cargar ordenes de compra pendiente por ajax
		// marcar tipo de gasto del proveedor por defecto
		// mostrar campos tipo de iva del proveedor segun tipo de iva seteado
	GetOrdenesDeCompraPendientes();
	//GetProveedorTipoIva();
}

function SetImporteRestante()
{
	var importeRestante	= parseFloat($('#ImporteTotalInput').val()) - parseFloat($('#ImporteTotalLiquidadoInput').val());	
	
	$('#ImporteRestante').html('<label>$ '+ importeRestante.toFixed(2) + '</label>');
}

function SetImporteTotal()
{
	var importeTotal=0;
	var a,b,c,d,e,f,g,h,i,j,k;
	
	a	= parseFloat($('#ImporteNetoNoGravadoInput').val()); 
	b	=	parseFloat($('#ImporteNetoGravado21Input').val());
	c	=	parseFloat($('#ImporteNetoGravado27Input').val());
	d	=	parseFloat($('#ImporteNetoGravado10_5Input').val());
							e=parseFloat($('#ImporteIva21Input').val());
							f=parseFloat($('#ImporteIva27Input').val());
							g=parseFloat($('#ImporteIva10_5Input').val());
							h=parseFloat($('#ImportePercepcionesIvaInput').val());
							i=parseFloat($('#ImportePercepcionesIngresosBrutosCabaInput').val());
							j=parseFloat($('#ImportePercepcionesIngresosBrutosBsAsInput').val());
							k=parseFloat($('#ImporteCreditoACuentaInput').val());
	if(a)
		importeTotal += a;

	if(b)
		importeTotal += b;

	if(c)
		importeTotal += c;

	if(d)
		importeTotal += d;

	if(e)
		importeTotal += e;

	if(f)
		importeTotal += f;

	if(g)
		importeTotal += g;

	if(h)
		importeTotal += h;

	if(i)
		importeTotal += i;

	if(j)
		importeTotal += j;

	if(k)
		importeTotal += k;
	
	$('#_totalImp').html('<label>$ '+ importeTotal.toFixed(2) + '</label>');
	$('#ImporteTotalInput').val(importeTotal.toFixed(2));
	SetImporteRestante();
}

function GetOrdenesDeCompraPendientes()
{
	// dropdown
	var $selected 	=	$("#SeleccionarProveedor").find('option:selected');
	var $proveedorid	=	$selected.val();
	// control
	if( $proveedorid < 0 )
	{
		alert('El proveedor seleccionado no es correcto');
	}
	
	// cargar OC pensientes por ajax
	$.ajax({
		type: "POST",
		url: '/FacturaCompra/GetOrdenesDeCompraPendientes',
		dataType: "text/html",
		data: {
			'ProveedorId': $proveedorid
		},
		success: function(html){
			$("#OrdenesDeCompraPendientes").html(html);
			$("#ImporteTotalLiquidado").html('<label>$ 0.0</label>');
		}

	});
}

function GetProveedorTipoIva()
{
	// dropdown
	var $selected 	=	$("#SeleccionarProveedor").find('option:selected');
	var $proveedorid	=	$selected.val();
	// control
	if( $proveedorid < 0 )
	{
		alert('El proveedor seleccionado no es correcto');
	}

	// cargar OC pensientes por ajax
	$.ajax({
		type: "POST",
		url: '/Proveedor/GetTipoIva',
		dataType: "text/html",
		data: {
			'ProveedorId': $proveedorid
		},
		success: function(html){
			$('#ProveedorTipoIva').val(html);
			//SetTipoIva();
		}

	});
}

function SetTipoIva()
{
	var tipodIvaId = $('#ProveedorTipoIva').val();
}

function abrirPopUp(pagina, opciones)
{
	window.open(pagina,"",opciones);
}

</script>


<!-- dialog confirm -->
		<div id="dialog-confirm" title="Quiere crear una factura" style="display:none">
			<p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 40px 40px 0;"></span>
				La factura no tiene ordenes de compra asociadas. Desea crear la factura?
			</p>
		</div>

<h1>Factura de compra</h1>
        
<form id="FrmEdit" enctype="multipart/form-data" action="" method="post">
    <input type="hidden" name="data[ConfirmacionMostrada]" value="" id="ConfirmacionMostrada"/>
    <input type="hidden" name="" value="12" id="ProveedorTipoIva"/>  
        
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

		

        <div id="mensajes">
                    <p class="success" style="width:61%;">Factura #34234234234 creada correctamente. <img src="/images/icons/tick.png" /></p>
                </div>
        
        <div class="contentEditor"> <!-- formulario de edicion de contenido -->
        
            <div class="productsEditorContent">
            
            <div class="filtersBox filtersInfoBox">
            	
                <ul>
                    <li>
						
	                    <label class="blue"><img src="/images/icons/status_online.png" title=""/> Proveedor</label>   
                	    <input id="proveedor_autocomplete" class="required" name="data[ProveedorNombre]" value="Fernanda de la Vega" readonly="readonly" disabled/>       
	                    <select name="data[ProveedorId]" class="required CambiarProveedor" id="SeleccionarProveedor">
	                        <option value="">Seleccionar</option>
	                        	                        <option value="1" >Grafica</option>
	                        	                        <option value="2" >Grafica Warnes/zocan grafica</option>
	                        	                        <option value="3" >Ernesto Costaldo</option>
	                        	                        <option value="4" >Calcos Closas</option>
	                        	                        <option value="5" >Marplex</option>
	                        	                        <option value="6" >Helioday</option>
	                        	                        <option value="7" >Silvio Morales</option>
	                        	                        <option value="8" >Explotter</option>
	                        	                        <option value="9" >Ochaxa</option>
	                        	                        <option value="10" >Garber Cintas</option>
	                        	                        <option value="11" >Fleet</option>
	                        	                        <option value="12" >Madergold</option>
	                        	                        <option value="13" >CMYB</option>
	                        	                        <option value="14" >Acrilicos Pulbilet</option>
	                        	                        <option value="15" >Celulosa Campana</option>
	                        	                        <option value="16" >Laura montajes</option>
	                        	                        <option value="17" >FULL HANGER</option>
	                        	                        <option value="18" >ARTECOLOR</option>
	                        	                        <option value="19" >BALBER PUBLICIDAD</option>
	                        	                        <option value="20" >ACRILICOS PUBLILET</option>
	                        	                        <option value="21" >El fenix</option>
	                        	                        <option value="22" >Atech J y G</option>
	                        	                        <option value="23" >Alabi Chiche</option>
	                        	                        <option value="24" >Pontus</option>
	                        	                        <option value="25" >Leandro</option>
	                        	                        <option value="26" >CUATRO REINAS</option>
	                        	                        <option value="27" >kol or</option>
	                        	                        <option value="28" >GARBER</option>
	                        	                        <option value="29" >SIVISA FLET</option>
	                        	                        <option value="30" >Victoria soncini</option>
	                        	                        <option value="31" >Dcl group</option>
	                        	                        <option value="32" >Maytok</option>
	                        	                        <option value="33" >Cativiela Hnos</option>
	                        	                        <option value="34" >Doldan</option>
	                        	                        <option value="35" >Impro</option>
	                        	                        <option value="36" >Tango Publicidad</option>
	                        	                        <option value="37" >Platt Grupo impresor</option>
	                        	                        <option value="38" >correo argentino</option>
	                        	                        <option value="39" >Grafica Calgaro</option>
	                        	                        <option value="40" >Jaime Zamler</option>
	                        	                        <option value="41" >eduardo cazala</option>
	                        	                        <option value="42" >Plasticos Lavalleja</option>
	                        	                        <option value="43" >Casa Cesto</option>
	                        	                        <option value="44" >NORBERTO SNAIDERMAN</option>
	                        	                        <option value="45" >PINTURERIA MARCOS SA</option>
	                        	                        <option value="46" >COOP CARDONES</option>
	                        	                        <option value="47" >EL MUNDO DE LA BOLSA</option>
	                        	                        <option value="48" >BAITOR SA</option>
	                        	                        <option value="49" >SACABOCADOS DOLDAN</option>
	                        	                        <option value="50" >Bordados sin nomre</option>
	                        	                        <option value="51" >macona sa</option>
	                        	                        <option value="52" >distribuidora maio</option>
	                        	                        <option value="53" >MARCELO RIVEROL</option>
	                        	                        <option value="54" >CATIVIELA HNOS SA</option>
	                        	                        <option value="55" >UNIVERSO GOB</option>
	                        	                        <option value="56" >CASEROS INOXIDABLE SA</option>
	                        	                        <option value="57" >PINTURERIA DEL CENTRO</option>
	                        	                        <option value="58" >PLATT GRUPO IMPRESOR_repetido</option>
	                        	                        <option value="59" >COPIFIL</option>
	                        	                        <option value="60" >LIBRERIA IUVIDAN</option>
	                        	                        <option value="61" >SISTECO</option>
	                        	                        <option value="62" >RUPERTO ANTON</option>
	                        	                        <option value="63" >Jorge Cartelero</option>
	                        	                        <option value="64" >Ideas Argentinas</option>
	                        	                        <option value="65" >ALLEKOTE ROBERTO</option>
	                        	                        <option value="66" >Alpha</option>
	                        	                        <option value="67" >El rey del bordado</option>
	                        	                        <option value="68" >jv articulos promocionales</option>
	                        	                        <option value="69" >zecat</option>
	                        	                        <option value="70" >bazar chef</option>
	                        	                        <option value="71" >Compre licores</option>
	                        	                        <option value="72" >G y A</option>
	                        	                        <option value="73" >L.M.R Deportes</option>
	                        	                        <option value="74" >Algodonera paso viejo</option>
	                        	                        <option value="75" >Digistamp</option>
	                        	                        <option value="76" >Viniltodo</option>
	                        	                        <option value="77" >Routec</option>
	                        	                        <option value="78" >Ferreteria scopazo</option>
	                        	                        <option value="79" >publios</option>
	                        	                        <option value="80" >Acrylux</option>
	                        	                        <option value="81" >Vidrieria x</option>
	                        	                        <option value="82" >Rms gigantografias</option>
	                        	                        <option value="83" >Viste Design</option>
	                        	                        <option value="84" >Multiopticas</option>
	                        	                        <option value="85" >serigrafia san martin</option>
	                        	                        <option value="86" >Bulonera vietri</option>
	                        	                        <option value="87" >Hierros rati</option>
	                        	                        <option value="88" >Imprenta Packman</option>
	                        	                        <option value="89" >Centro Box</option>
	                        	                        <option value="90" >Andres Oliveto</option>
	                        	                        <option value="91" >Abasto shoping</option>
	                        	                        <option value="92" >Taxi</option>
	                        	                        <option value="93" >Jeremias Slacius</option>
	                        	                        <option value="94" >Luis Ducant</option>
	                        	                        <option value="95" >la casa de los 1000 envases</option>
	                        	                        <option value="96" >Mercado Libre</option>
	                        	                        <option value="97" >Jose Gargaglione</option>
	                        	                        <option value="98" >DecorLine</option>
	                        	                        <option value="99" >Gabriel Ekbor</option>
	                        	                        <option value="106" >Matias Fudim</option>
	                        	                        <option value="107" >Dixtron</option>
	                        	                        <option value="108" >n y n</option>
	                        	                        <option value="109" >Diamonds</option>
	                        	                        <option value="110" >Mac Pad - Grupo Impresor S.A </option>
	                        	                        <option value="111" >PCTronix</option>
	                        	                        <option value="112" >Vidrios srl</option>
	                        	                        <option value="113" >Vidrieria Sarandi</option>
	                        	                        <option value="114" >Sofia Mac Mullen</option>
	                        	                        <option value="115" >Pim Pam</option>
	                        	                        <option value="116" >Hijos de Garber S.R.L</option>
	                        	                        <option value="117" >Warnes Trailer</option>
	                        	                        <option value="118" >Osvaldo Leiva</option>
	                        	                        <option value="119" >Furia</option>
	                        	                        <option value="120" >Emprego Arg.</option>
	                        	                        <option value="121" >Ferreteria Industrial</option>
	                        	                        <option value="122" >Easy Almagro</option>
	                        	                        <option value="123" >Franco Zampini</option>
	                        	                        <option value="124" >Grafica DPI</option>
	                        	                        <option value="125" >JORGE HOCHMAN</option>
	                        	                        <option value="126" >MARIA FERNANDA RODRIGUEZ</option>
	                        	                        <option value="129" >martin zaszczynski</option>
	                        	                        <option value="130" >MORATORIA</option>
	                        	                        <option value="131" >PSA FINANCE PEUGEOT</option>
	                        	                        <option value="132" >Expensas</option>
	                        	                        <option value="133" >EDESUR</option>
	                        	                        <option value="134" >GABRIEL EKBOIR - CUOTA</option>
	                        	                        <option value="135" >INGRESOS BRUTOS</option>
	                        	                        <option value="136" >MATIAS TOKAR - PROGRAMADOR</option>
	                        	                        <option value="137" >Maria Ge</option>
	                        	                        <option value="138" >Maridajes </option>
	                        	                        <option value="139" >Blue menu</option>
	                        	                        <option value="140" >Carlos Alberto Juan</option>
	                        	                        <option value="141" >Federico Levy</option>
	                        	                        <option value="142" >ALEJANDRA ZANGARO COCHERA FRIAS</option>
	                        	                        <option value="143" >Regina Failenbogen</option>
	                        	                        <option value="144" >Transporte Arlequin</option>
	                        	                        <option value="145" >CAJA CHICA</option>
	                        	                        <option value="146" >Vicente Alcalde</option>
	                        	                        <option value="147" >Digital Impres</option>
	                        	                        <option value="148" >AFIP Ganancias</option>
	                        	                        <option value="149" >EZEQUIEL NASSIMOFF - ALQUILER OFICINA</option>
	                        	                        <option value="150" >Flete Madergold</option>
	                        	                        <option value="151" >Expreso Brio SRL</option>
	                        	                        <option value="152" >Moto Oeste</option>
	                        	                        <option value="153" >Ccm digital</option>
	                        	                        <option value="154" >TELECENTRO</option>
	                        	                        <option value="155" >Morales Fletes</option>
	                        	                        <option value="156" >Paola Nuñez</option>
	                        	                        <option value="157" >Remis zona oeste Moron</option>
	                        	                        <option value="158" >Printers serigrafia</option>
	                        	                        <option value="159" >La crianza de Oxum</option>
	                        	                        <option value="160" >Heling</option>
	                        	                        <option value="161" >Todomicro</option>
	                        	                        <option value="162" >Gustavo Towner</option>
	                        	                        <option value="163" >vidrieria Libertad</option>
	                        	                        <option value="164" >Imprenta digital</option>
	                        	                        <option value="165" >Julio carpintero</option>
	                        	                        <option value="166" >Casa Paso </option>
	                        	                        <option value="167" >uces</option>
	                        	                        <option value="168" >suss martin zaszczynski</option>
	                        	                        <option value="169" >SEKTZER MARCELO</option>
	                        	                        <option value="170" >ABL</option>
	                        	                        <option value="171" >ISAAC GUINI</option>
	                        	                        <option value="172" >nextel</option>
	                        	                        <option value="173" >Telecom</option>
	                        	                        <option value="174" >La viruta</option>
	                        	                        <option value="175" >IVA</option>
	                        	                        <option value="176" >Juan Manuel Renzacci</option>
	                        	                        <option value="177" >Shemesh Pack</option>
	                        	                        <option value="178" >Laura Moizeszowicz</option>
	                        	                        <option value="179" >ac-bolsas</option>
	                        	                        <option value="180" >Imprenta Mendez</option>
	                        	                        <option value="181" >Imprenta Viagraf</option>
	                        	                        <option value="182" >carpas y eventos</option>
	                        	                        <option value="183" >Maderera La Esperanza</option>
	                        	                        <option value="184" >H.KOCH</option>
	                        	                        <option value="185" >Romina Paola Minujin</option>
	                        	                        <option value="186" >Marcelo Passerini</option>
	                        	                        <option value="187" >Pixelgraf</option>
	                        	                        <option value="188" >Cartoneria San jose</option>
	                        	                        <option value="189" >Sur express SA</option>
	                        	                        <option value="190" >RO-El PLAST  SRL</option>
	                        	                        <option value="191" >Lamigraf</option>
	                        	                        <option value="192" >Estudio Kon y Asociados</option>
	                        	                        <option value="193" >Bolsas impresas</option>
	                        	                        <option value="194" >Daniele Construcciones</option>
	                        	                        <option value="195" >Boker Arbolito</option>
	                        	                        <option value="196" >Gravent SA</option>
	                        	                        <option value="197" >Alejandro Logiuoco</option>
	                        	                        <option value="198" >Ortiz Hernan Federico</option>
	                        	                        <option value="200" >IMG envases</option>
	                        	                        <option value="201" >Mosh Imagen</option>
	                        	                        <option value="202" >Envap</option>
	                        	                        <option value="203" >Grafilak</option>
	                        	                        <option value="204" >Laminow</option>
	                        	                        <option value="205" >Pampa laminados</option>
	                        	                        <option value="206" >Leandro Matayoshi</option>
	                        	                        <option value="207" >Ingraf S.H</option>
	                        	                        <option value="208" >Resmacom</option>
	                        	                        <option value="209" >Ser-Car</option>
	                        	                        <option value="210" >Maderera Gascon</option>
	                        	                        <option value="211" selected="selected">Fernanda de la Vega</option>
	                        	                        <option value="212" >Impresora Serratea</option>
	                        	                        <option value="213" >Adler Packaging</option>
	                        	                        <option value="214" >APF</option>
	                        	                        <option value="215" >Fotopolimeros Pichincha</option>
	                        	                        <option value="216" >Sindicato Unico de la Publicidad</option>
	                        	                        <option value="217" >Fabian</option>
	                        	                        <option value="218" >Herrería Cerrajería</option>
	                        	                        <option value="219" >Daniel Seguro Auto</option>
	                        	                        <option value="220" >Nahuel</option>
	                        	                        <option value="221" >Movistar</option>
	                        	                        <option value="222" >Mónica Fatala</option>
	                        	                        <option value="223" >Ki interiores</option>
	                        	                        <option value="224" >GRADO ALFA SRL</option>
	                        	                        <option value="226" >Mensajería Bs As</option>
	                        	                        <option value="227" >Ncativiela SRL</option>
	                        	                        <option value="228" >Cablefix</option>
	                        	                        <option value="229" >TABACALERA SARANDI SA</option>
	                        	                        <option value="230" >Siris remiseria</option>
	                        	                        <option value="231" >Troquel Ideas</option>
	                        	                        <option value="235" >Eduardo s Cazala </option>
	                        	                        <option value="236" >Cecilia Volpe</option>
	                        	                        <option value="237" >Doree</option>
	                        	                        <option value="238" >Autonomo</option>
	                        	                        <option value="239" >Papirus y Compañia</option>
	                        	                        <option value="240" >Raal</option>
	                        	                        <option value="241" >Lamiart</option>
	                        	                        <option value="242" >STENFAR</option>
	                        	                        <option value="243" >CLINGSOR</option>
	                        	                        <option value="244" >IMP S/CRED EN CTA CTE</option>
	                        	                        <option value="245" >IMP S/DEBITOS EN CTA CTE</option>
	                        	                        <option value="246" >Sacabocados Arales</option>
	                        	                        <option value="247" >AFIP 3379/12</option>
	                        	                        <option value="248" >Fibertel</option>
	                        	                        <option value="249" >Nicar srl</option>
	                        	                        <option value="250" >Juan Pablo Caserta</option>
	                        	                        <option value="251" >TOVBEIN</option>
	                        	                        <option value="252" >Pol pack srl</option>
	                        	                        <option value="253" >Co Print</option>
	                        	                        <option value="254" >El Maiten</option>
	                        	                        <option value="258" >Todoplastic</option>
	                        	                        <option value="259" >Mouron</option>
	                        	                        <option value="260" >Montajes Alejandro </option>
	                        	                        <option value="261" >Papá de Fer</option>
	                        	                        <option value="262" >Sebastian Pendola</option>
	                        	                        <option value="263" >porta banner argentina</option>
	                        	                        <option value="264" >todo cuadernos</option>
	                        	                        <option value="265" >JB JUSTO SA</option>
	                        	                        <option value="266" >Marroquineria Warnes 525</option>
	                        	                        <option value="267" >Diverthia</option>
	                        	                        <option value="268" >Marroquineria Alberto A</option>
	                        	                        <option value="269" >papelera del mar</option>
	                        	                        <option value="270" >Operadora de estaciones de servicio sa</option>
	                        	                        <option value="271" >Grupo Brabo</option>
	                        	                        <option value="272" >Macondo</option>
	                        	                        <option value="273" >super servicios</option>
	                        	                        <option value="274" >makro</option>
	                        	                        <option value="275" >Serflo Srl</option>
	                        	                        <option value="276" >HOTEL SKORPIOS</option>
	                        	                        <option value="277" >Ale Casas</option>
	                        	                        <option value="278" >Shutterstock Inc</option>
	                        	                        <option value="279" >Roberto</option>
	                        	                        <option value="280" >Manyplast</option>
	                        	                        <option value="281" >EG3 SA</option>
	                        	                        <option value="282" >Kansas</option>
	                        	                        <option value="283" >Visa</option>
	                        	                        <option value="284" >PLASTICOS VG SRL</option>
	                        	                        <option value="285" >Latin technology srl</option>
	                        	                        <option value="286" >Los tepues</option>
	                        	                        <option value="287" >Rapiarte</option>
	                        	                        <option value="288" >Tahira Ltda</option>
	                        	                        <option value="289" >Coto</option>
	                        	                        <option value="290" >Carrefour</option>
	                        	                        <option value="291" >falabella sa</option>
	                        	                        <option value="292" >Factorinet</option>
	                        	                        <option value="293" >justo rodero e hijos</option>
	                        	                        <option value="294" >Qkie</option>
	                        	                        <option value="295" >cooperativa armado</option>
	                        	                        <option value="296" >Encuadernacion Atela</option>
	                        	                        <option value="297" >Encuadernacion Fer-Lin</option>
	                        	                        <option value="298" >Encuadernación Ingraf</option>
	                        	                        <option value="299" >Digito A</option>
	                        	                        <option value="300" >Debolsas</option>
	                        	                        <option value="301" >martín péndola</option>
	                        	                        <option value="302" >BRD SAICFI</option>
	                        	                        <option value="303" >Santiago Duro</option>
	                        	                        <option value="304" >BARACAR SRL</option>
	                        	                        <option value="305" >BAEZ 227 SA</option>
	                        	                        <option value="306" >Estación del aire SRL</option>
	                        	                        <option value="307" >Damian Piliavsky</option>
	                        	                        <option value="308" >Armytech technologies sa</option>
	                        	                        <option value="309" >Forestcar</option>
	                        	                        <option value="310" >Mastercard</option>
	                        	                        <option value="311" >Copy Luar SRL</option>
	                        	                        <option value="312" >Deheza saicfei</option>
	                        	                        <option value="313" >Jumbo Retail Argentina SA</option>
	                        	                        <option value="314" >Red de servicios rurales srl</option>
	                        	                        <option value="315" >Impto Bienes personales</option>
	                        	                        <option value="316" >Trabajos Artes y oficios</option>
	                        	                        <option value="318" >Liquidador retenciones</option>
	                        	                        <option value="319" >el server</option>
	                        	                        <option value="320" >Julio Oscar Vidal</option>
	                        	                        <option value="321" >Bayres al Sur</option>
	                        	                    </select>
						 
                    </li>
                    <!-- 
                    <li>
                    	<label class="blue"> Tipo de IVA</label>
                    	<select name="data[TipoIvaId]" class="required" readonly="readonly">
                        <option value="">Seleccionar</option>
                                                <option value="1" >Responsable inscripto - 21.00-- - (Tipo factura: A)</option>
                                                <option value="3" >Consumidor final - --21.00 - (Tipo factura: B)</option>
                                                <option value="4" >Exento - --21.00 - (Tipo factura: B)</option>
                                                <option value="5" >Responsable inscripto - -10.50- - (Tipo factura: A)</option>
                                                <option value="6" >Exento a - -- - (Tipo factura: A)</option>
                                                <option value="7" >Gravados 9.50 - 10.50-- - (Tipo factura: A)</option>
                                                <option value="8" >Rni proveedores - 21.00-10.50- - (Tipo factura: C)</option>
                                                <option value="9" >Monotributo - -- - (Tipo factura: B)</option>
                                                <option value="10" >Exento b - -- - (Tipo factura: B)</option>
                                                <option value="11" >Resp. insc exento - -- - (Tipo factura: A)</option>
                                                <option value="12" selected="selected">Sin impuestos - -- - (Tipo factura: N)</option>
                                                <option value="13" >Servicios - 27.00-- - (Tipo factura: A)</option>
                                                <option value="14" >Monotributo - -- - (Tipo factura: C)</option>
                                            </select>
                    </li>
                     -->
                    <li>
                    	
                	    <label class="blue"><img src="/images/icons/layout_edit.png" title=""/> Nro. factura</label>       
						
						<input class="required number" type="text" name="data[Numero]" id="" value="34234234234" readonly="readonly"/>
						
                    </li>
                    <li>
                    	
                	    <label class="blue"><img src="/images/icons/date.png" title="Importe factura"/> Fecha de factura</label>       
						
						<input class="required date" type="text" name="data[Fecha]" id="FechaFactura" value="" readonly="readonly" disabled/>
						
						
                    </li>
                    <li>
                    	
                	    <label class="blue"><img src="/images/icons/date.png" title=""/> Fecha vencimiento</label>       
						
						<input class="required date" type="text" name="data[FechaVencimiento]" id="FechaFacturaVencimiento" value="" readonly="readonly" disabled/>
						
						
                    </li>
                    
                    <li>
                	    <label class="blue"><img src="/images/icons/money.png" title="Importe"/> Neto No Gravado</label>       
						
						<input type="text" class="number total" id="ImporteNetoNoGravadoInput" name="data[ImporteNetoNoGravado]" value="" readonly="readonly">
						
                    </li>
                    <div id="gravado21">
                    <li>
                    	
                	    <label class="blue"><img src="/images/icons/money.png" title="Importe"/> Neto Gravado 21%</label>       
						
						<input type="text" class="number total" id="ImporteNetoGravado21Input" name="data[ImporteNetoGravado21]" value="" readonly="readonly">
						
						
                    </li>
                    <li>
                    	
                	    <label class="blue"><img src="/images/icons/money.png" title="Importe"/> Iva 21%</label>       
						
						<input type="text" class="number total" id="ImporteIva21Input" name="data[ImporteIva21]" value="" readonly="readonly">
						
						
                    </li>
                    </div>
                    <div id="gravado27">
                    <li>
                    	
                	    <label class="blue"><img src="/images/icons/money.png" title="Importe"/> Neto Gravado 27%</label>       
						
						<input type="text" class="number total" id="ImporteNetoGravado27Input" name="data[ImporteNetoGravado27]" value="" readonly="readonly">
						
						
                    </li>
                    <li>
                    	
                	    <label class="blue"><img src="/images/icons/money.png" title="Importe"/> Iva 27%</label>       
						
						<input type="text" class="number total" id="ImporteIva27Input" name="data[ImporteIva27]" value="" readonly="readonly">
						
						
                    </li>
                    </div>
                    <div id="gravado10_5">
                    <li>
                    	
                	    <label class="blue"><img src="/images/icons/money.png" title="Importe"/> Neto Gravado 10.5%</label>       
						
						<input type="text" class="number total" id="ImporteNetoGravado10_5Input" name="data[ImporteNetoGravado10_5]" value="" readonly="readonly">
						
						
                    </li>
                    <li>
                    	
                	    <label class="blue"><img src="/images/icons/money.png" title="Importe"/> Iva 10.5%</label>       
						
						<input type="text" class="number total" id="ImporteIva10_5Input" name="data[ImporteIva10_5]" value="" readonly="readonly">
						
                    </li>
                    </div>
                    <div id="percepciones">
                    <li>
                    	
                	    <label class="blue"><img src="/images/icons/money.png" title="Importe"/> Percepciones Iva</label>       
						
						<input type="text" class="number total" id="ImportePercepcionesIvaInput" name="data[ImportePercepcionesIva]" value="" readonly="readonly">
						
						
                    </li>
                    <li>
                    	
                	    <label class="blue"><img src="/images/icons/money.png" title="Importe"/> Perc. IIBB Caba</label>       
						
						<input type="text" class=" number total" id="ImportePercepcionesIngresosBrutosCabaInput" name="data[ImportePercepcionesIngresosBrutosCaba]" value="" readonly="readonly">
						
						
                    </li>
                    <li>
                    	
                	    <label class="blue"><img src="/images/icons/money.png" title="Importe"/> Perc. IIBB BsAs</label>       
						
						<input type="text" class=" number total" id="ImportePercepcionesIngresosBrutosBsAsInput" name="data[ImportePercepcionesIngresosBrutosBsAs]" value="" readonly="readonly">
						
						
                    </li>
                    <li>
                    	
                	    <label class="blue"><img src="/images/icons/money.png" title="Importe"/> Credito a cuenta</label>       
						
						<input type="text" class=" number total" id="ImporteCreditoACuentaInput" name="data[ImporteCreditoACuenta]" value="" readonly="readonly">
						
                    </li>
                    </div>
                    <li>
                    	<label class="blue"> Tipo de gasto</label>
                    	<select id="SeleccionarTipoGasto" name="data[TipoGastoId]" class="required" readonly="readonly" DISABLED>
                        <option value="">Seleccionar</option>
                                                <option value="1" >Servicios</option>
                                                <option value="2" >Produccion</option>
                                                <option value="3" >Insumos</option>
                                                <option value="4" >Transporte</option>
                                                <option value="5" >Insumos a contabilizar</option>
                                                <option value="6" >Honorarios</option>
                                                <option value="7" >Alquileres</option>
                                                <option value="8" selected="selected">Sueldos</option>
                                            	</select>
                    </li>
                    <li>
	                    	
	                    	<label class="blue"><img src="/images/icons/exclamation.png" title=""/> Mostrar todo</label>
	                    	<input type="checkbox" name="" value="NO" class="MostrarTodo" id="MostrarTodo" readonly="readonly" DISABLED>
	                    	
	                </li>
	                
	                <li>
                    	<label class="blue">Nota credito o debito</label>
                    	<select id="SeleccionarNotaCreditoDebito" name="data[TipoNota]" class="" readonly="readonly" DISABLED>
                        <option value="">Seleccionar</option>
                        <option value="NC" >Nota de credito</option>
                        <option value="ND" >Nota de debito</option>
                    	</select>
                    </li>
                    
                    <li>
                	    <label class="blue"><img src="/images/icons/error.png" title="Importe "/> Importe liquidado</label>       
						 
						<input type="hidden" class="required number" readonly="readonly" disabled id="ImporteTotalLiquidadoInput" name="data[ImporteLiquidado]" value="0">
						
						<div id="ImporteTotalLiquidado"><label>$ 0.0</label></div>
                    </li>
                    <li>
                	    <label class="blue"><img src="/images/icons/exclamation.png" title="Importe "/> Importe total: </label>
                	    
                	    <input type="hidden" class="required number" readonly="readonly" disabled id="ImporteTotalInput" name="data[ImporteTotal]" value="0">
                	    
                	    <div id="_totalImp"><label>$ 0.0</label></div>       
						
                    </li>
                    <li>
                	    <label class="blue"><img src="/images/icons/exclamation.png" title="Importe "/> Importe restante</label>       
						 
						<div id="ImporteRestante"><label>$ 0.0</label></div>
                    </li>
                    
                </ul>
            </div> <!-- /filtersBox-->
            
                     	                
         		<div class="contentTitles">
                    <label class="blue">Comentario (opcional)</label>
                    <textarea name="data[Comentario]" cols="45" rows="5" class="" readonly="readonly"></textarea>
                </div> <!-- /contentTitles -->
                 
                
                
            </div> <!-- /productsEditorContent -->
        </div>  <!-- /contentEditor -->
    </div> <!-- /form -->
</form>