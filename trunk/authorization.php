<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
include_once 'main.php';
include_once 'config.php';
session_start();

if (isset($_GET['type']) && isset($_GET['hash']))
{
    include_once 'authorizationClass.php';
    $authorization = new authorization($_GET['type'], $_GET['hash']);
}
else
{
    die();
}
?>
