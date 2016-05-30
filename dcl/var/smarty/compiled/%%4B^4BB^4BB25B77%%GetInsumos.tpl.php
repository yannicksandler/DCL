<?php /* Smarty version 2.6.26, created on 2014-09-19 11:29:26
         compiled from Backend/Orden/GetInsumos.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'count', 'Backend/Orden/GetInsumos.tpl', 121, false),array('modifier', 'escape', 'Backend/Orden/GetInsumos.tpl', 130, false),)), $this); ?>
<?php if ($this->_tpl_vars['OrdenId']): ?>

<?php echo '
<script type="text/javascript">
$(document).ready(function(){

	$(\'.AnularOrdenDeCompra\').click(function(){
        
        var url	=   $(this).attr("href");

        AnularOrdenDeCompra(url);
        
		return false;
    });

	$(\'.InsumoEntregado\').click(function() {
	    
	    var href 		= $(this).attr(\'href\');
	    var insumoid 		= $(this).attr(\'id\');
	    
	   	r	=	confirm(\'Esta seguro que quiere marcar el insumo como entregado? (Pasara a ser visto por Contaduria para pagar)\');

		if(r && href)
		{
			var id = \'#\'+insumoid;
	    	$.ajax({
	    		type: "POST",
	    		url: href,
	    		dataType: "text/html",
	    		success: function(html){
	    			$(id).html(html);
	    		},
	    	 	error: function(request,error){
	    			$(id).html(\'<p class="error"><img src="/images/icons/error_delete.png" title="Error"/>Error al borrar la orden de compra. Intente nuevamente</p>\');
	    	 	  }
	    	});
		}
		return false;
	});
	
});

function AnularOrdenDeCompra(url)
{
	r	=	confirm(\'Esta seguro que quiere anular la orden de compra? (impacta en costos y el insumo pasa a estar NO elegido). En caso de tener una factura de compra asociada la anulara\');

	if(r && url)
	{
    	$.ajax({
    		type: "POST",
    		url: url,
    		dataType: "text/html",
    		success: function(html){
    			$(\'#Message\').html(html);
    		},
    	 	error: function(request,error){
    			$(\'#Message\').html(\'<p class="error"><img src="/images/icons/error_delete.png" title="Error"/>Error al borrar la orden de compra. Intente nuevamente</p>\');
    	 	  }
    	});
	}

}

function abrirPopUp(pagina, opciones)
{
	window.open(pagina,"",opciones);
}


</script>
'; ?>



<!-- insumos -->

<?php if ($this->_tpl_vars['deleteErrorMessage']): ?><p class="error"><?php echo $this->_tpl_vars['deleteErrorMessage']; ?>
</p><?php endif; ?>
<?php if ($this->_tpl_vars['successMessage']): ?><p class="success"><?php echo $this->_tpl_vars['successMessage']; ?>
</p><?php endif; ?>
<div id="Message"></div>

<div id="insumosCargados"> <!-- insumos -->

<h1>Insumos<br></br></h1>

	<div class="list">
		<label class="blue" >Insumos varios</label>
                    <p>
						<?php if ($this->_tpl_vars['OrdenId']): ?>
						<a href="#" 
						   onclick="window.open(	'/Insumo/Edit/Orden/<?php echo $this->_tpl_vars['OrdenId']; ?>
', 
													'windowname1', 
													'width=980, height=700, scrollbars = yes'); 
													return false;">
						   &raquo; Agregar insumo <img src="/images/icons/add.png" title="Agregar"/>
						</a>
						
						<?php endif; ?>
                    </p><br></br><br></br>
                    
           <div class="listTop">
                <div>
                    <table border="0" cellpadding="0" cellspacing="0">
							<tr>    
                                
                                <td width="10%"><p>Nombre</p> </td>
                                <td width="10%"><p>Proveedor</p> </td>
                                <!--  -->
                                <td width="10%"><p>PU s/IVA</p> </td>
                                <td width="10%"><p>Cantidad</p> </td>
                                <td width="10%"><p>Total s/IVA</p> </td>
                                <td width="10%"><p>Cond. pago</p> </td>
                                <td width="10%"><p>Elegido</p> </td>
                                <td width="10%"><p>Tiene OC</p> </td>
                                
                                <td width="20%"><p>Opciones</p></td>
                            </tr>
                    </table>
                </div>
            </div> <!-- /listadoTop -->
                        
                    <div class="listItems">
                        <?php if (! count($this->_tpl_vars['Insumos'])): ?>
                        	<tr class="noResult">
                                <td colspan="10" align="center"><h2 class="noResult">No se ha encontrado ning&uacute;n insumo.</h2></td>
                            </tr>
                        <?php else: ?>
                        <table border="0" cellpadding="0" cellspacing="0" width="100%">
						<?php $_from = $this->_tpl_vars['Insumos']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['d']):
?>
						    <tr <?php echo $this->_tpl_vars['className']; ?>
>
                                <td width="10%"><?php echo $this->_tpl_vars['d']['Nombre']; ?>
</td>
                                <td width="10%"><?php echo ((is_array($_tmp=$this->_tpl_vars['d']['NombreProveedor'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'htmlall') : smarty_modifier_escape($_tmp, 'htmlall')); ?>
</td>
                                <td width="10%"><?php echo $this->_tpl_vars['d']['PrecioUnitarioSinIVA']; ?>
 
                                
                                				<?php if ($this->_tpl_vars['d']['OrdenDeCompraId']): ?>
													<br><?php if ($this->_tpl_vars['d']['OrdenDeCompra']['ImporteCompensatorio']): ?>(Comp. $ <?php echo $this->_tpl_vars['d']['OrdenDeCompra']['ImporteCompensatorioSinIVA']; ?>
)<?php endif; ?>
												<?php endif; ?>
                                
                                </td>
                                <td width="10%"><?php echo $this->_tpl_vars['d']['Cantidad']; ?>
 </td>
                                <td width="10%"><?php echo $this->_tpl_vars['d']['PrecioUnitarioSinIVA']*$this->_tpl_vars['d']['Cantidad']; ?>
</td>
                                
                                <td width="10%"><?php echo $this->_tpl_vars['d']['CondicionDePago']; ?>
</td>
                                <td width="10%"><?php if ($this->_tpl_vars['d']['Elegido'] == 'SI'): ?><span title="Insumo elegido" class="active"></span><?php else: ?><span title="Insumo no elegido" class="inactive"></span><?php endif; ?></td>
                                <td width="10%">
										<?php if ($this->_tpl_vars['d']['OrdenDeCompraId']): ?>
											<?php if ($this->_tpl_vars['d']['OrdenDeCompra']['FechaAnulacion']): ?>
												<img src="/images/icons/delete.png" title="Orden de compra anulada el dia <?php echo $this->_tpl_vars['d']['OrdenDeCompra']['FechaAnulacion']; ?>
"/>
											<?php else: ?>
											SI (# <?php echo $this->_tpl_vars['d']['OrdenDeCompraId']; ?>
)
											<?php endif; ?>
										<?php else: ?>
										NO
										<?php endif; ?>
								</td>
                                
                                <td width="20%">
                                    <p><!-- mando primer parametro el id de la orden en lugar del insumo id -->
                                        <br>&raquo; <a href="#" onclick="guardarObtenerInsumos( <?php echo $this->_tpl_vars['d']['Id']; ?>
 , 'del')">Borrar</a>
                                        
                                        <br>&raquo; <a href="#" 
                                            onclick="window.open(	'/Insumo/Edit/Orden/<?php echo $this->_tpl_vars['OrdenId']; ?>
/id/<?php echo $this->_tpl_vars['d']['Id']; ?>
', 
                                                    'windowname1', 
                                                    'width=980, height=700, scrollbars = yes'); 
                                                    return false;">
                                            Editar&nbsp;	
                                        </a>
										 
										<br>&raquo; <a href="#" onclick="generarOrdenDeCompra( <?php echo $this->_tpl_vars['d']['Id']; ?>
 )">Orden de compra</a>
										<?php if ($this->_tpl_vars['d']['OrdenDeCompraId'] && ! $this->_tpl_vars['d']['OrdenDeCompra']['FechaAnulacion'] && $this->_tpl_vars['d']['OrdenDeCompraId']): ?>
										<br>&raquo; <a class="AnularOrdenDeCompra" href="/OrdenCompra/Anular/id/<?php echo $this->_tpl_vars['d']['OrdenDeCompraId']; ?>
">Anular orden de compra</a>
										<?php endif; ?>
										<?php if (! $this->_tpl_vars['d']['FechaDeEntrega']): ?>
										<br><a id="<?php echo $this->_tpl_vars['d']['Id']; ?>
" title="Marcar Insumo como entregado" class="InsumoEntregado" href="/Insumo/SetEntregado/id/<?php echo $this->_tpl_vars['d']['Id']; ?>
"><img src="/images/icons/add.png" title="Editar"/> Entregado</a>
										<?php else: ?>
										<br><img src="/images/icons/tick.png" title="insumo entregado el dia <?php echo $this->_tpl_vars['d']['FechaDeEntrega']; ?>
"/>
										<?php endif; ?>	
                                    </p>
                                    
                                </td>
						    </tr>
						<?php endforeach; endif; unset($_from); ?>
                        </table>
                        <?php endif; ?>
                    </div> <!-- /listItems -->
                        
                </div> <!-- /list -->                     

<!-- end insumos -->     

<!-- fletes -->


	<div class="list">
		<label>Fletes</label>			      
		
		<?php if ($this->_tpl_vars['OrdenId']): ?>
		<p>
						<a href="#" 
						   onclick="window.open(	'/Insumo/Edit/Orden/<?php echo $this->_tpl_vars['OrdenId']; ?>
/EsFlete/SI', 
													'windowname1', 
													'width=980, height=700, scrollbars = yes'); 
													return false;">
						   &raquo; Agregar flete <img src="/images/icons/add.png" title="Agregar"/>
						</a>
		</p><br></br><br></br>						
		<?php endif; ?>
		
           <div class="listTop">
                <div>
                    <table border="0" cellpadding="0" cellspacing="0">
							<tr>    
                                <td width="10%"><p>Nombre</p> </td>
                                <td width="10%"><p>Proveedor</p> </td>
                                <!--  -->
                                <td width="10%"><p>PU s/IVA</p> </td>
                                <td width="10%"><p>Cantidad</p> </td>
                                <td width="10%"><p>Total s/IVA</p> </td>
                                <td width="10%"><p>Cond. pago</p> </td>
                                <td width="10%"><p>Elegido</p> </td>
                                <td width="10%"><p>Tiene OC</p> </td>
                                
                                <td width="20%"><p>Opciones</p></td>
                            </tr>
                    </table>
                </div>
            </div> <!-- /listadoTop -->
                        
                    <div class="listItems">
                        <table border="0" cellpadding="0" cellspacing="0">
                        <?php if (count($this->_tpl_vars['Fletes'])): ?>
                            <?php $_from = $this->_tpl_vars['Fletes']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['record']):
?>
						           <!-- item -->
						    <tr <?php echo $this->_tpl_vars['className']; ?>
>
                                <td width="10%"><?php echo $this->_tpl_vars['record']['Nombre']; ?>
 </td>
                                <td width="10%"><?php echo $this->_tpl_vars['record']['Proveedor']['Nombre']; ?>
 </td>
                                <td width="10%"><?php echo $this->_tpl_vars['record']['PrecioUnitarioSinIVA']; ?>
 
                                
                                				<?php if ($this->_tpl_vars['record']['OrdenDeCompraId']): ?>
													<br><?php if ($this->_tpl_vars['record']['OrdenDeCompra']['ImporteCompensatorio']): ?>(Comp. $ <?php echo $this->_tpl_vars['record']['OrdenDeCompra']['ImporteCompensatorioSinIVA']; ?>
)<?php endif; ?>
												<?php endif; ?>
                                
                                </td>
                                <td width="10%"><?php echo $this->_tpl_vars['record']['Cantidad']; ?>
 </td>
                                <td width="10%"><?php echo $this->_tpl_vars['record']['PrecioUnitarioSinIVA']*$this->_tpl_vars['record']['Cantidad']; ?>
</td>
                                
                                <td width="10%"><?php echo $this->_tpl_vars['record']['CondicionDePago']; ?>
 </td>
                                <td width="10%"><?php if ($this->_tpl_vars['record']['Elegido'] == 'SI'): ?><span title="Insumo elegido" class="active"></span><?php else: ?><span title="Insumo no elegido" class="inactive"></span><?php endif; ?> </td>
                                                                <td width="10%">
										<?php if ($this->_tpl_vars['record']['OrdenDeCompraId']): ?>
											<?php if ($this->_tpl_vars['record']['OrdenDeCompra']['FechaAnulacion']): ?>
												<img src="/images/icons/delete.png" title="Orden de compra anulada el dia <?php echo $this->_tpl_vars['record']['OrdenDeCompra']['FechaAnulacion']; ?>
"/>
											<?php else: ?>
											SI (# <?php echo $this->_tpl_vars['record']['OrdenDeCompraId']; ?>
)	
											<?php endif; ?>
										<?php else: ?>
										NO
										<?php endif; ?>
								</td>
                                
                                <td width="20%">
                                    <p><!-- mando primer parametro el id de la orden en lugar del insumo id -->
                                        <br>&raquo; <a href="#" onclick="guardarObtenerInsumos( <?php echo $this->_tpl_vars['record']['Id']; ?>
 , 'del')">Borrar</a>
                                         
                                        <br>&raquo; <a href="#" 
                                            onclick="window.open(	'/Insumo/Edit/Orden/<?php echo $this->_tpl_vars['OrdenId']; ?>
/id/<?php echo $this->_tpl_vars['record']['Id']; ?>
', 
                                                    'windowname1', 
                                                    'width=980, height=700, scrollbars = yes'); 
                                                    return false;">
                                            Editar&nbsp;	
                                        </a>
										 
										<br>&raquo; <a href="#" onclick="generarOrdenDeCompra( <?php echo $this->_tpl_vars['record']['Id']; ?>
 )">Orden de compra</a>
										<?php if (! $this->_tpl_vars['record']['OrdenDeCompra']['OrdenDePagoId'] && ! $this->_tpl_vars['record']['OrdenDeCompra']['FechaAnulacion'] && $this->_tpl_vars['record']['OrdenDeCompraId']): ?>
										<br>&raquo; <a class="AnularOrdenDeCompra" href="/OrdenCompra/Anular/id/<?php echo $this->_tpl_vars['record']['OrdenDeCompraId']; ?>
">Anular orden de compra</a>
										<?php endif; ?>
										<?php if (! $this->_tpl_vars['record']['FechaDeEntrega']): ?>
										<br><a id="<?php echo $this->_tpl_vars['record']['Id']; ?>
" title="Marcar Insumo como entregado" class="InsumoEntregado" href="/Insumo/SetEntregado/id/<?php echo $this->_tpl_vars['record']['Id']; ?>
"><img src="/images/icons/add.png" title="Editar"/> Entregado</a>
										<?php else: ?>
										<br><img src="/images/icons/tick.png" title="insumo entregado el dia <?php echo $this->_tpl_vars['record']['FechaDeEntrega']; ?>
"/>
										<?php endif; ?>
                                    </p>
                                </td>
						    </tr>
				                    <!-- /item -->
						    <?php endforeach; endif; unset($_from); ?>
                        <?php else: ?>
                            <tr class="noResult">
                                <td colspan="10" align="center"><h2 class="noResult">No se ha encontrado ning&uacute;n flete.</h2></td>
                            </tr>
                        <?php endif; ?>
                        </table>
                    </div> <!-- /listItems -->
                        
                </div> <!-- /list -->                     

<!-- end fletes -->

<!-- mano de obra -->


	<div class="list">
		<label>Mano de obra</label>			      
		
		<?php if ($this->_tpl_vars['OrdenId']): ?>
		<p>
						<a href="#" 
						   onclick="window.open(	'/Insumo/Edit/Orden/<?php echo $this->_tpl_vars['OrdenId']; ?>
/EsManoDeObra/SI', 
													'windowname1', 
													'width=980, height=700, scrollbars = yes'); 
													return false;">
						   &raquo; Agregar mano de obra	<img src="/images/icons/add.png" title="Agregar"/>
						</a>
		</p><br></br><br></br>						
		<?php endif; ?>
		
           <div class="listTop">
                <div>
                    <table border="0" cellpadding="0" cellspacing="0">
							<tr>    
                                <td width="10%"><p>Nombre</p> </td>
                                <td width="10%"><p>Proveedor</p> </td>
                                <td width="10%"><p>PU s/IVA</p> </td>
                                <td width="10%"><p>Cantidad</p> </td>
                                <td width="10%"><p>Total s/IVA</p> </td>
                                <td width="10%"><p>Cond. pago</p> </td>
                                <td width="10%"><p>Elegido</p> </td>
                                <td width="10%"><p>Tiene OC</p> </td>
                                
                                
                                <td width="20%"><p>Opciones</p></td>
                            </tr>
                    </table>
                </div>
            </div> <!-- /listadoTop -->
                        
                    <div class="listItems">
                        <table border="0" cellpadding="0" cellspacing="0">
                        <?php if (count($this->_tpl_vars['ManoDeObra'])): ?>
                            <?php $_from = $this->_tpl_vars['ManoDeObra']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['mano']):
?>
						           <!-- item -->
						    <tr <?php echo $this->_tpl_vars['className']; ?>
>
                                <td width="10%"><?php echo $this->_tpl_vars['mano']['Nombre']; ?>
 </td>
                                <td width="10%"><?php echo $this->_tpl_vars['mano']['Proveedor']['Nombre']; ?>
 </td>
                                <td width="10%"><?php echo $this->_tpl_vars['mano']['PrecioUnitarioSinIVA']; ?>
 
                                
                                				<?php if ($this->_tpl_vars['mano']['OrdenDeCompraId']): ?>
													<br><?php if ($this->_tpl_vars['mano']['OrdenDeCompra']['ImporteCompensatorio']): ?>(Comp. $ <?php echo $this->_tpl_vars['mano']['OrdenDeCompra']['ImporteCompensatorioSinIVA']; ?>
)<?php endif; ?>
												<?php endif; ?>
                                
                                </td>
                                <td width="10%"><?php echo $this->_tpl_vars['mano']['Cantidad']; ?>
 </td>
                                <td width="10%"><?php echo $this->_tpl_vars['mano']['PrecioUnitarioSinIVA']*$this->_tpl_vars['mano']['Cantidad']; ?>
</td>
                                <td width="10%"><?php echo $this->_tpl_vars['mano']['CondicionDePago']; ?>
 </td>
                                <td width="10%"><?php if ($this->_tpl_vars['mano']['Elegido'] == 'SI'): ?><span title="Insumo elegido" class="active"></span><?php else: ?><span class="inactive" title="Insumo no elegido"></span><?php endif; ?> </td>
                                                                <td width="10%">
										<?php if ($this->_tpl_vars['mano']['OrdenDeCompraId']): ?>
											<?php if ($this->_tpl_vars['mano']['OrdenDeCompra']['FechaAnulacion']): ?>
												<img src="/images/icons/delete.png" title="Orden de compra anulada el dia <?php echo $this->_tpl_vars['mano']['OrdenDeCompra']['FechaAnulacion']; ?>
"/>
											<?php else: ?>
											SI (# <?php echo $this->_tpl_vars['mano']['OrdenDeCompraId']; ?>
)	
											<?php endif; ?>
										<?php else: ?>
										NO
										<?php endif; ?>
								</td>
                                
                                <td width="20%">
                                    <p><!-- mando primer parametro el id de la orden en lugar del insumo id -->
                                        <br>&raquo; <a href="#" onclick="guardarObtenerInsumos( <?php echo $this->_tpl_vars['mano']['Id']; ?>
 , 'del')">Borrar</a>
                                         
                                        <br>&raquo; <a href="#" 
                                            onclick="window.open(	'/Insumo/Edit/Orden/<?php echo $this->_tpl_vars['OrdenId']; ?>
/id/<?php echo $this->_tpl_vars['mano']['Id']; ?>
', 
                                                    'windowname1', 
                                                    'width=980, height=700, scrollbars = yes'); 
                                                    return false;">
                                            Editar&nbsp;	
                                        </a>
										 
										<br>&raquo; <a href="#" onclick="generarOrdenDeCompra( <?php echo $this->_tpl_vars['mano']['Id']; ?>
 )">Orden de compra</a>
										<?php if (! $this->_tpl_vars['mano']['OrdenDeCompra']['OrdenDePagoId'] && ! $this->_tpl_vars['mano']['OrdenDeCompra']['FechaAnulacion'] && $this->_tpl_vars['mano']['OrdenDeCompraId']): ?>
										<br>&raquo; <a class="AnularOrdenDeCompra" href="/OrdenCompra/Anular/id/<?php echo $this->_tpl_vars['mano']['OrdenDeCompraId']; ?>
">Anular orden de compra</a>
										<?php endif; ?>
										<?php if (! $this->_tpl_vars['mano']['FechaDeEntrega']): ?>
										<br><a id="<?php echo $this->_tpl_vars['mano']['Id']; ?>
" title="Marcar Insumo como entregado" class="InsumoEntregado" href="/Insumo/SetEntregado/id/<?php echo $this->_tpl_vars['mano']['Id']; ?>
"><img src="/images/icons/add.png" title="Editar"/> Entregado</a>
										<?php else: ?>
										<br><img src="/images/icons/tick.png" title="insumo entregado el dia <?php echo $this->_tpl_vars['mano']['FechaDeEntrega']; ?>
"/>
										<?php endif; ?>
                                    </p>
                                </td>
						    </tr>
				                    <!-- /item -->
						    <?php endforeach; endif; unset($_from); ?>
                        <?php else: ?>
                            <tr class="noResult">
                                <td colspan="10" align="center"><h2 class="noResult">No se ha encontrado mano de obra.</h2></td>
                            </tr>
                        <?php endif; ?>
                        </table>
                    </div> <!-- /listItems -->
                        
                </div> <!-- /list -->                     

<!-- end mano de obra -->

<!-- comercializacion -->
<?php if ($this->_tpl_vars['MostrarInsumosComercializacion'] == true): ?>

	<div class="list">
		<label>Comercializacion</label>			      
		
		<?php if ($this->_tpl_vars['OrdenId']): ?>
		<p>
						<a href="#" 
						   onclick="window.open(	'/Insumo/Edit/Orden/<?php echo $this->_tpl_vars['OrdenId']; ?>
/EsComercializacion/SI', 
													'windowname1', 
													'width=980, height=700, scrollbars = yes'); 
													return false;">
						   &raquo; Agregar comercializacion <img src="/images/icons/add.png" title="Agregar"/>
						</a>
		</p><br></br><br></br>						
		<?php endif; ?>
		
           <div class="listTop">
                <div>
                    <table border="0" cellpadding="0" cellspacing="0">
							<tr>    
                                <td width="10%"><p>Nombre</p> </td>
                                <td width="10%"><p>Proveedor</p> </td>
                                <td width="10%"><p>PU s/IVA</p> </td>
                                <td width="10%"><p>Cantidad</p> </td>
                                
                                <td width="10%"><p>Total s/IVA</p> </td>
                                
                                <td width="10%"><p>Cond. pago</p> </td>
                                <td width="10%"><p>Elegido</p> </td>
                                <td width="10%"><p>Tiene OC</p> </td>
                                
                                <td width="20%"><p>Opciones</p></td>
                            </tr>
                    </table>
                </div>
            </div> <!-- /listadoTop -->
                        
                    <div class="listItems">
                        <table border="0" cellpadding="0" cellspacing="0">
                        <?php if (count($this->_tpl_vars['Comercializaciones'])): ?>
                            <?php $_from = $this->_tpl_vars['Comercializaciones']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['com']):
?>
						           <!-- item -->
						    <tr <?php echo $this->_tpl_vars['className']; ?>
>
                                <td width="10%"><?php echo $this->_tpl_vars['com']['Nombre']; ?>
 </td>
                                <td width="10%"><?php echo $this->_tpl_vars['com']['Proveedor']['Nombre']; ?>
 </td>
                                <td width="10%"><?php echo $this->_tpl_vars['com']['PrecioUnitarioSinIVA']; ?>
 
                                
                                				<?php if ($this->_tpl_vars['com']['OrdenDeCompraId']): ?>
													<br><?php if ($this->_tpl_vars['com']['OrdenDeCompra']['ImporteCompensatorio']): ?>(Comp. $ <?php echo $this->_tpl_vars['com']['OrdenDeCompra']['ImporteCompensatorioSinIVA']; ?>
)<?php endif; ?>
												<?php endif; ?>
                                </td>
                                <td width="10%"><?php echo $this->_tpl_vars['com']['Cantidad']; ?>
 </td>
                                <td width="10%"><?php echo $this->_tpl_vars['com']['PrecioUnitarioSinIVA']*$this->_tpl_vars['com']['Cantidad']; ?>
</td>
                                <td width="10%"><?php echo $this->_tpl_vars['com']['CondicionDePago']; ?>
 </td>
                                <td width="10%"><?php if ($this->_tpl_vars['com']['Elegido'] == 'SI'): ?><span title="Insumo elegido" class="active"></span><?php else: ?><span title="Insumo no elegido" class="inactive"></span><?php endif; ?> </td>
                                                                <td width="10%">
										<?php if ($this->_tpl_vars['com']['OrdenDeCompraId']): ?>
											<?php if ($this->_tpl_vars['com']['OrdenDeCompra']['FechaAnulacion']): ?>
												<img src="/images/icons/delete.png" title="Orden de compra anulada el dia <?php echo $this->_tpl_vars['com']['OrdenDeCompra']['FechaAnulacion']; ?>
"/>
											<?php else: ?>
											SI (# <?php echo $this->_tpl_vars['com']['OrdenDeCompraId']; ?>
)
											<?php endif; ?>
										<?php else: ?>
										NO
										<?php endif; ?>
								</td>
                                
                                <td width="20%">
                                    <p><!-- mando primer parametro el id de la orden en lugar del insumo id -->
                                        <br>&raquo; <a href="#" onclick="guardarObtenerInsumos( <?php echo $this->_tpl_vars['com']['Id']; ?>
 , 'del')">Borrar</a>
                                         
                                        <br>&raquo; <a href="#" 
                                            onclick="window.open(	'/Insumo/Edit/Orden/<?php echo $this->_tpl_vars['OrdenId']; ?>
/id/<?php echo $this->_tpl_vars['com']['Id']; ?>
', 
                                                    'windowname1', 
                                                    'width=980, height=700, scrollbars = yes'); 
                                                    return false;">
                                            Editar&nbsp;	
                                        </a>
										 
										<br>&raquo; <a href="#" onclick="generarOrdenDeCompra( <?php echo $this->_tpl_vars['com']['Id']; ?>
 )">Orden de compra</a>
										<?php if (! $this->_tpl_vars['com']['OrdenDeCompra']['OrdenDePagoId'] && ! $this->_tpl_vars['com']['OrdenDeCompra']['FechaAnulacion'] && $this->_tpl_vars['com']['OrdenDeCompraId']): ?>
										<br>&raquo; <a class="AnularOrdenDeCompra" href="/OrdenCompra/Anular/id/<?php echo $this->_tpl_vars['com']['OrdenDeCompraId']; ?>
">Anular orden de compra</a>
										<?php endif; ?>
										<?php if (! $this->_tpl_vars['com']['FechaDeEntrega']): ?>
										<br><a id="<?php echo $this->_tpl_vars['com']['Id']; ?>
" title="Marcar Insumo como entregado" class="InsumoEntregado" href="/Insumo/SetEntregado/id/<?php echo $this->_tpl_vars['com']['Id']; ?>
"><img src="/images/icons/add.png" title="Editar"/> Entregado</a>
										<?php else: ?>
										<br><img src="/images/icons/tick.png" title="insumo entregado el dia <?php echo $this->_tpl_vars['com']['FechaDeEntrega']; ?>
"/>
										<?php endif; ?>
                                    </p>
                                </td>
						    </tr>
				                    <!-- /item -->
						    <?php endforeach; endif; unset($_from); ?>
                        <?php else: ?>
                            <tr class="noResult">
                                <td colspan="10" align="center"><h2 class="noResult">No se han encontrado comercializaciones</h2></td>
                            </tr>
                        <?php endif; ?>
                        </table>
                    </div> <!-- /listItems -->
                        
                </div> <!-- /list -->                     
<?php endif; ?>
<!-- end comercializacion -->
</div><!-- insumos -->

<div id="CostosInsumos">
<!-- impuestos -->                        
                        
              			<h1><br></br></h1>
                        <h1>Impuestos</h1>
       				<div class="contentTitles">
	                    <label id="" title="El 3% del precio de venta sin IVA" class="blue">Ingresos brutos (3%): $ <?php echo $this->_tpl_vars['Resumen']['IngresosBrutos']; ?>
</label>
	                    
	                    <label id="" title="El 1,2% del precio de venta con IVA" class="blue">Impuestos bancarios (1,2%): $ <?php echo $this->_tpl_vars['Resumen']['ImpuestosBancarios']; ?>
</label>
	                    	                    
	                </div> <!-- /contentTitles -->

						
<!-- end impuestos -->				

<!-- costos -->     
                   
                        <h1><br></br></h1>
                        <!-- total de insumo elegidos -->
                        <h1>Costos</h1>
                    <div class="contentTitles">    
                        <label>Costo de insumos varios: $ <?php if ($this->_tpl_vars['Resumen']['TotalInsumosVarios']): ?><?php echo $this->_tpl_vars['Resumen']['TotalInsumosVarios']; ?>
<?php else: ?>0.0<?php endif; ?></label>
                        <label>Costo de flete: $ <?php if ($this->_tpl_vars['Resumen']['TotalFlete']): ?><?php echo $this->_tpl_vars['Resumen']['TotalFlete']; ?>
<?php else: ?>0.0<?php endif; ?></label>
                        <label>Costo de mano de obra: $ <?php if ($this->_tpl_vars['Resumen']['TotalManoDeObra']): ?><?php echo $this->_tpl_vars['Resumen']['TotalManoDeObra']; ?>
<?php else: ?>0.0<?php endif; ?></label>
                        <label>Costo de comercializacion: $ <?php if ($this->_tpl_vars['Resumen']['TotalComercializacion']): ?><?php echo $this->_tpl_vars['Resumen']['TotalComercializacion']; ?>
<?php else: ?>0.0<?php endif; ?></label>
                        
                        
							<ul class="statsList">
		                        <li>
		                            <p class="big">$ <?php echo $this->_tpl_vars['Resumen']['CostoTotalSinIVA']; ?>
</p>
		                            <p title="Costos de insumos elegidos + impuestos">Costo total sin IVA</p>
		                        </li>
		                        <li>
		                            <p class="big">$ <?php echo $this->_tpl_vars['Resumen']['CostoTotalConIVA']; ?>
</p>
		                            <p title="Costos de insumos elegidos varios + costo flete + costo comercializacion + 21% + costo mano de obra + impuestos">Costo total con IVA</p>
		                        </li>
	                    	</ul> <!-- /statsList -->
					</div> <!-- /contentTitles -->
</div>											
<!-- end costos -->				
<?php endif; ?>						