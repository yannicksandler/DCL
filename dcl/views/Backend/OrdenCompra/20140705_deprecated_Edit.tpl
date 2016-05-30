<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>	
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
	<title>DCL | Administrador de contenidos</title>
{literal}
<style type="text/css">
<!--
.Estilo1 {font-family: Arial, Helvetica, sans-serif}
-->
.Estilo3 {font-size: xx-small}
    </style>
{/literal}
</head>

{literal}
<script>
function cerrarActualizar()
{
	//window.opener.reload(); 
	window.close();
}

</script>
{/literal}

<body>
    <div class="Estilo1" id="">

        {if $editErrorMessage}
            <p class="error" style="width:61%;">{$editErrorMessage}</p>
    
        {else}
        
        
<a href="javascript:print()">Imprimir</a>
<input type="reset" value="Cerrar" class="btGray" title="Cerrar" onclick="javascript:cerrarActualizar()"/>
<p>-------------------------------------------------------------------------</</p>


<form id="FrmEdit" enctype="multipart/form-data" action="" method="post">
    <input type="hidden" name="data[Id]" value="{$data.Id}" />

<table width="80%"  border="0">
  
  <tr>
    <td><img src="/images/logo_orden.png" width="120" height="177"></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td></td>
    <td><strong>Fecha</strong>: {$Insumo.OrdenDeCompra.Fecha}</td>
  </tr>
  <tr>
    <td><strong>Orden de compra Nro</strong>: # {$Insumo.OrdenDeCompra.Id}</td>
    <td></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><strong>Proveedor</strong>: {$Insumo.Proveedor.Nombre}</td>
    <td></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>-------------------------------------------------------------------------</td>
  </tr>
  <tr>
    <td><strong>Orden de trabajo Nro</strong> # {$Insumo.OrdenId}</td>
    <td></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><strong>Nombre del insumo</strong>: {$Insumo.Nombre}</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><strong>Cantidad</strong>: {$Insumo.Cantidad}</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><strong>Importe unitario sin IVA</strong>: $ {$Insumo.PrecioUnitarioSinIVA}</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><strong>Importe total sin IVA</strong>: $ {$Insumo.PrecioUnitarioSinIVA*$Insumo.Cantidad}</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><strong>Importe total</strong>: $ {$OrdenDeCompra.Importe}</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><strong>Cliente</strong>: {$Insumo.Orden.Cliente.Nombre} <span class="Estilo3">*uso interno</span>  </td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><strong>Plazo de entrega acordado</strong>: {$Insumo.PlazoDeEntrega} dias desde fecha de orden de compra  </td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
    	{if $OrdenDeCompra.OrdenDePagoOrdenDeCompra|@count}
    	<h2>Ordenes de pago asociadas</h2>
                                {foreach from=$OrdenDeCompra.OrdenDePagoOrdenDeCompra item="opoc"}
					
											<table border="0" cellpadding="0" cellspacing="0">
													<tr>    
						                                <td><p>&raquo; Orden de pago: {$opoc.OrdenDePagoId}</p>
						                                </td>            
						                            </tr>
						                    </table>
								{/foreach}
		{/if}
		{if $OrdenDeCompra.OrdenDePagoId}
    		<h2>Orden de pago asociada: # {$OrdenDeCompra.OrdenDePagoId}</h2>
		{/if}
</form>
<p>-------------------------------------------------------------------------</</p>
<p>Sirvase citar el Nro de orden de compra al confeccionar la factura,</p>
<p>Muchas gracias</p>


    </div> <span class="Estilo1">
        <!-- /Container -->
    
            {/if}
    </span>
</body>
</html>