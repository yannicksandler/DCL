150
a:4:{s:8:"template";a:1:{s:28:"Backend/Orden/GetInsumos.tpl";b:1;}s:9:"timestamp";i:1411136966;s:7:"expires";i:1411136966;s:13:"cache_serials";a:0:{}}

<script type="text/javascript">
$(document).ready(function(){

	$('.AnularOrdenDeCompra').click(function(){
        
        var url	=   $(this).attr("href");

        AnularOrdenDeCompra(url);
        
		return false;
    });

	$('.InsumoEntregado').click(function() {
	    
	    var href 		= $(this).attr('href');
	    var insumoid 		= $(this).attr('id');
	    
	   	r	=	confirm('Esta seguro que quiere marcar el insumo como entregado? (Pasara a ser visto por Contaduria para pagar)');

		if(r && href)
		{
			var id = '#'+insumoid;
	    	$.ajax({
	    		type: "POST",
	    		url: href,
	    		dataType: "text/html",
	    		success: function(html){
	    			$(id).html(html);
	    		},
	    	 	error: function(request,error){
	    			$(id).html('<p class="error"><img src="/images/icons/error_delete.png" title="Error"/>Error al borrar la orden de compra. Intente nuevamente</p>');
	    	 	  }
	    	});
		}
		return false;
	});
	
});

function AnularOrdenDeCompra(url)
{
	r	=	confirm('Esta seguro que quiere anular la orden de compra? (impacta en costos y el insumo pasa a estar NO elegido). En caso de tener una factura de compra asociada la anulara');

	if(r && url)
	{
    	$.ajax({
    		type: "POST",
    		url: url,
    		dataType: "text/html",
    		success: function(html){
    			$('#Message').html(html);
    		},
    	 	error: function(request,error){
    			$('#Message').html('<p class="error"><img src="/images/icons/error_delete.png" title="Error"/>Error al borrar la orden de compra. Intente nuevamente</p>');
    	 	  }
    	});
	}

}

function abrirPopUp(pagina, opciones)
{
	window.open(pagina,"",opciones);
}


</script>



<!-- insumos -->

<div id="Message"></div>

<div id="insumosCargados"> <!-- insumos -->

<h1>Insumos<br></br></h1>

	<div class="list">
		<label class="blue" >Insumos varios</label>
                    <p>
												<a href="#" 
						   onclick="window.open(	'/Insumo/Edit/Orden/3698', 
													'windowname1', 
													'width=980, height=700, scrollbars = yes'); 
													return false;">
						   &raquo; Agregar insumo <img src="/images/icons/add.png" title="Agregar"/>
						</a>
						
						                    </p><br></br><br></br>
                    
           <div class="listTop">
                <div>
                    <table border="0" cellpadding="0" cellspacing="0">
							<tr>    
                                
                                <td width="10%"><p>Nombre</p> </td>
                                <td width="10%"><p>Proveedor</p> </td>
                                <!--  -->
                                <td width="10%"><p>PU s/IVA</p> </td>
                                <td width="10%"><p>Cantidad</p> </td>
                                <td width="10%"><p>Total s/IVA</p> </td>
                                <td width="10%"><p>Cond. pago</p> </td>
                                <td width="10%"><p>Elegido</p> </td>
                                <td width="10%"><p>Tiene OC</p> </td>
                                
                                <td width="20%"><p>Opciones</p></td>
                            </tr>
                    </table>
                </div>
            </div> <!-- /listadoTop -->
                        
                    <div class="listItems">
                                                <table border="0" cellpadding="0" cellspacing="0" width="100%">
												    <tr >
                                <td width="10%">impresion dipticos</td>
                                <td width="10%">Grafica DPI</td>
                                <td width="10%">1140.000 
                                
                                				                                
                                </td>
                                <td width="10%">1.00 </td>
                                <td width="10%">1140</td>
                                
                                <td width="10%">N</td>
                                <td width="10%"><span title="Insumo no elegido" class="inactive"></span></td>
                                <td width="10%">
																				NO
																		</td>
                                
                                <td width="20%">
                                    <p><!-- mando primer parametro el id de la orden en lugar del insumo id -->
                                        <br>&raquo; <a href="#" onclick="guardarObtenerInsumos( 3845 , 'del')">Borrar</a>
                                        
                                        <br>&raquo; <a href="#" 
                                            onclick="window.open(	'/Insumo/Edit/Orden/3698/id/3845', 
                                                    'windowname1', 
                                                    'width=980, height=700, scrollbars = yes'); 
                                                    return false;">
                                            Editar&nbsp;	
                                        </a>
										 
										<br>&raquo; <a href="#" onclick="generarOrdenDeCompra( 3845 )">Orden de compra</a>
																														<br><a id="3845" title="Marcar Insumo como entregado" class="InsumoEntregado" href="/Insumo/SetEntregado/id/3845"><img src="/images/icons/add.png" title="Editar"/> Entregado</a>
											
                                    </p>
                                    
                                </td>
						    </tr>
												    <tr >
                                <td width="10%">impresion dipticos</td>
                                <td width="10%">Imprenta Mendez</td>
                                <td width="10%">1460.000 
                                
                                				                                
                                </td>
                                <td width="10%">1.00 </td>
                                <td width="10%">1460</td>
                                
                                <td width="10%">N</td>
                                <td width="10%"><span title="Insumo no elegido" class="inactive"></span></td>
                                <td width="10%">
																				NO
																		</td>
                                
                                <td width="20%">
                                    <p><!-- mando primer parametro el id de la orden en lugar del insumo id -->
                                        <br>&raquo; <a href="#" onclick="guardarObtenerInsumos( 3849 , 'del')">Borrar</a>
                                        
                                        <br>&raquo; <a href="#" 
                                            onclick="window.open(	'/Insumo/Edit/Orden/3698/id/3849', 
                                                    'windowname1', 
                                                    'width=980, height=700, scrollbars = yes'); 
                                                    return false;">
                                            Editar&nbsp;	
                                        </a>
										 
										<br>&raquo; <a href="#" onclick="generarOrdenDeCompra( 3849 )">Orden de compra</a>
																														<br><a id="3849" title="Marcar Insumo como entregado" class="InsumoEntregado" href="/Insumo/SetEntregado/id/3849"><img src="/images/icons/add.png" title="Editar"/> Entregado</a>
											
                                    </p>
                                    
                                </td>
						    </tr>
												    <tr >
                                <td width="10%">impresion dipticos x 5000</td>
                                <td width="10%">Bayres al Sur</td>
                                <td width="10%">1100.000 
                                
                                				                                
                                </td>
                                <td width="10%">1.00 </td>
                                <td width="10%">1100</td>
                                
                                <td width="10%">N</td>
                                <td width="10%"><span title="Insumo no elegido" class="inactive"></span></td>
                                <td width="10%">
																				NO
																		</td>
                                
                                <td width="20%">
                                    <p><!-- mando primer parametro el id de la orden en lugar del insumo id -->
                                        <br>&raquo; <a href="#" onclick="guardarObtenerInsumos( 3850 , 'del')">Borrar</a>
                                        
                                        <br>&raquo; <a href="#" 
                                            onclick="window.open(	'/Insumo/Edit/Orden/3698/id/3850', 
                                                    'windowname1', 
                                                    'width=980, height=700, scrollbars = yes'); 
                                                    return false;">
                                            Editar&nbsp;	
                                        </a>
										 
										<br>&raquo; <a href="#" onclick="generarOrdenDeCompra( 3850 )">Orden de compra</a>
																														<br><a id="3850" title="Marcar Insumo como entregado" class="InsumoEntregado" href="/Insumo/SetEntregado/id/3850"><img src="/images/icons/add.png" title="Editar"/> Entregado</a>
											
                                    </p>
                                    
                                </td>
						    </tr>
						                        </table>
                                            </div> <!-- /listItems -->
                        
                </div> <!-- /list -->                     

<!-- end insumos -->     

<!-- fletes -->


	<div class="list">
		<label>Fletes</label>			      
		
				<p>
						<a href="#" 
						   onclick="window.open(	'/Insumo/Edit/Orden/3698/EsFlete/SI', 
													'windowname1', 
													'width=980, height=700, scrollbars = yes'); 
													return false;">
						   &raquo; Agregar flete <img src="/images/icons/add.png" title="Agregar"/>
						</a>
		</p><br></br><br></br>						
				
           <div class="listTop">
                <div>
                    <table border="0" cellpadding="0" cellspacing="0">
							<tr>    
                                <td width="10%"><p>Nombre</p> </td>
                                <td width="10%"><p>Proveedor</p> </td>
                                <!--  -->
                                <td width="10%"><p>PU s/IVA</p> </td>
                                <td width="10%"><p>Cantidad</p> </td>
                                <td width="10%"><p>Total s/IVA</p> </td>
                                <td width="10%"><p>Cond. pago</p> </td>
                                <td width="10%"><p>Elegido</p> </td>
                                <td width="10%"><p>Tiene OC</p> </td>
                                
                                <td width="20%"><p>Opciones</p></td>
                            </tr>
                    </table>
                </div>
            </div> <!-- /listadoTop -->
                        
                    <div class="listItems">
                        <table border="0" cellpadding="0" cellspacing="0">
                                                    						           <!-- item -->
						    <tr >
                                <td width="10%">movimiento mercaderia </td>
                                <td width="10%">Siris remiseria </td>
                                <td width="10%">300.000 
                                
                                				                                
                                </td>
                                <td width="10%">1.00 </td>
                                <td width="10%">300</td>
                                
                                <td width="10%">B </td>
                                <td width="10%"><span title="Insumo elegido" class="active"></span> </td>
                                                                <td width="10%">
																				NO
																		</td>
                                
                                <td width="20%">
                                    <p><!-- mando primer parametro el id de la orden en lugar del insumo id -->
                                        <br>&raquo; <a href="#" onclick="guardarObtenerInsumos( 3846 , 'del')">Borrar</a>
                                         
                                        <br>&raquo; <a href="#" 
                                            onclick="window.open(	'/Insumo/Edit/Orden/3698/id/3846', 
                                                    'windowname1', 
                                                    'width=980, height=700, scrollbars = yes'); 
                                                    return false;">
                                            Editar&nbsp;	
                                        </a>
										 
										<br>&raquo; <a href="#" onclick="generarOrdenDeCompra( 3846 )">Orden de compra</a>
																														<br><a id="3846" title="Marcar Insumo como entregado" class="InsumoEntregado" href="/Insumo/SetEntregado/id/3846"><img src="/images/icons/add.png" title="Editar"/> Entregado</a>
										                                    </p>
                                </td>
						    </tr>
				                    <!-- /item -->
						                                                    </table>
                    </div> <!-- /listItems -->
                        
                </div> <!-- /list -->                     

<!-- end fletes -->

<!-- mano de obra -->


	<div class="list">
		<label>Mano de obra</label>			      
		
				<p>
						<a href="#" 
						   onclick="window.open(	'/Insumo/Edit/Orden/3698/EsManoDeObra/SI', 
													'windowname1', 
													'width=980, height=700, scrollbars = yes'); 
													return false;">
						   &raquo; Agregar mano de obra	<img src="/images/icons/add.png" title="Agregar"/>
						</a>
		</p><br></br><br></br>						
				
           <div class="listTop">
                <div>
                    <table border="0" cellpadding="0" cellspacing="0">
							<tr>    
                                <td width="10%"><p>Nombre</p> </td>
                                <td width="10%"><p>Proveedor</p> </td>
                                <td width="10%"><p>PU s/IVA</p> </td>
                                <td width="10%"><p>Cantidad</p> </td>
                                <td width="10%"><p>Total s/IVA</p> </td>
                                <td width="10%"><p>Cond. pago</p> </td>
                                <td width="10%"><p>Elegido</p> </td>
                                <td width="10%"><p>Tiene OC</p> </td>
                                
                                
                                <td width="20%"><p>Opciones</p></td>
                            </tr>
                    </table>
                </div>
            </div> <!-- /listadoTop -->
                        
                    <div class="listItems">
                        <table border="0" cellpadding="0" cellspacing="0">
                                                    <tr class="noResult">
                                <td colspan="10" align="center"><h2 class="noResult">No se ha encontrado mano de obra.</h2></td>
                            </tr>
                                                </table>
                    </div> <!-- /listItems -->
                        
                </div> <!-- /list -->                     

<!-- end mano de obra -->

<!-- comercializacion -->

	<div class="list">
		<label>Comercializacion</label>			      
		
				<p>
						<a href="#" 
						   onclick="window.open(	'/Insumo/Edit/Orden/3698/EsComercializacion/SI', 
													'windowname1', 
													'width=980, height=700, scrollbars = yes'); 
													return false;">
						   &raquo; Agregar comercializacion <img src="/images/icons/add.png" title="Agregar"/>
						</a>
		</p><br></br><br></br>						
				
           <div class="listTop">
                <div>
                    <table border="0" cellpadding="0" cellspacing="0">
							<tr>    
                                <td width="10%"><p>Nombre</p> </td>
                                <td width="10%"><p>Proveedor</p> </td>
                                <td width="10%"><p>PU s/IVA</p> </td>
                                <td width="10%"><p>Cantidad</p> </td>
                                
                                <td width="10%"><p>Total s/IVA</p> </td>
                                
                                <td width="10%"><p>Cond. pago</p> </td>
                                <td width="10%"><p>Elegido</p> </td>
                                <td width="10%"><p>Tiene OC</p> </td>
                                
                                <td width="20%"><p>Opciones</p></td>
                            </tr>
                    </table>
                </div>
            </div> <!-- /listadoTop -->
                        
                    <div class="listItems">
                        <table border="0" cellpadding="0" cellspacing="0">
                                                    <tr class="noResult">
                                <td colspan="10" align="center"><h2 class="noResult">No se han encontrado comercializaciones</h2></td>
                            </tr>
                                                </table>
                    </div> <!-- /listItems -->
                        
                </div> <!-- /list -->                     
<!-- end comercializacion -->
</div><!-- insumos -->

<div id="CostosInsumos">
<!-- impuestos -->                        
                        
              			<h1><br></br></h1>
                        <h1>Impuestos</h1>
       				<div class="contentTitles">
	                    <label id="" title="El 3% del precio de venta sin IVA" class="blue">Ingresos brutos (3%): $ 0.00</label>
	                    
	                    <label id="" title="El 1,2% del precio de venta con IVA" class="blue">Impuestos bancarios (1,2%): $ 0.00</label>
	                    	                    
	                </div> <!-- /contentTitles -->

						
<!-- end impuestos -->				

<!-- costos -->     
                   
                        <h1><br></br></h1>
                        <!-- total de insumo elegidos -->
                        <h1>Costos</h1>
                    <div class="contentTitles">    
                        <label>Costo de insumos varios: $ 0.00</label>
                        <label>Costo de flete: $ 300.00</label>
                        <label>Costo de mano de obra: $ 0.00</label>
                        <label>Costo de comercializacion: $ 0.00</label>
                        
                        
							<ul class="statsList">
		                        <li>
		                            <p class="big">$ 300.00</p>
		                            <p title="Costos de insumos elegidos + impuestos">Costo total sin IVA</p>
		                        </li>
		                        <li>
		                            <p class="big">$ 363.00</p>
		                            <p title="Costos de insumos elegidos varios + costo flete + costo comercializacion + 21% + costo mano de obra + impuestos">Costo total con IVA</p>
		                        </li>
	                    	</ul> <!-- /statsList -->
					</div> <!-- /contentTitles -->
</div>											
<!-- end costos -->				
						