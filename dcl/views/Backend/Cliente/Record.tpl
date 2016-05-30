                    <!-- item -->
                    <tr{$className}>
                        <td width="2%"><input type="checkbox" class="check" name="selectId[]" value="{$record.Id}" /></td>
                        
                        <td width="10%"><a href="/{$varController}/Edit/id/{$record.Id}">{$record.Id}</a></td>
                        <td width="10%"><a href="/{$varController}/Edit/id/{$record.Id}">{$record.Nombre|escape:'htmlall'}</a></td>
                        <td width="10%"><a href="/{$varController}/Edit/id/{$record.Id}">{$record.Localidad|escape:'htmlall'}</a></td>
                        <td width="10%"><a href="/{$varController}/Edit/id/{$record.Id}">{$record.Direccion|escape:'htmlall'}</a></td>
                        <td width="10%"><a href="/{$varController}/Edit/id/{$record.Id}">{$record.CodigoPostal}</a></td>
                        <td width="10%"><a href="/{$varController}/Edit/id/{$record.Id}">{$record.Telefono}</a></td>
                        <td width="10%"><a href="/{$varController}/Edit/id/{$record.Id}">{$record.Fax}</a></td>

                        
                        <td width="6%" align="center">
                            <input type="button" class="btEdit" onclick="location.href = '/{$varController}/Edit/id/{$record.Id}';" />
                            
                        </td>
                    </tr>
                    <!-- /item -->