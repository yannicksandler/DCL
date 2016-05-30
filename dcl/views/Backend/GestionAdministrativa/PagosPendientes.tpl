<!-- date picker -->
<link type="text/css" href="/styles/ui-lightness/jquery-ui-1.8.2.custom.css" rel="stylesheet" />
<script type="text/javascript" src="/scripts/jquery/jquery.ui.datepicker.js"></script>
<script type="text/javascript" src="/scripts/jquery/jquery.ui.core.js"></script>
<script type="text/javascript" src="/scripts/jquery/jquery.ui.widget.js"></script>

{literal}

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
{/literal}

            <h1>Facturas de compra pendientes de pago ({$FCPendientes|@count})</h1>
            
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
				
					{if !$FCPendientes|@count}
						<h2>No hay facturas de compra pendientes de pago</h2>
					{else}
					<!-- items -->
					
					{foreach from=$FCPendientes item="pendiente"}
						<tr>
							<td width="10%">
								<p class="">
										{$pendiente.Fecha}
								</p>
							</td>
							<td width="10%">
								<p class="">
										{$pendiente.Proveedor.Nombre}
								</p>
							</td>
							<td width="10%">
								<p class="">
								
										# {$pendiente.Numero}
										<img src="/images/icons/zoom_in.png" title="{$pendiente.TextOrdenesDeCompraLiquidacionOrdenDePago}"/>
										{$pendiente.OrdenesDeTrabajoAsociadas}
										(INT# {$pendiente.NumeroInterno} - {$pendiente.Tipo})<br>
								</p>
							</td>
							
							<td width="10%">
								
								<p class="">
										$ {if $pendiente.Importe}{$pendiente.Importe}{else}{$pendiente.ImporteTotal}{/if}
								</p>
							</td>
							
							<td width="10%">
								<p class="">
										$ {$pendiente.ImportePendienteDePago}
								</p>
							</td>
							<td width="10%">
								<p class="">
									{if $pendiente.Tipo == 'N'}
										<input class="UpdateFechaVencimiento FechaVencimiento" type="text" name="" facturaid="{$pendiente.NumeroInterno}" value="{if $pendiente.FechaVencimiento}{$pendiente.FechaVencimiento}{else}sin fecha{/if}"/>
									{else}
										{$pendiente.FechaVencimiento}
									{/if}
								</p>
							</td>
							<td width="10%">
								<p class="">
										{$pendiente.TextOrdenesDeCompraLiquidacionOrdenDePago}
								</p>
							</td>
							<td width="10%" align="center">
								    
								    <a class="AgregarFacturaDeCompra" id="{$pendiente.Numero}"
								    	href="/OrdenPago/Edit/ProveedorId/{$pendiente.ProveedorId}"
								    ><img src="/images/icons/money_add.png" title="Pagar"/> Pagar </a>
								                        
							</td>
						</tr>
                    {/foreach}
					<!-- items -->
					{/if}
				</table>
            </div> <!-- /listItems -->            
            
            
<h1>Ordenes de compra pendientes de validar ({$OrdenesDeCompraPendientes|@count})</h1>

{if $deleteErrorMessage}<p class="error">{$deleteErrorMessage}</p>{/if}
{if $successMessage}<p class="success">{$successMessage}  <img src="/images/icons/tick.png" /></p>{/if}


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
				
					{if !$OrdenesDeCompraPendientes|@count}
						<h2>No hay ordenes de compra pendientes de liquidar</h2>
					{else}
					<!-- items -->
					
					{foreach from=$OrdenesDeCompraPendientes item="oc_pendiente"}
						<tr>
							<td width="10%">
								<p class="">
										{$oc_pendiente.Fecha}
								</p>
							</td>
							<td width="10%">
								<p class="">
										{$oc_pendiente.ProveedorNombre}
								</p>
							</td>
							<td width="10%">
								<p class="">
										# {$oc_pendiente.Id}
										<img src="/images/icons/zoom_in.png" title="({$oc_pendiente.Entregado}) - {$oc_pendiente.FormaDePago}"/>
										<br>(OT {$oc_pendiente.OrdenDeTrabajoId})
								</p>
							</td>
							<td width="20%">
								
								<table border="0" cellspacing="0">
								  <tr>
								    <td>
								    <p><img src="/images/icons/bullet_go.png" alt="item" title="Item"/> {$oc_pendiente.InsumoNombre}</p>
								    </td>
								  </tr>
								</table>
								
								
							</td>
							
							<td width="10%">
								
								<p class="">
								
										$ {$oc_pendiente.Importe}
								</p>
							</td>
							
							<td width="10%">
								<p class="">
								
										$ {$oc_pendiente.ImportePendienteDePago}
								</p>
							</td>
							<td width="10%">
								<p class="">
								
										$ {$oc_pendiente.ImportePendienteDeValidar}
								</p>
							</td>
							<td width="10%">
								<p class="">
										({if $oc_pendiente.Entregado}{$oc_pendiente.Entregado}{else}No entregado{/if}) {if $oc_pendiente.FormaDePago}- {$oc_pendiente.FormaDePago}{/if}
								</p>
							</td>
							<td width="10%" align="center">
							
							{if $oc_pendiente.ImportePendienteDePago > 0}
								    <a class="AgregarOrdenDeCompra" id="{$oc_pendiente.Id}"
								    href="/OrdenPago/Edit/ProveedorId/{$oc_pendiente.ProveedorId}"
								    ><img src="/images/icons/money_add.png" title="Liquidar"/> Pagar </a>
							{/if}
								    <br>
								    <a class="" id="{$oc_pendiente.ProveedorId}"
								    href="/FacturaCompra/Edit/ProveedorId/{$oc_pendiente.ProveedorId}"
								    ><img src="/images/icons/add.png" title="Liquidar"/> Validar OC </a>
								    <br>
								                        
							</td>
						</tr>
                    {/foreach}
					<!-- items -->
					{/if}
				</table>
            </div> <!-- /listItems -->

</div> <!-- /list -->            
</div> <!-- /list -->
