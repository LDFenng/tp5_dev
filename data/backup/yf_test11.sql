DROP TABLE IF EXISTS <--db-prefix-->test11;
CREATE TABLE `<--db-prefix-->test11` (
  `id11` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `132123424` varchar(100) NOT NULL DEFAULT '未填写' COMMENT '前台栏目',
  `id` varchar(200) DEFAULT '1' COMMENT 'ID',
  `sort` int(11) DEFAULT '50' COMMENT '排序',
  PRIMARY KEY (`id11`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;