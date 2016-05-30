<?php /* Smarty version 2.6.26, created on 2014-09-17 17:27:42
         compiled from Backend/Cliente/Edit.tpl */ ?>
<?php $this->assign('IDS_Layout_Class', 'Backend_Layouts_Default'); ?>
<?php $this->assign('IDS_Layout_Method', 'Default'); ?>

<script type="text/javascript" src="/scripts/Edit.js"></script>

<?php echo '
<script type="text/javascript">
$(document).ready(function(){
    $("#FrmEdit").validate();
    
    // toUpper()
    //$("[name=\'data[Nombre]\']").keyup(function(){
      //  $(this).val( $(this).val().toUpperCase() );
    //});
    

});

</script>
'; ?>


<a class="linkSendHome linkSendHomeEdit" href="/Cliente/List">&laquo; Volver al listado</a>

<h1><?php if ($this->_tpl_vars['data']['Id']): ?>Editar<?php else: ?>Nuevo<?php endif; ?> Cliente &raquo; <span><?php echo $this->_tpl_vars['data']['Id']; ?>
</span></h1>

<form id="FrmEdit" enctype="multipart/form-data" action="" method="post">
    <input type="hidden" name="data[Id]" value="<?php echo $this->_tpl_vars['data']['Id']; ?>
" />

    <input type="hidden" name="data[Status]" id="stateValue" value="<?php if ($this->_tpl_vars['data']['Id']): ?><?php echo $this->_tpl_vars['data']['Status']; ?>
<?php else: ?>1<?php endif; ?>" />
    
        
    <div class="form">
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "Backend/Cliente/ColumnForm.tpl", 'smarty_include_vars' => array()));
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
            
                <div class="contentTitles">
                    <label class="blue">Nombre</label>
                    <input type="text" class="required" name="data[Nombre]" value="<?php echo $this->_tpl_vars['data']['Nombre']; ?>
">
                </div> <!-- /contentTitles -->
                                         
                <div class="contentTitles">
                    <label class="blue">Razon social</label>
                    <input type="text" class="required" name="data[RazonSocial]" value="<?php echo $this->_tpl_vars['data']['RazonSocial']; ?>
">
                </div> <!-- /contentTitles -->
                
                <div class="contentTitles" id="">
                    <label class="blue">Tipo de IVA</label>
                    <p>Utilizado para facturar</p>
                    <!-- drop down -->               
                    <select name="data[TipoIvaId]" class="required">
                        <option value="">Seleccionar</option>
                        <?php $_from = $this->_tpl_vars['TiposDeIva']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['c']):
?>
                        <option value="<?php echo $this->_tpl_vars['c']['Id']; ?>
" <?php if (( $this->_tpl_vars['c']['Id'] == $this->_tpl_vars['data']['TipoIvaId'] )): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['c']['Nombre']; ?>
 - <?php if ($this->_tpl_vars['c']['Discriminado'] > 0): ?><?php echo $this->_tpl_vars['c']['Discriminado']; ?>
<?php endif; ?>-<?php if ($this->_tpl_vars['c']['Adicional'] > 0): ?><?php echo $this->_tpl_vars['c']['Adicional']; ?>
<?php endif; ?>-<?php if ($this->_tpl_vars['c']['Incluido'] > 0): ?><?php echo $this->_tpl_vars['c']['Incluido']; ?>
<?php endif; ?> - (Tipo factura: <?php echo $this->_tpl_vars['c']['Letra_comp']; ?>
)</option>
                        <?php endforeach; endif; unset($_from); ?>
                    </select>
                </div> <!-- /contentTitles -->
                
                <div class="contentTitles" id="">
                    <label class="blue">Rubro</label>
                    <!-- drop down -->               
                    <select name="data[RubroId]" class="required">
                        <option value="">Seleccionar</option>
                        <?php $_from = $this->_tpl_vars['Rubros']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['r']):
?>
                        <option value="<?php echo $this->_tpl_vars['r']['Id']; ?>
" <?php if (( $this->_tpl_vars['r']['Id'] == $this->_tpl_vars['data']['RubroId'] )): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['r']['Nombre']; ?>
</option>
                        <?php endforeach; endif; unset($_from); ?>
                    </select>
                </div> <!-- /contentTitles -->

                <div class="contentTitles">
                    <label class="blue">Nombre de contacto</label>
                    <input type="text" class="" name="data[PersonaContacto]" value="<?php echo $this->_tpl_vars['data']['PersonaContacto']; ?>
">
                </div> <!-- /contentTitles -->

                <div class="contentTitles">
                    <label class="blue">Email de persona de contacto</label>
                    <input type="text" class="email" name="data[PersonaEmail]" value="<?php echo $this->_tpl_vars['data']['PersonaEmail']; ?>
">
                </div> <!-- /contentTitles -->

                <div class="contentTitles">
                    <label class="blue">Persona Telefono</label>
                    <input type="text" class="" name="data[PersonaTelefono]" value="<?php echo $this->_tpl_vars['data']['PersonaTelefono']; ?>
">
                </div> <!-- /contentTitles -->

                <div class="contentTitles">
                    <label class="blue">Rubro</label>
                    <input type="text" class="" name="data[Rubro]" value="<?php echo $this->_tpl_vars['data']['Rubro']; ?>
">
                </div> <!-- /contentTitles -->
				
                <div class="contentTitles">
                    <label class="blue">Cuit</label>
                    <input type="text" class="number" name="data[Cuit]" value="<?php echo $this->_tpl_vars['data']['Cuit']; ?>
">
                </div> <!-- /contentTitles -->                       
                
                <div class="contentTitles" id="Localidad">
                    <label class="blue">Localidad</label>
                    <input type="text" class="" name="data[Localidad]" value="<?php echo $this->_tpl_vars['data']['Localidad']; ?>
">
                </div> <!-- /contentTitles -->
                    
                <div class="contentTitles">
                    <label class="blue">Direccion</label>
                    <textarea name="data[Direccion]" cols="45" rows="5"><?php echo $this->_tpl_vars['data']['Direccion']; ?>
</textarea>
                </div> <!-- /contentTitles -->
                 
                 
                <div class="contentTitles">
                    <label class="blue">Codigo postal</label>
                    <input type="text" class="" name="data[CodigoPostal]" value="<?php echo $this->_tpl_vars['data']['CodigoPostal']; ?>
">
                </div> <!-- /contentTitles -->
                         
                    
                <div class="contentTitles">
                    <label class="blue">Telefono</label>
                    <input type="text" class="" name="data[Telefono]" value="<?php echo $this->_tpl_vars['data']['Telefono']; ?>
">
                </div> <!-- /contentTitles -->
                
                
                <div class="contentTitles">
                    <label class="blue">Fax</label>
                    <input type="text" class="number" name="data[Fax]" value="<?php echo $this->_tpl_vars['data']['Fax']; ?>
">
                </div> <!-- /contentTitles -->
                
                <div class="contentTitles">
                    <label class="blue">Email</label>
                    <input type="text" class="email" name="data[Email]" value="<?php echo $this->_tpl_vars['data']['Email']; ?>
">
                </div> <!-- /contentTitles -->
                
                <div class="contentTitles">
                    <label class="blue">Saldo inicial</label>
                    <input type="text" class="number" name="data[SaldoInicial]" value="<?php echo $this->_tpl_vars['data']['SaldoInicial']; ?>
">
                </div> <!-- /contentTitles -->
                           
                
                
            </div> <!-- /productsEditorContent -->
        </div>  <!-- /contentEditor -->
    </div> <!-- /form -->
</form>