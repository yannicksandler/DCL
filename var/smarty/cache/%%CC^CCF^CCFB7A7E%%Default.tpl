382
a:4:{s:8:"template";a:6:{s:27:"Backend/Layouts/Default.tpl";b:1;s:34:"Backend/Layouts/Include/Header.tpl";b:1;s:35:"Backend/Layouts/Include/SubMenu.tpl";b:1;s:32:"Backend/Layouts/Include/Menu.tpl";b:1;s:38:"Backend/Layouts/Include/SiteHeader.tpl";b:1;s:34:"Backend/Layouts/Include/Footer.tpl";b:1;}s:9:"timestamp";i:1462465154;s:7:"expires";i:1462465154;s:13:"cache_serials";a:0:{}}<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>	
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
	<title>DCL Group | Administrador de contenidos</title>

	<link rel="shortcut icon" href="/images/favicon.ico"/>
	
	<!-- master page and structure styles -->
    <link href="/styles/structure.css" rel="stylesheet" type="text/css" />
    <link href="/styles/styles.css" rel="stylesheet" type="text/css" />

    <!-- jQuery 1.4 -->
	<script type="text/javascript" src="/scripts/jquery/jquery-1.4.2.js"></script>
	<script type="text/javascript" src="/scripts/jquery/jquery.validate.js"></script>
	<script type="text/javascript" src="/scripts/jquery/messages_es.js"></script>
	<script type="text/javascript" src="/scripts/lightbox.js"></script>
	<!-- div que flota @see Edit view botonera -->
	<script type="text/javascript" src="/scripts/jquery/jquery.floatobject-1.4.js"></script>

	<!-- jQuery UI 1.8 -->
	<!-- autocomplete -->
	<script type="text/javascript" src="/scripts/jquery/jquery-ui-1_8_4_custom_min.js"></script>
	<link type="text/css" href="/styles/jquery-ui-1.8.2.custom.css" rel="Stylesheet" />
	
	<!-- funciones javascript -->
	<script type="text/javascript" src="/scripts/setParentValue.js"></script> <!-- se usa en los seleccionar -->   
	
</head><body>
    <div id="Container">
        

<script>

$(document).ready(function(){

	makeEditMenuFloat();

});

function makeEditMenuFloat()
{
	var pathname = window.location.pathname;

	var hash = pathname.split('/');
	// accion
	var Accion	=	hash[2];
	// controlador
	var ControllerName	=	hash[1];

	if((Accion	==	'Edit') || (Accion == 'ClasificarAtencionMedica')|| (Accion == 'Atender'))
	{
		// hacer que el menu sea flotante en todas las 
		// ediciones menos en diagnostico
		if(ControllerName != 'PrestacionDiagnostico')
		$(".formButtons").makeFloat();
	}
}

</script>


    <div id="Header" class="">
    
        <div class="headerOptions">
            <ul>
            	<li>
                	<input type="button" title="Cerrar sesi&oacute;n" class="btLogout" value="Cerrar sesi&oacute;n" onclick="window.location='/Default/Salir'" />
                </li>
                <li>
                    <a href="/Default/Start" title="Usuario registrado">fer</a>
                </li>
            </ul>
        </div><!-- /headerOptions -->
        
        <div class="headerLogo">
        
            <p href="#" title="Logo"><img src="/images/logo.png" alt="Logo" /></p>
            <h1>DCL Group</h1>
            
            <!-- <a href="#"><img src="/images/icons/bookmark.gif" alt="Agregar a favoritos" title="Agregar a favoritos"/></a> -->
                
        
        </div> <!-- /headerLogo -->
        
        <div id="Menu">
    <ul>
                <li>
            <a  href="/Orden/List/order/Id_DESC" title="Ordenes">Ordenes</a>
        </li>
                <li>
            <a  href="/Proveedor/List" title="Proveedores">Proveedores</a>
        </li>
                <li>
            <a  href="/Cliente/List" title="Clientes">Clientes</a>
        </li>
                <li>
            <a  href="/Orden/ListCotizaciones" title="Cotizaciones">Cotizaciones</a>
        </li>
                <li>
            <a  href="/Orden/ListPreproduccion" title="Preproduccion">Preproduccion</a>
        </li>
                <li>
            <a  href="/Orden/ListProduccion" title="Produccion">Produccion</a>
        </li>
                <li>
            <a  href="/Insumo/ListEntregasProduccion" title="Entregas">Entregas</a>
        </li>
            </ul>
</div> <!-- /Menu -->

    </div> <!-- /Header -->        
        <div id="Content">
            <div class="listado">    
                
<!-- date picker --> 
<link type="text/css" href="/styles/ui-lightness/jquery-ui-1.8.2.custom.css" rel="stylesheet" />
<script type="text/javascript" src="/scripts/jquery/jquery.ui.datepicker.js"></script>
<script type="text/javascript" src="/scripts/jquery/jquery.ui.core.js"></script>
<script type="text/javascript" src="/scripts/jquery/jquery.ui.widget.js"></script>

<script type="text/javascript" src="/scripts/Edit.js"></script>



<script type="text/javascript">
$(document).ready(function(){
    $("#FrmEdit").validate();

    //$('#producto').css('textTransform', 'capitalize');
    
    $('#producto').keypress(function () {
    	var $this = $(this);
        val = $this.val();
    	val = val.substr(0, 1).toUpperCase() + val.substr(1);

    	$(this).val(val);
   	});

    $("#detalle").button({
        icons: {
            primary: "ui-icon-zoomin"
        }
    }).click(function () {
        // hover in
        $(".ui-button-icon-primary", this)
          .toggleClass("ui-icon-zoomin ui-icon-zoomout");
    }, function () {
        // hover out
        $(".ui-button-icon-primary", this)
          .toggleClass("ui-icon-zoomout ui-icon-zoomin");
    });
    
    $("#detalle").click(function () {
    	$(".general").toggle("slow");
   	});

    $("#mostrarinsumos").button({
        icons: {
            primary: "ui-icon-zoomin"
        }
    }).click(function () {
        // hover in
        $(".ui-button-icon-primary", this)
          .toggleClass("ui-icon-zoomin ui-icon-zoomout");
    }, function () {
        // hover out
        $(".ui-button-icon-primary", this)
          .toggleClass("ui-icon-zoomout ui-icon-zoomin");
    });

    $("#mostrarinsumos").click(function () {
    	$("#insumos").toggle("slow");

   	});

    $("#mostrarventas").button({
        icons: {
            primary: "ui-icon-zoomin"
        }
    }).click(function () {
        // hover in
        $(".ui-button-icon-primary", this)
          .toggleClass("ui-icon-zoomin ui-icon-zoomout");
    }, function () {
        // hover out
        $(".ui-button-icon-primary", this)
          .toggleClass("ui-icon-zoomout ui-icon-zoomin");
    });

    $("#mostrarventas").click(function () {
    	//$("#insumos").show();
    	//$("#insumosCargados").hide();
    	//$("#CostosInsumos").toogle();
    	
    	$(".ventas").toggle("slow");
   	});


    //$("#descripciondetrabajo").attr('value', $("#descripciondetrabajo").text().replace("\<br /\>", "").replace("\<br /\>", "").replace("\<br /\>", "").replace("\<br /\>", "").replace("\<br /\>", ""));
    $("#ComentarioFactura").attr('value', $("#ComentarioFactura").text().replace("\<br /\>", "").replace("\<br /\>", "").replace("\<br /\>", "").replace("\<br /\>", "").replace("\<br /\>", ""));
    
    $('#fechaInicio').datepicker({
		changeMonth: true,
		changeYear: true,
        dateFormat: 'dd/mm/yy'
	});
    
    $('#fechaFin').datepicker({
		changeMonth: true,
		changeYear: true,
        dateFormat: 'dd/mm/yy'
	});
    
    $('#fechaEntrega').datepicker({
		changeMonth: true,
		changeYear: true,
        dateFormat: 'dd/mm/yy'
	});

    $('#fechaFactura').datepicker({
		changeMonth: true,
		changeYear: true,
        dateFormat: 'dd/mm/yy'
	});
    

    $('#totalSinIva').change(function(){
        var total=   $("#totalSinIva").attr("value");
    
        $("#totalConIva").attr('value',Number(total)*1.21);
        ingresosBrutos	=	Number(total)*1.03;
        $("#ingresosBrutos").text($("#ingresosBrutos").text()+ ingresosBrutos);
        impuestosBancarios	=	Number(total)*1.21*1.012;
        $("#impuestosBancarios").text($("#impuestosBancarios").text()+impuestosBancarios);
    });

        $('.Presupuestar').click(function(){
            var ordenid	= $(this).attr('id');
            var presupuestoid	= $(this).attr('presupuesto');		
            Presupuestar(ordenid, presupuestoid);
            
            return false;
        });
    

    
    $('#totalSinIva').change();
	
	guardarObtenerInsumos(1, 'list');

    $("#mostrarinsumos").click();
});
// lo usa el popup generar orden de compra

function reload()
{
	var ot	=	$('#OrdenDeTrabajo').val();
	//window.location.reload();
	if(ot)
		window.location = '/Orden/Edit/id/' + ot;
	else
		alert('NO existe la orden de trabajo');
	//$('#FrmEdit').submit();
}

function Presupuestar(OrdenId, PresupuestoId)
{
	if(OrdenId > 0)
	{
		var url	=	'/Presupuesto/Edit/OrdenId/' + OrdenId;

		if(PresupuestoId > 0)
			url	=	url + '/id/' + PresupuestoId;
	    
		var opciones="toolbar=no, location=no, directories=no, status=no, menubar=yes, scrollbars=yes, resizable=yes, width=1000, height=700, top=85, left=140";
	
		abrirPopUp(url, opciones);        
	}
	else
		alert('El numero de orden no es correcto');
}
function abrirPopUp(pagina, opciones)
{
	window.open(pagina,"",opciones);
}
function guardarObtenerInsumos(insumo, action)
{
	if (insumo) // si esta seteado
	{
		// insert record y cargar nombre
		$.ajax({
			type: "GET",
			url: '/Orden/GetInsumos/Orden/' +  3979  + '/Insumo/' + insumo + '/Accion/' + action,
			dataType: "text/html",
			success: function(html){
				//$(html).insertAfter("#docenteLabel");
				$("#insumos").html(html);
			}

		});
	}
	
	return;
}

function generarOrdenDeCompra(InsumoId)
{
	if(InsumoId)
	{
		// advertencia
		/*
		$("#dialog-confirm").dialog({
			resizable: false,
			height:140,
			modal: true,
			buttons: {
				'Delete all items': function() {
					$(this).dialog('close');
				},
				Cancel: function() {
					$(this).dialog('close');
				}
			}
		});
		*/
		var response	=	confirm('Esta seguro que desea generar una orden de compra?')
		
		if(response)
		{
			// abrir venta y generar orden
			window.open(	'/OrdenCompra/GenerarOrden/InsumoId/' + InsumoId, 
													'windowname1', 
													'width=980, height=700, scrollbars = yes');
		}
		
		
	}
}
/*
function reload()
{
	//window.location.reload();
	$('#FrmEdit').submit();
}
*/
</script>


<a class="linkSendHome linkSendHomeEdit" href="/Orden/List/order/PrioridadId_DESC">&laquo; Volver al listado</a>

<h1>Editar Orden de trabajo &raquo; <span>3979</span></h1>

                        <p>> Sin empezar ></p>
                                            <p>> Sin empezar ></p>
                                            <p>> Sin empezar ></p>
                                            <p>> Sin empezar ></p>
                                            <p>> Buscando ></p>
                                            <p>> Buscando ></p>
                                            <p>> Buscando ></p>
                                            <p>> Cotizado ></p>
                                            <p>> Presupuestado ></p>
                                            <p>> Presupuestado ></p>
                                        
<form id="FrmEdit" enctype="multipart/form-data" action="" method="post">
    <input type="hidden" name="data[Id]" value="3979" id="OrdenDeTrabajo"/>
   
    <input type="hidden" name="data[Status]" id="stateValue" value="1" />
    

        

    <div class="form">
        <div id="FormsColumn"> <!-- contiene toda la columna -->

    <div class="formButtons">
        <div class="info">
        <input type="button" class="btMinimize btBlock" value="" title="Bloquear arriba" />
        <!-- al clickear, que desactive el movimiento, y quede bloqueado arriba -->
        
        <div id="formButtonsContent">
        
            <ul>
                <li class="buttonsTop">
                <input type="submit" value="Guardar" class="btGray" title="Guardar" />
                
                <input type="reset" value="Volver" class="btGray" title="Volver" onClick="window.location='/Orden/List'"/>
                </li>
            </ul>
            
        </div> <!-- /formButtonsContent -->
        
        </div> <!-- /info -->
    </div> <!-- /formButtons -->

</div> <!-- /FormsColumn -->            
                    
                        
                        
           
           
            <div class="contentEditor"> <!-- formulario de edicion de contenido -->
			            <div class="productsEditorContent">
			            
		    <a id="detalle">Detalle</a>
		               	<a id="mostrarinsumos">Insumos</a>
           	           	<a id="mostrarventas">Venta</a>
                   
		            
            <table width="100%"  border="0" cellspacing="0">
              <tr>
              	
                <td><table width="100%"  border="0" cellspacing="0">
                  <tr>
                    <td>                <div class="contentTitles" id="">
                    <label class="blue">Cliente</label>       
                    <select name="data[ClienteId]" class="required">
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
                                                <option value="169" selected="selected">Allergan</option>
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
                                                <option value="52" >Cabaña Argentina</option>
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
                                                <option value="184" >Watch Land</option>
                                                <option value="133" >YMF-LAB</option>
                                                <option value="180" >Zanella</option>
                                                <option value="69" >Zecat</option>
                                            </select>
                </div> <!-- /contentTitles -->  
                </td>
                    <td>                <div class="contentTitles">
                    <label class="blue">Producto</label>
                    <input id="producto" type="text" class="required" name="data[Producto]" value="Cartilla de lectura">
                </div> <!-- /contentTitles --></td>
                    <td>         
                <div class="contentTitles">
                    <label class="blue">Cantidad</label>
                    <input type="text" class="number" name="data[Cantidad]" value="3000">
                </div> <!-- /contentTitles --></td>
                  </tr>
                </table></td>
              </tr>
              <tr>
                <td><div class="contentTitles general" style="display: none">
                    <div align="center">
                      <label class="blue">Descripcion de trabajo</label>
                      <textarea name="data[DescripcionDeTrabajo]" cols="45" rows="5" class="required" id="descripciondetrabajo">Formato: Cerrado – 14 ancho x 21 alto / Abierto – 28 de ancho x 21 alto
Material:carton gris de 10 gr montado en papel ilustracion brilllante.
Colores:4/4
Terminacion: troquelado marcado para cierre</textarea>
                    </div>
                </div> 
                  <div align="center">
                    <!-- /contentTitles -->  
                </div></td>
              </tr>
              <tr>
                <td>
                       
				<table width="100%"  border="0" cellspacing="0"  class="general" style="display: none">
  <tr>
    <td><div class="contentTitles">
                    <label class="blue">Fecha de inicio</label>
                    <input type="text" class="required date" id="fechaInicio" name="data[FechaInicio]" value="29/04/2016">
					<label for="fechaInicio" generated="true" class="error" style="display:none;"></label>
					
                </div> <!-- /contentTitles -->
    </td>
    <td>                <div class="contentTitles">
                    <label class="blue">Fecha de proximo cambio de estado (estimada)</label>
                    <input type="text" class="required date" id="fechaEntrega" name="data[FechaEntrega]" value="05/05/2016">
					<label for="fechaEntrega" generated="true" class="error" style="display:none;"></label>
                </div> <!-- /contentTitles --></td>
    <td>				                <div class="contentTitles">
                    <label class="blue">Fecha de finalizacion</label>
                    <input type="text" class="date" id="fechaFin" name="data[FechaFin]" value="">
					<label for="fechaFin" generated="true" class="error" style="display:none;"></label>	
                </div> <!-- /contentTitles --> </td>
    <td>
</td>
  </tr>
</table>
</td>
              </tr>
              <tr>
                <td>
				<table width="100%"  border="0" cellspacing="0" class="general" style="display: none">
  <tr>
    <td>                <div class="contentTitles" id="">
                    <label class="blue">Estado</label>       
                    <select name="data[EstadoId]" class="required">
                        <option value="">Seleccionar</option>
                                                <option value="0" >Sin empezar</option>
                                                <option value="1" >Cotizado</option>
                                                <option value="2" selected="selected">Presupuestado</option>
                                                <option value="3" >En produccion</option>
                                                <option value="4" >Finalizado</option>
                                                <option value="5" >Cobrado</option>
                                                <option value="6" >Anulado</option>
                                                <option value="7" >Buscando</option>
                                                <option value="8" >Aprobado</option>
                                            </select>
                </div> <!-- /contentTitles -->   </td>
    <td>				<div class="contentTitles" id="">
                    <label class="blue">Prioridad</label>       
                    <select name="data[PrioridadId]" class="number">
                        <option value="">Seleccionar</option>
                                                <option value="2" >Media</option>
                                                <option value="1" >Preproyecto</option>
                                                <option value="4" >Simple box</option>
                                                <option value="3" >Ventas</option>
                                            </select>
                </div> <!-- /contentTitles --></td>
    <td>            
                <div class="contentTitles">
                    <label class="blue">Tiempo estimado</label>
                    <p>Dias estimados de duracion (incluir sab,dom,feriado)</p>
                    <input type="text" class="number" id="" name="data[TiempoEstimado]" value="">	
                </div> <!-- /contentTitles -->
    </td>
  </tr>
</table>                
                <div class="contentTitles general" style="display: none">
                    <label class="blue">Comentario de prioridad</label>
                    <textarea name="data[PrioridadComentario]" cols="45" rows="5" class=""></textarea>
                </div> <!-- /contentTitles --> 
                
</td>
              </tr>
              
              <tr>
                <td>
                <div class="contentTitles">    
                                 	<div id="insumos" class="" style="display: none">
                 	
                 		<!-- aca se insertan los insumos por ajax -->
                 		
                 	</div> <!-- end div insumos -->
                                 </div> <!-- /contentTitles --> 
                </td>
              </tr>
              <tr>
                <td>
                			</td>
              </tr>
              <tr>
                <td>
				        
              </tr>
              <tr>
                <td>
				<table width="100%"  border="0" cellspacing="0"  class="ventas" style="display: none">
  <tr>
    <td>                <div class="contentTitles">
                    <label class="blue">Lugar de Entrega</label>
                    <input type="text" class="" name="data[LugarDeEntrega]" value="">
                </div> <!-- /contentTitles -->
                
				
				</td>
    <td><div class="contentTitles">
                    <label class="blue">Condicion de cobro</label>
                    
                    <input class="check" type="radio" name="data[CondicionDeCobro]" value="B" />
                    <label class="check blue">Blanco</label>
                    <input class="check" type="radio" name="data[CondicionDeCobro]" value="N" />
                    <label class="check blue">Negro</label>
                </div> <!-- /contentTitles --></td>
  </tr>
  
</table>

				</td>
              </tr>
			  
			  <tr>
 
				<div class="contInputs" >
				
				</div>
			  </tr>
            </table>

				<div class="contentTitles ventas" style="display: none">
                    <label class="blue">Observaciones</label>
                    <textarea name="data[Observaciones]" cols="45" rows="5" class=""></textarea>
                </div> <!-- /contentTitles -->
                                                
            </div> <!-- /productsEditorContent -->
        </div>  <!-- /contentEditor -->
    </div> <!-- /form -->

</form>
            </div>
        </div>
            
            <div id="Footer" class="">
    
        <img src="/images/logoSmall.png" alt="Logo" />
        <span>Administrador de contenidos</span>
        
        <a class="ids" href="mailto:matias.tokar@gmail.com" target="" title="Matias Tokar | Desarrollo Web">
        <img src="/images/body/mt_logo.png" alt="Matias Tokar | Desarrollo Web" /></a>
    
    </div> <!-- /Footer -->    </div> <!-- /Container -->
</body>
</html>