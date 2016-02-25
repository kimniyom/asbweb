/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 50538
 Source Host           : localhost
 Source Database       : asbdb

 Target Server Type    : MySQL
 Target Server Version : 50538
 File Encoding         : utf-8

 Date: 02/25/2016 21:00:27 PM
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `admin_menu`
-- ----------------------------
DROP TABLE IF EXISTS `admin_menu`;
CREATE TABLE `admin_menu` (
  `admin_menu_id` int(5) NOT NULL AUTO_INCREMENT,
  `admin_menu_name` varchar(255) DEFAULT NULL,
  `admin_menu_images` varchar(100) DEFAULT NULL,
  `admin_menu_link` varchar(100) DEFAULT NULL,
  `status` enum('1','0') DEFAULT '1',
  `typelink` int(1) DEFAULT NULL,
  `fix` int(1) DEFAULT '0',
  PRIMARY KEY (`admin_menu_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `admin_menu`
-- ----------------------------
BEGIN;
INSERT INTO `admin_menu` VALUES ('1', 'อัลบั้มรูปภาพ', 'Pictures-icon.png', 'backend/photo/index', '1', '0', '0'), ('2', 'ข่าวประชาสัมพันธ์', 'news-icon.png', 'backend/news/get_news', '1', '0', '0'), ('3', 'BANNER', 'Banner-icon.png', 'backend/banner/view', '1', '0', '0'), ('4', 'เมนูเว็บไซต์', 'Menu-icon.png', 'menager_menu/get_mas_menu', '1', '0', '0'), ('5', 'เมนูระบบงาน', 'Settings-icon.png', 'takmoph_admin/get_menu_system', '1', '0', '0'), ('6', 'แบบฟอร์มต่าง ๆ ', 'invoice-icon.png', 'backend/form_download/get_mas_from', '1', '0', '0'), ('7', 'Icons', 'Workshop-icon.png', 'menager_menu/icon', '1', '0', '0'), ('8', 'ประกาศด่วน', 'menu_20160204193517.png', 'backend/newexpress/index', '1', '0', '0'), ('12', 'SYSTEM ', 'menu_20160219153059.png', 'takmoph_admin/get_dengue', '1', '1', '0');
COMMIT;

-- ----------------------------
--  Table structure for `album`
-- ----------------------------
DROP TABLE IF EXISTS `album`;
CREATE TABLE `album` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `detail` longtext,
  `owner` int(5) DEFAULT NULL,
  `create_date` date DEFAULT NULL,
  `views` int(7) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `album`
-- ----------------------------
BEGIN;
INSERT INTO `album` VALUES ('5', 'Album 3', '', '12', '2016-02-06', '2'), ('6', 'Album 4', '', '12', '2016-02-06', '5'), ('7', 'Album 2', '', '12', '2016-02-06', '31'), ('8', 'Album 1', '', '12', '2016-02-06', '9'), ('9', 'Album 5', '', '12', '2016-02-06', '5'), ('11', 'NEWS ALBUM ', 'NEWS ', '12', '2016-02-19', '1');
COMMIT;

-- ----------------------------
--  Table structure for `banner`
-- ----------------------------
DROP TABLE IF EXISTS `banner`;
CREATE TABLE `banner` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `banner` varchar(255) DEFAULT NULL,
  `status` enum('1','0') DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `banner`
-- ----------------------------
BEGIN;
INSERT INTO `banner` VALUES ('4', 'banner_20160205041804.jpg', '1'), ('6', 'banner_9ggaS3nxAiqmC2WbGuJjyk1AiCCznR.jpg', '1');
COMMIT;

-- ----------------------------
--  Table structure for `captcha`
-- ----------------------------
DROP TABLE IF EXISTS `captcha`;
CREATE TABLE `captcha` (
  `captcha_id` bigint(13) unsigned NOT NULL AUTO_INCREMENT,
  `captcha_time` double unsigned NOT NULL,
  `ip_address` varchar(16) NOT NULL DEFAULT '0',
  `word` varchar(20) NOT NULL,
  PRIMARY KEY (`captcha_id`),
  KEY `word` (`word`)
) ENGINE=InnoDB AUTO_INCREMENT=322 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `captcha`
-- ----------------------------
BEGIN;
INSERT INTO `captcha` VALUES ('321', '1451912592.3789', '182.53.18.134', '11ZyZcKw');
COMMIT;

-- ----------------------------
--  Table structure for `counter`
-- ----------------------------
DROP TABLE IF EXISTS `counter`;
CREATE TABLE `counter` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `ip` varchar(20) DEFAULT NULL,
  `date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `counter`
-- ----------------------------
BEGIN;
INSERT INTO `counter` VALUES ('1', '::1', '2016-02-17'), ('2', '::1', '2016-02-18'), ('3', '::1', '2016-02-19'), ('4', '::1', '2016-02-20');
COMMIT;

-- ----------------------------
--  Table structure for `dengue`
-- ----------------------------
DROP TABLE IF EXISTS `dengue`;
CREATE TABLE `dengue` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `admin_menu_id` int(3) DEFAULT NULL,
  `d_update` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `admin_menu_id` (`admin_menu_id`) USING BTREE,
  CONSTRAINT `a_menu_id` FOREIGN KEY (`admin_menu_id`) REFERENCES `admin_menu` (`admin_menu_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `dengue`
-- ----------------------------
BEGIN;
INSERT INTO `dengue` VALUES ('2', 'SUBMENU SYSTEM', 'file_20160219153203.zip', '12', '2016-02-19 21:32:03');
COMMIT;

-- ----------------------------
--  Table structure for `gallery`
-- ----------------------------
DROP TABLE IF EXISTS `gallery`;
CREATE TABLE `gallery` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `images` varchar(255) DEFAULT NULL,
  `album_id` int(5) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=73 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `gallery`
-- ----------------------------
BEGIN;
INSERT INTO `gallery` VALUES ('59', 'photo_Twv8dRemRYgFghGzT1gZsBgeUPpgKC.jpg', '5'), ('60', 'photo_U36w44K4wJafvwgPiK3TgY8rWtLu8C.jpg', '6'), ('61', 'photo_pRZogEIk3JZA2J2cqR4XINTKB0rGe7.jpg', '7'), ('65', 'photo_x2odHhYBOM6zfSFRyDMvFUf7F6SO92.jpg', '8'), ('66', 'photo_VPNQsk1xL1Ph8120X0X9Bfspl249fx.jpg', '9'), ('67', 'photo_QigA4M0hGTzmyZYXhDfUGcFSzY9Emb.jpg', '8'), ('70', 'photo_zOCVY8WyZRUOwQfCg3xAntQ7SQCphD.png', '11'), ('71', 'photo_ounWmgkk5RfCJgkF9FdgfPe363mJp2.png', '11'), ('72', 'photo_FHsY4aSW0YvplpnekDGjdABmTRnVBo.png', '11');
COMMIT;

-- ----------------------------
--  Table structure for `images_news`
-- ----------------------------
DROP TABLE IF EXISTS `images_news`;
CREATE TABLE `images_news` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `new_id` varchar(5) NOT NULL DEFAULT '',
  `images` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `new_id` (`new_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `images_news`
-- ----------------------------
BEGIN;
INSERT INTO `images_news` VALUES ('1', '0001', 'img_20160206075647.jpg'), ('6', '0002', 'img_DFPteEDp4bU0fUvVSlogPupAy2hkBy.jpg'), ('7', '0002', 'img_CPGT9Q8KRu0gydqIpGBtaHwgKqc4OF.jpg');
COMMIT;

-- ----------------------------
--  Table structure for `lock_ip`
-- ----------------------------
DROP TABLE IF EXISTS `lock_ip`;
CREATE TABLE `lock_ip` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `ip` varchar(100) DEFAULT NULL,
  `d_update` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `log_login`
-- ----------------------------
DROP TABLE IF EXISTS `log_login`;
CREATE TABLE `log_login` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `user_id` varchar(10) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  `ip` varchar(100) DEFAULT NULL,
  `d_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=75 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `log_login`
-- ----------------------------
BEGIN;
INSERT INTO `log_login` VALUES ('1', 'admintak', 'tak@min', '1', 'True', '::1', '2016-01-27 07:03:17'), ('2', 'admintak', '2932215caf91fa4c21e37f99c063f5d5', '1', 'True', '::1', '2016-01-27 07:09:47'), ('3', 'kimniyom', '0800260943', '', 'False', '::1', '2016-01-27 07:10:20'), ('4', 'admintak', '2932215caf91fa4c21e37f99c063f5d5', '1', 'True', '::1', '2016-01-27 07:10:52'), ('5', 'admintak', '2932215caf91fa4c21e37f99c063f5d5', '1', 'True', '::1', '2016-01-27 12:27:09'), ('6', 'admintak', '2932215caf91fa4c21e37f99c063f5d5', '1', 'True', '::1', '2016-01-27 13:45:01'), ('7', 'admintak', '2932215caf91fa4c21e37f99c063f5d5', '1', 'True', '::1', '2016-01-27 15:28:43'), ('8', 'admintak', '2932215caf91fa4c21e37f99c063f5d5', '1', 'True', '::1', '2016-01-28 03:13:28'), ('9', 'admintak', '2932215caf91fa4c21e37f99c063f5d5', '1', 'True', '::1', '2016-01-28 03:36:58'), ('10', 'admintak', '2932215caf91fa4c21e37f99c063f5d5', '1', 'True', '::1', '2016-01-28 14:04:36'), ('11', 'admintak', '2932215caf91fa4c21e37f99c063f5d5', '1', 'True', '::1', '2016-01-28 14:57:00'), ('12', 'admintak', '2932215caf91fa4c21e37f99c063f5d5', '1', 'True', '::1', '2016-01-29 02:58:24'), ('13', 'test', 'test', '', 'False', '::1', '2016-01-29 10:28:37'), ('14', 'test', '81dc9bdb52d04dc20036dbd8313ed055', '11', 'True', '::1', '2016-01-29 10:28:43'), ('15', 'admintak', '2932215caf91fa4c21e37f99c063f5d5', '1', 'True', '::1', '2016-01-29 17:59:21'), ('16', 'admintak', '2932215caf91fa4c21e37f99c063f5d5', '1', 'True', '::1', '2016-01-30 06:11:12'), ('17', 'test', 'test', '', 'False', '::1', '2016-01-30 07:14:00'), ('18', 'test', '81dc9bdb52d04dc20036dbd8313ed055', '11', 'True', '::1', '2016-01-30 07:14:08'), ('19', 'admintak', '2932215caf91fa4c21e37f99c063f5d5', '1', 'True', '::1', '2016-01-30 07:17:50'), ('20', 'admintak', '2932215caf91fa4c21e37f99c063f5d5', '1', 'True', '::1', '2016-01-30 07:26:09'), ('21', 'admintak', '2932215caf91fa4c21e37f99c063f5d5', '1', 'True', '::1', '2016-01-30 08:43:42'), ('22', 'admintak', '2932215caf91fa4c21e37f99c063f5d5', '1', 'True', '::1', '2016-01-30 08:44:00'), ('23', 'admintak', '2932215caf91fa4c21e37f99c063f5d5', '1', 'True', '::1', '2016-01-30 08:45:20'), ('24', 'admintak', '2932215caf91fa4c21e37f99c063f5d5', '1', 'True', '::1', '2016-01-30 14:35:23'), ('25', 'admintak', '2932215caf91fa4c21e37f99c063f5d5', '1', 'True', '::1', '2016-01-31 08:05:43'), ('26', 'test', '81dc9bdb52d04dc20036dbd8313ed055', '11', 'True', '::1', '2016-01-31 13:06:43'), ('27', 'admintak', '2932215caf91fa4c21e37f99c063f5d5', '1', 'True', '::1', '2016-01-31 13:13:33'), ('28', 'test', '81dc9bdb52d04dc20036dbd8313ed055', '11', 'True', '::1', '2016-01-31 13:14:48'), ('29', 'test', '81dc9bdb52d04dc20036dbd8313ed055', '11', 'True', '::1', '2016-01-31 13:18:21'), ('30', 'admintak', '2932215caf91fa4c21e37f99c063f5d5', '1', 'True', '::1', '2016-01-31 15:02:33'), ('31', 'test', '81dc9bdb52d04dc20036dbd8313ed055', '11', 'True', '::1', '2016-01-31 15:06:30'), ('32', 'admintak', '2932215caf91fa4c21e37f99c063f5d5', '1', 'True', '::1', '2016-01-31 15:07:31'), ('33', 'test', '81dc9bdb52d04dc20036dbd8313ed055', '11', 'True', '::1', '2016-01-31 15:10:05'), ('34', 'admintak', '2932215caf91fa4c21e37f99c063f5d5', '1', 'True', '::1', '2016-01-31 15:14:40'), ('35', 'admintak', '2932215caf91fa4c21e37f99c063f5d5', '1', 'True', '::1', '2016-02-01 03:17:15'), ('36', 'admintak', '2932215caf91fa4c21e37f99c063f5d5', '1', 'True', '::1', '2016-02-01 07:53:20'), ('37', 'admintak', '2932215caf91fa4c21e37f99c063f5d5', '1', 'True', '::1', '2016-02-01 13:05:14'), ('38', 'admintak', '2932215caf91fa4c21e37f99c063f5d5', '1', 'True', '::1', '2016-02-01 16:09:43'), ('39', 'admintak', '2932215caf91fa4c21e37f99c063f5d5', '1', 'True', '::1', '2016-02-02 03:00:40'), ('40', 'admintak', '2932215caf91fa4c21e37f99c063f5d5', '1', 'True', '::1', '2016-02-02 05:51:21'), ('41', 'admintak', '2932215caf91fa4c21e37f99c063f5d5', '1', 'True', '::1', '2016-02-02 17:39:12'), ('42', 'admintak', '2932215caf91fa4c21e37f99c063f5d5', '1', 'True', '::1', '2016-02-05 02:55:23'), ('43', 'asbadmin', 'asdadmin', '', 'False', '::1', '2016-02-05 05:58:36'), ('44', 'asbadmin', '35cacaf9da3b6df4f833db2136d72881', '12', 'True', '::1', '2016-02-05 05:58:49'), ('45', 'asbadmin', '35cacaf9da3b6df4f833db2136d72881', '12', 'True', '::1', '2016-02-05 09:11:29'), ('46', 'admintak', '2932215caf91fa4c21e37f99c063f5d5', '1', 'True', '::1', '2016-02-05 14:17:44'), ('47', 'admintak', '2932215caf91fa4c21e37f99c063f5d5', '1', 'True', '::1', '2016-02-06 03:25:30'), ('48', 'asbadmin', '35cacaf9da3b6df4f833db2136d72881', '12', 'True', '::1', '2016-02-06 13:16:20'), ('49', 'admintak', '2932215caf91fa4c21e37f99c063f5d5', '1', 'True', '::1', '2016-02-07 04:24:16'), ('50', 'asbadmin', '35cacaf9da3b6df4f833db2136d72881', '12', 'True', '::1', '2016-02-07 04:47:27'), ('51', 'asbweb', 'asbweb', '', 'False', '::1', '2016-02-07 09:28:35'), ('52', 'asbadmin', '35cacaf9da3b6df4f833db2136d72881', '12', 'True', '::1', '2016-02-07 09:28:54'), ('53', 'asbadmin', '35cacaf9da3b6df4f833db2136d72881', '12', 'True', '::1', '2016-02-07 09:46:03'), ('54', 'asbadmin', '35cacaf9da3b6df4f833db2136d72881', '12', 'True', '::1', '2016-02-07 12:09:56'), ('55', 'asbadmin', '35cacaf9da3b6df4f833db2136d72881', '12', 'True', '::1', '2016-02-10 07:10:32'), ('56', 'asbadmin', 'asb@min', '', 'False', '::1', '2016-02-12 03:31:50'), ('57', 'asbadmin', '35cacaf9da3b6df4f833db2136d72881', '12', 'True', '::1', '2016-02-12 03:32:00'), ('58', 'asbadmin', 'asbadmi', '', 'False', '::1', '2016-02-15 09:54:59'), ('59', 'asbadmin', '35cacaf9da3b6df4f833db2136d72881', '12', 'True', '::1', '2016-02-15 09:55:11'), ('60', 'asbadmin', 'asbadmim', '', 'False', '::1', '2016-02-15 10:55:03'), ('61', 'asbadmin', '35cacaf9da3b6df4f833db2136d72881', '12', 'True', '::1', '2016-02-15 10:55:11'), ('62', 'asbadmin', '35cacaf9da3b6df4f833db2136d72881', '12', 'True', '::1', '2016-02-17 04:17:18'), ('63', 'admintak', '81dc9bdb52d04dc20036dbd8313ed055', '1', 'True', '::1', '2016-02-17 09:06:26'), ('64', 'asbadmin', '35cacaf9da3b6df4f833db2136d72881', '12', 'True', '::1', '2016-02-18 11:12:53'), ('65', 'asbadmin', '35cacaf9da3b6df4f833db2136d72881', '12', 'True', '::1', '2016-02-18 15:21:56'), ('66', 'demo', 'fe01ce2a7fbac8fafaed7c982a04e229', '13', 'True', '::1', '2016-02-18 15:25:54'), ('67', 'maree', '67088cc9d15b1f42c77674380852d50b', '14', 'True', '::1', '2016-02-18 15:32:23'), ('68', 'asbadmin', '35cacaf9da3b6df4f833db2136d72881', '12', 'True', '::1', '2016-02-19 13:16:54'), ('69', 'demo', 'fe01ce2a7fbac8fafaed7c982a04e229', '13', 'True', '::1', '2016-02-19 13:47:09'), ('70', 'demo', 'fe01ce2a7fbac8fafaed7c982a04e229', '13', 'True', '::1', '2016-02-19 15:01:30'), ('71', 'asbadmin', '35cacaf9da3b6df4f833db2136d72881', '12', 'True', '::1', '2016-02-19 15:02:46'), ('72', 'asbadmin', '35cacaf9da3b6df4f833db2136d72881', '12', 'True', '::1', '2016-02-19 15:20:41'), ('73', 'asbadmin', '35cacaf9da3b6df4f833db2136d72881', '12', 'True', '::1', '2016-02-19 17:24:54'), ('74', 'asbadmin', '35cacaf9da3b6df4f833db2136d72881', '12', 'True', '::1', '2016-02-20 08:06:45');
COMMIT;

-- ----------------------------
--  Table structure for `mas_from`
-- ----------------------------
DROP TABLE IF EXISTS `mas_from`;
CREATE TABLE `mas_from` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `mas_from` varchar(100) DEFAULT NULL,
  `from_status` enum('1','0') DEFAULT '0' COMMENT '0 = ''Nodroupdown'',1 = ''Droupdown''',
  `file` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `mas_from`
-- ----------------------------
BEGIN;
INSERT INTO `mas_from` VALUES ('3', 'TEST FORM', '1', null), ('4', 'TEST FORm 2', '0', 'file_20160219153934.pdf');
COMMIT;

-- ----------------------------
--  Table structure for `mas_menu`
-- ----------------------------
DROP TABLE IF EXISTS `mas_menu`;
CREATE TABLE `mas_menu` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `mas_menu` varchar(100) DEFAULT NULL,
  `mas_status` enum('2','1','0') DEFAULT '0' COMMENT '0 = ''Nodroupdown'',1 = ''Droupdown''',
  `menu_color` enum('b','r','o','g','s') DEFAULT 's',
  `link` varchar(100) DEFAULT NULL,
  `icon_id` int(3) DEFAULT NULL,
  `level` int(3) DEFAULT NULL,
  `admin_menu_id` int(3) DEFAULT NULL,
  `link_out` varchar(100) DEFAULT NULL,
  `bgcolor` varchar(100) DEFAULT NULL,
  `textcolor` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `icon` (`icon_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `mas_menu`
-- ----------------------------
BEGIN;
INSERT INTO `mas_menu` VALUES ('33', '', '', 's', '', '0', '16', null, '', null, null), ('34', '', '', 's', '', '0', '17', null, '', null, null), ('41', 'SYStem ', '0', 's', 'menu/filemenu', '21', '18', '12', '', '#7e57c2', '#FFFFFF'), ('42', 'TEST MENU 2', '1', 's', '', '22', '19', null, '', '#ff5254', '#FFFFFF');
COMMIT;

-- ----------------------------
--  Table structure for `mas_month`
-- ----------------------------
DROP TABLE IF EXISTS `mas_month`;
CREATE TABLE `mas_month` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `month_val` char(2) DEFAULT NULL,
  `month_short_en` varchar(50) DEFAULT NULL,
  `month_en` varchar(50) DEFAULT NULL,
  `month_short_th` varchar(50) DEFAULT NULL,
  `month_th` varchar(50) DEFAULT NULL,
  `order` int(2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `mas_month`
-- ----------------------------
BEGIN;
INSERT INTO `mas_month` VALUES ('1', '01', '', 'January', 'ม.ค.', 'มกราคม', '4'), ('2', '02', '', 'February', 'ก.พ.', 'กุมภาพันธ์', '5'), ('3', '03', '', 'March', 'มี.ค.', 'มีนาคม', '6'), ('4', '04', '', 'April', 'เม.ย.', 'เมษายน', '7'), ('5', '05', '', 'May', 'พ.ค.', 'พฤษภาคม', '8'), ('6', '06', '', 'June', 'มิ.ย.', 'มิถุนายน', '9'), ('7', '07', '', 'July', 'ก.ค.', 'กรกฎาคม', '10'), ('8', '08', '', 'August', 'ส.ค.', 'สิงหาคม', '11'), ('9', '09', '', 'September', 'ก.ย.', 'กันยายน', '12'), ('10', '10', '', 'October', 'ต.ค.', 'ตุลาคม', '1'), ('11', '11', '', 'November', 'พ.ย.', 'พฤศจิกายน', '2'), ('12', '12', '', 'December', 'ธ.ค.', 'ธันวาคม', '3');
COMMIT;

-- ----------------------------
--  Table structure for `mas_user`
-- ----------------------------
DROP TABLE IF EXISTS `mas_user`;
CREATE TABLE `mas_user` (
  `user_id` int(3) NOT NULL AUTO_INCREMENT,
  `username` varchar(25) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `lname` varchar(100) DEFAULT NULL,
  `status` enum('S','A') DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `mas_user`
-- ----------------------------
BEGIN;
INSERT INTO `mas_user` VALUES ('12', 'asbadmin', '35cacaf9da3b6df4f833db2136d72881', 'Admin', 'Admin', 'S');
COMMIT;

-- ----------------------------
--  Table structure for `menu_homepage`
-- ----------------------------
DROP TABLE IF EXISTS `menu_homepage`;
CREATE TABLE `menu_homepage` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `title_name` varchar(100) DEFAULT NULL COMMENT 'หัวข้อใหญ่',
  `owner` int(10) DEFAULT NULL COMMENT 'คนสร้าง',
  `active` int(11) DEFAULT '0' COMMENT '0 = active,1 = no active',
  `level` int(10) DEFAULT NULL COMMENT 'ลำดับการแสดงผล',
  `type_id` int(5) DEFAULT NULL COMMENT 'รูปแบบ',
  `create_date` date DEFAULT NULL,
  `limit` int(5) DEFAULT '5' COMMENT 'จำนวนแสดง',
  `box_color` varchar(100) DEFAULT '#FFFFFF' COMMENT 'สีกล่อง',
  `head_color` varchar(100) DEFAULT '#999999' COMMENT 'สีหัวข้อ',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COMMENT='เมนูหน้าเว็บไซต์หน้าแรก';

-- ----------------------------
--  Records of `menu_homepage`
-- ----------------------------
BEGIN;
INSERT INTO `menu_homepage` VALUES ('8', 'Menu Group 1', '12', '0', '3', '1', '2016-02-19', '5', '#ffffff', '#999999'), ('9', 'MENU Group 2', '12', '0', '2', '2', '2016-02-19', '5', '#ffffff', '#999999'), ('10', 'MENU Group 3', '12', '0', '1', '2', '2016-02-19', '5', '#ffffff', '#999999');
COMMIT;

-- ----------------------------
--  Table structure for `menu_icon`
-- ----------------------------
DROP TABLE IF EXISTS `menu_icon`;
CREATE TABLE `menu_icon` (
  `icon_id` int(3) NOT NULL AUTO_INCREMENT,
  `icon` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`icon_id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `menu_icon`
-- ----------------------------
BEGIN;
INSERT INTO `menu_icon` VALUES ('1', 'Groups-icon.png'), ('2', 'footer_twitter.png'), ('3', 'download-icon.png'), ('4', 'Groups-icon.png'), ('5', 'view-tree-icon.png'), ('6', 'anti-virus-old-school-icon.png'), ('7', 'Utilities-icon.png'), ('8', 'App-bug-icon.png'), ('9', 'anti-virus-icon.png'), ('10', 'fog-icon.png'), ('11', 'Nations-African-Female-icon.png'), ('12', 'Book-icon.png'), ('13', 'Reader-Green-icon.png'), ('15', 'FunIcon.png'), ('16', 'icon_20150401154957.png'), ('18', 'icon_20150918132917.jpg'), ('19', 'icon_20151214090222.png'), ('20', 'icon_20160206115645.png'), ('21', 'icon_20160219133208.png'), ('22', 'icon_20160219134046.png');
COMMIT;

-- ----------------------------
--  Table structure for `menu_system`
-- ----------------------------
DROP TABLE IF EXISTS `menu_system`;
CREATE TABLE `menu_system` (
  `system_id` int(3) NOT NULL AUTO_INCREMENT,
  `system_title` varchar(100) DEFAULT NULL,
  `system_images` varchar(100) DEFAULT NULL,
  `link` varchar(100) DEFAULT NULL,
  `status_show` enum('Yes','No') DEFAULT 'Yes',
  PRIMARY KEY (`system_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `menu_system`
-- ----------------------------
BEGIN;
INSERT INTO `menu_system` VALUES ('10', 'Theassembler', 'img_20160205033726.jpg', 'http://www.theassembler.net', 'Yes'), ('11', 'Theassembler', 'img_20160205040042.jpg', 'http://www.theassembler.net', 'Yes'), ('12', 'Asbweb', 'img_20160205035854.jpg', 'http://www.theassembler.net', 'Yes'), ('13', 'Transport', 'img_20160205033209.jpg', 'http://www.theassembler.net', 'Yes'), ('16', 'NEWS SYSTEM MENU', 'img_20160219153642.jpg', 'http://www.theassembler.net', 'Yes');
COMMIT;

-- ----------------------------
--  Table structure for `navbarmenu`
-- ----------------------------
DROP TABLE IF EXISTS `navbarmenu`;
CREATE TABLE `navbarmenu` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) DEFAULT NULL,
  `upper` int(3) DEFAULT '0',
  `link` varchar(255) DEFAULT NULL,
  `active` int(1) DEFAULT '0' COMMENT '0 = แสดง,1 = ไม่แสดง',
  `type` int(11) DEFAULT '0' COMMENT '0 = ไม่มีเมนูย้อย,1 = มีเมนูย้อย',
  `page` longtext,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `navbarmenu`
-- ----------------------------
BEGIN;
INSERT INTO `navbarmenu` VALUES ('20', 'NAVBAR1', '0', null, '0', '0', '<p>NAVBAR 1</p>\n'), ('21', 'NAVBAR 2', '0', null, '0', '1', null), ('22', 'SUBNAVBAR 1', '21', null, '0', '0', '<p>SUBNAVBAR 1</p>\n');
COMMIT;

-- ----------------------------
--  Table structure for `new_express`
-- ----------------------------
DROP TABLE IF EXISTS `new_express`;
CREATE TABLE `new_express` (
  `id` int(7) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL COMMENT 'หัวข้อ',
  `detail` longtext COMMENT 'รายละเอียด',
  `owner` int(5) DEFAULT NULL COMMENT 'ผู้บัญทึก',
  `create_date` timestamp NULL DEFAULT NULL COMMENT 'วันที่บันทึก',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COMMENT='เก็บข้อมูลประกาศด่วน';

-- ----------------------------
--  Records of `new_express`
-- ----------------------------
BEGIN;
INSERT INTO `new_express` VALUES ('10', 'Last News Update ', '<p style=\"text-align:center\"><img alt=\"\" src=\"http://localhost/EDITOR_FILE/images/287491_250650488292206_6656065_o.jpg\" style=\"height:253px; width:300px\" /></p>\n\n<p style=\"text-align:center\">ทดสอบประกาศข่าวด่วนพิเศษ ฉบับแรก</p>\n', '12', '2016-02-19 13:27:54'), ('11', 'ประกาศข่าว ด่วน 2 ', '<p><strong>ประกาศข่าว ด่วน 2&nbsp;</strong></p>\n\n<p>ประกาศข่าว ด่วน 2&nbsp;</p>\n\n<p><span style=\"color:#FF0000\">ประกาศข่าว ด่วน 2&nbsp;</span></p>\n', '12', '2016-02-19 15:30:11');
COMMIT;

-- ----------------------------
--  Table structure for `permission_homepage`
-- ----------------------------
DROP TABLE IF EXISTS `permission_homepage`;
CREATE TABLE `permission_homepage` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `user_id` int(5) DEFAULT NULL,
  `homepage_id` int(5) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `permission_homepage`
-- ----------------------------
BEGIN;
INSERT INTO `permission_homepage` VALUES ('5', '11', '1'), ('6', '11', '2'), ('7', '13', '4'), ('8', '13', '6'), ('9', '14', '4'), ('10', '14', '5'), ('11', '14', '6');
COMMIT;

-- ----------------------------
--  Table structure for `permissions`
-- ----------------------------
DROP TABLE IF EXISTS `permissions`;
CREATE TABLE `permissions` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `admin_menu_id` varchar(5) DEFAULT NULL,
  `user_id` int(3) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `use_id1` (`user_id`),
  CONSTRAINT `use_id1` FOREIGN KEY (`user_id`) REFERENCES `mas_user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `style`
-- ----------------------------
DROP TABLE IF EXISTS `style`;
CREATE TABLE `style` (
  `id` int(1) NOT NULL DEFAULT '0',
  `color_navbar` varchar(255) DEFAULT NULL,
  `color_head` varchar(255) DEFAULT NULL,
  `webname_short` varchar(255) DEFAULT NULL,
  `webname_full` varchar(255) DEFAULT NULL,
  `color_text` varchar(100) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `footer` longtext,
  `bgbody` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `style`
-- ----------------------------
BEGIN;
INSERT INTO `style` VALUES ('1', '#000000', '#292929', 'Assembler', 'The Assembler Themes', '#FFFFFF', 'logo_20160219152108.png', '<p><img alt=\"\" src=\"http://localhost/EDITOR_FILE/images/A_LOGO_W_full.png\" style=\"height:70px; width:178px\" /></p>\n\n<p><strong>The Assembler Themes.</strong></p>\n\n<p>www.theassembler.net</p>\n', null);
COMMIT;

-- ----------------------------
--  Table structure for `sub_from`
-- ----------------------------
DROP TABLE IF EXISTS `sub_from`;
CREATE TABLE `sub_from` (
  `sub_id` int(3) NOT NULL AUTO_INCREMENT,
  `sub_name` varchar(100) DEFAULT NULL,
  `file` varchar(100) DEFAULT NULL,
  `mas_id` int(3) DEFAULT NULL,
  PRIMARY KEY (`sub_id`),
  KEY `mas_id` (`mas_id`) USING BTREE,
  CONSTRAINT `sub_from_ibfk_1` FOREIGN KEY (`mas_id`) REFERENCES `mas_from` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `sub_from`
-- ----------------------------
BEGIN;
INSERT INTO `sub_from` VALUES ('3', 'FORM1', 'file_DYybyYgqSeHKd1VqTkLIVByImpfVoy.pdf', '3');
COMMIT;

-- ----------------------------
--  Table structure for `sub_homepage`
-- ----------------------------
DROP TABLE IF EXISTS `sub_homepage`;
CREATE TABLE `sub_homepage` (
  `id` int(7) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL COMMENT 'หัวข้อ',
  `detail` longtext COMMENT 'ข้อมูล',
  `homepage_id` int(5) DEFAULT NULL COMMENT 'เรื่อง',
  `owner` int(5) DEFAULT NULL COMMENT 'คนบันทึก',
  `create_date` date DEFAULT NULL COMMENT 'วันที่บันทึก',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `sub_homepage`
-- ----------------------------
BEGIN;
INSERT INTO `sub_homepage` VALUES ('10', 'SUBGROUP 1', '<p>SUBGROUP 1</p>\n', '8', '12', '2016-02-19'), ('11', 'SUBMENU 2', '<p>SUBMENU 2</p>\n', '9', '12', '2016-02-19'), ('12', 'SUBMENU 3', '<p>SUBMENU 3</p>\n', '10', '12', '2016-02-19');
COMMIT;

-- ----------------------------
--  Table structure for `sub_menu`
-- ----------------------------
DROP TABLE IF EXISTS `sub_menu`;
CREATE TABLE `sub_menu` (
  `sub_id` int(3) NOT NULL AUTO_INCREMENT,
  `sub_name` varchar(100) DEFAULT NULL,
  `link` varchar(100) DEFAULT NULL,
  `file` varchar(100) DEFAULT NULL,
  `mas_id` int(3) DEFAULT NULL,
  PRIMARY KEY (`sub_id`),
  KEY `mas_id` (`mas_id`) USING BTREE,
  CONSTRAINT `id` FOREIGN KEY (`mas_id`) REFERENCES `mas_menu` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `sub_menu`
-- ----------------------------
BEGIN;
INSERT INTO `sub_menu` VALUES ('3', 'File 1 ', '', 'file_20160219153347.pdf', '42');
COMMIT;

-- ----------------------------
--  Table structure for `tb_download`
-- ----------------------------
DROP TABLE IF EXISTS `tb_download`;
CREATE TABLE `tb_download` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `d_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `d_file` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `d_date` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=77 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
--  Records of `tb_download`
-- ----------------------------
BEGIN;
INSERT INTO `tb_download` VALUES ('3', 'จัดทำแผน pre-plan ปี 55 ', 'pre-plan_55.rar', '2012-09-24 14:58:39'), ('4', 'ตัวอย่างรายงานควบคุมภายใน', 'report20111014.rar', '2012-09-24 14:59:36'), ('5', 'บุคลากรด้านการแพทย์และสาธารณสุขดีเด่น จังหวัดตาก ปี 2555', '20120522.rar', '2012-09-24 15:00:36'), ('6', 'บุคลากรดีเด่นด้านการแพทย์ สธ.เขต 17', 'person.zip', '2012-09-24 15:01:15'), ('7', 'download TUC', 'InstallTBTUC.rar', '2012-09-24 15:05:02'), ('8', '	เลื่อนขั้นเงินเดือนปี 2555   ', 'Salary55.rar', '2012-09-24 15:58:37'), ('9', 'คู่มือการจัดเก็บตัวชี้วัด', 'indicator.rar', '2012-09-24 15:59:25'), ('10', 'นโยบายและงานเร่งด่วน สธ.ปี 55', 'policy_2555.rar', '2012-09-24 16:06:14'), ('11', 'แผนงานสร้างเสริมสุขภาพและป้องกันโรคปี 55', 'plan_20120427.rar', '2012-09-24 16:07:09'), ('12', 'แบบสำรวจข้อมูลคอม ฯ และระบบสารสนเทศ', 'survey.zip', '2012-09-24 16:09:41'), ('13', '	ข้อมูลสำนักบริหาร', 'datamanagement.rar', '2012-09-24 16:12:17'), ('14', 'แผน 4 ปี 56-59', 'plan_4_56-59 .rar', '2012-09-24 16:12:57'), ('19', 'ใบสมัครเข้ารับการฝึกอบรมระยะสั้น', 'ใบสมัครเข้ารับการฝึกอบรมระยะสั้นของเจ้าหน้าที่สาธารณสุขสำนักงานสาธารณสุขจังหวัดตาก.rar', '2012-12-17 09:34:26'), ('20', 'แนวทางการจัดทำแผน PP ปี 2556', 'แนวทางการจัดทำแผน PP.Area Based ปี 2556.rar', '2012-12-26 10:47:45'), ('22', 'ประชุมเชิงปฎิบัติการเฝ้าระวังป้องกันโรคคอตีบ 22 ม.ค 56 ', '20130123.rar', '2013-01-25 09:50:08'), ('23', 'ข้าราชการดีเด่น สสจ.ตาก ปี 2555', 'outstandingPublicServant55.rar', '2013-02-06 09:04:28'), ('24', 'กรอบ รพ. ตามเครือข่ายบริการสุขภาพจังหวัดตาก', 'healthNetwork.rar', '2013-03-01 13:52:13'), ('25', 'อนุมัติแผนงบ PP.A+PP.M.2556', 'อนุมัติแผนงบ PP.A+PP.M.2556.rar', '2013-03-12 10:14:00'), ('26', 'ผลการดำเนินงาน สธ.จ.ตาก ตามแผนการตรวจราชการและนิเทศงาน รอบที่ 1 ปี 2556', 'เล่มผลการดำเนินงาน สธ. รอบที่ 1 ปี 2556_จ.ตาก.rar', '2013-04-23 16:41:13'), ('29', 'ราคาครุภัณฑ์อ้างอิงจากการจัดสรรครุภัณฑ์ DPL', 'ชุดรายการราคาคุรุภัณฑ์.rar', '2013-06-06 15:42:32'), ('32', 'แผนงานยุทธศาสตร์สุขภาพกระทรวงสาธารณสุข', 'แผนยุทธศาสตร์8flagship.rar', '2013-06-14 13:38:08'), ('36', 'ตรวจเยี่ยมสถานบริการสุขภาพชายแดน (14 มิย 56)', '20130614.rar', '2013-06-17 13:35:20'), ('37', 'คู่มือการดำเนินงานขับเคลื่อนตามปรัชญาเศรษฐกิจ', 'คู่มือการดำเนินงานขับเคลื่อนตามปรัชญาเศรษฐ.rar', '2013-07-02 09:18:29'), ('38', 'มาตรฐานกำหนดตำแหน่งพนักงานกระทรวงสาธารณสุข', 'งานพัฒนาบุคลากร.rar', '2013-07-03 16:18:07'), ('39', 'การขึ้นทะเบียนหน่วยบริการ ปีงบประมาณ 2557', 'การขึ้นทะเบียนหน่วยบริการ ปีงบประมาณ 2557.rar', '2013-07-15 10:58:26'), ('40', 'คู่มือรายละเอียดตัวชี้วัดการดำนินงานพัฒนาสุขภาพกระทรวงสาธารณสุข ปีงบประมาณ 56', 'คู่มือรายละเอียด.rar', '2013-07-26 13:48:45'), ('41', 'เล่มแผนการตรวจฯ และนิเทศงานระดับกระทรวง ปีงบประมาณ 2556', 'เล่มแผนการตรวจ.rar', '2013-07-26 13:51:26'), ('42', 'ตรวจราชการและนิเทศงาน รอบที่ 2 ปี 2556 ', 'เล่มรับ ผตร. รอบที่ 2 (วันที่ 3-5กค.56).rar', '2013-07-26 13:52:16'), ('43', 'ประชุมวิชาการ  ปี 2556', 'งานวิชาการ.rar', '2013-08-02 14:48:49'), ('46', '(ร่าง) ศูนย์ข้อมูลข่าวสารสาธารณสุขจังหวัดตาก', 'ร่างศูนย์ข้อมูลตาก(เวียงตาก).pdf', '2013-09-26 16:11:12'), ('47', 'สิทธิรักษาพยาบาลพนักงานท้องถิ่น', 'ส_ทธ_ร_กษาพยาบาล พน_กงานท_องถ__น.doc', '2013-10-02 11:55:26'), ('48', 'การพัฒนาการปฏิรูปการบริหารงานกระทรวงสาธารณสุขปี 2557', 'เอกสารประกอบการประชุมเชิงปฏิบัติการ.pdf', '2013-10-09 15:56:35'), ('54', 'เปรียบเทียบผลการดำเนินการจังหวัดตาก รอบ 12 เดือน ประจำปีงบประมาณ 2556(Power Point)', 'btw_ppt.rar', '2013-10-14 11:56:13'), ('55', 'เปรียบเทียบผลการดำเนินการจังหวัดตาก รอบ 12 เดือน ประจำปีงบประมาณ 2556(Microsoft Word)', 'btw_doc.rar', '2013-10-14 11:56:34'), ('56', 'MOPH_Reform ', 'MOPH_Reform .rar', '2013-10-14 11:57:21'), ('57', 'ความคืบหน้าการจัดตั้งเขตพัฒนาเศรษฐกิจแม่สอด', 'ความคืบหน้าการจัดตั้งเขตพัฒนาเศรษฐกิจแม่สอด.rar', '2013-10-29 12:23:09'), ('59', 'แผนปฏิบัติการระดับอำเภอปี 2557 (งบ PP.A)', 'อนุมัติแผนงบ57.rar', '2013-11-20 13:24:32'), ('63', 'รายละเอียดตัวชี้วัดกระทรวงสาธารณสุข ปี 2557 (44+6)_ปรับปรุง 17 ธ.ค. 56', 'รายละเอียดตัวชี้วัดกระทรวงสาธารณสุข ปี 2557 (44+6)_ปรับปรุง 17 ธ.ค. 56.rar', '2013-12-17 14:00:42'), ('65', 'แบบฟอร์มประเมินตนเองตามตัวชี้วัดปี 2557 (44+6 KPI)_ปรับปรุง 17 ธ.ค. 56', 'แบบฟอร์มประเมินตนเองตามตัวชี้วัดปี 2557 (44+6 KPI)_ปรับปรุง 17 ธ.ค. 56.rar', '2013-12-17 14:44:09'), ('66', 'เล่มแนวทางการตรวจราชการ สธ.ประจำปี งบประมาณ 57', '20140108.rar', null), ('67', 'กรอบประเด็นการนิเทศงานระดับจังหวัดและผลการประเมินตนเองรายตัวชี้วัด ปีงบ 57', 'กรอบประเด็นการนิเทศงานระดับจังหวัดและผลการประเมินตนเองรายตัวชี้วัดรายตัวชี้วัด ปี 2557.rar', '2014-01-13 16:17:19'), ('68', 'แบบรายงานการตรวจราชการระดับจังหวัด ปี 57(ตก.1)', 'แบบรายงานการตรวจราชการระดับจังหวัด ปี 2557 (ตก 1).rar', '2014-01-13 16:18:18'), ('71', 'รายงานปี 55', 'report_55.rar', '2014-03-07 14:42:29'), ('72', 'แบบฟอร์มผลการดำเนินงานโรคมะเร็งปี 57‏', 'ฟอร์ม.docx', '2014-03-10 15:38:21'), ('73', 'เล่มสรุปผลการนิเทศงานระดับจังหวัด จังหวัดตาก รอบที่ 1 ประจำปี 2557', 'brief_2557.rar', '2014-03-12 10:25:03'), ('74', 'สรุปผลการตรวจราชการและนิเทศงาน กรณีปกติ รอบที่ 1  ประจำปีงบประมาณ 2557', 'brief_2557_Default.rar', '2014-03-12 14:07:23'), ('75', 'คู่มือปฏิบัติงานกิจกรรม 5 ส', '5s.rar', '2014-05-26 16:30:22'), ('76', 'ข้อมูล workshop DHS', 'workshopDHS.rar', null);
COMMIT;

-- ----------------------------
--  Table structure for `tb_news`
-- ----------------------------
DROP TABLE IF EXISTS `tb_news`;
CREATE TABLE `tb_news` (
  `id` varchar(5) CHARACTER SET utf8 NOT NULL,
  `titel` varchar(100) CHARACTER SET utf8 NOT NULL,
  `detail` longtext CHARACTER SET utf8 NOT NULL,
  `date` text CHARACTER SET utf8 NOT NULL,
  `n_img` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `user_id` varchar(10) CHARACTER SET utf8 DEFAULT NULL,
  `flag_delete` int(1) DEFAULT '0' COMMENT '1  = ต้องการลบออกจากระบบ',
  `flag_delete_user` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'รหัส user ที่ต้องการลบ',
  `views` int(5) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='ตารางเก็บข่าวทั่วไป';

-- ----------------------------
--  Records of `tb_news`
-- ----------------------------
BEGIN;
INSERT INTO `tb_news` VALUES ('0001', 'Last News Update ', '<p>Last News Update&nbsp;</p>\n', '2016-02-05 04:47:26', null, '1', '0', null, '56'), ('0002', 'News 1 ', '<p>News 1</p>\n', '2016-02-19 15:34:23', null, '12', '0', null, '5');
COMMIT;

-- ----------------------------
--  Table structure for `tb_plan`
-- ----------------------------
DROP TABLE IF EXISTS `tb_plan`;
CREATE TABLE `tb_plan` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `plan_name` varchar(100) DEFAULT NULL,
  `plan_file` varchar(100) DEFAULT NULL,
  `plan_date` varchar(10) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`,`plan_date`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `tb_plan`
-- ----------------------------
BEGIN;
INSERT INTO `tb_plan` VALUES ('1', 'แผน 4 ปี 56-59 ', 'plan_4_56-59 .rar', '20121112'), ('2', 'แผนปฏิบัติการประจำปี 2557 ', 'แผนปฏิบัติการประจำปี 2557 (วางหน้าเวบ).rar', '20131120');
COMMIT;

-- ----------------------------
--  Table structure for `type_homepage`
-- ----------------------------
DROP TABLE IF EXISTS `type_homepage`;
CREATE TABLE `type_homepage` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `type_menu` varchar(100) DEFAULT NULL,
  `style` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `type_homepage`
-- ----------------------------
BEGIN;
INSERT INTO `type_homepage` VALUES ('1', 'เต็มหน้าจอ', 'col-xs-12 col-sm-12 col-md-12 col-lg-12'), ('2', 'ครึ่งหน้าจอ', 'col-xs-12 col-sm-12 col-md-6 col-lg-6');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
