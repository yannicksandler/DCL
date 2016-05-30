<?php /* Smarty version 2.6.26, created on 2014-09-17 17:28:10
         compiled from Backend/Cobranza/FilterBox.tpl */ ?>
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
    	
  	  	return true;
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

    $("#OrdenDePagoId").blur(function(){
        if( $(this).val() == \'\' )
            $(this).val( $(this).attr("defaultValue") );
    });

    $("#OrdenDePagoId").focus(function(){
        if( $(this).val() == $(this).attr("defaultValue"))
            $(this).val(\'\');
    });

    $(\'.Anular\').click(function() {
        var r = confirm(\'Esta seguro que desea anular la cobranza?\');

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
				alert(\'Cobranza anulada\');

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
        var url = \'/Cobranza/List/order/Fecha_DESC\';
        
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

		if(ClienteId != \'\')
		{
			url	=	url + \'/ClienteId/\' + ClienteId;
		}

		if(CobranzaNumero != \'Cobranza\')
		{
			url	=	url + \'/Numero/\' + CobranzaNumero;
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
	      <!-- drop down -->
    
      <select name="ClienteId" class="required" id="ClienteId">
      
        		<option value="">Clientes</option>
        
               <?php $_from = $this->_tpl_vars['Clientes']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['c']):
?>
                       
        			<option value="<?php echo $this->_tpl_vars['c']['Id']; ?>
" <?php if (( $this->_tpl_vars['c']['Id'] == $this->_tpl_vars['ClienteId'] )): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['c']['Nombre']; ?>
</option>
        
               <?php endforeach; endif; unset($_from); ?>
                    
      </select>
      
	    </td>
	  </tr>
	  <tr>
	    <td><input type="text" value="<?php if ($this->_tpl_vars['CobranzaNumero']): ?><?php echo $this->_tpl_vars['CobranzaNumero']; ?>
<?php else: ?>Cobranza<?php endif; ?>" name="CobranzaId" id="CobranzaNumero" title="Ingrese el numero de cobranza"/></td>
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
                            <h1 class="big">$ <?php echo $this->_tpl_vars['Resumen']['TotalPagos']; ?>
</h1>
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
            
<h2><img src="/images/icons/bullet_go.png" alt="item" title="Item"/>  Cantidad encontrados: <?php if ($this->_tpl_vars['Cantidad'] > 0): ?><?php echo $this->_tpl_vars['Cantidad']; ?>
<?php else: ?>0<?php endif; ?></h2>
<p><img src="/images/icons/help.png" alt="item" title="Item"/>  Para saber el importe cobrado de un cliente en un periodo buscar por cliente y periodo a saber importe</p>           