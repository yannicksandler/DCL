158
a:4:{s:8:"template";a:1:{s:36:"Backend/OrdenCompra/GenerarOrden.tpl";b:1;}s:9:"timestamp";i:1411133752;s:7:"expires";i:1411133752;s:13:"cache_serials";a:0:{}}<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>	
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
	<title>DCL | Administrador de contenidos</title>

<style type="text/css">
<!--
.Estilo1 {font-family: Arial, Helvetica, sans-serif}
-->
.Estilo3 {font-size: xx-small}
    </style>

<script type="text/javascript" src="/scripts/jquery/jquery-1.4.2.js"></script>
</head>


<script type="text/javascript">

$(document).ready(function(){

    $("#ModificarProveedor").click(function () {
		var url	=	$(this).attr('href');
	    
		var opciones="toolbar=no, location=no, directories=no, status=no, menubar=yes, scrollbars=yes, resizable=yes, width=900, height=600, top=85, left=140";
	
		abrirPopUp(url, opciones);
		return false;
		
    });
});
    
function cerrarActualizar()
{
	window.opener.reload(); 
	window.close();
}

function reload()
{
	$('#FrmEdit').submit();
}

function abrirPopUp(pagina, opciones)
{
	window.open(pagina,"",opciones);
}
</script>


<body>
    <div class="Estilo1" id="">

                
<!--         
<script>window.opener.reload();</script>
 -->    
     
<a href="javascript:print()">Imprimir</a>
<input type="reset" value="Cerrar" class="btGray" title="Cerrar" onclick="javascript:cerrarActualizar()"/>
<p>-------------------------------------------------------------------------</</p>

<form id="FrmEdit" enctype="multipart/form-data" action="" method="post">
    <input type="hidden" name="data[Id]" value="" />
<table width="80%"  border="0">
  
  <tr>
    <td><img src="/images/logo_orden.png" width="120" height="177"></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td></td>
    <td><strong>Fecha</strong>: 19/09/2014</td>
  </tr>
  <tr>
    <td><strong>Orden de compra Nro</strong>: # 2370</td>
    <td></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><strong>Proveedor</strong>: Jaime Zamler</td>
    <td></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>-------------------------------------------------------------------------</td>
  </tr>
  <tr>
    <td><strong>Orden de trabajo Nro</strong> # 3681</td>
    <td></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><strong>Nombre del insumo</strong>: Prototipo</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><strong>Cantidad</strong>: 1.00</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><strong>Importe unitario sin IVA</strong>: $ 1500.000</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><strong>Importe total sin IVA</strong>: $ 1500</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><strong>Importe total</strong>: $ 1500.00</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><strong>Cliente</strong>: Cabaña Argentina <span class="Estilo3">*uso interno</span>  </td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><strong>Plazo de entrega acordado</strong>: 5 dias desde fecha de orden de compra  </td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
</form>
<p>-------------------------------------------------------------------------</</p>
<p>Sirvase citar el Nro de orden de compra al confeccionar la factura,</p>
<p>Muchas gracias</p>

    </div> <span class="Estilo1">
        <!-- /Container -->
    
        
    </span>
</body>
</html>