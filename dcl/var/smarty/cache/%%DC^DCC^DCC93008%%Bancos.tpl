157
a:4:{s:8:"template";a:1:{s:35:"Backend/GestionEconomica/Bancos.tpl";b:1;}s:9:"timestamp";i:1411133901;s:7:"expires";i:1411133901;s:13:"cache_serials";a:0:{}}
<script type="text/javascript">
$(document).ready(function(){
	$('.popup').click(function() {
		
        var url 		= $(this).attr('href');
        var opciones="toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=yes, width=1000, height=700, top=85, left=140";

		abrirPopUp(url, opciones);

		return false;
  	});
});

function abrirPopUp(pagina, opciones)
{
	window.open(pagina,"",opciones);
}
</script>


<div>
           
<br>    
								    
<div class="list">

<h2>Saldos bancarios</h2>

	<div class="list">

        		<div class="listTop">
					<div>
						<table border="0" cellpadding="0" cellspacing="0">
							<tr>
								<td width="10%"><p>Codigo</p></td>
								<td width="10%"><p>Banco</p></td>
								<td width="10%"><p>Cuenta</p></td>
								<td width="10%"><p>Saldo</p></td>
								<td width="10%"><p>A acreditar</p></td> 
								<td width="10%"><p>A debitar</p></td>  
								<td width="10%"><p>Acciones</p></td>
							</tr>
						</table>
					</div>
                </div> <!-- /listadoTop -->
                
        <div class="listItems">
                        
				<table border="0" cellpadding="0" cellspacing="0">
				
										<!-- items -->
					
											<tr>
							<td width="10%">
								<p class="">
										015
								</p>
							</td>
							<td width="10%">
								<p class="">
										ICBC
								</p>
							</td>
							<td width="10%">
								<p class="">
										05280210159072
								</p>
							</td>
							<td width="10%">
								<p class="">
										291455.75
								</p>
							</td>
							<td width="10%">
								<p class="">
										0.00
								</p>
							</td>
							<td width="10%">
								<p class="">
										181689.67
								</p>
							</td>
							<td width="10%" align="center">
								<ul>
									<!-- 
									<li>
									<a class="" 
									    href="/GestionEconomica/EditBanco/id/1"
									    ><img src="/images/icons/add.png" title=""/> Modificar </a>
									</li>
									 -->
									<li>
									<a class="popup" 
									    href="/CuentaCorriente/ListBanco/BancoId/1"
									    ><img src="/images/icons/add.png" title=""/> Cta cte </a>
									</li>
								</ul>

							</td>
						</tr>
                    						<tr>
							<td width="10%">
								<p class="">
										1111
								</p>
							</td>
							<td width="10%">
								<p class="">
										Plazo Fijo ICBC
								</p>
							</td>
							<td width="10%">
								<p class="">
										00000000
								</p>
							</td>
							<td width="10%">
								<p class="">
										0.00
								</p>
							</td>
							<td width="10%">
								<p class="">
										0.00
								</p>
							</td>
							<td width="10%">
								<p class="">
										0.00
								</p>
							</td>
							<td width="10%" align="center">
								<ul>
									<!-- 
									<li>
									<a class="" 
									    href="/GestionEconomica/EditBanco/id/20"
									    ><img src="/images/icons/add.png" title=""/> Modificar </a>
									</li>
									 -->
									<li>
									<a class="popup" 
									    href="/CuentaCorriente/ListBanco/BancoId/20"
									    ><img src="/images/icons/add.png" title=""/> Cta cte </a>
									</li>
								</ul>

							</td>
						</tr>
                    					<!-- items -->
									</table>
            </div> <!-- /listItems -->

</div> <!-- /list -->            
</div> <!-- /list -->

<div class="filtersBox filtersInfoBox"> 
            <a class="" href="/GestionEconomica/EditBanco"
				><img src="/images/icons/add.png" title=""/> Agregar banco</a>
								    					    
</div> <!-- /filtersBox-->

</div>