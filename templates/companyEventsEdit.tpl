{if $tpl_edit}
<ul class="editmenu">
                <li class="editmenu"><a href="{$baseURI}{$tpl_curl}/events/add/">add new event</a></li>
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
                            <tr>
                              <td>
                              <ul class="editmenu" >
                                    <li class="editmenu" style="float:left; padding-right:3px"><a href="{$baseURI}{$tpl_curl}/events/del/{$item.id_events}/">remove event</a></li>
                                    <li class="editmenu" style="float:left; padding-right:3px"><a href="{$baseURI}{$tpl_curl}/events/edit/{$item.id_events}/">edit event</a></li>
                                  </ul>
                               </td>
                            </tr>

                        </table>
               	    <hr class="hr"/>
{/foreach}


{if $tpl_edit}
<ul class="editmenu">
                <li class="editmenu"><a href="{$baseURI}{$tpl_curl}/events/add/">add new event</a></li>
            </ul>
{/if}