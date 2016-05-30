{assign var='IDS_Layout_Class' value='Backend_Layouts_Default'}
{assign var='IDS_Layout_Method' value='Default'}

<script type="text/javascript" src="/scripts/Edit.js"></script>

{literal}
<script type="text/javascript">
$(document).ready(function(){
    $("#FrmEdit").validate();
    

});
</script>

{/literal}

<h1>{if $data.Id}Editar{else}Nuevo{/if} Banco &raquo; <span>{$data.Id}</span></h1>

<form id="FrmEdit" enctype="multipart/form-data" action="" method="post">
    <input type="hidden" name="data[Id]" value="{$data.Id}" />
   
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
            
        {if $editSuccessMessage}
            <p class="success" style="width:61%;">{$editSuccessMessage}</p>
        {elseif $editErrorMessage}
            <p class="error" style="width:61%;">{$editErrorMessage}</p>
        {/if}
        
        <div class="contentEditor"> <!-- formulario de edicion de contenido -->
                
            <div class="productsEditorContent">
            
                <div class="contentTitles">
                    <label class="blue">Nombre</label>
                    <input type="text" class="required" name="data[Nombre]" value="{$data.Nombre}">
                </div> <!-- /contentTitles -->
                
                <div class="contentTitles">
                    <label class="blue">Codigo</label>
                    <input type="text" class="required" name="data[Codigo]" value="{$data.Codigo}">
                </div> <!-- /contentTitles -->
                
                <div class="contentTitles">
                    <label class="blue">Tipo</label>
                    
                    <input class="check required" type="radio" name="data[TipoBanco]" value="P" {if 'P' eq $data.TipoBanco}checked="checked"{/if}/>
                    <label class="check blue">Propio</label>
                    <input class="check required" type="radio" name="data[TipoBanco]" value="T" {if 'T' eq $data.TipoBanco}checked="checked"{/if}/>
                    <label class="check blue">Tercero</label>
                </div> <!-- /contentTitles -->
                
                <div class="contentTitles">
                    <label class="blue">Numero de cuenta</label>
                    <input type="text" class="number" name="data[NumeroDeCuenta]" value="{$data.NumeroDeCuenta}">
                </div> <!-- /contentTitles -->
                
                <div class="contentTitles">
                    <label class="blue">Saldo</label>
                    <input type="text" class="number" name="data[SaldoCuenta]" value="{$data.SaldoCuenta}">
                </div> <!-- /contentTitles -->
                
                <div class="contentTitles">
                    <label class="blue">Ultimo numero de cheque emitido</label>
                    <input type="text" class="number" name="data[UltimoNumeroCheque]" value="{$data.UltimoNumeroCheque}">
                </div> <!-- /contentTitles -->
                
                
            </div> <!-- /productsEditorContent -->
        </div>  <!-- /contentEditor -->
    </div> <!-- /form -->
</form>