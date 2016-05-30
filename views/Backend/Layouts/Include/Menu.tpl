<div id="Menu">
    <ul>
        {foreach from=$Menu item="menuItem"}
        <li>
            <a {if $menuItem.MenuId eq $activeMenu.Id}class="active"{/if} href="{$menuItem.Menu.UrlDefault}" title="{$menuItem.Menu.Name}">{$menuItem.Menu.Name}</a>
        </li>
        {/foreach}
    </ul>
</div> <!-- /Menu -->

{include file="Backend/Layouts/Include/SubMenu.tpl"}