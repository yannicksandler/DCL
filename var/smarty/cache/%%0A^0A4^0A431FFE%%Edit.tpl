188
a:4:{s:8:"template";a:2:{s:26:"Backend/TipoGasto/Edit.tpl";b:1;s:28:"Backend/Rubro/ColumnForm.tpl";b:1;}s:9:"timestamp";i:1426610235;s:7:"expires";i:1426610235;s:13:"cache_serials";a:0:{}}

<script type="text/javascript" src="/scripts/Edit.js"></script>
<!-- date picker -->
<link type="text/css" href="/styles/ui-lightness/jquery-ui-1.8.2.custom.css" rel="stylesheet" />
<script type="text/javascript" src="/scripts/jquery/jquery.ui.datepicker.js"></script>
<script type="text/javascript" src="/scripts/jquery/jquery.ui.core.js"></script>
<script type="text/javascript" src="/scripts/jquery/jquery.ui.widget.js"></script>



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


<h1>Editar tipo de gasto &raquo; <span>9</span></h1>

<form id="FrmEdit" enctype="multipart/form-data" action="" method="post">

    <input type="hidden" name="data[Id]" value="9" />


    
        
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
                <input type="reset" value="Volver" class="btGray " title="Volver" onClick="window.location='/GestionEconomica/Main'"/>
                </li>
            </ul>
            
        </div> <!-- /formButtonsContent -->
        
        </div> <!-- /info -->
    </div> <!-- /formButtons -->

</div> <!-- /FormsColumn -->            
                    <p class="success" style="width:61%;">El registro se guardo con exito</p>
                    
        <div class="contentEditor"> <!-- formulario de edicion de contenido -->
                
            <div class="productsEditorContent">
                
                <div class="contentTitles">
                    <label class="blue">Nombre</label>
                    <input type="text" class="required" name="data[Nombre]" value="Impuestos">
                </div> <!-- /contentTitles -->
                
            </div> <!-- /productsEditorContent -->
        </div>  <!-- /contentEditor -->
    </div> <!-- /form -->
</form>