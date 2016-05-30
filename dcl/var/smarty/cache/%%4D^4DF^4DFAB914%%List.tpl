593
a:4:{s:8:"template";a:10:{s:24:"Backend/Layouts/List.tpl";b:1;s:34:"Backend/Layouts/Include/Header.tpl";b:1;s:35:"Backend/Layouts/Include/SubMenu.tpl";b:1;s:32:"Backend/Layouts/Include/Menu.tpl";b:1;s:38:"Backend/Layouts/Include/SiteHeader.tpl";b:1;s:45:"Backend/Orden/ListPreproduccion/FilterBox.tpl";b:1;s:37:"Backend/Layouts/Include/Paginator.tpl";b:1;s:41:"Backend/Orden/ListPreproduccion/Title.tpl";b:1;s:42:"Backend/Orden/ListPreproduccion/Record.tpl";b:1;s:34:"Backend/Layouts/Include/Footer.tpl";b:1;}s:9:"timestamp";i:1411142774;s:7:"expires";i:1411142774;s:13:"cache_serials";a:0:{}}<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>	
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
	<title>DCL Group | Administrador de contenidos</title>

	<link rel="shortcut icon" href="/images/favicon.ico"/>
	
	<!-- master page and structure styles -->
    <link href="/styles/structure.css" rel="stylesheet" type="text/css" />
    <link href="/styles/styles.css" rel="stylesheet" type="text/css" />

    <!-- jQuery 1.4 -->
	<script type="text/javascript" src="/scripts/jquery/jquery-1.4.2.js"></script>
	<script type="text/javascript" src="/scripts/jquery/jquery.validate.js"></script>
	<script type="text/javascript" src="/scripts/jquery/messages_es.js"></script>
	<script type="text/javascript" src="/scripts/lightbox.js"></script>
	<!-- div que flota @see Edit view botonera -->
	<script type="text/javascript" src="/scripts/jquery/jquery.floatobject-1.4.js"></script>

	<!-- jQuery UI 1.8 -->
	<!-- autocomplete -->
	<script type="text/javascript" src="/scripts/jquery/jquery-ui-1_8_4_custom_min.js"></script>
	<link type="text/css" href="/styles/jquery-ui-1.8.2.custom.css" rel="Stylesheet" />
	
	<!-- funciones javascript -->
	<script type="text/javascript" src="/scripts/setParentValue.js"></script> <!-- se usa en los seleccionar -->   
	
</head><body>
    
    <div id="Container">
            
        

<script>

$(document).ready(function(){

	makeEditMenuFloat();

});

function makeEditMenuFloat()
{
	var pathname = window.location.pathname;

	var hash = pathname.split('/');
	// accion
	var Accion	=	hash[2];
	// controlador
	var ControllerName	=	hash[1];

	if((Accion	==	'Edit') || (Accion == 'ClasificarAtencionMedica')|| (Accion == 'Atender'))
	{
		// hacer que el menu sea flotante en todas las 
		// ediciones menos en diagnostico
		if(ControllerName != 'PrestacionDiagnostico')
		$(".formButtons").makeFloat();
	}
}

</script>


    <div id="Header" class="">
    
        <div class="headerOptions">
            <ul>
            	<li>
                	<input type="button" title="Cerrar sesi&oacute;n" class="btLogout" value="Cerrar sesi&oacute;n" onclick="window.location='/Default/Salir'" />
                </li>
                <li>
                    <a href="/Default/Start" title="Usuario registrado">fer</a>
                </li>
            </ul>
        </div><!-- /headerOptions -->
        
        <div class="headerLogo">
        
            <p href="#" title="Logo"><img src="/images/logo.png" alt="Logo" /></p>
            <h1>DCL Group</h1>
            
            <!-- <a href="#"><img src="/images/icons/bookmark.gif" alt="Agregar a favoritos" title="Agregar a favoritos"/></a> -->
                
        
        </div> <!-- /headerLogo -->
        
        <div id="Menu">
    <ul>
                <li>
            <a  href="/Orden/List/order/Id_DESC" title="Ordenes">Ordenes</a>
        </li>
                <li>
            <a  href="/Proveedor/List" title="Proveedores">Proveedores</a>
        </li>
                <li>
            <a  href="/Cliente/List" title="Clientes">Clientes</a>
        </li>
                <li>
            <a  href="/Orden/ListCotizaciones" title="Cotizaciones">Cotizaciones</a>
        </li>
                <li>
            <a class="active" href="/Orden/ListPreproduccion" title="Preproduccion">Preproduccion</a>
        </li>
                <li>
            <a  href="/Orden/ListProduccion" title="Produccion">Produccion</a>
        </li>
                <li>
            <a  href="/Insumo/ListEntregasProduccion" title="Entregas">Entregas</a>
        </li>
            </ul>
</div> <!-- /Menu -->

<div class="subMenu">
    <ul>
            </ul>
</div>
    </div> <!-- /Header -->            
        <script type="text/javascript" src="/scripts/List.js"></script>
            
        <div id="Content">
            <div class="listado">
                <h1>Ordenes de trabajo pendientes para produccion</h1>
                <a href="/Orden/ListPreproduccion/page/1/" class="linkSendHome"><img src="/images/icons/table_refresh.png" title="Volver a ver el listado completo"/> Limpiar Busqueda &raquo;</a>
                                
                
                            
            <form id="frmAction" action="" method="post">
                                    <!-- date picker -->
<link type="text/css" href="/styles/ui-lightness/jquery-ui-1.8.2.custom.css" rel="stylesheet" />
<script type="text/javascript" src="/scripts/jquery/jquery.ui.datepicker.js"></script>
<script type="text/javascript" src="/scripts/jquery/jquery.ui.core.js"></script>
<script type="text/javascript" src="/scripts/jquery/jquery.ui.widget.js"></script>

<!-- dialog -->
<script type="text/javascript" src="/scripts/jquery/jquery-ui-1.8.4.custom.min.js"></script>
<!-- dialog -->


<script type="text/javascript">
$(document).ready(function(){

	$('.AprobarPresupuesto').click(function(){
        var presupuestoid = $(this).attr('presupuestoid');
        
        VerReglasAprobacion(presupuestoid);
		//AprobarPresupuesto(presupuestoid);
		return false;
    });
    
	$('.VerOrdenDeTrabajo').click(function() {
        
        var url 		= $(this).attr('href');
        var opciones="toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=yes, width=1000, height=700, top=85, left=140";

		abrirPopUp(url, opciones);

		return false;
    });

	$('.Presupuestar').click(function(){
        var ordenid	= $(this).attr('id');
        var presupuestoid	= $(this).attr('presupuesto');		
        Presupuestar(ordenid, presupuestoid);
        
        return false;
    });

	
    $('.VerUltimas').click(function(){
        var url	=	'/Orden/ListCotizaciones/order/Id_DESC/popup/true';
        
		window.location = url;
		
    });

    $('.VerComentario').click(function(){
        var comentarioid = $(this).attr('id');
        
		VerComentario("dialog_"+comentarioid);
		
    });
    
    $('#FechaDesde').datepicker({
		changeMonth: true,
		changeYear: true,
        dateFormat: 'dd/mm/yy'
	});
    
    $('#FechaHasta').datepicker({
		changeMonth: true,
		changeYear: true,
        dateFormat: 'dd/mm/yy'
	});
    
    $("#NombreCliente").blur(function(){
        if( $(this).val() == '' )
            $(this).val( $(this).attr("defaultValue") );
    });

    $("#NombreCliente").focus(function(){
        if( $(this).val() == $(this).attr("defaultValue"))
            $(this).val('');
    });

    $("#inicio").blur(function(){
        if( $(this).val() == '' )
            $(this).val( $(this).attr("defaultValue") );
    });

    $("#inicio").focus(function(){
        if( $(this).val() == $(this).attr("defaultValue"))
            $(this).val('');
    });

    $("#fin").blur(function(){
        if( $(this).val() == '' )
            $(this).val( $(this).attr("defaultValue") );
    });

    $("#fin").focus(function(){
        if( $(this).val() == $(this).attr("defaultValue"))
            $(this).val('');
    });
});

function Presupuestar(OrdenId, PresupuestoId)
{
	if(OrdenId > 0)
	{
		var url	=	'/Presupuesto/Edit/popup/true/OrdenId/' + OrdenId;

		if(PresupuestoId > 0)
			url	=	url + '/id/' + PresupuestoId;
	    
		var opciones="toolbar=no, location=no, directories=no, status=no, menubar=yes, scrollbars=yes, resizable=yes, width=1000, height=700, top=85, left=140";
	
		abrirPopUp(url, opciones);        
	}
	else
		alert('El numero de orden no es correcto');
}

function AprobarPresupuesto(presupuestoid)
{
	if(presupuestoid > 0)
	{
		var url	=	'/Presupuesto/Aprobar/PresupuestoId/' + presupuestoid;

		window.location = url;
        
	}
	else
		alert('El numero de presupuesto no es correcto');	
}

function abrirPopUp(pagina, opciones)
{
	// agregar /popup/true y por get el un helper setea
	window.open(pagina,"",opciones);
}
function reload()
{
	//window.location.reload();
	$('#frmAction').submit();
}
function VerComentario(comentarioid)
{
	var id = "#"+comentarioid;
	
	$(id).dialog({
		resizable: true,
		height:200,
		width: 400, 
		modal: true,
		buttons: {
			'Aceptar': function() {
				$(this).dialog('close');
			}
		}
	});
}

function VerReglasAprobacion(presupuestoid)
{
	if(presupuestoid > 0)
	{
		$('#reglas_aprobacion').dialog({
			resizable: true,
			height:200,
			width: 400, 
			modal: true,
			buttons: {
				'Aceptar': function() {
					AprobarPresupuesto(presupuestoid)
					$(this).dialog('close')
				},
				'Cancelar': function() {
					$(this).dialog('close');
				}
			}
		});
	}
	else
		alert('Error: No existe el presupuesto ingresado');
}

</script>


<!-- dialog confirm -->
	<div id="reglas_aprobacion" title="Reglas para aprobar presupuesto" style="display:none">
	
		<h2>Si acepta la orden pasara a estado "Aprobado"</h2>
		<p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 40px 40px 0;"></span>	
			<ul>
				<li>Verificar fechas comprometidas con los proveedores</li>
				<li>Verificar si es un proyecto que requiera anticipo</li>
				<li>Verificar conformidad de cliente via email</li>
				<li>Verificar firma de prototipo</li>
			</ul>
			
		</p>
	</div>

	        <div class="selectFile" style="clear: left;">
	
		<table height="80" width="60%"  border="0">
  <tr>
    <td width="30%">
	
	<div class="contInputs">
    
    <table width=""  border="0" cellspacing="0">
	  <tr>
	    <td rowspan="2">  <img src="/images/icons/date.png" alt="Ordenes" title="Seleccionar intervalo de ordenes detrabajo"/></td>
	    <td><input type="text" value="Orden inicial" name="filters[OrdenDeTrabajoIdInicio]" id="inicio"/></td>
	  </tr>
	  <tr>
	    <td><input type="text" value="Orden final" name="filters[OrdenDeTrabajoIdFinal]" id="fin"/></td>
	  </tr>
	</table>
    
    
    
</td>
    <td width="30%">
	
	<div class="contInputs">
		<table width=""  border="0" cellspacing="0">
			  <tr>
			    <td rowspan="3">
			    	<img src="/images/icons/layout_edit.png" alt="Cliente" title="Ingresar nombre del cliente"/>
			    </td>
			    <td>
		
		      
			    </td>
			  </tr>
			  <tr>
			    <td>
				  
		        <input type="text" value="Nombre cliente" name="filters[NombreCliente]" id="NombreCliente"/>
		        
		      
		
				</td>
			  </tr>
			  <tr>
			    <td>
			    
			    </td>
			    </tr>
			</table>
    </div>
	
</td>
    
        <td width="30%">
        
			<h2><img src="/images/icons/bullet_go.png" alt="item" title="Item"/> Cantidad de ordenes encontradas: 3</h2>
        </td>
  </tr>
  <tr>
    <td width="20%">
    	<!-- 
    	<input type="reset" value="Ver ultimas" class="btDark VerUltimas" title="Ver ultimas ordenes" />
    	 -->
    </td>
    <td width="20%"><div class="contInputs" >
					
		            <div class="buttonsCont" style="clear: left;">
						<input type="submit" id="buscar" value="Buscar" class="btDark" title="Buscar" />
						
						
		            </div>
		            
				</div></td>
	<td width="20%">
	
	
	</td>
			       	
  </tr>
</table>
			
<h2>Ordenes de trabajo en estado Presupuestado o Aprobado</h2>
<p><img src="/images/icons/bullet_go.png" alt="item" title="Item"/> Una orden de trabajo sale del listado generando una orden de compra porque el estado cambia a "Produccion"</p>
		       	
			<div id="Message">
								</div>	
				
            </div>                                    
                            <div class="listPaginador">
            
               <ul class="paginadorOptions">
                  <li>
                      <span>Seleccionados:</span>
                  </li>
                  <li>
                      <a href="#" class="print"><img src="/images/icons/printer.png" title="Imprimir pagina"/> Imprimir</a> 
                  </li>
                  <li>
                      <a href="#" class="delete"><img src="/images/icons/page_delete.png" title="Eliminar elementos seleccionados"/> Eliminar</a>
                  </li>
               </ul> <!-- /paginadorOptions -->
                
               <div class="paginadorCant">
                  <p>Mostrar 
                     <a href="/Orden/ListPreproduccion/EstadoOrdenTrabajoId//pagesize/15/page/1" >15</a> | 
                     <a href="/Orden/ListPreproduccion/EstadoOrdenTrabajoId//pagesize/50/page/1" class="active">50</a> | 
                     <a href="/Orden/ListPreproduccion/EstadoOrdenTrabajoId//pagesize/100/page/1" >100</a>
                  </p>
               </div> <!-- /paginadorCant -->
                
               <div class="paginadorGoTo">
                  <input type="text" class="goTo" value="Ir a pag." />
                  <input type="hidden" class="goToPage" value="/Orden/ListPreproduccion/EstadoOrdenTrabajoId//pagesize/50/page/GOTO" />
                  <input type="button" class="btText" id="goToPage" value="Ir &raquo;" title="Ir &raquo;" />
               </div> <!-- /paginadorCant -->
               
               <ul class="paginadorPages">
                  <li>
                     <a href="/Orden/ListPreproduccion/EstadoOrdenTrabajoId//pagesize/50/page/1" title="Primera">&laquo; Primera</a>
                  </li>
                  <li>
                     <a href="/Orden/ListPreproduccion/EstadoOrdenTrabajoId//pagesize/50/page/1" title="Anterior">Anterior</a>
                  </li>
                  <li>
                                             <a href="/Orden/ListPreproduccion/EstadoOrdenTrabajoId//pagesize/50/page/1" title="PÃ¡gina 1" class="active">1</a>
                                       </li>
                  <li>
                     <a href="/Orden/ListPreproduccion/EstadoOrdenTrabajoId//pagesize/50/page/1" title="Siguiente">Siguiente</a>
                  </li>
                  <li>
                     <a href="/Orden/ListPreproduccion/EstadoOrdenTrabajoId//pagesize/50/page/1" title="Ãšltima">Ultima &raquo;</a>
                  </li>
               </ul> <!-- /paginadorOptions -->
            
            </div> <!-- /listPaginador -->                    
                <div class="list">
                                            
                                            
                                <div class="listTop">
                <div>
                    <table border="0" cellpadding="0" cellspacing="0">
                        <tr>
                            <td width="2%"><input type="checkbox" class="check" id="check_all" /></td>
                            
                            <td width="5%"><a href="/Orden/ListPreproduccion/EstadoOrdenTrabajoId//pagesize/50/page/1/order/Id_DESC" class="orderNone" title="Numero">Numero</a></td>
                            
                            <td width="10%"><p href="/Orden/ListPreproduccion/EstadoOrdenTrabajoId//pagesize/50/page/1/order/Producto_DESC" class="orderNone" title="Producto">Producto</p></td>
                            <td width="10%"><p href="/Orden/ListPreproduccion/EstadoOrdenTrabajoId//pagesize/50/page/1/order/o.Cliente.Nombre_DESC" class="orderNone" title="Nombre cliente">Nombre cliente</p></td>
                            <td width="10%"><p href="/Orden/ListPreproduccion/EstadoOrdenTrabajoId//pagesize/50/page/1/order/o.Estado.Nombre_DESC" class="orderNone" title="Estado">Estado</p></td>
                            <td width="10%"><p href="/Orden/ListPreproduccion/EstadoOrdenTrabajoId//pagesize/50/page/1/order/o.DiasProximoCambioEstado_DESC" class="orderNone" title="">Finalizacion</p></td>
                            
                            <td width="10%"><p href="/Orden/ListPreproduccion/EstadoOrdenTrabajoId//pagesize/50/page/1/order/PrioridadId_DESC" class="orderNone" title="Prioridad">Prioridad</p></td>
                            <td width="12%"><p href="/Orden/ListPreproduccion/EstadoOrdenTrabajoId//pagesize/50/page/1/order/DescripcionDeTrabajo_DESC" class="orderNone" title="Descripcion">Descripcion</p></td>
                              
                            
                            <td width="8%"><p>Opciones</p></td>
                        </tr>
                    </table>
                </div>
            </div> <!-- /listadoTop -->                        
                    <div class="listItems">
                        <table border="0" cellpadding="0" cellspacing="0">
                                                                                                                                        <!-- item -->
                    <tr >
                        <td width="2%"><input type="checkbox" class="check" name="selectId[]" value="3691" /></td>
                        <td width="5%"><a href="/Orden/Edit/id/3691">3691</a></td>
                        <td width="10%"><a href="/Orden/Edit/id/3691">Pack 1</a></td>
                        <td width="10%"><a href="/Orden/Edit/id/3691">Q4 MKT</a></td>
                        <td width="10%"><a href="/Orden/Edit/id/3691">Presupuestado<br></a></td>
                        <td width="10%"><a href="/Orden/Edit/id/3691" title=""><img src="/images/icons/exclamation.png" title="Debe ingresar la fecha de finalizacion en la orden de trabajo"/></a></td>
                        
                        
                        <td width="10%">
                        <!--  @see Filterbox.tpl para definicion de clase CambiarPrioridad -->
                        	<select title="No tiene comentario" href="/Orden/SetPrioridad/OrdenId/3691" class="CambiarPrioridad" id="Prioridad__">
		                        <option value="">Seleccionar</option>
		                        		                        <option value="1" >Preproyecto</option>
		                        
		                        		                        <option value="2" >Media</option>
		                        
		                        		                        <option value="3" >Ventas</option>
		                        
		                        		                    </select>
		                
                        </td>
                        
                        <td width="12%">
                        	<a class="VerComentario" id="comentario_3691" title="Formato: 20cm x 20cm x 4 cm 
Material: Cartulina Dx 295 gr / PVC cristal, 
Colores: Full Color 4/0 (base y tapa) - Interiores sin impresión
Terminacion: Laminación brillante 
Armado de 2000 unidades y pegado de los visores del total de las unidades">Leer descripcion</a>
                        	<!-- dialog confirm -->
							<div id="dialog_comentario_3691" title="Descripcion de la orden de trabajo" style="display:none">
								<p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 40px 40px 0;"></span>
									Formato: 20cm x 20cm x 4 cm <br />
Material: Cartulina Dx 295 gr / PVC cristal, <br />
Colores: Full Color 4/0 (base y tapa) - Interiores sin impresión<br />
Terminacion: Laminación brillante <br />
Armado de 2000 unidades y pegado de los visores del total de las unidades
								</p>
							</div>
                        </td>
                        
                        <td width="8%" align="center">
                            
                            <a type="button" class="btEdit VerOrdenDeTrabajo" title="Editar orden de trabajo" href="/Orden/Edit/id/3691/popup/true" /><img src="/images/icons/layout_edit.png" title="Ver presupuesto"/> Editar OT</a>
                            
                                                        <br><a title="Ver el formulario del presupuesto" class="Presupuestar" id=3691 presupuesto="362"><img src="/images/icons/layout_edit.png" title="Ver presupuesto"/> Ver presupuesto</a>
                            
                             
                            <br><a title="Aprobar presupuesto" class="AprobarPresupuesto" id=3691 presupuestoid="362"><img src="/images/icons/error.png" title="Aprobar presupuesto"/> Aprobar presupuesto</a>
                                                        
                                                    </td>
                    </tr>
                    <!-- /item -->                                                                                                                <!-- item -->
                    <tr  class="gray">
                        <td width="2%"><input type="checkbox" class="check" name="selectId[]" value="3692" /></td>
                        <td width="5%"><a href="/Orden/Edit/id/3692">3692</a></td>
                        <td width="10%"><a href="/Orden/Edit/id/3692">Pack 2</a></td>
                        <td width="10%"><a href="/Orden/Edit/id/3692">Q4 MKT</a></td>
                        <td width="10%"><a href="/Orden/Edit/id/3692">Presupuestado<br></a></td>
                        <td width="10%"><a href="/Orden/Edit/id/3692" title=""><img src="/images/icons/exclamation.png" title="Debe ingresar la fecha de finalizacion en la orden de trabajo"/></a></td>
                        
                        
                        <td width="10%">
                        <!--  @see Filterbox.tpl para definicion de clase CambiarPrioridad -->
                        	<select title="No tiene comentario" href="/Orden/SetPrioridad/OrdenId/3692" class="CambiarPrioridad" id="Prioridad__">
		                        <option value="">Seleccionar</option>
		                        		                        <option value="1" >Preproyecto</option>
		                        
		                        		                        <option value="2" >Media</option>
		                        
		                        		                        <option value="3" >Ventas</option>
		                        
		                        		                    </select>
		                
                        </td>
                        
                        <td width="12%">
                        	<a class="VerComentario" id="comentario_3692" title="Formato: 15cm x 15cm x 4 cm 
Material: Cartulina Dx 295 gr / PVC cristal, 
Colores: Full Color 4/0 (base y tapa) - Interiores sin impresión
Terminacion: Laminación brillante 
Armado de 2000 unidades y pegado de los visores del total de las unidades">Leer descripcion</a>
                        	<!-- dialog confirm -->
							<div id="dialog_comentario_3692" title="Descripcion de la orden de trabajo" style="display:none">
								<p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 40px 40px 0;"></span>
									Formato: 15cm x 15cm x 4 cm <br />
Material: Cartulina Dx 295 gr / PVC cristal, <br />
Colores: Full Color 4/0 (base y tapa) - Interiores sin impresión<br />
Terminacion: Laminación brillante <br />
Armado de 2000 unidades y pegado de los visores del total de las unidades
								</p>
							</div>
                        </td>
                        
                        <td width="8%" align="center">
                            
                            <a type="button" class="btEdit VerOrdenDeTrabajo" title="Editar orden de trabajo" href="/Orden/Edit/id/3692/popup/true" /><img src="/images/icons/layout_edit.png" title="Ver presupuesto"/> Editar OT</a>
                            
                                                        <br><a title="Ver el formulario del presupuesto" class="Presupuestar" id=3692 presupuesto="361"><img src="/images/icons/layout_edit.png" title="Ver presupuesto"/> Ver presupuesto</a>
                            
                             
                            <br><a title="Aprobar presupuesto" class="AprobarPresupuesto" id=3692 presupuestoid="361"><img src="/images/icons/error.png" title="Aprobar presupuesto"/> Aprobar presupuesto</a>
                                                        
                                                    </td>
                    </tr>
                    <!-- /item -->                                                                                                                <!-- item -->
                    <tr >
                        <td width="2%"><input type="checkbox" class="check" name="selectId[]" value="3693" /></td>
                        <td width="5%"><a href="/Orden/Edit/id/3693">3693</a></td>
                        <td width="10%"><a href="/Orden/Edit/id/3693">Pack 3</a></td>
                        <td width="10%"><a href="/Orden/Edit/id/3693">Q4 MKT</a></td>
                        <td width="10%"><a href="/Orden/Edit/id/3693">Presupuestado<br></a></td>
                        <td width="10%"><a href="/Orden/Edit/id/3693" title=""><img src="/images/icons/exclamation.png" title="Debe ingresar la fecha de finalizacion en la orden de trabajo"/></a></td>
                        
                        
                        <td width="10%">
                        <!--  @see Filterbox.tpl para definicion de clase CambiarPrioridad -->
                        	<select title="No tiene comentario" href="/Orden/SetPrioridad/OrdenId/3693" class="CambiarPrioridad" id="Prioridad__">
		                        <option value="">Seleccionar</option>
		                        		                        <option value="1" >Preproyecto</option>
		                        
		                        		                        <option value="2" >Media</option>
		                        
		                        		                        <option value="3" >Ventas</option>
		                        
		                        		                    </select>
		                
                        </td>
                        
                        <td width="12%">
                        	<a class="VerComentario" id="comentario_3693" title="Formato: 12cm x 12cm x 4 cm 
Material: Cartulina Dx 295 gr / PVC cristal, 
Colores: Full Color 4/0 (base y tapa)  interiores sin impresión
Terminacion: Laminación brillante
Armado de 2000 unidades y pegado de los visores del total de las unidades">Leer descripcion</a>
                        	<!-- dialog confirm -->
							<div id="dialog_comentario_3693" title="Descripcion de la orden de trabajo" style="display:none">
								<p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 40px 40px 0;"></span>
									Formato: 12cm x 12cm x 4 cm <br />
Material: Cartulina Dx 295 gr / PVC cristal, <br />
Colores: Full Color 4/0 (base y tapa)  interiores sin impresión<br />
Terminacion: Laminación brillante<br />
Armado de 2000 unidades y pegado de los visores del total de las unidades
								</p>
							</div>
                        </td>
                        
                        <td width="8%" align="center">
                            
                            <a type="button" class="btEdit VerOrdenDeTrabajo" title="Editar orden de trabajo" href="/Orden/Edit/id/3693/popup/true" /><img src="/images/icons/layout_edit.png" title="Ver presupuesto"/> Editar OT</a>
                            
                                                        <br><a title="Ver el formulario del presupuesto" class="Presupuestar" id=3693 presupuesto="360"><img src="/images/icons/layout_edit.png" title="Ver presupuesto"/> Ver presupuesto</a>
                            
                             
                            <br><a title="Aprobar presupuesto" class="AprobarPresupuesto" id=3693 presupuestoid="360"><img src="/images/icons/error.png" title="Aprobar presupuesto"/> Aprobar presupuesto</a>
                                                        
                                                    </td>
                    </tr>
                    <!-- /item -->                                                                            </table>
                    </div> <!-- /listItems -->
                        
                </div> <!-- /list -->
                
                    
                            <div class="listPaginador">
            
               <ul class="paginadorOptions">
                  <li>
                      <span>Seleccionados:</span>
                  </li>
                  <li>
                      <a href="#" class="print"><img src="/images/icons/printer.png" title="Imprimir pagina"/> Imprimir</a> 
                  </li>
                  <li>
                      <a href="#" class="delete"><img src="/images/icons/page_delete.png" title="Eliminar elementos seleccionados"/> Eliminar</a>
                  </li>
               </ul> <!-- /paginadorOptions -->
                
               <div class="paginadorCant">
                  <p>Mostrar 
                     <a href="/Orden/ListPreproduccion/EstadoOrdenTrabajoId//pagesize/15/page/1" >15</a> | 
                     <a href="/Orden/ListPreproduccion/EstadoOrdenTrabajoId//pagesize/50/page/1" class="active">50</a> | 
                     <a href="/Orden/ListPreproduccion/EstadoOrdenTrabajoId//pagesize/100/page/1" >100</a>
                  </p>
               </div> <!-- /paginadorCant -->
                
               <div class="paginadorGoTo">
                  <input type="text" class="goTo" value="Ir a pag." />
                  <input type="hidden" class="goToPage" value="/Orden/ListPreproduccion/EstadoOrdenTrabajoId//pagesize/50/page/GOTO" />
                  <input type="button" class="btText" id="goToPage" value="Ir &raquo;" title="Ir &raquo;" />
               </div> <!-- /paginadorCant -->
               
               <ul class="paginadorPages">
                  <li>
                     <a href="/Orden/ListPreproduccion/EstadoOrdenTrabajoId//pagesize/50/page/1" title="Primera">&laquo; Primera</a>
                  </li>
                  <li>
                     <a href="/Orden/ListPreproduccion/EstadoOrdenTrabajoId//pagesize/50/page/1" title="Anterior">Anterior</a>
                  </li>
                  <li>
                                             <a href="/Orden/ListPreproduccion/EstadoOrdenTrabajoId//pagesize/50/page/1" title="PÃ¡gina 1" class="active">1</a>
                                       </li>
                  <li>
                     <a href="/Orden/ListPreproduccion/EstadoOrdenTrabajoId//pagesize/50/page/1" title="Siguiente">Siguiente</a>
                  </li>
                  <li>
                     <a href="/Orden/ListPreproduccion/EstadoOrdenTrabajoId//pagesize/50/page/1" title="Ãšltima">Ultima &raquo;</a>
                  </li>
               </ul> <!-- /paginadorOptions -->
            
            </div> <!-- /listPaginador -->            <input type="hidden" name="updateNewValue" id="updateValue" value="" />
            <input type="hidden" name="postAction" id="action" value="" />
            <input type="hidden" name="listAction" id="listAction" value="list" />
            </form>                
            </div> <!-- /listado -->
        </div>
            
            <div id="Footer" class="">
    
        <img src="/images/logoSmall.png" alt="Logo" />
        <span>Administrador de contenidos</span>
        
        <a class="ids" href="mailto:matias.tokar@gmail.com" target="" title="Matias Tokar | Desarrollo Web">
        <img src="/images/body/mt_logo.png" alt="Matias Tokar | Desarrollo Web" /></a>
    
    </div> <!-- /Footer -->            
    </div> <!-- /Container -->
    
</body>
</html>