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

	<div class="lightbox" id="FileLightbox" style="display:block;">
		<script type="text/javascript" src="/scripts/List.js"></script>

					<div class="contInputs" style="clear: left;">
						
			            <div class="buttonsCont" style="clear: left;">
							<input type="" value="Imprimir" class="btDark printOrden" title="Imprimir orden de pago" />
							
							<input type="" value="Cerrar" class="btDark cerrar" title="Cerrar" />
							
			            </div>
			            
					</div>
		{if $deleteErrorMessage}<p class="error">{$deleteErrorMessage}</p>{/if}
		
		{include file="Backend/Formulario/Header.tpl"}
		
		<h1>Orden de pago</h1>
				{if $Resumen.Comentario}
					<h2 class="big">Nota</h2>
	                <h2>{$Resumen.Comentario}</h2>
                {/if}
                    
		<div class="filtersBox filtersInfoBox">
		
                <ul>
                    <li>
                    	<p>Numero: <span>{$Resumen.OrdenDePagoId}</span></p>
                        <p>Fecha: <span>{$Resumen.Fecha}</span></p>
                        
						
                    </li>
                    <li>
						<p>Paguese a: <span>{$Resumen.Proveedor}</span></p>
                    </li>
                </ul>
            </div> <!-- /filtersBox-->
	    
	    <div class="lightobxMain">
	    
				<h1>Total abonado: $ {$Resumen.TotalPago}<br><br></h1>
				
		</div> <!-- /selectFile -->
		
				<table width="" border="0">
		  <tr>
		    <td>
<!-- liquidacion -->
{if $Resumen.Liquidaciones|@count}

<h1>Liquidacion</h1>
<p>Total liquidacion: $ {$Resumen.TotalLiquidaciones}</p>
	<div class="list">
			      
           <div class="listTop">
                <div>
                    <table border="0" cellpadding="0" cellspacing="0">
							<tr>    
                                
                                <td width="10%"><p>Factura numero</p> </td>
                                <td width="15%"><p>Importe</p> </td>
                                
                            </tr>
                    </table>
                </div>
            </div> <!-- /listadoTop -->
                        
                    <div class="listItems">
                        
                        <table border="0" cellpadding="0" cellspacing="0">
						{foreach from=$Resumen.Liquidaciones item="d"}
						    <tr {$className}>
                                <td width="10%">{$d.FacturaNumero} </td>
                                <td width="15%">$ {$d.ImporteLiquidado} </td>
                                        
						    </tr>
						{/foreach}
						
                        </table>
                        
                    </div> <!-- /listItems -->
                        
                </div> <!-- /list -->
                
                
{/if}
			{if $Resumen.OrdenesDeCompra|@count}
		    <div class="list">
			      
    	       <div class="listTop">
	                <div>
	                    <table border="0" cellpadding="0" cellspacing="0">
								<tr>    
	                                <td width="15%"><p>Ordenes de compra liquidadas con anticipo</p> </td>
	                                
	                            </tr>
	                    </table>
	                </div>
        	    </div> <!-- /listadoTop -->
    
		    
			<div class="listItems">
			{foreach from=$Resumen.OrdenesDeCompra item="oc"}
						
						<table border="0" cellpadding="0" cellspacing="0">
								<tr>
	                                <td width="15%"><p>Fecha: {$oc.Fecha} - # {$oc.Id} - {foreach from=$oc.Insumo item="i"}{$i.Nombre} - {$i.Orden.Cliente.Nombre} (REF. {$i.OrdenId}) {foreach from=$oc.OrdenDePagoOrdenDeCompra item="opoc" key=key}{if $opoc.OrdenDePagoId == $Resumen.OrdenDePagoId}- Importe abonado: $ {$opoc.ImporteAbonado}{/if}{/foreach}{/foreach}</p> </td>            
	                            </tr>
	                    </table>
			{/foreach}
			</div>
			
			</div> <!-- list  -->
		    {/if}
<!-- end liquidaciones -->
		    
		    </td>
		    <td width="30px">

		    </td>
		    <td>
<!-- pagos -->
<h1>Detalle de pago</h1>
<p>Total imputacion: $ {$Resumen.TotalPago}</p>
	<div class="list">
			      
           <div class="listTop">
                <div>
                    <table border="0" cellpadding="0" cellspacing="0">
							<tr>    
                                <td width="15%"><p>Tipo de pago</p> </td>
                                <td width="20%"><p>Detalle</p> </td>
                                <td width="15%"><p>Importe</p> </td>
                                
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
                                <td width="20%">{$pago.Detalle} Nro. {$pago.Cheque.Numero}</td>
                                <td width="15%">$ {$pago.Importe} </td>
                                
						    </tr>
						{/foreach}
						
                        </table>
                        {/if}
                    </div> <!-- /listItems -->
                        
                </div> <!-- /list -->
                                                     
			
<!-- end pagos -->     
		    		    
		    </td>
		  </tr>
		  <tr>
		    <td>
		    
		    </td>
		    <td></td>
		    <td>&nbsp;</td>
		  </tr>
		</table>
	           	     
			<h1><br></h1>
	        <p>Recibi la suma de pesos : ..............................................................................</p>
	        <p> ..............................................................................</p>
	       	<h1><br></h1>
	       	<p>Firma  ...........................</p>
	        
	    </div> <!-- /lightobxMain -->
	    
	</div> <!-- /lightbox -->
	{include file="Backend/Formulario/Footer.tpl"}			  
</body>
</html>