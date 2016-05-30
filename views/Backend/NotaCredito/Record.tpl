                    <!-- item -->
                    <tr{$className}>
                        
                        
                        <td width="10%"><a href="/{$varController}/Edit/id/{$record.Id}">{$record.Fecha}</a></td>
                        <td width="10%"><a href="/{$varController}/Edit/id/{$record.Id}">{$record.Numero}</a></td>
                        <td width="10%"><a href="/{$varController}/Edit/id/{$record.Id}">{$record.Cliente.RazonSocial}</a></td>
                        <td width="10%"><a href="/{$varController}/Edit/id/{$record.Id}">{$record.Descripcion}</a></td>
                        <td width="10%"><a href="/{$varController}/Edit/id/{$record.Id}">$ {$record.Importe}</a></td>

                        
                        <td width="6%" align="center">
                            <input type="button" class="btEdit" onclick="location.href = '/{$varController}/Edit/id/{$record.Id}';" title="Editar credito"/>
                            
                            
                        </td>
                    </tr>
                    <!-- /item -->