175
a:4:{s:8:"template";a:1:{s:53:"Backend/GestionEconomica/ChequesPendientesDebitar.tpl";b:1;}s:9:"timestamp";i:1411136672;s:7:"expires";i:1411136672;s:13:"cache_serials";a:0:{}}<link rel="stylesheet" href="/scripts/colorbox-master/colorbox-master/example1/colorbox.css" />
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

    $(".debitar").click(function(){

        var r = confirm('Esta seguro que desea debitar el cheque?');

        if(r)
            return true;

        return false;
    });
});

</script>


<div style="width:90%">

<h1>Cheques pendientes de debitar</h1>

<div class="list">
			      
           <div class="listTop">
                <div>
                    <table border="0" cellpadding="0" cellspacing="0">
							<tr>    
                                <td width="10%"><p>Emision</p> </td>
                                <td width="10%"><p>Proveedor</p> </td>
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
                                <td width="10%">14/08/2014 </td>
                                <td width="10%">FULL HANGER </td>
                                <td width="10%">$ 22206.90 </td>
                                <td width="10%">B </td>
                                <td width="20%">ICBC #75134394 (Cuenta: 05280210159072)</td>
                                
                                <td width="10%">22/09/2014 </td>
                                <td width="10%">21/10/2014 </td>
                                
                                <td width="10%">
                                
                                	<a class="ajax debitar" id=""
								    href="/GestionEconomica/DebitarCheque/ChequeId/367"
								    ><img src="/images/icons/add.png" title="Debitar"/> Debitar </a>
								    
                                
                                </td>
						    </tr>
												    <tr >
                                <td width="10%">20/08/2014 </td>
                                <td width="10%">Envap </td>
                                <td width="10%">$ 11737.00 </td>
                                <td width="10%">B </td>
                                <td width="20%">ICBC #75134395 (Cuenta: 05280210159072)</td>
                                
                                <td width="10%">20/10/2014 </td>
                                <td width="10%">18/11/2014 </td>
                                
                                <td width="10%">
                                
                                	<a class="ajax debitar" id=""
								    href="/GestionEconomica/DebitarCheque/ChequeId/368"
								    ><img src="/images/icons/add.png" title="Debitar"/> Debitar </a>
								    
                                
                                </td>
						    </tr>
												    <tr >
                                <td width="10%">22/08/2014 </td>
                                <td width="10%">Boker Arbolito </td>
                                <td width="10%">$ 36616.00 </td>
                                <td width="10%">B </td>
                                <td width="20%">ICBC #76383977 (Cuenta: 05280210159072)</td>
                                
                                <td width="10%">05/09/2014 </td>
                                <td width="10%">04/10/2014 </td>
                                
                                <td width="10%">
                                
                                	<a class="ajax debitar" id=""
								    href="/GestionEconomica/DebitarCheque/ChequeId/373"
								    ><img src="/images/icons/add.png" title="Debitar"/> Debitar </a>
								    
                                
                                </td>
						    </tr>
												    <tr >
                                <td width="10%">22/08/2014 </td>
                                <td width="10%">Boker Arbolito </td>
                                <td width="10%">$ 36616.88 </td>
                                <td width="10%">B </td>
                                <td width="20%">ICBC #76383978 (Cuenta: 05280210159072)</td>
                                
                                <td width="10%">05/09/2014 </td>
                                <td width="10%">04/10/2014 </td>
                                
                                <td width="10%">
                                
                                	<a class="ajax debitar" id=""
								    href="/GestionEconomica/DebitarCheque/ChequeId/374"
								    ><img src="/images/icons/add.png" title="Debitar"/> Debitar </a>
								    
                                
                                </td>
						    </tr>
												    <tr >
                                <td width="10%">22/08/2014 </td>
                                <td width="10%">Boker Arbolito </td>
                                <td width="10%">$ 36616.00 </td>
                                <td width="10%">B </td>
                                <td width="20%">ICBC #76383979 (Cuenta: 05280210159072)</td>
                                
                                <td width="10%">12/09/2014 </td>
                                <td width="10%">11/10/2014 </td>
                                
                                <td width="10%">
                                
                                	<a class="ajax debitar" id=""
								    href="/GestionEconomica/DebitarCheque/ChequeId/375"
								    ><img src="/images/icons/add.png" title="Debitar"/> Debitar </a>
								    
                                
                                </td>
						    </tr>
												    <tr >
                                <td width="10%">22/08/2014 </td>
                                <td width="10%">Boker Arbolito </td>
                                <td width="10%">$ 36616.89 </td>
                                <td width="10%">B </td>
                                <td width="20%">ICBC #76383980 (Cuenta: 05280210159072)</td>
                                
                                <td width="10%">12/09/2014 </td>
                                <td width="10%">11/10/2014 </td>
                                
                                <td width="10%">
                                
                                	<a class="ajax debitar" id=""
								    href="/GestionEconomica/DebitarCheque/ChequeId/376"
								    ><img src="/images/icons/add.png" title="Debitar"/> Debitar </a>
								    
                                
                                </td>
						    </tr>
												    <tr >
                                <td width="10%">11/09/2014 </td>
                                <td width="10%">Siris remiseria </td>
                                <td width="10%">$ 1280.00 </td>
                                <td width="10%">B </td>
                                <td width="20%">ICBC #76383984 (Cuenta: 05280210159072)</td>
                                
                                <td width="10%">15/09/2014 </td>
                                <td width="10%">14/10/2014 </td>
                                
                                <td width="10%">
                                
                                	<a class="ajax debitar" id=""
								    href="/GestionEconomica/DebitarCheque/ChequeId/392"
								    ><img src="/images/icons/add.png" title="Debitar"/> Debitar </a>
								    
                                
                                </td>
						    </tr>
						                        
                                                </table>
                    </div> <!-- /listItems -->
</div><!-- en list -->

</div>