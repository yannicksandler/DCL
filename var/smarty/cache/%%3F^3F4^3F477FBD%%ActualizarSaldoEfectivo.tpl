174
a:4:{s:8:"template";a:1:{s:52:"Backend/GestionEconomica/ActualizarSaldoEfectivo.tpl";b:1;}s:9:"timestamp";i:1460464579;s:7:"expires";i:1460464579;s:13:"cache_serials";a:0:{}}
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


<div id="ActualizarSaldoEfectivoContent">

            <p class="success" style="width:61%;">Actualizado correctamente</p>
<div id="error"></div>

<h1>Agregar efectivo</h1>

<div class="listado">
        
<div class="">
                <ul>
                	<li>
						<p>Efectivo<br><input id="Efectivo" name="data[Efectivo]" value=""></></p>
						    
                    </li>
                    <li>
						<p>Concepto<br><input id="Concepto" name="data[Concepto]" value=""></></p>
						<input type="button" value="Actualizar" href="" class="button ActualizarSaldoEfectivo" title="" />    
                    </li>
                </ul>
         </div> <!-- /filtersBox-->
</div>         
     
</div>                