                    <!-- item -->
                    <tr{$className}>
                        
                        
                        <td width="10%"><a class="AbrirPopup" href="/{$varController}/Edit/id/{$record.Id}">{$record.Fecha}</a></td>
                        <td width="10%"><a class="AbrirPopup" href="/{$varController}/Edit/id/{$record.Id}">{if $record.Numero}{$record.Numero}{else}{$record.Id}{/if} ({$record.TipoDePago})</a></td>
                        <td width="10%"><a class="AbrirPopup" href="/{$varController}/Edit/id/{$record.Id}">{if $record.TotalPagos}{$record.TotalPagos}{else}<img src="/images/icons/error.png" title="Debe ingresar pagos a la orden"/>{/if}</a></td>
                        <td width="20%"><a class="AbrirPopup" href="/{$varController}/Edit/id/{$record.Id}">{$record.Proveedor.Nombre}</a></td>
                        <td width="15%">
                        
                        	<p>{$record.TextDetalleLiquidacionHtmlConLinkPopUp}</p>
                        </td>
                        <td width="10%" align="center">
                        
                        	{if $record.FechaAnulacion}
                        		<img src="/images/icons/delete.png" title="Orden de compra anulada el dia {$record.FechaAnulacion}"/> Anulada
							{else}
								<img src="/images/icons/tick.png" title="ok"/> Vigente
							{/if}
                        </td>
                        <td width="5%" align="center">
                                                      
                            <a class="EditarOrdenDePago" href="/OrdenPago/Edit/id/{$record.Id}"><img src="/images/icons/layout_edit.png" title="Editar"/></a>
                            
                            {if (!$record.FechaAnulacion)}
	                        	<br><a class="Anular" href="/OrdenPago/Anular/OrdenDePagoId/{$record.Id}"><img src="/images/icons/delete.png" title=""/> Anular</a>
	                        {/if}
                            
                        </td>
                    </tr>
                    <!-- /item -->