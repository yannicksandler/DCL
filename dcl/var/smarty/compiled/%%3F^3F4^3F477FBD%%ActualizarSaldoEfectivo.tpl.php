<?php /* Smarty version 2.6.26, created on 2014-09-16 16:04:14
         compiled from Backend/GestionEconomica/ActualizarSaldoEfectivo.tpl */ ?>
<?php echo '
<script type="text/javascript">
$(document).ready(function(){

	
	$(\'.ActualizarSaldoEfectivo\').click(function() {
        var importe	=	$("#Efectivo").val();
        var saldo	= parseFloat($(\'#saldoefectivo\').val()) + parseFloat($(\'#Efectivo\').val());
		
		if (!importe)
		{
			$(\'#error\').html(\'<p class="error" style="width:61%;">Error al obtener el importe</p>\');
			return false;
		}
		
		$.ajax({
			type: "POST",
			url: \'/GestionEconomica/ActualizarSaldoEfectivo\',
			dataType: "text/html",
			data: {
				\'data[Importe]\': importe,
				\'data[Detalle]\': $("#Concepto").val()
			},
			success: function(html){
				$("#ActualizarSaldoEfectivoContent").html(html);
				$("#ValorEfectivoMain").text(\'$ \'+ saldo);
			}

		});
		
		//return false;
  	});  	 
	
});

</script>
'; ?>


<div id="ActualizarSaldoEfectivoContent">

<?php if ($this->_tpl_vars['editSuccessMessage']): ?>
            <p class="success" style="width:61%;"><?php echo $this->_tpl_vars['editSuccessMessage']; ?>
</p>
<?php elseif ($this->_tpl_vars['editErrorMessage']): ?>
            <p class="error" style="width:61%;"><?php echo $this->_tpl_vars['editErrorMessage']; ?>
</p>
<?php endif; ?>
<div id="error"></div>

<h1>Agregar efectivo</h1>

<div class="listado">
        
<div class="">
                <ul>
                	<li>
						<p>Efectivo<br><input id="Efectivo" name="data[Efectivo]" value=""></></p>
						    
                    </li>
                    <li>
						<p>Concepto<br><input id="Concepto" name="data[Concepto]" value="<?php echo $this->_tpl_vars['Concepto']; ?>
"></></p>
						<input type="button" value="Actualizar" href="" class="button ActualizarSaldoEfectivo" title="" />    
                    </li>
                </ul>
         </div> <!-- /filtersBox-->
</div>         
     
</div>                