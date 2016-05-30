150
a:4:{s:8:"template";a:1:{s:28:"Backend/Cheque/Depositar.tpl";b:1;}s:9:"timestamp";i:1407155343;s:7:"expires";i:1407155343;s:13:"cache_serials";a:0:{}}
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



        <div class="contentEditor" id="contentEditor"> <!-- formulario de edicion de contenido -->
        
            <div class="productsEditorContent">
            
            <div class="filtersBox filtersInfoBox">
            	<h1>Depositar cheque # 072-014-00000550</h1>
            	
            	<input type="hidden" value="338" href="" class="" title="" id="ChequeId"/>
            			            <p class="success" style="width:61%;">Actualizado correctamente</p>
								<div id="error"></div>
		        
                <ul>
                    <li>
						
	                    <label class="blue">Banco y cuenta</label>       
	                    <select name="" class="required" id="SeleccionarBanco">
	                        <option value="">Seleccionar</option>
	                        	                        <option value="1" >ICBC - 05280210159072</option>
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