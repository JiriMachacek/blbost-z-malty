<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of main
 *
 * @author jmachacek
 */
require_once 'config.php';
require_once 'smarty/Smarty.class.php';
require_once 'dibi/dibi.php';


abstract class main {
    //put your code here

    protected $db;
    protected $template;

    private $captchaID;

    public function __construct()
    {
        $this->startDb();
        $this->template = new stdClass();
    }

        /**
         * connectin to db
         * @param void
         * @return void
         */
    private function startDb()
    {
        $this->db = new DibiConnection(array(
                'driver'   => 'mysql',
                'host'     => SQL_host,
                'username' => SQL_username,
                'password' => SQL_password,
                'database' => SQL_dbname,
                'profiler' => DEBUGING));
        
    }

    protected function smarty($template)
    {
        $us = user::getInstance();
        $this->template->tpl_login = $us->isLogged();

        $smarty = new Smarty;

        $smarty->compile_check = true;
        $smarty->debugging = DEBUGING;

        $this->template->baseURI = baseURI;
        $this->template->tpl_content = $template;
        $this->loadAdverts();

        foreach ($this->template as $key => $variable)
        {
            $smarty->assign($key, $variable);
        }

        $smarty->display('layout.tpl');
    }

    private function loadAdverts()
    {
        /**
         * @todo přidat logiku
         */

        $this->template->tpl_advert['big']['img'] = 'xxxx';
        $this->template->tpl_advert['big']['link'] = 'neco.xxx';
        $this->template->tpl_advert['button1']['img'] = 'xxxx';
        $this->template->tpl_advert['button1']['link'] = 'neco.xxx';
        $this->template->tpl_advert['button2']['img'] = 'xxxx';
        $this->template->tpl_advert['button2']['link'] = 'neco.xxx';
        $this->template->tpl_advert['small1']['img'] = 'xxxx';
        $this->template->tpl_advert['small1']['link'] = 'neco.xxx';
        $this->template->tpl_advert['small2']['img'] = 'xxxx';
        $this->template->tpl_advert['small2']['link'] = 'neco.xxx';

    }

    protected function generatePassword()
    {
        // This string contains allowable characters for the image.
        // To reduce confusion, zero and the letter 'o' have been removed,
        // and QuickCaptcha is NOT case-sensitive.
        $acceptedChars = captcha_acceptedChars;


        // Build the  validation string
        $max = strlen($acceptedChars)-1;
        $password = NULL;
        for($i=0; $i < captcha_length; $i++) {
                $cnum[$i] = $acceptedChars{mt_rand(0, $max)};
                $password .= $cnum[$i];
        }

        $password = strtolower($password);

        $this->db->query('INSERT INTO captcha (password) VALUES (%s)', $password);

        return $this->db->getInsertId();
    }

    protected function checkPassword($id, $password)
    {
        $password = strtolower($password);
        $this->captchaID = $id;
        
        $result = $this->db->dataSource('SELECT * FROM captcha WHERE ID_captcha=%i AND password=%s', $id, $password);

        if($result->count() == 1)
        {
            return true;
        }

        return false;
    }

    protected function deletePassword()
    {
        $this->db->query('DELETE FROM captcha WHERE ID_captcha=%i', $this->captchaID);
    }

    protected function sendEmail($data, $email = ContactEmail)
    {
        /**
         * post == array (name, email, subject, message
         */
        $data = (object) $data;

        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";

        // Additional headers
        $headers .= "From: $data->name <$data->email> \r\n";
        $headers .= 'Reply-To: '.$data->email;

        if(mail($email, $data->subject, $data->message, $headers));
    }

public function seo($url) {
    $url = preg_replace('~[^\\pL0-9_]+~u', '-', $url);
    $url = trim($url, "-");
    $url = iconv("utf-8", "us-ascii//TRANSLIT", $url);
    $url = strtolower($url);
    $url = preg_replace('~[^-a-z0-9_]+~', '', $url);
    return $url;
}

}
?>