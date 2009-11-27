<?php

/**
 * Description of companyHome
 *
 * @author jmachacek
 */
class companyHome extends company
{
    //put your code here

    public function show()
    {
        $this->loadContent();
        $this->smarty('home');
    }

    public function edit()
    {
        $this->loadContent();
        $this->template->count = strlen($this->template->summary);
        $this->smarty('homeEdit');
    }

    private function loadContent()
    {
        $result = $this->db->query("SELECT content, url  FROM company WHERE id_company = '$this->companyID'")->fetch();
        $this->template->summary = $result->content;
    }

    public function send($post)
    {
        if(strlen($post['summary']) > 0)
        {
            $this->db->query("UPDATE company SET content = '".$post['summary']."' WHERE id_company = '".$this->companyID."'");
            header('location: '.baseURI.'company/'.$this->companyName.'/');
        }
        else
        {
            header('location: '.baseURI.'company/'.$this->companyName.'/home/edit/');
        }
        
    }
}
?>
