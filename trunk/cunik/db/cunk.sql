SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';


-- -----------------------------------------------------
-- Table `locality`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `locality` (
  `id_locality` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(45) NULL ,
  PRIMARY KEY (`id_locality`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `company`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `company` (
  `id_company` INT NOT NULL AUTO_INCREMENT ,
  `locality_id_locality` INT NOT NULL ,
  `name` VARCHAR(45) NULL ,
  `content` TEXT NULL ,
  `adress_adress` VARCHAR(45) NULL ,
  `adress_street` VARCHAR(45) NULL ,
  `adress_post` VARCHAR(45) NULL ,
  `adress_country` VARCHAR(45) NULL ,
  `contact_name1` VARCHAR(45) NULL ,
  `contact_surname1` VARCHAR(45) NULL ,
  `contact_name2` VARCHAR(45) NULL ,
  `contact_surname2` VARCHAR(45) NULL ,
  `contact_tel1` VARCHAR(45) NULL ,
  `contact_tel2` VARCHAR(45) NULL ,
  `contact_fax` VARCHAR(45) NULL ,
  `contact_mob` VARCHAR(45) NULL ,
  `contact_email` VARCHAR(45) NULL ,
  `contact_www` VARCHAR(45) NULL ,
  `page` TEXT NULL ,
  `reg_email` VARCHAR(45) NULL ,
  `nick` VARCHAR(45) NULL ,
  `password` VARCHAR(45) NULL ,
  `gallery` ENUM('no','yes') NULL ,
  `guestbook` ENUM('no','yes') NULL ,
  `products` ENUM('no','yes') NULL ,
  `news` ENUM('no','yes') NULL ,
  `events` ENUM('no','yes') NULL ,
  `contact` ENUM('no','yes') NULL ,
  `user` ENUM('user','paying','admin') NULL ,
  PRIMARY KEY (`id_company`) ,
  INDEX `fk_company_locality` (`locality_id_locality` ASC) )
ENGINE = InnoDB;




-- -----------------------------------------------------
-- Table `gallery`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `gallery` (
  `id_gallery` INT NOT NULL AUTO_INCREMENT ,
  `company_id_company` INT NOT NULL ,
  `title` VARCHAR(45) NULL ,
  `file` VARCHAR(45) NOT NULL ,
  `position` INT NULL ,
  `x` INT NULL ,
  `y` INT NULL ,
  PRIMARY KEY (`id_gallery`) ,
  INDEX `fk_gallery_company1` (`company_id_company` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `product`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `product` (
  `id_product` INT NOT NULL AUTO_INCREMENT ,
  `company_id_company` INT NOT NULL ,
  `name` VARCHAR(45) NOT NULL ,
  `image` VARCHAR(45) NULL ,
  `description` VARCHAR(45) NULL ,
  `price` FLOAT NOT NULL ,
  PRIMARY KEY (`id_product`) ,
  INDEX `fk_product_company1` (`company_id_company` ASC) )
ENGINE = InnoDB;





-- -----------------------------------------------------
-- Table `directory`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `directory` (
  `id_directory` INT NOT NULL ,
  `name` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`id_directory`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `category`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `category` (
  `id_category` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(45) NOT NULL ,
  `directory_id_directory` INT NOT NULL ,
  PRIMARY KEY (`id_category`) ,
  INDEX `fk_category_directory1` (`directory_id_directory` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pages`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `pages` (
  `id_pages` INT NOT NULL AUTO_INCREMENT ,
  `text` TEXT NULL ,
  `name` VARCHAR(45) NULL ,
  PRIMARY KEY (`id_pages`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `company_has_category`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `company_has_category` (
  `company_id_company` INT NOT NULL ,
  `category_id_category` INT NOT NULL ,
  PRIMARY KEY (`company_id_company`, `category_id_category`) ,
  INDEX `fk_company_has_category_company1` (`company_id_company` ASC) ,
  INDEX `fk_company_has_category_category1` (`category_id_category` ASC) )
ENGINE = InnoDB;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
