<?php
/**
 * List of companies in selected category
 *
 * @author LukasJanda
 */
class category extends main
{
    public function render($cat)
    {
        $result = $this->db->dataSource("SELECT company.name,
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
                                        company.locality_id_locality
                                        FROM company, category, company_has_category AS chc
                                        WHERE category.id_category = chc.category_id_category
                                        AND company.id_company = chc.company_id_company
                                        AND category.id_category = (
                                            SELECT category.id_category
                                            FROM category
                                            WHERE category.name = '$cat')");
        $this->template->categories = $result->fetchAll();

        //$result = $this->db->dataSource('SELECT * FROM category where category.name = "$cat"');
        //$this->template->category = $result->fetchAll();
        $this->smarty("category");
    }


}
?>