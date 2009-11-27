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
        $result = $this->db->dataSource('SELECT * FROM test');
        $result->applyLimit(10, 1); //strankovani
        
        $this->template->xxx = $result->fetchAll();
        $this->template->xyx = 'x';
        $this->smarty('main');
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