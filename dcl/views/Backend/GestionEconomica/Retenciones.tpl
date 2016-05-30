{literal}
<script type="text/javascript">
$(document).ready(function(){
	$(".ajax").colorbox();
});

</script>
{/literal}

<h1>Retenciones pendientes</h1>

<div class="list" style="width:90%">
			      
           <div class="listTop">
                <div>
                    <table border="0" cellpadding="0" cellspacing="0">
							<tr>
							{if $OcultarAccion}
								<td width="10%"><p>Fecha CO</p> </td>
                                <td width="10%"><p>Cobranza</p> </td>
                                <td width="10%"><p>Cliente</p> </td>
                            {/if}
                                <td width="10%"><p>Total</p> </td>    
                                <td width="10%"><p>Detalle</p> </td>
                                
                                
                                <td width="10%"><p>Accion</p> </td>
                                
                            </tr>
                    </table>
                </div>
            </div> <!-- /listadoTop -->
                    
                    <div class="listItems listItemsScroll">
                    	<table border="0" cellpadding="0" cellspacing="0" width="100%">
                        {if !$Retenciones|@count}
                        	<tr class="noResult">
                                <td colspan="10" align="center"><h2 class="noResult">No se ha encontrado ning&uacute;na retencion.</h2></td>
                            </tr>
                        {else}
                        
						{foreach from=$Retenciones item="d"}
						    <tr {$className}>
						    {if $OcultarAccion}
						    	<td width="10%">{$d.FechaCobranza} </td>
                                <td width="10%">{$d.Cobranza.Numero} </td>
                                <td width="10%">{$d.Cliente.Nombre} </td>
                            {/if}
                                <td width="10%">$ {$d.Importe} </td>
                                <td width="10%">{$d.PagoTipoNombre} </td>
                                
                                
                                <td width="10%"> 
                                {if !$OcultarAccion}
                                	<a class="ajax" id=""
								    href="/GestionEconomica/Retenciones/TipoRetencion/{$d.PagoTipoId}"
								    ><img src="/images/icons/zoom_in.png" title="Ver detalle"/> Detalle </a>
                                </td>
                                {/if}
                                
						    </tr>
						{/foreach}
                        
                        {/if}
                        </table>
                    </div> <!-- /listItems -->
</div><!-- en list -->