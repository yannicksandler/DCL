<?php /* Smarty version 2.6.26, created on 2014-09-12 12:24:53
         compiled from Backend/GestionEconomica/Percepciones.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'count', 'Backend/GestionEconomica/Percepciones.tpl', 33, false),)), $this); ?>
<?php echo '
<script type="text/javascript">
$(document).ready(function(){

});

</script>
'; ?>


<h1>Percepciones pendientes</h1>

<div class="list" style="width:90%">
			      
           <div class="listTop">
                <div>
                    <table border="0" cellpadding="0" cellspacing="0">
							<tr>    
                                <td width="10%"><p>Fecha FC</p> </td>
                                <td width="10%"><p>FC</p> </td>
                                <td width="10%"><p>Proveedor</p> </td>
                                <td width="10%"><p>Importe percepcion</p> </td>
                                <td width="10%"><p>Tipo</p> </td>
                                
                                <td width="10%"><p>Accion</p> </td>
                                
                            </tr>
                    </table>
                </div>
            </div> <!-- /listadoTop -->
                        
                    <div class="listItems listItemsScroll">
                    	<table border="0" cellpadding="0" cellspacing="0" width="100%">
                        <?php if (! count($this->_tpl_vars['Percepciones'])): ?>
                        	<tr class="noResult">
                                <td colspan="10" align="center"><h2 class="noResult">No se ha encontrado ning&uacute;na percepcion.</h2></td>
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
                                <td width="10%"><?php echo $this->_tpl_vars['d']['Proveedor']['Nombre']; ?>
 </td>
                                <td width="10%">$ <?php echo $this->_tpl_vars['d']['Importe']; ?>
 </td>
                                <td width="10%"><?php echo $this->_tpl_vars['d']['Tipo']['Nombre']; ?>
 </td>
                                
                                <td width="10%"> </td>
                                
						    </tr>
						<?php endforeach; endif; unset($_from); ?>
                        
                        <?php endif; ?>
                        </table>
                    </div> <!-- /listItems -->
</div><!-- en list -->