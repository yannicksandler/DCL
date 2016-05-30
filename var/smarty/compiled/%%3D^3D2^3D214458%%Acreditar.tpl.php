<?php /* Smarty version 2.6.26, created on 2015-11-03 12:25:00
         compiled from Backend/Cheque/Acreditar.tpl */ ?>
<?php echo '
<script type="text/javascript">
$(document).ready(function(){

	$("#TabChequesPendientesAcreditar").click();	
	GetBancos();
});

function reload()
{
	window.location.reload();
}
</script>
'; ?>



        <div class="contentEditor" id="contentEditor"> <!-- formulario de edicion de contenido -->
        
            <div class="productsEditorContent">
            
            	<?php if ($this->_tpl_vars['editSuccessMessage']): ?>
		            <p class="success" style="width:61%;"><?php echo $this->_tpl_vars['editSuccessMessage']; ?>
</p>
		            <script>reload()</script>
				<?php elseif ($this->_tpl_vars['editErrorMessage']): ?>
				            <p class="error" style="width:61%;"><?php echo $this->_tpl_vars['editErrorMessage']; ?>
</p>
				<?php endif; ?>	 
                
            </div> <!-- /productsEditorContent -->
        </div>  <!-- /contentEditor -->