{literal}
<script type="text/javascript">
$(document).ready(function(){

	
	$('.Depositar').click(function() {
		/*
		
		if (!saldo)
		{
			$('#error').html('<p class="error" style="width:61%;">Error al obtener el saldo</p>');
			return false;
		}
		*/
		var $selected 	=	$("#SeleccionarBanco").find('option:selected');
		var $bancoid	=	$selected.val();
		
		$.ajax({
			type: "POST",
			url: '/GestionEconomica/DepositarCheque',
			dataType: "text/html",
			data: {
				'data[ChequeId]': $("#ChequeId").val(),
				'ChequeId': $("#ChequeId").val(),
				'data[BancoId]': $bancoid
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
{/literal}


        <div class="contentEditor" id="contentEditor"> <!-- formulario de edicion de contenido -->
        
            <div class="productsEditorContent">
            
            <div class="filtersBox filtersInfoBox">
            	<h1>Depositar cheque # {$Cheque.Numero}</h1>
            	
            	<input type="hidden" value="{$Cheque.Id}" href="" class="" title="" id="ChequeId"/>
            	{if $editSuccessMessage}
		            <p class="success" style="width:61%;">{$editSuccessMessage}</p>
				{elseif $editErrorMessage}
				            <p class="error" style="width:61%;">{$editErrorMessage}</p>
				{/if}
				<div id="error"></div>
		        
                <ul>
                    <li>
						
	                    <label class="blue">Banco y cuenta</label>       
	                    <select name="" class="required" id="SeleccionarBanco">
	                        <option value="">Seleccionar</option>
	                        {foreach from=$Bancos item="t"}
	                        <option value="{$t.Id}" {if ($t.Id eq $BancoId) }selected="selected"{/if}>{$t.Nombre} - {$t.NumeroDeCuenta}</option>
	                        {/foreach}
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