CREATE TABLE IF NOT EXISTS `news` (
  `id_news` int(11) NOT NULL auto_increment,
  `company_id_company` int(11) NOT NULL,
  `title` varchar(45) collate utf8_bin default NULL,
  `text` varchar(200) collate utf8_bin default NULL,
  `date` date default NULL,
  PRIMARY KEY  (`id_news`),
  KEY `fk_news_company1` (`company_id_company`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;