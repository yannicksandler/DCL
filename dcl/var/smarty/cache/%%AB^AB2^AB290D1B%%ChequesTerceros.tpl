166
a:4:{s:8:"template";a:1:{s:44:"Backend/GestionEconomica/ChequesTerceros.tpl";b:1;}s:9:"timestamp";i:1411139378;s:7:"expires";i:1411139378;s:13:"cache_serials";a:0:{}}<link rel="stylesheet" href="/scripts/colorbox-master/colorbox-master/example1/colorbox.css" />
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
                                <td width="10%"> </td>
                                <td width="10%">Rusty </td>
                                <td width="10%">$ 4000.00 </td>
                                <td width="10%">B </td>
                                <td width="20%">BANCO DE LA PROVINCIA DE BUENOS AIRES  #014-394-94736892</td>
                                <td width="10%">20/10/2014 </td>
                                <td width="10%">18/11/2014 </td>
                                
                                <td width="10%">
                                
                                	<a class="ajax" id=""
								    href="/GestionEconomica/DepositarCheque/ChequeId/379"
								    ><img src="/images/icons/add.png" title="Depositar"/> Depositar </a>
								    
                                	 
                                </td>
						    </tr>
												    <tr >
                                <td width="10%"> </td>
                                <td width="10%">Rusty </td>
                                <td width="10%">$ 4259.00 </td>
                                <td width="10%">B </td>
                                <td width="20%">CITIBANK N.A.  #016-016-30259789</td>
                                <td width="10%">20/10/2014 </td>
                                <td width="10%">18/11/2014 </td>
                                
                                <td width="10%">
                                
                                	<a class="ajax" id=""
								    href="/GestionEconomica/DepositarCheque/ChequeId/380"
								    ><img src="/images/icons/add.png" title="Depositar"/> Depositar </a>
								    
                                	 
                                </td>
						    </tr>
												    <tr >
                                <td width="10%"> </td>
                                <td width="10%">Rusty </td>
                                <td width="10%">$ 4839.00 </td>
                                <td width="10%">B </td>
                                <td width="20%">CITIBANK N.A.  #016-029-29757365</td>
                                <td width="10%">20/10/2014 </td>
                                <td width="10%">18/11/2014 </td>
                                
                                <td width="10%">
                                
                                	<a class="ajax" id=""
								    href="/GestionEconomica/DepositarCheque/ChequeId/381"
								    ><img src="/images/icons/add.png" title="Depositar"/> Depositar </a>
								    
                                	 
                                </td>
						    </tr>
												    <tr >
                                <td width="10%"> </td>
                                <td width="10%">Rusty </td>
                                <td width="10%">$ 5000.00 </td>
                                <td width="10%">B </td>
                                <td width="20%">BBVA BANCO FRANCÉS S.A.  #017-124-00645875</td>
                                <td width="10%">18/10/2014 </td>
                                <td width="10%">16/11/2014 </td>
                                
                                <td width="10%">
                                
                                	<a class="ajax" id=""
								    href="/GestionEconomica/DepositarCheque/ChequeId/382"
								    ><img src="/images/icons/add.png" title="Depositar"/> Depositar </a>
								    
                                	 
                                </td>
						    </tr>
												    <tr >
                                <td width="10%"> </td>
                                <td width="10%">Rusty </td>
                                <td width="10%">$ 5080.00 </td>
                                <td width="10%">B </td>
                                <td width="20%">BANCO DE GALICIA Y BUENOS AIRES S.A.  #007-146-04489333</td>
                                <td width="10%">15/10/2014 </td>
                                <td width="10%">13/11/2014 </td>
                                
                                <td width="10%">
                                
                                	<a class="ajax" id=""
								    href="/GestionEconomica/DepositarCheque/ChequeId/383"
								    ><img src="/images/icons/add.png" title="Depositar"/> Depositar </a>
								    
                                	 
                                </td>
						    </tr>
												    <tr >
                                <td width="10%"> </td>
                                <td width="10%">Rusty </td>
                                <td width="10%">$ 5256.00 </td>
                                <td width="10%">B </td>
                                <td width="20%">Banco Macro #285-381-26908194</td>
                                <td width="10%">18/10/2014 </td>
                                <td width="10%">16/11/2014 </td>
                                
                                <td width="10%">
                                
                                	<a class="ajax" id=""
								    href="/GestionEconomica/DepositarCheque/ChequeId/384"
								    ><img src="/images/icons/add.png" title="Depositar"/> Depositar </a>
								    
                                	 
                                </td>
						    </tr>
												    <tr >
                                <td width="10%"> </td>
                                <td width="10%">Rusty </td>
                                <td width="10%">$ 5792.00 </td>
                                <td width="10%">B </td>
                                <td width="20%">Banco Macro #285-372-34097277</td>
                                <td width="10%">20/10/2014 </td>
                                <td width="10%">18/11/2014 </td>
                                
                                <td width="10%">
                                
                                	<a class="ajax" id=""
								    href="/GestionEconomica/DepositarCheque/ChequeId/385"
								    ><img src="/images/icons/add.png" title="Depositar"/> Depositar </a>
								    
                                	 
                                </td>
						    </tr>
												    <tr >
                                <td width="10%"> </td>
                                <td width="10%">Rusty </td>
                                <td width="10%">$ 6250.00 </td>
                                <td width="10%">B </td>
                                <td width="20%">CITIBANK N.A.  #016-033-30536134</td>
                                <td width="10%">18/10/2014 </td>
                                <td width="10%">16/11/2014 </td>
                                
                                <td width="10%">
                                
                                	<a class="ajax" id=""
								    href="/GestionEconomica/DepositarCheque/ChequeId/386"
								    ><img src="/images/icons/add.png" title="Depositar"/> Depositar </a>
								    
                                	 
                                </td>
						    </tr>
												    <tr >
                                <td width="10%"> </td>
                                <td width="10%">Rusty </td>
                                <td width="10%">$ 8000.00 </td>
                                <td width="10%">B </td>
                                <td width="20%">HSBC #150-055-47133613</td>
                                <td width="10%">20/10/2014 </td>
                                <td width="10%">18/11/2014 </td>
                                
                                <td width="10%">
                                
                                	<a class="ajax" id=""
								    href="/GestionEconomica/DepositarCheque/ChequeId/387"
								    ><img src="/images/icons/add.png" title="Depositar"/> Depositar </a>
								    
                                	 
                                </td>
						    </tr>
												    <tr >
                                <td width="10%"> </td>
                                <td width="10%">Rusty </td>
                                <td width="10%">$ 12310.00 </td>
                                <td width="10%">B </td>
                                <td width="20%">CREDICOOP #191-396-79493091</td>
                                <td width="10%">20/09/2014 </td>
                                <td width="10%">19/10/2014 </td>
                                
                                <td width="10%">
                                
                                	<a class="ajax" id=""
								    href="/GestionEconomica/DepositarCheque/ChequeId/388"
								    ><img src="/images/icons/add.png" title="Depositar"/> Depositar </a>
								    
                                	 
                                </td>
						    </tr>
												    <tr >
                                <td width="10%"> </td>
                                <td width="10%">Rusty </td>
                                <td width="10%">$ 12500.00 </td>
                                <td width="10%">B </td>
                                <td width="20%">CREDICOOP #191-052-62807820</td>
                                <td width="10%">20/10/2014 </td>
                                <td width="10%">18/11/2014 </td>
                                
                                <td width="10%">
                                
                                	<a class="ajax" id=""
								    href="/GestionEconomica/DepositarCheque/ChequeId/389"
								    ><img src="/images/icons/add.png" title="Depositar"/> Depositar </a>
								    
                                	 
                                </td>
						    </tr>
												    <tr >
                                <td width="10%"> </td>
                                <td width="10%">Rusty </td>
                                <td width="10%">$ 14000.00 </td>
                                <td width="10%">B </td>
                                <td width="20%">BBVA BANCO FRANCÉS S.A.  #017-201-00424877</td>
                                <td width="10%">26/09/2014 </td>
                                <td width="10%">25/10/2014 </td>
                                
                                <td width="10%">
                                
                                	<a class="ajax" id=""
								    href="/GestionEconomica/DepositarCheque/ChequeId/390"
								    ><img src="/images/icons/add.png" title="Depositar"/> Depositar </a>
								    
                                	 
                                </td>
						    </tr>
						                        
                                                </table>
                    </div> <!-- /listItems -->
</div><!-- en list -->