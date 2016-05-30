<?php /* Smarty version 2.6.26, created on 2016-04-29 13:34:39
         compiled from Backend/OrdenCompra/FilterBox.tpl */ ?>
<!-- date picker -->
<link type="text/css" href="/styles/ui-lightness/jquery-ui-1.8.2.custom.css" rel="stylesheet" />
<script type="text/javascript" src="/scripts/jquery/jquery.ui.datepicker.js"></script>
<script type="text/javascript" src="/scripts/jquery/jquery.ui.core.js"></script>
<script type="text/javascript" src="/scripts/jquery/jquery.ui.widget.js"></script>


<?php echo '
<script type="text/javascript">
$(document).ready(function(){

    var availableTags = [
							'; ?>
<?php echo $this->_tpl_vars['ArrayProveedores']; ?>
<?php echo '
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
 
	$(\'.VerOrdenDeTrabajo\').click(function() {
        
        var url 		= $(this).attr(\'href\');
        var opciones="toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=yes, width=1000, height=700, top=85, left=140";

		abrirPopUp(url, opciones);

		return false;
    });

    $(\'#frmAction\').submit(function() {
		
    	if(AdvancedSearch())
			return false;

    	return false;
  	});
    
    $(\'.CrearOrdenDePago\').click(function() {
        
		var c = confirm(\'Esta seguro que desea crear una orden de pago ?\')
		
		if(c)
			return true;
		
  	  	return false;
  	});
  	    
    $(\'.AbrirPopup\').click(function() {
        
		var pagina	= $(this).attr(\'href\');

		var opciones="toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=yes, width=1000, height=700, top=85, left=140";

		abrirPopUp(pagina, opciones);

  	  	return false;
  	});

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
    
    $("#FechaDesde").attr(\'value\', $("#FechaDesde").val().replace("_", "/").replace("_", "/"));
    $("#FechaHasta").attr(\'value\', $("#FechaHasta").val().replace("_", "/").replace("_", "/"));
    $("#NombreProveedor").attr(\'value\', $("#NombreProveedor").val().replace("_", " ").replace("_", " ").replace("_", " ").replace("_", " "));
    
    $("#NombreProveedor").blur(function(){
        if( $(this).val() == \'\' )
            $(this).val( $(this).attr("defaultValue") );
    });

    $("#NombreProveedor").focus(function(){
        if( $(this).val() == $(this).attr("defaultValue"))
            $(this).val(\'\');
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
        var url = \'/OrdenCompra/List\';
		
		if(OrdenDeCompraId != \'Orden de compra\')
		{
			url = url + \'/OrdenDeCompraId/\' + OrdenDeCompraId;
		}

		if(NombreProveedor != \'Nombre proveedor\')
		{
			// quitar espacios
			NombreProveedor = NombreProveedor.replace(" ", "_").replace(" ", "_").replace(" ", "_").replace(" ", "_");

			url = url + \'/NombreProveedor/\' + NombreProveedor;
		}

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
'; ?>

	       	
	       	<form id="frmAction" action="" method="post">
	       	
	       	
	        
	        	<div class="contInputs" style="clear: left;">
	
		            <input type="text" value="<?php if ($this->_tpl_vars['FechaDesde']): ?><?php echo $this->_tpl_vars['FechaDesde']; ?>
<?php else: ?>Fecha desde<?php endif; ?>" name="FechaDesde" id="FechaDesde"/>
                    
                    <input type="text" value="<?php if ($this->_tpl_vars['FechaHasta']): ?><?php echo $this->_tpl_vars['FechaHasta']; ?>
<?php else: ?>Fecha hasta<?php endif; ?>" name="FechaHasta" id="FechaHasta"/>

		            
				</div>
				<div class="contInputs" style="clear: left;">	            
                	<input type="text" value="<?php if ($this->_tpl_vars['NombreProveedor']): ?><?php echo $this->_tpl_vars['NombreProveedor']; ?>
<?php else: ?>Nombre proveedor<?php endif; ?>" name="NombreProveedor" id="NombreProveedor"/>    
		            <input type="text" value="<?php if ($this->_tpl_vars['OrdenDeCompraId']): ?><?php echo $this->_tpl_vars['OrdenDeCompraId']; ?>
<?php else: ?>Orden de compra<?php endif; ?>" name="OrdenDeCompraId" id="OrdenDeCompraId"/>
				</div>
				<div class="contInputs" style="clear: left;">	            
                	    
		            <input type="text" value="<?php if ($this->_tpl_vars['OrdenDePagoId']): ?><?php echo $this->_tpl_vars['OrdenDePagoId']; ?>
<?php else: ?>Orden de pago<?php endif; ?>" name="OrdenDePagoId" id="OrdenDePagoId"/>
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
	            
	            <h2><img src="/images/icons/bullet_go.png" alt="item" title="Item"/>  Cantidad encontrados: <?php if ($this->_tpl_vars['Cantidad'] > 0): ?><?php echo $this->_tpl_vars['Cantidad']; ?>
<?php else: ?>0<?php endif; ?></h2>
            </form>    