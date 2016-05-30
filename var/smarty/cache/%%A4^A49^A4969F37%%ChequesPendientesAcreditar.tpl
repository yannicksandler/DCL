177
a:4:{s:8:"template";a:1:{s:55:"Backend/GestionEconomica/ChequesPendientesAcreditar.tpl";b:1;}s:9:"timestamp";i:1452626330;s:7:"expires";i:1452626330;s:13:"cache_serials";a:0:{}}<link rel="stylesheet" href="/scripts/colorbox-master/colorbox-master/example1/colorbox.css" />
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

    $(".acreditar").click(function(){

        var r = confirm('Esta seguro que desea acreditar el cheque?');

        if(r)
            return true;

        return false;
    });

    $(".confirmar").click(function(){

		var a = confirm('Esta seguro que desea rechazar el cheque?');
		if(a)
		{
			var importe=prompt("Ingresar el importe del gasto por rechazo","0");
			if (importe!=null && importe!="")
			{

			  var url	=	$('#rechazoid').attr('href');
			  url	=	url+'/CostoRechazo/'+importe;

			  $('#rechazoid').attr('href', url);
			  
			  return true;
			}
			
		}

		return false;
    });
});

</script>


<h1>Cheques pendientes de acreditar</h1>

<div class="list" style="width:90%">
			      
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
                                                	<tr class="noResult">
                                <td colspan="10" align="center"><h2 class="noResult">No se ha encontrado ning&uacute;n cheque.</h2></td>
                            </tr>
                                                </table>
                    </div> <!-- /listItems -->
</div><!-- en list -->