                    <!-- item -->
                    <tr{$className}>
                        
                        
                        <td width="10%"><a class="AbrirPopup" href="/{$varController}/Edit/id/{$record.Id}">{$record.Fecha}</a></td>
                        <td width="10%"><a class="AbrirPopup" href="/{$varController}/Edit/id/{$record.Id}">{if $record.Numero}{$record.Numero}{else}{$record.Id}{/if} ({$record.Tipo})</a></td>
                        <td width="10%"><a class="AbrirPopup" href="/{$varController}/Edit/id/{$record.Id}">{$record.Importe}</a></td>
                        <td width="20%"><a class="AbrirPopup" href="/{$varController}/Edit/id/{$record.Id}">{$record.Cliente.Nombre}</a></td>
                        
                        <td width="5%" align="center">
                                                      
                            <a class="EditarOrdenDePago" href="/NotaDebito/Edit/id/{$record.Id}"><img src="/images/icons/layout_edit.png" title="Editar"/></a>
                            
                            
                        </td>
                    </tr>
                    <!-- /item -->