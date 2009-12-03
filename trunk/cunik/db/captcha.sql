
CREATE TABLE IF NOT EXISTS `captcha` (
  `ID_captcha` int(11) NOT NULL auto_increment,
  `password` varchar(5) collate utf8_bin NOT NULL,
  PRIMARY KEY  (`ID_captcha`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;