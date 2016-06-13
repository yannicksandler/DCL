                    <!-- item -->
                    <tr{$className}>
                        
                        <td width="5%"><a href="/{$varController}/Edit/id/{$record.Id}">{$record.Id}{if $record.EsFicticia == 'SI'}<br></br><img src="/images/icons/bell.png" title="Orden ficticia"/>{/if}</a></td>
                        
                        <td width="10%"><a href="/{$varController}/Edit/id/{$record.Id}">{$record.Producto|escape:'htmlall'}</a></td>
                        
                        <td width="10%"><a href="/{$varController}/Edit/id/{$record.Id}">{$record.Cliente.Nombre|escape:'htmlall'}</a></td>
                        <td width="10%"><a href="/{$varController}/Edit/id/{$record.Id}">{if $record.Estado.Nombre == 'Cobrado'}<span title="Cobrado" class="active" title="Cobrado"></span>{elseif $record.Estado.Nombre == 'Anulado'}<span title="Anulado" class="inactive"></span>{else}{$record.Estado.Nombre}{/if}</a></td>
                        
                        <td width="10%">
                        	{if $record.CostosDeInicioProduccion}
                        		<a href="/{$varController}/Edit/id/{$record.Id}" title="Total de costos al cambiar a estado Produccion"></a>{$record.CostosDeInicioProduccion}
                        	
                        	{/if}
                        </td>
                        <td width="10%">
                        	{if $record.CostoTotal}
                        		<a href="/{$varController}/Edit/id/{$record.Id}" title="Costo de insumos elegidos con orden de compra"><img src="/images/icons/bullet_go.png"/> {$record.CostoTotal}</a>
                        	{else}
                        		<img src="/images/icons/clock_error.png" title="La orden no tiene costos. Asignar insumos y crear ordenes de compra a la orden para generar costos"/>
                        	{/if}
                        	<br>
                        	{if $record.CostoInsumosElegidos}
                        		<a href="/{$varController}/Edit/id/{$record.Id}" title="Costo de insumos elegidos"><img src="/images/icons/bullet_go.png"/> {$record.CostoInsumosElegidos}</a>
                        	{else}
                        		<img src="/images/icons/error.png" title="La orden no tiene insumos elegidos. Asignar insumos y elegirlos"/>
                        	{/if}
                        
                        	
                        </td>
                        <td width="10%">
                        	{if $record.CostosDeInicioProduccion and $record.CostoTotal}
                        		<a href="/{$varController}/Edit/id/{$record.Id}" title="Total de costos al cambiar a estado Produccion"></a>{if ($record.CostoTotal-$record.CostosDeInicioProduccion)>0}<img src="/images/icons/exclamation.png" title="exclamacion"/>{/if} {$record.CostoTotal-$record.CostosDeInicioProduccion}
                        	
                        	{/if}
                        </td>
                        <td width="10%">
                        	{if $record.TotalSinIva}
                        		<a href="/{$varController}/Edit/id/{$record.Id}" title="Precio de venta sin IVA"></a>{$record.TotalSinIva}
                        	{else}
                        		<img src="/images/icons/money_add.png" title="Asignar precio de venta"/>
                        	{/if}
                        </td>
                        <td width="10%"><a href="/{$varController}/Edit/id/{$record.Id}" title="Ganancia"></a>{if ($record.TotalSinIva-$record.CostoTotal)<0}<img src="/images/icons/exclamation.png" title="exclamacion"/>{/if}{$record.TotalSinIva-$record.CostoInsumosElegidos}</td>
                        <td width="10%">
                            {foreach from=$record.Facturas item="fac"}
                                <a href="/{$varController}/Edit/id/{$record.Id}" title="Factura"></a>{$record.FacturaId}</br>
                            {/foreach}

                        </td>
                        
                        <td width="6%" align="center">
                        	<a type="button" class="btEdit VerOrdenDeTrabajo" title="Editar orden de trabajo" href="/{$varController}/Edit/id/{$record.Id}/popup/true" />Editar</a>
                            <input type="button" class="btEdit VerOrdenDeTrabajo" title="Editar orden de trabajo" href="/{$varController}/Edit/id/{$record.Id}/popup/true" />
                            {if $record.PresupuestoId}
                            <br><a title="Ver el formulario del presupuesto" class="Presupuestar" id={$record.Id} presupuesto="{$record.PresupuestoId}"><img src="/images/icons/layout_edit.png" title="Ver presupuesto"/> Ver presupuesto</a>
                            <!-- 
                            <br><a title="Aprobar presupuesto" class="" id={$record.Id} presupuesto="{$record.PresupuestoId}"><img src="/images/icons/error.png" title="Aprobar presupuesto"/> Aprobar presupuesto (hacer)</a>
                             -->
                            {else}
                            <br><a title="Ver el formulario para crear un presupuesto" class="Presupuestar" id={$record.Id} presupuesto="{$record.PresupuestoId}"><img src="/images/icons/money.png" title="Presupuestar"/> Presupuestar</a>
                            {/if}
                            <br></br>
                        </td>
                    </tr>
                    <!-- /item -->