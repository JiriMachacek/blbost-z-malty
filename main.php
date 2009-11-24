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
        $this->db = new PDO('mysql:host='.SQL_host.';dbname='.SQL_dbname, SQL_username, SQL_password);
        $this->db->query("SET CHARACTER SET utf8");
    }

    protected function smarty($template)
    {
        $smarty = new Smarty;

        $smarty->compile_check = true;
        $smarty->debugging = DEBUGING;

        $this->template->baseURI = baseURI;

        foreach ($this->template as $key => $variable)
        {
            $smarty->assign($key, $variable);
        }

        $smarty->display($template.'.tpl');
    }
}
?>