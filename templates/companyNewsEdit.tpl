{if $tpl_edit}
<ul class="editmenu">
                <li class="editmenu"><a href="{$baseURI}{$tpl_curl}/news/add/">add new news</a></li>
            </ul>
{/if}
{foreach from=$news item=item}
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
                                    <li class="editmenu" style="float:left; padding-right:3px"><a href="{$baseURI}{$tpl_curl}/news/del/{$item.id_news}/">remove news</a></li>
                                    <li class="editmenu" style="float:left; padding-right:3px"><a href="{$baseURI}{$tpl_curl}/news/edit/{$item.id_news}/">edit news</a></li>
                                  </ul>
                               </td>
                            </tr>

                        </table>
               	    <hr class="hr"/>
{/foreach}


{if $tpl_edit}
<ul class="editmenu">
                <li class="editmenu"><a href="{$baseURI}{$tpl_curl}/news/add/">add new news</a></li>
            </ul>
{/if}