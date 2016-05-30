168
a:4:{s:8:"template";a:1:{s:46:"Backend/GestionEconomica/HistorialEfectivo.tpl";b:1;}s:9:"timestamp";i:1461940017;s:7:"expires";i:1461940017;s:13:"cache_serials";a:0:{}}<link rel="stylesheet" href="/scripts/colorbox-master/colorbox-master/example1/colorbox.css" />
<script src="/scripts/colorbox-master/colorbox-master/jquery.colorbox.js"></script>


<script type="text/javascript">
$(document).ready(function(){

	$(".ajax").colorbox();
	
    $(".AgregarPago").click(function(){

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


<h1>Historial de efectivo</h1>

<div class="list" style="width:750px">
			      
           <div class="listTop">
                <div>
                    <table border="0" cellpadding="0" cellspacing="0">
							<tr>    
                                <td width="10%"><p>Fecha</p> </td>
                                <td width="10%"><p>Debe</p> </td>
                                <td width="10%"><p>Haber</p> </td>
                                <td width="20%"><p>Detalle</p> </td>
                                <td width="10%"><p>Saldo</p> </td>
                                <!--
                                <td width="10%"><p>Acciones</p></td>
                                -->
                            </tr>
                    </table>
                </div>
            </div> <!-- /listadoTop -->
                        
                    <div class="listItems listItemsScroll">
                    	<table border="0" cellpadding="0" cellspacing="0" width="100%">
                                                
												    <tr >
                                <td width="10%">29/04/2016 </td>
                                <td width="10%"></td>
                                <td width="10%">$ 25.00</td>
                                <td width="20%">OP #2624 - almacen </td>
                                <td width="10%">17978.04 </td>
                                <!-- 
                                <td width="10%">			    
                                	 
                                </td>
                                 -->
						    </tr>
												    <tr >
                                <td width="10%">28/04/2016 </td>
                                <td width="10%">$ 51.24</td>
                                <td width="10%"></td>
                                <td width="20%">CO #320 - Detalle </td>
                                <td width="10%">18003.04 </td>
                                <!-- 
                                <td width="10%">			    
                                	 
                                </td>
                                 -->
						    </tr>
												    <tr >
                                <td width="10%">27/04/2016 </td>
                                <td width="10%"></td>
                                <td width="10%">$ 112.00</td>
                                <td width="20%">OP #2622 - compras varias </td>
                                <td width="10%">17951.80 </td>
                                <!-- 
                                <td width="10%">			    
                                	 
                                </td>
                                 -->
						    </tr>
												    <tr >
                                <td width="10%">25/04/2016 </td>
                                <td width="10%">$ 4943.50</td>
                                <td width="10%"></td>
                                <td width="20%">CO #318 - efectivo cuenta mario </td>
                                <td width="10%">18063.80 </td>
                                <!-- 
                                <td width="10%">			    
                                	 
                                </td>
                                 -->
						    </tr>
												    <tr >
                                <td width="10%">25/04/2016 </td>
                                <td width="10%">$ 1000.30</td>
                                <td width="10%"></td>
                                <td width="20%">CO #317 - futbol </td>
                                <td width="10%">13120.30 </td>
                                <!-- 
                                <td width="10%">			    
                                	 
                                </td>
                                 -->
						    </tr>
												    <tr >
                                <td width="10%">25/04/2016 </td>
                                <td width="10%"></td>
                                <td width="10%">$ 100.00</td>
                                <td width="20%">OP #2620 - impresion dcl group </td>
                                <td width="10%">12120.00 </td>
                                <!-- 
                                <td width="10%">			    
                                	 
                                </td>
                                 -->
						    </tr>
												    <tr >
                                <td width="10%">25/04/2016 </td>
                                <td width="10%"></td>
                                <td width="10%">$ 162.50</td>
                                <td width="20%">OP #2619 - 3 hora y cuarto, limpieza ofi </td>
                                <td width="10%">12220.00 </td>
                                <!-- 
                                <td width="10%">			    
                                	 
                                </td>
                                 -->
						    </tr>
												    <tr >
                                <td width="10%">25/04/2016 </td>
                                <td width="10%"></td>
                                <td width="10%">$ 58.50</td>
                                <td width="20%">OP #2618 - Almacen </td>
                                <td width="10%">12382.50 </td>
                                <!-- 
                                <td width="10%">			    
                                	 
                                </td>
                                 -->
						    </tr>
												    <tr >
                                <td width="10%">25/04/2016 </td>
                                <td width="10%"></td>
                                <td width="10%">$ 229.00</td>
                                <td width="20%">OP #2617 - corte laser + libreria </td>
                                <td width="10%">12441.00 </td>
                                <!-- 
                                <td width="10%">			    
                                	 
                                </td>
                                 -->
						    </tr>
												    <tr >
                                <td width="10%">24/04/2016 </td>
                                <td width="10%">$ 9000.00</td>
                                <td width="10%"></td>
                                <td width="20%">Extraccion de efectivo para caja </td>
                                <td width="10%">12670.00 </td>
                                <!-- 
                                <td width="10%">			    
                                	 
                                </td>
                                 -->
						    </tr>
												    <tr >
                                <td width="10%">21/04/2016 </td>
                                <td width="10%">$ 2900.00</td>
                                <td width="10%"></td>
                                <td width="20%">CO #313 - la maquinita </td>
                                <td width="10%">3670.00 </td>
                                <!-- 
                                <td width="10%">			    
                                	 
                                </td>
                                 -->
						    </tr>
												    <tr >
                                <td width="10%">19/04/2016 </td>
                                <td width="10%"></td>
                                <td width="10%">$ 125.00</td>
                                <td width="20%">OP #2610 - bidon agua + café </td>
                                <td width="10%">770.00 </td>
                                <!-- 
                                <td width="10%">			    
                                	 
                                </td>
                                 -->
						    </tr>
												    <tr >
                                <td width="10%">13/04/2016 </td>
                                <td width="10%">$ 85.00</td>
                                <td width="10%"></td>
                                <td width="20%">CO #312 - patio bullrich </td>
                                <td width="10%">895.00 </td>
                                <!-- 
                                <td width="10%">			    
                                	 
                                </td>
                                 -->
						    </tr>
												    <tr >
                                <td width="10%">12/04/2016 </td>
                                <td width="10%">$ 810.00</td>
                                <td width="10%"></td>
                                <td width="20%">Caja </td>
                                <td width="10%">810.00 </td>
                                <!-- 
                                <td width="10%">			    
                                	 
                                </td>
                                 -->
						    </tr>
												    <tr >
                                <td width="10%">12/04/2016 </td>
                                <td width="10%">$ 1389.50</td>
                                <td width="10%"></td>
                                <td width="20%">martin </td>
                                <td width="10%">0.00 </td>
                                <!-- 
                                <td width="10%">			    
                                	 
                                </td>
                                 -->
						    </tr>
												    <tr >
                                <td width="10%">12/04/2016 </td>
                                <td width="10%"></td>
                                <td width="10%">$ 2175.00</td>
                                <td width="20%">OP #2603 - efectivo compensacion </td>
                                <td width="10%">-1389.50 </td>
                                <!-- 
                                <td width="10%">			    
                                	 
                                </td>
                                 -->
						    </tr>
												    <tr >
                                <td width="10%">12/04/2016 </td>
                                <td width="10%"></td>
                                <td width="10%">$ 6000.00</td>
                                <td width="20%">OP #2602 - 12/04 </td>
                                <td width="10%">785.50 </td>
                                <!-- 
                                <td width="10%">			    
                                	 
                                </td>
                                 -->
						    </tr>
												    <tr >
                                <td width="10%">12/04/2016 </td>
                                <td width="10%"></td>
                                <td width="10%">$ 3537.87</td>
                                <td width="20%">OP #2601 - compensacion </td>
                                <td width="10%">6785.50 </td>
                                <!-- 
                                <td width="10%">			    
                                	 
                                </td>
                                 -->
						    </tr>
												    <tr >
                                <td width="10%">12/04/2016 </td>
                                <td width="10%"></td>
                                <td width="10%">$ 258.65</td>
                                <td width="20%">OP #2600 - compensacion </td>
                                <td width="10%">10323.37 </td>
                                <!-- 
                                <td width="10%">			    
                                	 
                                </td>
                                 -->
						    </tr>
												    <tr >
                                <td width="10%">12/04/2016 </td>
                                <td width="10%"></td>
                                <td width="10%">$ 567.54</td>
                                <td width="20%">OP #2599 - compensacion </td>
                                <td width="10%">10582.02 </td>
                                <!-- 
                                <td width="10%">			    
                                	 
                                </td>
                                 -->
						    </tr>
												    <tr >
                                <td width="10%">12/04/2016 </td>
                                <td width="10%"></td>
                                <td width="10%">$ 175.47</td>
                                <td width="20%">OP #2598 - compensacion </td>
                                <td width="10%">11149.56 </td>
                                <!-- 
                                <td width="10%">			    
                                	 
                                </td>
                                 -->
						    </tr>
												    <tr >
                                <td width="10%">12/04/2016 </td>
                                <td width="10%"></td>
                                <td width="10%">$ 33807.68</td>
                                <td width="20%">OP #2597 - compensacion  </td>
                                <td width="10%">11325.03 </td>
                                <!-- 
                                <td width="10%">			    
                                	 
                                </td>
                                 -->
						    </tr>
												    <tr >
                                <td width="10%">12/04/2016 </td>
                                <td width="10%"></td>
                                <td width="10%">$ 54.00</td>
                                <td width="20%">OP #2596 - compensacion </td>
                                <td width="10%">45132.71 </td>
                                <!-- 
                                <td width="10%">			    
                                	 
                                </td>
                                 -->
						    </tr>
												    <tr >
                                <td width="10%">12/04/2016 </td>
                                <td width="10%"></td>
                                <td width="10%">$ 27750.00</td>
                                <td width="20%">OP #2595 - compensacion decorline </td>
                                <td width="10%">45186.71 </td>
                                <!-- 
                                <td width="10%">			    
                                	 
                                </td>
                                 -->
						    </tr>
												    <tr >
                                <td width="10%">12/04/2016 </td>
                                <td width="10%">$ 15000.00</td>
                                <td width="10%"></td>
                                <td width="20%">Extraccion de efectivo para caja </td>
                                <td width="10%">72936.71 </td>
                                <!-- 
                                <td width="10%">			    
                                	 
                                </td>
                                 -->
						    </tr>
												    <tr >
                                <td width="10%">07/04/2016 </td>
                                <td width="10%"></td>
                                <td width="10%">$ 1116.32</td>
                                <td width="20%">OP #2586 - Se pago con cheque Nº81615526 Bco ICBC </td>
                                <td width="10%">57936.71 </td>
                                <!-- 
                                <td width="10%">			    
                                	 
                                </td>
                                 -->
						    </tr>
												    <tr >
                                <td width="10%">04/04/2016 </td>
                                <td width="10%">$ 20000.00</td>
                                <td width="10%"></td>
                                <td width="20%">Extraccion de efectivo para caja </td>
                                <td width="10%">59053.03 </td>
                                <!-- 
                                <td width="10%">			    
                                	 
                                </td>
                                 -->
						    </tr>
												    <tr >
                                <td width="10%">04/04/2016 </td>
                                <td width="10%"></td>
                                <td width="10%">$ 14812.00</td>
                                <td width="20%">OP #2583 - vacaciones </td>
                                <td width="10%">39053.03 </td>
                                <!-- 
                                <td width="10%">			    
                                	 
                                </td>
                                 -->
						    </tr>
												    <tr >
                                <td width="10%">28/03/2016 </td>
                                <td width="10%"></td>
                                <td width="10%">$ 150.00</td>
                                <td width="20%">OP #2576 - Limp. Oficina </td>
                                <td width="10%">53865.03 </td>
                                <!-- 
                                <td width="10%">			    
                                	 
                                </td>
                                 -->
						    </tr>
												    <tr >
                                <td width="10%">28/03/2016 </td>
                                <td width="10%">$ 12000.00</td>
                                <td width="10%"></td>
                                <td width="20%">Extraccion bancaria para caja con cheque #81615533 </td>
                                <td width="10%">54015.03 </td>
                                <!-- 
                                <td width="10%">			    
                                	 
                                </td>
                                 -->
						    </tr>
						                        
                                                </table>
                    </div> <!-- /listItems -->
</div><!-- en list -->