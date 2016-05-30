144
a:4:{s:8:"template";a:1:{s:22:"Backend/Banco/Edit.tpl";b:1;}s:9:"timestamp";i:1409662588;s:7:"expires";i:1409662588;s:13:"cache_serials";a:0:{}}
<script type="text/javascript" src="/scripts/Edit.js"></script>


<script type="text/javascript">
$(document).ready(function(){
    $("#FrmEdit").validate();
    

});
</script>



<h1>Editar Banco &raquo; <span>1</span></h1>

<form id="FrmEdit" enctype="multipart/form-data" action="" method="post">
    <input type="hidden" name="data[Id]" value="1" />
   
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
            
                
        <div class="contentEditor"> <!-- formulario de edicion de contenido -->
                
            <div class="productsEditorContent">
            
                <div class="contentTitles">
                    <label class="blue">Nombre</label>
                    <input type="text" class="required" name="data[Nombre]" value="ICBC">
                </div> <!-- /contentTitles -->
                
                <div class="contentTitles">
                    <label class="blue">Codigo</label>
                    <input type="text" class="required" name="data[Codigo]" value="015">
                </div> <!-- /contentTitles -->
                
                <div class="contentTitles">
                    <label class="blue">Tipo</label>
                    
                    <input class="check required" type="radio" name="data[TipoBanco]" value="P" checked="checked"/>
                    <label class="check blue">Propio</label>
                    <input class="check required" type="radio" name="data[TipoBanco]" value="T" />
                    <label class="check blue">Tercero</label>
                </div> <!-- /contentTitles -->
                
                <div class="contentTitles">
                    <label class="blue">Numero de cuenta</label>
                    <input type="text" class="number" name="data[NumeroDeCuenta]" value="05280210159072">
                </div> <!-- /contentTitles -->
                
                <div class="contentTitles">
                    <label class="blue">Saldo</label>
                    <input type="text" class="number" name="data[SaldoCuenta]" value="63998.76">
                </div> <!-- /contentTitles -->
                
                <div class="contentTitles">
                    <label class="blue">Ultimo numero de cheque emitido</label>
                    <input type="text" class="number" name="data[UltimoNumeroCheque]" value="76383980">
                </div> <!-- /contentTitles -->
                
                
            </div> <!-- /productsEditorContent -->
        </div>  <!-- /contentEditor -->
    </div> <!-- /form -->
</form>