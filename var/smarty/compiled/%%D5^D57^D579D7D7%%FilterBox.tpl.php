<?php /* Smarty version 2.6.26, created on 2016-05-05 12:23:34
         compiled from Backend/Orden/ListVentas/FilterBox.tpl */ ?>
<!-- date picker -->
<link type="text/css" href="/styles/ui-lightness/jquery-ui-1.8.2.custom.css" rel="stylesheet" />
<script type="text/javascript" src="/scripts/jquery/jquery.ui.datepicker.js"></script>
<script type="text/javascript" src="/scripts/jquery/jquery.ui.core.js"></script>
<script type="text/javascript" src="/scripts/jquery/jquery.ui.widget.js"></script>

<?php echo '
<script type="text/javascript">
$(document).ready(function(){

	$(\'.VerOrdenDeTrabajo\').click(function() {
        
        var url 		= $(this).attr(\'href\');
        var opciones="toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=yes, width=1000, height=700, top=85, left=140";

		abrirPopUp(url, opciones);

		return false;
    });

	$(\'.Presupuestar\').click(function(){
        var ordenid	= $(this).attr(\'id\');
        var presupuestoid	= $(this).attr(\'presupuesto\');		
        Presupuestar(ordenid, presupuestoid);
        
        return false;
    });

    $(\'.CambiarPrioridad\').change(function(){
        
        var url	=   $(this).attr("href");

		var $selected 	=	$(this).find(\'option:selected\');
		var $prioridadId	=	$selected.val();
			
		if( $prioridadId > 0 )
		{
			SetPrioridad(url, $prioridadId);
		}
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
    
    $("#NombreCliente").blur(function(){
        if( $(this).val() == \'\' )
            $(this).val( $(this).attr("defaultValue") );
    });

    $("#NombreCliente").focus(function(){
        if( $(this).val() == $(this).attr("defaultValue"))
            $(this).val(\'\');
    });

    $("#inicio").blur(function(){
        if( $(this).val() == \'\' )
            $(this).val( $(this).attr("defaultValue") );
    });

    $("#inicio").focus(function(){
        if( $(this).val() == $(this).attr("defaultValue"))
            $(this).val(\'\');
    });

    $("#fin").blur(function(){
        if( $(this).val() == \'\' )
            $(this).val( $(this).attr("defaultValue") );
    });

    $("#fin").focus(function(){
        if( $(this).val() == $(this).attr("defaultValue"))
            $(this).val(\'\');
    });
});

function Presupuestar(OrdenId, PresupuestoId)
{
	if(OrdenId > 0)
	{
		var url	=	\'/Presupuesto/Edit/popup/true/OrdenId/\' + OrdenId;

		if(PresupuestoId > 0)
			url	=	url + \'/id/\' + PresupuestoId;
	    
		var opciones="toolbar=no, location=no, directories=no, status=no, menubar=yes, scrollbars=yes, resizable=yes, width=1000, height=700, top=85, left=140";
	
		abrirPopUp(url, opciones);        
	}
	else
		alert(\'El numero de orden no es correcto\');
}

function reload()
{
	//window.location.reload();
	$(\'#frmAction\').submit();
}

function abrirPopUp(pagina, opciones)
{
	window.open(pagina,"",opciones);
}

function SetPrioridad(url, $prioridadId)
{
	if($prioridadId > 0)
	{
		
		url	=	url + \'/PrioridadId/\' + $prioridadId + \'/Ventas/SI\';
	    
	    window.location	= url;
	}
}
</script>
'; ?>



	        <div class="selectFile" style="clear: left;">
	
		<table height="80" width="60%"  border="0">
  <tr>
    <td width="30%">
	
	<div class="contInputs">
    
    <table width=""  border="0" cellspacing="0">
	  <tr>
	    <td rowspan="2">  <img src="/images/icons/date.png" alt="Ordenes" title="Seleccionar intervalo de ordenes detrabajo"/></td>
	    <td><input type="text" value="<?php if ($this->_tpl_vars['filters']['OrdenDeTrabajoIdInicio']): ?><?php echo $this->_tpl_vars['filters']['OrdenDeTrabajoIdInicio']; ?>
<?php else: ?>Orden inicial<?php endif; ?>" name="filters[OrdenDeTrabajoIdInicio]" id="inicio"/></td>
	  </tr>
	  <tr>
	    <td><input type="text" value="<?php if ($this->_tpl_vars['filters']['OrdenDeTrabajoIdFinal']): ?><?php echo $this->_tpl_vars['filters']['OrdenDeTrabajoIdFinal']; ?>
<?php else: ?>Orden final<?php endif; ?>" name="filters[OrdenDeTrabajoIdFinal]" id="fin"/></td>
	  </tr>
	</table>
    
    
    
</td>
    <td width="30%">
	
	<div class="contInputs">
    
    <table width=""  border="0" cellspacing="0">
	  <tr>
	    <td rowspan="2">  <img src="/images/icons/date.png" title="Seleccionar intervalo de fechas"/></td>
	    <td><input type="text" value="<?php if ($this->_tpl_vars['filters']['FechaDesde']): ?><?php echo $this->_tpl_vars['filters']['FechaDesde']; ?>
<?php else: ?>Fecha factura desde<?php endif; ?>" name="filters[FechaDesde]" id="FechaDesde"/></td>
	  </tr>
	  <tr>
	    <td><input type="text" value="<?php if ($this->_tpl_vars['filters']['FechaHasta']): ?><?php echo $this->_tpl_vars['filters']['FechaHasta']; ?>
<?php else: ?>Fecha factura hasta<?php endif; ?>" name="filters[FechaHasta]" id="FechaHasta"/></td>
	  </tr>
	</table>
    
    
    
</td>
    <td width="30%">
	
	<div class="contInputs">
    

    
    
    <table width=""  border="0" cellspacing="0">
	  <tr>
	    <td rowspan="2">
	    	<img src="/images/icons/report_go.png" alt="Estado" title="Seleccionar estado actual de una orden"/>
	    </td>
	    <td>
	      <!-- drop down -->
    <?php echo $this->_tpl_vars['filters']['EstadoOrdenDeTrabajoId']; ?>

      				<select name="filters[EstadoOrdenTrabajoId]" class="selCategory" id=""  title="Seleccionar estado actual de una orden">
	                        <option value="">Seleccionar estado</option>
	                        <?php $_from = $this->_tpl_vars['EstadosOrden']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['a']):
?>
	                        <option value="<?php echo $this->_tpl_vars['a']['Id']; ?>
" <?php if ($this->_tpl_vars['a']['Id'] == $this->_tpl_vars['filters']['EstadoOrdenTrabajoId']): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['a']['Nombre']; ?>
</option>
	                        <?php endforeach; endif; unset($_from); ?>
	                 </select>
      
	    </td>
	  </tr>
	  <tr>
	    <td></td>
	  </tr>
	</table>
    
    </div>
	
</td>
    
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
				  
		        <input type="text" value="<?php if ($this->_tpl_vars['filters']['NombreCliente']): ?><?php echo $this->_tpl_vars['filters']['NombreCliente']; ?>
<?php elseif ($this->_tpl_vars['NombreCliente']): ?><?php echo $this->_tpl_vars['NombreCliente']; ?>
<?php else: ?>Nombre cliente<?php endif; ?>" name="filters[NombreCliente]" id="NombreCliente"/>
		        
		      
		
				</td>
			  </tr>
			  <tr>
			    <td>&nbsp;</td>
			    </tr>
			</table>
    </div>		
        </td>
  </tr>
  <tr>
    <td width="20%"></td>
    <td width="20%"><div class="contInputs" >
					
		            <div class="buttonsCont" style="clear: left;">
						<input type="submit" id="buscar" value="Buscar" class="btDark" title="Buscar" />
						
								
		            </div>
		            
				</div></td>
	<td width="20%">
	
	
	</td>
			       	
  </tr>
</table>
			
<table border="0" cellspacing="0">
  <tr>
    <td>
					<ul class="statsList">
                        <li>
                            <h1 class="big">$ <?php echo $this->_tpl_vars['Resumen']['TotalCostos']; ?>
</h1>
                            <h2 title="Costo de insumos elegidos">Total de costos</h2>
                            <p><img src="/images/icons/help.png" alt="item" title="Costo de insumos elegidos"/></p>
                        </li>
                    </ul> <!-- /statsList -->    
    </td>
    <td>
                    <ul class="statsList">
                        <li>
                            <h1 class="big">$ <?php echo $this->_tpl_vars['Resumen']['TotalPrecioVenta']; ?>
</h1>
                            <h2>Total de precios de venta</h2>
                            <p><img src="/images/icons/help.png" alt="item" title="Asignado a las Ordenes de trabajo"/></p>
                        </li>
                    </ul> <!-- /statsList -->    
    </td>
    <td>
                	<ul class="statsList">
                        <li>
                            <h1 class="big">$ <?php echo $this->_tpl_vars['Resumen']['TotalGanancia']; ?>
</h1>
                            <h2>Ganancia total</h2>
                            <p><img src="/images/icons/help.png" alt="item" title="Precios de venta menos costos de insumos elegidos"/></p>
                        </li>
                    </ul> <!-- /statsList -->    
    </td>
    <td>
                	<ul class="statsList">
                        <li>
                            <h1 class="big"><?php echo $this->_tpl_vars['Resumen']['CantidadOrdenesEncontradas']; ?>
</h1>
                            <h2>Ordenes encontradas</h2>
                        </li>
                    </ul> <!-- /statsList -->    
    </td>
    
  </tr>
</table>
		       	
		       	<p><img src="/images/icons/help.png" alt="item" title="Item"/> Todos los costos son tomados a partir de Ordenes de Trabajo con fecha de inicio <?php echo $this->_tpl_vars['Resumen']['FechaDesde']; ?>
</p>
		       	
			<div id="Message"></div>	
	
            </div>