150
a:4:{s:8:"template";a:1:{s:28:"Backend/Cheque/Depositar.tpl";b:1;}s:9:"timestamp";i:1460552822;s:7:"expires";i:1460552822;s:13:"cache_serials";a:0:{}}
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
            	<h1>Depositar cheque # 34720690</h1>
            	
            	<input type="hidden" value="758" href="" class="" title="" id="ChequeId"/>
            					<div id="error"></div>
		        
                <ul>
                    <li>
						
	                    <label class="blue">Banco y cuenta</label>       
	                    <select name="" class="required" id="SeleccionarBanco">
	                        <option value="">Seleccionar</option>
	                        	                        <option value="1" >ICBC - 05280210159072</option>
	                        	                        <option value="20" >Plazo Fijo ICBC - 00000000</option>
	                        	                        <option value="22" >ICBC - 05280210308263</option>
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