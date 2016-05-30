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
		
		<h1>Nota de credito</h1>
                    
		<div class="filtersBox filtersInfoBox">
		
                <ul>
                    <li>
                    	<p>Numero: <span>{$NotaCredito.Numero}</span></p>
                        <p>Fecha: <span>{$NotaCredito.Fecha}</span></p>
                        
						
                    </li>
                    <li>
						<p>Cliente: <span>{$NotaCredito.Cliente.RazonSocial}</span></p>
                    </li>
                </ul>
            </div> <!-- /filtersBox-->
	    
	    <div class="lightobxMain">
	    		<h2>{$NotaCredito.Descripcion}</h2>
				<h1><br><br>Total: $ {$NotaCredito.Importe}</h1>
				
		</div> <!-- /selectFile -->
		
	     
			<h1><br></h1>
	       	<h1><br></h1>
	       	<p>Firma  ...........................</p>
	        
	    </div> <!-- /lightobxMain -->
	    
	</div> <!-- /lightbox -->
	{include file="Backend/Formulario/Footer.tpl"}			  
</body>
</html>