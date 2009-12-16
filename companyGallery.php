<?php
/**
 * Description of companyHome
 *
 * @author LukasJanda
 */

class companyGallery extends company
{
    public function show()
    {
        if($this->companyInfo->gallery == 'yes')
        {

            $result = $this->db->query("select gallery.id_gallery as id_gallery,
                                        gallery.x as x,
                                        gallery.y as y,
                                        gallery.file as file,
                                        gallery.position as position
                                        from gallery, company
                                        where company.url=%s
                                        order by gallery.position ASC", $this->companyName)->fetchAll();
            $this->template->gallery = $result;
            $this->smarty('gallery');
        }
        else
        {
            header('location: '.baseURI.'error/company/'.$this->companyName.'/gallery/');
        }

   }

    public function edit()
    {
        $result = $this->db->query("select gallery.id_gallery as id_gallery,
                                    gallery.x as x,
                                    gallery.y as y,
                                    gallery.file as file,
                                    gallery.position as position
                                    from gallery, company
                                    where company.url=%s
                                    order by gallery.position ASC", $this->companyName)->fetchAll();
        $this->template->gallery = $result;
        
        $i=5;$count=0;
        while($i>0){
                if(file_exists("images/gallery/kkk_".$count.".jpg"))
                    {
                        $count++;

                    }
                    $i--;
            }
            $this->template->pocet_obrazku = $count;
            $this->smarty('galleryEdit');
    }

    public function galleryDeleteImage($id,$file)
    {
        if($this->edit)
        {
            $del = unlink("images/gallery/".$file.".jpg");
            $this->db->query("DELETE FROM `malta`.`gallery` WHERE `gallery`.`id_gallery` = '$id'");
        }
    }

    public function uploadImage($company)
    {
    $sql = "select gallery.id_gallery
            from gallery, company where company.url='$company'";
    $result = $this->db->dataSource($sql);
    $pocet = $result->count();

        if($pocet < MAX_PHOTOS)
        {
            $i=$pocet;
            while($i>=0){
                if(file_exists("images/gallery/kkk_".$pocet.".jpg"))
                    {
                        $pocet--;
                    }
                    else
                    {
                        $i=-1;
                    }
            }

            if($this->edit && $company = $_POST['send'])
            {
                $backup_name = ($_FILES["backup"]["name"]);
                $backup = ($_FILES["backup"]["tmp_name"]);
                $backup_type = ($_FILES["backup"]["type"]);

                $height = 190;
                $width = 242;

                if ($backup_type=="image/pjpeg" | $backup_type=="image/jpeg")
                {
                $ext = ".jpg";
                }
              else
              {
              echo "The image file is not the JPEG format.";
              }

                $file = $company."_".$pocet;
                $URL = $file.$ext;

                Copy($backup,"images/gallery/_$URL");


             $size=GetImageSize("images/gallery/_$URL");

             if ($width && ($size[0] < $size[1])){
                   $width = ($height / $size[1]) * $size[0];
             }
             else{
                   $height = ($width / $size[0]) * $size[1];
             }


             $thumb = ImageCreateTrueColor($width,$height);
             $pic = ImageCreateFromJpeg("images/gallery/_$URL");

             imagecopyResampled ($thumb, $pic, 0, 0, 0, 0, $width, $height, $size[0], $size[1]);
             imagejpeg($thumb, "images/gallery/".$URL, 70);

             
             $this->setImage("yes");

             $this->db->query("INSERT INTO `malta`.`gallery` (`id_gallery`, `company_id_company`, `file`, `position`, `x`, `y`)
                                VALUES (NULL, (select company.id_company from company where company.url='$company'),
                                '$file',
                                '5',
                                '$width',
                                '$height')");
        }
    }
  }
}

