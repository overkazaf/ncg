-- phpMyAdmin SQL Dump
-- version 2.7.0-pl1
-- http://www.phpmyadmin.net
-- 
-- 主机: localhost
-- 生成日期: 2014 年 09 月 27 日 04:22
-- 服务器版本: 5.0.96
-- PHP 版本: 5.2.17
-- 
-- 数据库: `a0921213351`
-- 

-- --------------------------------------------------------

-- 
-- 表的结构 `menu`
-- 
use test;
CREATE TABLE `menu` (
  `id` int(10) NOT NULL auto_increment,
  `name` varchar(32) NOT NULL,
  `parent_id` int(10) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;

-- 
-- 导出表中的数据 `menu`
-- 

INSERT INTO `menu` VALUES (1, '南通简介', 0);
INSERT INTO `menu` VALUES (2, '沿海相关', 0);
INSERT INTO `menu` VALUES (3, '科教城', 0);
INSERT INTO `menu` VALUES (4, '发展理念', 0);
INSERT INTO `menu` VALUES (5, '南通概况', 1);
INSERT INTO `menu` VALUES (6, '市情市况', 1);
INSERT INTO `menu` VALUES (7, '产业发展', 1);
INSERT INTO `menu` VALUES (8, '沿海港区', 2);
INSERT INTO `menu` VALUES (9, '滨海园区', 2);
INSERT INTO `menu` VALUES (10, '沿海集团', 2);
INSERT INTO `menu` VALUES (11, '项目概况', 3);
INSERT INTO `menu` VALUES (12, '发展优势', 3);
INSERT INTO `menu` VALUES (13, '项目进度', 2);
INSERT INTO `menu` VALUES (14, '载体建设', 3);
INSERT INTO `menu` VALUES (15, '领导关怀', 4);
INSERT INTO `menu` VALUES (16, '战略合作', 4);
INSERT INTO `menu` VALUES (17, '项目扶持', 4);
INSERT INTO `menu` VALUES (18, '未来展望', 4);
INSERT INTO `menu` VALUES (19, '使命与愿景', 4);


