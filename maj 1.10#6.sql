--
-- ExtazCMS 1.11
--
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


--
-- ExtazCMS 1.10
--
ALTER TABLE `extaz_team` ADD `dname` VARCHAR(255) NULL AFTER `id`;
ALTER TABLE `extaz_informations` ADD `use_faq` INT NULL;
CREATE TABLE IF NOT EXISTS `extaz_faqs` (
  `id` int(11) NOT NULL,
  `question` text,
  `answer` text
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;

--
-- ExtazCMS 1.9
--
ALTER TABLE `extaz_informations` ADD `use_igchat` INT NULL;
ALTER TABLE `extaz_informations` ADD `use_starpass` INT NULL;

--
-- ExtazCMS - 1.8
--
CREATE TABLE IF NOT EXISTS `extaz_votes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `ip` text NOT NULL,
  `reward` int(11) NOT NULL,
  `next_vote` text NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;
