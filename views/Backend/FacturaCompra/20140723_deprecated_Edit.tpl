{assign var='IDS_Layout_Class' value='Backend_Layouts_Default'}
{assign var='IDS_Layout_Method' value='Default'}

<!-- date picker -->
<link type="text/css" href="/styles/ui-lightness/jquery-ui-1.8.2.custom.css" rel="stylesheet" />
<script type="text/javascript" src="/scripts/jquery/jquery.ui.datepicker.js"></script>
<script type="text/javascript" src="/scripts/jquery/jquery.ui.core.js"></script>
<script type="text/javascript" src="/scripts/jquery/jquery.ui.widget.js"></script>

<script type="text/javascript" src="/scripts/Edit.js"></script>


<!-- dialog -->
<script type="text/javascript" src="/scripts/jquery/jquery-ui-1.8.4.custom.min.js"></script>
<!-- dialog -->



{literal}
<script type="text/javascript">
$(document).ready(function(){
    $("#FrmEdit").validate();

	//SetCliente();
	
	$('.MostrarTodo').click(function() {
		
		if($('#MostrarTodo').is(':checked'))
		{  
			$('#gravado27').show();
			$('#gravado10_5').show();
			$('#percepciones').show();
		}
		else
		{
			$('#gravado27').hide();
			$('#gravado10_5').hide();
			$('#percepciones').hide();
		}
        
	});
	    
    $('.sumar').change(function() {
        $('#total').val($('#total').val()+$(this).val());
	});

    $('.total').change(function() {
        SetImporteTotal();
	});

    $('#ImporteTotal').change(function() {
        // total - liquidado - percepciones
        SetImporteRestante();
        
	});
    
	$('#FrmEdit').submit(function() {
		
		var importeTotalLiquidado	=	$('#ImporteTotalLiquidadoInput').val();
		
		var importeTotal	= parseFloat($('#ImporteNetoNoGravadoInput').val()) + 
								parseFloat($('#ImporteNetoGravado21Input').val()) +
								parseFloat($('#ImporteNetoGravado27Input').val()) +
								parseFloat($('#ImporteNetoGravado10_5Input').val()) +
								parseFloat($('#ImporteIva21Input').val()) +
								parseFloat($('#ImporteIva27Input').val()) +
								parseFloat($('#ImporteIva10_5Input').val()) +
								parseFloat($('#ImportePercepcionesIvaInput').val()) +
								parseFloat($('#ImportePercepcionesIngresosBrutosCabaInput').val()) +
								parseFloat($('#ImportePercepcionesIngresosBrutosBsAsInput').val()) +
								parseFloat($('#ImporteCreditoACuentaInput').val());

		var $selected 	=	$("#SeleccionarNotaCreditoDebito").find('option:selected');
		var $tiponota	=	$selected.val();
		
		if( ($tiponota == 'ND') || ($tiponota == 'NC'))
		{
			var r	=	confirm('Esta seguro que desea crear una Nota de credito o debito?');

			if(r)
				return true;
			else
				return false;
			/*
			alert(importeTotal);
			if(!importeTotal)
			{
				alert('Si selecciona crear una Nota de credito o debito, debe ser un importe negativo');
				return false;
			}
			else
			{
				// BUG 2013/11/27: no suma bien
				if(importeTotal >=0)
				{
					//alert('Si selecciona crear una Nota de credito o debito, debe ser un importe negativo');
					return true;
				}
				else
					return true; // si ingresa importe negativo, enviar formulario
			}
			*/
		}

		if(importeTotalLiquidado > 0)
		{
			// no se puede liquidar mas del total
			if(importeTotalLiquidado > importeTotal)
			{
				var msg	=	'El importe liquidado no puede ser mayor que el importe total';
				alert(msg);
				return false;
			}
		}
		
		if(importeTotalLiquidado == 0)
		{
			var conf	=	$('#ConfirmacionMostrada').attr('value');
			
			if(conf != 'SI')
			{
				$('#MostrarConfirmacion').val('NO');
				
				$("#dialog-confirm").dialog({
					resizable: true,
					height:200,
					width: 400, 
					modal: true,
					buttons: {
						'Aceptar': function() {
							$(this).dialog('close');
							$('#FrmEdit').submit();
						},
						'Cancelar': function() {
							$(this).dialog('close');
							$('#ConfirmacionMostrada').attr('value', 'NO');
							return false;
						}
					}
				});
				// flag 
				$('#ConfirmacionMostrada').attr('value', 'SI');
				return false;
			}
		}
  	});

    $('#FechaFactura').datepicker({
		changeMonth: true,
		changeYear: true,
        dateFormat: 'dd/mm/yy'
	});

    $('#FechaFacturaVencimiento').datepicker({
		changeMonth: true,
		changeYear: true,
        dateFormat: 'dd/mm/yy'
	});

    $(".PrintOrdenDePago").click(function(){
        
        var url	=	'/OrdenPago/View/id/' + $(this).attr('id');
        
		var opciones="toolbar=no, location=no, directories=no, status=no, menubar=yes, scrollbars=yes, resizable=yes, width=1000, height=700, top=85, left=140";

		abrirPopUp(url, opciones);        

        return false;
    });

    $('#ComentarioImporte').change(function(){
        var importe=   $(this).attr("value");

        SumarTotal(importe);
    });

	$('.CambiarProveedor').change(function(){
    	
		var $selected 	=	$(this).find('option:selected');
		var $proveedorid	=	$selected.val();
		
		if( $proveedorid < 0 )
		{
			alert('El proveedor seleccionado no es correcto');
		}
    });

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
	 }); 


	$("#SeleccionarProveedor").hide();

    $("#proveedor_autocomplete").blur(function(){
        if( $(this).val() == '' )
            $(this).val( $(this).attr("defaultValue") );
    });

    $("#proveedor_autocomplete").focus(function(){
        if( $(this).val() == $(this).attr("defaultValue"))
            $(this).val('');
    });

    {/literal}
        {if ($Proveedor || $data.ProveedorId) && !$editSuccessMessage}
        	GetOrdenesDeCompraPendientes();
        {/if}

    {literal}
});

function SetProveedor(NombreProveedor)
{
	inputText	=	NombreProveedor;
	// setear valor select selected por texto de option / set option selected by text
	//$("#"+dropdown_id+" option:contains(" + inputText + ")").attr('selected', 'selected');
	
	// recorrer dropdown valores
	$("#SeleccionarProveedor option").each(function () {
        if ($(this).html() == inputText) {
            $(this).attr("selected", "selected");
            //return;
        }
	});
	// cargar ordenes de compra pendiente por ajax
		// marcar tipo de gasto del proveedor por defecto
		// mostrar campos tipo de iva del proveedor segun tipo de iva seteado
	GetOrdenesDeCompraPendientes();
	//GetProveedorTipoIva();
}

function SetImporteRestante()
{
	var importeRestante	= parseFloat($('#ImporteTotalInput').val()) - parseFloat($('#ImporteTotalLiquidadoInput').val());	
	
	$('#ImporteRestante').html('<label>$ '+ importeRestante.toFixed(2) + '</label>');
}

function SetImporteTotal()
{
	var importeTotal=0;
	var a,b,c,d,e,f,g,h,i,j,k;
	
	a	= parseFloat($('#ImporteNetoNoGravadoInput').val()); 
	b	=	parseFloat($('#ImporteNetoGravado21Input').val());
	c	=	parseFloat($('#ImporteNetoGravado27Input').val());
	d	=	parseFloat($('#ImporteNetoGravado10_5Input').val());
							e=parseFloat($('#ImporteIva21Input').val());
							f=parseFloat($('#ImporteIva27Input').val());
							g=parseFloat($('#ImporteIva10_5Input').val());
							h=parseFloat($('#ImportePercepcionesIvaInput').val());
							i=parseFloat($('#ImportePercepcionesIngresosBrutosCabaInput').val());
							j=parseFloat($('#ImportePercepcionesIngresosBrutosBsAsInput').val());
							k=parseFloat($('#ImporteCreditoACuentaInput').val());
	if(a)
		importeTotal += a;

	if(b)
		importeTotal += b;

	if(c)
		importeTotal += c;

	if(d)
		importeTotal += d;

	if(e)
		importeTotal += e;

	if(f)
		importeTotal += f;

	if(g)
		importeTotal += g;

	if(h)
		importeTotal += h;

	if(i)
		importeTotal += i;

	if(j)
		importeTotal += j;

	if(k)
		importeTotal += k;
	
	$('#_totalImp').html('<label>$ '+ importeTotal.toFixed(2) + '</label>');
	$('#ImporteTotalInput').val(importeTotal.toFixed(2));
	SetImporteRestante();
}

function GetOrdenesDeCompraPendientes()
{
	// dropdown
	var $selected 	=	$("#SeleccionarProveedor").find('option:selected');
	var $proveedorid	=	$selected.val();
	// control
	if( $proveedorid < 0 )
	{
		alert('El proveedor seleccionado no es correcto');
	}
	
	// cargar OC pensientes por ajax
	$.ajax({
		type: "POST",
		url: '/FacturaCompra/GetOrdenesDeCompraPendientes',
		dataType: "text/html",
		data: {
			'ProveedorId': $proveedorid
		},
		success: function(html){
			$("#OrdenesDeCompraPendientes").html(html);
			$("#ImporteTotalLiquidado").html('<label>$ 0.0</label>');
		}

	});
}

function GetProveedorTipoIva()
{
	// dropdown
	var $selected 	=	$("#SeleccionarProveedor").find('option:selected');
	var $proveedorid	=	$selected.val();
	// control
	if( $proveedorid < 0 )
	{
		alert('El proveedor seleccionado no es correcto');
	}

	// cargar OC pensientes por ajax
	$.ajax({
		type: "POST",
		url: '/Proveedor/GetTipoIva',
		dataType: "text/html",
		data: {
			'ProveedorId': $proveedorid
		},
		success: function(html){
			$('#ProveedorTipoIva').val(html);
			//SetTipoIva();
		}

	});
}

function SetTipoIva()
{
	var tipodIvaId = $('#ProveedorTipoIva').val();
}

function abrirPopUp(pagina, opciones)
{
	window.open(pagina,"",opciones);
}

</script>
{/literal}

<!-- dialog confirm -->
		<div id="dialog-confirm" title="Quiere crear una factura" style="display:none">
			<p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 40px 40px 0;"></span>
				La factura no tiene ordenes de compra asociadas. Desea crear la factura?
			</p>
		</div>

{if ('NC' eq ($data.TipoNota))}
<h1>Nota de credito</h1>
{elseif ('ND' eq ($data.TipoNota))}
<h1>Nota de debito</h1>
{else}
<h1>Factura de compra</h1>
{/if}
        
<form id="FrmEdit" enctype="multipart/form-data" action="" method="post">
    <input type="hidden" name="data[ConfirmacionMostrada]" value="" id="ConfirmacionMostrada"/>
    <input type="hidden" name="" value="{$Proveedor.TipoIvaId}" id="ProveedorTipoIva"/>  
        
    <div class="form">
        <div id="FormsColumn"> <!-- contiene toda la columna -->

		    <div class="formButtons">
		        <div class="info">
		        <input type="button" class="btMinimize btBlock" value="" title="Bloquear arriba" />
		        <!-- al clickear, que desactive el movimiento, y quede bloqueado arriba -->
		        
		        <div id="formButtonsContent">
		        
		            <ul>
		
		                <li class="buttonsTop">
		                {if !($editSuccessMessage || $Editable)}
		                <input type="submit" value="Guardar" class="btGray" title="Crear factura" />
		                {/if}
		                <input type="reset" value="Volver" class="btGray" title="Volver" onclick="window.location='/GestionAdministrativa/Main/Tab/TabPagosPendientes'"/>
		                </li>
		            </ul>
		            
		        </div> <!-- /formButtonsContent -->
		        
		        </div> <!-- /info -->
		    </div> <!-- /formButtons -->
		
		</div> <!-- /FormsColumn -->

		

        <div id="mensajes">
        {if $editSuccessMessage}
            <p class="success" style="width:61%;">{$editSuccessMessage} <img src="/images/icons/tick.png" /></p>
        {elseif $editErrorMessage}
            <p class="error" style="width:61%;">{$editErrorMessage}</p>
            <!-- <script>alert('{$editErrorMessage}')</script> -->
        {/if}
        </div>
        
        <div class="contentEditor"> <!-- formulario de edicion de contenido -->
        
            <div class="productsEditorContent">
            
            <div class="filtersBox filtersInfoBox">
            	
                <ul>
                    <li>
						
	                    <label class="blue"><img src="/images/icons/status_online.png" title=""/> Proveedor</label>   
                	    <input id="proveedor_autocomplete" class="required" name="data[ProveedorNombre]" value="{if $Proveedor}{$Proveedor.Nombre}{else}{$data.ProveedorNombre}{/if}" {if $editSuccessMessage || $Editable}readonly="readonly" disabled{/if}/>       
	                    <select name="data[ProveedorId]" class="required CambiarProveedor" id="SeleccionarProveedor">
	                        <option value="">Seleccionar</option>
	                        {foreach from=$Proveedores item="p"}
	                        <option value="{$p.Id}" {if (($p.Id eq $data.ProveedorId) || ($p.Id eq $Proveedor.Id)) }selected="selected"{/if}>{$p.Nombre}</option>
	                        {/foreach}
	                    </select>
						 
                    </li>
                    <!-- 
                    <li>
                    	<label class="blue"> Tipo de IVA</label>
                    	<select name="data[TipoIvaId]" class="required" {if $editSuccessMessage}readonly="readonly"{/if}>
                        <option value="">Seleccionar</option>
                        {foreach from=$TiposDeIva item="c"}
                        <option value="{$c.Id}" {if ($c.Id eq ($data.TipoIvaId))}selected="selected"{elseif $Proveedor.TipoIvaId == $c.Id}selected="selected"{/if}>{$c.Nombre} - {if $c.Discriminado > 0}{$c.Discriminado}{/if}-{if $c.Adicional > 0}{$c.Adicional}{/if}-{if $c.Incluido > 0}{$c.Incluido}{/if} - (Tipo factura: {$c.Letra_comp})</option>
                        {/foreach}
                    </select>
                    </li>
                     -->
                    <li>
                    	
                	    <label class="blue"><img src="/images/icons/layout_edit.png" title=""/> Nro. factura</label>       
						
						<input class="required number" type="text" name="data[Numero]" id="" value="{$data.Numero}" {if $editSuccessMessage || $Editable}readonly="readonly"{/if}/>
						
                    </li>
                    <li>
                    	
                	    <label class="blue"><img src="/images/icons/date.png" title="Importe factura"/> Fecha de factura</label>       
						
						<input class="required date" type="text" name="data[Fecha]" id="FechaFactura" value="{$data.Factura.Fecha}" {if $editSuccessMessage || $Editable}readonly="readonly" disabled{/if}/>
						
						
                    </li>
                    <li>
                    	
                	    <label class="blue"><img src="/images/icons/date.png" title=""/> Fecha vencimiento</label>       
						
						<input class="required date" type="text" name="data[FechaVencimiento]" id="FechaFacturaVencimiento" value="{$data.Factura.FechaVencimiento}" {if $editSuccessMessage || $Editable}readonly="readonly" disabled{/if}/>
						
						
                    </li>
                    
                    <li>
                	    <label class="blue"><img src="/images/icons/money.png" title="Importe"/> Neto No Gravado</label>       
						
						<input type="text" class="number total" id="ImporteNetoNoGravadoInput" name="data[ImporteNetoNoGravado]" value="{$data.Factura.ImporteNetoNoGravado}" {if $editSuccessMessage || $Editable}readonly="readonly"{/if}>
						
                    </li>
                    <div id="gravado21">
                    <li>
                    	
                	    <label class="blue"><img src="/images/icons/money.png" title="Importe"/> Neto Gravado 21%</label>       
						
						<input type="text" class="number total" id="ImporteNetoGravado21Input" name="data[ImporteNetoGravado21]" value="{$data.Factura.ImporteNetoGravado21}" {if $editSuccessMessage || $Editable}readonly="readonly"{/if}>
						
						
                    </li>
                    <li>
                    	
                	    <label class="blue"><img src="/images/icons/money.png" title="Importe"/> Iva 21%</label>       
						
						<input type="text" class="number total" id="ImporteIva21Input" name="data[ImporteIva21]" value="{$data.Factura.ImporteIva21}" {if $editSuccessMessage || $Editable}readonly="readonly"{/if}>
						
						
                    </li>
                    </div>
                    <div id="gravado27">
                    <li>
                    	
                	    <label class="blue"><img src="/images/icons/money.png" title="Importe"/> Neto Gravado 27%</label>       
						
						<input type="text" class="number total" id="ImporteNetoGravado27Input" name="data[ImporteNetoGravado27]" value="{$data.Factura.ImporteNetoGravado27}" {if $editSuccessMessage || $Editable}readonly="readonly"{/if}>
						
						
                    </li>
                    <li>
                    	
                	    <label class="blue"><img src="/images/icons/money.png" title="Importe"/> Iva 27%</label>       
						
						<input type="text" class="number total" id="ImporteIva27Input" name="data[ImporteIva27]" value="{$data.Factura.ImporteIva27}" {if $editSuccessMessage || $Editable}readonly="readonly"{/if}>
						
						
                    </li>
                    </div>
                    <div id="gravado10_5">
                    <li>
                    	
                	    <label class="blue"><img src="/images/icons/money.png" title="Importe"/> Neto Gravado 10.5%</label>       
						
						<input type="text" class="number total" id="ImporteNetoGravado10_5Input" name="data[ImporteNetoGravado10_5]" value="{$data.Factura.ImporteNetoGravado10_5}" {if $editSuccessMessage || $Editable}readonly="readonly"{/if}>
						
						
                    </li>
                    <li>
                    	
                	    <label class="blue"><img src="/images/icons/money.png" title="Importe"/> Iva 10.5%</label>       
						
						<input type="text" class="number total" id="ImporteIva10_5Input" name="data[ImporteIva10_5]" value="{$data.Factura.ImporteIva10_5}" {if $editSuccessMessage || $Editable}readonly="readonly"{/if}>
						
                    </li>
                    </div>
                    <div id="percepciones">
                    <li>
                    	
                	    <label class="blue"><img src="/images/icons/money.png" title="Importe"/> Percepciones Iva</label>       
						
						<input type="text" class="number total" id="ImportePercepcionesIvaInput" name="data[ImportePercepcionesIva]" value="{$data.Factura.ImportePercepcionesIva}" {if $editSuccessMessage || $Editable}readonly="readonly"{/if}>
						
						
                    </li>
                    <li>
                    	
                	    <label class="blue"><img src="/images/icons/money.png" title="Importe"/> Perc. IIBB Caba</label>       
						
						<input type="text" class=" number total" id="ImportePercepcionesIngresosBrutosCabaInput" name="data[ImportePercepcionesIngresosBrutosCaba]" value="{$data.Factura.ImportePercepcionesIngresosBrutosCaba}" {if $editSuccessMessage || $Editable}readonly="readonly"{/if}>
						
						
                    </li>
                    <li>
                    	
                	    <label class="blue"><img src="/images/icons/money.png" title="Importe"/> Perc. IIBB BsAs</label>       
						
						<input type="text" class=" number total" id="ImportePercepcionesIngresosBrutosBsAsInput" name="data[ImportePercepcionesIngresosBrutosBsAs]" value="{$data.Factura.ImportePercepcionesIngresosBrutosBsAs}" {if $editSuccessMessage || $Editable}readonly="readonly"{/if}>
						
						
                    </li>
                    <li>
                    	
                	    <label class="blue"><img src="/images/icons/money.png" title="Importe"/> Credito a cuenta</label>       
						
						<input type="text" class=" number total" id="ImporteCreditoACuentaInput" name="data[ImporteCreditoACuenta]" value="{$data.Factura.ImporteCreditoACuenta}" {if $editSuccessMessage || $Editable}readonly="readonly"{/if}>
						
                    </li>
                    </div>
                    <li>
                    	<label class="blue"> Tipo de gasto</label>
                    	<select id="SeleccionarTipoGasto" name="data[TipoGastoId]" class="required" {if $editSuccessMessage || $Editable}readonly="readonly" DISABLED{/if}>
                        <option value="">Seleccionar</option>
                        {foreach from=$TiposDeGasto item="c"}
                        <option value="{$c.Id}" {if ($c.Id eq ($data.TipoGastoId))}selected="selected"{/if}>{$c.Nombre}</option>
                        {/foreach}
                    	</select>
                    </li>
                    <li>
	                    	
	                    	<label class="blue"><img src="/images/icons/exclamation.png" title=""/> Mostrar todo</label>
	                    	<input type="checkbox" name="" value="NO" class="MostrarTodo" id="MostrarTodo" {if $editSuccessMessage || $Editable}readonly="readonly" DISABLED{/if}>
	                    	
	                </li>
	                
	                <li>
                    	<label class="blue">Nota credito o debito</label>
                    	<select id="SeleccionarNotaCreditoDebito" name="data[TipoNota]" class="" {if $editSuccessMessage || $Editable}readonly="readonly" DISABLED{/if}>
                        <option value="">Seleccionar</option>
                        <option value="NC" {if ('NC' eq ($data.TipoNota))}selected="selected"{/if}>Nota de credito</option>
                        <option value="ND" {if ('ND' eq ($data.TipoNota))}selected="selected"{/if}>Nota de debito</option>
                    	</select>
                    </li>
                    
                    <li>
                	    <label class="blue"><img src="/images/icons/error.png" title="Importe "/> Importe liquidado</label>       
						 
						<input type="hidden" class="required number" readonly="readonly" disabled id="ImporteTotalLiquidadoInput" name="data[ImporteLiquidado]" value="{if $data.Factura.ImporteLiquidado}{$data.Factura.ImporteLiquidado}{else}0{/if}">
						
						<div id="ImporteTotalLiquidado"><label>{if $data.Factura.ImporteLiquidado}$ {$data.Factura.ImporteLiquidado}{else}$ 0.0{/if}</label></div>
                    </li>
                    <li>
                	    <label class="blue"><img src="/images/icons/exclamation.png" title="Importe "/> Importe total: </label>
                	    
                	    <input type="hidden" class="required number" readonly="readonly" disabled id="ImporteTotalInput" name="data[ImporteTotal]" value="{if $data.Factura.Importe}{$data.Factura.Importe}{else}0{/if}">
                	    
                	    <div id="_totalImp"><label>{if $data.Factura.Importe}$ {$data.Factura.Importe}{else}$ 0.0{/if}</label></div>       
						
                    </li>
                    <li>
                	    <label class="blue"><img src="/images/icons/exclamation.png" title="Importe "/> Importe restante</label>       
						 
						<div id="ImporteRestante"><label>$ 0.0</label></div>
                    </li>
                    
                </ul>
            </div> <!-- /filtersBox-->
            
            {if !($editSuccessMessage || $Editable)}
            <div id="OrdenesDeCompraPendientes"><!-- ajax GetOrdenesDeCompraPendientes --></div>
            {/if}
         	{if $OrdenesDeCompraLiquidadas|@count}   
            	{include file="Backend/FacturaCompra/OrdenesDeCompraLiquidadas.tpl"}
         	{/if}
                
         		<div class="contentTitles">
                    <label class="blue">Comentario (opcional)</label>
                    <textarea name="data[Comentario]" cols="45" rows="5" class="" {if $editSuccessMessage || $Editable}readonly="readonly"{/if}>{$data.Comentario}</textarea>
                </div> <!-- /contentTitles -->
                 
                
                
            </div> <!-- /productsEditorContent -->
        </div>  <!-- /contentEditor -->
    </div> <!-- /form -->
</form>