{literal}

<script>

$(document).ready(function(){

	makeEditMenuFloat();

});

function makeEditMenuFloat()
{
	var pathname = window.location.pathname;

	var hash = pathname.split('/');
	// accion
	var Accion	=	hash[2];
	// controlador
	var ControllerName	=	hash[1];

	if((Accion	==	'Edit') || (Accion == 'ClasificarAtencionMedica')|| (Accion == 'Atender'))
	{
		// hacer que el menu sea flotante en todas las 
		// ediciones menos en diagnostico
		if(ControllerName != 'PrestacionDiagnostico')
		$(".formButtons").makeFloat();
	}
}

</script>
{/literal}

    <div id="Header" class="{if $classHide}{$classHide}{/if}">
    
        <div class="headerOptions">
            <ul>
            	<li>
                	<input type="button" title="Cerrar sesi&oacute;n" class="btLogout" value="Cerrar sesi&oacute;n" onclick="window.location='/Default/Salir'" />
                </li>
                <li>
                    <a href="{if $IsCliente}/Frontend/Start{else}/Default/Start{/if}" title="Usuario registrado">{$NombreUsuario}</a>
                </li>
            </ul>
        </div><!-- /headerOptions -->
        
        <div class="headerLogo">
        
            <p href="#" title="Logo"><img src="/images/logo.png" alt="Logo" /></p>
            <h1>DCL Group</h1>
            
            <!-- <a href="#"><img src="/images/icons/bookmark.gif" alt="Agregar a favoritos" title="Agregar a favoritos"/></a> -->
                
        
        </div> <!-- /headerLogo -->
        
        {include file="Backend/Layouts/Include/Menu.tpl"}
    </div> <!-- /Header -->