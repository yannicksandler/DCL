{literal}
<script type="text/javascript">
$(document).ready(function(){
    $(".AgregarPagoPercepcion").click(function(){

        if(IsSetProveedor())
        {
        	$('#PercepcionId').val($(this).attr('pagoid'));
        	GetPagos('add', $('#OrdenDePagoId').val());
        }
        else
            alert('Ingrese el proveedor');

        return false;
    });
});

</script>
{/literal}

<input type="hidden" id="PercepcionId" value="" />

<h2>Percepciones</h2>

<div class="list">
			      
           <div class="listTop">
                <div>
                    <table border="0" cellpadding="0" cellspacing="0">
							<tr>    
                                <td width="10%"><p>Fecha</p> </td>
                                <td width="10%"><p>FC</p> </td>
                                <td width="10%"><p>Importe</p> </td>
                                <td width="10%"><p>Tipo</p> </td>
                                
                                <td width="10%"><p>Acciones</p></td>
                            </tr>
                    </table>
                </div>
            </div> <!-- /listadoTop -->
                        
                    <div class="listItems">
                    	<table border="0" cellpadding="0" cellspacing="0" width="100%">
                        {if !$Percepciones|@count}
                        	<tr class="noResult">
                                <td colspan="10" align="center"><h2 class="noResult">No se ha encontrado ninguna retencion.</h2></td>
                            </tr>
                        {else}
                        
						{foreach from=$Percepciones item="d"}
						    <tr {$className}>
                                <td width="10%">{$d.FechaGrabacion} </td>
                                <td width="10%">{$d.FacturaCompraNumero} </td>
                                <td width="10%">$ {$d.Importe} </td>
                                <td width="10%">{$d.Tipo.Nombre} </td>
                                
                                <td width="10%">
                                	<a class="AgregarPagoPercepcion" pagoid="{$d.Id}"><img src="/images/icons/add.png" title="Agregar pago"/> Agregar percepcion</a>
                                </td>
						    </tr>
						{/foreach}
                        
                        {/if}
                        </table>
                    </div> <!-- /listItems -->
</div><!-- en list -->