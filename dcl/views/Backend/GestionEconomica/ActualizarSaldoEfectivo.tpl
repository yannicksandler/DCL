{literal}
<script type="text/javascript">
$(document).ready(function(){

	
	$('.ActualizarSaldoEfectivo').click(function() {
        var importe	=	$("#Efectivo").val();
        var saldo	= parseFloat($('#saldoefectivo').val()) + parseFloat($('#Efectivo').val());
		
		if (!importe)
		{
			$('#error').html('<p class="error" style="width:61%;">Error al obtener el importe</p>');
			return false;
		}
		
		$.ajax({
			type: "POST",
			url: '/GestionEconomica/ActualizarSaldoEfectivo',
			dataType: "text/html",
			data: {
				'data[Importe]': importe,
				'data[Detalle]': $("#Concepto").val()
			},
			success: function(html){
				$("#ActualizarSaldoEfectivoContent").html(html);
				$("#ValorEfectivoMain").text('$ '+ saldo);
			}

		});
		
		//return false;
  	});  	 
	
});

</script>
{/literal}

<div id="ActualizarSaldoEfectivoContent">

{if $editSuccessMessage}
            <p class="success" style="width:61%;">{$editSuccessMessage}</p>
{elseif $editErrorMessage}
            <p class="error" style="width:61%;">{$editErrorMessage}</p>
{/if}
<div id="error"></div>

<h1>Agregar efectivo</h1>

<div class="listado">
        
<div class="">
                <ul>
                	<li>
						<p>Efectivo<br><input id="Efectivo" name="data[Efectivo]" value=""></></p>
						    
                    </li>
                    <li>
						<p>Concepto<br><input id="Concepto" name="data[Concepto]" value="{$Concepto}"></></p>
						<input type="button" value="Actualizar" href="" class="button ActualizarSaldoEfectivo" title="" />    
                    </li>
                </ul>
         </div> <!-- /filtersBox-->
</div>         
     
</div>                