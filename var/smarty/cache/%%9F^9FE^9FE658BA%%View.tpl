278
a:4:{s:8:"template";a:4:{s:28:"Backend/Presupuesto/View.tpl";b:1;s:34:"Backend/Layouts/Include/Header.tpl";b:1;s:29:"Backend/Formulario/Header.tpl";b:1;s:29:"Backend/Formulario/Footer.tpl";b:1;}s:9:"timestamp";i:1462378118;s:7:"expires";i:1462378118;s:13:"cache_serials";a:0:{}}<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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

p { 
	font-size:12px;color: #000000}
	
h1 { 
	font-size:25px;color: #000000}	

.SeparadorAbajo {border-bottom: 2px solid #000000;}


.Estilo3 {font-size: 16px}
.Estilo4 {
	font-size: 14px;
	font-weight: bold;
}

</style>

<script type="text/javascript">
$(document).ready(function(){

	$(this).attr("title", "Allergan-3979-Cartilla de lectura");
	
  	$('.print').click(function() {
  	  	
  	  	$('.contInputs').hide();
  	  	
		window.print();

		
		
		return false;
  	});	


  	$('.cerrar').click(function() {
  	  	
		window.close();
  	});

    
	
});


</script>


<body class="popupLayout">

	<div class="lightbox" id="FileLightbox" style="display:block;">

					<div class="contInputs" style="clear: left;">
						
			            <div class="buttonsCont" style="clear: left;">
							<input type="" value="Imprimir" class="btDark print" title="Imprimir presupuesto" />
							
							<input type="" value="Cerrar" class="btDark cerrar" title="Cerrar" />
							
			            </div>
			            
					</div>
		

		<table width="100%"  border="0" cellspacing="0">
			  <tr>
			    <td>
			    <!-- si la OT tiene rioridad SimpleBox, se muestra otro header con distinto logo -->
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
			    </td>
			  </tr>
			  <tr>
			    <td>
			    
			    <table width="100%"  border="0" cellspacing="0">
				  <tr height="20">
				    <td><h2 class="Estilo4">Sres. Allergan</h2></td>
				    <td>			    <h2 align="right" class="Estilo4">Fecha: 04/05/2016 </h2></td>
				  </tr>
				  <tr height="30">
				    <td><h2 class="Estilo4">At, Angeles Quiroga</h2></td>
				    <td>&nbsp;</td>
				  </tr>
				</table>
			    
			    
			    </td>
			  </tr>
			  <tr>
			    <td>
			    
			    


<table width="100%"  border="0" cellspacing="0">
  <tr>

    <td height="40">
    	<span class="Estilo4">Presupuesto Cartilla de lectura </span>
    </td>
    <td>
    	<div align="right" class="Estilo4">REF: 3979 </div>
    </td>

  </tr>
  <tr>
    <td colspan="2" height="5">
		  	<div class="SeparadorAbajo">
			</div> <!-- end separador -->    
	</td>
  </tr>
  <tr>
  
    <td colspan="2" height="50"><span class="Estilo3">Por la presente, de acuerdo a lo solicitado por ustedes, les enviamos el siguiente presupuesto: </span></td>
    
  </tr>
</table>

			    
			    </td>
			  </tr>
			  <tr>
			    <td>
		                  
<table width="100%"  border="1" align="center" cellspacing="0" bordercolor="#000000" bgcolor="#FFFF99">
  <tr bgcolor="#FFFF66" height="40">
    <td><h2  class="Estilo4" align="">Cantidad</h2></td>
    <td><h2 class="Estilo4" align="">Detalle</h2></td>
    <td><h2 class="Estilo4" align="">Importe total</h2></td>
  </tr>
    <tr>
    <td><H2>3000</H2></td>
    <td><H2>Cartillas de Lectura</H2></td>
    <td><H2>$ 72900.00</H2></td>
  </tr>
      </table>

            
			    </td>
			  </tr>
			  <tr>
			    <td height="15">
								
				    <div class="SeparadorAbajo">
					</div> <!-- end separador -->    
			    </td>
			  </tr>
			  <tr>
			    <td height="150">
			    <div class="contentTitles">
                    <h2 class="Estilo4"><span class="active"></span>&raquo; Caracteristicas</h2>
                    <h2>Formato: Cerrado – 14 ancho x 21 alto / Abierto – 28 de ancho x 21 alto<br />
Material:carton gris de 1 mm montado  frente y dorso en papel ilustracion brilllante.de 170gr<br />
Colores:4/4<br />
Terminacion: troquelado marcado para cierre</h2>
                </div> <!-- /contentTitles -->
			    
			    </td>
			  </tr>
			  <tr>
			    <td>
			    <table width="100%"  border="0" cellspacing="0">
  <tr>
  
    <td height="50">
    	<h2 class="Estilo4">&raquo; Plazo de entrega</h2>
    	    	<h2>35 dias habiles.</h2>
    	<h2>Este plazo es considerado a partir de la fecha de aprobacion de pre-produccion (*)</h2>
    	<h2>Pre-produccion: aprobacion de prototipo, de dise&ntilde;o y prueba digital (si aplica).</h2>
    	    </td>
    
  </tr>
  <tr>
  	    <td height="50">
    	<h2 class="Estilo4">&raquo; Lugar de entrega</h2>
    	<h2>CABA</h2>
    </td>
      </tr>
  <tr>
      <td height="50">
    	<h2 class="Estilo4">&raquo; Formas de pago</h2>
    	<h2>50% anticipo / 50 %, 30 dias FF</h2>
    </td>
      </tr>
  <tr>
  
    <td height="25">
    	<h2 class="Estilo4">&raquo; Validez de la oferta</h2>
    	<h2>10 dias</h2>
    </td>
    
  </tr>
  <tr>
  
    <td height="25">
    	<h2 class="Estilo4">&raquo; Los Valores estan expresados en pesos Argentinos</h2>
    </td>
    
  </tr>
  <tr>
  
    <td height="25">
    	<h2 class="Estilo4">&raquo; Estos Precios NO incluyen IVA</h2>
    </td>
    
  </tr>
  <tr>
    <td height="100">
    	    </td>
  </tr>
  <tr>
    <td height="100">
    	<h2 class="Estilo3">Sin otro particular, les agradecemos el haber solicitado el presente presupuesto y los saludamos atentamente.</h2>
    	<!-- si la OT tiene rioridad SimpleBox, se muestra otro header con distinto logo -->
			    			    	<h2 class="Estilo3">Dpto. Comercial DCL Group</h2>
			        	
    	
    	
    </td>
  </tr>
</table>
<!-- si la OT tiene rioridad SimpleBox, se muestra otro header con distinto logo -->
							    	
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
			    		    
			    </td>
			  </tr>
			</table>

	   	        
	</div> <!-- end filelightbox --> 

	    

</body>
</html>