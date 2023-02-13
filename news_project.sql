/*
 Navicat Premium Data Transfer

 Source Server         : local_server
 Source Server Type    : MySQL
 Source Server Version : 50736 (5.7.36)
 Source Host           : localhost:3306
 Source Schema         : news_project

 Target Server Type    : MySQL
 Target Server Version : 50736 (5.7.36)
 File Encoding         : 65001

 Date: 13/02/2023 16:06:16
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for tbl_ads
-- ----------------------------
DROP TABLE IF EXISTS `tbl_ads`;
CREATE TABLE `tbl_ads`  (
  `id` bigint(20) UNSIGNED NOT NULL,
  `url` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `photo` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `location` tinyint(3) UNSIGNED NOT NULL,
  `type` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_ads
-- ----------------------------

-- ----------------------------
-- Table structure for tbl_category
-- ----------------------------
DROP TABLE IF EXISTS `tbl_category`;
CREATE TABLE `tbl_category`  (
  `id` bigint(11) UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `od` int(11) NULL DEFAULT 0,
  `status` tinyint(3) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_category
-- ----------------------------
INSERT INTO `tbl_category` VALUES (1, 'កីឡា', 5, 1);
INSERT INTO `tbl_category` VALUES (2, 'សង្គម', 2, 1);

-- ----------------------------
-- Table structure for tbl_news
-- ----------------------------
DROP TABLE IF EXISTS `tbl_news`;
CREATE TABLE `tbl_news`  (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date_post` datetime NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name_link` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `des` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `img` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `od` int(11) NULL DEFAULT 0,
  `location` tinyint(3) UNSIGNED NOT NULL,
  `cate_id` bigint(20) UNSIGNED NOT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_news
-- ----------------------------
INSERT INTO `tbl_news` VALUES (1, '2023-02-13 15:40:15', 'fa', 'fa', 'fsaf', 'dfsdf.png', 1, 1, 1, 1);
INSERT INTO `tbl_news` VALUES (2, '2023-02-24 15:40:15', 'fa', 'fa', 'fsaf', 'dfsdf.png', 1, 1, 1, 1);

-- ----------------------------
-- Table structure for tbl_slide
-- ----------------------------
DROP TABLE IF EXISTS `tbl_slide`;
CREATE TABLE `tbl_slide`  (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `photo` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `od` int(11) NULL DEFAULT 0,
  `cate_id` bigint(20) UNSIGNED NOT NULL,
  `news_id` bigint(20) UNSIGNED NULL DEFAULT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL
) ENGINE = MyISAM CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_slide
-- ----------------------------

SET FOREIGN_KEY_CHECKS = 1;
