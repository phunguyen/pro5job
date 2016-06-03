-- MySQL dump 10.13  Distrib 5.5.39, for Win32 (x86)
--
-- Host: localhost    Database: pro5job
-- ------------------------------------------------------
-- Server version	5.5.39

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `asks`
--

DROP TABLE IF EXISTS `asks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `asks`
--

LOCK TABLES `asks` WRITE;
/*!40000 ALTER TABLE `asks` DISABLE KEYS */;
INSERT INTO `asks` VALUES (3,'Thuyết trình',10,'Là kỹ năng đứng trước đám đông để trình về 1 chủ đề nào đó, làm cho người nghe hiểu, nắm bắt vấn đề, và thuyết phục người nghe','Presentation','Skill to present with many people',NULL,NULL,NULL),(4,'Đàm phán',10,'Kỹ năng thuyết phục người khác để đạt được mục đích đề ra của mình','Negotiation','Skill to negotate other people',NULL,NULL,NULL),(5,'Giao tiếp',10,'Kỹ năng giao tiếp với mọi người xung quanh, làm cho mọi người yêu mến bản thân, tạo hình ảnh cho tổ chức','Communication','skill to communicate',NULL,NULL,NULL),(6,'Thiết kế Html với Bootstrap',14,'Kỹ năng thiết kế giao diện web với các công cụ bootstrap với tính năng responsive','Html Design with Bootstrap','Skill to design a html webpage with bootstrap',NULL,NULL,NULL),(7,'Lập trình PHP',11,'Kỹ năng lập trình web với ngôn ngữ PHP','PHP coding','skills to code in PHP language',NULL,NULL,NULL),(8,'Chăm chỉ',3,'làm việc nghiêm túc, hiệu quả và nhanh chóng','Hardworking',' taking their work seriously and doing it well and rapidly',NULL,NULL,NULL),(9,'Ham học hỏi',3,'Thái độ luôn muốn học hỏi để nâng cao kiến thức,  kỹ năng của bản thân,nhằm đáp ứng tốt hơn cho công việc.','Inquisitive','love to learn to improve ourself',NULL,NULL,NULL),(10,'Thân ái',6,'Thái độ hòa nhã, thân ái giúp đỡ đồng nghiệp','Friendly','fun, caring, ready to help others',NULL,NULL,NULL),(11,'Nuôi bò Úc',17,'Các kiến thức liên quan đến việc chăm sóc bò Úc','Australian Cows Feeding','Knowledge to feed Australian cows',NULL,NULL,NULL),(12,'Thiết kế logo',18,'Kỹ năng thiết kế logo cho công ty, tổ chức','Logo Design','Skill to design logo',NULL,NULL,NULL),(13,'Nhiệt tình',3,'Luôn nhiệt tình trong công việc',NULL,NULL,NULL,NULL,NULL),(14,'Tận tụy',3,'Tận tụy trong công việc',NULL,NULL,NULL,NULL,NULL),(15,'Chủ động',3,'Chủ động hỏi đồng nghiệp',NULL,NULL,NULL,NULL,NULL),(16,'Chuyên nghiệp',7,'Thái độ chuyên nghiệp với đối tác',NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `asks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `asks_cats`
--

DROP TABLE IF EXISTS `asks_cats`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `asks_cats`
--

LOCK TABLES `asks_cats` WRITE;
/*!40000 ALTER TABLE `asks_cats` DISABLE KEYS */;
INSERT INTO `asks_cats` VALUES (1,'Thái độ','chứa các danh mục con và các ask liên quan đến Thái độ của cá nhân đối với công việc',0,'Attitude','contains sub-categories and asks related to attitude',NULL,NULL),(2,'Kỹ năng','Chứa các danh mục con và các ask liên quan đến Kỹ năng tích lũy được của cá nhân',0,'Skills','contains sub-categories related to skills',NULL,NULL),(3,'Với Công việc','Chứa các ask liên quan đến Thái độ của cá nhân đối với công việc',1,'With Jobs','contains ask related to attitude with jobs',NULL,NULL),(5,'Kiến thức','Chứa các danh mục con và các ask liên quan đến Kiến thức của cá nhân',0,'Knowledge','contains sub-categories related to knowledge',NULL,NULL),(6,'Với Đồng nghiệp','chứa các ask liên quan đến thái độ của cá nhân với đồng nghiệp',1,'With Colleagues','containers ask ralated to attitude with colleagues',NULL,NULL),(7,'Với Đối tác','Thái độ của cá nhân với Đối tác',1,'With Partners','attitude with partners',NULL,NULL),(9,'Với Cộng đồng','Thái độ của cá nhân với Cộng đồng chung',1,'With Community','attitude with community',NULL,NULL),(10,'Kỹ năng mềm','Các kỹ năng mềm dùng chung cho mọi ngành nghề',2,'Soft Skills','Soft skills is the cluster of personality traits, social graces, communication, language, personal habits, interpersonal skills, managing people, leadership, etc',NULL,NULL),(11,'Kỹ năng nghề','Kỹ năng cứng liên quan các nghề nghiệp cụ thể',2,'Job Skills','Skills in a specific Job',NULL,NULL),(12,'Toán phổ thông','Các kiến thức cơ bản về Toán phổ thông trình độ 12/12',5,'School Maths','Knowledge ralated to school maths',NULL,NULL),(13,'Thiết kế website','Các kỹ năng thiết kế giao diện người dùng cho website',11,'Web Design','skills to design web user interface',NULL,NULL),(14,'Lập trình web','Kỹ năng lập trình thực hiện các chức năng của ứng dụng web',11,'Web Coding','code to implement web apps',NULL,NULL),(16,'Kiến thức nghề','Kiến thức liên quan các nghề nghiệp cụ thể ',5,'Job Knowledge','Knowledge related to Jobs',NULL,NULL),(17,'Nông nghiệp','Các kiến thức liên quan lĩnh vực nông nghiệp',16,'Agriculture','Knowledge related to Agriculture',NULL,NULL),(18,'Thiết kế đồ họa','Các kỹ năng thiết kế các hình ảnh như logo, nhận dạng thương hiệu',11,'Designer','Skills to design logo and something like that',NULL,NULL);
/*!40000 ALTER TABLE `asks_cats` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `filters`
--

DROP TABLE IF EXISTS `filters`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `filters` (
  `filter_id` int(5) NOT NULL AUTO_INCREMENT,
  `user_id` int(5) NOT NULL,
  `filter_data` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`filter_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `filters`
--

LOCK TABLES `filters` WRITE;
/*!40000 ALTER TABLE `filters` DISABLE KEYS */;
INSERT INTO `filters` VALUES (1,4,'{\"filter_profile\":\"1\",\"filter_match\":\"60\",\"filter_id\":\"1\"}');
/*!40000 ALTER TABLE `filters` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `groups`
--

DROP TABLE IF EXISTS `groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `groups`
--

LOCK TABLES `groups` WRITE;
/*!40000 ALTER TABLE `groups` DISABLE KEYS */;
INSERT INTO `groups` VALUES (1,'admin','Administrator'),(2,'editor','Editor'),(3,'job','Job'),(4,'profile','Profile');
/*!40000 ALTER TABLE `groups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `job_ask_rel`
--

DROP TABLE IF EXISTS `job_ask_rel`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `job_ask_rel` (
  `job_id` int(10) NOT NULL,
  `ask_id` int(10) NOT NULL,
  `require` tinyint(1) DEFAULT NULL,
  `rating` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`job_id`,`ask_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `job_ask_rel`
--

LOCK TABLES `job_ask_rel` WRITE;
/*!40000 ALTER TABLE `job_ask_rel` DISABLE KEYS */;
INSERT INTO `job_ask_rel` VALUES (1,8,0,3),(1,9,1,5),(1,10,0,1),(1,11,1,4),(1,15,1,3),(1,16,1,2),(2,8,1,2),(2,14,0,5),(5,8,1,3);
/*!40000 ALTER TABLE `job_ask_rel` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jobs` (
  `job_id` int(19) NOT NULL AUTO_INCREMENT,
  `job_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `job_contact` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `user_id` int(10) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `experience` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `graduation` varchar(255) DEFAULT NULL,
  `salary` varchar(255) DEFAULT NULL,
  `startdate` varchar(255) DEFAULT NULL,
  `duration` varchar(255) DEFAULT NULL,
  `description` text,
  `interest` text,
  `other` text,
  `createdtime` datetime DEFAULT NULL,
  `modifiedtime` datetime DEFAULT NULL,
  PRIMARY KEY (`job_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobs`
--

LOCK TABLES `jobs` WRITE;
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
INSERT INTO `jobs` VALUES (1,'Team Leader','Team Leader 111',3,'tp-hcm','2-nam','nu','cao-dang','1-3-trieu','2016-05-07','2016-05-27','111','222','333',NULL,'2016-05-05 11:17:01'),(2,'Giám đốc điều hành','Giám đốc điều hành',3,'tp-hcm','1-nam','nam','tot-nghiep-thcs','thoa-thuan','hom-nay','1-tuan','','','',NULL,NULL),(3,'Nhân viên kinh doanh','Nhân viên kinh doanh',3,'ha-noi',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(4,'Trưởng phòng nhân sự','Trưởng phòng nhân sự',3,'ha-noi',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(5,'Tech Leader','Tech Leader',3,'nghe-an',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `login_attempts`
--

DROP TABLE IF EXISTS `login_attempts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `login_attempts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(15) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `login_attempts`
--

LOCK TABLES `login_attempts` WRITE;
/*!40000 ALTER TABLE `login_attempts` DISABLE KEYS */;
/*!40000 ALTER TABLE `login_attempts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `profile_ask_rel`
--

DROP TABLE IF EXISTS `profile_ask_rel`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `profile_ask_rel` (
  `profile_id` int(10) NOT NULL,
  `ask_id` int(10) NOT NULL,
  `rating` int(1) DEFAULT NULL,
  PRIMARY KEY (`profile_id`,`ask_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `profile_ask_rel`
--

LOCK TABLES `profile_ask_rel` WRITE;
/*!40000 ALTER TABLE `profile_ask_rel` DISABLE KEYS */;
INSERT INTO `profile_ask_rel` VALUES (1,8,5),(1,11,1),(1,13,3),(2,5,5),(2,14,4);
/*!40000 ALTER TABLE `profile_ask_rel` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `profiles`
--

DROP TABLE IF EXISTS `profiles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `profiles` (
  `profile_id` int(10) NOT NULL AUTO_INCREMENT,
  `profile_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `profile_contact` text COLLATE utf8_unicode_ci,
  `profile_birthdate` date DEFAULT NULL,
  `profile_gender` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_id` int(5) DEFAULT NULL,
  `location` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `experience` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `graduation` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `salary` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `background` text COLLATE utf8_unicode_ci NOT NULL,
  `work_experience` text COLLATE utf8_unicode_ci NOT NULL,
  `other` text COLLATE utf8_unicode_ci NOT NULL,
  `createdtime` datetime DEFAULT NULL,
  `modifiedtime` datetime DEFAULT NULL,
  PRIMARY KEY (`profile_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `profiles`
--

LOCK TABLES `profiles` WRITE;
/*!40000 ALTER TABLE `profiles` DISABLE KEYS */;
INSERT INTO `profiles` VALUES (1,'Nguyen Van A','11111','1981-03-11','nu',4,'ha-tinh','3-nam','dai-hoc','1-3-trieu','111','222','333',NULL,'2016-04-27 05:40:55'),(2,'Tran Van B','','0000-00-00','khac',4,'ha-tinh','1-nam','tot-nghiep-thcs','thoa-thuan','','','',NULL,NULL);
/*!40000 ALTER TABLE `profiles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sub_values`
--

DROP TABLE IF EXISTS `sub_values`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sub_values` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sub_values`
--

LOCK TABLES `sub_values` WRITE;
/*!40000 ALTER TABLE `sub_values` DISABLE KEYS */;
INSERT INTO `sub_values` VALUES (1,'tot-nghiep-thcs','Tốt nghiệp THCS','graduation'),(2,'tot-nghiep-thpt','Tot nghiep THPT','graduation'),(3,'trung-cap','Trung cấp','graduation'),(4,'cao-dang','Cao dang','graduation'),(5,'dai-hoc','Dai hoc','graduation'),(6,'thac-sy','Thac sy','graduation'),(7,'tien-sy','Tien sy','graduation'),(8,'ha-noi','Hà Nội','location'),(10,'1-nam','1 năm','experience'),(11,'2-nam','2 năm','experience'),(12,'nam','Nam','gender'),(13,'nu','Nữ','gender'),(15,'1-3-trieu','1-3 triệu','salary'),(16,'hom-nay','Hom nay','startdate'),(18,'1-tuan','1 tuần','duration'),(19,'2-tuan','2 tuần','duration'),(20,'nghệ-an','Nghệ An','location'),(21,'Đà-nẵng','Đà Nẵng','location'),(22,'ha-tinh','Hà Tĩnh','location'),(23,'tp-hcm','Tp HCM','location'),(24,'binh-duong','Bình Dương','location'),(26,'3-nam','3 năm','experience'),(28,'4-nam','4 năm','experience'),(30,'5-nam','5 năm','experience'),(31,'tren-5-nam','Trên 5 năm','experience'),(32,'3-5-trieu','3-5 triệu','salary'),(33,'1-tuan-nua','1 tuần nữa','startdate'),(35,'3-tuan','3 tuần','duration'),(36,'2-tuan-nua','2 tuần nữa','startdate'),(37,'khac','Khác','gender');
/*!40000 ALTER TABLE `sub_values` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'127.0.0.1','administrator','$2y$08$7rolBCnUvDi/2mVd371M5.q7o83TU12P4ibMRn/ZJJ27yRcrq.3fq','','admin@admin.com','',NULL,NULL,NULL,1268889823,1464601252,1,'User','Admin','ADMIN','1112223333'),(2,'0.0.0.0',NULL,'$2y$08$uFWNFGTh4Jx4bZPUnmneHOtT0kA4I0SPObj0vNUvvYKTs4hq3.K2G',NULL,'editor@editor.com',NULL,NULL,NULL,NULL,1453985671,1458287426,1,'User','Editor','Citigo','0985819644'),(3,'0.0.0.0',NULL,'$2y$08$ZmmUwdf1XPOm/sNw2XLoM.Ot0fddxfcDwr9VIdhbi5QVgSumKVp2i',NULL,'job@job.com',NULL,NULL,NULL,NULL,1457017959,1464928325,1,'User','Job','Boru','111'),(4,'0.0.0.0',NULL,'$2y$08$A.iZFn1eHUOiVbEa18X0IOacUwr8JGZh47hjPE5Hd.q7ckm3R.nzm',NULL,'profile@profile.com',NULL,NULL,NULL,NULL,1457595123,1464928362,1,'User','Profile','UP','222');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users_groups`
--

DROP TABLE IF EXISTS `users_groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users_groups` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  KEY `fk_users_groups_users1_idx` (`user_id`),
  KEY `fk_users_groups_groups1_idx` (`group_id`),
  CONSTRAINT `users_groups_ibfk_1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `users_groups_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_groups`
--

LOCK TABLES `users_groups` WRITE;
/*!40000 ALTER TABLE `users_groups` DISABLE KEYS */;
INSERT INTO `users_groups` VALUES (13,1,1),(14,2,2),(15,3,3),(16,4,4);
/*!40000 ALTER TABLE `users_groups` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-06-03 14:35:23
