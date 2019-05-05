-- Adminer 4.6.2 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

CREATE DATABASE `multimedia` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `multimedia`;

CREATE TABLE `article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(4096) DEFAULT NULL,
  `information` varchar(4096) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `article` (`id`, `title`, `information`) VALUES
(1,	'西湖',	'You have an error in your SQL syntaxYou have an error in your SQL syntaxYou have an error in your SQL syntaxYou have an error in your SQL syntaxYou have an error in your SQL syntaxYou have an error in your SQL syntaxYou have an error in your SQL syntax'),
(2,	'断桥',	'You have an error in your SQL syntax'),
(3,	'杭州',	'You have an error in your SQL syntaxYou have an error in your SQL syntaxYou have an error in your SQL syntaxYou have an error in your SQL syntaxYou have an error in your SQL syntaxYou have an error in your SQL syntaxYou have an error in your SQL syntax');

CREATE TABLE `scenery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(4096) DEFAULT NULL,
  `file` varchar(4096) DEFAULT NULL,
  `thumb` varchar(4096) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `scenery` (`id`, `title`, `file`, `thumb`) VALUES
(1,	'杭州',	'./uploads/sce/20190502\\6db060a9d66e3a3bc394c89fcb917ec0.jpg',	'./uploads/sce/thumb/6db060a9d66e3a3bc394c89fcb917ec0.jpg'),
(2,	'西湖',	'./uploads/sce/20190503\\51a76d11f543cd8c447ad807869ecb7e.jpg',	'./uploads/sce/thumb/51a76d11f543cd8c447ad807869ecb7e.jpg'),
(4,	'断桥',	'./uploads/sce/20190503\\9b2d4e3b914e4e89a21cc30ad1e63afc.jpg',	'./uploads/sce/thumb/9b2d4e3b914e4e89a21cc30ad1e63afc.jpg'),
(5,	'三潭印月',	'./uploads/sce/20190503\\9e8d0d73d3759203b5c2bb9bc6ceae0f.jpg',	'./uploads/sce/thumb/9e8d0d73d3759203b5c2bb9bc6ceae0f.jpg'),
(6,	'雷峰塔',	'./uploads/sce/20190503\\36758320e1a5be2b851cf17385337d7a.jpg',	'./uploads/sce/thumb/36758320e1a5be2b851cf17385337d7a.jpg');

CREATE TABLE `user` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `username` varchar(32) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  `salt` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `user` (`id`, `username`, `password`, `salt`) VALUES
(9,	'admin',	'ed92ed18d5c8fc0e4497a9c2dbc7ed72',	'#lf0$jkk');

-- 2019-05-05 14:53:07
