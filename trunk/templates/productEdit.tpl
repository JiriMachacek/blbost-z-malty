                    <form action="{$baseURI}company/{$tpl_company.url}/products/edit-product/{$product.0.id_product}/" method="post" enctype="multipart/form-data" name="form2" id="form2">
                        <input type="hidden" name="edit" value="{$product.0.id_product}" />
                   	  <h2>Product {$product.0.name}</h2>
                         <label for="productname">Product name</label>
                <input name="productname" type="text" id="productname" value="{$product.0.name}" size="60" />
              
               	    	<table width="100%" cellpadding="0" cellspacing="2" border="0">
                        	<tr>
                                {if $product.0.image eq ''}
                                <td width="100" valign="top"><img src="{$baseURI}images/companies/default.jpg" alt="{$product.0.name}" width="100" /></td>
                                {else}
                            	<td width="100" valign="top"><img src="{$baseURI}images/products/{$product.0.image}.jpg" alt="{$product.0.name}" width="100" /><br /><a href="{$baseURI}company/{$tpl_company.url}/products/products-delete-image/{$product.0.id_product}/{$product.0.image}/">Delete image</a></td>
                                {/if}
                                <td valign="top"> <textarea name="productsummary" id="productsummary" cols="60" rows="5" onkeyup="counterUpdate('productsummary', 'countBody','200');">{$product.0.description}</textarea><br />
                            You typed <B><span id="countBody">0</span></b> characters.  Maximum: 200 characters <br />
                                <br />
                                Price: &euro; <input name="price" type="text" value="{$product.0.price}" />
                                <br />
                                {if $product.0.image eq ''}
                                Image:
                                <label>
                                  <input type="file" name="backup" id="backup" />
                                </label>
                                {else}
                            	{/if}
                                </td>
                            </tr>
                        	<tr>
                        	  <td valign="top">&nbsp;</td>
                        	  <td valign="top">
                                    <input type="image" name="update" value="update" src="{$baseURI}images/buttonMenuUpdate.jpg">
                              <!--ul class="editmenu" >

                                    <li class="editmenu" style="float:left; padding-right:3px"><a href="{$baseURI}company/{$tpl_company.url}/products/edit-product/{$product.0.id_product}/">update</a></li>
                                </ul--></td>
                      	  </tr>
                        </table>
                        </form>
                	