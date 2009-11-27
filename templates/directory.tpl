    <tr>
        <td width="46px"></td>
        <td class="DirectoryTitle">Directory</td>
    </tr>
    <tr>
        <td width="46px"></td>
        <td class="DirectoryText">
        	<table width="100%" cellpadding="0px" cellspacing="0px" border="0px">
              
{foreach from=$directory item=i name=directory}
    {if ($smarty.foreach.directory.index) is div by 4 || $smarty.foreach.directory.index eq 0}
    <tr>
    <td width="25%">
    {else}
    <td width="25%">
    {/if}
    <h1>{$i.name}</h1>
        {foreach from=$category item=j name=category}
            {if $smarty.foreach.directory.index+1 eq $j.directory_id_directory}
            <a href="{$baseURI}category/{$j.name}/" >{$j.name},</a>
            {else}
            {/if}
        {/foreach}
    {if ($smarty.foreach.directory.index+1) is div by 4 && $smarty.foreach.directory.index neq 0 && $smarty.foreach.directory.index neq $smarty.foreach.directory.last}
    </td>
    </tr>
    {else}
    </td>
    {/if}
{foreachelse}

    <tr>
        <td width="46px"></td>
        <td class="DirectoryTitle">No categories found.</td>
    </tr>
{/foreach}
</tr>
            </table>
        </td>
    </tr>