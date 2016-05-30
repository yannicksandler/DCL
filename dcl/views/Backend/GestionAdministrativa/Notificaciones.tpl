{literal}
<script type="text/javascript">
$(document).ready(function(){
    $("#FormObservacion").validate();
	
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
{/literal}

        <div class="list">
            
                <div class="listTop">
					<div>
						<table border="0" cellpadding="0" cellspacing="0">
							<tr>
								<td width="80%"><p>Notificaciones</p></td>
								<td width="20%"><p>Acciones</p></td>
							</tr>
						</table>
					</div>
                </div> <!-- /listadoTop -->
            
            <div class="listItems listItemsScroll">
				<table border="0" cellpadding="0" cellspacing="0">
				
					{if !$Notificaciones|@count}
						<p>No hay notificaciones pendientes</p>
					{/if}
					
					<!-- items -->
					{foreach from=$Notificaciones item="o"}
						<tr>
							<td width="80%">
								<p class="obervations">
										{$o.Mensaje|nl2br}
								</p>
							</td>
							<td width="20%" align="center">	           
								    <input type="button" class="EliminarObservacion btDelete" id="{$o.Id}" title="Eliminar observacion">
								                            
							</td>
						</tr>
                    {/foreach}
					<!-- items -->
					
				</table>
            </div> <!-- /listItems -->
        
        </div> <!-- /list -->
        
			<form id="FormObservacion" enctype="multipart/form-data" action="" method="post">
                
                <div class="form">

						{if $editSuccessMessage}
							<p class="success" style="width:61%;">{$editSuccessMessage}</p>
						{elseif $editErrorMessage}
							<p class="error" style="width:61%;">{$editErrorMessage}</p>
						{/if}
						<div id="error"></div>

							<table width="100%"  border="0" cellspacing="0">
							  <tr>
							    <td width="50%">
							
								</td>
							    <td with="50%">
							    	<div style="float: left; width: 100%;"><h1>Nueva Observacion</h1></div>		
                            
							    </td>
							  </tr>
							  <tr>
							    <td width="50%">
							
							    
							    </td>
							    <td width="50%">
							    
								<div class="contentTitles">
								
                                <label class="blue">Notificaciones</label>
                                
                                </div> <!-- /contentTitles -->
								<textarea cols="55" rows="5" id="observacion"></textarea>
			                            
                            <div style="float: left; width: 100%;">
                            <h2><br></br></h2>
                            <input type="submit" value="Guardar" class="btDark" title="Guardar observacion" />
                            </div>
                                
							    </td>
							  </tr>
							</table>                                                
					
                </div> <!-- /form -->
            </form>                