CREATE TABLE `sp_user`(
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(40) NOT NULL, 
  `password` CHAR(32) NOT NULL,
  `nickname` VARCHAR(40) DEFAULT NULL,
  `truename` VARCHAR(40) DEFAULT NULL,
  `dapt_id` INT(11) DEFAULT NULL,
  `sex` VARCHAR(10) NOT NULL,
  `birthday` date NOT NULL,
  `tel` VARCHAR(11) NOT NULL,
  `email` VARCHAR(50) NOT NULL,
  `emark` VARCHAR(255) DEFAULT NULL,
  `addtime` INT(11) DEFAULT NULL,
  `rol_id` INT(11) DEFAULT NULL,
  PRIMARY KEY('id')
)ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `sp_user` VALUES ('1','admin','123456','admin','管理员','1','男','2017-12-28','138000000001','123@qq.com','北京','1464269883',null);
INSERT INTO `sp_user` VALUES ('2','gg','123456','gg','奥斯丁','5','男','2016-02-28','138000000121','123@qq.com','上海','1470000003',null);
INSERT INTO `sp_user` VALUES ('3','test','123456','test','测试员','6','女','2015-02-28','138000340121','gg3@qq.com','深圳','1463400003','3');