<?php /* Smarty version 2.6.26, created on 2014-09-19 11:23:02
         compiled from Backend/GestionAdministrativa/Main.tpl */ ?>
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

<!-- colorbox lightbox -->
<link rel="stylesheet" href="/scripts/colorbox-master/colorbox-master/example1/colorbox.css" />
<script src="/scripts/colorbox-master/colorbox-master/jquery.colorbox-min.js"></script>
<!-- END colorbox lightbox -->
	
<?php echo '
<script type="text/javascript">
$(document).ready(function(){
    $("#FrmEdit").validate();

    $(".ajax").colorbox();
    
    var $AjaxLoader = \'<p><img src="/images/body/ajax-loader.gif" class="loader" border="0" />Cargando ...</p>\';

	$(\'.button\').click(function() {
  	  	var url	=	$(this).attr(\'href\');
  	  	window.location = url;		
		
		return false;
  	});
  	
	loadDefaultTab();

	// para todos los tabs, establecer comportamiento (que cargue html por ajax)
    $(\'#ResumeTabs a, #ResumeTabs a span\').click(function(event){
        
        //event.preventDefault();
			
        $(\'#ResumeTabs a\').removeClass("active");
        
        var $activeElement;
            
        if( $(this).attr("href") )
		{
            $activeElement     =     $(this);
		}
        else
		{
            $activeElement     =     $(this).parent();
		}
            
        $activeElement.addClass("active");

        $(\'#HomeContent\').html($AjaxLoader);
        //$(\'#ExamenHomePreloader\').html($AjaxLoader);
		
		$.ajax({
                type: \'POST\',
                url: $activeElement.attr(\'href\'),
                dataType: \'text/html\',
                success: function(data){
					$(\'#HomeContent\').html(data);
                }
        }); 
		
		return false;
	
    });


    var availableTags = [
							'; ?>
<?php echo $this->_tpl_vars['ArrayProveedores']; ?>
<?php echo '
                       ];

    var availableTagsClientes = [
							'; ?>
<?php echo $this->_tpl_vars['ArrayClientes']; ?>
<?php echo '
                    ];
    

    $("input#proveedor_autocomplete").autocomplete({
        source: availableTags,
      //define select handler
		select: function(e, ui) {
			var valor = ui.item.value;
			SetProveedor(valor);
		} 
    }); 

    $("#proveedor_autocomplete").blur(function(){
        if( $(this).val() == \'\' )
            $(this).val( $(this).attr("defaultValue") );
    });

    $("#proveedor_autocomplete").focus(function(){
        if( $(this).val() == $(this).attr("defaultValue"))
            $(this).val(\'\');
    });

    $("input#cliente_autocomplete").autocomplete({
        source: availableTagsClientes,
      //define select handler
		select: function(e, ui) {
			var valor = ui.item.value;
			SetCliente(valor);
		} 
    }); 

    $("#cliente_autocomplete").blur(function(){
        if( $(this).val() == \'\' )
            $(this).val( $(this).attr("defaultValue") );
    });

    $("#cliente_autocomplete").focus(function(){
        if( $(this).val() == $(this).attr("defaultValue"))
            $(this).val(\'\');
    });

    // no abrir lightbox si no hay url 
    $("#open_proveedor").click(function(){
    	var url	=	$(this).attr(\'href\');
    	if(url == \'\')
    	{
        	alert(\'Debe seleccionar un proveedor\');
        	return false;
    	}
    });

    // no abrir lightbox si no hay url 
    $("#open_cliente").click(function(){
    	var url	=	$(this).attr(\'href\');
    	if(url == \'\')
    	{
        	alert(\'Debe seleccionar un cliente\');
        	return false;
    	}
    });
});

function SetProveedor(NombreProveedor)
{
	inputText	=	NombreProveedor;
	
	$("#SeleccionarProveedor option").each(function () {
        if ($(this).html() == inputText) {
            $(this).attr("selected", "selected");
            //return;
        }
	});

	//var proveedorid = GetSelectedValue("SeleccionarProveedor");
	GoToCuentaCorrienteProveedor();
	
}

function GoToCuentaCorrienteProveedor()
{
	var $selected 	=	$("#SeleccionarProveedor").find(\'option:selected\');
	var $proveedorid	=	$selected.val();
	
	if( $proveedorid > 0 )
	{
		var url = \'/CuentaCorriente/ListProveedor/ProveedorId/\'+$proveedorid;
		$("#open_proveedor").attr(\'href\', url);
		$("#open_proveedor").click();
		
		//window.location = url;
	}
	else
		alert(\'El proveedor seleccionado no es correcto\');
}

function SetCliente(Nombre)
{
	inputText	=	Nombre;
	
	$("#SeleccionarCliente option").each(function () {
        if ($(this).html() == inputText) {
            $(this).attr("selected", "selected");
            //return;
        }
	});

	//var proveedorid = GetSelectedValue("SeleccionarProveedor");
	GoToCuentaCorrienteCliente();
	
}

function GoToCuentaCorrienteCliente()
{
	var $selected 	=	$("#SeleccionarCliente").find(\'option:selected\');
	var $id	=	$selected.val();
	
	if( $id > 0 )
	{
		
		var url = \'/CuentaCorriente/ListCliente/ClienteId/\'+$id;
		
		$("#open_cliente").attr(\'href\', url);
		$("#open_cliente").click();
		//window.location = url;
	}
	else
		alert(\'El cliente seleccionado no es correcto\');
}



function loadDefaultTab()
{
	var $tab 	=	$("#tab").val();
	if($tab)
	{
		$tabName = \'#\'+$tab
		$activeElement	=	$($tabName);
		$activeElement.addClass("active");
	}
	else
	{
		$activeElement	=	$(\'#TabCobranzasPendientes\');
		$activeElement.addClass("active");
	}

	$.ajax({
        type: \'POST\',
        url: $activeElement.attr(\'href\'),
        dataType: \'text/html\',
        success: function(data){
			$(\'#HomeContent\').html(data);
        }
	});


	
	 
}

function abrirPopUp(pagina, opciones)
{
	window.open(pagina,"",opciones);
}

function GetBancos()
{
	// porque otras paginas tiene definidas esta funcion llamada desde popup
	return;
}
</script>

'; ?>


<input type="hidden" value="<?php echo $this->_tpl_vars['Tab']; ?>
" id="tab"/>

        <div class="listado">
        
            <h1>Gestion administrativa</h1>

            
		<?php if (! $this->_tpl_vars['editErrorMessage']): ?>
			
		<div class="filtersBox filtersInfoBox">
                <ul>
                	<li>
                		<p><span>Cliente</span> <input id="cliente_autocomplete" value="Nombre"></p>
                		<!-- utilizados para cargar cuentas corriente en lightbox -->
						<p><a id="open_cliente" class='ajax' href="" title=""><img src="/images/icons/zoom_in.png" title="Ver cuenta corriente"/>Ver cuenta corriente</a></p>
						<!-- END -->
                		<select name="ClienteId" class="required CambiarCliente" id="SeleccionarCliente" style="display:none">
	                        <option value="">Seleccionar</option>
	                        <?php $_from = $this->_tpl_vars['Clientes']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['t']):
?>
	                        <option value="<?php echo $this->_tpl_vars['t']['Id']; ?>
" <?php if (( $this->_tpl_vars['t']['Id'] == $this->_tpl_vars['ClienteId'] )): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['t']['Nombre']; ?>
</option>
	                        <?php endforeach; endif; unset($_from); ?>
	                    </select>
                	</li>
                	<li>
                		<p><span>Proveedor</span> <input id="proveedor_autocomplete" value="Nombre"></input></p>
                		<!-- utilizados para cargar cuentas corriente en lightbox -->
						<p><a id="open_proveedor" class='ajax' href="" title=""><img src="/images/icons/zoom_in.png" title="Ver cuenta corriente"/>Ver cuenta corriente</a></p>
						<!-- END -->
                		<select name="" class="required CambiarProveedor" id="SeleccionarProveedor" style="display:none">
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
                	<li>
                		<input type="button" value="Crear orden de pago" href="/OrdenPago/Edit" class="button" title="" />
         				<input type="button" value="Crear factura de compra" href="/FacturaCompra/Edit" class="button" title="" />
                	</li>
                	<li>
                		<input type="button" value="Crear cobranza" href="/Cobranza/Edit" class="button" title="" />
         				<input type="button" value="Crear factura de venta" href="/Facturacion/Facturar" class="button" title="" />
                	</li>
                	<li>
                	</li>
                	<li></li>
                	<li>
                		<input type="button" value="Crear nota de credito" href="/NotaCredito/Edit" class="button" title="" />
         				<input type="button" value="Crear nota de debito" href="/NotaDebito/Edit" class="button" title="" />
                	</li>
                	<li>
                		<a class="ajax" id=""
								    href="/GestionEconomica/Bancos"
								    ><img src="/images/icons/zoom_in.png" title="Bancos propios"/> Bancos propios </a>
								    
						<a class="ajax" id="" href="/GestionEconomica/HistorialEfectivo"
						><img src="/images/icons/zoom_in.png" title="Ver historial efectivo"/> Caja</a>
                	</li>
                	<li>
                		<p>Percepciones: <span>$ <?php echo $this->_tpl_vars['Percepciones']; ?>
</span></p>
                		<a class="ajax" href="/GestionEconomica/Percepciones" title=""><img src="/images/icons/zoom_in.png" title=""/></a>
                		<br>
                		<p>Retenciones:  <span>$ <?php echo $this->_tpl_vars['Retenciones']; ?>
</span></p>
                		<a class="ajax" href="/GestionEconomica/Retenciones" title=""><img src="/images/icons/zoom_in.png" title=""/></a>
                	
                	</li>
                </ul>
         </div> <!-- /filtersBox-->
         
        
        <div class="filtersBox filtersInfoBox"> 
            <a class="ajax" id=""
								    href="/Facturacion/List/page/1/order/Id_DESC/"
								    ><img src="/images/icons/add.png" title="Liquidar"/> Facturas de venta </a>
								    
			<a class="ajax" id=""
								    href="/OrdenPago/List/page/1/order/Id_DESC/"
								    ><img src="/images/icons/add.png" title="Liquidar"/> Ordenes de pago </a>
								    
			<a class="ajax" id=""
								    href="/OrdenCompra/List/page/1/order/Id_DESC/"
								    ><img src="/images/icons/add.png" title="Liquidar"/> Ordenes de compra </a>								    
         			
			<a class="ajax" id=""
								    href="/FacturaCompra/List/order/NumeroInterno_DESC"
								    ><img src="/images/icons/add.png" title="Liquidar"/> Facturas de compra </a>
								    
			<a class="ajax" id=""
								    href="/Cobranza/List/order/Id_DESC/"
								    ><img src="/images/icons/add.png" title="Liquidar"/> Cobranzas </a>
								    
			<a class="ajax" id=""
								    href="/NotaDebito/List/order/Id_DESC/"
								    ><img src="/images/icons/add.png" title="Liquidar"/> Notas de debito </a>
			
			<a class="ajax" id=""
								    href="/NotaCredito/List/order/Id_DESC/"
								    ><img src="/images/icons/add.png" title="Liquidar"/> Notas de credito </a>					    
								    
			<br>
			<br>
			<a class="ajax" id=""
								    href="/Insumo/ListPendientesDePago"
								    ><img src="/images/icons/add.png" title="Liquidar"/> Previsiones </a>					    
			
			<a class="ajax" id=""
								    href="/Cheque/List"
								    ><img src="/images/icons/add.png" title="Liquidar"/> Cheques </a>
								    
			<a class="ajax" id=""
								    href="/GestionEconomica/ListBancos/order/Codigo_DESC/"
								    ><img src="/images/icons/add.png" title="Liquidar"/> Bancos </a>
								    
			<a class="ajax" id=""
								    href="/GestionEconomica/ListConceptosBancarios/order/Nombre_DESC/"
								    ><img src="/images/icons/add.png" title="Liquidar"/> Conceptos bancarios </a>
			
			<a class="ajax" id=""
								    href="/Rubro/List/order/Nombre_DESC/"
								    ><img src="/images/icons/add.png" title="Liquidar"/> Rubros </a>
								    
			<a class="ajax" id=""
								    href="/TipoGasto/List/order/Nombre_DESC/"
								    ><img src="/images/icons/add.png" title="Liquidar"/> Tipos de gasto </a>
							    
        </div> <!-- /filtersBox-->
           
             <div class="sectionMenu" id="ResumeTabs">
             
                	<a id="TabCobranzasPendientes" href="/GestionAdministrativa/CobranzasPendientes" title=""><span>Cobranzas pendientes<?php if ($this->_tpl_vars['PendienteDeCobro']): ?> (<?php echo $this->_tpl_vars['PendienteDeCobro']; ?>
)<?php endif; ?></span></a>
                    
					<a id="TabPagosPendientes" href="/GestionAdministrativa/PagosPendientes" title=""><span>Pagos pendientes<?php if ($this->_tpl_vars['PagosPendientes']): ?> (<?php echo $this->_tpl_vars['PagosPendientes']; ?>
)<?php endif; ?></span></a>
					
                    <a id="TabFacturacionPendiente" href="/GestionAdministrativa/FacturacionPendiente" title=""><span>Facturacion pendiente<?php if ($this->_tpl_vars['PendienteDeFacturar']): ?> (<?php echo $this->_tpl_vars['PendienteDeFacturar']; ?>
)<?php endif; ?></span></a>
                    
                    <a id="TabChequesEnCartera" href="/GestionEconomica/ChequesTerceros" title=""><span>Cheques cartera (<?php echo $this->_tpl_vars['CantidadChequesCartera']; ?>
)</span></a>
                    
                    <a id="TabChequesPendientesAcreditar" href="/GestionEconomica/ChequesPendientesAcreditar" title=""><span>Cheques a acreditar (<?php echo $this->_tpl_vars['CantidadPendientesAcreditar']; ?>
)</span></a>
                    
                    <a id="TabChequesPendientesDebitar" href="/GestionEconomica/ChequesPendientesDebitar" title=""><span>Cheques a debitar (<?php echo $this->_tpl_vars['CantidadPendientesDebitar']; ?>
)</span></a>
                    <!-- 
                    <a id="TabNotificaciones" href="/GestionAdministrativa/Notificaciones" title=""><span>Notificaciones 
                     
                    <?php if ($this->_tpl_vars['NotificacionesPendientes']): ?>
						<img src="/images/icons/email_add.png" title="Nueva notificacion"/>
					<?php endif; ?>
                    </span></a>
                    -->
                    
             </div>	<!--/sectionMenu -->
        	
			<?php else: ?>
				<p class="error" style="width:61%;"><?php echo $this->_tpl_vars['editErrorMessage']; ?>
</p>
			<?php endif; ?>
			
            <div id="ExamenHomePreloader"><!-- contenido de formulario de un examen --></div>
            <div id="HomeContent"><!-- contenido de formulario de un examen --></div>
			
        </div> <!-- /listado -->