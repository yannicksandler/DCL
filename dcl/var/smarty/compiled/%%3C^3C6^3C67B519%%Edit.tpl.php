<?php /* Smarty version 2.6.26, created on 2014-09-11 10:47:16
         compiled from Backend/Presupuesto/Edit.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'nl2br', 'Backend/Presupuesto/Edit.tpl', 125, false),)), $this); ?>
<?php $this->assign('IDS_Layout_Class', 'Backend_Layouts_Default'); ?>
<?php $this->assign('IDS_Layout_Method', 'Default'); ?>

<!-- date picker -->
<link type="text/css" href="/styles/ui-lightness/jquery-ui-1.8.2.custom.css" rel="stylesheet" />
<script type="text/javascript" src="/scripts/jquery/jquery.ui.datepicker.js"></script>
<script type="text/javascript" src="/scripts/jquery/jquery.ui.core.js"></script>
<script type="text/javascript" src="/scripts/jquery/jquery.ui.widget.js"></script>

<script type="text/javascript" src="/scripts/Edit.js"></script>


<?php echo '
<script type="text/javascript">
$(document).ready(function(){
    $("#FrmEdit").validate();

    $("#comentario").attr(\'value\', $("#comentario").text().replace("\\<br /\\>", "").replace("\\<br /\\>", "").replace("\\<br /\\>", "").replace("\\<br /\\>", "").replace("\\<br /\\>", ""));

    $(".Print").click(function(){

    	var presupuestoid	=	$(this).attr(\'id\');
		
		VerPresupuesto(presupuestoid);      

        return false;
    });

    $(".Cerrar").click(function(){

    	window.close();
    });

    $(\'#Fecha\').datepicker({
		changeMonth: true,
		changeYear: true,
        dateFormat: \'dd/mm/yy\'
	});

	$(\'#Header\').hide();

});

function VerPresupuesto(id)
{
	window.opener.reload();
	if(id>0)
	{
    var url	=	\'/Presupuesto/View/id/\' + id;
    
	var opciones="toolbar=no, location=no, directories=no, status=no, menubar=yes, scrollbars=yes, resizable=yes, width=1000, height=700, top=85, left=140";

	abrirPopUp(url, opciones);
	self.close();
	}
	else
		alert(\'el presupuesto no tiene id\');  
}

function abrirPopUp(pagina, opciones)
{
	window.open(pagina,"",opciones);
}
</script>
'; ?>



<h1><?php if ($this->_tpl_vars['data']['Id']): ?>Editar<?php else: ?>Nuevo<?php endif; ?> presupuesto &raquo;</h1>


<form id="FrmEdit" enctype="multipart/form-data" action="" method="post">
    <input type="hidden" id="" name="data[Id]" value="<?php echo $this->_tpl_vars['data']['Id']; ?>
" />
    
        
    <div class="form">
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "Backend/Presupuesto/ColumnForm.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

		<?php if ($this->_tpl_vars['data']['Id']): ?>        
         <input type="submit" value="Imprimir" id="<?php echo $this->_tpl_vars['data']['Id']; ?>
" class="btDark Print" title="Imprimir" />
         <?php endif; ?>
            
            
        <?php if ($this->_tpl_vars['editSuccessMessage']): ?>
            <p class="success" style="width:61%;"><?php echo $this->_tpl_vars['editSuccessMessage']; ?>
</p>
            <script>VerPresupuesto(<?php echo $this->_tpl_vars['data']['Id']; ?>
)</script>
        <?php elseif ($this->_tpl_vars['editErrorMessage']): ?>
            <p class="error" style="width:61%;"><?php echo $this->_tpl_vars['editErrorMessage']; ?>
</p>
        <?php endif; ?>
        
        
            
        <div class="contentEditor"> <!-- formulario de edicion de contenido -->
                
            <div class="productsEditorContent">
            
            
                        <div class="filtersBox filtersInfoBox">
                <ul>
                    <li>
						<p>Orden de trabajo: <span><?php echo $this->_tpl_vars['Resumen']['OrdenId']; ?>
</span></p>
						<p>Cliente: <span><?php echo $this->_tpl_vars['Resumen']['Cliente']['Nombre']; ?>
</span></p> 
                    </li>
                    
                    <li>
						<p>Producto: <span><?php echo $this->_tpl_vars['Resumen']['Producto']; ?>
</span></p>
						
                    </li>
                    <?php if (! $this->_tpl_vars['IsPerfilVentas']): ?>
                    <li>
                    	
						<p><img src="/images/icons/help.png" alt="item" title="costo total de insumos elegidos SIN IVA"/> Costo de orden de trabajo: <span><?php if ($this->_tpl_vars['Resumen']['CostosSinIVa']): ?>$ <?php echo $this->_tpl_vars['Resumen']['CostosSinIVa']; ?>
<?php else: ?>asignar<?php endif; ?></span></p>
						
                    </li>
                    <?php endif; ?>
                    <li>
						<p>Tiempo estimado: <br><span><?php if ($this->_tpl_vars['Resumen']['Orden']['TiempoEstimado']): ?><?php echo $this->_tpl_vars['Resumen']['Orden']['TiempoEstimado']; ?>
 dias<?php else: ?>no tiene<?php endif; ?></span></p>
                    </li>
                    
                </ul>
            </div> <!-- /filtersBox-->
            
                
                <div class="contentTitles">
                    <label class="blue" id="">Catacteristicas: </label>
                    <h2><?php echo ((is_array($_tmp=$this->_tpl_vars['Resumen']['Caracteristicas'])) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>
</h2>
                </div> <!-- /contentTitles -->
         
         
         <table width="100%"  border="0" cellspacing="0">
  <tr>
    <td>
           <div class="contentTitles">
                    <label class="blue">Fecha</label>
                    <input type="text" class="required date" id="Fecha" name="data[Fecha]" value="<?php echo $this->_tpl_vars['data']['Fecha']; ?>
">
                </div> <!-- /contentTitles -->
         
    </td>
    <td>
                <div class="contentTitles">
                    <label class="blue">Destinatario</label>
                    <input type="text" class="required" id="Destinatario" name="data[Destinatario]" value="<?php echo $this->_tpl_vars['data']['Destinatario']; ?>
">
                </div> <!-- /contentTitles -->
    
    </td>
  </tr>
</table>
         
                
    <div class="contentTitles">                
<table width="100%"  border="0" cellspacing="0">
  <tr>
    <td><div align="center">Cantidad</div></td>
    <td><div align="center">Detalle</div></td>
    <td><div align="center">Importe total</div></td>
  </tr>
  <tr>
    <td><input type="text" class="required number" id="Cantidad1" name="data[Cantidad1]" value="<?php echo $this->_tpl_vars['data']['Cantidad1']; ?>
"></td>
    <td><input type="text" class="required" id="Detalle1" name="data[Detalle1]" value="<?php echo $this->_tpl_vars['data']['Detalle1']; ?>
"></td>
    <td><input type="text" class="required number" id="Importe1" name="data[Importe1]" value="<?php echo $this->_tpl_vars['data']['Importe1']; ?>
"></td>
  </tr>
  <tr>
    <td><input type="text" class="number" id="Cantidad2" name="data[Cantidad2]" value="<?php echo $this->_tpl_vars['data']['Cantidad2']; ?>
"></td>
    <td><input type="text" class="" id="Detalle2" name="data[Detalle2]" value="<?php echo $this->_tpl_vars['data']['Detalle2']; ?>
"></td>
    <td><input type="text" class="number" id="Importe2" name="data[Importe2]" value="<?php echo $this->_tpl_vars['data']['Importe2']; ?>
"></td>
  </tr>
  <tr>
    <td><input type="text" class="number" id="Cantidad3" name="data[Cantidad3]" value="<?php echo $this->_tpl_vars['data']['Cantidad3']; ?>
"></td>
    <td><input type="text" class="" id="Detalle3" name="data[Detalle3]" value="<?php echo $this->_tpl_vars['data']['Detalle3']; ?>
"></td>
    <td><input type="text" class="number" id="Importe3" name="data[Importe3]" value="<?php echo $this->_tpl_vars['data']['Importe3']; ?>
"></td>
  </tr>
</table>
            </div> <!-- /contentTitles -->
            
        
            <table width="100%"  border="0" cellspacing="0">
  <tr>
    <td>
        <div class="contentTitles">
                    <label class="blue" title="Dias habiles desde que comienza estado en produccion">Plazo De Entrega (dias)</label>
                    <input type="text" class="required number" id="PlazoDeEntrega" name="data[PlazoDeEntrega]" value="<?php if ($this->_tpl_vars['data']['PlazoDeEntrega']): ?><?php echo $this->_tpl_vars['data']['PlazoDeEntrega']; ?>
<?php elseif ($this->_tpl_vars['Resumen']['Orden']['TiempoEstimado']): ?><?php echo $this->_tpl_vars['Resumen']['Orden']['TiempoEstimado']; ?>
<?php endif; ?>">
                </div> <!-- /contentTitles -->
            
    </td>
    <td>
                <div class="contentTitles">
                    <label class="blue">Lugar De Entrega</label>
                    <input type="text" class="" id="LugarDeEntrega" name="data[LugarDeEntrega]" value="<?php echo $this->_tpl_vars['data']['LugarDeEntrega']; ?>
">
                </div> <!-- /contentTitles -->
    
    </td>
    <td>
    
                <div class="contentTitles">
                    <label class="blue">Formas De Pago</label>
                    <input type="text" class="" id="FormasDePago" name="data[FormasDePago]" value="<?php echo $this->_tpl_vars['data']['FormasDePago']; ?>
">
                </div> <!-- /contentTitles -->
    
    </td>
  </tr>
</table>
                       
         
         		<div class="contentTitles">
                    <label class="blue">Comentario</label>
                    <textarea name="data[Comentario]" id="comentario" cols="45" rows="5" class=""><?php echo $this->_tpl_vars['data']['Comentario']; ?>
</textarea>
                </div> <!-- /contentTitles -->  
         
         		
                
            </div> <!-- /productsEditorContent -->
        </div>  <!-- /contentEditor -->
    </div> <!-- /form -->
</form>