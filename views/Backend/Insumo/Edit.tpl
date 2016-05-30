{include file="Backend/Layouts/Include/Header.tpl"}



<!-- date picker -->
<link type="text/css" href="/styles/ui-lightness/jquery-ui-1.8.2.custom.css" rel="stylesheet" />
<script type="text/javascript" src="/scripts/jquery/jquery.ui.datepicker.js"></script>
<script type="text/javascript" src="/scripts/jquery/jquery.ui.core.js"></script>
<script type="text/javascript" src="/scripts/jquery/jquery.ui.widget.js"></script>

<script type="text/javascript" src="/scripts/Edit.js"></script>


<!-- dialog -->
<script type="text/javascript" src="/scripts/jquery/jquery-ui-1.8.4.custom.min.js"></script>
<!-- dialog -->

  
<body>
    <div id="Container">
    
    <div id="Content">
            <div class="listado">    
	
{literal}
  
<script type="text/javascript">

$(document).ready(function(){
    $("#FrmEdit").validate();
    
    var availableTags = [
							{/literal}{$ArrayProveedores}{literal}
                       ];
    

    $("input#proveedor_autocomplete").autocomplete({
        source: availableTags,
      //define select handler
		select: function(e, ui) {
			var valor = ui.item.value;
			SetProveedor(valor);
		}        
		/*
        change: function() {
			alert(1);
        }*/
    });  

    $("#select_proveedor").hide();  

    SetProveedorInitTextValue();
});

function SetProveedorInitTextValue()
{
	NombreProveedor = GetSelectedTextValue("select_proveedor");
	
	$("input#proveedor_autocomplete").val(NombreProveedor);
}

function GetSelectedTextValue(dropdownid)
{
	var $selected 	=	$("#"+dropdownid).find('option:selected');
	var $selectedtext	=	$selected.html();

	return $selectedtext;
}

function setParentValueInsumo(insumoId)
{
	//alert(insumoId);
	window.opener.reload();
	//window.opener.guardarObtenerInsumos(insumoId, 'add');
	self.close();
}

function SetProveedor(NombreProveedor)
{
	dropdown_id =	'select_proveedor';
	inputText	=	NombreProveedor;
	// setear valor select selected por texto de option / set option selected by text
	//$("#"+dropdown_id+" option:contains(" + inputText + ")").attr('selected', 'selected');
	
	$("#select_proveedor option").each(function () {
        if ($(this).html() == inputText) {
            $(this).attr("selected", "selected");
            return;
        }
	});
	
}

</script>
{/literal}

<h1>{if $data.Id}Editar {else}Nuevo{/if} insumo para orden de trabajo #{$Orden.Id}</h1>


<form id="FrmEdit" enctype="multipart/form-data" action="" method="post">
    <input type="hidden" name="data[Id]" value="{$data.Id}" />
    <input type="hidden" name="data[OrdenId]" value="{$Orden.Id}" />
    <input type="hidden" name="data[EsFlete]" value="{if $EsFlete}SI{else}{$data.EsFlete}{/if}" />
    <input type="hidden" name="data[EsManoDeObra]" value="{if $EsManoDeObra}SI{else}{$data.EsManoDeObra}{/if}" />
    <input type="hidden" name="data[EsComercializacion]" value="{if $EsComercializacion}SI{else}{$data.EsComercializacion}{/if}" />
    <input type="hidden" name="data[Status]" id="stateValue" value="{if $data.Id}{$data.Status}{else}1{/if}" />
    
    <div class="form">
        {include file="Backend/Insumo/ColumnForm.tpl"}
            
        {if $editSuccessMessage}
            <p class="success" id="editSuccess" style="width:61%;">{$editSuccessMessage}</p>
            <script type="text/javascript">
            	setParentValueInsumo({$data.Id});
			</script>
            
        {elseif $editErrorMessage}
            <p class="error" style="width:61%;">{$editErrorMessage}</p>
        {/if}
            
        <div class="contentEditor"> <!-- formulario de edicion de contenido -->
                
        <div class="productsEditorContent">
        
        
<table border="0" cellspacing="0">
  <tr>
    <td>
				<div class="contentTitles">
                    <ul class="statsList">
			                        <li>
			                            <p class="big">{$Orden.Producto}</p>
			                        </li>
			                    </ul> <!-- /statsList -->
                </div> <!-- /contentTitles -->
    
    </td>
    <td>
                <div class="contentTitles" >
                    <p>{$Orden.DescripcionDeTrabajo|nl2br}</p>
                </div> <!-- /contentTitles -->
    
    </td>
  </tr>
  <tr>
    <td>
				<div class="contentTitles">
                    <label class="blue">Nombre</label>
                    <input type="text" class="required" id="nombre" name="data[Nombre]" value="{$data.Nombre}">
                </div> <!-- /contentTitles -->
    
    </td>
    <td>
                <div class="contentTitles" >
                    <label class="blue">Proveedor</label>
                    <input id="proveedor_autocomplete" />
                    <!-- drop down -->               
                    <select name="data[ProveedorId]" class="required" id="select_proveedor">
                        <option value="">Seleccionar</option>
                        {foreach from=$Proveedores item="c"}
                        <option value="{$c.Id}" {if $c.Id eq $data.ProveedorId}selected="selected"{/if}>{$c.Nombre}</option>
                        {/foreach}
                    </select>
                </div> <!-- /contentTitles -->
    
    </td>
  </tr>
  <tr>
    <td>&nbsp;
				<div class="contentTitles">
                    <label class="blue">Precio unitario sin IVA</label>
                    <input type="text" class="required number" id="" name="data[PrecioUnitarioSinIVA]" value="{$data.PrecioUnitarioSinIVA}">
                </div> <!-- /contentTitles -->            
    
    </td>
    <td>&nbsp;
                <div class="contentTitles">
                    <label class="blue">Cantidad</label>
                    <input type="text" class="required number" id="" name="data[Cantidad]" value="{$data.Cantidad}">
                </div> <!-- /contentTitles -->
    
    </td>
    <td>
				<div class="contentTitles">
                    <label class="blue">Importe total: ${$data.Cantidad*$data.PrecioUnitarioSinIVA}</label>
                </div> <!-- /contentTitles -->
    
    </td>
  </tr>
  <tr>
    <td>&nbsp;
                <div class="contentTitles">
                    <label class="blue">Plazo de entrega (dias desde que envia Orden de Compra)</label>
                    <input type="text" class="required number" id="" name="data[PlazoDeEntrega]" value="{$data.PlazoDeEntrega}">
                </div> <!-- /contentTitles -->
    
    </td>
    <td>&nbsp;
                <div class="contentTitles">
                    <label class="blue">Comentario de plazo de entrega</label>
                    <input type="text" class="" id="" name="data[PlazoDeEntregaComentario]" value="{$data.PlazoDeEntregaComentario}">
                </div> <!-- /contentTitles -->
    
    </td>
  </tr>
  <tr>
    <td>&nbsp;
                <div class="contentTitles">
                    <label class="blue">Lugar de entrega</label>
                    <input type="text" class="" id="" name="data[LugarDeEntrega]" value="{$data.LugarDeEntrega}">
                </div> <!-- /contentTitles -->
    
    </td>
    <td>&nbsp;
				<div class="contentTitles">
                    <label class="blue">Condicion de pago</label>
                    
                    <input class="check required" type="radio" name="data[CondicionDePago]" value="B" {if 'B' eq $data.CondicionDePago}checked="checked"{/if}/>
                    <label class="check blue">1 (B)</label>
                    <input class="check required" type="radio" name="data[CondicionDePago]" value="N" {if 'N' eq $data.CondicionDePago}checked="checked"{/if}/>
                    <label class="check blue">2</label>
                </div> <!-- /contentTitles -->
    
    </td>
  </tr>
  <tr>
    <td>&nbsp;
		<div class="contentTitles">
		
		{if $data.OrdenDeCompraId}
		<label class="blue">Esta elegido?  {$data.Elegido}</label>
        <label class="blue">Orden de compra asociada: # {$data.OrdenDeCompraId}</label>
        {else}
                    <label class="blue">Esta elegido?</label>
                    
                    <input class="check required" type="radio" name="data[Elegido]" value="SI" {if 'SI' eq $data.Elegido}checked="checked"{/if}/>
                    <label class="check blue">Si</label>
                    <input class="check required" type="radio" name="data[Elegido]" value="NO" {if 'NO' eq $data.Elegido}checked="checked"{/if}/>
                    <label class="check blue">No</label>
        {/if}
        </div> <!-- /contentTitles --> 
    
    </td>
    <td>&nbsp;
				<div class="contentTitles">
                    <label class="blue">Forma de pago</label>
                    <p>Por ejemplo 50% anticipado y 50% a un mes de entrega</p>
                    <input type="text" class="" id="" name="data[FormaDePago]" value="{$data.FormaDePago}">
                </div> <!-- /contentTitles -->    
    </td>
  </tr>
</table>
            
            </div> <!-- /productsEditorContent -->
        </div>  <!-- /contentEditor -->
        
    </div> <!-- /form -->
</form>

            </div>
        </div>
            

    </div> <!-- /Container -->
</body>
</html>