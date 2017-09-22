-- MySQL dump 10.13  Distrib 5.5.24, for Win32 (x86)
--
-- Host: localhost    Database: shop32
-- ------------------------------------------------------
-- Server version	5.5.24

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `match`
--

DROP TABLE IF EXISTS `match`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `match` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `team1_id` int(11) DEFAULT NULL,
  `score1` tinyint(3) unsigned DEFAULT NULL,
  `score2` tinyint(3) unsigned DEFAULT NULL,
  `team2_id` int(11) DEFAULT NULL,
  `match_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `team1_id` (`team1_id`),
  KEY `team2_id` (`team2_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `match`
--

LOCK TABLES `match` WRITE;
/*!40000 ALTER TABLE `match` DISABLE KEYS */;
INSERT INTO `match` VALUES (1,1,1,0,2,'2013-03-03 00:00:00'),(2,1,1,2,3,'2013-03-04 00:00:00'),(3,1,3,2,4,'2013-04-04 00:00:00'),(4,2,3,1,1,'2013-04-05 00:00:00'),(8,3,0,2,2,'2013-06-07 00:00:00'),(9,3,2,1,4,'2013-07-07 00:00:00'),(10,4,1,0,1,'2013-07-08 00:00:00'),(11,4,1,2,2,'2013-08-08 00:00:00'),(12,4,2,2,3,'2013-08-09 00:00:00');
/*!40000 ALTER TABLE `match` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `player`
--

DROP TABLE IF EXISTS `player`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `player` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `player` varchar(20) DEFAULT NULL COMMENT '队员名',
  `age` tinyint(3) unsigned DEFAULT NULL,
  `team_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `team_id` (`team_id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `player`
--

LOCK TABLES `player` WRITE;
/*!40000 ALTER TABLE `player` DISABLE KEYS */;
INSERT INTO `player` VALUES (1,'安国华',18,1),(2,'安国民',19,1),(3,'安国平',20,1),(4,'安国清',21,1),(5,'安国瑞',22,1),(6,'安国泰',22,1),(7,'华申伟',20,2),(8,'华申国',21,2),(9,'华申道',22,2),(10,'华申淘',23,2),(11,'华申凯',24,2),(12,'达泰康',21,3),(13,'达泰建',22,3),(14,'达泰唐',23,3),(15,'鲁大能',22,4),(16,'鲁小能',23,4),(17,'鲁忠能',23,4),(18,'鲁华能',23,4),(19,'鲁慧能',24,4);
/*!40000 ALTER TABLE `player` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shop32_admin`
--

DROP TABLE IF EXISTS `shop32_admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shop32_admin` (
  `admin_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'PK主键',
  `admin_name` varchar(24) NOT NULL DEFAULT '' COMMENT '管理员姓名',
  `admin_pass` char(32) NOT NULL DEFAULT '' COMMENT '管理员密码, MD5加密存储',
  `admin_email` varchar(255) NOT NULL DEFAULT '' COMMENT '管理员邮箱',
  `login_time` timestamp NOT NULL DEFAULT '2014-11-11 03:11:11' COMMENT '登录时间',
  `login_ip` int(10) unsigned NOT NULL DEFAULT '2130706433' COMMENT '登录IP，inet_aton, inet_ntoa',
  `role_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '角色ID',
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shop32_admin`
--

LOCK TABLES `shop32_admin` WRITE;
/*!40000 ALTER TABLE `shop32_admin` DISABLE KEYS */;
INSERT INTO `shop32_admin` VALUES (23,'admin','202cb962ac59075b964b07152d234b70','admin@kang.com','2014-12-26 02:10:34',3232240447,0),(42,'kang','202cb962ac59075b964b07152d234b70','kang@kang.com','2014-12-26 02:10:34',2130706433,0),(45,'php32','202cb962ac59075b964b07152d234b70','php32@kang.com','2014-12-26 02:10:34',3232240447,0);
/*!40000 ALTER TABLE `shop32_admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tab1`
--

DROP TABLE IF EXISTS `tab1`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tab1` (
  `id1` int(11) NOT NULL AUTO_INCREMENT,
  `id2` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id1`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tab1`
--

LOCK TABLES `tab1` WRITE;
/*!40000 ALTER TABLE `tab1` DISABLE KEYS */;
INSERT INTO `tab1` VALUES (2,'abc2'),(3,'abc3'),(4,'abc4'),(5,'abc4'),(6,'abc6'),(7,'abc6'),(8,'abc6'),(9,'abc6'),(10,'abc6'),(11,'abc6'),(12,'abc6'),(13,'abc6'),(14,'abc6'),(20,'abc20'),(21,'abc6'),(22,'abc6'),(23,'abc6'),(24,'abc6'),(25,'abc6'),(26,'abc6'),(27,'abc6'),(28,'abc6'),(29,'abc6'),(30,'abc6'),(31,'abc6'),(32,'abc6'),(33,'abc6'),(34,'abc6'),(35,'abc6'),(36,'abc6'),(37,'abc6'),(38,'abc6'),(39,'abc6'),(40,'abc6'),(41,'abc6'),(42,'abc6'),(43,'abc6'),(44,'abc6'),(45,'abc6'),(46,'abc6');
/*!40000 ALTER TABLE `tab1` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `team`
--

DROP TABLE IF EXISTS `team`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `team` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) DEFAULT NULL COMMENT '队名',
  `chenglishijian` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `team`
--

LOCK TABLES `team` WRITE;
/*!40000 ALTER TABLE `team` DISABLE KEYS */;
INSERT INTO `team` VALUES (1,'北京国安队','1981-01-01 01:01:01'),(2,'上海申花队','1982-02-02 02:02:02'),(3,'天津泰达队','1983-03-03 03:03:03'),(4,'山东鲁能队','1984-04-04 04:04:04');
/*!40000 ALTER TABLE `team` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-01-06 20:22:32
