172
a:4:{s:8:"template";a:1:{s:50:"Backend/Cliente/GetOrdenesDeTrabajoSinFacturar.tpl";b:1;}s:9:"timestamp";i:1461678375;s:7:"expires";i:1461678375;s:13:"cache_serials";a:0:{}}
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


		<div class="filtersBox filtersInfoBox">
                <ul>
                    <li>
                        <p>Cliente: <br><span>Zanella</span></p>
                    </li>
                    <li>
						<p>CUIT: <br><span>30-27895468-79</span></p>
                    </li>
                    <li>
                    	<p>Tipo de factura: <span>A</span></p>
                    	<p>IVA: <span>Responsable inscripto</span></p>
                    </li>
                    <li>  
                    	<p>Factura numero: <br><span>2000060</span></p>
                    </li>
                    <li>
						<p>Cantidad de ordenes sin facturar:  <span>1</span> </p>
                    </li>
                </ul>
            </div> <!-- /filtersBox-->


<h1>Ordenes de trabajo sin facturar</h1>


<div class="list">

<h2><img src="/images/icons/bullet_go.png" alt="item" title="Item"/> Cantidad pendientes: 1</h2>
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
				
										<!-- items -->
					
											<tr>
							<td width="10%">
								<p class="" title="Aprobado">
										3954
										<br>
										<p>50% anticipo / 50 %, 30 dias FF</p>
								</p>
							</td>
							<td width="10%">
								<p class="">
										08/04/2016
								</p>
							</td>
							<td width="15%">
								<p class="">
										Tarimas
								</p>
							</td>
							<td width="10%">
								<p class="">
										10								</p>
							</td>
							<td width="10%">
								<p class="">
										14080.00								</p>
							</td>
							
							<td width="15%" align="center">
								    
								    <input type="checkbox" class="check ActualizarTotal" name="OrdenesId[]" value="3954" importe="14080.00"/>                   
								    
								    <a class="CrearOrdenFicticia" href="/Orden/CrearOrdenFicticia/OrdenId/3954">Crear Orden de trabajo ficticia</a>
								    <br><a title="Modificar orden de trabajo" class="VerOrdenDeTrabajo" href="/Orden/Edit/id/3954/popup/true"><img src="/images/icons/layout_edit.png" title="Editar orden de trabajo"/></a> 
							</td>
						</tr>
                    					<!-- items -->
									</table>
            </div> <!-- /listItems -->
            
</div> <!-- /list -->         					