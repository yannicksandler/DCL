                    <!-- item -->
                    <tr{$className}>
                        <td width="2%"><input type="checkbox" class="check" name="selectId[]" value="{$record.Id}" /></td>
                        <td width="15%"><a href="/{$varController}/Edit/id/{$record.Id}">{$record.Nombre}</a></td>
                        <td width="10%"><a href="/{$varController}/Edit/id/{$record.Id}">{$record.Rubro.Nombre}</a></td>
                        <td width="12%"><a href="/{$varController}/Edit/id/{$record.Id}">{$record.Localidad}</a></td>
                        <td width="15%"><a href="/{$varController}/Edit/id/{$record.Id}">{$record.Direccion}</a></td>
                        <td width="10%"><a href="/{$varController}/Edit/id/{$record.Id}">{$record.CodigoPostal}</a></td>
                        <td width="10%"><a href="/{$varController}/Edit/id/{$record.Id}">{$record.Telefono}</a></td>
                        <td width="10%"><a href="/{$varController}/Edit/id/{$record.Id}">{$record.Fax}</a></td>
                        
                        <td width="6%" align="center">
                            <input type="button" class="btEdit" onclick="location.href = '/{$varController}/Edit/id/{$record.Id}';" />
                            
                        </td>
                    </tr>
                    <!-- /item -->