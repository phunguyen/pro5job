/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50539
Source Host           : :3306
Source Database       : pro5job

Target Server Type    : MYSQL
Target Server Version : 50539
File Encoding         : 65001

Date: 2016-03-10 14:33:55
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for asks
-- ----------------------------
DROP TABLE IF EXISTS `asks`;
CREATE TABLE `asks` (
  `ask_id` int(20) NOT NULL AUTO_INCREMENT,
  `ask_name` varchar(255) NOT NULL,
  `ask_cat_id` int(10) DEFAULT NULL,
  `description` text,
  PRIMARY KEY (`ask_id`),
  KEY `ask_cat_id` (`ask_cat_id`),
  CONSTRAINT `asks_ibfk_1` FOREIGN KEY (`ask_cat_id`) REFERENCES `asks_cats` (`ask_cat_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of asks
-- ----------------------------
INSERT INTO `asks` VALUES ('1', 'ASK 1', '1', 'Ask 1 desc');
INSERT INTO `asks` VALUES ('2', 'ASK 11', '1', 'd d d d');
INSERT INTO `asks` VALUES ('3', 'ASK 2', '2', '22222');

-- ----------------------------
-- Table structure for asks_cats
-- ----------------------------
DROP TABLE IF EXISTS `asks_cats`;
CREATE TABLE `asks_cats` (
  `ask_cat_id` int(10) NOT NULL AUTO_INCREMENT,
  `ask_cat_name` varchar(255) NOT NULL,
  `description` text,
  `ask_cat_parent` int(10) DEFAULT '0',
  PRIMARY KEY (`ask_cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of asks_cats
-- ----------------------------
INSERT INTO `asks_cats` VALUES ('1', 'CAT 1', 'Cat 1 desc', '0');
INSERT INTO `asks_cats` VALUES ('2', 'CAT 2', 'Cat 2 desc', '0');
INSERT INTO `asks_cats` VALUES ('3', 'CAT 11', 'Cat 11 desc', '1');
INSERT INTO `asks_cats` VALUES ('4', 'CAT 12', 'cat cat 1212', '1');

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
INSERT INTO `users` VALUES ('1', '127.0.0.1', 'administrator', '$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36', '', 'admin@admin.com', '', null, null, null, '1268889823', '1457594535', '1', 'User', 'Admin', 'ADMIN', '1112223333');
INSERT INTO `users` VALUES ('2', '0.0.0.0', null, '$2y$08$SsBpg.wXD3ASR00dIYehP.JU6du8ekOCTq7.kbZd1gKOYTPmGDPLe', null, 'editor@editor.com', null, null, null, null, '1453985671', '1457593366', '1', 'User', 'Editor', 'Citigo', '0985819644');
INSERT INTO `users` VALUES ('3', '0.0.0.0', null, '$2y$08$naYuAJIH42C.l.Pm45omh.r9VoKGoVN0xauHf4s1xvWZ85HLA.t/2', null, 'job@job.com', null, null, null, null, '1457017959', null, '1', 'User', 'Job', 'Boru', '111');
INSERT INTO `users` VALUES ('4', '0.0.0.0', null, '$2y$08$4h1FhAvj2wKRaKBOzURV.em15IWg1MzIfOero07TdAGEqUI3BTq/u', null, 'profile@profile.com', null, null, null, null, '1457595123', '1457595144', '1', 'User', 'Profile', 'UP', '222');

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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of users_groups
-- ----------------------------
INSERT INTO `users_groups` VALUES ('9', '1', '1');
INSERT INTO `users_groups` VALUES ('10', '2', '2');
INSERT INTO `users_groups` VALUES ('11', '3', '3');
INSERT INTO `users_groups` VALUES ('12', '4', '4');
