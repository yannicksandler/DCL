<?php /* Smarty version 2.6.26, created on 2014-09-16 11:29:37
         compiled from Backend/Insumo/FilterBox.tpl */ ?>
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

	$(\'.VerOrdenDeTrabajo\').click(function() {
        
        var url 		= $(this).attr(\'href\');
        var opciones="toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=yes, width=1000, height=700, top=85, left=140";

		abrirPopUp(url, opciones);

		return false;
    });
  	

    $("#NombreProveedor").attr(\'value\', $("#NombreProveedor").val().replace("_", " ").replace("_", " "));
    $("#NombreCliente").attr(\'value\', $("#NombreCliente").val().replace("_", " ").replace("_", " "));

    $("#NombreProveedor").blur(function(){
        if( $(this).val() == \'\' )
            $(this).val( $(this).attr("defaultValue") );
    });

    $("#NombreProveedor").focus(function(){
        if( $(this).val() == $(this).attr("defaultValue"))
            $(this).val(\'\');
    });

    $("#NombreCliente").blur(function(){
        if( $(this).val() == \'\' )
            $(this).val( $(this).attr("defaultValue") );
    });

    $("#NombreCliente").focus(function(){
        if( $(this).val() == $(this).attr("defaultValue"))
            $(this).val(\'\');
    });

    $("#OrdenId").blur(function(){
        if( $(this).val() == \'\' )
            $(this).val( $(this).attr("defaultValue") );
    });

    $("#OrdenId").focus(function(){
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
    var OrdenId	=	$("#OrdenDeTrabajoId").val();
    var Nombre	=	$("#NombreProveedor").val();
    var NombreCliente	=	$("#NombreCliente").val();
    var TipoA	=	$("#TipoA:checked").val();
    var TipoB	=	$("#TipoB:checked").val();
    var TipoN	=	$("#TipoN:checked").val();

	if( (FechaDesde != "Fecha desde") || (FechaHasta != "Fecha hasta") 
			|| (FacturaNumero != "Nro de factura")
			|| (OrdenId != "Nro de orden") 
			|| (Nombre != "Nombre proveedor")
			|| (TipoA == "A")
			|| (TipoB == "B")
			|| (TipoN == "N")
		)
    {
        // url
        
        var url = \'/Insumo/ListPendientesDePago\';
       
		if(OrdenId != \'Nro de orden\')
		{
			url	=	url + \'/OrdenDeTrabajoId/\' + OrdenId;
		}

		if(Nombre != \'Nombre proveedor\')
		{
			Nombre = Nombre.replace(" ", "_").replace(" ", "_");
			
			url	=	url + \'/ProveedorNombre/\' + Nombre;
		}

		if(NombreCliente != \'Nombre cliente\')
		{
			NombreCliente = NombreCliente.replace(" ", "_").replace(" ", "_");
			
			url	=	url + \'/ClienteNombre/\' + NombreCliente;
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


	        <div class="selectFile" style="clear: left;">
	        
		        <table border="0" cellspacing="0">
				  <tr height="50">
	
				    <td>
				    
				    <div class="contInputs" style="clear: left;">
	        	
	        		<table width=""  border="0" cellspacing="0">
					  <tr>
					    <td rowspan="2">  <img src="/images/icons/editPerfilModify.png" /></td>
					    <td><input type="text" value="<?php if ($this->_tpl_vars['ProveedorNombre']): ?><?php echo $this->_tpl_vars['ProveedorNombre']; ?>
<?php else: ?>Nombre proveedor<?php endif; ?>" name="filters[NombreProveedor]" id="NombreProveedor"/></td>
					  </tr>
					  <tr>
					    <td><input type="text" value="<?php if ($this->_tpl_vars['OrdenDeTrabajoId']): ?><?php echo $this->_tpl_vars['OrdenDeTrabajoId']; ?>
<?php else: ?>Nro de orden<?php endif; ?>" name="filters[OrdenDeTrabajoId]" id="OrdenDeTrabajoId"/></td>
					  </tr>
					</table>
	        
					</div> <!-- continputs -->
				    
				    </td>
				    <td>
			
				    <div class="contInputs" style="clear: left;">
	        	
	        		<table width=""  border="0" cellspacing="0">
					  <tr>
					    <td rowspan="2">  <img src="/images/icons/editPerfilModify.png" /></td>
					    <td><input type="text" value="<?php if ($this->_tpl_vars['ClienteNombre']): ?><?php echo $this->_tpl_vars['ClienteNombre']; ?>
<?php else: ?>Nombre cliente<?php endif; ?>" name="filters[NombreCliente]" id="NombreCliente"/></td>
					  </tr>
					  <tr>
					    <td></td>
					  </tr>
					</table>
	        
					</div> <!-- continputs -->	    
			
				    </td>
				    <td>
				    
				    <div class="contInputs" style="clear: left;">
	        	
	        
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
				  </tr>
				</table>
			
            </div><!-- select file -->    