<?php /* Smarty version 2.6.26, created on 2016-05-03 12:10:14
         compiled from Backend/OrdenPago/GetNotas.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'count', 'Backend/OrdenPago/GetNotas.tpl', 44, false),)), $this); ?>
<?php echo '
<script type="text/javascript">
$(document).ready(function(){
    $(".AgregarPagoNotaCredito").click(function(){

        if(IsSetProveedor())
        {
        	$(\'#NotaCreditoId\').val($(this).attr(\'pagoid\'));
        	GetPagos(\'add\', $(\'#OrdenDePagoId\').val());
        }
        else
            alert(\'Ingrese el proveedor\');

        return false;
    });
});

</script>
'; ?>


<input type="hidden" id="NotaCreditoId" value="" />

<h2>Notas pendientes</h2>

<div class="list">
			      
           <div class="listTop">
                <div>
                    <table border="0" cellpadding="0" cellspacing="0">
							<tr>    
                                <td width="10%"><p>Fecha</p> </td>
                                <td width="10%"><p>Numero</p> </td>
                                <td width="10%"><p>Importe</p> </td>
                                <td width="10%"><p>Tipo</p> </td>
                                
                                <td width="10%"><p>Acciones</p></td>
                            </tr>
                    </table>
                </div>
            </div> <!-- /listadoTop -->
                        
                    <div class="listItems">
                    	<table border="0" cellpadding="0" cellspacing="0" width="100%">
                        <?php if (! count($this->_tpl_vars['Notas'])): ?>
                        	<tr class="noResult">
                                <td colspan="10" align="center"><h2 class="noResult">No se ha encontrado ninguna retencion.</h2></td>
                            </tr>
                        <?php else: ?>
                        
						<?php $_from = $this->_tpl_vars['Notas']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['no']):
?>
						    <tr <?php echo $this->_tpl_vars['className']; ?>
>
                                <td width="10%"><?php echo $this->_tpl_vars['no']['Fecha']; ?>
 </td>
                                <td width="10%"><?php echo $this->_tpl_vars['no']['Numero']; ?>
 </td>
                                <td width="10%">$ <?php echo $this->_tpl_vars['no']['Importe']*-1; ?>
 </td>
                                <td width="10%"><?php echo $this->_tpl_vars['no']['TipoNota']; ?>
 </td>
                                
                                <td width="10%">
                                	<a class="AgregarPagoNotaCredito" pagoid="<?php echo $this->_tpl_vars['no']['NumeroInterno']; ?>
"><img src="/images/icons/add.png" title="Agregar pago"/> Agregar</a>
                                </td>
						    </tr>
						<?php endforeach; endif; unset($_from); ?>
                        
                        <?php endif; ?>
                        </table>
                    </div> <!-- /listItems -->
</div><!-- en list -->