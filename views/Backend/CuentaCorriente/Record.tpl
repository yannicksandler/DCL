                    <!-- item -->
                    <tr{$className}>
                        
                        <td width="10%"><p href="/{$varController}/Edit/id/{$record.Id}">{$record.Fecha}</p></td>
                        {if !$BancoId}
                        <td width="10%"><a class="popup" href="{$record.Link}">{$record.Id}</a></td>
                        {/if}
                        <td width="40%"><p>
                        					{if $record.Items|@count}
                        					{foreach from=$record.Items item="link"}
                        					<!-- 
					                        <a class="popup" href="{$link}"><img src="/images/icons/add.png" title="Ver"/></a>
					                        {/foreach}
					                         -->
					                         {$link}
					                         {else}
					                         {$record.Detalle}
					                        {/if}
                        				</p></td>
                        
                        <td width="10%"><p href="/{$varController}/Edit/id/{$record.Id}">{if $record.Debe>0}$ {$record.Debe}{/if}</p></td>
                        <td width="10%"><p href="/{$varController}/Edit/id/{$record.Id}">{if $record.Haber>0}$ {$record.Haber}{/if}</p></td>
                        <td width="10%"><p href="/{$varController}/Edit/id/{$record.Id}">$ {$record.Saldo}</p></td>
                        
                        {if $BancoId and $IsPerfilAdministrador}
                        <td width="10%"><a class="anular" href="/{$varController}/ListBanco/BancoId/{$record.BancoId}/accion/anular/id/{$record.Id}"><img src="/images/icons/error_delete.png" alt="item" title="Anular"/></a></td>
                        {/if}
                        
                        
                    </tr>
                    <!-- /item -->