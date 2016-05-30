                    <!-- item -->
                    <tr{$className}>
                        
                        <td width="5%"><a class="VerFactura" id="{$record.Id}" >{$record.Id}</a></td>
                        <td width="10%"><a class="VerFactura" id="{$record.Id}" >{$record.Fecha}</a></td>
                        <td width="15%"><a class="VerFactura" id="{$record.Id}" >{$record.Cliente.Nombre}</a></td>
                        <td width="10%"><a class="VerFactura" id="{$record.Id}" >$ {$record.Importe}</a></td>
                        <td width="10%"><a class="VerFactura" id="{$record.Id}" >$ {$record.ImportePendienteDeCobro}</a></td>
                        
                        
                        <td width="15%">
                        
							
							{if $record.CobranzaLiquidaciones|@count}
							
							{foreach from=$record.CobranzaLiquidaciones item="cob"}
							<p>
								<a  href="/Cobranza/Edit/id/{$cob.CobranzaId}">
								<img src="/images/icons/bullet_go.png" alt="item" title="Item"/>
										Ver Cobranza #{$cob.CobranzaId}<br>Importe: $ {$cob.Importe} {if $cob.Cobranza.FechaAnulacion}<img src="/images/icons/delete.png" title="Cobranza anulada"/>{/if}
								</a>
							</p>
							{/foreach}
								<br>
							{else}
								<a title="Crear cobranza" href="/Cobranza/Edit/ClienteId/{$record.ClienteId}">
										<img src="/images/icons/error.png" title="Agregar orden de pago"/> 
										Tiene importe pendiente
								</a>
							{/if}
							
						</td>
                        
                        <td width="10%"><a class="VerFactura" id="{$record.Id}" >{$record.TipoIva.Letra_comp}</a></td>
                        <td width="8%">
                        
                            <p class="AbrirPopup" href="/{$varController}/Edit/id/{$record.Id}">{if $record.FechaAnulacion}<img src="/images/icons/delete.png" title="Orden de compra anulada el dia {$record.FechaAnulacion}"/> Anulada{else}<img src="/images/icons/tick.png" title="ok"/> Vigente{/if}</p>
                            
                        </td>
                                                
                        <td width="15%" align="center">
                        	<br>&raquo; <a class="VerFactura" id="{$record.Id}" >Ver factura</a>
                        	{if !$record.FechaAnulacion}
                        	<br>&raquo; <a href="/Orden/ListVentas/FacturaId/{$record.Id}">Ver ordenes incluidas</a>
                        	{/if}
                        	
                        	{if (!$record.FechaAnulacion)}
                        	<!-- no se permite anular factura que tenga cobranzas -->
                        	{if !$record.TieneCobranzasVigentes}
                        	<br>&raquo; <a class="AnularFactura" href="/Facturacion/Anular/FacturaId/{$record.Id}">Anular</a>
                        	{/if}
                        	{/if}
                        	
                        	{if (!$record.FechaAnulacion) && ($record.ImportePendienteDeCobro > 0)}
                        	<br>&raquo; <a class="CrearCobranza_" href="/Cobranza/Edit/ClienteId/{$record.ClienteId}">Cobrar</a>
							{/if}
							
                        </td>
                    </tr>
                    <!-- /item -->