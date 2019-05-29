/*
MySQL Backup
Source Server Version: 5.1.73
Source Database: multimedia
Date: 2019/5/29 16:07:13
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
--  Table structure for `discuss`
-- ----------------------------
DROP TABLE IF EXISTS `discuss`;
CREATE TABLE `discuss` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `forumlog_id` int(255) DEFAULT NULL,
  `user_id` int(255) DEFAULT NULL,
  `user_name` varchar(4096) DEFAULT NULL,
  `user_pic` varchar(4096) DEFAULT NULL,
  `information` varchar(4096) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `delete` int(8) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `forum_log`
-- ----------------------------
DROP TABLE IF EXISTS `forum_log`;
CREATE TABLE `forum_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(4096) DEFAULT NULL,
  `user_pic` varchar(4096) DEFAULT NULL,
  `title` varchar(128) DEFAULT NULL,
  `article` varchar(1024) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `num` int(255) DEFAULT '0',
  `delete` int(8) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `nwl`
-- ----------------------------
DROP TABLE IF EXISTS `nwl`;
CREATE TABLE `nwl` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `title` varchar(4096) DEFAULT NULL,
  `information` varchar(4096) DEFAULT NULL,
  `img` varchar(4096) DEFAULT NULL,
  `thumb` varchar(4096) DEFAULT NULL,
  `flag` int(8) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `oldtrees`
-- ----------------------------
DROP TABLE IF EXISTS `oldtrees`;
CREATE TABLE `oldtrees` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `title` varchar(4096) DEFAULT NULL,
  `information` varchar(4096) DEFAULT NULL,
  `img` varchar(4096) DEFAULT NULL,
  `thumb` varchar(4096) DEFAULT NULL,
  `flag` int(8) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `opera`
-- ----------------------------
DROP TABLE IF EXISTS `opera`;
CREATE TABLE `opera` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `title` varchar(4096) DEFAULT NULL,
  `information` varchar(4096) DEFAULT NULL,
  `thumb` varchar(4096) DEFAULT NULL,
  `img` varchar(4096) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `owl`
-- ----------------------------
DROP TABLE IF EXISTS `owl`;
CREATE TABLE `owl` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `title` varchar(4096) DEFAULT NULL,
  `information` varchar(4096) DEFAULT NULL,
  `img` varchar(4096) DEFAULT NULL,
  `thumb` varchar(4096) DEFAULT NULL,
  `flag` int(8) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `residence`
-- ----------------------------
DROP TABLE IF EXISTS `residence`;
CREATE TABLE `residence` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `title` varchar(4096) DEFAULT NULL,
  `information` varchar(4096) DEFAULT NULL,
  `img` varchar(4096) DEFAULT NULL,
  `thumb` varchar(4096) DEFAULT NULL,
  `flag` int(8) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `scenery`
-- ----------------------------
DROP TABLE IF EXISTS `scenery`;
CREATE TABLE `scenery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(4096) DEFAULT NULL,
  `file` varchar(4096) DEFAULT NULL,
  `thumb` varchar(4096) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `user`
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `username` varchar(32) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  `salt` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `user_info`
-- ----------------------------
DROP TABLE IF EXISTS `user_info`;
CREATE TABLE `user_info` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(50) DEFAULT NULL,
  `user_pwd` varchar(32) DEFAULT NULL,
  `salt` varchar(32) DEFAULT NULL,
  `sex` int(11) DEFAULT '1',
  `user_pic` varchar(512) DEFAULT NULL,
  `thumb` varchar(4096) DEFAULT NULL,
  `ban` int(8) DEFAULT '0',
  `delete` int(8) DEFAULT '0',
  `admin` int(8) DEFAULT '0',
  `sign` varchar(512) DEFAULT NULL,
  `user_mail` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records 
-- ----------------------------
INSERT INTO `discuss` VALUES ('1','1','1',NULL,NULL,'香菇','2019-05-27 18:46:04','0'), ('2','1','1','WYX','./uploads/forum/user_pic/default/default.jpg','香菇','2019-05-27 18:53:27','0'), ('3','1','1','WYX','./uploads/forum/user_pic/default/default.jpg','香菇','2019-05-27 18:53:39','0'), ('4','1','1','WYX','./uploads/forum/user_pic/default/default.jpg','香菇','2019-05-27 18:53:42','0'), ('5','2','1','WYX','./uploads/forum/user_pic/default/default.jpg','蓝瘦','2019-05-27 18:59:49','0'), ('6','13','1','WYX','./uploads/forum/user_pic/default/default.jpg','不敢问还发你MLGB','2019-05-27 19:02:48','0'), ('7','13','1','WYX','./uploads/forum/user_pic/default/default.jpg','不敢问还发你MLGB','2019-05-27 19:03:23','0'), ('8','13','1','WYX','./uploads/forum/user_pic/default/default.jpg','不敢问还发你MLGB','2019-05-27 19:04:47','0'), ('9','4','1','WYX','./uploads/forum/user_pic/default/default.jpg','你是傻逼','2019-05-27 19:04:59','0'), ('10','1','1','WYX','./uploads/forum/user_pic/default/default.jpg','垃圾','2019-05-27 19:08:14','0'), ('11','1','1','WYX','./uploads/forum/user_pic/default/default.jpg','垃圾','2019-05-27 19:08:37','0'), ('12','1','1','WYX','./uploads/forum/user_pic/default/default.jpg','蛇皮怪','2019-05-27 19:26:05','0'), ('13','1','1','WYX','./uploads/forum/user_pic/default/default.jpg','死亡','2019-05-27 19:28:07','0'), ('14','1','1','WYX','./uploads/forum/user_pic/default/default.jpg','BOOOOOM','2019-05-27 19:31:17','0'), ('15','1','1','WYX','./uploads/forum/user_pic/default/default.jpg','恕我直言，在座的各位，都是垃圾','2019-05-27 19:33:09','0'), ('16','2','1','WYX','./uploads/forum/user_pic/default/default.jpg','33333333','2019-05-27 19:33:20','0'), ('17','14','1','WYX','./uploads/forum/user_pic/default/default.jpg','新你MLGB，你这个SB','2019-05-27 19:34:23','0'), ('18','1','4','WBL','./uploads/forum/user_pic/thumb/41c721b641cb2950f2c46fd451e42381.png','撒玩意儿','2019-05-29 13:38:53','0'), ('19','4','4','WBL','./uploads/forum/user_pic/thumb/41c721b641cb2950f2c46fd451e42381.png','你是傻逼','2019-05-29 13:54:53','0'), ('20',NULL,'4','WBL','./uploads/forum/user_pic/thumb/41c721b641cb2950f2c46fd451e42381.png','111','2019-05-29 14:05:30','0'), ('21',NULL,'4','WBL','./uploads/forum/user_pic/thumb/41c721b641cb2950f2c46fd451e42381.png','222','2019-05-29 14:06:03','0'), ('22',NULL,'4','WBL','./uploads/forum/user_pic/thumb/41c721b641cb2950f2c46fd451e42381.png','333','2019-05-29 14:06:58','0'), ('23',NULL,'4','WBL','./uploads/forum/user_pic/thumb/41c721b641cb2950f2c46fd451e42381.png','444','2019-05-29 14:08:25','0'), ('24','1','4','WBL','./uploads/forum/user_pic/thumb/41c721b641cb2950f2c46fd451e42381.png','23231','2019-05-29 14:09:24','0'), ('25','10','4','WBL','./uploads/forum/user_pic/thumb/41c721b641cb2950f2c46fd451e42381.png','123321','2019-05-29 14:09:39','0'), ('26','15','5','ZY','./uploads/forum/user_pic/img/20190529\\db1e356be34725a6dd84a5c9bf02bb1f.jpg','顶顶顶顶顶','2019-05-29 15:11:28','0'), ('27','15','5','ZY','./uploads/forum/user_pic/img/20190529\\db1e356be34725a6dd84a5c9bf02bb1f.jpg','顶顶顶顶顶','2019-05-29 15:13:21','0'), ('28','15','5','ZY','./uploads/forum/user_pic/img/20190529\\db1e356be34725a6dd84a5c9bf02bb1f.jpg','顶顶顶顶顶\r\n123456','2019-05-29 15:21:26','0'), ('29','15','1','WYX','./uploads/forum/user_pic/img/20190529\\42e04b830ca7e166158f21093e6048a8.jpg','居然能在这儿见到你！！','2019-05-29 15:22:21','0');
INSERT INTO `forum_log` VALUES ('1','WYX','./uploads/forum/user_pic/default/default.jpg','蜈蚣是什么东西','为什么!@@^#!*^$)(!&#)(*@^#$%!*^%@$^)(*!&@&%$^&@*^#','2019-05-27 10:17:14','12','0'), ('2',NULL,NULL,'蜘蛛是什么','为什么@!&*(#!&(*)#^$@*(&%#%!^&*%$!^(#@!','2019-05-27 10:17:14','2','0'), ('3','WYX','./uploads/forum/user_pic/default/default.jpg','蛇是什么','为什么!@&#(*!)&$)(^(@#^!$*%^!@*^!*($&^*@^*$%!*@#^*','2019-05-27 10:17:14','0','0'), ('4','WBL','./uploads/forum/user_pic/thumb/41c721b641cb2950f2c46fd451e42381.png','我是谁我在哪儿我要去干嘛','!@&(*$#!&(*)#^*!&(^@*#!%#!@&(*$#!&(*)#^*!&(^@*#!%#!@&(*$#!&(*)#^*!&(^@*#!%#!@&(*$#!&(*)#^*!&(^@*#!%#!@&(*$#!&(*)#^*!&(^@*#!%#!@&(*$#!&(*)#^*!&(^@*#!%#!@&(*$#!&(*)#^*!&(^@*#!%#!@&(*$#!&(*)#^*!&(^@*#!%#!@&(*$#!&(*)#^*!&(^@*#!%#!@&(*$#!&(*)#^*!&(^@*#!%#!@&(*$#!&(*)#^*!&(^@*#!%#!@&(*$#!&(*)#^*!&(^@*#!%#!@&(*$#!&(*)#^*!&(^@*#!%#!@&(*$#!&(*)#^*!&(^@*#!%#!@&(*$#!&(*)#^*!&(^@*#!%#!@&(*$#!&(*)#^*!&(^@*#!%#!@&(*$#!&(*)#^*!&(^@*#!%#!@&(*$#!&(*)#^*!&(^@*#!%#!@&(*$#!&(*)#^*!&(^@*#!%#!@&(*$#!&(*)#^*!&(^@*#!%#!@&(*$#!&(*)#^*!&(^@*#!%#!@&(*$#!&(*)#^*!&(^@*#!%#!@&(*$#!&(*)#^*!&(^@*#!%#!@&(*$#!&(*)#^*!&(^@*#!%#!@&(*$#!&(*)#^*!&(^@*#!%#!@&(*$#!&(*)#^*!&(^@*#!%#!@&(*$#!&(*)#^*!&(^@*#!%#!@&(*$#!&(*)#^*!&(^@*#!%#!@&(*$#!&(*)#^*!&(^@*#!%#!@&(*$#!&(*)#^*!&(^@*#!%#!@&(*$#!&(*)#^*!&(^@*#!%#!@&(*$#!&(*)#^*!&(^@*#!%#!@&(*$#!&(*)#^*!&(^@*#!%#!@&(*$#!&(*)#^*!&(^@*#!%#!@&(*$#!&(*)#^*!&(^@*#!%#','2019-05-27 10:17:14','2','0'), ('5','WBL','./uploads/forum/user_pic/thumb/41c721b641cb2950f2c46fd451e42381.png','我是谁我在哪儿我要去干嘛','(^@*#!(^@*#!(^@*#!(^@*#!(^@*#!(^@*#!(^@*#!(^@*#!(^@*#!(^@*#!','2019-05-27 10:17:14','0','0'), ('6','WYX','./uploads/forum/user_pic/default/default.jpg','我是谁我在哪儿我要去干嘛','我要去干嘛','2019-05-27 10:17:14','0','0'), ('7','WBL','./uploads/forum/user_pic/thumb/41c721b641cb2950f2c46fd451e42381.png','我要去干嘛','我要去干嘛','2019-05-27 10:17:14','0','0'), ('8','WBL','./uploads/forum/user_pic/thumb/41c721b641cb2950f2c46fd451e42381.png','我要去干嘛','我要去干嘛','2019-05-27 10:17:14','0','0'), ('9','WYX','./uploads/forum/user_pic/default/default.jpg','蜈蚣是什么东西','蜈蚣是什么东西','2019-05-27 10:17:14','0','0'), ('10','WBL','./uploads/forum/user_pic/thumb/41c721b641cb2950f2c46fd451e42381.png','我要去干嘛','我要去干嘛','2019-05-27 10:17:14','1','0'), ('11','WBL','./uploads/forum/user_pic/thumb/41c721b641cb2950f2c46fd451e42381.png','./uploads/forum/user_pic/thumb/41c721b641cb2950f2c46fd451e42381.png','./uploads/forum/user_pic/thumb/41c721b641cb2950f2c46fd451e42381.png','2019-05-27 10:17:14','0','0'), ('12','WBL','./uploads/forum/user_pic/thumb/41c721b641cb2950f2c46fd451e42381.png','撒的阿萨德阿萨德','hfsadkjfjklajtu230u4509295083409572304740-7t89hfsadkjfjklajtu230u4509295083409572304740-7t89hfsadkjfjklajtu230u4509295083409572304740-7t89hfsadkjfjklajtu230u4509295083409572304740-7t89hfsadkjfjklajtu230u4509295083409572304740-7t89hfsadkjfjklajtu230u4509295083409572304740-7t89hfsadkjfjklajtu230u4509295083409572304740-7t89hfsadkjfjklajtu230u4509295083409572304740-7t89hfsadkjfjklajtu230u4509295083409572304740-7t89hfsadkjfjklajtu230u4509295083409572304740-7t89hfsadkjfjklajtu230u4509295083409572304740-7t89hfsadkjfjklajtu230u4509295083409572304740-7t89hfsadkjfjklajtu230u4509295083409572304740-7t89','2019-05-27 10:17:14','0','0'), ('13','WYX','./uploads/forum/user_pic/default/default.jpg','WHY ARE YOU SO DIAO','咱也不知道咱也不敢问','2019-05-27 19:02:34','0','0'), ('14','WYX','./uploads/forum/user_pic/default/default.jpg','这是一个新的问题','啦啦啦','2019-05-27 19:34:07','1','0'), ('15','ZY','./uploads/forum/user_pic/thumb/db1e356be34725a6dd84a5c9bf02bb1f.jpg','世界上有超能力吗','世界上真的有超能力吗','2019-05-29 15:11:07','4','0');
INSERT INTO `nwl` VALUES ('1','吴山天风','       位于西湖东南面，高94米，景秀、石奇、泉清、洞美。山上有城隍阁，秀出云表，巍然壮观。山道旁，有一组形态各异的岩石，因其酷似十二生肖而被称为“十二生肖石”。吴山山顶建有“江湖汇观亭”，站在亭中，钱塘江和西湖全景一览无余。在亭侧通往云居山大道上留有山茅观遗址，遗址旁留有南宋理学家朱熹的手书：吴山第一峰。','./uploads/new_west_lake/img/20190526\\5c7fb7171ad3f00c37f07d9d8763627a.jpg','./uploads/new_west_lake/thumb/5c7fb7171ad3f00c37f07d9d8763627a.jpg','1'), ('2',NULL,'       春秋时期，吴国的南界由紫阳、云居、金地、清平、宝莲、七宝、石佛、宝月、骆驼、峨眉等十几个山头形成西南―东北走向的弧形丘冈，总称吴山。吴山不高，但由于插入市区其东、北、西北多俯临街市巷陌，南面可远眺钱塘江及两岸平畴，上吴山仍有凌空超越之感，且可尽揽杭州江、山、湖、城之胜。','./uploads/new_west_lake/img/20190526\\10c55fdaf66a2a6c2bd0492f859c17e0.jpg','./uploads/new_west_lake/thumb/10c55fdaf66a2a6c2bd0492f859c17e0.jpg','0'), ('3','云栖竹径','       云栖竹径，新西湖十景之九。早在清代雍正时，“云栖梵径”就被列入了当时的“西湖十八景”。\r\n\r\n       云栖“竹径”景观是指云栖坞里林木茂盛的山坞景观：深山古寺，竹径磬声。 今天的云栖坞，翠竹成荫，溪流叮咚，清凉无比。小径蜿蜒深入，潺潺清溪依径而下，娇婉动听的鸟声自林中传出，环境幽静清凉。','./uploads/new_west_lake/img/20190526\\6edb1efc64f6e28d3be71716e6a2edfd.jpg','./uploads/new_west_lake/thumb/6edb1efc64f6e28d3be71716e6a2edfd.jpg','1'), ('4',NULL,'       康熙皇帝曾四到云栖，赋诗题额，并赐一株大竹名为“皇竹”，浙江地方官为此建“御书亭”、“皇竹亭”以记盛事。相隔43年后，乾隆皇帝南巡至杭，又六到云栖。清末以后，云栖竹林屡遭破坏，不复旧观。抗日战争杭州沦陷期间，竹林更遭滥伐，几近灭绝。1950年后，在杭州市园林部门护理下，竹林逐步复壮，整修寺宇，开辟茶室。今天的云栖竹径，翠竹成荫，溪流叮咚，清凉无比。小径蜿蜒深入，潺潺清溪依径而下，娇婉动听的鸟声自林中传出，整个环境幽静清凉。','./uploads/new_west_lake/img/20190526\\9551c12ad2502348d5285fefc40f9224.jpg','./uploads/new_west_lake/thumb/9551c12ad2502348d5285fefc40f9224.jpg','0'), ('5','九溪烟树','       九溪，俗称“九溪十八涧”，十八涧系指细流之多。位于西湖西边鸡冠垅下。源发翁家山杨梅岭下，途汇清湾、宏法、唐家、小康、佛石、百丈、云栖、清头和方家九溪，曲折隐忽，流入钱江。','./uploads/new_west_lake/img/20190526\\4336efca54a1593ce7f2cff258188b70.jpg','./uploads/new_west_lake/thumb/4336efca54a1593ce7f2cff258188b70.jpg','1'), ('6',NULL,'       1947年，著名地质学家李四光两次到九溪作冰川考察，发现古代冰川遗迹，认为距今二三百万年前第四纪时，杭州西湖尚为一片冰雪世界，当时下龙井是一处储水盘谷，承受大量冰雪，经九溪十八涧东南流出，形成九溪十八涧峻险地段。民国期间，九溪十八涧一带有二、三私家茶庄，卖茶水并供应西湖藕粉、桂花糖等。茶庄所备桌椅不多，春秋佳日，游客以涧边石块权充桌椅。1975年以后，园林部门分4期改造和新建九溪菜馆、茶室、接待室；整理山林环境，疏浚泉池，筑水坝，架画桥，布蹬道，造亭子，扩大游览面积。','./uploads/new_west_lake/img/20190526\\b12faacba53f1efde0e732e144d60f63.jpg','./uploads/new_west_lake/thumb/b12faacba53f1efde0e732e144d60f63.jpg','0'), ('7','虎跑梦泉','       位于大慈山下的虎跑泉，是西湖众多名泉中的翘楚。虎跑泉的得名，始于“南岳童子泉，当遣二虎移来”的佛教神话传说。传说唐代高僧性空曾住在虎跑泉所在的大慈山谷，见此处风景优美，欲在此建寺，却苦于无水。一天，他梦见二虎跑地，清泉涌出。次日醒来，果然发现甘泉，此泉即被命名为“虎跑泉”。','./uploads/new_west_lake/img/20190526\\b59448042bc1661f7ec26f74307a1f8a.jpg','./uploads/new_west_lake/thumb/b59448042bc1661f7ec26f74307a1f8a.jpg','1'), ('8',NULL,'       虎跑泉在地质学上属裂隙泉，水源旺盛，水质优良，其形成与当地得天独厚的自然条件有关。虎跑泉与龙井、玉泉、郭婆井、吴山大井，并称杭州五大“圣水”。更因虎跑泉水质特别纯净，世人将虎跑泉与龙井茶叶誉为“西湖双绝”。','./uploads/new_west_lake/img/20190526\\b2861e567a6879300d11cca39591949e.jpg','./uploads/new_west_lake/thumb/b2861e567a6879300d11cca39591949e.jpg','0'), ('9','宝石流霞','       宝石山为西湖北岸屏障。这里的山岩呈赭红色，岩体中有许多闪闪发亮的红色小石子，每当阳光映照，满山流韦纷披，尤其是朝阳或落日红光洒沐之时，分外耀目，仿佛数不清的宝石在熠熠生辉。宝石山正因此而得名。','./uploads/new_west_lake/img/20190526\\02f168d72e0511c2be361a795c5e2c4a.jpg','./uploads/new_west_lake/thumb/02f168d72e0511c2be361a795c5e2c4a.jpg','1'), ('10',NULL,'       宝石山东巅，保俶塔巍然挺秀。原为九级砖木结构，现在的砖砌实心式样，是1933年重建时仿自清代原样，虽不能登临了，却以其漂亮的“容颜”和所处的显要位置而成为引人瞩目的西湖胜景标志物。','./uploads/new_west_lake/img/20190526\\498f676589ae30821dcc6e6e5f85d869.jpg','./uploads/new_west_lake/thumb/498f676589ae30821dcc6e6e5f85d869.jpg','0');
INSERT INTO `oldtrees` VALUES ('1','桐庐罗汉松','最老古树——桐庐罗汉松','./uploads/old_trees/img/20190526\\85302328dd3803ca8736cc638324fb9c.jpg','./uploads/old_trees/thumb/85302328dd3803ca8736cc638324fb9c.jpg','1'), ('2',NULL,'','./uploads/old_trees/img/20190526\\eef19f3f0dfb2663d30c6fb98c73286a.jpg','./uploads/old_trees/thumb/eef19f3f0dfb2663d30c6fb98c73286a.jpg','0'), ('3','富阳银杏','最美古树群——富阳银杏','./uploads/old_trees/img/20190526\\eba4835f95ab19402e809a0875810ebc.jpg','./uploads/old_trees/thumb/eba4835f95ab19402e809a0875810ebc.jpg','1'), ('4',NULL,'','./uploads/old_trees/img/20190526\\a04f3f607beaee7cd673205c3679c989.jpg','./uploads/old_trees/thumb/a04f3f607beaee7cd673205c3679c989.jpg','0'), ('5','西湖风景区吴山油麻藤','最神奇古树——西湖风景区吴山油麻藤','./uploads/old_trees/img/20190526\\31287c081a0e4e74a3ea5774bf80aae7.jpg','./uploads/old_trees/thumb/31287c081a0e4e74a3ea5774bf80aae7.jpg','1'), ('6',NULL,'','./uploads/old_trees/img/20190526\\37d7b0cb85ad555a567374c46f652e1e.jpg','./uploads/old_trees/thumb/37d7b0cb85ad555a567374c46f652e1e.jpg','0');
INSERT INTO `opera` VALUES ('1','断桥残雪','     是广泛流行于江浙沪一带的传统曲艺谐谑形式，又名\"小锣书\"，俗称\"卖梨膏糖的\"，是一种吴语说唱艺术。始于清光绪年间，盛行于20世纪二三十年代。','./uploads/opera/thumb/3592421992c8aabe1760681ce1115f20.png','./uploads/opera/img/20190525\\3592421992c8aabe1760681ce1115f20.png'), ('2','杭州评话','     是广泛流行于江浙沪一带的传统曲艺谐谑形式，又名\"小锣书\"，俗称\"卖梨膏糖的\"，是一种吴语说唱艺术。始于清光绪年间，盛行于20世纪二三十年代。','./uploads/opera/thumb/81d23961a1982758928af96537e3607f.png','./uploads/opera/img/20190525\\81d23961a1982758928af96537e3607f.png'), ('3','杭州摊簧','     摊簧是流行于苏州 、 上海 、 杭州 、 宁波等地的一种中国曲艺曲种。','./uploads/opera/thumb/605fe4c18b3ab6281d01556efde2ec06.png','./uploads/opera/img/20190525\\605fe4c18b3ab6281d01556efde2ec06.png'), ('4','武林调','     武林调又称“杭曲”，是一种流行于浙江杭州及周边地区的曲艺唱曲形式。武林调由民间的宝卷宣讲演变而来，形成于清代后期。武林调的表演形式以坐唱为主，叙唱结合，一人担当多个角色，模拟形态，塑造人物，通俗生动，引人入胜。','./uploads/opera/thumb/107f2cf06dae1a9fc12076ec87141da0.png','./uploads/opera/img/20190525\\107f2cf06dae1a9fc12076ec87141da0.png'), ('5','杭剧','     杭剧，是杭州的地方传统戏曲剧种。一度流行于杭州、嘉兴、湖州一带水乡和苏南等地。起源于杭州曲艺宣卷，从诞生到衰败仅半个世纪。1923年正式搬上舞台演出后，在杭州、嘉兴、湖州一带和苏南等地广为流传，抗日战争以前尤为兴旺。','./uploads/opera/thumb/12d1f951ad79b93f612e9f34332b2475.png','./uploads/opera/img/20190525\\12d1f951ad79b93f612e9f34332b2475.png'), ('6','杭州评词','     杭州评词俗称小书，是浙江杭州市的传统说唱艺术，是用杭州方言又说又唱地讲述故事的一种曲艺，属弹词类。流行于杭州、余杭、萧山、桐庐、绍兴、诸暨等地。','./uploads/opera/thumb/1ba9c32169802a7d72ef7f7bd1dfb95f.png','./uploads/opera/img/20190525\\1ba9c32169802a7d72ef7f7bd1dfb95f.png');
INSERT INTO `owl` VALUES ('1','断桥残雪','      位于在西湖北部白堤东端的断桥一带， 范围约2.61公顷。尤以冬天观赏西湖雪景为胜。当西湖雪后初晴时，日出映照，断桥向阳的半边桥面上积雪融化、露出褐色的桥面一痕，仿佛长长的白链到此中断了， 呈“雪残桥断”之景。','./uploads/old_west_lake/img/20190526\\6d17d7f4995f0dd703641521cd7e503d.jpg','./uploads/old_west_lake/thumb/6d17d7f4995f0dd703641521cd7e503d.jpg','1'), ('2',NULL,'       位于白堤东端的断桥上视域开阔，是完整观赏西湖南、北水域景观的最佳地点。因中国家喻户晓的民间爱情故事《白蛇传》的主人公白娘子与许仙相识于此，断桥成为拥有爱情象征意义的、最富盛名的桥。因白堤一直保持了沿堤两侧间株桃柳的植被特色，春日里桃红柳绿，游人如织。','./uploads/old_west_lake/img/20190526\\4b342a8c0742f82b5b908078c6046637.jpg','./uploads/old_west_lake/thumb/4b342a8c0742f82b5b908078c6046637.jpg','0'), ('3','花港观鱼','       花港观鱼地处苏堤的南段西侧。是承佛光紫气而幽静的植物园林。花溪蓄卢园.花港前依接山势葱茏的南屏山，西靠层峦叠翠的西山，平静如镜的小南湖和西里湖，如青玉分列左右。而公园就在在西里湖与小南湖之间的半岛上面。','./uploads/old_west_lake/img/20190526\\9b24baf99854e9e624a9210b3bd89cb8.jpg','./uploads/old_west_lake/thumb/9b24baf99854e9e624a9210b3bd89cb8.jpg','1'), ('4',NULL,'      花港观鱼是由花、港、鱼为特色的风景点。西湖十景之一。地处苏堤南段西侧。\r\n\r\n      1964年二期扩建工程告竣后，占地面积达20公顷。全园分为红鱼池、牡丹园、花港、大草坪、密林地五个景区。与雷峰塔、净慈寺隔苏堤相望。\r\n\r\n      红鱼池位于园中部偏南处，是全园游赏的中心区域。池岸曲折自然，池中堆土成岛，池上架设曲桥，倚桥栏俯看，数千尾金鳞红鱼结队往来，泼刺戏水。','./uploads/old_west_lake/img/20190526\\f9f1e311e5f4f42fe1b308ae55a25bd8.jpg','./uploads/old_west_lake/thumb/f9f1e311e5f4f42fe1b308ae55a25bd8.jpg','0'), ('5','雷峰夕照','       雷峰夕照，位于浙江省杭州市西湖湖南、净慈寺前的夕照山上，西湖十景之七，因晚霞镀塔，佛光普照而闻名 。雷峰塔建于五代（975），是吴越国王钱弘俶为庆祝黄妃得子而建，初名黄妃塔。\r\n\r\n       雷峰塔之所以远近闻名，与民间传说《白蛇传》有很大的关系。相传，法海和尚曾将白娘子镇压在塔下，并咒语：‘若要雷峰塔倒，除非西湖水干。’','./uploads/old_west_lake/img/20190526\\43f12ac737fb4eaaafd43b0fda8631e8.jpg','./uploads/old_west_lake/thumb/43f12ac737fb4eaaafd43b0fda8631e8.jpg','1'), ('6',NULL,'       该景观的最重要建筑要素为雷峰塔，始建于吴越国时期(977年)，民国(1924年)塔毁后以遗址形式保存，曾与保俶塔形成西湖南北两岸的对景，佐证了佛教文化的兴盛对西湖景观的直接影响。雷峰塔还因中国四大民间爱情故事之一的《白蛇传》而成为爱情坚贞的象征，赋予了西湖景观丰富的历史内涵。2002年，为使遗址不再被风雨剥蚀，按原塔形式建造了覆罩于遗址之上的保护性塔，兼顾恢复了古塔本身及与保俶塔的对景景观。','./uploads/old_west_lake/img/20190526\\6daba88d1e02490bb29a0cb5adab76a7.jpg','./uploads/old_west_lake/thumb/6daba88d1e02490bb29a0cb5adab76a7.jpg','0'), ('7','曲院风荷','       位于西湖北岸的苏堤北端西侧22米处，范围约0.06公顷，以夏日观荷为主题，在视觉上呈现出“接天莲叶无穷碧，映日荷花别样红”的特色。\r\n\r\n       曲院，原为南宋(1127－1279)设在洪春桥的酿造官酒的作坊，取金沙涧之水以酿官酒。因该处多荷花，每当夏日荷花盛开、香风徐来，荷香与酒香四处飘溢，有“暖风熏得游人醉”的意境。\r\n\r\n曲院风荷位于西湖西侧，岳飞庙前面。南宋时，此有一座官家酿酒的作坊，取金沙涧的溪水造曲酒，闻名国内。附近的池塘种有菱荷，每当夏日风起，酒香荷香沁人心脾，因名“曲院风荷”。总占地面积12.65万平方米，总建筑面积268000万平米。','./uploads/old_west_lake/img/20190526\\ce810b030472384e54ba66ca1bc99ace.jpg','./uploads/old_west_lake/thumb/ce810b030472384e54ba66ca1bc99ace.jpg','1'), ('8',NULL,'','./uploads/old_west_lake/img/20190526\\a5ddb5424dfae7c95d846a7209d2b11b.jpg','./uploads/old_west_lake/thumb/a5ddb5424dfae7c95d846a7209d2b11b.jpg','0'), ('9','苏堤春晓','       位于西湖的西部水域， 西距湖西岸约500米， 范围约9.66公顷。北宋元祐五年(1090年) ，著名文人苏轼用疏浚西湖时挖出的湖泥堆筑了一条南北走向的长堤。堤上建有六桥，自南向北依次命名为映波桥、锁澜桥、望山桥、压堤桥、东浦桥和跨虹桥。后人为纪念苏轼，将此堤命名为“苏堤”。苏堤是跨湖连通南北两岸的唯一通道，穿越了整个西湖水域，因此，在苏堤上具备最为完整的视域范围，是观赏全湖景观的最佳地带。在压堤桥南御碑亭处驻足，如图画般展开的湖山胜景尽收眼底。','./uploads/old_west_lake/img/20190526\\3c9798d26efcb5208d7be66a015ed5a1.jpg','./uploads/old_west_lake/thumb/3c9798d26efcb5208d7be66a015ed5a1.jpg','1'), ('10',NULL,'       苏堤自北宋始建至今，一直保持了沿堤两侧相间种植桃树和垂柳的植物景观特色。春季拂晓是欣赏“苏堤春晓”的最佳时间，此时薄雾蒙蒙，垂柳初绿、桃花盛开，尽显西湖旖旎的柔美气质。','./uploads/old_west_lake/img/20190526\\f6045a8987749071434b37686c3b95fe.jpg','./uploads/old_west_lake/thumb/f6045a8987749071434b37686c3b95fe.jpg','0');
INSERT INTO `residence` VALUES ('1','胡雪岩故居','       雪岩故居，位于杭州市河坊街、大井巷历史文化保护区东部的元宝街，建于清同治十一年（1872年），正值胡雪岩事业的颠峰时期。当时豪宅工程历时3年，于1875年竣工。落成的故居是一座富有中国传统建筑特色又颇具西方建筑风格的美轮美奂的宅第，整个建筑南北长东西宽，占地面积10.8亩，建筑面积5815平方米。故居无论是从建筑还是从室内家具的陈设，用料之考究，都堪称清末中国巨商第一豪宅。','./uploads/Former_Residence/img/20190526\\deba875ecf1a8c523af84c6116f686cb.jpg','./uploads/Former_Residence/thumb/deba875ecf1a8c523af84c6116f686cb.jpg','1'), ('2',NULL,'       清末中国巨商第一豪宅\r\n\r\n       胡雪岩故居，位于杭州市河坊街、大井巷历史文化保护区东部的元宝街，建于清同治十一年（1872年）胡雪岩事业的颠峰时期，当时豪宅工程历时3年，于1875年竣工。落成的故居是一座富有中国传统建筑特色又颇具西方建筑风格的美轮美奂的宅第，整个建筑南北长东西宽，占地面积10.8亩，建筑面积5815平方米。','./uploads/Former_Residence/img/20190526\\6a71c6847661d64b927273f711d09f32.jpg','./uploads/Former_Residence/thumb/6a71c6847661d64b927273f711d09f32.jpg','0'), ('3','于谦故居','       于谦故居位于清河坊祠堂巷42号，距离西湖仅一公里。\r\n\r\n       故居一进有井一口，一面靠墙，三面由石栏杆围住。当年于谦在这里汲水，井圈内壁绳痕还在。井边有一间十余平方米的起居室，于谦在这里起居，在井边洗漱后开始一天的晨读。主建筑“忠肃堂”，原是故居的厅堂，陈设简单，一眼望得到底，一如于谦清白的一生。“忠肃堂”门廊的一副对联：“吟石灰、赞石灰，一生清白胜石灰；重社稷、保社稷，百代罄击意社稷”。\r\n\r\n      忠肃堂后面是个小园，一池方塘，两个小亭，静穆得仿佛能听到池中的天光云影。一碑、一井、一室、一堂、一池、两小亭，一眼尽','./uploads/Former_Residence/img/20190526\\e06a9152f12e031d604f19481e992144.jpg','./uploads/Former_Residence/thumb/e06a9152f12e031d604f19481e992144.jpg','1'), ('4',NULL,'       《石灰吟》\r\n\r\n       于谦故居位于浙江省杭州市上城区清河坊祠堂巷42号。明成化二年（公元1466年），于谦案昭雪，故宅改建为怜忠祠，以资纪念。现故居已照原貌修缮一新，陈列于谦生平事迹，尚留旗杆石、造像碑等遗物。故居免费向公众开放。','./uploads/Former_Residence/img/20190526\\fc1e2a158100eb1a7ff99b1fd22684cc.jpg','./uploads/Former_Residence/thumb/fc1e2a158100eb1a7ff99b1fd22684cc.jpg','0'), ('5','章太炎故居','       在举世闻名的京杭大运河的南端，余杭仓前的塘河畔，曾经诞生过一位中国近代民主主义革命家、思想家和国学大师章太炎。\r\n\r\n       章太炎故居本体建筑面积811平方米，坐北朝南，共四进一弄，由轿厅、正厅、内堂、书房、避弄等组成，为晚清时期建筑。先生在此出生成长，并度过了对其一生产生重要影响的二十二个春秋。故居前三进为历史场景的再现，展示了太炎先生青少年时期故居的风貌；第四进辟为展厅，以多种传统与现代相结合的手法展现了太炎先生波澜壮阔的一生。故居匾额由赵朴初先生题写','./uploads/Former_Residence/img/20190526\\24b665379a88dc4bf2cdc0bfd76c3d2c.jpg','./uploads/Former_Residence/thumb/24b665379a88dc4bf2cdc0bfd76c3d2c.jpg','1'), ('6',NULL,'       全国重点文物保护单位\r\n\r\n       章太炎故居，建于明末清初，属中式宅院，位于浙江省杭州市余杭仓前老街。章太炎（1869-1936）余杭人，民主革命家、思想家、国学大师，与蔡元培等合作发起光复会，主编同盟会机关报《民报》，任孙中山总统府枢密顾问等，鲁迅、黄侃等都是他的弟子。','./uploads/Former_Residence/img/20190526\\aba28f3864b8184c762acc8d8e27161e.jpg','./uploads/Former_Residence/thumb/aba28f3864b8184c762acc8d8e27161e.jpg','0'), ('7','龚自珍故居','       龚自珍(1792—1841)，浙江仁和(今杭州)人。以诗文见长，自成一家，有“龚派”之称。1839年辞官归家。\r\n\r\n      龚自珍是我国近代进步思想家、著名诗人、文学家。他博学多才，关心国家民族的前途和命运，全力支持林则徐禁烟，写过不少批判和揭露封建社会黑暗现实的政论文章。龚自珍的宅院前面是住宅，后面有花园。1831年他将这所宅院卖给广东番禺县人潘仕成，潘后赠与同乡会，遂成为番禺会馆。现为重点文物保护单位。','./uploads/Former_Residence/img/20190526\\7a65635e23e6dc2408b77c602936142b.jpg','./uploads/Former_Residence/thumb/7a65635e23e6dc2408b77c602936142b.jpg','1'), ('8',NULL,'       《己亥杂诗》\r\n\r\n       龚自珍故居：位于宣武门外上斜街50号，晚清思想家、史学家龚自珍在此住过5年，离开时将这座宅院卖给广东番禺人潘仕成，潘将其赠给番禺在京同乡会，院子被改为广东番禺会馆。','./uploads/Former_Residence/img/20190526\\7fd18f91efe87a5025689f107868b6a1.jpg','./uploads/Former_Residence/thumb/7fd18f91efe87a5025689f107868b6a1.jpg','0'), ('9','夏衍故居','       夏衍旧居是杰出的革命文艺家，我国进步电影的先驱者夏衍的出生地，其建筑风格以粉墙黛瓦，清末民初的民居特点为主，按照夏衍自传体小说《懒寻旧梦录》所描述的当时老宅格局，设置了展厅、八咏堂、卧室、蚕房、私塾等，占地面积1000平方米，建筑面积467平方米。展厅内依照早年奋斗、左翼文艺、在新闻电影戏剧战线上、在文化电影事业的领导岗位上、在社会主义新时期、夏衍电影作品系列这六个部分为主线，以电影胶片为表现形式，展出大量图片及实物，展现了一位文学巨匠、革命文艺家的成长历程和光辉一生。','./uploads/Former_Residence/img/20190526\\372157a3b089ef37ac34b11fe78fb3a0.jpg','./uploads/Former_Residence/thumb/372157a3b089ef37ac34b11fe78fb3a0.jpg','1'), ('10',NULL,'       中国进步电影的开拓者\r\n       夏衍故居建于清末民初，属中式平房，位于杭州庆春门外严家弄。著名作家夏衍曾居住于此。现为陈列室，是杭州市文物保护单位。夏衍故居被命名为杭州市爱国主义教育基地。故居原名八咏堂，为五开间七进深院落，为夏衍诞生至青少年时代的活动地，现经扩建，占地一千两百平方米，建筑面积为六百平方米，采用院落式和江南民居式样。','./uploads/Former_Residence/img/20190526\\74cf8fc48b2a78e41d63f84162a5caaf.jpg','./uploads/Former_Residence/thumb/74cf8fc48b2a78e41d63f84162a5caaf.jpg','0');
INSERT INTO `scenery` VALUES ('1','杭州','./uploads/sce/20190512\\9ebf6d7a7dc7467dd6e3f7e62aba0f82.jpg','./uploads/sce/thumb/9ebf6d7a7dc7467dd6e3f7e62aba0f82.jpg'), ('2','西湖','./uploads/sce/20190503\\51a76d11f543cd8c447ad807869ecb7e.jpg','./uploads/sce/thumb/51a76d11f543cd8c447ad807869ecb7e.jpg'), ('4','断桥','./uploads/sce/20190503\\9b2d4e3b914e4e89a21cc30ad1e63afc.jpg','./uploads/sce/thumb/9b2d4e3b914e4e89a21cc30ad1e63afc.jpg'), ('5','三潭印月','./uploads/sce/20190503\\9e8d0d73d3759203b5c2bb9bc6ceae0f.jpg','./uploads/sce/thumb/9e8d0d73d3759203b5c2bb9bc6ceae0f.jpg'), ('6','雷峰塔','./uploads/sce/20190503\\36758320e1a5be2b851cf17385337d7a.jpg','./uploads/sce/thumb/36758320e1a5be2b851cf17385337d7a.jpg');
INSERT INTO `user` VALUES ('9','admin','ed92ed18d5c8fc0e4497a9c2dbc7ed72','#lf0$jkk');
INSERT INTO `user_info` VALUES ('1','WYX','44b775a5809324f4b0df1184fe712812','jasfdjkf','1','./uploads/forum/user_pic/img/20190529\\42e04b830ca7e166158f21093e6048a8.jpg','./uploads/forum/user_pic/thumb/42e04b830ca7e166158f21093e6048a8.jpg','0','0','0','我是大帅比','964096516@qq.com'), ('3','WBL','30306dec17eeab1f1e0b07c1529474f0','!]dfs23l','1','./uploads/forum/user_pic/img/20190527\\41c721b641cb2950f2c46fd451e42381.png','./uploads/forum/user_pic/thumb/41c721b641cb2950f2c46fd451e42381.png','0','0','0','一只小可爱','964096516@qq.com'), ('4','XQQ','b0aaf2c268beffa68580e5aba4ae7688','jds@l24k','0','./uploads/forum/user_pic/default/default.jpg','./uploads/forum/user_pic/default/default.jpg','0','0','0','','964096516@qq.com'), ('5','ZY','64ea0d5ff19f42e9b144d6c825eb625a','fjdk2jkf','0','./uploads/forum/user_pic/img/20190529\\db1e356be34725a6dd84a5c9bf02bb1f.jpg','./uploads/forum/user_pic/thumb/db1e356be34725a6dd84a5c9bf02bb1f.jpg','0','0','0','嘤嘤嘤','857343624@qq.com');
