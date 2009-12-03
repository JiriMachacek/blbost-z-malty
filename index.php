<?php
/**
 * Description of index
 *
 * @author jmachacek
 */
session_start();
//$_SESSION['user'] = 5;
require_once 'main.php';
require_once 'user.php';

require('FirePHPCore/FirePHP.class.php');

$firephp = FirePHP::getInstance(true);

$firephp->fb($_GET, 'get');
$firephp->fb($_POST, 'post');
$firephp->fb($_SESSION, 'session');


$user = (isset($_SESSION['user'])) ? $_SESSION['user'] : 0;
$us = user::getInstance();
$us->setUserID($user);


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
            else if($sub[3] == 'ok')
            {
                $page->showOK();
            }
            else if($sub[3] == 'delete-image')
            {
                require_once 'companyHome.php';
                $page->deleteImage($company);
                header('location: '.baseURI.'company/'.$company.'/home/');
            }
            else if($sub[3] == 'upload-image')
            {
                require_once 'companyHome.php';
                $page->uploadImage($company);
                header('location: '.baseURI.'company/'.$company.'/home/edit/');
            }
        }
        else if (isset($_POST['send']))
        {
            $page->send($_POST);
        }
           $page->show();

    }
    else if($sub[0] == 'category')
    {
        require_once 'category.php';
        $category = new category();
        $category->render($sub[1]);
    }
    else
    {

        header('location: '.baseURI);
    }
}
else
{
    require_once 'directory.php';
    $directory = new directories();
    $directory->render();
}

?>
