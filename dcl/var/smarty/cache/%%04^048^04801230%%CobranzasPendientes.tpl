175
a:4:{s:8:"template";a:1:{s:53:"Backend/GestionAdministrativa/CobranzasPendientes.tpl";b:1;}s:9:"timestamp";i:1411136583;s:7:"expires";i:1411136583;s:13:"cache_serials";a:0:{}}
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


<div style="width:850px">

<h1>Facturas pendientes de cobro (4)</h1>
           

<div class="list">

	<div class="list">
		<label for="kwd_search">Buscar:</label> <input type="text" id="kwd_search" value=""/>
        		<div class="listTop">
					<div>
						<table border="0" cellpadding="0" cellspacing="0">
							<tr>
								<td width="10%"><p>Fecha</p></td>
								<td width="10%"><p title="Numero de factura de venta">Factura</p></td>
								<td width="20%"><p>Cliente</p></td>
								<td width="12%"><p title="Total">Total</p></td>
								<td width="12%"><p title="Importe pendiente de pago. La orden de compra puede tener liquidaciones parciales">Pendiente</p></td>
								<td width="10%"><p>Vencimiento</p></td>
								<td width="10%"><p>Condicion</p></td> 
								<td width="10%"><p>Acciones</p></td>
							</tr>
						</table>
					</div>
                </div> <!-- /listadoTop -->
                
        <div class="listItems listItemsScroll">
                        
				<table id="my-table" style="border-collapse:collapse" border="0" cellpadding="0" cellspacing="0">
					
										<!-- items -->
					<tbody>
											<tr>
							<td width="10%">
								<p class="">
										11/03/2014 
								</p>
							</td>
							<td width="10%">
								<p class="">
										# 635
										<br>(OT 3590)<br>
								</p>
							</td>
							<td width="20%">
								Boker Arbolito
							</td>
							
							<td width="12%">
								
								<p class="">
								
										$ 30129.00
								</p>
							</td>
							
							<td width="12%">
								<p class="">
								
										$ 10365.03
								</p>
							</td>
							<td width="10%">
								<p class="">
										31/03/2014 
								</p>
							</td>
							<td width="10%">
								<p class="">
										Contra entrega
								</p>
							</td>
							<td width="10%" align="center">
								    
								    <a class="AgregarOrdenDeCompra" id="138"
								    href="/Cobranza/Edit/ClienteId/138"
								    ><img src="/images/icons/add.png" title="Cobrar"/> Cobrar </a>

							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										14/02/2014 
								</p>
							</td>
							<td width="10%">
								<p class="">
										# 627
										<br>(OT 3626)<br>
								</p>
							</td>
							<td width="20%">
								Gatorade
							</td>
							
							<td width="12%">
								
								<p class="">
								
										$ 7986.00
								</p>
							</td>
							
							<td width="12%">
								<p class="">
								
										$ 30.00
								</p>
							</td>
							<td width="10%">
								<p class="">
										14/04/2014 
								</p>
							</td>
							<td width="10%">
								<p class="">
										60 FF
								</p>
							</td>
							<td width="10%" align="center">
								    
								    <a class="AgregarOrdenDeCompra" id="121"
								    href="/Cobranza/Edit/ClienteId/121"
								    ><img src="/images/icons/add.png" title="Cobrar"/> Cobrar </a>

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
										# 653
										<br>(OT 3675)<br>
								</p>
							</td>
							<td width="20%">
								Rusty
							</td>
							
							<td width="12%">
								
								<p class="">
								
										$ 73462.73
								</p>
							</td>
							
							<td width="12%">
								<p class="">
								
										$ 6387.84
								</p>
							</td>
							<td width="10%">
								<p class="">
										02/07/2014 
								</p>
							</td>
							<td width="10%">
								<p class="">
										50% anticipo / 50% contra entrega (30 dias FF)
								</p>
							</td>
							<td width="10%" align="center">
								    
								    <a class="AgregarOrdenDeCompra" id="12"
								    href="/Cobranza/Edit/ClienteId/12"
								    ><img src="/images/icons/add.png" title="Cobrar"/> Cobrar </a>

							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										02/09/2014 
								</p>
							</td>
							<td width="10%">
								<p class="">
										# 659
										<br>(OT 3694)<br>
								</p>
							</td>
							<td width="20%">
								Ledesma
							</td>
							
							<td width="12%">
								
								<p class="">
								
										$ 7865.00
								</p>
							</td>
							
							<td width="12%">
								<p class="">
								
										$ 7865.00
								</p>
							</td>
							<td width="10%">
								<p class="">
										02/10/2014 
								</p>
							</td>
							<td width="10%">
								<p class="">
										50% anticipo / 50% contra entrega (30 dias FF)
								</p>
							</td>
							<td width="10%" align="center">
								    
								    <a class="AgregarOrdenDeCompra" id="97"
								    href="/Cobranza/Edit/ClienteId/97"
								    ><img src="/images/icons/add.png" title="Cobrar"/> Cobrar </a>

							</td>
						</tr>
                                        </tbody>
					<!-- items -->
									</table>
            </div> <!-- /listItems -->

</div> <!-- /list -->            
</div> <!-- /list -->

</div>