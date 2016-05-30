{if $OrdenId}

{literal}
<script type="text/javascript">
$(document).ready(function(){

	$('.AnularOrdenDeCompra').click(function(){
        
        var url	=   $(this).attr("href");

        AnularOrdenDeCompra(url);
        
		return false;
    });

	$('.InsumoEntregado').click(function() {
	    
	    var href 		= $(this).attr('href');
	    var insumoid 		= $(this).attr('id');
	    
	   	r	=	confirm('Esta seguro que quiere marcar el insumo como entregado? (Pasara a ser visto por Contaduria para pagar)');

		if(r && href)
		{
			var id = '#'+insumoid;
	    	$.ajax({
	    		type: "POST",
	    		url: href,
	    		dataType: "text/html",
	    		success: function(html){
	    			$(id).html(html);
	    		},
	    	 	error: function(request,error){
	    			$(id).html('<p class="error"><img src="/images/icons/error_delete.png" title="Error"/>Error al borrar la orden de compra. Intente nuevamente</p>');
	    	 	  }
	    	});
		}
		return false;
	});
	
});

function AnularOrdenDeCompra(url)
{
	r	=	confirm('Esta seguro que quiere anular la orden de compra? (impacta en costos y el insumo pasa a estar NO elegido). En caso de tener una factura de compra asociada la anulara');

	if(r && url)
	{
    	$.ajax({
    		type: "POST",
    		url: url,
    		dataType: "text/html",
    		success: function(html){
    			$('#Message').html(html);
    		},
    	 	error: function(request,error){
    			$('#Message').html('<p class="error"><img src="/images/icons/error_delete.png" title="Error"/>Error al borrar la orden de compra. Intente nuevamente</p>');
    	 	  }
    	});
	}

}

function abrirPopUp(pagina, opciones)
{
	window.open(pagina,"",opciones);
}


</script>
{/literal}


<!-- insumos -->

{if $deleteErrorMessage}<p class="error">{$deleteErrorMessage}</p>{/if}
{if $successMessage}<p class="success">{$successMessage}</p>{/if}
<div id="Message"></div>

<div id="insumosCargados"> <!-- insumos -->

<h1>Insumos<br></br></h1>

	<div class="list">
		<label class="blue" >Insumos varios</label>
                    <p>
						{if $OrdenId}
						<a href="#" 
						   onclick="window.open(	'/Insumo/Edit/Orden/{$OrdenId}', 
													'windowname1', 
													'width=980, height=700, scrollbars = yes'); 
													return false;">
						   &raquo; Agregar insumo <img src="/images/icons/add.png" title="Agregar"/>
						</a>
						
						{/if}
                    </p><br></br><br></br>
                    
           <div class="listTop">
                <div>
                    <table border="0" cellpadding="0" cellspacing="0">
							<tr>    
                                
                                <td width="10%"><p>Nombre</p> </td>
                                <td width="10%"><p>Proveedor</p> </td>
                                <!--  -->
                                <td width="10%"><p>PU s/IVA</p> </td>
                                <td width="10%"><p>Cantidad</p> </td>
                                <td width="10%"><p>Total s/IVA</p> </td>
                                <td width="10%"><p>Cond. pago</p> </td>
                                <td width="10%"><p>Elegido</p> </td>
                                <td width="10%"><p>Tiene OC</p> </td>
                                
                                <td width="20%"><p>Opciones</p></td>
                            </tr>
                    </table>
                </div>
            </div> <!-- /listadoTop -->
                        
                    <div class="listItems">
                        {if !$Insumos|@count}
                        	<tr class="noResult">
                                <td colspan="10" align="center"><h2 class="noResult">No se ha encontrado ning&uacute;n insumo.</h2></td>
                            </tr>
                        {else}
                        <table border="0" cellpadding="0" cellspacing="0" width="100%">
						{foreach from=$Insumos item="d"}
						    <tr {$className}>
                                <td width="10%">{$d.Nombre}</td>
                                <td width="10%">{$d.Proveedor.Nombre|escape:'htmlall'}</td>
                                <td width="10%">{$d.PrecioUnitarioSinIVA} 
                                
                                				{if $d.OrdenDeCompraId}
													<br>{if $d.OrdenDeCompra.ImporteCompensatorio}(Comp. $ {$d.OrdenDeCompra.ImporteCompensatorioSinIVA}){/if}
												{/if}
                                
                                </td>
                                <td width="10%">{$d.Cantidad} </td>
                                <td width="10%">{$d.PrecioUnitarioSinIVA*$d.Cantidad}</td>
                                
                                <td width="10%">{$d.CondicionDePago}</td>
                                <td width="10%">{if $d.Elegido == 'SI'}<span title="Insumo elegido" class="active"></span>{else}<span title="Insumo no elegido" class="inactive"></span>{/if}</td>
                                <td width="10%">
										{if $d.OrdenDeCompraId}
											{if $d.OrdenDeCompra.FechaAnulacion}
												<img src="/images/icons/delete.png" title="Orden de compra anulada el dia {$d.OrdenDeCompra.FechaAnulacion}"/>
											{else}
											SI (# {$d.OrdenDeCompraId})
											{/if}
										{else}
										NO
										{/if}
								</td>
                                
                                <td width="20%">
                                    <p><!-- mando primer parametro el id de la orden en lugar del insumo id -->
                                        <br>&raquo; <a href="#" onclick="guardarObtenerInsumos( {$d.Id} , 'del')">Borrar</a>
                                        
                                        <br>&raquo; <a href="#" 
                                            onclick="window.open(	'/Insumo/Edit/Orden/{$OrdenId}/id/{$d.Id}', 
                                                    'windowname1', 
                                                    'width=980, height=700, scrollbars = yes'); 
                                                    return false;">
                                            Editar&nbsp;	
                                        </a>
										 
										<br>&raquo; <a href="#" onclick="generarOrdenDeCompra( {$d.Id} )">Orden de compra</a>
										{if $d.OrdenDeCompraId and !$d.OrdenDeCompra.FechaAnulacion and $d.OrdenDeCompraId}
										<br>&raquo; <a class="AnularOrdenDeCompra" href="/OrdenCompra/Anular/id/{$d.OrdenDeCompraId}">Anular orden de compra</a>
										{/if}
										{if !$d.FechaDeEntrega}
										<br><a id="{$d.Id}" title="Marcar Insumo como entregado" class="InsumoEntregado" href="/Insumo/SetEntregado/id/{$d.Id}"><img src="/images/icons/add.png" title="Editar"/> Entregado</a>
										{else}
										<br><img src="/images/icons/tick.png" title="insumo entregado el dia {$d.FechaDeEntrega}"/>
										{/if}	
                                    </p>
                                    
                                </td>
						    </tr>
						{/foreach}
                        </table>
                        {/if}
                    </div> <!-- /listItems -->
                        
                </div> <!-- /list -->                     

<!-- end insumos -->     

<!-- fletes -->


	<div class="list">
		<label>Fletes</label>			      
		
		{if $OrdenId}
		<p>
						<a href="#" 
						   onclick="window.open(	'/Insumo/Edit/Orden/{$OrdenId}/EsFlete/SI', 
													'windowname1', 
													'width=980, height=700, scrollbars = yes'); 
													return false;">
						   &raquo; Agregar flete <img src="/images/icons/add.png" title="Agregar"/>
						</a>
		</p><br></br><br></br>						
		{/if}
		
           <div class="listTop">
                <div>
                    <table border="0" cellpadding="0" cellspacing="0">
							<tr>    
                                <td width="10%"><p>Nombre</p> </td>
                                <td width="10%"><p>Proveedor</p> </td>
                                <!--  -->
                                <td width="10%"><p>PU s/IVA</p> </td>
                                <td width="10%"><p>Cantidad</p> </td>
                                <td width="10%"><p>Total s/IVA</p> </td>
                                <td width="10%"><p>Cond. pago</p> </td>
                                <td width="10%"><p>Elegido</p> </td>
                                <td width="10%"><p>Tiene OC</p> </td>
                                
                                <td width="20%"><p>Opciones</p></td>
                            </tr>
                    </table>
                </div>
            </div> <!-- /listadoTop -->
                        
                    <div class="listItems">
                        <table border="0" cellpadding="0" cellspacing="0">
                        {if $Fletes|@count}
                            {foreach from=$Fletes item="record"}
						           <!-- item -->
						    <tr {$className}>
                                <td width="10%">{$record.Nombre} </td>
                                <td width="10%">{$record.Proveedor.Nombre} </td>
                                <td width="10%">{$record.PrecioUnitarioSinIVA} 
                                
                                				{if $record.OrdenDeCompraId}
													<br>{if $record.OrdenDeCompra.ImporteCompensatorio}(Comp. $ {$record.OrdenDeCompra.ImporteCompensatorioSinIVA}){/if}
												{/if}
                                
                                </td>
                                <td width="10%">{$record.Cantidad} </td>
                                <td width="10%">{$record.PrecioUnitarioSinIVA*$record.Cantidad}</td>
                                
                                <td width="10%">{$record.CondicionDePago} </td>
                                <td width="10%">{if $record.Elegido == 'SI'}<span title="Insumo elegido" class="active"></span>{else}<span title="Insumo no elegido" class="inactive"></span>{/if} </td>
                                                                <td width="10%">
										{if $record.OrdenDeCompraId}
											{if $record.OrdenDeCompra.FechaAnulacion}
												<img src="/images/icons/delete.png" title="Orden de compra anulada el dia {$record.OrdenDeCompra.FechaAnulacion}"/>
											{else}
											SI (# {$record.OrdenDeCompraId})	
											{/if}
										{else}
										NO
										{/if}
								</td>
                                
                                <td width="20%">
                                    <p><!-- mando primer parametro el id de la orden en lugar del insumo id -->
                                        <br>&raquo; <a href="#" onclick="guardarObtenerInsumos( {$record.Id} , 'del')">Borrar</a>
                                         
                                        <br>&raquo; <a href="#" 
                                            onclick="window.open(	'/Insumo/Edit/Orden/{$OrdenId}/id/{$record.Id}', 
                                                    'windowname1', 
                                                    'width=980, height=700, scrollbars = yes'); 
                                                    return false;">
                                            Editar&nbsp;	
                                        </a>
										 
										<br>&raquo; <a href="#" onclick="generarOrdenDeCompra( {$record.Id} )">Orden de compra</a>
										{if !$record.OrdenDeCompra.OrdenDePagoId and !$record.OrdenDeCompra.FechaAnulacion and $record.OrdenDeCompraId}
										<br>&raquo; <a class="AnularOrdenDeCompra" href="/OrdenCompra/Anular/id/{$record.OrdenDeCompraId}">Anular orden de compra</a>
										{/if}
										{if !$record.FechaDeEntrega}
										<br><a id="{$record.Id}" title="Marcar Insumo como entregado" class="InsumoEntregado" href="/Insumo/SetEntregado/id/{$record.Id}"><img src="/images/icons/add.png" title="Editar"/> Entregado</a>
										{else}
										<br><img src="/images/icons/tick.png" title="insumo entregado el dia {$record.FechaDeEntrega}"/>
										{/if}
                                    </p>
                                </td>
						    </tr>
				                    <!-- /item -->
						    {/foreach}
                        {else}
                            <tr class="noResult">
                                <td colspan="10" align="center"><h2 class="noResult">No se ha encontrado ning&uacute;n flete.</h2></td>
                            </tr>
                        {/if}
                        </table>
                    </div> <!-- /listItems -->
                        
                </div> <!-- /list -->                     

<!-- end fletes -->

<!-- mano de obra -->


	<div class="list">
		<label>Mano de obra</label>			      
		
		{if $OrdenId}
		<p>
						<a href="#" 
						   onclick="window.open(	'/Insumo/Edit/Orden/{$OrdenId}/EsManoDeObra/SI', 
													'windowname1', 
													'width=980, height=700, scrollbars = yes'); 
													return false;">
						   &raquo; Agregar mano de obra	<img src="/images/icons/add.png" title="Agregar"/>
						</a>
		</p><br></br><br></br>						
		{/if}
		
           <div class="listTop">
                <div>
                    <table border="0" cellpadding="0" cellspacing="0">
							<tr>    
                                <td width="10%"><p>Nombre</p> </td>
                                <td width="10%"><p>Proveedor</p> </td>
                                <td width="10%"><p>PU s/IVA</p> </td>
                                <td width="10%"><p>Cantidad</p> </td>
                                <td width="10%"><p>Total s/IVA</p> </td>
                                <td width="10%"><p>Cond. pago</p> </td>
                                <td width="10%"><p>Elegido</p> </td>
                                <td width="10%"><p>Tiene OC</p> </td>
                                
                                
                                <td width="20%"><p>Opciones</p></td>
                            </tr>
                    </table>
                </div>
            </div> <!-- /listadoTop -->
                        
                    <div class="listItems">
                        <table border="0" cellpadding="0" cellspacing="0">
                        {if $ManoDeObra|@count}
                            {foreach from=$ManoDeObra item="mano"}
						           <!-- item -->
						    <tr {$className}>
                                <td width="10%">{$mano.Nombre} </td>
                                <td width="10%">{$mano.Proveedor.Nombre} </td>
                                <td width="10%">{$mano.PrecioUnitarioSinIVA} 
                                
                                				{if $mano.OrdenDeCompraId}
													<br>{if $mano.OrdenDeCompra.ImporteCompensatorio}(Comp. $ {$mano.OrdenDeCompra.ImporteCompensatorioSinIVA}){/if}
												{/if}
                                
                                </td>
                                <td width="10%">{$mano.Cantidad} </td>
                                <td width="10%">{$mano.PrecioUnitarioSinIVA*$mano.Cantidad}</td>
                                <td width="10%">{$mano.CondicionDePago} </td>
                                <td width="10%">{if $mano.Elegido == 'SI'}<span title="Insumo elegido" class="active"></span>{else}<span class="inactive" title="Insumo no elegido"></span>{/if} </td>
                                                                <td width="10%">
										{if $mano.OrdenDeCompraId}
											{if $mano.OrdenDeCompra.FechaAnulacion}
												<img src="/images/icons/delete.png" title="Orden de compra anulada el dia {$mano.OrdenDeCompra.FechaAnulacion}"/>
											{else}
											SI (# {$mano.OrdenDeCompraId})	
											{/if}
										{else}
										NO
										{/if}
								</td>
                                
                                <td width="20%">
                                    <p><!-- mando primer parametro el id de la orden en lugar del insumo id -->
                                        <br>&raquo; <a href="#" onclick="guardarObtenerInsumos( {$mano.Id} , 'del')">Borrar</a>
                                         
                                        <br>&raquo; <a href="#" 
                                            onclick="window.open(	'/Insumo/Edit/Orden/{$OrdenId}/id/{$mano.Id}', 
                                                    'windowname1', 
                                                    'width=980, height=700, scrollbars = yes'); 
                                                    return false;">
                                            Editar&nbsp;	
                                        </a>
										 
										<br>&raquo; <a href="#" onclick="generarOrdenDeCompra( {$mano.Id} )">Orden de compra</a>
										{if !$mano.OrdenDeCompra.OrdenDePagoId and !$mano.OrdenDeCompra.FechaAnulacion and $mano.OrdenDeCompraId}
										<br>&raquo; <a class="AnularOrdenDeCompra" href="/OrdenCompra/Anular/id/{$mano.OrdenDeCompraId}">Anular orden de compra</a>
										{/if}
										{if !$mano.FechaDeEntrega}
										<br><a id="{$mano.Id}" title="Marcar Insumo como entregado" class="InsumoEntregado" href="/Insumo/SetEntregado/id/{$mano.Id}"><img src="/images/icons/add.png" title="Editar"/> Entregado</a>
										{else}
										<br><img src="/images/icons/tick.png" title="insumo entregado el dia {$mano.FechaDeEntrega}"/>
										{/if}
                                    </p>
                                </td>
						    </tr>
				                    <!-- /item -->
						    {/foreach}
                        {else}
                            <tr class="noResult">
                                <td colspan="10" align="center"><h2 class="noResult">No se ha encontrado mano de obra.</h2></td>
                            </tr>
                        {/if}
                        </table>
                    </div> <!-- /listItems -->
                        
                </div> <!-- /list -->                     

<!-- end mano de obra -->

<!-- comercializacion -->
{if $MostrarInsumosComercializacion == true}

	<div class="list">
		<label>Comercializacion</label>			      
		
		{if $OrdenId}
		<p>
						<a href="#" 
						   onclick="window.open(	'/Insumo/Edit/Orden/{$OrdenId}/EsComercializacion/SI', 
													'windowname1', 
													'width=980, height=700, scrollbars = yes'); 
													return false;">
						   &raquo; Agregar comercializacion <img src="/images/icons/add.png" title="Agregar"/>
						</a>
		</p><br></br><br></br>						
		{/if}
		
           <div class="listTop">
                <div>
                    <table border="0" cellpadding="0" cellspacing="0">
							<tr>    
                                <td width="10%"><p>Nombre</p> </td>
                                <td width="10%"><p>Proveedor</p> </td>
                                <td width="10%"><p>PU s/IVA</p> </td>
                                <td width="10%"><p>Cantidad</p> </td>
                                
                                <td width="10%"><p>Total s/IVA</p> </td>
                                
                                <td width="10%"><p>Cond. pago</p> </td>
                                <td width="10%"><p>Elegido</p> </td>
                                <td width="10%"><p>Tiene OC</p> </td>
                                
                                <td width="20%"><p>Opciones</p></td>
                            </tr>
                    </table>
                </div>
            </div> <!-- /listadoTop -->
                        
                    <div class="listItems">
                        <table border="0" cellpadding="0" cellspacing="0">
                        {if $Comercializaciones|@count}
                            {foreach from=$Comercializaciones item="com"}
						           <!-- item -->
						    <tr {$className}>
                                <td width="10%">{$com.Nombre} </td>
                                <td width="10%">{$com.Proveedor.Nombre} </td>
                                <td width="10%">{$com.PrecioUnitarioSinIVA} 
                                
                                				{if $com.OrdenDeCompraId}
													<br>{if $com.OrdenDeCompra.ImporteCompensatorio}(Comp. $ {$com.OrdenDeCompra.ImporteCompensatorioSinIVA}){/if}
												{/if}
                                </td>
                                <td width="10%">{$com.Cantidad} </td>
                                <td width="10%">{$com.PrecioUnitarioSinIVA*$com.Cantidad}</td>
                                <td width="10%">{$com.CondicionDePago} </td>
                                <td width="10%">{if $com.Elegido == 'SI'}<span title="Insumo elegido" class="active"></span>{else}<span title="Insumo no elegido" class="inactive"></span>{/if} </td>
                                                                <td width="10%">
										{if $com.OrdenDeCompraId}
											{if $com.OrdenDeCompra.FechaAnulacion}
												<img src="/images/icons/delete.png" title="Orden de compra anulada el dia {$com.OrdenDeCompra.FechaAnulacion}"/>
											{else}
											SI (# {$com.OrdenDeCompraId})
											{/if}
										{else}
										NO
										{/if}
								</td>
                                
                                <td width="20%">
                                    <p><!-- mando primer parametro el id de la orden en lugar del insumo id -->
                                        <br>&raquo; <a href="#" onclick="guardarObtenerInsumos( {$com.Id} , 'del')">Borrar</a>
                                         
                                        <br>&raquo; <a href="#" 
                                            onclick="window.open(	'/Insumo/Edit/Orden/{$OrdenId}/id/{$com.Id}', 
                                                    'windowname1', 
                                                    'width=980, height=700, scrollbars = yes'); 
                                                    return false;">
                                            Editar&nbsp;	
                                        </a>
										 
										<br>&raquo; <a href="#" onclick="generarOrdenDeCompra( {$com.Id} )">Orden de compra</a>
										{if !$com.OrdenDeCompra.OrdenDePagoId and !$com.OrdenDeCompra.FechaAnulacion and $com.OrdenDeCompraId}
										<br>&raquo; <a class="AnularOrdenDeCompra" href="/OrdenCompra/Anular/id/{$com.OrdenDeCompraId}">Anular orden de compra</a>
										{/if}
										{if !$com.FechaDeEntrega}
										<br><a id="{$com.Id}" title="Marcar Insumo como entregado" class="InsumoEntregado" href="/Insumo/SetEntregado/id/{$com.Id}"><img src="/images/icons/add.png" title="Editar"/> Entregado</a>
										{else}
										<br><img src="/images/icons/tick.png" title="insumo entregado el dia {$com.FechaDeEntrega}"/>
										{/if}
                                    </p>
                                </td>
						    </tr>
				                    <!-- /item -->
						    {/foreach}
                        {else}
                            <tr class="noResult">
                                <td colspan="10" align="center"><h2 class="noResult">No se han encontrado comercializaciones</h2></td>
                            </tr>
                        {/if}
                        </table>
                    </div> <!-- /listItems -->
                        
                </div> <!-- /list -->                     
{/if}
<!-- end comercializacion -->
</div><!-- insumos -->

<div id="CostosInsumos">
<!-- impuestos -->                        
                        
              			<h1><br></br></h1>
                        <h1>Impuestos</h1>
       				<div class="contentTitles">
	                    <label id="" title="El 3% del precio de venta sin IVA" class="blue">Ingresos brutos (3%): $ {$Resumen.IngresosBrutos}</label>
	                    
	                    <label id="" title="El 1,2% del precio de venta con IVA" class="blue">Impuestos bancarios (1,2%): $ {$Resumen.ImpuestosBancarios}</label>
	                    	                    
	                </div> <!-- /contentTitles -->

						
<!-- end impuestos -->				

<!-- costos -->     
                   
                        <h1><br></br></h1>
                        <!-- total de insumo elegidos -->
                        <h1>Costos</h1>
                    <div class="contentTitles">    
                        <label>Costo de insumos varios: $ {if $Resumen.TotalInsumosVarios}{$Resumen.TotalInsumosVarios}{else}0.0{/if}</label>
                        <label>Costo de flete: $ {if $Resumen.TotalFlete}{$Resumen.TotalFlete}{else}0.0{/if}</label>
                        <label>Costo de mano de obra: $ {if $Resumen.TotalManoDeObra}{$Resumen.TotalManoDeObra}{else}0.0{/if}</label>
                        <label>Costo de comercializacion: $ {if $Resumen.TotalComercializacion}{$Resumen.TotalComercializacion}{else}0.0{/if}</label>
                        
                        
							<ul class="statsList">
		                        <li>
		                            <p class="big">$ {$Resumen.CostoTotalSinIVA}</p>
		                            <p title="Costos de insumos elegidos + impuestos">Costo total sin IVA</p>
		                        </li>
		                        <li>
		                            <p class="big">$ {$Resumen.CostoTotalConIVA}</p>
		                            <p title="Costos de insumos elegidos varios + costo flete + costo comercializacion + 21% + costo mano de obra + impuestos">Costo total con IVA</p>
		                        </li>
	                    	</ul> <!-- /statsList -->
					</div> <!-- /contentTitles -->
</div>											
<!-- end costos -->				
{/if}						