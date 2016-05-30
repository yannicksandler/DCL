                    <!-- item -->
                    <tr{$className}>
                        <td width="2%"><input type="checkbox" class="check" name="selectId[]" value="{$record.Id}" /></td>
                        
                        <td width="10%"><a href="/{$varController}/Edit/id/{$record.Id}">{$record.Codigo}</a></td>
                        <td width="10%"><a href="/{$varController}/Edit/id/{$record.Id}">{$record.Nombre|escape:'htmlall'}</a></td>
                        <td width="10%"><a href="/{$varController}/Edit/id/{$record.Id}">{if $record.TipoBanco=='P'}Propio{/if}{if $record.TipoBanco=='T'}Tercero{/if}</a></td>

                        
                        <td width="6%" align="center">
                            <input type="button" class="btEdit" onclick="location.href = '/{$varController}/EditBanco/id/{$record.Id}';" />
                            
                        </td>
                    </tr>
                    <!-- /item -->