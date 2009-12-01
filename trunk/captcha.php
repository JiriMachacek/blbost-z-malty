<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

if (isset($_GET['id']))
{
    include_once 'captchaClass.php';
    $captcha = new captcha($_GET['id']);
}
else
{
    die();
}

