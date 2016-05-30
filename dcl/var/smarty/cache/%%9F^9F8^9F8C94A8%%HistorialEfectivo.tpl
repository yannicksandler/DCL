168
a:4:{s:8:"template";a:1:{s:46:"Backend/GestionEconomica/HistorialEfectivo.tpl";b:1;}s:9:"timestamp";i:1410894238;s:7:"expires";i:1410894238;s:13:"cache_serials";a:0:{}}<link rel="stylesheet" href="/scripts/colorbox-master/colorbox-master/example1/colorbox.css" />
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
                                <td width="10%">16/09/2014 </td>
                                <td width="10%"></td>
                                <td width="10%">$ 243.57</td>
                                <td width="20%">OP #1686 - Detalle </td>
                                <td width="10%">11901.31 </td>
                                <!-- 
                                <td width="10%">			    
                                	 
                                </td>
                                 -->
						    </tr>
												    <tr >
                                <td width="10%">16/09/2014 </td>
                                <td width="10%">$ 243.57</td>
                                <td width="10%"></td>
                                <td width="20%">Martin </td>
                                <td width="10%">12144.88 </td>
                                <!-- 
                                <td width="10%">			    
                                	 
                                </td>
                                 -->
						    </tr>
												    <tr >
                                <td width="10%">16/09/2014 </td>
                                <td width="10%">$ 243.57</td>
                                <td width="10%"></td>
                                <td width="20%">Martin </td>
                                <td width="10%">11901.31 </td>
                                <!-- 
                                <td width="10%">			    
                                	 
                                </td>
                                 -->
						    </tr>
												    <tr >
                                <td width="10%">12/09/2014 </td>
                                <td width="10%"></td>
                                <td width="10%">$ 21.50</td>
                                <td width="20%">OP #1680 - Detalle </td>
                                <td width="10%">11657.74 </td>
                                <!-- 
                                <td width="10%">			    
                                	 
                                </td>
                                 -->
						    </tr>
												    <tr >
                                <td width="10%">12/09/2014 </td>
                                <td width="10%"></td>
                                <td width="10%">$ 2318.11</td>
                                <td width="20%">OP #1679 - Detalle </td>
                                <td width="10%">11679.24 </td>
                                <!-- 
                                <td width="10%">			    
                                	 
                                </td>
                                 -->
						    </tr>
												    <tr >
                                <td width="10%">12/09/2014 </td>
                                <td width="10%"></td>
                                <td width="10%">$ 12.00</td>
                                <td width="20%">OP #1678 - Detalle </td>
                                <td width="10%">13997.35 </td>
                                <!-- 
                                <td width="10%">			    
                                	 
                                </td>
                                 -->
						    </tr>
												    <tr >
                                <td width="10%">10/09/2014 </td>
                                <td width="10%">$ 100.00</td>
                                <td width="10%"></td>
                                <td width="20%">Martin </td>
                                <td width="10%">14009.35 </td>
                                <!-- 
                                <td width="10%">			    
                                	 
                                </td>
                                 -->
						    </tr>
												    <tr >
                                <td width="10%">05/09/2014 </td>
                                <td width="10%"></td>
                                <td width="10%">$ 68.00</td>
                                <td width="20%">OP #1666 - Detalle </td>
                                <td width="10%">13909.35 </td>
                                <!-- 
                                <td width="10%">			    
                                	 
                                </td>
                                 -->
						    </tr>
												    <tr >
                                <td width="10%">05/09/2014 </td>
                                <td width="10%"></td>
                                <td width="10%">$ 2058.00</td>
                                <td width="20%">OP #1665 - Detalle </td>
                                <td width="10%">13977.35 </td>
                                <!-- 
                                <td width="10%">			    
                                	 
                                </td>
                                 -->
						    </tr>
												    <tr >
                                <td width="10%">05/09/2014 </td>
                                <td width="10%">$ 2000.00</td>
                                <td width="10%"></td>
                                <td width="20%">Extraccion de efectivo para caja </td>
                                <td width="10%">16035.35 </td>
                                <!-- 
                                <td width="10%">			    
                                	 
                                </td>
                                 -->
						    </tr>
												    <tr >
                                <td width="10%">05/09/2014 </td>
                                <td width="10%"></td>
                                <td width="10%">$ 114.95</td>
                                <td width="20%">OP #1664 - Detalle </td>
                                <td width="10%">14035.35 </td>
                                <!-- 
                                <td width="10%">			    
                                	 
                                </td>
                                 -->
						    </tr>
												    <tr >
                                <td width="10%">03/09/2014 </td>
                                <td width="10%"></td>
                                <td width="10%">$ 6981.89</td>
                                <td width="20%">OP #1663 - Detalle </td>
                                <td width="10%">14150.30 </td>
                                <!-- 
                                <td width="10%">			    
                                	 
                                </td>
                                 -->
						    </tr>
												    <tr >
                                <td width="10%">03/09/2014 </td>
                                <td width="10%">$ 10000.00</td>
                                <td width="10%"></td>
                                <td width="20%">Extraccion de efectivo para caja </td>
                                <td width="10%">21132.19 </td>
                                <!-- 
                                <td width="10%">			    
                                	 
                                </td>
                                 -->
						    </tr>
												    <tr >
                                <td width="10%">02/09/2014 </td>
                                <td width="10%"></td>
                                <td width="10%">$ 1868.00</td>
                                <td width="20%">OP #1660 - Detalle </td>
                                <td width="10%">11132.19 </td>
                                <!-- 
                                <td width="10%">			    
                                	 
                                </td>
                                 -->
						    </tr>
												    <tr >
                                <td width="10%">02/09/2014 </td>
                                <td width="10%"></td>
                                <td width="10%">$ 8826.00</td>
                                <td width="20%">OP #1659 - Detalle </td>
                                <td width="10%">13000.19 </td>
                                <!-- 
                                <td width="10%">			    
                                	 
                                </td>
                                 -->
						    </tr>
												    <tr >
                                <td width="10%">02/09/2014 </td>
                                <td width="10%">$ 10694.00</td>
                                <td width="10%"></td>
                                <td width="20%">Extraccion bancaria para caja con cheque #76383982 </td>
                                <td width="10%">21826.19 </td>
                                <!-- 
                                <td width="10%">			    
                                	 
                                </td>
                                 -->
						    </tr>
												    <tr >
                                <td width="10%">02/09/2014 </td>
                                <td width="10%">$ 10694.00</td>
                                <td width="10%"></td>
                                <td width="20%">Extraccion bancaria para caja con cheque #76383981 </td>
                                <td width="10%">11132.19 </td>
                                <!-- 
                                <td width="10%">			    
                                	 
                                </td>
                                 -->
						    </tr>
												    <tr >
                                <td width="10%">02/09/2014 </td>
                                <td width="10%"></td>
                                <td width="10%">$ 156.00</td>
                                <td width="20%">OP #1657 - Detalle </td>
                                <td width="10%">438.19 </td>
                                <!-- 
                                <td width="10%">			    
                                	 
                                </td>
                                 -->
						    </tr>
												    <tr >
                                <td width="10%">01/09/2014 </td>
                                <td width="10%"></td>
                                <td width="10%">$ 90.00</td>
                                <td width="20%">OP #1656 - Detalle </td>
                                <td width="10%">594.19 </td>
                                <!-- 
                                <td width="10%">			    
                                	 
                                </td>
                                 -->
						    </tr>
												    <tr >
                                <td width="10%">28/08/2014 </td>
                                <td width="10%">$ 500.00</td>
                                <td width="10%"></td>
                                <td width="20%">martin </td>
                                <td width="10%">684.19 </td>
                                <!-- 
                                <td width="10%">			    
                                	 
                                </td>
                                 -->
						    </tr>
												    <tr >
                                <td width="10%">26/08/2014 </td>
                                <td width="10%"></td>
                                <td width="10%">$ 300.00</td>
                                <td width="20%">OP #1647 - Detalle </td>
                                <td width="10%">184.19 </td>
                                <!-- 
                                <td width="10%">			    
                                	 
                                </td>
                                 -->
						    </tr>
												    <tr >
                                <td width="10%">25/08/2014 </td>
                                <td width="10%"></td>
                                <td width="10%">$ 490.00</td>
                                <td width="20%">OP #1646 - Detalle </td>
                                <td width="10%">484.19 </td>
                                <!-- 
                                <td width="10%">			    
                                	 
                                </td>
                                 -->
						    </tr>
												    <tr >
                                <td width="10%">22/08/2014 </td>
                                <td width="10%"></td>
                                <td width="10%">$ 10355.03</td>
                                <td width="20%">CO #218 anulada </td>
                                <td width="10%">974.19 </td>
                                <!-- 
                                <td width="10%">			    
                                	 
                                </td>
                                 -->
						    </tr>
												    <tr >
                                <td width="10%">21/08/2014 </td>
                                <td width="10%">$ 9880.49</td>
                                <td width="10%"></td>
                                <td width="20%">OP #1642 anulada </td>
                                <td width="10%">11329.22 </td>
                                <!-- 
                                <td width="10%">			    
                                	 
                                </td>
                                 -->
						    </tr>
												    <tr >
                                <td width="10%">21/08/2014 </td>
                                <td width="10%"></td>
                                <td width="10%">$ 9880.49</td>
                                <td width="20%">OP #1642 - Detalle </td>
                                <td width="10%">1448.73 </td>
                                <!-- 
                                <td width="10%">			    
                                	 
                                </td>
                                 -->
						    </tr>
												    <tr >
                                <td width="10%">21/08/2014 </td>
                                <td width="10%">$ 10355.03</td>
                                <td width="10%"></td>
                                <td width="20%">CO #218 - Detalle </td>
                                <td width="10%">11329.22 </td>
                                <!-- 
                                <td width="10%">			    
                                	 
                                </td>
                                 -->
						    </tr>
												    <tr >
                                <td width="10%">21/08/2014 </td>
                                <td width="10%"></td>
                                <td width="10%">$ 1500.00</td>
                                <td width="20%">OP #1640 - Detalle </td>
                                <td width="10%">974.19 </td>
                                <!-- 
                                <td width="10%">			    
                                	 
                                </td>
                                 -->
						    </tr>
												    <tr >
                                <td width="10%">20/08/2014 </td>
                                <td width="10%">$ 2400.00</td>
                                <td width="10%"></td>
                                <td width="20%">Extraccion bancaria para caja con cheque #75134396 </td>
                                <td width="10%">2474.19 </td>
                                <!-- 
                                <td width="10%">			    
                                	 
                                </td>
                                 -->
						    </tr>
												    <tr >
                                <td width="10%">20/08/2014 </td>
                                <td width="10%"></td>
                                <td width="10%">$ 101.00</td>
                                <td width="20%">OP #1638 - Detalle </td>
                                <td width="10%">74.19 </td>
                                <!-- 
                                <td width="10%">			    
                                	 
                                </td>
                                 -->
						    </tr>
												    <tr >
                                <td width="10%">20/08/2014 </td>
                                <td width="10%"></td>
                                <td width="10%">$ 3050.00</td>
                                <td width="20%">OP #1637 - Detalle </td>
                                <td width="10%">175.19 </td>
                                <!-- 
                                <td width="10%">			    
                                	 
                                </td>
                                 -->
						    </tr>
						                        
                                                </table>
                    </div> <!-- /listItems -->
</div><!-- en list -->