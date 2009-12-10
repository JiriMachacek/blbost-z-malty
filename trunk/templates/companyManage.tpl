<h2>Management Tool</h2>
<strong>Enabled Pages</strong>
<form id="form2" name="form2" method="post" action="">
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
