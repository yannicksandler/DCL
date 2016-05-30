<?php /* Smarty version 2.6.26, created on 2016-05-03 12:10:14
         compiled from Backend/OrdenPago/GetRetenciones.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'count', 'Backend/OrdenPago/GetRetenciones.tpl', 44, false),array('modifier', 'escape', 'Backend/OrdenPago/GetRetenciones.tpl', 53, false),)), $this); ?>
<?php echo '
<script type="text/javascript">
$(document).ready(function(){
    $(".AgregarPagoRetencion").click(function(){

        if(IsSetProveedor())
        {
        	$(\'#RetencionId\').val($(this).attr(\'pagoid\'));
        	GetPagos(\'add\', $(\'#OrdenDePagoId\').val());
        }
        else
            alert(\'Ingrese el cliente\');

        return false;
    });
});

</script>
'; ?>


<input type="hidden" id="RetencionId" value="" />

<h2>Retenciones</h2>

<div class="list">
			      
           <div class="listTop">
                <div>
                    <table border="0" cellpadding="0" cellspacing="0">
							<tr>    
                                <td width="10%"><p>Fecha CO</p> </td>
                                <td width="10%"><p>CO</p> </td>
                                <td width="10%"><p>Detalle</p> </td>
                                <td width="10%"><p>Importe</p> </td>
                                
                                <td width="10%"><p>Acciones</p></td>
                            </tr>
                    </table>
                </div>
            </div> <!-- /listadoTop -->
                    
                    <div class="listItems">
                    	<table border="0" cellpadding="0" cellspacing="0" width="100%">
                        <?php if (! count($this->_tpl_vars['Retenciones'])): ?>
                        	<tr class="noResult">
                                <td colspan="10" align="center"><h2 class="noResult">No se ha encontrado ninguna retencion.</h2></td>
                            </tr>
                        <?php else: ?>
                        
						<?php $_from = $this->_tpl_vars['Retenciones']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['d']):
?>
						    <tr <?php echo $this->_tpl_vars['className']; ?>
>
                                <td width="10%"><?php if ($this->_tpl_vars['d']['CobranzaId'] == 1): ?>No tiene<?php else: ?><?php echo $this->_tpl_vars['d']['Cobranza']['Fecha']; ?>
<?php endif; ?> </td>
                                <td width="10%"><?php if ($this->_tpl_vars['d']['CobranzaId'] == 1): ?>Concepto bancario<?php else: ?><?php echo $this->_tpl_vars['d']['Cobranza']['Numero']; ?>
 <br>(<?php echo ((is_array($_tmp=$this->_tpl_vars['d']['Cobranza']['Cliente']['Nombre'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'htmlall') : smarty_modifier_escape($_tmp, 'htmlall')); ?>
)<?php endif; ?></td>
                                <td width="10%"><?php if ($this->_tpl_vars['d']['CobranzaId'] == 1): ?><?php echo $this->_tpl_vars['d']['Detalle']; ?>
<?php else: ?><?php echo $this->_tpl_vars['d']['PagoTipo']['Nombre']; ?>
<?php endif; ?> </td>
                                <td width="10%">$ <?php echo $this->_tpl_vars['d']['Importe']; ?>
 </td>
                                
                                <td width="10%">
                                	<a class="AgregarPagoRetencion" pagoid="<?php echo $this->_tpl_vars['d']['Id']; ?>
"><img src="/images/icons/add.png" title="Agregar pago"/> Agregar retencion</a>
                                </td>
						    </tr>
						<?php endforeach; endif; unset($_from); ?>
                        
                        <?php endif; ?>
                        </table>
                    </div> <!-- /listItems -->
</div><!-- en list -->