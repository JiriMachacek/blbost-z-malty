                    <form action="{$baseURI}company/{$tpl_company.url}/products/add-product/" method="post" enctype="multipart/form-data" name="form2" id="form2">
                        <input type="hidden" name="add" value="add" />
                   	  <h2>Product</h2>
                         <label for="productname">Product name</label>
                <input name="productname" type="text" id="productname" value="" size="60" />
              
               	    	<table width="100%" cellpadding="0" cellspacing="2" border="0">
                        	<tr>
                                <td>&nbsp;</td>
                                <td valign="top"> <textarea name="productsummary" id="productsummary" cols="60" rows="5" onkeyup="counterUpdate('productsummary', 'countBody','200');"></textarea><br />
                            You typed <B><span id="countBody">0</span></b> characters.  Maximum: 200 characters <br />
                                <br />
                                Price: &euro; <input name="price" type="text" value="" />
                                <br />                           
                                Image:
                                <label>
                                  <input type="file" name="backup" id="backup" />
                                </label>
                                </td>
                            </tr>
                        	<tr>
                        	  <td valign="top">&nbsp;</td>
                        	  <td valign="top">
                                    <input type="image" name="add" value="add" src="{$baseURI}images/buttonMenuAdd.jpg">
                              <!--ul class="editmenu" >

                                    <li class="editmenu" style="float:left; padding-right:3px"><a href="{$baseURI}company/{$tpl_company.url}/products/add-product/">update</a></li>
                                </ul--></td>
                      	  </tr>
                        </table>
                        </form>
                	