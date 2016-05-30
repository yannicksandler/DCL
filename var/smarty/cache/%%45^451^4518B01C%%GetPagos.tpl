152
a:4:{s:8:"template";a:1:{s:30:"Backend/OrdenPago/GetPagos.tpl";b:1;}s:9:"timestamp";i:1462288232;s:7:"expires";i:1462288232;s:13:"cache_serials";a:0:{}}
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



<!-- insumos -->
<h1>Detalle de pago</h1>
<!-- 
 -->

<h2>Total del pago: $ 1400</h2>
<input type="hidden" id="TotalPago" name="" value="1400" />
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
                                                
												    <tr >
                                <td width="10%">Cheque propio </td>
                                <td width="10%">$ 1400.00 </td>
                                <td width="20%">ICBC-05280210159072 </td>
                                <td width="10%">03/06/2016 </td>
                                
                                <td width="10%">
                                                                </td>
						    </tr>
						                        
                                                </table>
                    </div> <!-- /listItems -->
                    
                    <!-- si existe la orden de pago, no se pueden agregar pagos -->
                    					
                </div> 
<!-- end pagos -->