{literal}
<script type="text/javascript">
$(document).ready(function(){
    $(".AgregarPago").click(function(){

        if(IsSetProveedor())
        {
        	GetPagos('add', $('#OrdenDePagoId').val());
        }
        else
            alert('Ingrese el proveedor');
          

        return false;
    });
	// cargar retenciones de acuerdo al proveedor
    //VerificarProveedor();

    $(".BorrarPago").click(function(){
        var PagoId	=	$(this).attr('id');
        
        
        if(PagoId)
        	GetPagos('del', PagoId);

        return false;
    });

    $("#ImportePagoItem").blur(function(){
        if( $(this).val() == '' )
            $(this).val( $(this).attr("defaultValue") );
    });

    $("#ImportePagoItem").focus(function(){
        if( $(this).val() == $(this).attr("defaultValue"))
            $(this).val('');
    });

    $("#DetallePagoItem").blur(function(){
        if( $(this).val() == '' )
            $(this).val( $(this).attr("defaultValue") );
    });

    $("#DetallePagoItem").focus(function(){
        if( $(this).val() == $(this).attr("defaultValue"))
            $(this).val('');
    });

    $('#FechaChequeItem').datepicker({
		changeMonth: true,
		changeYear: true,
        dateFormat: 'dd/mm/yy'
	});

    $('#FechaCobroItem').datepicker({
		changeMonth: true,
		changeYear: true,
        dateFormat: 'dd/mm/yy'
	});

    $('#PagoTipoId').change(function(){
    	var PagoTipoId	=	$("#PagoTipoId option:selected").val();
    	// si el tipo de pago es Cheque tercero = 4
    	if(PagoTipoId == 4)
    	{
    		GetChequesTerceros();
    		$("#ChequesTerceros").show();
    		$("#FormEfectivo").hide();
    		$("#FormTransferencia").hide();
    		$("#FormChequePropio").hide();
    		return;
    	}
		// cheque propio, mostrar form
    	if(PagoTipoId == 1)
    	{
    		//$("#ChequesTerceros").hide();
    		$("#FormEfectivo").hide();
    		$("#FormTransferencia").hide();
    		$("#FormChequePropio").show();
    		return;
    	}
    	// retenciones
    	// ->andWhereIn('p.PagoTipoId', array(6,7,8,9,10,11))
    	if((PagoTipoId == 6) || (PagoTipoId == 7) || (PagoTipoId == 8) ||
    			(PagoTipoId == 9) || (PagoTipoId == 10) || (PagoTipoId == 11))
    	{
    		//$("#ChequesTerceros").hide();
    		$("#FormEfectivo").hide();
    		$("#FormTransferencia").hide();
    		$("#FormChequePropio").hide();
    		$("#FormRetenciones").show();
    		GetRetencionesPendientes();
    		return;
    	}
    	// percepciones
    	// ->andWhereIn('p.PagoTipoId', array(6,7,8,9,10,11))
    	if((PagoTipoId == 14) || (PagoTipoId == 15) || (PagoTipoId == 16))
    	{
    		//$("#ChequesTerceros").hide();
    		$("#FormEfectivo").hide();
    		$("#FormTransferencia").hide();
    		$("#FormChequePropio").hide();
    		$("#FormRetenciones").hide();
    		$("#FormPercepciones").show();
    		GetPercepcionesPendientes();
    		return;
    	}
    	// transferencia, mostrar form
    	if(PagoTipoId == 13)
    	{
    		//$("#ChequesTerceros").hide();
    		$("#FormEfectivo").hide();
    		$("#FormChequePropio").hide();
    		$("#FormTransferencia").show();
    		return;
    	}
    	else
    	{
    		//$("#ChequesTerceros").hide();
    		$("#FormChequePropio").hide();
    		$("#FormTransferencia").hide();
    		$("#FormEfectivo").show();
    		return;
    	}
    });
	
});

function abrirPopUp(pagina, opciones)
{
	window.open(pagina,"",opciones);
}

function GetChequesTerceros()
{
	$.ajax({
		type: "POST",
		url: '/OrdenPago/GetChequesTerceros',
		dataType: "text/html",
		data: {
			'data[TipoDePago]': GetTipoOrdenDePago()
		},
		success: function(html){
			$("#ChequesTerceros").html(html);
		}

	});
}

function VerificarProveedor()
{
	var id = GetProveedorId();
	// si el proveedor es APIF IVA
	if(id==175)
	{
		GetRetencionesPendientes();
	}
}

function GetRetencionesPendientes()
{
	$.ajax({
		type: "POST",
		url: '/OrdenPago/GetRetenciones',
		dataType: "text/html",
		data: {
			'data[TipoDePago]': GetTipoOrdenDePago(),
			'data[TipoRetencion]': $("#PagoTipoId option:selected").val()
		},
		success: function(html){
			$("#FormRetenciones").html(html);
		}

	});
}

function GetPercepcionesPendientes()
{
	$.ajax({
		type: "POST",
		url: '/OrdenPago/GetPercepciones',
		dataType: "text/html",
		data: {
			'data[TipoDePago]': GetTipoOrdenDePago(),
			'data[TipoPercepcion]': $("#PagoTipoId option:selected").val()
		},
		success: function(html){
			$("#FormPercepciones").html(html);
		}

	});
}

</script>

<style type="text/css">
div.SeleccionDePago {
	border-width: thin;
	border-style: solid;
	border-color: black;
}
</style>
{/literal}


<!-- insumos -->
<h1>Detalle de pago</h1>
<!-- 
{if !$Pagos|@count}
<p class="error">No hay pagos asociados a la orden de pago <img src="/images/icons/error.png" /></p>              
{/if}
 -->
{if $deleteErrorMessage}<p class="error">{$deleteErrorMessage} <img src="/images/icons/error.png" /></p>{/if}
{if $successMessage}<p class="success">{$successMessage} <img src="/images/icons/tick.png" /></p>{/if}

<h2>Total del pago: $ {$TotalPago}</h2>
<input type="hidden" id="TotalPago" name="" value="{$TotalPago}" />
	<div class="list">
			      
           <div class="listTop">
                <div>
                    <table border="0" cellpadding="0" cellspacing="0">
							<tr>    
                                <td width="10%"><p>Tipo de pago</p> </td>
                                <td width="10%"><p>Importe</p> </td>
                                <td width="20%"><p>Detalle</p> </td>
                                
                                <td width="10%"><p>Fecha cobro</p> </td>
                                
                                <td width="10%"><p>Acciones</p></td>
                            </tr>
                    </table>
                </div>
            </div> <!-- /listadoTop -->
                        
                    <div class="listItems">
                    	<table border="0" cellpadding="0" cellspacing="0" width="100%">
                        {if !$Pagos|@count}
                        	<tr class="noResult">
                                <td colspan="10" align="center"><h2 class="noResult">No se ha encontrado ning&uacute;n pago.</h2></td>
                            </tr>
                        {else}
                        
						{foreach from=$Pagos item="d"}
						    <tr {$className}>
                                <td width="10%">{$d.NombrePagoTipo} </td>
                                <td width="10%">$ {$d.Importe} </td>
                                <td width="20%">{$d.Detalle} </td>
                                <td width="10%">{$d.FechaCobro} </td>
                                
                                <td width="10%">
                                {if !$ExisteOrdenDePago}
                                    <p>
                                        <input type="button" class="BorrarPago btDelete" id="{$d.Id}" title="Borrar pago">
                                    </p>
                                {/if}
                                </td>
						    </tr>
						{/foreach}
                        
                        {/if}
                        </table>
                    </div> <!-- /listItems -->
                    
                    <!-- si existe la orden de pago, no se pueden agregar pagos -->
                    {if !$ExisteOrdenDePago}
                    <select name="PagoTipoId" class="" id="PagoTipoId">
		                        <option value="">Seleccionar pago</option>
		                        {foreach from=$PagoTipos item="a"}
		                        <option value="{$a.Id}">{$a.Nombre}</option>
		                        {/foreach}
		            </select>     		
		            
		            <div id="FormEfectivo" style="display:none;">
                    <table border="0" cellpadding="0" cellspacing="0">
                            <tr {$className}   height="50">
                                <td width="10%">
                                	<input type="text" value="Importe" class="" name="ImporteItem" id="ImportePagoItem"/> 
                                </td>
                                
                                <td width="10%">
                                	<input type="text" value="Detalle" name="DetalleItem" id="DetallePagoItem"/> 
                                </td>
                                
                                <td width="10%">
                                	<a class="AgregarPago" ><img src="/images/icons/add.png" title="Agregar pago"/> Agregar pago</a>
                                </td>
						    </tr>
					</table>
					</div>
					<div id="FormTransferencia" style="display:none;">
                    <table border="0" cellpadding="0" cellspacing="0">
                            <tr {$className}   height="50">
                                <td width="10%">
                                	<input type="text" value="Importe" class="" name="ImporteItem" id="ImporteTransferenciaItem"/> 
                                </td>
                                <td width="10%">
	                                <select name="" class="" id="BancoTransfItem">
				                        <option value="">Seleccionar</option>
				                        {foreach from=$Bancos item="t"}
				                        <option value="{$t.Id}" {if ($t.Id eq $BancoId) }selected="selected"{/if}>{$t.Nombre} - {$t.NumeroDeCuenta}</option>
				                        {/foreach}
				                    </select>
                                </td>
                            </tr>
                            <tr {$className}   height="30">
                                <td width="10%">
                                	<a class="AgregarPago" ><img src="/images/icons/add.png" title="Agregar pago"/> Agregar pago</a>
                                </td>
						    </tr>
					</table>
					</div>
					<div id="FormChequePropio" style="display:none;">
                       	<table border="0" cellpadding="0" cellspacing="0">
                            <tr {$className}   height="30">
                                <td width="10%">
                                	<input type="text" value="Importe" class="" name="ImporteChequeItem" id="ImporteChequeItem"/> 
                                </td>
                                <td width="10%">
	                                <select name="" class="" id="BancoItem">
				                        <option value="">Seleccionar</option>
				                        {foreach from=$Bancos item="t"}
				                        <option value="{$t.Id}" {if ($t.Id eq $BancoId) }selected="selected"{/if}>{$t.Nombre} - {$t.NumeroDeCuenta}</option>
				                        {/foreach}
				                    </select>
                                </td>
                                <td width="10%">
                                	<input type="text" value="Fecha emision" name="FechaChequeItem" id="FechaChequeItem"/> 
                                </td>
                                <td width="10%">
                                	<input type="text" value="Fecha cobro" name="FechaCobroItem" id="FechaCobroItem"/> 
                                </td>
						    </tr>
						    <tr {$className}   height="30">
						    <!-- 
                                <td width="10%">
                                	<input type="text" value="Firmante" class="" name="FirmanteItem" id="FirmanteItem"/> 
                                </td>
                                 -->
                                <td width="10%">
                                	<a class="AgregarPago" ><img src="/images/icons/add.png" title="Agregar pago"/> Agregar pago</a>
                                </td>
						    </tr>
						</table>
                    </div>
                    
                    <div>
                    <img src="/images/icons/bullet_go.png" title="item"/>
						<br><h2>Efectivo: <span>$ {$Efectivo}</span></h2><br><br>
					</div>
					
					<div id="FormNotas">
					<img src="/images/icons/bullet_go.png" title="item"/>
                    {include file="Backend/OrdenPago/GetNotas.tpl"}
					</div>
					
					<div id="FormRetenciones">
					<img src="/images/icons/bullet_go.png" title="item"/>
                    {include file="Backend/OrdenPago/GetRetenciones.tpl"}
					</div>
					
					<div id="FormPercepciones">
					<img src="/images/icons/bullet_go.png" title="item"/>
                    {include file="Backend/OrdenPago/GetPercepciones.tpl"}
					</div>
					
                    <div id="ChequesTerceros">
                    <img src="/images/icons/bullet_go.png" title="item"/>
                    {include file="Backend/OrdenPago/GetChequesTerceros.tpl"}
					</div>
					
					<div>
					<img src="/images/icons/bullet_go.png" title="item"/>
                    {include file="Backend/GestionEconomica/Bancos.tpl"}
                    </div>
                    
					{/if}
					
                </div> 
<!-- end pagos -->