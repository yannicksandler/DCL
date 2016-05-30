                    <!-- item -->
                    <tr{$className}>
                        
                        <td width="10%"><a class="VerFactura" id="" >{$record.NumeroInterno}</a></td>
                        <td width="10%"><a class="VerFactura" id="" >{$record.Numero}</a></td>
                        <td width="10%"><a class="VerFactura" id="" >{$record.Fecha}</a></td>
                        <td width="10%"><a class="VerFactura" id="" >{$record.Proveedor.Nombre}</a></td>
                        <td width="10%"><a class="VerFactura" id="" >$ {if $record.Importe}{$record.Importe}{else}{$record.ImporteTotal}{/if}</a></td>
                        <td width="10%"><a class="VerFactura" id="" >$ {$record.ImportePendienteDePago}</a></td>
                        
                        <td width="10%"><a class="VerFactura" id="" >{$record.TipoIva.Letra_comp}</a></td>
                        
                        <td width="20%"><a class="VerFactura" id="" >
                        	{if $record.Liquidacion|@count}
                        		{foreach from=$record.Liquidacion item="liq"}
									<p>{$liq.TextDescripcionOrdenDeCompra}</p><br>
								{/foreach}
							{else}
								<p>No existen ordenes de compra liquidadas</p>
							{/if}
										</a>
						</td>
                                                
                        <td width="10%" align="center">
                        	
                        	<div id="_FacturaCompra_Anular_FacturaNumero_{$record.Numero}_ProveedorId_{$record.ProveedorId}_TipoIvaId_{$record.TipoIvaId}">
	                        	{if (!$record.FechaAnulacion)}
	                        	<br><a class="PagarFactura" href="/OrdenPago/Edit/FacturaNumero/{$record.Numero}/ProveedorId/{$record.ProveedorId}/TipoIvaId/{$record.TipoIvaId}"><img src="/images/icons/pagos.png" width="32px" title=""/> Pagar</a>
								{/if}
								
								{if (!$record.FechaAnulacion)}
	                        	<br><a class="" href="/FacturaCompra/Edit/FacturaNumero/{$record.Numero}/ProveedorId/{$record.ProveedorId}/TipoIvaId/{$record.TipoIvaId}"><img src="/images/icons/bullet_go.png" title=""/> Ver</a>
								{else}
								<br><a><img src="/images/icons/delete.png" title="Factura anulada"/> Anulada</a>
								{/if}
								
	                        	{if (!$record.FechaAnulacion)}
	                        	<br><a class="AnularFactura" href="/FacturaCompra/Anular/FacturaNumero/{$record.Numero}/ProveedorId/{$record.ProveedorId}/TipoIvaId/{$record.TipoIvaId}"><img src="/images/icons/delete.png" title=""/> Anular</a>
	                        	{/if}
							</div>
                        </td>
                    </tr>
                    <!-- /item -->