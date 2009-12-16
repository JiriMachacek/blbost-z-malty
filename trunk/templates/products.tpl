{foreach from=$products item=i name=pr}
                   	  <h2>{$i.name} |{$i.image}|</h2>
               	    	<table width="100%" cellpadding="0" cellspacing="2" border="0">
                        	<tr>
                                {if $i.image neq ""}
                            	<td width="100" valign="top"><img src="{$baseURI}images/products/{$i.image}.jpg" alt="{$i.name}" width="100" /></td>
                                {else}
                                <td width="100" valign="top"><img src="{$baseURI}images/products/default.jpg" alt="{$i.name}" width="100" /></td>
                                {/if}
                                <td valign="top"> {$i.description}<br />
                                <br />
                                Price: &euro;{$i.price}</td>
                            </tr>
                        </table>
                   	  <hr class="hr"/>
{foreachelse}
                            <li>No products found.</li>
{/foreach}