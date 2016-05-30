{include file="Backend/Layouts/Include/Header.tpl"}
<body>
    
    <div id="Container">
            
        {include file="Backend/Layouts/Include/SiteHeader.tpl"}
            
        <script type="text/javascript" src="/scripts/List.js"></script>
            
        <div id="Content">
            <div class="listado">
                <h1>{$sectionTitle}</h1>
                <a href="/{$varController}/{$varAction}{if $rpp}/pagesize/{$list.pageSize}{/if}{if $list.page}/page/{$list.page}{/if}{if $orderBy}/order/{$orderBy}_{if $order eq 'DESC'}DESC{else}ASC{/if}{/if}/" class="linkSendHome"><img src="/images/icons/table_refresh.png" title="Volver a ver el listado completo"/> Limpiar Busqueda &raquo;</a>
                {if !$notAdd}<a href="/{$varController}/Edit" class="linkSendHome"><img src="/images/icons/add.png" title="Agregar"/>  Agregar nuevo &raquo;</a>{/if}
                {$specialLink}
                
                {if (!(($varController eq 'Insumo') || 
						($varController eq 'Orden') ||
						($varController eq 'OrdenPago') ||
						($varController eq 'Facturacion') ||
						($varController eq 'Cobranza') ||
						($varController eq 'CuentaCorriente') ||
						($varController eq 'FacturaCompra') ||
						($varController eq 'Cheque') ||
						($varController eq 'OrdenCompra')))}
                {include file="Backend/Layouts/Include/Search.tpl"}
                {/if}
            
            <form id="frmAction" action="" method="post">
                {if $filterBox}
                    {include file=$filterBox}
                {/if}
                    
                {include file="Backend/Layouts/Include/Paginator.tpl"}
                    
                <div class="list">
                    {if $deleteErrorMessage or $updateErrorMessage}<p class="error">{$deleteErrorMessage}{$updateErrorMessage}</p>{/if}
                        
                    {if $deleteSuccessMessage or $updateSuccessMessage}<p class="success">{$deleteSuccessMessage}{$updateSuccessMessage}</p>{/if}
                        
                    {include file="$titleFile"}
                        
                    <div class="listItems">
                        <table border="0" cellpadding="0" cellspacing="0">
                        {if $list.data|@count}
                            {foreach key="key" item="record" from=$list.data}
                                {if $key mod 2}{assign var="className" value=' class="gray"'}{else}{assign var="className" value=''}{/if}
                                {include file="$recordFile"}
                            {/foreach}
                        {else}
                            <tr class="noResult">
                                <td colspan="10" align="center"><h2 class="noResult">No se ha encontrado ning&uacute;n resultado.</h2></td>
                            </tr>
                        {/if}
                        </table>
                    </div> <!-- /listItems -->
                        
                </div> <!-- /list -->
                
                    
                {include file="Backend/Layouts/Include/Paginator.tpl"}
            <input type="hidden" name="updateNewValue" id="updateValue" value="" />
            <input type="hidden" name="postAction" id="action" value="" />
            <input type="hidden" name="listAction" id="listAction" value="list" />
            </form>                
            </div> <!-- /listado -->
        </div>
            
        {include file="Backend/Layouts/Include/Footer.tpl"}
            
    </div> <!-- /Container -->
    
</body>
</html>