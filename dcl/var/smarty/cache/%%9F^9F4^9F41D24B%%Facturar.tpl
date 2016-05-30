154
a:4:{s:8:"template";a:1:{s:32:"Backend/Facturacion/Facturar.tpl";b:1;}s:9:"timestamp";i:1410450665;s:7:"expires";i:1410450665;s:13:"cache_serials";a:0:{}}
<!-- date picker -->
<link type="text/css" href="/styles/ui-lightness/jquery-ui-1.8.2.custom.css" rel="stylesheet" />
<script type="text/javascript" src="/scripts/jquery/jquery.ui.datepicker.js"></script>
<script type="text/javascript" src="/scripts/jquery/jquery.ui.core.js"></script>
<script type="text/javascript" src="/scripts/jquery/jquery.ui.widget.js"></script>

<script type="text/javascript" src="/scripts/Edit.js"></script>


<!-- dialog -->
<script type="text/javascript" src="/scripts/jquery/jquery-ui-1.8.4.custom.min.js"></script>
<!-- dialog -->




<script type="text/javascript">
$(document).ready(function(){
    $("#FrmEdit").validate();

	SetCliente();
	    
    $('.sumar').change(function() {
        alert(1);
        $('#total').val($('#total').val()+$(this).val());
	});
    
	$('#FrmEdit').submit(function() {

		var conf	=	$('#ConfirmacionMostrada').attr('value');
		if(conf != 'SI')
		{
			$('#MostrarConfirmacion').val('NO');
			
			$("#dialog-confirm").dialog({
				resizable: true,
				height:200,
				width: 400, 
				modal: true,
				buttons: {
					'Aceptar': function() {
						$(this).dialog('close');
						$('#FrmEdit').submit();
					},
					'Cancelar': function() {
						$(this).dialog('close');
						$('#ConfirmacionMostrada').attr('value', 'NO');
						return false;
					}
				}
			});
			// flag 
			$('#ConfirmacionMostrada').attr('value', 'SI');
			return false;
		}

  	});

    $('#FechaFactura').datepicker({
		changeMonth: true,
		changeYear: true,
        dateFormat: 'dd/mm/yy'
	});

    $('#FechaPosibleDeCobro').datepicker({
		changeMonth: true,
		changeYear: true,
        dateFormat: 'dd/mm/yy'
	});

    $('.CambiarCliente').change(function(){
    	
		var $selected 	=	$(this).find('option:selected');
		var $clienteid	=	$selected.val();
		
		if( $clienteid > 0 )
		{
			$('#mensajes').hide();
			GetOrdenesTrabajoSinFacturar($clienteid);
			$('#ClienteIdGet').attr("value", $clienteid);
		}
		else
			alert('El cliente seleccionado no es correcto');
    });
    

    $(".PrintOrdenDePago").click(function(){
        
        var url	=	'/OrdenPago/View/id/' + $(this).attr('id');
        
		var opciones="toolbar=no, location=no, directories=no, status=no, menubar=yes, scrollbars=yes, resizable=yes, width=1000, height=700, top=85, left=140";

		abrirPopUp(url, opciones);        

        return false;
    });

    $('#ComentarioImporte').change(function(){
        var importe=   $(this).attr("value");

        SumarTotal(importe);
    });

});

function SetCliente()
{
	var clienteid = $('#ClienteIdGet').attr("value");
	if(clienteid > 0)
	{
		GetOrdenesTrabajoSinFacturar(clienteid);
	}
}
function SumarTotal(importe)
{
	var total = parseFloat($('#total').val())+parseFloat(importe);
	$('#total').attr('value',total);
}

function RestarTotal(importe)
{
	var total = parseFloat($('#total').val())-parseFloat(importe);
	$('#total').attr('value',total);
}
function GetOrdenesTrabajoSinFacturar(clienteid)
{
	if(clienteid > 0)
	{
		
		$.ajax({
			type: "POST",
			url: '/Cliente/GetOrdenesDeTrabajoSinFacturar',
			dataType: "text/html",
			data: {
				'ClienteId': clienteid
			},
			success: function(html){
				$("#OrdenesDeTrabajoSinFacturar").html(html);
				
			}
	
		});

	}	
}

function reload()
{
	var url = '/Facturacion/Facturar'; 
	var clienteid = $('#ClienteIdGet').attr("value");
	if(clienteid > 0)
	{
		url = url + '/ClienteId/' + clienteid;
	}
	window.location = url;
}

function VerFactura()
{
    var url	=	'/Facturacion/FacturaImprimible/FacturaId/' + $('#FacturaId').val();
    
	var opciones="toolbar=yes, location=no, directories=no, status=no, menubar=yes, scrollbars=yes, resizable=yes, width=800, height=600, top=85, left=140";

	abrirPopUp(url, opciones);        
}
function volver()
{
	window.location	=	'/OrdenCompra/List/order/OrdenDePagoId_ASC';
}

function abrirPopUp(pagina, opciones)
{
	window.open(pagina,"",opciones);
}
</script>


<!-- dialog confirm -->
		<div id="dialog-confirm" title="Quiere crear una factura" style="display:none">
			<p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 40px 40px 0;"></span>
				Presione aceptar para crear una factura o cierre el mensaje para cancelar
			</p>
		</div>


<h1>Prefacturacion</h1>

<h2>Debe seleccionar el cliente, la fecha de factura y las ordenes que desea facturar. Opcionalmente un comentario e importe</h2>
		<input type="hidden" value="659" id="FacturaId"></input>        
      <script>VerFactura();</script>
      

        
<form id="FrmEdit" enctype="multipart/form-data" action="" method="post">
    <input type="hidden" name="data[ConfirmacionMostrada]" value="" id="ConfirmacionMostrada"/>
    <input type="hidden" name="" value="97" id="ClienteIdGet"/>  
        
    <div class="form">
        <div id="FormsColumn"> <!-- contiene toda la columna -->

		    <div class="formButtons">
		        <div class="info">
		        <input type="button" class="btMinimize btBlock" value="" title="Bloquear arriba" />
		        <!-- al clickear, que desactive el movimiento, y quede bloqueado arriba -->
		        
		        <div id="formButtonsContent">
		        
		            <ul>
		
		                <li class="buttonsTop">
		                <input type="submit" value="Facturar" class="btGray" title="Crear factura" />
		                <input type="reset" value="Volver" class="btGray" title="Volver" onclick="window.location='/GestionAdministrativa/Main/Tab/TabFacturacionPendiente'"/>
		                </li>
		            </ul>
		            
		        </div> <!-- /formButtonsContent -->
		        
		        </div> <!-- /info -->
		    </div> <!-- /formButtons -->
		
		</div> <!-- /FormsColumn -->

		

        <div id="mensajes">
                    <p class="success" style="width:61%;">11/09/2014: Factura #659 creada correctamente. <img src="/images/icons/tick.png" /></p>
            <script>//volver()</script>
                </div>
        
        
        <div class="contentEditor"> <!-- formulario de edicion de contenido -->
        
            <div class="productsEditorContent">
            
            <div class="filtersBox filtersInfoBox">
            	
                <ul>
                    <li>
						
	                    <label class="blue">Cliente</label>       
	                    <select name="ClienteId" class="required CambiarCliente" id="SeleccionarCliente">
	                        <option value="">Seleccionar</option>
	                        	                        <option value="128" >99 centavos</option>
	                        	                        <option value="9" >AACREA</option>
	                        	                        <option value="160" >Abbott </option>
	                        	                        <option value="7" >abd</option>
	                        	                        <option value="118" >Adfunky</option>
	                        	                        <option value="31" >AET</option>
	                        	                        <option value="141" >Agencia Creativa</option>
	                        	                        <option value="117" >Alejandro Amarilla</option>
	                        	                        <option value="33" >All Over</option>
	                        	                        <option value="147" >Almiron Cristian</option>
	                        	                        <option value="62" >Apehi</option>
	                        	                        <option value="32" >Astillero Geuna</option>
	                        	                        <option value="105" >Aurelia S.A.C.I.F</option>
	                        	                        <option value="139" >Banco Patagonia</option>
	                        	                        <option value="157" >Barcelona Vinos</option>
	                        	                        <option value="132" >Batanga Media</option>
	                        	                        <option value="5" >Bausch y Lomb</option>
	                        	                        <option value="134" >bepoketprint</option>
	                        	                        <option value="17" >Bermuda</option>
	                        	                        <option value="68" >biosintex</option>
	                        	                        <option value="138" >Boker Arbolito</option>
	                        	                        <option value="65" >Boston seguros</option>
	                        	                        <option value="48" >Buenos Aires Key</option>
	                        	                        <option value="52" >Cabaña Argentina</option>
	                        	                        <option value="40" >Caimanes de Formoza</option>
	                        	                        <option value="10" >calver-maldito glam</option>
	                        	                        <option value="61" >Cancilleria de Relaciones exteriores</option>
	                        	                        <option value="91" >Capo Mafia</option>
	                        	                        <option value="158" >Carlos Encargado</option>
	                        	                        <option value="41" >Casa Cesto</option>
	                        	                        <option value="159" >Cepas Argentina</option>
	                        	                        <option value="44" >Ciclismo</option>
	                        	                        <option value="2" >clona</option>
	                        	                        <option value="83" >Comercio Pet</option>
	                        	                        <option value="84" >Comision Nacional de Comunicacion</option>
	                        	                        <option value="11" >corte final</option>
	                        	                        <option value="6" >cristal depot</option>
	                        	                        <option value="143" >Cristian Almiron</option>
	                        	                        <option value="142" >Crossfit Andino</option>
	                        	                        <option value="26" >Daiu</option>
	                        	                        <option value="140" >Danone</option>
	                        	                        <option value="98" >DCL Group</option>
	                        	                        <option value="49" >DecorLine</option>
	                        	                        <option value="116" >DESCO - Gepetto</option>
	                        	                        <option value="82" >Descuento City</option>
	                        	                        <option value="155" >Diamonds</option>
	                        	                        <option value="4" >diego goria</option>
	                        	                        <option value="102" >distribuidora M & M</option>
	                        	                        <option value="81" >Distriwash</option>
	                        	                        <option value="19" >Drager</option>
	                        	                        <option value="53" >Drams</option>
	                        	                        <option value="8" >eki plus</option>
	                        	                        <option value="43" >El pollo Azul</option>
	                        	                        <option value="94" >Ergo Renova</option>
	                        	                        <option value="35" >Ernesto Automotores</option>
	                        	                        <option value="109" >Estancia La Pelada</option>
	                        	                        <option value="67" >estela do sul</option>
	                        	                        <option value="156" >Estilo Griscan</option>
	                        	                        <option value="77" >estrela do sul</option>
	                        	                        <option value="129" >Estudio edison</option>
	                        	                        <option value="162" >Estudio Grin</option>
	                        	                        <option value="57" >FilmaBonito</option>
	                        	                        <option value="136" >Full time producciones</option>
	                        	                        <option value="79" >Furia</option>
	                        	                        <option value="29" >Gaelle</option>
	                        	                        <option value="121" >Gatorade</option>
	                        	                        <option value="108" >Gerardo Towner</option>
	                        	                        <option value="18" >Geuna Boats</option>
	                        	                        <option value="73" >Gilera Ya</option>
	                        	                        <option value="93" >Glucolvil</option>
	                        	                        <option value="101" >Gotico</option>
	                        	                        <option value="120" >Guia Oleo</option>
	                        	                        <option value="135" >Gurruchaga outlet</option>
	                        	                        <option value="50" >Hathor</option>
	                        	                        <option value="1" >Havanna</option>
	                        	                        <option value="72" >Hebraica</option>
	                        	                        <option value="16" >Il Gatto</option>
	                        	                        <option value="80" >Importadora Sudamericana </option>
	                        	                        <option value="66" >Imprenta Packman</option>
	                        	                        <option value="23" >INTERDREAMERS</option>
	                        	                        <option value="59" >Iszak Hermanos</option>
	                        	                        <option value="78" >Ivecco</option>
	                        	                        <option value="96" >Jenny</option>
	                        	                        <option value="99" >Jonatan Kusnier</option>
	                        	                        <option value="15" >JyG</option>
	                        	                        <option value="37" >Kane</option>
	                        	                        <option value="58" >Kolor</option>
	                        	                        <option value="148" >Korn propiedades</option>
	                        	                        <option value="124" >Lacroix Pollich Alejandro</option>
	                        	                        <option value="76" >LAHER SRL - Gepetto</option>
	                        	                        <option value="97" selected="selected">Ledesma</option>
	                        	                        <option value="14" >Lens Depot</option>
	                        	                        <option value="131" >Levitex</option>
	                        	                        <option value="38" >Lilitex</option>
	                        	                        <option value="126" >Love Toys SRL</option>
	                        	                        <option value="45" >Mali</option>
	                        	                        <option value="130" >Maria Marte Mallea</option>
	                        	                        <option value="110" >Mariano Silberberg</option>
	                        	                        <option value="71" >Marine pool</option>
	                        	                        <option value="55" >Maspel</option>
	                        	                        <option value="63" >Maxtrip</option>
	                        	                        <option value="34" >Mica</option>
	                        	                        <option value="123" >Mosh Imagen</option>
	                        	                        <option value="106" >Nadia Scolnic</option>
	                        	                        <option value="36" >Nathan</option>
	                        	                        <option value="111" >NATURAL OPTIC SRL</option>
	                        	                        <option value="22" >NETSOL</option>
	                        	                        <option value="122" >Norali</option>
	                        	                        <option value="107" >Ocular Lens</option>
	                        	                        <option value="39" >Old Brigde</option>
	                        	                        <option value="42" >Optica Lennon</option>
	                        	                        <option value="125" >Ortiz Hernan Federico</option>
	                        	                        <option value="64" >paralelo cero</option>
	                        	                        <option value="3" >PATAGONIA MEDICAL SA</option>
	                        	                        <option value="27" >Peperoni Jeans</option>
	                        	                        <option value="163" >Pet Por</option>
	                        	                        <option value="21" >PETRESKY IGNACIO MARIO</option>
	                        	                        <option value="46" >Polygraph</option>
	                        	                        <option value="47" >Pontus</option>
	                        	                        <option value="90" >Porotitos</option>
	                        	                        <option value="161" >Primon</option>
	                        	                        <option value="75" >Pura Piel</option>
	                        	                        <option value="164" >Q4 MKT</option>
	                        	                        <option value="30" >Rafaela Motores</option>
	                        	                        <option value="89" >Rayban</option>
	                        	                        <option value="137" >RETAIL & RESEARCH S.R.L</option>
	                        	                        <option value="127" >Richard Escalera Segovia</option>
	                        	                        <option value="100" >Romano marine</option>
	                        	                        <option value="56" >Rosita Curcho</option>
	                        	                        <option value="12" >Rusty</option>
	                        	                        <option value="70" >Samsonite</option>
	                        	                        <option value="119" >Santiago Lorente</option>
	                        	                        <option value="85" >Scis Medicina Prepeaga</option>
	                        	                        <option value="153" >Selsa</option>
	                        	                        <option value="115" >SILVER VISION SRL</option>
	                        	                        <option value="51" >Sony</option>
	                        	                        <option value="54" >Sound Quality</option>
	                        	                        <option value="60" >Sticom</option>
	                        	                        <option value="92" >Susana Zaszczynski</option>
	                        	                        <option value="20" >Tactica Consulting</option>
	                        	                        <option value="88" >Todo Correas</option>
	                        	                        <option value="154" >Tregar</option>
	                        	                        <option value="28" >Tucci</option>
	                        	                        <option value="13" >Turner</option>
	                        	                        <option value="24" >TUTI FRUTI</option>
	                        	                        <option value="95" >Visa Argentina </option>
	                        	                        <option value="25" >Viste Design</option>
	                        	                        <option value="133" >YMF-LAB</option>
	                        	                        <option value="69" >Zecat</option>
	                        	                    </select>
	                    <!-- 
	                    <a class="SeleccionarCliente">Seleccionar cliente (seleccion avanzada)</a>
						 -->	
						 
                    </li>
                    <li>
                    	
                	    <label class="blue"><img src="/images/icons/date.png" title="Seleccionar fecha para la factura"/> Fecha de factura</label>       
						
						<input class="required date" type="text" name="FechaFactura" id="FechaFactura" value="02/09/2014" />
						
                    </li>
                    <li>
                    	
                	    <label class="blue"><img src="/images/icons/date.png" title="Seleccionar fecha para la factura"/> Fecha cobranza</label>       
						
						<input class="required date" type="text" name="data[FechaPosibleDeCobro]" id="FechaPosibleDeCobro" value="02/10/2014" />
						
						<label class="blue"><img src="/images/icons/help.png" title="Verificar la condicion de cobro en cada OT"/></label>
                    </li>
                    <li>
                    	<label class="blue"> Tipo de IVA</label>
                    	<select name="data[TipoIvaId]" class="required">
                        <option value="">Seleccionar</option>
                                                <option value="1" selected="selected">Responsable inscripto - 21.00-- - (Tipo factura: A)</option>
                                                <option value="3" >Consumidor final - --21.00 - (Tipo factura: B)</option>
                                                <option value="4" >Exento - --21.00 - (Tipo factura: B)</option>
                                                <option value="5" >Responsable inscripto - -10.50- - (Tipo factura: A)</option>
                                                <option value="6" >Exento a - -- - (Tipo factura: A)</option>
                                                <option value="7" >Gravados 9.50 - 10.50-- - (Tipo factura: A)</option>
                                                <option value="8" >Rni proveedores - 21.00-10.50- - (Tipo factura: C)</option>
                                                <option value="9" >Monotributo - -- - (Tipo factura: B)</option>
                                                <option value="10" >Exento b - -- - (Tipo factura: B)</option>
                                                <option value="11" >Resp. insc exento - -- - (Tipo factura: A)</option>
                                                <option value="12" >Sin impuestos - -- - (Tipo factura: N)</option>
                                                <option value="13" >Servicios - 27.00-- - (Tipo factura: A)</option>
                                                <option value="14" >Monotributo - -- - (Tipo factura: C)</option>
                                            </select>
                    </li>
                </ul>
            </div> <!-- /filtersBox-->
                 
                
            
            <div class="contentTitles">
                	<h2>Total acumulado sin iva: $ </h2>
		        	<input type="text" DISABLED value="0" id="total"/>
		        
			</div> <!-- /contentTitles -->
            
            	<div class="contentTitles">
                
		        	<div id="OrdenesDeTrabajoSinFacturar"><!-- ajax SetProveedor --></div>
		        
		        </div> <!-- /contentTitles -->
                
         
         		<div class="contentTitles">
                    <label class="blue">Comentario (opcional)</label>
                    <textarea name="data[Comentario]" cols="45" rows="5" class=""></textarea>
                </div> <!-- /contentTitles -->  
         
         		
                <div class="contentTitles">
                    <label class="blue">Importe del comentario (opcional)</label>
                    <input type="text" class="number" id="ComentarioImporte" name="data[ComentarioImporte]" value="">
                </div> <!-- /contentTitles -->
                
                
            </div> <!-- /productsEditorContent -->
        </div>  <!-- /contentEditor -->
    </div> <!-- /form -->
</form>