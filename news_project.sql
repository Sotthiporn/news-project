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

 Date: 13/02/2023 17:21:56
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
INSERT INTO `tbl_news` VALUES (1, '2023-02-13 15:40:15', 'yertr', 'yertr', 'fsaf', '1676281762.jpg', 1, 1, 1, 1);
INSERT INTO `tbl_news` VALUES (2, '2023-02-24 15:40:15', 'adfdf', 'adfdf', '<p>Cristiano Ronaldo áž”áž¶áž“ážŸáž¶áž„áž”áŸ’ážšážœážáŸ’ážáž·ážŸáž¶ážŸáŸ’ážáŸ’ážšážŠáŸ„áž™áž€áŸ’áž›áž¶áž™áž‡áž¶áž€áž¸áž¡áž¶áž€ážšážŠáŸ†áž”áž¼áž„áž‚áŸážŠáŸ‚áž›ážŸáŸŠáž»ážáž”áž‰áŸ’áž…áž¼áž›áž‘áž¸ áŸ¤áž‚áŸ’ážšáž¶áž”áŸ‹ážáŸ‚áž¯áž„áž€áŸ’áž“áž»áž„ áŸ¡áž”áŸ’ážšáž€áž½ážáž“áŸ…áž›áž¸áž‚áž€áŸ†áž–áž¼áž› Saudi League áž“áŸ…ážšážŠáž¼ážœáž€áž¶áž›áž“áŸáŸ‡áŸ”</p>\r\n<div class=\"content-grp-img\"><picture class=\"lozad\" data-iesrc=\"//media.sabay.com/media/sabay-news/Social-International/June(2)/June_28/63e5bfbc44d2c_1676001180.jpg\" data-alt=\"\" data-loaded=\"true\"><source srcset=\"https://cdn.sabay.com/cdn/media.sabay.com/media/sabay-news/Social-International/June(2)/June_28/63e5bfbc44d2c_1676001180_large.jpg\" media=\"(min-width: 1920px)\" /><source srcset=\"https://cdn.sabay.com/cdn/media.sabay.com/media/sabay-news/Social-International/June(2)/June_28/63e5bfbc44d2c_1676001180_medium.jpg\" media=\"(min-width: 980px)\" /><source srcset=\"https://cdn.sabay.com/cdn/media.sabay.com/media/sabay-news/Social-International/June(2)/June_28/63e5bfbc44d2c_1676001180_small.jpg\" media=\"(min-width: 320px)\" /><img /></picture></div>\r\n<div class=\"content-grp-img\">&nbsp;</div>\r\n<p>ážáŸ’ážŸáŸ‚áž”áŸ’ážšáž™áž»áž‘áŸ’áž’ážŸáž‰áŸ’áž‡áž¶ážáž·áž–áŸážšáž‘áž»áž™áž áŸ’áž‚áž¶áž›áŸ‹ážšáž€áž”áž¶áž“ áŸ¤áž‚áŸ’ážšáž¶áž”áŸ‹áž€áŸ’áž“áž»áž„áž”áŸ’ážšáž€áž½ážážŠáŸ‚áž›áž€áŸ’ážšáž»áž˜ Al Nassr áž”áž¶áž“áž™áž€ážˆáŸ’áž“áŸ‡áž‚áž¼áž”áŸ’ážšáž€áž½áž Al Wehda áž€áŸ’áž“áž»áž„áž›áž‘áŸ’áž’áž•áž› áŸ¤-áŸ  áž€áž¶áž›áž–áž¸áž™áž”áŸ‹áž˜áž·áž‰áŸ” áŸ¤áž‚áŸ’ážšáž¶áž”áŸ‹áž“áŸáŸ‡ážŠáŸ‚ážš áž”áž¶áž“áž’áŸ’ážœáž¾áž²áŸ’áž™ Ronaldo ážŸáŸŠáž»ážáž”áž‰áŸ’áž…áž¼áž›áž‘áž¸ áŸ¥áŸ áŸ£áž‚áŸ’ážšáž¶áž”áŸ‹áž áž¾áž™áž“áŸ…áž€áŸ’áž›áž¹áž”áž¢áž¶áž‡áž¸áž– áž‡áž¶áž˜áž½áž™áž“áž¹áž„áž€áŸ’áž›áž¹áž” áŸ¥áž•áŸ’ážŸáŸáž„áž‚áŸ’áž“áž¶ áž“áž·áž„áž“áŸ…áž›áž¸áž‚áž€áŸ†áž–áž¼áž› áŸ¥áž”áŸ’ážšáž‘áŸážŸáž•áŸ’ážŸáŸáž„áž‚áŸ’áž“áž¶áŸ”</p>\r\n<p>áž‡áž™áž›áž¶áž—áž¸áž–áž¶áž“ Ballon d\'Or áŸ¥ážŸáž˜áŸáž™áž€áž¶áž›áž”áž¶áž“áž…áž¼áž›ážšáž½áž˜áž‡áž¶áž˜áž½áž™áž€áŸ’áž›áž¹áž” Al Nassr áž€áž¶áž›áž–áž¸ážáŸ‚áž’áŸ’áž“áž¼ ážŠáŸ„áž™áž‘áž‘áž½áž›áž”áž¶áž“ážáŸ’áž›áŸƒáž“áž¿áž™áž ážáŸ‹áž€áž”áŸ‹áž–áž–áž€ áž”áŸ’ážšáž˜áž¶ážŽ áŸ¡áŸ§áŸ§áž›áž¶áž“áž•áŸ„áž“ áž€áŸ’áž“áž»áž„áŸ¡áž†áŸ’áž“áž¶áŸ†áŸ•</p>\r\n<div class=\"content-grp-img\"><picture class=\"lozad\" data-iesrc=\"//media.sabay.com/media/sabay-news/Social-International/June(2)/June_28/63e5bfba921e1_1676001180.jpg\" data-alt=\"\" data-loaded=\"true\"><source srcset=\"https://cdn.sabay.com/cdn/media.sabay.com/media/sabay-news/Social-International/June(2)/June_28/63e5bfba921e1_1676001180_large.jpg\" media=\"(min-width: 1920px)\" /><source srcset=\"https://cdn.sabay.com/cdn/media.sabay.com/media/sabay-news/Social-International/June(2)/June_28/63e5bfba921e1_1676001180_medium.jpg\" media=\"(min-width: 980px)\" /><source srcset=\"https://cdn.sabay.com/cdn/media.sabay.com/media/sabay-news/Social-International/June(2)/June_28/63e5bfba921e1_1676001180_small.jpg\" media=\"(min-width: 320px)\" /><img /></picture></div>\r\n<p><iframe src=\"https://www.facebook.com/plugins/video.php?height=476&amp;href=https%3A%2F%2Fwww.facebook.com%2FESPNFC%2Fvideos%2F3360165190966369%2F&amp;show_text=false&amp;width=267&amp;t=0\" width=\"267\" height=\"476\" frameborder=\"0\" scrolling=\"no\" allowfullscreen=\"allowfullscreen\" data-mce-fragment=\"1\"></iframe></p>', '1676282225.jpg', 1, 1, 2, 1);

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
INSERT INTO `tbl_slide` VALUES (1, 'rr', '1676281762.jpg', 4, 2, 1, 2);

SET FOREIGN_KEY_CHECKS = 1;
