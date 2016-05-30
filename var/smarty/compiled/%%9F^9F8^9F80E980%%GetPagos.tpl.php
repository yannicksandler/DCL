<?php /* Smarty version 2.6.26, created on 2016-05-04 13:59:11
         compiled from Backend/Cobranza/GetPagos.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'count', 'Backend/Cobranza/GetPagos.tpl', 101, false),)), $this); ?>
<?php echo '
<script type="text/javascript">
$(document).ready(function(){
    $(".AgregarPago").click(function(){

        if(IsSetCliente())
        {
        	GetPagos(\'add\', $(\'#CobranzaId\').val());
        }
        else
            alert(\'Ingrese el cliente\');
          

        return false;
    });

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
    		$("#FormEfectivo").hide();
    		$("#FormTransferencia").hide();
    		$("#FormCheque").show();
    		return;
    	}
    	// transferencia, mostrar form
    	if(PagoTipoId == 13)
    	{
    		$("#FormEfectivo").hide();
    		$("#FormCheque").hide();
    		$("#FormTransferencia").show();
    		return;
    	}
    	else
    	{
    		$("#FormEfectivo").show();
    		$("#FormCheque").hide();
    		$("#FormTransferencia").hide();
    		return;
    	}
    });

    //$("#FormCheque").hide();
});

function abrirPopUp(pagina, opciones)
{
	window.open(pagina,"",opciones);
}

</script>
'; ?>



<!-- insumos -->
<h1>Detalle de cobro</h1>
<!-- 
<?php if (! count($this->_tpl_vars['Pagos'])): ?>
<p class="error">No hay pagos asociados a la orden de pago <img src="/images/icons/error.png" /></p>              
<?php endif; ?>
 -->
<?php if ($this->_tpl_vars['deleteErrorMessage']): ?><p class="error"><?php echo $this->_tpl_vars['deleteErrorMessage']; ?>
 <img src="/images/icons/error.png" /></p><?php endif; ?>
<?php if ($this->_tpl_vars['successMessage']): ?><p class="success"><?php echo $this->_tpl_vars['successMessage']; ?>
 <img src="/images/icons/tick.png" /></p><?php endif; ?>

<h2>Total del cobro: $ <?php echo $this->_tpl_vars['TotalPago']; ?>
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
                                
                                <td width="10%"><p>Cobro</p> </td>
                                
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
                                <!-- usado desde array session y como propiedad de CobranzaDetalle -->
                                <td width="10%"><?php echo $this->_tpl_vars['d']['FechaCobro']; ?>
 </td>
                                
                                <td width="10%">
                                <?php if (! $this->_tpl_vars['ExisteCobranza']): ?>
                                    <p>
                                    <?php if (! $this->_tpl_vars['data']['Id']): ?>
                                        <input type="button" class="BorrarPago btDelete" id="<?php echo $this->_tpl_vars['d']['Id']; ?>
" title="Borrar pago">
                                    <?php endif; ?>
                                    </p>
                                <?php endif; ?>
                                </td>
						    </tr>
						<?php endforeach; endif; unset($_from); ?>
                        
                        <?php endif; ?>
                        </table>
                    </div> <!-- /listItems -->
                    
                    <!-- si existe la orden de pago, no se pueden agregar pagos -->
                    <?php if (! $this->_tpl_vars['ExisteCobranza']): ?>
                    <?php if (! $this->_tpl_vars['data']['Id']): ?>
                    <!-- el tipo de pago de termina el formulario -->
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
					<div id="FormCheque" style="display:none;">
                       	<table border="0" cellpadding="0" cellspacing="0">
                            <tr <?php echo $this->_tpl_vars['className']; ?>
   height="30">
                                <td width="10%">
                                	<input type="text" value="Banco" class="" name="BancoItem" id="BancoItem"/> 
                                </td>
                                <td width="10%">
                                	<input type="text" value="Sucursal" name="SucursalItem" id="SucursalItem"/> 
                                </td>
                                <td width="10%">
                                	<input type="text" value="Localidad" name="LocalidadItem" id="LocalidadItem"/> 
                                </td>
                                <td width="10%">
                                	<input type="text" value="Importe" class="" name="ImporteChequeItem" id="ImporteChequeItem"/> 
                                </td>
						    </tr>
						    <tr <?php echo $this->_tpl_vars['className']; ?>
   height="30">
                                <td width="10%">
                                	<input type="text" value="Numero" class="" name="NumeroItem" id="NumeroItem"/> 
                                </td>
                                <!-- 
                                <td width="10%">
                                	<input type="text" value="Cuenta" class="" name="CuentaItem" id="CuentaItem"/> 
                                </td>
                                 -->
                                <td width="10%">
                                	<input type="text" value="Fecha emision" name="FechaChequeItem" id="FechaChequeItem"/> 
                                </td>
                                <td width="10%">
                                	<input type="text" value="Fecha de cobro" name="FechaCobroItem" id="FechaCobroItem"/> 
                                </td>
						    </tr>
						    <tr <?php echo $this->_tpl_vars['className']; ?>
   height="30">
                                <td width="10%">
                                	<input type="text" value="Firmante" class="" name="FirmanteItem" id="FirmanteItem"/> 
                                </td>
                                <td width="10%">
                                	<input type="text" value="Cuit" class="" name="CuitItem" id="CuitItem"/> 
                                </td>
                                <td width="10%">
                                	<a class="AgregarPago" ><img src="/images/icons/add.png" title="Agregar pago"/> Agregar pago</a>
                                </td>
						    </tr>
						</table>
                    </div>
                    
                    <div id="ChequesTerceros">
                    <img src="/images/icons/bullet_go.png" title="item"/>
                    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "Backend/Cobranza/GetNotasDeCreditoPendientes.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
					</div>
					<?php endif; ?>
					<?php endif; ?>
                </div> <!-- /list -->
<!-- end pagos -->