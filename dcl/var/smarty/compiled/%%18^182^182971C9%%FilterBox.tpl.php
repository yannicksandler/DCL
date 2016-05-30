<?php /* Smarty version 2.6.26, created on 2014-09-18 14:06:22
         compiled from Backend/FacturaCompra/FilterBox.tpl */ ?>
<!-- date picker -->
<link type="text/css" href="/styles/ui-lightness/jquery-ui-1.8.2.custom.css" rel="stylesheet" />
<script type="text/javascript" src="/scripts/jquery/jquery.ui.datepicker.js"></script>
<script type="text/javascript" src="/scripts/jquery/jquery.ui.core.js"></script>
<script type="text/javascript" src="/scripts/jquery/jquery.ui.widget.js"></script>

<?php echo '
<script type="text/javascript">
$(document).ready(function(){	

    $(\'#frmAction\').submit(function() {
    	if(AdvancedSearch())
			return false;

    	return false;
  	});

    
    $("#FechaDesde").attr(\'value\', $("#FechaDesde").val().replace("_", "/").replace("_", "/"));
    $("#FechaHasta").attr(\'value\', $("#FechaHasta").val().replace("_", "/").replace("_", "/"));

    $(\'#FechaDesde\').datepicker({
		changeMonth: true,
		changeYear: true,
        dateFormat: \'dd/mm/yy\'
	});
    
    $(\'#FechaHasta\').datepicker({
		changeMonth: true,
		changeYear: true,
        dateFormat: \'dd/mm/yy\'
	});

    $(\'.AnularFactura\').click(function() {
        // si una factura ya tiene una OP asociada, no puede anularse
        var r = confirm(\'Esta seguro que desea anular la factura? Esto anulara tambien todas las ordenes de compra asociadas\');
        

        if(r)
        {
			var url	=	$(this).attr("href");
	
			AnularFactura(url);
        }
		return false;
		
	});
/*
    $(\'.VerFactura\').click(function() {

		var id	=	$(this).attr("id");
		var url	=	\'/Facturacion/FacturaImprimible/FacturaId/\' + id;
	
		var opciones="toolbar=yes, location=no, directories=no, status=no, menubar=yes, scrollbars=yes, resizable=yes, width=800, height=600, top=10, left=40";
		abrirPopUp(url, opciones);		
		
		return false;
		
	});  	
*/
	$(\'.SeleccionarCliente\').click(function() {
		
		var pagina	= \'/Cliente/Seleccionar\';

		var opciones="toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=yes, width=1000, height=700, top=85, left=140";

		abrirPopUp(pagina, opciones);
		
		return false;
  	});

	$(\'.CrearCobranza\').click(function() {
		
		var response = confirm("Esta seguro que desea crear una cobranza ?");

		if(response)
			return true;
		
		return false;
  	});
	
    $("#NombreProveedor").blur(function(){
        if( $(this).val() == \'\' )
            $(this).val( $(this).attr("defaultValue") );
    });

    $("#NombreProveedor").focus(function(){
        if( $(this).val() == $(this).attr("defaultValue"))
            $(this).val(\'\');
    });

    $("#FacturaId").blur(function(){
        if( $(this).val() == \'\' )
            $(this).val( $(this).attr("defaultValue") );
    });

    $("#FacturaId").focus(function(){
        if( $(this).val() == $(this).attr("defaultValue"))
            $(this).val(\'\');
    });

    var availableTags = [
							'; ?>
<?php echo $this->_tpl_vars['ArrayProveedores']; ?>
<?php echo '
                    ];
 

	 $("input#NombreProveedor").autocomplete({
	     source: availableTags
	 });   
});


function abrirPopUp(pagina, opciones)
{
	window.open(pagina,"",opciones);
}


function AdvancedSearch()
{
    var FechaDesde	=	$("#FechaDesde").val();
    var FechaHasta	=	$("#FechaHasta").val();
    var FacturaNumero	=	$("#FacturaId").val();
    var Nombre	=	$("#NombreProveedor").val();
    var TipoA	=	$("#TipoA:checked").val();
    var TipoB	=	$("#TipoB:checked").val();
    var TipoN	=	$("#TipoN:checked").val();

	if( (FechaDesde != "Fecha desde") || (FechaHasta != "Fecha hasta") 
			|| (FacturaNumero != "Nro de factura") 
			|| (Nombre != "Nombre proveedor")
			|| (TipoA == "A")
			|| (TipoB == "B")
			|| (TipoN == "N")
		)
    {
        // url
        
        var url = \'/FacturaCompra/List\';
        
        if(FechaDesde != \'Fecha desde\')
		{
            FechaDesde = FechaDesde.replace("/", "_").replace("/", "_");
            
			url = url + \'/FechaDesde/\' + FechaDesde;
		}
        
        if(FechaHasta != \'Fecha hasta\')
		{
            FechaHasta  =   FechaHasta.replace("/", "_").replace("/", "_");
			url = url + \'/FechaHasta/\' + FechaHasta;
		}

		if(FacturaNumero != \'Nro de factura\')
		{
			url	=	url + \'/FacturaId/\' + FacturaNumero;
		}

		if(Nombre != \'Nombre proveedor\')
		{
			Nombre = Nombre.replace(" ", "_").replace(" ", "_").replace(" ", "_").replace(" ", "_").replace(" ", "_");
			
			url	=	url + \'/ProveedorNombre/\' + Nombre;
		}

		if(TipoA)
		{
			url	=	url + \'/FacturaTipo/\' + TipoA;
		}

		if(TipoB)
		{
			url	=	url + \'/FacturaTipo/\' + TipoB;
		}

		if(TipoN)
		{
			url	=	url + \'/FacturaTipo/\' + TipoN;
		}
        
        //alert(url);
        window.location	=	url;
    	
		//return true;
    }
	
	return false;
}

function AnularFactura(url)
{
	//window.location	=	url;
	//id	=	url.replace("/", "_").replace("/", "_").replace("/", "_").replace("/", "_").replace("/", "_").replace("/", "_").replace("/", "_").replace("/", "_").replace("/", "_");
	
	if(url)
	{
		$.ajax({
			type: "GET",
			url: url,
			dataType: "text/html",
			success: function(html){
				$("#AnularFactura").html(html);
				//$(id).html(html);
				//window.location.reload();
			}
	
		});
	}
}

function reload()
{
	window.location.reload();
}

</script>
'; ?>


<a href="/FacturaCompra/Edit" class="linkSendHome"><img src="/images/icons/money_add.png" title=""/> Agregar factura de compra &raquo;</a>
<a href="/FacturaCompra/List/PagoPendiente/SI" class="linkSendHome"><img src="/images/icons/money_add.png" title=""/> Facturas pendientes de pago &raquo;</a>
<a href="/OrdenCompra/List/order/Id_DESC/Pendientes/SI" class="linkSendHome"><img src="/images/icons/money_add.png" title=""/> Ordenes de compra pendientes de pago &raquo;</a>
<a href="/OrdenPago/List/pagesize/30/page/1/order/Fecha_DESC" class="linkSendHome"><img src="/images/icons/money_add.png" title=""/> Pagos realizados &raquo;</a>
<a href="/OrdenPago/Edit" class="linkSendHome"><img src="/images/icons/money_add.png" title=""/> Agregar orden de pago &raquo;</a>


	        <div class="selectFile" style="clear: left;">
	        
		        <table border="0" cellspacing="0">
				  <tr height="50">
				    <td>
				    
				    	        	<div class="contInputs" style="clear: left;">
	
		                    <table width=""  border="0" cellspacing="0">
							  <tr>
							    <td rowspan="2">  <img src="/images/icons/date.png" alt="Fecha" title="Seleccionar intervalo de fechas"/></td>
							    <td><input type="text" value="<?php if ($this->_tpl_vars['FechaDesde']): ?><?php echo $this->_tpl_vars['FechaDesde']; ?>
<?php else: ?>Fecha desde<?php endif; ?>" name="filters[FechaDesde]" id="FechaDesde"/></td>
							  </tr>
							  <tr>
							    <td><input type="text" value="<?php if ($this->_tpl_vars['FechaHasta']): ?><?php echo $this->_tpl_vars['FechaHasta']; ?>
<?php else: ?>Fecha hasta<?php endif; ?>" name="filters[FechaHasta]" id="FechaHasta"/></td>
							  </tr>
							</table>
		
							            
						</div>
				    
				    </td>
				    <td>
				    
				    <div class="contInputs" style="clear: left;">
	        	
	        		<table width=""  border="0" cellspacing="0">
					  <tr>
					    <td rowspan="2">  <img src="/images/icons/editPerfilModify.png" /></td>
					    <td><input type="text" value="<?php if ($this->_tpl_vars['ProveedorNombre']): ?><?php echo $this->_tpl_vars['ProveedorNombre']; ?>
<?php else: ?>Nombre proveedor<?php endif; ?>" name="filters[NombreProveedor]" id="NombreProveedor"/></td>
					  </tr>
					  <tr>
					    <td><input type="text" value="<?php if ($this->_tpl_vars['FacturaId']): ?><?php echo $this->_tpl_vars['FacturaId']; ?>
<?php else: ?>Nro de factura<?php endif; ?>" name="filters[Numero]" id="FacturaId"/></td>
					  </tr>
					</table>
	        
					</div> <!-- continputs -->
				    
				    </td>
				    <td>
				    
			
				    </td>
				    <td>
				    
				    <div class="contInputs" style="clear: left;">
	        	
	                <table width=""  border="0" cellspacing="0">
					  <tr>
					    <td rowspan="2">  <img src="/images/icons/report_go.png" /></td>
					    <td>
							    
		                    <label class="blue">Tipo de factura</label>
							    
					    </td>
					  </tr>
					  <tr>
					    <td align="center">
					    	<input class="check" id="TipoA" type="radio" name="filters[FacturaTipo]" value="A" <?php if ($this->_tpl_vars['FacturaTipo'] == 'A'): ?>checked="checked"<?php endif; ?>/>
		                    <label class="check blue">A</label>
		                    <input class="check" id="TipoB" type="radio" name="filters[FacturaTipo]" value="B" <?php if ($this->_tpl_vars['FacturaTipo'] == 'B'): ?>checked="checked"<?php endif; ?>/>
		                    <label class="check blue">B</label>
		                    <input class="check" id="TipoN" type="radio" name="filters[FacturaTipo]" value="N" <?php if ($this->_tpl_vars['FacturaTipo'] == 'N'): ?>checked="checked"<?php endif; ?>/>
		                    <label class="check blue">N</label>
					   	</td>
					  </tr>
					</table>
	        
					</div> <!-- continputs -->
				    
				    </td>
				    <td>
				    	
				    </td>
				  </tr>
				  <tr height="50">
				    <td>
				    
					    <div class="buttonsCont" style="clear: left;">
							<input type="submit" id="buscar" value="Buscar" class="btDark" title="Buscar" />
							
			        	</div>
				    
				    </td>
				    <td>
				    <h2><img src="/images/icons/bullet_go.png" alt="item" title="Item"/> Cantidad de facturas encontradas: <?php echo $this->_tpl_vars['CantidadEncontrados']; ?>
</h2>
				    </td>
				    <td>
				    
				    	
				    
				    </td>
				    <td>
				    
				    	<div class="buttonsCont" style="clear: left;">
				    	<!-- 
							<input type="reset" id="" value="Cobranzas" class="btDark" title="Ver cobranzas" onclick="window.location='/Cobranza/List'"/>
							 -->
			        	</div>
				    
				    </td>
				  </tr>
				</table>
			
            <div id="AnularFactura"></div>
            
            </div><!-- select file -->    