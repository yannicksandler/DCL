<?php /* Smarty version 2.6.26, created on 2014-09-11 11:24:28
         compiled from Backend/OrdenPago/View.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'count', 'Backend/OrdenPago/View.tpl', 100, false),)), $this); ?>
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
		
		<h1>Orden de pago</h1>
				<?php if ($this->_tpl_vars['Resumen']['Comentario']): ?>
					<h2 class="big">Nota</h2>
	                <h2><?php echo $this->_tpl_vars['Resumen']['Comentario']; ?>
</h2>
                <?php endif; ?>
                    
		<div class="filtersBox filtersInfoBox">
		
                <ul>
                    <li>
                    	<p>Numero: <span><?php echo $this->_tpl_vars['Resumen']['OrdenDePagoId']; ?>
</span></p>
                        <p>Fecha: <span><?php echo $this->_tpl_vars['Resumen']['Fecha']; ?>
</span></p>
                        
						
                    </li>
                    <li>
						<p>Paguese a: <span><?php echo $this->_tpl_vars['Resumen']['Proveedor']; ?>
</span></p>
                    </li>
                </ul>
            </div> <!-- /filtersBox-->
	    
	    <div class="lightobxMain">
	    
				<h1>Total abonado: $ <?php echo $this->_tpl_vars['Resumen']['TotalPago']; ?>
<br><br></h1>
				
		</div> <!-- /selectFile -->
		
				<table width="" border="0">
		  <tr>
		    <td>
<!-- liquidacion -->
<?php if (count($this->_tpl_vars['Resumen']['Liquidaciones'])): ?>

<h1>Liquidacion</h1>
<p>Total liquidacion: $ <?php echo $this->_tpl_vars['Resumen']['TotalLiquidaciones']; ?>
</p>
	<div class="list">
			      
           <div class="listTop">
                <div>
                    <table border="0" cellpadding="0" cellspacing="0">
							<tr>    
                                
                                <td width="10%"><p>Factura numero</p> </td>
                                <td width="15%"><p>Importe</p> </td>
                                
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
                                <td width="10%"><?php echo $this->_tpl_vars['d']['FacturaNumero']; ?>
 </td>
                                <td width="15%">$ <?php echo $this->_tpl_vars['d']['ImporteLiquidado']; ?>
 </td>
                                        
						    </tr>
						<?php endforeach; endif; unset($_from); ?>
						
                        </table>
                        
                    </div> <!-- /listItems -->
                        
                </div> <!-- /list -->
                
                
<?php endif; ?>
			<?php if (count($this->_tpl_vars['Resumen']['OrdenesDeCompra'])): ?>
		    <div class="list">
			      
    	       <div class="listTop">
	                <div>
	                    <table border="0" cellpadding="0" cellspacing="0">
								<tr>    
	                                <td width="15%"><p>Ordenes de compra liquidadas con anticipo</p> </td>
	                                
	                            </tr>
	                    </table>
	                </div>
        	    </div> <!-- /listadoTop -->
    
		    
			<div class="listItems">
			<?php $_from = $this->_tpl_vars['Resumen']['OrdenesDeCompra']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['oc']):
?>
						
						<table border="0" cellpadding="0" cellspacing="0">
								<tr>
	                                <td width="15%"><p>Fecha: <?php echo $this->_tpl_vars['oc']['Fecha']; ?>
 - # <?php echo $this->_tpl_vars['oc']['Id']; ?>
 - <?php $_from = $this->_tpl_vars['oc']['Insumo']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['i']):
?><?php echo $this->_tpl_vars['i']['Nombre']; ?>
 - <?php echo $this->_tpl_vars['i']['Orden']['Cliente']['Nombre']; ?>
 (REF. <?php echo $this->_tpl_vars['i']['OrdenId']; ?>
) <?php $_from = $this->_tpl_vars['oc']['OrdenDePagoOrdenDeCompra']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['opoc']):
?><?php if ($this->_tpl_vars['opoc']['OrdenDePagoId'] == $this->_tpl_vars['Resumen']['OrdenDePagoId']): ?>- Importe abonado: $ <?php echo $this->_tpl_vars['opoc']['ImporteAbonado']; ?>
<?php endif; ?><?php endforeach; endif; unset($_from); ?><?php endforeach; endif; unset($_from); ?></p> </td>            
	                            </tr>
	                    </table>
			<?php endforeach; endif; unset($_from); ?>
			</div>
			
			</div> <!-- list  -->
		    <?php endif; ?>
<!-- end liquidaciones -->
		    
		    </td>
		    <td width="30px">

		    </td>
		    <td>
<!-- pagos -->
<h1>Detalle de pago</h1>
<p>Total imputacion: $ <?php echo $this->_tpl_vars['Resumen']['TotalPago']; ?>
</p>
	<div class="list">
			      
           <div class="listTop">
                <div>
                    <table border="0" cellpadding="0" cellspacing="0">
							<tr>    
                                <td width="15%"><p>Tipo de pago</p> </td>
                                <td width="20%"><p>Detalle</p> </td>
                                <td width="15%"><p>Importe</p> </td>
                                
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
 Nro. <?php echo $this->_tpl_vars['pago']['Cheque']['Numero']; ?>
</td>
                                <td width="15%">$ <?php echo $this->_tpl_vars['pago']['Importe']; ?>
 </td>
                                
						    </tr>
						<?php endforeach; endif; unset($_from); ?>
						
                        </table>
                        <?php endif; ?>
                    </div> <!-- /listItems -->
                        
                </div> <!-- /list -->
                                                     
			
<!-- end pagos -->     
		    		    
		    </td>
		  </tr>
		  <tr>
		    <td>
		    
		    </td>
		    <td></td>
		    <td>&nbsp;</td>
		  </tr>
		</table>
	           	     
			<h1><br></h1>
	        <p>Recibi la suma de pesos : ..............................................................................</p>
	        <p> ..............................................................................</p>
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