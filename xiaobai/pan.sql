# Host: 127.0.0.1  (Version: 5.5.53)
# Date: 2018-03-21 22:01:47
# Generator: MySQL-Front 5.3  (Build 4.234)

/*!40101 SET NAMES utf8 */;

#
# Structure for table "account"
#

DROP TABLE IF EXISTS `account`;
CREATE TABLE `account` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `username` text,
  `password` text,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

#
# Data for table "account"
#

/*!40000 ALTER TABLE `account` DISABLE KEYS */;
INSERT INTO `account` VALUES (0,NULL,NULL),(5,'1246009411','qq1246009411'),(6,'12345678','12345678'),(7,'12345678','12345678'),(8,'1223222','222222222'),(9,'124600941133','1233333'),(10,'12433333','1112223232');
/*!40000 ALTER TABLE `account` ENABLE KEYS */;
