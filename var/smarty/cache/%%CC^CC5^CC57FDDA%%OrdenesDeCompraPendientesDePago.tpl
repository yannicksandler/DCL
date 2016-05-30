182
a:4:{s:8:"template";a:1:{s:60:"Backend/GestionEconomica/OrdenesDeCompraPendientesDePago.tpl";b:1;}s:9:"timestamp";i:1461603360;s:7:"expires";i:1461603360;s:13:"cache_serials";a:0:{}}
<script type="text/javascript">
$(document).ready(function(){
    $("#FormObservacion").validate();

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

	$('.Aptitud').click(function() {
        var aptitud	=	$(this).val();
        //alert(aptitud);
		
		if (!aptitud)
		{
			$('#error').html('<p class="error" style="width:61%;">Error al obtener la aptitud</p>');
			return false;
		}

		var examenId			=	$('#ExamenId').val();
		
		$.ajax({
			type: "POST",
			url: '/Examen/SetAptitud/ExamenId/' + examenId,
			dataType: "text/html",
			data: {
				'Aptitud': aptitud
			},
			success: function(html){
				$("#error").html(html);
				// set aptitud ajax
				//window.location.reload();
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


            
<h1>Ordenes de compra pendientes de pago (28)</h1>


<div class="" style="width:90%">

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
								<td width="10%"><p title="Importe pendiente de pago. La orden de compra puede tener liquidaciones parciales">Pendiente</p></td>
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
										20/04/2016
								</p>
							</td>
							<td width="10%">
								<p class="">
										Obra-Completa
								</p>
							</td>
							<td width="10%">
								<p class="">
										# 3130
										<img src="/images/icons/zoom_in.png" title="(No entregado) - cheque"/>
										<br>(OT 3959)
								</p>
							</td>
							<td width="20%">
																<table border="0" cellspacing="0">
								  <tr>
								    <td>
								    <p><img src="/images/icons/bullet_go.png" alt="item" title="Item"/> confeccion de ruleta</p>
								    </td>
								  </tr>
								</table>
								
															</td>
							
							<td width="10%">
								
								<p class="">
								
										$ 3913.62
								</p>
							</td>
							
							<td width="10%">
								<p class="">
								
										$ 3913.62
								</p>
							</td>
							<td width="10%">
								<p class="">
										No entregado) - cheque
								</p>
							</td>
							<td width="10%" align="center">
							
								    <a class="AgregarOrdenDeCompra" id="3130"
								    href="/OrdenPago/Edit/ProveedorId/341"
								    ><img src="/images/icons/add.png" title="Liquidar"/> Pagar </a>
								                        
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
										<img src="/images/icons/zoom_in.png" title="(No entregado) - cheque"/>
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
										No entregado) - cheque
								</p>
							</td>
							<td width="10%" align="center">
							
								    <a class="AgregarOrdenDeCompra" id="3129"
								    href="/OrdenPago/Edit/ProveedorId/242"
								    ><img src="/images/icons/add.png" title="Liquidar"/> Pagar </a>
								                        
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										22/03/2016
								</p>
							</td>
							<td width="10%">
								<p class="">
										El fenix
								</p>
							</td>
							<td width="10%">
								<p class="">
										# 3102
										<img src="/images/icons/zoom_in.png" title="(Entregado) - Sin forma de pago"/>
										<br>(OT 3946)
								</p>
							</td>
							<td width="20%">
																<table border="0" cellspacing="0">
								  <tr>
								    <td>
								    <p><img src="/images/icons/bullet_go.png" alt="item" title="Item"/> incremento en presupuesto x inflacion</p>
								    </td>
								  </tr>
								</table>
								
															</td>
							
							<td width="10%">
								
								<p class="">
								
										$ 1842.23
								</p>
							</td>
							
							<td width="10%">
								<p class="">
								
										$ 1842.23
								</p>
							</td>
							<td width="10%">
								<p class="">
										Entregado) - Sin forma de pago
								</p>
							</td>
							<td width="10%" align="center">
							
								    <a class="AgregarOrdenDeCompra" id="3102"
								    href="/OrdenPago/Edit/ProveedorId/21"
								    ><img src="/images/icons/add.png" title="Liquidar"/> Pagar </a>
								                        
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
										<img src="/images/icons/zoom_in.png" title="(No entregado) - cheque"/>
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
										No entregado) - cheque
								</p>
							</td>
							<td width="10%" align="center">
							
								    <a class="AgregarOrdenDeCompra" id="3124"
								    href="/OrdenPago/Edit/ProveedorId/88"
								    ><img src="/images/icons/add.png" title="Liquidar"/> Pagar </a>
								                        
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
										Siris remiseria
								</p>
							</td>
							<td width="10%">
								<p class="">
										# 3134
										<img src="/images/icons/zoom_in.png" title="(Entregado) - cta corriente"/>
										<br>(OT 3931)
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
								
										$ 840.00
								</p>
							</td>
							
							<td width="10%">
								<p class="">
								
										$ 840.00
								</p>
							</td>
							<td width="10%">
								<p class="">
										Entregado) - cta corriente
								</p>
							</td>
							<td width="10%" align="center">
							
								    <a class="AgregarOrdenDeCompra" id="3134"
								    href="/OrdenPago/Edit/ProveedorId/230"
								    ><img src="/images/icons/add.png" title="Liquidar"/> Pagar </a>
								                        
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										28/01/2016
								</p>
							</td>
							<td width="10%">
								<p class="">
										Imprenta Packman
								</p>
							</td>
							<td width="10%">
								<p class="">
										# 3040
										<img src="/images/icons/zoom_in.png" title="(Entregado) - cheque"/>
										<br>(OT 3927)
								</p>
							</td>
							<td width="20%">
																<table border="0" cellspacing="0">
								  <tr>
								    <td>
								    <p><img src="/images/icons/bullet_go.png" alt="item" title="Item"/> produccion fondos vidriera</p>
								    </td>
								  </tr>
								</table>
								
															</td>
							
							<td width="10%">
								
								<p class="">
								
										$ 21659.06
								</p>
							</td>
							
							<td width="10%">
								<p class="">
								
										$ 21659.06
								</p>
							</td>
							<td width="10%">
								<p class="">
										Entregado) - cheque
								</p>
							</td>
							<td width="10%" align="center">
							
								    <a class="AgregarOrdenDeCompra" id="3040"
								    href="/OrdenPago/Edit/ProveedorId/88"
								    ><img src="/images/icons/add.png" title="Liquidar"/> Pagar </a>
								                        
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										23/02/2016
								</p>
							</td>
							<td width="10%">
								<p class="">
										Marroquineria Alberto A
								</p>
							</td>
							<td width="10%">
								<p class="">
										# 3079
										<img src="/images/icons/zoom_in.png" title="(No entregado) - Sin forma de pago"/>
										<br>(OT 3916)
								</p>
							</td>
							<td width="20%">
																<table border="0" cellspacing="0">
								  <tr>
								    <td>
								    <p><img src="/images/icons/bullet_go.png" alt="item" title="Item"/> maletines</p>
								    </td>
								  </tr>
								</table>
								
															</td>
							
							<td width="10%">
								
								<p class="">
								
										$ 101640.00
								</p>
							</td>
							
							<td width="10%">
								<p class="">
								
										$ 101640.00
								</p>
							</td>
							<td width="10%">
								<p class="">
										No entregado) - Sin forma de pago
								</p>
							</td>
							<td width="10%" align="center">
							
								    <a class="AgregarOrdenDeCompra" id="3079"
								    href="/OrdenPago/Edit/ProveedorId/268"
								    ><img src="/images/icons/add.png" title="Liquidar"/> Pagar </a>
								                        
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
										<img src="/images/icons/zoom_in.png" title="(No entregado) - Anticipo 40%, 30 dias FF / 60% ,30 FF"/>
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
										No entregado) - Anticipo 40%, 30 dias FF / 60% ,30 FF
								</p>
							</td>
							<td width="10%" align="center">
							
								    <a class="AgregarOrdenDeCompra" id="3005"
								    href="/OrdenPago/Edit/ProveedorId/195"
								    ><img src="/images/icons/add.png" title="Liquidar"/> Pagar </a>
								                        
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
										<img src="/images/icons/zoom_in.png" title="(No entregado) - Anticipo 40%, 30 dias FF / 60% ,30 FF"/>
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
										No entregado) - Anticipo 40%, 30 dias FF / 60% ,30 FF
								</p>
							</td>
							<td width="10%" align="center">
							
								    <a class="AgregarOrdenDeCompra" id="3004"
								    href="/OrdenPago/Edit/ProveedorId/146"
								    ><img src="/images/icons/add.png" title="Liquidar"/> Pagar </a>
								                        
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
										Ecofactory
								</p>
							</td>
							<td width="10%">
								<p class="">
										# 3015
										<img src="/images/icons/zoom_in.png" title="(No entregado) - 30% anticipo y 70%, 30 dias FF"/>
										<br>(OT 3910)
								</p>
							</td>
							<td width="20%">
																<table border="0" cellspacing="0">
								  <tr>
								    <td>
								    <p><img src="/images/icons/bullet_go.png" alt="item" title="Item"/> Delantales</p>
								    </td>
								  </tr>
								</table>
								
															</td>
							
							<td width="10%">
								
								<p class="">
								
										$ 48763.00
								</p>
							</td>
							
							<td width="10%">
								<p class="">
								
										$ 48763.00
								</p>
							</td>
							<td width="10%">
								<p class="">
										No entregado) - 30% anticipo y 70%, 30 dias FF
								</p>
							</td>
							<td width="10%" align="center">
							
								    <a class="AgregarOrdenDeCompra" id="3015"
								    href="/OrdenPago/Edit/ProveedorId/343"
								    ><img src="/images/icons/add.png" title="Liquidar"/> Pagar </a>
								                        
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
										# 3006
										<img src="/images/icons/zoom_in.png" title="(No entregado) - Anticipo 40%, 30 dias FF / 60% ,30 FF"/>
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
										No entregado) - Anticipo 40%, 30 dias FF / 60% ,30 FF
								</p>
							</td>
							<td width="10%" align="center">
							
								    <a class="AgregarOrdenDeCompra" id="3006"
								    href="/OrdenPago/Edit/ProveedorId/195"
								    ><img src="/images/icons/add.png" title="Liquidar"/> Pagar </a>
								                        
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
										<img src="/images/icons/zoom_in.png" title="(No entregado) - Anticipo 40%, 30 dias FF / 60% ,30 FF"/>
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
										No entregado) - Anticipo 40%, 30 dias FF / 60% ,30 FF
								</p>
							</td>
							<td width="10%" align="center">
							
								    <a class="AgregarOrdenDeCompra" id="3003"
								    href="/OrdenPago/Edit/ProveedorId/146"
								    ><img src="/images/icons/add.png" title="Liquidar"/> Pagar </a>
								                        
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										20/11/2015
								</p>
							</td>
							<td width="10%">
								<p class="">
										STENFAR
								</p>
							</td>
							<td width="10%">
								<p class="">
										# 2922
										<img src="/images/icons/zoom_in.png" title="(Entregado) - cheque 30 dias ff"/>
										<br>(OT 3900)
								</p>
							</td>
							<td width="20%">
																<table border="0" cellspacing="0">
								  <tr>
								    <td>
								    <p><img src="/images/icons/bullet_go.png" alt="item" title="Item"/> cartulina tx 72x102 340gr</p>
								    </td>
								  </tr>
								</table>
								
															</td>
							
							<td width="10%">
								
								<p class="">
								
										$ 2793.29
								</p>
							</td>
							
							<td width="10%">
								<p class="">
								
										$ 2793.29
								</p>
							</td>
							<td width="10%">
								<p class="">
										Entregado) - cheque 30 dias ff
								</p>
							</td>
							<td width="10%" align="center">
							
								    <a class="AgregarOrdenDeCompra" id="2922"
								    href="/OrdenPago/Edit/ProveedorId/242"
								    ><img src="/images/icons/add.png" title="Liquidar"/> Pagar </a>
								                        
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
										<img src="/images/icons/zoom_in.png" title="(No entregado) - 50% de anticipo 50% saldo contra entrega"/>
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
										No entregado) - 50% de anticipo 50% saldo contra entrega
								</p>
							</td>
							<td width="10%" align="center">
							
								    <a class="AgregarOrdenDeCompra" id="3127"
								    href="/OrdenPago/Edit/ProveedorId/349"
								    ><img src="/images/icons/add.png" title="Liquidar"/> Pagar </a>
								                        
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
										<img src="/images/icons/zoom_in.png" title="(No entregado) - 50% de anticipo 50% saldo contra entrega"/>
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
										No entregado) - 50% de anticipo 50% saldo contra entrega
								</p>
							</td>
							<td width="10%" align="center">
							
								    <a class="AgregarOrdenDeCompra" id="3029"
								    href="/OrdenPago/Edit/ProveedorId/202"
								    ><img src="/images/icons/add.png" title="Liquidar"/> Pagar </a>
								                        
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
										<img src="/images/icons/zoom_in.png" title="(Entregado) - Sin forma de pago"/>
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
										Entregado) - Sin forma de pago
								</p>
							</td>
							<td width="10%" align="center">
							
								    <a class="AgregarOrdenDeCompra" id="2997"
								    href="/OrdenPago/Edit/ProveedorId/284"
								    ><img src="/images/icons/add.png" title="Liquidar"/> Pagar </a>
								                        
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
										<img src="/images/icons/zoom_in.png" title="(Entregado) - cta corriente"/>
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
										Entregado) - cta corriente
								</p>
							</td>
							<td width="10%" align="center">
							
								    <a class="AgregarOrdenDeCompra" id="2832"
								    href="/OrdenPago/Edit/ProveedorId/21"
								    ><img src="/images/icons/add.png" title="Liquidar"/> Pagar </a>
								                        
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
										<img src="/images/icons/zoom_in.png" title="(Entregado) - cta corriente"/>
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
										Entregado) - cta corriente
								</p>
							</td>
							<td width="10%" align="center">
							
								    <a class="AgregarOrdenDeCompra" id="2684"
								    href="/OrdenPago/Edit/ProveedorId/21"
								    ><img src="/images/icons/add.png" title="Liquidar"/> Pagar </a>
								                        
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
										<img src="/images/icons/zoom_in.png" title="(Entregado) - cheque"/>
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
										Entregado) - cheque
								</p>
							</td>
							<td width="10%" align="center">
							
								    <a class="AgregarOrdenDeCompra" id="2646"
								    href="/OrdenPago/Edit/ProveedorId/341"
								    ><img src="/images/icons/add.png" title="Liquidar"/> Pagar </a>
								                        
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
										<img src="/images/icons/zoom_in.png" title="(Entregado) - cta corriente"/>
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
										Entregado) - cta corriente
								</p>
							</td>
							<td width="10%" align="center">
							
								    <a class="AgregarOrdenDeCompra" id="2671"
								    href="/OrdenPago/Edit/ProveedorId/21"
								    ><img src="/images/icons/add.png" title="Liquidar"/> Pagar </a>
								                        
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										09/02/2015
								</p>
							</td>
							<td width="10%">
								<p class="">
										Todoplastic
								</p>
							</td>
							<td width="10%">
								<p class="">
										# 2566
										<img src="/images/icons/zoom_in.png" title="(Entregado) - Efectivo"/>
										<br>(OT 3771)
								</p>
							</td>
							<td width="20%">
																<table border="0" cellspacing="0">
								  <tr>
								    <td>
								    <p><img src="/images/icons/bullet_go.png" alt="item" title="Item"/> Elementos embalaje</p>
								    </td>
								  </tr>
								</table>
								
															</td>
							
							<td width="10%">
								
								<p class="">
								
										$ 2011.50
								</p>
							</td>
							
							<td width="10%">
								<p class="">
								
										$ 2011.50
								</p>
							</td>
							<td width="10%">
								<p class="">
										Entregado) - Efectivo
								</p>
							</td>
							<td width="10%" align="center">
							
								    <a class="AgregarOrdenDeCompra" id="2566"
								    href="/OrdenPago/Edit/ProveedorId/258"
								    ><img src="/images/icons/add.png" title="Liquidar"/> Pagar </a>
								                        
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										09/02/2015
								</p>
							</td>
							<td width="10%">
								<p class="">
										Todoplastic
								</p>
							</td>
							<td width="10%">
								<p class="">
										# 2564
										<img src="/images/icons/zoom_in.png" title="(Entregado) - Efectivo"/>
										<br>(OT 3770)
								</p>
							</td>
							<td width="20%">
																<table border="0" cellspacing="0">
								  <tr>
								    <td>
								    <p><img src="/images/icons/bullet_go.png" alt="item" title="Item"/> Bolsas contenedoras + cinta + film</p>
								    </td>
								  </tr>
								</table>
								
															</td>
							
							<td width="10%">
								
								<p class="">
								
										$ 1691.94
								</p>
							</td>
							
							<td width="10%">
								<p class="">
								
										$ 1691.94
								</p>
							</td>
							<td width="10%">
								<p class="">
										Entregado) - Efectivo
								</p>
							</td>
							<td width="10%" align="center">
							
								    <a class="AgregarOrdenDeCompra" id="2564"
								    href="/OrdenPago/Edit/ProveedorId/258"
								    ><img src="/images/icons/add.png" title="Liquidar"/> Pagar </a>
								                        
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										09/02/2015
								</p>
							</td>
							<td width="10%">
								<p class="">
										Todoplastic
								</p>
							</td>
							<td width="10%">
								<p class="">
										# 2565
										<img src="/images/icons/zoom_in.png" title="(Entregado) - Efectivo"/>
										<br>(OT 3769)
								</p>
							</td>
							<td width="20%">
																<table border="0" cellspacing="0">
								  <tr>
								    <td>
								    <p><img src="/images/icons/bullet_go.png" alt="item" title="Item"/> Bolsas contenedoras + cinta + film</p>
								    </td>
								  </tr>
								</table>
								
															</td>
							
							<td width="10%">
								
								<p class="">
								
										$ 1691.94
								</p>
							</td>
							
							<td width="10%">
								<p class="">
								
										$ 1691.94
								</p>
							</td>
							<td width="10%">
								<p class="">
										Entregado) - Efectivo
								</p>
							</td>
							<td width="10%" align="center">
							
								    <a class="AgregarOrdenDeCompra" id="2565"
								    href="/OrdenPago/Edit/ProveedorId/258"
								    ><img src="/images/icons/add.png" title="Liquidar"/> Pagar </a>
								                        
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										17/12/2014
								</p>
							</td>
							<td width="10%">
								<p class="">
										Difapro
								</p>
							</td>
							<td width="10%">
								<p class="">
										# 2477
										<img src="/images/icons/zoom_in.png" title="(Entregado) - Sin forma de pago"/>
										<br>(OT 3741)
								</p>
							</td>
							<td width="20%">
																<table border="0" cellspacing="0">
								  <tr>
								    <td>
								    <p><img src="/images/icons/bullet_go.png" alt="item" title="Item"/> Bolígrafos</p>
								    </td>
								  </tr>
								</table>
								
															</td>
							
							<td width="10%">
								
								<p class="">
								
										$ 34919.46
								</p>
							</td>
							
							<td width="10%">
								<p class="">
								
										$ 34919.46
								</p>
							</td>
							<td width="10%">
								<p class="">
										Entregado) - Sin forma de pago
								</p>
							</td>
							<td width="10%" align="center">
							
								    <a class="AgregarOrdenDeCompra" id="2477"
								    href="/OrdenPago/Edit/ProveedorId/328"
								    ><img src="/images/icons/add.png" title="Liquidar"/> Pagar </a>
								                        
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										16/12/2014
								</p>
							</td>
							<td width="10%">
								<p class="">
										Lamigraf
								</p>
							</td>
							<td width="10%">
								<p class="">
										# 2472
										<img src="/images/icons/zoom_in.png" title="(Entregado) - cheque"/>
										<br>(OT 3710)
								</p>
							</td>
							<td width="20%">
																<table border="0" cellspacing="0">
								  <tr>
								    <td>
								    <p><img src="/images/icons/bullet_go.png" alt="item" title="Item"/> laminacion pp brillante</p>
								    </td>
								  </tr>
								</table>
								
															</td>
							
							<td width="10%">
								
								<p class="">
								
										$ 1317.25
								</p>
							</td>
							
							<td width="10%">
								<p class="">
								
										$ 1317.25
								</p>
							</td>
							<td width="10%">
								<p class="">
										Entregado) - cheque
								</p>
							</td>
							<td width="10%" align="center">
							
								    <a class="AgregarOrdenDeCompra" id="2472"
								    href="/OrdenPago/Edit/ProveedorId/191"
								    ><img src="/images/icons/add.png" title="Liquidar"/> Pagar </a>
								                        
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										16/12/2014
								</p>
							</td>
							<td width="10%">
								<p class="">
										Lamigraf
								</p>
							</td>
							<td width="10%">
								<p class="">
										# 2471
										<img src="/images/icons/zoom_in.png" title="(Entregado) - cheque"/>
										<br>(OT 3700)
								</p>
							</td>
							<td width="20%">
																<table border="0" cellspacing="0">
								  <tr>
								    <td>
								    <p><img src="/images/icons/bullet_go.png" alt="item" title="Item"/> laminacion pp brillante</p>
								    </td>
								  </tr>
								</table>
								
															</td>
							
							<td width="10%">
								
								<p class="">
								
										$ 1146.72
								</p>
							</td>
							
							<td width="10%">
								<p class="">
								
										$ 1146.72
								</p>
							</td>
							<td width="10%">
								<p class="">
										Entregado) - cheque
								</p>
							</td>
							<td width="10%" align="center">
							
								    <a class="AgregarOrdenDeCompra" id="2471"
								    href="/OrdenPago/Edit/ProveedorId/191"
								    ><img src="/images/icons/add.png" title="Liquidar"/> Pagar </a>
								                        
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										08/05/2014
								</p>
							</td>
							<td width="10%">
								<p class="">
										STENFAR
								</p>
							</td>
							<td width="10%">
								<p class="">
										# 2100
										<img src="/images/icons/zoom_in.png" title="(Entregado) - cta corriente "/>
										<br>(OT 3627)
								</p>
							</td>
							<td width="20%">
																<table border="0" cellspacing="0">
								  <tr>
								    <td>
								    <p><img src="/images/icons/bullet_go.png" alt="item" title="Item"/> cartulina tx Suz 300 gr</p>
								    </td>
								  </tr>
								</table>
								
															</td>
							
							<td width="10%">
								
								<p class="">
								
										$ 2366.16
								</p>
							</td>
							
							<td width="10%">
								<p class="">
								
										$ 2366.16
								</p>
							</td>
							<td width="10%">
								<p class="">
										Entregado) - cta corriente 
								</p>
							</td>
							<td width="10%" align="center">
							
								    <a class="AgregarOrdenDeCompra" id="2100"
								    href="/OrdenPago/Edit/ProveedorId/242"
								    ><img src="/images/icons/add.png" title="Liquidar"/> Pagar </a>
								                        
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										03/12/2013
								</p>
							</td>
							<td width="10%">
								<p class="">
										Acrylux
								</p>
							</td>
							<td width="10%">
								<p class="">
										# 1757
										<img src="/images/icons/zoom_in.png" title="(Entregado) - cheque "/>
										<br>(OT 3595)
								</p>
							</td>
							<td width="20%">
																<table border="0" cellspacing="0">
								  <tr>
								    <td>
								    <p><img src="/images/icons/bullet_go.png" alt="item" title="Item"/> premios acrilico</p>
								    </td>
								  </tr>
								</table>
								
															</td>
							
							<td width="10%">
								
								<p class="">
								
										$ 2456.30
								</p>
							</td>
							
							<td width="10%">
								<p class="">
								
										$ 2456.30
								</p>
							</td>
							<td width="10%">
								<p class="">
										Entregado) - cheque 
								</p>
							</td>
							<td width="10%" align="center">
							
								    <a class="AgregarOrdenDeCompra" id="1757"
								    href="/OrdenPago/Edit/ProveedorId/80"
								    ><img src="/images/icons/add.png" title="Liquidar"/> Pagar </a>
								                        
							</td>
						</tr>
                    					<!-- items -->
									</table>
            </div> <!-- /listItems -->

</div> <!-- /list -->            
</div> <!-- /list -->