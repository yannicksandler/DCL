<link rel="stylesheet" href="/scripts/colorbox-master/colorbox-master/example1/colorbox.css" />
<script src="/scripts/colorbox-master/colorbox-master/jquery.colorbox.js"></script>

{literal}
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
{/literal}

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
                        {if !$Cheques|@count}
                        	<tr class="noResult">
                                <td colspan="10" align="center"><h2 class="noResult">No se ha encontrado ning&uacute;n cheque.</h2></td>
                            </tr>
                        {else}
                        
						{foreach from=$Cheques item="d"}
						    <tr {$className}>
                                <td width="10%">{$d.FechaEmision} </td>
                                <td width="10%">{$d.Cliente.Nombre|escape:'htmlall'} </td>
                                <td width="10%">$ {$d.Importe} </td>
                                <td width="10%">{$d.Tipo} </td>
                                <td width="20%">{$d.NombreBanco} #{$d.Numero} (Cuenta: {$d.Cuenta})</td>
                                <td width="10%">{$d.FechaCobro} </td>
                                <td width="10%">{$d.FechaVencimiento} </td>
                                
                                <td width="10%">
                                
                                	<a class="ajax acreditar" id=""
								    href="/GestionEconomica/AcreditarCheque/ChequeId/{$d.Id}"
								    ><img src="/images/icons/add.png" title="Acreditar"/> Acreditar </a>
								    <br>
								    <a class="ajax confirmar" id="rechazoid"
								    href="/GestionEconomica/RechazarCheque/ChequeId/{$d.Id}"
								    ><img src="/images/icons/add.png" title="Rechazado"/> Rechazado </a>
                                
                                </td>
						    </tr>
						{/foreach}
                        
                        {/if}
                        </table>
                    </div> <!-- /listItems -->
</div><!-- en list -->