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

    public function showOK()
    {
        if($this->companyInfo->guestbook == 'yes')
        {
            $this->template->error = "Your post is waiting to the confirm!";
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
               'comment' => strip_tags($post['comment']),
               'date%sql' => 'NOW()',
               'visible' => 'no'
           );
           $this->db->query('INSERT INTO guestbook', $arr);
           $this->deletePassword();

           $lastID = $this->db->query("SELECT max(id_guestbook) FROM guestbook WHERE company_id_company=%i",$this->companyID)->fetchSingle();

           $hash = sha1($lastID);
       $link = baseURI."authorization.php?type=gb&hash=$hash";

            $data = array
            (
                'name' => 'Malta bussines center',
                'email' => 'info@maltabussinescenter.com',
                'subject' => 'Comfirm guestbook post',
                'message' => "To confirm guestbook post go to this page: <a href='$link'>$link</a><br />"
                                ."<strong>name </strong> "
                                .$post['name']."<br />"
                                ."<strong>text </strong>".strip_tags($post['comment']),
            );

           $this->sendEmail($data, $this->companyInfo->contact_email);

           header('location: '.baseURI.'company/'.$this->companyName.'/guestbook/ok/');
         }
        $this->template = (object) $post;
        $this->loadGuestbook();
        $this->template->robots = true;
        $this->template->error = $this->error;

        $this->smarty('companyGuestbook');
    }

    private function loadGuestbook($all = false)
    {
        $sql = "SELECT name, ip, comment, date, id_guestbook
                FROM guestbook
                WHERE company_id_company = %i ";
        if(!$all)
            $sql .= "AND visible='yes'";
        $sql .= "ORDER BY date DESC";
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

        $this->loadGuestbook(true);
        $this->template->robots = true;
        $this->template->error = $this->error;

        $this->smarty('companyGuestbookEdit');
    }
}
?>
