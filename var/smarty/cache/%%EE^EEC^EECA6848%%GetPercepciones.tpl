159
a:4:{s:8:"template";a:1:{s:37:"Backend/OrdenPago/GetPercepciones.tpl";b:1;}s:9:"timestamp";i:1411590275;s:7:"expires";i:1411590275;s:13:"cache_serials";a:0:{}}
<script type="text/javascript">
$(document).ready(function(){
    $(".AgregarPagoPercepcion").click(function(){

        if(IsSetProveedor())
        {
        	$('#PercepcionId').val($(this).attr('pagoid'));
        	GetPagos('add', $('#OrdenDePagoId').val());
        }
        else
            alert('Ingrese el proveedor');

        return false;
    });
});

</script>


<input type="hidden" id="PercepcionId" value="" />

<h2>Percepciones</h2>

<div class="list">
			      
           <div class="listTop">
                <div>
                    <table border="0" cellpadding="0" cellspacing="0">
							<tr>    
                                <td width="10%"><p>Fecha</p> </td>
                                <td width="10%"><p>FC</p> </td>
                                <td width="10%"><p>Importe</p> </td>
                                <td width="10%"><p>Tipo</p> </td>
                                
                                <td width="10%"><p>Acciones</p></td>
                            </tr>
                    </table>
                </div>
            </div> <!-- /listadoTop -->
                        
                    <div class="listItems">
                    	<table border="0" cellpadding="0" cellspacing="0" width="100%">
                                                
												    <tr >
                                <td width="10%">2014-04-14 01:44:11 </td>
                                <td width="10%">0010192047 </td>
                                <td width="10%">$ 147.67 </td>
                                <td width="10%">Percepcion IVA </td>
                                
                                <td width="10%">
                                	<a class="AgregarPagoPercepcion" pagoid="23"><img src="/images/icons/add.png" title="Agregar pago"/> Agregar percepcion</a>
                                </td>
						    </tr>
												    <tr >
                                <td width="10%">2014-07-14 11:41:02 </td>
                                <td width="10%">0010204018 </td>
                                <td width="10%">$ 662.69 </td>
                                <td width="10%">Percepcion IVA </td>
                                
                                <td width="10%">
                                	<a class="AgregarPagoPercepcion" pagoid="57"><img src="/images/icons/add.png" title="Agregar pago"/> Agregar percepcion</a>
                                </td>
						    </tr>
												    <tr >
                                <td width="10%">2014-07-14 11:40:02 </td>
                                <td width="10%">0010204018 </td>
                                <td width="10%">$ 662.69 </td>
                                <td width="10%">Percepcion IVA </td>
                                
                                <td width="10%">
                                	<a class="AgregarPagoPercepcion" pagoid="55"><img src="/images/icons/add.png" title="Agregar pago"/> Agregar percepcion</a>
                                </td>
						    </tr>
												    <tr >
                                <td width="10%">2014-07-14 11:38:53 </td>
                                <td width="10%">0010204018 </td>
                                <td width="10%">$ 662.69 </td>
                                <td width="10%">Percepcion IVA </td>
                                
                                <td width="10%">
                                	<a class="AgregarPagoPercepcion" pagoid="53"><img src="/images/icons/add.png" title="Agregar pago"/> Agregar percepcion</a>
                                </td>
						    </tr>
												    <tr >
                                <td width="10%">2014-07-14 11:32:53 </td>
                                <td width="10%">0010204018 </td>
                                <td width="10%">$ 662.69 </td>
                                <td width="10%">Percepcion IVA </td>
                                
                                <td width="10%">
                                	<a class="AgregarPagoPercepcion" pagoid="51"><img src="/images/icons/add.png" title="Agregar pago"/> Agregar percepcion</a>
                                </td>
						    </tr>
												    <tr >
                                <td width="10%">2014-06-17 02:50:22 </td>
                                <td width="10%">006300019427 </td>
                                <td width="10%">$ 374.06 </td>
                                <td width="10%">Percepcion IVA </td>
                                
                                <td width="10%">
                                	<a class="AgregarPagoPercepcion" pagoid="46"><img src="/images/icons/add.png" title="Agregar pago"/> Agregar percepcion</a>
                                </td>
						    </tr>
												    <tr >
                                <td width="10%">2014-05-14 11:25:34 </td>
                                <td width="10%">0010195604 </td>
                                <td width="10%">$ 58.66 </td>
                                <td width="10%">Percepcion IVA </td>
                                
                                <td width="10%">
                                	<a class="AgregarPagoPercepcion" pagoid="44"><img src="/images/icons/add.png" title="Agregar pago"/> Agregar percepcion</a>
                                </td>
						    </tr>
												    <tr >
                                <td width="10%">2014-04-21 04:30:05 </td>
                                <td width="10%">0010192074 </td>
                                <td width="10%">$ 205.20 </td>
                                <td width="10%">Percepcion IVA </td>
                                
                                <td width="10%">
                                	<a class="AgregarPagoPercepcion" pagoid="39"><img src="/images/icons/add.png" title="Agregar pago"/> Agregar percepcion</a>
                                </td>
						    </tr>
												    <tr >
                                <td width="10%">2014-04-21 04:12:48 </td>
                                <td width="10%">0010192047 </td>
                                <td width="10%">$ 147.67 </td>
                                <td width="10%">Percepcion IVA </td>
                                
                                <td width="10%">
                                	<a class="AgregarPagoPercepcion" pagoid="37"><img src="/images/icons/add.png" title="Agregar pago"/> Agregar percepcion</a>
                                </td>
						    </tr>
												    <tr >
                                <td width="10%">2014-04-16 06:57:40 </td>
                                <td width="10%">5435345 </td>
                                <td width="10%">$ 50.00 </td>
                                <td width="10%">Percepcion IVA </td>
                                
                                <td width="10%">
                                	<a class="AgregarPagoPercepcion" pagoid="35"><img src="/images/icons/add.png" title="Agregar pago"/> Agregar percepcion</a>
                                </td>
						    </tr>
												    <tr >
                                <td width="10%">2014-04-16 06:37:36 </td>
                                <td width="10%">0010 </td>
                                <td width="10%">$ 147.67 </td>
                                <td width="10%">Percepcion IVA </td>
                                
                                <td width="10%">
                                	<a class="AgregarPagoPercepcion" pagoid="33"><img src="/images/icons/add.png" title="Agregar pago"/> Agregar percepcion</a>
                                </td>
						    </tr>
												    <tr >
                                <td width="10%">2014-04-16 06:32:40 </td>
                                <td width="10%">0010 </td>
                                <td width="10%">$ 147.67 </td>
                                <td width="10%">Percepcion IVA </td>
                                
                                <td width="10%">
                                	<a class="AgregarPagoPercepcion" pagoid="31"><img src="/images/icons/add.png" title="Agregar pago"/> Agregar percepcion</a>
                                </td>
						    </tr>
												    <tr >
                                <td width="10%">2014-04-14 02:23:21 </td>
                                <td width="10%">0010192047 </td>
                                <td width="10%">$ 147.67 </td>
                                <td width="10%">Percepcion IVA </td>
                                
                                <td width="10%">
                                	<a class="AgregarPagoPercepcion" pagoid="29"><img src="/images/icons/add.png" title="Agregar pago"/> Agregar percepcion</a>
                                </td>
						    </tr>
												    <tr >
                                <td width="10%">2014-04-14 02:18:58 </td>
                                <td width="10%">0010192047 </td>
                                <td width="10%">$ 147.67 </td>
                                <td width="10%">Percepcion IVA </td>
                                
                                <td width="10%">
                                	<a class="AgregarPagoPercepcion" pagoid="27"><img src="/images/icons/add.png" title="Agregar pago"/> Agregar percepcion</a>
                                </td>
						    </tr>
												    <tr >
                                <td width="10%">2014-04-14 01:46:30 </td>
                                <td width="10%">0010192047 </td>
                                <td width="10%">$ 147.67 </td>
                                <td width="10%">Percepcion IVA </td>
                                
                                <td width="10%">
                                	<a class="AgregarPagoPercepcion" pagoid="25"><img src="/images/icons/add.png" title="Agregar pago"/> Agregar percepcion</a>
                                </td>
						    </tr>
												    <tr >
                                <td width="10%">2014-09-11 12:45:02 </td>
                                <td width="10%">001010183 </td>
                                <td width="10%">$ 147.67 </td>
                                <td width="10%">Percepcion IVA </td>
                                
                                <td width="10%">
                                	<a class="AgregarPagoPercepcion" pagoid="62"><img src="/images/icons/add.png" title="Agregar pago"/> Agregar percepcion</a>
                                </td>
						    </tr>
						                        
                                                </table>
                    </div> <!-- /listItems -->
</div><!-- en list -->