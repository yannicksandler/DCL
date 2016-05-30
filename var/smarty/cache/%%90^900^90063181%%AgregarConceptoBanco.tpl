170
a:4:{s:8:"template";a:1:{s:48:"Backend/CuentaCorriente/AgregarConceptoBanco.tpl";b:1;}s:9:"timestamp";i:1462381757;s:7:"expires";i:1462381757;s:13:"cache_serials";a:0:{}}
<script type="text/javascript">
$(document).ready(function(){

	$('#Fecha').datepicker({
		changeMonth: true,
		changeYear: true,
        dateFormat: 'dd/mm/yy'
	});
	
	$('.AgregarConcepto').click(function() {
		
		var $selected 	=	$("#SeleccionarDebeHaber").find('option:selected');
		var $tipo	=	$selected.val();

		var $selectedC 	=	$("#SeleccionarConcepto").find('option:selected');

		//if(!$selectedC)
			//return false;
		
		var r = confirm('Esta seguro que desea agregar un concepto?');

		if(!r)
			return false;	

		
		$.ajax({
			type: "POST",
			url: '/CuentaCorriente/AgregarConceptoBanco',
			dataType: "text/html",
			data: {
				'data[BancoId]': $("#BancoId").val(),
				'data[Fecha]': $("#Fecha").val(),
				'data[Detalle]': $selectedC.text(),
				'data[Importe]': $("#ImporteItem").val(),
				'data[Tipo]': $tipo
			},
			success: function(html){
				$("#contentEditor").html(html);
				reload();
			}

		});
		
		//return false;
  	});  	 
	
});

</script>



        <div class="contentEditor" id="contentEditor"> <!-- formulario de edicion de contenido -->
        
            <div class="productsEditorContent">
            
            <input class="" type="hidden" name="" id="BancoId" value=""/>
            
            <div class="filtersBox filtersInfoBox">
            	<h1>Agregar concepto</h1>
            	
            	<input type="hidden" value="" href="" class="" title="" id="ChequeId"/>
            			            <p class="success" style="width:61%;">Agregado correctamente</p>
												<div id="error"></div>
		        
                <ul>
                	<li>
                    	
                	    <label class="blue">Fecha de concepto</label>
						<input class="date" type="text" name="data[Fecha]" id="Fecha" value=""/>
                    </li>
                     
                    <li>
	                    <label class="blue">Concepto</label>       
	                    <select name="" class="" id="SeleccionarConcepto">
	                        <option value="">Seleccionar</option>
	                        	                        <option value="1">Deposito efectivo</option>
	                        	                        <option value="2">Extraccion efectivo</option>
	                        	                        <option value="3">COMISION CHEQUE OTRA PLAZA</option>
	                        	                        <option value="4">IMPUESTO AL VALOR AGREGADO</option>
	                        	                        <option value="5">IMP S/DEBITOS EN CTA CTE</option>
	                        	                        <option value="6">DEPOSITO CHEQUES 48 HS</option>
	                        	                        <option value="7">R/RECAUDACION IB SIRCREB CONV.</option>
	                        	                        <option value="8">EXTRACCION TARJETA</option>
	                        	                        <option value="9">CHEQUE PAGADO POR CAMARA</option>
	                        	                        <option value="10">COMISION COBERTURA GEOGRAFICA</option>
	                        	                        <option value="11">IMP S/CRED EN CTA CTE</option>
	                        	                        <option value="12">CPA. DANDY</option>
	                        	                        <option value="13">TRANSF ACC.GR.</option>
	                        	                        <option value="14">PAGO EDENOR</option>
	                        	                        <option value="15">MANTENIMIENTO DE CUENTA</option>
	                        	                        <option value="16">DEBITO LIQUIDACION INTERESES</option>
	                        	                        <option value="17">SEGURO DE VIDA</option>
	                        	                        <option value="18">SELLADO</option>
	                        	                        <option value="19">COM B@C TRF.ABIERTA INTER</option>
	                        	                        <option value="20">CHEQUERA PAGO DIFERIDO</option>
	                        	                        <option value="21">AJUSTE IMP DEBITO CTA CTE</option>
	                        	                        <option value="22"> ING BRUTOS PERCEP. C.A.B.A.</option>
	                        	                        <option value="23">Extraccion para caja con cheque</option>
	                        	                        <option value="24">Deposito de efectivo desde Caja</option>
	                        	                        <option value="25">Extraccion efectivo para Caja</option>
	                        	                        <option value="26">I V A</option>
	                        	                        <option value="27">COM MOV EFVO M</option>
	                        	                        <option value="28">ALTA PLAZO FIJO NRO: 1</option>
	                        	                        <option value="29">CRED. CAPITAL POR PAGO DE IPF</option>
	                        	                        <option value="30">CREDITO INT. DE PLAZO FIJO</option>
	                        	                        <option value="31">AJUSTE IMP DEBITO CTA CTE</option>
	                        	                        <option value="32">ALTA PLAZO FIJO NRO: 2</option>
	                        	                        <option value="33">Interes</option>
	                        	                        <option value="34">OPERACIONES EN RED LINK</option>
	                        	                        <option value="35">ORDEN DE NO PAGAR CHEQUES</option>
	                        	                        <option value="36">Retiro Martin</option>
	                        	                        <option value="37">PERCEPCION 35% RG 3550/13</option>
	                        	                        <option value="38">CAJA DE SEGURIDAD</option>
	                        	                        <option value="39">APORTE A SOCIEDAD</option>
	                        	                    </select>
                    </li>
                    <!-- 
                    <li>
                    	<label class="blue">Concepto</label>       
                    	<input type="text" value="" class="" name="" id="ConceptoItem"/>
                    </li>
                     -->
                    <li>
                    	<label class="blue">Importe</label>       
                    	<input type="text" value="" class="" name="" id="ImporteItem"/>
                    </li>
                    <li>       
                    	<label class="blue">Tipo</label>
                    	<select name="" class="" id="SeleccionarDebeHaber">
	                        <option value="">Seleccionar</option>
	                        <option value="Haber">Debitar</option>
	                        <option value="Debe">Acreditar</option>
	                    </select>
                    </li>
                    <li>
                    	<input type="button" value="Agregar" href="" class="button AgregarConcepto" title="" />
                    </li>
                </ul>
            </div> <!-- /filtersBox-->
                 
                
            </div> <!-- /productsEditorContent -->
        </div>  <!-- /contentEditor -->