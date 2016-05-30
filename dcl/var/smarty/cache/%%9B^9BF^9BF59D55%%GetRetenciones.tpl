158
a:4:{s:8:"template";a:1:{s:36:"Backend/OrdenPago/GetRetenciones.tpl";b:1;}s:9:"timestamp";i:1410535384;s:7:"expires";i:1410535384;s:13:"cache_serials";a:0:{}}
<script type="text/javascript">
$(document).ready(function(){
    $(".AgregarPagoRetencion").click(function(){

        if(IsSetProveedor())
        {
        	$('#RetencionId').val($(this).attr('pagoid'));
        	GetPagos('add', $('#OrdenDePagoId').val());
        }
        else
            alert('Ingrese el cliente');

        return false;
    });
});

</script>


<input type="hidden" id="RetencionId" value="" />

<h2>Retenciones</h2>

<div class="list">
			      
           <div class="listTop">
                <div>
                    <table border="0" cellpadding="0" cellspacing="0">
							<tr>    
                                <td width="10%"><p>Fecha CO</p> </td>
                                <td width="10%"><p>CO</p> </td>
                                <td width="10%"><p>Detalle</p> </td>
                                <td width="10%"><p>Importe</p> </td>
                                
                                <td width="10%"><p>Acciones</p></td>
                            </tr>
                    </table>
                </div>
            </div> <!-- /listadoTop -->
                    
                    <div class="listItems">
                    	<table border="0" cellpadding="0" cellspacing="0" width="100%">
                                                
												    <tr >
                                <td width="10%">11/09/2014 </td>
                                <td width="10%">199 <br>(Caba&ntilde;a Argentina)</td>
                                <td width="10%">Retencion ganacias </td>
                                <td width="10%">$ 4510.62 </td>
                                
                                <td width="10%">
                                	<a class="AgregarPagoRetencion" pagoid="605"><img src="/images/icons/add.png" title="Agregar pago"/> Agregar retencion</a>
                                </td>
						    </tr>
						                        
                                                </table>
                    </div> <!-- /listItems -->
</div><!-- en list -->