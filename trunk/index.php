<?php
/**
 * Description of index
 *
 * @author jmachacek
 */
session_start();

require_once 'main.php';
require_once 'config.php';
require_once 'smarty/Smarty.class.php';
require_once 'user.php';
require_once 'dibi/dibi.php';

$user = (isset($_SESSION['user'])) ? $_SESSION['user'] : 0;
$us = user::getInstance();
$us->setUserID($user);

echo "<pre>";
var_dump($_GET);

require_once 'test.php';


?>
