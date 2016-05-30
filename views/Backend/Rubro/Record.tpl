                    <!-- item -->
                    <tr{$className}>
                        <td width="2%"><input type="checkbox" class="check" name="selectId[]" value="{$record.Id}" /></td>
                        
                        
                        <td width="15%"><a href="/{$varController}/Edit/id/{$record.Id}">{$record.Nombre}</a></td>
                        
                        <td width="10%"><a href="/{$varController}/Edit/id/{$record.Id}">{if $record.TipoEntidad=='CLI'}Cliente{/if}{if $record.TipoEntidad=='PRO'}Proveedor{/if}</a></td>
                       
                        
                        <td width="6%" align="center">
                            <input type="button" class="btEdit" onclick="location.href = '/{$varController}/Edit/id/{$record.Id}';" title="Editar"/>
                            
                        </td>
                    </tr>
                    <!-- /item -->