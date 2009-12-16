<?php

/**
 * Description of companyHome
 *
 * @author jmachacek
 */
class companyHome extends company
{
    //put your code here

    public function show()
    {
        $this->loadContent();
        $this->smarty('home');
    }

    public function edit()
    {
        $this->loadContent();
        $this->template->count = strlen($this->template->summary);
        $this->smarty('homeEdit');
    }

    private function loadContent()
    {
        $result = $this->db->query("SELECT content, url  FROM company WHERE id_company = '$this->companyID'")->fetch();
        $this->template->summary = $result->content;
    }

    public function send($post)
    {
        if(strlen($post['summary']) > 0)
        {
            $this->db->query("UPDATE company SET content = '".strip_tags($post['summary'])."' WHERE id_company = '".$this->companyID."'");
            header('location: '.baseURI.'company/'.$this->companyName.'/');
        }
        else
        {
            header('location: '.baseURI.'company/'.$this->companyName.'/home/edit/');
        }
        
    }


    public function deleteImage($url)
    {
        if($this->edit)
        {
            $del = unlink("images/companies/".$url.".jpg");
            $this->setImage("no");
        }
    }

    public function uploadImage($company)
    {
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
        $URL=$company.$ext;
            Copy($backup,"images/companies/_$URL");


         $size=GetImageSize("images/companies/_$URL");

         if ($width && ($size[0] < $size[1])){
               $width = ($height / $size[1]) * $size[0];
         }
         else{
               $height = ($width / $size[0]) * $size[1];
         }


         $thumb = ImageCreateTrueColor($width,$height);
         $pic = ImageCreateFromJpeg("images/companies/_$URL");

         imagecopyResampled ($thumb, $pic, 0, 0, 0, 0, $width, $height, $size[0], $size[1]);
         imagejpeg($thumb, "images/companies/".$URL, 70);

         unlink("images/companies/_".$URL);
         $this->setImage("yes");

    }
  }
}
?>
