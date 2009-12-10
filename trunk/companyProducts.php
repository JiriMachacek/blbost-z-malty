<?php
/**
 * Description of companyHome
 *
 * @author LukasJanda
 */

class companyProducts extends company
{
    public function show()
    { 
        if($this->companyInfo->products == 'yes')
        {

            $result = $this->db->query("SELECT product.id_product AS id_product, product.price AS price, product.name AS name, product.description AS description, product.image AS image
                                        FROM product, company
                                        WHERE product.company_id_company = company.id_company
                                        AND company.url = '$this->companyName'
                                        ORDER BY product.name ASC")->fetchAll();
            $this->template->products = $result;
            $this->smarty('products');
        }
         else
        {
            header('location: '.baseURI.'error/company/'.$this->companyName.'/products/');
        }
   }
    public function productAdd()
    {
        if(isSet($_POST["add"]))
        {
            if(isSet($_FILES["backup"]))
            {
                $img = $this->seo($_POST["productname"]);
            }
            else
            {
                $img="";
            }

        $this->db->query("INSERT INTO `malta`.`product` (
                        `id_product` ,
                        `company_id_company` ,
                        `name` ,
                        `image` ,
                        `description` ,
                        `price`
                        )
                        VALUES (
                        NULL , (

                        SELECT company.id_company
                        FROM company
                        WHERE company.url = '$this->companyName'
                        ), '".$_POST["productname"]."', '".$this->companyName."-".$img."', '".$_POST["productsummary"]."', '".$_POST["price"]."'
                        )");
          
               
                $this->productsUploadImage($this->companyName,$img);
                 header('location: '.baseURI.'company/'.$this->companyName.'/products/edit/');

        }

        $this->smarty('productAdd');
    }
    public function edit()
    {

        $result = $this->db->query("SELECT product.id_product AS id_product, product.price AS price, product.name AS name, product.description AS description, product.image AS image
                                    FROM product, company
                                    WHERE product.company_id_company = company.id_company
                                    AND company.url = '$this->companyName'
                                    ORDER BY product.name ASC")->fetchAll();
        $this->template->products = $result;
        $this->smarty('productsEdit');

    }
    public function productEdit($id)
    {
        if(isSet($_POST['edit']))
        {
            if(isSet($_FILES['backup']))
            {
                $img = $this->seo($_POST["productname"]);
                $image=", image='".$this->companyName."-".$img."'";
                $this->productsUploadImage($this->companyName,$img);
            }
            else
            {
                $image="";
            }
            $this->db->query("UPDATE product SET description='".$_POST['productsummary']."', name='".$_POST['productname']."', price='".$_POST['price']."'  ".$image." WHERE id_product = '".$id."'");
        }
        $result = $this->db->query("SELECT product.id_product AS id_product, product.price AS price, product.name AS name, product.description AS description, product.image AS image
                                    FROM product, company
                                    WHERE product.company_id_company = company.id_company
                                    AND company.url = '$this->companyName' AND product.id_product='$id'
                                    ORDER BY product.name ASC")->fetchAll();
        $this->template->product = $result;
        $this->smarty('productEdit');
    }
    public function productDelete($id)
    {
        if($this->edit)
        {

        //we need to delete image as well
        $file = $this->db->query('SELECT product.image AS image
                                    FROM product WHERE product.id_product=%i ', $id)->fetchSingle();
        //delete sql row
            $this->db->query("DELETE FROM `malta`.`product` WHERE `product`.`id_product` = '$id'");

            if(file_exists("images/products/".$file.".jpg"))
            {
                $del = unlink("images/products/".$file.".jpg");echo "aho";
            }
        }
    }
    public function productsDeleteImage($id,$file)
    {
        if($this->edit)
        {
            $del = unlink("images/products/".$file.".jpg");
            $this->db->query("UPDATE product SET image = '' WHERE id_product = '".$id."'");

        }
    }

    protected function productsUploadImage($company,$img)
    {
       if($this->edit)
            {
                $backup_name = ($_FILES["backup"]["name"]);
                $backup = ($_FILES["backup"]["tmp_name"]);
                $backup_type = ($_FILES["backup"]["type"]);

                $height = 100;
                $width = 100;

                if ($backup_type=="image/pjpeg" | $backup_type=="image/jpeg")
                {
                $ext = ".jpg";
                }
              else
              {
              echo "The image file is not the JPEG format.";
              }

                $file = $company."-".$img;
                $URL = $file.$ext;

                Copy($backup,"images/products/_$URL");


             $size=GetImageSize("images/products/_$URL");

             if ($width && ($size[0] < $size[1])){
                   $width = ($height / $size[1]) * $size[0];
             }
             else{
                   $height = ($width / $size[0]) * $size[1];
             }


             $thumb = ImageCreateTrueColor($width,$height);
             $pic = ImageCreateFromJpeg("images/products/_$URL");

             imagecopyResampled ($thumb, $pic, 0, 0, 0, 0, $width, $height, $size[0], $size[1]);
             imagejpeg($thumb, "images/products/".$URL, 70);

             unlink("images/products/_$URL");
            
        }
    
  }
}

