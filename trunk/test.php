<?php
/**
 * Description of test
 *
 * @author jmachacek
 */



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





?>
