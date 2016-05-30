193
a:4:{s:8:"template";a:2:{s:25:"Backend/Cobranza/View.tpl";b:1;s:34:"Backend/Layouts/Include/Header.tpl";b:1;}s:9:"timestamp";i:1410451015;s:7:"expires";i:1410451015;s:13:"cache_serials";a:0:{}}<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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

<div id="Layer1" style="position:absolute; left:20px; top:38px; width:162px; height:37px; z-index:1; font-size: 14px; font-family: Arial, Helvetica, sans-serif;">11/09/2014</div>

	<div class="lightbox" id="FileLightbox" style="display:block;">
		<script type="text/javascript" src="/scripts/List.js"></script>

					<div class="contInputs" style="clear: left;" id="imprimir">
						
			            <div class="buttonsCont" style="clear: left;">
							<input type="" value="Imprimir" class="btDark printOrden" title="Imprimir orden de pago" />
							
							<input type="" value="Cerrar" class="btDark cerrar" title="Cerrar" />
							
			            </div>
			            
					</div>
							
<table border="0" cellspacing="0" height="100" align="right">
  <tr>
    <td><p>11/09/2014</p></td>
  </tr>
</table>


<table border="0" cellspacing="0" height="150">
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>
		            
		
	    <p>Cobranza #199</p>
	    <br></br>
	    <p>---------------------------------------------------------</p>
	    <br></br>
	    
	    <div class="lightobxMain">
	    
				<h2>Recibi de CARNES PORCINAS SELECCIONADAS SA, <br></br>domicilio AV CORRIENTES 457 PISO 11 , CABA.<br></br>La suma de $ 278942.51.-<br></br></h2>
				<br></br>
				<p>------------------------------------------------------------------------</p>
				
				<div id="LBFilesContainer">
		
				
				        
        <h2>Numero interno: 221</h2>
        
<!-- liquidacion -->
<!-- 
 -->
<h1>Liquidacion</h1>
<p>Total liquidacion: $ 278942.51</p>
	<div class="list">
			      
           <div class="listTop">
                <div>
                    <table border="0" cellpadding="0" cellspacing="0">
							<tr>    
                                <td width="20%"><p>Numero Factura DCL</p> </td>
                                <td width="60%"><p>Importe abonado de la factura asociada</p> </td>
                                
                            </tr>
                    </table>
                </div>
            </div> <!-- /listadoTop -->
                        
                    <div class="listItems">
                        
                        <table border="0" cellpadding="0" cellspacing="0">
												    <tr >
                                <td width="20%">657 </td>
                                <td width="60%">$ 278942.51 </td>        
						    </tr>
												
                        </table>
                        
                    </div> <!-- /listItems -->
                        
                </div> <!-- /list -->
                
                
<!-- end liquidaciones -->

<!-- insumos -->
<h1>Detalle de pago</h1>
<p>Total abonado: $ 278942.51</p>
	<div class="list">
			      
           <div class="listTop">
                <div>
                    <table border="0" cellpadding="0" cellspacing="0">
							<tr>    
                                <td width="15%"><p>Tipo de pago</p> </td>
                                <td width="20%"><p>Detalle</p> </td>
                                <td width="15%"><p>Importe</p> </td>
                                <td width="15%"><p>Emision</p> </td>
                                <td width="15%"><p>Cobro</p> </td>
                                
                            </tr>
                    </table>
                </div>
            </div> <!-- /listadoTop -->
                        
                    <div class="listItems">
                                                <table border="0" cellpadding="0" cellspacing="0" width="100%">
												    <tr >
                                <td width="15%">Retencion ganacias </td>
                                <td width="20%">10225 </td>
                                <td width="15%">$ 4510.62 </td>
                                <td width="15%"> </td>
                                <td width="15%"> </td>
                                
						    </tr>
												    <tr >
                                <td width="15%">Retencion IIBB Bs As </td>
                                <td width="20%">12912 </td>
                                <td width="15%">$ 5186.95 </td>
                                <td width="15%"> </td>
                                <td width="15%"> </td>
                                
						    </tr>
												    <tr >
                                <td width="15%">Transferencia bancaria </td>
                                <td width="20%">ICBC-05280210159072 </td>
                                <td width="15%">$ 269244.94 </td>
                                <td width="15%"> </td>
                                <td width="15%"> </td>
                                
						    </tr>
												
                        </table>
                                            </div> <!-- /listItems -->
                        
                </div> <!-- /list -->
                                                     
			
<!-- end pagos -->     
	           	     
	           	
	   	                        
				</div>
		</div> <!-- /selectFile -->
		<h2><br></br>Sin otro particular los saludamos atentamente.<br></br>DCL Group<br></br>De Martin Zaszczynski</h2>
			<h1><br></br></h1>
	        <p>Recibi la suma de pesos : ..............................................................................</p>
	        <p> ..............................................................................</p>
	       	<h1><br></br></h1>
	       	<p>Firma  ...........................</p>
	        
	    </div> <!-- /lightobxMain -->
	    
	</div> <!-- /lightbox -->
				  
</body>
</html>