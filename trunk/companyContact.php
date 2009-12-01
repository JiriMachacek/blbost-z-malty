<?php
/**
 * Description of companyHome
 *
 * @author jmachacek
 */

class companyContact extends company
{
    private $error;
    
    public function show()
    {
        $this->template->kcaptcha = $this->generatePassword();
        $this->smarty('companyContact');
    }

    public function showOK()
    {
        $this->template->error = 'mail was send';
        $this->template->robots = true;
        $this->template->kcaptcha = $this->generatePassword();
        $this->smarty('companyContact');
    }


    public function send($post)
    {

         if ($this->validContact($post))
         {
           $this->sendEmail($post, $this->companyInfo->contact_email);
           $this->deletePassword();
           header('location: '.baseURI.'company/'.$this->companyName.'/contact/ok/');
         }
        $this->template = (object) $post;
        $this->template->robots = true;
        $this->template->error = $this->error;

        $this->smarty('companyContact');
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

