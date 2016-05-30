166
a:4:{s:8:"template";a:1:{s:44:"Backend/GestionEconomica/ChequesTerceros.tpl";b:1;}s:9:"timestamp";i:1462461606;s:7:"expires";i:1462461606;s:13:"cache_serials";a:0:{}}<link rel="stylesheet" href="/scripts/colorbox-master/colorbox-master/example1/colorbox.css" />
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


<h1>Cheques en cartera</h1>

<div class="list">
			      
           <div class="listTop">
                <div>
                    <table border="0" cellpadding="0" cellspacing="0">
							<tr>    
                                <td width="10%"><p>Emision</p> </td>
                                <td width="10%"><p>Cliente</p> </td>
                                <td width="10%"><p>Importe</p> </td>
                                <td width="10%"><p>Tipo</p> </td>
                                <td width="20%"><p>Detalle</p> </td>
                                <td width="10%"><p>Cobro</p> </td>
                                <td width="10%"><p>Vencimiento</p> </td>
                                
                                <td width="10%"><p>Acciones</p></td>
                            </tr>
                    </table>
                </div>
            </div> <!-- /listadoTop -->
                        
                    <div class="listItems listItemsScroll">
                    	<table border="0" cellpadding="0" cellspacing="0" width="100%">
                                                
												    <tr >
                                <td width="10%">12/12/2016 </td>
                                <td width="10%">Boker Arbolito </td>
                                <td width="10%">$ 1000.00 </td>
                                <td width="10%">B </td>
                                <td width="20%">Banco Macro #47800213</td>
                                <td width="10%">26/01/2016 </td>
                                <td width="10%">24/02/2016 </td>
                                
                                <td width="10%">
                                
                                	<a class="ajax" id=""
								    href="/GestionEconomica/DepositarCheque/ChequeId/729"
								    ><img src="/images/icons/add.png" title="Depositar"/> Depositar </a>
								    
                                	 
                                </td>
						    </tr>
												    <tr >
                                <td width="10%">06/04/2016 </td>
                                <td width="10%">Pucherito </td>
                                <td width="10%">$ 17100.00 </td>
                                <td width="10%">N </td>
                                <td width="20%">CITIBANK N.A.  #34720689</td>
                                <td width="10%">10/05/2016 </td>
                                <td width="10%">08/06/2016 </td>
                                
                                <td width="10%">
                                
                                	<a class="ajax" id=""
								    href="/GestionEconomica/DepositarCheque/ChequeId/759"
								    ><img src="/images/icons/add.png" title="Depositar"/> Depositar </a>
								    
                                	 
                                </td>
						    </tr>
												    <tr >
                                <td width="10%">16/03/2016 </td>
                                <td width="10%">Boker Arbolito </td>
                                <td width="10%">$ 6695.00 </td>
                                <td width="10%">B </td>
                                <td width="20%">CREDICOOP #71992144</td>
                                <td width="10%">22/03/2016 </td>
                                <td width="10%">20/04/2016 </td>
                                
                                <td width="10%">
                                
                                	<a class="ajax" id=""
								    href="/GestionEconomica/DepositarCheque/ChequeId/764"
								    ><img src="/images/icons/add.png" title="Depositar"/> Depositar </a>
								    
                                	 
                                </td>
						    </tr>
												    <tr >
                                <td width="10%">30/04/2016 </td>
                                <td width="10%">CACIC SPORTS VISION </td>
                                <td width="10%">$ 14240.00 </td>
                                <td width="10%">B </td>
                                <td width="20%">Banco Macro #48925002</td>
                                <td width="10%">01/05/2016 </td>
                                <td width="10%">30/05/2016 </td>
                                
                                <td width="10%">
                                
                                	<a class="ajax" id=""
								    href="/GestionEconomica/DepositarCheque/ChequeId/770"
								    ><img src="/images/icons/add.png" title="Depositar"/> Depositar </a>
								    
                                	 
                                </td>
						    </tr>
												    <tr >
                                <td width="10%">02/05/2016 </td>
                                <td width="10%">CACIC SPORTS VISION </td>
                                <td width="10%">$ 3328.60 </td>
                                <td width="10%">B </td>
                                <td width="20%">Rio de la Plata #7200253</td>
                                <td width="10%">02/05/2016 </td>
                                <td width="10%">31/05/2016 </td>
                                
                                <td width="10%">
                                
                                	<a class="ajax" id=""
								    href="/GestionEconomica/DepositarCheque/ChequeId/771"
								    ><img src="/images/icons/add.png" title="Depositar"/> Depositar </a>
								    
                                	 
                                </td>
						    </tr>
												    <tr >
                                <td width="10%">06/04/2016 </td>
                                <td width="10%">CACIC SPORTS VISION </td>
                                <td width="10%">$ 5288.00 </td>
                                <td width="10%">B </td>
                                <td width="20%">BBVA BANCO FRANCÉS S.A.  #00753188</td>
                                <td width="10%">02/05/2016 </td>
                                <td width="10%">31/05/2016 </td>
                                
                                <td width="10%">
                                
                                	<a class="ajax" id=""
								    href="/GestionEconomica/DepositarCheque/ChequeId/772"
								    ><img src="/images/icons/add.png" title="Depositar"/> Depositar </a>
								    
                                	 
                                </td>
						    </tr>
												    <tr >
                                <td width="10%">31/03/2016 </td>
                                <td width="10%">CACIC SPORTS VISION </td>
                                <td width="10%">$ 12815.11 </td>
                                <td width="10%">B </td>
                                <td width="20%">Rio de la Plata #99</td>
                                <td width="10%">02/05/2016 </td>
                                <td width="10%">31/05/2016 </td>
                                
                                <td width="10%">
                                
                                	<a class="ajax" id=""
								    href="/GestionEconomica/DepositarCheque/ChequeId/773"
								    ><img src="/images/icons/add.png" title="Depositar"/> Depositar </a>
								    
                                	 
                                </td>
						    </tr>
												    <tr >
                                <td width="10%">15/03/2016 </td>
                                <td width="10%">CACIC SPORTS VISION </td>
                                <td width="10%">$ 9430.00 </td>
                                <td width="10%">B </td>
                                <td width="20%">ICBC #82114961</td>
                                <td width="10%">03/05/2016 </td>
                                <td width="10%">01/06/2016 </td>
                                
                                <td width="10%">
                                
                                	<a class="ajax" id=""
								    href="/GestionEconomica/DepositarCheque/ChequeId/774"
								    ><img src="/images/icons/add.png" title="Depositar"/> Depositar </a>
								    
                                	 
                                </td>
						    </tr>
												    <tr >
                                <td width="10%">04/04/2016 </td>
                                <td width="10%">CACIC SPORTS VISION </td>
                                <td width="10%">$ 4500.00 </td>
                                <td width="10%">B </td>
                                <td width="20%">CITIBANK N.A.  #34317751</td>
                                <td width="10%">04/05/2016 </td>
                                <td width="10%">02/06/2016 </td>
                                
                                <td width="10%">
                                
                                	<a class="ajax" id=""
								    href="/GestionEconomica/DepositarCheque/ChequeId/776"
								    ><img src="/images/icons/add.png" title="Depositar"/> Depositar </a>
								    
                                	 
                                </td>
						    </tr>
												    <tr >
                                <td width="10%">04/05/2016 </td>
                                <td width="10%">CACIC SPORTS VISION </td>
                                <td width="10%">$ 7000.00 </td>
                                <td width="10%">B </td>
                                <td width="20%">CREDICOOP #90534976</td>
                                <td width="10%">04/05/2016 </td>
                                <td width="10%">02/06/2016 </td>
                                
                                <td width="10%">
                                
                                	<a class="ajax" id=""
								    href="/GestionEconomica/DepositarCheque/ChequeId/777"
								    ><img src="/images/icons/add.png" title="Depositar"/> Depositar </a>
								    
                                	 
                                </td>
						    </tr>
												    <tr >
                                <td width="10%">11/04/2016 </td>
                                <td width="10%">CACIC SPORTS VISION </td>
                                <td width="10%">$ 8540.66 </td>
                                <td width="10%">B </td>
                                <td width="20%">Banco Macro #47377493</td>
                                <td width="10%">04/05/2016 </td>
                                <td width="10%">02/06/2016 </td>
                                
                                <td width="10%">
                                
                                	<a class="ajax" id=""
								    href="/GestionEconomica/DepositarCheque/ChequeId/778"
								    ><img src="/images/icons/add.png" title="Depositar"/> Depositar </a>
								    
                                	 
                                </td>
						    </tr>
												    <tr >
                                <td width="10%">16/03/2016 </td>
                                <td width="10%">CACIC SPORTS VISION </td>
                                <td width="10%">$ 915.58 </td>
                                <td width="10%">B </td>
                                <td width="20%">BANCO DE LA NACIÓN ARGENTINA  #04201198</td>
                                <td width="10%">05/05/2016 </td>
                                <td width="10%">03/06/2016 </td>
                                
                                <td width="10%">
                                
                                	<a class="ajax" id=""
								    href="/GestionEconomica/DepositarCheque/ChequeId/779"
								    ><img src="/images/icons/add.png" title="Depositar"/> Depositar </a>
								    
                                	 
                                </td>
						    </tr>
												    <tr >
                                <td width="10%">09/03/2016 </td>
                                <td width="10%">CACIC SPORTS VISION </td>
                                <td width="10%">$ 4190.00 </td>
                                <td width="10%">B </td>
                                <td width="20%">CREDICOOP #72276197</td>
                                <td width="10%">05/05/2016 </td>
                                <td width="10%">03/06/2016 </td>
                                
                                <td width="10%">
                                
                                	<a class="ajax" id=""
								    href="/GestionEconomica/DepositarCheque/ChequeId/780"
								    ><img src="/images/icons/add.png" title="Depositar"/> Depositar </a>
								    
                                	 
                                </td>
						    </tr>
												    <tr >
                                <td width="10%">05/03/2016 </td>
                                <td width="10%">CACIC SPORTS VISION </td>
                                <td width="10%">$ 5870.00 </td>
                                <td width="10%">B </td>
                                <td width="20%">BANCO DE LA PROVINCIA DE BUENOS AIRES  #15366529</td>
                                <td width="10%">05/05/2016 </td>
                                <td width="10%">03/06/2016 </td>
                                
                                <td width="10%">
                                
                                	<a class="ajax" id=""
								    href="/GestionEconomica/DepositarCheque/ChequeId/781"
								    ><img src="/images/icons/add.png" title="Depositar"/> Depositar </a>
								    
                                	 
                                </td>
						    </tr>
												    <tr >
                                <td width="10%">04/03/2016 </td>
                                <td width="10%">CACIC SPORTS VISION </td>
                                <td width="10%">$ 6079.00 </td>
                                <td width="10%">B </td>
                                <td width="20%">CREDICOOP #86241897</td>
                                <td width="10%">05/05/2016 </td>
                                <td width="10%">03/06/2016 </td>
                                
                                <td width="10%">
                                
                                	<a class="ajax" id=""
								    href="/GestionEconomica/DepositarCheque/ChequeId/782"
								    ><img src="/images/icons/add.png" title="Depositar"/> Depositar </a>
								    
                                	 
                                </td>
						    </tr>
												    <tr >
                                <td width="10%">05/04/2016 </td>
                                <td width="10%">CACIC SPORTS VISION </td>
                                <td width="10%">$ 6772.00 </td>
                                <td width="10%">B </td>
                                <td width="20%">BBVA BANCO FRANCÉS S.A.  #654504</td>
                                <td width="10%">05/05/2016 </td>
                                <td width="10%">03/06/2016 </td>
                                
                                <td width="10%">
                                
                                	<a class="ajax" id=""
								    href="/GestionEconomica/DepositarCheque/ChequeId/783"
								    ><img src="/images/icons/add.png" title="Depositar"/> Depositar </a>
								    
                                	 
                                </td>
						    </tr>
												    <tr >
                                <td width="10%">01/04/2016 </td>
                                <td width="10%">CACIC SPORTS VISION </td>
                                <td width="10%">$ 7595.33 </td>
                                <td width="10%">B </td>
                                <td width="20%">Banco Macro #55682876</td>
                                <td width="10%">05/05/2016 </td>
                                <td width="10%">03/06/2016 </td>
                                
                                <td width="10%">
                                
                                	<a class="ajax" id=""
								    href="/GestionEconomica/DepositarCheque/ChequeId/784"
								    ><img src="/images/icons/add.png" title="Depositar"/> Depositar </a>
								    
                                	 
                                </td>
						    </tr>
												    <tr >
                                <td width="10%">29/03/2016 </td>
                                <td width="10%">CACIC SPORTS VISION </td>
                                <td width="10%">$ 25315.00 </td>
                                <td width="10%">B </td>
                                <td width="20%">CITIBANK N.A.  #34608439</td>
                                <td width="10%">05/05/2016 </td>
                                <td width="10%">03/06/2016 </td>
                                
                                <td width="10%">
                                
                                	<a class="ajax" id=""
								    href="/GestionEconomica/DepositarCheque/ChequeId/785"
								    ><img src="/images/icons/add.png" title="Depositar"/> Depositar </a>
								    
                                	 
                                </td>
						    </tr>
												    <tr >
                                <td width="10%">08/04/2016 </td>
                                <td width="10%">CACIC SPORTS VISION </td>
                                <td width="10%">$ 5000.00 </td>
                                <td width="10%">B </td>
                                <td width="20%">BBVA BANCO FRANCÉS S.A.  #01092927</td>
                                <td width="10%">04/05/2016 </td>
                                <td width="10%">02/06/2016 </td>
                                
                                <td width="10%">
                                
                                	<a class="ajax" id=""
								    href="/GestionEconomica/DepositarCheque/ChequeId/786"
								    ><img src="/images/icons/add.png" title="Depositar"/> Depositar </a>
								    
                                	 
                                </td>
						    </tr>
												    <tr >
                                <td width="10%">28/03/2016 </td>
                                <td width="10%">CACIC SPORTS VISION </td>
                                <td width="10%">$ 5060.22 </td>
                                <td width="10%">B </td>
                                <td width="20%">Banco Macro #55186057</td>
                                <td width="10%">06/05/2016 </td>
                                <td width="10%">04/06/2016 </td>
                                
                                <td width="10%">
                                
                                	<a class="ajax" id=""
								    href="/GestionEconomica/DepositarCheque/ChequeId/787"
								    ><img src="/images/icons/add.png" title="Depositar"/> Depositar </a>
								    
                                	 
                                </td>
						    </tr>
												    <tr >
                                <td width="10%">22/04/2016 </td>
                                <td width="10%">CACIC SPORTS VISION </td>
                                <td width="10%">$ 6006.44 </td>
                                <td width="10%">B </td>
                                <td width="20%">CITIBANK N.A.  #34908501</td>
                                <td width="10%">06/05/2016 </td>
                                <td width="10%">04/06/2016 </td>
                                
                                <td width="10%">
                                
                                	<a class="ajax" id=""
								    href="/GestionEconomica/DepositarCheque/ChequeId/788"
								    ><img src="/images/icons/add.png" title="Depositar"/> Depositar </a>
								    
                                	 
                                </td>
						    </tr>
												    <tr >
                                <td width="10%">07/03/2016 </td>
                                <td width="10%">CACIC SPORTS VISION </td>
                                <td width="10%">$ 4621.00 </td>
                                <td width="10%">B </td>
                                <td width="20%">BANCO DE LA NACIÓN ARGENTINA  #3300111</td>
                                <td width="10%">07/05/2016 </td>
                                <td width="10%">05/06/2016 </td>
                                
                                <td width="10%">
                                
                                	<a class="ajax" id=""
								    href="/GestionEconomica/DepositarCheque/ChequeId/789"
								    ><img src="/images/icons/add.png" title="Depositar"/> Depositar </a>
								    
                                	 
                                </td>
						    </tr>
												    <tr >
                                <td width="10%">07/03/2016 </td>
                                <td width="10%">CACIC SPORTS VISION </td>
                                <td width="10%">$ 7853.00 </td>
                                <td width="10%">B </td>
                                <td width="20%">CREDICOOP #86127353</td>
                                <td width="10%">07/05/2016 </td>
                                <td width="10%">05/06/2016 </td>
                                
                                <td width="10%">
                                
                                	<a class="ajax" id=""
								    href="/GestionEconomica/DepositarCheque/ChequeId/790"
								    ><img src="/images/icons/add.png" title="Depositar"/> Depositar </a>
								    
                                	 
                                </td>
						    </tr>
												    <tr >
                                <td width="10%">08/04/2016 </td>
                                <td width="10%">CACIC SPORTS VISION </td>
                                <td width="10%">$ 3900.00 </td>
                                <td width="10%">B </td>
                                <td width="20%">BANCO DE GALICIA Y BUENOS AIRES S.A.  #37749530</td>
                                <td width="10%">08/05/2016 </td>
                                <td width="10%">06/06/2016 </td>
                                
                                <td width="10%">
                                
                                	<a class="ajax" id=""
								    href="/GestionEconomica/DepositarCheque/ChequeId/791"
								    ><img src="/images/icons/add.png" title="Depositar"/> Depositar </a>
								    
                                	 
                                </td>
						    </tr>
												    <tr >
                                <td width="10%">06/04/2016 </td>
                                <td width="10%">CACIC SPORTS VISION </td>
                                <td width="10%">$ 5288.00 </td>
                                <td width="10%">B </td>
                                <td width="20%">BBVA BANCO FRANCÉS S.A.  #753189</td>
                                <td width="10%">09/05/2016 </td>
                                <td width="10%">07/06/2016 </td>
                                
                                <td width="10%">
                                
                                	<a class="ajax" id=""
								    href="/GestionEconomica/DepositarCheque/ChequeId/792"
								    ><img src="/images/icons/add.png" title="Depositar"/> Depositar </a>
								    
                                	 
                                </td>
						    </tr>
												    <tr >
                                <td width="10%">17/03/2016 </td>
                                <td width="10%">CACIC SPORTS VISION </td>
                                <td width="10%">$ 5456.00 </td>
                                <td width="10%">B </td>
                                <td width="20%">CITIBANK N.A.  #34649439</td>
                                <td width="10%">09/05/2016 </td>
                                <td width="10%">07/06/2016 </td>
                                
                                <td width="10%">
                                
                                	<a class="ajax" id=""
								    href="/GestionEconomica/DepositarCheque/ChequeId/793"
								    ><img src="/images/icons/add.png" title="Depositar"/> Depositar </a>
								    
                                	 
                                </td>
						    </tr>
												    <tr >
                                <td width="10%">10/03/2016 </td>
                                <td width="10%">CACIC SPORTS VISION </td>
                                <td width="10%">$ 5538.00 </td>
                                <td width="10%">B </td>
                                <td width="20%">Nuevo banco de  #5781667</td>
                                <td width="10%">09/05/2016 </td>
                                <td width="10%">07/06/2016 </td>
                                
                                <td width="10%">
                                
                                	<a class="ajax" id=""
								    href="/GestionEconomica/DepositarCheque/ChequeId/794"
								    ><img src="/images/icons/add.png" title="Depositar"/> Depositar </a>
								    
                                	 
                                </td>
						    </tr>
												    <tr >
                                <td width="10%">01/04/2016 </td>
                                <td width="10%">CACIC SPORTS VISION </td>
                                <td width="10%">$ 6200.00 </td>
                                <td width="10%">B </td>
                                <td width="20%">Rio de la Plata #93175182</td>
                                <td width="10%">10/05/2016 </td>
                                <td width="10%">08/06/2016 </td>
                                
                                <td width="10%">
                                
                                	<a class="ajax" id=""
								    href="/GestionEconomica/DepositarCheque/ChequeId/795"
								    ><img src="/images/icons/add.png" title="Depositar"/> Depositar </a>
								    
                                	 
                                </td>
						    </tr>
												    <tr >
                                <td width="10%">10/03/2016 </td>
                                <td width="10%">CACIC SPORTS VISION </td>
                                <td width="10%">$ 3200.00 </td>
                                <td width="10%">B </td>
                                <td width="20%">CITIBANK N.A.  #34128843</td>
                                <td width="10%">10/05/2016 </td>
                                <td width="10%">08/06/2016 </td>
                                
                                <td width="10%">
                                
                                	<a class="ajax" id=""
								    href="/GestionEconomica/DepositarCheque/ChequeId/796"
								    ><img src="/images/icons/add.png" title="Depositar"/> Depositar </a>
								    
                                	 
                                </td>
						    </tr>
						                        
                                                </table>
                    </div> <!-- /listItems -->
</div><!-- en list -->