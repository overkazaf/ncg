-- phpMyAdmin SQL Dump
-- version 2.7.0-pl1
-- http://www.phpmyadmin.net
-- 
-- ����: localhost
-- ��������: 2014 �� 09 �� 27 �� 04:22
-- �������汾: 5.0.96
-- PHP �汾: 5.2.17
-- 
-- ���ݿ�: `a0921213351`
-- 

-- --------------------------------------------------------

-- 
-- ��Ľṹ `menu`
-- 
use test;
CREATE TABLE `menu` (
  `id` int(10) NOT NULL auto_increment,
  `name` varchar(32) NOT NULL,
  `parent_id` int(10) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;

-- 
-- �������е����� `menu`
-- 

INSERT INTO `menu` VALUES (1, '��ͨ���', 0);
INSERT INTO `menu` VALUES (2, '�غ����', 0);
INSERT INTO `menu` VALUES (3, '�ƽ̳�', 0);
INSERT INTO `menu` VALUES (4, '��չ����', 0);
INSERT INTO `menu` VALUES (5, '��ͨ�ſ�', 1);
INSERT INTO `menu` VALUES (6, '�����п�', 1);
INSERT INTO `menu` VALUES (7, '��ҵ��չ', 1);
INSERT INTO `menu` VALUES (8, '�غ�����', 2);
INSERT INTO `menu` VALUES (9, '����԰��', 2);
INSERT INTO `menu` VALUES (10, '�غ�����', 2);
INSERT INTO `menu` VALUES (11, '��Ŀ�ſ�', 3);
INSERT INTO `menu` VALUES (12, '��չ����', 3);
INSERT INTO `menu` VALUES (13, '��Ŀ����', 2);
INSERT INTO `menu` VALUES (14, '���彨��', 3);
INSERT INTO `menu` VALUES (15, '�쵼�ػ�', 4);
INSERT INTO `menu` VALUES (16, 'ս�Ժ���', 4);
INSERT INTO `menu` VALUES (17, '��Ŀ����', 4);
INSERT INTO `menu` VALUES (18, 'δ��չ��', 4);
INSERT INTO `menu` VALUES (19, 'ʹ����Ը��', 4);


