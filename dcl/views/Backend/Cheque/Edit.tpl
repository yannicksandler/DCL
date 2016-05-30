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

<h1>{if $data.Id}Editar{else}Nuevo{/if} Cheque &raquo; <span>{$data.Id}</span></h1>

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
                    <label class="blue">Numero</label>
                    <input type="text" class="required number" name="data[Numero]" value="{$data.Numero}">
                </div> <!-- /contentTitles -->
                
                <div class="contentTitles">
                    <label class="blue">Tipo</label>
                    
                    <input class="check required" type="radio" name="data[TipoBanco]" value="P" />
                    <label class="check blue">Propio</label>
                    <input class="check required" type="radio" name="data[TipoBanco]" value="T" />
                    <label class="check blue">Tercero</label>
                </div> <!-- /contentTitles -->
                
                <div class="contentTitles" id="">
                    <label class="blue">Banco</label>
                    <!-- drop down -->               
                    <select name="data[BancoId]" class="required">
                        <option value="">Seleccionar</option>
                        {foreach from=$Bancos item="a"}
                        <option value="{$a.Id}" {if ($a.Id eq $data.BancoId)}selected="selected"{/if}>{$a.Nombre}{if $a.TipoBanco == 'P'} (Propio){/if}{if $a.TipoBanco == 'T'} (Tercero){/if}</option>
                        {/foreach}
                    </select>
                </div> <!-- /contentTitles -->
                
                <div class="contentTitles" id="">
                    <label class="blue">Estado</label>
                    <!-- drop down -->               
                    <select name="data[Estado]" class="required">
                        <option value="">Seleccionar</option>
                        <option value="Pendiente">Pendiente</option>
                        <option value="Rechazado">Rechazado</option>
                    </select>
                </div> <!-- /contentTitles -->
                
                <div class="contentTitles">
                    <label class="blue">Importe</label>
                    <input type="text" class="required number" name="data[Importe]" value="{$data.Importe}">
                </div> <!-- /contentTitles -->
                         
            </div> <!-- /productsEditorContent -->
        </div>  <!-- /contentEditor -->
    </div> <!-- /form -->
</form>