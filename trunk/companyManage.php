<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class companyManage extends company
{
    private $error;
    private $newPassword = '';
    public function show()
    {
        $this->template->manage = $this->loadManage();
        $this->smarty('companyManage');
    }


    public function send($post)
    {
        if($this->verifyPassword($post))
        {
            $arr = array
            (
                'gallery'   => (isset($post['gallery']))? 'yes' : 'no',
                'guestbook' => (isset($post['guestbook']))? 'yes' : 'no',
                'products'  => (isset($post['products']))? 'yes' : 'no',
                'news'      => (isset($post['news']))? 'yes' : 'no',
                'events'    => (isset($post['events']))? 'yes' : 'no',
                'contact'   => (isset($post['contact']))? 'yes' : 'no',
            );
                $this->companyInfo->gallery   = (isset($post['gallery']))? 'yes' : 'no';
                $this->companyInfo->guestbook = (isset($post['guestbook']))? 'yes' : 'no';
                $this->companyInfo->products  = (isset($post['products']))? 'yes' : 'no';
                $this->companyInfo->news      = (isset($post['news']))? 'yes' : 'no';
                $this->companyInfo->events    = (isset($post['events']))? 'yes' : 'no';
                $this->companyInfo->contact   = (isset($post['contact']))? 'yes' : 'no';

            $this->error = 'Pages changed...';
            if($this->newPassword <> '')
            {
                $arr['password'] = $this->newPassword;
                $this->error = 'Pages and password changed';
            }
            $this->db->query('UPDATE company SET ', $arr, 'WHERE id_company=%i', $this->companyID);


        }

        $this->template->manage = (object) $post;
        $this->template->error = $this->error;
        $this->smarty('companyManage');
    }

    private function loadManage()
    {
        return $this->db->
            query('SELECT gallery, guestbook, products, news, events, contact FROM company WHERE id_company=%i', $this->companyID)
                ->fetch();
    }

    private function verifyPassword($post)
    {
        if ($post['newpassword'] == '' && $post['newpassword'] == '' && $post['currentpassword'] == '')
        {
            return true;
        }
        else
        {
            if (($post['newpassword'] == $post['verifypassword']) && $post['verifypassword'] <> '')
            {
                $oldpassword = $this->db->query('SELECT password FROM company WHERE id_company=%i', $this->companyID)
                    ->fetchSingle();
                if($oldpassword == sha1($post['currentpassword']))
                {
                    $this->newPassword = sha1($post['newpassword']);
                    return true;
                }
                else
                {
                    $this->error = 'Current password is not valid!';
                }
            }
            else
            {
                $this->error = 'New and Valid password are not same or one of them is empty.';
            }
        }

        return false;
    }

}
?>
