--
-- ExtazCMS 1.10
--
ALTER TABLE `extaz_team` ADD `dname` VARCHAR(255) NULL AFTER `id`;
ALTER TABLE `extaz_informations` ADD `use_faq` INT NULL;

CREATE TABLE IF NOT EXISTS `extaz_faqs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question` text,
  `answer` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;
