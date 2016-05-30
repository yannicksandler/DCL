{literal}
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
{/literal}

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
				
					{if !$Bancos|@count}
						<h2>No existen bancos</h2>
					{else}
					<!-- items -->
					
					{foreach from=$Bancos item="pen"}
						<tr>
							<td width="10%">
								<p class="">
										{$pen.Codigo}
								</p>
							</td>
							<td width="10%">
								<p class="">
										{$pen.Nombre}
								</p>
							</td>
							<td width="10%">
								<p class="">
										{$pen.NumeroDeCuenta}
								</p>
							</td>
							<td width="10%">
								<p class="">
										{$pen.SaldoCuenta}
								</p>
							</td>
							<td width="10%">
								<p class="">
										{$pen.PendienteAcreditar}
								</p>
							</td>
							<td width="10%">
								<p class="">
										{$pen.PendienteDebitar}
								</p>
							</td>
							<td width="10%" align="center">
								<ul>
									<!-- 
									<li>
									<a class="" 
									    href="/GestionEconomica/EditBanco/id/{$pen.Id}"
									    ><img src="/images/icons/add.png" title=""/> Modificar </a>
									</li>
									 -->
									<li>
									<a class="popup" 
									    href="/CuentaCorriente/ListBanco/BancoId/{$pen.Id}"
									    ><img src="/images/icons/add.png" title=""/> Cta cte </a>
									</li>
								</ul>

							</td>
						</tr>
                    {/foreach}
					<!-- items -->
					{/if}
				</table>
            </div> <!-- /listItems -->

</div> <!-- /list -->            
</div> <!-- /list -->

{if !$PagoTipos}
<div class="filtersBox filtersInfoBox"> 
            <a class="" href="/GestionEconomica/EditBanco"
				><img src="/images/icons/add.png" title=""/> Agregar banco</a>
								    					    
</div> <!-- /filtersBox-->
{/if}

</div>