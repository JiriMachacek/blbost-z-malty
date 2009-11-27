

    
    <tr>
        <td width="46px"></td>
        <td class="DirectoryTitle">Directory: Directory Name</td>
    </tr>
    <tr>
        <td width="46px"></td>
        <td class="DirectoryText">
        
            
    {foreach from=$categories item=i name=category}
            
              <h1>{$i.name}</h1>
        	<table cellpadding="0px" cellspacing="5px" border="0px" width="100%">
                <tr>
                	<td valign="top" width="242px">
                    	<img src="images/companies/{$i.url}.jpg" alt="{$i.name}" width="242" height="190"/>
                    </td>
                    <td valign="top">{$i.page}<br /><br />
                        <table cellpadding="0" cellspacing="0" border="0" width="100%">
                            <tr>
                                <td valign="top" width="30%"><strong>Address:</strong><br /> {$i.adress_adress}<br/>{$i.adress_street}<br/>Locality, {$i.adress_post}<br/> {$i.adress_country}
                                </td>
                                <td>
                                    <table cellpadding="0" cellspacing="0" border="0">
                                        <tr>
                                            <td><strong>Contact:</strong></td>
                                            <td width="5px"></td>
                                            <td>{$i.contact_name1}, {$i.contact_surname1}</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td width="5px"></td>
                                            <td>{$i.contact_name2}, {$i.contact_surname2}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Tel:</strong></td>
                                            <td width="5px"></td>
                                            <td>{$i.contact_tel1}</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td width="5px"></td>
                                            <td>{$i.contact_tel2}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Fax:</strong></td>
                                            <td width="5px"></td>
                                            <td>{$i.contact_fax}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Mob:</strong></td>
                                            <td width="5px"></td>
                                            <td>{$i.contact_mob}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Email:</strong></td>
                                            <td width="5px"></td>
                                            <td>{$i.contact_email}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Web:</strong></td>
                                            <td width="5px"></td>
                                            <td><a href="{$i.contact_www}" target="_blank" >{$i.contact_www}</a></td>
                                        </tr>
                                    </table>
                                </td>
                                <td align="right" valign="bottom">
                                    <ul class="editmenu">
                                   	  <li class="editmenu"><a href="{$baseURI}company/{$i.url}/">more info</a></li>
                                        <li class="editmenu"><a href="{$baseURI}company/{$i.url}/edit/">edit details</a></li>
                                        <!--li class="editmenu"><a href="removeentry.html?co=2">remove entry</a></li-->
                                    </ul>                    	
                    			</td>
                                </tr>
                        </table>
                    </td>
                </tr>
            </table>
{foreachelse}
No companies found.
{/foreach}


            
            
      </td>
    </tr>
   




