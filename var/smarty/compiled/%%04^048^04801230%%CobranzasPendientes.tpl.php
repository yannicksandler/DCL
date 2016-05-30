<?php /* Smarty version 2.6.26, created on 2016-05-05 08:24:53
         compiled from Backend/GestionAdministrativa/CobranzasPendientes.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'count', 'Backend/GestionAdministrativa/CobranzasPendientes.tpl', 156, false),array('modifier', 'escape', 'Backend/GestionAdministrativa/CobranzasPendientes.tpl', 205, false),)), $this); ?>
<?php echo '
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

	$(\'.Aptitud\').click(function() {
        var aptitud	=	$(this).val();
        //alert(aptitud);
		
		if (!aptitud)
		{
			$(\'#error\').html(\'<p class="error" style="width:61%;">Error al obtener la aptitud</p>\');
			return false;
		}

		var examenId			=	$(\'#ExamenId\').val();
		
		$.ajax({
			type: "POST",
			url: \'/Examen/SetAptitud/ExamenId/\' + examenId,
			dataType: "text/html",
			data: {
				\'Aptitud\': aptitud
			},
			success: function(html){
				$("#error").html(html);
				// set aptitud ajax
				//window.location.reload();
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


<div style="width:850px">

<h1>Facturas pendientes de cobro (<?php echo count($this->_tpl_vars['PendienteDeCobro']); ?>
)</h1>
           
<?php if ($this->_tpl_vars['deleteErrorMessage']): ?><p class="error"><?php echo $this->_tpl_vars['deleteErrorMessage']; ?>
</p><?php endif; ?>
<?php if ($this->_tpl_vars['successMessage']): ?><p class="success"><?php echo $this->_tpl_vars['successMessage']; ?>
  <img src="/images/icons/tick.png" /></p><?php endif; ?>

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
					
					<?php if (! count($this->_tpl_vars['PendienteDeCobro'])): ?>
						<h2>No hay facturas pendientes de cobro</h2>
					<?php else: ?>
					<!-- items -->
					<tbody>
					<?php $_from = $this->_tpl_vars['PendienteDeCobro']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['pen']):
?>
						<tr>
							<td width="10%">
								<p class="">
										<?php echo $this->_tpl_vars['pen']['Fecha']; ?>

								</p>
							</td>
							<td width="10%">
								<p class="">
										# <?php echo $this->_tpl_vars['pen']['Id']; ?>

										<?php echo $this->_tpl_vars['pen']['OrdenesDeTrabajoAsociadas']; ?>

								</p>
							</td>
							<td width="20%">
								<?php echo ((is_array($_tmp=$this->_tpl_vars['pen']['Cliente']['Nombre'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'htmlall') : smarty_modifier_escape($_tmp, 'htmlall')); ?>

							</td>
							
							<td width="12%">
								
								<p class="">
								
										$ <?php echo $this->_tpl_vars['pen']['Importe']; ?>

								</p>
							</td>
							
							<td width="12%">
								<p class="">
								
										$ <?php echo $this->_tpl_vars['pen']['ImportePendienteDeCobro']; ?>

								</p>
							</td>
							<td width="10%">
								<p class="">
										<?php echo $this->_tpl_vars['pen']['FechaVencimiento']; ?>

								</p>
							</td>
							<td width="10%">
								<p class="">
										<?php echo $this->_tpl_vars['pen']['CondicionDeCobro']; ?>

								</p>
							</td>
							<td width="10%" align="center">
								    
								    <a class="AgregarOrdenDeCompra" id="<?php echo $this->_tpl_vars['pen']['ClienteId']; ?>
"
								    href="/Cobranza/Edit/ClienteId/<?php echo $this->_tpl_vars['pen']['ClienteId']; ?>
"
								    ><img src="/images/icons/add.png" title="Cobrar"/> Cobrar </a>

							</td>
						</tr>
                    <?php endforeach; endif; unset($_from); ?>
                    </tbody>
					<!-- items -->
					<?php endif; ?>
				</table>
            </div> <!-- /listItems -->

</div> <!-- /list -->            
</div> <!-- /list -->

</div>