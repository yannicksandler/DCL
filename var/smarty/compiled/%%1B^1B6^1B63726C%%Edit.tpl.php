<?php /* Smarty version 2.6.26, created on 2016-05-05 12:21:03
         compiled from Backend/Insumo/Edit.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'nl2br', 'Backend/Insumo/Edit.tpl', 140, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "Backend/Layouts/Include/Header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>



<!-- date picker -->
<link type="text/css" href="/styles/ui-lightness/jquery-ui-1.8.2.custom.css" rel="stylesheet" />
<script type="text/javascript" src="/scripts/jquery/jquery.ui.datepicker.js"></script>
<script type="text/javascript" src="/scripts/jquery/jquery.ui.core.js"></script>
<script type="text/javascript" src="/scripts/jquery/jquery.ui.widget.js"></script>

<script type="text/javascript" src="/scripts/Edit.js"></script>


<!-- dialog -->
<script type="text/javascript" src="/scripts/jquery/jquery-ui-1.8.4.custom.min.js"></script>
<!-- dialog -->

  
<body>
    <div id="Container">
    
    <div id="Content">
            <div class="listado">    
	
<?php echo '
  
<script type="text/javascript">

$(document).ready(function(){
    $("#FrmEdit").validate();
    
    var availableTags = [
							'; ?>
<?php echo $this->_tpl_vars['ArrayProveedores']; ?>
<?php echo '
                       ];
    

    $("input#proveedor_autocomplete").autocomplete({
        source: availableTags,
      //define select handler
		select: function(e, ui) {
			var valor = ui.item.value;
			SetProveedor(valor);
		}        
		/*
        change: function() {
			alert(1);
        }*/
    });  

    $("#select_proveedor").hide();  

    SetProveedorInitTextValue();
});

function SetProveedorInitTextValue()
{
	NombreProveedor = GetSelectedTextValue("select_proveedor");
	
	$("input#proveedor_autocomplete").val(NombreProveedor);
}

function GetSelectedTextValue(dropdownid)
{
	var $selected 	=	$("#"+dropdownid).find(\'option:selected\');
	var $selectedtext	=	$selected.html();

	return $selectedtext;
}

function setParentValueInsumo(insumoId)
{
	//alert(insumoId);
	window.opener.reload();
	//window.opener.guardarObtenerInsumos(insumoId, \'add\');
	self.close();
}

function SetProveedor(NombreProveedor)
{
	dropdown_id =	\'select_proveedor\';
	inputText	=	NombreProveedor;
	// setear valor select selected por texto de option / set option selected by text
	//$("#"+dropdown_id+" option:contains(" + inputText + ")").attr(\'selected\', \'selected\');
	
	$("#select_proveedor option").each(function () {
        if ($(this).html() == inputText) {
            $(this).attr("selected", "selected");
            return;
        }
	});
	
}

</script>
'; ?>


<h1><?php if ($this->_tpl_vars['data']['Id']): ?>Editar <?php else: ?>Nuevo<?php endif; ?> insumo para orden de trabajo #<?php echo $this->_tpl_vars['Orden']['Id']; ?>
</h1>


<form id="FrmEdit" enctype="multipart/form-data" action="" method="post">
    <input type="hidden" name="data[Id]" value="<?php echo $this->_tpl_vars['data']['Id']; ?>
" />
    <input type="hidden" name="data[OrdenId]" value="<?php echo $this->_tpl_vars['Orden']['Id']; ?>
" />
    <input type="hidden" name="data[EsFlete]" value="<?php if ($this->_tpl_vars['EsFlete']): ?>SI<?php else: ?><?php echo $this->_tpl_vars['data']['EsFlete']; ?>
<?php endif; ?>" />
    <input type="hidden" name="data[EsManoDeObra]" value="<?php if ($this->_tpl_vars['EsManoDeObra']): ?>SI<?php else: ?><?php echo $this->_tpl_vars['data']['EsManoDeObra']; ?>
<?php endif; ?>" />
    <input type="hidden" name="data[EsComercializacion]" value="<?php if ($this->_tpl_vars['EsComercializacion']): ?>SI<?php else: ?><?php echo $this->_tpl_vars['data']['EsComercializacion']; ?>
<?php endif; ?>" />
    <input type="hidden" name="data[Status]" id="stateValue" value="<?php if ($this->_tpl_vars['data']['Id']): ?><?php echo $this->_tpl_vars['data']['Status']; ?>
<?php else: ?>1<?php endif; ?>" />
    
    <div class="form">
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "Backend/Insumo/ColumnForm.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
            
        <?php if ($this->_tpl_vars['editSuccessMessage']): ?>
            <p class="success" id="editSuccess" style="width:61%;"><?php echo $this->_tpl_vars['editSuccessMessage']; ?>
</p>
            <script type="text/javascript">
            	setParentValueInsumo(<?php echo $this->_tpl_vars['data']['Id']; ?>
);
			</script>
            
        <?php elseif ($this->_tpl_vars['editErrorMessage']): ?>
            <p class="error" style="width:61%;"><?php echo $this->_tpl_vars['editErrorMessage']; ?>
</p>
        <?php endif; ?>
            
        <div class="contentEditor"> <!-- formulario de edicion de contenido -->
                
        <div class="productsEditorContent">
        
        
<table border="0" cellspacing="0">
  <tr>
    <td>
				<div class="contentTitles">
                    <ul class="statsList">
			                        <li>
			                            <p class="big"><?php echo $this->_tpl_vars['Orden']['Producto']; ?>
</p>
			                        </li>
			                    </ul> <!-- /statsList -->
                </div> <!-- /contentTitles -->
    
    </td>
    <td>
                <div class="contentTitles" >
                    <p><?php echo ((is_array($_tmp=$this->_tpl_vars['Orden']['DescripcionDeTrabajo'])) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>
</p>
                </div> <!-- /contentTitles -->
    
    </td>
  </tr>
  <tr>
    <td>
				<div class="contentTitles">
                    <label class="blue">Nombre</label>
                    <input type="text" class="required" id="nombre" name="data[Nombre]" value="<?php echo $this->_tpl_vars['data']['Nombre']; ?>
">
                </div> <!-- /contentTitles -->
    
    </td>
    <td>
                <div class="contentTitles" >
                    <label class="blue">Proveedor</label>
                    <input id="proveedor_autocomplete" />
                    <!-- drop down -->               
                    <select name="data[ProveedorId]" class="required" id="select_proveedor">
                        <option value="">Seleccionar</option>
                        <?php $_from = $this->_tpl_vars['Proveedores']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['c']):
?>
                        <option value="<?php echo $this->_tpl_vars['c']['Id']; ?>
" <?php if ($this->_tpl_vars['c']['Id'] == $this->_tpl_vars['data']['ProveedorId']): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['c']['Nombre']; ?>
</option>
                        <?php endforeach; endif; unset($_from); ?>
                    </select>
                </div> <!-- /contentTitles -->
    
    </td>
  </tr>
  <tr>
    <td>&nbsp;
				<div class="contentTitles">
                    <label class="blue">Precio unitario sin IVA</label>
                    <input type="text" class="required number" id="" name="data[PrecioUnitarioSinIVA]" value="<?php echo $this->_tpl_vars['data']['PrecioUnitarioSinIVA']; ?>
">
                </div> <!-- /contentTitles -->            
    
    </td>
    <td>&nbsp;
                <div class="contentTitles">
                    <label class="blue">Cantidad</label>
                    <input type="text" class="required number" id="" name="data[Cantidad]" value="<?php echo $this->_tpl_vars['data']['Cantidad']; ?>
">
                </div> <!-- /contentTitles -->
    
    </td>
    <td>
				<div class="contentTitles">
                    <label class="blue">Importe total: $<?php echo $this->_tpl_vars['data']['Cantidad']*$this->_tpl_vars['data']['PrecioUnitarioSinIVA']; ?>
</label>
                </div> <!-- /contentTitles -->
    
    </td>
  </tr>
  <tr>
    <td>&nbsp;
                <div class="contentTitles">
                    <label class="blue">Plazo de entrega (dias desde que envia Orden de Compra)</label>
                    <input type="text" class="required number" id="" name="data[PlazoDeEntrega]" value="<?php echo $this->_tpl_vars['data']['PlazoDeEntrega']; ?>
">
                </div> <!-- /contentTitles -->
    
    </td>
    <td>&nbsp;
                <div class="contentTitles">
                    <label class="blue">Comentario de plazo de entrega</label>
                    <input type="text" class="" id="" name="data[PlazoDeEntregaComentario]" value="<?php echo $this->_tpl_vars['data']['PlazoDeEntregaComentario']; ?>
">
                </div> <!-- /contentTitles -->
    
    </td>
  </tr>
  <tr>
    <td>&nbsp;
                <div class="contentTitles">
                    <label class="blue">Lugar de entrega</label>
                    <input type="text" class="" id="" name="data[LugarDeEntrega]" value="<?php echo $this->_tpl_vars['data']['LugarDeEntrega']; ?>
">
                </div> <!-- /contentTitles -->
    
    </td>
    <td>&nbsp;
				<div class="contentTitles">
                    <label class="blue">Condicion de pago</label>
                    
                    <input class="check required" type="radio" name="data[CondicionDePago]" value="B" <?php if ('B' == $this->_tpl_vars['data']['CondicionDePago']): ?>checked="checked"<?php endif; ?>/>
                    <label class="check blue">1 (B)</label>
                    <input class="check required" type="radio" name="data[CondicionDePago]" value="N" <?php if ('N' == $this->_tpl_vars['data']['CondicionDePago']): ?>checked="checked"<?php endif; ?>/>
                    <label class="check blue">2</label>
                </div> <!-- /contentTitles -->
    
    </td>
  </tr>
  <tr>
    <td>&nbsp;
		<div class="contentTitles">
		
		<?php if ($this->_tpl_vars['data']['OrdenDeCompraId']): ?>
		<label class="blue">Esta elegido?  <?php echo $this->_tpl_vars['data']['Elegido']; ?>
</label>
        <label class="blue">Orden de compra asociada: # <?php echo $this->_tpl_vars['data']['OrdenDeCompraId']; ?>
</label>
        <?php else: ?>
                    <label class="blue">Esta elegido?</label>
                    
                    <input class="check required" type="radio" name="data[Elegido]" value="SI" <?php if ('SI' == $this->_tpl_vars['data']['Elegido']): ?>checked="checked"<?php endif; ?>/>
                    <label class="check blue">Si</label>
                    <input class="check required" type="radio" name="data[Elegido]" value="NO" <?php if ('NO' == $this->_tpl_vars['data']['Elegido']): ?>checked="checked"<?php endif; ?>/>
                    <label class="check blue">No</label>
        <?php endif; ?>
        </div> <!-- /contentTitles --> 
    
    </td>
    <td>&nbsp;
				<div class="contentTitles">
                    <label class="blue">Forma de pago</label>
                    <p>Por ejemplo 50% anticipado y 50% a un mes de entrega</p>
                    <input type="text" class="" id="" name="data[FormaDePago]" value="<?php echo $this->_tpl_vars['data']['FormaDePago']; ?>
">
                </div> <!-- /contentTitles -->    
    </td>
  </tr>
</table>
            
            </div> <!-- /productsEditorContent -->
        </div>  <!-- /contentEditor -->
        
    </div> <!-- /form -->
</form>

            </div>
        </div>
            

    </div> <!-- /Container -->
</body>
</html>