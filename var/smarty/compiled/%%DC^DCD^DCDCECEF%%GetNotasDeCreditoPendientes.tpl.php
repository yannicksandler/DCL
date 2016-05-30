<?php /* Smarty version 2.6.26, created on 2016-05-04 13:59:06
         compiled from Backend/Cobranza/GetNotasDeCreditoPendientes.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'count', 'Backend/Cobranza/GetNotasDeCreditoPendientes.tpl', 43, false),)), $this); ?>
<?php echo '
<script type="text/javascript">
$(document).ready(function(){
    $(".AgregarPagoNotaCredito").click(function(){

        if(IsSetCliente())
        {
        	$(\'#NotaCreditoId\').val($(this).attr(\'notacreditoid\'));
        	GetPagos(\'add\', $(\'#CobranzaId\').val());
        }
        else
            alert(\'Ingrese el cliente\');

        return false;
    });
});

</script>
'; ?>


<input type="hidden" id="NotaCreditoId" value="" />

<h2>Notas de credito</h2>

<div class="list">
			      
           <div class="listTop">
                <div>
                    <table border="0" cellpadding="0" cellspacing="0">
							<tr>    
                                <td width="10%"><p>Fecha</p> </td>
                                <td width="10%"><p>Importe</p> </td>
                                <td width="20%"><p>Detalle</p> </td>
                                
                                <td width="10%"><p>Acciones</p></td>
                            </tr>
                    </table>
                </div>
            </div> <!-- /listadoTop -->
                        
                    <div class="listItems">
                    	<table border="0" cellpadding="0" cellspacing="0" width="100%">
                        <?php if (! count($this->_tpl_vars['NotasCredito'])): ?>
                        	<tr class="noResult">
                                <td colspan="10" align="center"><h2 class="noResult">No se ha encontrado ninguna notas de credito.</h2></td>
                            </tr>
                        <?php else: ?>
                        
						<?php $_from = $this->_tpl_vars['NotasCredito']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['d']):
?>
						    <tr <?php echo $this->_tpl_vars['className']; ?>
>
                                <td width="10%"><?php echo $this->_tpl_vars['d']['Fecha']; ?>
 </td>
                                <td width="10%">$ <?php echo $this->_tpl_vars['d']['Importe']; ?>
 </td>
                                <td width="20%"><?php echo $this->_tpl_vars['d']['Descripcion']; ?>
</td>
                                
                                <td width="10%">
                                	<a class="AgregarPagoNotaCredito" notacreditoid="<?php echo $this->_tpl_vars['d']['Id']; ?>
"><img src="/images/icons/add.png" title="Agregar pago"/> Agregar</a>
                                </td>
						    </tr>
						<?php endforeach; endif; unset($_from); ?>
                        
                        <?php endif; ?>
                        </table>
                    </div> <!-- /listItems -->
</div><!-- en list -->