<?php /* Smarty version 2.6.26, created on 2015-02-23 08:37:25
         compiled from Backend/NotaCredito/NotaCreditoView.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "Backend/Layouts/Include/Header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php echo '

<style type="text/css">
<!--
p { 
	font-size:12px;color: #000000}
h1 { color: #000000}
h2 { color: #000000}		
-->
</style>

<script type="text/javascript">
$(document).ready(function(){

  	$(\'.printOrden\').click(function() {
  	  	
  	  	$(\'.contInputs\').hide();
  	  	
		window.print();

		
		
		return false;
  	});	


  	$(\'.cerrar\').click(function() {
  	  	
		window.close();
  	});

    
	
});

function SinPagos()
{
	var r	=	confirm(\'No hay pagos, debe incluir un pago a la orden. Cerrar ventana y editar la orden?\');

	if(r)
	{
		window.close();
	}
}
</script>
'; ?>


<body class="popupLayout">

	<div class="lightbox" id="FileLightbox" style="display:block;">
		<script type="text/javascript" src="/scripts/List.js"></script>

					<div class="contInputs" style="clear: left;">
						
			            <div class="buttonsCont" style="clear: left;">
							<input type="" value="Imprimir" class="btDark printOrden" title="Imprimir orden de pago" />
							
							<input type="" value="Cerrar" class="btDark cerrar" title="Cerrar" />
							
			            </div>
			            
					</div>
		<?php if ($this->_tpl_vars['deleteErrorMessage']): ?><p class="error"><?php echo $this->_tpl_vars['deleteErrorMessage']; ?>
</p><?php endif; ?>
		
		<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "Backend/Formulario/Header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
		
		<h1>Nota de credito</h1>
                    
		<div class="filtersBox filtersInfoBox">
		
                <ul>
                    <li>
                    	<p>Numero: <span><?php echo $this->_tpl_vars['NotaCredito']['Numero']; ?>
</span></p>
                        <p>Fecha: <span><?php echo $this->_tpl_vars['NotaCredito']['Fecha']; ?>
</span></p>
                        
						
                    </li>
                    <li>
						<p>Cliente: <span><?php echo $this->_tpl_vars['NotaCredito']['Cliente']['RazonSocial']; ?>
</span></p>
                    </li>
                </ul>
            </div> <!-- /filtersBox-->
	    
	    <div class="lightobxMain">
	    		<h2><?php echo $this->_tpl_vars['NotaCredito']['Descripcion']; ?>
</h2>
				<h1><br><br>Total: $ <?php echo $this->_tpl_vars['NotaCredito']['Importe']; ?>
</h1>
				
		</div> <!-- /selectFile -->
		
	     
			<h1><br></h1>
	       	<h1><br></h1>
	       	<p>Firma  ...........................</p>
	        
	    </div> <!-- /lightobxMain -->
	    
	</div> <!-- /lightbox -->
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "Backend/Formulario/Footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>			  
</body>
</html>