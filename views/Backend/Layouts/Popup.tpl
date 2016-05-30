{include file="Backend/Layouts/Include/Header.tpl"}
<body class="popupLayout">
	<div class="lightbox" id="FileLightbox" style="display:block;">
	    
	    <div class="lightobxMain">
	    
		        {include file="$filterBox"}
				
				<div id="LBFilesContainer">
		        		{include file="Backend/Layouts/Include/Paginator.tpl"}
						<div class="list">
		            
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
				</div>
		</div> <!-- /selectFile -->
	        
	    </div> <!-- /lightobxMain -->
	    
	</div> <!-- /lightbox -->
</body>
</html>