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
<form action="{$baseURI}{$tpl_curl}/events/edit/" method="post" enctype="multipart/form-data" name="form2" id="form2">
<input type="hidden" name="idEvents" value="{$idEvents}" />
<table width="100%" cellpadding="0" cellspacing="0" border="0">
<tr>
    <td><strong>News Title:</strong></td>
    <td><input name="eventtitle" type="text" id="eventtitle" value="{if isset($eventtitle)}{$eventtitle}{/if}" size="50" /><td>
</tr>
<tr>
    <td><strong>Date:</strong></td>
    <td><input name="eventdate" type="text" value="{if isset($eventdate)}{$eventdate}{/if}" id="eventdate" size="20" /></td>
</tr>
<tr>
    <td colspan="2">
    <textarea name="eventdescription" id="eventdescription" cols="60" rows="5" onkeyup="counterUpdate('eventdescription', 'countBody','200');">{if isset($eventdescription)}{$eventdescription}{/if}</textarea><br />
You typed <B><span id="countBody">{if isset($eventdescription)}{$eventdescription|count_characters:true}{else}0{/if}</span></b> characters.  Maximum: 200 characters
    </td>
</tr>
<tr>
<td colspan="2">
    <div class="myButton2"><INPUT type="submit" name="send" value="submit"></div>
    <div class="myButton2"><INPUT type="reset" name="" value="reset"></div>
</td>
</tr>
</table>
</form>
{literal}
<script language="Javascript">

        var opts = {
                formElements:{"eventdate":"d-ds-m-ds-Y"}
        };
        datePickerController.createDatePicker(opts);
</script>

{/literal}
