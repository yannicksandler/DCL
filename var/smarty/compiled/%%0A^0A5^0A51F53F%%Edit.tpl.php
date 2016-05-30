<?php /* Smarty version 2.6.26, created on 2016-04-20 04:15:13
         compiled from Backend/NotaDebito/Edit.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'Backend/NotaDebito/Edit.tpl', 39, false),)), $this); ?>
<?php $this->assign('IDS_Layout_Class', 'Backend_Layouts_Default'); ?>
<?php $this->assign('IDS_Layout_Method', 'Default'); ?>

<!-- date picker -->
<link type="text/css" href="/styles/ui-lightness/jquery-ui-1.8.2.custom.css" rel="stylesheet" />
<script type="text/javascript" src="/scripts/jquery/jquery.ui.datepicker.js"></script>
<script type="text/javascript" src="/scripts/jquery/jquery.ui.core.js"></script>
<script type="text/javascript" src="/scripts/jquery/jquery.ui.widget.js"></script>
<!-- end date picker -->

<script type="text/javascript" src="/scripts/Edit.js"></script>

<?php echo '
<script type="text/javascript">
$(document).ready(function(){
    $("#FrmEdit").validate();

    $("#SeleccionarCliente").hide();

    var availableTags = [
							'; ?>
<?php echo $this->_tpl_vars['ArrayClientes']; ?>
<?php echo '
              ];

    $("input#cliente_autocomplete").autocomplete({
        source: availableTags,
      //define select handler
		select: function(e, ui) {
			var valor = ui.item.value;
			SetClienteSeleccionar(valor);
		}    
    });

    $("#Descripcion").attr(\'value\', $("#Descripcion").text().replace("\\<br /\\>", "").replace("\\<br /\\>", "").replace("\\<br /\\>", "").replace("\\<br /\\>", "").replace("\\<br /\\>", ""));

    
    $(\'#Fecha\').datepicker({
		changeMonth: true,
		changeYear: true,
		yearRange: \'1960:'; ?>
<?php echo ((is_array($_tmp=time())) ? $this->_run_mod_handler('date_format', true, $_tmp, '%Y') : smarty_modifier_date_format($_tmp, '%Y')); ?>
<?php echo '\',
		dateFormat: \'dd/mm/yy\'
	});

	$(\'.printCredito\').click(function() {
  	  	var url	=	$(this).attr(\'href\');
		VerCredito(url);		
		
		return false;
  	});	


  	$(\'.SeleccionarCliente\').click(function() {
		
		var pagina	= \'/Cliente/Seleccionar\';

		var opciones="toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=yes, width=1000, height=700, top=85, left=140";

		abrirPopUp(pagina, opciones);
		
		return false;
  	});

  	SetClienteInitTextValue();
    SetClienteSeleccionar($("input#cliente_autocomplete").val());

    $("#cliente_autocomplete").blur(function(){
        if( $(this).val() == \'\' )
            $(this).val( $(this).attr("defaultValue") );
    });

    $("#cliente_autocomplete").focus(function(){
        if( $(this).val() == $(this).attr("defaultValue"))
            $(this).val(\'\');
    });
  	  	    
});

function SetClienteInitTextValue()
{
	NombreCliente = GetSelectedTextValue("SeleccionarCliente");
	if(NombreCliente != \'Seleccionar\')
		$("input#cliente_autocomplete").val(NombreCliente);
}


function SetClienteSeleccionar(NombreCliente)
{
	inputText	=	NombreCliente;
	// setear valor select selected por texto de option / set option selected by text
	//$("#"+dropdown_id+" option:contains(" + inputText + ")").attr(\'selected\', \'selected\');
	
	$("#SeleccionarCliente option").each(function () {
        if ($(this).html() == inputText) {
            $(this).attr("selected", "selected");
            return;
        }
	});

	
}

function GetSelectedTextValue(dropdownid)
{
	var $selected 	=	$("#"+dropdownid).find(\'option:selected\');
	var $selectedtext	=	$selected.html();

	return $selectedtext;
}


function VerCredito(url)
{
	
	var opciones="toolbar=no, location=no, directories=no, status=no, menubar=yes, scrollbars=yes, resizable=yes, width=1000, height=700, top=10, left=40";

	abrirPopUp(url, opciones);

	
}

function abrirPopUp(pagina, opciones)
{
	window.open(pagina,"",opciones);
}

function SetCliente(ClienteId)
{
  	var select_id	=	\'SeleccionarCliente\';
  	var	option_val	=	ClienteId;

	$(\'#\'+select_id+\' option:selected\').removeAttr(\'selected\');
  	$(\'#\'+select_id+\' option[value=\'+option_val+\']\').attr(\'selected\',\'selected\');
}


</script>
'; ?>


<a class="linkSendHome linkSendHomeEdit" href="/NotaDebito/List/order/Fecha_DESC"><img src="/images/icons/arrow_undo.png" title="Volver al listado"/> Volver al listado de notas de credito &raquo; </a>

<h1><?php if ($this->_tpl_vars['data']['Id']): ?>Editar<?php else: ?>Nueva<?php endif; ?> Nota de debito &raquo; <span><?php echo $this->_tpl_vars['data']['Numero']; ?>
 (Interno <?php echo $this->_tpl_vars['data']['Id']; ?>
)</span></h1>

<form id="FrmEdit" enctype="multipart/form-data" action="" method="post">
   <input type="hidden" name="data[Id]" value="<?php echo $this->_tpl_vars['data']['Id']; ?>
" />

        
    <div class="form">
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "Backend/NotaDebito/ColumnForm.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
            
        <?php if ($this->_tpl_vars['editSuccessMessage']): ?>
            <p class="success" style="width:61%;"><?php echo $this->_tpl_vars['editSuccessMessage']; ?>
</p>
        <?php elseif ($this->_tpl_vars['editErrorMessage']): ?>
            <p class="error" style="width:61%;"><?php echo $this->_tpl_vars['editErrorMessage']; ?>
</p>
        <?php endif; ?>
            
        <div class="contentEditor"> <!-- formulario de edicion de contenido -->
                
            <div class="productsEditorContent">
                
                		<div class="buttonsCont" style="clear: left;">
							<?php if ($this->_tpl_vars['data']['Id']): ?>
							<input type="" value="Imprimir" href="/GestionEconomica/NotaDebitoView/id/<?php echo $this->_tpl_vars['data']['Id']; ?>
" class="btDark printCredito" title="Imprimir nota de debito" />
							<?php endif; ?>
							
			            </div>
			            
                <div class="contentTitles" id="">
                    
                    	<label class="blue"><img src="/images/icons/status_online.png" title=""/> Cliente</label>
						<input id="cliente_autocomplete" value="<?php if ($this->_tpl_vars['Cliente']): ?><?php echo $this->_tpl_vars['Cliente']['Nombre']; ?>
<?php endif; ?>" <?php if ($this->_tpl_vars['data']['Id']): ?>readonly="readonly" disabled<?php endif; ?>/>
						
						<select name="data[ClienteId]" class="required CambiarCliente" id="SeleccionarCliente">
                        <option value="">Seleccionar</option>
                        <?php $_from = $this->_tpl_vars['Clientes']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['cl']):
?>
                        <option value="<?php echo $this->_tpl_vars['cl']['Id']; ?>
" <?php if ($this->_tpl_vars['cl']['Id'] == $this->_tpl_vars['data']['ClienteId']): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['cl']['Nombre']; ?>
</option>
                        <?php endforeach; endif; unset($_from); ?>
                    	</select>
                    	
                </div> <!-- /contentTitles -->
                
                <div class="contentTitles" id="">
                    <label class="blue">Tipo de IVA</label>
                    <!-- drop down -->               
                    <select name="data[TipoIvaId]" class="required" <?php if ($this->_tpl_vars['data']['Id']): ?>readonly="readonly" disabled<?php endif; ?>>
                        <option value="">Seleccionar</option>
                        <?php $_from = $this->_tpl_vars['TiposDeIva']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['ti']):
?>
                        <option value="<?php echo $this->_tpl_vars['ti']['Id']; ?>
" <?php if (( $this->_tpl_vars['ti']['Id'] == $this->_tpl_vars['data']['TipoIvaId'] )): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['ti']['Nombre']; ?>
 - <?php if ($this->_tpl_vars['ti']['Discriminado'] > 0): ?><?php echo $this->_tpl_vars['ti']['Discriminado']; ?>
<?php endif; ?>-<?php if ($this->_tpl_vars['ti']['Adicional'] > 0): ?><?php echo $this->_tpl_vars['ti']['Adicional']; ?>
<?php endif; ?>-<?php if ($this->_tpl_vars['ti']['Incluido'] > 0): ?><?php echo $this->_tpl_vars['ti']['Incluido']; ?>
<?php endif; ?> - (Tipo factura: <?php echo $this->_tpl_vars['ti']['Letra_comp']; ?>
)</option>
                        <?php endforeach; endif; unset($_from); ?>
                    </select>
                </div> <!-- /contentTitles -->
                
                         
                <div class="contentTitles">
                    <label class="blue">Fecha</label>
                    <input type="text" class="date required" id="Fecha" name="data[Fecha]" value="<?php echo $this->_tpl_vars['data']['Fecha']; ?>
" <?php if ($this->_tpl_vars['data']['Id']): ?>readonly="readonly" disabled<?php endif; ?>>
                </div> <!-- /contentTitles -->
                
                <div class="contentTitles">
                    <label class="blue">Detalle</label>
                    <textarea name="data[Comentario]" cols="45" rows="5" class="required" id="Descripcion" <?php if ($this->_tpl_vars['data']['Id']): ?>readonly="readonly" disabled<?php endif; ?>><?php echo $this->_tpl_vars['data']['Comentario']; ?>
</textarea>
                </div> <!-- /contentTitles -->
                
                <div class="contentTitles">
                    <label class="blue">Importe de rechazo sin IVA</label>
                    <input type="text" class="number required" id="" name="data[ImporteRechazo]" value="<?php echo $this->_tpl_vars['data']['ImporteRechazo']; ?>
" <?php if ($this->_tpl_vars['data']['Id']): ?>readonly="readonly" disabled<?php endif; ?>>
                </div> <!-- /contentTitles -->
                
                <div class="contentTitles">
                    <label class="blue">Importe</label>
                    <input type="text" class="number required" id="" name="data[Importe]" value="<?php echo $this->_tpl_vars['data']['Importe']; ?>
" <?php if ($this->_tpl_vars['data']['Id']): ?>readonly="readonly" disabled<?php endif; ?>>
                </div> <!-- /contentTitles -->
                
                
            </div> <!-- /productsEditorContent -->
        </div>  <!-- /contentEditor -->
    </div> <!-- /form -->
</form>