<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class companyNews extends company
{
    private $error;
    public function show()
    {
        if($this->companyInfo->news == 'yes')
        {
            $this->loadNews();
            $this->smarty('companyNews');
        }
        else
        {
            header('location: '.baseURI.'error/company/'.$this->companyName.'/news/');
        }
    }

    public function showForm()
    {
        $this->template->idNews = 'new';
        $this->smarty('companyNewsForm');
    }

    public function send($post)
    {
        if ($this->validNews($post))
        {
            $date = explode('-', $post['eventdate']);
            $arr = array
            (
                'company_id_company' => $this->companyID,
                'title' => $post['eventtitle'],
                'text' => strip_tags($post['eventdescription']),
                'date' => $date[2].'-'.$date[1].'-'.$date[0],
            );

            if ($post['idNews'] == 'new')
            {
                $this->db->query('INSERT INTO news', $arr);
            }
            else
            {
                $this->db->query('UPDATE news SET ', $arr, 'WHERE id_news=%i', $post['idNews']);
            }
           

           header('location: '.baseURI.'company/'.$this->companyName.'/news/');
         }
        $this->template = (object) $post;

        $this->template->robots = true;
        $this->template->error = $this->error;

        $this->smarty('companyNewsForm');
    }

    private function loadNews()
    {
        $sql = 'SELECT title, text, date, id_news
                FROM news
                WHERE company_id_company = %i
                ORDER BY date DESC';
        $this->template->news = $this->db->query($sql, $this->companyID)->fetchAll();
    }

    private function validNews($post)
    {

        if($post['eventtitle'] == '')
        {
            $this->error .= 'Insert title <br />';
        }

        if(!ereg("^(0[1-9]|[12][0-9]|3[01])[-](0[1-9]|1[0-2])[-]((19|20)[0-9]{2})$",$post['eventdate']))
        {
            $this->error .= 'Insert date in right format DD-MM-YYYY<br />';
        }


        if($post['eventdescription'] == '')
        {
            $this->error .= 'Insert description <br />';
        }

        return ($this->error <> '') ? false : true;

    }
    
    public function edit($id = 0)
    {
        if($id == 0)
        {
            $this->template->robots = true;
            $this->loadNews();
            $this->smarty('companyNewsEdit');
        }
        else
        {
            $result = (array) $this->db->query("SELECT id_news AS idNews, title AS eventtitle, text AS eventdescription, DATE_FORMAT(date, '%d-%m-%Y') AS eventdate FROM news WHERE id_news =%i", $id)->fetch();
            $this->template = (object) $result;
            $this->template->robots = true;

            $this->smarty('companyNewsForm');
        }


    }

    public function delete($id)
    {
        $this->db->query('DELETE FROM news WHERE id_news=%s', $id);
        header('location: '.baseURI.'company/'.$this->companyName.'/news/edit/');

    }
}
?>
