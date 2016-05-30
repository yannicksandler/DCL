171
a:4:{s:8:"template";a:1:{s:49:"Backend/GestionAdministrativa/PagosPendientes.tpl";b:1;}s:9:"timestamp";i:1411136585;s:7:"expires";i:1411136585;s:13:"cache_serials";a:0:{}}<!-- date picker -->
<link type="text/css" href="/styles/ui-lightness/jquery-ui-1.8.2.custom.css" rel="stylesheet" />
<script type="text/javascript" src="/scripts/jquery/jquery.ui.datepicker.js"></script>
<script type="text/javascript" src="/scripts/jquery/jquery.ui.core.js"></script>
<script type="text/javascript" src="/scripts/jquery/jquery.ui.widget.js"></script>



<script type="text/javascript">
$(document).ready(function(){
    $("#FormObservacion").validate();

    $('.FechaVencimiento').datepicker({
		changeMonth: true,
		changeYear: true,
        dateFormat: 'dd/mm/yy'
	});

	

    // Write on keyup event of keyword input element
	$("#kwd_search").keyup(function(){
		// When value of the input is not blank
        var term=$(this).val()
		if( term != "")
		{
			// Show only matching TR, hide rest of them
			$("#my-table tbody>tr").hide();
            $("#my-table td").filter(function(){
                   return $(this).text().toLowerCase().indexOf(term ) >-1
            }).parent("tr").show();
		}
		else
		{
			// When there is no input or clean again, show everything back
			$("#my-table tbody>tr").show();
		}
	});

    // Write on keyup event of keyword input element
	$("#kwd_search_oc").keyup(function(){
		// When value of the input is not blank
        var term=$(this).val()
		if( term != "")
		{
			// Show only matching TR, hide rest of them
			$("#my-table2 tbody>tr").hide();
            $("#my-table2 td").filter(function(){
                   return $(this).text().toLowerCase().indexOf(term ) >-1
            }).parent("tr").show();
		}
		else
		{
			// When there is no input or clean again, show everything back
			$("#my-table2 tbody>tr").show();
		}
	});
    
	
	$('#FormObservacion').submit(function() {
        var observacion	=	$('#observacion').val();
		
		if (!observacion)
		{
			$('#error').html('<p class="error" style="width:61%;">Debe ingresar un comentario</p>');
			return false;
		}

		var examenId			=	$('#ExamenId').val();
		
		$.ajax({
			type: "POST",
			url: '/Examen/Observaciones/ExamenId/' + examenId,
			dataType: "text/html",
			data: {
				'Observacion': escape(observacion),
				'Accion': 'add'
			},
			success: function(html){
				$("#ExamenHomeContent").html(html);
				
			}

		});
		
		return false;
  	});

	$('.UpdateFechaVencimiento').change(function() {
        var fecha	=	$(this).val();
        var facturaId			=	$(this).attr('facturaid');
        //alert(aptitud);
		
		if (!fecha)
		{
			alert('Debe ingresar una fecha de vencimiento');
			return false;
		}

		if (!facturaId)
		{
			alert('Debe ingresar una factura de compra');
			return false;
		}

		$.ajax({
			type: "POST",
			url: '/FacturaCompra/UpdateFacturaCompra',
			dataType: "text/html",
			data: {
				'NumeroInterno': facturaId,
				'FechaVencimiento': fecha
			},
			success: function(html){
				alert(html);
			}

		});
		
		//return false;
  	});

	$('.DeberaConcurrir').click(function() {
        var DeberaConcurrir	=	$(this).val();
        
		if (!DeberaConcurrir)
		{
			$('#error').html('<p class="error" style="width:61%;">Error al obtener la concurrencia</p>');
			return false;
		}

		var examenId			=	$('#ExamenId').val();
		
		$.ajax({
			type: "POST",
			url: '/Examen/SetDeberaConcurrir/ExamenId/' + examenId,
			dataType: "text/html",
			data: {
				'DeberaConcurrir': DeberaConcurrir
			},
			success: function(html){
				$("#error").html(html);
				// set aptitud ajax
				//window.location.reload();
			}

		});
		
		//return false;
  	});

	$('.EliminarObservacion').click(function() {
        var observacionId	=	$(this).attr('id');

		var r	=	confirm('Esta seguro que desea eliminar la observacion?');

		if(r)
		{
			if (!observacionId)
			{
				$('#error').html('<p class="error" style="width:61%;">No es posible eliminar la observacion</p>');
				return false;
			}
	
			var examenId			=	$('#ExamenId').val();
			
			$.ajax({
				type: "POST",
				url: '/Examen/Observaciones/ExamenId/' + examenId,
				dataType: "text/html",
				data: {
					'ObservacionId': observacionId,
					'Accion': 'delete'
				},
				success: function(html){
					$("#ExamenHomeContent").html(html);
					// set aptitud ajax
					//window.location.reload();
				}
	
			});
		}
		
		//return false;
  	}); 
  	 
	
});

</script>


            <h1>Facturas de compra pendientes de pago (32)</h1>
            
            	<div class="list">
            	
            	<label for="kwd_search">Buscar:</label> <input type="text" id="kwd_search" value=""/>

        		<div class="listTop">
					<div>
						<table border="0" cellpadding="0" cellspacing="0">
							<tr>
								<td width="10%"><p>Fecha</p></td>
								<td width="10%"><p title="Proveedor">Proveedor</p></td>
								<td width="10%"><p title="Numero">FC</p></td>
								<td width="10%"><p title="Importe">Importe</p></td>
								<td width="10%"><p title="Importe pendiente de pago. La factura puede tener liquidaciones parciales o anticipos">Pendiente</p></td>
								<td width="10%"><p>Vencimiento</p></td>
								<td width="10%"><p title="Condicion de cobro">Condicion</p></td> 
								<td width="10%"><p>Acciones</p></td>
							</tr>
						</table>
					</div>
                </div> <!-- /listadoTop -->
            
				<div class="listItems listItemsScroll">
                        
				<table id="my-table" style="border-collapse:collapse" border="0" cellpadding="0" cellspacing="0">
				
										<!-- items -->
					
											<tr>
							<td width="10%">
								<p class="">
										05/09/2014 
								</p>
							</td>
							<td width="10%">
								<p class="">
										MATIAS TOKAR - PROGRAMADOR
								</p>
							</td>
							<td width="10%">
								<p class="">
								
										# 23123123123
										<img src="/images/icons/zoom_in.png" title="Sin ordenes de compra"/>
										
										(INT# 1373 - N)<br>
								</p>
							</td>
							
							<td width="10%">
								
								<p class="">
										$ 1088.11								</p>
							</td>
							
							<td width="10%">
								<p class="">
										$ 1088.11
								</p>
							</td>
							<td width="10%">
								<p class="">
																			<input class="UpdateFechaVencimiento FechaVencimiento" type="text" name="" facturaid="1373" value="30/09/2014 "/>
																	</p>
							</td>
							<td width="10%">
								<p class="">
										Sin ordenes de compra
								</p>
							</td>
							<td width="10%" align="center">
								    
								    <a class="AgregarFacturaDeCompra" id="23123123123"
								    	href="/OrdenPago/Edit/ProveedorId/136"
								    ><img src="/images/icons/money_add.png" title="Pagar"/> Pagar </a>
								                        
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										17/09/2014 
								</p>
							</td>
							<td width="10%">
								<p class="">
										Sindicato Unico de la Publicidad
								</p>
							</td>
							<td width="10%">
								<p class="">
								
										# 30092014
										<img src="/images/icons/zoom_in.png" title="Sin ordenes de compra"/>
										
										(INT# 1397 - B)<br>
								</p>
							</td>
							
							<td width="10%">
								
								<p class="">
										$ 1039.59								</p>
							</td>
							
							<td width="10%">
								<p class="">
										$ 1039.59
								</p>
							</td>
							<td width="10%">
								<p class="">
																			30/09/2014 
																	</p>
							</td>
							<td width="10%">
								<p class="">
										Sin ordenes de compra
								</p>
							</td>
							<td width="10%" align="center">
								    
								    <a class="AgregarFacturaDeCompra" id="30092014"
								    	href="/OrdenPago/Edit/ProveedorId/216"
								    ><img src="/images/icons/money_add.png" title="Pagar"/> Pagar </a>
								                        
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										01/09/2014 
								</p>
							</td>
							<td width="10%">
								<p class="">
										ALEJANDRA ZANGARO COCHERA FRIAS
								</p>
							</td>
							<td width="10%">
								<p class="">
								
										# 3214798546
										<img src="/images/icons/zoom_in.png" title="Sin ordenes de compra"/>
										
										(INT# 1353 - N)<br>
								</p>
							</td>
							
							<td width="10%">
								
								<p class="">
										$ 900.00								</p>
							</td>
							
							<td width="10%">
								<p class="">
										$ 900.00
								</p>
							</td>
							<td width="10%">
								<p class="">
																			<input class="UpdateFechaVencimiento FechaVencimiento" type="text" name="" facturaid="1353" value="26/09/2014 "/>
																	</p>
							</td>
							<td width="10%">
								<p class="">
										Sin ordenes de compra
								</p>
							</td>
							<td width="10%" align="center">
								    
								    <a class="AgregarFacturaDeCompra" id="3214798546"
								    	href="/OrdenPago/Edit/ProveedorId/142"
								    ><img src="/images/icons/money_add.png" title="Pagar"/> Pagar </a>
								                        
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										01/09/2014 
								</p>
							</td>
							<td width="10%">
								<p class="">
										MORATORIA
								</p>
							</td>
							<td width="10%">
								<p class="">
								
										# 13245698712
										<img src="/images/icons/zoom_in.png" title="Sin ordenes de compra"/>
										
										(INT# 1355 - A)<br>
								</p>
							</td>
							
							<td width="10%">
								
								<p class="">
										$ 490.00								</p>
							</td>
							
							<td width="10%">
								<p class="">
										$ 490.00
								</p>
							</td>
							<td width="10%">
								<p class="">
																			25/09/2014 
																	</p>
							</td>
							<td width="10%">
								<p class="">
										Sin ordenes de compra
								</p>
							</td>
							<td width="10%" align="center">
								    
								    <a class="AgregarFacturaDeCompra" id="13245698712"
								    	href="/OrdenPago/Edit/ProveedorId/130"
								    ><img src="/images/icons/money_add.png" title="Pagar"/> Pagar </a>
								                        
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										11/09/2014 
								</p>
							</td>
							<td width="10%">
								<p class="">
										Siris remiseria
								</p>
							</td>
							<td width="10%">
								<p class="">
								
										# 00014537
										<img src="/images/icons/zoom_in.png" title="#2361 (2014-09-11) cta corriente<>#2362 (2014-09-11) cta corriente<>#2363 (2014-09-11) cta corriente<>#2365 (No entregado) cta corriente<>#2366 (2014-09-12) cta corriente<>#2367 (2014-09-12) cta corriente<>"/>
										<br>(OT 3649)<br>
										(INT# 1395 - C)<br>
								</p>
							</td>
							
							<td width="10%">
								
								<p class="">
										$ 565.00								</p>
							</td>
							
							<td width="10%">
								<p class="">
										$ 565.00
								</p>
							</td>
							<td width="10%">
								<p class="">
																			19/09/2014 
																	</p>
							</td>
							<td width="10%">
								<p class="">
										#2361 (2014-09-11) cta corriente<>#2362 (2014-09-11) cta corriente<>#2363 (2014-09-11) cta corriente<>#2365 (No entregado) cta corriente<>#2366 (2014-09-12) cta corriente<>#2367 (2014-09-12) cta corriente<>
								</p>
							</td>
							<td width="10%" align="center">
								    
								    <a class="AgregarFacturaDeCompra" id="00014537"
								    	href="/OrdenPago/Edit/ProveedorId/230"
								    ><img src="/images/icons/money_add.png" title="Pagar"/> Pagar </a>
								                        
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										18/09/2014 
								</p>
							</td>
							<td width="10%">
								<p class="">
										Fernanda de la Vega
								</p>
							</td>
							<td width="10%">
								<p class="">
								
										# 34234234234
										<img src="/images/icons/zoom_in.png" title="Sin ordenes de compra"/>
										
										(INT# 1399 - N)<br>
								</p>
							</td>
							
							<td width="10%">
								
								<p class="">
										$ 180.00								</p>
							</td>
							
							<td width="10%">
								<p class="">
										$ 10.00
								</p>
							</td>
							<td width="10%">
								<p class="">
																			<input class="UpdateFechaVencimiento FechaVencimiento" type="text" name="" facturaid="1399" value="18/09/2014 "/>
																	</p>
							</td>
							<td width="10%">
								<p class="">
										Sin ordenes de compra
								</p>
							</td>
							<td width="10%" align="center">
								    
								    <a class="AgregarFacturaDeCompra" id="34234234234"
								    	href="/OrdenPago/Edit/ProveedorId/211"
								    ><img src="/images/icons/money_add.png" title="Pagar"/> Pagar </a>
								                        
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										01/09/2014 
								</p>
							</td>
							<td width="10%">
								<p class="">
										Daniel Seguro Auto
								</p>
							</td>
							<td width="10%">
								<p class="">
								
										# 12458516213
										<img src="/images/icons/zoom_in.png" title="Sin ordenes de compra"/>
										
										(INT# 1356 - N)<br>
								</p>
							</td>
							
							<td width="10%">
								
								<p class="">
										$ 1120.00								</p>
							</td>
							
							<td width="10%">
								<p class="">
										$ 1120.00
								</p>
							</td>
							<td width="10%">
								<p class="">
																			<input class="UpdateFechaVencimiento FechaVencimiento" type="text" name="" facturaid="1356" value="15/09/2014 "/>
																	</p>
							</td>
							<td width="10%">
								<p class="">
										Sin ordenes de compra
								</p>
							</td>
							<td width="10%" align="center">
								    
								    <a class="AgregarFacturaDeCompra" id="12458516213"
								    	href="/OrdenPago/Edit/ProveedorId/219"
								    ><img src="/images/icons/money_add.png" title="Pagar"/> Pagar </a>
								                        
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										18/08/2014 
								</p>
							</td>
							<td width="10%">
								<p class="">
										Red de servicios rurales srl
								</p>
							</td>
							<td width="10%">
								<p class="">
								
										# 002340992
										<img src="/images/icons/zoom_in.png" title="Sin ordenes de compra"/>
										
										(INT# 1332 - A)<br>
								</p>
							</td>
							
							<td width="10%">
								
								<p class="">
										$ 640.00								</p>
							</td>
							
							<td width="10%">
								<p class="">
										$ 640.00
								</p>
							</td>
							<td width="10%">
								<p class="">
																			31/08/2014 
																	</p>
							</td>
							<td width="10%">
								<p class="">
										Sin ordenes de compra
								</p>
							</td>
							<td width="10%" align="center">
								    
								    <a class="AgregarFacturaDeCompra" id="002340992"
								    	href="/OrdenPago/Edit/ProveedorId/314"
								    ><img src="/images/icons/money_add.png" title="Pagar"/> Pagar </a>
								                        
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										02/08/2014 
								</p>
							</td>
							<td width="10%">
								<p class="">
										Movistar
								</p>
							</td>
							<td width="10%">
								<p class="">
								
										# 209302684071
										<img src="/images/icons/zoom_in.png" title="Sin ordenes de compra"/>
										
										(INT# 1346 - A)<br>
								</p>
							</td>
							
							<td width="10%">
								
								<p class="">
										$ 883.72								</p>
							</td>
							
							<td width="10%">
								<p class="">
										$ 108.72
								</p>
							</td>
							<td width="10%">
								<p class="">
																			25/08/2014 
																	</p>
							</td>
							<td width="10%">
								<p class="">
										Sin ordenes de compra
								</p>
							</td>
							<td width="10%" align="center">
								    
								    <a class="AgregarFacturaDeCompra" id="209302684071"
								    	href="/OrdenPago/Edit/ProveedorId/221"
								    ><img src="/images/icons/money_add.png" title="Pagar"/> Pagar </a>
								                        
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										01/08/2014 
								</p>
							</td>
							<td width="10%">
								<p class="">
										AFIP Ganancias
								</p>
							</td>
							<td width="10%">
								<p class="">
								
										# 321546978465213
										<img src="/images/icons/zoom_in.png" title="Sin ordenes de compra"/>
										
										(INT# 1335 - A)<br>
								</p>
							</td>
							
							<td width="10%">
								
								<p class="">
										$ 13361.68								</p>
							</td>
							
							<td width="10%">
								<p class="">
										$ 10021.26
								</p>
							</td>
							<td width="10%">
								<p class="">
																			17/08/2014 
																	</p>
							</td>
							<td width="10%">
								<p class="">
										Sin ordenes de compra
								</p>
							</td>
							<td width="10%" align="center">
								    
								    <a class="AgregarFacturaDeCompra" id="321546978465213"
								    	href="/OrdenPago/Edit/ProveedorId/148"
								    ><img src="/images/icons/money_add.png" title="Pagar"/> Pagar </a>
								                        
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										01/08/2014 
								</p>
							</td>
							<td width="10%">
								<p class="">
										Impto Bienes personales
								</p>
							</td>
							<td width="10%">
								<p class="">
								
										# 21354687954
										<img src="/images/icons/zoom_in.png" title="Sin ordenes de compra"/>
										
										(INT# 1336 - A)<br>
								</p>
							</td>
							
							<td width="10%">
								
								<p class="">
										$ 1240.08								</p>
							</td>
							
							<td width="10%">
								<p class="">
										$ 930.06
								</p>
							</td>
							<td width="10%">
								<p class="">
																			17/08/2014 
																	</p>
							</td>
							<td width="10%">
								<p class="">
										Sin ordenes de compra
								</p>
							</td>
							<td width="10%" align="center">
								    
								    <a class="AgregarFacturaDeCompra" id="21354687954"
								    	href="/OrdenPago/Edit/ProveedorId/315"
								    ><img src="/images/icons/money_add.png" title="Pagar"/> Pagar </a>
								                        
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										01/08/2014 
								</p>
							</td>
							<td width="10%">
								<p class="">
										AFIP Ganancias
								</p>
							</td>
							<td width="10%">
								<p class="">
								
										# 958674
										<img src="/images/icons/zoom_in.png" title="Sin ordenes de compra"/>
										
										(INT# 1299 - A)<br>
								</p>
							</td>
							
							<td width="10%">
								
								<p class="">
										$ 621.17								</p>
							</td>
							
							<td width="10%">
								<p class="">
										$ 621.17
								</p>
							</td>
							<td width="10%">
								<p class="">
																			11/08/2014 
																	</p>
							</td>
							<td width="10%">
								<p class="">
										Sin ordenes de compra
								</p>
							</td>
							<td width="10%" align="center">
								    
								    <a class="AgregarFacturaDeCompra" id="958674"
								    	href="/OrdenPago/Edit/ProveedorId/148"
								    ><img src="/images/icons/money_add.png" title="Pagar"/> Pagar </a>
								                        
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										31/07/2014 
								</p>
							</td>
							<td width="10%">
								<p class="">
										Boker Arbolito
								</p>
							</td>
							<td width="10%">
								<p class="">
								
										# 00207403
										<img src="/images/icons/zoom_in.png" title="#2226 (2014-09-01) 25% anticipo y 75% contra entrega<>"/>
										<br>(OT 3651)<br>
										(INT# 1294 - A)<br>
								</p>
							</td>
							
							<td width="10%">
								
								<p class="">
										$ 180365.62								</p>
							</td>
							
							<td width="10%">
								<p class="">
										$ 2596.72
								</p>
							</td>
							<td width="10%">
								<p class="">
																			08/08/2014 
																	</p>
							</td>
							<td width="10%">
								<p class="">
										#2226 (2014-09-01) 25% anticipo y 75% contra entrega<>
								</p>
							</td>
							<td width="10%" align="center">
								    
								    <a class="AgregarFacturaDeCompra" id="00207403"
								    	href="/OrdenPago/Edit/ProveedorId/195"
								    ><img src="/images/icons/money_add.png" title="Pagar"/> Pagar </a>
								                        
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										16/07/2014 
								</p>
							</td>
							<td width="10%">
								<p class="">
										Envap
								</p>
							</td>
							<td width="10%">
								<p class="">
								
										# 000111284
										<img src="/images/icons/zoom_in.png" title="#2272 (No entregado) cheque<>"/>
										<br>(OT 3650)<br>
										(INT# 1307 - A)<br>
								</p>
							</td>
							
							<td width="10%">
								
								<p class="">
										$ 57426.60								</p>
							</td>
							
							<td width="10%">
								<p class="">
										$ 45689.60
								</p>
							</td>
							<td width="10%">
								<p class="">
																			01/08/2014 
																	</p>
							</td>
							<td width="10%">
								<p class="">
										#2272 (No entregado) cheque<>
								</p>
							</td>
							<td width="10%" align="center">
								    
								    <a class="AgregarFacturaDeCompra" id="000111284"
								    	href="/OrdenPago/Edit/ProveedorId/202"
								    ><img src="/images/icons/money_add.png" title="Pagar"/> Pagar </a>
								                        
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										01/07/2014 
								</p>
							</td>
							<td width="10%">
								<p class="">
										IVA
								</p>
							</td>
							<td width="10%">
								<p class="">
								
										# 062014
										<img src="/images/icons/zoom_in.png" title="Sin ordenes de compra"/>
										
										(INT# 1274 - A)<br>
								</p>
							</td>
							
							<td width="10%">
								
								<p class="">
										$ 13933.49								</p>
							</td>
							
							<td width="10%">
								<p class="">
										$ 46.42
								</p>
							</td>
							<td width="10%">
								<p class="">
																			22/07/2014 
																	</p>
							</td>
							<td width="10%">
								<p class="">
										Sin ordenes de compra
								</p>
							</td>
							<td width="10%" align="center">
								    
								    <a class="AgregarFacturaDeCompra" id="062014"
								    	href="/OrdenPago/Edit/ProveedorId/175"
								    ><img src="/images/icons/money_add.png" title="Pagar"/> Pagar </a>
								                        
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										16/06/2014 
								</p>
							</td>
							<td width="10%">
								<p class="">
										Vicente Alcalde
								</p>
							</td>
							<td width="10%">
								<p class="">
								
										# 00012475
										<img src="/images/icons/zoom_in.png" title="#2185 (No entregado) 30% anticipo y 70% contraentrega<>"/>
										<br>(OT 3649)<br>
										(INT# 1152 - A)<br>
								</p>
							</td>
							
							<td width="10%">
								
								<p class="">
										$ 301290.00								</p>
							</td>
							
							<td width="10%">
								<p class="">
										$ 180774.00
								</p>
							</td>
							<td width="10%">
								<p class="">
																			30/06/2014 
																	</p>
							</td>
							<td width="10%">
								<p class="">
										#2185 (No entregado) 30% anticipo y 70% contraentrega<>
								</p>
							</td>
							<td width="10%" align="center">
								    
								    <a class="AgregarFacturaDeCompra" id="00012475"
								    	href="/OrdenPago/Edit/ProveedorId/146"
								    ><img src="/images/icons/money_add.png" title="Pagar"/> Pagar </a>
								                        
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										01/06/2014 
								</p>
							</td>
							<td width="10%">
								<p class="">
										IVA
								</p>
							</td>
							<td width="10%">
								<p class="">
								
										# 23052014
										<img src="/images/icons/zoom_in.png" title="Sin ordenes de compra"/>
										
										(INT# 1159 - A)<br>
								</p>
							</td>
							
							<td width="10%">
								
								<p class="">
										$ 23210.76								</p>
							</td>
							
							<td width="10%">
								<p class="">
										$ 7582.87
								</p>
							</td>
							<td width="10%">
								<p class="">
																			16/06/2014 
																	</p>
							</td>
							<td width="10%">
								<p class="">
										Sin ordenes de compra
								</p>
							</td>
							<td width="10%" align="center">
								    
								    <a class="AgregarFacturaDeCompra" id="23052014"
								    	href="/OrdenPago/Edit/ProveedorId/175"
								    ><img src="/images/icons/money_add.png" title="Pagar"/> Pagar </a>
								                        
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										01/06/2014 
								</p>
							</td>
							<td width="10%">
								<p class="">
										IVA
								</p>
							</td>
							<td width="10%">
								<p class="">
								
										# 023052014
										<img src="/images/icons/zoom_in.png" title="Sin ordenes de compra"/>
										
										(INT# 1160 - A)<br>
								</p>
							</td>
							
							<td width="10%">
								
								<p class="">
										$ 1108.92								</p>
							</td>
							
							<td width="10%">
								<p class="">
										$ 255.06
								</p>
							</td>
							<td width="10%">
								<p class="">
																			16/06/2014 
																	</p>
							</td>
							<td width="10%">
								<p class="">
										Sin ordenes de compra
								</p>
							</td>
							<td width="10%" align="center">
								    
								    <a class="AgregarFacturaDeCompra" id="023052014"
								    	href="/OrdenPago/Edit/ProveedorId/175"
								    ><img src="/images/icons/money_add.png" title="Pagar"/> Pagar </a>
								                        
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										01/03/2014 
								</p>
							</td>
							<td width="10%">
								<p class="">
										IVA
								</p>
							</td>
							<td width="10%">
								<p class="">
								
										# 032014
										<img src="/images/icons/zoom_in.png" title="Sin ordenes de compra"/>
										
										(INT# 1056 - A)<br>
								</p>
							</td>
							
							<td width="10%">
								
								<p class="">
										$ 31100.35								</p>
							</td>
							
							<td width="10%">
								<p class="">
										$ 10925.54
								</p>
							</td>
							<td width="10%">
								<p class="">
																			16/05/2014 
																	</p>
							</td>
							<td width="10%">
								<p class="">
										Sin ordenes de compra
								</p>
							</td>
							<td width="10%" align="center">
								    
								    <a class="AgregarFacturaDeCompra" id="032014"
								    	href="/OrdenPago/Edit/ProveedorId/175"
								    ><img src="/images/icons/money_add.png" title="Pagar"/> Pagar </a>
								                        
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										01/03/2014 
								</p>
							</td>
							<td width="10%">
								<p class="">
										IVA
								</p>
							</td>
							<td width="10%">
								<p class="">
								
										# 0032014
										<img src="/images/icons/zoom_in.png" title="Sin ordenes de compra"/>
										
										(INT# 1057 - A)<br>
								</p>
							</td>
							
							<td width="10%">
								
								<p class="">
										$ 1182.40								</p>
							</td>
							
							<td width="10%">
								<p class="">
										$ 16.29
								</p>
							</td>
							<td width="10%">
								<p class="">
																			16/05/2014 
																	</p>
							</td>
							<td width="10%">
								<p class="">
										Sin ordenes de compra
								</p>
							</td>
							<td width="10%" align="center">
								    
								    <a class="AgregarFacturaDeCompra" id="0032014"
								    	href="/OrdenPago/Edit/ProveedorId/175"
								    ><img src="/images/icons/money_add.png" title="Pagar"/> Pagar </a>
								                        
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										01/05/2014 
								</p>
							</td>
							<td width="10%">
								<p class="">
										INGRESOS BRUTOS
								</p>
							</td>
							<td width="10%">
								<p class="">
								
										# 1556854535
										<img src="/images/icons/zoom_in.png" title="Sin ordenes de compra"/>
										
										(INT# 1061 - A)<br>
								</p>
							</td>
							
							<td width="10%">
								
								<p class="">
										$ 12954.80								</p>
							</td>
							
							<td width="10%">
								<p class="">
										$ 3537.87
								</p>
							</td>
							<td width="10%">
								<p class="">
																			13/05/2014 
																	</p>
							</td>
							<td width="10%">
								<p class="">
										Sin ordenes de compra
								</p>
							</td>
							<td width="10%" align="center">
								    
								    <a class="AgregarFacturaDeCompra" id="1556854535"
								    	href="/OrdenPago/Edit/ProveedorId/135"
								    ><img src="/images/icons/money_add.png" title="Pagar"/> Pagar </a>
								                        
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										30/04/2014 
								</p>
							</td>
							<td width="10%">
								<p class="">
										PLASTICOS VG SRL
								</p>
							</td>
							<td width="10%">
								<p class="">
								
										# 00013244
										<img src="/images/icons/zoom_in.png" title="#2023 (2014-05-12) Sin condicion de pago<>"/>
										<br>(OT 3544)<br>
										(INT# 1018 - A)<br>
								</p>
							</td>
							
							<td width="10%">
								
								<p class="">
										$ 2845.92								</p>
							</td>
							
							<td width="10%">
								<p class="">
										$ 0
								</p>
							</td>
							<td width="10%">
								<p class="">
																			30/04/2014 
																	</p>
							</td>
							<td width="10%">
								<p class="">
										#2023 (2014-05-12) Sin condicion de pago<>
								</p>
							</td>
							<td width="10%" align="center">
								    
								    <a class="AgregarFacturaDeCompra" id="00013244"
								    	href="/OrdenPago/Edit/ProveedorId/284"
								    ><img src="/images/icons/money_add.png" title="Pagar"/> Pagar </a>
								                        
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										26/03/2014 
								</p>
							</td>
							<td width="10%">
								<p class="">
										Envap
								</p>
							</td>
							<td width="10%">
								<p class="">
								
										# 000110595
										<img src="/images/icons/zoom_in.png" title="#2005 (2014-05-12) cheque<>"/>
										<br>(OT 3557)<br>
										(INT# 941 - A)<br>
								</p>
							</td>
							
							<td width="10%">
								
								<p class="">
										$ 31936.62								</p>
							</td>
							
							<td width="10%">
								<p class="">
										$ 3559.13
								</p>
							</td>
							<td width="10%">
								<p class="">
																			26/04/2014 
																	</p>
							</td>
							<td width="10%">
								<p class="">
										#2005 (2014-05-12) cheque<>
								</p>
							</td>
							<td width="10%" align="center">
								    
								    <a class="AgregarFacturaDeCompra" id="000110595"
								    	href="/OrdenPago/Edit/ProveedorId/202"
								    ><img src="/images/icons/money_add.png" title="Pagar"/> Pagar </a>
								                        
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										17/04/2014 
								</p>
							</td>
							<td width="10%">
								<p class="">
										Grupo Brabo
								</p>
							</td>
							<td width="10%">
								<p class="">
								
										# 00126845
										<img src="/images/icons/zoom_in.png" title="Sin ordenes de compra"/>
										
										(INT# 975 - A)<br>
								</p>
							</td>
							
							<td width="10%">
								
								<p class="">
										$ 770.01								</p>
							</td>
							
							<td width="10%">
								<p class="">
										$ 770.01
								</p>
							</td>
							<td width="10%">
								<p class="">
																			17/04/2014 
																	</p>
							</td>
							<td width="10%">
								<p class="">
										Sin ordenes de compra
								</p>
							</td>
							<td width="10%" align="center">
								    
								    <a class="AgregarFacturaDeCompra" id="00126845"
								    	href="/OrdenPago/Edit/ProveedorId/271"
								    ><img src="/images/icons/money_add.png" title="Pagar"/> Pagar </a>
								                        
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										01/04/2014 
								</p>
							</td>
							<td width="10%">
								<p class="">
										suss martin zaszczynski
								</p>
							</td>
							<td width="10%">
								<p class="">
								
										# 43432424
										<img src="/images/icons/zoom_in.png" title="Sin ordenes de compra"/>
										
										(INT# 956 - B)<br>
								</p>
							</td>
							
							<td width="10%">
								
								<p class="">
										$ 5263.03								</p>
							</td>
							
							<td width="10%">
								<p class="">
										$ 836.86
								</p>
							</td>
							<td width="10%">
								<p class="">
																			10/04/2014 
																	</p>
							</td>
							<td width="10%">
								<p class="">
										Sin ordenes de compra
								</p>
							</td>
							<td width="10%" align="center">
								    
								    <a class="AgregarFacturaDeCompra" id="43432424"
								    	href="/OrdenPago/Edit/ProveedorId/168"
								    ><img src="/images/icons/money_add.png" title="Pagar"/> Pagar </a>
								                        
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										07/04/2014 
								</p>
							</td>
							<td width="10%">
								<p class="">
										PLASTICOS VG SRL
								</p>
							</td>
							<td width="10%">
								<p class="">
								
										# 00013191
										<img src="/images/icons/zoom_in.png" title="#2023 (2014-05-12) Sin condicion de pago<>"/>
										<br>(OT 3544)<br>
										(INT# 917 - A)<br>
								</p>
							</td>
							
							<td width="10%">
								
								<p class="">
										$ 5691.84								</p>
							</td>
							
							<td width="10%">
								<p class="">
										$ 0
								</p>
							</td>
							<td width="10%">
								<p class="">
																			07/04/2014 
																	</p>
							</td>
							<td width="10%">
								<p class="">
										#2023 (2014-05-12) Sin condicion de pago<>
								</p>
							</td>
							<td width="10%" align="center">
								    
								    <a class="AgregarFacturaDeCompra" id="00013191"
								    	href="/OrdenPago/Edit/ProveedorId/284"
								    ><img src="/images/icons/money_add.png" title="Pagar"/> Pagar </a>
								                        
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										21/03/2014 
								</p>
							</td>
							<td width="10%">
								<p class="">
										Boker Arbolito
								</p>
							</td>
							<td width="10%">
								<p class="">
								
										# 002000006651
										<img src="/images/icons/zoom_in.png" title="#1974 (2014-04-07) a convenir<>"/>
										<br>(OT 3640)<br>
										(INT# 876 - A)<br>
								</p>
							</td>
							
							<td width="10%">
								
								<p class="">
										$ 1562.35								</p>
							</td>
							
							<td width="10%">
								<p class="">
										$ 1562.35
								</p>
							</td>
							<td width="10%">
								<p class="">
																			31/03/2014 
																	</p>
							</td>
							<td width="10%">
								<p class="">
										#1974 (2014-04-07) a convenir<>
								</p>
							</td>
							<td width="10%" align="center">
								    
								    <a class="AgregarFacturaDeCompra" id="002000006651"
								    	href="/OrdenPago/Edit/ProveedorId/195"
								    ><img src="/images/icons/money_add.png" title="Pagar"/> Pagar </a>
								                        
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										01/03/2014 
								</p>
							</td>
							<td width="10%">
								<p class="">
										suss martin zaszczynski
								</p>
							</td>
							<td width="10%">
								<p class="">
								
										# 54684654674987
										<img src="/images/icons/zoom_in.png" title="Sin ordenes de compra"/>
										
										(INT# 844 - B)<br>
								</p>
							</td>
							
							<td width="10%">
								
								<p class="">
										$ 5789.70								</p>
							</td>
							
							<td width="10%">
								<p class="">
										$ 34.13
								</p>
							</td>
							<td width="10%">
								<p class="">
																			10/03/2014 
																	</p>
							</td>
							<td width="10%">
								<p class="">
										Sin ordenes de compra
								</p>
							</td>
							<td width="10%" align="center">
								    
								    <a class="AgregarFacturaDeCompra" id="54684654674987"
								    	href="/OrdenPago/Edit/ProveedorId/168"
								    ><img src="/images/icons/money_add.png" title="Pagar"/> Pagar </a>
								                        
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										11/01/2014 
								</p>
							</td>
							<td width="10%">
								<p class="">
										Carrefour
								</p>
							</td>
							<td width="10%">
								<p class="">
								
										# 01997067
										<img src="/images/icons/zoom_in.png" title="Sin ordenes de compra"/>
										
										(INT# 806 - A)<br>
								</p>
							</td>
							
							<td width="10%">
								
								<p class="">
										$ 4578.10								</p>
							</td>
							
							<td width="10%">
								<p class="">
										$ 1450.33
								</p>
							</td>
							<td width="10%">
								<p class="">
																			11/02/2014 
																	</p>
							</td>
							<td width="10%">
								<p class="">
										Sin ordenes de compra
								</p>
							</td>
							<td width="10%" align="center">
								    
								    <a class="AgregarFacturaDeCompra" id="01997067"
								    	href="/OrdenPago/Edit/ProveedorId/290"
								    ><img src="/images/icons/money_add.png" title="Pagar"/> Pagar </a>
								                        
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										26/08/2014 
								</p>
							</td>
							<td width="10%">
								<p class="">
										Imprenta Packman
								</p>
							</td>
							<td width="10%">
								<p class="">
								
										# 98432095022
										<img src="/images/icons/zoom_in.png" title="#2352 (No entregado) cta corriente<>"/>
										<br>(OT 3685)<br>
										(INT# 1348 - N)<br>
								</p>
							</td>
							
							<td width="10%">
								
								<p class="">
										$ 5200.00								</p>
							</td>
							
							<td width="10%">
								<p class="">
										$ 5200.00
								</p>
							</td>
							<td width="10%">
								<p class="">
																			<input class="UpdateFechaVencimiento FechaVencimiento" type="text" name="" facturaid="1348" value="sin fecha"/>
																	</p>
							</td>
							<td width="10%">
								<p class="">
										#2352 (No entregado) cta corriente<>
								</p>
							</td>
							<td width="10%" align="center">
								    
								    <a class="AgregarFacturaDeCompra" id="98432095022"
								    	href="/OrdenPago/Edit/ProveedorId/88"
								    ><img src="/images/icons/money_add.png" title="Pagar"/> Pagar </a>
								                        
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										19/09/2014 
								</p>
							</td>
							<td width="10%">
								<p class="">
										Jaime Zamler
								</p>
							</td>
							<td width="10%">
								<p class="">
								
										# 98432095026
										<img src="/images/icons/zoom_in.png" title="#2370 (No entregado) Efectivo<>"/>
										<br>(OT 3681)<br>
										(INT# 1400 - N)<br>
								</p>
							</td>
							
							<td width="10%">
								
								<p class="">
										$ 1500.00								</p>
							</td>
							
							<td width="10%">
								<p class="">
										$ 1500.00
								</p>
							</td>
							<td width="10%">
								<p class="">
																			<input class="UpdateFechaVencimiento FechaVencimiento" type="text" name="" facturaid="1400" value="sin fecha"/>
																	</p>
							</td>
							<td width="10%">
								<p class="">
										#2370 (No entregado) Efectivo<>
								</p>
							</td>
							<td width="10%" align="center">
								    
								    <a class="AgregarFacturaDeCompra" id="98432095026"
								    	href="/OrdenPago/Edit/ProveedorId/40"
								    ><img src="/images/icons/money_add.png" title="Pagar"/> Pagar </a>
								                        
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										27/12/2013 
								</p>
							</td>
							<td width="10%">
								<p class="">
										Jaime Zamler
								</p>
							</td>
							<td width="10%">
								<p class="">
								
										# 879846541698
										<img src="/images/icons/zoom_in.png" title="#1832 (2014-06-16) Sin condicion de pago<>"/>
										<br>(OT 3565)<br>
										(INT# 670 - N)<br>
								</p>
							</td>
							
							<td width="10%">
								
								<p class="">
										$ 3000.00								</p>
							</td>
							
							<td width="10%">
								<p class="">
										$ 1500.00
								</p>
							</td>
							<td width="10%">
								<p class="">
																			<input class="UpdateFechaVencimiento FechaVencimiento" type="text" name="" facturaid="670" value="sin fecha"/>
																	</p>
							</td>
							<td width="10%">
								<p class="">
										#1832 (2014-06-16) Sin condicion de pago<>
								</p>
							</td>
							<td width="10%" align="center">
								    
								    <a class="AgregarFacturaDeCompra" id="879846541698"
								    	href="/OrdenPago/Edit/ProveedorId/40"
								    ><img src="/images/icons/money_add.png" title="Pagar"/> Pagar </a>
								                        
							</td>
						</tr>
                    					<!-- items -->
									</table>
            </div> <!-- /listItems -->            
            
            
<h1>Ordenes de compra pendientes de validar (2)</h1>



<div class="list">


	<div class="list">
		<label for="kwd_search">Buscar:</label> <input type="text" id="kwd_search_oc" value=""/>
        		<div class="listTop">
					<div>
						<table border="0" cellpadding="0" cellspacing="0">
							<tr>
								<td width="10%"><p>Fecha</p></td>
								<td width="10%"><p>Proveedor</p></td>
								<td width="10%"><p title="Numero de orden de compra">OC</p></td>
								<td width="20%"><p>Insumo</p></td>
								<td width="10%"><p title="Total">Total</p></td>
								<td width="10%"><p title="Importe pendiente de pago. La orden de compra puede tener liquidaciones parciales">Pago pendiente</p></td>
								<td width="10%"><p title="Importe pendiente de validar en FC. La orden de compra puede tener validaciones parciales">Val. pendiente</p></td>
								<td width="10%"><p>Condicion</p></td> 
								<td width="10%"><p>Acciones</p></td>
							</tr>
						</table>
					</div>
                </div> <!-- /listadoTop -->
                
        <div class="listItems listItemsScroll">
                        
				<table id="my-table2" style="border-collapse:collapse" border="0" cellpadding="0" cellspacing="0">
				
										<!-- items -->
					
											<tr>
							<td width="10%">
								<p class="">
										15/07/2014
								</p>
							</td>
							<td width="10%">
								<p class="">
										Envap
								</p>
							</td>
							<td width="10%">
								<p class="">
										# 2272
										<img src="/images/icons/zoom_in.png" title="() - cheque"/>
										<br>(OT 3650)
								</p>
							</td>
							<td width="20%">
								
								<table border="0" cellspacing="0">
								  <tr>
								    <td>
								    <p><img src="/images/icons/bullet_go.png" alt="item" title="Item"/> montaje, troquelado interiores y armado</p>
								    </td>
								  </tr>
								</table>
								
								
							</td>
							
							<td width="10%">
								
								<p class="">
								
										$ 79152.15
								</p>
							</td>
							
							<td width="10%">
								<p class="">
								
										$ 79152.15
								</p>
							</td>
							<td width="10%">
								<p class="">
								
										$ 21725.55
								</p>
							</td>
							<td width="10%">
								<p class="">
										(No entregado) - cheque								</p>
							</td>
							<td width="10%" align="center">
							
															    <a class="AgregarOrdenDeCompra" id="2272"
								    href="/OrdenPago/Edit/ProveedorId/202"
								    ><img src="/images/icons/money_add.png" title="Liquidar"/> Pagar </a>
															    <br>
								    <a class="" id="202"
								    href="/FacturaCompra/Edit/ProveedorId/202"
								    ><img src="/images/icons/add.png" title="Liquidar"/> Validar OC </a>
								    <br>
								                        
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										17/09/2014
								</p>
							</td>
							<td width="10%">
								<p class="">
										Sur express SA
								</p>
							</td>
							<td width="10%">
								<p class="">
										# 2369
										<img src="/images/icons/zoom_in.png" title="() - cheque 30 dias"/>
										<br>(OT 3649)
								</p>
							</td>
							<td width="20%">
								
								<table border="0" cellspacing="0">
								  <tr>
								    <td>
								    <p><img src="/images/icons/bullet_go.png" alt="item" title="Item"/> movimiento mercaderia desde San Juan</p>
								    </td>
								  </tr>
								</table>
								
								
							</td>
							
							<td width="10%">
								
								<p class="">
								
										$ 10510.01
								</p>
							</td>
							
							<td width="10%">
								<p class="">
								
										$ 10510.01
								</p>
							</td>
							<td width="10%">
								<p class="">
								
										$ 10510.01
								</p>
							</td>
							<td width="10%">
								<p class="">
										(No entregado) - cheque 30 dias								</p>
							</td>
							<td width="10%" align="center">
							
															    <a class="AgregarOrdenDeCompra" id="2369"
								    href="/OrdenPago/Edit/ProveedorId/189"
								    ><img src="/images/icons/money_add.png" title="Liquidar"/> Pagar </a>
															    <br>
								    <a class="" id="189"
								    href="/FacturaCompra/Edit/ProveedorId/189"
								    ><img src="/images/icons/add.png" title="Liquidar"/> Validar OC </a>
								    <br>
								                        
							</td>
						</tr>
                    					<!-- items -->
									</table>
            </div> <!-- /listItems -->

</div> <!-- /list -->            
</div> <!-- /list -->