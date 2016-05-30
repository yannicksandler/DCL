                    <!-- item -->
                    <tr {$className}>
                        <td width="2%"><input type="checkbox" class="check" name="selectId[]" value="{$record.Id}" /></td>
                        <td width="5%"><a href="/{$varController}/Edit/id/{$record.Id}">{$record.Id}</a></td>
                        <td width="10%"><a href="/{$varController}/Edit/id/{$record.Id}">{$record.Producto|escape:'htmlall'}</a></td>
                        <td width="10%"><a href="/{$varController}/Edit/id/{$record.Id}">{$record.Cliente.Nombre|escape:'htmlall'}</a></td>
                        <td width="10%"><a href="/{$varController}/Edit/id/{$record.Id}">{if $record.Estado.Nombre == 'Cobrado'}<span title="Cobrado" class="active" title="Cobrado"></span>{elseif $record.Estado.Nombre == 'Anulado'}<span title="Anulado" class="inactive"></span>{else}{$record.Estado.Nombre}{/if}</a></td>
                        
                        <td width="10%">
                        	{if $record.TotalSinIva}
                        		<a href="/{$varController}/Edit/id/{$record.Id}" title="Precio de venta sin IVA"></a>{$record.TotalSinIva}
                        	{else}
                        		<img src="/images/icons/error.png" title="Asignar precio de venta"/>
                        	{/if}
                        </td>
                        <!-- 
                        <td width="12%">
                        	<a class="VerComentario" id="comentario_{$record.Id}" title="{$record.DescripcionDeTrabajo}">Leer descripcion</a>
                        	
							<div id="dialog_comentario_{$record.Id}" title="Descripcion de la orden de trabajo" style="display:none">
								<p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 40px 40px 0;"></span>
									{$record.DescripcionDeTrabajo}
								</p>
							</div>
                        </td>
                         -->
                        
                        <td width="8%" align="center">
                            <a type="button" class="btEdit VerOrdenDeTrabajo" title="Editar orden de trabajo" href="/{$varController}/Edit/id/{$record.Id}/popup/true" /><img src="/images/icons/bullet_go.png" alt="item" title="Item"/> Editar</a>
                            <br><a type="button" class="btEdit" title="" href="/Facturacion/Facturar/ClienteId/{$record.ClienteId}" /><img src="/images/icons/add.png" alt="item" title="Item"/> Crear factura</a>
                        
                        </td>
                    </tr>
                    <!-- /item -->