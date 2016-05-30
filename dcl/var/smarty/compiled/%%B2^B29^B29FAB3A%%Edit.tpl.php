<?php /* Smarty version 2.6.26, created on 2014-09-02 09:56:28
         compiled from Backend/Banco/Edit.tpl */ ?>
<?php $this->assign('IDS_Layout_Class', 'Backend_Layouts_Default'); ?>
<?php $this->assign('IDS_Layout_Method', 'Default'); ?>

<script type="text/javascript" src="/scripts/Edit.js"></script>

<?php echo '
<script type="text/javascript">
$(document).ready(function(){
    $("#FrmEdit").validate();
    

});
</script>

'; ?>


<h1><?php if ($this->_tpl_vars['data']['Id']): ?>Editar<?php else: ?>Nuevo<?php endif; ?> Banco &raquo; <span><?php echo $this->_tpl_vars['data']['Id']; ?>
</span></h1>

<form id="FrmEdit" enctype="multipart/form-data" action="" method="post">
    <input type="hidden" name="data[Id]" value="<?php echo $this->_tpl_vars['data']['Id']; ?>
" />
   
    <div class="form">
        <div id="FormsColumn"> <!-- contiene toda la columna -->
		
			    <div class="formButtons">
				        <div class="info">
				        <input type="button" class="btMinimize btBlock" value="" title="Bloquear arriba" />
				        <!-- al clickear, que desactive el movimiento, y quede bloqueado arriba -->
				        
				        <div id="formButtonsContent">
				        
				            <ul>
				
				                <li class="buttonsTop">
				                <input type="submit" value="Guardar" class="btGray" title="Guardar" />
				                <input type="reset" value="Volver" class="btGray" title="Volver" onclick="window.location='/GestionEconomica/Main'"/>
				                </li>
				            </ul>
				            
				        </div> <!-- /formButtonsContent -->
				        
				        </div> <!-- /info -->
				    </div> <!-- /formButtons -->
				
				</div> <!-- /FormsColumn -->
            
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
                    <label class="blue">Codigo</label>
                    <input type="text" class="required" name="data[Codigo]" value="<?php echo $this->_tpl_vars['data']['Codigo']; ?>
">
                </div> <!-- /contentTitles -->
                
                <div class="contentTitles">
                    <label class="blue">Tipo</label>
                    
                    <input class="check required" type="radio" name="data[TipoBanco]" value="P" <?php if ('P' == $this->_tpl_vars['data']['TipoBanco']): ?>checked="checked"<?php endif; ?>/>
                    <label class="check blue">Propio</label>
                    <input class="check required" type="radio" name="data[TipoBanco]" value="T" <?php if ('T' == $this->_tpl_vars['data']['TipoBanco']): ?>checked="checked"<?php endif; ?>/>
                    <label class="check blue">Tercero</label>
                </div> <!-- /contentTitles -->
                
                <div class="contentTitles">
                    <label class="blue">Numero de cuenta</label>
                    <input type="text" class="number" name="data[NumeroDeCuenta]" value="<?php echo $this->_tpl_vars['data']['NumeroDeCuenta']; ?>
">
                </div> <!-- /contentTitles -->
                
                <div class="contentTitles">
                    <label class="blue">Saldo</label>
                    <input type="text" class="number" name="data[SaldoCuenta]" value="<?php echo $this->_tpl_vars['data']['SaldoCuenta']; ?>
">
                </div> <!-- /contentTitles -->
                
                <div class="contentTitles">
                    <label class="blue">Ultimo numero de cheque emitido</label>
                    <input type="text" class="number" name="data[UltimoNumeroCheque]" value="<?php echo $this->_tpl_vars['data']['UltimoNumeroCheque']; ?>
">
                </div> <!-- /contentTitles -->
                
                
            </div> <!-- /productsEditorContent -->
        </div>  <!-- /contentEditor -->
    </div> <!-- /form -->
</form>