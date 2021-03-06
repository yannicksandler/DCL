<!-- date picker -->
<link type="text/css" href="/styles/ui-lightness/jquery-ui-1.8.2.custom.css" rel="stylesheet" />
<script type="text/javascript" src="/scripts/jquery/jquery.ui.datepicker.js"></script>
<script type="text/javascript" src="/scripts/jquery/jquery.ui.core.js"></script>
<script type="text/javascript" src="/scripts/jquery/jquery.ui.widget.js"></script>


<link rel="stylesheet" href="/scripts/colorbox-master/colorbox-master/example1/colorbox.css" />
<script src="/scripts/colorbox-master/colorbox-master/jquery.colorbox.js"></script>
	
{literal}

<script type="text/javascript">
$(document).ready(function(){

	// ocultar header y footer
	$('div.classHide').hide();
	$(".ajax").colorbox();

	$('.popup').click(function() {
       //alert(1); 
        var url 		= $(this).attr('href');
        //alert(url);
        var opciones="toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=yes, width=1000, height=700, top=85, left=140";
//alert(href);
		abrirPopUp(url, opciones);

		return false;
    });
	$('.acreditar').click(function() {
  	  	reload();

  	  return false;
  	});

	$('.debitar').click(function() {
		reload();		
		
		return false;
  	});

	$('.anular').click(function() {
		var r = confirm('Esta seguro que desea anular un item de la cuenta corriente?');

		if(r)
			return true;	
		
		return false;
  	});

	$('.button').click(function() {
  	  	var url	=	$(this).attr('href');
  	  	window.location = url;		
		
		return false;
  	});
  	
	
	$('.InsumoEntregado').click(function() {
        
        //var href 		= $(this).attr('href');
       	r	=	confirm('Esta seguro que quiere marcar el insumo como entregado? (Pasara a ser visto por Contaduria para pagar)');

	if(r)
	{
		return true;
        //Entregado(url);
	}
        return false;
    });

    $('#frmAction').submit(function() {
        /*
        if (	isChangeValues()  )
        {
        	return false;
        }

  	  	return false;*/
  	});

    
    $('.hasOrdenCompra').click(function() {
        
        var insumoId 		= $(this).attr('id');
        var OrdenCompraId 	= $(this).attr('OrdenCompraId');
        
        editOrdenCompra(insumoId, OrdenCompraId);
    });

	$('.VerOrdenDeTrabajo').click(function() {
        
        var url 		= $(this).attr('href');
        var opciones="toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=yes, width=1000, height=700, top=85, left=140";

		abrirPopUp(url, opciones);

		return false;
    });
    
    
    $('#fechaDesde').datepicker({
		changeMonth: true,
		changeYear: true,
        dateFormat: 'dd/mm/yy'
	});
    
    $('#fechaHasta').datepicker({
		changeMonth: true,
		changeYear: true,
        dateFormat: 'dd/mm/yy'
	});
    
  	   
});

//lo usa el popup editar orden de compra
function reload()
{
	window.location.reload();
}

function abrirPopUp(pagina, opciones)
{
	window.open(pagina,"",opciones);
}


</script>
{/literal}
	       	
{if $ProveedorId}
                
                <div class="filtersBox filtersInfoBox">
		        	<ul> 
			            <li width="">
		                        <p><span>{$Proveedor.Nombre}</span></p>
		                        <p>Tel: <span>{$Proveedor.Telefono}</span></p>
		                        <a href="mailto:{$Proveedor.Email}"><span>{$Proveedor.Email}</span></a>
		                 </li>
		                 <li>
                            <h1 class="big">$ {$Saldo}</h1>
                            <h2>Saldo</h2>
                            <p><img src="/images/icons/help.png" alt="item" title="saldo inicial MAS importe de ordenes de pago no anuladas (DEBE) MENOS importe de facturas de compra (HABER)"/></p>
                            
                        </li>
                        <li>
                		<input type="button" value="Crear orden de pago" href="/OrdenPago/Edit/ProveedorId/{$ProveedorId}" class="button" title="" />
         				<input type="button" value="Crear factura de compra" href="/FacturaCompra/Edit/ProveedorId/{$ProveedorId}" class="button" title="" />
                	</li>
		            </ul>		
		        </div> <!-- /filtersBox-->

{elseif $ClienteId}
				<div class="filtersBox filtersInfoBox">
		        	<ul> 
			            <li width="">
		                        <p><span>{$Cliente.Nombre}</span></p>
		                        <p>Tel: <span>{$Cliente.Telefono}</span></p>
		                        <a href="mailto:{$Cliente.Email}"><span>{$Cliente.Email}</span></a>
		                 </li>
		                 <li>
                            <h1 class="big">$ {$Saldo}</h1>
                            <h2>Saldo</h2>
                            <p><img src="/images/icons/help.png" alt="item" title="importe de facturas no anuladas (importe a cobrar) (DEBE) MENOS importe de cobranzas no anuladas (HABER)"/></p>
                            
                        </li>
                        <li>
                			<input type="button" value="Crear cobranza" href="/Cobranza/Edit/ClienteId/{$ClienteId}" class="button" title="" />
         					<input type="button" value="Crear factura de venta" href="/Facturacion/Facturar/ClienteId/{$ClienteId}" class="button" title="" />
                		</li>
                		<li>
                			<input type="button" value="Crear nota de credito" href="/NotaCredito/Edit" class="button" title="" />
         					<input type="button" value="Crear nota de debito" href="/NotaDebito/Edit" class="button" title="" />
                		</li>
		            </ul>		
		        </div> <!-- /filtersBox-->
{elseif $BancoId}
				<div class="filtersBox filtersInfoBox">
		        	<ul> 
			            <li width="">
		                        <p><span>{$Banco.Nombre}</span></p>
		                        <p>Cuenta: <span>{$Banco.NumeroDeCuenta}</span></p>
		                        
		                 </li>
		                 <li>
                            <h1 class="big">$ {$Saldo}</h1>
                            <h2>Saldo</h2>
                            <p><img src="/images/icons/help.png" alt="item" title=""/></p>
                            
                        </li>
                        <li>	    
                    		<a id="" href="/GestionEconomica/ChequesPendientesAcreditar/BancoId/{$Banco.Id}" class="ajax" title=""><span><img src="/images/icons/add.png" title="Liquidar"/> Cheques a acreditar ({$ChequesPendientesAcreditar})</span></a>
                    		<br>
                    		<a id="" href="/GestionEconomica/ChequesPendientesDebitar/BancoId/{$Banco.Id}" class="ajax" title=""><span><img src="/images/icons/add.png" title="Liquidar"/> Cheques a debitar ({$ChequesPendientesDebitar})</span></a>    
                        </li>
                        <li>	    
                        	<a id="" href="/CuentaCorriente/AgregarConceptoBanco/BancoId/{$Banco.Id}" class="ajax" title=""><span><img src="/images/icons/add.png" title="Liquidar"/> Agregar concepto</span></a>
                        
                        </li>
                    
		            </ul>		
		        </div> <!-- /filtersBox-->
{/if}
	       	
<!-- 
<p><img src="/images/icons/help.png" title="Ver"/> Las Facturas de Compra y Ordenes de pago son desde la fecha {$FechaDesdeCtaCte}. Son mostradas las ultimas 50 de cada una por performance. Para ver todas debe consultar historicas</p>
 -->