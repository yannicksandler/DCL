                    <!-- item -->
                    <tr{$className}>
                        
                        
                        
                        <td width="15%" align="center">{if $record.OrdenDeCompraId}<a title="Ver orden" class="hasOrdenCompra" id="{$record.Id}" OrdenCompraId="{$record.OrdenDeCompraId}" href="#">{$record.Nombre}</a>{else}<p>{$record.Nombre}</p>{/if}</td>
                        <td width="10%"><p>{$record.Total}</p></td>
                        <td width="10%"><p>Forma de pago: {if $record.FormaDePago}{$record.FormaDePago}{else}<img src="/images/icons/error.png" title="Debe ingresar la forma de pago al insumo"/>{/if} <br>({$record.CondicionDePago})</p></td>
                        <td width="10%">{if $record.OrdenDeCompraId}<a title="Ver orden" class="hasOrdenCompra" id="{$record.Id}" OrdenCompraId="{$record.OrdenDeCompraId}" href="#">{$record.Proveedor.Nombre}</a>{else}<p>{$record.Proveedor.Nombre}</p>{/if}</td>
                        
                        <td width="10%">{if $record.OrdenDeCompraId}<a title="Ver orden" class="hasOrdenCompra" id="{$record.Id}" OrdenCompraId="{$record.OrdenDeCompraId}" href="#">{$record.OrdenId}</a>{else}<p>{$record.OrdenId}</p>{/if}</td>
                        
                        <td width="10%">{if $record.OrdenDeCompraId}<a title="Ver orden" class="hasOrdenCompra" id="{$record.Id}" OrdenCompraId="{$record.OrdenDeCompraId}" href="#">{$record.Orden.Cliente.RazonSocial}</a>{else}<p>{$record.Orden.Cliente.RazonSocial}</p>{/if}</td>
                        
                        

                        <td width="10%" align="center">
                            
                            <a title="Ver orden de trabajo" class="VerOrdenDeTrabajo" href="/Orden/Edit/id/{$record.OrdenId}"><img src="/images/icons/layout_edit.png" title="Editar"/> Ver orden de trabajo</a>
                            
                        </td>
                        
                            
                            
                        </td>
                    </tr>
                    <!-- /item -->