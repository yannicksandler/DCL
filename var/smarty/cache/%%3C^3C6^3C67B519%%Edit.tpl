196
a:4:{s:8:"template";a:2:{s:28:"Backend/Presupuesto/Edit.tpl";b:1;s:34:"Backend/Presupuesto/ColumnForm.tpl";b:1;}s:9:"timestamp";i:1462378116;s:7:"expires";i:1462378116;s:13:"cache_serials";a:0:{}}
<!-- date picker -->
<link type="text/css" href="/styles/ui-lightness/jquery-ui-1.8.2.custom.css" rel="stylesheet" />
<script type="text/javascript" src="/scripts/jquery/jquery.ui.datepicker.js"></script>
<script type="text/javascript" src="/scripts/jquery/jquery.ui.core.js"></script>
<script type="text/javascript" src="/scripts/jquery/jquery.ui.widget.js"></script>

<script type="text/javascript" src="/scripts/Edit.js"></script>



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



<h1>Editar presupuesto &raquo;</h1>


<form id="FrmEdit" enctype="multipart/form-data" action="" method="post">
    <input type="hidden" id="" name="data[Id]" value="476" />
    
        
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
                <input type="reset" value="Cerrar" class="btGray Cerrar" title="Cerrar"/>
                </li>
            </ul>
            
        </div> <!-- /formButtonsContent -->
        
        </div> <!-- /info -->
    </div> <!-- /formButtons -->

</div> <!-- /FormsColumn -->
		        
         <input type="submit" value="Imprimir" id="476" class="btDark Print" title="Imprimir" />
                     
            
                    <p class="success" style="width:61%;">El registro se guardo con exito</p>
            <script>VerPresupuesto(476)</script>
                
        
            
        <div class="contentEditor"> <!-- formulario de edicion de contenido -->
                
            <div class="productsEditorContent">
            
            
                        <div class="filtersBox filtersInfoBox">
                <ul>
                    <li>
						<p>Orden de trabajo: <span>3979</span></p>
						<p>Cliente: <span>Allergan</span></p> 
                    </li>
                    
                    <li>
						<p>Producto: <span>Cartilla de lectura</span></p>
						
                    </li>
                                        <li>
                    	
						<p><img src="/images/icons/help.png" alt="item" title="costo total de insumos elegidos SIN IVA"/> Costo de orden de trabajo: <span>$ 47400.00</span></p>
						
                    </li>
                                        <li>
						<p>Tiempo estimado: <br><span>35 dias</span></p>
                    </li>
                    
                </ul>
            </div> <!-- /filtersBox-->
            
                
                <div class="contentTitles">
                    <label class="blue" id="">Catacteristicas: </label>
                    <h2>Formato: Cerrado – 14 ancho x 21 alto / Abierto – 28 de ancho x 21 alto<br />
Material:carton gris de 1 mm montado  frente y dorso en papel ilustracion brilllante.de 170gr<br />
Colores:4/4<br />
Terminacion: troquelado marcado para cierre</h2>
                </div> <!-- /contentTitles -->
         
         
         <table width="100%"  border="0" cellspacing="0">
  <tr>
    <td>
           <div class="contentTitles">
                    <label class="blue">Fecha</label>
                    <input type="text" class="required date" id="Fecha" name="data[Fecha]" value="04/05/2016 ">
                </div> <!-- /contentTitles -->
         
    </td>
    <td>
                <div class="contentTitles">
                    <label class="blue">Destinatario</label>
                    <input type="text" class="required" id="Destinatario" name="data[Destinatario]" value="Angeles Quiroga">
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
    <td><input type="text" class="required number" id="Cantidad1" name="data[Cantidad1]" value="3000"></td>
    <td><input type="text" class="required" id="Detalle1" name="data[Detalle1]" value="Cartillas de Lectura"></td>
    <td><input type="text" class="required number" id="Importe1" name="data[Importe1]" value="72900.00"></td>
  </tr>
  <tr>
    <td><input type="text" class="number" id="Cantidad2" name="data[Cantidad2]" value=""></td>
    <td><input type="text" class="" id="Detalle2" name="data[Detalle2]" value=""></td>
    <td><input type="text" class="number" id="Importe2" name="data[Importe2]" value=""></td>
  </tr>
  <tr>
    <td><input type="text" class="number" id="Cantidad3" name="data[Cantidad3]" value=""></td>
    <td><input type="text" class="" id="Detalle3" name="data[Detalle3]" value=""></td>
    <td><input type="text" class="number" id="Importe3" name="data[Importe3]" value=""></td>
  </tr>
</table>
            </div> <!-- /contentTitles -->
            
        
            <table width="100%"  border="0" cellspacing="0">
  <tr>
    <td>
        <div class="contentTitles">
                    <label class="blue" title="Dias habiles desde que comienza estado en produccion">Plazo De Entrega (dias)</label>
                    <input type="text" class="required number" id="PlazoDeEntrega" name="data[PlazoDeEntrega]" value="35">
                </div> <!-- /contentTitles -->
            
    </td>
    <td>
                <div class="contentTitles">
                    <label class="blue">Lugar De Entrega</label>
                    <input type="text" class="" id="LugarDeEntrega" name="data[LugarDeEntrega]" value="CABA">
                </div> <!-- /contentTitles -->
    
    </td>
    <td>
    
                <div class="contentTitles">
                    <label class="blue">Formas De Pago</label>
                    <input type="text" class="" id="FormasDePago" name="data[FormasDePago]" value="50% anticipo / 50 %, 30 dias FF">
                </div> <!-- /contentTitles -->
    
    </td>
  </tr>
</table>
                       
         
         		<div class="contentTitles">
                    <label class="blue">Comentario</label>
                    <textarea name="data[Comentario]" id="comentario" cols="45" rows="5" class=""></textarea>
                </div> <!-- /contentTitles -->  
         
         		
                
            </div> <!-- /productsEditorContent -->
        </div>  <!-- /contentEditor -->
    </div> <!-- /form -->
</form>