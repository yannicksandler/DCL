<form method="post">
    <!--    para eliminar   
    <input type="text" name="toDelete[]" value="47">
    <input type="text" name="toDelete[]" value="48">
    -->
    <!--    para updatear   -->
    <input type="text" name="toUpdate[]" value="44">
    <input type="text" name="toUpdate[]" value="45">
    <input type="hidden" name="updateNewValue" value="0">
        
    <input type="submit" />
</form>

{if $list|@count}
    {if $list.data}
        {foreach from=$list.data item="data"}
        </br>{$data.Id} : {$data.Name}
        {/foreach}
    {/if}</br></br></br></br></br>
{/if}

<pre>
{$listErrorMessage}
{if $updateErrorMessage}
{$updateErrorMessage}
{$updateErrorException}
{/if}
{$updateSuccessMessage}
</pre>