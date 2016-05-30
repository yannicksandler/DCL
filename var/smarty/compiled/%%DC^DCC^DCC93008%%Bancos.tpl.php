<?php /* Smarty version 2.6.26, created on 2016-05-04 14:05:15
         compiled from Backend/GestionEconomica/Bancos.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'count', 'Backend/GestionEconomica/Bancos.tpl', 52, false),)), $this); ?>
<?php echo '
<script type="text/javascript">
$(document).ready(function(){
	$(\'.popup\').click(function() {
		
        var url 		= $(this).attr(\'href\');
        var opciones="toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=yes, width=1000, height=700, top=85, left=140";

		abrirPopUp(url, opciones);

		return false;
  	});
});

function abrirPopUp(pagina, opciones)
{
	window.open(pagina,"",opciones);
}
</script>
'; ?>


<div>
           
<br>    
								    
<div class="list">

<h2>Saldos bancarios</h2>

	<div class="list">

        		<div class="listTop">
					<div>
						<table border="0" cellpadding="0" cellspacing="0">
							<tr>
								<td width="10%"><p>Codigo</p></td>
								<td width="10%"><p>Banco</p></td>
								<td width="10%"><p>Cuenta</p></td>
								<td width="10%"><p>Saldo</p></td>
								<td width="10%"><p>A acreditar</p></td> 
								<td width="10%"><p>A debitar</p></td>  
								<td width="10%"><p>Acciones</p></td>
							</tr>
						</table>
					</div>
                </div> <!-- /listadoTop -->
                
        <div class="listItems">
                        
				<table border="0" cellpadding="0" cellspacing="0">
				
					<?php if (! count($this->_tpl_vars['Bancos'])): ?>
						<h2>No existen bancos</h2>
					<?php else: ?>
					<!-- items -->
					
					<?php $_from = $this->_tpl_vars['Bancos']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['pen']):
?>
						<tr>
							<td width="10%">
								<p class="">
										<?php echo $this->_tpl_vars['pen']['Codigo']; ?>

								</p>
							</td>
							<td width="10%">
								<p class="">
										<?php echo $this->_tpl_vars['pen']['Nombre']; ?>

								</p>
							</td>
							<td width="10%">
								<p class="">
										<?php echo $this->_tpl_vars['pen']['NumeroDeCuenta']; ?>

								</p>
							</td>
							<td width="10%">
								<p class="">
										<?php echo $this->_tpl_vars['pen']['SaldoCuenta']; ?>

								</p>
							</td>
							<td width="10%">
								<p class="">
										<?php echo $this->_tpl_vars['pen']['PendienteAcreditar']; ?>

								</p>
							</td>
							<td width="10%">
								<p class="">
										<?php echo $this->_tpl_vars['pen']['PendienteDebitar']; ?>

								</p>
							</td>
							<td width="10%" align="center">
								<ul>
									<!-- 
									<li>
									<a class="" 
									    href="/GestionEconomica/EditBanco/id/<?php echo $this->_tpl_vars['pen']['Id']; ?>
"
									    ><img src="/images/icons/add.png" title=""/> Modificar </a>
									</li>
									 -->
									<li>
									<a class="popup" 
									    href="/CuentaCorriente/ListBanco/BancoId/<?php echo $this->_tpl_vars['pen']['Id']; ?>
"
									    ><img src="/images/icons/add.png" title=""/> Cta cte </a>
									</li>
								</ul>

							</td>
						</tr>
                    <?php endforeach; endif; unset($_from); ?>
					<!-- items -->
					<?php endif; ?>
				</table>
            </div> <!-- /listItems -->

</div> <!-- /list -->            
</div> <!-- /list -->

<?php if (! $this->_tpl_vars['PagoTipos']): ?>
<div class="filtersBox filtersInfoBox"> 
            <a class="" href="/GestionEconomica/EditBanco"
				><img src="/images/icons/add.png" title=""/> Agregar banco</a>
								    					    
</div> <!-- /filtersBox-->
<?php endif; ?>

</div>