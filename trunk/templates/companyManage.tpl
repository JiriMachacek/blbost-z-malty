<form id="form2" name="form2" method="post" action="">
<h2>Management Tool</h2>

<table width="100%">
<tr>
<td width="50%" valign="top">
<strong>Enabled Pages</strong>
    <table>
    <tr>
            <td width="100">Gallery</td>
        <td><input name="gallery" type="checkbox" value="yes"{if isset($manage->gallery)}{if $manage->gallery == 'yes'} checked{/if}{/if} /></td>
    </tr>
    <tr>
            <td width="100">Guestbook</td>
        <td><input name="guestbook" type="checkbox" value="yes"{if isset($manage->guestbook)}{if $manage->guestbook == 'yes'} checked{/if}{/if} /></td>
    </tr>
    <tr>
            <td width="100">Products</td>
        <td><input name="products" type="checkbox" value="yes"{if isset($manage->products)}{if $manage->products == 'yes'} checked{/if}{/if} /></td>
    </tr>
    <tr>
            <td width="100">News</td>
        <td><input name="news" type="checkbox" value="yes"{if isset($manage->news)}{if $manage->news == 'yes'} checked{/if}{/if} /></td>
    </tr>
    <tr>
            <td width="100">Events</td>
        <td><input name="events" type="checkbox" value="yes"{if isset($manage->events)}{if $manage->events == 'yes'} checked{/if}{/if} /></td>
    </tr>
    <tr>
            <td width="100">Contact</td>
        <td><input name="contact" type="checkbox" value="yes"{if isset($manage->contact)}{if $manage->contact == 'yes'} checked{/if}{/if} /></td>
    </tr>
</table>
</td>
<td width="50%" valign="top">
<strong>Categories</strong>
<table>
    <tr>
        <td>
            {if isset($categorySelected[0])}
                {html_options name=cat0 options=$categories selected=$categorySelected[0]}
            {else}
                {html_options name=cat0 options=$categories}
            {/if}
        </td>
    </tr>
    <tr>
        <td>
            {if isset($categorySelected[1])}
                {html_options name=cat1 options=$categories selected=$categorySelected[1]}
            {else}
                {html_options name=cat1 options=$categories}
            {/if}
        </td>
    </tr>
    <tr>
        <td>
            {if isset($categorySelected[2])}
                {html_options name=cat2 options=$categories selected=$categorySelected[2]}
            {else}
                {html_options name=cat2 options=$categories}
            {/if}
        </td>
    </tr>
    <tr>
        <td>
            {if isset($categorySelected[3])}
                {html_options name=cat3 options=$categories selected=$categorySelected[3]}
            {else}
                {html_options name=cat3 options=$categories}
            {/if}
        </td>
    </tr>
    <tr>
        <td>
            {if isset($categorySelected[4])}
                {html_options name=cat4 options=$categories selected=$categorySelected[4]}
            {else}
                {html_options name=cat4 options=$categories}
            {/if}
        </td>
    </tr>
    <tr>
        <td>
            {if isset($categorySelected[5])}
                {html_options name=cat5 options=$categories selected=$categorySelected[5]}
            {else}
                {html_options name=cat5 options=$categories}
            {/if}
        </td>
    </tr>
</table>


</table>



<br />
<strong>Password</strong>
<table>
    <tr>
            <td>Current Password</td>
        <td><input name="currentpassword" type="password" /></td>
    </tr>
    <tr>
            <td>New Password</td>
        <td><input name="newpassword" type="password" /></td>
    </tr>
    <tr>
            <td>Verify Password</td>
        <td><input name="verifypassword" type="password" /></td>
    </tr>
    </table>
<br />
<div class="myButton2"><INPUT type="submit" name="send" value="submit"></div>
</form>
