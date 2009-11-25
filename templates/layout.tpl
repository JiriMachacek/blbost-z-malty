<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
{if isset($robots)}
<meta name="robots" content="noindex, nofollow">
{/if}}
<title>Malta business centre - {$title}</title>
<link href="{$baseURI}css/maltabusinesscentre.css" rel="stylesheet" type="text/css" />
</head>

<body>

<table width="990px" align="center" bgcolor="#FFFFFF" cellpadding="0px" cellspacing="0px" border="0px">
    <tr>
        <td width="46px"></td>
        <td>        	<table cellpadding="0px" cellspacing="0px" border="0px" width="100%" >
            	<tr valign="middle">
                    <td width="431px" height="120"><img src="{$baseURI}images/MaltaBusinessCentre_02.png" width="431" height="91" alt="Malta Business Centre Logo" />
                    </td>
             	</tr>
                <tr>
                    <td valign="bottom" align="right">
						<ul class="menu">
                        	<li class="menu"><a href="{$baseURI}">Home</a></li>
                        	<li class="menu"><a href="{$baseURI}page/about-us/">About Us</a></li>
                            <li class="menu"><a href="{$baseURI}page/packages/">Packages</a></li>
                            <li class="menu"><a href="{$baseURI}page/login/">Sign In / Register</a></li>
                            <li class="menu"><a href="{$baseURI}page/contact-us/">Contact Us</a></li>
                        </ul>

                    </td>
                </tr>
            </table>


        </td>
    </tr>
    <tr>
        <td width="46px"></td>
        <td style="background: url('{$baseURI}images/MaltaBusinessCentre_04.jpg')" height="142px" valign="middle" align="center">
            <form id="form1" name="form1" method="post" action="">
                <table>
                    <tr>
                    <td align="right">
                       	  <div>
                                <div class="SearchText" >
                                    <input name="keyword" type="text" id="keyword" size="85" />
                                </div>
                                <div class="SearchOption" >
                                    <input name="searchoption" type="radio" value="keyword" checked="checked" />keyword
                                    <input name="searchoption" type="radio" value="company" />company
                                </div>
                          </div>
                        </td>
                      <td valign="top">
                            <div class="myButton"><input type="submit" name="" value="Search" /></div>
                        </td>
                        <td align="left" valign="top">advanced search<br />
                          preferences</td>
                    </tr>
                </table>
          </form>
        </td>
    </tr>
    <tr>
        <td width="46px"></td>
        <td><img src="{$baseURI}images/MaltaBusinessCentre_05.png" width="954" alt="Malta Bussines Centre" height="20" /></td>
    </tr>
    <tr>
        <td width="46px"></td>
        <td  align="center">
               <table cellpadding="0px" cellspacing="0px" border="0px" >
            	<tr>
                	<td height="90px" width="728" bgcolor="#CCCCCC"> advertise here (leaderboard)</td>
                    <td height="90px" width="3" bgcolor="#fff"></td>
                    <td height="90px" width="120" bgcolor="#CCCCCC"> advertise here (button1)</td>
                    <td height="90px" width="3" bgcolor="#fff"></td>
                    <td height="90px" width="120" bgcolor="#CCCCCC"> advertise here (button1)</td>
                </tr>
        	</table>
    	</td>
    </tr>
    <tr>
        <td width="46px"></td>
        <td><img src="{$baseURI}images/MaltaBusinessCentre_05.png" alt="Malta Bussines Centre" width="954" height="20" /></td>
    </tr>

{include file="$tpl_content.tpl"}

<tr>
        <td width="46px"></td>
        <td align="center">
        	<table cellpadding="0px" cellspacing="4px" border="0px" >
            	<tr>
                	<td height="60px" width="468" bgcolor="#CCCCCC">{$advert.small1.link}</td>
                    <td height="60px" width="468" bgcolor="#CCCCCC"> advertise here</td>
                </tr>
        	</table>
        </td>
    </tr>

    <tr>
        <td width="46px"></td>
        <td bgcolor="#666666">footer</td>
    </tr>

</table>

</body>
</html>