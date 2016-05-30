{assign var='IDS_Layout_Class' value='Backend_Layouts_Default'}
{assign var='IDS_Layout_Method' value='Default'}

<!-- date picker -->
<link type="text/css" href="/styles/ui-lightness/jquery-ui-1.8.2.custom.css" rel="stylesheet" />
<script type="text/javascript" src="/scripts/jquery/jquery.ui.datepicker.js"></script>
<script type="text/javascript" src="/scripts/jquery/jquery.ui.core.js"></script>
<script type="text/javascript" src="/scripts/jquery/jquery.ui.widget.js"></script>

<script type="text/javascript" src="/scripts/Edit.js"></script>


{literal}
<script type="text/javascript">
$(document).ready(function(){
    $("#FrmEdit").validate();

    $("#comentario").attr('value', $("#comentario").text().replace("\<br /\>", "").replace("\<br /\>", "").replace("\<br /\>", "").replace("\<br /\>", "").replace("\<br /\>", ""));

    $(".Print").click(function(){

    	var presupuestoid	=	$(this).attr('id');
		
		VerPresupuesto(presupuestoid);      

        return false;
    });

    $(".Cerrar").click(function(){

    	window.close();
    });

    $('#Fecha').datepicker({
		changeMonth: true,
		changeYear: true,
        dateFormat: 'dd/mm/yy'
	});

	$('#Header').hide();

});

function VerPresupuesto(id)
{
	window.opener.reload();
	if(id>0)
	{
    var url	=	'/Presupuesto/View/id/' + id;
    
	var opciones="toolbar=no, location=no, directories=no, status=no, menubar=yes, scrollbars=yes, resizable=yes, width=1000, height=700, top=85, left=140";

	abrirPopUp(url, opciones);
	self.close();
	}
	else
		alert('el presupuesto no tiene id');  
}

function abrirPopUp(pagina, opciones)
{
	window.open(pagina,"",opciones);
}
</script>
{/literal}


<h1>{if $data.Id}Editar{else}Nuevo{/if} presupuesto &raquo;</h1>


<form id="FrmEdit" enctype="multipart/form-data" action="" method="post">
    <input type="hidden" id="" name="data[Id]" value="{$data.Id}" />
    
        
    <div class="form">
        {include file="Backend/Presupuesto/ColumnForm.tpl"}

		{if $data.Id}        
         <input type="submit" value="Imprimir" id="{$data.Id}" class="btDark Print" title="Imprimir" />
         {/if}
            
            
        {if $editSuccessMessage}
            <p class="success" style="width:61%;">{$editSuccessMessage}</p>
            <script>VerPresupuesto({$data.Id})</script>
        {elseif $editErrorMessage}
            <p class="error" style="width:61%;">{$editErrorMessage}</p>
        {/if}
        
        
            
        <div class="contentEditor"> <!-- formulario de edicion de contenido -->
                
            <div class="productsEditorContent">
            
            
                        <div class="filtersBox filtersInfoBox">
                <ul>
                    <li>
						<p>Orden de trabajo: <span>{$Resumen.OrdenId}</span></p>
						<p>Cliente: <span>{$Resumen.Cliente.Nombre}</span></p> 
                    </li>
                    
                    <li>
						<p>Producto: <span>{$Resumen.Producto}</span></p>
						
                    </li>
                    {if !$IsPerfilVentas}
                    <li>
                    	
						<p><img src="/images/icons/help.png" alt="item" title="costo total de insumos elegidos SIN IVA"/> Costo de orden de trabajo: <span>{if $Resumen.CostosSinIVa}$ {$Resumen.CostosSinIVa}{else}asignar{/if}</span></p>
						
                    </li>
                    {/if}
                    <li>
						<p>Tiempo estimado: <br><span>{if $Resumen.Orden.TiempoEstimado}{$Resumen.Orden.TiempoEstimado} dias{else}no tiene{/if}</span></p>
                    </li>
                    
                </ul>
            </div> <!-- /filtersBox-->
            
                
                <div class="contentTitles">
                    <label class="blue" id="">Catacteristicas: </label>
                    <h2>{$Resumen.Caracteristicas|nl2br}</h2>
                </div> <!-- /contentTitles -->
         
         
         <table width="100%"  border="0" cellspacing="0">
  <tr>
    <td>
           <div class="contentTitles">
                    <label class="blue">Fecha</label>
                    <input type="text" class="required date" id="Fecha" name="data[Fecha]" value="{$data.Fecha}">
                </div> <!-- /contentTitles -->
         
    </td>
    <td>
                <div class="contentTitles">
                    <label class="blue">Destinatario</label>
                    <input type="text" class="required" id="Destinatario" name="data[Destinatario]" value="{$data.Destinatario}">
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
    <td><input type="text" class="required number" id="Cantidad1" name="data[Cantidad1]" value="{$data.Cantidad1}"></td>
    <td><input type="text" class="required" id="Detalle1" name="data[Detalle1]" value="{$data.Detalle1}"></td>
    <td><input type="text" class="required number" id="Importe1" name="data[Importe1]" value="{$data.Importe1}"></td>
  </tr>
  <tr>
    <td><input type="text" class="number" id="Cantidad2" name="data[Cantidad2]" value="{$data.Cantidad2}"></td>
    <td><input type="text" class="" id="Detalle2" name="data[Detalle2]" value="{$data.Detalle2}"></td>
    <td><input type="text" class="number" id="Importe2" name="data[Importe2]" value="{$data.Importe2}"></td>
  </tr>
  <tr>
    <td><input type="text" class="number" id="Cantidad3" name="data[Cantidad3]" value="{$data.Cantidad3}"></td>
    <td><input type="text" class="" id="Detalle3" name="data[Detalle3]" value="{$data.Detalle3}"></td>
    <td><input type="text" class="number" id="Importe3" name="data[Importe3]" value="{$data.Importe3}"></td>
  </tr>
</table>
            </div> <!-- /contentTitles -->
            
        
            <table width="100%"  border="0" cellspacing="0">
  <tr>
    <td>
        <div class="contentTitles">
                    <label class="blue" title="Dias habiles desde que comienza estado en produccion">Plazo De Entrega (dias)</label>
                    <input type="text" class="required number" id="PlazoDeEntrega" name="data[PlazoDeEntrega]" value="{if $data.PlazoDeEntrega}{$data.PlazoDeEntrega}{elseif $Resumen.Orden.TiempoEstimado}{$Resumen.Orden.TiempoEstimado}{/if}">
                </div> <!-- /contentTitles -->
            
    </td>
    <td>
                <div class="contentTitles">
                    <label class="blue">Lugar De Entrega</label>
                    <input type="text" class="" id="LugarDeEntrega" name="data[LugarDeEntrega]" value="{$data.LugarDeEntrega}">
                </div> <!-- /contentTitles -->
    
    </td>
    <td>
    
                <div class="contentTitles">
                    <label class="blue">Formas De Pago</label>
                    <input type="text" class="" id="FormasDePago" name="data[FormasDePago]" value="{$data.FormasDePago}">
                </div> <!-- /contentTitles -->
    
    </td>
  </tr>
</table>
                       
         
         		<div class="contentTitles">
                    <label class="blue">Comentario</label>
                    <textarea name="data[Comentario]" id="comentario" cols="45" rows="5" class="">{$data.Comentario}</textarea>
                </div> <!-- /contentTitles -->  
         
         		
                
            </div> <!-- /productsEditorContent -->
        </div>  <!-- /contentEditor -->
    </div> <!-- /form -->
</form>