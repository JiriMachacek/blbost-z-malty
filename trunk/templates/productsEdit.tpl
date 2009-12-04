        	<ul class="editmenu">
                <li class="editmenu"><a href="{$baseURI}company/{$tpl_company.url}/products/add-product/">add new entry</a></li>
            </ul>
{foreach from=$products item=i name=pr}
                   	  <h2>{$i.name}</h2>
               	    	<table width="100%" cellpadding="0" cellspacing="2" border="0">
                        	<tr>
                            	<td width="100" valign="top"><img src="{$baseURI}images/products/{$i.image}.jpg" alt="{$i.name}" width="100" /></td>
                                <td valign="top"> {$i.description}<br />
                                <br />
                                Price: &euro;{$i.price}</td>
                            </tr>
                        	<tr>
                        	  <td valign="top">&nbsp;</td>
                        	  <td valign="top">
                              <ul class="editmenu" >
                                    <li class="editmenu" style="float:left; padding-right:3px"><a href="{$baseURI}company/{$tpl_company.url}/products/delete-product/{$i.id_product}/">remove product</a></li>
                                    <li class="editmenu" style="float:left; padding-right:3px"><a href="{$baseURI}company/{$tpl_company.url}/products/edit-product/{$i.id_product}/">edit product</a></li>
                                  </ul>
                              
                              </td>
                      	  </tr>
                        </table>
                   	  <hr class="hr"/>
{foreachelse}
                            <li>No products found.</li>
{/foreach}
        	<ul class="editmenu">
                <li class="editmenu"><a href="{$baseURI}company/{$tpl_company.url}/products/add-product/">add new entry</a></li>
            </ul>
           