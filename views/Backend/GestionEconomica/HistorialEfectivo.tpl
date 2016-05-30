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
});

</script>
{/literal}

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
                        {if !$Historial|@count}
                        	<tr class="noResult">
                                <td colspan="10" align="center"><h2 class="noResult">No se ha encontrado ning&uacute;n registro.</h2></td>
                            </tr>
                        {else}
                        
						{foreach from=$Historial item="d"}
						    <tr {$className}>
                                <td width="10%">{$d.Fecha} </td>
                                <td width="10%">{if $d.Debe}$ {$d.Debe}{/if}</td>
                                <td width="10%">{if $d.Haber}$ {$d.Haber}{/if}</td>
                                <td width="20%">{$d.Detalle} </td>
                                <td width="10%">{$d.Saldo} </td>
                                <!-- 
                                <td width="10%">			    
                                	 
                                </td>
                                 -->
						    </tr>
						{/foreach}
                        
                        {/if}
                        </table>
                    </div> <!-- /listItems -->
</div><!-- en list -->