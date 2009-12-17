<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
require_once 'main.php';
class install extends main
{
    public function inst()
    {
        $q = "CREATE TABLE IF NOT EXISTS `captcha` (
              `ID_captcha` int(11) NOT NULL AUTO_INCREMENT,
              `password` varchar(5) COLLATE utf8_bin NOT NULL,
              PRIMARY KEY (`ID_captcha`)
            ) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

        ";
        $q1 = "
            CREATE TABLE IF NOT EXISTS `category` (
              `id_category` int(11) NOT NULL AUTO_INCREMENT,
              `name` varchar(45) NOT NULL,
              `directory_id_directory` int(11) NOT NULL,
              PRIMARY KEY (`id_category`),
              KEY `fk_category_directory1` (`directory_id_directory`)
            ) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
        ";
        $q2 = "


            CREATE TABLE IF NOT EXISTS `company` (
              `id_company` int(11) NOT NULL AUTO_INCREMENT,
              `url` varchar(50) DEFAULT NULL,
              `locality_id_locality` int(11) DEFAULT NULL,
              `name` varchar(45) DEFAULT NULL,
              `content` text,
              `adress_adress` varchar(45) DEFAULT NULL,
              `adress_street` varchar(45) DEFAULT NULL,
              `adress_post` varchar(45) DEFAULT NULL,
              `adress_country` varchar(45) DEFAULT NULL,
              `contact_name1` varchar(45) DEFAULT NULL,
              `contact_surname1` varchar(45) DEFAULT NULL,
              `contact_name2` varchar(45) DEFAULT NULL,
              `contact_surname2` varchar(45) DEFAULT NULL,
              `contact_tel1` varchar(45) DEFAULT NULL,
              `contact_tel2` varchar(45) DEFAULT NULL,
              `contact_fax` varchar(45) DEFAULT NULL,
              `contact_mob` varchar(45) DEFAULT NULL,
              `contact_email` varchar(45) DEFAULT NULL,
              `contact_www` varchar(45) DEFAULT NULL,
              `page` text,
              `reg_email` varchar(45) DEFAULT NULL,
              `nick` varchar(45) DEFAULT NULL,
              `password` varchar(45) DEFAULT NULL,
              `gallery` enum('no','yes') DEFAULT NULL,
              `guestbook` enum('no','yes') DEFAULT NULL,
              `products` enum('no','yes') DEFAULT NULL,
              `news` enum('no','yes') DEFAULT NULL,
              `events` enum('no','yes') DEFAULT NULL,
              `contact` enum('no','yes') DEFAULT NULL,
              `user` enum('user','paying','admin') DEFAULT NULL,
              `image` enum('no','yes') NOT NULL DEFAULT 'no',
              PRIMARY KEY (`id_company`),
              KEY `fk_company_locality` (`locality_id_locality`)
            ) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

        ";
        $q3 = "

            CREATE TABLE IF NOT EXISTS `company_has_category` (
              `company_id_company` int(11) NOT NULL,
              `category_id_category` int(11) NOT NULL,
              PRIMARY KEY (`company_id_company`,`category_id_category`),
              KEY `fk_company_has_category_company1` (`company_id_company`),
              KEY `fk_company_has_category_category1` (`category_id_category`)
            ) ENGINE=InnoDB DEFAULT CHARSET=latin1;

        ";
        $q4 = "
            CREATE TABLE IF NOT EXISTS `directory` (
              `id_directory` int(11) NOT NULL AUTO_INCREMENT,
              `name` varchar(45) NOT NULL,
              PRIMARY KEY (`id_directory`)
            ) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
        ";
        $q5 = "

            CREATE TABLE IF NOT EXISTS `events` (
              `id_events` int(11) NOT NULL AUTO_INCREMENT,
              `company_id_company` int(11) NOT NULL,
              `title` varchar(45) COLLATE utf8_bin DEFAULT NULL,
              `text` varchar(200) COLLATE utf8_bin DEFAULT NULL,
              `date` date DEFAULT NULL,
              PRIMARY KEY (`id_events`),
              KEY `fk_news_company1` (`company_id_company`)
            ) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

        ";
        $q6 = "
            CREATE TABLE IF NOT EXISTS `gallery` (
              `id_gallery` int(11) NOT NULL AUTO_INCREMENT,
              `company_id_company` int(11) NOT NULL,
              `title` varchar(45) DEFAULT NULL,
              `file` varchar(45) NOT NULL,
              `position` int(11) DEFAULT NULL,
              `x` int(11) DEFAULT NULL,
              `y` int(11) DEFAULT NULL,
              PRIMARY KEY (`id_gallery`),
              KEY `fk_gallery_company1` (`company_id_company`)
            ) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

        ";
        $q7 = "

            CREATE TABLE IF NOT EXISTS `guestbook` (
              `id_guestbook` int(11) NOT NULL AUTO_INCREMENT,
              `company_id_company` int(11) NOT NULL,
              `name` varchar(45) COLLATE utf8_bin NOT NULL,
              `ip` varchar(15) COLLATE utf8_bin NOT NULL,
              `comment` varchar(200) COLLATE utf8_bin NOT NULL,
              `date` datetime NOT NULL,
              `visible` enum('no','yes') COLLATE utf8_bin DEFAULT NULL,
              PRIMARY KEY (`id_guestbook`),
              KEY `fk_guestbook_company1` (`company_id_company`)
            ) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

        ";
        $q8 = "

            CREATE TABLE IF NOT EXISTS `locality` (
              `id_locality` int(11) NOT NULL AUTO_INCREMENT,
              `name` varchar(45) DEFAULT NULL,
              PRIMARY KEY (`id_locality`)
            ) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

        ";
        $q9 = "

            CREATE TABLE IF NOT EXISTS `news` (
              `id_news` int(11) NOT NULL AUTO_INCREMENT,
              `company_id_company` int(11) NOT NULL,
              `title` varchar(45) COLLATE utf8_bin DEFAULT NULL,
              `text` varchar(200) COLLATE utf8_bin DEFAULT NULL,
              `date` date DEFAULT NULL,
              PRIMARY KEY (`id_news`),
              KEY `fk_news_company1` (`company_id_company`)
            ) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;
        ";
        $q10 = "

            CREATE TABLE IF NOT EXISTS `pages` (
              `text` text,
              `name` varchar(45) NOT NULL DEFAULT '',
              PRIMARY KEY (`name`)
            ) ENGINE=InnoDB DEFAULT CHARSET=latin1;
        ";
        $q11 = "
            CREATE TABLE IF NOT EXISTS `product` (
              `id_product` int(11) NOT NULL AUTO_INCREMENT,
              `company_id_company` int(11) NOT NULL,
              `name` varchar(45) NOT NULL,
              `image` varchar(45) DEFAULT NULL,
              `description` varchar(45) DEFAULT NULL,
              `price` float NOT NULL,
              PRIMARY KEY (`id_product`),
              KEY `fk_product_company1` (`company_id_company`)
            ) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
            ";
    
    $this->db->query($q);
    $this->db->query($q1);
    $this->db->query($q2);
    $this->db->query($q3);
    $this->db->query($q4);
    $this->db->query($q5);
    $this->db->query($q6);
    $this->db->query($q7);
    $this->db->query($q8);
    $this->db->query($q9);
    $this->db->query($q10);
    $this->db->query($q11);
    echo "databases was created";
    }
}
$ins = new install();
$ins->inst();
?>
