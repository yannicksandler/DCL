182
a:4:{s:8:"template";a:1:{s:60:"Backend/GestionEconomica/OrdenesDeCompraPendientesDePago.tpl";b:1;}s:9:"timestamp";i:1409778189;s:7:"expires";i:1409778189;s:13:"cache_serials";a:0:{}}
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


            
<h1>Ordenes de compra pendientes de pago (4)</h1>


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
										02/09/2014
								</p>
							</td>
							<td width="10%">
								<p class="">
										eduardo cazala
								</p>
							</td>
							<td width="10%">
								<p class="">
										# 2357
										<img src="/images/icons/zoom_in.png" title="(No entregado) - Efectivo"/>
										<br>(OT 3694)
								</p>
							</td>
							<td width="20%">
																<table border="0" cellspacing="0">
								  <tr>
								    <td>
								    <p><img src="/images/icons/bullet_go.png" alt="item" title="Item"/> pie de carton blanco 25 cm alto</p>
								    </td>
								  </tr>
								</table>
								
															</td>
							
							<td width="10%">
								
								<p class="">
								
										$ 114.95
								</p>
							</td>
							
							<td width="10%">
								<p class="">
								
										$ 114.95
								</p>
							</td>
							<td width="10%">
								<p class="">
										No entregado) - Efectivo
								</p>
							</td>
							<td width="10%" align="center">
							
								    <a class="AgregarOrdenDeCompra" id="2357"
								    href="/OrdenPago/Edit/ProveedorId/41"
								    ><img src="/images/icons/add.png" title="Liquidar"/> Pagar </a>
								                        
							</td>
						</tr>
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
										<img src="/images/icons/zoom_in.png" title="(No entregado) - cheque"/>
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
										No entregado) - cheque
								</p>
							</td>
							<td width="10%" align="center">
							
								    <a class="AgregarOrdenDeCompra" id="2272"
								    href="/OrdenPago/Edit/ProveedorId/202"
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