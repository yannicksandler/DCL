<?php /* Smarty version 2.6.26, created on 2014-09-19 12:09:37
         compiled from Backend/GestionEconomica/ChequesTerceros.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'count', 'Backend/GestionEconomica/ChequesTerceros.tpl', 51, false),array('modifier', 'escape', 'Backend/GestionEconomica/ChequesTerceros.tpl', 60, false),)), $this); ?>
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


<h1>Cheques en cartera</h1>

<div class="list">
			      
           <div class="listTop">
                <div>
                    <table border="0" cellpadding="0" cellspacing="0">
							<tr>    
                                <td width="10%"><p>Emision</p> </td>
                                <td width="10%"><p>Cliente</p> </td>
                                <td width="10%"><p>Importe</p> </td>
                                <td width="10%"><p>Tipo</p> </td>
                                <td width="20%"><p>Detalle</p> </td>
                                <td width="10%"><p>Cobro</p> </td>
                                <td width="10%"><p>Vencimiento</p> </td>
                                
                                <td width="10%"><p>Acciones</p></td>
                            </tr>
                    </table>
                </div>
            </div> <!-- /listadoTop -->
                        
                    <div class="listItems listItemsScroll">
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
                                <td width="10%"><?php echo ((is_array($_tmp=$this->_tpl_vars['d']['Cliente']['Nombre'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'htmlall') : smarty_modifier_escape($_tmp, 'htmlall')); ?>
 </td>
                                <td width="10%">$ <?php echo $this->_tpl_vars['d']['Importe']; ?>
 </td>
                                <td width="10%"><?php echo $this->_tpl_vars['d']['Tipo']; ?>
 </td>
                                <td width="20%"><?php echo $this->_tpl_vars['d']['NombreBanco']; ?>
 #<?php echo $this->_tpl_vars['d']['Numero']; ?>
</td>
                                <td width="10%"><?php echo $this->_tpl_vars['d']['FechaCobro']; ?>
 </td>
                                <td width="10%"><?php echo $this->_tpl_vars['d']['FechaVencimiento']; ?>
 </td>
                                
                                <td width="10%">
                                
                                	<a class="ajax" id=""
								    href="/GestionEconomica/DepositarCheque/ChequeId/<?php echo $this->_tpl_vars['d']['Id']; ?>
"
								    ><img src="/images/icons/add.png" title="Depositar"/> Depositar </a>
								    
                                	 
                                </td>
						    </tr>
						<?php endforeach; endif; unset($_from); ?>
                        
                        <?php endif; ?>
                        </table>
                    </div> <!-- /listItems -->
</div><!-- en list -->