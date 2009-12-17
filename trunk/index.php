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
            $subpage = 'home';
        }
        else
        {
            $subpage = ucwords($sub[2]);
            $modul = 'company'.$subpage;
            if(is_file($modul.'.php'))
            {
                require_once $modul.'.php';
                $page = new $modul;
            }
            else
            {
                header('location: '.baseURI.'error/'.$request.'/');
            }


        }
        $page->loadData($company, $subpage, $request);

        if (isset($sub[3]))
        {
            if($sub[3] == 'edit')
            {
                if(isset($_POST['send']))
                {
                    $page->send($_POST);
                }
                else if (isset ($sub[4]))
                {
                    $page->edit((int) $sub[4]);
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
            else if($sub[3] == 'add')
            {
                $page->showForm();
            }
            else if($sub[3] == 'add-product')
            {
                $page->productAdd();
            }
            else if($sub[3] == 'edit-product')
            {
                $page->productEdit($sub[4]);
            }
            else if($sub[3] == 'delete-product')
            {
                $page->productDelete($sub[4]);
                header('location: '.baseURI.'company/'.$company.'/products/edit/');
            }
            else if($sub[3] == 'products-upload-image')
            {
                $page->productsUploadImage();
                header('location: '.baseURI.'company/'.$company.'/products/edit/');
            }
            else if($sub[3] == 'products-delete-image')
            {
                $page->productsDeleteImage($sub[4],$sub[5]);
                header('location: '.baseURI.'company/'.$company.'/products/edit-product/'.$sub[4].'/');
            }

            else if($sub[3] == 'gallery-upload-image')
            {
                $page->uploadImage($company);
                header('location: '.baseURI.'company/'.$company.'/gallery/edit/');
            }
            else if($sub[3] == 'gallery-delete-image')
            {
                $page->galleryDeleteImage($sub[4],$sub[5]);
                header('location: '.baseURI.'company/'.$company.'/gallery/edit/');
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
            else if ($sub[3] == 'del' && isset($sub[4]))
            {
                $page->delete($sub[4]);
            }
            else if ($sub[3] == 'update')//edit of company details
            {
                $page->send($_POST);
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
    else if ($sub[0] == 'error')
    {
        require_once 'error.php';
        $error = new error($request);
    }
    else
    {

        header('location: '.baseURI.'error/'.$request.'/');
    }
}
else
{
    require_once 'directory.php';
    $directory = new directories();
    $directory->render();
}

?>
