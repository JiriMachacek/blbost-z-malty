                    <form action="{$baseURI}company/{$tpl_company.url}/edit/update/" method="post" enctype="multipart/form-data" name="form2" id="form2">
                        <input type="hidden" name="id_company" value="{$tpl_company.id_company}" />
                   	  <h2>{$company.name}</h2>
                         
              
               	    	<table width="100%" cellpadding="0" cellspacing="2" border="0">
                            <tr>
                                <td valign="top">
                                    <label for="name">Company name</label>
                                </td>
                                <td valign="top">
                                    <input name="name" type="text" id="name" value="{$company.name}" size="60" />
                                </td>
                            </tr>
                            <tr>
                                <td valign="top">
                                    <label for="content">Company content</label>
                                </td>
                                <td valign="top">
                                    <input name="content" type="text" id="content" value="{$company.content}" size="60" />
                                </td>
                            </tr>
                            <tr>
                                <td valign="top">
                                    <label for="adress_adress">Adress number</label>
                                </td>
                                <td valign="top">
                                    <input name="adress_adress" type="text" id="adress_adress" value="{$company.adress_adress}" size="60" />
                                </td>
                            </tr>
                            <tr>
                                <td valign="top">
                                    <label for="adress_street">Adress street</label>
                                </td>
                                <td valign="top">
                                    <input name="adress_street" type="text" id="adress_street" value="{$company.adress_street}" size="60" />
                                </td>
                            </tr>
                            <tr>
                                <td valign="top">
                                    <label for="adress_post">Adress post</label>
                                </td>
                                <td valign="top">
                                    <input name="adress_post" type="text" id="adress_post" value="{$company.adress_post}" size="60" />
                                </td>
                            </tr>
                            <tr>
                                <td valign="top">
                                    <label for="adress_country">Adress country</label>
                                </td>
                                <td valign="top">
                                    {if isset($company.adress_country)}
                                        {html_options name=adress_country options=$country selected=$company.adress_country}
                                    {else}
                                        {html_options name=adress_country options=$country}
                                    {/if}
                                </td>
                            </tr>
                            <tr>
                                <td valign="top">
                                    <label for="contact_name1">Contact name 1</label>
                                </td>
                                <td valign="top">
                                    <input name="contact_name1" type="text" id="contact_name1" value="{$company.contact_name1}" size="60" />
                                </td>
                            </tr>
                            <tr>
                                <td valign="top">
                                    <label for="contact_surname1">Contact surname 1</label>
                                </td>
                                <td valign="top">
                                    <input name="contact_surname1" type="text" id="contact_surname1" value="{$company.contact_surname1}" size="60" />
                                </td>
                            </tr>
                            <tr>
                                <td valign="top">
                                    <label for="contact_name2">Contact name 2</label>
                                </td>
                                <td valign="top">
                                    <input name="contact_name2" type="text" id="contact_name2" value="{$company.contact_name2}" size="60" />
                                </td>
                            </tr>
                            <tr>
                                <td valign="top">
                                    <label for="contact_surname2">Contact surname 2</label>
                                </td>
                                <td valign="top">
                                    <input name="contact_surname2" type="text" id="contact_surname2" value="{$company.contact_surname2}" size="60" />
                                </td>
                            </tr>
                            <tr>
                                <td valign="top">
                                    <label for="contact_tel1">Tel 1</label>
                                </td>
                                <td valign="top">
                                    <input name="contact_tel1" type="text" id="contact_tel1" value="{$company.contact_tel1}" size="60" />
                                </td>
                            </tr>
                            <tr>
                                <td valign="top">
                                    <label for="contact_tel2">Tel 2</label>
                                </td>
                                <td valign="top">
                                    <input name="contact_tel2" type="text" id="contact_tel2" value="{$company.contact_tel2}" size="60" />
                                </td>
                            </tr>
                            <tr>
                                <td valign="top">
                                    <label for="contact_mob">Mob</label>
                                </td>
                                <td valign="top">
                                    <input name="contact_mob" type="text" id="contact_mob" value="{$company.contact_mob}" size="60" />
                                </td>
                            </tr>
                            <tr>
                                <td valign="top">
                                    <label for="contact_fax">Fax</label>
                                </td>
                                <td valign="top">
                                    <input name="contact_fax" type="text" id="contact_fax" value="{$company.contact_fax}" size="60" />
                                </td>
                            </tr>
                            <tr>
                                <td valign="top">
                                    <label for="contact_email">E-mail</label>
                                </td>
                                <td valign="top">
                                    <input name="contact_email" type="text" id="contact_email" value="{$company.contact_email}" size="60" />
                                </td>
                            </tr>
                            <tr>
                                <td valign="top">
                                    <label for="contact_mob">Mob</label>
                                </td>
                                <td valign="top">
                                    <input name="contact_mob" type="text" id="contact_mob" value="{$company.contact_mob}" size="60" />
                                </td>
                            </tr>
                            <tr>
                                <td valign="top">
                                    <label for="contact_www">www</label>
                                </td>
                                <td valign="top">
                                    <input name="contact_www" type="text" id="contact_www" value="{$company.contact_www}" size="60" />
                                </td>
                            </tr>
                        	<tr>
                        	  <td valign="top">&nbsp;</td>
                        	  <td valign="top">
                                    <input type="image" name="update" value="update" src="{$baseURI}images/buttonMenuUpdate.jpg">
                                </td>
                            </tr>
                        </table>
                        </form>
                	