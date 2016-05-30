{literal}
<script type="text/javascript">
$(document).ready(function(){

});

</script>
{/literal}

<h1>Percepciones pendientes</h1>

<div class="list" style="width:90%">
			      
           <div class="listTop">
                <div>
                    <table border="0" cellpadding="0" cellspacing="0">
							<tr>    
                                <td width="10%"><p>Fecha FC</p> </td>
                                <td width="10%"><p>FC</p> </td>
                                <td width="10%"><p>Proveedor</p> </td>
                                <td width="10%"><p>Importe percepcion</p> </td>
                                <td width="10%"><p>Tipo</p> </td>
                                
                                <td width="10%"><p>Accion</p> </td>
                                
                            </tr>
                    </table>
                </div>
            </div> <!-- /listadoTop -->
                        
                    <div class="listItems listItemsScroll">
                    	<table border="0" cellpadding="0" cellspacing="0" width="100%">
                        {if !$Percepciones|@count}
                        	<tr class="noResult">
                                <td colspan="10" align="center"><h2 class="noResult">No se ha encontrado ning&uacute;na percepcion.</h2></td>
                            </tr>
                        {else}
                        
						{foreach from=$Percepciones item="d"}
						    <tr {$className}>
                                <td width="10%">{$d.FechaGrabacion} </td>
                                <td width="10%">{$d.FacturaCompraNumero} </td>
                                <td width="10%">{$d.Proveedor.Nombre} </td>
                                <td width="10%">$ {$d.Importe} </td>
                                <td width="10%">{$d.Tipo.Nombre} </td>
                                
                                <td width="10%"> </td>
                                
						    </tr>
						{/foreach}
                        
                        {/if}
                        </table>
                    </div> <!-- /listItems -->
</div><!-- en list -->