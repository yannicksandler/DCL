{literal}
<script type="text/javascript">
$(document).ready(function(){

	$("#TabChequesPendientesDebitar").click();	
	GetBancos();
});

function reload()
{
	window.location.reload();
}
</script>
{/literal}


        <div class="contentEditor" id="contentEditor"> <!-- formulario de edicion de contenido -->
        
            <div class="productsEditorContent">
            
            	{if $editSuccessMessage}
		            <p class="success" style="width:61%;">{$editSuccessMessage}</p>
		            <script>reload()</script>
				{elseif $editErrorMessage}
				            <p class="error" style="width:61%;">{$editErrorMessage}</p>
				{/if}	 
                
            </div> <!-- /productsEditorContent -->
        </div>  <!-- /contentEditor -->