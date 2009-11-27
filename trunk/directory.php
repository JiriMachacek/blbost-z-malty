<?php
/**
 * Directories and categories of companies
 *
 * @author LukasJanda
 */
class category extends main
{
    public function vykresli()
    {
        $result = $this->db->dataSource('SELECT * FROM directory');
        $this->template->directory = $result->fetchAll();

        $result = $this->db->dataSource('SELECT * FROM category');
        $this->template->category = $result->fetchAll();
        $this->smarty("directory");
    }


}
?>