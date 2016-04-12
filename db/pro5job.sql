-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 12, 2016 at 12:56 PM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `pro5job`
--

-- --------------------------------------------------------

--
-- Table structure for table `asks`
--

CREATE TABLE IF NOT EXISTS `asks` (
`ask_id` int(20) NOT NULL,
  `ask_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ask_cat_id` int(10) DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `ask_name_en` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `description_en` text CHARACTER SET latin1,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `ask_status` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=17 ;

--
-- Dumping data for table `asks`
--

INSERT INTO `asks` (`ask_id`, `ask_name`, `ask_cat_id`, `description`, `ask_name_en`, `description_en`, `created_at`, `updated_at`, `ask_status`) VALUES
(3, 'Thuyết trình', 10, 'Là kỹ năng đứng trước đám đông để trình về 1 chủ đề nào đó, làm cho người nghe hiểu, nắm bắt vấn đề, và thuyết phục người nghe', 'Presentation', 'Skill to present with many people', NULL, NULL, NULL),
(4, 'Đàm phán', 10, 'Kỹ năng thuyết phục người khác để đạt được mục đích đề ra của mình', 'Negotiation', 'Skill to negotate other people', NULL, NULL, NULL),
(5, 'Giao tiếp', 10, 'Kỹ năng giao tiếp với mọi người xung quanh, làm cho mọi người yêu mến bản thân, tạo hình ảnh cho tổ chức', 'Communication', 'skill to communicate', NULL, NULL, NULL),
(6, 'Thiết kế Html với Bootstrap', 14, 'Kỹ năng thiết kế giao diện web với các công cụ bootstrap với tính năng responsive', 'Html Design with Bootstrap', 'Skill to design a html webpage with bootstrap', NULL, NULL, NULL),
(7, 'Lập trình PHP', 11, 'Kỹ năng lập trình web với ngôn ngữ PHP', 'PHP coding', 'skills to code in PHP language', NULL, NULL, NULL),
(8, 'Chăm chỉ', 3, 'làm việc nghiêm túc, hiệu quả và nhanh chóng', 'Hardworking', ' taking their work seriously and doing it well and rapidly', NULL, NULL, NULL),
(9, 'Ham học hỏi', 3, 'Thái độ luôn muốn học hỏi để nâng cao kiến thức,  kỹ năng của bản thân,nhằm đáp ứng tốt hơn cho công việc.', 'Inquisitive', 'love to learn to improve ourself', NULL, NULL, NULL),
(10, 'Thân ái', 6, 'Thái độ hòa nhã, thân ái giúp đỡ đồng nghiệp', 'Friendly', 'fun, caring, ready to help others', NULL, NULL, NULL),
(11, 'Nuôi bò Úc', 17, 'Các kiến thức liên quan đến việc chăm sóc bò Úc', 'Australian Cows Feeding', 'Knowledge to feed Australian cows', NULL, NULL, NULL),
(12, 'Thiết kế logo', 18, 'Kỹ năng thiết kế logo cho công ty, tổ chức', 'Logo Design', 'Skill to design logo', NULL, NULL, NULL),
(13, 'Nhiệt tình', 3, 'Luôn nhiệt tình trong công việc', NULL, NULL, NULL, NULL, NULL),
(14, 'Tận tụy', 3, 'Tận tụy trong công việc', NULL, NULL, NULL, NULL, NULL),
(15, 'Chủ động', 3, 'Chủ động hỏi đồng nghiệp', NULL, NULL, NULL, NULL, NULL),
(16, 'Chuyên nghiệp', 7, 'Thái độ chuyên nghiệp với đối tác', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `asks_cats`
--

CREATE TABLE IF NOT EXISTS `asks_cats` (
`ask_cat_id` int(10) NOT NULL,
  `ask_cat_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `ask_cat_parent` int(10) DEFAULT '0',
  `ask_cat_name_en` varchar(255) DEFAULT NULL,
  `description_en` text,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `asks_cats`
--

INSERT INTO `asks_cats` (`ask_cat_id`, `ask_cat_name`, `description`, `ask_cat_parent`, `ask_cat_name_en`, `description_en`, `created_at`, `updated_at`) VALUES
(1, 'Thái độ', 'chứa các danh mục con và các ask liên quan đến Thái độ của cá nhân đối với công việc', 0, 'Attitude', 'contains sub-categories and asks related to attitude', NULL, NULL),
(2, 'Kỹ năng', 'Chứa các danh mục con và các ask liên quan đến Kỹ năng tích lũy được của cá nhân', 0, 'Skills', 'contains sub-categories related to skills', NULL, NULL),
(3, 'Với Công việc', 'Chứa các ask liên quan đến Thái độ của cá nhân đối với công việc', 1, 'With Jobs', 'contains ask related to attitude with jobs', NULL, NULL),
(5, 'Kiến thức', 'Chứa các danh mục con và các ask liên quan đến Kiến thức của cá nhân', 0, 'Knowledge', 'contains sub-categories related to knowledge', NULL, NULL),
(6, 'Với Đồng nghiệp', 'chứa các ask liên quan đến thái độ của cá nhân với đồng nghiệp', 1, 'With Colleagues', 'containers ask ralated to attitude with colleagues', NULL, NULL),
(7, 'Với Đối tác', 'Thái độ của cá nhân với Đối tác', 1, 'With Partners', 'attitude with partners', NULL, NULL),
(9, 'Với Cộng đồng', 'Thái độ của cá nhân với Cộng đồng chung', 1, 'With Community', 'attitude with community', NULL, NULL),
(10, 'Kỹ năng mềm', 'Các kỹ năng mềm dùng chung cho mọi ngành nghề', 2, 'Soft Skills', 'Soft skills is the cluster of personality traits, social graces, communication, language, personal habits, interpersonal skills, managing people, leadership, etc', NULL, NULL),
(11, 'Kỹ năng nghề', 'Kỹ năng cứng liên quan các nghề nghiệp cụ thể', 2, 'Job Skills', 'Skills in a specific Job', NULL, NULL),
(12, 'Toán phổ thông', 'Các kiến thức cơ bản về Toán phổ thông trình độ 12/12', 5, 'School Maths', 'Knowledge ralated to school maths', NULL, NULL),
(13, 'Thiết kế website', 'Các kỹ năng thiết kế giao diện người dùng cho website', 11, 'Web Design', 'skills to design web user interface', NULL, NULL),
(14, 'Lập trình web', 'Kỹ năng lập trình thực hiện các chức năng của ứng dụng web', 11, 'Web Coding', 'code to implement web apps', NULL, NULL),
(16, 'Kiến thức nghề', 'Kiến thức liên quan các nghề nghiệp cụ thể ', 5, 'Job Knowledge', 'Knowledge related to Jobs', NULL, NULL),
(17, 'Nông nghiệp', 'Các kiến thức liên quan lĩnh vực nông nghiệp', 16, 'Agriculture', 'Knowledge related to Agriculture', NULL, NULL),
(18, 'Thiết kế đồ họa', 'Các kỹ năng thiết kế các hình ảnh như logo, nhận dạng thương hiệu', 11, 'Designer', 'Skills to design logo and something like that', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
`id` mediumint(8) unsigned NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'editor', 'Editor'),
(3, 'job', 'Job'),
(4, 'profile', 'Profile');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE IF NOT EXISTS `jobs` (
`job_id` int(19) NOT NULL,
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
  `other` text
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`job_id`, `job_name`, `job_contact`, `user_id`, `location`, `experience`, `gender`, `graduation`, `salary`, `startdate`, `duration`, `description`, `interest`, `other`) VALUES
(1, 'Team Leader', 'Team Leader 111', 3, 'tp-hcm', '2-nam', 'nu', 'cao-dang', '1-3-trieu', '3-ngay-nu', '2-tuan', '111', '222', '333'),
(2, 'Giám đốc điều hành', 'Giám đốc điều hành', 3, 'tp-hcm', '1-nam', 'nam', 'tot-nghiep-thcs', 'thoa-thuan', 'hom-nay', '1-tuan', '', '', ''),
(3, 'Nhân viên kinh doanh', 'Nhân viên kinh doanh', 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'Trưởng phòng nhân sự', 'Trưởng phòng nhân sự', 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'Tech Leader', 'Tech Leader', 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `job_ask_rel`
--

CREATE TABLE IF NOT EXISTS `job_ask_rel` (
  `job_id` int(10) NOT NULL,
  `ask_id` int(10) NOT NULL,
  `require` tinyint(1) DEFAULT NULL,
  `rating` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `job_ask_rel`
--

INSERT INTO `job_ask_rel` (`job_id`, `ask_id`, `require`, `rating`) VALUES
(1, 8, 0, 3),
(1, 9, 1, 5),
(1, 10, 0, 1),
(1, 11, 1, 4),
(1, 15, 1, 3),
(1, 16, 1, 2),
(2, 8, 1, 2),
(2, 14, 0, 5),
(5, 8, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE IF NOT EXISTS `login_attempts` (
`id` int(11) unsigned NOT NULL,
  `ip_address` varchar(15) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) unsigned DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE IF NOT EXISTS `profiles` (
`profile_id` int(10) NOT NULL,
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
  `other` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`profile_id`, `profile_name`, `profile_contact`, `profile_birthdate`, `profile_gender`, `user_id`, `location`, `experience`, `graduation`, `salary`, `background`, `work_experience`, `other`) VALUES
(1, 'Nguyen Van A', '11111', '0000-00-00', 'nu', 4, 'ha-tinh', '3-nam', 'dai-hoc', '1-3-trieu', '111', '222', '333'),
(2, 'Tran Van B', '', '0000-00-00', 'khac', 4, 'ha-tinh', '1-nam', 'tot-nghiep-thcs', 'thoa-thuan', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `profile_ask_rel`
--

CREATE TABLE IF NOT EXISTS `profile_ask_rel` (
  `profile_id` int(10) NOT NULL,
  `ask_id` int(10) NOT NULL,
  `rating` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `profile_ask_rel`
--

INSERT INTO `profile_ask_rel` (`profile_id`, `ask_id`, `rating`) VALUES
(1, 8, 5),
(1, 11, 1),
(1, 13, 3),
(2, 5, 5),
(2, 14, 4);

-- --------------------------------------------------------

--
-- Table structure for table `sub_values`
--

CREATE TABLE IF NOT EXISTS `sub_values` (
`id` int(5) NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=38 ;

--
-- Dumping data for table `sub_values`
--

INSERT INTO `sub_values` (`id`, `code`, `name`, `type`) VALUES
(1, 'tot-nghiep-thcs', 'Tốt nghiệp THCS', 'graduation'),
(2, 'tot-nghiep-thpt', 'Tot nghiep THPT', 'graduation'),
(3, 'trung-cap', 'Trung cấp', 'graduation'),
(4, 'cao-dang', 'Cao dang', 'graduation'),
(5, 'dai-hoc', 'Dai hoc', 'graduation'),
(6, 'thac-sy', 'Thac sy', 'graduation'),
(7, 'tien-sy', 'Tien sy', 'graduation'),
(8, 'ha-noi', 'Hà Nội', 'location'),
(10, '1-nam', '1 năm', 'experience'),
(11, '2-nam', '2 năm', 'experience'),
(12, 'nam', 'Nam', 'gender'),
(13, 'nu', 'Nữ', 'gender'),
(14, 'thoa-thuan', 'Thoả Thuận', 'salary'),
(15, '1-3-trieu', '1-3 triệu', 'salary'),
(16, 'hom-nay', 'Hom nay', 'startdate'),
(18, '1-tuan', '1 tuần', 'duration'),
(19, '2-tuan', '2 tuần', 'duration'),
(20, 'nghệ-an', 'Nghệ An', 'location'),
(21, 'Đà-nẵng', 'Đà Nẵng', 'location'),
(22, 'ha-tinh', 'Hà Tĩnh', 'location'),
(23, 'tp-hcm', 'Tp HCM', 'location'),
(24, 'binh-duong', 'Bình Dương', 'location'),
(26, '3-nam', '3 năm', 'experience'),
(28, '4-nam', '4 năm', 'experience'),
(30, '5-nam', '5 năm', 'experience'),
(31, 'tren-5-nam', 'Trên 5 năm', 'experience'),
(32, '3-5-trieu', '3-5 triệu', 'salary'),
(33, '1-tuan-nua', '1 tuần nữa', 'startdate'),
(35, '3-tuan', '3 tuần', 'duration'),
(36, '2-tuan-nua', '2 tuần nữa', 'startdate'),
(37, 'khac', 'Khác', 'gender');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(11) unsigned NOT NULL,
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
  `phone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`) VALUES
(1, '127.0.0.1', 'administrator', '$2y$08$7rolBCnUvDi/2mVd371M5.q7o83TU12P4ibMRn/ZJJ27yRcrq.3fq', '', 'admin@admin.com', '', NULL, NULL, NULL, 1268889823, 1460453216, 1, 'User', 'Admin', 'ADMIN', '1112223333'),
(2, '0.0.0.0', NULL, '$2y$08$uFWNFGTh4Jx4bZPUnmneHOtT0kA4I0SPObj0vNUvvYKTs4hq3.K2G', NULL, 'editor@editor.com', NULL, NULL, NULL, NULL, 1453985671, 1458287426, 1, 'User', 'Editor', 'Citigo', '0985819644'),
(3, '0.0.0.0', NULL, '$2y$08$ZmmUwdf1XPOm/sNw2XLoM.Ot0fddxfcDwr9VIdhbi5QVgSumKVp2i', NULL, 'job@job.com', NULL, NULL, NULL, NULL, 1457017959, 1460454268, 1, 'User', 'Job', 'Boru', '111'),
(4, '0.0.0.0', NULL, '$2y$08$A.iZFn1eHUOiVbEa18X0IOacUwr8JGZh47hjPE5Hd.q7ckm3R.nzm', NULL, 'profile@profile.com', NULL, NULL, NULL, NULL, 1457595123, 1460454417, 1, 'User', 'Profile', 'UP', '222');

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE IF NOT EXISTS `users_groups` (
`id` int(11) unsigned NOT NULL,
  `user_id` int(11) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(13, 1, 1),
(14, 2, 2),
(15, 3, 3),
(16, 4, 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `asks`
--
ALTER TABLE `asks`
 ADD PRIMARY KEY (`ask_id`), ADD KEY `ask_cat_id` (`ask_cat_id`);

--
-- Indexes for table `asks_cats`
--
ALTER TABLE `asks_cats`
 ADD PRIMARY KEY (`ask_cat_id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
 ADD PRIMARY KEY (`job_id`);

--
-- Indexes for table `job_ask_rel`
--
ALTER TABLE `job_ask_rel`
 ADD PRIMARY KEY (`job_id`,`ask_id`);

--
-- Indexes for table `login_attempts`
--
ALTER TABLE `login_attempts`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
 ADD PRIMARY KEY (`profile_id`);

--
-- Indexes for table `profile_ask_rel`
--
ALTER TABLE `profile_ask_rel`
 ADD PRIMARY KEY (`profile_id`,`ask_id`);

--
-- Indexes for table `sub_values`
--
ALTER TABLE `sub_values`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_groups`
--
ALTER TABLE `users_groups`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`), ADD KEY `fk_users_groups_users1_idx` (`user_id`), ADD KEY `fk_users_groups_groups1_idx` (`group_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `asks`
--
ALTER TABLE `asks`
MODIFY `ask_id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `asks_cats`
--
ALTER TABLE `asks_cats`
MODIFY `ask_cat_id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
MODIFY `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
MODIFY `job_id` int(19) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `login_attempts`
--
ALTER TABLE `login_attempts`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
MODIFY `profile_id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `sub_values`
--
ALTER TABLE `sub_values`
MODIFY `id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users_groups`
--
ALTER TABLE `users_groups`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `asks`
--
ALTER TABLE `asks`
ADD CONSTRAINT `asks_ibfk_1` FOREIGN KEY (`ask_cat_id`) REFERENCES `asks_cats` (`ask_cat_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users_groups`
--
ALTER TABLE `users_groups`
ADD CONSTRAINT `users_groups_ibfk_1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
ADD CONSTRAINT `users_groups_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
