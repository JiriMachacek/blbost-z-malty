
{foreach from=$guestbook item=item}
<hr class="hr"/>
<table width="100%" cellpadding="0" cellspacing="0" border="0">
                        	<tr>
                            	<td width="74">Name:</td>
                                <td><strong>{$item.name}</strong></td>
                            </tr>
                           	<tr>
                                <td>Comment:</td>
                                <td>{$item.comment}</td>
                            </tr>
                            <tr>
                            	<td></td>
                                <td><em>Added: {$item.date|date_format:"%B %e, %Y"}<br />IP: {$item.ip}</em></td>
                            </tr>
                            <tr>
                              <td></td>
                              <td>
                                  <ul class="editmenu" >
                                    <li class="editmenu" style="float:left; padding-right:3px"><a href="{$baseURI}{$tpl_curl}/guestbook/edit/{$item.id_guestbook}/">remove comment</a></li>
                                  </ul>
                              </td>
                            </tr>

</table>
{foreachelse}
    nic pico
{/foreach}