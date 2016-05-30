<?php /* Smarty version 2.6.26, created on 2016-05-04 14:09:17
         compiled from Backend/CuentaCorriente/AgregarConceptoBanco.tpl */ ?>
<?php echo '
<script type="text/javascript">
$(document).ready(function(){

	$(\'#Fecha\').datepicker({
		changeMonth: true,
		changeYear: true,
        dateFormat: \'dd/mm/yy\'
	});
	
	$(\'.AgregarConcepto\').click(function() {
		
		var $selected 	=	$("#SeleccionarDebeHaber").find(\'option:selected\');
		var $tipo	=	$selected.val();

		var $selectedC 	=	$("#SeleccionarConcepto").find(\'option:selected\');

		//if(!$selectedC)
			//return false;
		
		var r = confirm(\'Esta seguro que desea agregar un concepto?\');

		if(!r)
			return false;	

		
		$.ajax({
			type: "POST",
			url: \'/CuentaCorriente/AgregarConceptoBanco\',
			dataType: "text/html",
			data: {
				\'data[BancoId]\': $("#BancoId").val(),
				\'data[Fecha]\': $("#Fecha").val(),
				\'data[Detalle]\': $selectedC.text(),
				\'data[Importe]\': $("#ImporteItem").val(),
				\'data[Tipo]\': $tipo
			},
			success: function(html){
				$("#contentEditor").html(html);
				reload();
			}

		});
		
		//return false;
  	});  	 
	
});

</script>
'; ?>



        <div class="contentEditor" id="contentEditor"> <!-- formulario de edicion de contenido -->
        
            <div class="productsEditorContent">
            
            <input class="" type="hidden" name="" id="BancoId" value="<?php echo $this->_tpl_vars['BancoId']; ?>
"/>
            
            <div class="filtersBox filtersInfoBox">
            	<h1>Agregar concepto</h1>
            	
            	<input type="hidden" value="<?php echo $this->_tpl_vars['Cheque']['Id']; ?>
" href="" class="" title="" id="ChequeId"/>
            	<?php if ($this->_tpl_vars['editSuccessMessage']): ?>
		            <p class="success" style="width:61%;"><?php echo $this->_tpl_vars['editSuccessMessage']; ?>
</p>
				<?php elseif ($this->_tpl_vars['editErrorMessage']): ?>
				            <p class="error" style="width:61%;"><?php echo $this->_tpl_vars['editErrorMessage']; ?>
</p>
				            <script>alert('<?php echo $this->_tpl_vars['editErrorMessage']; ?>
');</script>
				<?php endif; ?>
				<?php if ($this->_tpl_vars['mensaje']): ?>
				<script>alert('<?php echo $this->_tpl_vars['mensaje']; ?>
');</script>
				<?php endif; ?>
				<div id="error"></div>
		        
                <ul>
                	<li>
                    	
                	    <label class="blue">Fecha de concepto</label>
						<input class="date" type="text" name="data[Fecha]" id="Fecha" value="<?php echo $this->_tpl_vars['data']['Fecha']; ?>
"/>
                    </li>
                     
                    <li>
	                    <label class="blue">Concepto</label>       
	                    <select name="" class="" id="SeleccionarConcepto">
	                        <option value="">Seleccionar</option>
	                        <?php $_from = $this->_tpl_vars['Conceptos']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['t']):
?>
	                        <option value="<?php echo $this->_tpl_vars['t']['Id']; ?>
"><?php echo $this->_tpl_vars['t']['Nombre']; ?>
</option>
	                        <?php endforeach; endif; unset($_from); ?>
	                    </select>
                    </li>
                    <!-- 
                    <li>
                    	<label class="blue">Concepto</label>       
                    	<input type="text" value="" class="" name="" id="ConceptoItem"/>
                    </li>
                     -->
                    <li>
                    	<label class="blue">Importe</label>       
                    	<input type="text" value="" class="" name="" id="ImporteItem"/>
                    </li>
                    <li>       
                    	<label class="blue">Tipo</label>
                    	<select name="" class="" id="SeleccionarDebeHaber">
	                        <option value="">Seleccionar</option>
	                        <option value="Haber">Debitar</option>
	                        <option value="Debe">Acreditar</option>
	                    </select>
                    </li>
                    <li>
                    	<input type="button" value="Agregar" href="" class="button AgregarConcepto" title="" />
                    </li>
                </ul>
            </div> <!-- /filtersBox-->
                 
                
            </div> <!-- /productsEditorContent -->
        </div>  <!-- /contentEditor -->