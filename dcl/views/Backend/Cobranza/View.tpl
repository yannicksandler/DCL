{include file="Backend/Layouts/Include/Header.tpl"}

{literal}

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
{/literal}

<body class="popupLayout">

<div id="Layer1" style="position:absolute; left:20px; top:38px; width:162px; height:37px; z-index:1; font-size: 14px; font-family: Arial, Helvetica, sans-serif;">{$Resumen.Fecha}</div>

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
    <td><p>{$Resumen.Fecha}</p></td>
  </tr>
</table>


<table border="0" cellspacing="0" height="150">
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>
		            
		
	    <p>Cobranza #{$Resumen.Numero}</p>
	    <br></br>
	    <p>---------------------------------------------------------</p>
	    <br></br>
	    
	    <div class="lightobxMain">
	    
				<h2>Recibi de {$Resumen.Cliente.RazonSocial}, <br></br>domicilio {$Resumen.Cliente.Direccion}, {$Resumen.Cliente.Localidad}.<br></br>La suma de $ {$Resumen.TotalPago}.-<br></br></h2>
				<br></br>
				<p>------------------------------------------------------------------------</p>
				
				<div id="LBFilesContainer">
		
				
				{if $Resumen.Comentario}
					<h2>Comentario: <br>{$Resumen.Comentario|nl2br}</h2>
					<br></br>
	    			<p>---------------------------------------------------------</p>
                {/if}
        
        <h2>Numero interno: {$Resumen.CobranzaId}</h2>
        
<!-- liquidacion -->
{if $Resumen.Liquidaciones|@count}
<!-- 
{if $Resumen.TotalLiquidaciones != $Resumen.TotalPago}<p class="error">Error: el total de la liquidacion es distinto al del pago. Edite la orden de pago nuevamente <img src="/images/icons/error.png" /></p>{/if}
 -->
<h1>Liquidacion</h1>
<p>Total liquidacion: $ {$Resumen.TotalLiquidaciones}</p>
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
						{foreach from=$Resumen.Liquidaciones item="d"}
						    <tr {$className}>
                                <td width="20%">{$d.FacturaId} </td>
                                <td width="60%">$ {$d.Importe} </td>        
						    </tr>
						{/foreach}
						
                        </table>
                        
                    </div> <!-- /listItems -->
                        
                </div> <!-- /list -->
                
                
{/if}
<!-- end liquidaciones -->

<!-- insumos -->
<h1>Detalle de pago</h1>
<p>Total abonado: $ {$Resumen.TotalPago}</p>
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
                        {if !$Resumen.Pagos|@count}
                        	<tr class="noResult">
                                <td colspan="10" align="center"><h2 class="noResult">No se ha encontrado ning&uacute;n pago.</h2></td>
                            </tr>
                        	<script>SinPagos()</script>
                        {else}
                        <table border="0" cellpadding="0" cellspacing="0" width="100%">
						{foreach from=$Resumen.Pagos item="pago"}
						    <tr {$className}>
                                <td width="15%">{$pago.PagoTipo.Nombre} </td>
                                <td width="20%">{$pago.Detalle} </td>
                                <td width="15%">$ {$pago.Importe} </td>
                                <td width="15%">{$pago.FechaCheque} </td>
                                <td width="15%">{$pago.FechaCobro} </td>
                                
						    </tr>
						{/foreach}
						
                        </table>
                        {/if}
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