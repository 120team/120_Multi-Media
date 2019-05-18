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

CREATE TABLE `forum_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `title` varchar(128) DEFAULT NULL,
  `chat` varchar(1024) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


CREATE TABLE `scenery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(4096) DEFAULT NULL,
  `file` varchar(4096) DEFAULT NULL,
  `thumb` varchar(4096) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `scenery` (`id`, `title`, `file`, `thumb`) VALUES
(1,	'杭州',	'./uploads/sce/20190512\\9ebf6d7a7dc7467dd6e3f7e62aba0f82.jpg',	'./uploads/sce/thumb/9ebf6d7a7dc7467dd6e3f7e62aba0f82.jpg'),
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

CREATE TABLE `user_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(50) DEFAULT NULL,
  `user_pwd` varchar(32) DEFAULT NULL,
  `salt` varchar(32) DEFAULT NULL,
  `sex` int(11) DEFAULT '1',
  `user_pic` varchar(512) DEFAULT NULL,
  `ban` int(11) DEFAULT '0',
  `delete` int(11) DEFAULT '0',
  `admin` int(11) DEFAULT '0',
  `sign` varchar(512) DEFAULT NULL,
  `user_mail` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `user_info` (`id`, `user_name`, `user_pwd`, `salt`, `sex`, `user_pic`, `ban`, `delete`, `admin`, `sign`, `user_mail`) VALUES
(1,	'aaaaa',	'ae4e928d3d58629230fde884cad2421d',	NULL,	0,	NULL,	0,	0,	0,	'aaa',	'964096516@qq.com'),
(2,	'WYX',	'6c08c5063717386b509e707bfb932bc8',	'd2#9ja20',	0,	NULL,	0,	0,	0,	'lalalalala',	'964096516@qq.com'),
(3,	'WYX',	'9cdc9965d07bdf3ca473882c941dc052',	'ld0kak4j',	0,	'./uploads/sce/thumb/598563f657b9d6ee7cdf1fe68e6b1655.jpg',	0,	0,	0,	'lalalalala',	'964096516@qq.com'),
(4,	'WYX',	'934148f0b5be7e72071482cba998ba93',	'u2]lj4f0',	0,	'./uploads/user_pic/thumb/b3fad1f3b14f861e7e28c0d22c9c8cc5.jpg',	0,	0,	0,	'lalalalalalalalalalalalalalalalalalalalalalalalala',	'964096516@qq.com'),
(5,	'SC',	'f934bab60230fdd3dcd556faa83cafa8',	'jdkdl0fj',	0,	'./uploads/user_pic/thumb/b3fad1f3b14f861e7e28c0d22c9c8cc5.jpg',	0,	0,	0,	'aaaaaaa',	'964096516@qq.com'),
(6,	'XHH',	'5809a2e13e3f357e4ec0cc0e6da59109',	']2l$#j@4',	1,	'./uploads/user_pic/thumb/b3fad1f3b14f861e7e28c0d22c9c8cc5.jpg',	0,	0,	0,	'qqqqq',	'964096516@qq.com'),
(7,	'wsj',	'58412d78310ac9493fa49a6acdb08b80',	'fk!j3@ja',	1,	'./uploads/user_pic/thumb/b3fad1f3b14f861e7e28c0d22c9c8cc5.jpg',	0,	0,	0,	'lololololololololololololololololololololololololololo',	'964096516@qq.com');

-- 2019-05-18 15:06:27
