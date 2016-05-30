                    <!-- item -->
                    <tr{$className}>
                        
                        <td width="10%"><a class="AbrirPopup" href="/{$varController}/Edit/id/{$record.Id}">{$record.Fecha}</a></td>
                        <td width="10%"><a class="AbrirPopup" href="/{$varController}/Edit/id/{$record.Id}" title="{$record.FechaEntregaInsumo}">{$record.Id} <br>({$record.Entregado})</a></td>
                        <td width="10%"><a class="AbrirPopup" href="/{$varController}/Edit/id/{$record.Id}">{$record.OrdenDeTrabajo.Id}</a></td>
                        <td width="20%">
                        	<a class="AbrirPopup" href="/{$varController}/Edit/id/{$record.Id}">{$record.NombreProveedor}</a>
                        </td>
                        <td width="10%"><a class="AbrirPopup" href="/{$varController}/Edit/id/{$record.Id}">$ {$record.Importe}</a></td>
                        <td width="10%"><a class="AbrirPopup" href="/{$varController}/Edit/id/{$record.Id}">$ {$record.TotalValidadoEnFacturaCompra}<br>{if $record.ImporteCompensatorio}(Comp. $ {$record.ImporteCompensatorio}){/if}</a></td>
                        <td width="10%">
                        	<a class="AbrirPopup" href="/{$varController}/Edit/id/{$record.Id}">{if $record.FechaAnulacion}<img src="/images/icons/delete.png" title="Orden de compra anulada el dia {$record.FechaAnulacion}"/> Anulada{else}<img src="/images/icons/tick.png" title="ok"/> Vigente{/if}</a>
                        </td>
                        <td width="10%">
                        
                        	<a class="" href="/OrdenPago/Edit/id/{$record.OrdenDePagoId}/ProveedorId/{$record.ProveedorId}">{if $record.OrdenDePagoId}&raquo; Orden de pago: {$record.OrdenDePagoId}{/if}</a>
                        	
                            
                            {if $record.OrdenDePagoOrdenDeCompra|@count}
								{foreach from=$record.OrdenDePagoOrdenDeCompra item="opoc"}
					
											<table border="0" cellpadding="0" cellspacing="0">
													<tr>    
						                                <td><p><a href="/OrdenPago/Edit/id/{$opoc.OrdenDePagoId}//ProveedorId/{$record.ProveedorId}">&raquo; Orden de pago: {$opoc.OrdenDePagoId} (Importe: $ {$opoc.ImporteAbonado})</a></p>
						                                </td>            
						                            </tr>
						                    </table>
								{/foreach}
							{else}
                            	sin orden de pago
							{/if}
                        </td>
                        
                        
                        <td width="10%" align="center">
                            &raquo; <a class="AbrirPopup" href="/{$varController}/Edit/id/{$record.Id}">Ver Orden de compra</a>
                            <!-- 
                            <br> <a class="CrearOrdenDePago_" href="/OrdenPago/Edit/ProveedorId/{$record.ProveedorId}"><img src="/images/icons/add.png" title="Agregar"/> Crear Orden de pago</a>
                             -->
                            <!-- 
                            <br> <a class="CrearOrdenDePago_" href="/FacturaCompra/Edit/ProveedorId/{$record.ProveedorId}"><img src="/images/icons/add.png" title="Agregar"/> Crear Factura de compra</a>
							 -->
                            
                        	<br><a class="VerOrdenDeTrabajo" href="/Orden/Edit/id/{foreach from=$record.Insumo item="i"}{$i.OrdenId}{/foreach}">&raquo; Ver Orden de trabajo</a>
                        	<br></br>
                        </td>
                    </tr>
                    <!-- /item -->