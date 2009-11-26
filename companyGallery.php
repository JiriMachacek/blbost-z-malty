<?php
/**
 * Description of companyHome
 *
 * @author jmachacek
 */

class companyGallery extends company
{
    public function show()
    {
        $this->smarty('gallery');
    }

    public function edit()
    {
        $this->smarty('galleryEdit');
    }
}

