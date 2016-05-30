{include file="Backend/Layouts/Include/Header.tpl"}

<body class="popupLayout">

	<div class="lightbox" id="FileLightbox" style="display:block;">

		{if $SuccessMessage}
            <p class="success" style="width:61%;">{$SuccessMessage}</p>
        {elseif $ErrorMessage}
            <p class="error" style="width:61%;">{$ErrorMessage}</p>
        {/if}
	   	        
	</div> <!-- end filelightbox --> 

</body>
</html>