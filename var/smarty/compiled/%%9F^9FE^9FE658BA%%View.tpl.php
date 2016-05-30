<?php /* Smarty version 2.6.26, created on 2016-05-04 13:08:38
         compiled from Backend/Presupuesto/View.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'Backend/Presupuesto/View.tpl', 87, false),array('modifier', 'nl2br', 'Backend/Presupuesto/View.tpl', 178, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "Backend/Layouts/Include/Header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php echo '

<style type="text/css">

p { 
	font-size:12px;color: #000000}
	
h1 { 
	font-size:25px;color: #000000}	

.SeparadorAbajo {border-bottom: 2px solid #000000;}


.Estilo3 {font-size: 16px}
.Estilo4 {
	font-size: 14px;
	font-weight: bold;
}

</style>

<script type="text/javascript">
$(document).ready(function(){

	$(this).attr("title", "'; ?>
<?php echo $this->_tpl_vars['Resumen']['Cliente']['Nombre']; ?>
-<?php echo $this->_tpl_vars['Resumen']['Orden']['Id']; ?>
-<?php echo $this->_tpl_vars['Resumen']['Orden']['Producto']; ?>
<?php echo '");
	
  	$(\'.print\').click(function() {
  	  	
  	  	$(\'.contInputs\').hide();
  	  	
		window.print();

		
		
		return false;
  	});	


  	$(\'.cerrar\').click(function() {
  	  	
		window.close();
  	});

    
	
});


</script>
'; ?>


<body class="popupLayout">

	<div class="lightbox" id="FileLightbox" style="display:block;">

					<div class="contInputs" style="clear: left;">
						
			            <div class="buttonsCont" style="clear: left;">
							<input type="" value="Imprimir" class="btDark print" title="Imprimir presupuesto" />
							
							<input type="" value="Cerrar" class="btDark cerrar" title="Cerrar" />
							
			            </div>
			            
					</div>
		

		<table width="100%"  border="0" cellspacing="0">
			  <tr>
			    <td>
			    <!-- si la OT tiene rioridad SimpleBox, se muestra otro header con distinto logo -->
			    <?php if ($this->_tpl_vars['Resumen']['Orden']['PrioridadId'] == 4): ?>
			    	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "Backend/Formulario/HeaderSimpleBox.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
			    <?php else: ?>
			    	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "Backend/Formulario/Header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
			    <?php endif; ?>
			    	
			    </td>
			  </tr>
			  <tr>
			    <td>
			    
			    <table width="100%"  border="0" cellspacing="0">
				  <tr height="20">
				    <td><h2 class="Estilo4">Sres. <?php echo ((is_array($_tmp=$this->_tpl_vars['Resumen']['Cliente']['Nombre'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'htmlall') : smarty_modifier_escape($_tmp, 'htmlall')); ?>
</h2></td>
				    <td>			    <h2 align="right" class="Estilo4">Fecha: <?php echo $this->_tpl_vars['Resumen']['Presupuesto']['Fecha']; ?>
</h2></td>
				  </tr>
				  <tr height="30">
				    <td><h2 class="Estilo4">At, <?php echo ((is_array($_tmp=$this->_tpl_vars['Resumen']['Presupuesto']['Destinatario'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'htmlall') : smarty_modifier_escape($_tmp, 'htmlall')); ?>
</h2></td>
				    <td>&nbsp;</td>
				  </tr>
				</table>
			    
			    
			    </td>
			  </tr>
			  <tr>
			    <td>
			    
			    


<table width="100%"  border="0" cellspacing="0">
  <tr>

    <td height="40">
    	<span class="Estilo4">Presupuesto <?php echo ((is_array($_tmp=$this->_tpl_vars['Resumen']['Orden']['Producto'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'htmlall') : smarty_modifier_escape($_tmp, 'htmlall')); ?>
 </span>
    </td>
    <td>
    	<div align="right" class="Estilo4">REF: <?php echo $this->_tpl_vars['Resumen']['Orden']['Id']; ?>
 </div>
    </td>

  </tr>
  <tr>
    <td colspan="2" height="5">
		  	<div class="SeparadorAbajo">
			</div> <!-- end separador -->    
	</td>
  </tr>
  <tr>
  
    <td colspan="2" height="50"><span class="Estilo3">Por la presente, de acuerdo a lo solicitado por ustedes, les enviamos el siguiente presupuesto: </span></td>
    
  </tr>
</table>

			    
			    </td>
			  </tr>
			  <tr>
			    <td>
		                  
<table width="100%"  border="1" align="center" cellspacing="0" bordercolor="#000000" bgcolor="#FFFF99">
  <tr bgcolor="#FFFF66" height="40">
    <td><h2  class="Estilo4" align="">Cantidad</h2></td>
    <td><h2 class="Estilo4" align="">Detalle</h2></td>
    <td><h2 class="Estilo4" align="">Importe total</h2></td>
  </tr>
  <?php if ($this->_tpl_vars['Resumen']['Presupuesto']['Cantidad1']): ?>
  <tr>
    <td><H2><?php echo $this->_tpl_vars['Resumen']['Presupuesto']['Cantidad1']; ?>
</H2></td>
    <td><H2><?php echo $this->_tpl_vars['Resumen']['Presupuesto']['Detalle1']; ?>
</H2></td>
    <td><H2>$ <?php echo $this->_tpl_vars['Resumen']['Presupuesto']['Importe1']; ?>
</H2></td>
  </tr>
  <?php endif; ?>
  <?php if ($this->_tpl_vars['Resumen']['Presupuesto']['Cantidad2']): ?>
  <tr>
    <td><H2><?php echo $this->_tpl_vars['Resumen']['Presupuesto']['Cantidad2']; ?>
</H2></td>
    <td><H2><?php echo $this->_tpl_vars['Resumen']['Presupuesto']['Detalle2']; ?>
</H2></td>
    <td><H2>$ <?php echo $this->_tpl_vars['Resumen']['Presupuesto']['Importe2']; ?>
</H2></td>
  </tr>
  <?php endif; ?>
  <?php if ($this->_tpl_vars['Resumen']['Presupuesto']['Cantidad3']): ?>
  <tr>
    <td><H2><?php echo $this->_tpl_vars['Resumen']['Presupuesto']['Cantidad3']; ?>
</H2></td>
    <td><H2><?php echo $this->_tpl_vars['Resumen']['Presupuesto']['Detalle3']; ?>
</H2></td>
    <td><H2>$ <?php echo $this->_tpl_vars['Resumen']['Presupuesto']['Importe3']; ?>
</H2></td>
  </tr>
  <?php endif; ?>
</table>

            
			    </td>
			  </tr>
			  <tr>
			    <td height="15">
								
				    <div class="SeparadorAbajo">
					</div> <!-- end separador -->    
			    </td>
			  </tr>
			  <tr>
			    <td height="150">
			    <div class="contentTitles">
                    <h2 class="Estilo4"><span class="active"></span>&raquo; Caracteristicas</h2>
                    <h2><?php echo ((is_array($_tmp=$this->_tpl_vars['Resumen']['Orden']['DescripcionDeTrabajo'])) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>
</h2>
                </div> <!-- /contentTitles -->
			    
			    </td>
			  </tr>
			  <tr>
			    <td>
			    <table width="100%"  border="0" cellspacing="0">
  <tr>
  
    <td height="50">
    	<h2 class="Estilo4">&raquo; Plazo de entrega</h2>
    	<?php if ($this->_tpl_vars['Resumen']['Presupuesto']['PlazoDeEntrega']): ?>
    	<h2><?php echo $this->_tpl_vars['Resumen']['Presupuesto']['PlazoDeEntrega']; ?>
 dias habiles.</h2>
    	<h2>Este plazo es considerado a partir de la fecha de aprobacion de pre-produccion (*)</h2>
    	<h2>Pre-produccion: aprobacion de prototipo, de dise&ntilde;o y prueba digital (si aplica).</h2>
    	<?php else: ?>
    	<h2>a convenir</h2>
    	<?php endif; ?>
    </td>
    
  </tr>
  <tr>
  	<?php if ($this->_tpl_vars['Resumen']['Presupuesto']['LugarDeEntrega']): ?>
    <td height="50">
    	<h2 class="Estilo4">&raquo; Lugar de entrega</h2>
    	<h2><?php echo $this->_tpl_vars['Resumen']['Presupuesto']['LugarDeEntrega']; ?>
</h2>
    </td>
    <?php endif; ?>
  </tr>
  <tr>
  <?php if ($this->_tpl_vars['Resumen']['Presupuesto']['FormasDePago']): ?>
    <td height="50">
    	<h2 class="Estilo4">&raquo; Formas de pago</h2>
    	<h2><?php echo $this->_tpl_vars['Resumen']['Presupuesto']['FormasDePago']; ?>
</h2>
    </td>
    <?php endif; ?>
  </tr>
  <tr>
  
    <td height="25">
    	<h2 class="Estilo4">&raquo; Validez de la oferta</h2>
    	<h2>10 dias</h2>
    </td>
    
  </tr>
  <tr>
  
    <td height="25">
    	<h2 class="Estilo4">&raquo; Los Valores estan expresados en pesos Argentinos</h2>
    </td>
    
  </tr>
  <tr>
  
    <td height="25">
    	<h2 class="Estilo4">&raquo; Estos Precios NO incluyen IVA</h2>
    </td>
    
  </tr>
  <tr>
    <td height="100">
    	<?php if ($this->_tpl_vars['Resumen']['Presupuesto']['Comentario']): ?>
    	<h2 class="Estilo4">Observaciones</h2>
    	<h2><?php echo $this->_tpl_vars['Resumen']['Presupuesto']['Comentario']; ?>
</h2>
    	
    	<?php endif; ?>
    </td>
  </tr>
  <tr>
    <td height="100">
    	<h2 class="Estilo3">Sin otro particular, les agradecemos el haber solicitado el presente presupuesto y los saludamos atentamente.</h2>
    	<!-- si la OT tiene rioridad SimpleBox, se muestra otro header con distinto logo -->
			    <?php if ($this->_tpl_vars['Resumen']['Orden']['PrioridadId'] == 4): ?>
			    	<h2 class="Estilo3">Dpto. Comercial Simple Box</h2>
			    <?php else: ?>
			    	<h2 class="Estilo3">Dpto. Comercial DCL Group</h2>
			    <?php endif; ?>
    	
    	
    	
    </td>
  </tr>
</table>
<!-- si la OT tiene rioridad SimpleBox, se muestra otro header con distinto logo -->
				<?php if ($this->_tpl_vars['Resumen']['Orden']['PrioridadId'] == 4): ?>
			    	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "Backend/Formulario/FooterSimpleBox.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>	
			    <?php else: ?>
			    	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "Backend/Formulario/Footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>	
			    <?php endif; ?>
		    
			    </td>
			  </tr>
			</table>

	   	        
	</div> <!-- end filelightbox --> 

	    

</body>
</html>