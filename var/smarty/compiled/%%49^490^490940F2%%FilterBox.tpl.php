<?php /* Smarty version 2.6.26, created on 2016-05-03 09:13:47
         compiled from Backend/OrdenPago/FilterBox.tpl */ ?>
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

    $(\'.popup\').click(function() {
         var url 		= $(this).attr(\'href\');
         var opciones="toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=yes, width=1000, height=700, top=85, left=140";
 		abrirPopUp(url, opciones);

 		return false;
     });
  	
	$("#proveedor_autocomplete").blur(function(){
	    if( $(this).val() == \'\' )
	        $(this).val( $(this).attr("defaultValue") );
	});
	
	$("#proveedor_autocomplete").focus(function(){
	    if( $(this).val() == $(this).attr("defaultValue"))
	        $(this).val(\'\');
	});

	$("#OrdenDePagoId").blur(function(){
	    if( $(this).val() == \'\' )
	        $(this).val( $(this).attr("defaultValue") );
	});
	
	$("#OrdenDePagoId").focus(function(){
	    if( $(this).val() == $(this).attr("defaultValue"))
	        $(this).val(\'\');
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

    
    var availableTags = [
							'; ?>
<?php echo $this->_tpl_vars['ArrayProveedores']; ?>
<?php echo '
                    ];
 
    $("input#proveedor_autocomplete").autocomplete({
        source: availableTags,
        select: function(e, ui) {
			var valor = ui.item.value;
			SetProveedorSeleccionar(valor);
		} 
    });    

    SetProveedorInitTextValue();
    
    $("#ProveedorId").hide();


    $(\'.Anular\').click(function() {
        var r = confirm(\'Esta seguro que desea anular la orden de pago?\');

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

				window.location.reload();
				

			}
	
		});
	}
}


function SetProveedorSeleccionar(NombreProveedor)
{
	inputText	=	NombreProveedor;
	// setear valor select selected por texto de option / set option selected by text
	//$("#"+dropdown_id+" option:contains(" + inputText + ")").attr(\'selected\', \'selected\');
	
	$("#ProveedorId option").each(function () {
        if ($(this).html() == inputText) {
            $(this).attr("selected", "selected");
            return;
        }
	});

	$("#ProveedorId").hide();
	
}

function SetProveedorInitTextValue()
{
	NombreProveedor = GetSelectedTextValue("ProveedorId");
	
	$("input#proveedor_autocomplete").val(NombreProveedor);
}

function GetSelectedTextValue(dropdownid)
{
	var $selected 	=	$("#"+dropdownid).find(\'option:selected\');
	var $selectedtext	=	$selected.html();

	return $selectedtext;
}

function abrirPopUp(pagina, opciones)
{
	window.open(pagina,"",opciones);
}

function AdvancedSearch()
{
    var FechaDesde	=	$("#FechaDesde").val();
    var FechaHasta	=	$("#FechaHasta").val();
    var OrdenDePagoId	=	$("#OrdenDePagoId").val();    
    var ProveedorId	=	$("#ProveedorId option:selected").val();
    var TipoA	=	$("#TipoA:checked").val();
    var TipoB	=	$("#TipoB:checked").val();
    var TipoN	=	$("#TipoN:checked").val();

	if( (FechaDesde != "Fecha desde") || (FechaHasta != "Fecha hasta") 
			 || (OrdenDePagoId != "Orden de pago") || (ProveedorId != "")
			 || (TipoA == "A")
			|| (TipoB == "B")
			|| (TipoN == "N")
			)
    {   
        var url = \'/OrdenPago/List/order/Fecha_DESC\';
        
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

		if(ProveedorId != \'\')
		{
			url	=	url + \'/ProveedorId/\' + ProveedorId;
		}

		if(OrdenDePagoId != \'Orden de pago\')
		{
			url	=	url + \'/OrdenDePagoId/\' + OrdenDePagoId;
		}

		if(TipoA)
		{
			url	=	url + \'/Tipo/\' + TipoA;
		}

		if(TipoB)
		{
			url	=	url + \'/Tipo/\' + TipoB;
		}

		if(TipoN)
		{
			url	=	url + \'/Tipo/\' + TipoN;
		}
		
        window.location	=	url;
    	
		return true;
    }
    /*
	else
	{
		$(\'#Message\').html(\'<p class="error">Debe ingresar un campo de busqueda antes de buscar</p>\');
	}
	*/
	
	return false;
}

</script>
'; ?>



	        <div class="selectFile" style="clear: left;">
	
		<table width="60%"  border="0">
  <tr height="50">
    <td width="30%">
	
	<div class="contInputs">
    
    <table width=""  border="0" cellspacing="0">
	  <tr>
	    <td rowspan="2">  <img src="/images/icons/date.png" title="Seleccionar intervalo de fechas"/></td>
	    <td><input type="text" value="<?php if ($this->_tpl_vars['FechaDesde']): ?><?php echo $this->_tpl_vars['FechaDesde']; ?>
<?php else: ?>Fecha desde<?php endif; ?>" name="FechaDesde" id="FechaDesde"/></td>
	  </tr>
	  <tr>
	    <td><input type="text" value="<?php if ($this->_tpl_vars['FechaHasta']): ?><?php echo $this->_tpl_vars['FechaHasta']; ?>
<?php else: ?>Fecha hasta<?php endif; ?>" name="FechaHasta" id="FechaHasta"/></td>
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
	    
	    <input id="proveedor_autocomplete" />
	      <!-- drop down -->
    
      <select name="ProveedorId" class="required" id="ProveedorId">
      
        		<option value="">Proveedor</option>
        
               <?php $_from = $this->_tpl_vars['Proveedores']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['c']):
?>
        			<option value="<?php echo $this->_tpl_vars['c']['Id']; ?>
" <?php if (( $this->_tpl_vars['c']['Id'] == $this->_tpl_vars['ProveedorId'] )): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['c']['Nombre']; ?>
</option>
               <?php endforeach; endif; unset($_from); ?>
                    
      </select>
      
	    </td>
	  </tr>
	  <tr>
	    <td><input type="text" value="<?php if ($this->_tpl_vars['OrdenDePagoId']): ?><?php echo $this->_tpl_vars['OrdenDePagoId']; ?>
<?php else: ?>Orden de pago<?php endif; ?>" name="OrdenDePagoId" id="OrdenDePagoId" title="Ingrese el numero de orden de pago"/></td>
	  </tr>
	</table>
    
    </div>
	
</td>
    <td width="30%">
	
	<div class="contInputs">
    

    
    
    <table width=""  border="0" cellspacing="0">
	  <tr>
	    <td rowspan="2">
	    	<img src="/images/icons/report_go.png" title="Ingresar valores para buscar"/>
	    </td>
	    <td>
	
      
	    </td>
	  </tr>
	  <tr>
	    <td>
	    	<tr>
			  	<td align="center">
				                    <input class="check" id="TipoB" type="radio" name="filters[Tipo]" value="B" <?php if ($this->_tpl_vars['Tipo'] == 'B'): ?>checked="checked"<?php endif; ?>/>
				                    <label class="check blue">B</label>
				                    <input class="check" id="TipoN" type="radio" name="filters[Tipo]" value="N" <?php if ($this->_tpl_vars['Tipo'] == 'N'): ?>checked="checked"<?php endif; ?>/>
				                    <label class="check blue">N</label>
				</td>
			  </tr>
	    </td>
	  </tr>
	</table>
    
    </div>
	
</td>

  </tr>
  <tr>
    <td width="20%">

	    		 
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
            
<h2><img src="/images/icons/bullet_go.png" alt="item" title="Item"/>  Cantidad encontrados: <?php if ($this->_tpl_vars['Cantidad'] > 0): ?><?php echo $this->_tpl_vars['Cantidad']; ?>
<?php else: ?>0<?php endif; ?></h2>

<p><img src="/images/icons/help.png" alt="item" title="Item"/>  Para saber el importe abonado a un proveedor seleccionar el proveedor y periodo</p>           