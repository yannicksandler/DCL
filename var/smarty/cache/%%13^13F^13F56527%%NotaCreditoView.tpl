289
a:4:{s:8:"template";a:4:{s:39:"Backend/NotaCredito/NotaCreditoView.tpl";b:1;s:34:"Backend/Layouts/Include/Header.tpl";b:1;s:29:"Backend/Formulario/Header.tpl";b:1;s:29:"Backend/Formulario/Footer.tpl";b:1;}s:9:"timestamp";i:1424691445;s:7:"expires";i:1424691445;s:13:"cache_serials";a:0:{}}<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
	
</head>


<style type="text/css">
<!--
p { 
	font-size:12px;color: #000000}
h1 { color: #000000}
h2 { color: #000000}		
-->
</style>

<script type="text/javascript">
$(document).ready(function(){

  	$('.printOrden').click(function() {
  	  	
  	  	$('.contInputs').hide();
  	  	
		window.print();

		
		
		return false;
  	});	


  	$('.cerrar').click(function() {
  	  	
		window.close();
  	});

    
	
});

function SinPagos()
{
	var r	=	confirm('No hay pagos, debe incluir un pago a la orden. Cerrar ventana y editar la orden?');

	if(r)
	{
		window.close();
	}
}
</script>


<body class="popupLayout">

	<div class="lightbox" id="FileLightbox" style="display:block;">
		<script type="text/javascript" src="/scripts/List.js"></script>

					<div class="contInputs" style="clear: left;">
						
			            <div class="buttonsCont" style="clear: left;">
							<input type="" value="Imprimir" class="btDark printOrden" title="Imprimir orden de pago" />
							
							<input type="" value="Cerrar" class="btDark cerrar" title="Cerrar" />
							
			            </div>
			            
					</div>
				
					<div class="loadFile">
				<table width="100%"  border="0">
				  <tr>
				    <td width="80" rowspan="2"><p href="#" title="Logo"><img src="/images/logo.png" alt="Logo" /></p></td>
				    <td>				<h1>DCL Group</h1></td>
				  </tr>
				  <tr>
				    <td>				<p><strong>Eustaquio Frias 335, 2do C, Cap. Fed. Argentina - 
				    								(+5411) 4587-7400
													</strong></p><br></br>
										<p><strong>ventas@dclgroup.com.ar</strong></p></td>
				  </tr>
				</table>
			</div> <!-- /loadFile -->		
		<h1>Nota de credito</h1>
                    
		<div class="filtersBox filtersInfoBox">
		
                <ul>
                    <li>
                    	<p>Numero: <span>684</span></p>
                        <p>Fecha: <span>23/02/2015 </span></p>
                        
						
                    </li>
                    <li>
						<p>Cliente: <span>CACIC SPORTS VISION S.R.L.</span></p>
                    </li>
                </ul>
            </div> <!-- /filtersBox-->
	    
	    <div class="lightobxMain">
	    		<h2>50 Kits Vulk $35,81 + IVA
48 Kits Rusty $30,35 + IVA</h2>
				<h1><br><br>Total: $ 3929.23</h1>
				
		</div> <!-- /selectFile -->
		
	     
			<h1><br></h1>
	       	<h1><br></h1>
	       	<p>Firma  ...........................</p>
	        
	    </div> <!-- /lightobxMain -->
	    
	</div> <!-- /lightbox -->
	
<style type="text/css">

.Separador {border-top: 2px solid #000000;}

</style>


<div class="Separador">
<table width="100%"  border="0" cellspacing="0">
  
  <tr>
    <td><div align="right">DCL Group | Tel: 4587-7400 / Eustaquio Frias 335, 2do C, Buenos Aires / e-mail: info@dclgroup.com.ar</div></td>
  </tr>
  <tr>
    <td><div align="right">website: www.dclgroup.com.ar</div></td>
  </tr>
</table>

</div> <!-- /loadFile -->			  
</body>
</html>