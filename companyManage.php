<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class companyManage extends company
{
    private $error;
    private $newPassword = '';
    public function show()
    {
        $this->template->manage = $this->loadManage();
        $this->loadCategories();
        $this->loadSelectedCatagories();
        $this->smarty('companyManage');
    }


    public function send($post)
    {
        if($this->verifyPassword($post))
        {
            $arr = array
            (
                'gallery'   => (isset($post['gallery']))? 'yes' : 'no',
                'guestbook' => (isset($post['guestbook']))? 'yes' : 'no',
                'products'  => (isset($post['products']))? 'yes' : 'no',
                'news'      => (isset($post['news']))? 'yes' : 'no',
                'events'    => (isset($post['events']))? 'yes' : 'no',
                'contact'   => (isset($post['contact']))? 'yes' : 'no',
            );
                $this->companyInfo->gallery   = (isset($post['gallery']))? 'yes' : 'no';
                $this->companyInfo->guestbook = (isset($post['guestbook']))? 'yes' : 'no';
                $this->companyInfo->products  = (isset($post['products']))? 'yes' : 'no';
                $this->companyInfo->news      = (isset($post['news']))? 'yes' : 'no';
                $this->companyInfo->events    = (isset($post['events']))? 'yes' : 'no';
                $this->companyInfo->contact   = (isset($post['contact']))? 'yes' : 'no';

            $this->error = 'Pages changed...';
            if($this->newPassword <> '')
            {
                $arr['password'] = $this->newPassword;
                $this->error = 'Pages and password changed';
            }
            $this->db->query('UPDATE company SET ', $arr, 'WHERE id_company=%i', $this->companyID);

            $this->db->query('DELETE FROM company_has_category WHERE company_id_company=%i', $this->companyID);

            $keys = array_unique($this->template->categorySelected);
            $zero = array_search(0, $keys);
            unset($keys[$zero]);
            foreach ($keys as $variable) {

                $args = array
                (
                    'company_id_company' => $this->companyID,
                    'category_id_category' => $variable
                );

                $this->db->query('INSERT INTO company_has_category', $args);

            }

            $this->loadSelectedCatagories();


        }

        $this->template->manage = (object) $post;
        $this->template->error = $this->error;
        $this->loadCategories();
        $this->smarty('companyManage');
    }

    private function loadManage()
    {
        return $this->db->
            query('SELECT gallery, guestbook, products, news, events, contact FROM company WHERE id_company=%i', $this->companyID)
                ->fetch();
    }

    private function loadCategories()
    {
        $all = $this->db->query('SELECT d.name AS dir, c.id_category AS id, c.name AS na FROM directory d JOIN category c ON c.directory_id_directory = d.id_directory')->fetchAll();

        foreach ($all as $a)
        {
            $dir = $a['dir'];
            $id = $a['id'];
            $items[$dir][$id] = ' -'.$a['na'];
        }
        $category = array('- none -');
        foreach ($items as $number_variable => $variable)
        {
            $category[$number_variable] = $number_variable;
            $category+= $variable;

        }

        $this->template->categories = $category;

    }
    private function loadSelectedCatagories()
    {
          $this->template->categorySelected = $this->db->query('SELECT category_id_category FROM company_has_category WHERE company_id_company=%i', $this->companyID)->fetchAll();
    }

    private function verifyPassword($post)
    {
        $sum = 0;
        $sum += (isset($post['gallery']))? 1 : 0;
        $sum += (isset($post['guestbook']))? 1 : 0;
        $sum += (isset($post['products']))? 1 : 0;
        $sum += (isset($post['news']))? 1 : 0;
        $sum += (isset($post['events']))? 1 : 0;
        $sum += (isset($post['contact']))? 1 : 0;

        $this->template->categorySelected[0] = (is_numeric($post['cat0'])) ? $post['cat0'] : 0;
        $this->template->categorySelected[1] = (is_numeric($post['cat1'])) ? $post['cat1'] : 0;
        $this->template->categorySelected[2] = (is_numeric($post['cat2'])) ? $post['cat2'] : 0;
        $this->template->categorySelected[3] = (is_numeric($post['cat3'])) ? $post['cat3'] : 0;
        $this->template->categorySelected[4] = (is_numeric($post['cat4'])) ? $post['cat4'] : 0;
        $this->template->categorySelected[5] = (is_numeric($post['cat5'])) ? $post['cat5'] : 0;

        if ($sum > 5)
        {
            $this->error = 'Choose less than 5 pages';
        }
        else if (array_sum($this->template->categorySelected) == 0)
        {
            $this->error = 'Choos any category';
        }
        else if ($post['newpassword'] == '' && $post['newpassword'] == '' && $post['currentpassword'] == '')
        {
            return true;
        }
        else
        {
            if (($post['newpassword'] == $post['verifypassword']) && $post['verifypassword'] <> '')
            {
                $oldpassword = $this->db->query('SELECT password FROM company WHERE id_company=%i', $this->companyID)
                    ->fetchSingle();
                if($oldpassword == sha1($post['currentpassword']))
                {
                    $this->newPassword = sha1($post['newpassword']);
                    return true;
                }
                else
                {
                    $this->error = 'Current password is not valid!';
                }
            }
            else
            {
                $this->error = 'New and Valid password are not same or one of them is empty.';
            }
        }

        return false;
    }

}
?>
