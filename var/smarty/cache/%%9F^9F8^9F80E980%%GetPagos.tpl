211
a:4:{s:8:"template";a:2:{s:29:"Backend/Cobranza/GetPagos.tpl";b:1;s:48:"Backend/Cobranza/GetNotasDeCreditoPendientes.tpl";b:1;}s:9:"timestamp";i:1462381146;s:7:"expires";i:1462381146;s:13:"cache_serials";a:0:{}}
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



<!-- insumos -->
<h1>Detalle de cobro</h1>
<!-- 
 -->
<p class="success">Pago agregado con exito <img src="/images/icons/tick.png" /></p>
<h2>Total del cobro: $ 4799.66</h2>
<input type="hidden" id="TotalPago" name="" value="4799.66" />
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
                                                
												    <tr >
                                <td width="10%">Transferencia bancaria </td>
                                <td width="10%">$ 4601.32 </td>
                                <td width="20%">ICBC-05280210159072 </td>
                                <!-- usado desde array session y como propiedad de CobranzaDetalle -->
                                <td width="10%">Fecha de cobro </td>
                                
                                <td width="10%">
                                                                    <p>
                                                                            <input type="button" class="BorrarPago btDelete" id="0" title="Borrar pago">
                                                                        </p>
                                                                </td>
						    </tr>
												    <tr >
                                <td width="10%">Retencion ganacias </td>
                                <td width="10%">$ 79.34 </td>
                                <td width="20%">0001-00014111 </td>
                                <!-- usado desde array session y como propiedad de CobranzaDetalle -->
                                <td width="10%">Fecha de cobro </td>
                                
                                <td width="10%">
                                                                    <p>
                                                                            <input type="button" class="BorrarPago btDelete" id="1" title="Borrar pago">
                                                                        </p>
                                                                </td>
						    </tr>
												    <tr >
                                <td width="10%">Retencion IIBB CABA </td>
                                <td width="10%">$ 119 </td>
                                <td width="20%">0001-00003310 </td>
                                <!-- usado desde array session y como propiedad de CobranzaDetalle -->
                                <td width="10%">Fecha de cobro </td>
                                
                                <td width="10%">
                                                                    <p>
                                                                            <input type="button" class="BorrarPago btDelete" id="2" title="Borrar pago">
                                                                        </p>
                                                                </td>
						    </tr>
						                        
                                                </table>
                    </div> <!-- /listItems -->
                    
                    <!-- si existe la orden de pago, no se pueden agregar pagos -->
                                                            <!-- el tipo de pago de termina el formulario -->
                    <select name="PagoTipoId" class="" id="PagoTipoId">
			                        <option value="">Seleccionar pago</option>
			                        			                        <option value="2">Efectivo</option>
			                        			                        <option value="4">Cheque tercero</option>
			                        			                        <option value="6">Retencion ganacias</option>
			                        			                        <option value="7">Retencion IIBB CABA</option>
			                        			                        <option value="8">Retencion IIBB Bs As</option>
			                        			                        <option value="9">Retencion IVA</option>
			                        			                        <option value="10">Retencion SUSS</option>
			                        			                        <option value="11">Retencion varias</option>
			                        			                        <option value="13">Transferencia bancaria</option>
			                        			        </select>
			                 		
					<div id="FormEfectivo" style="display:none;">
                       	<table border="0" cellpadding="0" cellspacing="0">
                            <tr    height="50">
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
                            <tr    height="50">
                                <td width="10%">
                                	<input type="text" value="Importe" class="" name="ImporteItem" id="ImporteTransferenciaItem"/> 
                                </td>
                                <td width="10%">
	                                <select name="" class="" id="BancoTransfItem">
				                        <option value="">Seleccionar</option>
				                        				                        <option value="1" >ICBC - 05280210159072</option>
				                        				                        <option value="20" >Plazo Fijo ICBC - 00000000</option>
				                        				                        <option value="22" >ICBC - 05280210308263</option>
				                        				                    </select>
                                </td>
                            </tr>
                            <tr    height="30">
                                <td width="10%">
                                	<a class="AgregarPago" ><img src="/images/icons/add.png" title="Agregar pago"/> Agregar pago</a>
                                </td>
						    </tr>
					</table>
					
					</div>
					<div id="FormCheque" style="display:none;">
                       	<table border="0" cellpadding="0" cellspacing="0">
                            <tr    height="30">
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
						    <tr    height="30">
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
						    <tr    height="30">
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
                    
<script type="text/javascript">
$(document).ready(function(){
    $(".AgregarPagoNotaCredito").click(function(){

        if(IsSetCliente())
        {
        	$('#NotaCreditoId').val($(this).attr('notacreditoid'));
        	GetPagos('add', $('#CobranzaId').val());
        }
        else
            alert('Ingrese el cliente');

        return false;
    });
});

</script>


<input type="hidden" id="NotaCreditoId" value="" />

<h2>Notas de credito</h2>

<div class="list">
			      
           <div class="listTop">
                <div>
                    <table border="0" cellpadding="0" cellspacing="0">
							<tr>    
                                <td width="10%"><p>Fecha</p> </td>
                                <td width="10%"><p>Importe</p> </td>
                                <td width="20%"><p>Detalle</p> </td>
                                
                                <td width="10%"><p>Acciones</p></td>
                            </tr>
                    </table>
                </div>
            </div> <!-- /listadoTop -->
                        
                    <div class="listItems">
                    	<table border="0" cellpadding="0" cellspacing="0" width="100%">
                                                	<tr class="noResult">
                                <td colspan="10" align="center"><h2 class="noResult">No se ha encontrado ninguna notas de credito.</h2></td>
                            </tr>
                                                </table>
                    </div> <!-- /listItems -->
</div><!-- en list -->					</div>
										                </div> <!-- /list -->
<!-- end pagos -->