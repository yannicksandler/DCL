<?php /* Smarty version 2.6.26, created on 2016-05-05 12:41:17
         compiled from Backend/Orden/FilterBox.tpl */ ?>
<!-- date picker -->
<link type="text/css" href="/styles/ui-lightness/jquery-ui-1.8.2.custom.css" rel="stylesheet" />
<script type="text/javascript" src="/scripts/jquery/jquery.ui.datepicker.js"></script>
<script type="text/javascript" src="/scripts/jquery/jquery.ui.core.js"></script>
<script type="text/javascript" src="/scripts/jquery/jquery.ui.widget.js"></script>


<?php echo '
<script type="text/javascript">
$(document).ready(function(){
	
    $(\'#frmAction\').submit(function() {

    	var FechaCambio	=	$("#FechaCambio").val();
    	if(FechaCambio != \'Fecha cambio\')
        	return true;
    	
        if (	isChangeValues()  )
        {
        	return false;
        }

  	  	return false;
  	});

    $(\'.VerUltimas\').click(function(){
        var url	=	\'/Orden/List/order/Id_DESC\';
        
    	var cliente	=   $(\'#NombreCliente\').val();
    	if(cliente != \'Nombre cliente\')
    	{
			url = url + \'/NombreCliente/\' + cliente;
    	}
        	
		window.location = url;
		
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

    ConvertDescripcion();


    $("#NombreCliente").blur(function(){
        if( $(this).val() == \'\' )
            $(this).val( $(this).attr("defaultValue") );
    });

    $("#NombreCliente").focus(function(){
        if( $(this).val() == $(this).attr("defaultValue"))
            $(this).val(\'\');
    });
    
    $(\'#FechaCambio\').datepicker({
		changeMonth: true,
		changeYear: true,
        dateFormat: \'dd/mm/yy\'
	});
});

function ConvertDescripcion()
{
	var start	=	0;
	var length	=	25;

	var d	=	$(\'a.Descripcion\');

	d.each(function(){
		
		var descripcion	=	$(this).text();
		descripcion.substr(start,length);
		$(this).text(descripcion.substr(start,length) + \' ...\');
	});
	
}

function SetPrioridad(url, $prioridadId)
{
	if($prioridadId > 0)
	{
		url	=	url + \'/PrioridadId/\' + $prioridadId + \'/order/PrioridadId_DESC\';
	    
	    window.location	= url;
	}
}

function isChangeValues()
{
	var EstadoId	=	$("#estadoId option:selected").val();
	var PrioridadId	=	$("#PrioridadId option:selected").val();
	var NombreCliente	=	$("#NombreCliente").val();
    var OrdenDeTrabajoId	=	$("#OrdenDeTrabajoId").val();
    
	

	if( EstadoId || (NombreCliente != "Nombre cliente") || OrdenDeTrabajoId || PrioridadId)
    {
        // url
        var url = \'/Orden/List/order/PrioridadId_DESC\';
		
		if(OrdenDeTrabajoId != \'Nro de orden\')
		{
			url = url + \'/OrdenDeTrabajoId/\' + OrdenDeTrabajoId;
		}

		if(EstadoId != \'\')
		{
			url = url + \'/EstadoOrdenTrabajoId/\' + EstadoId;
		}

		if(PrioridadId)
		{
			url = url + \'/PrioridadId/\' + PrioridadId;
		}
		
		if(NombreCliente != \'Nombre cliente\')
		{
			// quitar espacios
			NombreCliente = NombreCliente.replace(" ", "_").replace(" ", "_").replace(" ", "_").replace(" ", "_");

			url = url + \'/NombreCliente/\' + escape(NombreCliente);
		}
        //alert(url);
        window.location	=	url;
    
		return true;
    }
	
	return false;
}


</script>
'; ?>

	       	
	       	<form id="frmAction" action="" method="post">
	        <p>
				<div class="contInputs" style="clear: left;">
	                
	                <select name="EstadoOrdenTrabajoId" class="selCategory" id="estadoId">
	                        <option value="">Seleccionar estado</option>
	                        <?php $_from = $this->_tpl_vars['EstadosOrden']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['a']):
?>
	                        <option value="<?php echo $this->_tpl_vars['a']['Id']; ?>
" <?php if ($this->_tpl_vars['a']['Id'] == $this->_tpl_vars['OrdenEstadoId']): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['a']['Nombre']; ?>
</option>
	                        <?php endforeach; endif; unset($_from); ?>
	                 </select>
	                 
	                 <input type="text" value="<?php if ($this->_tpl_vars['NombreCliente']): ?><?php echo $this->_tpl_vars['NombreCliente']; ?>
<?php else: ?>Nombre cliente<?php endif; ?>" name="NombreCliente" id="NombreCliente"/>
	                 
	                 <input type="text" value="<?php if ($this->_tpl_vars['OrdenDeTrabajoId']): ?><?php echo $this->_tpl_vars['OrdenDeTrabajoId']; ?>
<?php else: ?>Nro de orden<?php endif; ?>" name="OrdenDeTrabajoId" id="OrdenDeTrabajoId"/>
	                 
	                 <select href="/<?php echo $this->_tpl_vars['varController']; ?>
/SetPrioridad/OrdenId/<?php echo $this->_tpl_vars['record']['Id']; ?>
" id="PrioridadId" name="PrioridadId">
		                        <option value="">Prioridad</option>
		                        <?php $_from = $this->_tpl_vars['Prioridades']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['p']):
?>
		                        <option value="<?php echo $this->_tpl_vars['p']['Id']; ?>
" <?php if ($this->_tpl_vars['p']['Id'] == $this->_tpl_vars['SelectedPrioridadId']): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['p']['Nombre']; ?>
</option>
		                        <?php endforeach; endif; unset($_from); ?>
		             </select>
		             
		             <input type="text" value="<?php if ($this->_tpl_vars['FechaCambio']): ?><?php echo $this->_tpl_vars['FechaCambio']; ?>
<?php else: ?>Fecha cambio<?php endif; ?>" name="FechaCambio" id="FechaCambio" title="Selecciona ordenes con fecha de proximo cambio de estado iguales o mayores a la fecha seleccionada"/>
		       	</div>
		       	</p>
		       	<p> <br></br></p>
		       	<div class="contInputs" >

		            <div class="buttonsCont" style="clear: left;">
						<input type="submit" value="Buscar" class="btDark" title="Buscar" />
						<input type="reset" value="Ver ultimas" class="btDark VerUltimas" title="Ver ultimas. Si ingresa el nombre de un cliente puede ver las ultimas ordenes de un cliente. Sino ultimas de todos los clientes" />
		            </div>
		            
				</div>
				
				<input type="hidden" name="updateNewValue" id="updateValue" value="" />
	            <input type="hidden" name="postAction" id="action" value="" />
	            <input type="hidden" name="listAction" id="listAction" value="list" />
            </form>    