<?php /* Smarty version 2.6.26, created on 2014-08-12 09:29:10
         compiled from Backend/OrdenCompra/Edit.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'count', 'Backend/OrdenCompra/Edit.tpl', 110, false),)), $this); ?>
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

</head>

<?php echo '
<script>
function cerrarActualizar()
{
	//window.opener.reload(); 
	window.close();
}

</script>
'; ?>


<body>
    <div class="Estilo1" id="">

        <?php if ($this->_tpl_vars['editErrorMessage']): ?>
            <p class="error" style="width:61%;"><?php echo $this->_tpl_vars['editErrorMessage']; ?>
</p>
    
        <?php else: ?>
        
        
<a href="javascript:print()">Imprimir</a>
<input type="reset" value="Cerrar" class="btGray" title="Cerrar" onclick="javascript:cerrarActualizar()"/>
<p>-------------------------------------------------------------------------</</p>


<form id="FrmEdit" enctype="multipart/form-data" action="" method="post">
    <input type="hidden" name="data[Id]" value="<?php echo $this->_tpl_vars['data']['Id']; ?>
" />

<table width="80%"  border="0">
  
  <tr>
    <td><img src="/images/logo_orden.png" width="120" height="177"></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td></td>
    <td><strong>Fecha</strong>: <?php echo $this->_tpl_vars['OrdenDeCompra']['Fecha']; ?>
</td>
  </tr>
  <tr>
    <td><strong>Orden de compra Nro</strong>: # <?php echo $this->_tpl_vars['OrdenDeCompra']['Id']; ?>
</td>
    <td></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><strong>Proveedor</strong>: <?php echo $this->_tpl_vars['OrdenDeCompra']['NombreProveedor']; ?>
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
    	<?php if (count($this->_tpl_vars['OrdenDeCompra']['OrdenDePagoOrdenDeCompra'])): ?>
    	<h2>Ordenes de pago asociadas</h2>
                                <?php $_from = $this->_tpl_vars['OrdenDeCompra']['OrdenDePagoOrdenDeCompra']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['opoc']):
?>
					
											<table border="0" cellpadding="0" cellspacing="0">
													<tr>    
						                                <td><p>&raquo; Orden de pago: <?php echo $this->_tpl_vars['opoc']['OrdenDePagoId']; ?>
</p>
						                                </td>            
						                            </tr>
						                    </table>
								<?php endforeach; endif; unset($_from); ?>
		<?php endif; ?>
		<?php if ($this->_tpl_vars['OrdenDeCompra']['OrdenDePagoId']): ?>
    		<h2>Orden de pago asociada: # <?php echo $this->_tpl_vars['OrdenDeCompra']['OrdenDePagoId']; ?>
</h2>
		<?php endif; ?>
</form>
<p>-------------------------------------------------------------------------</</p>
<p>Sirvase citar el Nro de orden de compra al confeccionar la factura,</p>
<p>Muchas gracias</p>


    </div> <span class="Estilo1">
        <!-- /Container -->
    
            <?php endif; ?>
    </span>
</body>
</html>