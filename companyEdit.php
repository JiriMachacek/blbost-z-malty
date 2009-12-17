<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class companyEdit extends company
{
    private $error;
    public function show()
    {

            $this->edit();
            $this->smarty('companyEdit');

    }

    public function send()
    {

            $arr = array
            (
                'name' => $_POST['name'],
                'content' => $_POST['content'],
                'adress_adress' => $_POST['adress_adress'],
                'adress_street' => $_POST['adress_street'],
                'adress_post' => $_POST['adress_post'],
                'adress_country' => $_POST['adress_country'],
                'contact_name1' => $_POST['contact_name1'],
                'contact_surname1' => $_POST['contact_surname1'],
                'contact_name2' => $_POST['contact_name2'],
                'contact_surname2' => $_POST['contact_surname2'],
                'contact_tel1' => $_POST['contact_tel1'],
                'contact_tel2' => $_POST['contact_tel2'],
                'contact_fax' => $_POST['contact_fax'],
                'contact_mob' => $_POST['contact_mob'],
                'contact_email' => $_POST['contact_email'],
                'contact_www' => $_POST['contact_www'],
                'id_company' => $_POST['id_company'],
            );

                $this->db->query('UPDATE company SET ', $arr, 'WHERE id_company=%i', $_POST['id_company']);

           header('location: '.baseURI.'company/'.$this->companyName.'/');
    }
    
    public function edit($id = 0)
    {
            $result = (array) $this->db->query("SELECT company.name,
                                        company.content,
                                        company.adress_adress,
                                        company.adress_street,
                                        company.adress_post,
                                        company.adress_country,
                                        company.contact_name1,
                                        company.contact_surname1,
                                        company.contact_name2,
                                        company.contact_surname2,
                                        company.contact_tel1,
                                        company.contact_tel2,
                                        company.contact_fax,
                                        company.contact_mob,
                                        company.contact_email,
                                        company.contact_www,
                                        company.page,
                                        company.url,
                                        company.id_company,
                                        company.image,
                                        company.locality_id_locality
                                        FROM company
                                        WHERE company.url = '".$this->companyName."'")->fetch();
            $this->template->company = $result;
            $this->template->country = array(
            'Malta' => 'Malta',
            'Gozo' => 'Gozo',
            'Comino' =>'Comino',
            );
            $this->template->robots = true;

            $this->smarty('companyEdit');


    }
}
?>
