<?php /* Smarty version 2.6.26, created on 2014-09-19 11:29:25
         compiled from Backend/Orden/Edit.tpl */ ?>
<?php $this->assign('IDS_Layout_Class', 'Backend_Layouts_Default'); ?>
<?php $this->assign('IDS_Layout_Method', 'Default'); ?>

<!-- date picker --> 
<link type="text/css" href="/styles/ui-lightness/jquery-ui-1.8.2.custom.css" rel="stylesheet" />
<script type="text/javascript" src="/scripts/jquery/jquery.ui.datepicker.js"></script>
<script type="text/javascript" src="/scripts/jquery/jquery.ui.core.js"></script>
<script type="text/javascript" src="/scripts/jquery/jquery.ui.widget.js"></script>

<script type="text/javascript" src="/scripts/Edit.js"></script>


<?php echo '
<script type="text/javascript">
$(document).ready(function(){
    $("#FrmEdit").validate();

    //$(\'#producto\').css(\'textTransform\', \'capitalize\');
    
    $(\'#producto\').keypress(function () {
    	var $this = $(this);
        val = $this.val();
    	val = val.substr(0, 1).toUpperCase() + val.substr(1);

    	$(this).val(val);
   	});

    $("#detalle").button({
        icons: {
            primary: "ui-icon-zoomin"
        }
    }).click(function () {
        // hover in
        $(".ui-button-icon-primary", this)
          .toggleClass("ui-icon-zoomin ui-icon-zoomout");
    }, function () {
        // hover out
        $(".ui-button-icon-primary", this)
          .toggleClass("ui-icon-zoomout ui-icon-zoomin");
    });
    
    $("#detalle").click(function () {
    	$(".general").toggle("slow");
   	});

    $("#mostrarinsumos").button({
        icons: {
            primary: "ui-icon-zoomin"
        }
    }).click(function () {
        // hover in
        $(".ui-button-icon-primary", this)
          .toggleClass("ui-icon-zoomin ui-icon-zoomout");
    }, function () {
        // hover out
        $(".ui-button-icon-primary", this)
          .toggleClass("ui-icon-zoomout ui-icon-zoomin");
    });

    $("#mostrarinsumos").click(function () {
    	$("#insumos").toggle("slow");

   	});

    $("#mostrarventas").button({
        icons: {
            primary: "ui-icon-zoomin"
        }
    }).click(function () {
        // hover in
        $(".ui-button-icon-primary", this)
          .toggleClass("ui-icon-zoomin ui-icon-zoomout");
    }, function () {
        // hover out
        $(".ui-button-icon-primary", this)
          .toggleClass("ui-icon-zoomout ui-icon-zoomin");
    });

    $("#mostrarventas").click(function () {
    	//$("#insumos").show();
    	//$("#insumosCargados").hide();
    	//$("#CostosInsumos").toogle();
    	
    	$(".ventas").toggle("slow");
   	});


    //$("#descripciondetrabajo").attr(\'value\', $("#descripciondetrabajo").text().replace("\\<br /\\>", "").replace("\\<br /\\>", "").replace("\\<br /\\>", "").replace("\\<br /\\>", "").replace("\\<br /\\>", ""));
    $("#ComentarioFactura").attr(\'value\', $("#ComentarioFactura").text().replace("\\<br /\\>", "").replace("\\<br /\\>", "").replace("\\<br /\\>", "").replace("\\<br /\\>", "").replace("\\<br /\\>", ""));
    
    $(\'#fechaInicio\').datepicker({
		changeMonth: true,
		changeYear: true,
        dateFormat: \'dd/mm/yy\'
	});
    
    $(\'#fechaFin\').datepicker({
		changeMonth: true,
		changeYear: true,
        dateFormat: \'dd/mm/yy\'
	});
    
    $(\'#fechaEntrega\').datepicker({
		changeMonth: true,
		changeYear: true,
        dateFormat: \'dd/mm/yy\'
	});

    $(\'#fechaFactura\').datepicker({
		changeMonth: true,
		changeYear: true,
        dateFormat: \'dd/mm/yy\'
	});
    

    $(\'#totalSinIva\').change(function(){
        var total=   $("#totalSinIva").attr("value");
    
        $("#totalConIva").attr(\'value\',Number(total)*1.21);
        ingresosBrutos	=	Number(total)*1.03;
        $("#ingresosBrutos").text($("#ingresosBrutos").text()+ ingresosBrutos);
        impuestosBancarios	=	Number(total)*1.21*1.012;
        $("#impuestosBancarios").text($("#impuestosBancarios").text()+impuestosBancarios);
    });

        $(\'.Presupuestar\').click(function(){
            var ordenid	= $(this).attr(\'id\');
            var presupuestoid	= $(this).attr(\'presupuesto\');		
            Presupuestar(ordenid, presupuestoid);
            
            return false;
        });
    

    
    $(\'#totalSinIva\').change();
	
	guardarObtenerInsumos(1, \'list\');

    $("#mostrarinsumos").click();
});
// lo usa el popup generar orden de compra

function reload()
{
	var ot	=	$(\'#OrdenDeTrabajo\').val();
	//window.location.reload();
	if(ot)
		window.location = \'/Orden/Edit/id/\' + ot;
	else
		alert(\'NO existe la orden de trabajo\');
	//$(\'#FrmEdit\').submit();
}

function Presupuestar(OrdenId, PresupuestoId)
{
	if(OrdenId > 0)
	{
		var url	=	\'/Presupuesto/Edit/OrdenId/\' + OrdenId;

		if(PresupuestoId > 0)
			url	=	url + \'/id/\' + PresupuestoId;
	    
		var opciones="toolbar=no, location=no, directories=no, status=no, menubar=yes, scrollbars=yes, resizable=yes, width=1000, height=700, top=85, left=140";
	
		abrirPopUp(url, opciones);        
	}
	else
		alert(\'El numero de orden no es correcto\');
}
function abrirPopUp(pagina, opciones)
{
	window.open(pagina,"",opciones);
}
function guardarObtenerInsumos(insumo, action)
{
	if (insumo) // si esta seteado
	{
		// insert record y cargar nombre
		$.ajax({
			type: "GET",
			url: \'/Orden/GetInsumos/Orden/\' + '; ?>
 <?php echo $this->_tpl_vars['data']['Id']; ?>
 <?php echo ' + \'/Insumo/\' + insumo + \'/Accion/\' + action,
			dataType: "text/html",
			success: function(html){
				//$(html).insertAfter("#docenteLabel");
				$("#insumos").html(html);
			}

		});
	}
	
	return;
}

function generarOrdenDeCompra(InsumoId)
{
	if(InsumoId)
	{
		// advertencia
		/*
		$("#dialog-confirm").dialog({
			resizable: false,
			height:140,
			modal: true,
			buttons: {
				\'Delete all items\': function() {
					$(this).dialog(\'close\');
				},
				Cancel: function() {
					$(this).dialog(\'close\');
				}
			}
		});
		*/
		var response	=	confirm(\'Esta seguro que desea generar una orden de compra?\')
		
		if(response)
		{
			// abrir venta y generar orden
			window.open(	\'/OrdenCompra/GenerarOrden/InsumoId/\' + InsumoId, 
													\'windowname1\', 
													\'width=980, height=700, scrollbars = yes\');
		}
		
		
	}
}
/*
function reload()
{
	//window.location.reload();
	$(\'#FrmEdit\').submit();
}
*/
</script>
'; ?>


<a class="linkSendHome linkSendHomeEdit" href="/Orden/List/order/PrioridadId_DESC">&laquo; Volver al listado</a>

<h1><?php if ($this->_tpl_vars['data']['Id']): ?>Editar<?php else: ?>Nueva<?php endif; ?> Orden de trabajo &raquo; <span><?php echo $this->_tpl_vars['data']['Id']; ?>
</span></h1>

<?php $_from = $this->_tpl_vars['HistorialEstados']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['he']):
?>
                        <p>> <?php echo $this->_tpl_vars['he']['OrdenEstado']['Nombre']; ?>
 ></p>
                    <?php endforeach; endif; unset($_from); ?>
                    
<form id="FrmEdit" enctype="multipart/form-data" action="" method="post">
    <input type="hidden" name="data[Id]" value="<?php echo $this->_tpl_vars['data']['Id']; ?>
" id="OrdenDeTrabajo"/>
   
    <input type="hidden" name="data[Status]" id="stateValue" value="<?php if ($this->_tpl_vars['data']['Id']): ?><?php echo $this->_tpl_vars['data']['Status']; ?>
<?php else: ?>1<?php endif; ?>" />
    

        

    <div class="form">
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "Backend/Orden/ColumnForm.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
            
        <?php if ($this->_tpl_vars['editSuccessMessage']): ?>
            <p class="success" style="width:61%;"><?php echo $this->_tpl_vars['editSuccessMessage']; ?>
</p>
        <?php elseif ($this->_tpl_vars['editErrorMessage']): ?>
            <p class="error" style="width:61%;"><?php echo $this->_tpl_vars['editErrorMessage']; ?>
</p>
            <?php endif; ?>
            
            <?php if ($this->_tpl_vars['exception']): ?>
            <p class="error" style="width:61%;"><?php echo $this->_tpl_vars['exception']; ?>
</p>
            <?php endif; ?>
            
            <?php if ($this->_tpl_vars['popupsubmit']): ?>
            	<script>reload();</script>
            <?php endif; ?>
            
           
           
            <div class="contentEditor"> <!-- formulario de edicion de contenido -->
			            <div class="productsEditorContent">
			            
		    <a id="detalle">Detalle</a>
		    <?php if (! $this->_tpl_vars['IsPerfilVentas']): ?>
           	<a id="mostrarinsumos">Insumos</a>
           	<?php endif; ?>
           	<a id="mostrarventas">Venta</a>
                   
		            
            <table width="100%"  border="0" cellspacing="0">
              <tr>
              	
                <td><table width="100%"  border="0" cellspacing="0">
                  <tr>
                    <td>                <div class="contentTitles" id="">
                    <label class="blue">Cliente</label>       
                    <select name="data[ClienteId]" class="required">
                        <option value="">Seleccionar</option>
                        <?php $_from = $this->_tpl_vars['Clientes']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['t']):
?>
                        <option value="<?php echo $this->_tpl_vars['t']['Id']; ?>
" <?php if ($this->_tpl_vars['t']['Id'] == $this->_tpl_vars['data']['ClienteId']): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['t']['Nombre']; ?>
</option>
                        <?php endforeach; endif; unset($_from); ?>
                    </select>
                </div> <!-- /contentTitles -->  
                </td>
                    <td>                <div class="contentTitles">
                    <label class="blue">Producto</label>
                    <input id="producto" type="text" class="required" name="data[Producto]" value="<?php echo $this->_tpl_vars['data']['Producto']; ?>
">
                </div> <!-- /contentTitles --></td>
                    <td>         
                <div class="contentTitles">
                    <label class="blue">Cantidad</label>
                    <input type="text" class="number" name="data[Cantidad]" value="<?php echo $this->_tpl_vars['data']['Cantidad']; ?>
">
                </div> <!-- /contentTitles --></td>
                  </tr>
                </table></td>
              </tr>
              <tr>
                <td><div class="contentTitles general" style="display: none">
                    <div align="center">
                      <label class="blue">Descripcion de trabajo</label>
                      <textarea name="data[DescripcionDeTrabajo]" cols="45" rows="5" class="required" id="descripciondetrabajo"><?php if ($this->_tpl_vars['data']['DescripcionDeTrabajo']): ?><?php echo $this->_tpl_vars['data']['DescripcionDeTrabajo']; ?>
<?php else: ?>Formato:
Material:
Colores:
Terminacion:<?php endif; ?></textarea>
                    </div>
                </div> 
                  <div align="center">
                    <!-- /contentTitles -->  
                </div></td>
              </tr>
              <tr>
                <td>
                       
				<table width="100%"  border="0" cellspacing="0"  class="general" style="display: none">
  <tr>
    <td><div class="contentTitles">
                    <label class="blue">Fecha de inicio</label>
                    <input type="text" class="required date" id="fechaInicio" name="data[FechaInicio]" value="<?php echo $this->_tpl_vars['data']['FechaInicio']; ?>
">
					<label for="fechaInicio" generated="true" class="error" style="display:none;"></label>
					
                </div> <!-- /contentTitles -->
    </td>
    <td>                <div class="contentTitles">
                    <label class="blue">Fecha de proximo cambio de estado (estimada)</label>
                    <input type="text" class="required date" id="fechaEntrega" name="data[FechaEntrega]" value="<?php echo $this->_tpl_vars['data']['FechaEntrega']; ?>
">
					<label for="fechaEntrega" generated="true" class="error" style="display:none;"></label>
                </div> <!-- /contentTitles --></td>
    <td>				                <div class="contentTitles">
                    <label class="blue">Fecha de finalizacion</label>
                    <input type="text" class="date" id="fechaFin" name="data[FechaFin]" value="<?php echo $this->_tpl_vars['data']['FechaFin']; ?>
">
					<label for="fechaFin" generated="true" class="error" style="display:none;"></label>	
                </div> <!-- /contentTitles --> </td>
    <td>
</td>
  </tr>
</table>
</td>
              </tr>
              <tr>
                <td>
				<table width="100%"  border="0" cellspacing="0" class="general" style="display: none">
  <tr>
    <td>                <div class="contentTitles" id="">
                    <label class="blue">Estado</label>       
                    <select name="data[EstadoId]" class="required">
                        <option value="">Seleccionar</option>
                        <?php $_from = $this->_tpl_vars['Estados']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['t']):
?>
                        <option value="<?php echo $this->_tpl_vars['t']['Id']; ?>
" <?php if ($this->_tpl_vars['t']['Id'] == $this->_tpl_vars['data']['EstadoId']): ?>selected="selected"<?php elseif (( ! $this->_tpl_vars['data']['Id'] ) && ( $this->_tpl_vars['t']['Id'] == 0 )): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['t']['Nombre']; ?>
</option>
                        <?php endforeach; endif; unset($_from); ?>
                    </select>
                </div> <!-- /contentTitles -->   </td>
    <td>				<div class="contentTitles" id="">
                    <label class="blue">Prioridad</label>       
                    <select name="data[PrioridadId]" class="number">
                        <option value="">Seleccionar</option>
                        <?php $_from = $this->_tpl_vars['Prioridades']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['p']):
?>
                        <option value="<?php echo $this->_tpl_vars['p']['Id']; ?>
" <?php if ($this->_tpl_vars['p']['Id'] == $this->_tpl_vars['data']['PrioridadId']): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['p']['Nombre']; ?>
</option>
                        <?php endforeach; endif; unset($_from); ?>
                    </select>
                </div> <!-- /contentTitles --></td>
    <td>            
                <div class="contentTitles">
                    <label class="blue">Tiempo estimado</label>
                    <p>Dias estimados de duracion (incluir sab,dom,feriado)</p>
                    <input type="text" class="number" id="" name="data[TiempoEstimado]" value="<?php echo $this->_tpl_vars['data']['TiempoEstimado']; ?>
">	
                </div> <!-- /contentTitles -->
    </td>
  </tr>
</table>                
                <div class="contentTitles general" style="display: none">
                    <label class="blue">Comentario de prioridad</label>
                    <textarea name="data[PrioridadComentario]" cols="45" rows="5" class=""><?php echo $this->_tpl_vars['data']['PrioridadComentario']; ?>
</textarea>
                </div> <!-- /contentTitles --> 
                
</td>
              </tr>
              
              <tr>
                <td>
                <div class="contentTitles">    
                <?php if (! $this->_tpl_vars['IsPerfilVentas']): ?>
                 	<div id="insumos" class="" style="display: none">
                 	
                 		<!-- aca se insertan los insumos por ajax -->
                 		
                 	</div> <!-- end div insumos -->
                <?php endif; ?>
                 </div> <!-- /contentTitles --> 
                </td>
              </tr>
              <tr>
                <td>
                <?php if ($this->_tpl_vars['IsPerfilAdministrador'] || $this->_tpl_vars['IsPerfilVentas']): ?>
	                <table width="100%"  border="0" cellspacing="0" class="ventas" style="display: none">
					  <tr>
					    <td><div class="contentTitles">
					                    <label class="blue">Precio de venta sin IVA</label>
					                    <input type="text" class="number" id="totalSinIva" name="data[TotalSinIva]" value="<?php echo $this->_tpl_vars['data']['TotalSinIva']; ?>
">
					                </div> <!-- /contentTitles --></td>
					    <td>
					    
					    <?php if ($this->_tpl_vars['data']['Id']): ?>
					                <div class="contInputs" >
							            <div class="buttonsCont" style="clear: left;">
											<input type="" value="Presupuestar" id=<?php echo $this->_tpl_vars['data']['Id']; ?>
 presupuesto="<?php echo $this->_tpl_vars['data']['PresupuestoId']; ?>
" class="btDark Presupuestar" title="Ver el formulario para crear un presupuesto" />
							            </div>
									</div>
						<?php endif; ?>                
					    </td>
					    <td>
					    
						</td>
					</td>
					  </tr>
					</table>        
				<?php endif; ?>
			</td>
              </tr>
              <tr>
                <td>
				        
              </tr>
              <tr>
                <td>
				<table width="100%"  border="0" cellspacing="0"  class="ventas" style="display: none">
  <tr>
    <td>                <div class="contentTitles">
                    <label class="blue">Lugar de Entrega</label>
                    <input type="text" class="" name="data[LugarDeEntrega]" value="<?php echo $this->_tpl_vars['data']['LugarDeEntrega']; ?>
">
                </div> <!-- /contentTitles -->
                
				
				</td>
    <td><div class="contentTitles">
                    <label class="blue">Condicion de cobro</label>
                    
                    <input class="check" type="radio" name="data[CondicionDeCobro]" value="B" <?php if ('B' == $this->_tpl_vars['data']['CondicionDeCobro']): ?>checked="checked"<?php endif; ?>/>
                    <label class="check blue">Blanco</label>
                    <input class="check" type="radio" name="data[CondicionDeCobro]" value="N" <?php if ('N' == $this->_tpl_vars['data']['CondicionDeCobro']): ?>checked="checked"<?php endif; ?>/>
                    <label class="check blue">Negro</label>
                </div> <!-- /contentTitles --></td>
  </tr>
  
</table>

				</td>
              </tr>
			  
			  <tr>
 
				<div class="contInputs" >
				
				</div>
			  </tr>
            </table>

				<div class="contentTitles ventas" style="display: none">
                    <label class="blue">Observaciones</label>
                    <textarea name="data[Observaciones]" cols="45" rows="5" class=""><?php echo $this->_tpl_vars['data']['Observaciones']; ?>
</textarea>
                </div> <!-- /contentTitles -->
                                                
            </div> <!-- /productsEditorContent -->
        </div>  <!-- /contentEditor -->
    </div> <!-- /form -->

</form>