{literal}
<script type="text/javascript">
$(document).ready(function(){
    $(".AgregarPagoNotaCredito").click(function(){

        if(IsSetProveedor())
        {
        	$('#NotaCreditoId').val($(this).attr('pagoid'));
        	GetPagos('add', $('#OrdenDePagoId').val());
        }
        else
            alert('Ingrese el proveedor');

        return false;
    });
});

</script>
{/literal}

<input type="hidden" id="NotaCreditoId" value="" />

<h2>Notas pendientes</h2>

<div class="list">
			      
           <div class="listTop">
                <div>
                    <table border="0" cellpadding="0" cellspacing="0">
							<tr>    
                                <td width="10%"><p>Fecha</p> </td>
                                <td width="10%"><p>Numero</p> </td>
                                <td width="10%"><p>Importe</p> </td>
                                <td width="10%"><p>Tipo</p> </td>
                                
                                <td width="10%"><p>Acciones</p></td>
                            </tr>
                    </table>
                </div>
            </div> <!-- /listadoTop -->
                        
                    <div class="listItems">
                    	<table border="0" cellpadding="0" cellspacing="0" width="100%">
                        {if !$Notas|@count}
                        	<tr class="noResult">
                                <td colspan="10" align="center"><h2 class="noResult">No se ha encontrado ninguna retencion.</h2></td>
                            </tr>
                        {else}
                        
						{foreach from=$Notas item="no"}
						    <tr {$className}>
                                <td width="10%">{$no.Fecha} </td>
                                <td width="10%">{$no.Numero} </td>
                                <td width="10%">$ {$no.Importe*-1} </td>
                                <td width="10%">{$no.TipoNota} </td>
                                
                                <td width="10%">
                                	<a class="AgregarPagoNotaCredito" pagoid="{$no.NumeroInterno}"><img src="/images/icons/add.png" title="Agregar pago"/> Agregar</a>
                                </td>
						    </tr>
						{/foreach}
                        
                        {/if}
                        </table>
                    </div> <!-- /listItems -->
</div><!-- en list -->