<?php /* Smarty version 2.6.26, created on 2016-05-05 13:19:11
         compiled from Backend/Orden/ListPreproduccion/FilterBox.tpl */ ?>
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

	$(\'.AprobarPresupuesto\').click(function(){
        var presupuestoid = $(this).attr(\'presupuestoid\');
        
        VerReglasAprobacion(presupuestoid);
		//AprobarPresupuesto(presupuestoid);
		return false;
    });
    
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

	
    $(\'.VerUltimas\').click(function(){
        var url	=	\'/Orden/ListCotizaciones/order/Id_DESC/popup/true\';
        
		window.location = url;
		
    });

    $(\'.VerComentario\').click(function(){
        var comentarioid = $(this).attr(\'id\');
        
		VerComentario("dialog_"+comentarioid);
		
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

function AprobarPresupuesto(presupuestoid)
{
	if(presupuestoid > 0)
	{
		var url	=	\'/Presupuesto/Aprobar/PresupuestoId/\' + presupuestoid;

		window.location = url;
        
	}
	else
		alert(\'El numero de presupuesto no es correcto\');	
}

function abrirPopUp(pagina, opciones)
{
	// agregar /popup/true y por get el un helper setea
	window.open(pagina,"",opciones);
}
function reload()
{
	//window.location.reload();
	$(\'#frmAction\').submit();
}
function VerComentario(comentarioid)
{
	var id = "#"+comentarioid;
	
	$(id).dialog({
		resizable: true,
		height:200,
		width: 400, 
		modal: true,
		buttons: {
			\'Aceptar\': function() {
				$(this).dialog(\'close\');
			}
		}
	});
}

function VerReglasAprobacion(presupuestoid)
{
	if(presupuestoid > 0)
	{
		$(\'#reglas_aprobacion\').dialog({
			resizable: true,
			height:200,
			width: 400, 
			modal: true,
			buttons: {
				\'Aceptar\': function() {
					AprobarPresupuesto(presupuestoid)
					$(this).dialog(\'close\')
				},
				\'Cancelar\': function() {
					$(this).dialog(\'close\');
				}
			}
		});
	}
	else
		alert(\'Error: No existe el presupuesto ingresado\');
}

</script>
'; ?>


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
			    <td rowspan="3">
			    	<img src="/images/icons/layout_edit.png" alt="Cliente" title="Ingresar nombre del cliente"/>
			    </td>
			    <td>
		
		      
			    </td>
			  </tr>
			  <tr>
			    <td>
				  
		        <input type="text" value="<?php if ($this->_tpl_vars['filters']['NombreCliente']): ?><?php echo $this->_tpl_vars['filters']['NombreCliente']; ?>
<?php else: ?>Nombre cliente<?php endif; ?>" name="filters[NombreCliente]" id="NombreCliente"/>
		        
		      
		
				</td>
			  </tr>
			  <tr>
			    <td>
			    
			    </td>
			    </tr>
			</table>
    </div>
	
</td>
    
        <td width="30%">
        
			<h2><img src="/images/icons/bullet_go.png" alt="item" title="Item"/> Cantidad de ordenes encontradas: <?php echo $this->_tpl_vars['CantidadEncontrados']; ?>
</h2>
        </td>
  </tr>
  <tr>
    <td width="20%">
    	<!-- 
    	<input type="reset" value="Ver ultimas" class="btDark VerUltimas" title="Ver ultimas ordenes" />
    	 -->
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
			
<h2>Ordenes de trabajo en estado Presupuestado o Aprobado</h2>
<p><img src="/images/icons/bullet_go.png" alt="item" title="Item"/> Una orden de trabajo sale del listado generando una orden de compra porque el estado cambia a "Produccion"</p>
		       	
			<div id="Message">
					<?php if ($this->_tpl_vars['SuccessMessage']): ?><p class="success"><?php echo $this->_tpl_vars['SuccessMessage']; ?>
</p><?php endif; ?>
			</div>	
				
            </div>