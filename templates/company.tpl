    <tr>
        <td width="46px"></td>
        <td class="DirectoryTitle">Directory: Directory Name</td>
    </tr>
    <tr>
        <td width="46px"></td>
        <td class="DirectoryText">
        <h1>Company Name</h1>
        	<table border="0" cellpadding="0" cellspacing="0">
            	<tr>
                	<td>
                        <ul class="editmenu" >
                            <li class="editmenu" style="float:left; padding-right:3px"><a href="{$baseURI}{$tpl_curl}/">home</a></li>
                            {if $tpl_company.gallery == 'yes'}<li class="editmenu" style="float:left; padding-right:3px"><a href="{$baseURI}{$tpl_curl}/gallery/">gallery</a></li>{/if}
                            {if $tpl_company.guestbook == 'yes'}<li class="editmenu" style="float:left; padding-right:3px"><a href="{$baseURI}{$tpl_curl}/guestbook/">guestbook</a></li>{/if}
                            {if $tpl_company.products == 'yes'}<li class="editmenu" style="float:left; padding-right:3px"><a href="{$baseURI}{$tpl_curl}/products/">products</a></li>{/if}
                            {if $tpl_company.news == 'yes'}<li class="editmenu" style="float:left; padding-right:3px"><a href="{$baseURI}{$tpl_curl}/news/">news</a></li>{/if}
                            {if $tpl_company.events == 'yes'}<li class="editmenu" style="float:left; padding-right:3px"><a href="{$baseURI}{$tpl_curl}/events/">events</a></li>{/if}
                            {if $tpl_company.contact == 'yes'}<li class="editmenu" style="float:left; padding-right:3px"><a href="{$baseURI}{$tpl_curl}/">contact</a></li>{/if}
                            {if $tpl_edit}<li class="editmenu" style="float:left; padding-right:3px"><a href="{$baseURI}{$tpl_curl}/{$tpl_subpage}/edit/">edit page</a></li>{/if}
                            {if $tpl_edit}<li class="editmenu" style="float:left; padding-right:3px"><a href="{$baseURI}{$tpl_curl}/manage/">manage</a></li>{/if}
                        </ul>
            		</td>
            	</tr>
             </table>
        	<table cellpadding="0px" cellspacing="5px" border="0px" width="100%">
                <tr>
                	<td valign="top" width="242px">
                    	<table cellpadding="0" cellspacing="0" border="0" width="100%">
                        <tr><td>
                {if $tpl_edit && isset($formEditImage)} <!-- user logged -->
                    {if $formEditImage eq 'yes'} <!-- picture exists -->
                        <img src="{$baseURI}images/companies/{$tpl_company.url}.jpg" alt="Company Name" /><br />
                        <a href="{$baseURI}company/{$tpl_company.url}/home/delete-image/">Delete picture</a>
                    {elseif $formEditImage eq 'no'} <!-- picture doesntt exists -->
                        <form action="{$baseURI}company/{$tpl_company.url}/home/upload-image/" method="post" enctype="multipart/form-data">
                            <table>
                                <tr>
                                    <td>Upload company picture:</td>
                                </tr>
                                <tr>
                                    <td align="left"><input type="file" size="10" class="formular" name="backup" /></td>
                                </tr>
                                <tr>
                                    <td>
                                    <input type="hidden" name="send" class="formular" value="{$tpl_company.url}" />
                                    <input type="submit" class="formular" name="odeslat" value="Upload" />
                                    </td>
                                </tr>
                            </table>
                        </form>
                    {/if}
                {elseif !$tpl_edit && isset($formEditImage)} <!-- user not logged -->
                    {if $formEditImage eq 'yes'} <!-- picture exists -->
                        <img src="{$baseURI}images/companies/{$tpl_company.url}.jpg" alt="Company Name" />
                    {elseif $formEditImage eq 'no'} <!-- picture doesntt exists -->
                        <img src="{$baseURI}images/companies/default.jpg" alt="Company Name" />
                    {/if}
                {else}
                        
                        <img src="{$baseURI}images/companies/default.jpg" alt="Company Name" />
                {/if}
                        </td></tr>
              <tr>
                                <td valign="top"><strong>Address:</strong><br /> {$tpl_company.adress_adress}<br />{$tpl_company.adress_street}<br />{$tpl_company.adress_locality}, {$tpl_company.adress_post}<br /> {$tpl_company.adress_country} <br /><br />

                </td>
                          </tr>
                            <tr>
                                <td>
                                    <table cellpadding="0" cellspacing="0" border="0">
                                        <tr>
                                            <td><strong>Contact:</strong></td>
                                            <td width="5px"></td>
                                            <td>{$tpl_company.name1}</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td width="5px"></td>
                                            <td>{$tpl_company.name2}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Tel:</strong></td>
                                            <td width="5px"></td>
                                            <td>+356 {$tpl_company.contact_tel1}</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td width="5px"></td>
                                            <td>+356 {$tpl_company.contact_tel2}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Fax:</strong></td>
                                            <td width="5px"></td>
                                            <td>+356 {$tpl_company.contact_fax}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Mob:</strong></td>
                                            <td width="5px"></td>
                                            <td>+356 {$tpl_company.contact_mob}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Email:</strong></td>
                                            <td width="5px"></td>
                                            <td>{$tpl_company.contact_email}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Web:</strong></td>
                                            <td width="5px"></td>
                                            <td>http://{$tpl_company.contact_www}</td>
                                        </tr>
                                    </table>
                                </td>
                                </tr>
                        </table>
                  </td>
                    <td valign="top">
                    {include file="$tpl_subpage.tpl"}
                    </td>
            	</tr>
    		</table>
        	<table border="0" cellpadding="0" cellspacing="0">
            	<tr>
                	<td>
                        <ul class="editmenu" >
                            <li class="editmenu" style="float:left; padding-right:3px"><a href="{$baseURI}{$tpl_curl}/">home</a></li>
                            {if $tpl_company.gallery == 'yes'}<li class="editmenu" style="float:left; padding-right:3px"><a href="{$baseURI}{$tpl_curl}/gallery/">gallery</a></li>{/if}
                            {if $tpl_company.guestbook == 'yes'}<li class="editmenu" style="float:left; padding-right:3px"><a href="{$baseURI}{$tpl_curl}/guestbook/">guestbook</a></li>{/if}
                            {if $tpl_company.products == 'yes'}<li class="editmenu" style="float:left; padding-right:3px"><a href="{$baseURI}{$tpl_curl}/products/">products</a></li>{/if}
                            {if $tpl_company.news == 'yes'}<li class="editmenu" style="float:left; padding-right:3px"><a href="{$baseURI}{$tpl_curl}/news/">news</a></li>{/if}
                            {if $tpl_company.events == 'yes'}<li class="editmenu" style="float:left; padding-right:3px"><a href="{$baseURI}{$tpl_curl}/events/">events</a></li>{/if}
                            {if $tpl_company.contact == 'yes'}<li class="editmenu" style="float:left; padding-right:3px"><a href="{$baseURI}{$tpl_curl}/">contact</a></li>{/if}
                            {if $tpl_edit}<li class="editmenu" style="float:left; padding-right:3px"><a href="{$baseURI}{$tpl_curl}/{$tpl_subpage}/edit/">edit page</a></li>{/if}
                            {if $tpl_edit}<li class="editmenu" style="float:left; padding-right:3px"><a href="{$baseURI}{$tpl_curl}/manage/">manage</a></li>{/if}
                        </ul>
            		</td>
            	</tr>
             </table>
        </td>
    </tr>

