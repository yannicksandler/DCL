                    <!-- item -->
                    <tr{$className}>
                        <!--<td width="2%"><input type="checkbox" class="check" name="selectId[]" value="{$record.Id}" /></td>-->
                        
                        <td width="5%">{if $record.OrdenDeCompraId}<a title="Ver orden" class="hasOrdenCompra" id="{$record.Id}" OrdenCompraId="{$record.OrdenDeCompraId}" href="#">{$record.OrdenId}</a>{else}<p>{$record.OrdenId}</p>{/if}</td>
                        
                        <td width="10%">{if $record.OrdenDeCompraId}<a title="Ver orden" class="hasOrdenCompra" id="{$record.Id}" OrdenCompraId="{$record.OrdenDeCompraId}" href="#">{$record.Nombre}</a>{else}<p>{$record.Nombre}</p>{/if}</td>
                        <td width="10%">
                        	<p>{$record.Proveedor.Nombre}<br>
                        	{if $record.Proveedor.Telefono}Tel: {$record.Proveedor.Telefono}{/if}
                        	{if $record.Proveedor.PersonaEmail}
                        	<a href="mailto:{$record.Proveedor.PersonaEmail}" title="Hacer click para enviar email"><img src="/images/icons/email_add.png" title="email"/> {$record.Proveedor.PersonaEmail}</a>
                        	{/if}
                        	</p>
                        </td>
                        <td width="8%">{if $record.OrdenDeCompraId}<a title="Ver orden" class="hasOrdenCompra" id="{$record.Id}" OrdenCompraId="{$record.OrdenDeCompraId}" href="#">{$record.Orden.Estado.Nombre}</a>{else}<p>{$record.Orden.Estado.Nombre}</p>{/if}</td>
                        <td width="10%">{if $record.OrdenDeCompraId}<a title="Ver orden" class="hasOrdenCompra" id="{$record.Id}" OrdenCompraId="{$record.OrdenDeCompraId}" href="#">{$record.Orden.Cliente.RazonSocial}</a>{else}<p>{$record.Orden.Cliente.RazonSocial}</p>{/if}</td>
                        
                        <td width="8%"><p>{if $record.DiasRestantesEntrega}{$record.DiasRestantesEntrega}{else}<img src="/images/icons/error.png" title="Ingrese dias de entrega en el insumo"/>{/if}</p></td>
                        
                        <td width="8%"><p>{if $record.DiasParaFinalizar}{$record.DiasParaFinalizar} dias{else}Ingresar fecha <img src="/images/icons/exclamation.png" title="exclamacion"/>{/if}</p></td>
                        
                        
                        <td width="10%">{if $record.OrdenDeCompraId}<a title="Ver orden" class="hasOrdenCompra" id="{$record.Id}" OrdenCompraId="{$record.OrdenDeCompraId}" href="#">$ {$record.Cantidad*$record.PrecioUnitarioSinIVA}</a>{else}<p>$ {$record.Cantidad*$record.PrecioUnitarioSinIVA}</p>{/if}</td>
                        

                        <td width="10%" align="center">
                                <br></br>                      
                            <a title="Ver orden de compra" class="hasOrdenCompra" id="{$record.Id}" OrdenCompraId="{$record.OrdenDeCompraId}" href="#"><img src="/images/icons/layout_edit.png" title="Editar"/> Ver orden de compra</a>
                            
                            <br><a title="Ver orden de trabajo" class="VerOrdenDeTrabajo" href="/Orden/Edit/id/{$record.OrdenId}"><img src="/images/icons/layout_edit.png" title="Editar"/> Ver orden de trabajo</a>
                            
                            <br><a title="Marcar Insumo como entregado" class="InsumoEntregado" href="/Insumo/SetEntregado/Produccion/true/id/{$record.Id}"><img src="/images/icons/add.png" title="Editar"/> Entregado</a>
                            
                            <br><img src="/images/icons/layout_edit.png" title="Editar"/> <a href="#" 
                                            onclick="window.open(	'/Insumo/Edit/Orden/{$record.OrdenId}/id/{$record.Id}', 
                                                    'windowname1', 
                                                    'width=980, height=700, scrollbars = yes'); 
                                                    return false;">
                                            Editar insumo&nbsp;	
                                        </a>
                            <br></br>
                        </td>
                        
                            
                            
                        </td>
                    </tr>
                    <!-- /item -->