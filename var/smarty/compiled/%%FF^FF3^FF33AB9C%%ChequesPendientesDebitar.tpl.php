<?php /* Smarty version 2.6.26, created on 2016-05-04 14:05:06
         compiled from Backend/GestionEconomica/ChequesPendientesDebitar.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'count', 'Backend/GestionEconomica/ChequesPendientesDebitar.tpl', 63, false),)), $this); ?>
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

    $(".debitar").click(function(){

        var r = confirm(\'Esta seguro que desea debitar el cheque?\');

        if(r)
            return true;

        return false;
    });
});

</script>
'; ?>


<div style="width:90%">

<h1>Cheques pendientes de debitar</h1>

<div class="list">
			      
           <div class="listTop">
                <div>
                    <table border="0" cellpadding="0" cellspacing="0">
							<tr>    
                                <td width="10%"><p>Emision</p> </td>
                                <td width="10%"><p>Proveedor</p> </td>
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
                                <td width="10%"><?php echo $this->_tpl_vars['d']['Proveedor']['Nombre']; ?>
 </td>
                                <td width="10%">$ <?php echo $this->_tpl_vars['d']['Importe']; ?>
 </td>
                                <td width="10%"><?php echo $this->_tpl_vars['d']['Tipo']; ?>
 </td>
                                <td width="20%"><?php echo $this->_tpl_vars['d']['NombreBanco']; ?>
 #<?php echo $this->_tpl_vars['d']['Numero']; ?>
 (Cuenta: <?php echo $this->_tpl_vars['d']['Cuenta']; ?>
)</td>
                                
                                <td width="10%"><?php echo $this->_tpl_vars['d']['FechaCobro']; ?>
 </td>
                                <td width="10%"><?php echo $this->_tpl_vars['d']['FechaVencimiento']; ?>
 </td>
                                
                                <td width="10%">
                                
                                	<a class="ajax debitar" id=""
								    href="/GestionEconomica/DebitarCheque/ChequeId/<?php echo $this->_tpl_vars['d']['Id']; ?>
"
								    ><img src="/images/icons/add.png" title="Debitar"/> Debitar </a>
								    
                                
                                </td>
						    </tr>
						<?php endforeach; endif; unset($_from); ?>
                        
                        <?php endif; ?>
                        </table>
                    </div> <!-- /listItems -->
</div><!-- en list -->

</div>