<?php /* Smarty version 2.6.26, created on 2014-09-18 15:43:37
         compiled from Backend/OrdenPago/GetChequesTerceros.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'count', 'Backend/OrdenPago/GetChequesTerceros.tpl', 23, false),)), $this); ?>
<?php echo '
<script type="text/javascript">
$(document).ready(function(){
    $(".AgregarPagoCheque").click(function(){

        if(IsSetProveedor())
        {
        	$(\'#ChequeId\').val($(this).attr(\'chequeid\'));
        	GetPagos(\'add\', $(\'#OrdenDePagoId\').val());
        }
        else
            alert(\'Ingrese el cliente\');

        return false;
    });
});

</script>
'; ?>


<input type="hidden" id="ChequeId" value="" />

<h2>Cheques en cartera (<?php echo count($this->_tpl_vars['Cheques']); ?>
)</h2>

<div class="list">
			      
           <div class="listTop">
                <div>
                    <table border="0" cellpadding="0" cellspacing="0">
							<tr>    
                                <td width="10%"><p>Emision</p> </td>
                                <td width="10%"><p>Importe</p> </td>
                                <td width="20%"><p>Detalle</p> </td>
                                <td width="10%"><p>Cobro</p> </td>
                                <td width="10%"><p>Vencimiento</p> </td>
                                
                                <td width="10%"><p>Acciones</p></td>
                            </tr>
                    </table>
                </div>
            </div> <!-- /listadoTop -->
                        
                    <div class="listItems">
                    	<table border="0" cellpadding="0" cellspacing="0" width="100%">
                        <?php if (! count($this->_tpl_vars['Cheques'])): ?>
                        	<tr class="noResult">
                                <td colspan="10" align="center"><h2 class="noResult">No se ha encontrado ning&uacute;n cheque.</h2></td>
                            </tr>
                        <?php else: ?>
                        
						<?php $_from = $this->_tpl_vars['Cheques']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['d']):
?>
						    <tr <?php echo $this->_tpl_vars['className']; ?>
>
                                <td width="10%"><?php echo $this->_tpl_vars['d']['FechaEmision']; ?>
 </td>
                                <td width="10%">$ <?php echo $this->_tpl_vars['d']['Importe']; ?>
 </td>
                                <td width="20%"><?php echo $this->_tpl_vars['d']['NombreBanco']; ?>
 #<?php echo $this->_tpl_vars['d']['Numero']; ?>
 (<?php echo $this->_tpl_vars['d']['Tipo']; ?>
)</td>
                                <td width="10%"><?php echo $this->_tpl_vars['d']['FechaCobro']; ?>
 </td>
                                <td width="10%"><?php echo $this->_tpl_vars['d']['FechaVencimiento']; ?>
 </td>
                                
                                <td width="10%">
                                	<a class="AgregarPagoCheque" chequeid="<?php echo $this->_tpl_vars['d']['Id']; ?>
"><img src="/images/icons/add.png" title="Agregar pago"/> Agregar</a>
                                </td>
						    </tr>
						<?php endforeach; endif; unset($_from); ?>
                        
                        <?php endif; ?>
                        </table>
                    </div> <!-- /listItems -->
</div><!-- en list -->