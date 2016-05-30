                    <!-- item -->
                    <tr{$className}>
                        <td width="2%"><input type="checkbox" class="check" name="selectId[]" value="{$record.Id}" /></td>
                        <td width="5%"><a href="/{$varController}/Edit/id/{$record.Id}">{$record.Id}</a></td>
                        <td width="10%"><a href="/{$varController}/Edit/id/{$record.Id}">{$record.Producto|escape:'htmlall'}</a></td>
                        <td width="10%"><a href="/{$varController}/Edit/id/{$record.Id}">{$record.Cliente.Nombre|escape:'htmlall'}</a></td>
                        <td width="10%"><a href="/{$varController}/Edit/id/{$record.Id}">{if $record.Estado.Nombre == 'Cobrado'}<span title="Cobrado" class="active" title="Cobrado"></span>{elseif $record.Estado.Nombre == 'Anulado'}<span title="Anulado" class="inactive"></span>{else}{$record.Estado.Nombre}{/if}</a></td>
                        <td width="10%"><a href="/{$varController}/Edit/id/{$record.Id}" title="{$record.FechaEntrega}">{if $record.DiasProximoCambioEstado}{$record.DiasProximoCambioEstado} dias{else}hoy <img src="/images/icons/exclamation.png" title="exclamacion"/>{/if}</a></td>
                        <td width="8%"><a href="/{$varController}/Edit/id/{$record.Id}" title="{$record.FechaFin}">{if $record.DiasParaFinalizar}{$record.DiasParaFinalizar} dias{else}hoy <img src="/images/icons/exclamation.png" title="exclamacion"/>{/if}</a></td>
                        
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
                        	<a class="Descripcion" title="{$record.DescripcionDeTrabajo}" href="/{$varController}/Edit/id/{$record.Id}">{$record.DescripcionDeTrabajo|escape:'htmlall'}</a>
                        </td>
                        
                        <td width="8%" align="center">
                            <input type="button" class="btEdit" title="Editar orden de trabajo" onclick="location.href = '/{$varController}/Edit/id/{$record.Id}';" />
                            
                        </td>
                    </tr>
                    <!-- /item -->