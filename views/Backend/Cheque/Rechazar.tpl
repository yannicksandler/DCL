{literal}
<script type="text/javascript">
$(document).ready(function(){

	$("#TabChequesPendientesAcreditar").click();	
	GetBancos();
	{/literal}
		{if $editSuccessMessage}
	mostrarNotaDebito();
	{/if}
	{literal}
});

function reload()
{
	window.location.reload();
}

function mostrarNotaDebito()
{
        var url	=	'/GestionEconomica/NotaDebitoView/id/'+$('#notadebito').val();
        
		var opciones="toolbar=no, location=no, directories=no, status=no, menubar=yes, scrollbars=yes, resizable=yes, width=1000, height=700, top=85, left=140";

		abrirPopUp(url, opciones);        

        return false;
}

function GetBancos()
{
	//reload();
	return; // utilizada en home economico
}
</script>
{/literal}


        <div class="contentEditor" id="contentEditor"> <!-- formulario de edicion de contenido -->
        
            <div class="productsEditorContent">
            
            	{if $editSuccessMessage}
		            <p class="success" style="width:61%;">{$editSuccessMessage}</p>
		            {if $NotaDebitoId}
		            <input type="hidden" value="{$NotaDebitoId}" id="notadebito"/>
		            {else}
		            <script>reload()</script>
		            {/if}
				{elseif $editErrorMessage}
				            <p class="error" style="width:61%;">{$editErrorMessage}</p>
				{/if}	 
                
            </div> <!-- /productsEditorContent -->
        </div>  <!-- /contentEditor -->