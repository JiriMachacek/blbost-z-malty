    <tr>
        <td width="46px"></td>
        <td class="DirectoryTitle">Sign In / Register</td>
    </tr>
    <tr>
        <td width="46px"></td>
        <td valign="top" class="DirectoryText">
        	{if isset($error)}<div class="error">{$error}</div>{/if}
                <table width="100%">
            	<tr>
   	  				<td valign="top" width="50%">
                    	<h2>Already Registered</h2>
                    	<form id="form2" name="form2" method="post" action="">
                    	  <table>
                    	    <tr>
                    	      <td><strong>User Name:</strong></td>
                    	      <td><input name="logname" value="{if isset($logname)}{$logname}{/if}" type="text" size="45" /></td>
                  	      </tr>
                    	    <tr>
                    	      <td><strong>Password:</strong></td>
                    	      <td><input name="logpassword" type="password" size="45" /></td>
                  	      </tr>
                    	    <tr>
                    	      <td></td>
                    	      <td><img src="{$baseURI}captcha.php?id={$logincaptcha}" /></td>
                            </tr>
                    	    <tr>
                    	      <td></td>
                              <td>
                              <input name="captchalog" type="input" maxlength="5" value="{if isset($captchalog)}{$captchalog}{/if}" />
                              <input type="hidden" name="logincaptcha" value="{$logincaptcha}" />
                              <input type="hidden" name="registercaptcha" value="{$registercaptcha}" />
                          </td>
                  	      </tr>
                    	    <tr>
                    	      <td></td>
                    	      <td><div class="myButton2">
                    	        <input type="submit" name="send" value="login" />
                  	        </div>
                    	        <div class="myButton2">
                    	          <input type="reset" name="input" value="cancel" />
                  	          </div></td>
                  	      </tr>
                  	    </table>
                  	  </form>
                    </td>
                	<td valign="top">
                   	  <h2>New Registration</h2>
                      <form id="form3" name="form3" method="post" action="">
                    	  <table>
                    	    <tr>
                    	      <td><strong>User Name:</strong></td>
                    	      <td><input name="name" value="{if isset($name)}{$name}{/if}" type="text" size="45" /></td>
                  	      </tr>
                    	    <tr>
                    	      <td><strong>E-Mail:</strong></td>
                    	      <td><input name="email" value="{if isset($email)}{$email}{/if}" type="text" size="45" /></td>
                  	      </tr>
                    	    <tr>
                    	      <td><strong>Password:</strong></td>
                    	      <td><input name="password" type="text" size="45" /></td>
                  	      </tr>
                    	    <tr>
                    	      <td><strong>Verify Password:</strong></td>
                    	      <td><input name="verifypassword" type="text" size="45" /></td>
                  	      </tr>
                    	    <tr>
                    	      <td></td>
                    	      <td><img src="{$baseURI}captcha.php?id={$registercaptcha}" /></td>
                            </tr>
                    	    <tr>
                    	      <td></td>
                              <td>
                              <input name="captchareg" type="input" maxlength="5" value="{if isset($captchareg)}{$captchareg}{/if}" />
                              <input type="hidden" name="registercaptcha" value="{$registercaptcha}" />
                              <input type="hidden" name="logincaptcha" value="{$logincaptcha}" />                          </td>
                  	      </tr>
                    	      <td></td>
                    	      <td><div class="myButton2">
                    	        <input type="submit" name="send" value="register" />
                  	        </div>
                    	        <div class="myButton2">
                    	          <input type="reset" name="input" value="cancel" />
                  	          </div></td>
                  	      </tr>
                  	    </table>
                  	  </form>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
