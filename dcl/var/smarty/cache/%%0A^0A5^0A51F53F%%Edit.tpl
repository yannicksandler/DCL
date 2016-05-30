194
a:4:{s:8:"template";a:2:{s:27:"Backend/NotaDebito/Edit.tpl";b:1;s:33:"Backend/NotaDebito/ColumnForm.tpl";b:1;}s:9:"timestamp";i:1408649329;s:7:"expires";i:1408649329;s:13:"cache_serials";a:0:{}}
<!-- date picker -->
<link type="text/css" href="/styles/ui-lightness/jquery-ui-1.8.2.custom.css" rel="stylesheet" />
<script type="text/javascript" src="/scripts/jquery/jquery.ui.datepicker.js"></script>
<script type="text/javascript" src="/scripts/jquery/jquery.ui.core.js"></script>
<script type="text/javascript" src="/scripts/jquery/jquery.ui.widget.js"></script>
<!-- end date picker -->

<script type="text/javascript" src="/scripts/Edit.js"></script>


<script type="text/javascript">
$(document).ready(function(){
    $("#FrmEdit").validate();

    $("#SeleccionarCliente").hide();

    var availableTags = [
							"Havanna","clona","PATAGONIA MEDICAL SA","diego goria","Bausch y Lomb","cristal depot","abd","eki plus","AACREA","calver-maldito glam","corte final","Rusty","Turner","Lens Depot","JyG","Il Gatto","Bermuda","Geuna Boats","Drager","Tactica Consulting","PETRESKY IGNACIO MARIO","NETSOL","INTERDREAMERS","TUTI FRUTI","Viste Design","Daiu","Peperoni Jeans","Tucci","Gaelle","Rafaela Motores","AET","Astillero Geuna","All Over","Mica","Ernesto Automotores","Nathan","Kane","Lilitex","Old Brigde","Caimanes de Formoza","Casa Cesto","Optica Lennon","El pollo Azul","Ciclismo","Mali","Polygraph","Pontus","Buenos Aires Key","DecorLine","Hathor","Sony","Cabaña Argentina","Drams","Sound Quality","Maspel","Rosita Curcho","FilmaBonito","Kolor","Iszak Hermanos","Sticom","Cancilleria de Relaciones exteriores","Apehi","Maxtrip","paralelo cero","Boston seguros","Imprenta Packman","estela do sul","biosintex","Zecat","Samsonite","Marine pool","Hebraica","Gilera Ya","Pura Piel","LAHER SRL - Gepetto","estrela do sul","Ivecco","Furia","Importadora Sudamericana ","Distriwash","Descuento City","Comercio Pet","Comision Nacional de Comunicacion","Scis Medicina Prepeaga","Todo Correas","Rayban","Porotitos","Capo Mafia","Susana Zaszczynski","Glucolvil","Ergo Renova","Visa Argentina ","Jenny","Ledesma","DCL Group","Jonatan Kusnier","Romano marine","Gotico","distribuidora M & M","Aurelia S.A.C.I.F","Nadia Scolnic","Ocular Lens","Gerardo Towner","Estancia La Pelada","Mariano Silberberg","NATURAL OPTIC SRL","SILVER VISION SRL","DESCO - Gepetto","Alejandro Amarilla","Adfunky","Santiago Lorente","Guia Oleo","Gatorade","Norali","Mosh Imagen","Lacroix Pollich Alejandro","Ortiz Hernan Federico","Love Toys SRL","Richard Escalera Segovia","99 centavos","Estudio edison","Maria Marte Mallea","Levitex","Batanga Media","YMF-LAB","bepoketprint","Gurruchaga outlet","Full time producciones","RETAIL & RESEARCH S.R.L","Boker Arbolito","Banco Patagonia","Danone","Agencia Creativa","Crossfit Andino","Cristian Almiron","Almiron Cristian","Korn propiedades","Selsa","Tregar","Diamonds","Estilo Griscan","Barcelona Vinos","Carlos Encargado","Cepas Argentina","Abbott ","Primon","Estudio Grin","Pet Por","Q4 MKT"
              ];

    $("input#cliente_autocomplete").autocomplete({
        source: availableTags,
      //define select handler
		select: function(e, ui) {
			var valor = ui.item.value;
			SetClienteSeleccionar(valor);
		}    
    });

    $("#Descripcion").attr('value', $("#Descripcion").text().replace("\<br /\>", "").replace("\<br /\>", "").replace("\<br /\>", "").replace("\<br /\>", "").replace("\<br /\>", ""));

    
    $('#Fecha').datepicker({
		changeMonth: true,
		changeYear: true,
		yearRange: '1960:2014',
		dateFormat: 'dd/mm/yy'
	});

	$('.printCredito').click(function() {
  	  	var url	=	$(this).attr('href');
		VerCredito(url);		
		
		return false;
  	});	


  	$('.SeleccionarCliente').click(function() {
		
		var pagina	= '/Cliente/Seleccionar';

		var opciones="toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=yes, width=1000, height=700, top=85, left=140";

		abrirPopUp(pagina, opciones);
		
		return false;
  	});

  	SetClienteInitTextValue();
    SetClienteSeleccionar($("input#cliente_autocomplete").val());

    $("#cliente_autocomplete").blur(function(){
        if( $(this).val() == '' )
            $(this).val( $(this).attr("defaultValue") );
    });

    $("#cliente_autocomplete").focus(function(){
        if( $(this).val() == $(this).attr("defaultValue"))
            $(this).val('');
    });
  	  	    
});

function SetClienteInitTextValue()
{
	NombreCliente = GetSelectedTextValue("SeleccionarCliente");
	if(NombreCliente != 'Seleccionar')
		$("input#cliente_autocomplete").val(NombreCliente);
}


function SetClienteSeleccionar(NombreCliente)
{
	inputText	=	NombreCliente;
	// setear valor select selected por texto de option / set option selected by text
	//$("#"+dropdown_id+" option:contains(" + inputText + ")").attr('selected', 'selected');
	
	$("#SeleccionarCliente option").each(function () {
        if ($(this).html() == inputText) {
            $(this).attr("selected", "selected");
            return;
        }
	});

	
}

function GetSelectedTextValue(dropdownid)
{
	var $selected 	=	$("#"+dropdownid).find('option:selected');
	var $selectedtext	=	$selected.html();

	return $selectedtext;
}


function VerCredito(url)
{
	
	var opciones="toolbar=no, location=no, directories=no, status=no, menubar=yes, scrollbars=yes, resizable=yes, width=1000, height=700, top=10, left=40";

	abrirPopUp(url, opciones);

	
}

function abrirPopUp(pagina, opciones)
{
	window.open(pagina,"",opciones);
}

function SetCliente(ClienteId)
{
  	var select_id	=	'SeleccionarCliente';
  	var	option_val	=	ClienteId;

	$('#'+select_id+' option:selected').removeAttr('selected');
  	$('#'+select_id+' option[value='+option_val+']').attr('selected','selected');
}


</script>


<a class="linkSendHome linkSendHomeEdit" href="/NotaDebito/List/order/Fecha_DESC"><img src="/images/icons/arrow_undo.png" title="Volver al listado"/> Volver al listado de notas de credito &raquo; </a>

<h1>Editar Nota de debito &raquo; <span>2 (Interno 2)</span></h1>

<form id="FrmEdit" enctype="multipart/form-data" action="" method="post">
   <input type="hidden" name="data[Id]" value="2" />

        
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
                <input type="reset" value="Volver" class="btGray " title="Volver" onClick="window.location='/GestionAdministrativa/Main'"/>
                </li>
            </ul>
            
        </div> <!-- /formButtonsContent -->
        
        </div> <!-- /info -->
    </div> <!-- /formButtons -->

</div> <!-- /FormsColumn -->            
                    
        <div class="contentEditor"> <!-- formulario de edicion de contenido -->
                
            <div class="productsEditorContent">
                
                		<div class="buttonsCont" style="clear: left;">
														<input type="" value="Imprimir" href="/GestionEconomica/NotaDebitoView/id/2" class="btDark printCredito" title="Imprimir nota de debito" />
														
			            </div>
			            
                <div class="contentTitles" id="">
                    
                    	<label class="blue"><img src="/images/icons/status_online.png" title=""/> Cliente</label>
						<input id="cliente_autocomplete" value="" readonly="readonly" disabled/>
						
						<select name="data[ClienteId]" class="required CambiarCliente" id="SeleccionarCliente">
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
                                                <option value="138" selected="selected">Boker Arbolito</option>
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
                                                <option value="97" >Ledesma</option>
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
                    	
                </div> <!-- /contentTitles -->
                
                <div class="contentTitles" id="">
                    <label class="blue">Tipo de IVA</label>
                    <!-- drop down -->               
                    <select name="data[TipoIvaId]" class="required" readonly="readonly" disabled>
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
                </div> <!-- /contentTitles -->
                
                         
                <div class="contentTitles">
                    <label class="blue">Fecha</label>
                    <input type="text" class="date required" id="Fecha" name="data[Fecha]" value="14/04/2014" readonly="readonly" disabled>
                </div> <!-- /contentTitles -->
                
                <div class="contentTitles">
                    <label class="blue">Detalle</label>
                    <textarea name="data[Comentario]" cols="45" rows="5" class="required" id="Descripcion" readonly="readonly" disabled>Cheque rechazado 4426</textarea>
                </div> <!-- /contentTitles -->
                
                <div class="contentTitles">
                    <label class="blue">Importe de rechazo sin IVA</label>
                    <input type="text" class="number required" id="" name="data[ImporteRechazo]" value="2000.00" readonly="readonly" disabled>
                </div> <!-- /contentTitles -->
                
                <div class="contentTitles">
                    <label class="blue">Importe</label>
                    <input type="text" class="number required" id="" name="data[Importe]" value="38.75" readonly="readonly" disabled>
                </div> <!-- /contentTitles -->
                
                
            </div> <!-- /productsEditorContent -->
        </div>  <!-- /contentEditor -->
    </div> <!-- /form -->
</form>