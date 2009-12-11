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
class error extends main
{
    public function __construct($url)
    {
        $this->template->error = str_replace('error/', '', $url).'/';
        $this->template->title = 'error page';
        $this->template->robots = true;
        $this->smarty('error');
    }

}
?>
