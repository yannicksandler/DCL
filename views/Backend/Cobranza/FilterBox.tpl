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
    	
  	  	return true;
  	});


    $("#FechaDesde").attr('value', $("#FechaDesde").val().replace("_", "/").replace("_", "/"));
    $("#FechaHasta").attr('value', $("#FechaHasta").val().replace("_", "/").replace("_", "/"));


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

    $("#OrdenDePagoId").blur(function(){
        if( $(this).val() == '' )
            $(this).val( $(this).attr("defaultValue") );
    });

    $("#OrdenDePagoId").focus(function(){
        if( $(this).val() == $(this).attr("defaultValue"))
            $(this).val('');
    });

    $('.Anular').click(function() {
        var r = confirm('Esta seguro que desea anular la cobranza?');

        if(r)
        {
			var url	=	$(this).attr("href");
	
			Anular(url);
        }
		return false;
		
	});

});

function Anular(url)
{
	if(url)
	{
		$.ajax({
			type: "GET",
			url: url,
			dataType: "text/html",
			success: function(html){
				$("#Anular").html(html);
				alert('Cobranza anulada');

				//window.location.reload();
				

			}
	
		});
	}
}

function abrirPopUp(pagina, opciones)
{
	window.open(pagina,"",opciones);
}

function AdvancedSearch()
{
    var FechaDesde	=	$("#FechaDesde").val();
    var FechaHasta	=	$("#FechaHasta").val();
    var CobranzaNumero	=	$("#CobranzaNumero").val();    
    var ClienteId	=	$("#ClienteId option:selected").val();


	if( (FechaDesde != "Fecha desde") || (FechaHasta != "Fecha hasta") 
			 || (CobranzaNumero != "Cobranza") || (ClienteId != ""))
    {   
        var url = '/Cobranza/List/order/Fecha_DESC';
        
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

		if(ClienteId != '')
		{
			url	=	url + '/ClienteId/' + ClienteId;
		}

		if(CobranzaNumero != 'Cobranza')
		{
			url	=	url + '/Numero/' + CobranzaNumero;
		}
		
        
        window.location	=	url;
    	
		return true;
    }
    /*
	else
	{
		$('#Message').html('<p class="error">Debe ingresar un campo de busqueda antes de buscar</p>');
	}
	*/
	
	return false;
}

</script>
{/literal}


	        <div class="selectFile" style="clear: left;">
	
		<table width="60%"  border="0">
  <tr height="50">
    <td width="30%">
	
	<div class="contInputs">
    
    <table width=""  border="0" cellspacing="0">
	  <tr>
	    <td rowspan="2">  <img src="/images/icons/date.png" title="Seleccionar intervalo de fechas"/></td>
	    <td><input type="text" value="{if $FechaDesde}{$FechaDesde}{else}Fecha desde{/if}" name="FechaDesde" id="FechaDesde"/></td>
	  </tr>
	  <tr>
	    <td><input type="text" value="{if $FechaHasta}{$FechaHasta}{else}Fecha hasta{/if}" name="FechaHasta" id="FechaHasta"/></td>
	  </tr>
	</table>
    
    
    
</td>
    <td width="30%">
	
	<div class="contInputs">
    

    
    
    <table width=""  border="0" cellspacing="0">
	  <tr>
	    <td rowspan="2">
	    	<img src="/images/icons/report_go.png" title="Ingresar valores para buscar"/>
	    </td>
	    <td>
	      <!-- drop down -->
    
      <select name="ClienteId" class="required" id="ClienteId">
      
        		<option value="">Clientes</option>
        
               {foreach from=$Clientes item="c"}
                       
        			<option value="{$c.Id}" {if ($c.Id eq $ClienteId)}selected="selected"{/if}>{$c.Nombre}</option>
        
               {/foreach}
                    
      </select>
      
	    </td>
	  </tr>
	  <tr>
	    <td><input type="text" value="{if $CobranzaNumero}{$CobranzaNumero}{else}Cobranza{/if}" name="CobranzaId" id="CobranzaNumero" title="Ingrese el numero de cobranza"/></td>
	  </tr>
	</table>
    
    </div>
	
</td>
    
  </tr>
  <tr>
    <td width="20%">
				<!-- 
				<ul class="statsList">
                        <li>
                            <h1 class="big">$ {$Resumen.TotalPagos}</h1>
                            <h2 title="Suma de pagos de rebibos de pago encontrados (no anuladas)">Total</h2>
                        </li>
                </ul> --> <!-- /statsList -->
	    
    </td>
    <td width="20%"><div class="contInputs" >
					
		            <div class="buttonsCont" style="clear: left;">
						<input type="submit" id="buscar" value="Buscar" class="btDark" title="Buscar" />
						
								
		            </div>
		            
				</div></td>
	<td width="20%">

	
	</td>
			       	
  </tr>
</table>
				
				<div id="Anular"></div>
		       	
			<div id="Message"></div>	
	
            </div>
            
<h2><img src="/images/icons/bullet_go.png" alt="item" title="Item"/>  Cantidad encontrados: {if $Cantidad > 0}{$Cantidad}{else}0{/if}</h2>
<p><img src="/images/icons/help.png" alt="item" title="Item"/>  Para saber el importe cobrado de un cliente en un periodo buscar por cliente y periodo a saber importe</p>           