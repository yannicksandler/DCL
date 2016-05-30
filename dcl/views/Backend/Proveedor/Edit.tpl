{assign var='IDS_Layout_Class' value='Backend_Layouts_Default'}
{assign var='IDS_Layout_Method' value='Default'}

<script type="text/javascript" src="/scripts/Edit.js"></script>

{literal}
<script type="text/javascript">
$(document).ready(function(){
    $("#FrmEdit").validate();
    

});
function reload()
{
	window.opener.reload(); window.close();
}
</script>
{/literal}

<a class="linkSendHome linkSendHomeEdit" href="/Proveedor/List">&laquo; Volver al listado</a>

<h1>{if $data.Id}Editar{else}Nuevo{/if} Proveedor &raquo; <span>{$data.Id}</span></h1>

<form id="FrmEdit" enctype="multipart/form-data" action="" method="post">
    <input type="hidden" name="data[Id]" value="{$data.Id}" />
   
    <input type="hidden" name="data[Status]" id="stateValue" value="{if $data.Id}{$data.Status}{else}1{/if}" />
    
        
    <div class="form">
        {include file="Backend/Proveedor/ColumnForm.tpl"}
            
        {if $editSuccessMessage}
            <p class="success" style="width:61%;">{$editSuccessMessage}</p>
            {if $popup}
            	<script>reload();</script>
            {/if}
        {elseif $editErrorMessage}
            <p class="error" style="width:61%;">{$editErrorMessage}</p>
        {/if}
        
        {if $popupsubmit}
            	<script>reload();</script>
        {/if}
            
        <div class="contentEditor"> <!-- formulario de edicion de contenido -->
                
            <div class="productsEditorContent">
            
                <div class="contentTitles">
                    <label class="blue">Nombre</label>
                    <input type="text" class="required" name="data[Nombre]" value="{$data.Nombre}">
                </div> <!-- /contentTitles -->
                         
                <div class="contentTitles">
                    <label class="blue">Razon social</label>
                    <input type="text" class="" name="data[RazonSocial]" value="{$data.RazonSocial}">
                </div> <!-- /contentTitles -->
                
                <div class="contentTitles" id="">
                    <label class="blue">Tipo de IVA</label>
                    <!-- drop down -->               
                    <select name="data[TipoIvaId]" class="required">
                        <option value="">Seleccionar</option>
                        {foreach from=$TiposDeIva item="c"}
                        <option value="{$c.Id}" {if ($c.Id eq $data.TipoIvaId)}selected="selected"{/if}>{$c.Nombre} - {if $c.Discriminado > 0}{$c.Discriminado}{/if}-{if $c.Adicional > 0}{$c.Adicional}{/if}-{if $c.Incluido > 0}{$c.Incluido}{/if} - (Tipo factura: {$c.Letra_comp})</option>
                        {/foreach}
                    </select>
                </div> <!-- /contentTitles -->
                
                <div class="contentTitles" id="">
                    <label class="blue">Rubro</label>
                    <!-- drop down -->               
                    <select name="data[RubroId]" class="required">
                        <option value="">Seleccionar</option>
                        {foreach from=$Rubros item="r"}
                        <option value="{$r.Id}" {if ($r.Id eq $data.RubroId)}selected="selected"{/if}>{$r.Nombre}</option>
                        {/foreach}
                    </select>
                </div> <!-- /contentTitles -->
                
                <div class="contentTitles" id="">
                    <label class="blue">Tipo de gasto</label>
                    <!-- drop down -->               
                    <select name="data[TipoGastoId]" class="required">
                        <option value="">Seleccionar</option>
                        {foreach from=$TiposDeGasto item="c"}
                        <option value="{$c.Id}" {if ($c.Id eq ($data.TipoGastoId))}selected="selected"{/if}>{$c.Nombre}</option>
                        {/foreach}
                    </select>
                </div> <!-- /contentTitles -->

                <div class="contentTitles">
                    <label class="blue">Nombre de contacto</label>
                    <input type="text" class="" name="data[PersonaContacto]" value="{$data.PersonaContacto}">
                </div> <!-- /contentTitles -->

                <div class="contentTitles">
                    <label class="blue">Email de persona de contacto</label>
                    <input type="text" class="email" name="data[PersonaEmail]" value="{$data.PersonaEmail}">
                </div> <!-- /contentTitles -->

                <div class="contentTitles">
                    <label class="blue">Persona Telefono</label>
                    <input type="text" class="" name="data[PersonaTelefono]" value="{$data.PersonaTelefono}">
                </div> <!-- /contentTitles -->

                <div class="contentTitles">
                    <label class="blue">Cuit</label>
                    <input type="text" class="number" name="data[Cuit]" value="{$data.Cuit}">
                </div> <!-- /contentTitles -->                       

                
                <div class="contentTitles" id="Localidad">
                    <label class="blue">Localidad</label>
                    <input type="text" class="" name="data[Localidad]" value="{$data.Localidad}">
                </div> <!-- /contentTitles -->
                    
                <div class="contentTitles">
                    <label class="blue">Direccion</label>
                    <textarea name="data[Direccion]" cols="45" rows="5">{$data.Direccion}</textarea>
                </div> <!-- /contentTitles -->
                 
                 
                <div class="contentTitles">
                    <label class="blue">Codigo postal</label>
                    <input type="text" class="" name="data[CodigoPostal]" value="{$data.CodigoPostal}">
                </div> <!-- /contentTitles -->
                         
                    
                <div class="contentTitles">
                    <label class="blue">Telefono</label>
                    <input type="text" class="" name="data[Telefono]" value="{$data.Telefono}">
                </div> <!-- /contentTitles -->
                
                <!-- como es un campo sin validacion no requiere clase -->
                <div class="contentTitles">
                    <label class="blue">Fax</label>
                    <input type="text" class="number" name="data[Fax]" value="{$data.Fax}">
                </div> <!-- /contentTitles -->
                
                <div class="contentTitles">
                    <label class="blue">Email</label>
                    <input type="text" class="email" name="data[Email]" value="{$data.Email}">
                </div> <!-- /contentTitles -->
                           
				<div class="contentTitles">
                    <label class="blue">Saldo inicial</label>
                    <input type="text" class="number" name="data[SaldoInicial]" value="{$data.SaldoInicial}">
                </div> <!-- /contentTitles -->                           
                
                
            </div> <!-- /productsEditorContent -->
        </div>  <!-- /contentEditor -->
    </div> <!-- /form -->
</form>