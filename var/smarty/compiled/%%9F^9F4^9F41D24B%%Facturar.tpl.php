<?php /* Smarty version 2.6.26, created on 2016-04-26 10:46:12
         compiled from Backend/Facturacion/Facturar.tpl */ ?>
<?php $this->assign('IDS_Layout_Class', 'Backend_Layouts_Default'); ?>
<?php $this->assign('IDS_Layout_Method', 'Default'); ?>

<!-- date picker -->
<link type="text/css" href="/styles/ui-lightness/jquery-ui-1.8.2.custom.css" rel="stylesheet" />
<script type="text/javascript" src="/scripts/jquery/jquery.ui.datepicker.js"></script>
<script type="text/javascript" src="/scripts/jquery/jquery.ui.core.js"></script>
<script type="text/javascript" src="/scripts/jquery/jquery.ui.widget.js"></script>

<script type="text/javascript" src="/scripts/Edit.js"></script>


<!-- dialog -->
<script type="text/javascript" src="/scripts/jquery/jquery-ui-1.8.4.custom.min.js"></script>
<!-- dialog -->



<?php echo '
<script type="text/javascript">
$(document).ready(function(){
    $("#FrmEdit").validate();

	SetCliente();
	    
    $(\'.sumar\').change(function() {
        alert(1);
        $(\'#total\').val($(\'#total\').val()+$(this).val());
	});
    
	$(\'#FrmEdit\').submit(function() {

		var conf	=	$(\'#ConfirmacionMostrada\').attr(\'value\');
		if(conf != \'SI\')
		{
			$(\'#MostrarConfirmacion\').val(\'NO\');
			
			$("#dialog-confirm").dialog({
				resizable: true,
				height:200,
				width: 400, 
				modal: true,
				buttons: {
					\'Aceptar\': function() {
						$(this).dialog(\'close\');
						$(\'#FrmEdit\').submit();
					},
					\'Cancelar\': function() {
						$(this).dialog(\'close\');
						$(\'#ConfirmacionMostrada\').attr(\'value\', \'NO\');
						return false;
					}
				}
			});
			// flag 
			$(\'#ConfirmacionMostrada\').attr(\'value\', \'SI\');
			return false;
		}

  	});

    $(\'#FechaFactura\').datepicker({
		changeMonth: true,
		changeYear: true,
        dateFormat: \'dd/mm/yy\'
	});

    $(\'#FechaPosibleDeCobro\').datepicker({
		changeMonth: true,
		changeYear: true,
        dateFormat: \'dd/mm/yy\'
	});

    $(\'.CambiarCliente\').change(function(){
    	
		var $selected 	=	$(this).find(\'option:selected\');
		var $clienteid	=	$selected.val();
		
		if( $clienteid > 0 )
		{
			$(\'#mensajes\').hide();
			GetOrdenesTrabajoSinFacturar($clienteid);
			$(\'#ClienteIdGet\').attr("value", $clienteid);
		}
		else
			alert(\'El cliente seleccionado no es correcto\');
    });
    

    $(".PrintOrdenDePago").click(function(){
        
        var url	=	\'/OrdenPago/View/id/\' + $(this).attr(\'id\');
        
		var opciones="toolbar=no, location=no, directories=no, status=no, menubar=yes, scrollbars=yes, resizable=yes, width=1000, height=700, top=85, left=140";

		abrirPopUp(url, opciones);        

        return false;
    });

    $(\'#ComentarioImporte\').change(function(){
        var importe=   $(this).attr("value");

        SumarTotal(importe);
    });

});

function SetCliente()
{
	var clienteid = $(\'#ClienteIdGet\').attr("value");
	if(clienteid > 0)
	{
		GetOrdenesTrabajoSinFacturar(clienteid);
	}
}
function SumarTotal(importe)
{
	var total = parseFloat($(\'#total\').val())+parseFloat(importe);
	$(\'#total\').attr(\'value\',total);
}

function RestarTotal(importe)
{
	var total = parseFloat($(\'#total\').val())-parseFloat(importe);
	$(\'#total\').attr(\'value\',total);
}
function GetOrdenesTrabajoSinFacturar(clienteid)
{
	if(clienteid > 0)
	{
		
		$.ajax({
			type: "POST",
			url: \'/Cliente/GetOrdenesDeTrabajoSinFacturar\',
			dataType: "text/html",
			data: {
				\'ClienteId\': clienteid
			},
			success: function(html){
				$("#OrdenesDeTrabajoSinFacturar").html(html);
				
			}
	
		});

	}	
}

function reload()
{
	var url = \'/Facturacion/Facturar\'; 
	var clienteid = $(\'#ClienteIdGet\').attr("value");
	if(clienteid > 0)
	{
		url = url + \'/ClienteId/\' + clienteid;
	}
	window.location = url;
}

function VerFactura()
{
    var url	=	\'/Facturacion/FacturaImprimible/FacturaId/\' + $(\'#FacturaId\').val();
    
	var opciones="toolbar=yes, location=no, directories=no, status=no, menubar=yes, scrollbars=yes, resizable=yes, width=800, height=600, top=85, left=140";

	abrirPopUp(url, opciones);        
}
function volver()
{
	window.location	=	\'/OrdenCompra/List/order/OrdenDePagoId_ASC\';
}

function abrirPopUp(pagina, opciones)
{
	window.open(pagina,"",opciones);
}
</script>
'; ?>


<!-- dialog confirm -->
		<div id="dialog-confirm" title="Quiere crear una factura" style="display:none">
			<p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 40px 40px 0;"></span>
				Presione aceptar para crear una factura o cierre el mensaje para cancelar
			</p>
		</div>


<h1>Prefacturacion</h1>

<h2>Debe seleccionar el cliente, la fecha de factura y las ordenes que desea facturar. Opcionalmente un comentario e importe</h2>
<?php if ($this->_tpl_vars['FacturaId']): ?>
		<input type="hidden" value="<?php echo $this->_tpl_vars['FacturaId']; ?>
" id="FacturaId"></input>        
      <script>VerFactura();</script>
      
<?php endif; ?>

        
<form id="FrmEdit" enctype="multipart/form-data" action="" method="post">
    <input type="hidden" name="data[ConfirmacionMostrada]" value="" id="ConfirmacionMostrada"/>
    <input type="hidden" name="" value="<?php echo $this->_tpl_vars['ClienteId']; ?>
" id="ClienteIdGet"/>  
        
    <div class="form">
        <div id="FormsColumn"> <!-- contiene toda la columna -->

		    <div class="formButtons">
		        <div class="info">
		        <input type="button" class="btMinimize btBlock" value="" title="Bloquear arriba" />
		        <!-- al clickear, que desactive el movimiento, y quede bloqueado arriba -->
		        
		        <div id="formButtonsContent">
		        
		            <ul>
		
		                <li class="buttonsTop">
		                <input type="submit" value="Facturar" class="btGray" title="Crear factura" />
		                <input type="reset" value="Volver" class="btGray" title="Volver" onclick="window.location='/GestionAdministrativa/Main/Tab/TabFacturacionPendiente'"/>
		                </li>
		            </ul>
		            
		        </div> <!-- /formButtonsContent -->
		        
		        </div> <!-- /info -->
		    </div> <!-- /formButtons -->
		
		</div> <!-- /FormsColumn -->

		

        <div id="mensajes">
        <?php if ($this->_tpl_vars['editSuccessMessage']): ?>
            <p class="success" style="width:61%;"><?php echo $this->_tpl_vars['editSuccessMessage']; ?>
 <img src="/images/icons/tick.png" /></p>
            <script>//volver()</script>
        <?php elseif ($this->_tpl_vars['editErrorMessage']): ?>
            <p class="error" style="width:61%;"><?php echo $this->_tpl_vars['editErrorMessage']; ?>
</p>
        <?php endif; ?>
        </div>
        
        
        <div class="contentEditor"> <!-- formulario de edicion de contenido -->
        
            <div class="productsEditorContent">
            
            <div class="filtersBox filtersInfoBox">
            	
                <ul>
                    <li>
						
	                    <label class="blue">Cliente</label>       
	                    <select name="ClienteId" class="required CambiarCliente" id="SeleccionarCliente">
	                        <option value="">Seleccionar</option>
	                        <?php $_from = $this->_tpl_vars['Clientes']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['t']):
?>
	                        <option value="<?php echo $this->_tpl_vars['t']['Id']; ?>
" <?php if (( $this->_tpl_vars['t']['Id'] == $this->_tpl_vars['ClienteId'] )): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['t']['Nombre']; ?>
</option>
	                        <?php endforeach; endif; unset($_from); ?>
	                    </select>
	                    <!-- 
	                    <a class="SeleccionarCliente">Seleccionar cliente (seleccion avanzada)</a>
						 -->	
						 
                    </li>
                    <li>
                    	
                	    <label class="blue"><img src="/images/icons/date.png" title="Seleccionar fecha para la factura"/> Fecha de factura</label>       
						
						<input class="required date" type="text" name="FechaFactura" id="FechaFactura" value="<?php if ($this->_tpl_vars['FechaFactura']): ?><?php echo $this->_tpl_vars['FechaFactura']; ?>
<?php endif; ?>" />
						
                    </li>
                    <li>
                    	
                	    <label class="blue"><img src="/images/icons/date.png" title="Seleccionar fecha para la factura"/> Fecha cobranza</label>       
						
						<input class="required date" type="text" name="data[FechaPosibleDeCobro]" id="FechaPosibleDeCobro" value="<?php if ($this->_tpl_vars['data']['FechaPosibleDeCobro']): ?><?php echo $this->_tpl_vars['data']['FechaPosibleDeCobro']; ?>
<?php endif; ?>" />
						
						<label class="blue"><img src="/images/icons/help.png" title="Verificar la condicion de cobro en cada OT"/></label>
                    </li>
                    <li>
                    	<label class="blue"> Tipo de IVA</label>
                    	<select name="data[TipoIvaId]" class="required">
                        <option value="">Seleccionar</option>
                        <?php $_from = $this->_tpl_vars['TiposDeIva']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['c']):
?>
                        <option value="<?php echo $this->_tpl_vars['c']['Id']; ?>
" <?php if (( $this->_tpl_vars['c']['Id'] == $this->_tpl_vars['data']['TipoIvaId'] )): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['c']['Nombre']; ?>
 - <?php if ($this->_tpl_vars['c']['Discriminado'] > 0): ?><?php echo $this->_tpl_vars['c']['Discriminado']; ?>
<?php endif; ?>-<?php if ($this->_tpl_vars['c']['Adicional'] > 0): ?><?php echo $this->_tpl_vars['c']['Adicional']; ?>
<?php endif; ?>-<?php if ($this->_tpl_vars['c']['Incluido'] > 0): ?><?php echo $this->_tpl_vars['c']['Incluido']; ?>
<?php endif; ?> - (Tipo factura: <?php echo $this->_tpl_vars['c']['Letra_comp']; ?>
)</option>
                        <?php endforeach; endif; unset($_from); ?>
                    </select>
                    </li>
                </ul>
            </div> <!-- /filtersBox-->
                 
                
            
            <div class="contentTitles">
                	<h2>Total acumulado sin iva: $ </h2>
		        	<input type="text" DISABLED value="0" id="total"/>
		        
			</div> <!-- /contentTitles -->
            
            	<div class="contentTitles">
                
		        	<div id="OrdenesDeTrabajoSinFacturar"><!-- ajax SetProveedor --></div>
		        
		        </div> <!-- /contentTitles -->
                
         
         		<div class="contentTitles">
                    <label class="blue">Comentario (opcional)</label>
                    <textarea name="data[Comentario]" cols="45" rows="5" class=""><?php echo $this->_tpl_vars['data']['Comentario']; ?>
</textarea>
                </div> <!-- /contentTitles -->  
         
         		
                <div class="contentTitles">
                    <label class="blue">Importe del comentario (opcional)</label>
                    <input type="text" class="number" id="ComentarioImporte" name="data[ComentarioImporte]" value="<?php echo $this->_tpl_vars['data']['ComentarioImporte']; ?>
">
                </div> <!-- /contentTitles -->
                
                
            </div> <!-- /productsEditorContent -->
        </div>  <!-- /contentEditor -->
    </div> <!-- /form -->
</form>