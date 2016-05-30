171
a:4:{s:8:"template";a:1:{s:49:"Backend/GestionAdministrativa/PagosPendientes.tpl";b:1;}s:9:"timestamp";i:1462447545;s:7:"expires";i:1462447545;s:13:"cache_serials";a:0:{}}<!-- date picker -->
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


            <h1>Facturas de compra pendientes de pago (10)</h1>
            
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
										16/03/2016 
								</p>
							</td>
							<td width="10%">
								<p class="">
										IVA
								</p>
							</td>
							<td width="10%">
								<p class="">
								
										# 38102983120938
										<img src="/images/icons/zoom_in.png" title="Sin ordenes de compra"/>
										
										(INT# 2472 - A)<br>
								</p>
							</td>
							
							<td width="10%">
								
								<p class="">
										$ 92492.16								</p>
							</td>
							
							<td width="10%">
								<p class="">
										$ 61661.44
								</p>
							</td>
							<td width="10%">
								<p class="">
																			16/08/2016 
																	</p>
							</td>
							<td width="10%">
								<p class="">
										Sin ordenes de compra
								</p>
							</td>
							<td width="10%" align="center">
								    
								    <a class="AgregarFacturaDeCompra" id="38102983120938"
								    	href="/OrdenPago/Edit/ProveedorId/175"
								    ><img src="/images/icons/money_add.png" title="Pagar"/> Pagar </a>
								                        
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										18/01/2016 
								</p>
							</td>
							<td width="10%">
								<p class="">
										IVA
								</p>
							</td>
							<td width="10%">
								<p class="">
								
										# 5365746575
										<img src="/images/icons/zoom_in.png" title="Sin ordenes de compra"/>
										
										(INT# 2376 - A)<br>
								</p>
							</td>
							
							<td width="10%">
								
								<p class="">
										$ 44885.22								</p>
							</td>
							
							<td width="10%">
								<p class="">
										$ 14961.74
								</p>
							</td>
							<td width="10%">
								<p class="">
																			16/06/2016 
																	</p>
							</td>
							<td width="10%">
								<p class="">
										Sin ordenes de compra
								</p>
							</td>
							<td width="10%" align="center">
								    
								    <a class="AgregarFacturaDeCompra" id="5365746575"
								    	href="/OrdenPago/Edit/ProveedorId/175"
								    ><img src="/images/icons/money_add.png" title="Pagar"/> Pagar </a>
								                        
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										29/04/2016 
								</p>
							</td>
							<td width="10%">
								<p class="">
										Marroquineria Alberto A
								</p>
							</td>
							<td width="10%">
								<p class="">
								
										# 001000000236
										<img src="/images/icons/zoom_in.png" title="#3079 (2016-05-03) Sin condicion de pago<>"/>
										<br>(OT 3916)<br>
										(INT# 2534 - A)<br>
								</p>
							</td>
							
							<td width="10%">
								
								<p class="">
										$ 50820.00								</p>
							</td>
							
							<td width="10%">
								<p class="">
										$ 50820.00
								</p>
							</td>
							<td width="10%">
								<p class="">
																			30/05/2016 
																	</p>
							</td>
							<td width="10%">
								<p class="">
										#3079 (2016-05-03) Sin condicion de pago<>
								</p>
							</td>
							<td width="10%" align="center">
								    
								    <a class="AgregarFacturaDeCompra" id="001000000236"
								    	href="/OrdenPago/Edit/ProveedorId/268"
								    ><img src="/images/icons/money_add.png" title="Pagar"/> Pagar </a>
								                        
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										17/02/2016 
								</p>
							</td>
							<td width="10%">
								<p class="">
										Vicente Alcalde
								</p>
							</td>
							<td width="10%">
								<p class="">
								
										# 17269
										<img src="/images/icons/zoom_in.png" title="#3003 (No entregado) Anticipo 40%, 30 dias FF / 60% ,30 FF<>"/>
										<br>(OT 3908)<br>
										(INT# 2480 - A)<br>
								</p>
							</td>
							
							<td width="10%">
								
								<p class="">
										$ 187308.00								</p>
							</td>
							
							<td width="10%">
								<p class="">
										$ 187308.00
								</p>
							</td>
							<td width="10%">
								<p class="">
																			27/05/2016 
																	</p>
							</td>
							<td width="10%">
								<p class="">
										#3003 (No entregado) Anticipo 40%, 30 dias FF / 60% ,30 FF<>
								</p>
							</td>
							<td width="10%" align="center">
								    
								    <a class="AgregarFacturaDeCompra" id="17269"
								    	href="/OrdenPago/Edit/ProveedorId/146"
								    ><img src="/images/icons/money_add.png" title="Pagar"/> Pagar </a>
								                        
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										25/04/2016 
								</p>
							</td>
							<td width="10%">
								<p class="">
										Imprenta Packman
								</p>
							</td>
							<td width="10%">
								<p class="">
								
										# 00006295
										<img src="/images/icons/zoom_in.png" title="#3138 (2016-05-03) Sin condicion de pago<>"/>
										<br>(OT 3915)<br>
										(INT# 2530 - A)<br>
								</p>
							</td>
							
							<td width="10%">
								
								<p class="">
										$ 62799.00								</p>
							</td>
							
							<td width="10%">
								<p class="">
										$ 62799.00
								</p>
							</td>
							<td width="10%">
								<p class="">
																			25/05/2016 
																	</p>
							</td>
							<td width="10%">
								<p class="">
										#3138 (2016-05-03) Sin condicion de pago<>
								</p>
							</td>
							<td width="10%" align="center">
								    
								    <a class="AgregarFacturaDeCompra" id="00006295"
								    	href="/OrdenPago/Edit/ProveedorId/88"
								    ><img src="/images/icons/money_add.png" title="Pagar"/> Pagar </a>
								                        
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										17/03/2016 
								</p>
							</td>
							<td width="10%">
								<p class="">
										Vicente Alcalde
								</p>
							</td>
							<td width="10%">
								<p class="">
								
										# 17270
										<img src="/images/icons/zoom_in.png" title="#3004 (No entregado) Anticipo 40%, 30 dias FF / 60% ,30 FF<>"/>
										<br>(OT 3911)<br>
										(INT# 2481 - A)<br>
								</p>
							</td>
							
							<td width="10%">
								
								<p class="">
										$ 78408.00								</p>
							</td>
							
							<td width="10%">
								<p class="">
										$ 78408.00
								</p>
							</td>
							<td width="10%">
								<p class="">
																			23/05/2016 
																	</p>
							</td>
							<td width="10%">
								<p class="">
										#3004 (No entregado) Anticipo 40%, 30 dias FF / 60% ,30 FF<>
								</p>
							</td>
							<td width="10%" align="center">
								    
								    <a class="AgregarFacturaDeCompra" id="17270"
								    	href="/OrdenPago/Edit/ProveedorId/146"
								    ><img src="/images/icons/money_add.png" title="Pagar"/> Pagar </a>
								                        
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										29/04/2016 
								</p>
							</td>
							<td width="10%">
								<p class="">
										Ecofactory
								</p>
							</td>
							<td width="10%">
								<p class="">
								
										# 030000000107
										<img src="/images/icons/zoom_in.png" title="#3015 (2016-05-02) 30% anticipo y 70%, 30 dias FF<>"/>
										<br>(OT 3910)<br>
										(INT# 2531 - A)<br>
								</p>
							</td>
							
							<td width="10%">
								
								<p class="">
										$ 50778.00								</p>
							</td>
							
							<td width="10%">
								<p class="">
										$ 50778.00
								</p>
							</td>
							<td width="10%">
								<p class="">
																			16/05/2016 
																	</p>
							</td>
							<td width="10%">
								<p class="">
										#3015 (2016-05-02) 30% anticipo y 70%, 30 dias FF<>
								</p>
							</td>
							<td width="10%" align="center">
								    
								    <a class="AgregarFacturaDeCompra" id="030000000107"
								    	href="/OrdenPago/Edit/ProveedorId/343"
								    ><img src="/images/icons/money_add.png" title="Pagar"/> Pagar </a>
								                        
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										24/04/2016 
								</p>
							</td>
							<td width="10%">
								<p class="">
										AFIP Ganancias
								</p>
							</td>
							<td width="10%">
								<p class="">
								
										# 8319208301
										<img src="/images/icons/zoom_in.png" title="Sin ordenes de compra"/>
										
										(INT# 2515 - A)<br>
								</p>
							</td>
							
							<td width="10%">
								
								<p class="">
										$ 32470.65								</p>
							</td>
							
							<td width="10%">
								<p class="">
										$ 21647.10
								</p>
							</td>
							<td width="10%">
								<p class="">
																			24/04/2016 
																	</p>
							</td>
							<td width="10%">
								<p class="">
										Sin ordenes de compra
								</p>
							</td>
							<td width="10%" align="center">
								    
								    <a class="AgregarFacturaDeCompra" id="8319208301"
								    	href="/OrdenPago/Edit/ProveedorId/148"
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
                    					<!-- items -->
									</table>
            </div> <!-- /listItems -->            
            
            
<h1>Ordenes de compra pendientes de validar (19)</h1>



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
										15/01/2016
								</p>
							</td>
							<td width="10%">
								<p class="">
										Boker Arbolito
								</p>
							</td>
							<td width="10%">
								<p class="">
										# 3006
										<img src="/images/icons/zoom_in.png" title="() - Anticipo 40%, 30 dias FF / 60% ,30 FF"/>
										<br>(OT 3909)
								</p>
							</td>
							<td width="20%">
								
								<table border="0" cellspacing="0">
								  <tr>
								    <td>
								    <p><img src="/images/icons/bullet_go.png" alt="item" title="Item"/> Cuchillos</p>
								    </td>
								  </tr>
								</table>
								
								
							</td>
							
							<td width="10%">
								
								<p class="">
								
										$ 361185.00
								</p>
							</td>
							
							<td width="10%">
								<p class="">
								
										$ 361185.00
								</p>
							</td>
							<td width="10%">
								<p class="">
								
										$ 252829.50
								</p>
							</td>
							<td width="10%">
								<p class="">
										(No entregado) - Anticipo 40%, 30 dias FF / 60% ,30 FF								</p>
							</td>
							<td width="10%" align="center">
							
															    <a class="AgregarOrdenDeCompra" id="3006"
								    href="/OrdenPago/Edit/ProveedorId/195"
								    ><img src="/images/icons/money_add.png" title="Liquidar"/> Pagar </a>
															    <br>
								    <a class="" id="195"
								    href="/FacturaCompra/Edit/ProveedorId/195"
								    ><img src="/images/icons/add.png" title="Liquidar"/> Validar OC </a>
								    <br>
								                        
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										15/01/2016
								</p>
							</td>
							<td width="10%">
								<p class="">
										Boker Arbolito
								</p>
							</td>
							<td width="10%">
								<p class="">
										# 3005
										<img src="/images/icons/zoom_in.png" title="() - Anticipo 40%, 30 dias FF / 60% ,30 FF"/>
										<br>(OT 3912)
								</p>
							</td>
							<td width="20%">
								
								<table border="0" cellspacing="0">
								  <tr>
								    <td>
								    <p><img src="/images/icons/bullet_go.png" alt="item" title="Item"/> cuchillos</p>
								    </td>
								  </tr>
								</table>
								
								
							</td>
							
							<td width="10%">
								
								<p class="">
								
										$ 240790.00
								</p>
							</td>
							
							<td width="10%">
								<p class="">
								
										$ 240790.00
								</p>
							</td>
							<td width="10%">
								<p class="">
								
										$ 168553.00
								</p>
							</td>
							<td width="10%">
								<p class="">
										(No entregado) - Anticipo 40%, 30 dias FF / 60% ,30 FF								</p>
							</td>
							<td width="10%" align="center">
							
															    <a class="AgregarOrdenDeCompra" id="3005"
								    href="/OrdenPago/Edit/ProveedorId/195"
								    ><img src="/images/icons/money_add.png" title="Liquidar"/> Pagar </a>
															    <br>
								    <a class="" id="195"
								    href="/FacturaCompra/Edit/ProveedorId/195"
								    ><img src="/images/icons/add.png" title="Liquidar"/> Validar OC </a>
								    <br>
								                        
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										19/12/2014
								</p>
							</td>
							<td width="10%">
								<p class="">
										ColorArt
								</p>
							</td>
							<td width="10%">
								<p class="">
										# 2483
										<img src="/images/icons/zoom_in.png" title="(2011-05-09) - a convenir"/>
										<br>(OT 3741)
								</p>
							</td>
							<td width="20%">
								
								<table border="0" cellspacing="0">
								  <tr>
								    <td>
								    <p><img src="/images/icons/bullet_go.png" alt="item" title="Item"/> tampografiado</p>
								    </td>
								  </tr>
								</table>
								
								
							</td>
							
							<td width="10%">
								
								<p class="">
								
										$ 912.34
								</p>
							</td>
							
							<td width="10%">
								<p class="">
								
										$ 0.00
								</p>
							</td>
							<td width="10%">
								<p class="">
								
										$ 70.18
								</p>
							</td>
							<td width="10%">
								<p class="">
										(2011-05-09) - a convenir								</p>
							</td>
							<td width="10%" align="center">
							
															    <br>
								    <a class="" id="335"
								    href="/FacturaCompra/Edit/ProveedorId/335"
								    ><img src="/images/icons/add.png" title="Liquidar"/> Validar OC </a>
								    <br>
								                        
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										13/04/2016
								</p>
							</td>
							<td width="10%">
								<p class="">
										DM desarrollos
								</p>
							</td>
							<td width="10%">
								<p class="">
										# 3128
										<img src="/images/icons/zoom_in.png" title="() - 50% de anticipo 50% saldo contra entrega"/>
										<br>(OT 3886)
								</p>
							</td>
							<td width="20%">
								
								<table border="0" cellspacing="0">
								  <tr>
								    <td>
								    <p><img src="/images/icons/bullet_go.png" alt="item" title="Item"/> matriz mecanizada CNC y troquel para corte</p>
								    </td>
								  </tr>
								</table>
								
								
							</td>
							
							<td width="10%">
								
								<p class="">
								
										$ 34848.00
								</p>
							</td>
							
							<td width="10%">
								<p class="">
								
										$ 17083.59
								</p>
							</td>
							<td width="10%">
								<p class="">
								
										$ 2635.86
								</p>
							</td>
							<td width="10%">
								<p class="">
										(No entregado) - 50% de anticipo 50% saldo contra entrega								</p>
							</td>
							<td width="10%" align="center">
							
															    <a class="AgregarOrdenDeCompra" id="3128"
								    href="/OrdenPago/Edit/ProveedorId/349"
								    ><img src="/images/icons/money_add.png" title="Liquidar"/> Pagar </a>
															    <br>
								    <a class="" id="349"
								    href="/FacturaCompra/Edit/ProveedorId/349"
								    ><img src="/images/icons/add.png" title="Liquidar"/> Validar OC </a>
								    <br>
								                        
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										13/04/2016
								</p>
							</td>
							<td width="10%">
								<p class="">
										DM desarrollos
								</p>
							</td>
							<td width="10%">
								<p class="">
										# 3127
										<img src="/images/icons/zoom_in.png" title="() - 50% de anticipo 50% saldo contra entrega"/>
										<br>(OT 3886)
								</p>
							</td>
							<td width="20%">
								
								<table border="0" cellspacing="0">
								  <tr>
								    <td>
								    <p><img src="/images/icons/bullet_go.png" alt="item" title="Item"/> Blister en PAI gofrado c/u</p>
								    </td>
								  </tr>
								</table>
								
								
							</td>
							
							<td width="10%">
								
								<p class="">
								
										$ 67760.00
								</p>
							</td>
							
							<td width="10%">
								<p class="">
								
										$ 39760.00
								</p>
							</td>
							<td width="10%">
								<p class="">
								
										$ 54207.73
								</p>
							</td>
							<td width="10%">
								<p class="">
										(No entregado) - 50% de anticipo 50% saldo contra entrega								</p>
							</td>
							<td width="10%" align="center">
							
															    <a class="AgregarOrdenDeCompra" id="3127"
								    href="/OrdenPago/Edit/ProveedorId/349"
								    ><img src="/images/icons/money_add.png" title="Liquidar"/> Pagar </a>
															    <br>
								    <a class="" id="349"
								    href="/FacturaCompra/Edit/ProveedorId/349"
								    ><img src="/images/icons/add.png" title="Liquidar"/> Validar OC </a>
								    <br>
								                        
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										12/05/2015
								</p>
							</td>
							<td width="10%">
								<p class="">
										El fenix
								</p>
							</td>
							<td width="10%">
								<p class="">
										# 2671
										<img src="/images/icons/zoom_in.png" title="(2015-05-28) - cta corriente"/>
										<br>(OT 3812)
								</p>
							</td>
							<td width="20%">
								
								<table border="0" cellspacing="0">
								  <tr>
								    <td>
								    <p><img src="/images/icons/bullet_go.png" alt="item" title="Item"/> impresion lonas</p>
								    </td>
								  </tr>
								</table>
								
								
							</td>
							
							<td width="10%">
								
								<p class="">
								
										$ 3610.76
								</p>
							</td>
							
							<td width="10%">
								<p class="">
								
										$ 3610.76
								</p>
							</td>
							<td width="10%">
								<p class="">
								
										$ 10.52
								</p>
							</td>
							<td width="10%">
								<p class="">
										(2015-05-28) - cta corriente								</p>
							</td>
							<td width="10%" align="center">
							
															    <a class="AgregarOrdenDeCompra" id="2671"
								    href="/OrdenPago/Edit/ProveedorId/21"
								    ><img src="/images/icons/money_add.png" title="Liquidar"/> Pagar </a>
															    <br>
								    <a class="" id="21"
								    href="/FacturaCompra/Edit/ProveedorId/21"
								    ><img src="/images/icons/add.png" title="Liquidar"/> Validar OC </a>
								    <br>
								                        
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										27/05/2015
								</p>
							</td>
							<td width="10%">
								<p class="">
										El fenix
								</p>
							</td>
							<td width="10%">
								<p class="">
										# 2684
										<img src="/images/icons/zoom_in.png" title="(2015-06-04) - cta corriente"/>
										<br>(OT 3831)
								</p>
							</td>
							<td width="20%">
								
								<table border="0" cellspacing="0">
								  <tr>
								    <td>
								    <p><img src="/images/icons/bullet_go.png" alt="item" title="Item"/> impresion lonas </p>
								    </td>
								  </tr>
								</table>
								
								
							</td>
							
							<td width="10%">
								
								<p class="">
								
										$ 1800.48
								</p>
							</td>
							
							<td width="10%">
								<p class="">
								
										$ 1800.48
								</p>
							</td>
							<td width="10%">
								<p class="">
								
										$ 0.36
								</p>
							</td>
							<td width="10%">
								<p class="">
										(2015-06-04) - cta corriente								</p>
							</td>
							<td width="10%" align="center">
							
															    <a class="AgregarOrdenDeCompra" id="2684"
								    href="/OrdenPago/Edit/ProveedorId/21"
								    ><img src="/images/icons/money_add.png" title="Liquidar"/> Pagar </a>
															    <br>
								    <a class="" id="21"
								    href="/FacturaCompra/Edit/ProveedorId/21"
								    ><img src="/images/icons/add.png" title="Liquidar"/> Validar OC </a>
								    <br>
								                        
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										18/08/2015
								</p>
							</td>
							<td width="10%">
								<p class="">
										El fenix
								</p>
							</td>
							<td width="10%">
								<p class="">
										# 2832
										<img src="/images/icons/zoom_in.png" title="(2015-08-27) - cta corriente"/>
										<br>(OT 3863)
								</p>
							</td>
							<td width="20%">
								
								<table border="0" cellspacing="0">
								  <tr>
								    <td>
								    <p><img src="/images/icons/bullet_go.png" alt="item" title="Item"/> impresion lona front</p>
								    </td>
								  </tr>
								</table>
								
								
							</td>
							
							<td width="10%">
								
								<p class="">
								
										$ 6842.55
								</p>
							</td>
							
							<td width="10%">
								<p class="">
								
										$ 6842.55
								</p>
							</td>
							<td width="10%">
								<p class="">
								
										$ 2.11
								</p>
							</td>
							<td width="10%">
								<p class="">
										(2015-08-27) - cta corriente								</p>
							</td>
							<td width="10%" align="center">
							
															    <a class="AgregarOrdenDeCompra" id="2832"
								    href="/OrdenPago/Edit/ProveedorId/21"
								    ><img src="/images/icons/money_add.png" title="Liquidar"/> Pagar </a>
															    <br>
								    <a class="" id="21"
								    href="/FacturaCompra/Edit/ProveedorId/21"
								    ><img src="/images/icons/add.png" title="Liquidar"/> Validar OC </a>
								    <br>
								                        
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										21/01/2016
								</p>
							</td>
							<td width="10%">
								<p class="">
										Envap
								</p>
							</td>
							<td width="10%">
								<p class="">
										# 3029
										<img src="/images/icons/zoom_in.png" title="() - 50% de anticipo 50% saldo contra entrega"/>
										<br>(OT 3884)
								</p>
							</td>
							<td width="20%">
								
								<table border="0" cellspacing="0">
								  <tr>
								    <td>
								    <p><img src="/images/icons/bullet_go.png" alt="item" title="Item"/> montae, troquelado caa exterior e interiory pegado chapeton</p>
								    </td>
								  </tr>
								</table>
								
								
							</td>
							
							<td width="10%">
								
								<p class="">
								
										$ 195555.36
								</p>
							</td>
							
							<td width="10%">
								<p class="">
								
										$ 195555.36
								</p>
							</td>
							<td width="10%">
								<p class="">
								
										$ 117631.36
								</p>
							</td>
							<td width="10%">
								<p class="">
										(No entregado) - 50% de anticipo 50% saldo contra entrega								</p>
							</td>
							<td width="10%" align="center">
							
															    <a class="AgregarOrdenDeCompra" id="3029"
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
										08/04/2016
								</p>
							</td>
							<td width="10%">
								<p class="">
										Imprenta Packman
								</p>
							</td>
							<td width="10%">
								<p class="">
										# 3124
										<img src="/images/icons/zoom_in.png" title="() - cheque"/>
										<br>(OT 3937)
								</p>
							</td>
							<td width="20%">
								
								<table border="0" cellspacing="0">
								  <tr>
								    <td>
								    <p><img src="/images/icons/bullet_go.png" alt="item" title="Item"/> incremento por valor dolar </p>
								    </td>
								  </tr>
								</table>
								
								
							</td>
							
							<td width="10%">
								
								<p class="">
								
										$ 4961.00
								</p>
							</td>
							
							<td width="10%">
								<p class="">
								
										$ 4961.00
								</p>
							</td>
							<td width="10%">
								<p class="">
								
										$ 4961.00
								</p>
							</td>
							<td width="10%">
								<p class="">
										(No entregado) - cheque								</p>
							</td>
							<td width="10%" align="center">
							
															    <a class="AgregarOrdenDeCompra" id="3124"
								    href="/OrdenPago/Edit/ProveedorId/88"
								    ><img src="/images/icons/money_add.png" title="Liquidar"/> Pagar </a>
															    <br>
								    <a class="" id="88"
								    href="/FacturaCompra/Edit/ProveedorId/88"
								    ><img src="/images/icons/add.png" title="Liquidar"/> Validar OC </a>
								    <br>
								                        
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										22/04/2015
								</p>
							</td>
							<td width="10%">
								<p class="">
										Obra-Completa
								</p>
							</td>
							<td width="10%">
								<p class="">
										# 2646
										<img src="/images/icons/zoom_in.png" title="(2015-04-29) - cheque"/>
										<br>(OT 3815)
								</p>
							</td>
							<td width="20%">
								
								<table border="0" cellspacing="0">
								  <tr>
								    <td>
								    <p><img src="/images/icons/bullet_go.png" alt="item" title="Item"/> routedo de logo con base</p>
								    </td>
								  </tr>
								</table>
								
								
							</td>
							
							<td width="10%">
								
								<p class="">
								
										$ 3497.14
								</p>
							</td>
							
							<td width="10%">
								<p class="">
								
										$ 3497.14
								</p>
							</td>
							<td width="10%">
								<p class="">
								
										$ 0.24
								</p>
							</td>
							<td width="10%">
								<p class="">
										(2015-04-29) - cheque								</p>
							</td>
							<td width="10%" align="center">
							
															    <a class="AgregarOrdenDeCompra" id="2646"
								    href="/OrdenPago/Edit/ProveedorId/341"
								    ><img src="/images/icons/money_add.png" title="Liquidar"/> Pagar </a>
															    <br>
								    <a class="" id="341"
								    href="/FacturaCompra/Edit/ProveedorId/341"
								    ><img src="/images/icons/add.png" title="Liquidar"/> Validar OC </a>
								    <br>
								                        
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										13/01/2016
								</p>
							</td>
							<td width="10%">
								<p class="">
										PLASTICOS VG SRL
								</p>
							</td>
							<td width="10%">
								<p class="">
										# 2997
										<img src="/images/icons/zoom_in.png" title="(2016-01-14) - "/>
										<br>(OT 3871)
								</p>
							</td>
							<td width="20%">
								
								<table border="0" cellspacing="0">
								  <tr>
								    <td>
								    <p><img src="/images/icons/bullet_go.png" alt="item" title="Item"/> Pinchos excedente</p>
								    </td>
								  </tr>
								</table>
								
								
							</td>
							
							<td width="10%">
								
								<p class="">
								
										$ 2406.69
								</p>
							</td>
							
							<td width="10%">
								<p class="">
								
										$ 2406.69
								</p>
							</td>
							<td width="10%">
								<p class="">
								
										$ 2406.69
								</p>
							</td>
							<td width="10%">
								<p class="">
										(2016-01-14) 								</p>
							</td>
							<td width="10%" align="center">
							
															    <a class="AgregarOrdenDeCompra" id="2997"
								    href="/OrdenPago/Edit/ProveedorId/284"
								    ><img src="/images/icons/money_add.png" title="Liquidar"/> Pagar </a>
															    <br>
								    <a class="" id="284"
								    href="/FacturaCompra/Edit/ProveedorId/284"
								    ><img src="/images/icons/add.png" title="Liquidar"/> Validar OC </a>
								    <br>
								                        
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										02/05/2016
								</p>
							</td>
							<td width="10%">
								<p class="">
										Siris remiseria
								</p>
							</td>
							<td width="10%">
								<p class="">
										# 3150
										<img src="/images/icons/zoom_in.png" title="() - cta corriente"/>
										<br>(OT 3910)
								</p>
							</td>
							<td width="20%">
								
								<table border="0" cellspacing="0">
								  <tr>
								    <td>
								    <p><img src="/images/icons/bullet_go.png" alt="item" title="Item"/> movimiento mercaderia</p>
								    </td>
								  </tr>
								</table>
								
								
							</td>
							
							<td width="10%">
								
								<p class="">
								
										$ 250.00
								</p>
							</td>
							
							<td width="10%">
								<p class="">
								
										$ 250.00
								</p>
							</td>
							<td width="10%">
								<p class="">
								
										$ 250.00
								</p>
							</td>
							<td width="10%">
								<p class="">
										(No entregado) - cta corriente								</p>
							</td>
							<td width="10%" align="center">
							
															    <a class="AgregarOrdenDeCompra" id="3150"
								    href="/OrdenPago/Edit/ProveedorId/230"
								    ><img src="/images/icons/money_add.png" title="Liquidar"/> Pagar </a>
															    <br>
								    <a class="" id="230"
								    href="/FacturaCompra/Edit/ProveedorId/230"
								    ><img src="/images/icons/add.png" title="Liquidar"/> Validar OC </a>
								    <br>
								                        
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										20/04/2016
								</p>
							</td>
							<td width="10%">
								<p class="">
										STENFAR
								</p>
							</td>
							<td width="10%">
								<p class="">
										# 3129
										<img src="/images/icons/zoom_in.png" title="() - cheque"/>
										<br>(OT 3955)
								</p>
							</td>
							<td width="20%">
								
								<table border="0" cellspacing="0">
								  <tr>
								    <td>
								    <p><img src="/images/icons/bullet_go.png" alt="item" title="Item"/> cartulina tx suzano 315 gr 72x102 al 8 de abril</p>
								    </td>
								  </tr>
								</table>
								
								
							</td>
							
							<td width="10%">
								
								<p class="">
								
										$ 3343.21
								</p>
							</td>
							
							<td width="10%">
								<p class="">
								
										$ 3343.21
								</p>
							</td>
							<td width="10%">
								<p class="">
								
										$ 3343.21
								</p>
							</td>
							<td width="10%">
								<p class="">
										(No entregado) - cheque								</p>
							</td>
							<td width="10%" align="center">
							
															    <a class="AgregarOrdenDeCompra" id="3129"
								    href="/OrdenPago/Edit/ProveedorId/242"
								    ><img src="/images/icons/money_add.png" title="Liquidar"/> Pagar </a>
															    <br>
								    <a class="" id="242"
								    href="/FacturaCompra/Edit/ProveedorId/242"
								    ><img src="/images/icons/add.png" title="Liquidar"/> Validar OC </a>
								    <br>
								                        
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										26/04/2016
								</p>
							</td>
							<td width="10%">
								<p class="">
										STENFAR
								</p>
							</td>
							<td width="10%">
								<p class="">
										# 3137
										<img src="/images/icons/zoom_in.png" title="(2016-05-03) - cta corriente"/>
										<br>(OT 3886)
								</p>
							</td>
							<td width="20%">
								
								<table border="0" cellspacing="0">
								  <tr>
								    <td>
								    <p><img src="/images/icons/bullet_go.png" alt="item" title="Item"/> cartulina tx suzano 76x116</p>
								    </td>
								  </tr>
								</table>
								
								
							</td>
							
							<td width="10%">
								
								<p class="">
								
										$ 9487.03
								</p>
							</td>
							
							<td width="10%">
								<p class="">
								
										$ 9487.03
								</p>
							</td>
							<td width="10%">
								<p class="">
								
										$ 9487.03
								</p>
							</td>
							<td width="10%">
								<p class="">
										(2016-05-03) - cta corriente								</p>
							</td>
							<td width="10%" align="center">
							
															    <a class="AgregarOrdenDeCompra" id="3137"
								    href="/OrdenPago/Edit/ProveedorId/242"
								    ><img src="/images/icons/money_add.png" title="Liquidar"/> Pagar </a>
															    <br>
								    <a class="" id="242"
								    href="/FacturaCompra/Edit/ProveedorId/242"
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
										<img src="/images/icons/zoom_in.png" title="(2014-10-03) - cheque 30 dias"/>
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
								
										$ 0.00
								</p>
							</td>
							<td width="10%">
								<p class="">
								
										$ 10510.01
								</p>
							</td>
							<td width="10%">
								<p class="">
										(2014-10-03) - cheque 30 dias								</p>
							</td>
							<td width="10%" align="center">
							
															    <br>
								    <a class="" id="189"
								    href="/FacturaCompra/Edit/ProveedorId/189"
								    ><img src="/images/icons/add.png" title="Liquidar"/> Validar OC </a>
								    <br>
								                        
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										02/12/2014
								</p>
							</td>
							<td width="10%">
								<p class="">
										Tango Publicidad
								</p>
							</td>
							<td width="10%">
								<p class="">
										# 2442
										<img src="/images/icons/zoom_in.png" title="(2014-12-11) - "/>
										<br>(OT 3733)
								</p>
							</td>
							<td width="20%">
								
								<table border="0" cellspacing="0">
								  <tr>
								    <td>
								    <p><img src="/images/icons/bullet_go.png" alt="item" title="Item"/> Fabricación y colocación</p>
								    </td>
								  </tr>
								</table>
								
								
							</td>
							
							<td width="10%">
								
								<p class="">
								
										$ 1850.00
								</p>
							</td>
							
							<td width="10%">
								<p class="">
								
										$ 0.00
								</p>
							</td>
							<td width="10%">
								<p class="">
								
										$ 1850.00
								</p>
							</td>
							<td width="10%">
								<p class="">
										(2014-12-11) 								</p>
							</td>
							<td width="10%" align="center">
							
															    <br>
								    <a class="" id="36"
								    href="/FacturaCompra/Edit/ProveedorId/36"
								    ><img src="/images/icons/add.png" title="Liquidar"/> Validar OC </a>
								    <br>
								                        
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										14/01/2016
								</p>
							</td>
							<td width="10%">
								<p class="">
										Vicente Alcalde
								</p>
							</td>
							<td width="10%">
								<p class="">
										# 3003
										<img src="/images/icons/zoom_in.png" title="() - Anticipo 40%, 30 dias FF / 60% ,30 FF"/>
										<br>(OT 3908)
								</p>
							</td>
							<td width="20%">
								
								<table border="0" cellspacing="0">
								  <tr>
								    <td>
								    <p><img src="/images/icons/bullet_go.png" alt="item" title="Item"/> jamoneros</p>
								    </td>
								  </tr>
								</table>
								
								
							</td>
							
							<td width="10%">
								
								<p class="">
								
										$ 468270.00
								</p>
							</td>
							
							<td width="10%">
								<p class="">
								
										$ 468270.00
								</p>
							</td>
							<td width="10%">
								<p class="">
								
										$ 93654.00
								</p>
							</td>
							<td width="10%">
								<p class="">
										(No entregado) - Anticipo 40%, 30 dias FF / 60% ,30 FF								</p>
							</td>
							<td width="10%" align="center">
							
															    <a class="AgregarOrdenDeCompra" id="3003"
								    href="/OrdenPago/Edit/ProveedorId/146"
								    ><img src="/images/icons/money_add.png" title="Liquidar"/> Pagar </a>
															    <br>
								    <a class="" id="146"
								    href="/FacturaCompra/Edit/ProveedorId/146"
								    ><img src="/images/icons/add.png" title="Liquidar"/> Validar OC </a>
								    <br>
								                        
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										14/01/2016
								</p>
							</td>
							<td width="10%">
								<p class="">
										Vicente Alcalde
								</p>
							</td>
							<td width="10%">
								<p class="">
										# 3004
										<img src="/images/icons/zoom_in.png" title="() - Anticipo 40%, 30 dias FF / 60% ,30 FF"/>
										<br>(OT 3911)
								</p>
							</td>
							<td width="20%">
								
								<table border="0" cellspacing="0">
								  <tr>
								    <td>
								    <p><img src="/images/icons/bullet_go.png" alt="item" title="Item"/> tablas</p>
								    </td>
								  </tr>
								</table>
								
								
							</td>
							
							<td width="10%">
								
								<p class="">
								
										$ 196020.00
								</p>
							</td>
							
							<td width="10%">
								<p class="">
								
										$ 196020.00
								</p>
							</td>
							<td width="10%">
								<p class="">
								
										$ 39204.00
								</p>
							</td>
							<td width="10%">
								<p class="">
										(No entregado) - Anticipo 40%, 30 dias FF / 60% ,30 FF								</p>
							</td>
							<td width="10%" align="center">
							
															    <a class="AgregarOrdenDeCompra" id="3004"
								    href="/OrdenPago/Edit/ProveedorId/146"
								    ><img src="/images/icons/money_add.png" title="Liquidar"/> Pagar </a>
															    <br>
								    <a class="" id="146"
								    href="/FacturaCompra/Edit/ProveedorId/146"
								    ><img src="/images/icons/add.png" title="Liquidar"/> Validar OC </a>
								    <br>
								                        
							</td>
						</tr>
                    					<!-- items -->
									</table>
            </div> <!-- /listItems -->

</div> <!-- /list -->            
</div> <!-- /list -->