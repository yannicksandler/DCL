<?php /* Smarty version 2.6.26, created on 2016-05-03 12:10:32
         compiled from Backend/OrdenPago/GetPagos.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'count', 'Backend/OrdenPago/GetPagos.tpl', 209, false),)), $this); ?>
<?php echo '
<script type="text/javascript">
$(document).ready(function(){
    $(".AgregarPago").click(function(){

        if(IsSetProveedor())
        {
        	GetPagos(\'add\', $(\'#OrdenDePagoId\').val());
        }
        else
            alert(\'Ingrese el proveedor\');
          

        return false;
    });
	// cargar retenciones de acuerdo al proveedor
    //VerificarProveedor();

    $(".BorrarPago").click(function(){
        var PagoId	=	$(this).attr(\'id\');
        
        
        if(PagoId)
        	GetPagos(\'del\', PagoId);

        return false;
    });

    $("#ImportePagoItem").blur(function(){
        if( $(this).val() == \'\' )
            $(this).val( $(this).attr("defaultValue") );
    });

    $("#ImportePagoItem").focus(function(){
        if( $(this).val() == $(this).attr("defaultValue"))
            $(this).val(\'\');
    });

    $("#DetallePagoItem").blur(function(){
        if( $(this).val() == \'\' )
            $(this).val( $(this).attr("defaultValue") );
    });

    $("#DetallePagoItem").focus(function(){
        if( $(this).val() == $(this).attr("defaultValue"))
            $(this).val(\'\');
    });

    $(\'#FechaChequeItem\').datepicker({
		changeMonth: true,
		changeYear: true,
        dateFormat: \'dd/mm/yy\'
	});

    $(\'#FechaCobroItem\').datepicker({
		changeMonth: true,
		changeYear: true,
        dateFormat: \'dd/mm/yy\'
	});

    $(\'#PagoTipoId\').change(function(){
    	var PagoTipoId	=	$("#PagoTipoId option:selected").val();
    	// si el tipo de pago es Cheque tercero = 4
    	if(PagoTipoId == 4)
    	{
    		GetChequesTerceros();
    		$("#ChequesTerceros").show();
    		$("#FormEfectivo").hide();
    		$("#FormTransferencia").hide();
    		$("#FormChequePropio").hide();
    		return;
    	}
		// cheque propio, mostrar form
    	if(PagoTipoId == 1)
    	{
    		//$("#ChequesTerceros").hide();
    		$("#FormEfectivo").hide();
    		$("#FormTransferencia").hide();
    		$("#FormChequePropio").show();
    		return;
    	}
    	// retenciones
    	// ->andWhereIn(\'p.PagoTipoId\', array(6,7,8,9,10,11))
    	if((PagoTipoId == 6) || (PagoTipoId == 7) || (PagoTipoId == 8) ||
    			(PagoTipoId == 9) || (PagoTipoId == 10) || (PagoTipoId == 11))
    	{
    		//$("#ChequesTerceros").hide();
    		$("#FormEfectivo").hide();
    		$("#FormTransferencia").hide();
    		$("#FormChequePropio").hide();
    		$("#FormRetenciones").show();
    		GetRetencionesPendientes();
    		return;
    	}
    	// percepciones
    	// ->andWhereIn(\'p.PagoTipoId\', array(6,7,8,9,10,11))
    	if((PagoTipoId == 14) || (PagoTipoId == 15) || (PagoTipoId == 16))
    	{
    		//$("#ChequesTerceros").hide();
    		$("#FormEfectivo").hide();
    		$("#FormTransferencia").hide();
    		$("#FormChequePropio").hide();
    		$("#FormRetenciones").hide();
    		$("#FormPercepciones").show();
    		GetPercepcionesPendientes();
    		return;
    	}
    	// transferencia, mostrar form
    	if(PagoTipoId == 13)
    	{
    		//$("#ChequesTerceros").hide();
    		$("#FormEfectivo").hide();
    		$("#FormChequePropio").hide();
    		$("#FormTransferencia").show();
    		return;
    	}
    	else
    	{
    		//$("#ChequesTerceros").hide();
    		$("#FormChequePropio").hide();
    		$("#FormTransferencia").hide();
    		$("#FormEfectivo").show();
    		return;
    	}
    });
	
});

function abrirPopUp(pagina, opciones)
{
	window.open(pagina,"",opciones);
}

function GetChequesTerceros()
{
	$.ajax({
		type: "POST",
		url: \'/OrdenPago/GetChequesTerceros\',
		dataType: "text/html",
		data: {
			\'data[TipoDePago]\': GetTipoOrdenDePago()
		},
		success: function(html){
			$("#ChequesTerceros").html(html);
		}

	});
}

function VerificarProveedor()
{
	var id = GetProveedorId();
	// si el proveedor es APIF IVA
	if(id==175)
	{
		GetRetencionesPendientes();
	}
}

function GetRetencionesPendientes()
{
	$.ajax({
		type: "POST",
		url: \'/OrdenPago/GetRetenciones\',
		dataType: "text/html",
		data: {
			\'data[TipoDePago]\': GetTipoOrdenDePago(),
			\'data[TipoRetencion]\': $("#PagoTipoId option:selected").val()
		},
		success: function(html){
			$("#FormRetenciones").html(html);
		}

	});
}

function GetPercepcionesPendientes()
{
	$.ajax({
		type: "POST",
		url: \'/OrdenPago/GetPercepciones\',
		dataType: "text/html",
		data: {
			\'data[TipoDePago]\': GetTipoOrdenDePago(),
			\'data[TipoPercepcion]\': $("#PagoTipoId option:selected").val()
		},
		success: function(html){
			$("#FormPercepciones").html(html);
		}

	});
}

</script>

<style type="text/css">
div.SeleccionDePago {
	border-width: thin;
	border-style: solid;
	border-color: black;
}
</style>
'; ?>



<!-- insumos -->
<h1>Detalle de pago</h1>
<!-- 
<?php if (! count($this->_tpl_vars['Pagos'])): ?>
<p class="error">No hay pagos asociados a la orden de pago <img src="/images/icons/error.png" /></p>              
<?php endif; ?>
 -->
<?php if ($this->_tpl_vars['deleteErrorMessage']): ?><p class="error"><?php echo $this->_tpl_vars['deleteErrorMessage']; ?>
 <img src="/images/icons/error.png" /></p><?php endif; ?>
<?php if ($this->_tpl_vars['successMessage']): ?><p class="success"><?php echo $this->_tpl_vars['successMessage']; ?>
 <img src="/images/icons/tick.png" /></p><?php endif; ?>

<h2>Total del pago: $ <?php echo $this->_tpl_vars['TotalPago']; ?>
</h2>
<input type="hidden" id="TotalPago" name="" value="<?php echo $this->_tpl_vars['TotalPago']; ?>
" />
	<div class="list">
			      
           <div class="listTop">
                <div>
                    <table border="0" cellpadding="0" cellspacing="0">
							<tr>    
                                <td width="10%"><p>Tipo de pago</p> </td>
                                <td width="10%"><p>Importe</p> </td>
                                <td width="20%"><p>Detalle</p> </td>
                                
                                <td width="10%"><p>Fecha cobro</p> </td>
                                
                                <td width="10%"><p>Acciones</p></td>
                            </tr>
                    </table>
                </div>
            </div> <!-- /listadoTop -->
                        
                    <div class="listItems">
                    	<table border="0" cellpadding="0" cellspacing="0" width="100%">
                        <?php if (! count($this->_tpl_vars['Pagos'])): ?>
                        	<tr class="noResult">
                                <td colspan="10" align="center"><h2 class="noResult">No se ha encontrado ning&uacute;n pago.</h2></td>
                            </tr>
                        <?php else: ?>
                        
						<?php $_from = $this->_tpl_vars['Pagos']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['d']):
?>
						    <tr <?php echo $this->_tpl_vars['className']; ?>
>
                                <td width="10%"><?php echo $this->_tpl_vars['d']['NombrePagoTipo']; ?>
 </td>
                                <td width="10%">$ <?php echo $this->_tpl_vars['d']['Importe']; ?>
 </td>
                                <td width="20%"><?php echo $this->_tpl_vars['d']['Detalle']; ?>
 </td>
                                <td width="10%"><?php echo $this->_tpl_vars['d']['FechaCobro']; ?>
 </td>
                                
                                <td width="10%">
                                <?php if (! $this->_tpl_vars['ExisteOrdenDePago']): ?>
                                    <p>
                                        <input type="button" class="BorrarPago btDelete" id="<?php echo $this->_tpl_vars['d']['Id']; ?>
" title="Borrar pago">
                                    </p>
                                <?php endif; ?>
                                </td>
						    </tr>
						<?php endforeach; endif; unset($_from); ?>
                        
                        <?php endif; ?>
                        </table>
                    </div> <!-- /listItems -->
                    
                    <!-- si existe la orden de pago, no se pueden agregar pagos -->
                    <?php if (! $this->_tpl_vars['ExisteOrdenDePago']): ?>
                    <select name="PagoTipoId" class="" id="PagoTipoId">
		                        <option value="">Seleccionar pago</option>
		                        <?php $_from = $this->_tpl_vars['PagoTipos']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['a']):
?>
		                        <option value="<?php echo $this->_tpl_vars['a']['Id']; ?>
"><?php echo $this->_tpl_vars['a']['Nombre']; ?>
</option>
		                        <?php endforeach; endif; unset($_from); ?>
		            </select>     		
		            
		            <div id="FormEfectivo" style="display:none;">
                    <table border="0" cellpadding="0" cellspacing="0">
                            <tr <?php echo $this->_tpl_vars['className']; ?>
   height="50">
                                <td width="10%">
                                	<input type="text" value="Importe" class="" name="ImporteItem" id="ImportePagoItem"/> 
                                </td>
                                
                                <td width="10%">
                                	<input type="text" value="Detalle" name="DetalleItem" id="DetallePagoItem"/> 
                                </td>
                                
                                <td width="10%">
                                	<a class="AgregarPago" ><img src="/images/icons/add.png" title="Agregar pago"/> Agregar pago</a>
                                </td>
						    </tr>
					</table>
					</div>
					<div id="FormTransferencia" style="display:none;">
                    <table border="0" cellpadding="0" cellspacing="0">
                            <tr <?php echo $this->_tpl_vars['className']; ?>
   height="50">
                                <td width="10%">
                                	<input type="text" value="Importe" class="" name="ImporteItem" id="ImporteTransferenciaItem"/> 
                                </td>
                                <td width="10%">
	                                <select name="" class="" id="BancoTransfItem">
				                        <option value="">Seleccionar</option>
				                        <?php $_from = $this->_tpl_vars['Bancos']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['t']):
?>
				                        <option value="<?php echo $this->_tpl_vars['t']['Id']; ?>
" <?php if (( $this->_tpl_vars['t']['Id'] == $this->_tpl_vars['BancoId'] )): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['t']['Nombre']; ?>
 - <?php echo $this->_tpl_vars['t']['NumeroDeCuenta']; ?>
</option>
				                        <?php endforeach; endif; unset($_from); ?>
				                    </select>
                                </td>
                            </tr>
                            <tr <?php echo $this->_tpl_vars['className']; ?>
   height="30">
                                <td width="10%">
                                	<a class="AgregarPago" ><img src="/images/icons/add.png" title="Agregar pago"/> Agregar pago</a>
                                </td>
						    </tr>
					</table>
					</div>
					<div id="FormChequePropio" style="display:none;">
                       	<table border="0" cellpadding="0" cellspacing="0">
                            <tr <?php echo $this->_tpl_vars['className']; ?>
   height="30">
                                <td width="10%">
                                	<input type="text" value="Importe" class="" name="ImporteChequeItem" id="ImporteChequeItem"/> 
                                </td>
                                <td width="10%">
	                                <select name="" class="" id="BancoItem">
				                        <option value="">Seleccionar</option>
				                        <?php $_from = $this->_tpl_vars['Bancos']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['t']):
?>
				                        <option value="<?php echo $this->_tpl_vars['t']['Id']; ?>
" <?php if (( $this->_tpl_vars['t']['Id'] == $this->_tpl_vars['BancoId'] )): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['t']['Nombre']; ?>
 - <?php echo $this->_tpl_vars['t']['NumeroDeCuenta']; ?>
</option>
				                        <?php endforeach; endif; unset($_from); ?>
				                    </select>
                                </td>
                                <td width="10%">
                                	<input type="text" value="Fecha emision" name="FechaChequeItem" id="FechaChequeItem"/> 
                                </td>
                                <td width="10%">
                                	<input type="text" value="Fecha cobro" name="FechaCobroItem" id="FechaCobroItem"/> 
                                </td>
						    </tr>
						    <tr <?php echo $this->_tpl_vars['className']; ?>
   height="30">
						    <!-- 
                                <td width="10%">
                                	<input type="text" value="Firmante" class="" name="FirmanteItem" id="FirmanteItem"/> 
                                </td>
                                 -->
                                <td width="10%">
                                	<a class="AgregarPago" ><img src="/images/icons/add.png" title="Agregar pago"/> Agregar pago</a>
                                </td>
						    </tr>
						</table>
                    </div>
                    
                    <div>
                    <img src="/images/icons/bullet_go.png" title="item"/>
						<br><h2>Efectivo: <span>$ <?php echo $this->_tpl_vars['Efectivo']; ?>
</span></h2><br><br>
					</div>
					
					<div id="FormNotas">
					<img src="/images/icons/bullet_go.png" title="item"/>
                    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "Backend/OrdenPago/GetNotas.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
					</div>
					
					<div id="FormRetenciones">
					<img src="/images/icons/bullet_go.png" title="item"/>
                    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "Backend/OrdenPago/GetRetenciones.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
					</div>
					
					<div id="FormPercepciones">
					<img src="/images/icons/bullet_go.png" title="item"/>
                    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "Backend/OrdenPago/GetPercepciones.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
					</div>
					
                    <div id="ChequesTerceros">
                    <img src="/images/icons/bullet_go.png" title="item"/>
                    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "Backend/OrdenPago/GetChequesTerceros.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
					</div>
					
					<div>
					<img src="/images/icons/bullet_go.png" title="item"/>
                    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "Backend/GestionEconomica/Bancos.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                    </div>
                    
					<?php endif; ?>
					
                </div> 
<!-- end pagos -->