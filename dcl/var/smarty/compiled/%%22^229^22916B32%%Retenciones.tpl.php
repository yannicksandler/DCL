<?php /* Smarty version 2.6.26, created on 2014-09-17 17:27:15
         compiled from Backend/GestionEconomica/Retenciones.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'count', 'Backend/GestionEconomica/Retenciones.tpl', 36, false),)), $this); ?>
<?php echo '
<script type="text/javascript">
$(document).ready(function(){
	$(".ajax").colorbox();
});

</script>
'; ?>


<h1>Retenciones pendientes</h1>

<div class="list" style="width:90%">
			      
           <div class="listTop">
                <div>
                    <table border="0" cellpadding="0" cellspacing="0">
							<tr>
							<?php if ($this->_tpl_vars['OcultarAccion']): ?>
								<td width="10%"><p>Fecha CO</p> </td>
                                <td width="10%"><p>Cobranza</p> </td>
                                <td width="10%"><p>Cliente</p> </td>
                            <?php endif; ?>
                                <td width="10%"><p>Total</p> </td>    
                                <td width="10%"><p>Detalle</p> </td>
                                
                                
                                <td width="10%"><p>Accion</p> </td>
                                
                            </tr>
                    </table>
                </div>
            </div> <!-- /listadoTop -->
                    
                    <div class="listItems listItemsScroll">
                    	<table border="0" cellpadding="0" cellspacing="0" width="100%">
                        <?php if (! count($this->_tpl_vars['Retenciones'])): ?>
                        	<tr class="noResult">
                                <td colspan="10" align="center"><h2 class="noResult">No se ha encontrado ning&uacute;na retencion.</h2></td>
                            </tr>
                        <?php else: ?>
                        
						<?php $_from = $this->_tpl_vars['Retenciones']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['d']):
?>
						    <tr <?php echo $this->_tpl_vars['className']; ?>
>
						    <?php if ($this->_tpl_vars['OcultarAccion']): ?>
						    	<td width="10%"><?php echo $this->_tpl_vars['d']['FechaCobranza']; ?>
 </td>
                                <td width="10%"><?php echo $this->_tpl_vars['d']['Cobranza']['Numero']; ?>
 </td>
                                <td width="10%"><?php echo $this->_tpl_vars['d']['Cliente']['Nombre']; ?>
 </td>
                            <?php endif; ?>
                                <td width="10%">$ <?php echo $this->_tpl_vars['d']['Importe']; ?>
 </td>
                                <td width="10%"><?php echo $this->_tpl_vars['d']['PagoTipoNombre']; ?>
 </td>
                                
                                
                                <td width="10%"> 
                                <?php if (! $this->_tpl_vars['OcultarAccion']): ?>
                                	<a class="ajax" id=""
								    href="/GestionEconomica/Retenciones/TipoRetencion/<?php echo $this->_tpl_vars['d']['PagoTipoId']; ?>
"
								    ><img src="/images/icons/zoom_in.png" title="Ver detalle"/> Detalle </a>
                                </td>
                                <?php endif; ?>
                                
						    </tr>
						<?php endforeach; endif; unset($_from); ?>
                        
                        <?php endif; ?>
                        </table>
                    </div> <!-- /listItems -->
</div><!-- en list -->