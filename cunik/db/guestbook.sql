CREATE TABLE IF NOT EXISTS `guestbook` (
  `id_guestbook` int(11) NOT NULL auto_increment,
  `company_id_company` int(11) NOT NULL,
  `name` varchar(45) collate utf8_bin NOT NULL,
  `ip` varchar(15) collate utf8_bin NOT NULL,
  `comment` varchar(200) collate utf8_bin NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY  (`id_guestbook`),
  KEY `fk_guestbook_company1` (`company_id_company`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;