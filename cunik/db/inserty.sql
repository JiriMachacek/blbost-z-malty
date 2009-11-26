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



