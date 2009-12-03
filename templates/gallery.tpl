
        	<table cellpadding="0px" cellspacing="5px" border="0px" width="100%">
                <tr>
                    <td valign="top">
                    	<ul class="gallery">
{foreach from=$gallery item=i name=gal}

                            <li class="gallery">
                                <a href="{$baseURI}images/gallery/_{$i.file}.jpg" rel="lightbox[gal]">
                                <img rel="lightbox[gal]" src="{$baseURI}images/gallery/{$i.file}.jpg" alt="{$tpl_company.url}" width="{$i.x}" height="{$i.y}" alt="" />
                                </a>
                            </li>

{foreachelse}
                            <li>No pictures found.</li>
{/foreach}
                        </ul>
                    </td>
            	</tr>
    		</table>

		