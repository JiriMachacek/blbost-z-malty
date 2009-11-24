<?php
/**
 * Description of test
 *
 * @author jmachacek
 */

require_once 'main.php';
require_once 'config.php';
require_once 'smarty/Smarty.class.php';
require_once 'user.php';
session_start();
unset($_SESSION);

$user = (isset($_SESSION['user'])) ? $_SESSION['user'] : 0;
$us = user::getInstance();
$us->setUserID($user);

class test extends main{
    //put your code here
    public function __construct()
    {
    parent::__construct();
    }

    public function test()
    {
        $this->template->xxx = $this->db->query('SELECT * FROM test')->fetchAll();
        $this->template->xyx = 'x';
        $this->smarty('index');
    }


    public function y()
    {
        $user = user::getInstance();
        var_dump($user->getUserID());
    }
}

$x = new test;

$x->test();
//$x->x();
echo $x->y();

define('xxx', 'ahoj');



echo xxx;




?>
