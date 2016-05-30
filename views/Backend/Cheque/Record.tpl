                    <!-- item -->
                    <tr{$className}>
                    <!-- 
                        <td width="2%"><input type="checkbox" class="check" name="selectId[]" value="{$record.Id}" /></td>
                         -->
                        
                        <td width="10%"><p href="/{$varController}/Edit/id/{$record.Id}">{$record.NombreBanco}</p></td>
                        
                        <td width="10%"><p href="/{$varController}/Edit/id/{$record.Id}">{$record.Numero} ({$record.Tipo})</p></td>
                        
                        <td width="10%"><p href="/{$varController}/Edit/id/{$record.Id}">{$record.Importe}</p></td>
                        
                        <td width="10%"><p href="/{$varController}/Edit/id/{$record.Id}">{$record.Estado}</p></td>
                        
                        <td width="10%"><p href="/{$varController}/Edit/id/{$record.Id}">{$record.FechaEmision}</p></td>
                        <td width="10%"><p href="/{$varController}/Edit/id/{$record.Id}">{$record.FechaCobro}</p></td>
                        <td width="10%"><p href="/{$varController}/Edit/id/{$record.Id}">{$record.FechaVencimiento}</p></td>
                        
                        <td width="10%"><p href="/{$varController}/Edit/id/{$record.Id}">{$record.Cliente.Nombre}</p></td>
                        <td width="10%"><p href="/{$varController}/Edit/id/{$record.Id}">{$record.Proveedor.Nombre}</p></td>
                       
                        
                        <td width="6%" align="center">
	                        {if $record.PuedeAnularse}
	                        <td width="10%"><a class="anular" href="/{$varController}/Anular/id/{$record.Id}"><img src="/images/icons/error_delete.png" alt="item" title="Anular"/></a></td>
	                        {/if}
                        <!-- 
                            <input type="button" class="btEdit" onclick="location.href = '/{$varController}/Edit/id/{$record.Id}';" title="Editar"/>
                             -->
                        </td>
                    </tr>
                    <!-- /item -->