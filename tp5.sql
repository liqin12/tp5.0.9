/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : tp5

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2017-06-15 10:31:55
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for admin
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL COMMENT '用户名',
  `mobile` varchar(20) NOT NULL COMMENT '手机号',
  `pwd` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of admin
-- ----------------------------
INSERT INTO `admin` VALUES ('1', 'admin', '13628097436', 'bee3d07327a21d8e7f02e10ba4b35c15');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` tinyint(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '自增ID',
  `user_name` varchar(25) NOT NULL DEFAULT '' COMMENT '用户名称',
  `user_email` varchar(25) DEFAULT NULL COMMENT '用户邮箱',
  `user_password` varchar(60) NOT NULL DEFAULT '' COMMENT '用户登录密码',
  `user_head` varchar(60) DEFAULT NULL COMMENT '用户头像',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('2', 'admin', '4324@qq.com', '123456', null);
INSERT INTO `user` VALUES ('3', 'admin', '4324@qq.com', '123456', null);
INSERT INTO `user` VALUES ('4', 'admin', '4324@qq.com', '123456', null);
INSERT INTO `user` VALUES ('5', 'admin', '4324@qq.com', '123456', null);
INSERT INTO `user` VALUES ('6', 'admin', '4324@qq.com', '123456', null);
INSERT INTO `user` VALUES ('7', 'admin', '4324@qq.com', '123456', null);
INSERT INTO `user` VALUES ('8', 'admin', '4324@qq.com', '123456', null);
INSERT INTO `user` VALUES ('9', 'admin', '4324@qq.com', '123456', '20170608\\d0becc2bd26e00cd6a44b1a0049a7de1.jpg');
INSERT INTO `user` VALUES ('10', 'admin', '4324@qq.com', '123456', '20170608\\ad8ac5a365cf7d3fcb14f7635e0cdc65.jpg');
