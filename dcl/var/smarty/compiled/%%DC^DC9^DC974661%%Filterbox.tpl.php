<?php /* Smarty version 2.6.26, created on 2014-09-02 10:05:45
         compiled from Backend/Cheque/Filterbox.tpl */ ?>
<!-- date picker -->
<link type="text/css" href="/styles/ui-lightness/jquery-ui-1.8.2.custom.css" rel="stylesheet" />
<script type="text/javascript" src="/scripts/jquery/jquery.ui.datepicker.js"></script>
<script type="text/javascript" src="/scripts/jquery/jquery.ui.core.js"></script>
<script type="text/javascript" src="/scripts/jquery/jquery.ui.widget.js"></script>

<!-- dialog -->
<script type="text/javascript" src="/scripts/jquery/jquery-ui-1.8.4.custom.min.js"></script>
<!-- dialog -->

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
    $("#NombreProveedor").attr(\'value\', $("#NombreProveedor").val().replace("_", " ").replace("_", " ").replace("_", " "));
    $("#NombreCliente").attr(\'value\', $("#NombreCliente").val().replace("_", " ").replace("_", " ").replace("_", " "));
	
	var availableTags = [
							'; ?>
<?php echo $this->_tpl_vars['ArrayProveedores']; ?>
<?php echo '
                 ];


	$("input#NombreProveedor").autocomplete({
	     source: availableTags
	});

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

	$(\'.anular\').click(function() {
		
		var url = $(this).attr(\'href\');
		var r = confirm(\'Esta seguro que desea anular el cheque?\');
		
		if(r)
		{
			$.ajax({
				type: "POST",
				url: url,
				dataType: "text/html",
				success: function(html){
					$("#Anular").html(html);
					//window.location.reload();
				}
			});

			return false;
		}	
		else
			return false;
  	});
    
    $("#Numero").blur(function(){
        if( $(this).val() == \'\' )
            $(this).val( $(this).attr("defaultValue") );
    });

    $("#Numero").focus(function(){
        if( $(this).val() == $(this).attr("defaultValue"))
            $(this).val(\'\');
    });

    
});

function AdvancedSearch()
{
	var Estado	=	$("#estadoId option:selected").val();
    var Numero	=	$("#Numero").val();
	var NombreProveedor	=	$("#NombreProveedor").val();
	var NombreCliente	=	$("#NombreCliente").val();
    var FechaDesde	=	$("#FechaDesde").val();
    var FechaHasta	=	$("#FechaHasta").val();
	

	if( (Estado != \'\') || (Numero != "Numero") 
			|| (NombreProveedor != "Nombre proveedor")
			|| (NombreCliente != "Nombre cliente")
			|| (FechaDesde != "Fecha cobro desde") || (FechaHasta != "Fecha cobro hasta") 
			)
    {
        // url
        var url = \'/Cheque/List/order/Numero_DESC\';
	
		if(NombreProveedor != \'Nombre proveedor\')
		{
			// quitar espacios
			NombreProveedor = NombreProveedor.replace(" ", "_").replace(" ", "_").replace(" ", "_").replace(" ", "_");

			url = url + \'/NombreProveedor/\' + NombreProveedor;
		}

		if(NombreCliente != \'Nombre cliente\')
		{
			// quitar espacios
			NombreCliente = NombreCliente.replace(" ", "_").replace(" ", "_").replace(" ", "_").replace(" ", "_");

			url = url + \'/NombreCliente/\' + NombreCliente;
		}

		if(FechaDesde != \'Fecha cobro desde\')
		{
            FechaDesde = FechaDesde.replace("/", "_").replace("/", "_");
            
			url = url + \'/FechaDesde/\' + FechaDesde;
		}
        
        if(FechaHasta != \'Fecha cobro hasta\')
		{
            FechaHasta  =   FechaHasta.replace("/", "_").replace("/", "_");
			url = url + \'/FechaHasta/\' + FechaHasta;
		}
	
		if(Numero != \'Numero\')
		{
			url = url + \'/Numero/\' + Numero;
		}

		if(Estado != \'\')
		{
			url = url + \'/Estado/\' + escape(Estado);
		}

        //alert(url);
        //var res = encodeURIComponent(url);
        
        window.location	=	url;
    
		return true;
    }
	
	return false;
}


</script>
'; ?>


<div id="Anular"></div>

<!-- dialog confirm -->
	<div id="reglas_aprobacion" title="Reglas para aprobar presupuesto" style="display:none">
	
		<h2>Si acepta la orden pasara a estado "Aprobado"</h2>
		<p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 40px 40px 0;"></span>	
			<ul>
				<li>Verificar fechas comprometidas con los proveedores</li>
				<li>Verificar si es un proyecto que requiera anticipo</li>
				<li>Verificar conformidad de cliente via email</li>
				<li>Verificar firma de prototipo</li>
			</ul>
			
		</p>
	</div>

	        <div class="selectFile" style="clear: left;">
	
		<table height="80" width="60%"  border="0">
  <tr>
    
    <td width="30%">
	
	<div class="contInputs">
		<table width=""  border="0" cellspacing="0">
			  <tr>
			    <td rowspan="3">
			    	<img src="/images/icons/layout_edit.png" alt="Cliente" title="Ingresar nombre del cliente"/>
			    </td>
			    <td>
		
		      
			    </td>
			  </tr>
			  <tr>
			    <td>
				  
		        	<input type="text" value="<?php if ($this->_tpl_vars['filters']['Numero']): ?><?php echo $this->_tpl_vars['filters']['Numero']; ?>
<?php else: ?>Numero<?php endif; ?>" name="filters[Numero]" id="Numero"/>
		      
		
				</td>
			  </tr>
			  <tr>
			    <td>
			    
			    	<select name="filters[Estado]" class="selCategory" id="estadoId">
	                        <option value="">Seleccionar estado</option>
	                        <?php $_from = $this->_tpl_vars['Estados']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['a']):
?>
	                        <option value="<?php echo $this->_tpl_vars['key']; ?>
" <?php if ($this->_tpl_vars['key'] == $this->_tpl_vars['filters']['Estado']): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['a']; ?>
</option>
	                        <?php endforeach; endif; unset($_from); ?>
	                 </select>
			    
			    </td>
			    </tr>
			</table>
    </div>
	
</td>
    
    	<td width="30%">
	
			
		    <table width=""  border="0" cellspacing="0">
			  <tr>
			    <td rowspan="2">  <img src="/images/icons/date.png" title="Seleccionar intervalo de fechas"/></td>
			    <td><input type="text" value="<?php if ($this->_tpl_vars['filters']['FechaDesde']): ?><?php echo $this->_tpl_vars['filters']['FechaDesde']; ?>
<?php else: ?>Fecha cobro desde<?php endif; ?>" name="filters[FechaDesde]" id="FechaDesde"/></td>
			  </tr>
			  <tr>
			    <td><input type="text" value="<?php if ($this->_tpl_vars['filters']['FechaHasta']): ?><?php echo $this->_tpl_vars['filters']['FechaHasta']; ?>
<?php else: ?>Fecha cobro hasta<?php endif; ?>" name="filters[FechaHasta]" id="FechaHasta"/></td>
			  </tr>
			</table>
		    
	    
	    
		</td>
		<td width="30%">
	
			
		    <table width=""  border="0" cellspacing="0">
			  <tr>
			    <td rowspan="2">  <img src="/images/icons/editPerfilModify.png" alt="icon" title="Seleccionar intervalo de ordenes detrabajo"/></td>
			    <td><input type="text" value="<?php if ($this->_tpl_vars['filters']['NombreProveedor']): ?><?php echo $this->_tpl_vars['filters']['NombreProveedor']; ?>
<?php else: ?>Nombre proveedor<?php endif; ?>" name="filters[NombreProveedor]" id="NombreProveedor"/></td>
			  </tr>
			  <tr>
			    <td><input type="text" value="<?php if ($this->_tpl_vars['filters']['NombreCliente']): ?><?php echo $this->_tpl_vars['filters']['NombreCliente']; ?>
<?php else: ?>Nombre cliente<?php endif; ?>" name="filters[NombreCliente]" id="NombreCliente"/></td>
			  </tr>
			</table>
		    
	    
	    
		</td>
        <td width="30%">
        
			<h2><img src="/images/icons/bullet_go.png" alt="item" title="Item"/> Cantidad encontrados: <?php echo $this->_tpl_vars['CantidadEncontrados']; ?>
</h2>
        </td>
  </tr>
  <tr>
    <td width="20%">
    
    <div class="buttonsCont" style="clear: left;">
						<input type="submit" id="buscar" value="Buscar" class="btDark" title="Buscar" />
						
						
		            </div>
    	<!-- 
    	<input type="reset" value="Ver ultimas" class="btDark VerUltimas" title="Ver ultimas ordenes" />
    	 -->
    </td>
    <td width="20%"><div class="contInputs" >
					
		            
		            
				</div></td>
	<td width="20%">
	
	
	</td>
			       	
  </tr>
</table>
			
			<div id="Message">
					<?php if ($this->_tpl_vars['SuccessMessage']): ?><p class="success"><?php echo $this->_tpl_vars['SuccessMessage']; ?>
</p><?php endif; ?>
			</div>	
				
            </div>