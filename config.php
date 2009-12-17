<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of config
 *
 * @author jmachacek
 */
define('SQL_username', 'root');
define('SQL_password', '');
define('SQL_host', 'localhost');
define('SQL_dbname', 'malta');

define('ContactEmail', 'jmachacek@paragoneurope.eu');

define('baseURI', 'http://'.$_SERVER['HTTP_HOST'].'/blbost-z-malty/');


define('captcha_length', 5);
define('captcha_acceptedChars', 'ABCDEFGHJKLMNPQRSTUVWXYZ23456789');

define('DEBUGING', FALSE);

define('MAX_PHOTOS', 5);
?>
