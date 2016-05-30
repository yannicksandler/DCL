175
a:4:{s:8:"template";a:1:{s:53:"Backend/GestionEconomica/ChequesPendientesDebitar.tpl";b:1;}s:9:"timestamp";i:1462381506;s:7:"expires";i:1462381506;s:13:"cache_serials";a:0:{}}<link rel="stylesheet" href="/scripts/colorbox-master/colorbox-master/example1/colorbox.css" />
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
                                <td width="10%">28/04/2016 </td>
                                <td width="10%">Lamigraf </td>
                                <td width="10%">$ 1867.64 </td>
                                <td width="10%">B </td>
                                <td width="20%">ICBC #82641451 (Cuenta: 05280210308263)</td>
                                
                                <td width="10%">30/05/2016 </td>
                                <td width="10%">28/06/2016 </td>
                                
                                <td width="10%">
                                
                                	<a class="ajax debitar" id=""
								    href="/GestionEconomica/DebitarCheque/ChequeId/798"
								    ><img src="/images/icons/add.png" title="Debitar"/> Debitar </a>
								    
                                
                                </td>
						    </tr>
												    <tr >
                                <td width="10%">03/05/2016 </td>
                                <td width="10%">Raal </td>
                                <td width="10%">$ 4487.69 </td>
                                <td width="10%">B </td>
                                <td width="20%">ICBC #82641452 (Cuenta: 05280210308263)</td>
                                
                                <td width="10%">03/06/2016 </td>
                                <td width="10%">02/07/2016 </td>
                                
                                <td width="10%">
                                
                                	<a class="ajax debitar" id=""
								    href="/GestionEconomica/DebitarCheque/ChequeId/801"
								    ><img src="/images/icons/add.png" title="Debitar"/> Debitar </a>
								    
                                
                                </td>
						    </tr>
						                        
                                                </table>
                    </div> <!-- /listItems -->
</div><!-- en list -->

</div>