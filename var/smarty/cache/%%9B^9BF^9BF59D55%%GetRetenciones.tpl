158
a:4:{s:8:"template";a:1:{s:36:"Backend/OrdenPago/GetRetenciones.tpl";b:1;}s:9:"timestamp";i:1450713405;s:7:"expires";i:1450713405;s:13:"cache_serials";a:0:{}}
<script type="text/javascript">
$(document).ready(function(){
    $(".AgregarPagoRetencion").click(function(){

        if(IsSetProveedor())
        {
        	$('#RetencionId').val($(this).attr('pagoid'));
        	GetPagos('add', $('#OrdenDePagoId').val());
        }
        else
            alert('Ingrese el cliente');

        return false;
    });
});

</script>


<input type="hidden" id="RetencionId" value="" />

<h2>Retenciones</h2>

<div class="list">
			      
           <div class="listTop">
                <div>
                    <table border="0" cellpadding="0" cellspacing="0">
							<tr>    
                                <td width="10%"><p>Fecha CO</p> </td>
                                <td width="10%"><p>CO</p> </td>
                                <td width="10%"><p>Detalle</p> </td>
                                <td width="10%"><p>Importe</p> </td>
                                
                                <td width="10%"><p>Acciones</p></td>
                            </tr>
                    </table>
                </div>
            </div> <!-- /listadoTop -->
                    
                    <div class="listItems">
                    	<table border="0" cellpadding="0" cellspacing="0" width="100%">
                                                
												    <tr >
                                <td width="10%">No tiene </td>
                                <td width="10%">Concepto bancario</td>
                                <td width="10%">03/04/2014 - IMP S/CRED EN CTA CTE (ICBC) </td>
                                <td width="10%">$ 74.49 </td>
                                
                                <td width="10%">
                                	<a class="AgregarPagoRetencion" pagoid="427"><img src="/images/icons/add.png" title="Agregar pago"/> Agregar retencion</a>
                                </td>
						    </tr>
												    <tr >
                                <td width="10%">No tiene </td>
                                <td width="10%">Concepto bancario</td>
                                <td width="10%">04/04/2014 - IMP S/CRED EN CTA CTE (ICBC) </td>
                                <td width="10%">$ 208.59 </td>
                                
                                <td width="10%">
                                	<a class="AgregarPagoRetencion" pagoid="434"><img src="/images/icons/add.png" title="Agregar pago"/> Agregar retencion</a>
                                </td>
						    </tr>
												    <tr >
                                <td width="10%">No tiene </td>
                                <td width="10%">Concepto bancario</td>
                                <td width="10%">10/04/2014 - IMP S/CRED EN CTA CTE (ICBC) </td>
                                <td width="10%">$ 698.40 </td>
                                
                                <td width="10%">
                                	<a class="AgregarPagoRetencion" pagoid="438"><img src="/images/icons/add.png" title="Agregar pago"/> Agregar retencion</a>
                                </td>
						    </tr>
												    <tr >
                                <td width="10%">No tiene </td>
                                <td width="10%">Concepto bancario</td>
                                <td width="10%">28/04/2014 - IMP S/CRED EN CTA CTE (ICBC) </td>
                                <td width="10%">$ 42.87 </td>
                                
                                <td width="10%">
                                	<a class="AgregarPagoRetencion" pagoid="480"><img src="/images/icons/add.png" title="Agregar pago"/> Agregar retencion</a>
                                </td>
						    </tr>
												    <tr >
                                <td width="10%">No tiene </td>
                                <td width="10%">Concepto bancario</td>
                                <td width="10%">05/05/2014 - IMP S/CRED EN CTA CTE (ICBC) </td>
                                <td width="10%">$ 13.97 </td>
                                
                                <td width="10%">
                                	<a class="AgregarPagoRetencion" pagoid="486"><img src="/images/icons/add.png" title="Agregar pago"/> Agregar retencion</a>
                                </td>
						    </tr>
												    <tr >
                                <td width="10%">No tiene </td>
                                <td width="10%">Concepto bancario</td>
                                <td width="10%">09/05/2014 - IMP S/CRED EN CTA CTE (ICBC) </td>
                                <td width="10%">$ 933.67 </td>
                                
                                <td width="10%">
                                	<a class="AgregarPagoRetencion" pagoid="499"><img src="/images/icons/add.png" title="Agregar pago"/> Agregar retencion</a>
                                </td>
						    </tr>
												    <tr >
                                <td width="10%">No tiene </td>
                                <td width="10%">Concepto bancario</td>
                                <td width="10%">15/05/2014 - IMP S/CRED EN CTA CTE (ICBC) </td>
                                <td width="10%">$ 861.26 </td>
                                
                                <td width="10%">
                                	<a class="AgregarPagoRetencion" pagoid="505"><img src="/images/icons/add.png" title="Agregar pago"/> Agregar retencion</a>
                                </td>
						    </tr>
												    <tr >
                                <td width="10%">No tiene </td>
                                <td width="10%">Concepto bancario</td>
                                <td width="10%">29/05/2014 - IMP S/CRED EN CTA CTE (ICBC) </td>
                                <td width="10%">$ 868.73 </td>
                                
                                <td width="10%">
                                	<a class="AgregarPagoRetencion" pagoid="512"><img src="/images/icons/add.png" title="Agregar pago"/> Agregar retencion</a>
                                </td>
						    </tr>
												    <tr >
                                <td width="10%">No tiene </td>
                                <td width="10%">Concepto bancario</td>
                                <td width="10%">06/06/2014 - IMP S/CRED EN CTA CTE (ICBC) </td>
                                <td width="10%">$ 905.23 </td>
                                
                                <td width="10%">
                                	<a class="AgregarPagoRetencion" pagoid="519"><img src="/images/icons/add.png" title="Agregar pago"/> Agregar retencion</a>
                                </td>
						    </tr>
												    <tr >
                                <td width="10%">No tiene </td>
                                <td width="10%">Concepto bancario</td>
                                <td width="10%">11/06/2014 - IMP S/CRED EN CTA CTE (ICBC) </td>
                                <td width="10%">$ 44.67 </td>
                                
                                <td width="10%">
                                	<a class="AgregarPagoRetencion" pagoid="520"><img src="/images/icons/add.png" title="Agregar pago"/> Agregar retencion</a>
                                </td>
						    </tr>
												    <tr >
                                <td width="10%">No tiene </td>
                                <td width="10%">Concepto bancario</td>
                                <td width="10%">13/06/2014 - IMP S/CRED EN CTA CTE (ICBC) </td>
                                <td width="10%">$ 9.88 </td>
                                
                                <td width="10%">
                                	<a class="AgregarPagoRetencion" pagoid="525"><img src="/images/icons/add.png" title="Agregar pago"/> Agregar retencion</a>
                                </td>
						    </tr>
												    <tr >
                                <td width="10%">No tiene </td>
                                <td width="10%">Concepto bancario</td>
                                <td width="10%">04/07/2014 - IMP S/CRED EN CTA CTE (ICBC) </td>
                                <td width="10%">$ 3111.50 </td>
                                
                                <td width="10%">
                                	<a class="AgregarPagoRetencion" pagoid="560"><img src="/images/icons/add.png" title="Agregar pago"/> Agregar retencion</a>
                                </td>
						    </tr>
												    <tr >
                                <td width="10%">No tiene </td>
                                <td width="10%">Concepto bancario</td>
                                <td width="10%">18/07/2014 - IMP S/CRED EN CTA CTE (ICBC) </td>
                                <td width="10%">$ 84.31 </td>
                                
                                <td width="10%">
                                	<a class="AgregarPagoRetencion" pagoid="566"><img src="/images/icons/add.png" title="Agregar pago"/> Agregar retencion</a>
                                </td>
						    </tr>
												    <tr >
                                <td width="10%">No tiene </td>
                                <td width="10%">Concepto bancario</td>
                                <td width="10%">05/08/2014 - IMP S/CRED EN CTA CTE (ICBC) </td>
                                <td width="10%">$ 156.74 </td>
                                
                                <td width="10%">
                                	<a class="AgregarPagoRetencion" pagoid="578"><img src="/images/icons/add.png" title="Agregar pago"/> Agregar retencion</a>
                                </td>
						    </tr>
												    <tr >
                                <td width="10%">No tiene </td>
                                <td width="10%">Concepto bancario</td>
                                <td width="10%">15/08/2014 - IMP S/CRED EN CTA CTE (ICBC) </td>
                                <td width="10%">$ 1731.84 </td>
                                
                                <td width="10%">
                                	<a class="AgregarPagoRetencion" pagoid="579"><img src="/images/icons/add.png" title="Agregar pago"/> Agregar retencion</a>
                                </td>
						    </tr>
												    <tr >
                                <td width="10%">No tiene </td>
                                <td width="10%">Concepto bancario</td>
                                <td width="10%">26/08/2014 - IMP S/CRED EN CTA CTE (ICBC) </td>
                                <td width="10%">$ 88.26 </td>
                                
                                <td width="10%">
                                	<a class="AgregarPagoRetencion" pagoid="590"><img src="/images/icons/add.png" title="Agregar pago"/> Agregar retencion</a>
                                </td>
						    </tr>
												    <tr >
                                <td width="10%">No tiene </td>
                                <td width="10%">Concepto bancario</td>
                                <td width="10%">12/09/2014 - IMP S/CRED EN CTA CTE (ICBC) </td>
                                <td width="10%">$ 1615.47 </td>
                                
                                <td width="10%">
                                	<a class="AgregarPagoRetencion" pagoid="608"><img src="/images/icons/add.png" title="Agregar pago"/> Agregar retencion</a>
                                </td>
						    </tr>
												    <tr >
                                <td width="10%">No tiene </td>
                                <td width="10%">Concepto bancario</td>
                                <td width="10%">30/09/2014 - IMP S/CRED EN CTA CTE (ICBC) </td>
                                <td width="10%">$ 39.19 </td>
                                
                                <td width="10%">
                                	<a class="AgregarPagoRetencion" pagoid="609"><img src="/images/icons/add.png" title="Agregar pago"/> Agregar retencion</a>
                                </td>
						    </tr>
												    <tr >
                                <td width="10%">No tiene </td>
                                <td width="10%">Concepto bancario</td>
                                <td width="10%">17/10/2014 - IMP S/CRED EN CTA CTE (ICBC) </td>
                                <td width="10%">$ 917.25 </td>
                                
                                <td width="10%">
                                	<a class="AgregarPagoRetencion" pagoid="622"><img src="/images/icons/add.png" title="Agregar pago"/> Agregar retencion</a>
                                </td>
						    </tr>
												    <tr >
                                <td width="10%">No tiene </td>
                                <td width="10%">Concepto bancario</td>
                                <td width="10%">20/10/2014 - IMP S/CRED EN CTA CTE (ICBC) </td>
                                <td width="10%">$ 188.34 </td>
                                
                                <td width="10%">
                                	<a class="AgregarPagoRetencion" pagoid="626"><img src="/images/icons/add.png" title="Agregar pago"/> Agregar retencion</a>
                                </td>
						    </tr>
												    <tr >
                                <td width="10%">No tiene </td>
                                <td width="10%">Concepto bancario</td>
                                <td width="10%">21/10/2014 - IMP S/CRED EN CTA CTE (ICBC) </td>
                                <td width="10%">$ 3.85 </td>
                                
                                <td width="10%">
                                	<a class="AgregarPagoRetencion" pagoid="627"><img src="/images/icons/add.png" title="Agregar pago"/> Agregar retencion</a>
                                </td>
						    </tr>
												    <tr >
                                <td width="10%">No tiene </td>
                                <td width="10%">Concepto bancario</td>
                                <td width="10%">18/11/2014 - IMP S/CRED EN CTA CTE (ICBC) </td>
                                <td width="10%">$ 208.54 </td>
                                
                                <td width="10%">
                                	<a class="AgregarPagoRetencion" pagoid="633"><img src="/images/icons/add.png" title="Agregar pago"/> Agregar retencion</a>
                                </td>
						    </tr>
												    <tr >
                                <td width="10%">No tiene </td>
                                <td width="10%">Concepto bancario</td>
                                <td width="10%">03/12/2014 - IMP S/CRED EN CTA CTE (ICBC) </td>
                                <td width="10%">$ 57.50 </td>
                                
                                <td width="10%">
                                	<a class="AgregarPagoRetencion" pagoid="636"><img src="/images/icons/add.png" title="Agregar pago"/> Agregar retencion</a>
                                </td>
						    </tr>
												    <tr >
                                <td width="10%">No tiene </td>
                                <td width="10%">Concepto bancario</td>
                                <td width="10%">09/12/2014 - IMP S/CRED EN CTA CTE (ICBC) </td>
                                <td width="10%">$ 1608.35 </td>
                                
                                <td width="10%">
                                	<a class="AgregarPagoRetencion" pagoid="640"><img src="/images/icons/add.png" title="Agregar pago"/> Agregar retencion</a>
                                </td>
						    </tr>
												    <tr >
                                <td width="10%">No tiene </td>
                                <td width="10%">Concepto bancario</td>
                                <td width="10%">12/12/2014 - IMP S/CRED EN CTA CTE (ICBC) </td>
                                <td width="10%">$ 779.24 </td>
                                
                                <td width="10%">
                                	<a class="AgregarPagoRetencion" pagoid="641"><img src="/images/icons/add.png" title="Agregar pago"/> Agregar retencion</a>
                                </td>
						    </tr>
												    <tr >
                                <td width="10%">No tiene </td>
                                <td width="10%">Concepto bancario</td>
                                <td width="10%">09/01/2015 - IMP S/CRED EN CTA CTE (ICBC) </td>
                                <td width="10%">$ 1454.63 </td>
                                
                                <td width="10%">
                                	<a class="AgregarPagoRetencion" pagoid="657"><img src="/images/icons/add.png" title="Agregar pago"/> Agregar retencion</a>
                                </td>
						    </tr>
												    <tr >
                                <td width="10%">No tiene </td>
                                <td width="10%">Concepto bancario</td>
                                <td width="10%">28/01/2015 - IMP S/CRED EN CTA CTE (ICBC) </td>
                                <td width="10%">$ 182.27 </td>
                                
                                <td width="10%">
                                	<a class="AgregarPagoRetencion" pagoid="661"><img src="/images/icons/add.png" title="Agregar pago"/> Agregar retencion</a>
                                </td>
						    </tr>
												    <tr >
                                <td width="10%">No tiene </td>
                                <td width="10%">Concepto bancario</td>
                                <td width="10%">02/02/2015 - IMP S/CRED EN CTA CTE (ICBC) </td>
                                <td width="10%">$ 756.17 </td>
                                
                                <td width="10%">
                                	<a class="AgregarPagoRetencion" pagoid="672"><img src="/images/icons/add.png" title="Agregar pago"/> Agregar retencion</a>
                                </td>
						    </tr>
												    <tr >
                                <td width="10%">No tiene </td>
                                <td width="10%">Concepto bancario</td>
                                <td width="10%">04/02/2015 - IMP S/CRED EN CTA CTE (ICBC) </td>
                                <td width="10%">$ 100.13 </td>
                                
                                <td width="10%">
                                	<a class="AgregarPagoRetencion" pagoid="674"><img src="/images/icons/add.png" title="Agregar pago"/> Agregar retencion</a>
                                </td>
						    </tr>
												    <tr >
                                <td width="10%">No tiene </td>
                                <td width="10%">Concepto bancario</td>
                                <td width="10%">15/03/2015 - IMP S/CRED EN CTA CTE (ICBC) </td>
                                <td width="10%">$ 0.00 </td>
                                
                                <td width="10%">
                                	<a class="AgregarPagoRetencion" pagoid="696"><img src="/images/icons/add.png" title="Agregar pago"/> Agregar retencion</a>
                                </td>
						    </tr>
												    <tr >
                                <td width="10%">No tiene </td>
                                <td width="10%">Concepto bancario</td>
                                <td width="10%">15/03/2015 - IMP S/CRED EN CTA CTE (ICBC) </td>
                                <td width="10%">$ 235.67 </td>
                                
                                <td width="10%">
                                	<a class="AgregarPagoRetencion" pagoid="697"><img src="/images/icons/add.png" title="Agregar pago"/> Agregar retencion</a>
                                </td>
						    </tr>
												    <tr >
                                <td width="10%">No tiene </td>
                                <td width="10%">Concepto bancario</td>
                                <td width="10%">17/03/2015 - IMP S/CRED EN CTA CTE (ICBC) </td>
                                <td width="10%">$ 34.49 </td>
                                
                                <td width="10%">
                                	<a class="AgregarPagoRetencion" pagoid="699"><img src="/images/icons/add.png" title="Agregar pago"/> Agregar retencion</a>
                                </td>
						    </tr>
												    <tr >
                                <td width="10%">No tiene </td>
                                <td width="10%">Concepto bancario</td>
                                <td width="10%">08/04/2015 - IMP S/CRED EN CTA CTE (ICBC) </td>
                                <td width="10%">$ 284.37 </td>
                                
                                <td width="10%">
                                	<a class="AgregarPagoRetencion" pagoid="710"><img src="/images/icons/add.png" title="Agregar pago"/> Agregar retencion</a>
                                </td>
						    </tr>
												    <tr >
                                <td width="10%">No tiene </td>
                                <td width="10%">Concepto bancario</td>
                                <td width="10%">20/04/2015 - IMP S/CRED EN CTA CTE (ICBC) </td>
                                <td width="10%">$ 1390.86 </td>
                                
                                <td width="10%">
                                	<a class="AgregarPagoRetencion" pagoid="714"><img src="/images/icons/add.png" title="Agregar pago"/> Agregar retencion</a>
                                </td>
						    </tr>
												    <tr >
                                <td width="10%">No tiene </td>
                                <td width="10%">Concepto bancario</td>
                                <td width="10%">20/04/2015 - IMP S/CRED EN CTA CTE (ICBC) </td>
                                <td width="10%">$ 14.38 </td>
                                
                                <td width="10%">
                                	<a class="AgregarPagoRetencion" pagoid="717"><img src="/images/icons/add.png" title="Agregar pago"/> Agregar retencion</a>
                                </td>
						    </tr>
												    <tr >
                                <td width="10%">No tiene </td>
                                <td width="10%">Concepto bancario</td>
                                <td width="10%">07/05/2015 - IMP S/CRED EN CTA CTE (ICBC) </td>
                                <td width="10%">$ 143.72 </td>
                                
                                <td width="10%">
                                	<a class="AgregarPagoRetencion" pagoid="736"><img src="/images/icons/add.png" title="Agregar pago"/> Agregar retencion</a>
                                </td>
						    </tr>
												    <tr >
                                <td width="10%">No tiene </td>
                                <td width="10%">Concepto bancario</td>
                                <td width="10%">15/05/2015 - IMP S/CRED EN CTA CTE (ICBC) </td>
                                <td width="10%">$ 1390.86 </td>
                                
                                <td width="10%">
                                	<a class="AgregarPagoRetencion" pagoid="740"><img src="/images/icons/add.png" title="Agregar pago"/> Agregar retencion</a>
                                </td>
						    </tr>
												    <tr >
                                <td width="10%">No tiene </td>
                                <td width="10%">Concepto bancario</td>
                                <td width="10%">22/05/2015 - IMP S/CRED EN CTA CTE (ICBC) </td>
                                <td width="10%">$ 509.47 </td>
                                
                                <td width="10%">
                                	<a class="AgregarPagoRetencion" pagoid="744"><img src="/images/icons/add.png" title="Agregar pago"/> Agregar retencion</a>
                                </td>
						    </tr>
												    <tr >
                                <td width="10%">No tiene </td>
                                <td width="10%">Concepto bancario</td>
                                <td width="10%">01/06/2015 - IMP S/CRED EN CTA CTE (ICBC) </td>
                                <td width="10%">$ 217.08 </td>
                                
                                <td width="10%">
                                	<a class="AgregarPagoRetencion" pagoid="745"><img src="/images/icons/add.png" title="Agregar pago"/> Agregar retencion</a>
                                </td>
						    </tr>
												    <tr >
                                <td width="10%">No tiene </td>
                                <td width="10%">Concepto bancario</td>
                                <td width="10%">08/06/2015 - IMP S/CRED EN CTA CTE (ICBC) </td>
                                <td width="10%">$ 1102.02 </td>
                                
                                <td width="10%">
                                	<a class="AgregarPagoRetencion" pagoid="752"><img src="/images/icons/add.png" title="Agregar pago"/> Agregar retencion</a>
                                </td>
						    </tr>
												    <tr >
                                <td width="10%">No tiene </td>
                                <td width="10%">Concepto bancario</td>
                                <td width="10%">18/06/2015 - IMP S/CRED EN CTA CTE (ICBC) </td>
                                <td width="10%">$ 24.47 </td>
                                
                                <td width="10%">
                                	<a class="AgregarPagoRetencion" pagoid="757"><img src="/images/icons/add.png" title="Agregar pago"/> Agregar retencion</a>
                                </td>
						    </tr>
												    <tr >
                                <td width="10%">No tiene </td>
                                <td width="10%">Concepto bancario</td>
                                <td width="10%">02/07/2015 - IMP S/CRED EN CTA CTE (ICBC) </td>
                                <td width="10%">$ 1140.86 </td>
                                
                                <td width="10%">
                                	<a class="AgregarPagoRetencion" pagoid="765"><img src="/images/icons/add.png" title="Agregar pago"/> Agregar retencion</a>
                                </td>
						    </tr>
												    <tr >
                                <td width="10%">No tiene </td>
                                <td width="10%">Concepto bancario</td>
                                <td width="10%">08/07/2015 - IMP S/CRED EN CTA CTE (ICBC) </td>
                                <td width="10%">$ 21.68 </td>
                                
                                <td width="10%">
                                	<a class="AgregarPagoRetencion" pagoid="781"><img src="/images/icons/add.png" title="Agregar pago"/> Agregar retencion</a>
                                </td>
						    </tr>
												    <tr >
                                <td width="10%">No tiene </td>
                                <td width="10%">Concepto bancario</td>
                                <td width="10%">13/07/2015 - IMP S/CRED EN CTA CTE (ICBC) </td>
                                <td width="10%">$ 804.37 </td>
                                
                                <td width="10%">
                                	<a class="AgregarPagoRetencion" pagoid="790"><img src="/images/icons/add.png" title="Agregar pago"/> Agregar retencion</a>
                                </td>
						    </tr>
												    <tr >
                                <td width="10%">No tiene </td>
                                <td width="10%">Concepto bancario</td>
                                <td width="10%">15/07/2015 - IMP S/CRED EN CTA CTE (ICBC) </td>
                                <td width="10%">$ 272.63 </td>
                                
                                <td width="10%">
                                	<a class="AgregarPagoRetencion" pagoid="795"><img src="/images/icons/add.png" title="Agregar pago"/> Agregar retencion</a>
                                </td>
						    </tr>
												    <tr >
                                <td width="10%">No tiene </td>
                                <td width="10%">Concepto bancario</td>
                                <td width="10%">17/07/2015 - IMP S/CRED EN CTA CTE (ICBC) </td>
                                <td width="10%">$ 1102.93 </td>
                                
                                <td width="10%">
                                	<a class="AgregarPagoRetencion" pagoid="802"><img src="/images/icons/add.png" title="Agregar pago"/> Agregar retencion</a>
                                </td>
						    </tr>
												    <tr >
                                <td width="10%">No tiene </td>
                                <td width="10%">Concepto bancario</td>
                                <td width="10%">30/07/2015 - IMP S/CRED EN CTA CTE (ICBC) </td>
                                <td width="10%">$ 167.23 </td>
                                
                                <td width="10%">
                                	<a class="AgregarPagoRetencion" pagoid="812"><img src="/images/icons/add.png" title="Agregar pago"/> Agregar retencion</a>
                                </td>
						    </tr>
												    <tr >
                                <td width="10%">No tiene </td>
                                <td width="10%">Concepto bancario</td>
                                <td width="10%">30/07/2015 - IMP S/CRED EN CTA CTE (ICBC) </td>
                                <td width="10%">$ 252.13 </td>
                                
                                <td width="10%">
                                	<a class="AgregarPagoRetencion" pagoid="818"><img src="/images/icons/add.png" title="Agregar pago"/> Agregar retencion</a>
                                </td>
						    </tr>
												    <tr >
                                <td width="10%">No tiene </td>
                                <td width="10%">Concepto bancario</td>
                                <td width="10%">18/08/2015 - IMP S/CRED EN CTA CTE (ICBC) </td>
                                <td width="10%">$ 76.40 </td>
                                
                                <td width="10%">
                                	<a class="AgregarPagoRetencion" pagoid="827"><img src="/images/icons/add.png" title="Agregar pago"/> Agregar retencion</a>
                                </td>
						    </tr>
												    <tr >
                                <td width="10%">No tiene </td>
                                <td width="10%">Concepto bancario</td>
                                <td width="10%">03/09/2015 - IMP S/CRED EN CTA CTE (ICBC) </td>
                                <td width="10%">$ 149.34 </td>
                                
                                <td width="10%">
                                	<a class="AgregarPagoRetencion" pagoid="832"><img src="/images/icons/add.png" title="Agregar pago"/> Agregar retencion</a>
                                </td>
						    </tr>
												    <tr >
                                <td width="10%">No tiene </td>
                                <td width="10%">Concepto bancario</td>
                                <td width="10%">04/09/2015 - IMP S/CRED EN CTA CTE (ICBC) </td>
                                <td width="10%">$ 1777.49 </td>
                                
                                <td width="10%">
                                	<a class="AgregarPagoRetencion" pagoid="837"><img src="/images/icons/add.png" title="Agregar pago"/> Agregar retencion</a>
                                </td>
						    </tr>
												    <tr >
                                <td width="10%">No tiene </td>
                                <td width="10%">Concepto bancario</td>
                                <td width="10%">09/09/2015 - IMP S/CRED EN CTA CTE (ICBC) </td>
                                <td width="10%">$ 134.18 </td>
                                
                                <td width="10%">
                                	<a class="AgregarPagoRetencion" pagoid="843"><img src="/images/icons/add.png" title="Agregar pago"/> Agregar retencion</a>
                                </td>
						    </tr>
												    <tr >
                                <td width="10%">No tiene </td>
                                <td width="10%">Concepto bancario</td>
                                <td width="10%">16/09/2015 - IMP S/CRED EN CTA CTE (ICBC) </td>
                                <td width="10%">$ 0.14 </td>
                                
                                <td width="10%">
                                	<a class="AgregarPagoRetencion" pagoid="850"><img src="/images/icons/add.png" title="Agregar pago"/> Agregar retencion</a>
                                </td>
						    </tr>
												    <tr >
                                <td width="10%">No tiene </td>
                                <td width="10%">Concepto bancario</td>
                                <td width="10%">16/09/2015 - IMP S/CRED EN CTA CTE (ICBC) </td>
                                <td width="10%">$ 167.88 </td>
                                
                                <td width="10%">
                                	<a class="AgregarPagoRetencion" pagoid="851"><img src="/images/icons/add.png" title="Agregar pago"/> Agregar retencion</a>
                                </td>
						    </tr>
												    <tr >
                                <td width="10%">No tiene </td>
                                <td width="10%">Concepto bancario</td>
                                <td width="10%">05/10/2015 - IMP S/CRED EN CTA CTE (ICBC) </td>
                                <td width="10%">$ 478.85 </td>
                                
                                <td width="10%">
                                	<a class="AgregarPagoRetencion" pagoid="893"><img src="/images/icons/add.png" title="Agregar pago"/> Agregar retencion</a>
                                </td>
						    </tr>
												    <tr >
                                <td width="10%">No tiene </td>
                                <td width="10%">Concepto bancario</td>
                                <td width="10%">07/10/2015 - IMP S/CRED EN CTA CTE (ICBC) </td>
                                <td width="10%">$ 348.89 </td>
                                
                                <td width="10%">
                                	<a class="AgregarPagoRetencion" pagoid="897"><img src="/images/icons/add.png" title="Agregar pago"/> Agregar retencion</a>
                                </td>
						    </tr>
												    <tr >
                                <td width="10%">No tiene </td>
                                <td width="10%">Concepto bancario</td>
                                <td width="10%">13/10/2015 - IMP S/CRED EN CTA CTE (ICBC) </td>
                                <td width="10%">$ 96.99 </td>
                                
                                <td width="10%">
                                	<a class="AgregarPagoRetencion" pagoid="899"><img src="/images/icons/add.png" title="Agregar pago"/> Agregar retencion</a>
                                </td>
						    </tr>
												    <tr >
                                <td width="10%">No tiene </td>
                                <td width="10%">Concepto bancario</td>
                                <td width="10%">20/10/2015 - IMP S/CRED EN CTA CTE (ICBC) </td>
                                <td width="10%">$ 52.51 </td>
                                
                                <td width="10%">
                                	<a class="AgregarPagoRetencion" pagoid="901"><img src="/images/icons/add.png" title="Agregar pago"/> Agregar retencion</a>
                                </td>
						    </tr>
												    <tr >
                                <td width="10%">No tiene </td>
                                <td width="10%">Concepto bancario</td>
                                <td width="10%">03/11/2015 - IMP S/CRED EN CTA CTE (ICBC) </td>
                                <td width="10%">$ 20.52 </td>
                                
                                <td width="10%">
                                	<a class="AgregarPagoRetencion" pagoid="904"><img src="/images/icons/add.png" title="Agregar pago"/> Agregar retencion</a>
                                </td>
						    </tr>
												    <tr >
                                <td width="10%">No tiene </td>
                                <td width="10%">Concepto bancario</td>
                                <td width="10%">05/11/2015 - IMP S/CRED EN CTA CTE (ICBC) </td>
                                <td width="10%">$ 149.68 </td>
                                
                                <td width="10%">
                                	<a class="AgregarPagoRetencion" pagoid="907"><img src="/images/icons/add.png" title="Agregar pago"/> Agregar retencion</a>
                                </td>
						    </tr>
												    <tr >
                                <td width="10%">No tiene </td>
                                <td width="10%">Concepto bancario</td>
                                <td width="10%">09/11/2015 - IMP S/CRED EN CTA CTE (ICBC) </td>
                                <td width="10%">$ 774.79 </td>
                                
                                <td width="10%">
                                	<a class="AgregarPagoRetencion" pagoid="913"><img src="/images/icons/add.png" title="Agregar pago"/> Agregar retencion</a>
                                </td>
						    </tr>
												    <tr >
                                <td width="10%">No tiene </td>
                                <td width="10%">Concepto bancario</td>
                                <td width="10%">04/12/2015 - IMP S/CRED EN CTA CTE (ICBC) </td>
                                <td width="10%">$ 2964.58 </td>
                                
                                <td width="10%">
                                	<a class="AgregarPagoRetencion" pagoid="927"><img src="/images/icons/add.png" title="Agregar pago"/> Agregar retencion</a>
                                </td>
						    </tr>
												    <tr >
                                <td width="10%">21/02/2013 </td>
                                <td width="10%"> <br>(Caba&ntilde;a Argentina)</td>
                                <td width="10%">Retencion ganacias </td>
                                <td width="10%">$ 504.50 </td>
                                
                                <td width="10%">
                                	<a class="AgregarPagoRetencion" pagoid="160"><img src="/images/icons/add.png" title="Agregar pago"/> Agregar retencion</a>
                                </td>
						    </tr>
												    <tr >
                                <td width="10%">24/04/2013 </td>
                                <td width="10%"> <br>(Caba&ntilde;a Argentina)</td>
                                <td width="10%">Retencion ganacias </td>
                                <td width="10%">$ 2946.00 </td>
                                
                                <td width="10%">
                                	<a class="AgregarPagoRetencion" pagoid="167"><img src="/images/icons/add.png" title="Agregar pago"/> Agregar retencion</a>
                                </td>
						    </tr>
												    <tr >
                                <td width="10%">13/05/2013 </td>
                                <td width="10%"> <br>(Bausch y Lomb)</td>
                                <td width="10%">Retencion ganacias </td>
                                <td width="10%">$ 1996.80 </td>
                                
                                <td width="10%">
                                	<a class="AgregarPagoRetencion" pagoid="170"><img src="/images/icons/add.png" title="Agregar pago"/> Agregar retencion</a>
                                </td>
						    </tr>
												    <tr >
                                <td width="10%">15/05/2013 </td>
                                <td width="10%"> <br>(Caba&ntilde;a Argentina)</td>
                                <td width="10%">Retencion ganacias </td>
                                <td width="10%">$ 5961.00 </td>
                                
                                <td width="10%">
                                	<a class="AgregarPagoRetencion" pagoid="175"><img src="/images/icons/add.png" title="Agregar pago"/> Agregar retencion</a>
                                </td>
						    </tr>
												    <tr >
                                <td width="10%">23/05/2013 </td>
                                <td width="10%"> <br>(CACIC SPORTS VISION)</td>
                                <td width="10%">Retencion ganacias </td>
                                <td width="10%">$ 944.72 </td>
                                
                                <td width="10%">
                                	<a class="AgregarPagoRetencion" pagoid="193"><img src="/images/icons/add.png" title="Agregar pago"/> Agregar retencion</a>
                                </td>
						    </tr>
												    <tr >
                                <td width="10%">29/05/2013 </td>
                                <td width="10%"> <br>(Ledesma)</td>
                                <td width="10%">Retencion ganacias </td>
                                <td width="10%">$ 27.00 </td>
                                
                                <td width="10%">
                                	<a class="AgregarPagoRetencion" pagoid="198"><img src="/images/icons/add.png" title="Agregar pago"/> Agregar retencion</a>
                                </td>
						    </tr>
												    <tr >
                                <td width="10%">25/06/2013 </td>
                                <td width="10%">129 <br>(Caba&ntilde;a Argentina)</td>
                                <td width="10%">Retencion ganacias </td>
                                <td width="10%">$ 1010.20 </td>
                                
                                <td width="10%">
                                	<a class="AgregarPagoRetencion" pagoid="214"><img src="/images/icons/add.png" title="Agregar pago"/> Agregar retencion</a>
                                </td>
						    </tr>
												    <tr >
                                <td width="10%">23/08/2013 </td>
                                <td width="10%">136 <br>(Ledesma)</td>
                                <td width="10%">Retencion ganacias </td>
                                <td width="10%">$ 139.16 </td>
                                
                                <td width="10%">
                                	<a class="AgregarPagoRetencion" pagoid="244"><img src="/images/icons/add.png" title="Agregar pago"/> Agregar retencion</a>
                                </td>
						    </tr>
												    <tr >
                                <td width="10%">28/08/2013 </td>
                                <td width="10%">138 <br>(Caba&ntilde;a Argentina)</td>
                                <td width="10%">Retencion ganacias </td>
                                <td width="10%">$ 99.92 </td>
                                
                                <td width="10%">
                                	<a class="AgregarPagoRetencion" pagoid="250"><img src="/images/icons/add.png" title="Agregar pago"/> Agregar retencion</a>
                                </td>
						    </tr>
												    <tr >
                                <td width="10%">25/09/2013 </td>
                                <td width="10%">142 <br>(Caba&ntilde;a Argentina)</td>
                                <td width="10%">Retencion ganacias </td>
                                <td width="10%">$ 606.00 </td>
                                
                                <td width="10%">
                                	<a class="AgregarPagoRetencion" pagoid="257"><img src="/images/icons/add.png" title="Agregar pago"/> Agregar retencion</a>
                                </td>
						    </tr>
												    <tr >
                                <td width="10%">30/09/2013 </td>
                                <td width="10%">143 <br>(CACIC SPORTS VISION)</td>
                                <td width="10%">Retencion ganacias </td>
                                <td width="10%">$ 1101.70 </td>
                                
                                <td width="10%">
                                	<a class="AgregarPagoRetencion" pagoid="260"><img src="/images/icons/add.png" title="Agregar pago"/> Agregar retencion</a>
                                </td>
						    </tr>
												    <tr >
                                <td width="10%">29/10/2013 </td>
                                <td width="10%">144 <br>(AACREA)</td>
                                <td width="10%">Retencion ganacias </td>
                                <td width="10%">$ 201.82 </td>
                                
                                <td width="10%">
                                	<a class="AgregarPagoRetencion" pagoid="283"><img src="/images/icons/add.png" title="Agregar pago"/> Agregar retencion</a>
                                </td>
						    </tr>
												    <tr >
                                <td width="10%">30/10/2013 </td>
                                <td width="10%">146 <br>(Caba&ntilde;a Argentina)</td>
                                <td width="10%">Retencion ganacias </td>
                                <td width="10%">$ 42.20 </td>
                                
                                <td width="10%">
                                	<a class="AgregarPagoRetencion" pagoid="290"><img src="/images/icons/add.png" title="Agregar pago"/> Agregar retencion</a>
                                </td>
						    </tr>
												    <tr >
                                <td width="10%">20/11/2013 </td>
                                <td width="10%">151 <br>(Caba&ntilde;a Argentina)</td>
                                <td width="10%">Retencion ganacias </td>
                                <td width="10%">$ 5285.44 </td>
                                
                                <td width="10%">
                                	<a class="AgregarPagoRetencion" pagoid="299"><img src="/images/icons/add.png" title="Agregar pago"/> Agregar retencion</a>
                                </td>
						    </tr>
												    <tr >
                                <td width="10%">13/12/2013 </td>
                                <td width="10%">153 <br>(Boker Arbolito)</td>
                                <td width="10%">Retencion ganacias </td>
                                <td width="10%">$ 1154.76 </td>
                                
                                <td width="10%">
                                	<a class="AgregarPagoRetencion" pagoid="330"><img src="/images/icons/add.png" title="Agregar pago"/> Agregar retencion</a>
                                </td>
						    </tr>
												    <tr >
                                <td width="10%">18/12/2013 </td>
                                <td width="10%">154 <br>(Boker Arbolito)</td>
                                <td width="10%">Retencion ganacias </td>
                                <td width="10%">$ 297.39 </td>
                                
                                <td width="10%">
                                	<a class="AgregarPagoRetencion" pagoid="331"><img src="/images/icons/add.png" title="Agregar pago"/> Agregar retencion</a>
                                </td>
						    </tr>
												    <tr >
                                <td width="10%">03/01/2014 </td>
                                <td width="10%">155 <br>(Caba&ntilde;a Argentina)</td>
                                <td width="10%">Retencion ganacias </td>
                                <td width="10%">$ 5564.50 </td>
                                
                                <td width="10%">
                                	<a class="AgregarPagoRetencion" pagoid="333"><img src="/images/icons/add.png" title="Agregar pago"/> Agregar retencion</a>
                                </td>
						    </tr>
												    <tr >
                                <td width="10%">07/01/2014 </td>
                                <td width="10%">156 <br>(CACIC SPORTS VISION)</td>
                                <td width="10%">Retencion ganacias </td>
                                <td width="10%">$ 1604.78 </td>
                                
                                <td width="10%">
                                	<a class="AgregarPagoRetencion" pagoid="347"><img src="/images/icons/add.png" title="Agregar pago"/> Agregar retencion</a>
                                </td>
						    </tr>
												    <tr >
                                <td width="10%">08/01/2014 </td>
                                <td width="10%">157 <br>(Caba&ntilde;a Argentina)</td>
                                <td width="10%">Retencion ganacias </td>
                                <td width="10%">$ 264.14 </td>
                                
                                <td width="10%">
                                	<a class="AgregarPagoRetencion" pagoid="351"><img src="/images/icons/add.png" title="Agregar pago"/> Agregar retencion</a>
                                </td>
						    </tr>
												    <tr >
                                <td width="10%">06/02/2014 </td>
                                <td width="10%">160 <br>(Tregar)</td>
                                <td width="10%">Retencion ganacias </td>
                                <td width="10%">$ 24.00 </td>
                                
                                <td width="10%">
                                	<a class="AgregarPagoRetencion" pagoid="356"><img src="/images/icons/add.png" title="Agregar pago"/> Agregar retencion</a>
                                </td>
						    </tr>
												    <tr >
                                <td width="10%">06/02/2014 </td>
                                <td width="10%">161 <br>(Caba&ntilde;a Argentina)</td>
                                <td width="10%">Retencion ganacias </td>
                                <td width="10%">$ 2564.00 </td>
                                
                                <td width="10%">
                                	<a class="AgregarPagoRetencion" pagoid="360"><img src="/images/icons/add.png" title="Agregar pago"/> Agregar retencion</a>
                                </td>
						    </tr>
												    <tr >
                                <td width="10%">18/02/2014 </td>
                                <td width="10%">162 <br>(Danone)</td>
                                <td width="10%">Retencion ganacias </td>
                                <td width="10%">$ 976.00 </td>
                                
                                <td width="10%">
                                	<a class="AgregarPagoRetencion" pagoid="365"><img src="/images/icons/add.png" title="Agregar pago"/> Agregar retencion</a>
                                </td>
						    </tr>
												    <tr >
                                <td width="10%">21/03/2014 </td>
                                <td width="10%">167 <br>(Caba&ntilde;a Argentina)</td>
                                <td width="10%">Retencion ganacias </td>
                                <td width="10%">$ 321.78 </td>
                                
                                <td width="10%">
                                	<a class="AgregarPagoRetencion" pagoid="407"><img src="/images/icons/add.png" title="Agregar pago"/> Agregar retencion</a>
                                </td>
						    </tr>
												    <tr >
                                <td width="10%">27/03/2014 </td>
                                <td width="10%">170 <br>(Bausch y Lomb)</td>
                                <td width="10%">Retencion ganacias </td>
                                <td width="10%">$ 939.98 </td>
                                
                                <td width="10%">
                                	<a class="AgregarPagoRetencion" pagoid="419"><img src="/images/icons/add.png" title="Agregar pago"/> Agregar retencion</a>
                                </td>
						    </tr>
												    <tr >
                                <td width="10%">27/03/2014 </td>
                                <td width="10%">171 <br>(Caba&ntilde;a Argentina)</td>
                                <td width="10%">Retencion ganacias </td>
                                <td width="10%">$ 2459.00 </td>
                                
                                <td width="10%">
                                	<a class="AgregarPagoRetencion" pagoid="424"><img src="/images/icons/add.png" title="Agregar pago"/> Agregar retencion</a>
                                </td>
						    </tr>
												    <tr >
                                <td width="10%">03/04/2014 </td>
                                <td width="10%">172 <br>(Caba&ntilde;a Argentina)</td>
                                <td width="10%">Retencion ganacias </td>
                                <td width="10%">$ 493.84 </td>
                                
                                <td width="10%">
                                	<a class="AgregarPagoRetencion" pagoid="430"><img src="/images/icons/add.png" title="Agregar pago"/> Agregar retencion</a>
                                </td>
						    </tr>
												    <tr >
                                <td width="10%">09/04/2014 </td>
                                <td width="10%">174 <br>(Caba&ntilde;a Argentina)</td>
                                <td width="10%">Retencion ganacias </td>
                                <td width="10%">$ 1994.00 </td>
                                
                                <td width="10%">
                                	<a class="AgregarPagoRetencion" pagoid="436"><img src="/images/icons/add.png" title="Agregar pago"/> Agregar retencion</a>
                                </td>
						    </tr>
												    <tr >
                                <td width="10%">28/04/2014 </td>
                                <td width="10%">176 <br>(CACIC SPORTS VISION)</td>
                                <td width="10%">Retencion ganacias </td>
                                <td width="10%">$ 2044.27 </td>
                                
                                <td width="10%">
                                	<a class="AgregarPagoRetencion" pagoid="464"><img src="/images/icons/add.png" title="Agregar pago"/> Agregar retencion</a>
                                </td>
						    </tr>
												    <tr >
                                <td width="10%">05/05/2014 </td>
                                <td width="10%">178 <br>(Caba&ntilde;a Argentina)</td>
                                <td width="10%">Retencion ganacias </td>
                                <td width="10%">$ 39.88 </td>
                                
                                <td width="10%">
                                	<a class="AgregarPagoRetencion" pagoid="483"><img src="/images/icons/add.png" title="Agregar pago"/> Agregar retencion</a>
                                </td>
						    </tr>
												    <tr >
                                <td width="10%">08/05/2014 </td>
                                <td width="10%">181 <br>(Caba&ntilde;a Argentina)</td>
                                <td width="10%">Retencion ganacias </td>
                                <td width="10%">$ 2564.00 </td>
                                
                                <td width="10%">
                                	<a class="AgregarPagoRetencion" pagoid="497"><img src="/images/icons/add.png" title="Agregar pago"/> Agregar retencion</a>
                                </td>
						    </tr>
												    <tr >
                                <td width="10%">15/05/2014 </td>
                                <td width="10%">183 <br>(Caba&ntilde;a Argentina)</td>
                                <td width="10%">Retencion ganacias </td>
                                <td width="10%">$ 2459.00 </td>
                                
                                <td width="10%">
                                	<a class="AgregarPagoRetencion" pagoid="503"><img src="/images/icons/add.png" title="Agregar pago"/> Agregar retencion</a>
                                </td>
						    </tr>
												    <tr >
                                <td width="10%">29/05/2014 </td>
                                <td width="10%">185 <br>(Bausch y Lomb)</td>
                                <td width="10%">Retencion ganacias </td>
                                <td width="10%">$ 2513.30 </td>
                                
                                <td width="10%">
                                	<a class="AgregarPagoRetencion" pagoid="508"><img src="/images/icons/add.png" title="Agregar pago"/> Agregar retencion</a>
                                </td>
						    </tr>
												    <tr >
                                <td width="10%">05/06/2014 </td>
                                <td width="10%">187 <br>(Caba&ntilde;a Argentina)</td>
                                <td width="10%">Retencion ganacias </td>
                                <td width="10%">$ 2482.82 </td>
                                
                                <td width="10%">
                                	<a class="AgregarPagoRetencion" pagoid="517"><img src="/images/icons/add.png" title="Agregar pago"/> Agregar retencion</a>
                                </td>
						    </tr>
												    <tr >
                                <td width="10%">03/07/2014 </td>
                                <td width="10%">190 <br>(Caba&ntilde;a Argentina)</td>
                                <td width="10%">Retencion ganacias </td>
                                <td width="10%">$ 8043.21 </td>
                                
                                <td width="10%">
                                	<a class="AgregarPagoRetencion" pagoid="557"><img src="/images/icons/add.png" title="Agregar pago"/> Agregar retencion</a>
                                </td>
						    </tr>
												    <tr >
                                <td width="10%">17/07/2014 </td>
                                <td width="10%">192 <br>(Ledesma)</td>
                                <td width="10%">Retencion ganacias </td>
                                <td width="10%">$ 182.00 </td>
                                
                                <td width="10%">
                                	<a class="AgregarPagoRetencion" pagoid="562"><img src="/images/icons/add.png" title="Agregar pago"/> Agregar retencion</a>
                                </td>
						    </tr>
												    <tr >
                                <td width="10%">21/07/2014 </td>
                                <td width="10%">193 <br>(Bausch y Lomb)</td>
                                <td width="10%">Retencion ganacias </td>
                                <td width="10%">$ 580.72 </td>
                                
                                <td width="10%">
                                	<a class="AgregarPagoRetencion" pagoid="570"><img src="/images/icons/add.png" title="Agregar pago"/> Agregar retencion</a>
                                </td>
						    </tr>
												    <tr >
                                <td width="10%">15/08/2014 </td>
                                <td width="10%">195 <br>(Caba&ntilde;a Argentina)</td>
                                <td width="10%">Retencion ganacias </td>
                                <td width="10%">$ 4842.87 </td>
                                
                                <td width="10%">
                                	<a class="AgregarPagoRetencion" pagoid="581"><img src="/images/icons/add.png" title="Agregar pago"/> Agregar retencion</a>
                                </td>
						    </tr>
												    <tr >
                                <td width="10%">26/08/2014 </td>
                                <td width="10%">197 <br>(Ledesma)</td>
                                <td width="10%">Retencion ganacias </td>
                                <td width="10%">$ 195.31 </td>
                                
                                <td width="10%">
                                	<a class="AgregarPagoRetencion" pagoid="586"><img src="/images/icons/add.png" title="Agregar pago"/> Agregar retencion</a>
                                </td>
						    </tr>
												    <tr >
                                <td width="10%">11/09/2014 </td>
                                <td width="10%">199 <br>(Caba&ntilde;a Argentina)</td>
                                <td width="10%">Retencion ganacias </td>
                                <td width="10%">$ 4510.62 </td>
                                
                                <td width="10%">
                                	<a class="AgregarPagoRetencion" pagoid="605"><img src="/images/icons/add.png" title="Agregar pago"/> Agregar retencion</a>
                                </td>
						    </tr>
												    <tr >
                                <td width="10%">06/10/2014 </td>
                                <td width="10%">203 <br>(Ledesma)</td>
                                <td width="10%">Retencion ganacias </td>
                                <td width="10%">$ 30.00 </td>
                                
                                <td width="10%">
                                	<a class="AgregarPagoRetencion" pagoid="614"><img src="/images/icons/add.png" title="Agregar pago"/> Agregar retencion</a>
                                </td>
						    </tr>
												    <tr >
                                <td width="10%">17/10/2014 </td>
                                <td width="10%">204 <br>(Caba&ntilde;a Argentina)</td>
                                <td width="10%">Retencion ganacias </td>
                                <td width="10%">$ 2517.12 </td>
                                
                                <td width="10%">
                                	<a class="AgregarPagoRetencion" pagoid="623"><img src="/images/icons/add.png" title="Agregar pago"/> Agregar retencion</a>
                                </td>
						    </tr>
												    <tr >
                                <td width="10%">04/12/2014 </td>
                                <td width="10%">207 <br>(Caba&ntilde;a Argentina)</td>
                                <td width="10%">Retencion ganacias </td>
                                <td width="10%">$ 4490.28 </td>
                                
                                <td width="10%">
                                	<a class="AgregarPagoRetencion" pagoid="638"><img src="/images/icons/add.png" title="Agregar pago"/> Agregar retencion</a>
                                </td>
						    </tr>
												    <tr >
                                <td width="10%">22/12/2014 </td>
                                <td width="10%">209 <br>(Allergan)</td>
                                <td width="10%">Retencion ganacias </td>
                                <td width="10%">$ 495.60 </td>
                                
                                <td width="10%">
                                	<a class="AgregarPagoRetencion" pagoid="643"><img src="/images/icons/add.png" title="Agregar pago"/> Agregar retencion</a>
                                </td>
						    </tr>
												    <tr >
                                <td width="10%">22/12/2014 </td>
                                <td width="10%">209 <br>(Allergan)</td>
                                <td width="10%">Retencion ganacias </td>
                                <td width="10%">$ 876.96 </td>
                                
                                <td width="10%">
                                	<a class="AgregarPagoRetencion" pagoid="645"><img src="/images/icons/add.png" title="Agregar pago"/> Agregar retencion</a>
                                </td>
						    </tr>
												    <tr >
                                <td width="10%">22/12/2014 </td>
                                <td width="10%">209 <br>(Allergan)</td>
                                <td width="10%">Retencion ganacias </td>
                                <td width="10%">$ 464.62 </td>
                                
                                <td width="10%">
                                	<a class="AgregarPagoRetencion" pagoid="647"><img src="/images/icons/add.png" title="Agregar pago"/> Agregar retencion</a>
                                </td>
						    </tr>
												    <tr >
                                <td width="10%">22/12/2014 </td>
                                <td width="10%">209 <br>(Allergan)</td>
                                <td width="10%">Retencion ganacias </td>
                                <td width="10%">$ 300.30 </td>
                                
                                <td width="10%">
                                	<a class="AgregarPagoRetencion" pagoid="649"><img src="/images/icons/add.png" title="Agregar pago"/> Agregar retencion</a>
                                </td>
						    </tr>
												    <tr >
                                <td width="10%">08/01/2015 </td>
                                <td width="10%">210 <br>(Caba&ntilde;a Argentina)</td>
                                <td width="10%">Retencion ganacias </td>
                                <td width="10%">$ 4051.40 </td>
                                
                                <td width="10%">
                                	<a class="AgregarPagoRetencion" pagoid="655"><img src="/images/icons/add.png" title="Agregar pago"/> Agregar retencion</a>
                                </td>
						    </tr>
												    <tr >
                                <td width="10%">02/02/2015 </td>
                                <td width="10%">212 <br>(Ledesma)</td>
                                <td width="10%">Retencion ganacias </td>
                                <td width="10%">$ 792.00 </td>
                                
                                <td width="10%">
                                	<a class="AgregarPagoRetencion" pagoid="663"><img src="/images/icons/add.png" title="Agregar pago"/> Agregar retencion</a>
                                </td>
						    </tr>
												    <tr >
                                <td width="10%">02/02/2015 </td>
                                <td width="10%">212 <br>(Ledesma)</td>
                                <td width="10%">Retencion ganacias </td>
                                <td width="10%">$ 1614.30 </td>
                                
                                <td width="10%">
                                	<a class="AgregarPagoRetencion" pagoid="668"><img src="/images/icons/add.png" title="Agregar pago"/> Agregar retencion</a>
                                </td>
						    </tr>
												    <tr >
                                <td width="10%">12/02/2015 </td>
                                <td width="10%">214 <br>(Allergan)</td>
                                <td width="10%">Retencion ganacias </td>
                                <td width="10%">$ 91.64 </td>
                                
                                <td width="10%">
                                	<a class="AgregarPagoRetencion" pagoid="678"><img src="/images/icons/add.png" title="Agregar pago"/> Agregar retencion</a>
                                </td>
						    </tr>
												    <tr >
                                <td width="10%">12/02/2015 </td>
                                <td width="10%">214 <br>(Allergan)</td>
                                <td width="10%">Retencion ganacias </td>
                                <td width="10%">$ 186.00 </td>
                                
                                <td width="10%">
                                	<a class="AgregarPagoRetencion" pagoid="680"><img src="/images/icons/add.png" title="Agregar pago"/> Agregar retencion</a>
                                </td>
						    </tr>
												    <tr >
                                <td width="10%">12/02/2015 </td>
                                <td width="10%">214 <br>(Allergan)</td>
                                <td width="10%">Retencion ganacias </td>
                                <td width="10%">$ 330.40 </td>
                                
                                <td width="10%">
                                	<a class="AgregarPagoRetencion" pagoid="682"><img src="/images/icons/add.png" title="Agregar pago"/> Agregar retencion</a>
                                </td>
						    </tr>
												    <tr >
                                <td width="10%">19/03/2015 </td>
                                <td width="10%">218 <br>(Caba&ntilde;a Argentina)</td>
                                <td width="10%">Retencion ganacias </td>
                                <td width="10%">$ 1761.00 </td>
                                
                                <td width="10%">
                                	<a class="AgregarPagoRetencion" pagoid="701"><img src="/images/icons/add.png" title="Agregar pago"/> Agregar retencion</a>
                                </td>
						    </tr>
												    <tr >
                                <td width="10%">06/04/2015 </td>
                                <td width="10%">219 <br>(Caba&ntilde;a Argentina)</td>
                                <td width="10%">Retencion ganacias </td>
                                <td width="10%">$ 817.16 </td>
                                
                                <td width="10%">
                                	<a class="AgregarPagoRetencion" pagoid="708"><img src="/images/icons/add.png" title="Agregar pago"/> Agregar retencion</a>
                                </td>
						    </tr>
												    <tr >
                                <td width="10%">09/04/2015 </td>
                                <td width="10%">220 <br>(Caba&ntilde;a Argentina)</td>
                                <td width="10%">Retencion ganacias </td>
                                <td width="10%">$ 3895.00 </td>
                                
                                <td width="10%">
                                	<a class="AgregarPagoRetencion" pagoid="713"><img src="/images/icons/add.png" title="Agregar pago"/> Agregar retencion</a>
                                </td>
						    </tr>
												    <tr >
                                <td width="10%">22/04/2015 </td>
                                <td width="10%">222 <br>(CACIC SPORTS VISION)</td>
                                <td width="10%">Retencion ganacias </td>
                                <td width="10%">$ 2458.61 </td>
                                
                                <td width="10%">
                                	<a class="AgregarPagoRetencion" pagoid="718"><img src="/images/icons/add.png" title="Agregar pago"/> Agregar retencion</a>
                                </td>
						    </tr>
												    <tr >
                                <td width="10%">23/04/2015 </td>
                                <td width="10%">223 <br>(CACIC SPORTS VISION)</td>
                                <td width="10%">Retencion ganacias </td>
                                <td width="10%">$ 23.10 </td>
                                
                                <td width="10%">
                                	<a class="AgregarPagoRetencion" pagoid="720"><img src="/images/icons/add.png" title="Agregar pago"/> Agregar retencion</a>
                                </td>
						    </tr>
												    <tr >
                                <td width="10%">23/04/2015 </td>
                                <td width="10%">223 <br>(CACIC SPORTS VISION)</td>
                                <td width="10%">Retencion ganacias </td>
                                <td width="10%">$ 1725.64 </td>
                                
                                <td width="10%">
                                	<a class="AgregarPagoRetencion" pagoid="721"><img src="/images/icons/add.png" title="Agregar pago"/> Agregar retencion</a>
                                </td>
						    </tr>
												    <tr >
                                <td width="10%">15/05/2015 </td>
                                <td width="10%">224 <br>(Caba&ntilde;a Argentina)</td>
                                <td width="10%">Retencion ganacias </td>
                                <td width="10%">$ 3895.00 </td>
                                
                                <td width="10%">
                                	<a class="AgregarPagoRetencion" pagoid="738"><img src="/images/icons/add.png" title="Agregar pago"/> Agregar retencion</a>
                                </td>
						    </tr>
												    <tr >
                                <td width="10%">22/05/2015 </td>
                                <td width="10%">225 <br>(Caba&ntilde;a Argentina)</td>
                                <td width="10%">Retencion ganacias </td>
                                <td width="10%">$ 1464.00 </td>
                                
                                <td width="10%">
                                	<a class="AgregarPagoRetencion" pagoid="741"><img src="/images/icons/add.png" title="Agregar pago"/> Agregar retencion</a>
                                </td>
						    </tr>
												    <tr >
                                <td width="10%">08/06/2015 </td>
                                <td width="10%">227 <br>(Caba&ntilde;a Argentina)</td>
                                <td width="10%">Retencion ganacias </td>
                                <td width="10%">$ 3065.00 </td>
                                
                                <td width="10%">
                                	<a class="AgregarPagoRetencion" pagoid="750"><img src="/images/icons/add.png" title="Agregar pago"/> Agregar retencion</a>
                                </td>
						    </tr>
												    <tr >
                                <td width="10%">18/06/2015 </td>
                                <td width="10%">229 <br>(Allergan)</td>
                                <td width="10%">Retencion ganacias </td>
                                <td width="10%">$ 522.08 </td>
                                
                                <td width="10%">
                                	<a class="AgregarPagoRetencion" pagoid="756"><img src="/images/icons/add.png" title="Agregar pago"/> Agregar retencion</a>
                                </td>
						    </tr>
												    <tr >
                                <td width="10%">25/06/2015 </td>
                                <td width="10%">230 <br>(CACIC SPORTS VISION)</td>
                                <td width="10%">Retencion ganacias </td>
                                <td width="10%">$ 40.00 </td>
                                
                                <td width="10%">
                                	<a class="AgregarPagoRetencion" pagoid="761"><img src="/images/icons/add.png" title="Agregar pago"/> Agregar retencion</a>
                                </td>
						    </tr>
												    <tr >
                                <td width="10%">03/07/2015 </td>
                                <td width="10%">232 <br>(Allergan)</td>
                                <td width="10%">Retencion ganacias </td>
                                <td width="10%">$ 3246.92 </td>
                                
                                <td width="10%">
                                	<a class="AgregarPagoRetencion" pagoid="768"><img src="/images/icons/add.png" title="Agregar pago"/> Agregar retencion</a>
                                </td>
						    </tr>
												    <tr >
                                <td width="10%">13/07/2015 </td>
                                <td width="10%">234 <br>(Caba&ntilde;a Argentina)</td>
                                <td width="10%">Retencion ganacias </td>
                                <td width="10%">$ 2067.00 </td>
                                
                                <td width="10%">
                                	<a class="AgregarPagoRetencion" pagoid="784"><img src="/images/icons/add.png" title="Agregar pago"/> Agregar retencion</a>
                                </td>
						    </tr>
												    <tr >
                                <td width="10%">15/07/2015 </td>
                                <td width="10%">236 <br>(Ledesma)</td>
                                <td width="10%">Retencion ganacias </td>
                                <td width="10%">$ 796.00 </td>
                                
                                <td width="10%">
                                	<a class="AgregarPagoRetencion" pagoid="794"><img src="/images/icons/add.png" title="Agregar pago"/> Agregar retencion</a>
                                </td>
						    </tr>
												    <tr >
                                <td width="10%">17/07/2015 </td>
                                <td width="10%">237 <br>(Caba&ntilde;a Argentina)</td>
                                <td width="10%">Retencion ganacias </td>
                                <td width="10%">$ 3169.33 </td>
                                
                                <td width="10%">
                                	<a class="AgregarPagoRetencion" pagoid="801"><img src="/images/icons/add.png" title="Agregar pago"/> Agregar retencion</a>
                                </td>
						    </tr>
												    <tr >
                                <td width="10%">30/07/2015 </td>
                                <td width="10%">239 <br>(Ledesma)</td>
                                <td width="10%">Retencion ganacias </td>
                                <td width="10%">$ 849.35 </td>
                                
                                <td width="10%">
                                	<a class="AgregarPagoRetencion" pagoid="813"><img src="/images/icons/add.png" title="Agregar pago"/> Agregar retencion</a>
                                </td>
						    </tr>
												    <tr >
                                <td width="10%">30/07/2015 </td>
                                <td width="10%">240 <br>(Allergan)</td>
                                <td width="10%">Retencion ganacias </td>
                                <td width="10%">$ 378.80 </td>
                                
                                <td width="10%">
                                	<a class="AgregarPagoRetencion" pagoid="821"><img src="/images/icons/add.png" title="Agregar pago"/> Agregar retencion</a>
                                </td>
						    </tr>
												    <tr >
                                <td width="10%">07/08/2015 </td>
                                <td width="10%">241 <br>(Caba&ntilde;a Argentina)</td>
                                <td width="10%">Retencion ganacias </td>
                                <td width="10%">$ 1276.00 </td>
                                
                                <td width="10%">
                                	<a class="AgregarPagoRetencion" pagoid="823"><img src="/images/icons/add.png" title="Agregar pago"/> Agregar retencion</a>
                                </td>
						    </tr>
												    <tr >
                                <td width="10%">03/09/2015 </td>
                                <td width="10%">245 <br>(Caba&ntilde;a Argentina)</td>
                                <td width="10%">Retencion ganacias </td>
                                <td width="10%">$ 4862.67 </td>
                                
                                <td width="10%">
                                	<a class="AgregarPagoRetencion" pagoid="835"><img src="/images/icons/add.png" title="Agregar pago"/> Agregar retencion</a>
                                </td>
						    </tr>
												    <tr >
                                <td width="10%">09/09/2015 </td>
                                <td width="10%">246 <br>(Ledesma)</td>
                                <td width="10%">Retencion ganacias </td>
                                <td width="10%">$ 350.00 </td>
                                
                                <td width="10%">
                                	<a class="AgregarPagoRetencion" pagoid="839"><img src="/images/icons/add.png" title="Agregar pago"/> Agregar retencion</a>
                                </td>
						    </tr>
												    <tr >
                                <td width="10%">16/09/2015 </td>
                                <td width="10%">248 <br>(Boker Arbolito)</td>
                                <td width="10%">Retencion ganacias </td>
                                <td width="10%">$ 378.02 </td>
                                
                                <td width="10%">
                                	<a class="AgregarPagoRetencion" pagoid="848"><img src="/images/icons/add.png" title="Agregar pago"/> Agregar retencion</a>
                                </td>
						    </tr>
												    <tr >
                                <td width="10%">05/10/2015 </td>
                                <td width="10%">250 <br>(Caba&ntilde;a Argentina)</td>
                                <td width="10%">Retencion ganacias </td>
                                <td width="10%">$ 1376.00 </td>
                                
                                <td width="10%">
                                	<a class="AgregarPagoRetencion" pagoid="891"><img src="/images/icons/add.png" title="Agregar pago"/> Agregar retencion</a>
                                </td>
						    </tr>
												    <tr >
                                <td width="10%">07/10/2015 </td>
                                <td width="10%">251 <br>(Bausch y Lomb)</td>
                                <td width="10%">Retencion ganacias </td>
                                <td width="10%">$ 752.00 </td>
                                
                                <td width="10%">
                                	<a class="AgregarPagoRetencion" pagoid="896"><img src="/images/icons/add.png" title="Agregar pago"/> Agregar retencion</a>
                                </td>
						    </tr>
												    <tr >
                                <td width="10%">05/11/2015 </td>
                                <td width="10%">253 <br>(Caba&ntilde;a Argentina)</td>
                                <td width="10%">Retencion ganacias </td>
                                <td width="10%">$ 2124.68 </td>
                                
                                <td width="10%">
                                	<a class="AgregarPagoRetencion" pagoid="909"><img src="/images/icons/add.png" title="Agregar pago"/> Agregar retencion</a>
                                </td>
						    </tr>
												    <tr >
                                <td width="10%">04/12/2015 </td>
                                <td width="10%">255 <br>(Caba&ntilde;a Argentina)</td>
                                <td width="10%">Retencion ganacias </td>
                                <td width="10%">$ 8417.18 </td>
                                
                                <td width="10%">
                                	<a class="AgregarPagoRetencion" pagoid="924"><img src="/images/icons/add.png" title="Agregar pago"/> Agregar retencion</a>
                                </td>
						    </tr>
						                        
                                                </table>
                    </div> <!-- /listItems -->
</div><!-- en list -->