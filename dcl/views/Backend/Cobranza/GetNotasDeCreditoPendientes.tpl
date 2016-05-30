{literal}
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
{/literal}

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
                        {if !$NotasCredito|@count}
                        	<tr class="noResult">
                                <td colspan="10" align="center"><h2 class="noResult">No se ha encontrado ninguna notas de credito.</h2></td>
                            </tr>
                        {else}
                        
						{foreach from=$NotasCredito item="d"}
						    <tr {$className}>
                                <td width="10%">{$d.Fecha} </td>
                                <td width="10%">$ {$d.Importe} </td>
                                <td width="20%">{$d.Descripcion}</td>
                                
                                <td width="10%">
                                	<a class="AgregarPagoNotaCredito" notacreditoid="{$d.Id}"><img src="/images/icons/add.png" title="Agregar pago"/> Agregar</a>
                                </td>
						    </tr>
						{/foreach}
                        
                        {/if}
                        </table>
                    </div> <!-- /listItems -->
</div><!-- en list -->