/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50539
Source Host           : :3306
Source Database       : pro5job

Target Server Type    : MYSQL
Target Server Version : 50539
File Encoding         : 65001

Date: 2016-03-21 17:01:39
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for asks
-- ----------------------------
DROP TABLE IF EXISTS `asks`;
CREATE TABLE `asks` (
  `ask_id` int(20) NOT NULL AUTO_INCREMENT,
  `ask_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ask_cat_id` int(10) DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `ask_name_en` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `description_en` text CHARACTER SET latin1,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `ask_status` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`ask_id`),
  KEY `ask_cat_id` (`ask_cat_id`),
  CONSTRAINT `asks_ibfk_1` FOREIGN KEY (`ask_cat_id`) REFERENCES `asks_cats` (`ask_cat_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of asks
-- ----------------------------
INSERT INTO `asks` VALUES ('3', 'Thuy?t tr�nh', '10', 'L� k? n?ng ??ng tr??c ?�m ?�ng ?? tr�nh v? 1 ch? ?? n�o ?�, l�m cho ng??i nghe hi?u, n?m b?t v?n ??, v� thuy?t ph?c ng??i nghe', 'Presentation', 'Skill to present with many people', null, null, null);
INSERT INTO `asks` VALUES ('4', '?�m ph�n', '10', 'K? n?ng thuy?t ph?c ng??i kh�c ?? ??t ???c m?c ?�ch ?? ra c?a m�nh', 'Negotiation', 'Skill to negotate other people', null, null, null);
INSERT INTO `asks` VALUES ('5', 'Giao ti?p', '10', 'K? n?ng giao ti?p v?i m?i ng??i xung quanh, l�m cho m?i ng??i y�u m?n b?n th�n, t?o h�nh ?nh cho t? ch?c', 'Communication', 'skill to communicate', null, null, null);
INSERT INTO `asks` VALUES ('6', 'Thi?t k? Html v?i Bootstrap', '14', 'K? n?ng thi?t k? giao di?n web v?i c�c c�ng c? bootstrap v?i t�nh n?ng responsive', 'Html Design with Bootstrap', 'Skill to design a html webpage with bootstrap', null, null, null);
INSERT INTO `asks` VALUES ('7', 'L?p tr�nh PHP', '11', 'K? n?ng l?p tr�nh web v?i ng�n ng? PHP', 'PHP coding', 'skills to code in PHP language', null, null, null);
INSERT INTO `asks` VALUES ('8', 'Ch?m ch?', '3', 'l�m vi?c nghi�m t�c, hi?u qu? v� nhanh ch�ng', 'Hardworking', ' taking their work seriously and doing it well and rapidly', null, null, null);
INSERT INTO `asks` VALUES ('9', 'Ham h?c h?i', '3', 'Th�i ?? lu�n mu?n h?c h?i ?? n�ng cao ki?n th?c,  k? n?ng c?a b?n th�n,nh?m ?�p ?ng t?t h?n cho c�ng vi?c.', 'Inquisitive', 'love to learn to improve ourself', null, null, null);
INSERT INTO `asks` VALUES ('10', 'Th�n �i', '6', 'Th�i ?? h�a nh�, th�n �i gi�p ?? ??ng nghi?p', 'Friendly', 'fun, caring, ready to help others', null, null, null);
INSERT INTO `asks` VALUES ('11', 'Nu�i b� �c', '17', 'C�c ki?n th?c li�n quan ??n vi?c ch?m s�c b� �c', 'Australian Cows Feeding', 'Knowledge to feed Australian cows', null, null, null);
INSERT INTO `asks` VALUES ('12', 'Thi?t k? logo', '18', 'K? n?ng thi?t k? logo cho c�ng ty, t? ch?c', 'Logo Design', 'Skill to design logo', null, null, null);

-- ----------------------------
-- Table structure for asks_cats
-- ----------------------------
DROP TABLE IF EXISTS `asks_cats`;
CREATE TABLE `asks_cats` (
  `ask_cat_id` int(10) NOT NULL AUTO_INCREMENT,
  `ask_cat_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `ask_cat_parent` int(10) DEFAULT '0',
  `ask_cat_name_en` varchar(255) DEFAULT NULL,
  `description_en` text,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`ask_cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of asks_cats
-- ----------------------------
INSERT INTO `asks_cats` VALUES ('1', 'Th�i ??', 'ch?a c�c danh m?c con v� c�c ask li�n quan ??n Th�i ?? c?a c� nh�n ??i v?i c�ng vi?c', '0', 'Attitude', 'contains sub-categories and asks related to attitude', null, null);
INSERT INTO `asks_cats` VALUES ('2', 'K? n?ng', 'Ch?a c�c danh m?c con v� c�c ask li�n quan ??n K? n?ng t�ch l?y ???c c?a c� nh�n', '0', 'Skills', 'contains sub-categories related to skills', null, null);
INSERT INTO `asks_cats` VALUES ('3', 'V?i C�ng vi?c', 'Ch?a c�c ask li�n quan ??n Th�i ?? c?a c� nh�n ??i v?i c�ng vi?c', '1', 'With Jobs', 'contains ask related to attitude with jobs', null, null);
INSERT INTO `asks_cats` VALUES ('5', 'Ki?n th?c', 'Ch?a c�c danh m?c con v� c�c ask li�n quan ??n Ki?n th?c c?a c� nh�n', '0', 'Knowledge', 'contains sub-categories related to knowledge', null, null);
INSERT INTO `asks_cats` VALUES ('6', 'V?i ??ng nghi?p', 'ch?a c�c ask li�n quan ??n th�i ?? c?a c� nh�n v?i ??ng nghi?p', '1', 'With Colleagues', 'containers ask ralated to attitude with colleagues', null, null);
INSERT INTO `asks_cats` VALUES ('7', 'V?i ??i t�c', 'Th�i ?? c?a c� nh�n v?i ??i t�c', '1', 'With Partners', 'attitude with partners', null, null);
INSERT INTO `asks_cats` VALUES ('8', 'V?i ??i t�c', 'Th�i ?? c?a c� nh�n v?i ??i t�c', '1', 'With Partners', 'attitude with partners', null, null);
INSERT INTO `asks_cats` VALUES ('9', 'V?i C?ng ??ng', 'Th�i ?? c?a c� nh�n v?i C?ng ??ng chung', '1', 'With Community', 'attitude with community', null, null);
INSERT INTO `asks_cats` VALUES ('10', 'K? n?ng m?m', 'C�c k? n?ng m?m d�ng chung cho m?i ng�nh ngh?', '2', 'Soft Skills', 'Soft skills is the cluster of personality traits, social graces, communication, language, personal habits, interpersonal skills, managing people, leadership, etc', null, null);
INSERT INTO `asks_cats` VALUES ('11', 'K? n?ng ngh?', 'K? n?ng c?ng li�n quan c�c ngh? nghi?p c? th?', '2', 'Job Skills', 'Skills in a specific Job', null, null);
INSERT INTO `asks_cats` VALUES ('12', 'To�n ph? th�ng', 'C�c ki?n th?c c? b?n v? To�n ph? th�ng tr�nh ?? 12/12', '5', 'School Maths', 'Knowledge ralated to school maths', null, null);
INSERT INTO `asks_cats` VALUES ('13', 'Thi?t k? website', 'C�c k? n?ng thi?t k? giao di?n ng??i d�ng cho website', '11', 'Web Design', 'skills to design web user interface', null, null);
INSERT INTO `asks_cats` VALUES ('14', 'L?p tr�nh web', 'K? n?ng l?p tr�nh th?c hi?n c�c ch?c n?ng c?a ?ng d?ng web', '11', 'Web Coding', 'code to implement web apps', null, null);
INSERT INTO `asks_cats` VALUES ('16', 'Ki?n th?c ngh?', 'Ki?n th?c li�n quan c�c ngh? nghi?p c? th? ', '5', 'Job Knowledge', 'Knowledge related to Jobs', null, null);
INSERT INTO `asks_cats` VALUES ('17', 'N�ng nghi?p', 'C�c ki?n th?c li�n quan l?nh v?c n�ng nghi?p', '16', 'Agriculture', 'Knowledge related to Agriculture', null, null);
INSERT INTO `asks_cats` VALUES ('18', 'Thi?t k? ?? h?a', 'C�c k? n?ng thi?t k? c�c h�nh ?nh nh? logo, nh?n d?ng th??ng hi?u', '11', 'Designer', 'Skills to design logo and something like that', null, null);
INSERT INTO `asks_cats` VALUES ('19', 'Thi?t k? ?? h?a', 'C�c k? n?ng thi?t k? c�c h�nh ?nh nh? logo, nh?n d?ng th??ng hi?u', '11', 'Designer', 'Skills to design logo and something like that', null, null);

-- ----------------------------
-- Table structure for groups
-- ----------------------------
DROP TABLE IF EXISTS `groups`;
CREATE TABLE `groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of groups
-- ----------------------------
INSERT INTO `groups` VALUES ('1', 'admin', 'Administrator');
INSERT INTO `groups` VALUES ('2', 'editor', 'Editor');
INSERT INTO `groups` VALUES ('3', 'job', 'Job');
INSERT INTO `groups` VALUES ('4', 'profile', 'Profile');

-- ----------------------------
-- Table structure for jobs
-- ----------------------------
DROP TABLE IF EXISTS `jobs`;
CREATE TABLE `jobs` (
  `job_id` int(19) NOT NULL AUTO_INCREMENT,
  `job_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `job_contact` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `user_id` int(10) DEFAULT NULL,
  PRIMARY KEY (`job_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of jobs
-- ----------------------------
INSERT INTO `jobs` VALUES ('1', 'aaa', 'bbb', '3');
INSERT INTO `jobs` VALUES ('2', 'Gi�m ??c ?i?u h�nh', 'Gi�m ??c ?i?u h�nh', '3');
INSERT INTO `jobs` VALUES ('3', 'Nh�n vi�n kinh doanh', 'Nh�n vi�n kinh doanh', '3');
INSERT INTO `jobs` VALUES ('4', 'Tr??ng ph�ng nh�n s?', 'Tr??ng ph�ng nh�n s?', '3');

-- ----------------------------
-- Table structure for login_attempts
-- ----------------------------
DROP TABLE IF EXISTS `login_attempts`;
CREATE TABLE `login_attempts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(15) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of login_attempts
-- ----------------------------

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(15) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) unsigned DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) unsigned NOT NULL,
  `last_login` int(11) unsigned DEFAULT NULL,
  `active` tinyint(1) unsigned DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', '127.0.0.1', 'administrator', '$2y$08$7rolBCnUvDi/2mVd371M5.q7o83TU12P4ibMRn/ZJJ27yRcrq.3fq', '', 'admin@admin.com', '', null, null, null, '1268889823', '1458117749', '1', 'User', 'Admin', 'ADMIN', '1112223333');
INSERT INTO `users` VALUES ('2', '0.0.0.0', null, '$2y$08$uFWNFGTh4Jx4bZPUnmneHOtT0kA4I0SPObj0vNUvvYKTs4hq3.K2G', null, 'editor@editor.com', null, null, null, null, '1453985671', '1458287426', '1', 'User', 'Editor', 'Citigo', '0985819644');
INSERT INTO `users` VALUES ('3', '0.0.0.0', null, '$2y$08$ZmmUwdf1XPOm/sNw2XLoM.Ot0fddxfcDwr9VIdhbi5QVgSumKVp2i', null, 'job@job.com', null, null, null, null, '1457017959', '1458552596', '1', 'User', 'Job', 'Boru', '111');
INSERT INTO `users` VALUES ('4', '0.0.0.0', null, '$2y$08$A.iZFn1eHUOiVbEa18X0IOacUwr8JGZh47hjPE5Hd.q7ckm3R.nzm', null, 'profile@profile.com', null, null, null, null, '1457595123', '1458552145', '1', 'User', 'Profile', 'UP', '222');

-- ----------------------------
-- Table structure for users_groups
-- ----------------------------
DROP TABLE IF EXISTS `users_groups`;
CREATE TABLE `users_groups` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  KEY `fk_users_groups_users1_idx` (`user_id`),
  KEY `fk_users_groups_groups1_idx` (`group_id`),
  CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of users_groups
-- ----------------------------
INSERT INTO `users_groups` VALUES ('13', '1', '1');
INSERT INTO `users_groups` VALUES ('14', '2', '2');
INSERT INTO `users_groups` VALUES ('15', '3', '3');
INSERT INTO `users_groups` VALUES ('16', '4', '4');
