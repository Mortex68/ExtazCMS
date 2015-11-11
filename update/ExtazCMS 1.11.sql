--
-- ExtazCMS 1.11
--
TRUNCATE TABLE `extaz_faqs`;
ALTER TABLE `extaz_faqs` ADD PRIMARY KEY (`id`);
ALTER TABLE `extaz_faqs` CHANGE `id` `id` INT(11) NOT NULL AUTO_INCREMENT;

CREATE TABLE IF NOT EXISTS `extaz_permissions` (
  `id` int(11) NOT NULL,
  `uid` int(10) unsigned NOT NULL,
  `admin` int(11) NOT NULL DEFAULT '0',
  `add_user` int(11) NOT NULL DEFAULT '0',
  `edit_user` int(11) NOT NULL DEFAULT '0',
  `del_user` int(11) NOT NULL DEFAULT '0',
  `add_code` int(11) NOT NULL DEFAULT '0',
  `del_code` int(11) NOT NULL DEFAULT '0',
  `add_page` int(11) NOT NULL DEFAULT '0',
  `edit_page` int(11) NOT NULL DEFAULT '0',
  `del_page` int(11) NOT NULL DEFAULT '0',
  `add_news` int(11) NOT NULL DEFAULT '0',
  `edit_news` int(11) NOT NULL DEFAULT '0',
  `del_news` int(11) NOT NULL DEFAULT '0',
  `add_faq` int(11) NOT NULL DEFAULT '0',
  `del_faq` int(11) NOT NULL DEFAULT '0',
  `edit_comment` int(11) NOT NULL DEFAULT '0',
  `del_comment` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;