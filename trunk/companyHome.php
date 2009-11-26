<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of companyHome
 *
 * @author jmachacek
 */
class companyHome extends company
{
    //put your code here

    public function __construct($name)
    {
        parent::__construct($name);
    }

    public function show()
    {
        $this->smarty('home');
    }
}
?>
