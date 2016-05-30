{include file="Backend/Layouts/Include/Header.tpl"}

{literal}

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

	$(this).attr("title", "{/literal}{$Resumen.Cliente.Nombre}-{$Resumen.Orden.Id}-{$Resumen.Orden.Producto}{literal}");
	
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
{/literal}

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
			    {if $Resumen.Orden.PrioridadId==4}
			    	{include file="Backend/Formulario/HeaderSimpleBox.tpl"}
			    {else}
			    	{include file="Backend/Formulario/Header.tpl"}
			    {/if}
			    	
			    </td>
			  </tr>
			  <tr>
			    <td>
			    
			    <table width="100%"  border="0" cellspacing="0">
				  <tr height="20">
				    <td><h2 class="Estilo4">Sres. {$Resumen.Cliente.Nombre|escape:'htmlall'}</h2></td>
				    <td>			    <h2 align="right" class="Estilo4">Fecha: {$Resumen.Presupuesto.Fecha}</h2></td>
				  </tr>
				  <tr height="30">
				    <td><h2 class="Estilo4">At, {$Resumen.Presupuesto.Destinatario|escape:'htmlall'}</h2></td>
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
    	<span class="Estilo4">Presupuesto {$Resumen.Orden.Producto|escape:'htmlall'} </span>
    </td>
    <td>
    	<div align="right" class="Estilo4">REF: {$Resumen.Orden.Id} </div>
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
  {if $Resumen.Presupuesto.Cantidad1}
  <tr>
    <td><H2>{$Resumen.Presupuesto.Cantidad1}</H2></td>
    <td><H2>{$Resumen.Presupuesto.Detalle1}</H2></td>
    <td><H2>$ {$Resumen.Presupuesto.Importe1}</H2></td>
  </tr>
  {/if}
  {if $Resumen.Presupuesto.Cantidad2}
  <tr>
    <td><H2>{$Resumen.Presupuesto.Cantidad2}</H2></td>
    <td><H2>{$Resumen.Presupuesto.Detalle2}</H2></td>
    <td><H2>$ {$Resumen.Presupuesto.Importe2}</H2></td>
  </tr>
  {/if}
  {if $Resumen.Presupuesto.Cantidad3}
  <tr>
    <td><H2>{$Resumen.Presupuesto.Cantidad3}</H2></td>
    <td><H2>{$Resumen.Presupuesto.Detalle3}</H2></td>
    <td><H2>$ {$Resumen.Presupuesto.Importe3}</H2></td>
  </tr>
  {/if}
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
                    <h2>{$Resumen.Orden.DescripcionDeTrabajo|nl2br}</h2>
                </div> <!-- /contentTitles -->
			    
			    </td>
			  </tr>
			  <tr>
			    <td>
			    <table width="100%"  border="0" cellspacing="0">
  <tr>
  
    <td height="50">
    	<h2 class="Estilo4">&raquo; Plazo de entrega</h2>
    	{if $Resumen.Presupuesto.PlazoDeEntrega}
    	<h2>{$Resumen.Presupuesto.PlazoDeEntrega} dias habiles.</h2>
    	<h2>Este plazo es considerado a partir de la fecha de aprobacion de pre-produccion (*)</h2>
    	<h2>Pre-produccion: aprobacion de prototipo, de dise&ntilde;o y prueba digital (si aplica).</h2>
    	{else}
    	<h2>a convenir</h2>
    	{/if}
    </td>
    
  </tr>
  <tr>
  	{if $Resumen.Presupuesto.LugarDeEntrega}
    <td height="50">
    	<h2 class="Estilo4">&raquo; Lugar de entrega</h2>
    	<h2>{$Resumen.Presupuesto.LugarDeEntrega}</h2>
    </td>
    {/if}
  </tr>
  <tr>
  {if $Resumen.Presupuesto.FormasDePago}
    <td height="50">
    	<h2 class="Estilo4">&raquo; Formas de pago</h2>
    	<h2>{$Resumen.Presupuesto.FormasDePago}</h2>
    </td>
    {/if}
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
    	{if $Resumen.Presupuesto.Comentario}
    	<h2 class="Estilo4">Observaciones</h2>
    	<h2>{$Resumen.Presupuesto.Comentario}</h2>
    	
    	{/if}
    </td>
  </tr>
  <tr>
    <td height="100">
    	<h2 class="Estilo3">Sin otro particular, les agradecemos el haber solicitado el presente presupuesto y los saludamos atentamente.</h2>
    	<!-- si la OT tiene rioridad SimpleBox, se muestra otro header con distinto logo -->
			    {if $Resumen.Orden.PrioridadId==4}
			    	<h2 class="Estilo3">Dpto. Comercial Simple Box</h2>
			    {else}
			    	<h2 class="Estilo3">Dpto. Comercial DCL Group</h2>
			    {/if}
    	
    	
    	
    </td>
  </tr>
</table>
<!-- si la OT tiene rioridad SimpleBox, se muestra otro header con distinto logo -->
				{if $Resumen.Orden.PrioridadId==4}
			    	{include file="Backend/Formulario/FooterSimpleBox.tpl"}	
			    {else}
			    	{include file="Backend/Formulario/Footer.tpl"}	
			    {/if}
		    
			    </td>
			  </tr>
			</table>

	   	        
	</div> <!-- end filelightbox --> 

	    

</body>
</html>