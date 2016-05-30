<?php /* Smarty version 2.6.26, created on 2014-09-18 15:43:37
         compiled from Backend/OrdenPago/GetPercepciones.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'count', 'Backend/OrdenPago/GetPercepciones.tpl', 44, false),)), $this); ?>
<?php echo '
<script type="text/javascript">
$(document).ready(function(){
    $(".AgregarPagoPercepcion").click(function(){

        if(IsSetProveedor())
        {
        	$(\'#PercepcionId\').val($(this).attr(\'pagoid\'));
        	GetPagos(\'add\', $(\'#OrdenDePagoId\').val());
        }
        else
            alert(\'Ingrese el proveedor\');

        return false;
    });
});

</script>
'; ?>


<input type="hidden" id="PercepcionId" value="" />

<h2>Percepciones</h2>

<div class="list">
			      
           <div class="listTop">
                <div>
                    <table border="0" cellpadding="0" cellspacing="0">
							<tr>    
                                <td width="10%"><p>Fecha</p> </td>
                                <td width="10%"><p>FC</p> </td>
                                <td width="10%"><p>Importe</p> </td>
                                <td width="10%"><p>Tipo</p> </td>
                                
                                <td width="10%"><p>Acciones</p></td>
                            </tr>
                    </table>
                </div>
            </div> <!-- /listadoTop -->
                        
                    <div class="listItems">
                    	<table border="0" cellpadding="0" cellspacing="0" width="100%">
                        <?php if (! count($this->_tpl_vars['Percepciones'])): ?>
                        	<tr class="noResult">
                                <td colspan="10" align="center"><h2 class="noResult">No se ha encontrado ninguna retencion.</h2></td>
                            </tr>
                        <?php else: ?>
                        
						<?php $_from = $this->_tpl_vars['Percepciones']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['d']):
?>
						    <tr <?php echo $this->_tpl_vars['className']; ?>
>
                                <td width="10%"><?php echo $this->_tpl_vars['d']['FechaGrabacion']; ?>
 </td>
                                <td width="10%"><?php echo $this->_tpl_vars['d']['FacturaCompraNumero']; ?>
 </td>
                                <td width="10%">$ <?php echo $this->_tpl_vars['d']['Importe']; ?>
 </td>
                                <td width="10%"><?php echo $this->_tpl_vars['d']['Tipo']['Nombre']; ?>
 </td>
                                
                                <td width="10%">
                                	<a class="AgregarPagoPercepcion" pagoid="<?php echo $this->_tpl_vars['d']['Id']; ?>
"><img src="/images/icons/add.png" title="Agregar pago"/> Agregar percepcion</a>
                                </td>
						    </tr>
						<?php endforeach; endif; unset($_from); ?>
                        
                        <?php endif; ?>
                        </table>
                    </div> <!-- /listItems -->
</div><!-- en list -->