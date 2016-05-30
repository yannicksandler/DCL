{literal}
<script type="text/javascript">
$(document).ready(function(){
    $(".AgregarPago").click(function(){

        if(IsSetCliente())
        {
        	GetPagos('add', $('#CobranzaId').val());
        }
        else
            alert('Ingrese el cliente');
          

        return false;
    });

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
    		$("#FormEfectivo").hide();
    		$("#FormTransferencia").hide();
    		$("#FormCheque").show();
    		return;
    	}
    	// transferencia, mostrar form
    	if(PagoTipoId == 13)
    	{
    		$("#FormEfectivo").hide();
    		$("#FormCheque").hide();
    		$("#FormTransferencia").show();
    		return;
    	}
    	else
    	{
    		$("#FormEfectivo").show();
    		$("#FormCheque").hide();
    		$("#FormTransferencia").hide();
    		return;
    	}
    });

    //$("#FormCheque").hide();
});

function abrirPopUp(pagina, opciones)
{
	window.open(pagina,"",opciones);
}

</script>
{/literal}


<!-- insumos -->
<h1>Detalle de cobro</h1>
<!-- 
{if !$Pagos|@count}
<p class="error">No hay pagos asociados a la orden de pago <img src="/images/icons/error.png" /></p>              
{/if}
 -->
{if $deleteErrorMessage}<p class="error">{$deleteErrorMessage} <img src="/images/icons/error.png" /></p>{/if}
{if $successMessage}<p class="success">{$successMessage} <img src="/images/icons/tick.png" /></p>{/if}

<h2>Total del cobro: $ {$TotalPago}</h2>
<input type="hidden" id="TotalPago" name="" value="{$TotalPago}" />
	<div class="list">
			      
           <div class="listTop">
                <div>
                    <table border="0" cellpadding="0" cellspacing="0">
							<tr>    
                                <td width="10%"><p>Tipo de pago</p> </td>
                                <td width="10%"><p>Importe</p> </td>
                                <td width="20%"><p>Detalle</p> </td>
                                
                                <td width="10%"><p>Cobro</p> </td>
                                
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
                                <!-- usado desde array session y como propiedad de CobranzaDetalle -->
                                <td width="10%">{$d.FechaCobro} </td>
                                
                                <td width="10%">
                                {if !$ExisteCobranza}
                                    <p>
                                    {if !$data.Id}
                                        <input type="button" class="BorrarPago btDelete" id="{$d.Id}" title="Borrar pago">
                                    {/if}
                                    </p>
                                {/if}
                                </td>
						    </tr>
						{/foreach}
                        
                        {/if}
                        </table>
                    </div> <!-- /listItems -->
                    
                    <!-- si existe la orden de pago, no se pueden agregar pagos -->
                    {if !$ExisteCobranza}
                    {if !$data.Id}
                    <!-- el tipo de pago de termina el formulario -->
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
					<div id="FormCheque" style="display:none;">
                       	<table border="0" cellpadding="0" cellspacing="0">
                            <tr {$className}   height="30">
                                <td width="10%">
                                	<input type="text" value="Banco" class="" name="BancoItem" id="BancoItem"/> 
                                </td>
                                <td width="10%">
                                	<input type="text" value="Sucursal" name="SucursalItem" id="SucursalItem"/> 
                                </td>
                                <td width="10%">
                                	<input type="text" value="Localidad" name="LocalidadItem" id="LocalidadItem"/> 
                                </td>
                                <td width="10%">
                                	<input type="text" value="Importe" class="" name="ImporteChequeItem" id="ImporteChequeItem"/> 
                                </td>
						    </tr>
						    <tr {$className}   height="30">
                                <td width="10%">
                                	<input type="text" value="Numero" class="" name="NumeroItem" id="NumeroItem"/> 
                                </td>
                                <!-- 
                                <td width="10%">
                                	<input type="text" value="Cuenta" class="" name="CuentaItem" id="CuentaItem"/> 
                                </td>
                                 -->
                                <td width="10%">
                                	<input type="text" value="Fecha emision" name="FechaChequeItem" id="FechaChequeItem"/> 
                                </td>
                                <td width="10%">
                                	<input type="text" value="Fecha de cobro" name="FechaCobroItem" id="FechaCobroItem"/> 
                                </td>
						    </tr>
						    <tr {$className}   height="30">
                                <td width="10%">
                                	<input type="text" value="Firmante" class="" name="FirmanteItem" id="FirmanteItem"/> 
                                </td>
                                <td width="10%">
                                	<input type="text" value="Cuit" class="" name="CuitItem" id="CuitItem"/> 
                                </td>
                                <td width="10%">
                                	<a class="AgregarPago" ><img src="/images/icons/add.png" title="Agregar pago"/> Agregar pago</a>
                                </td>
						    </tr>
						</table>
                    </div>
                    
                    <div id="ChequesTerceros">
                    <img src="/images/icons/bullet_go.png" title="item"/>
                    {include file="Backend/Cobranza/GetNotasDeCreditoPendientes.tpl"}
					</div>
					{/if}
					{/if}
                </div> <!-- /list -->
<!-- end pagos -->