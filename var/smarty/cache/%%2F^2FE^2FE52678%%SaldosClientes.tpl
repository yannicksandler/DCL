165
a:4:{s:8:"template";a:1:{s:43:"Backend/GestionEconomica/SaldosClientes.tpl";b:1;}s:9:"timestamp";i:1461234726;s:7:"expires";i:1461234726;s:13:"cache_serials";a:0:{}}
<script type="text/javascript">
$(document).ready(function(){
    $("#FormObservacion").validate();

	$('.popup').click(function() {
		
        var url 		= $(this).attr('href');
        var opciones="toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=yes, width=1000, height=700, top=85, left=140";

		abrirPopUp(url, opciones);

		return false;
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

function abrirPopUp(pagina, opciones)
{
	window.open(pagina,"",opciones);
}

</script>


<div style="width:850px">

<h1>Saldos total clientes ($ 1100724.07)</h1>
           

<div class="list">

	<div class="list">
		<label for="kwd_search">Buscar:</label> <input type="text" id="kwd_search" value=""/>
        		<div class="listTop">
					<div>
						<table border="0" cellpadding="0" cellspacing="0">
							<tr>
								<td width="10%"><p>Cliente</p></td>
								<td width="10%"><p>Saldo</p></td> 
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
										Cabaña Argentina
								</p>
							</td>
							<td width="10%">
								<p class="">
										900211.49
								</p>
							</td>
							<td width="10%" align="center">
							
								<a class="popup" 
									    href="/CuentaCorriente/ListCliente/ClienteId/52"
									    ><img src="/images/icons/add.png" title=""/> Cta cte </a>
							
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										CACIC SPORTS VISION
								</p>
							</td>
							<td width="10%">
								<p class="">
										184723.01
								</p>
							</td>
							<td width="10%" align="center">
							
								<a class="popup" 
									    href="/CuentaCorriente/ListCliente/ClienteId/12"
									    ><img src="/images/icons/add.png" title=""/> Cta cte </a>
							
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										Boker Arbolito
								</p>
							</td>
							<td width="10%">
								<p class="">
										16124.23
								</p>
							</td>
							<td width="10%" align="center">
							
								<a class="popup" 
									    href="/CuentaCorriente/ListCliente/ClienteId/138"
									    ><img src="/images/icons/add.png" title=""/> Cta cte </a>
							
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										Bratislava marketing group
								</p>
							</td>
							<td width="10%">
								<p class="">
										5021.50
								</p>
							</td>
							<td width="10%" align="center">
							
								<a class="popup" 
									    href="/CuentaCorriente/ListCliente/ClienteId/181"
									    ><img src="/images/icons/add.png" title=""/> Cta cte </a>
							
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										DecorLine
								</p>
							</td>
							<td width="10%">
								<p class="">
										4943.50
								</p>
							</td>
							<td width="10%" align="center">
							
								<a class="popup" 
									    href="/CuentaCorriente/ListCliente/ClienteId/49"
									    ><img src="/images/icons/add.png" title=""/> Cta cte </a>
							
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										Pucherito
								</p>
							</td>
							<td width="10%">
								<p class="">
										3303.18
								</p>
							</td>
							<td width="10%" align="center">
							
								<a class="popup" 
									    href="/CuentaCorriente/ListCliente/ClienteId/170"
									    ><img src="/images/icons/add.png" title=""/> Cta cte </a>
							
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										LA MAQUINITA
								</p>
							</td>
							<td width="10%">
								<p class="">
										2900.00
								</p>
							</td>
							<td width="10%" align="center">
							
								<a class="popup" 
									    href="/CuentaCorriente/ListCliente/ClienteId/177"
									    ><img src="/images/icons/add.png" title=""/> Cta cte </a>
							
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										Allergan
								</p>
							</td>
							<td width="10%">
								<p class="">
										2010.90
								</p>
							</td>
							<td width="10%" align="center">
							
								<a class="popup" 
									    href="/CuentaCorriente/ListCliente/ClienteId/169"
									    ><img src="/images/icons/add.png" title=""/> Cta cte </a>
							
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										Kolor
								</p>
							</td>
							<td width="10%">
								<p class="">
										1000.30
								</p>
							</td>
							<td width="10%" align="center">
							
								<a class="popup" 
									    href="/CuentaCorriente/ListCliente/ClienteId/58"
									    ><img src="/images/icons/add.png" title=""/> Cta cte </a>
							
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										Tregar
								</p>
							</td>
							<td width="10%">
								<p class="">
										577.50
								</p>
							</td>
							<td width="10%" align="center">
							
								<a class="popup" 
									    href="/CuentaCorriente/ListCliente/ClienteId/154"
									    ><img src="/images/icons/add.png" title=""/> Cta cte </a>
							
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										Havanna
								</p>
							</td>
							<td width="10%">
								<p class="">
										0.00
								</p>
							</td>
							<td width="10%" align="center">
							
								<a class="popup" 
									    href="/CuentaCorriente/ListCliente/ClienteId/1"
									    ><img src="/images/icons/add.png" title=""/> Cta cte </a>
							
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										clona
								</p>
							</td>
							<td width="10%">
								<p class="">
										0.00
								</p>
							</td>
							<td width="10%" align="center">
							
								<a class="popup" 
									    href="/CuentaCorriente/ListCliente/ClienteId/2"
									    ><img src="/images/icons/add.png" title=""/> Cta cte </a>
							
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										diego goria
								</p>
							</td>
							<td width="10%">
								<p class="">
										0.00
								</p>
							</td>
							<td width="10%" align="center">
							
								<a class="popup" 
									    href="/CuentaCorriente/ListCliente/ClienteId/4"
									    ><img src="/images/icons/add.png" title=""/> Cta cte </a>
							
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										Bausch y Lomb
								</p>
							</td>
							<td width="10%">
								<p class="">
										0.00
								</p>
							</td>
							<td width="10%" align="center">
							
								<a class="popup" 
									    href="/CuentaCorriente/ListCliente/ClienteId/5"
									    ><img src="/images/icons/add.png" title=""/> Cta cte </a>
							
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										cristal depot
								</p>
							</td>
							<td width="10%">
								<p class="">
										0.00
								</p>
							</td>
							<td width="10%" align="center">
							
								<a class="popup" 
									    href="/CuentaCorriente/ListCliente/ClienteId/6"
									    ><img src="/images/icons/add.png" title=""/> Cta cte </a>
							
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										abd
								</p>
							</td>
							<td width="10%">
								<p class="">
										0.00
								</p>
							</td>
							<td width="10%" align="center">
							
								<a class="popup" 
									    href="/CuentaCorriente/ListCliente/ClienteId/7"
									    ><img src="/images/icons/add.png" title=""/> Cta cte </a>
							
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										eki plus
								</p>
							</td>
							<td width="10%">
								<p class="">
										0.00
								</p>
							</td>
							<td width="10%" align="center">
							
								<a class="popup" 
									    href="/CuentaCorriente/ListCliente/ClienteId/8"
									    ><img src="/images/icons/add.png" title=""/> Cta cte </a>
							
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										AACREA
								</p>
							</td>
							<td width="10%">
								<p class="">
										0.00
								</p>
							</td>
							<td width="10%" align="center">
							
								<a class="popup" 
									    href="/CuentaCorriente/ListCliente/ClienteId/9"
									    ><img src="/images/icons/add.png" title=""/> Cta cte </a>
							
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										calver-maldito glam
								</p>
							</td>
							<td width="10%">
								<p class="">
										0.00
								</p>
							</td>
							<td width="10%" align="center">
							
								<a class="popup" 
									    href="/CuentaCorriente/ListCliente/ClienteId/10"
									    ><img src="/images/icons/add.png" title=""/> Cta cte </a>
							
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										corte final
								</p>
							</td>
							<td width="10%">
								<p class="">
										0.00
								</p>
							</td>
							<td width="10%" align="center">
							
								<a class="popup" 
									    href="/CuentaCorriente/ListCliente/ClienteId/11"
									    ><img src="/images/icons/add.png" title=""/> Cta cte </a>
							
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										Turner
								</p>
							</td>
							<td width="10%">
								<p class="">
										0.00
								</p>
							</td>
							<td width="10%" align="center">
							
								<a class="popup" 
									    href="/CuentaCorriente/ListCliente/ClienteId/13"
									    ><img src="/images/icons/add.png" title=""/> Cta cte </a>
							
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										Lens Depot
								</p>
							</td>
							<td width="10%">
								<p class="">
										0.00
								</p>
							</td>
							<td width="10%" align="center">
							
								<a class="popup" 
									    href="/CuentaCorriente/ListCliente/ClienteId/14"
									    ><img src="/images/icons/add.png" title=""/> Cta cte </a>
							
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										JyG
								</p>
							</td>
							<td width="10%">
								<p class="">
										0.00
								</p>
							</td>
							<td width="10%" align="center">
							
								<a class="popup" 
									    href="/CuentaCorriente/ListCliente/ClienteId/15"
									    ><img src="/images/icons/add.png" title=""/> Cta cte </a>
							
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										Il Gatto
								</p>
							</td>
							<td width="10%">
								<p class="">
										0.00
								</p>
							</td>
							<td width="10%" align="center">
							
								<a class="popup" 
									    href="/CuentaCorriente/ListCliente/ClienteId/16"
									    ><img src="/images/icons/add.png" title=""/> Cta cte </a>
							
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										Bermuda
								</p>
							</td>
							<td width="10%">
								<p class="">
										0.00
								</p>
							</td>
							<td width="10%" align="center">
							
								<a class="popup" 
									    href="/CuentaCorriente/ListCliente/ClienteId/17"
									    ><img src="/images/icons/add.png" title=""/> Cta cte </a>
							
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										Geuna Boats
								</p>
							</td>
							<td width="10%">
								<p class="">
										0.00
								</p>
							</td>
							<td width="10%" align="center">
							
								<a class="popup" 
									    href="/CuentaCorriente/ListCliente/ClienteId/18"
									    ><img src="/images/icons/add.png" title=""/> Cta cte </a>
							
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										Drager
								</p>
							</td>
							<td width="10%">
								<p class="">
										0.00
								</p>
							</td>
							<td width="10%" align="center">
							
								<a class="popup" 
									    href="/CuentaCorriente/ListCliente/ClienteId/19"
									    ><img src="/images/icons/add.png" title=""/> Cta cte </a>
							
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										Tactica Consulting
								</p>
							</td>
							<td width="10%">
								<p class="">
										0.00
								</p>
							</td>
							<td width="10%" align="center">
							
								<a class="popup" 
									    href="/CuentaCorriente/ListCliente/ClienteId/20"
									    ><img src="/images/icons/add.png" title=""/> Cta cte </a>
							
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										PETRESKY IGNACIO MARIO
								</p>
							</td>
							<td width="10%">
								<p class="">
										0.00
								</p>
							</td>
							<td width="10%" align="center">
							
								<a class="popup" 
									    href="/CuentaCorriente/ListCliente/ClienteId/21"
									    ><img src="/images/icons/add.png" title=""/> Cta cte </a>
							
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										NETSOL
								</p>
							</td>
							<td width="10%">
								<p class="">
										0.00
								</p>
							</td>
							<td width="10%" align="center">
							
								<a class="popup" 
									    href="/CuentaCorriente/ListCliente/ClienteId/22"
									    ><img src="/images/icons/add.png" title=""/> Cta cte </a>
							
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										INTERDREAMERS
								</p>
							</td>
							<td width="10%">
								<p class="">
										0.00
								</p>
							</td>
							<td width="10%" align="center">
							
								<a class="popup" 
									    href="/CuentaCorriente/ListCliente/ClienteId/23"
									    ><img src="/images/icons/add.png" title=""/> Cta cte </a>
							
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										TUTI FRUTI
								</p>
							</td>
							<td width="10%">
								<p class="">
										0.00
								</p>
							</td>
							<td width="10%" align="center">
							
								<a class="popup" 
									    href="/CuentaCorriente/ListCliente/ClienteId/24"
									    ><img src="/images/icons/add.png" title=""/> Cta cte </a>
							
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										Viste Design
								</p>
							</td>
							<td width="10%">
								<p class="">
										0.00
								</p>
							</td>
							<td width="10%" align="center">
							
								<a class="popup" 
									    href="/CuentaCorriente/ListCliente/ClienteId/25"
									    ><img src="/images/icons/add.png" title=""/> Cta cte </a>
							
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										Daiu
								</p>
							</td>
							<td width="10%">
								<p class="">
										0.00
								</p>
							</td>
							<td width="10%" align="center">
							
								<a class="popup" 
									    href="/CuentaCorriente/ListCliente/ClienteId/26"
									    ><img src="/images/icons/add.png" title=""/> Cta cte </a>
							
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										Peperoni Jeans
								</p>
							</td>
							<td width="10%">
								<p class="">
										0.00
								</p>
							</td>
							<td width="10%" align="center">
							
								<a class="popup" 
									    href="/CuentaCorriente/ListCliente/ClienteId/27"
									    ><img src="/images/icons/add.png" title=""/> Cta cte </a>
							
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										Tucci
								</p>
							</td>
							<td width="10%">
								<p class="">
										0.00
								</p>
							</td>
							<td width="10%" align="center">
							
								<a class="popup" 
									    href="/CuentaCorriente/ListCliente/ClienteId/28"
									    ><img src="/images/icons/add.png" title=""/> Cta cte </a>
							
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										Gaelle
								</p>
							</td>
							<td width="10%">
								<p class="">
										0.00
								</p>
							</td>
							<td width="10%" align="center">
							
								<a class="popup" 
									    href="/CuentaCorriente/ListCliente/ClienteId/29"
									    ><img src="/images/icons/add.png" title=""/> Cta cte </a>
							
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										Rafaela Motores
								</p>
							</td>
							<td width="10%">
								<p class="">
										0.00
								</p>
							</td>
							<td width="10%" align="center">
							
								<a class="popup" 
									    href="/CuentaCorriente/ListCliente/ClienteId/30"
									    ><img src="/images/icons/add.png" title=""/> Cta cte </a>
							
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										AET
								</p>
							</td>
							<td width="10%">
								<p class="">
										0.00
								</p>
							</td>
							<td width="10%" align="center">
							
								<a class="popup" 
									    href="/CuentaCorriente/ListCliente/ClienteId/31"
									    ><img src="/images/icons/add.png" title=""/> Cta cte </a>
							
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										Astillero Geuna
								</p>
							</td>
							<td width="10%">
								<p class="">
										0.00
								</p>
							</td>
							<td width="10%" align="center">
							
								<a class="popup" 
									    href="/CuentaCorriente/ListCliente/ClienteId/32"
									    ><img src="/images/icons/add.png" title=""/> Cta cte </a>
							
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										All Over
								</p>
							</td>
							<td width="10%">
								<p class="">
										0.00
								</p>
							</td>
							<td width="10%" align="center">
							
								<a class="popup" 
									    href="/CuentaCorriente/ListCliente/ClienteId/33"
									    ><img src="/images/icons/add.png" title=""/> Cta cte </a>
							
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										Mica
								</p>
							</td>
							<td width="10%">
								<p class="">
										0.00
								</p>
							</td>
							<td width="10%" align="center">
							
								<a class="popup" 
									    href="/CuentaCorriente/ListCliente/ClienteId/34"
									    ><img src="/images/icons/add.png" title=""/> Cta cte </a>
							
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										Ernesto Automotores
								</p>
							</td>
							<td width="10%">
								<p class="">
										0.00
								</p>
							</td>
							<td width="10%" align="center">
							
								<a class="popup" 
									    href="/CuentaCorriente/ListCliente/ClienteId/35"
									    ><img src="/images/icons/add.png" title=""/> Cta cte </a>
							
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										Nathan
								</p>
							</td>
							<td width="10%">
								<p class="">
										0.00
								</p>
							</td>
							<td width="10%" align="center">
							
								<a class="popup" 
									    href="/CuentaCorriente/ListCliente/ClienteId/36"
									    ><img src="/images/icons/add.png" title=""/> Cta cte </a>
							
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										Kane
								</p>
							</td>
							<td width="10%">
								<p class="">
										0.00
								</p>
							</td>
							<td width="10%" align="center">
							
								<a class="popup" 
									    href="/CuentaCorriente/ListCliente/ClienteId/37"
									    ><img src="/images/icons/add.png" title=""/> Cta cte </a>
							
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										Lilitex
								</p>
							</td>
							<td width="10%">
								<p class="">
										0.00
								</p>
							</td>
							<td width="10%" align="center">
							
								<a class="popup" 
									    href="/CuentaCorriente/ListCliente/ClienteId/38"
									    ><img src="/images/icons/add.png" title=""/> Cta cte </a>
							
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										Old Brigde
								</p>
							</td>
							<td width="10%">
								<p class="">
										0.00
								</p>
							</td>
							<td width="10%" align="center">
							
								<a class="popup" 
									    href="/CuentaCorriente/ListCliente/ClienteId/39"
									    ><img src="/images/icons/add.png" title=""/> Cta cte </a>
							
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										Caimanes de Formoza
								</p>
							</td>
							<td width="10%">
								<p class="">
										0.00
								</p>
							</td>
							<td width="10%" align="center">
							
								<a class="popup" 
									    href="/CuentaCorriente/ListCliente/ClienteId/40"
									    ><img src="/images/icons/add.png" title=""/> Cta cte </a>
							
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										Casa Cesto
								</p>
							</td>
							<td width="10%">
								<p class="">
										0.00
								</p>
							</td>
							<td width="10%" align="center">
							
								<a class="popup" 
									    href="/CuentaCorriente/ListCliente/ClienteId/41"
									    ><img src="/images/icons/add.png" title=""/> Cta cte </a>
							
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										Optica Lennon
								</p>
							</td>
							<td width="10%">
								<p class="">
										0.00
								</p>
							</td>
							<td width="10%" align="center">
							
								<a class="popup" 
									    href="/CuentaCorriente/ListCliente/ClienteId/42"
									    ><img src="/images/icons/add.png" title=""/> Cta cte </a>
							
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										El pollo Azul
								</p>
							</td>
							<td width="10%">
								<p class="">
										0.00
								</p>
							</td>
							<td width="10%" align="center">
							
								<a class="popup" 
									    href="/CuentaCorriente/ListCliente/ClienteId/43"
									    ><img src="/images/icons/add.png" title=""/> Cta cte </a>
							
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										Ciclismo
								</p>
							</td>
							<td width="10%">
								<p class="">
										0.00
								</p>
							</td>
							<td width="10%" align="center">
							
								<a class="popup" 
									    href="/CuentaCorriente/ListCliente/ClienteId/44"
									    ><img src="/images/icons/add.png" title=""/> Cta cte </a>
							
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										Mali
								</p>
							</td>
							<td width="10%">
								<p class="">
										0.00
								</p>
							</td>
							<td width="10%" align="center">
							
								<a class="popup" 
									    href="/CuentaCorriente/ListCliente/ClienteId/45"
									    ><img src="/images/icons/add.png" title=""/> Cta cte </a>
							
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										Polygraph
								</p>
							</td>
							<td width="10%">
								<p class="">
										0.00
								</p>
							</td>
							<td width="10%" align="center">
							
								<a class="popup" 
									    href="/CuentaCorriente/ListCliente/ClienteId/46"
									    ><img src="/images/icons/add.png" title=""/> Cta cte </a>
							
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										Pontus
								</p>
							</td>
							<td width="10%">
								<p class="">
										0.00
								</p>
							</td>
							<td width="10%" align="center">
							
								<a class="popup" 
									    href="/CuentaCorriente/ListCliente/ClienteId/47"
									    ><img src="/images/icons/add.png" title=""/> Cta cte </a>
							
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										Buenos Aires Key
								</p>
							</td>
							<td width="10%">
								<p class="">
										0.00
								</p>
							</td>
							<td width="10%" align="center">
							
								<a class="popup" 
									    href="/CuentaCorriente/ListCliente/ClienteId/48"
									    ><img src="/images/icons/add.png" title=""/> Cta cte </a>
							
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										Hathor
								</p>
							</td>
							<td width="10%">
								<p class="">
										0.00
								</p>
							</td>
							<td width="10%" align="center">
							
								<a class="popup" 
									    href="/CuentaCorriente/ListCliente/ClienteId/50"
									    ><img src="/images/icons/add.png" title=""/> Cta cte </a>
							
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										Sony
								</p>
							</td>
							<td width="10%">
								<p class="">
										0.00
								</p>
							</td>
							<td width="10%" align="center">
							
								<a class="popup" 
									    href="/CuentaCorriente/ListCliente/ClienteId/51"
									    ><img src="/images/icons/add.png" title=""/> Cta cte </a>
							
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										Drams
								</p>
							</td>
							<td width="10%">
								<p class="">
										0.00
								</p>
							</td>
							<td width="10%" align="center">
							
								<a class="popup" 
									    href="/CuentaCorriente/ListCliente/ClienteId/53"
									    ><img src="/images/icons/add.png" title=""/> Cta cte </a>
							
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										Sound Quality
								</p>
							</td>
							<td width="10%">
								<p class="">
										0.00
								</p>
							</td>
							<td width="10%" align="center">
							
								<a class="popup" 
									    href="/CuentaCorriente/ListCliente/ClienteId/54"
									    ><img src="/images/icons/add.png" title=""/> Cta cte </a>
							
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										Maspel
								</p>
							</td>
							<td width="10%">
								<p class="">
										0.00
								</p>
							</td>
							<td width="10%" align="center">
							
								<a class="popup" 
									    href="/CuentaCorriente/ListCliente/ClienteId/55"
									    ><img src="/images/icons/add.png" title=""/> Cta cte </a>
							
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										Rosita Curcho
								</p>
							</td>
							<td width="10%">
								<p class="">
										0.00
								</p>
							</td>
							<td width="10%" align="center">
							
								<a class="popup" 
									    href="/CuentaCorriente/ListCliente/ClienteId/56"
									    ><img src="/images/icons/add.png" title=""/> Cta cte </a>
							
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										FilmaBonito
								</p>
							</td>
							<td width="10%">
								<p class="">
										0.00
								</p>
							</td>
							<td width="10%" align="center">
							
								<a class="popup" 
									    href="/CuentaCorriente/ListCliente/ClienteId/57"
									    ><img src="/images/icons/add.png" title=""/> Cta cte </a>
							
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										Iszak Hermanos
								</p>
							</td>
							<td width="10%">
								<p class="">
										0.00
								</p>
							</td>
							<td width="10%" align="center">
							
								<a class="popup" 
									    href="/CuentaCorriente/ListCliente/ClienteId/59"
									    ><img src="/images/icons/add.png" title=""/> Cta cte </a>
							
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										Sticom
								</p>
							</td>
							<td width="10%">
								<p class="">
										0.00
								</p>
							</td>
							<td width="10%" align="center">
							
								<a class="popup" 
									    href="/CuentaCorriente/ListCliente/ClienteId/60"
									    ><img src="/images/icons/add.png" title=""/> Cta cte </a>
							
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										Cancilleria de Relaciones exteriores
								</p>
							</td>
							<td width="10%">
								<p class="">
										0.00
								</p>
							</td>
							<td width="10%" align="center">
							
								<a class="popup" 
									    href="/CuentaCorriente/ListCliente/ClienteId/61"
									    ><img src="/images/icons/add.png" title=""/> Cta cte </a>
							
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										Apehi
								</p>
							</td>
							<td width="10%">
								<p class="">
										0.00
								</p>
							</td>
							<td width="10%" align="center">
							
								<a class="popup" 
									    href="/CuentaCorriente/ListCliente/ClienteId/62"
									    ><img src="/images/icons/add.png" title=""/> Cta cte </a>
							
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										Maxtrip
								</p>
							</td>
							<td width="10%">
								<p class="">
										0.00
								</p>
							</td>
							<td width="10%" align="center">
							
								<a class="popup" 
									    href="/CuentaCorriente/ListCliente/ClienteId/63"
									    ><img src="/images/icons/add.png" title=""/> Cta cte </a>
							
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										paralelo cero
								</p>
							</td>
							<td width="10%">
								<p class="">
										0.00
								</p>
							</td>
							<td width="10%" align="center">
							
								<a class="popup" 
									    href="/CuentaCorriente/ListCliente/ClienteId/64"
									    ><img src="/images/icons/add.png" title=""/> Cta cte </a>
							
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										Boston seguros
								</p>
							</td>
							<td width="10%">
								<p class="">
										0.00
								</p>
							</td>
							<td width="10%" align="center">
							
								<a class="popup" 
									    href="/CuentaCorriente/ListCliente/ClienteId/65"
									    ><img src="/images/icons/add.png" title=""/> Cta cte </a>
							
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										Imprenta Packman
								</p>
							</td>
							<td width="10%">
								<p class="">
										0.00
								</p>
							</td>
							<td width="10%" align="center">
							
								<a class="popup" 
									    href="/CuentaCorriente/ListCliente/ClienteId/66"
									    ><img src="/images/icons/add.png" title=""/> Cta cte </a>
							
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										estela do sul
								</p>
							</td>
							<td width="10%">
								<p class="">
										0.00
								</p>
							</td>
							<td width="10%" align="center">
							
								<a class="popup" 
									    href="/CuentaCorriente/ListCliente/ClienteId/67"
									    ><img src="/images/icons/add.png" title=""/> Cta cte </a>
							
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										biosintex
								</p>
							</td>
							<td width="10%">
								<p class="">
										0.00
								</p>
							</td>
							<td width="10%" align="center">
							
								<a class="popup" 
									    href="/CuentaCorriente/ListCliente/ClienteId/68"
									    ><img src="/images/icons/add.png" title=""/> Cta cte </a>
							
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										Zecat
								</p>
							</td>
							<td width="10%">
								<p class="">
										0.00
								</p>
							</td>
							<td width="10%" align="center">
							
								<a class="popup" 
									    href="/CuentaCorriente/ListCliente/ClienteId/69"
									    ><img src="/images/icons/add.png" title=""/> Cta cte </a>
							
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										Samsonite
								</p>
							</td>
							<td width="10%">
								<p class="">
										0.00
								</p>
							</td>
							<td width="10%" align="center">
							
								<a class="popup" 
									    href="/CuentaCorriente/ListCliente/ClienteId/70"
									    ><img src="/images/icons/add.png" title=""/> Cta cte </a>
							
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										Marine pool
								</p>
							</td>
							<td width="10%">
								<p class="">
										0.00
								</p>
							</td>
							<td width="10%" align="center">
							
								<a class="popup" 
									    href="/CuentaCorriente/ListCliente/ClienteId/71"
									    ><img src="/images/icons/add.png" title=""/> Cta cte </a>
							
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										Hebraica
								</p>
							</td>
							<td width="10%">
								<p class="">
										0.00
								</p>
							</td>
							<td width="10%" align="center">
							
								<a class="popup" 
									    href="/CuentaCorriente/ListCliente/ClienteId/72"
									    ><img src="/images/icons/add.png" title=""/> Cta cte </a>
							
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										Gilera Ya
								</p>
							</td>
							<td width="10%">
								<p class="">
										0.00
								</p>
							</td>
							<td width="10%" align="center">
							
								<a class="popup" 
									    href="/CuentaCorriente/ListCliente/ClienteId/73"
									    ><img src="/images/icons/add.png" title=""/> Cta cte </a>
							
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										Pura Piel
								</p>
							</td>
							<td width="10%">
								<p class="">
										0.00
								</p>
							</td>
							<td width="10%" align="center">
							
								<a class="popup" 
									    href="/CuentaCorriente/ListCliente/ClienteId/75"
									    ><img src="/images/icons/add.png" title=""/> Cta cte </a>
							
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										LAHER SRL - Gepetto
								</p>
							</td>
							<td width="10%">
								<p class="">
										0.00
								</p>
							</td>
							<td width="10%" align="center">
							
								<a class="popup" 
									    href="/CuentaCorriente/ListCliente/ClienteId/76"
									    ><img src="/images/icons/add.png" title=""/> Cta cte </a>
							
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										estrela do sul
								</p>
							</td>
							<td width="10%">
								<p class="">
										0.00
								</p>
							</td>
							<td width="10%" align="center">
							
								<a class="popup" 
									    href="/CuentaCorriente/ListCliente/ClienteId/77"
									    ><img src="/images/icons/add.png" title=""/> Cta cte </a>
							
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										Ivecco
								</p>
							</td>
							<td width="10%">
								<p class="">
										0.00
								</p>
							</td>
							<td width="10%" align="center">
							
								<a class="popup" 
									    href="/CuentaCorriente/ListCliente/ClienteId/78"
									    ><img src="/images/icons/add.png" title=""/> Cta cte </a>
							
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										Furia
								</p>
							</td>
							<td width="10%">
								<p class="">
										0.00
								</p>
							</td>
							<td width="10%" align="center">
							
								<a class="popup" 
									    href="/CuentaCorriente/ListCliente/ClienteId/79"
									    ><img src="/images/icons/add.png" title=""/> Cta cte </a>
							
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										Importadora Sudamericana 
								</p>
							</td>
							<td width="10%">
								<p class="">
										0.00
								</p>
							</td>
							<td width="10%" align="center">
							
								<a class="popup" 
									    href="/CuentaCorriente/ListCliente/ClienteId/80"
									    ><img src="/images/icons/add.png" title=""/> Cta cte </a>
							
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										Distriwash
								</p>
							</td>
							<td width="10%">
								<p class="">
										0.00
								</p>
							</td>
							<td width="10%" align="center">
							
								<a class="popup" 
									    href="/CuentaCorriente/ListCliente/ClienteId/81"
									    ><img src="/images/icons/add.png" title=""/> Cta cte </a>
							
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										Descuento City
								</p>
							</td>
							<td width="10%">
								<p class="">
										0.00
								</p>
							</td>
							<td width="10%" align="center">
							
								<a class="popup" 
									    href="/CuentaCorriente/ListCliente/ClienteId/82"
									    ><img src="/images/icons/add.png" title=""/> Cta cte </a>
							
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										Comercio Pet
								</p>
							</td>
							<td width="10%">
								<p class="">
										0.00
								</p>
							</td>
							<td width="10%" align="center">
							
								<a class="popup" 
									    href="/CuentaCorriente/ListCliente/ClienteId/83"
									    ><img src="/images/icons/add.png" title=""/> Cta cte </a>
							
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										Comision Nacional de Comunicacion
								</p>
							</td>
							<td width="10%">
								<p class="">
										0.00
								</p>
							</td>
							<td width="10%" align="center">
							
								<a class="popup" 
									    href="/CuentaCorriente/ListCliente/ClienteId/84"
									    ><img src="/images/icons/add.png" title=""/> Cta cte </a>
							
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										Scis Medicina Prepeaga
								</p>
							</td>
							<td width="10%">
								<p class="">
										0.00
								</p>
							</td>
							<td width="10%" align="center">
							
								<a class="popup" 
									    href="/CuentaCorriente/ListCliente/ClienteId/85"
									    ><img src="/images/icons/add.png" title=""/> Cta cte </a>
							
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										Todo Correas
								</p>
							</td>
							<td width="10%">
								<p class="">
										0.00
								</p>
							</td>
							<td width="10%" align="center">
							
								<a class="popup" 
									    href="/CuentaCorriente/ListCliente/ClienteId/88"
									    ><img src="/images/icons/add.png" title=""/> Cta cte </a>
							
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										Rayban
								</p>
							</td>
							<td width="10%">
								<p class="">
										0.00
								</p>
							</td>
							<td width="10%" align="center">
							
								<a class="popup" 
									    href="/CuentaCorriente/ListCliente/ClienteId/89"
									    ><img src="/images/icons/add.png" title=""/> Cta cte </a>
							
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										Porotitos
								</p>
							</td>
							<td width="10%">
								<p class="">
										0.00
								</p>
							</td>
							<td width="10%" align="center">
							
								<a class="popup" 
									    href="/CuentaCorriente/ListCliente/ClienteId/90"
									    ><img src="/images/icons/add.png" title=""/> Cta cte </a>
							
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										Capo Mafia
								</p>
							</td>
							<td width="10%">
								<p class="">
										0.00
								</p>
							</td>
							<td width="10%" align="center">
							
								<a class="popup" 
									    href="/CuentaCorriente/ListCliente/ClienteId/91"
									    ><img src="/images/icons/add.png" title=""/> Cta cte </a>
							
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										Susana Zaszczynski
								</p>
							</td>
							<td width="10%">
								<p class="">
										0.00
								</p>
							</td>
							<td width="10%" align="center">
							
								<a class="popup" 
									    href="/CuentaCorriente/ListCliente/ClienteId/92"
									    ><img src="/images/icons/add.png" title=""/> Cta cte </a>
							
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										Glucolvil
								</p>
							</td>
							<td width="10%">
								<p class="">
										0.00
								</p>
							</td>
							<td width="10%" align="center">
							
								<a class="popup" 
									    href="/CuentaCorriente/ListCliente/ClienteId/93"
									    ><img src="/images/icons/add.png" title=""/> Cta cte </a>
							
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										Ergo Renova
								</p>
							</td>
							<td width="10%">
								<p class="">
										0.00
								</p>
							</td>
							<td width="10%" align="center">
							
								<a class="popup" 
									    href="/CuentaCorriente/ListCliente/ClienteId/94"
									    ><img src="/images/icons/add.png" title=""/> Cta cte </a>
							
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										Visa Argentina 
								</p>
							</td>
							<td width="10%">
								<p class="">
										0.00
								</p>
							</td>
							<td width="10%" align="center">
							
								<a class="popup" 
									    href="/CuentaCorriente/ListCliente/ClienteId/95"
									    ><img src="/images/icons/add.png" title=""/> Cta cte </a>
							
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										Jenny
								</p>
							</td>
							<td width="10%">
								<p class="">
										0.00
								</p>
							</td>
							<td width="10%" align="center">
							
								<a class="popup" 
									    href="/CuentaCorriente/ListCliente/ClienteId/96"
									    ><img src="/images/icons/add.png" title=""/> Cta cte </a>
							
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										Ledesma
								</p>
							</td>
							<td width="10%">
								<p class="">
										0.00
								</p>
							</td>
							<td width="10%" align="center">
							
								<a class="popup" 
									    href="/CuentaCorriente/ListCliente/ClienteId/97"
									    ><img src="/images/icons/add.png" title=""/> Cta cte </a>
							
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										DCL Group
								</p>
							</td>
							<td width="10%">
								<p class="">
										0.00
								</p>
							</td>
							<td width="10%" align="center">
							
								<a class="popup" 
									    href="/CuentaCorriente/ListCliente/ClienteId/98"
									    ><img src="/images/icons/add.png" title=""/> Cta cte </a>
							
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										Jonatan Kusnier
								</p>
							</td>
							<td width="10%">
								<p class="">
										0.00
								</p>
							</td>
							<td width="10%" align="center">
							
								<a class="popup" 
									    href="/CuentaCorriente/ListCliente/ClienteId/99"
									    ><img src="/images/icons/add.png" title=""/> Cta cte </a>
							
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										Romano marine
								</p>
							</td>
							<td width="10%">
								<p class="">
										0.00
								</p>
							</td>
							<td width="10%" align="center">
							
								<a class="popup" 
									    href="/CuentaCorriente/ListCliente/ClienteId/100"
									    ><img src="/images/icons/add.png" title=""/> Cta cte </a>
							
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										Gotico
								</p>
							</td>
							<td width="10%">
								<p class="">
										0.00
								</p>
							</td>
							<td width="10%" align="center">
							
								<a class="popup" 
									    href="/CuentaCorriente/ListCliente/ClienteId/101"
									    ><img src="/images/icons/add.png" title=""/> Cta cte </a>
							
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										distribuidora M & M
								</p>
							</td>
							<td width="10%">
								<p class="">
										0.00
								</p>
							</td>
							<td width="10%" align="center">
							
								<a class="popup" 
									    href="/CuentaCorriente/ListCliente/ClienteId/102"
									    ><img src="/images/icons/add.png" title=""/> Cta cte </a>
							
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										Aurelia S.A.C.I.F
								</p>
							</td>
							<td width="10%">
								<p class="">
										0.00
								</p>
							</td>
							<td width="10%" align="center">
							
								<a class="popup" 
									    href="/CuentaCorriente/ListCliente/ClienteId/105"
									    ><img src="/images/icons/add.png" title=""/> Cta cte </a>
							
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										Nadia Scolnic
								</p>
							</td>
							<td width="10%">
								<p class="">
										0.00
								</p>
							</td>
							<td width="10%" align="center">
							
								<a class="popup" 
									    href="/CuentaCorriente/ListCliente/ClienteId/106"
									    ><img src="/images/icons/add.png" title=""/> Cta cte </a>
							
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										Ocular Lens
								</p>
							</td>
							<td width="10%">
								<p class="">
										0.00
								</p>
							</td>
							<td width="10%" align="center">
							
								<a class="popup" 
									    href="/CuentaCorriente/ListCliente/ClienteId/107"
									    ><img src="/images/icons/add.png" title=""/> Cta cte </a>
							
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										Gerardo Towner
								</p>
							</td>
							<td width="10%">
								<p class="">
										0.00
								</p>
							</td>
							<td width="10%" align="center">
							
								<a class="popup" 
									    href="/CuentaCorriente/ListCliente/ClienteId/108"
									    ><img src="/images/icons/add.png" title=""/> Cta cte </a>
							
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										Estancia La Pelada
								</p>
							</td>
							<td width="10%">
								<p class="">
										0.00
								</p>
							</td>
							<td width="10%" align="center">
							
								<a class="popup" 
									    href="/CuentaCorriente/ListCliente/ClienteId/109"
									    ><img src="/images/icons/add.png" title=""/> Cta cte </a>
							
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										Mariano Silberberg
								</p>
							</td>
							<td width="10%">
								<p class="">
										0.00
								</p>
							</td>
							<td width="10%" align="center">
							
								<a class="popup" 
									    href="/CuentaCorriente/ListCliente/ClienteId/110"
									    ><img src="/images/icons/add.png" title=""/> Cta cte </a>
							
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										NATURAL OPTIC SRL
								</p>
							</td>
							<td width="10%">
								<p class="">
										0.00
								</p>
							</td>
							<td width="10%" align="center">
							
								<a class="popup" 
									    href="/CuentaCorriente/ListCliente/ClienteId/111"
									    ><img src="/images/icons/add.png" title=""/> Cta cte </a>
							
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										SILVER VISION SRL
								</p>
							</td>
							<td width="10%">
								<p class="">
										0.00
								</p>
							</td>
							<td width="10%" align="center">
							
								<a class="popup" 
									    href="/CuentaCorriente/ListCliente/ClienteId/115"
									    ><img src="/images/icons/add.png" title=""/> Cta cte </a>
							
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										DESCO - Gepetto
								</p>
							</td>
							<td width="10%">
								<p class="">
										0.00
								</p>
							</td>
							<td width="10%" align="center">
							
								<a class="popup" 
									    href="/CuentaCorriente/ListCliente/ClienteId/116"
									    ><img src="/images/icons/add.png" title=""/> Cta cte </a>
							
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										Alejandro Amarilla
								</p>
							</td>
							<td width="10%">
								<p class="">
										0.00
								</p>
							</td>
							<td width="10%" align="center">
							
								<a class="popup" 
									    href="/CuentaCorriente/ListCliente/ClienteId/117"
									    ><img src="/images/icons/add.png" title=""/> Cta cte </a>
							
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										Adfunky
								</p>
							</td>
							<td width="10%">
								<p class="">
										0.00
								</p>
							</td>
							<td width="10%" align="center">
							
								<a class="popup" 
									    href="/CuentaCorriente/ListCliente/ClienteId/118"
									    ><img src="/images/icons/add.png" title=""/> Cta cte </a>
							
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										Santiago Lorente
								</p>
							</td>
							<td width="10%">
								<p class="">
										0.00
								</p>
							</td>
							<td width="10%" align="center">
							
								<a class="popup" 
									    href="/CuentaCorriente/ListCliente/ClienteId/119"
									    ><img src="/images/icons/add.png" title=""/> Cta cte </a>
							
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										Guia Oleo
								</p>
							</td>
							<td width="10%">
								<p class="">
										0.00
								</p>
							</td>
							<td width="10%" align="center">
							
								<a class="popup" 
									    href="/CuentaCorriente/ListCliente/ClienteId/120"
									    ><img src="/images/icons/add.png" title=""/> Cta cte </a>
							
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										Gatorade
								</p>
							</td>
							<td width="10%">
								<p class="">
										0.00
								</p>
							</td>
							<td width="10%" align="center">
							
								<a class="popup" 
									    href="/CuentaCorriente/ListCliente/ClienteId/121"
									    ><img src="/images/icons/add.png" title=""/> Cta cte </a>
							
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										Norali
								</p>
							</td>
							<td width="10%">
								<p class="">
										0.00
								</p>
							</td>
							<td width="10%" align="center">
							
								<a class="popup" 
									    href="/CuentaCorriente/ListCliente/ClienteId/122"
									    ><img src="/images/icons/add.png" title=""/> Cta cte </a>
							
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										Mosh Imagen
								</p>
							</td>
							<td width="10%">
								<p class="">
										0.00
								</p>
							</td>
							<td width="10%" align="center">
							
								<a class="popup" 
									    href="/CuentaCorriente/ListCliente/ClienteId/123"
									    ><img src="/images/icons/add.png" title=""/> Cta cte </a>
							
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										Lacroix Pollich Alejandro
								</p>
							</td>
							<td width="10%">
								<p class="">
										0.00
								</p>
							</td>
							<td width="10%" align="center">
							
								<a class="popup" 
									    href="/CuentaCorriente/ListCliente/ClienteId/124"
									    ><img src="/images/icons/add.png" title=""/> Cta cte </a>
							
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										Ortiz Hernan Federico
								</p>
							</td>
							<td width="10%">
								<p class="">
										0.00
								</p>
							</td>
							<td width="10%" align="center">
							
								<a class="popup" 
									    href="/CuentaCorriente/ListCliente/ClienteId/125"
									    ><img src="/images/icons/add.png" title=""/> Cta cte </a>
							
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										Love Toys SRL
								</p>
							</td>
							<td width="10%">
								<p class="">
										0.00
								</p>
							</td>
							<td width="10%" align="center">
							
								<a class="popup" 
									    href="/CuentaCorriente/ListCliente/ClienteId/126"
									    ><img src="/images/icons/add.png" title=""/> Cta cte </a>
							
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										Richard Escalera Segovia
								</p>
							</td>
							<td width="10%">
								<p class="">
										0.00
								</p>
							</td>
							<td width="10%" align="center">
							
								<a class="popup" 
									    href="/CuentaCorriente/ListCliente/ClienteId/127"
									    ><img src="/images/icons/add.png" title=""/> Cta cte </a>
							
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										99 centavos
								</p>
							</td>
							<td width="10%">
								<p class="">
										0.00
								</p>
							</td>
							<td width="10%" align="center">
							
								<a class="popup" 
									    href="/CuentaCorriente/ListCliente/ClienteId/128"
									    ><img src="/images/icons/add.png" title=""/> Cta cte </a>
							
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										Estudio edison
								</p>
							</td>
							<td width="10%">
								<p class="">
										0.00
								</p>
							</td>
							<td width="10%" align="center">
							
								<a class="popup" 
									    href="/CuentaCorriente/ListCliente/ClienteId/129"
									    ><img src="/images/icons/add.png" title=""/> Cta cte </a>
							
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										Maria Marte Mallea
								</p>
							</td>
							<td width="10%">
								<p class="">
										0.00
								</p>
							</td>
							<td width="10%" align="center">
							
								<a class="popup" 
									    href="/CuentaCorriente/ListCliente/ClienteId/130"
									    ><img src="/images/icons/add.png" title=""/> Cta cte </a>
							
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										Levitex
								</p>
							</td>
							<td width="10%">
								<p class="">
										0.00
								</p>
							</td>
							<td width="10%" align="center">
							
								<a class="popup" 
									    href="/CuentaCorriente/ListCliente/ClienteId/131"
									    ><img src="/images/icons/add.png" title=""/> Cta cte </a>
							
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										Batanga Media
								</p>
							</td>
							<td width="10%">
								<p class="">
										0.00
								</p>
							</td>
							<td width="10%" align="center">
							
								<a class="popup" 
									    href="/CuentaCorriente/ListCliente/ClienteId/132"
									    ><img src="/images/icons/add.png" title=""/> Cta cte </a>
							
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										YMF-LAB
								</p>
							</td>
							<td width="10%">
								<p class="">
										0.00
								</p>
							</td>
							<td width="10%" align="center">
							
								<a class="popup" 
									    href="/CuentaCorriente/ListCliente/ClienteId/133"
									    ><img src="/images/icons/add.png" title=""/> Cta cte </a>
							
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										bepoketprint
								</p>
							</td>
							<td width="10%">
								<p class="">
										0.00
								</p>
							</td>
							<td width="10%" align="center">
							
								<a class="popup" 
									    href="/CuentaCorriente/ListCliente/ClienteId/134"
									    ><img src="/images/icons/add.png" title=""/> Cta cte </a>
							
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										Gurruchaga outlet
								</p>
							</td>
							<td width="10%">
								<p class="">
										0.00
								</p>
							</td>
							<td width="10%" align="center">
							
								<a class="popup" 
									    href="/CuentaCorriente/ListCliente/ClienteId/135"
									    ><img src="/images/icons/add.png" title=""/> Cta cte </a>
							
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										Full time producciones
								</p>
							</td>
							<td width="10%">
								<p class="">
										0.00
								</p>
							</td>
							<td width="10%" align="center">
							
								<a class="popup" 
									    href="/CuentaCorriente/ListCliente/ClienteId/136"
									    ><img src="/images/icons/add.png" title=""/> Cta cte </a>
							
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										RETAIL & RESEARCH S.R.L
								</p>
							</td>
							<td width="10%">
								<p class="">
										0.00
								</p>
							</td>
							<td width="10%" align="center">
							
								<a class="popup" 
									    href="/CuentaCorriente/ListCliente/ClienteId/137"
									    ><img src="/images/icons/add.png" title=""/> Cta cte </a>
							
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										Banco Patagonia
								</p>
							</td>
							<td width="10%">
								<p class="">
										0.00
								</p>
							</td>
							<td width="10%" align="center">
							
								<a class="popup" 
									    href="/CuentaCorriente/ListCliente/ClienteId/139"
									    ><img src="/images/icons/add.png" title=""/> Cta cte </a>
							
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										Danone
								</p>
							</td>
							<td width="10%">
								<p class="">
										0.00
								</p>
							</td>
							<td width="10%" align="center">
							
								<a class="popup" 
									    href="/CuentaCorriente/ListCliente/ClienteId/140"
									    ><img src="/images/icons/add.png" title=""/> Cta cte </a>
							
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										Agencia Creativa
								</p>
							</td>
							<td width="10%">
								<p class="">
										0.00
								</p>
							</td>
							<td width="10%" align="center">
							
								<a class="popup" 
									    href="/CuentaCorriente/ListCliente/ClienteId/141"
									    ><img src="/images/icons/add.png" title=""/> Cta cte </a>
							
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										Crossfit Andino
								</p>
							</td>
							<td width="10%">
								<p class="">
										0.00
								</p>
							</td>
							<td width="10%" align="center">
							
								<a class="popup" 
									    href="/CuentaCorriente/ListCliente/ClienteId/142"
									    ><img src="/images/icons/add.png" title=""/> Cta cte </a>
							
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										Cristian Almiron
								</p>
							</td>
							<td width="10%">
								<p class="">
										0.00
								</p>
							</td>
							<td width="10%" align="center">
							
								<a class="popup" 
									    href="/CuentaCorriente/ListCliente/ClienteId/143"
									    ><img src="/images/icons/add.png" title=""/> Cta cte </a>
							
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										Almiron Cristian
								</p>
							</td>
							<td width="10%">
								<p class="">
										0.00
								</p>
							</td>
							<td width="10%" align="center">
							
								<a class="popup" 
									    href="/CuentaCorriente/ListCliente/ClienteId/147"
									    ><img src="/images/icons/add.png" title=""/> Cta cte </a>
							
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										Korn propiedades
								</p>
							</td>
							<td width="10%">
								<p class="">
										0.00
								</p>
							</td>
							<td width="10%" align="center">
							
								<a class="popup" 
									    href="/CuentaCorriente/ListCliente/ClienteId/148"
									    ><img src="/images/icons/add.png" title=""/> Cta cte </a>
							
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										Selsa
								</p>
							</td>
							<td width="10%">
								<p class="">
										0.00
								</p>
							</td>
							<td width="10%" align="center">
							
								<a class="popup" 
									    href="/CuentaCorriente/ListCliente/ClienteId/153"
									    ><img src="/images/icons/add.png" title=""/> Cta cte </a>
							
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										Diamonds
								</p>
							</td>
							<td width="10%">
								<p class="">
										0.00
								</p>
							</td>
							<td width="10%" align="center">
							
								<a class="popup" 
									    href="/CuentaCorriente/ListCliente/ClienteId/155"
									    ><img src="/images/icons/add.png" title=""/> Cta cte </a>
							
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										Estilo Griscan
								</p>
							</td>
							<td width="10%">
								<p class="">
										0.00
								</p>
							</td>
							<td width="10%" align="center">
							
								<a class="popup" 
									    href="/CuentaCorriente/ListCliente/ClienteId/156"
									    ><img src="/images/icons/add.png" title=""/> Cta cte </a>
							
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										Barcelona Vinos
								</p>
							</td>
							<td width="10%">
								<p class="">
										0.00
								</p>
							</td>
							<td width="10%" align="center">
							
								<a class="popup" 
									    href="/CuentaCorriente/ListCliente/ClienteId/157"
									    ><img src="/images/icons/add.png" title=""/> Cta cte </a>
							
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										Carlos Encargado
								</p>
							</td>
							<td width="10%">
								<p class="">
										0.00
								</p>
							</td>
							<td width="10%" align="center">
							
								<a class="popup" 
									    href="/CuentaCorriente/ListCliente/ClienteId/158"
									    ><img src="/images/icons/add.png" title=""/> Cta cte </a>
							
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										Cepas Argentina
								</p>
							</td>
							<td width="10%">
								<p class="">
										0.00
								</p>
							</td>
							<td width="10%" align="center">
							
								<a class="popup" 
									    href="/CuentaCorriente/ListCliente/ClienteId/159"
									    ><img src="/images/icons/add.png" title=""/> Cta cte </a>
							
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										Abbott 
								</p>
							</td>
							<td width="10%">
								<p class="">
										0.00
								</p>
							</td>
							<td width="10%" align="center">
							
								<a class="popup" 
									    href="/CuentaCorriente/ListCliente/ClienteId/160"
									    ><img src="/images/icons/add.png" title=""/> Cta cte </a>
							
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										Primon
								</p>
							</td>
							<td width="10%">
								<p class="">
										0.00
								</p>
							</td>
							<td width="10%" align="center">
							
								<a class="popup" 
									    href="/CuentaCorriente/ListCliente/ClienteId/161"
									    ><img src="/images/icons/add.png" title=""/> Cta cte </a>
							
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										Estudio Grin
								</p>
							</td>
							<td width="10%">
								<p class="">
										0.00
								</p>
							</td>
							<td width="10%" align="center">
							
								<a class="popup" 
									    href="/CuentaCorriente/ListCliente/ClienteId/162"
									    ><img src="/images/icons/add.png" title=""/> Cta cte </a>
							
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										Pet Por
								</p>
							</td>
							<td width="10%">
								<p class="">
										0.00
								</p>
							</td>
							<td width="10%" align="center">
							
								<a class="popup" 
									    href="/CuentaCorriente/ListCliente/ClienteId/163"
									    ><img src="/images/icons/add.png" title=""/> Cta cte </a>
							
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										Q4 MKT
								</p>
							</td>
							<td width="10%">
								<p class="">
										0.00
								</p>
							</td>
							<td width="10%" align="center">
							
								<a class="popup" 
									    href="/CuentaCorriente/ListCliente/ClienteId/164"
									    ><img src="/images/icons/add.png" title=""/> Cta cte </a>
							
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										Fundación Programa Integrar
								</p>
							</td>
							<td width="10%">
								<p class="">
										0.00
								</p>
							</td>
							<td width="10%" align="center">
							
								<a class="popup" 
									    href="/CuentaCorriente/ListCliente/ClienteId/165"
									    ><img src="/images/icons/add.png" title=""/> Cta cte </a>
							
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										Awassi
								</p>
							</td>
							<td width="10%">
								<p class="">
										0.00
								</p>
							</td>
							<td width="10%" align="center">
							
								<a class="popup" 
									    href="/CuentaCorriente/ListCliente/ClienteId/166"
									    ><img src="/images/icons/add.png" title=""/> Cta cte </a>
							
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										Gotas pc
								</p>
							</td>
							<td width="10%">
								<p class="">
										0.00
								</p>
							</td>
							<td width="10%" align="center">
							
								<a class="popup" 
									    href="/CuentaCorriente/ListCliente/ClienteId/167"
									    ><img src="/images/icons/add.png" title=""/> Cta cte </a>
							
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										Cetrogar
								</p>
							</td>
							<td width="10%">
								<p class="">
										0.00
								</p>
							</td>
							<td width="10%" align="center">
							
								<a class="popup" 
									    href="/CuentaCorriente/ListCliente/ClienteId/168"
									    ><img src="/images/icons/add.png" title=""/> Cta cte </a>
							
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										Fundacion Carlos Díaz Vélez
								</p>
							</td>
							<td width="10%">
								<p class="">
										0.00
								</p>
							</td>
							<td width="10%" align="center">
							
								<a class="popup" 
									    href="/CuentaCorriente/ListCliente/ClienteId/171"
									    ><img src="/images/icons/add.png" title=""/> Cta cte </a>
							
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										Cittadella
								</p>
							</td>
							<td width="10%">
								<p class="">
										0.00
								</p>
							</td>
							<td width="10%" align="center">
							
								<a class="popup" 
									    href="/CuentaCorriente/ListCliente/ClienteId/172"
									    ><img src="/images/icons/add.png" title=""/> Cta cte </a>
							
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										Barra Tres
								</p>
							</td>
							<td width="10%">
								<p class="">
										0.00
								</p>
							</td>
							<td width="10%" align="center">
							
								<a class="popup" 
									    href="/CuentaCorriente/ListCliente/ClienteId/173"
									    ><img src="/images/icons/add.png" title=""/> Cta cte </a>
							
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										Kinderinos
								</p>
							</td>
							<td width="10%">
								<p class="">
										0.00
								</p>
							</td>
							<td width="10%" align="center">
							
								<a class="popup" 
									    href="/CuentaCorriente/ListCliente/ClienteId/174"
									    ><img src="/images/icons/add.png" title=""/> Cta cte </a>
							
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										Shurita
								</p>
							</td>
							<td width="10%">
								<p class="">
										0.00
								</p>
							</td>
							<td width="10%" align="center">
							
								<a class="popup" 
									    href="/CuentaCorriente/ListCliente/ClienteId/175"
									    ><img src="/images/icons/add.png" title=""/> Cta cte </a>
							
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										Matias Fudim
								</p>
							</td>
							<td width="10%">
								<p class="">
										0.00
								</p>
							</td>
							<td width="10%" align="center">
							
								<a class="popup" 
									    href="/CuentaCorriente/ListCliente/ClienteId/176"
									    ><img src="/images/icons/add.png" title=""/> Cta cte </a>
							
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										Active Cosmetic
								</p>
							</td>
							<td width="10%">
								<p class="">
										0.00
								</p>
							</td>
							<td width="10%" align="center">
							
								<a class="popup" 
									    href="/CuentaCorriente/ListCliente/ClienteId/178"
									    ><img src="/images/icons/add.png" title=""/> Cta cte </a>
							
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										kinobovio
								</p>
							</td>
							<td width="10%">
								<p class="">
										0.00
								</p>
							</td>
							<td width="10%" align="center">
							
								<a class="popup" 
									    href="/CuentaCorriente/ListCliente/ClienteId/179"
									    ><img src="/images/icons/add.png" title=""/> Cta cte </a>
							
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										Zanella
								</p>
							</td>
							<td width="10%">
								<p class="">
										0.00
								</p>
							</td>
							<td width="10%" align="center">
							
								<a class="popup" 
									    href="/CuentaCorriente/ListCliente/ClienteId/180"
									    ><img src="/images/icons/add.png" title=""/> Cta cte </a>
							
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										Prodea. Productos de agua SA (Cunnington)
								</p>
							</td>
							<td width="10%">
								<p class="">
										0.00
								</p>
							</td>
							<td width="10%" align="center">
							
								<a class="popup" 
									    href="/CuentaCorriente/ListCliente/ClienteId/182"
									    ><img src="/images/icons/add.png" title=""/> Cta cte </a>
							
							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										PATAGONIA MEDICAL SA
								</p>
							</td>
							<td width="10%">
								<p class="">
										-20091.54
								</p>
							</td>
							<td width="10%" align="center">
							
								<a class="popup" 
									    href="/CuentaCorriente/ListCliente/ClienteId/3"
									    ><img src="/images/icons/add.png" title=""/> Cta cte </a>
							
							</td>
						</tr>
                    					<!-- items -->
									</table>
            </div> <!-- /listItems -->

</div> <!-- /list -->            
</div> <!-- /list -->

</div>