<?php /* Smarty version 2.6.26, created on 2014-09-19 11:23:04
         compiled from Backend/GestionAdministrativa/PagosPendientes.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'count', 'Backend/GestionAdministrativa/PagosPendientes.tpl', 193, false),)), $this); ?>
<!-- date picker -->
<link type="text/css" href="/styles/ui-lightness/jquery-ui-1.8.2.custom.css" rel="stylesheet" />
<script type="text/javascript" src="/scripts/jquery/jquery.ui.datepicker.js"></script>
<script type="text/javascript" src="/scripts/jquery/jquery.ui.core.js"></script>
<script type="text/javascript" src="/scripts/jquery/jquery.ui.widget.js"></script>

<?php echo '

<script type="text/javascript">
$(document).ready(function(){
    $("#FormObservacion").validate();

    $(\'.FechaVencimiento\').datepicker({
		changeMonth: true,
		changeYear: true,
        dateFormat: \'dd/mm/yy\'
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
    
	
	$(\'#FormObservacion\').submit(function() {
        var observacion	=	$(\'#observacion\').val();
		
		if (!observacion)
		{
			$(\'#error\').html(\'<p class="error" style="width:61%;">Debe ingresar un comentario</p>\');
			return false;
		}

		var examenId			=	$(\'#ExamenId\').val();
		
		$.ajax({
			type: "POST",
			url: \'/Examen/Observaciones/ExamenId/\' + examenId,
			dataType: "text/html",
			data: {
				\'Observacion\': escape(observacion),
				\'Accion\': \'add\'
			},
			success: function(html){
				$("#ExamenHomeContent").html(html);
				
			}

		});
		
		return false;
  	});

	$(\'.UpdateFechaVencimiento\').change(function() {
        var fecha	=	$(this).val();
        var facturaId			=	$(this).attr(\'facturaid\');
        //alert(aptitud);
		
		if (!fecha)
		{
			alert(\'Debe ingresar una fecha de vencimiento\');
			return false;
		}

		if (!facturaId)
		{
			alert(\'Debe ingresar una factura de compra\');
			return false;
		}

		$.ajax({
			type: "POST",
			url: \'/FacturaCompra/UpdateFacturaCompra\',
			dataType: "text/html",
			data: {
				\'NumeroInterno\': facturaId,
				\'FechaVencimiento\': fecha
			},
			success: function(html){
				alert(html);
			}

		});
		
		//return false;
  	});

	$(\'.DeberaConcurrir\').click(function() {
        var DeberaConcurrir	=	$(this).val();
        
		if (!DeberaConcurrir)
		{
			$(\'#error\').html(\'<p class="error" style="width:61%;">Error al obtener la concurrencia</p>\');
			return false;
		}

		var examenId			=	$(\'#ExamenId\').val();
		
		$.ajax({
			type: "POST",
			url: \'/Examen/SetDeberaConcurrir/ExamenId/\' + examenId,
			dataType: "text/html",
			data: {
				\'DeberaConcurrir\': DeberaConcurrir
			},
			success: function(html){
				$("#error").html(html);
				// set aptitud ajax
				//window.location.reload();
			}

		});
		
		//return false;
  	});

	$(\'.EliminarObservacion\').click(function() {
        var observacionId	=	$(this).attr(\'id\');

		var r	=	confirm(\'Esta seguro que desea eliminar la observacion?\');

		if(r)
		{
			if (!observacionId)
			{
				$(\'#error\').html(\'<p class="error" style="width:61%;">No es posible eliminar la observacion</p>\');
				return false;
			}
	
			var examenId			=	$(\'#ExamenId\').val();
			
			$.ajax({
				type: "POST",
				url: \'/Examen/Observaciones/ExamenId/\' + examenId,
				dataType: "text/html",
				data: {
					\'ObservacionId\': observacionId,
					\'Accion\': \'delete\'
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
'; ?>


            <h1>Facturas de compra pendientes de pago (<?php echo count($this->_tpl_vars['FCPendientes']); ?>
)</h1>
            
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
				
					<?php if (! count($this->_tpl_vars['FCPendientes'])): ?>
						<h2>No hay facturas de compra pendientes de pago</h2>
					<?php else: ?>
					<!-- items -->
					
					<?php $_from = $this->_tpl_vars['FCPendientes']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['pendiente']):
?>
						<tr>
							<td width="10%">
								<p class="">
										<?php echo $this->_tpl_vars['pendiente']['Fecha']; ?>

								</p>
							</td>
							<td width="10%">
								<p class="">
										<?php echo $this->_tpl_vars['pendiente']['Proveedor']['Nombre']; ?>

								</p>
							</td>
							<td width="10%">
								<p class="">
								
										# <?php echo $this->_tpl_vars['pendiente']['Numero']; ?>

										<img src="/images/icons/zoom_in.png" title="<?php echo $this->_tpl_vars['pendiente']['TextOrdenesDeCompraLiquidacionOrdenDePago']; ?>
"/>
										<?php echo $this->_tpl_vars['pendiente']['OrdenesDeTrabajoAsociadas']; ?>

										(INT# <?php echo $this->_tpl_vars['pendiente']['NumeroInterno']; ?>
 - <?php echo $this->_tpl_vars['pendiente']['Tipo']; ?>
)<br>
								</p>
							</td>
							
							<td width="10%">
								
								<p class="">
										$ <?php if ($this->_tpl_vars['pendiente']['Importe']): ?><?php echo $this->_tpl_vars['pendiente']['Importe']; ?>
<?php else: ?><?php echo $this->_tpl_vars['pendiente']['ImporteTotal']; ?>
<?php endif; ?>
								</p>
							</td>
							
							<td width="10%">
								<p class="">
										$ <?php echo $this->_tpl_vars['pendiente']['ImportePendienteDePago']; ?>

								</p>
							</td>
							<td width="10%">
								<p class="">
									<?php if ($this->_tpl_vars['pendiente']['Tipo'] == 'N'): ?>
										<input class="UpdateFechaVencimiento FechaVencimiento" type="text" name="" facturaid="<?php echo $this->_tpl_vars['pendiente']['NumeroInterno']; ?>
" value="<?php if ($this->_tpl_vars['pendiente']['FechaVencimiento']): ?><?php echo $this->_tpl_vars['pendiente']['FechaVencimiento']; ?>
<?php else: ?>sin fecha<?php endif; ?>"/>
									<?php else: ?>
										<?php echo $this->_tpl_vars['pendiente']['FechaVencimiento']; ?>

									<?php endif; ?>
								</p>
							</td>
							<td width="10%">
								<p class="">
										<?php echo $this->_tpl_vars['pendiente']['TextOrdenesDeCompraLiquidacionOrdenDePago']; ?>

								</p>
							</td>
							<td width="10%" align="center">
								    
								    <a class="AgregarFacturaDeCompra" id="<?php echo $this->_tpl_vars['pendiente']['Numero']; ?>
"
								    	href="/OrdenPago/Edit/ProveedorId/<?php echo $this->_tpl_vars['pendiente']['ProveedorId']; ?>
"
								    ><img src="/images/icons/money_add.png" title="Pagar"/> Pagar </a>
								                        
							</td>
						</tr>
                    <?php endforeach; endif; unset($_from); ?>
					<!-- items -->
					<?php endif; ?>
				</table>
            </div> <!-- /listItems -->            
            
            
<h1>Ordenes de compra pendientes de validar (<?php echo count($this->_tpl_vars['OrdenesDeCompraPendientes']); ?>
)</h1>

<?php if ($this->_tpl_vars['deleteErrorMessage']): ?><p class="error"><?php echo $this->_tpl_vars['deleteErrorMessage']; ?>
</p><?php endif; ?>
<?php if ($this->_tpl_vars['successMessage']): ?><p class="success"><?php echo $this->_tpl_vars['successMessage']; ?>
  <img src="/images/icons/tick.png" /></p><?php endif; ?>


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
				
					<?php if (! count($this->_tpl_vars['OrdenesDeCompraPendientes'])): ?>
						<h2>No hay ordenes de compra pendientes de liquidar</h2>
					<?php else: ?>
					<!-- items -->
					
					<?php $_from = $this->_tpl_vars['OrdenesDeCompraPendientes']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['oc_pendiente']):
?>
						<tr>
							<td width="10%">
								<p class="">
										<?php echo $this->_tpl_vars['oc_pendiente']['Fecha']; ?>

								</p>
							</td>
							<td width="10%">
								<p class="">
										<?php echo $this->_tpl_vars['oc_pendiente']['ProveedorNombre']; ?>

								</p>
							</td>
							<td width="10%">
								<p class="">
										# <?php echo $this->_tpl_vars['oc_pendiente']['Id']; ?>

										<img src="/images/icons/zoom_in.png" title="(<?php echo $this->_tpl_vars['oc_pendiente']['Entregado']; ?>
) - <?php echo $this->_tpl_vars['oc_pendiente']['FormaDePago']; ?>
"/>
										<br>(OT <?php echo $this->_tpl_vars['oc_pendiente']['OrdenDeTrabajoId']; ?>
)
								</p>
							</td>
							<td width="20%">
								
								<table border="0" cellspacing="0">
								  <tr>
								    <td>
								    <p><img src="/images/icons/bullet_go.png" alt="item" title="Item"/> <?php echo $this->_tpl_vars['oc_pendiente']['InsumoNombre']; ?>
</p>
								    </td>
								  </tr>
								</table>
								
								
							</td>
							
							<td width="10%">
								
								<p class="">
								
										$ <?php echo $this->_tpl_vars['oc_pendiente']['Importe']; ?>

								</p>
							</td>
							
							<td width="10%">
								<p class="">
								
										$ <?php echo $this->_tpl_vars['oc_pendiente']['ImportePendienteDePago']; ?>

								</p>
							</td>
							<td width="10%">
								<p class="">
								
										$ <?php echo $this->_tpl_vars['oc_pendiente']['ImportePendienteDeValidar']; ?>

								</p>
							</td>
							<td width="10%">
								<p class="">
										(<?php if ($this->_tpl_vars['oc_pendiente']['Entregado']): ?><?php echo $this->_tpl_vars['oc_pendiente']['Entregado']; ?>
<?php else: ?>No entregado<?php endif; ?>) <?php if ($this->_tpl_vars['oc_pendiente']['FormaDePago']): ?>- <?php echo $this->_tpl_vars['oc_pendiente']['FormaDePago']; ?>
<?php endif; ?>
								</p>
							</td>
							<td width="10%" align="center">
							
							<?php if ($this->_tpl_vars['oc_pendiente']['ImportePendienteDePago'] > 0): ?>
								    <a class="AgregarOrdenDeCompra" id="<?php echo $this->_tpl_vars['oc_pendiente']['Id']; ?>
"
								    href="/OrdenPago/Edit/ProveedorId/<?php echo $this->_tpl_vars['oc_pendiente']['ProveedorId']; ?>
"
								    ><img src="/images/icons/money_add.png" title="Liquidar"/> Pagar </a>
							<?php endif; ?>
								    <br>
								    <a class="" id="<?php echo $this->_tpl_vars['oc_pendiente']['ProveedorId']; ?>
"
								    href="/FacturaCompra/Edit/ProveedorId/<?php echo $this->_tpl_vars['oc_pendiente']['ProveedorId']; ?>
"
								    ><img src="/images/icons/add.png" title="Liquidar"/> Validar OC </a>
								    <br>
								                        
							</td>
						</tr>
                    <?php endforeach; endif; unset($_from); ?>
					<!-- items -->
					<?php endif; ?>
				</table>
            </div> <!-- /listItems -->

</div> <!-- /list -->            
</div> <!-- /list -->