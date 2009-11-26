/* Přidat kategorii */
INSERT INTO `malta`.`category` (
`id_category` ,
`name` ,
`directory_id_directory` 
)
VALUES (
NULL , '$name', '$id_of_director'
);
/* Přidat directory */
INSERT INTO `malta`.`directory` (
`id_directory` ,
`name` 
)
VALUES (
NULL , '$name_of_directory'
);
/* Přidat event */
INSERT INTO `malta`.`events` (
`id_events` ,
`company_id_company` ,
`title` ,
`text` ,
`date` 
)
VALUES (
NULL , '$id_company', '$title', '$text', '$date'
);
/* Přidat fotku */
INSERT INTO `malta`.`gallery` (
`id_gallery` ,
`company_id_company` ,
`title` ,
`file` ,
`position` ,
`x` ,
`y` 
)
VALUES (
NULL , '$id_company', '$title', '$file', '$position', '$x', '$y'
);
/* Přidat komentář do guestbooku */
INSERT INTO `malta`.`guestbook` (
`id_guestbook` ,
`company_id_company` ,
`name` ,
`ip` ,
`comment` ,
`date` 
)
VALUES (
NULL , 'id_company', 'name', 'ip', 'comment', 'date'
);
/* Přidat novinku */
INSERT INTO `malta`.`news` (
`id_news` ,
`company_id_company` ,
`title` ,
`text` ,
`date` 
)
VALUES (
NULL , '$id_company', '$title', '$text', '$date'
);
/* Přidat lokalitu */
nebudeme přidávat
/* Přidat page */
nebudeme přidávat
/* Přidat prroduct */
INSERT INTO `malta`.`product` (
`id_product` ,
`company_id_company` ,
`name` ,
`image` ,
`description` ,
`price` 
)
VALUES (
NULL , '$id_company', '$name', '$image', '$description', '$price'
);
/* Přidat firmu - vloží se jenom přihlašovací údaje, potom se urpaví zbytek*/
INSERT INTO `malta`.`company` (`id_company`, `locality_id_locality`, `name`, `content`, `adress_adress`, `adress_street`, `adress_post`, `adress_country`, `contact_name1`, `contact_surname1`, `contact_name2`, `contact_surname2`, `contact_tel1`, `contact_tel2`, `contact_fax`, `contact_mob`, `contact_email`, `contact_www`, `page`, `reg_email`, `nick`, `password`, `gallery`, `guestbook`, `products`, `news`, `events`, `contact`, `user`) 
VALUES (NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$email', '$nick', '$pass', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
/* Přidat vazbu mezi kategorií a firmou */
INSERT INTO `malta`.`company_has_category` (
`company_id_company` ,
`category_id_category` 
)
VALUES (
'$id_company', 'id_category'
);

/*********************************************/
UPDATY
/*********************************************/
kategorie

UPDATE `malta`.`category` SET `name` = 'ko',
`directory_id_directory` = '3' 
WHERE `category`.`id_category` =1 LIMIT 1 ;
/*********************************************/
company 

UPDATE `malta`.`company_has_category` SET `company_id_company` = '1',
`category_id_category` = '2' 
WHERE `company_has_category`.`company_id_company` =2 
AND `company_has_category`.`category_id_category` =3 LIMIT 1 ;
/*********************************************/
directory

UPDATE `malta`.`directory` SET `name` = 'gfhfdhf' 
WHERE `directory`.`id_directory` =1 LIMIT 1 ;
/*********************************************/
event

UPDATE `malta`.`events` SET 
`title` = 'titttle',
`text` = 'texttt',
`date` = '0022-00-00 00:00:00' 
WHERE `events`.`id_events` =1 LIMIT 1 ;
/*********************************************/
fotka

UPDATE `malta`.`gallery` SET `title` = 'titlee',
`position` = '1' WHERE `gallery`.`id_gallery` =1 LIMIT 1 ;
/*********************************************/
guestbook nemá update
/*********************************************/
lokality taky nemají update
/*********************************************/
news 

UPDATE `malta`.`news` SET `title` = 'titleee',
`text` = 'texttt' WHERE `news`.`id_news` =2 LIMIT 1 ;
/*********************************************/
pages

UPDATE `malta`.`pages` SET `text` = 'texttttttt' WHERE `pages`.`name` = 'jmeno' LIMIT 1 ;
/*********************************************/
products 

UPDATE `malta`.`product` SET `name` = 'namee',
`image` = 'imagee',
`description` = 'descriptionn',
`price` = '23' WHERE `product`.`id_product` =1 LIMIT 1 ;
/*********************************************/
company - tady se akorát pak namelou správný proměnný, nebudu to teď vypisovat

UPDATE `malta`.`company` SET `locality_id_locality` = '1',
`name` = 'name',
`content` = 'content',
`adress_adress` = 'adr',
`adress_street` = 'adr',
`adress_post` = 'adr',
`adress_country` = 'adr',
`contact_name1` = 'contact',
`contact_surname1` = 'c',
`contact_name2` = 'c',
`contact_surname2` = 'c',
`contact_tel1` = 'tel',
`contact_tel2` = 'tel',
`contact_fax` = 'fax',
`contact_mob` = 'mob',
`contact_email` = 'email',
`contact_www` = 'www',
`page` = 'page',
`password` = '$passwd',
`gallery` = 'yes',
`guestbook` = 'yes',
`products` = 'yes',
`news` = 'yes',
`events` = 'yes',
`contact` = 'yes',
`user` = 'user' WHERE `company`.`id_company` =1 LIMIT 1 ;
