<?php /* Smarty version 2.6.26, created on 2016-05-05 13:19:09
         compiled from Backend/Orden/ListProduccion/FilterBox.tpl */ ?>
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


    $(\'.VerUltimas\').click(function(){
        var url	=	\'/Orden/ListProduccion/order/Id_DESC\';
        
		window.location = url;
		
    });

    $(\'.VerComentario\').click(function(){
        var comentarioid = $(this).attr(\'id\');
        
		VerComentario("dialog_"+comentarioid);
		
    });
    
    
	$(\'.VerOrdenDeTrabajo\').click(function() {
        
        var url 		= $(this).attr(\'href\');
        var opciones="toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=yes, width=1000, height=700, top=85, left=140";

		abrirPopUp(url, opciones);

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


function abrirPopUp(pagina, opciones)
{
	window.open(pagina,"",opciones);
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

function reload()
{
	//window.location.reload();
	$(\'#frmAction\').submit();
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
			    <td>&nbsp;</td>
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
    <td width="20%"></td>
    <td width="20%"><div class="contInputs" >
					
		            <div class="buttonsCont" style="clear: left;">
						<input type="submit" id="buscar" value="Buscar" class="btDark" title="Buscar" />
						
								
		            </div>
		            
				</div></td>
	<td width="20%">
					<div class="buttonsCont" style="clear: left;">
						<a href="/Insumo/ListEntregasProduccion"><img src="/images/icons/bullet_go.png" alt="item" title="Item"/> Ver todos los insumos pendientes</a>
						
								
		            </div>	
	
	</td>
			       	
  </tr>
</table>
			
<p><img src="/images/icons/help.png" alt="item" title="Item"/> Debe cambiar el estado de una orden a "Finalizado" cuando es entregado el producto con un remito</p>
		       	
			<div id="Message"></div>	
	
            </div>