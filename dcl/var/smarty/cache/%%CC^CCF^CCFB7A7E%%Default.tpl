382
a:4:{s:8:"template";a:6:{s:27:"Backend/Layouts/Default.tpl";b:1;s:34:"Backend/Layouts/Include/Header.tpl";b:1;s:35:"Backend/Layouts/Include/SubMenu.tpl";b:1;s:32:"Backend/Layouts/Include/Menu.tpl";b:1;s:38:"Backend/Layouts/Include/SiteHeader.tpl";b:1;s:34:"Backend/Layouts/Include/Footer.tpl";b:1;}s:9:"timestamp";i:1411139377;s:7:"expires";i:1411139377;s:13:"cache_serials";a:0:{}}<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
                    <a href="/Default/Start" title="Usuario registrado">martin</a>
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
            <a  href="/Orden/ListVentas" title="Ventas">Ventas</a>
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
            <a  href="/GestionAdministrativa/Main" title="Gestion administrativa">Gestion administrativa</a>
        </li>
                <li>
            <a class="active" href="/GestionEconomica/Main" title="Gestion economica">Gestion economica</a>
        </li>
            </ul>
</div> <!-- /Menu -->

<div class="subMenu">
    <ul>
            </ul>
</div>
    </div> <!-- /Header -->        
        <div id="Content">
            <div class="listado">    
                
<!-- date picker -->
<link type="text/css" href="/styles/ui-lightness/jquery-ui-1.8.2.custom.css" rel="stylesheet" />
<script type="text/javascript" src="/scripts/jquery/jquery.ui.datepicker.js"></script>
<script type="text/javascript" src="/scripts/jquery/jquery.ui.core.js"></script>
<script type="text/javascript" src="/scripts/jquery/jquery.ui.widget.js"></script>

<script type="text/javascript" src="/scripts/Edit.js"></script>


<!-- dialog -->
<script type="text/javascript" src="/scripts/jquery/jquery-ui-1.8.4.custom.min.js"></script>
<!-- dialog -->

<link rel="stylesheet" href="/scripts/colorbox-master/colorbox-master/example1/colorbox.css" />
<script src="/scripts/colorbox-master/colorbox-master/jquery.colorbox.js"></script>
	

<script type="text/javascript">
$(document).ready(function(){
    $("#FrmEdit").validate();

    $(".ajax").colorbox();
    
    var $AjaxLoader = '<p><img src="/images/body/ajax-loader.gif" class="loader" border="0" />Cargando ...</p>';

	$('.button').click(function() {
  	  	var url	=	$(this).attr('href');
  	  	window.location = url;		
		
		return false;
  	});
  	
	loadDefaultTab();

	// para todos los tabs, establecer comportamiento (que cargue html por ajax)
    $('#ResumeTabs a, #ResumeTabs a span').click(function(event){
        
        //event.preventDefault();
			
        $('#ResumeTabs a').removeClass("active");
        
        var $activeElement;
            
        if( $(this).attr("href") )
		{
            $activeElement     =     $(this);
		}
        else
		{
            $activeElement     =     $(this).parent();
		}
            
        $activeElement.addClass("active");

        $('#HomeContent').html($AjaxLoader);
        //$('#ExamenHomePreloader').html($AjaxLoader);
		
		$.ajax({
                type: 'POST',
                url: $activeElement.attr('href'),
                dataType: 'text/html',
                success: function(data){
					$('#HomeContent').html(data);
                }
        }); 
		
		return false;
	
    });


    var availableTags = [
							
                       ];

    var availableTagsClientes = [
							
                    ];
    

    $("input#proveedor_autocomplete").autocomplete({
        source: availableTags,
      //define select handler
		select: function(e, ui) {
			var valor = ui.item.value;
			SetProveedor(valor);
		} 
    }); 

    $("#proveedor_autocomplete").blur(function(){
        if( $(this).val() == '' )
            $(this).val( $(this).attr("defaultValue") );
    });

    $("#proveedor_autocomplete").focus(function(){
        if( $(this).val() == $(this).attr("defaultValue"))
            $(this).val('');
    });

    $("input#cliente_autocomplete").autocomplete({
        source: availableTagsClientes,
      //define select handler
		select: function(e, ui) {
			var valor = ui.item.value;
			SetCliente(valor);
		} 
    }); 

    $("#cliente_autocomplete").blur(function(){
        if( $(this).val() == '' )
            $(this).val( $(this).attr("defaultValue") );
    });

    $("#cliente_autocomplete").focus(function(){
        if( $(this).val() == $(this).attr("defaultValue"))
            $(this).val('');
    });

    // no abrir lightbox si no hay url 
    $("#open_proveedor").click(function(){
    	var url	=	$(this).attr('href');
    	if(url == '')
    	{
        	alert('Debe seleccionar un proveedor');
        	return false;
    	}
    });

    // no abrir lightbox si no hay url 
    $("#open_cliente").click(function(){
    	var url	=	$(this).attr('href');
    	if(url == '')
    	{
        	alert('Debe seleccionar un cliente');
        	return false;
    	}
    });
});

function GetBancos()
{
	$.ajax({
        type: 'POST',
        url: '/GestionEconomica/Bancos',
        dataType: 'text/html',
        success: function(data){
			$('#bancos').html(data);
        }
	});
}

function SetProveedor(NombreProveedor)
{
	inputText	=	NombreProveedor;
	
	$("#SeleccionarProveedor option").each(function () {
        if ($(this).html() == inputText) {
            $(this).attr("selected", "selected");
            //return;
        }
	});

	//var proveedorid = GetSelectedValue("SeleccionarProveedor");
	GoToCuentaCorrienteProveedor();
	
}

function GoToCuentaCorrienteProveedor()
{
	var $selected 	=	$("#SeleccionarProveedor").find('option:selected');
	var $proveedorid	=	$selected.val();
	
	if( $proveedorid > 0 )
	{
		var url = '/CuentaCorriente/ListProveedor/ProveedorId/'+$proveedorid;
		$("#open_proveedor").attr('href', url);
		$("#open_proveedor").click();
		
		//window.location = url;
	}
	else
		alert('El proveedor seleccionado no es correcto');
}

function SetCliente(Nombre)
{
	inputText	=	Nombre;
	
	$("#SeleccionarCliente option").each(function () {
        if ($(this).html() == inputText) {
            $(this).attr("selected", "selected");
            //return;
        }
	});

	//var proveedorid = GetSelectedValue("SeleccionarProveedor");
	GoToCuentaCorrienteCliente();
	
}

function GoToCuentaCorrienteCliente()
{
	var $selected 	=	$("#SeleccionarCliente").find('option:selected');
	var $id	=	$selected.val();
	
	if( $id > 0 )
	{
		
		var url = '/CuentaCorriente/ListCliente/ClienteId/'+$id;
		
		$("#open_cliente").attr('href', url);
		$("#open_cliente").click();
		//window.location = url;
	}
	else
		alert('El cliente seleccionado no es correcto');
}



function loadDefaultTab()
{
	$activeElement	=	$('#TabChequesEnCartera');
	$activeElement.addClass("active");

	$.ajax({
        type: 'POST',
        url: $activeElement.attr('href'),
        dataType: 'text/html',
        success: function(data){
			$('#HomeContent').html(data);
        }
	});


	
	 
}

function abrirPopUp(pagina, opciones)
{
	window.open(pagina,"",opciones);
}
</script>



<h1>Gestion economica</h1>

        <div class="listado">
            
				
<table cellspacing="0" cellpadding="0" border="1" >  

<tbody>
	<tr style="mso-yfti-irow:0;mso-yfti-firstrow:yes">   
		<td width="299" valign="top" style="width:224.5pt;border:solid windowtext 1.0pt;   mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt">   
			<p align="center" style="text-align:center" class="MsoNormal"><b style="mso-bidi-font-weight:normal"><span style="font-family:Arial;   color:black;mso-ansi-language:ES">EXISTENCIA</span></b></p>   
		</td>   
		<td width="299" valign="top" style="width:224.5pt;border:solid windowtext 1.0pt;   border-left:none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:   solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt">   <p align="center" style="text-align:center" class="MsoNormal"><b style="mso-bidi-font-weight:normal"><span style="font-family:Arial;   color:black;mso-ansi-language:ES">CUENTA CORRIENTE</span></b></p>   
		</td>  
	</tr>  
	<tr style="mso-yfti-irow:1">   
		<td width="299" valign="top" style="width:224.5pt;border:solid windowtext 1.0pt;   border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;   padding:0cm 5.4pt 0cm 5.4pt">
		 	
			<table border="1">
				<tr>
				<td>
				
						<p style="font-family:Arial; color:black; font-size: 11pt; mso-ansi-language:ES">Efectivo: 
						<br><span id="ValorEfectivoMain">$ 11908.31</span>
						</p>
						<input id="saldoefectivo" type="hidden" value="11908.31"></>
						
						<a class="ajax" id="" href="/GestionEconomica/HistorialEfectivo"
						><img src="/images/icons/zoom_in.png" title="Ver historial efectivo"/></a>
						
						<a class="ajax" id="" href="/GestionEconomica/ActualizarSaldoEfectivo"
						><img src="/images/icons/add.png" title="Actualizar saldo en efectivo"/></a>
				
				</td>
				</tr>
				<tr>
				<td>
						<p style="font-family:Arial; color:black; font-size: 11pt; mso-ansi-language:ES">Cheques en cartera: 
						<br><span>$ 87286 (B)</span>
						<br><span>$ 0 (N)</span>
						</p>
                		
                		<a class="ajax" href="/GestionEconomica/ChequesTerceros" title=""><img src="/images/icons/zoom_in.png" title="Ver cheques"/></a>
				</td>
				</tr>
				<td>
				<p  style="font-family:Arial; color:black; font-size: 11pt; mso-ansi-language:ES" title="Cheques pendientes de acreditar">Pendiente acreditar: 
				<br><span>$ 0.00</span>
				</p>
                		<a class="ajax" href="/GestionEconomica/ChequesPendientesAcreditar" title=""><img src="/images/icons/zoom_in.png" title="Ver cheques"/></a>
                	
                		
				</td>
				</tr>
				<td>
				<p  style="font-family:Arial; color:black; font-size: 11pt; mso-ansi-language:ES" title="Cheques pendientes de debitar">Pendiente debitar: 
				<br><span>$ 181689.67</span>
				</p>
                		<a class="ajax" href="/GestionEconomica/ChequesPendientesDebitar" title=""><img src="/images/icons/zoom_in.png" title="Ver cheques"/></a>
                		
				</td>
				</tr>
				<td>
                		<p  style="font-family:Arial; color:black; font-size: 11pt; mso-ansi-language:ES">Bancos: <br><span>$ 291433.32</span></p>
                		<a class="ajax" id=""
								    href="/GestionEconomica/Bancos"
								    ><img src="/images/icons/zoom_in.png" title=""/></a>	
				</td>
				</tr>
			</table>
		  
		</td>   
		<td width="299" valign="top" style="width:224.5pt;border-top:none;border-left:   none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;   mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;   mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt">
		    
		    <table border="1">
				<tr>
				<td>
				
						<p style="font-family:Arial; color:black; font-size: 11pt; mso-ansi-language:ES">Cuentas por cobrar de clientes <br><span>$ 12187.75</span></p>
						<a class="ajax" href="/GestionEconomica/SaldosClientes" title=""><img src="/images/icons/zoom_in.png" title="Saldo"/></a>
                        
				
				</td>
				</tr>
				<tr>
				<td>
                		<p style="font-family:Arial; color:black; font-size: 11pt; mso-ansi-language:ES">Deuda total a proveedores <br><span>$ -264355.1</span></p>
						<a class="ajax" href="/GestionEconomica/SaldosProveedores" title=""><img src="/images/icons/zoom_in.png" title="Saldo"/></a>
				</td>
				</tr>
			</table>
		    
		</td>  
	</tr>  
	<!-- 
	<tr style="mso-yfti-irow:2;mso-yfti-lastrow:yes">   
		<td width="299" valign="top" style="width:224.5pt;border:solid windowtext 1.0pt;   border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;   padding:0cm 5.4pt 0cm 5.4pt">
		    
		</td>   
		<td width="299" valign="top" style="width:224.5pt;border-top:none;border-left:   none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;   mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;   mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt">   <p style="mso-margin-top-alt:auto;mso-margin-bottom-alt:auto;   text-align:justify" class="MsoNormal"><span lang="ES-CO" style="font-size:11.0pt;font-family:   Arial;color:black">ddddddd </span></p>
		   
		</td>  
	</tr>
	 --> 
</tbody>
</table>		
		
		
			
				<div class="filtersBox filtersInfoBox">
                <ul>
                
                	<li>
                		<p title="Ordenes de trabajo pendientes de facturar">Pendiente de facturar: <br><span>$ 136640.90</span></p>
                		<a class="ajax" id=""
								    href="/GestionAdministrativa/FacturacionPendiente"
								    ><img src="/images/icons/zoom_in.png" title=""/></a>	
                	</li>
                	<li>
                		<p title="">OC pendientes de pago: 
                		<br><span>$ 94484.62 (B)</span>
                		<br><span>$ 0 (N)</span>
                		</p>
                		<a class="ajax" id=""
								    href="/GestionEconomica/OrdenesDeCompraPendientesDePago"
								    ><img src="/images/icons/zoom_in.png" title=""/></a>	
                	</li>
                	<li>
                		<p title="Insumos elegidos sin OC">Previsiones: 
                		<br><span>$ 4756.00 (B)</span>
                		<br><span>$ 11806.00 (N)</span>
                		</p>
                		<a class="ajax" id=""
								    href="/Insumo/ListPendientesDePago"
								    ><img src="/images/icons/zoom_in.png" title=""/></a>	
                	</li>
                	<li>
                		<p>Percepciones: <span>$ 9811.88</span></p>
                		<a class="ajax" href="/GestionEconomica/Percepciones" title=""><img src="/images/icons/zoom_in.png" title=""/></a>
                		<br>
                		<p>Retenciones:  <span>$ 86619.46</span></p>
                		<a class="ajax" href="/GestionEconomica/Retenciones" title=""><img src="/images/icons/zoom_in.png" title=""/></a>
                	
                	</li>
                </ul>
         </div> <!-- /filtersBox-->
         
          <!-- end / solo mostrar totales a Perfil Administrador -->
        
        <div class="filtersBox filtersInfoBox"> 
            <a class="ajax" id=""
								    href="/Facturacion/List/page/1/order/Id_DESC/"
								    ><img src="/images/icons/add.png" title="Liquidar"/> Facturas de venta </a>
								    
			<a class="ajax" id=""
								    href="/OrdenPago/List/page/1/order/Id_DESC/"
								    ><img src="/images/icons/add.png" title="Liquidar"/> Ordenes de pago </a>
								    
			<a class="ajax" id=""
								    href="/OrdenCompra/List/page/1/order/Id_DESC/"
								    ><img src="/images/icons/add.png" title="Liquidar"/> Ordenes de compra </a>								    
         			
			<a class="ajax" id=""
								    href="/FacturaCompra/List/order/NumeroInterno_DESC"
								    ><img src="/images/icons/add.png" title="Liquidar"/> Facturas de compra </a>
								    
			<a class="ajax" id=""
								    href="/Cobranza/List/order/Id_DESC/"
								    ><img src="/images/icons/add.png" title="Liquidar"/> Cobranzas </a>
								    
			<a class="ajax" id=""
								    href="/NotaDebito/List/order/Id_DESC/"
								    ><img src="/images/icons/add.png" title="Liquidar"/> Notas de debito </a>
			
			<a class="ajax" id=""
								    href="/NotaCredito/List/order/Id_DESC/"
								    ><img src="/images/icons/add.png" title="Liquidar"/> Notas de credito </a>					    
								    
			<br>
			<br>
			<a class="ajax" id=""
								    href="/Insumo/ListPendientesDePago"
								    ><img src="/images/icons/add.png" title="Liquidar"/> Previsiones </a>					    
			
			<a class="ajax" id=""
								    href="/Cheque/List"
								    ><img src="/images/icons/add.png" title="Liquidar"/> Cheques </a>
								    
			<a class="ajax" id=""
								    href="/GestionEconomica/ListBancos/order/Codigo_DESC/"
								    ><img src="/images/icons/add.png" title="Liquidar"/> Bancos </a>
								    
			<a class="ajax" id=""
								    href="/GestionEconomica/ListConceptosBancarios/order/Nombre_DESC/"
								    ><img src="/images/icons/add.png" title="Liquidar"/> Conceptos bancarios </a>
			
			<a class="ajax" id=""
								    href="/Rubro/List/order/Nombre_DESC/"
								    ><img src="/images/icons/add.png" title="Liquidar"/> Rubros </a>
								    
			<a class="ajax" id=""
								    href="/TipoGasto/List/order/Nombre_DESC/"
								    ><img src="/images/icons/add.png" title="Liquidar"/> Tipos de gasto </a>
								    					    					    
        </div> <!-- /filtersBox-->
        
           
             <div class="sectionMenu" id="ResumeTabs">
             
                	<a id="TabSaldosClientes" href="/GestionEconomica/SaldosClientes" title=""><span>Saldos de clientes</span></a>
                    
					<a id="TabPagosPendientes" href="/GestionEconomica/SaldosProveedores" title=""><span>Saldos de proveedores</span></a>
					
                    <a id="TabChequesEnCartera" href="/GestionEconomica/ChequesTerceros" title=""><span>Cheques en cartera</span></a>
                    
                    <a id="TabChequesPendientesAcreditar" href="/GestionEconomica/ChequesPendientesAcreditar" title=""><span>Cheques a acreditar</span></a>
                    
                    <a id="TabChequesPendientesDebitar" href="/GestionEconomica/ChequesPendientesDebitar" title=""><span>Cheques a debitar</span></a>
                    
                    <a id="TabPercepciones" href="/GestionEconomica/Percepciones" title=""><span>Percepciones</span></a>
                    
                    <a id="TabRetenciones" href="/GestionEconomica/Retenciones" title=""><span>Retenciones</span></a>
                    
                    
             </div>	<!--/sectionMenu -->
        	
						
            <div id="ExamenHomePreloader"><!-- contenido de formulario de un examen --></div>
            <div id="HomeContent"><!-- contenido de formulario de un examen --></div>
			
        </div> <!-- /listado -->
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