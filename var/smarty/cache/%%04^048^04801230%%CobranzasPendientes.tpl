175
a:4:{s:8:"template";a:1:{s:53:"Backend/GestionAdministrativa/CobranzasPendientes.tpl";b:1;}s:9:"timestamp";i:1462447493;s:7:"expires";i:1462447493;s:13:"cache_serials";a:0:{}}
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

<h1>Facturas pendientes de cobro (17)</h1>
           

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
										02/12/2014 
								</p>
							</td>
							<td width="10%">
								<p class="">
										# 675
										<br>(OT 3744)<br>
								</p>
							</td>
							<td width="20%">
								Allergan
							</td>
							
							<td width="12%">
								
								<p class="">
								
										$ 3795.53
								</p>
							</td>
							
							<td width="12%">
								<p class="">
								
										$ 0.00
								</p>
							</td>
							<td width="10%">
								<p class="">
										15/01/2015 
								</p>
							</td>
							<td width="10%">
								<p class="">
										Sin condicion
								</p>
							</td>
							<td width="10%" align="center">
								    
								    <a class="AgregarOrdenDeCompra" id="169"
								    href="/Cobranza/Edit/ClienteId/169"
								    ><img src="/images/icons/add.png" title="Cobrar"/> Cobrar </a>

							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										26/05/2015 
								</p>
							</td>
							<td width="10%">
								<p class="">
										# 708
										<br>(OT 3812)<br>
								</p>
							</td>
							<td width="20%">
								Tregar
							</td>
							
							<td width="12%">
								
								<p class="">
								
										$ 13310.00
								</p>
							</td>
							
							<td width="12%">
								<p class="">
								
										$ 577.50
								</p>
							</td>
							<td width="10%">
								<p class="">
										26/06/2015 
								</p>
							</td>
							<td width="10%">
								<p class="">
										50% anticipo / 50% contra entrega
								</p>
							</td>
							<td width="10%" align="center">
								    
								    <a class="AgregarOrdenDeCompra" id="154"
								    href="/Cobranza/Edit/ClienteId/154"
								    ><img src="/images/icons/add.png" title="Cobrar"/> Cobrar </a>

							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										31/07/2015 
								</p>
							</td>
							<td width="10%">
								<p class="">
										# 2000005
										<br>(OT 3846)<br>
								</p>
							</td>
							<td width="20%">
								Allergan
							</td>
							
							<td width="12%">
								
								<p class="">
								
										$ 883.30
								</p>
							</td>
							
							<td width="12%">
								<p class="">
								
										$ 21.90
								</p>
							</td>
							<td width="10%">
								<p class="">
										31/08/2015 
								</p>
							</td>
							<td width="10%">
								<p class="">
										Sin condicion
								</p>
							</td>
							<td width="10%" align="center">
								    
								    <a class="AgregarOrdenDeCompra" id="169"
								    href="/Cobranza/Edit/ClienteId/169"
								    ><img src="/images/icons/add.png" title="Cobrar"/> Cobrar </a>

							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										31/07/2015 
								</p>
							</td>
							<td width="10%">
								<p class="">
										# 724
										<br>(OT 3849)<br>
								</p>
							</td>
							<td width="20%">
								Allergan
							</td>
							
							<td width="12%">
								
								<p class="">
								
										$ 2940.30
								</p>
							</td>
							
							<td width="12%">
								<p class="">
								
										$ 136.10
								</p>
							</td>
							<td width="10%">
								<p class="">
										31/08/2015 
								</p>
							</td>
							<td width="10%">
								<p class="">
										Sin condicion
								</p>
							</td>
							<td width="10%" align="center">
								    
								    <a class="AgregarOrdenDeCompra" id="169"
								    href="/Cobranza/Edit/ClienteId/169"
								    ><img src="/images/icons/add.png" title="Cobrar"/> Cobrar </a>

							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										31/07/2015 
								</p>
							</td>
							<td width="10%">
								<p class="">
										# 725
										<br>(OT 3800)<br>
								</p>
							</td>
							<td width="20%">
								Allergan
							</td>
							
							<td width="12%">
								
								<p class="">
								
										$ 22034.10
								</p>
							</td>
							
							<td width="12%">
								<p class="">
								
										$ 810.50
								</p>
							</td>
							<td width="10%">
								<p class="">
										31/08/2015 
								</p>
							</td>
							<td width="10%">
								<p class="">
										50% anticipo, 30 dias FF / 50% Saldo, 60 dias FF
								</p>
							</td>
							<td width="10%" align="center">
								    
								    <a class="AgregarOrdenDeCompra" id="169"
								    href="/Cobranza/Edit/ClienteId/169"
								    ><img src="/images/icons/add.png" title="Cobrar"/> Cobrar </a>

							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										30/09/2015 
								</p>
							</td>
							<td width="10%">
								<p class="">
										# 2000017
										<br>(OT 3878)<br>
								</p>
							</td>
							<td width="20%">
								Allergan
							</td>
							
							<td width="12%">
								
								<p class="">
								
										$ 25918.20
								</p>
							</td>
							
							<td width="12%">
								<p class="">
								
										$ 971.00
								</p>
							</td>
							<td width="10%">
								<p class="">
										30/10/2015 
								</p>
							</td>
							<td width="10%">
								<p class="">
										Sin condicion
								</p>
							</td>
							<td width="10%" align="center">
								    
								    <a class="AgregarOrdenDeCompra" id="169"
								    href="/Cobranza/Edit/ClienteId/169"
								    ><img src="/images/icons/add.png" title="Cobrar"/> Cobrar </a>

							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										01/12/2015 
								</p>
							</td>
							<td width="10%">
								<p class="">
										# 2000026
										<br>(OT 3830)<br>
								</p>
							</td>
							<td width="20%">
								Allergan
							</td>
							
							<td width="12%">
								
								<p class="">
								
										$ 2879.80
								</p>
							</td>
							
							<td width="12%">
								<p class="">
								
										$ 71.40
								</p>
							</td>
							<td width="10%">
								<p class="">
										01/01/2016 
								</p>
							</td>
							<td width="10%">
								<p class="">
										50% anticipo / 50% contra entrega
								</p>
							</td>
							<td width="10%" align="center">
								    
								    <a class="AgregarOrdenDeCompra" id="169"
								    href="/Cobranza/Edit/ClienteId/169"
								    ><img src="/images/icons/add.png" title="Cobrar"/> Cobrar </a>

							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										01/12/2015 
								</p>
							</td>
							<td width="10%">
								<p class="">
										# 2000027
										<br>(OT 3865)<br>
								</p>
							</td>
							<td width="20%">
								Boker Arbolito
							</td>
							
							<td width="12%">
								
								<p class="">
								
										$ 58526.13
								</p>
							</td>
							
							<td width="12%">
								<p class="">
								
										$ 157.97
								</p>
							</td>
							<td width="10%">
								<p class="">
										01/01/2016 
								</p>
							</td>
							<td width="10%">
								<p class="">
										50 % anticipo / 50% contra entrega
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
										11/04/2016 
								</p>
							</td>
							<td width="10%">
								<p class="">
										# 2000001
										<br>(OT 3958)<br>
								</p>
							</td>
							<td width="20%">
								Boker Arbolito
							</td>
							
							<td width="12%">
								
								<p class="">
								
										$ 82280.00
								</p>
							</td>
							
							<td width="12%">
								<p class="">
								
										$ 0.78
								</p>
							</td>
							<td width="10%">
								<p class="">
										11/04/2016 
								</p>
							</td>
							<td width="10%">
								<p class="">
										Sin condicion
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
										12/04/2016 
								</p>
							</td>
							<td width="10%">
								<p class="">
										# 10000055
										<br>(OT 3934)<br>
								</p>
							</td>
							<td width="20%">
								Pucherito
							</td>
							
							<td width="12%">
								
								<p class="">
								
										$ 32782.15
								</p>
							</td>
							
							<td width="12%">
								<p class="">
								
										$ 3303.18
								</p>
							</td>
							<td width="10%">
								<p class="">
										12/04/2016 
								</p>
							</td>
							<td width="10%">
								<p class="">
										Sin condicion
								</p>
							</td>
							<td width="10%" align="center">
								    
								    <a class="AgregarOrdenDeCompra" id="170"
								    href="/Cobranza/Edit/ClienteId/170"
								    ><img src="/images/icons/add.png" title="Cobrar"/> Cobrar </a>

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
										# 2000004
										<br>(OT 3965)<br>
								</p>
							</td>
							<td width="20%">
								Zanella
							</td>
							
							<td width="12%">
								
								<p class="">
								
										$ 17036.80
								</p>
							</td>
							
							<td width="12%">
								<p class="">
								
										$ 17036.80
								</p>
							</td>
							<td width="10%">
								<p class="">
										29/04/2016 
								</p>
							</td>
							<td width="10%">
								<p class="">
										Sin condicion
								</p>
							</td>
							<td width="10%" align="center">
								    
								    <a class="AgregarOrdenDeCompra" id="180"
								    href="/Cobranza/Edit/ClienteId/180"
								    ><img src="/images/icons/add.png" title="Cobrar"/> Cobrar </a>

							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										01/04/2016 
								</p>
							</td>
							<td width="10%">
								<p class="">
										# 2000051
										<br>(OT 3953)<br>
								</p>
							</td>
							<td width="20%">
								Caba&ntilde;a Argentina
							</td>
							
							<td width="12%">
								
								<p class="">
								
										$ 83248.00
								</p>
							</td>
							
							<td width="12%">
								<p class="">
								
										$ 83248.00
								</p>
							</td>
							<td width="10%">
								<p class="">
										05/05/2016 
								</p>
							</td>
							<td width="10%">
								<p class="">
										Sin condicion
								</p>
							</td>
							<td width="10%" align="center">
								    
								    <a class="AgregarOrdenDeCompra" id="52"
								    href="/Cobranza/Edit/ClienteId/52"
								    ><img src="/images/icons/add.png" title="Cobrar"/> Cobrar </a>

							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										01/04/2016 
								</p>
							</td>
							<td width="10%">
								<p class="">
										# 2000052
										<br>(OT 3916)<br>
								</p>
							</td>
							<td width="20%">
								Caba&ntilde;a Argentina
							</td>
							
							<td width="12%">
								
								<p class="">
								
										$ 96445.35
								</p>
							</td>
							
							<td width="12%">
								<p class="">
								
										$ 96445.35
								</p>
							</td>
							<td width="10%">
								<p class="">
										05/05/2016 
								</p>
							</td>
							<td width="10%">
								<p class="">
										Sin condicion
								</p>
							</td>
							<td width="10%" align="center">
								    
								    <a class="AgregarOrdenDeCompra" id="52"
								    href="/Cobranza/Edit/ClienteId/52"
								    ><img src="/images/icons/add.png" title="Cobrar"/> Cobrar </a>

							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										01/04/2016 
								</p>
							</td>
							<td width="10%">
								<p class="">
										# 2000053
										<br>(OT 3948)<br>
								</p>
							</td>
							<td width="20%">
								Caba&ntilde;a Argentina
							</td>
							
							<td width="12%">
								
								<p class="">
								
										$ 4799.67
								</p>
							</td>
							
							<td width="12%">
								<p class="">
								
										$ 4799.67
								</p>
							</td>
							<td width="10%">
								<p class="">
										05/05/2016 
								</p>
							</td>
							<td width="10%">
								<p class="">
										Sin condicion
								</p>
							</td>
							<td width="10%" align="center">
								    
								    <a class="AgregarOrdenDeCompra" id="52"
								    href="/Cobranza/Edit/ClienteId/52"
								    ><img src="/images/icons/add.png" title="Cobrar"/> Cobrar </a>

							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										01/04/2016 
								</p>
							</td>
							<td width="10%">
								<p class="">
										# 2000054
										<br>(OT 3946)<br>
								</p>
							</td>
							<td width="20%">
								Caba&ntilde;a Argentina
							</td>
							
							<td width="12%">
								
								<p class="">
								
										$ 3630.00
								</p>
							</td>
							
							<td width="12%">
								<p class="">
								
										$ 3630.00
								</p>
							</td>
							<td width="10%">
								<p class="">
										05/05/2016 
								</p>
							</td>
							<td width="10%">
								<p class="">
										Sin condicion
								</p>
							</td>
							<td width="10%" align="center">
								    
								    <a class="AgregarOrdenDeCompra" id="52"
								    href="/Cobranza/Edit/ClienteId/52"
								    ><img src="/images/icons/add.png" title="Cobrar"/> Cobrar </a>

							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										01/04/2016 
								</p>
							</td>
							<td width="10%">
								<p class="">
										# 2000056
										<br>(OT 3885)<br>
								</p>
							</td>
							<td width="20%">
								Caba&ntilde;a Argentina
							</td>
							
							<td width="12%">
								
								<p class="">
								
										$ 55708.40
								</p>
							</td>
							
							<td width="12%">
								<p class="">
								
										$ 55708.40
								</p>
							</td>
							<td width="10%">
								<p class="">
										05/05/2016 
								</p>
							</td>
							<td width="10%">
								<p class="">
										50% anticipo / 50 %, 30 dias FF
								</p>
							</td>
							<td width="10%" align="center">
								    
								    <a class="AgregarOrdenDeCompra" id="52"
								    href="/Cobranza/Edit/ClienteId/52"
								    ><img src="/images/icons/add.png" title="Cobrar"/> Cobrar </a>

							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										01/04/2016 
								</p>
							</td>
							<td width="10%">
								<p class="">
										# 2000058
										<br>(OT 3910)<br>
								</p>
							</td>
							<td width="20%">
								Caba&ntilde;a Argentina
							</td>
							
							<td width="12%">
								
								<p class="">
								
										$ 48687.38
								</p>
							</td>
							
							<td width="12%">
								<p class="">
								
										$ 48687.38
								</p>
							</td>
							<td width="10%">
								<p class="">
										05/05/2016 
								</p>
							</td>
							<td width="10%">
								<p class="">
										Sin condicion
								</p>
							</td>
							<td width="10%" align="center">
								    
								    <a class="AgregarOrdenDeCompra" id="52"
								    href="/Cobranza/Edit/ClienteId/52"
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