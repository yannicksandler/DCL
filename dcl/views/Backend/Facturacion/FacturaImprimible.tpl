<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>	
    <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
	<title>DCL Group</title>

    <link type='text/css' href='/styles/contact.css' rel='stylesheet' media='screen' />

	<!-- 
	<script type="text/javascript" src="/scripts/jquery/jquery-1.4.2.js"></script>
 	-->

    
    <link rel="shortcut icon" href="/images/favicon.ico"/>
	
	 
	
{literal}
    <style type="text/css">
<!--
.Estilo1 {font-family: Arial, Helvetica, sans-serif; font-size:14px;}
-->
    </style>
{/literal}
</head>

<body>

    

<div id="Layer1" style="position:absolute; left:599px; top:38px; width:162px; height:37px; z-index:1; font-size: 14px; font-family: Arial, Helvetica, sans-serif;">{$Resumen.Factura.Fecha}</div>
<div id="Layer2" style="position:absolute; left:81px; top:167px; width:385px; height:31px; z-index:2; font-size: 14px; font-family: Arial, Helvetica, sans-serif;">{if $Resumen.Cliente.RazonSocial}{$Resumen.Cliente.RazonSocial}{else}{$Resumen.Cliente.Nombre}{/if}</div>
<div class="Estilo1" id="Layer3" style="position:absolute; left:79px; top:192px; width:687px; height:30px; z-index:3; font-family: Arial, Helvetica, sans-serif;">{$Resumen.Cliente.Direccion} {if $Resumen.Cliente.Localidad} - {$Resumen.Cliente.Localidad}{/if} {if $Resumen.Cliente.CodigoPostal} (C.P. {$Resumen.Cliente.CodigoPostal}){/if}</div>
<div class="Estilo1" id="Layer4" style="position:absolute; left:210px; top:211px; width:397px; height:28px; z-index:4; font-family: Arial, Helvetica, sans-serif;">{$Resumen.TipoIva.Nombre}</div>
<div class="Estilo1" id="Layer5" style="position:absolute; left:447px; top:183px; width:233px; height:31px; z-index:5; font-family: Arial, Helvetica, sans-serif;">{$Resumen.Cuit}</div>
<div class="Estilo1" id="Layer6" style="position:absolute; left:42px; top:292px; width:442px; height:297px; z-index:6; font-family: Arial, Helvetica, sans-serif;">

{if $Resumen.Ordenes|@count}  

	
		<table border="0" cellspacing="0">
		{foreach from=$Resumen.Ordenes item="ot"}
		  <tr>
		    <td width="150">{if $ot.Cantidad}{$ot.Cantidad}{/if}</td>
		    <td width="350">{$ot.Producto} (Ref. {$ot.Id})</td>
		    <td width="150">{$ot.TotalSinIva/$ot.Cantidad|string_format:"%.2f"}</td>
		  </tr>
		{/foreach}
		</table>
	
{/if}	
	{if $Resumen.Factura.Comentario}
		<p>{$Resumen.Factura.Comentario}</p>
{/if}</div>

<div class="Estilo1" id="Layer7" style="position:absolute; left:600px; top:291px; width:159px; height:297px; z-index:7; font-family: Arial, Helvetica, sans-serif;">
  <table border="0" cellspacing="0">
  {foreach from=$Resumen.Ordenes item="ot1"}
  		<tr>
		    <td width="100">{$ot1.TotalSinIva}</td>
		</tr>
  {/foreach}
  </table>
	
	{if $Resumen.Factura.ComentarioImporte}
		<p>{if $Resumen.Factura.ComentarioImporte > 0}{$Resumen.Factura.ComentarioImporte}{/if}</p>
{/if}
</div>

<div class="Estilo1" id="Layer8" style="position:absolute; left:13px; top:903px; width:178px; height:36px; z-index:8; font-family: Arial, Helvetica, sans-serif;">{if $Resumen.Subtotal}$ {$Resumen.Subtotal}{/if}</div>
<div class="Estilo1" id="Layer9" style="position:absolute; left:463px; top:901px; width:107px; height:26px; z-index:9; font-family: Arial, Helvetica, sans-serif;">{if $Resumen.TipoIva.Letra_comp == 'A'}{$Resumen.TipoIva.Discriminado} %{/if}</div>
<div class="Estilo1" id="Layer10" style="position:absolute; left:411px; top:901px; width:166px; height:29px; z-index:10; font-family: Arial, Helvetica, sans-serif;">{if $Resumen.TotalIva}$ {$Resumen.TotalIva}{/if}</div>
<div class="Estilo1" id="Layer11" style="position:absolute; left:595px; top:901px; width:168px; height:38px; z-index:11; font-family: Arial, Helvetica, sans-serif;">$ {$Resumen.Factura.Importe}</div>
<table width="759" height="950"  border="0">
  <tr>
    <td width="753" height="946" class="Estilo1"></td>
  </tr>
</table>


<div class="Estilo1" id="Layer8" style="position:absolute; left:248px; top:901px; width:178px; height:36px; z-index:8; font-family: Arial, Helvetica, sans-serif;">{if $Resumen.Subtotal}$ {$Resumen.Subtotal}{/if}</div>


</body>
</html>