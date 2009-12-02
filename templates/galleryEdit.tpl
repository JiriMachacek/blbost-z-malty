
                  	<table>
                    	<tr>
                        	<td>
                            	<form id="form2" name="form2" method="post" action="{$baseURI}company/{$tpl_company.url}/gallery/gallery-upload-image/" enctype="multipart/form-data">
                                    <div style="float:left">Add New Image: <input name="backup" type="file" /> &nbsp;</div>
                                    <div class="myButton2" ><INPUT type="submit" name="" value="upload image"></div>
                                    <input type="hidden" value="{$tpl_company.url}" name="send" />
                                </form>
                    		</td>
                    	</tr>
                    </table>
        	<table cellpadding="0px" cellspacing="5px" border="0px" width="100%">
                <tr>
                    <td valign="top">
                    	<ul class="gallery">
{foreach from=$gallery item=i name=gal}
                                    <li class="gallery">
                                        <img src="{$baseURI}images/gallery/{$i.file}.jpg" alt="{$tpl_company.url}" width="{$i.x}" height="{$i.y}" />
                                        <ul class="editmenu" >
                                            <li class="editmenu" style="float:left; padding-right:3px"><a href="{$baseURI}company/{$tpl_company.url}/gallery/gallery-delete-image/{$i.id_gallery}/{$i.file}/">remove image</a></li>
                                        </ul>
                                    </li>
                            
{foreachelse}
                            <li>No pictures found.</li>
{/foreach}
                        </ul>
                    </td>
            	</tr>
    		</table>