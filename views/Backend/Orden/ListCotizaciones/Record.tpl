                    <!-- item -->
                    <tr {if $record.FechaFin}bgcolor="#FFCC33" title="La orden tiene fecha de finalizacion y es prioridad"{else}{$className}{/if}>
                        <td width="2%"><input type="checkbox" class="check" name="selectId[]" value="{$record.Id}" /></td>
                        <td width="5%"><a href="/{$varController}/Edit/id/{$record.Id}">{$record.Id}</a></td>
                        <td width="10%"><a href="/{$varController}/Edit/id/{$record.Id}">{$record.Producto|escape:'htmlall'}</a></td>
                        <td width="10%"><a href="/{$varController}/Edit/id/{$record.Id}">{$record.Cliente.Nombre|escape:'htmlall'}</a></td>
                        <td width="10%"><a href="/{$varController}/Edit/id/{$record.Id}">{if $record.Estado.Nombre == 'Cobrado'}<span title="Cobrado" class="active" title="Cobrado"></span>{elseif $record.Estado.Nombre == 'Anulado'}<span title="Anulado" class="inactive"></span>{else}{$record.Estado.Nombre}{/if}</a></td>
                        <td width="10%"><a href="/{$varController}/Edit/id/{$record.Id}" title="{$record.FechaEntrega}">{if $record.DiasProximoCambioEstado}{$record.DiasProximoCambioEstado} dias{else}hoy <img src="/images/icons/exclamation.png" title="exclamacion"/>{/if}</a></td>
                        
                        
                        <td width="10%">
                        <!--  @see Filterbox.tpl para definicion de clase CambiarPrioridad -->
                        	<select title="{if $record.PrioridadComentario}{$record.PrioridadComentario}{else}No tiene comentario{/if}" href="/{$varController}/SetPrioridad/OrdenId/{$record.Id}" class="CambiarPrioridad" id="Prioridad__">
		                        <option value="">Seleccionar</option>
		                        {foreach from=$Prioridades item="p"}
		                        <option value="{$p.Id}" {if $p.Id eq $record.PrioridadId}selected="selected"{/if}>{$p.Nombre}</option>
		                        
		                        {/foreach}
		                    </select>
		                
                        </td>
                        
                        <td width="12%">
                        	<a class="VerComentario" id="comentario_{$record.Id}" title="{$record.DescripcionDeTrabajo}">Leer descripcion</a>
                        	<!-- dialog confirm -->
							<div id="dialog_comentario_{$record.Id}" title="Descripcion de la orden de trabajo" style="display:none">
								<p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 40px 40px 0;"></span>
									{$record.DescripcionDeTrabajo|nl2br}
								</p>
							</div>
                        </td>
                        
                        <td width="8%" align="center">
                            
                            <a type="button" class="btEdit VerOrdenDeTrabajo" title="Editar orden de trabajo" href="/{$varController}/Edit/id/{$record.Id}/popup/true" /><img src="/images/icons/layout_edit.png" title="Ver presupuesto"/> Editar OT</a>
                            
                        </td>
                    </tr>
                    <!-- /item -->