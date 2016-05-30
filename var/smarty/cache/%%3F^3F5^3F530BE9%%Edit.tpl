156
a:4:{s:8:"template";a:1:{s:34:"Backend/BancoTipoConcepto/Edit.tpl";b:1;}s:9:"timestamp";i:1460228436;s:7:"expires";i:1460228436;s:13:"cache_serials";a:0:{}}
<script type="text/javascript" src="/scripts/Edit.js"></script>


<script type="text/javascript">
$(document).ready(function(){
    $("#FrmEdit").validate();
    

});
</script>



<h1>Editar concepto bancario &raquo; <span>39</span></h1>

<form id="FrmEdit" enctype="multipart/form-data" action="" method="post">
    <input type="hidden" name="data[Id]" value="39" />
   
    <div class="form">
        <div id="FormsColumn"> <!-- contiene toda la columna -->
		
			    <div class="formButtons">
				        <div class="info">
				        <input type="button" class="btMinimize btBlock" value="" title="Bloquear arriba" />
				        <!-- al clickear, que desactive el movimiento, y quede bloqueado arriba -->
				        
				        <div id="formButtonsContent">
				        
				            <ul>
				
				                <li class="buttonsTop">
				                <input type="submit" value="Guardar" class="btGray" title="Guardar" />
				                <input type="reset" value="Volver" class="btGray" title="Volver" onclick="window.location='/GestionEconomica/Main'"/>
				                </li>
				            </ul>
				            
				        </div> <!-- /formButtonsContent -->
				        
				        </div> <!-- /info -->
				    </div> <!-- /formButtons -->
				
				</div> <!-- /FormsColumn -->
            
                    <p class="success" style="width:61%;">El registro se guardo con exito</p>
                
        <div class="contentEditor"> <!-- formulario de edicion de contenido -->
                
            <div class="productsEditorContent">
            
                <div class="contentTitles">
                    <label class="blue">Nombre</label>
                    <input type="text" class="required" name="data[Nombre]" value="APORTE A SOCIEDAD">
                </div> <!-- /contentTitles -->
                         
            </div> <!-- /productsEditorContent -->
        </div>  <!-- /contentEditor -->
    </div> <!-- /form -->
</form>