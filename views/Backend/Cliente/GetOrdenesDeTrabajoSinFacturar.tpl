{literal}
<script type="text/javascript">
$(document).ready(function(){

	$('.ActualizarTotal').click(function() {
		
		var importe =  $(this).attr('importe');
		if(IsNumeric(importe))
		{
		if($(this).attr('checked'))
		{
			SumarTotal(importe);
		}
		else
		{
			RestarTotal(importe);
		}
		}
		else
		{
			$(this).attr('checked', '');
			alert('La orden no tiene importe de venta. Debe asignarlo antes de facturar');
		}
	});

	$('.CrearOrdenFicticia').click(function() {

		var c = confirm('Esta seguro que desea crear una Orden Ficticia para facturar ?');

		if(c)
		{
			var href =  $(this).attr('href');
			window.location = href;
		}
	});

	$('.VerOrdenDeTrabajo').click(function() {
        
        var url 		= $(this).attr('href');
        var opciones="toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=yes, width=1000, height=700, top=85, left=140";

		abrirPopUp(url, opciones);

		return false;
    });
    
});

function IsNumeric(input)
{
    return (input - 0) == input && input.length > 0;
}

function abrirPopUp(pagina, opciones)
{
	window.open(pagina,"",opciones);
}

</script>
{/literal}

		<div class="filtersBox filtersInfoBox">
                <ul>
                    <li>
                        <p>Cliente: <br><span>{$Resumen.Cliente.Nombre}</span></p>
                    </li>
                    <li>
						<p>CUIT: <br><span>{$Resumen.ClienteCuit}</span></p>
                    </li>
                    <li>
                    	<p>Tipo de factura: <span>{$Resumen.LetraFactura}</span></p>
                    	<p>IVA: <span>{if $Resumen.ClienteTipoIva}{$Resumen.ClienteTipoIva}{else}<img src="/images/icons/error.png" title="ingresar tipo de iva en el cliente"/>{/if}</span></p>
                    </li>
                    <li>  
                    	<p>Factura numero: <br><span>{$Resumen.FacturaNumero}</span></p>
                    </li>
                    <li>
						<p>Cantidad de ordenes sin facturar:  <span>{$Resumen.CantidadOrdenesSinFactura}</span> </p>
                    </li>
                </ul>
            </div> <!-- /filtersBox-->


<h1>Ordenes de trabajo sin facturar</h1>

{if $deleteErrorMessage}<p class="error">{$deleteErrorMessage}</p>{/if}
{if $successMessage}<p class="success">{$successMessage}  <img src="/images/icons/tick.png" /></p>{/if}

<div class="list">

<h2><img src="/images/icons/bullet_go.png" alt="item" title="Item"/> Cantidad pendientes: {$Pendientes|@count}</h2>
<p><img src="/images/icons/bullet_go.png" alt="item" title="Item"/> Ordenes no facturadas en estado "En produccion", "Finalizado" o "Aprobado"</p>

        		<div class="listTop">
					<div>
						<table border="0" cellpadding="0" cellspacing="0">
							<tr>
								<td width="10%"><p>Orden</p></td>
								<td width="10%"><p title="Fecha de inicio">Fecha</p></td>
								<td width="15%"><p>Producto</p></td>
								<td width="10%"><p>Cantidad</p></td>
								<td width="10%"><p title="total sin iva">Total</p></td>
								
								<td width="15%"><p>Seleccionar</p></td>
							</tr>
						</table>
					</div>
                </div> <!-- /listadoTop -->
                
        <div class="listItems listItemsScroll">
                        
				<table border="0" cellpadding="0" cellspacing="0">
				
					{if !$Pendientes|@count}
						<h2 align="center"><img src="/images/icons/error.png" title=""/> No hay ordenes de trabajo pendientes</h2>
					{else}
					<!-- items -->
					
					{foreach from=$Pendientes item="p"}
						<tr>
							<td width="10%">
								<p class="" title="{$p.Estado.Nombre}">
										{$p.Id}
										<br>
										<p>{$p.CondicionDeCobro}</p>
								</p>
							</td>
							<td width="10%">
								<p class="">
										{$p.FechaInicio}
								</p>
							</td>
							<td width="15%">
								<p class="">
										{$p.Producto}
								</p>
							</td>
							<td width="10%">
								<p class="">
										{if $p.Cantidad > 0}{$p.Cantidad}{else}<img src="/images/icons/error.png" title="ingresar cantidad en la orden"/>{/if}
								</p>
							</td>
							<td width="10%">
								<p class="">
										{if $p.TotalSinIva > 0}{$p.TotalSinIva}{else}<img src="/images/icons/error.png" title="ingresar importe en la orden"/>{/if}
								</p>
							</td>
							
							<td width="15%" align="center">
								    
								    <input type="checkbox" class="check ActualizarTotal" name="OrdenesId[]" value="{$p.Id}" importe="{$p.TotalSinIva}"/>                   
								    
								    <a class="CrearOrdenFicticia" href="/Orden/CrearOrdenFicticia/OrdenId/{$p.Id}">Crear Orden de trabajo ficticia</a>
								    <br><a title="Modificar orden de trabajo" class="VerOrdenDeTrabajo" href="/Orden/Edit/id/{$p.Id}/popup/true"><img src="/images/icons/layout_edit.png" title="Editar orden de trabajo"/></a> 
							</td>
						</tr>
                    {/foreach}
					<!-- items -->
					{/if}
				</table>
            </div> <!-- /listItems -->
            
</div> <!-- /list -->         					