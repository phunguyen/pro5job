/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50539
Source Host           : localhost:3306
Source Database       : pro5job

Target Server Type    : MYSQL
Target Server Version : 50539
File Encoding         : 65001

Date: 2016-03-31 23:34:13
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for job_ask_rel
-- ----------------------------
DROP TABLE IF EXISTS `job_ask_rel`;
CREATE TABLE `job_ask_rel` (
  `job_id` int(10) NOT NULL,
  `ask_id` int(10) NOT NULL,
  `require` tinyint(1) DEFAULT NULL,
  `rating` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`job_id`,`ask_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
