<?php /* Smarty version 2.6.26, created on 2015-04-23 08:05:28
         compiled from Backend/Cobranza/View.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'nl2br', 'Backend/Cobranza/View.tpl', 97, false),array('modifier', 'count', 'Backend/Cobranza/View.tpl', 105, false),)), $this); ?>
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

<div id="Layer1" style="position:absolute; left:20px; top:38px; width:162px; height:37px; z-index:1; font-size: 14px; font-family: Arial, Helvetica, sans-serif;"><?php echo $this->_tpl_vars['Resumen']['Fecha']; ?>
</div>

	<div class="lightbox" id="FileLightbox" style="display:block;">
		<script type="text/javascript" src="/scripts/List.js"></script>

					<div class="contInputs" style="clear: left;" id="imprimir">
						
			            <div class="buttonsCont" style="clear: left;">
							<input type="" value="Imprimir" class="btDark printOrden" title="Imprimir orden de pago" />
							
							<input type="" value="Cerrar" class="btDark cerrar" title="Cerrar" />
							
			            </div>
			            
					</div>
							
<table border="0" cellspacing="0" height="100" align="right">
  <tr>
    <td><p><?php echo $this->_tpl_vars['Resumen']['Fecha']; ?>
</p></td>
  </tr>
</table>


<table border="0" cellspacing="0" height="150">
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>
		            
		
	    <p>Cobranza #<?php echo $this->_tpl_vars['Resumen']['Numero']; ?>
</p>
	    <br></br>
	    <p>---------------------------------------------------------</p>
	    <br></br>
	    
	    <div class="lightobxMain">
	    
				<h2>Recibi de <?php echo $this->_tpl_vars['Resumen']['Cliente']['RazonSocial']; ?>
, <br></br>domicilio <?php echo $this->_tpl_vars['Resumen']['Cliente']['Direccion']; ?>
, <?php echo $this->_tpl_vars['Resumen']['Cliente']['Localidad']; ?>
.<br></br>La suma de $ <?php echo $this->_tpl_vars['Resumen']['TotalPago']; ?>
.-<br></br></h2>
				<br></br>
				<p>------------------------------------------------------------------------</p>
				
				<div id="LBFilesContainer">
		
				
				<?php if ($this->_tpl_vars['Resumen']['Comentario']): ?>
					<h2>Comentario: <br><?php echo ((is_array($_tmp=$this->_tpl_vars['Resumen']['Comentario'])) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>
</h2>
					<br></br>
	    			<p>---------------------------------------------------------</p>
                <?php endif; ?>
        
        <h2>Numero interno: <?php echo $this->_tpl_vars['Resumen']['CobranzaId']; ?>
</h2>
        
<!-- liquidacion -->
<?php if (count($this->_tpl_vars['Resumen']['Liquidaciones'])): ?>
<!-- 
<?php if ($this->_tpl_vars['Resumen']['TotalLiquidaciones'] != $this->_tpl_vars['Resumen']['TotalPago']): ?><p class="error">Error: el total de la liquidacion es distinto al del pago. Edite la orden de pago nuevamente <img src="/images/icons/error.png" /></p><?php endif; ?>
 -->
<h1>Liquidacion</h1>
<p>Total liquidacion: $ <?php echo $this->_tpl_vars['Resumen']['TotalLiquidaciones']; ?>
</p>
	<div class="list">
			      
           <div class="listTop">
                <div>
                    <table border="0" cellpadding="0" cellspacing="0">
							<tr>    
                                <td width="20%"><p>Numero Factura DCL</p> </td>
                                <td width="60%"><p>Importe abonado de la factura asociada</p> </td>
                                
                            </tr>
                    </table>
                </div>
            </div> <!-- /listadoTop -->
                        
                    <div class="listItems">
                        
                        <table border="0" cellpadding="0" cellspacing="0">
						<?php $_from = $this->_tpl_vars['Resumen']['Liquidaciones']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['d']):
?>
						    <tr <?php echo $this->_tpl_vars['className']; ?>
>
                                <td width="20%"><?php echo $this->_tpl_vars['d']['FacturaId']; ?>
 </td>
                                <td width="60%">$ <?php echo $this->_tpl_vars['d']['Importe']; ?>
 </td>        
						    </tr>
						<?php endforeach; endif; unset($_from); ?>
						
                        </table>
                        
                    </div> <!-- /listItems -->
                        
                </div> <!-- /list -->
                
                
<?php endif; ?>
<!-- end liquidaciones -->

<!-- insumos -->
<h1>Detalle de pago</h1>
<p>Total abonado: $ <?php echo $this->_tpl_vars['Resumen']['TotalPago']; ?>
</p>
	<div class="list">
			      
           <div class="listTop">
                <div>
                    <table border="0" cellpadding="0" cellspacing="0">
							<tr>    
                                <td width="15%"><p>Tipo de pago</p> </td>
                                <td width="20%"><p>Detalle</p> </td>
                                <td width="15%"><p>Importe</p> </td>
                                <td width="15%"><p>Emision</p> </td>
                                <td width="15%"><p>Cobro</p> </td>
                                
                            </tr>
                    </table>
                </div>
            </div> <!-- /listadoTop -->
                        
                    <div class="listItems">
                        <?php if (! count($this->_tpl_vars['Resumen']['Pagos'])): ?>
                        	<tr class="noResult">
                                <td colspan="10" align="center"><h2 class="noResult">No se ha encontrado ning&uacute;n pago.</h2></td>
                            </tr>
                        	<script>SinPagos()</script>
                        <?php else: ?>
                        <table border="0" cellpadding="0" cellspacing="0" width="100%">
						<?php $_from = $this->_tpl_vars['Resumen']['Pagos']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['pago']):
?>
						    <tr <?php echo $this->_tpl_vars['className']; ?>
>
                                <td width="15%"><?php echo $this->_tpl_vars['pago']['PagoTipo']['Nombre']; ?>
 </td>
                                <td width="20%"><?php echo $this->_tpl_vars['pago']['Detalle']; ?>
 </td>
                                <td width="15%">$ <?php echo $this->_tpl_vars['pago']['Importe']; ?>
 </td>
                                <td width="15%"><?php echo $this->_tpl_vars['pago']['FechaCheque']; ?>
 </td>
                                <td width="15%"><?php echo $this->_tpl_vars['pago']['FechaCobro']; ?>
 </td>
                                
						    </tr>
						<?php endforeach; endif; unset($_from); ?>
						
                        </table>
                        <?php endif; ?>
                    </div> <!-- /listItems -->
                        
                </div> <!-- /list -->
                                                     
			
<!-- end pagos -->     
	           	     
	           	
	   	                        
				</div>
		</div> <!-- /selectFile -->
		<h2><br></br>Sin otro particular los saludamos atentamente.<br></br>DCL Group<br></br>De Martin Zaszczynski</h2>
			<h1><br></br></h1>
	        <p>Recibi la suma de pesos : ..............................................................................</p>
	        <p> ..............................................................................</p>
	       	<h1><br></br></h1>
	       	<p>Firma  ...........................</p>
	        
	    </div> <!-- /lightobxMain -->
	    
	</div> <!-- /lightbox -->
				  
</body>
</html>