                    <!-- item -->
                    <tr{$className}>
                        
                        
                        <td width="10%"><a class="AbrirPopup" href="/{$varController}/Edit/id/{$record.Id}">{$record.Fecha}</a></td>
                        <td width="10%"><a class="AbrirPopup" href="/{$varController}/Edit/id/{$record.Id}">{if $record.Numero}{$record.Numero}{else}{$record.Id}{/if} ({$record.Tipo})</a></td>
                        <td width="10%"><a class="AbrirPopup" href="/{$varController}/Edit/id/{$record.Id}">{if $record.ImportePagado}$ {$record.ImportePagado}{else}<img src="/images/icons/error.png" title="Debe ingresar pagos a la orden"/>{/if}</a></td>
                        <td width="20%"><a class="AbrirPopup" href="/{$varController}/Edit/id/{$record.Id}">{$record.Cliente.Nombre}</a></td>
                        <td width="15%">
                        
                        	{if $record.CobranzaLiquidaciones|@count}
                                {foreach from=$record.CobranzaLiquidaciones item="li"}
					
											<table border="0" cellpadding="0" cellspacing="0">
													<tr>    
						                                <td><p>&raquo; Factura: {$li.FacturaId} - Importe: $ {$li.Importe}</p>
						                                </td>            
						                            </tr>
						                    </table>
								{/foreach}
                            {else}        
                                <span title="No tiene liquidaciones asociadas" class="inactive"></span>
                            {/if} 
                        </td>
                        <td width="5%" align="center">
                        	{if $record.FechaAnulacion}
                            <img src="/images/icons/delete.png" alt="item" title="La factura fue anulada. {$record.MotivoAnulacion}" />
                            {else}                            
                            <img src="/images/icons/tick.png" alt="item" title="factura activa" />
							{/if}
                        </td>
                        <td width="5%" align="center">
                                                      
                            <a class="EditarOrdenDePago" href="/Cobranza/Edit/id/{$record.Id}"><img src="/images/icons/layout_edit.png" title="Editar"/></a>
                            
                            {if !$record.FechaAnulacion}
                            <br>&raquo; <a class="Anular" href="/Cobranza/Anular/CobranzaId/{$record.Id}">Anular</a>
                            {/if}
                        </td>
                    </tr>
                    <!-- /item -->