{if $activeMenu.SubMenu}
<div class="subMenu">
    <ul>
        {foreach from=$activeMenu.SubMenu item="subMenu"}
        <li>
            <a href="{$subMenu.Url}" title="{$subMenu.Name}">{$subMenu.Name}</a>
        </li>
        {/foreach}
    </ul>
</div>
{/if}