{literal}
<script type="text/javascript">
$(document).ready(function(){

	$('#Fecha').datepicker({
		changeMonth: true,
		changeYear: true,
        dateFormat: 'dd/mm/yy'
	});
	
	$('.AgregarConcepto').click(function() {
		
		var $selected 	=	$("#SeleccionarDebeHaber").find('option:selected');
		var $tipo	=	$selected.val();

		var $selectedC 	=	$("#SeleccionarConcepto").find('option:selected');

		//if(!$selectedC)
			//return false;
		
		var r = confirm('Esta seguro que desea agregar un concepto?');

		if(!r)
			return false;	

		
		$.ajax({
			type: "POST",
			url: '/CuentaCorriente/AgregarConceptoBanco',
			dataType: "text/html",
			data: {
				'data[BancoId]': $("#BancoId").val(),
				'data[Fecha]': $("#Fecha").val(),
				'data[Detalle]': $selectedC.text(),
				'data[Importe]': $("#ImporteItem").val(),
				'data[Tipo]': $tipo
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
{/literal}


        <div class="contentEditor" id="contentEditor"> <!-- formulario de edicion de contenido -->
        
            <div class="productsEditorContent">
            
            <input class="" type="hidden" name="" id="BancoId" value="{$BancoId}"/>
            
            <div class="filtersBox filtersInfoBox">
            	<h1>Agregar concepto</h1>
            	
            	<input type="hidden" value="{$Cheque.Id}" href="" class="" title="" id="ChequeId"/>
            	{if $editSuccessMessage}
		            <p class="success" style="width:61%;">{$editSuccessMessage}</p>
				{elseif $editErrorMessage}
				            <p class="error" style="width:61%;">{$editErrorMessage}</p>
				            <script>alert('{$editErrorMessage}');</script>
				{/if}
				{if $mensaje}
				<script>alert('{$mensaje}');</script>
				{/if}
				<div id="error"></div>
		        
                <ul>
                	<li>
                    	
                	    <label class="blue">Fecha de concepto</label>
						<input class="date" type="text" name="data[Fecha]" id="Fecha" value="{$data.Fecha}"/>
                    </li>
                     
                    <li>
	                    <label class="blue">Concepto</label>       
	                    <select name="" class="" id="SeleccionarConcepto">
	                        <option value="">Seleccionar</option>
	                        {foreach from=$Conceptos item="t"}
	                        <option value="{$t.Id}">{$t.Nombre}</option>
	                        {/foreach}
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