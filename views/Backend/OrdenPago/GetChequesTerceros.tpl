{literal}
<script type="text/javascript">
$(document).ready(function(){
    $(".AgregarPagoCheque").click(function(){

        if(IsSetProveedor())
        {
        	$('#ChequeId').val($(this).attr('chequeid'));
        	GetPagos('add', $('#OrdenDePagoId').val());
        }
        else
            alert('Ingrese el cliente');

        return false;
    });
});

</script>
{/literal}

<input type="hidden" id="ChequeId" value="" />

<h2>Cheques en cartera ({$Cheques|@count})</h2>

<div class="list">
			      
           <div class="listTop">
                <div>
                    <table border="0" cellpadding="0" cellspacing="0">
							<tr>    
                                <td width="10%"><p>Emision</p> </td>
                                <td width="10%"><p>Importe</p> </td>
                                <td width="20%"><p>Detalle</p> </td>
                                <td width="10%"><p>Cobro</p> </td>
                                <td width="10%"><p>Vencimiento</p> </td>
                                
                                <td width="10%"><p>Acciones</p></td>
                            </tr>
                    </table>
                </div>
            </div> <!-- /listadoTop -->
                        
                    <div class="listItems">
                    	<table border="0" cellpadding="0" cellspacing="0" width="100%">
                        {if !$Cheques|@count}
                        	<tr class="noResult">
                                <td colspan="10" align="center"><h2 class="noResult">No se ha encontrado ning&uacute;n cheque.</h2></td>
                            </tr>
                        {else}
                        
						{foreach from=$Cheques item="d"}
						    <tr {$className}>
                                <td width="10%">{$d.FechaEmision} </td>
                                <td width="10%">$ {$d.Importe} </td>
                                <td width="20%">{$d.NombreBanco} #{$d.Numero} ({$d.Tipo})</td>
                                <td width="10%">{$d.FechaCobro} </td>
                                <td width="10%">{$d.FechaVencimiento} </td>
                                
                                <td width="10%">
                                	<a class="AgregarPagoCheque" chequeid="{$d.Id}"><img src="/images/icons/add.png" title="Agregar pago"/> Agregar</a>
                                </td>
						    </tr>
						{/foreach}
                        
                        {/if}
                        </table>
                    </div> <!-- /listItems -->
</div><!-- en list -->