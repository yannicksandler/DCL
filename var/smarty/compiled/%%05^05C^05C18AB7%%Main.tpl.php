<?php /* Smarty version 2.6.26, created on 2014-11-27 11:08:23
         compiled from Backend/CuentaCorriente/Main.tpl */ ?>
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
	

    $(\'.CambiarCliente\').change(function(){
    	
		var $selected 	=	$(this).find(\'option:selected\');
		var $clienteid	=	$selected.val();
		
		if( $clienteid > 0 )
		{
			var url = \'/CuentaCorriente/ListCliente/ClienteId/\'+$clienteid;
			window.location = url;
		}
		else
			alert(\'El cliente seleccionado no es correcto\');
    });
    
	$(\'.CambiarProveedor\').change(function(){
    	
		var $selected 	=	$(this).find(\'option:selected\');
		var $proveedorid	=	$selected.val();
		
		if( $proveedorid > 0 )
		{
			var url = \'/CuentaCorriente/ListProveedor/ProveedorId/\'+$proveedorid;
			window.location = url;
		}
		else
			alert(\'El proveedor seleccionado no es correcto\');
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


    var availableTags = [
							'; ?>
<?php echo $this->_tpl_vars['ArrayProveedores']; ?>
<?php echo '
                       ];
    

    $("input#proveedor_autocomplete").autocomplete({
        source: availableTags,
      //define select handler
		select: function(e, ui) {
			var valor = ui.item.value;
			SetProveedor(valor);
		}        
		/*
        change: function() {
			alert(1);
        }*/
    }); 

    $("#SeleccionarProveedor").hide();
    

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


function SetProveedor(NombreProveedor)
{
	inputText	=	NombreProveedor;
	// setear valor select selected por texto de option / set option selected by text
	//$("#"+dropdown_id+" option:contains(" + inputText + ")").attr(\'selected\', \'selected\');
	
	$("#SeleccionarProveedor option").each(function () {
        if ($(this).html() == inputText) {
            $(this).attr("selected", "selected");
            return;
        }
	});

	//var proveedorid = GetSelectedValue("SeleccionarProveedor");
	GoToCuentaCorrienteProveedor();
	
}

function GetSelectedValue(dropdownid)
{
	var $selected 	=	$("#"+dropdownid).find(\'option:selected\');
	var $selectedid	=	$selected.val();

	return $selectedid;
}

function GoToCuentaCorrienteProveedor()
{
	var $selected 	=	$("#SeleccionarProveedor").find(\'option:selected\');
	var $proveedorid	=	$selected.val();
	
	if( $proveedorid > 0 )
	{
		var url = \'/CuentaCorriente/ListProveedor/ProveedorId/\'+$proveedorid;
		window.location = url;
	}
	else
		alert(\'El proveedor seleccionado no es correcto\');
}
</script>
'; ?>


<!-- dialog confirm -->
		<div id="dialog-confirm" title="Quiere crear una factura" style="display:none">
			<p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 40px 40px 0;"></span>
				Presione aceptar para crear una factura o cierre el mensaje para cancelar
			</p>
		</div>





<h1>Cuentas corrientes</h1>

<h2><img src="/images/icons/help.png" />Debe seleccionar el cliente o el proveedor para ver la cuenta corriente</h2>
        
<form id="FrmEdit" enctype="multipart/form-data" action="" method="post">
        
    <div class="form">
		

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
                    	
                	    <label class="blue">Proveedor</label>
                	    <input id="proveedor_autocomplete" />       
	                    <select name="" class="required CambiarProveedor" id="SeleccionarProveedor">
	                        <option value="">Seleccionar</option>
	                        <?php $_from = $this->_tpl_vars['Proveedores']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['p']):
?>
	                        <option value="<?php echo $this->_tpl_vars['p']['Id']; ?>
" <?php if (( $this->_tpl_vars['p']['Id'] == $this->_tpl_vars['ProveedorId'] )): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['p']['Nombre']; ?>
</option>
	                        <?php endforeach; endif; unset($_from); ?>
	                    </select>
	                    
                    </li>
                </ul>
            </div> <!-- /filtersBox-->
                 
                
            </div> <!-- /productsEditorContent -->
        </div>  <!-- /contentEditor -->
    </div> <!-- /form -->
</form>