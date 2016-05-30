<?php /* Smarty version 2.6.26, created on 2016-04-13 10:07:02
         compiled from Backend/Cheque/Depositar.tpl */ ?>
<?php echo '
<script type="text/javascript">
$(document).ready(function(){

	
	$(\'.Depositar\').click(function() {
		/*
		
		if (!saldo)
		{
			$(\'#error\').html(\'<p class="error" style="width:61%;">Error al obtener el saldo</p>\');
			return false;
		}
		*/
		var $selected 	=	$("#SeleccionarBanco").find(\'option:selected\');
		var $bancoid	=	$selected.val();
		
		$.ajax({
			type: "POST",
			url: \'/GestionEconomica/DepositarCheque\',
			dataType: "text/html",
			data: {
				\'data[ChequeId]\': $("#ChequeId").val(),
				\'ChequeId\': $("#ChequeId").val(),
				\'data[BancoId]\': $bancoid
			},
			success: function(html){
				$("#contentEditor").html(html);
				$("#TabChequesEnCartera").click();
				GetBancos();
			}

		});
		
		//return false;
  	});  	 
	
});

</script>
'; ?>



        <div class="contentEditor" id="contentEditor"> <!-- formulario de edicion de contenido -->
        
            <div class="productsEditorContent">
            
            <div class="filtersBox filtersInfoBox">
            	<h1>Depositar cheque # <?php echo $this->_tpl_vars['Cheque']['Numero']; ?>
</h1>
            	
            	<input type="hidden" value="<?php echo $this->_tpl_vars['Cheque']['Id']; ?>
" href="" class="" title="" id="ChequeId"/>
            	<?php if ($this->_tpl_vars['editSuccessMessage']): ?>
		            <p class="success" style="width:61%;"><?php echo $this->_tpl_vars['editSuccessMessage']; ?>
</p>
				<?php elseif ($this->_tpl_vars['editErrorMessage']): ?>
				            <p class="error" style="width:61%;"><?php echo $this->_tpl_vars['editErrorMessage']; ?>
</p>
				<?php endif; ?>
				<div id="error"></div>
		        
                <ul>
                    <li>
						
	                    <label class="blue">Banco y cuenta</label>       
	                    <select name="" class="required" id="SeleccionarBanco">
	                        <option value="">Seleccionar</option>
	                        <?php $_from = $this->_tpl_vars['Bancos']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['t']):
?>
	                        <option value="<?php echo $this->_tpl_vars['t']['Id']; ?>
" <?php if (( $this->_tpl_vars['t']['Id'] == $this->_tpl_vars['BancoId'] )): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['t']['Nombre']; ?>
 - <?php echo $this->_tpl_vars['t']['NumeroDeCuenta']; ?>
</option>
	                        <?php endforeach; endif; unset($_from); ?>
	                    </select>
	                    <!-- 
	                    <a class="SeleccionarCliente">Seleccionar cliente (seleccion avanzada)</a>
						 -->	
						 
                    </li>
                    <li>
                    	<input type="button" value="Depositar" href="" class="button Depositar" title="" />
                    </li>
                </ul>
            </div> <!-- /filtersBox-->
                 
                
            </div> <!-- /productsEditorContent -->
        </div>  <!-- /contentEditor -->