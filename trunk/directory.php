<?php
/**
 * Directories and categories of companies
 *
 * @author LukasJanda
 */
class directories extends main
{
    public function render()
    {
        $result = $this->db->dataSource('SELECT * FROM directory');
        $this->template->directory = $result->fetchAll();

        $result = $this->db->dataSource('SELECT * FROM category');
        $this->template->category = $result->fetchAll();
        $this->smarty("directory");
    }


}
?>