176
a:4:{s:8:"template";a:1:{s:54:"Backend/GestionAdministrativa/FacturacionPendiente.tpl";b:1;}s:9:"timestamp";i:1461678344;s:7:"expires";i:1461678344;s:13:"cache_serials";a:0:{}}
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
				$("#HomeContent").html(html);
				
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
					$("#HomeContent").html(html);
					// set aptitud ajax
					//window.location.reload();
				}
	
			});
		}
		
		//return false;
  	}); 
  	 
	
});

</script>


<h1>Ordenes de trabajo pendientes de facturar (35)</h1>


<div class="" style="width:90%">

	<div class="list">
		<label for="kwd_search">Buscar:</label> <input type="text" id="kwd_search" value=""/>
        		<div class="listTop">
					<div>
						<table border="0" cellpadding="0" cellspacing="0">
							<tr>
								<td width="10%"><p>Producto</p></td>
								<td width="10%"><p title="Numero de orden de trabajo">OT</p></td>
								<td width="10%"><p>Cliente</p></td>
								<td width="10%"><p title="Total neto (sin IVA)">Total neto</p></td> 
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
										Tarimas
								</p>
							</td>
							<td width="10%">
								<p class="">
										# 3965
										 (Finalizado)
								</p>
							</td>
							<td width="10%">
								Zanella
							</td>
							
							<td width="10%">
								
								<p class="">
								
										$ 14080.00
								</p>
							</td>
							
							
							<td width="10%" align="center">
								    
								    <a class="AgregarOrdenDeCompra" id="180"
								    href="/Facturacion/Facturar/ClienteId/180"
								    ><img src="/images/icons/add.png" title="Facturar"/> Facturar </a>

							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										Respaldar ginger
								</p>
							</td>
							<td width="10%">
								<p class="">
										# 3955
										 (En produccion)
								</p>
							</td>
							<td width="10%">
								CACIC SPORTS VISION
							</td>
							
							<td width="10%">
								
								<p class="">
								
										$ 22100.00
								</p>
							</td>
							
							
							<td width="10%" align="center">
								    
								    <a class="AgregarOrdenDeCompra" id="12"
								    href="/Facturacion/Facturar/ClienteId/12"
								    ><img src="/images/icons/add.png" title="Facturar"/> Facturar </a>

							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										Tarimas
								</p>
							</td>
							<td width="10%">
								<p class="">
										# 3954
										 (Aprobado)
								</p>
							</td>
							<td width="10%">
								Zanella
							</td>
							
							<td width="10%">
								
								<p class="">
								
										$ 14080.00
								</p>
							</td>
							
							
							<td width="10%" align="center">
								    
								    <a class="AgregarOrdenDeCompra" id="180"
								    href="/Facturacion/Facturar/ClienteId/180"
								    ><img src="/images/icons/add.png" title="Facturar"/> Facturar </a>

							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										Incremento kits vendedor
								</p>
							</td>
							<td width="10%">
								<p class="">
										# 3937
										 (En produccion)
								</p>
							</td>
							<td width="10%">
								Caba&ntilde;a Argentina
							</td>
							
							<td width="10%">
								
								<p class="">
								
										$ 4872.27
								</p>
							</td>
							
							
							<td width="10%" align="center">
								    
								    <a class="AgregarOrdenDeCompra" id="52"
								    href="/Facturacion/Facturar/ClienteId/52"
								    ><img src="/images/icons/add.png" title="Facturar"/> Facturar </a>

							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										Buzon
								</p>
							</td>
							<td width="10%">
								<p class="">
										# 3931
										 (Finalizado)
								</p>
							</td>
							<td width="10%">
								Caba&ntilde;a Argentina
							</td>
							
							<td width="10%">
								
								<p class="">
								
										$ 47250.00
								</p>
							</td>
							
							
							<td width="10%" align="center">
								    
								    <a class="AgregarOrdenDeCompra" id="52"
								    href="/Facturacion/Facturar/ClienteId/52"
								    ><img src="/images/icons/add.png" title="Facturar"/> Facturar </a>

							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										Calcos autoahdesivos
								</p>
							</td>
							<td width="10%">
								<p class="">
										# 3924
										 (En produccion)
								</p>
							</td>
							<td width="10%">
								Caba&ntilde;a Argentina
							</td>
							
							<td width="10%">
								
								<p class="">
								
										$ 64800.00
								</p>
							</td>
							
							
							<td width="10%" align="center">
								    
								    <a class="AgregarOrdenDeCompra" id="52"
								    href="/Facturacion/Facturar/ClienteId/52"
								    ><img src="/images/icons/add.png" title="Facturar"/> Facturar </a>

							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										Cuadernos kit vendedor
								</p>
							</td>
							<td width="10%">
								<p class="">
										# 3915
										 (En produccion)
								</p>
							</td>
							<td width="10%">
								Caba&ntilde;a Argentina
							</td>
							
							<td width="10%">
								
								<p class="">
								
										$ 79706.90
								</p>
							</td>
							
							
							<td width="10%" align="center">
								    
								    <a class="AgregarOrdenDeCompra" id="52"
								    href="/Facturacion/Facturar/ClienteId/52"
								    ><img src="/images/icons/add.png" title="Facturar"/> Facturar </a>

							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										Armado c/hueso
								</p>
							</td>
							<td width="10%">
								<p class="">
										# 3914
										 (Aprobado)
								</p>
							</td>
							<td width="10%">
								Caba&ntilde;a Argentina
							</td>
							
							<td width="10%">
								
								<p class="">
								
										$ 18000.00
								</p>
							</td>
							
							
							<td width="10%" align="center">
								    
								    <a class="AgregarOrdenDeCompra" id="52"
								    href="/Facturacion/Facturar/ClienteId/52"
								    ><img src="/images/icons/add.png" title="Facturar"/> Facturar </a>

							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										Armado s/hueso
								</p>
							</td>
							<td width="10%">
								<p class="">
										# 3913
										 (Aprobado)
								</p>
							</td>
							<td width="10%">
								Caba&ntilde;a Argentina
							</td>
							
							<td width="10%">
								
								<p class="">
								
										$ 9650.00
								</p>
							</td>
							
							
							<td width="10%" align="center">
								    
								    <a class="AgregarOrdenDeCompra" id="52"
								    href="/Facturacion/Facturar/ClienteId/52"
								    ><img src="/images/icons/add.png" title="Facturar"/> Facturar </a>

							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										Cuchillos
								</p>
							</td>
							<td width="10%">
								<p class="">
										# 3912
										 (En produccion)
								</p>
							</td>
							<td width="10%">
								Caba&ntilde;a Argentina
							</td>
							
							<td width="10%">
								
								<p class="">
								
										$ 176750.00
								</p>
							</td>
							
							
							<td width="10%" align="center">
								    
								    <a class="AgregarOrdenDeCompra" id="52"
								    href="/Facturacion/Facturar/ClienteId/52"
								    ><img src="/images/icons/add.png" title="Facturar"/> Facturar </a>

							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										Tablas
								</p>
							</td>
							<td width="10%">
								<p class="">
										# 3911
										 (En produccion)
								</p>
							</td>
							<td width="10%">
								Caba&ntilde;a Argentina
							</td>
							
							<td width="10%">
								
								<p class="">
								
										$ 157710.00
								</p>
							</td>
							
							
							<td width="10%" align="center">
								    
								    <a class="AgregarOrdenDeCompra" id="52"
								    href="/Facturacion/Facturar/ClienteId/52"
								    ><img src="/images/icons/add.png" title="Facturar"/> Facturar </a>

							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										Cuchillos 
								</p>
							</td>
							<td width="10%">
								<p class="">
										# 3909
										 (En produccion)
								</p>
							</td>
							<td width="10%">
								Caba&ntilde;a Argentina
							</td>
							
							<td width="10%">
								
								<p class="">
								
										$ 265125.00
								</p>
							</td>
							
							
							<td width="10%" align="center">
								    
								    <a class="AgregarOrdenDeCompra" id="52"
								    href="/Facturacion/Facturar/ClienteId/52"
								    ><img src="/images/icons/add.png" title="Facturar"/> Facturar </a>

							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										Jamoneros
								</p>
							</td>
							<td width="10%">
								<p class="">
										# 3908
										 (En produccion)
								</p>
							</td>
							<td width="10%">
								Caba&ntilde;a Argentina
							</td>
							
							<td width="10%">
								
								<p class="">
								
										$ 355575.00
								</p>
							</td>
							
							
							<td width="10%" align="center">
								    
								    <a class="AgregarOrdenDeCompra" id="52"
								    href="/Facturacion/Facturar/ClienteId/52"
								    ><img src="/images/icons/add.png" title="Facturar"/> Facturar </a>

							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										Banner
								</p>
							</td>
							<td width="10%">
								<p class="">
										# 3899
										 (Finalizado)
								</p>
							</td>
							<td width="10%">
								Matias Fudim
							</td>
							
							<td width="10%">
								
								<p class="">
								
										$ 0.00
								</p>
							</td>
							
							
							<td width="10%" align="center">
								    
								    <a class="AgregarOrdenDeCompra" id="176"
								    href="/Facturacion/Facturar/ClienteId/176"
								    ><img src="/images/icons/add.png" title="Facturar"/> Facturar </a>

							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										Kit Parrillero
								</p>
							</td>
							<td width="10%">
								<p class="">
										# 3886
										 (Aprobado)
								</p>
							</td>
							<td width="10%">
								Boker Arbolito
							</td>
							
							<td width="10%">
								
								<p class="">
								
										$ 102000.00
								</p>
							</td>
							
							
							<td width="10%" align="center">
								    
								    <a class="AgregarOrdenDeCompra" id="138"
								    href="/Facturacion/Facturar/ClienteId/138"
								    ><img src="/images/icons/add.png" title="Facturar"/> Facturar </a>

							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										Complementos trivia (repeticion)
								</p>
							</td>
							<td width="10%">
								<p class="">
										# 3877
										 (Finalizado)
								</p>
							</td>
							<td width="10%">
								Caba&ntilde;a Argentina
							</td>
							
							<td width="10%">
								
								<p class="">
								
										$ 0.00
								</p>
							</td>
							
							
							<td width="10%" align="center">
								    
								    <a class="AgregarOrdenDeCompra" id="52"
								    href="/Facturacion/Facturar/ClienteId/52"
								    ><img src="/images/icons/add.png" title="Facturar"/> Facturar </a>

							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										Pizarras
								</p>
							</td>
							<td width="10%">
								<p class="">
										# 3827
										 (Finalizado)
								</p>
							</td>
							<td width="10%">
								Caba&ntilde;a Argentina
							</td>
							
							<td width="10%">
								
								<p class="">
								
										$ 68800.00
								</p>
							</td>
							
							
							<td width="10%" align="center">
								    
								    <a class="AgregarOrdenDeCompra" id="52"
								    href="/Facturacion/Facturar/ClienteId/52"
								    ><img src="/images/icons/add.png" title="Facturar"/> Facturar </a>

							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										Sobres
								</p>
							</td>
							<td width="10%">
								<p class="">
										# 3809
										 (Finalizado)
								</p>
							</td>
							<td width="10%">
								DCL Group
							</td>
							
							<td width="10%">
								
								<p class="">
								
										$ 0.00
								</p>
							</td>
							
							
							<td width="10%" align="center">
								    
								    <a class="AgregarOrdenDeCompra" id="98"
								    href="/Facturacion/Facturar/ClienteId/98"
								    ><img src="/images/icons/add.png" title="Facturar"/> Facturar </a>

							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										Flyers
								</p>
							</td>
							<td width="10%">
								<p class="">
										# 3761
										 (Finalizado)
								</p>
							</td>
							<td width="10%">
								Crossfit Andino
							</td>
							
							<td width="10%">
								
								<p class="">
								
										$ 800.00
								</p>
							</td>
							
							
							<td width="10%" align="center">
								    
								    <a class="AgregarOrdenDeCompra" id="142"
								    href="/Facturacion/Facturar/ClienteId/142"
								    ><img src="/images/icons/add.png" title="Facturar"/> Facturar </a>

							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										Flyers Leo
								</p>
							</td>
							<td width="10%">
								<p class="">
										# 3687
										 (Finalizado)
								</p>
							</td>
							<td width="10%">
								DCL Group
							</td>
							
							<td width="10%">
								
								<p class="">
								
										$ 0.00
								</p>
							</td>
							
							
							<td width="10%" align="center">
								    
								    <a class="AgregarOrdenDeCompra" id="98"
								    href="/Facturacion/Facturar/ClienteId/98"
								    ><img src="/images/icons/add.png" title="Facturar"/> Facturar </a>

							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										Complementos Trivia
								</p>
							</td>
							<td width="10%">
								<p class="">
										# 3682
										 (Finalizado)
								</p>
							</td>
							<td width="10%">
								Caba&ntilde;a Argentina
							</td>
							
							<td width="10%">
								
								<p class="">
								
										$ 
								</p>
							</td>
							
							
							<td width="10%" align="center">
								    
								    <a class="AgregarOrdenDeCompra" id="52"
								    href="/Facturacion/Facturar/ClienteId/52"
								    ><img src="/images/icons/add.png" title="Facturar"/> Facturar </a>

							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										Porta banners
								</p>
							</td>
							<td width="10%">
								<p class="">
										# 3657
										 (Finalizado)
								</p>
							</td>
							<td width="10%">
								DCL Group
							</td>
							
							<td width="10%">
								
								<p class="">
								
										$ 0.00
								</p>
							</td>
							
							
							<td width="10%" align="center">
								    
								    <a class="AgregarOrdenDeCompra" id="98"
								    href="/Facturacion/Facturar/ClienteId/98"
								    ><img src="/images/icons/add.png" title="Facturar"/> Facturar </a>

							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										Stickers 
								</p>
							</td>
							<td width="10%">
								<p class="">
										# 3654
										 (Finalizado)
								</p>
							</td>
							<td width="10%">
								DCL Group
							</td>
							
							<td width="10%">
								
								<p class="">
								
										$ 0.00
								</p>
							</td>
							
							
							<td width="10%" align="center">
								    
								    <a class="AgregarOrdenDeCompra" id="98"
								    href="/Facturacion/Facturar/ClienteId/98"
								    ><img src="/images/icons/add.png" title="Facturar"/> Facturar </a>

							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										Chupete Gurru
								</p>
							</td>
							<td width="10%">
								<p class="">
										# 3608
										 (Finalizado)
								</p>
							</td>
							<td width="10%">
								SILVER VISION SRL
							</td>
							
							<td width="10%">
								
								<p class="">
								
										$ 385.00
								</p>
							</td>
							
							
							<td width="10%" align="center">
								    
								    <a class="AgregarOrdenDeCompra" id="115"
								    href="/Facturacion/Facturar/ClienteId/115"
								    ><img src="/images/icons/add.png" title="Facturar"/> Facturar </a>

							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										Fotos Adriana
								</p>
							</td>
							<td width="10%">
								<p class="">
										# 3572
										 (Finalizado)
								</p>
							</td>
							<td width="10%">
								DCL Group
							</td>
							
							<td width="10%">
								
								<p class="">
								
										$ 
								</p>
							</td>
							
							
							<td width="10%" align="center">
								    
								    <a class="AgregarOrdenDeCompra" id="98"
								    href="/Facturacion/Facturar/ClienteId/98"
								    ><img src="/images/icons/add.png" title="Facturar"/> Facturar </a>

							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										Backpress
								</p>
							</td>
							<td width="10%">
								<p class="">
										# 3562
										 (Finalizado)
								</p>
							</td>
							<td width="10%">
								Caba&ntilde;a Argentina
							</td>
							
							<td width="10%">
								
								<p class="">
								
										$ 
								</p>
							</td>
							
							
							<td width="10%" align="center">
								    
								    <a class="AgregarOrdenDeCompra" id="52"
								    href="/Facturacion/Facturar/ClienteId/52"
								    ><img src="/images/icons/add.png" title="Facturar"/> Facturar </a>

							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										muestras carteleria
								</p>
							</td>
							<td width="10%">
								<p class="">
										# 3501
										 (Finalizado)
								</p>
							</td>
							<td width="10%">
								Caba&ntilde;a Argentina
							</td>
							
							<td width="10%">
								
								<p class="">
								
										$ 
								</p>
							</td>
							
							
							<td width="10%" align="center">
								    
								    <a class="AgregarOrdenDeCompra" id="52"
								    href="/Facturacion/Facturar/ClienteId/52"
								    ><img src="/images/icons/add.png" title="Facturar"/> Facturar </a>

							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										tarjetas personales
								</p>
							</td>
							<td width="10%">
								<p class="">
										# 3495
										 (Finalizado)
								</p>
							</td>
							<td width="10%">
								DCL Group
							</td>
							
							<td width="10%">
								
								<p class="">
								
										$ 
								</p>
							</td>
							
							
							<td width="10%" align="center">
								    
								    <a class="AgregarOrdenDeCompra" id="98"
								    href="/Facturacion/Facturar/ClienteId/98"
								    ><img src="/images/icons/add.png" title="Facturar"/> Facturar </a>

							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										Vinil Piso
								</p>
							</td>
							<td width="10%">
								<p class="">
										# 3475
										 (Finalizado)
								</p>
							</td>
							<td width="10%">
								Caba&ntilde;a Argentina
							</td>
							
							<td width="10%">
								
								<p class="">
								
										$ 
								</p>
							</td>
							
							
							<td width="10%" align="center">
								    
								    <a class="AgregarOrdenDeCompra" id="52"
								    href="/Facturacion/Facturar/ClienteId/52"
								    ><img src="/images/icons/add.png" title="Facturar"/> Facturar </a>

							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										Stickers
								</p>
							</td>
							<td width="10%">
								<p class="">
										# 3462
										 (Finalizado)
								</p>
							</td>
							<td width="10%">
								DCL Group
							</td>
							
							<td width="10%">
								
								<p class="">
								
										$ 
								</p>
							</td>
							
							
							<td width="10%" align="center">
								    
								    <a class="AgregarOrdenDeCompra" id="98"
								    href="/Facturacion/Facturar/ClienteId/98"
								    ><img src="/images/icons/add.png" title="Facturar"/> Facturar </a>

							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										Carta de lectura
								</p>
							</td>
							<td width="10%">
								<p class="">
										# 3441
										 (Finalizado)
								</p>
							</td>
							<td width="10%">
								Bausch y Lomb
							</td>
							
							<td width="10%">
								
								<p class="">
								
										$ 
								</p>
							</td>
							
							
							<td width="10%" align="center">
								    
								    <a class="AgregarOrdenDeCompra" id="5"
								    href="/Facturacion/Facturar/ClienteId/5"
								    ><img src="/images/icons/add.png" title="Facturar"/> Facturar </a>

							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										Arreglo Herrer&iacute;a
								</p>
							</td>
							<td width="10%">
								<p class="">
										# 3436
										 (Finalizado)
								</p>
							</td>
							<td width="10%">
								DCL Group
							</td>
							
							<td width="10%">
								
								<p class="">
								
										$ 
								</p>
							</td>
							
							
							<td width="10%" align="center">
								    
								    <a class="AgregarOrdenDeCompra" id="98"
								    href="/Facturacion/Facturar/ClienteId/98"
								    ><img src="/images/icons/add.png" title="Facturar"/> Facturar </a>

							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										Armado C/hueso
								</p>
							</td>
							<td width="10%">
								<p class="">
										# 3416
										 (Finalizado)
								</p>
							</td>
							<td width="10%">
								Caba&ntilde;a Argentina
							</td>
							
							<td width="10%">
								
								<p class="">
								
										$ 
								</p>
							</td>
							
							
							<td width="10%" align="center">
								    
								    <a class="AgregarOrdenDeCompra" id="52"
								    href="/Facturacion/Facturar/ClienteId/52"
								    ><img src="/images/icons/add.png" title="Facturar"/> Facturar </a>

							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										Armado s/hueso
								</p>
							</td>
							<td width="10%">
								<p class="">
										# 3408
										 (Finalizado)
								</p>
							</td>
							<td width="10%">
								Caba&ntilde;a Argentina
							</td>
							
							<td width="10%">
								
								<p class="">
								
										$ 
								</p>
							</td>
							
							
							<td width="10%" align="center">
								    
								    <a class="AgregarOrdenDeCompra" id="52"
								    href="/Facturacion/Facturar/ClienteId/52"
								    ><img src="/images/icons/add.png" title="Facturar"/> Facturar </a>

							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										Armado
								</p>
							</td>
							<td width="10%">
								<p class="">
										# 3401
										 (Finalizado)
								</p>
							</td>
							<td width="10%">
								Caba&ntilde;a Argentina
							</td>
							
							<td width="10%">
								
								<p class="">
								
										$ 
								</p>
							</td>
							
							
							<td width="10%" align="center">
								    
								    <a class="AgregarOrdenDeCompra" id="52"
								    href="/Facturacion/Facturar/ClienteId/52"
								    ><img src="/images/icons/add.png" title="Facturar"/> Facturar </a>

							</td>
						</tr>
                    					<!-- items -->
									</table>
            </div> <!-- /listItems -->

</div> <!-- /list -->            
</div> <!-- /list -->