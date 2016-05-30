{literal}
<script type="text/javascript">
$(document).ready(function(){
	
    $(".AgregarLiquidacion").click(function(){
        
        GetLiquidacion('add', $('#CobranzaId').val());

        return false;
    });

    $(".BorrarLiquidacion").click(function(){
        var LiquidacionId	=	$(this).attr('id');
        
        
        if(LiquidacionId)
        	GetLiquidacion('del', LiquidacionId);

        return false;
    });

    
    $("#ImporteItem").blur(function(){
        if( $(this).val() == '' )
            $(this).val( $(this).attr("defaultValue") );
    });

    $("#ImporteItem").focus(function(){
        if( $(this).val() == $(this).attr("defaultValue"))
            $(this).val('');
    });


    $("#NumeroItem").blur(function(){
        if( $(this).val() == '' )
            $(this).val( $(this).attr("defaultValue") );
    });

    $("#NumeroItem").focus(function(){
        if( $(this).val() == $(this).attr("defaultValue"))
            $(this).val('');
    });

});

function abrirPopUp(pagina, opciones)
{
	window.open(pagina,"",opciones);
}


</script>
{/literal}


<!-- liquidacion -->
<h1><br></br>Facturas de DCL Group asociadas a la cobranza</h1>

<p><img src="/images/icons/help.png" /> Debe ingresar los importes abonados de las facturas liquidadas</p>

<h2>Total de liquidacion: $ {$TotalLiquidaciones}</h2>
{if $deleteErrorMessage}<p class="error">{$deleteErrorMessage} <img src="/images/icons/error.png" /></p>{/if}
{if $successMessage}<p class="success">{$successMessage} <img src="/images/icons/tick.png" /></p>{/if}

	<input type="hidden" name="" id="TotalLiquidacion" value="{$TotalLiquidaciones}" />

	<div class="list">
			      
           <div class="listTop">
                <div>
                    <table border="0" cellpadding="0" cellspacing="0">
							<tr>    
                                <td width="10%"><p title="Numero de factura"># Factura</p> </td>
                                <td width="30%"><p title="Importe de factura">Importe abonado de factura asociada</p> </td>
                                
                                <td width="10%"><p>Acciones</p></td>
                            </tr>
                    </table>
                </div>
            </div> <!-- /listadoTop -->
                        
                    <div class="listItems">
                    	<table border="0" cellpadding="0" cellspacing="0" width="">
                        {if !$Liquidaciones|@count}
                        
                        	<tr class="noResult">
                                <td colspan="10" align="center"><h2 class="noResult">No se ha encontrado ning&uacute;na liquidacion.</h2></td>
                            </tr>

                        {else}
                        
						{foreach from=$Liquidaciones item="d"}
						    <tr {$className}>
                                <td width="10%">{$d.FacturaId} </td>
                                <td width="30%">{$d.Importe} </td>
                                
                                
                                <td width="10%">
                                    <p>
                                        <input type="button" class="BorrarLiquidacion btDelete" id="{$d.Id}" title="Borrar liquidacion">
                                    </p>
                                </td>
						    </tr>
						{/foreach}
						
                        {/if}
                        </table>
                    </div> <!-- /listItems -->
                
                <table border="0" cellpadding="0" cellspacing="0">
                            <tr {$className}  height="50">
                                <td width="10%">
                                	<input type="text" value="Numero" title="Numero de la factura" class="" name="NumeroItem" id="NumeroItem"/> 
                                </td>
                                <td width="10%">
                                	<input type="text" value="Importe" title="Importe de la factura" class="" name="ImporteItem" id="ImporteItem"/> 
                                </td>
                                <td width="20%">
                                
                                <p>
                                	<!-- <input type="submit" value="Agregar" class="btDark AgregarLiquidacion" title="Agregar liquidacion"/> -->
                                	<a class="AgregarLiquidacion" ><img src="/images/icons/add.png" title="Agregar liquidacion"/> Agregar liquidacion</a>
                                </p>
                                
                                </td>
						    </tr>
				</table>
                        
                </div> <!-- /list -->
                                                     

<!-- end liquidaciones -->     
	           							