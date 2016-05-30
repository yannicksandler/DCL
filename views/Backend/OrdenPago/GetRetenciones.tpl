{literal}
<script type="text/javascript">
$(document).ready(function(){
    $(".AgregarPagoRetencion").click(function(){

        if(IsSetProveedor())
        {
        	$('#RetencionId').val($(this).attr('pagoid'));
        	GetPagos('add', $('#OrdenDePagoId').val());
        }
        else
            alert('Ingrese el cliente');

        return false;
    });
});

</script>
{/literal}

<input type="hidden" id="RetencionId" value="" />

<h2>Retenciones</h2>

<div class="list">
			      
           <div class="listTop">
                <div>
                    <table border="0" cellpadding="0" cellspacing="0">
							<tr>    
                                <td width="10%"><p>Fecha CO</p> </td>
                                <td width="10%"><p>CO</p> </td>
                                <td width="10%"><p>Detalle</p> </td>
                                <td width="10%"><p>Importe</p> </td>
                                
                                <td width="10%"><p>Acciones</p></td>
                            </tr>
                    </table>
                </div>
            </div> <!-- /listadoTop -->
                    
                    <div class="listItems">
                    	<table border="0" cellpadding="0" cellspacing="0" width="100%">
                        {if !$Retenciones|@count}
                        	<tr class="noResult">
                                <td colspan="10" align="center"><h2 class="noResult">No se ha encontrado ninguna retencion.</h2></td>
                            </tr>
                        {else}
                        
						{foreach from=$Retenciones item="d"}
						    <tr {$className}>
                                <td width="10%">{if $d.CobranzaId == 1}No tiene{else}{$d.Cobranza.Fecha}{/if} </td>
                                <td width="10%">{if $d.CobranzaId == 1}Concepto bancario{else}{$d.Cobranza.Numero} <br>({$d.Cobranza.Cliente.Nombre|escape:'htmlall'}){/if}</td>
                                <td width="10%">{if $d.CobranzaId == 1}{$d.Detalle}{else}{$d.PagoTipo.Nombre}{/if} </td>
                                <td width="10%">$ {$d.Importe} </td>
                                
                                <td width="10%">
                                	<a class="AgregarPagoRetencion" pagoid="{$d.Id}"><img src="/images/icons/add.png" title="Agregar pago"/> Agregar retencion</a>
                                </td>
						    </tr>
						{/foreach}
                        
                        {/if}
                        </table>
                    </div> <!-- /listItems -->
</div><!-- en list -->