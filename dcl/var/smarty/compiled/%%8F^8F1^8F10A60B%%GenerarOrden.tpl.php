<?php /* Smarty version 2.6.26, created on 2014-09-19 10:35:52
         compiled from Backend/OrdenCompra/GenerarOrden.tpl */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>	
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
	<title>DCL | Administrador de contenidos</title>
<?php echo '
<style type="text/css">
<!--
.Estilo1 {font-family: Arial, Helvetica, sans-serif}
-->
.Estilo3 {font-size: xx-small}
    </style>
'; ?>

<script type="text/javascript" src="/scripts/jquery/jquery-1.4.2.js"></script>
</head>

<?php echo '
<script type="text/javascript">

$(document).ready(function(){

    $("#ModificarProveedor").click(function () {
		var url	=	$(this).attr(\'href\');
	    
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
	$(\'#FrmEdit\').submit();
}

function abrirPopUp(pagina, opciones)
{
	window.open(pagina,"",opciones);
}
</script>
'; ?>


<body>
    <div class="Estilo1" id="">

        <?php if ($this->_tpl_vars['editErrorMessage']): ?>
            <p class="error" style="width:61%;"><?php echo $this->_tpl_vars['editErrorMessage']; ?>
</p>
            <?php if ($this->_tpl_vars['Proveedor']): ?><a href="/Proveedor/Edit/id/<?php echo $this->_tpl_vars['Proveedor']['Id']; ?>
/popup/true" id="ModificarProveedor">Agregar tipo de iva al proveedor</a><?php endif; ?>
    	<?php endif; ?>
        
<!--         
<script>window.opener.reload();</script>
 -->    
 <?php if (! $this->_tpl_vars['editErrorMessage']): ?>    
<a href="javascript:print()">Imprimir</a>
<input type="reset" value="Cerrar" class="btGray" title="Cerrar" onclick="javascript:cerrarActualizar()"/>
<p>-------------------------------------------------------------------------</</p>
<?php endif; ?>

<form id="FrmEdit" enctype="multipart/form-data" action="" method="post">
    <input type="hidden" name="data[Id]" value="<?php echo $this->_tpl_vars['data']['Id']; ?>
" />
<?php if (! $this->_tpl_vars['editErrorMessage']): ?>
<table width="80%"  border="0">
  
  <tr>
    <td><img src="/images/logo_orden.png" width="120" height="177"></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td></td>
    <td><strong>Fecha</strong>: <?php echo $this->_tpl_vars['Insumo']['OrdenDeCompra']['Fecha']; ?>
</td>
  </tr>
  <tr>
    <td><strong>Orden de compra Nro</strong>: # <?php echo $this->_tpl_vars['Insumo']['OrdenDeCompra']['Id']; ?>
</td>
    <td></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><strong>Proveedor</strong>: <?php echo $this->_tpl_vars['Insumo']['Proveedor']['Nombre']; ?>
</td>
    <td></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>-------------------------------------------------------------------------</td>
  </tr>
  <tr>
    <td><strong>Orden de trabajo Nro</strong> # <?php echo $this->_tpl_vars['Insumo']['OrdenId']; ?>
</td>
    <td></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><strong>Nombre del insumo</strong>: <?php echo $this->_tpl_vars['Insumo']['Nombre']; ?>
</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><strong>Cantidad</strong>: <?php echo $this->_tpl_vars['Insumo']['Cantidad']; ?>
</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><strong>Importe unitario sin IVA</strong>: $ <?php echo $this->_tpl_vars['Insumo']['PrecioUnitarioSinIVA']; ?>
</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><strong>Importe total sin IVA</strong>: $ <?php echo $this->_tpl_vars['Insumo']['PrecioUnitarioSinIVA']*$this->_tpl_vars['Insumo']['Cantidad']; ?>
</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><strong>Importe total</strong>: $ <?php echo $this->_tpl_vars['OrdenDeCompra']['Importe']; ?>
</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><strong>Cliente</strong>: <?php echo $this->_tpl_vars['Insumo']['Orden']['Cliente']['Nombre']; ?>
 <span class="Estilo3">*uso interno</span>  </td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><strong>Plazo de entrega acordado</strong>: <?php echo $this->_tpl_vars['Insumo']['PlazoDeEntrega']; ?>
 dias desde fecha de orden de compra  </td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
<?php endif; ?>
</form>
<?php if (! $this->_tpl_vars['editErrorMessage']): ?>
<p>-------------------------------------------------------------------------</</p>
<p>Sirvase citar el Nro de orden de compra al confeccionar la factura,</p>
<p>Muchas gracias</p>

<?php endif; ?>
    </div> <span class="Estilo1">
        <!-- /Container -->
    
        
    </span>
</body>
</html>