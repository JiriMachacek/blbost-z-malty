<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of autorization
 *
 * @author maChy
 */
class authorization extends main
{
    public function  __construct($type, $hash)
    {
        if($type == 'gb')
        {
            $this->gb($hash);
        }
        else if($type == 'auth')
        {
            $this->auth($hash);
        }
    }

    private function gb($hash)
    {
        $id = $this->db
            ->query('SELECT ')
            ->fetchSingle();
    }

    private function auth($hash)
    {
        $data = $this->db
            ->query("SELECT id_company, password FROM company WHERE sha1(password) = %s ", $hash)
            ->fetch();

        var_dump($data);
    }
}
?>
