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

    public function show($page)
    {
        if($page == 'about-us' || $page == 'packages')
        {
            $result = $this->db->query("SELECT text FROM pages WHERE name='$page' ")->fetch();
            $this->template->text = $result->text;
        }
        $this->template->title = str_replace('-', ' ', $page);
        $this->smarty($page);
    }

    public function showOK($page)
    {
        $this->template->error = 'mail was send';
        $this->template->robots = true;
        $this->template->title = str_replace('-', ' ', $page);
        $this->smarty($page);
    }

    public function send($page, $post)
    {
        if($this->valid($page, $post))
        {
            header('location: '.baseURI.'page/'.$page.'/ok/');
        }
        else
        {
            $this->template = (object) $post;
            $this->template->robots = true;
            $this->template->error = $this->error;
            $this->template->title = str_replace('-', ' ', $page);
            $this->smarty($page);
        }
    }

    private function valid($page, $post)
    {
        $error = true;

        if ($page == 'contact-us')
        {
            /**
             * @todo validace + captcha
             */
            if($post['name'] == '')
            {
                $error = false;
                $this->error .= 'Insert name <br />';
            }

            if($post['email'] == '')
            {
                $error = false;
                $this->error .= 'Insert email <br />';
            }

            if($post['subject'] == '')
            {
                $error = false;
                $this->error .= 'Insert subject <br />';
            }

            if($post['message'] == '')
            {
                $error = false;
                $this->error .= 'Insert message <br />';
            }
        }
        return $error;
    }
}
?>
