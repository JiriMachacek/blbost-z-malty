<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of page
 *
 * @author jmachacek
 */
class page extends main
{
    //put your code here
    private $error = '';
    private $companyURL = '';

    public function show($page)
    {
        if($page == 'about-us' || $page == 'packages')
        {
            $result = $this->db->query("SELECT text FROM pages WHERE name='$page' ")->fetch();
            $this->template->text = $result->text;
        }
        else if ($page == 'logout')
        {
            unset ($_SESSION['user']);
            header('location: '.baseURI);
        }
        else if ($page == 'login')
        {
            $this->template->logincaptcha = $this->generatePassword();
            $this->template->registercaptcha = $this->generatePassword();
        }
        else
        {
            $this->template->kcaptcha = $this->generatePassword();
        }
        $this->template->title = $this->createTitle(str_replace('-', ' ', $page));

        
        $this->smarty($page);
    }

    public function showOK($page)
    {
        $this->template->error = 'mail was send';
        $this->template->robots = true;
        $this->template->kcaptcha = $this->generatePassword();
        $this->template->title = $this->createTitle(str_replace('-', ' ', $page));
        $this->smarty($page);
    }

    public function send($page, $post)
    {
        if($page == 'contact-us')
        {
            if ($this->validContact($post))
            {
                $this->sendEmail($post);
                $this->deletePassword();
                header('location: '.baseURI.'page/'.$page.'/ok/');
            }
        }
        else if($page == 'login')
        {
            if ($post['send'] == 'login')
            {
                if ($this->validLogin($post))
                {
                    $this->deletePassword();
                    header('location: '.baseURI.'company/'.$this->companyURL.'/');
                }
            }
            else
            {
                if ($this->validRegister($post))
                {
                    /**
                     * @todo přesměrování
                     */
                    $this->deletePassword();
                    header('location: '.baseURI.'/');
                }
            }
        }

        $this->template = (object) $post;
        $this->template->robots = true;
        $this->template->error = $this->error;
        $this->template->title = $this->createTitle(str_replace('-', ' ', $page));
        $this->smarty($page);
        
    }

    private function validLogin($post)
    {
        /**
         * @todo validace + captcha
         */
         $nick = $post['logname'];
         $password = sha1($post['logpassword']);

         if(!$this->checkPassword($post['logincaptcha'], $post['captchalog']))
         {
             $this->error = 'You entered an incorrect code.';
             return false;
         }

         $sql = "SELECT id_company, url FROM company WHERE nick='$nick' AND password='$password'";
         $result = $this->db->dataSource($sql);

         if($result->count() == 1)
         {
             $data = $result->fetch();
             $_SESSION['user'] = $data->id_company;
             $this->companyURL = $data->url;
             return true;
         }

         $this->error = 'Incorrect User Name/Password Combination';
         return false;
    }

    private function validRegister($post)
    {
        /**
         * @todo validace + captcha
         */
         if(!$this->checkPassword($post['registercaptcha'], $post['captchareg']))
         {
             $this->error = 'You entered an incorrect code.';
             return false;
         }

        $name = $post['name'];
        $email = $post['email'];

        if($name == '')
        {
            $this->error .= 'Insert name <br />';
        }

        if($email == '')
        {
            $this->error .= 'Insert email <br />';
        }

        if($post['password'] == '')
        {
            $this->error .= 'Insert password <br />';
        }

        if($post['verifypassword'] == '')
        {
            $this->error .= 'Insert verify password <br />';
        }

        if($post['verifypassword'] <> $post['password'])
        {
            $this->error .= 'Passwords are not same <br />';
        }

        if ($this->error <> '')
            return false;

        $sql = "SELECT nick, reg_email FROM company WHERE nick = '$name' OR reg_email = '$email'";

        $result = $this->db->dataSource($sql);

        if($result->count() == 1)
        {
            $this->error .= 'Someone is using this User Name or Email <br />';
            return false;
        }
        else
        {
            $sql = "INSERT INTO company (nick, password, reg_email) VALUES ('$name', '".$post['password']."', '$email')";
            echo $sql;
            $this->db->query($sql);
            return true;
        }
    }
    
    private function validContact($post)
    {
        if(!$this->checkPassword($post['kcaptcha'], $post['captcha']))
        {
             $this->error = 'You entered an incorrect code.';
             return false;
        }

        if($post['name'] == '')
        {
            $this->error .= 'Insert name <br />';
        }

        if(!ereg("^.+@.+\..+$",$post['email']))
        {
            $this->error .= 'Insert email <br />';
        }

        if($post['subject'] == '')
        {
            $this->error .= 'Insert subject <br />';
        }

        if($post['message'] == '')
        {
            $this->error .= 'Insert message <br />';
        }

        return ($this->error <> '') ? false : true;
    }
}
?>
