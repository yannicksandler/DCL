<?php /* Smarty version 2.6.26, created on 2014-09-19 13:06:14
         compiled from Backend/Layouts/Include/SiteHeader.tpl */ ?>
<?php echo '

<script>

$(document).ready(function(){

	makeEditMenuFloat();

});

function makeEditMenuFloat()
{
	var pathname = window.location.pathname;

	var hash = pathname.split(\'/\');
	// accion
	var Accion	=	hash[2];
	// controlador
	var ControllerName	=	hash[1];

	if((Accion	==	\'Edit\') || (Accion == \'ClasificarAtencionMedica\')|| (Accion == \'Atender\'))
	{
		// hacer que el menu sea flotante en todas las 
		// ediciones menos en diagnostico
		if(ControllerName != \'PrestacionDiagnostico\')
		$(".formButtons").makeFloat();
	}
}

</script>
'; ?>


    <div id="Header" class="<?php if ($this->_tpl_vars['classHide']): ?><?php echo $this->_tpl_vars['classHide']; ?>
<?php endif; ?>">
    
        <div class="headerOptions">
            <ul>
            	<li>
                	<input type="button" title="Cerrar sesi&oacute;n" class="btLogout" value="Cerrar sesi&oacute;n" onclick="window.location='/Default/Salir'" />
                </li>
                <li>
                    <a href="<?php if ($this->_tpl_vars['IsCliente']): ?>/Frontend/Start<?php else: ?>/Default/Start<?php endif; ?>" title="Usuario registrado"><?php echo $this->_tpl_vars['NombreUsuario']; ?>
</a>
                </li>
            </ul>
        </div><!-- /headerOptions -->
        
        <div class="headerLogo">
        
            <p href="#" title="Logo"><img src="/images/logo.png" alt="Logo" /></p>
            <h1>DCL Group</h1>
            
            <!-- <a href="#"><img src="/images/icons/bookmark.gif" alt="Agregar a favoritos" title="Agregar a favoritos"/></a> -->
                
        
        </div> <!-- /headerLogo -->
        
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "Backend/Layouts/Include/Menu.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    </div> <!-- /Header -->