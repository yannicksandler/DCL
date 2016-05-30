{assign var='IDS_Layout_Class' value='Backend_Layouts_Default'}
{assign var='IDS_Layout_Method' value='Default'}

<!-- date picker -->
<link type="text/css" href="/styles/ui-lightness/jquery-ui-1.8.2.custom.css" rel="stylesheet" />
<script type="text/javascript" src="/scripts/jquery/jquery.ui.datepicker.js"></script>
<script type="text/javascript" src="/scripts/jquery/jquery.ui.core.js"></script>
<script type="text/javascript" src="/scripts/jquery/jquery.ui.widget.js"></script>
<!-- end date picker -->

<script type="text/javascript" src="/scripts/Edit.js"></script>

{literal}
<script type="text/javascript">
$(document).ready(function(){
    $("#FrmEdit").validate();

    $("#SeleccionarCliente").hide();

    var availableTags = [
							{/literal}{$ArrayClientes}{literal}
              ];

    $("input#cliente_autocomplete").autocomplete({
        source: availableTags,
      //define select handler
		select: function(e, ui) {
			var valor = ui.item.value;
			SetClienteSeleccionar(valor);
		}    
    });

    $("#Descripcion").attr('value', $("#Descripcion").text().replace("\<br /\>", "").replace("\<br /\>", "").replace("\<br /\>", "").replace("\<br /\>", "").replace("\<br /\>", ""));

    
    $('#Fecha').datepicker({
		changeMonth: true,
		changeYear: true,
		yearRange: '1960:{/literal}{$smarty.now|date_format:'%Y'}{literal}',
		dateFormat: 'dd/mm/yy'
	});

	$('.printCredito').click(function() {
  	  	var url	=	$(this).attr('href');
		VerCredito(url);		
		
		return false;
  	});	


  	$('.SeleccionarCliente').click(function() {
		
		var pagina	= '/Cliente/Seleccionar';

		var opciones="toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=yes, width=1000, height=700, top=85, left=140";

		abrirPopUp(pagina, opciones);
		
		return false;
  	});

  	SetClienteInitTextValue();
    SetClienteSeleccionar($("input#cliente_autocomplete").val());

    $("#cliente_autocomplete").blur(function(){
        if( $(this).val() == '' )
            $(this).val( $(this).attr("defaultValue") );
    });

    $("#cliente_autocomplete").focus(function(){
        if( $(this).val() == $(this).attr("defaultValue"))
            $(this).val('');
    });
  	  	    
});

function SetClienteInitTextValue()
{
	NombreCliente = GetSelectedTextValue("SeleccionarCliente");
	if(NombreCliente != 'Seleccionar')
		$("input#cliente_autocomplete").val(NombreCliente);
}


function SetClienteSeleccionar(NombreCliente)
{
	inputText	=	NombreCliente;
	// setear valor select selected por texto de option / set option selected by text
	//$("#"+dropdown_id+" option:contains(" + inputText + ")").attr('selected', 'selected');
	
	$("#SeleccionarCliente option").each(function () {
        if ($(this).html() == inputText) {
            $(this).attr("selected", "selected");
            return;
        }
	});

	
}

function GetSelectedTextValue(dropdownid)
{
	var $selected 	=	$("#"+dropdownid).find('option:selected');
	var $selectedtext	=	$selected.html();

	return $selectedtext;
}


function VerCredito(url)
{
	
	var opciones="toolbar=no, location=no, directories=no, status=no, menubar=yes, scrollbars=yes, resizable=yes, width=1000, height=700, top=10, left=40";

	abrirPopUp(url, opciones);

	
}

function abrirPopUp(pagina, opciones)
{
	window.open(pagina,"",opciones);
}

function SetCliente(ClienteId)
{
  	var select_id	=	'SeleccionarCliente';
  	var	option_val	=	ClienteId;

	$('#'+select_id+' option:selected').removeAttr('selected');
  	$('#'+select_id+' option[value='+option_val+']').attr('selected','selected');
}


</script>
{/literal}

<a class="linkSendHome linkSendHomeEdit" href="/NotaDebito/List/order/Fecha_DESC"><img src="/images/icons/arrow_undo.png" title="Volver al listado"/> Volver al listado de notas de credito &raquo; </a>

<h1>{if $data.Id}Editar{else}Nueva{/if} Nota de debito &raquo; <span>{$data.Numero} (Interno {$data.Id})</span></h1>

<form id="FrmEdit" enctype="multipart/form-data" action="" method="post">
   <input type="hidden" name="data[Id]" value="{$data.Id}" />

        
    <div class="form">
        {include file="Backend/NotaDebito/ColumnForm.tpl"}
            
        {if $editSuccessMessage}
            <p class="success" style="width:61%;">{$editSuccessMessage}</p>
        {elseif $editErrorMessage}
            <p class="error" style="width:61%;">{$editErrorMessage}</p>
        {/if}
            
        <div class="contentEditor"> <!-- formulario de edicion de contenido -->
                
            <div class="productsEditorContent">
                
                		<div class="buttonsCont" style="clear: left;">
							{if $data.Id}
							<input type="" value="Imprimir" href="/GestionEconomica/NotaDebitoView/id/{$data.Id}" class="btDark printCredito" title="Imprimir nota de debito" />
							{/if}
							
			            </div>
			            
                <div class="contentTitles" id="">
                    
                    	<label class="blue"><img src="/images/icons/status_online.png" title=""/> Cliente</label>
						<input id="cliente_autocomplete" value="{if $Cliente}{$Cliente.Nombre}{/if}" {if $data.Id}readonly="readonly" disabled{/if}/>
						
						<select name="data[ClienteId]" class="required CambiarCliente" id="SeleccionarCliente">
                        <option value="">Seleccionar</option>
                        {foreach from=$Clientes item="cl"}
                        <option value="{$cl.Id}" {if $cl.Id eq $data.ClienteId}selected="selected"{/if}>{$cl.Nombre}</option>
                        {/foreach}
                    	</select>
                    	
                </div> <!-- /contentTitles -->
                
                <div class="contentTitles" id="">
                    <label class="blue">Tipo de IVA</label>
                    <!-- drop down -->               
                    <select name="data[TipoIvaId]" class="required" {if $data.Id}readonly="readonly" disabled{/if}>
                        <option value="">Seleccionar</option>
                        {foreach from=$TiposDeIva item="ti"}
                        <option value="{$ti.Id}" {if ($ti.Id eq $data.TipoIvaId)}selected="selected"{/if}>{$ti.Nombre} - {if $ti.Discriminado > 0}{$ti.Discriminado}{/if}-{if $ti.Adicional > 0}{$ti.Adicional}{/if}-{if $ti.Incluido > 0}{$ti.Incluido}{/if} - (Tipo factura: {$ti.Letra_comp})</option>
                        {/foreach}
                    </select>
                </div> <!-- /contentTitles -->
                
                         
                <div class="contentTitles">
                    <label class="blue">Fecha</label>
                    <input type="text" class="date required" id="Fecha" name="data[Fecha]" value="{$data.Fecha}" {if $data.Id}readonly="readonly" disabled{/if}>
                </div> <!-- /contentTitles -->
                
                <div class="contentTitles">
                    <label class="blue">Detalle</label>
                    <textarea name="data[Comentario]" cols="45" rows="5" class="required" id="Descripcion" {if $data.Id}readonly="readonly" disabled{/if}>{$data.Comentario}</textarea>
                </div> <!-- /contentTitles -->
                
                <div class="contentTitles">
                    <label class="blue">Importe</label>
                    <input type="text" class="number required" id="" name="data[Importe]" value="{$data.Importe}" {if $data.Id}readonly="readonly" disabled{/if}>
                </div> <!-- /contentTitles -->
                
                
            </div> <!-- /productsEditorContent -->
        </div>  <!-- /contentEditor -->
    </div> <!-- /form -->
</form>