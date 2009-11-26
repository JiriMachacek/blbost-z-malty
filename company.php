<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of company
 *
 * @author jmachacek
 */
abstract class company extends main
{
    //put your code here
    protected $edit;
    protected $companyID;
    protected $companyInfo;
    protected $companyName;

    public function loadData($name)
    {
        $this->companyName = $name;
        $sql = "SELECT
                    `id_company` ,
                    `url` ,
                    `locality_id_locality` AS adress_locality,
                    `name` ,
                    `content` ,
                    `adress_adress` ,
                    `adress_street` ,
                    `adress_post` ,
                    `adress_country` ,
                    concat(`contact_name1`, ', ' ,`contact_surname1`) AS name1 ,
                    concat(`contact_name2`, ', ' ,`contact_surname2`) AS name2 ,
                    `contact_tel1` ,
                    `contact_tel2` ,
                    `contact_fax` ,
                    `contact_mob` ,
                    `contact_email` ,
                    `contact_www` ,
                    `page` ,
                    `reg_email` ,
                    `nick` ,
                    `password` ,
                    `gallery` ,
                    `guestbook` ,
                    `products` ,
                    `news` ,
                    `events` ,
                    `contact` ,
                    `user`
                FROM
                    company
                ";

        /**
         * @fix where
         */
        $result = $this->db->dataSource($sql);

        if($result->count() == 1)
        {
            $this->companyInfo = $result->fetch();
            $this->companyID = $this->companyInfo->id_company;

            $user = user::getInstance();

            $this->edit = ($user->getUserID() == $this->companyID)? true : false;

        }
        else
        {
            header('location: '.baseURI.'error/company/'.$this->companyName.'/');
        }
    }

    protected function smarty($template)
    {
        $this->template->tpl_subpage = $template;
        $this->template->tpl_company = $this->companyInfo;
        $this->template->tpl_curl = 'company/'.$this->companyName;
        $this->template->tpl_edit = $this->edit;
        parent::smarty('company');
    }


}
?>
