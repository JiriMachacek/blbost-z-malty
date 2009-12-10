<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class companyGuestbook extends company
{
    private $error;
    public function show()
    {
        if($this->companyInfo->guestbook == 'yes')
        {
            $this->loadGuestbook();
            $this->template->kcaptcha = $this->generatePassword();
            $this->smarty('companyGuestbook');
        }
        else
        {
            header('location: '.baseURI.'error/company/'.$this->companyName.'/guestbook/');
        }
    }

    public function send($post)
    {
         if ($this->validPost($post))
         {
           $arr = array
           (
               'company_id_company' => $this->companyID,
               'name' => $post['name'],
               'ip' => $_SERVER['REMOTE_ADDR'],
               'comment' => $post['comment'],
               'date%sql' => 'NOW()'
           );
           $this->db->query('INSERT INTO guestbook', $arr);
           $this->deletePassword();
           header('location: '.baseURI.'company/'.$this->companyName.'/guestbook/');
         }
        $this->template = (object) $post;
        $this->loadGuestbook();
        $this->template->robots = true;
        $this->template->error = $this->error;

        $this->smarty('companyGuestbook');
    }

    private function loadGuestbook()
    {
        $sql = 'SELECT name, ip, comment, date, id_guestbook
                FROM guestbook
                WHERE company_id_company = %i
                ORDER BY date DESC';
        $this->template->guestbook = $this->db->query($sql, $this->companyID)->fetchAll();
    }

    private function validPost($post)
    {
        if(!$this->checkPassword($post['kcaptcha'], $post['captcha']))
        {
             $this->error = 'You entered an incorrect code.';
             return false;
        }

        if($post['name'] == '')
        {
            $this->error .= 'Insert name <br />';
        }

        if($post['comment'] == '')
        {
            $this->error .= 'Insert comment <br />';
        }

        return ($this->error <> '') ? false : true;

    }
    
    public function edit($id = 0)
    {
        if ($id <> 0)
        {
            $this->db->query('DELETE FROM guestbook WHERE id_guestbook=%s', $id);
            header('location: '.baseURI.'company/'.$this->companyName.'/guestbook/edit/');
        }
        $this->template->robots = true;

        $this->loadGuestbook();
        $this->template->robots = true;
        $this->template->error = $this->error;

        $this->smarty('companyGuestbookEdit');
    }
}
?>
