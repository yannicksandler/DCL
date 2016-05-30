{include file="Backend/Layouts/Include/Header.tpl"}
<body>
    <div id="Container">
        {include file="Backend/Layouts/Include/SiteHeader.tpl"}
        
        <div id="Content">
            <div class="listado">    
                {$Main}
            </div>
        </div>
            
        {include file="Backend/Layouts/Include/Footer.tpl"}
    </div> <!-- /Container -->
</body>
</html>