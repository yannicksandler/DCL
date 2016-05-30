{if $varController eq 'Proveedor'}
{literal}


<link type="text/css" href="/styles/ui-lightness/jquery-ui-1.8.2.custom.css" rel="stylesheet" />
<script type="text/javascript" src="/scripts/jquery/jquery-ui-1.8.4.custom.min.js"></script>

<script type="text/javascript">

$(document).ready(function(){    
    var availableTags = [
							{/literal}{$ArrayProveedores}{literal}
                       ];
    

    $("input#search").autocomplete({
        source: availableTags,
      //define select handler
		select: function(e, ui) {
			var valor = ui.item.value;
			//SetProveedor(valor);
		} 
    });  

});

</script>
{/literal}
{/if}

<div class="grayBox">
    <form id="frmSearch" action="" redirect="/{$varController}/{$varAction}{if $rpp}/pagesize/{$rpp}{/if}{if $page}/page/{$page}{/if}{if $orderBy}/order/{$orderBy}_{if $order eq 'DESC'}DESC{else}ASC{/if}{/if}/search/">
    <div>
        <span>Buscar</span>
        
        <input type="text" class="search" id="search" value="{$search}" />
        
    </div>
    </form>
</div>