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
        parent::__construct();
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
        $data = $this->db->query("SELECT id_company AS idc, password, name FROM company WHERE sha1(password) = %s ", $hash)->fetch();
        if($data)
        {
            $url = $this->seo($data->name);
            $arg = array
            (
                'password' => sha1($data->password),
                'url' => $url
            );

            $this->db->query('UPDATE company SET ', $arg, 'WHERE id_company=%i',$data->idc);
            $_SESSION['user'] = $data->idc;
            header('location: '.baseURI.'company/'.$url.'/edit/');
        }
        else
        {
            header('location: '.baseURI);
        }
    }
}
?>
