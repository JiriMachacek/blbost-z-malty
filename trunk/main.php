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


abstract class main {
    //put your code here

    protected $db;
    protected $template;

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
        $this->template->advert['big']['img'] = 'xxxx';
        $this->template->advert['big']['link'] = 'neco.xxx';
        $this->template->advert['button1']['img'] = 'xxxx';
        $this->template->advert['button1']['link'] = 'neco.xxx';
        $this->template->advert['button2']['img'] = 'xxxx';
        $this->template->advert['button2']['link'] = 'neco.xxx';
        $this->template->advert['small1']['img'] = 'xxxx';
        $this->template->advert['small1']['link'] = 'neco.xxx';
        $this->template->advert['small2']['img'] = 'xxxx';
        $this->template->advert['small2']['link'] = 'neco.xxx';

    }

}
?>