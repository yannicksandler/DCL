{assign var='IDS_Layout_Class' value='Backend_Layouts_Default'}
{assign var='IDS_Layout_Method' value='Default'}


<script type="text/javascript" src="/scripts/Edit.js"></script>
<!-- date picker -->
<link type="text/css" href="/styles/ui-lightness/jquery-ui-1.8.2.custom.css" rel="stylesheet" />
<script type="text/javascript" src="/scripts/jquery/jquery.ui.datepicker.js"></script>
<script type="text/javascript" src="/scripts/jquery/jquery.ui.core.js"></script>
<script type="text/javascript" src="/scripts/jquery/jquery.ui.widget.js"></script>


{literal}
<script type="text/javascript">
$(document).ready(function(){
    $("#FrmEdit").validate();

    $('#FechaBaja').datepicker({
		changeMonth: true,
		changeYear: true,
        dateFormat: 'dd/mm/yy'
	});
});

</script>
{/literal}

<h1>{if $data.Id}Editar{else}Nuevo{/if} tipo de gasto &raquo; <span>{$data.Id}</span></h1>

<form id="FrmEdit" enctype="multipart/form-data" action="" method="post">

    <input type="hidden" name="data[Id]" value="{$data.Id}" />


    
        
    <div class="form">
        {include file="Backend/Rubro/ColumnForm.tpl"}
            
        {if $editSuccessMessage}
            <p class="success" style="width:61%;">{$editSuccessMessage}</p>
        {elseif $editErrorMessage}
            <p class="error" style="width:61%;">{$editErrorMessage}</p>
        {/if}
            
        <div class="contentEditor"> <!-- formulario de edicion de contenido -->
                
            <div class="productsEditorContent">
                
                <div class="contentTitles">
                    <label class="blue">Nombre</label>
                    <input type="text" class="required" name="data[Nombre]" value="{$data.Nombre}">
                </div> <!-- /contentTitles -->
                
            </div> <!-- /productsEditorContent -->
        </div>  <!-- /contentEditor -->
    </div> <!-- /form -->
</form>