<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class companyEvents extends company
{
    private $error;
    public function show()
    {
        if($this->companyInfo->events == 'yes')
        {
            $this->loadEvents();
            $this->smarty('companyEvents');
        }
        else
        {
            header('location: '.baseURI.'error/company/'.$this->companyName.'/events/');
        }

    }

    public function showForm()
    {
        $this->template->idEvents = 'new';
        $this->smarty('companyEventsForm');
    }

    public function send($post)
    {
        if ($this->validEvents($post))
        {
            $date = explode('-', $post['eventdate']);
            $arr = array
            (
                'company_id_company' => $this->companyID,
                'title' => $post['eventtitle'],
                'text' => $post['eventdescription'],
                'date' => $date[2].'-'.$date[1].'-'.$date[0],
            );

            if ($post['idEvents'] == 'new')
            {
                $this->db->query('INSERT INTO events', $arr);
            }
            else
            {
                $this->db->query('UPDATE events SET ', $arr, 'WHERE id_events=%i', $post['idEvents']);
            }
           

           header('location: '.baseURI.'company/'.$this->companyName.'/events/');
         }
        $this->template = (object) $post;

        $this->template->robots = true;
        $this->template->error = $this->error;

        $this->smarty('companyEventsForm');
    }

    private function loadEvents()
    {
        $sql = 'SELECT title, text, date, id_events
                FROM events
                WHERE company_id_company = %i
                ORDER BY date DESC';
        $this->template->events = $this->db->query($sql, $this->companyID)->fetchAll();
    }

    private function validEvents($post)
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
            $this->loadEvents();
            $this->smarty('companyEventsEdit');
        }
        else
        {
            $result = (array) $this->db->query("SELECT id_events AS idEvents, title AS eventtitle, text AS eventdescription, DATE_FORMAT(date, '%d-%m-%Y') AS eventdate FROM events WHERE id_events =%i", $id)->fetch();
            $this->template = (object) $result;
            $this->template->robots = true;

            $this->smarty('companyEventsForm');
        }


    }

    public function delete($id)
    {
        $this->db->query('DELETE FROM events WHERE id_events=%s', $id);
        header('location: '.baseURI.'company/'.$this->companyName.'/events/edit/');

    }
}
?>
