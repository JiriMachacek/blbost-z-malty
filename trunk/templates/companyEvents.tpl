{if $tpl_edit}
<ul class="editmenu">
                <li class="editmenu"><a href="{$baseURI}{$tpl_curl}/events/add/">add new evet</a></li>
            </ul>
{/if}
{foreach from=$events item=item}
<table width="100%" cellpadding="0" cellspacing="0" border="0">
                        	<tr>
                            	<td><strong>{$item.title}</strong></td>
                            </tr>
                           	<tr>
                                <td><em>{$item.date|date_format:"%B %e, %Y"}</em></td>
                            </tr>
                            <tr>
                            	<td>{$item.text}</td>
                            </tr>
                        </table>
               	    <hr class="hr"/>
{foreachelse}
No events found.
{/foreach}


{if $tpl_edit}
<ul class="editmenu">
                <li class="editmenu"><a href="{$baseURI}{$tpl_curl}/events/add/">add new event</a></li>
            </ul>
{/if}