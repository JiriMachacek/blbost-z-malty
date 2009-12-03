{literal}
<script language="Javascript">
function counterUpdate(opt_countedTextBox, opt_countBody, opt_maxSize) {
        var countedTextBox = opt_countedTextBox ? opt_countedTextBox : "counttxt";
        var countBody = opt_countBody ? opt_countBody : "countBody";
        var maxSize = opt_maxSize ? opt_maxSize : 1024;

        var field = document.getElementById(countedTextBox);

        if (field && field.value.length >= maxSize) {
                field.value = field.value.substring(0, maxSize);
        }
        var txtField = document.getElementById(countBody);
                if (txtField) {
                txtField.innerHTML = field.value.length;
        }
}
</script>
{/literal}

{if isset($error)}<div class="error">{$error}</div>{/if}
<form id="form2" name="form2" method="post" action="">
                    	<table width="100%" cellpadding="0" cellspacing="0" border="0">
                        	<tr>
                            	<td width="74">Name:</td>
                                <td><input name="name" type="text" value="{if isset($name)}{$name}{/if}" size="60" /></td>
                            </tr>
                           	<tr>
                                <td valign="top">Comment:</td>
                                <td>
                                 <textarea name="comment" id="comment" cols="60" rows="4" onkeyup="counterUpdate('comment', 'countBody','200');">{if isset($comment)}{$comment}{/if}</textarea><br />
                            You typed <B><span id="countBody">{if isset($comment)}{$comment|count_characters:true}{else}0{/if}</span></b> characters.  Maximum: 200 characters <br /><br />
                            
                                </td>
                            </tr>
                    	    <tr>
                    	      <td></td>
                    	      <td><img src="{$baseURI}captcha.php?id={$kcaptcha}" /></td>
                            </tr>
                            <tr>
                    	      <td></td>
                              <td>
                              <input name="captcha" type="input" maxlength="5" value="{if isset($captcha)}{$captcha}{/if}" />
                              <input type="hidden" name="kcaptcha" value="{$kcaptcha}" />
                  	      </tr>
                            	<tr>
                                	<td></td>
                                	<td>
                                    	<div class="myButton2"><INPUT type="submit" name="send" value="submit"></div>
                                        <div class="myButton2"><INPUT type="reset" name="" value="reset"></div>
                                    </td>
                                </tr>
                            </table>
</form>
{foreach from=$guestbook item=item}
<hr class="hr"/>
<table width="100%" cellpadding="0" cellspacing="0" border="0">
                        	<tr>
                            	<td width="74">Name:</td>
                                <td><strong>{$item.name}</strong></td>
                            </tr>
                           	<tr>
                                <td>Comment:</td>
                                <td>{$item.comment}</td>
                            </tr>
                            <tr>
                            	<td></td>
                                <td><em>Added: {$item.date|date_format:"%B %e, %Y"}<br />IP: {$item.ip}</em></td>
                            </tr>
</table>
{/foreach}