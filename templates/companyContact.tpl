{if isset($error)}<div class="error">{$error}</div>{/if}
<form id="form2" name="form2" method="post" action="">
                        	<table>
                            	<tr>
                                	<td><strong>Name:</strong></td>
                               	  <td><input name="name" type="text" size="50"  {if isset($name)}value="{$name}"{/if} /></td>
                                </tr>
                            	<tr>
                                	<td><strong>E-Mail:</strong></td>
                                	<td><input name="email" type="text" {if isset($email)}value="{$email}"{/if} size="50" /></td>
                                </tr>
                            	<tr>
                                	<td><strong>Subject:</strong></td>
                                	<td><input name="subject" type="text" {if isset($subject)}value="{$subject}"{/if} size="50" /></td>
                                </tr>
                            	<tr>
                                	<td valign="top"><strong>Message:</strong></td>
                               	  	<td><textarea name="message" cols="50" rows="8">{if isset($message)}{$message}{/if}</textarea></td>
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
