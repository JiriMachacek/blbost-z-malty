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

<form action="" method="post" enctype="multipart/form-data" name="form2" id="form2">
                     	  <textarea name="summary" id="summary" cols="80" rows="22" onkeyup="counterUpdate('summary', 'countBody','2000');">{if isset($summary)}{$summary}{/if}</textarea>
                   	    <br />
                            You typed <B><span id="countBody">{if $count}{$count}{else}0{/if}</span></b> characters.  Maximum: 2000 characters <br /><br />
                             <div class="myButton2">
                                <input type="submit" name="send" value="save" />
                            </div>
                            <div class="myButton2">
                                <input type="button" name="input" value="cancel" />
                            </div>
</form>

