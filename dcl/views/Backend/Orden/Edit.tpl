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

    //$('#producto').css('textTransform', 'capitalize');
    
    $('#producto').keypress(function () {
    	var $this = $(this);
        val = $this.val();
    	val = val.substr(0, 1).toUpperCase() + val.substr(1);

    	$(this).val(val);
   	});

    $("#detalle").button({
        icons: {
            primary: "ui-icon-zoomin"
        }
    }).click(function () {
        // hover in
        $(".ui-button-icon-primary", this)
          .toggleClass("ui-icon-zoomin ui-icon-zoomout");
    }, function () {
        // hover out
        $(".ui-button-icon-primary", this)
          .toggleClass("ui-icon-zoomout ui-icon-zoomin");
    });
    
    $("#detalle").click(function () {
    	$(".general").toggle("slow");
   	});

    $("#mostrarinsumos").button({
        icons: {
            primary: "ui-icon-zoomin"
        }
    }).click(function () {
        // hover in
        $(".ui-button-icon-primary", this)
          .toggleClass("ui-icon-zoomin ui-icon-zoomout");
    }, function () {
        // hover out
        $(".ui-button-icon-primary", this)
          .toggleClass("ui-icon-zoomout ui-icon-zoomin");
    });

    $("#mostrarinsumos").click(function () {
    	$("#insumos").toggle("slow");

   	});

    $("#mostrarventas").button({
        icons: {
            primary: "ui-icon-zoomin"
        }
    }).click(function () {
        // hover in
        $(".ui-button-icon-primary", this)
          .toggleClass("ui-icon-zoomin ui-icon-zoomout");
    }, function () {
        // hover out
        $(".ui-button-icon-primary", this)
          .toggleClass("ui-icon-zoomout ui-icon-zoomin");
    });

    $("#mostrarventas").click(function () {
    	//$("#insumos").show();
    	//$("#insumosCargados").hide();
    	//$("#CostosInsumos").toogle();
    	
    	$(".ventas").toggle("slow");
   	});


    //$("#descripciondetrabajo").attr('value', $("#descripciondetrabajo").text().replace("\<br /\>", "").replace("\<br /\>", "").replace("\<br /\>", "").replace("\<br /\>", "").replace("\<br /\>", ""));
    $("#ComentarioFactura").attr('value', $("#ComentarioFactura").text().replace("\<br /\>", "").replace("\<br /\>", "").replace("\<br /\>", "").replace("\<br /\>", "").replace("\<br /\>", ""));
    
    $('#fechaInicio').datepicker({
		changeMonth: true,
		changeYear: true,
        dateFormat: 'dd/mm/yy'
	});
    
    $('#fechaFin').datepicker({
		changeMonth: true,
		changeYear: true,
        dateFormat: 'dd/mm/yy'
	});
    
    $('#fechaEntrega').datepicker({
		changeMonth: true,
		changeYear: true,
        dateFormat: 'dd/mm/yy'
	});

    $('#fechaFactura').datepicker({
		changeMonth: true,
		changeYear: true,
        dateFormat: 'dd/mm/yy'
	});
    

    $('#totalSinIva').change(function(){
        var total=   $("#totalSinIva").attr("value");
    
        $("#totalConIva").attr('value',Number(total)*1.21);
        ingresosBrutos	=	Number(total)*1.03;
        $("#ingresosBrutos").text($("#ingresosBrutos").text()+ ingresosBrutos);
        impuestosBancarios	=	Number(total)*1.21*1.012;
        $("#impuestosBancarios").text($("#impuestosBancarios").text()+impuestosBancarios);
    });

        $('.Presupuestar').click(function(){
            var ordenid	= $(this).attr('id');
            var presupuestoid	= $(this).attr('presupuesto');		
            Presupuestar(ordenid, presupuestoid);
            
            return false;
        });
    

    
    $('#totalSinIva').change();
	
	guardarObtenerInsumos(1, 'list');

    $("#mostrarinsumos").click();
});
// lo usa el popup generar orden de compra

function reload()
{
	var ot	=	$('#OrdenDeTrabajo').val();
	//window.location.reload();
	if(ot)
		window.location = '/Orden/Edit/id/' + ot;
	else
		alert('NO existe la orden de trabajo');
	//$('#FrmEdit').submit();
}

function Presupuestar(OrdenId, PresupuestoId)
{
	if(OrdenId > 0)
	{
		var url	=	'/Presupuesto/Edit/OrdenId/' + OrdenId;

		if(PresupuestoId > 0)
			url	=	url + '/id/' + PresupuestoId;
	    
		var opciones="toolbar=no, location=no, directories=no, status=no, menubar=yes, scrollbars=yes, resizable=yes, width=1000, height=700, top=85, left=140";
	
		abrirPopUp(url, opciones);        
	}
	else
		alert('El numero de orden no es correcto');
}
function abrirPopUp(pagina, opciones)
{
	window.open(pagina,"",opciones);
}
function guardarObtenerInsumos(insumo, action)
{
	if (insumo) // si esta seteado
	{
		// insert record y cargar nombre
		$.ajax({
			type: "GET",
			url: '/Orden/GetInsumos/Orden/' + {/literal} {$data.Id} {literal} + '/Insumo/' + insumo + '/Accion/' + action,
			dataType: "text/html",
			success: function(html){
				//$(html).insertAfter("#docenteLabel");
				$("#insumos").html(html);
			}

		});
	}
	
	return;
}

function generarOrdenDeCompra(InsumoId)
{
	if(InsumoId)
	{
		// advertencia
		/*
		$("#dialog-confirm").dialog({
			resizable: false,
			height:140,
			modal: true,
			buttons: {
				'Delete all items': function() {
					$(this).dialog('close');
				},
				Cancel: function() {
					$(this).dialog('close');
				}
			}
		});
		*/
		var response	=	confirm('Esta seguro que desea generar una orden de compra?')
		
		if(response)
		{
			// abrir venta y generar orden
			window.open(	'/OrdenCompra/GenerarOrden/InsumoId/' + InsumoId, 
													'windowname1', 
													'width=980, height=700, scrollbars = yes');
		}
		
		
	}
}
/*
function reload()
{
	//window.location.reload();
	$('#FrmEdit').submit();
}
*/
</script>
{/literal}

<a class="linkSendHome linkSendHomeEdit" href="/Orden/List/order/PrioridadId_DESC">&laquo; Volver al listado</a>

<h1>{if $data.Id}Editar{else}Nueva{/if} Orden de trabajo &raquo; <span>{$data.Id}</span></h1>

{foreach from=$HistorialEstados item="he"}
                        <p>> {$he.OrdenEstado.Nombre} ></p>
                    {/foreach}
                    
<form id="FrmEdit" enctype="multipart/form-data" action="" method="post">
    <input type="hidden" name="data[Id]" value="{$data.Id}" id="OrdenDeTrabajo"/>
   
    <input type="hidden" name="data[Status]" id="stateValue" value="{if $data.Id}{$data.Status}{else}1{/if}" />
    

        

    <div class="form">
        {include file="Backend/Orden/ColumnForm.tpl"}
            
        {if $editSuccessMessage}
            <p class="success" style="width:61%;">{$editSuccessMessage}</p>
        {elseif $editErrorMessage}
            <p class="error" style="width:61%;">{$editErrorMessage}</p>
            {/if}
            
            {if $exception}
            <p class="error" style="width:61%;">{$exception}</p>
            {/if}
            
            {if $popupsubmit}
            	<script>reload();</script>
            {/if}
            
           
           
            <div class="contentEditor"> <!-- formulario de edicion de contenido -->
			            <div class="productsEditorContent">
			            
		    <a id="detalle">Detalle</a>
		    {if !$IsPerfilVentas}
           	<a id="mostrarinsumos">Insumos</a>
           	{/if}
           	<a id="mostrarventas">Venta</a>
                   
		            
            <table width="100%"  border="0" cellspacing="0">
              <tr>
              	
                <td><table width="100%"  border="0" cellspacing="0">
                  <tr>
                    <td>                <div class="contentTitles" id="">
                    <label class="blue">Cliente</label>       
                    <select name="data[ClienteId]" class="required">
                        <option value="">Seleccionar</option>
                        {foreach from=$Clientes item="t"}
                        <option value="{$t.Id}" {if $t.Id eq $data.ClienteId}selected="selected"{/if}>{$t.Nombre}</option>
                        {/foreach}
                    </select>
                </div> <!-- /contentTitles -->  
                </td>
                    <td>                <div class="contentTitles">
                    <label class="blue">Producto</label>
                    <input id="producto" type="text" class="required" name="data[Producto]" value="{$data.Producto}">
                </div> <!-- /contentTitles --></td>
                    <td>         
                <div class="contentTitles">
                    <label class="blue">Cantidad</label>
                    <input type="text" class="number" name="data[Cantidad]" value="{$data.Cantidad}">
                </div> <!-- /contentTitles --></td>
                  </tr>
                </table></td>
              </tr>
              <tr>
                <td><div class="contentTitles general" style="display: none">
                    <div align="center">
                      <label class="blue">Descripcion de trabajo</label>
                      <textarea name="data[DescripcionDeTrabajo]" cols="45" rows="5" class="required" id="descripciondetrabajo">{if $data.DescripcionDeTrabajo}{$data.DescripcionDeTrabajo}{else}Formato:
Material:
Colores:
Terminacion:{/if}</textarea>
                    </div>
                </div> 
                  <div align="center">
                    <!-- /contentTitles -->  
                </div></td>
              </tr>
              <tr>
                <td>
                       
				<table width="100%"  border="0" cellspacing="0"  class="general" style="display: none">
  <tr>
    <td><div class="contentTitles">
                    <label class="blue">Fecha de inicio</label>
                    <input type="text" class="required date" id="fechaInicio" name="data[FechaInicio]" value="{$data.FechaInicio}">
					<label for="fechaInicio" generated="true" class="error" style="display:none;"></label>
					
                </div> <!-- /contentTitles -->
    </td>
    <td>                <div class="contentTitles">
                    <label class="blue">Fecha de proximo cambio de estado (estimada)</label>
                    <input type="text" class="required date" id="fechaEntrega" name="data[FechaEntrega]" value="{$data.FechaEntrega}">
					<label for="fechaEntrega" generated="true" class="error" style="display:none;"></label>
                </div> <!-- /contentTitles --></td>
    <td>				                <div class="contentTitles">
                    <label class="blue">Fecha de finalizacion</label>
                    <input type="text" class="date" id="fechaFin" name="data[FechaFin]" value="{$data.FechaFin}">
					<label for="fechaFin" generated="true" class="error" style="display:none;"></label>	
                </div> <!-- /contentTitles --> </td>
    <td>
</td>
  </tr>
</table>
</td>
              </tr>
              <tr>
                <td>
				<table width="100%"  border="0" cellspacing="0" class="general" style="display: none">
  <tr>
    <td>                <div class="contentTitles" id="">
                    <label class="blue">Estado</label>       
                    <select name="data[EstadoId]" class="required">
                        <option value="">Seleccionar</option>
                        {foreach from=$Estados item="t"}
                        <option value="{$t.Id}" {if $t.Id eq $data.EstadoId}selected="selected"{elseif (!$data.Id) and ($t.Id == 0)}selected="selected"{/if}>{$t.Nombre}</option>
                        {/foreach}
                    </select>
                </div> <!-- /contentTitles -->   </td>
    <td>				<div class="contentTitles" id="">
                    <label class="blue">Prioridad</label>       
                    <select name="data[PrioridadId]" class="number">
                        <option value="">Seleccionar</option>
                        {foreach from=$Prioridades item="p"}
                        <option value="{$p.Id}" {if $p.Id eq $data.PrioridadId}selected="selected"{/if}>{$p.Nombre}</option>
                        {/foreach}
                    </select>
                </div> <!-- /contentTitles --></td>
    <td>            
                <div class="contentTitles">
                    <label class="blue">Tiempo estimado</label>
                    <p>Dias estimados de duracion (incluir sab,dom,feriado)</p>
                    <input type="text" class="number" id="" name="data[TiempoEstimado]" value="{$data.TiempoEstimado}">	
                </div> <!-- /contentTitles -->
    </td>
  </tr>
</table>                
                <div class="contentTitles general" style="display: none">
                    <label class="blue">Comentario de prioridad</label>
                    <textarea name="data[PrioridadComentario]" cols="45" rows="5" class="">{$data.PrioridadComentario}</textarea>
                </div> <!-- /contentTitles --> 
                
</td>
              </tr>
              
              <tr>
                <td>
                <div class="contentTitles">    
                {if !$IsPerfilVentas}
                 	<div id="insumos" class="" style="display: none">
                 	
                 		<!-- aca se insertan los insumos por ajax -->
                 		
                 	</div> <!-- end div insumos -->
                {/if}
                 </div> <!-- /contentTitles --> 
                </td>
              </tr>
              <tr>
                <td>
                {if $IsPerfilAdministrador or $IsPerfilVentas}
	                <table width="100%"  border="0" cellspacing="0" class="ventas" style="display: none">
					  <tr>
					    <td><div class="contentTitles">
					                    <label class="blue">Precio de venta sin IVA</label>
					                    <input type="text" class="number" id="totalSinIva" name="data[TotalSinIva]" value="{$data.TotalSinIva}">
					                </div> <!-- /contentTitles --></td>
					    <td>
					    
					    {if $data.Id}
					                <div class="contInputs" >
							            <div class="buttonsCont" style="clear: left;">
											<input type="" value="Presupuestar" id={$data.Id} presupuesto="{$data.PresupuestoId}" class="btDark Presupuestar" title="Ver el formulario para crear un presupuesto" />
							            </div>
									</div>
						{/if}                
					    </td>
					    <td>
					    
						</td>
					</td>
					  </tr>
					</table>        
				{/if}
			</td>
              </tr>
              <tr>
                <td>
				        
              </tr>
              <tr>
                <td>
				<table width="100%"  border="0" cellspacing="0"  class="ventas" style="display: none">
  <tr>
    <td>                <div class="contentTitles">
                    <label class="blue">Lugar de Entrega</label>
                    <input type="text" class="" name="data[LugarDeEntrega]" value="{$data.LugarDeEntrega}">
                </div> <!-- /contentTitles -->
                
				
				</td>
    <td><div class="contentTitles">
                    <label class="blue">Condicion de cobro</label>
                    
                    <input class="check" type="radio" name="data[CondicionDeCobro]" value="B" {if 'B' eq $data.CondicionDeCobro}checked="checked"{/if}/>
                    <label class="check blue">Blanco</label>
                    <input class="check" type="radio" name="data[CondicionDeCobro]" value="N" {if 'N' eq $data.CondicionDeCobro}checked="checked"{/if}/>
                    <label class="check blue">Negro</label>
                </div> <!-- /contentTitles --></td>
  </tr>
  
</table>

				</td>
              </tr>
			  
			  <tr>
 
				<div class="contInputs" >
				
				</div>
			  </tr>
            </table>

				<div class="contentTitles ventas" style="display: none">
                    <label class="blue">Observaciones</label>
                    <textarea name="data[Observaciones]" cols="45" rows="5" class="">{$data.Observaciones}</textarea>
                </div> <!-- /contentTitles -->
                                                
            </div> <!-- /productsEditorContent -->
        </div>  <!-- /contentEditor -->
    </div> <!-- /form -->

</form>