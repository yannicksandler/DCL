<!-- date picker -->
<link type="text/css" href="/styles/ui-lightness/jquery-ui-1.8.2.custom.css" rel="stylesheet" />
<script type="text/javascript" src="/scripts/jquery/jquery.ui.datepicker.js"></script>
<script type="text/javascript" src="/scripts/jquery/jquery.ui.core.js"></script>
<script type="text/javascript" src="/scripts/jquery/jquery.ui.widget.js"></script>

{literal}
<script type="text/javascript">
$(document).ready(function(){	

    $('#frmAction').submit(function() {
		
    	if(AdvancedSearch())
			return false;

    	return false;
  	});

    // ocultar site header
    $('div.header').hide();
    
    $("#FechaDesde").attr('value', $("#FechaDesde").val().replace("_", "/").replace("_", "/"));
    $("#FechaHasta").attr('value', $("#FechaHasta").val().replace("_", "/").replace("_", "/"));
    $("#ClienteNombre").attr('value', $("#ClienteNombre").val().replace("_", " ").replace("_", " "));

    $('#FechaDesde').datepicker({
		changeMonth: true,
		changeYear: true,
        dateFormat: 'dd/mm/yy'
	});
    
    $('#FechaHasta').datepicker({
		changeMonth: true,
		changeYear: true,
        dateFormat: 'dd/mm/yy'
	});

    $('.AnularFactura').click(function() {
        var r = confirm('Esta seguro que desea anular la factura? Esto anulara tambien todas las prestaciones asociadas');

        if(r)
        {
			var url	=	$(this).attr("href");
	
			AnularFactura(url);
        }
		return false;
		
	});

    $('.VerFactura').click(function() {

		var id	=	$(this).attr("id");
		var url	=	'/Facturacion/FacturaImprimible/FacturaId/' + id;
	
		var opciones="toolbar=yes, location=no, directories=no, status=no, menubar=yes, scrollbars=yes, resizable=yes, width=800, height=600, top=10, left=40";
		abrirPopUp(url, opciones);		
		
		return false;
		
	});  	

	$('.SeleccionarCliente').click(function() {
		
		var pagina	= '/Cliente/Seleccionar';

		var opciones="toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=yes, width=1000, height=700, top=85, left=140";

		abrirPopUp(pagina, opciones);
		
		return false;
  	});

	$('.CrearCobranza').click(function() {
		
		var response = confirm("Esta seguro que desea crear una cobranza ?");

		if(response)
			return true;
		
		return false;
  	});
	

});

function SetCliente(ClienteId)
{
	$('#ClienteNombre').val(ClienteId);
}

function abrirPopUp(pagina, opciones)
{
	window.open(pagina,"",opciones);
}

function AdvancedSearch()
{
    var FechaDesde	=	$("#FechaDesde").val();
    var FechaHasta	=	$("#FechaHasta").val();
    var FacturaId	=	$("#FacturaId").val();
    var ClienteNombre	=	$("#ClienteNombre").val();
    var TipoA	=	$("#TipoA:checked").val();
    var TipoB	=	$("#TipoB:checked").val();
    var TipoN	=	$("#TipoN:checked").val();

	if( (FechaDesde != "Fecha desde") || (FechaHasta != "Fecha hasta") 
			|| (FacturaId != "Nro de factura") 
			|| (ClienteNombre != "Nombre de cliente")
			|| (TipoA == "A")
			|| (TipoB == "B")
			|| (TipoN == "N")
		)
    {
        // url
        
        var url = '/Facturacion/List/order/Id_DESC';
        
        if(FechaDesde != 'Fecha desde')
		{
            FechaDesde = FechaDesde.replace("/", "_").replace("/", "_");
            
			url = url + '/FechaDesde/' + FechaDesde;
		}
        
        if(FechaHasta != 'Fecha hasta')
		{
            FechaHasta  =   FechaHasta.replace("/", "_").replace("/", "_");
			url = url + '/FechaHasta/' + FechaHasta;
		}

		if(FacturaId != 'Nro de factura')
		{
			url	=	url + '/FacturaId/' + FacturaId;
		}

		if(ClienteNombre != 'Nombre de cliente')
		{
			ClienteNombre = ClienteNombre.replace(" ", "_").replace(" ", "_");
			
			url	=	url + '/ClienteNombre/' + ClienteNombre;
		}

		if(TipoA)
		{
			url	=	url + '/FacturaTipo/' + TipoA;
		}

		if(TipoB)
		{
			url	=	url + '/FacturaTipo/' + TipoB;
		}

		if(TipoN)
		{
			url	=	url + '/FacturaTipo/' + TipoN;
		}
        
        //alert(url);
        window.location	=	url;
    	
		//return true;
    }
	
	return false;
}

function AnularFactura(url)
{
	if(url)
	{
		$.ajax({
			type: "GET",
			url: url,
			dataType: "text/html",
			success: function(html){
				$("#AnularFactura").html(html);

				window.location.reload();
				

			}
	
		});
	}
}

function reload()
{
	window.location.reload();
}

</script>
{/literal}

<a href="/GestionEconomica/EditBancoTipoConcepto" class="linkSendHome"><img src="/images/icons/money_add.png" title=""/> Nuevo concepto &raquo;</a>
    