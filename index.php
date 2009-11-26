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

require('FirePHPCore/FirePHP.class.php');

$firephp = FirePHP::getInstance(true);

$firephp->fb($_GET, 'get');
$firephp->fb($_POST, 'post');


$user = (isset($_SESSION['user'])) ? $_SESSION['user'] : 0;
$us = user::getInstance();
$us->setUserID(1);


if(isset($_GET['page']))
{
    $request = $_GET['page'];
    $sub = explode('/', $request);
$firephp->fb($sub, 'sub');
    if($sub[0] == 'page')
    {
        require_once 'page.php';
        $page = new page;
        if (isset($_POST['send']))
        {
            $page->send($sub[1], $_POST);
        }
        else if(isset($sub[2]))
        {
            $page->showOK($sub[1]);
        }
        else
        {
            $page->show($sub[1]);
        }
    }
    else if($sub[0] == 'company')
    {
        require_once 'company.php';
        $company = $sub[1];

        if(!isset($sub[2]))
        {
            require_once 'companyHome.php';
            $page = new companyHome();
        }
        else
        {
            $modul = 'company'.ucwords($sub[2]);
            if(is_file($modul.'.php'))
            {
                require_once $modul.'.php';
                $page = new $modul;
            }
            else
            {
                header('location: '.baseURI.'company/'.$company.'/');
            }


        }
        $page->loadData($company);

        if (isset($sub[3]))
        {
            if($sub[3] == 'edit')
            {
                if(isset($_POST['send']))
                {
                    $page->send($_POST);
                }
                else
                {
                    $page->edit();
                }
            }
        }
        $page->show();

    }
    else if($sub[0] == 'catetory')
    {

    }
    else
    {

        header('location: '.baseURI);
    }
}
else
{
    require_once 'test.php';
}

?>
