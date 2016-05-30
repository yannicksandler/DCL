<!-- date picker -->
<link type="text/css" href="/styles/ui-lightness/jquery-ui-1.8.2.custom.css" rel="stylesheet" />
<script type="text/javascript" src="/scripts/jquery/jquery.ui.datepicker.js"></script>
<script type="text/javascript" src="/scripts/jquery/jquery.ui.core.js"></script>
<script type="text/javascript" src="/scripts/jquery/jquery.ui.widget.js"></script>


{literal}
<script type="text/javascript">
$(document).ready(function(){

    var availableTags = [
							{/literal}{$ArrayProveedores}{literal}
                    ];
 

 $("input#NombreProveedor").autocomplete({
     source: availableTags,
   //define select handler
		select: function(e, ui) {
			var valor = ui.item.value;
			//SetProveedor(valor);
		}        
		/*
     change: function() {
			alert(1);
     }*/
 });
 
	$('.VerOrdenDeTrabajo').click(function() {
        
        var url 		= $(this).attr('href');
        var opciones="toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=yes, width=1000, height=700, top=85, left=140";

		abrirPopUp(url, opciones);

		return false;
    });

    $('#frmAction').submit(function() {
		
    	if(AdvancedSearch())
			return false;

    	return false;
  	});
    
    $('.CrearOrdenDePago').click(function() {
        
		var c = confirm('Esta seguro que desea crear una orden de pago ?')
		
		if(c)
			return true;
		
  	  	return false;
  	});
  	    
    $('.AbrirPopup').click(function() {
        
		var pagina	= $(this).attr('href');

		var opciones="toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=yes, width=1000, height=700, top=85, left=140";

		abrirPopUp(pagina, opciones);

  	  	return false;
  	});

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
    
    $("#FechaDesde").attr('value', $("#FechaDesde").val().replace("_", "/").replace("_", "/"));
    $("#FechaHasta").attr('value', $("#FechaHasta").val().replace("_", "/").replace("_", "/"));
    $("#NombreProveedor").attr('value', $("#NombreProveedor").val().replace("_", " ").replace("_", " ").replace("_", " ").replace("_", " "));
    
    $("#NombreProveedor").blur(function(){
        if( $(this).val() == '' )
            $(this).val( $(this).attr("defaultValue") );
    });

    $("#NombreProveedor").focus(function(){
        if( $(this).val() == $(this).attr("defaultValue"))
            $(this).val('');
    });
});

function abrirPopUp(pagina, opciones)
{
	window.open(pagina,"",opciones);
}

function AdvancedSearch()
{
	//var Pagado	=	$("#Pagada option:selected").val();
	var NombreProveedor	=	$("#NombreProveedor").val();
    var OrdenDeCompraId	=	$("#OrdenDeCompraId").val();
    var FechaDesde	=	$("#FechaDesde").val();
    var FechaHasta	=	$("#FechaHasta").val();
	

	if( OrdenDeCompraId || (NombreProveedor != "Nombre proveedor"))
    {
        // url
        var url = '/OrdenCompra/List';
		
		if(OrdenDeCompraId != 'Orden de compra')
		{
			url = url + '/OrdenDeCompraId/' + OrdenDeCompraId;
		}

		if(NombreProveedor != 'Nombre proveedor')
		{
			// quitar espacios
			NombreProveedor = NombreProveedor.replace(" ", "_").replace(" ", "_").replace(" ", "_").replace(" ", "_");

			url = url + '/NombreProveedor/' + NombreProveedor;
		}

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
		
        //alert(url);
        window.location	=	url;
    
		return true;
    }
	
	return false;
}

function reload()
{
	//window.location.reload();
}

</script>
{/literal}
	       	
	       	<form id="frmAction" action="" method="post">
	       	
	       	
	        
	        	<div class="contInputs" style="clear: left;">
	
		            <input type="text" value="{if $FechaDesde}{$FechaDesde}{else}Fecha desde{/if}" name="FechaDesde" id="FechaDesde"/>
                    
                    <input type="text" value="{if $FechaHasta}{$FechaHasta}{else}Fecha hasta{/if}" name="FechaHasta" id="FechaHasta"/>

		            
				</div>
				<div class="contInputs" style="clear: left;">	            
                	<input type="text" value="{if $NombreProveedor}{$NombreProveedor}{else}Nombre proveedor{/if}" name="NombreProveedor" id="NombreProveedor"/>    
		            <input type="text" value="{if $OrdenDeCompraId}{$OrdenDeCompraId}{else}Orden de compra{/if}" name="OrdenDeCompraId" id="OrdenDeCompraId"/>
				</div>
				<div class="contInputs" style="clear: left;">	            
                	    
		            <input type="text" value="{if $OrdenDePagoId}{$OrdenDePagoId}{else}Orden de pago{/if}" name="OrdenDePagoId" id="OrdenDePagoId"/>
				</div>
		       	
		       	<p> <br></br></p>
		       	<div class="contInputs" >

		            <div class="buttonsCont" style="clear: left;">
						<input type="submit" value="Buscar" class="btDark" title="Buscar" />
						<!-- 
						<input type="reset" value="Pendientes" class="btDark" title="Pendientes de pago" onclick="window.location='/OrdenCompra/List/Pendientes/SI'"/>
						 -->
		            </div>
		            
				</div>
								
				<input type="hidden" name="updateNewValue" id="updateValue" value="" />
	            <input type="hidden" name="postAction" id="action" value="" />
	            <input type="hidden" name="listAction" id="listAction" value="list" />
	            
	            <h2><img src="/images/icons/bullet_go.png" alt="item" title="Item"/>  Cantidad encontrados: {if $Cantidad > 0}{$Cantidad}{else}0{/if}</h2>
            </form>    