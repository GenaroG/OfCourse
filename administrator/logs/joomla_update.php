#
#<?php die('Forbidden.'); ?>
#Date: 2017-05-18 08:17:54 UTC
#Software: Joomla Platform 13.1.0 Stable [ Curiosity ] 24-Apr-2013 00:00 GMT

#Fields: datetime	priority clientip	category	message
2017-05-18T08:17:54+00:00	INFO 192.168.1.36	update	Update started by user ordasoft (389). Old version is 3.6.5.
2017-05-18T08:17:57+00:00	INFO 192.168.1.36	update	Downloading update file from http://joomla-official-downloads.s3.amazonaws.com/joomladownloads/joomla3/Joomla_3.7.1-Stable-Update_Package.zip?AWSAccessKeyId=AKIAIZ6S3Q3YQHG57ZRA&Expires=1495095546&Signature=D1EA1dd%2BVIlL0f2er0XUojib%2BL4%3D.
2017-05-18T08:18:00+00:00	INFO 192.168.1.36	update	File Joomla_3.7.1-Stable-Update_Package.zip successfully downloaded.
2017-05-18T08:18:01+00:00	INFO 192.168.1.36	update	Starting installation of new version.
2017-05-18T08:18:15+00:00	INFO 192.168.1.36	update	Finalising installation.
2017-05-18T08:18:15+00:00	INFO 192.168.1.36	update	Ran query from file 3.7.0-2016-08-06. Query text: INSERT INTO `#__extensions` (`extension_id`, `name`, `type`, `element`, `folder`.
2017-05-18T08:18:15+00:00	INFO 192.168.1.36	update	Ran query from file 3.7.0-2016-08-22. Query text: INSERT INTO `#__extensions` (`extension_id`, `name`, `type`, `element`, `folder`.
2017-05-18T08:18:15+00:00	INFO 192.168.1.36	update	Ran query from file 3.7.0-2016-08-29. Query text: CREATE TABLE IF NOT EXISTS `#__fields` (   `id` int(10) unsigned NOT NULL AUTO_I.
2017-05-18T08:18:16+00:00	INFO 192.168.1.36	update	Ran query from file 3.7.0-2016-08-29. Query text: CREATE TABLE IF NOT EXISTS `#__fields_categories` (   `field_id` int(11) NOT NUL.
2017-05-18T08:18:16+00:00	INFO 192.168.1.36	update	Ran query from file 3.7.0-2016-08-29. Query text: CREATE TABLE IF NOT EXISTS `#__fields_groups` (   `id` int(10) unsigned NOT NULL.
2017-05-18T08:18:17+00:00	INFO 192.168.1.36	update	Ran query from file 3.7.0-2016-08-29. Query text: CREATE TABLE IF NOT EXISTS `#__fields_values` (   `field_id` int(10) unsigned NO.
2017-05-18T08:18:17+00:00	INFO 192.168.1.36	update	Ran query from file 3.7.0-2016-08-29. Query text: INSERT INTO `#__extensions` (`extension_id`, `name`, `type`, `element`, `folder`.
2017-05-18T08:18:17+00:00	INFO 192.168.1.36	update	Ran query from file 3.7.0-2016-08-29. Query text: INSERT INTO `#__extensions` (`extension_id`, `name`, `type`, `element`, `folder`.
2017-05-18T08:18:17+00:00	INFO 192.168.1.36	update	Ran query from file 3.7.0-2016-09-29. Query text: INSERT INTO `#__postinstall_messages` (`extension_id`, `title_key`, `description.
2017-05-18T08:18:17+00:00	INFO 192.168.1.36	update	Ran query from file 3.7.0-2016-10-01. Query text: INSERT INTO `#__extensions` (`extension_id`, `name`, `type`, `element`, `folder`.
2017-05-18T08:18:18+00:00	INFO 192.168.1.36	update	Ran query from file 3.7.0-2016-10-02. Query text: ALTER TABLE `#__session` MODIFY `client_id` tinyint(3) unsigned DEFAULT NULL;.
2017-05-18T08:18:18+00:00	INFO 192.168.1.36	update	Ran query from file 3.7.0-2016-11-04. Query text: ALTER TABLE `#__extensions` CHANGE `enabled` `enabled` TINYINT(3) NOT NULL DEFAU.
2017-05-18T08:18:19+00:00	INFO 192.168.1.36	update	Ran query from file 3.7.0-2016-11-19. Query text: ALTER TABLE `#__menu_types` ADD COLUMN `client_id` int(11) NOT NULL DEFAULT 0;.
2017-05-18T08:18:19+00:00	INFO 192.168.1.36	update	Ran query from file 3.7.0-2016-11-19. Query text: UPDATE `#__menu` SET `published` = 1 WHERE `menutype` = 'main' OR `menutype` = '.
2017-05-18T08:18:19+00:00	INFO 192.168.1.36	update	Ran query from file 3.7.0-2016-11-21. Query text: ALTER TABLE `#__languages` DROP INDEX `idx_image`;.
2017-05-18T08:18:20+00:00	INFO 192.168.1.36	update	Ran query from file 3.7.0-2016-11-24. Query text: ALTER TABLE `#__extensions` ADD COLUMN `package_id` int(11) NOT NULL DEFAULT 0 C.
2017-05-18T08:18:20+00:00	INFO 192.168.1.36	update	Ran query from file 3.7.0-2016-11-24. Query text: UPDATE `#__extensions` AS `e1` INNER JOIN (SELECT `extension_id` FROM `#__extens.
2017-05-18T08:18:21+00:00	INFO 192.168.1.36	update	Ran query from file 3.7.0-2016-11-27. Query text: ALTER TABLE `#__modules` MODIFY `content` text NOT NULL DEFAULT '';.
2017-05-18T08:18:21+00:00	INFO 192.168.1.36	update	Ran query from file 3.7.0-2017-01-08. Query text: ALTER TABLE `#__ucm_content` MODIFY `core_title` varchar(400) NOT NULL DEFAULT '.
2017-05-18T08:18:23+00:00	INFO 192.168.1.36	update	Ran query from file 3.7.0-2017-01-08. Query text: ALTER TABLE `#__ucm_content` MODIFY `core_alias` varchar(400) CHARACTER SET utf8.
2017-05-18T08:18:25+00:00	INFO 192.168.1.36	update	Ran query from file 3.7.0-2017-01-08. Query text: ALTER TABLE `#__ucm_content` MODIFY `core_body` mediumtext NOT NULL DEFAULT '';.
2017-05-18T08:18:25+00:00	INFO 192.168.1.36	update	Ran query from file 3.7.0-2017-01-08. Query text: ALTER TABLE `#__ucm_content` MODIFY `core_checked_out_time` varchar(255) NOT NUL.
2017-05-18T08:18:26+00:00	INFO 192.168.1.36	update	Ran query from file 3.7.0-2017-01-08. Query text: ALTER TABLE `#__ucm_content` MODIFY `core_params` text NOT NULL DEFAULT '';.
2017-05-18T08:18:26+00:00	INFO 192.168.1.36	update	Ran query from file 3.7.0-2017-01-08. Query text: ALTER TABLE `#__ucm_content` MODIFY `core_metadata` varchar(2048) NOT NULL DEFAU.
2017-05-18T08:18:26+00:00	INFO 192.168.1.36	update	Ran query from file 3.7.0-2017-01-08. Query text: ALTER TABLE `#__ucm_content` MODIFY `core_language` char(7) NOT NULL DEFAULT '';.
2017-05-18T08:18:26+00:00	INFO 192.168.1.36	update	Ran query from file 3.7.0-2017-01-08. Query text: ALTER TABLE `#__ucm_content` MODIFY `core_publish_up` datetime NOT NULL DEFAULT .
2017-05-18T08:18:26+00:00	INFO 192.168.1.36	update	Ran query from file 3.7.0-2017-01-08. Query text: ALTER TABLE `#__ucm_content` MODIFY `core_publish_down` datetime NOT NULL DEFAUL.
2017-05-18T08:18:27+00:00	INFO 192.168.1.36	update	Ran query from file 3.7.0-2017-01-08. Query text: ALTER TABLE `#__ucm_content` MODIFY `core_content_item_id` int(10) unsigned NOT .
2017-05-18T08:18:28+00:00	INFO 192.168.1.36	update	Ran query from file 3.7.0-2017-01-08. Query text: ALTER TABLE `#__ucm_content` MODIFY `asset_id` int(10) unsigned NOT NULL DEFAULT.
2017-05-18T08:18:33+00:00	INFO 192.168.1.36	update	Ran query from file 3.7.0-2017-01-08. Query text: ALTER TABLE `#__ucm_content` MODIFY `core_images` text NOT NULL DEFAULT '';.
2017-05-18T08:18:37+00:00	INFO 192.168.1.36	update	Ran query from file 3.7.0-2017-01-08. Query text: ALTER TABLE `#__ucm_content` MODIFY `core_urls` text NOT NULL DEFAULT '';.
2017-05-18T08:18:38+00:00	INFO 192.168.1.36	update	Ran query from file 3.7.0-2017-01-08. Query text: ALTER TABLE `#__ucm_content` MODIFY `core_metakey` text NOT NULL DEFAULT '';.
2017-05-18T08:18:39+00:00	INFO 192.168.1.36	update	Ran query from file 3.7.0-2017-01-08. Query text: ALTER TABLE `#__ucm_content` MODIFY `core_metadesc` text NOT NULL DEFAULT '';.
2017-05-18T08:18:39+00:00	INFO 192.168.1.36	update	Ran query from file 3.7.0-2017-01-08. Query text: ALTER TABLE `#__ucm_content` MODIFY `core_xreference` varchar(50) NOT NULL DEFAU.
2017-05-18T08:18:40+00:00	INFO 192.168.1.36	update	Ran query from file 3.7.0-2017-01-08. Query text: ALTER TABLE `#__ucm_content` MODIFY `core_type_id` int(10) unsigned NOT NULL DEF.
2017-05-18T08:18:40+00:00	INFO 192.168.1.36	update	Ran query from file 3.7.0-2017-01-09. Query text: ALTER TABLE `#__categories` MODIFY `title` varchar(255) NOT NULL DEFAULT '';.
2017-05-18T08:18:41+00:00	INFO 192.168.1.36	update	Ran query from file 3.7.0-2017-01-09. Query text: ALTER TABLE `#__categories` MODIFY `description` mediumtext NOT NULL DEFAULT '';.
2017-05-18T08:18:42+00:00	INFO 192.168.1.36	update	Ran query from file 3.7.0-2017-01-09. Query text: ALTER TABLE `#__categories` MODIFY `params` text NOT NULL DEFAULT '';.
2017-05-18T08:18:42+00:00	INFO 192.168.1.36	update	Ran query from file 3.7.0-2017-01-09. Query text: ALTER TABLE `#__categories` MODIFY `metadesc` varchar(1024) NOT NULL DEFAULT '' .
2017-05-18T08:18:42+00:00	INFO 192.168.1.36	update	Ran query from file 3.7.0-2017-01-09. Query text: ALTER TABLE `#__categories` MODIFY `metakey` varchar(1024) NOT NULL DEFAULT '' C.
2017-05-18T08:18:42+00:00	INFO 192.168.1.36	update	Ran query from file 3.7.0-2017-01-09. Query text: ALTER TABLE `#__categories` MODIFY `metadata` varchar(2048) NOT NULL DEFAULT '' .
2017-05-18T08:18:42+00:00	INFO 192.168.1.36	update	Ran query from file 3.7.0-2017-01-09. Query text: ALTER TABLE `#__categories` MODIFY `language` char(7) NOT NULL DEFAULT '';.
2017-05-18T08:18:42+00:00	INFO 192.168.1.36	update	Ran query from file 3.7.0-2017-01-15. Query text: INSERT INTO `#__extensions` (`extension_id`, `name`, `type`, `element`, `folder`.
2017-05-18T08:18:42+00:00	INFO 192.168.1.36	update	Ran query from file 3.7.0-2017-01-17. Query text: UPDATE `#__menu` SET `menutype` = 'main', `client_id` = 1  WHERE `menutype` = 'm.
2017-05-18T08:18:43+00:00	INFO 192.168.1.36	update	Ran query from file 3.7.0-2017-01-31. Query text: INSERT INTO `#__extensions` (`extension_id`, `name`, `type`, `element`, `folder`.
2017-05-18T08:18:43+00:00	INFO 192.168.1.36	update	Ran query from file 3.7.0-2017-02-02. Query text: INSERT INTO `#__extensions` (`extension_id`, `name`, `type`, `element`, `folder`.
2017-05-18T08:18:43+00:00	INFO 192.168.1.36	update	Ran query from file 3.7.0-2017-02-15. Query text: ALTER TABLE `#__redirect_links` MODIFY `comment` varchar(255) NOT NULL DEFAULT '.
2017-05-18T08:18:43+00:00	INFO 192.168.1.36	update	Ran query from file 3.7.0-2017-02-17. Query text: ALTER TABLE `#__contact_details` MODIFY `name` varchar(255) NOT NULL;.
2017-05-18T08:18:44+00:00	INFO 192.168.1.36	update	Ran query from file 3.7.0-2017-02-17. Query text: ALTER TABLE `#__contact_details` MODIFY `alias` varchar(400) CHARACTER SET utf8m.
2017-05-18T08:18:44+00:00	INFO 192.168.1.36	update	Ran query from file 3.7.0-2017-02-17. Query text: ALTER TABLE `#__contact_details` MODIFY `sortname1` varchar(255) NOT NULL DEFAUL.
2017-05-18T08:18:44+00:00	INFO 192.168.1.36	update	Ran query from file 3.7.0-2017-02-17. Query text: ALTER TABLE `#__contact_details` MODIFY `sortname2` varchar(255) NOT NULL DEFAUL.
2017-05-18T08:18:44+00:00	INFO 192.168.1.36	update	Ran query from file 3.7.0-2017-02-17. Query text: ALTER TABLE `#__contact_details` MODIFY `sortname3` varchar(255) NOT NULL DEFAUL.
2017-05-18T08:18:45+00:00	INFO 192.168.1.36	update	Ran query from file 3.7.0-2017-02-17. Query text: ALTER TABLE `#__contact_details` MODIFY `language` varchar(7) NOT NULL;.
2017-05-18T08:18:45+00:00	INFO 192.168.1.36	update	Ran query from file 3.7.0-2017-02-17. Query text: ALTER TABLE `#__contact_details` MODIFY `xreference` varchar(50) NOT NULL DEFAUL.
2017-05-18T08:18:46+00:00	INFO 192.168.1.36	update	Ran query from file 3.7.0-2017-03-03. Query text: ALTER TABLE `#__languages` MODIFY `asset_id` int(10) unsigned NOT NULL DEFAULT 0.
2017-05-18T08:18:47+00:00	INFO 192.168.1.36	update	Ran query from file 3.7.0-2017-03-03. Query text: ALTER TABLE `#__menu_types` MODIFY `asset_id` int(10) unsigned NOT NULL DEFAULT .
2017-05-18T08:18:47+00:00	INFO 192.168.1.36	update	Ran query from file 3.7.0-2017-03-03. Query text: ALTER TABLE  `#__content` MODIFY `xreference` varchar(50) NOT NULL DEFAULT '';.
2017-05-18T08:18:47+00:00	INFO 192.168.1.36	update	Ran query from file 3.7.0-2017-03-03. Query text: ALTER TABLE  `#__newsfeeds` MODIFY `xreference` varchar(50) NOT NULL DEFAULT '';.
2017-05-18T08:18:47+00:00	INFO 192.168.1.36	update	Ran query from file 3.7.0-2017-03-09. Query text: UPDATE `#__categories` AS `c` INNER JOIN ( 	SELECT c2.id, CASE WHEN MIN(p.publis.
2017-05-18T08:18:47+00:00	INFO 192.168.1.36	update	Ran query from file 3.7.0-2017-03-09. Query text: UPDATE `#__menu` AS `c` INNER JOIN ( 	SELECT c2.id, CASE WHEN MIN(p.published) >.
2017-05-18T08:18:48+00:00	INFO 192.168.1.36	update	Ran query from file 3.7.0-2017-03-19. Query text: ALTER TABLE `#__finder_links` MODIFY `description` text;.
2017-05-18T08:18:48+00:00	INFO 192.168.1.36	update	Ran query from file 3.7.0-2017-04-10. Query text: INSERT INTO `#__postinstall_messages` (`extension_id`, `title_key`, `description.
2017-05-18T08:18:48+00:00	INFO 192.168.1.36	update	Ran query from file 3.7.0-2017-04-19. Query text: UPDATE `#__extensions` SET `params` = '{"multiple":"0","first":"1","last":"100",.
2017-05-18T08:18:48+00:00	INFO 192.168.1.36	update	Deleting removed files and folders.
2017-05-18T08:18:56+00:00	INFO 192.168.1.36	update	Cleaning up after installation.
2017-05-18T08:18:56+00:00	INFO 192.168.1.36	update	Update to version 3.7.1 is complete.
2017-06-13T12:46:06+00:00	INFO 192.168.1.36	update	Update started by user ordasoft (389). Old version is 3.7.1.
2017-06-13T12:46:06+00:00	INFO 192.168.1.36	update	Downloading update file from https://downloads.joomla.org/cms/joomla3/3-7-2/Joomla_3.7.2-Stable-Update_Package.zip.
2017-06-13T12:46:11+00:00	INFO 192.168.1.36	update	File Joomla_3.7.2-Stable-Update_Package.zip successfully downloaded.
2017-06-13T12:46:11+00:00	INFO 192.168.1.36	update	Starting installation of new version.
2017-06-13T12:46:23+00:00	INFO 192.168.1.36	update	Finalising installation.
2017-06-13T12:46:23+00:00	INFO 192.168.1.36	update	Deleting removed files and folders.
2017-06-13T12:46:31+00:00	INFO 192.168.1.36	update	Cleaning up after installation.
2017-06-13T12:46:31+00:00	INFO 192.168.1.36	update	Update to version 3.7.2 is complete.
2017-07-19T14:25:56+00:00	INFO 192.168.1.36	update	Update started by user ordasoft (389). Old version is 3.7.2.
2017-07-19T14:26:11+00:00	INFO 192.168.1.36	update	Downloading update file from http://s3-us-west-2.amazonaws.com/joomla-official-downloads/joomladownloads/joomla3/Joomla_3.7.3-Stable-Update_Package.zip?X-Amz-Algorithm=AWS4-HMAC-SHA256&X-Amz-Credential=AKIAIZ6S3Q3YQHG57ZRA%2F20170719%2Fus-west-2%2Fs3%2Faws4_request&X-Amz-Date=20170719T142613Z&X-Amz-Expires=60&X-Amz-SignedHeaders=host&X-Amz-Signature=4fad749c4aa563667539711aad9d154b8b740004eb1aa31a3cfd239ca5e5940a.
2017-07-19T14:26:20+00:00	INFO 192.168.1.36	update	File Joomla_3.7.3-Stable-Update_Package.zip successfully downloaded.
2017-07-19T14:26:20+00:00	INFO 192.168.1.36	update	Starting installation of new version.
2017-07-19T14:26:26+00:00	INFO 192.168.1.36	update	Finalising installation.
2017-07-19T14:26:27+00:00	INFO 192.168.1.36	update	Ran query from file 3.7.3-2017-06-03. Query text: ALTER TABLE `#__menu` MODIFY `checked_out_time` datetime NOT NULL DEFAULT '0000-.
2017-07-19T14:26:27+00:00	INFO 192.168.1.36	update	Deleting removed files and folders.
2017-07-19T14:26:35+00:00	INFO 192.168.1.36	update	Cleaning up after installation.
2017-07-19T14:26:35+00:00	INFO 192.168.1.36	update	Update to version 3.7.3 is complete.
2018-08-02T06:48:07+00:00	INFO ::1	update	Starting installation of new version.
2018-08-02T06:48:10+00:00	INFO ::1	update	Finalising installation.
2018-08-02T06:48:11+00:00	INFO ::1	update	Ran query from file 3.7.4-2017-07-05. Query text: DELETE FROM `#__postinstall_messages` WHERE `title_key` = 'COM_CPANEL_MSG_PHPVER.
2018-08-02T06:48:11+00:00	INFO ::1	update	Ran query from file 3.8.0-2017-07-28. Query text: ALTER TABLE `#__fields_groups` ADD COLUMN `params` TEXT  NOT NULL  AFTER `orderi.
2018-08-02T06:48:11+00:00	INFO ::1	update	Ran query from file 3.8.0-2017-07-31. Query text: INSERT INTO `#__extensions` (`extension_id`, `package_id`, `name`, `type`, `elem.
2018-08-02T06:48:12+00:00	INFO ::1	update	Ran query from file 3.8.2-2017-10-14. Query text: ALTER TABLE `#__content` ADD INDEX `idx_alias` (`alias`(191));.
2018-08-02T06:48:12+00:00	INFO ::1	update	Ran query from file 3.8.4-2018-01-16. Query text: ALTER TABLE `#__user_keys` DROP INDEX `series_2`;.
2018-08-02T06:48:12+00:00	INFO ::1	update	Ran query from file 3.8.4-2018-01-16. Query text: ALTER TABLE `#__user_keys` DROP INDEX `series_3`;.
2018-08-02T06:48:12+00:00	INFO ::1	update	Ran query from file 3.8.6-2018-02-14. Query text: INSERT INTO `#__extensions` (`extension_id`, `package_id`, `name`, `type`, `elem.
2018-08-02T06:48:12+00:00	INFO ::1	update	Ran query from file 3.8.6-2018-02-14. Query text: INSERT INTO `#__postinstall_messages` (`extension_id`, `title_key`, `description.
2018-08-02T06:48:12+00:00	INFO ::1	update	Ran query from file 3.8.8-2018-05-18. Query text: INSERT INTO `#__postinstall_messages` (`extension_id`, `title_key`, `description.
2018-08-02T06:48:12+00:00	INFO ::1	update	Ran query from file 3.8.9-2018-06-19. Query text: UPDATE `#__extensions` SET `enabled` = '1' WHERE `name` = 'mod_sampledata';.
2018-08-02T06:48:12+00:00	INFO ::1	update	Deleting removed files and folders.
2018-08-02T06:48:21+00:00	INFO ::1	update	Cleaning up after installation.
2018-08-02T06:48:21+00:00	INFO ::1	update	Update to version 3.8.10 is complete.
2018-08-20T06:16:23+00:00	INFO ::1	update	Starting installation of new version.
2018-08-20T06:16:29+00:00	INFO ::1	update	Finalising installation.
2018-08-20T06:16:30+00:00	INFO ::1	update	Deleting removed files and folders.
2018-08-20T06:16:56+00:00	INFO ::1	update	Cleaning up after installation.
2018-08-20T06:16:56+00:00	INFO ::1	update	Update to version 3.8.11 is complete.
