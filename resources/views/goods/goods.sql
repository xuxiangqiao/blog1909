/*
 Navicat Premium Data Transfer

 Source Server         : 127.0.0.1
 Source Server Type    : MySQL
 Source Server Version : 50726
 Source Host           : 127.0.0.1:3306
 Source Schema         : 1909

 Target Server Type    : MySQL
 Target Server Version : 50726
 File Encoding         : 65001

 Date: 11/03/2020 09:56:02
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for goods
-- ----------------------------
DROP TABLE IF EXISTS `goods`;
CREATE TABLE `goods`  (
  `goods_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `goods_name` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `goods_huohao` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `goods_price` decimal(10, 2) DEFAULT NULL,
  `goods_img` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `goods_number` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `cate_id` int(10) DEFAULT NULL,
  `b_id` int(10) DEFAULT NULL,
  `goods_jingpin` int(1) DEFAULT NULL,
  `goods_rexiao` int(1) DEFAULT NULL,
  `goods_desc` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `goods_imgs` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`goods_id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 31 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of goods
-- ----------------------------
INSERT INTO `goods` VALUES (30, NULL, NULL, NULL, NULL, NULL, 0, 0, 2, 2, NULL, NULL);
INSERT INTO `goods` VALUES (23, '177', NULL, 1.00, 'uploads/QLOrxHQPAxydyl5gxRa6kw95E2U0aT7lMpp6IBhi.jpeg', '撒爱', NULL, 7, 1, 1, 'WWGHWR', 'uploads/X5dpgRmiZHHiG1qg30ZcL8ajessfdRKLAhc0Fece.jpeg|uploads/NifLK1L5mgR4LNU9xJNrqgTR09zmAn8ySNNlPxq6.jpeg');
INSERT INTO `goods` VALUES (22, '贺飞牛逼', NULL, 1.00, 'uploads/eo7gNHuBH37LMBK0JXoT5ZV4gghfTsNtQdEeag50.jpeg', '撒爱', NULL, 7, 1, 1, 'FAFAFE', 'uploads/ZDXJn4tNx9mD7cUGBrfPHy01FXHF2V6EUQ2hiklB.jpeg|uploads/oDdJXAqlRYCEOSnXVLKBg4OvufL3XskAfOiG8uCS.jpeg|uploads/kxmAOviht3FUSnQ1Axgr13gkzuWM9VeWnpf5z6rV.jpeg');
INSERT INTO `goods` VALUES (29, NULL, NULL, NULL, NULL, NULL, 0, 0, 2, 2, NULL, NULL);
INSERT INTO `goods` VALUES (26, '问过我', '213213', 213123.00, 'uploads/Y7YycmVlB04tvDb0Uvoe49nYoLdMXcGMMmy9l1pu.jpeg', '22s', 3, 2, 2, 1, '海瑟薇', 'uploads/B6XNqkTphvAJ8bQbH4EbR8hSYM1kTYwbXY0sKm5T.jpeg|uploads/2O8HdprjAtJTfbaM7o0tyQJ2GTlnj3kwYFKrRoV0.jpeg|uploads/EFFWxbsb1r5XgAxr7QI8ws7EBTpk002TBzygG6qH.jpeg');
INSERT INTO `goods` VALUES (27, NULL, NULL, NULL, NULL, NULL, 0, 0, 2, 2, NULL, NULL);
INSERT INTO `goods` VALUES (28, '方式覅我', '21', 213123.00, 'uploads/E3xEUaxCq417QkjFv1JINVJ9GnUdJBErzHND4Iae.jpeg', '是的冯绍峰', 3, 8, 1, 1, '都是发放', 'uploads/Fkw1px9TJ9FnMXNg95V34fHFoYpyZu4W6jWP4nC0.jpeg|uploads/3mgVRSmsnjzqjMDdsMx20DRXnKnkNBQIm2nWpgJV.jpeg|uploads/VFBYpGPa3sY5Vou0i7GNm2yfdwQEFahigJi35q2W.jpeg');

SET FOREIGN_KEY_CHECKS = 1;
