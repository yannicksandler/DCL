<?php /* Smarty version 2.6.26, created on 2014-09-16 16:03:58
         compiled from Backend/GestionEconomica/HistorialEfectivo.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'count', 'Backend/GestionEconomica/HistorialEfectivo.tpl', 50, false),)), $this); ?>
<link rel="stylesheet" href="/scripts/colorbox-master/colorbox-master/example1/colorbox.css" />
<script src="/scripts/colorbox-master/colorbox-master/jquery.colorbox.js"></script>

<?php echo '
<script type="text/javascript">
$(document).ready(function(){

	$(".ajax").colorbox();
	
    $(".AgregarPago").click(function(){

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


<h1>Historial de efectivo</h1>

<div class="list" style="width:750px">
			      
           <div class="listTop">
                <div>
                    <table border="0" cellpadding="0" cellspacing="0">
							<tr>    
                                <td width="10%"><p>Fecha</p> </td>
                                <td width="10%"><p>Debe</p> </td>
                                <td width="10%"><p>Haber</p> </td>
                                <td width="20%"><p>Detalle</p> </td>
                                <td width="10%"><p>Saldo</p> </td>
                                <!--
                                <td width="10%"><p>Acciones</p></td>
                                -->
                            </tr>
                    </table>
                </div>
            </div> <!-- /listadoTop -->
                        
                    <div class="listItems listItemsScroll">
                    	<table border="0" cellpadding="0" cellspacing="0" width="100%">
                        <?php if (! count($this->_tpl_vars['Historial'])): ?>
                        	<tr class="noResult">
                                <td colspan="10" align="center"><h2 class="noResult">No se ha encontrado ning&uacute;n registro.</h2></td>
                            </tr>
                        <?php else: ?>
                        
						<?php $_from = $this->_tpl_vars['Historial']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['d']):
?>
						    <tr <?php echo $this->_tpl_vars['className']; ?>
>
                                <td width="10%"><?php echo $this->_tpl_vars['d']['Fecha']; ?>
 </td>
                                <td width="10%"><?php if ($this->_tpl_vars['d']['Debe']): ?>$ <?php echo $this->_tpl_vars['d']['Debe']; ?>
<?php endif; ?></td>
                                <td width="10%"><?php if ($this->_tpl_vars['d']['Haber']): ?>$ <?php echo $this->_tpl_vars['d']['Haber']; ?>
<?php endif; ?></td>
                                <td width="20%"><?php echo $this->_tpl_vars['d']['Detalle']; ?>
 </td>
                                <td width="10%"><?php echo $this->_tpl_vars['d']['Saldo']; ?>
 </td>
                                <!-- 
                                <td width="10%">			    
                                	 
                                </td>
                                 -->
						    </tr>
						<?php endforeach; endif; unset($_from); ?>
                        
                        <?php endif; ?>
                        </table>
                    </div> <!-- /listItems -->
</div><!-- en list -->