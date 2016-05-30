162
a:4:{s:8:"template";a:1:{s:40:"Backend/OrdenPago/GetChequesTerceros.tpl";b:1;}s:9:"timestamp";i:1462277240;s:7:"expires";i:1462277240;s:13:"cache_serials";a:0:{}}
<script type="text/javascript">
$(document).ready(function(){
    $(".AgregarPagoCheque").click(function(){

        if(IsSetProveedor())
        {
        	$('#ChequeId').val($(this).attr('chequeid'));
        	GetPagos('add', $('#OrdenDePagoId').val());
        }
        else
            alert('Ingrese el cliente');

        return false;
    });
});

</script>


<input type="hidden" id="ChequeId" value="" />

<h2>Cheques en cartera (30)</h2>

<div class="list">
			      
           <div class="listTop">
                <div>
                    <table border="0" cellpadding="0" cellspacing="0">
							<tr>    
                                <td width="10%"><p>Emision</p> </td>
                                <td width="10%"><p>Importe</p> </td>
                                <td width="20%"><p>Detalle</p> </td>
                                <td width="10%"><p>Cobro</p> </td>
                                <td width="10%"><p>Vencimiento</p> </td>
                                
                                <td width="10%"><p>Acciones</p></td>
                            </tr>
                    </table>
                </div>
            </div> <!-- /listadoTop -->
                        
                    <div class="listItems">
                    	<table border="0" cellpadding="0" cellspacing="0" width="100%">
                                                
												    <tr >
                                <td width="10%">12/12/2016 </td>
                                <td width="10%">$ 1000.00 </td>
                                <td width="20%">Banco Macro #47800213 (B)</td>
                                <td width="10%">26/01/2016 </td>
                                <td width="10%">24/02/2016 </td>
                                
                                <td width="10%">
                                	<a class="AgregarPagoCheque" chequeid="729"><img src="/images/icons/add.png" title="Agregar pago"/> Agregar</a>
                                </td>
						    </tr>
												    <tr >
                                <td width="10%">16/03/2016 </td>
                                <td width="10%">$ 6695.00 </td>
                                <td width="20%">CREDICOOP #71992144 (B)</td>
                                <td width="10%">22/03/2016 </td>
                                <td width="10%">20/04/2016 </td>
                                
                                <td width="10%">
                                	<a class="AgregarPagoCheque" chequeid="764"><img src="/images/icons/add.png" title="Agregar pago"/> Agregar</a>
                                </td>
						    </tr>
												    <tr >
                                <td width="10%">30/04/2016 </td>
                                <td width="10%">$ 14240.00 </td>
                                <td width="20%">Banco Macro #48925002 (B)</td>
                                <td width="10%">01/05/2016 </td>
                                <td width="10%">30/05/2016 </td>
                                
                                <td width="10%">
                                	<a class="AgregarPagoCheque" chequeid="770"><img src="/images/icons/add.png" title="Agregar pago"/> Agregar</a>
                                </td>
						    </tr>
												    <tr >
                                <td width="10%">02/05/2016 </td>
                                <td width="10%">$ 3328.60 </td>
                                <td width="20%">Rio de la Plata #7200253 (B)</td>
                                <td width="10%">02/05/2016 </td>
                                <td width="10%">31/05/2016 </td>
                                
                                <td width="10%">
                                	<a class="AgregarPagoCheque" chequeid="771"><img src="/images/icons/add.png" title="Agregar pago"/> Agregar</a>
                                </td>
						    </tr>
												    <tr >
                                <td width="10%">06/04/2016 </td>
                                <td width="10%">$ 5288.00 </td>
                                <td width="20%">BBVA BANCO FRANCÉS S.A.  #00753188 (B)</td>
                                <td width="10%">02/05/2016 </td>
                                <td width="10%">31/05/2016 </td>
                                
                                <td width="10%">
                                	<a class="AgregarPagoCheque" chequeid="772"><img src="/images/icons/add.png" title="Agregar pago"/> Agregar</a>
                                </td>
						    </tr>
												    <tr >
                                <td width="10%">31/03/2016 </td>
                                <td width="10%">$ 12815.11 </td>
                                <td width="20%">Rio de la Plata #99 (B)</td>
                                <td width="10%">02/05/2016 </td>
                                <td width="10%">31/05/2016 </td>
                                
                                <td width="10%">
                                	<a class="AgregarPagoCheque" chequeid="773"><img src="/images/icons/add.png" title="Agregar pago"/> Agregar</a>
                                </td>
						    </tr>
												    <tr >
                                <td width="10%">15/03/2016 </td>
                                <td width="10%">$ 9430.00 </td>
                                <td width="20%">ICBC #82114961 (B)</td>
                                <td width="10%">03/05/2016 </td>
                                <td width="10%">01/06/2016 </td>
                                
                                <td width="10%">
                                	<a class="AgregarPagoCheque" chequeid="774"><img src="/images/icons/add.png" title="Agregar pago"/> Agregar</a>
                                </td>
						    </tr>
												    <tr >
                                <td width="10%">07/03/2016 </td>
                                <td width="10%">$ 4000.00 </td>
                                <td width="20%">Mercantil Argentino #04108441 (B)</td>
                                <td width="10%">04/05/2016 </td>
                                <td width="10%">02/06/2016 </td>
                                
                                <td width="10%">
                                	<a class="AgregarPagoCheque" chequeid="775"><img src="/images/icons/add.png" title="Agregar pago"/> Agregar</a>
                                </td>
						    </tr>
												    <tr >
                                <td width="10%">04/04/2016 </td>
                                <td width="10%">$ 4500.00 </td>
                                <td width="20%">CITIBANK N.A.  #34317751 (B)</td>
                                <td width="10%">04/05/2016 </td>
                                <td width="10%">02/06/2016 </td>
                                
                                <td width="10%">
                                	<a class="AgregarPagoCheque" chequeid="776"><img src="/images/icons/add.png" title="Agregar pago"/> Agregar</a>
                                </td>
						    </tr>
												    <tr >
                                <td width="10%">04/05/2016 </td>
                                <td width="10%">$ 7000.00 </td>
                                <td width="20%">CREDICOOP #90534976 (B)</td>
                                <td width="10%">04/05/2016 </td>
                                <td width="10%">02/06/2016 </td>
                                
                                <td width="10%">
                                	<a class="AgregarPagoCheque" chequeid="777"><img src="/images/icons/add.png" title="Agregar pago"/> Agregar</a>
                                </td>
						    </tr>
												    <tr >
                                <td width="10%">11/04/2016 </td>
                                <td width="10%">$ 8540.66 </td>
                                <td width="20%">Banco Macro #47377493 (B)</td>
                                <td width="10%">04/05/2016 </td>
                                <td width="10%">02/06/2016 </td>
                                
                                <td width="10%">
                                	<a class="AgregarPagoCheque" chequeid="778"><img src="/images/icons/add.png" title="Agregar pago"/> Agregar</a>
                                </td>
						    </tr>
												    <tr >
                                <td width="10%">16/03/2016 </td>
                                <td width="10%">$ 915.58 </td>
                                <td width="20%">BANCO DE LA NACIÓN ARGENTINA  #04201198 (B)</td>
                                <td width="10%">05/05/2016 </td>
                                <td width="10%">03/06/2016 </td>
                                
                                <td width="10%">
                                	<a class="AgregarPagoCheque" chequeid="779"><img src="/images/icons/add.png" title="Agregar pago"/> Agregar</a>
                                </td>
						    </tr>
												    <tr >
                                <td width="10%">09/03/2016 </td>
                                <td width="10%">$ 4190.00 </td>
                                <td width="20%">CREDICOOP #72276197 (B)</td>
                                <td width="10%">05/05/2016 </td>
                                <td width="10%">03/06/2016 </td>
                                
                                <td width="10%">
                                	<a class="AgregarPagoCheque" chequeid="780"><img src="/images/icons/add.png" title="Agregar pago"/> Agregar</a>
                                </td>
						    </tr>
												    <tr >
                                <td width="10%">05/03/2016 </td>
                                <td width="10%">$ 5870.00 </td>
                                <td width="20%">BANCO DE LA PROVINCIA DE BUENOS AIRES  #15366529 (B)</td>
                                <td width="10%">05/05/2016 </td>
                                <td width="10%">03/06/2016 </td>
                                
                                <td width="10%">
                                	<a class="AgregarPagoCheque" chequeid="781"><img src="/images/icons/add.png" title="Agregar pago"/> Agregar</a>
                                </td>
						    </tr>
												    <tr >
                                <td width="10%">04/03/2016 </td>
                                <td width="10%">$ 6079.00 </td>
                                <td width="20%">CREDICOOP #86241897 (B)</td>
                                <td width="10%">05/05/2016 </td>
                                <td width="10%">03/06/2016 </td>
                                
                                <td width="10%">
                                	<a class="AgregarPagoCheque" chequeid="782"><img src="/images/icons/add.png" title="Agregar pago"/> Agregar</a>
                                </td>
						    </tr>
												    <tr >
                                <td width="10%">05/04/2016 </td>
                                <td width="10%">$ 6772.00 </td>
                                <td width="20%">BBVA BANCO FRANCÉS S.A.  #654504 (B)</td>
                                <td width="10%">05/05/2016 </td>
                                <td width="10%">03/06/2016 </td>
                                
                                <td width="10%">
                                	<a class="AgregarPagoCheque" chequeid="783"><img src="/images/icons/add.png" title="Agregar pago"/> Agregar</a>
                                </td>
						    </tr>
												    <tr >
                                <td width="10%">01/04/2016 </td>
                                <td width="10%">$ 7595.33 </td>
                                <td width="20%">Banco Macro #55682876 (B)</td>
                                <td width="10%">05/05/2016 </td>
                                <td width="10%">03/06/2016 </td>
                                
                                <td width="10%">
                                	<a class="AgregarPagoCheque" chequeid="784"><img src="/images/icons/add.png" title="Agregar pago"/> Agregar</a>
                                </td>
						    </tr>
												    <tr >
                                <td width="10%">29/03/2016 </td>
                                <td width="10%">$ 25315.00 </td>
                                <td width="20%">CITIBANK N.A.  #34608439 (B)</td>
                                <td width="10%">05/05/2016 </td>
                                <td width="10%">03/06/2016 </td>
                                
                                <td width="10%">
                                	<a class="AgregarPagoCheque" chequeid="785"><img src="/images/icons/add.png" title="Agregar pago"/> Agregar</a>
                                </td>
						    </tr>
												    <tr >
                                <td width="10%">08/04/2016 </td>
                                <td width="10%">$ 5000.00 </td>
                                <td width="20%">BBVA BANCO FRANCÉS S.A.  #01092927 (B)</td>
                                <td width="10%">04/05/2016 </td>
                                <td width="10%">02/06/2016 </td>
                                
                                <td width="10%">
                                	<a class="AgregarPagoCheque" chequeid="786"><img src="/images/icons/add.png" title="Agregar pago"/> Agregar</a>
                                </td>
						    </tr>
												    <tr >
                                <td width="10%">28/03/2016 </td>
                                <td width="10%">$ 5060.22 </td>
                                <td width="20%">Banco Macro #55186057 (B)</td>
                                <td width="10%">06/05/2016 </td>
                                <td width="10%">04/06/2016 </td>
                                
                                <td width="10%">
                                	<a class="AgregarPagoCheque" chequeid="787"><img src="/images/icons/add.png" title="Agregar pago"/> Agregar</a>
                                </td>
						    </tr>
												    <tr >
                                <td width="10%">22/04/2016 </td>
                                <td width="10%">$ 6006.44 </td>
                                <td width="20%">CITIBANK N.A.  #34908501 (B)</td>
                                <td width="10%">06/05/2016 </td>
                                <td width="10%">04/06/2016 </td>
                                
                                <td width="10%">
                                	<a class="AgregarPagoCheque" chequeid="788"><img src="/images/icons/add.png" title="Agregar pago"/> Agregar</a>
                                </td>
						    </tr>
												    <tr >
                                <td width="10%">07/03/2016 </td>
                                <td width="10%">$ 4621.00 </td>
                                <td width="20%">BANCO DE LA NACIÓN ARGENTINA  #3300111 (B)</td>
                                <td width="10%">07/05/2016 </td>
                                <td width="10%">05/06/2016 </td>
                                
                                <td width="10%">
                                	<a class="AgregarPagoCheque" chequeid="789"><img src="/images/icons/add.png" title="Agregar pago"/> Agregar</a>
                                </td>
						    </tr>
												    <tr >
                                <td width="10%">07/03/2016 </td>
                                <td width="10%">$ 7853.00 </td>
                                <td width="20%">CREDICOOP #86127353 (B)</td>
                                <td width="10%">07/05/2016 </td>
                                <td width="10%">05/06/2016 </td>
                                
                                <td width="10%">
                                	<a class="AgregarPagoCheque" chequeid="790"><img src="/images/icons/add.png" title="Agregar pago"/> Agregar</a>
                                </td>
						    </tr>
												    <tr >
                                <td width="10%">08/04/2016 </td>
                                <td width="10%">$ 3900.00 </td>
                                <td width="20%">BANCO DE GALICIA Y BUENOS AIRES S.A.  #37749530 (B)</td>
                                <td width="10%">08/05/2016 </td>
                                <td width="10%">06/06/2016 </td>
                                
                                <td width="10%">
                                	<a class="AgregarPagoCheque" chequeid="791"><img src="/images/icons/add.png" title="Agregar pago"/> Agregar</a>
                                </td>
						    </tr>
												    <tr >
                                <td width="10%">06/04/2016 </td>
                                <td width="10%">$ 5288.00 </td>
                                <td width="20%">BBVA BANCO FRANCÉS S.A.  #753189 (B)</td>
                                <td width="10%">09/05/2016 </td>
                                <td width="10%">07/06/2016 </td>
                                
                                <td width="10%">
                                	<a class="AgregarPagoCheque" chequeid="792"><img src="/images/icons/add.png" title="Agregar pago"/> Agregar</a>
                                </td>
						    </tr>
												    <tr >
                                <td width="10%">17/03/2016 </td>
                                <td width="10%">$ 5456.00 </td>
                                <td width="20%">CITIBANK N.A.  #34649439 (B)</td>
                                <td width="10%">09/05/2016 </td>
                                <td width="10%">07/06/2016 </td>
                                
                                <td width="10%">
                                	<a class="AgregarPagoCheque" chequeid="793"><img src="/images/icons/add.png" title="Agregar pago"/> Agregar</a>
                                </td>
						    </tr>
												    <tr >
                                <td width="10%">10/03/2016 </td>
                                <td width="10%">$ 5538.00 </td>
                                <td width="20%">Nuevo banco de  #5781667 (B)</td>
                                <td width="10%">09/05/2016 </td>
                                <td width="10%">07/06/2016 </td>
                                
                                <td width="10%">
                                	<a class="AgregarPagoCheque" chequeid="794"><img src="/images/icons/add.png" title="Agregar pago"/> Agregar</a>
                                </td>
						    </tr>
												    <tr >
                                <td width="10%">01/04/2016 </td>
                                <td width="10%">$ 6200.00 </td>
                                <td width="20%">Rio de la Plata #93175182 (B)</td>
                                <td width="10%">10/05/2016 </td>
                                <td width="10%">08/06/2016 </td>
                                
                                <td width="10%">
                                	<a class="AgregarPagoCheque" chequeid="795"><img src="/images/icons/add.png" title="Agregar pago"/> Agregar</a>
                                </td>
						    </tr>
												    <tr >
                                <td width="10%">10/03/2016 </td>
                                <td width="10%">$ 3200.00 </td>
                                <td width="20%">CITIBANK N.A.  #34128843 (B)</td>
                                <td width="10%">10/05/2016 </td>
                                <td width="10%">08/06/2016 </td>
                                
                                <td width="10%">
                                	<a class="AgregarPagoCheque" chequeid="796"><img src="/images/icons/add.png" title="Agregar pago"/> Agregar</a>
                                </td>
						    </tr>
												    <tr >
                                <td width="10%">17/03/2016 </td>
                                <td width="10%">$ 2100.00 </td>
                                <td width="20%">HSBC #52079227 (B)</td>
                                <td width="10%">12/05/2016 </td>
                                <td width="10%">10/06/2016 </td>
                                
                                <td width="10%">
                                	<a class="AgregarPagoCheque" chequeid="797"><img src="/images/icons/add.png" title="Agregar pago"/> Agregar</a>
                                </td>
						    </tr>
						                        
                                                </table>
                    </div> <!-- /listItems -->
</div><!-- en list -->