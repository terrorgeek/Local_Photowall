-- MySQL dump 10.13  Distrib 5.5.19, for Win64 (x86)
--
-- Host: localhost    Database: new_photowall
-- ------------------------------------------------------
-- Server version	5.5.19

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
-- Table structure for table `album`
--

DROP TABLE IF EXISTS `album`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `album` (
  `album_id` int(11) NOT NULL AUTO_INCREMENT,
  `album_name` varchar(45) DEFAULT NULL,
  `album_frontcover` varchar(145) DEFAULT '../Project_Images/album_cover/album_default_cover.png' COMMENT '存取图片路径',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `is_encrypt` varchar(5) DEFAULT 'no' COMMENT '是否公开',
  `user_id` int(11) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  `reading_authority` varchar(45) NOT NULL COMMENT '所有人可见:albumPrivacy-everyone, 贴友可见:albumPrivacy-friend, 关注可见:albumPrivacy-follow, 粉丝可见: albumPrivacy-fans, 只自己可见:albumPrivacy-self',
  PRIMARY KEY (`album_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `album`
--

LOCK TABLES `album` WRITE;
/*!40000 ALTER TABLE `album` DISABLE KEYS */;
INSERT INTO `album` VALUES (1,'宋宇是什么','','2013-06-03 03:06:55','2013-06-03 03:06:55','no',18,'','宋宇的成长过程','albumPrivacy-friend'),(2,'变形金刚','','2013-06-07 01:06:55','2013-06-07 01:06:55','no',18,'','more than meets the eyes!','albumPrivacy-friend'),(3,'勇野战队','','2013-06-11 04:06:57','2013-06-11 04:06:57','no',18,'','黄种人的骄傲','albumPrivacy-everyone'),(4,'高任卢','','2013-06-11 04:06:31','2013-06-11 04:06:31','no',18,'','上海人','albumPrivacy-friend'),(5,'dulala的相册','','2013-06-11 07:06:26','2013-06-11 07:06:26','no',19,'','shit!','albumPrivacy-everyone'),(6,'阿翀的相册','','2013-07-06 09:07:18','2013-07-06 09:07:18','no',25,'','方大随风倒三分法','albumPrivacy-everyone'),(7,'我是谁的第一个相册','','2013-07-06 09:07:10','2013-07-06 09:07:10','no',23,'','safsdfs','albumPrivacy-everyone'),(8,'晓光的相册','','2013-07-06 10:07:50','2013-07-06 10:07:50','no',24,'','','albumPrivacy-everyone'),(9,'毒辣辣','','2013-07-07 07:07:59','2013-07-07 07:07:59','no',19,'','粉第三代','albumPrivacy-follow'),(11,'asfdsfsd','','2013-07-07 08:07:39','2013-07-07 08:07:39','no',19,'','','albumPrivacy-everyone'),(12,'娥额外','','2013-07-11 01:07:06','2013-07-11 01:07:06','no',18,'','','albumPrivacy-everyone');
/*!40000 ALTER TABLE `album` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `concern`
--

DROP TABLE IF EXISTS `concern`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `concern` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id， 目前无实际意义\\n',
  `follower_id` int(11) NOT NULL COMMENT '关注者',
  `goal_id` int(11) NOT NULL COMMENT '被关注者',
  `is_disposed` varchar(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COMMENT='\n';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `concern`
--

LOCK TABLES `concern` WRITE;
/*!40000 ALTER TABLE `concern` DISABLE KEYS */;
INSERT INTO `concern` VALUES (3,18,23,'no'),(5,25,24,'no'),(6,24,18,'no'),(7,23,25,'no'),(9,19,21,'no');
/*!40000 ALTER TABLE `concern` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `friends`
--

DROP TABLE IF EXISTS `friends`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `friends` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `reviewer_id` int(11) NOT NULL COMMENT '审核者id',
  `applicant_id` int(11) NOT NULL COMMENT '申请好友(加关注的人)',
  `is_disposed` varchar(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8 COMMENT='贴友专弄一个表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `friends`
--

LOCK TABLES `friends` WRITE;
/*!40000 ALTER TABLE `friends` DISABLE KEYS */;
INSERT INTO `friends` VALUES (2,20,21,'no'),(3,20,22,'no'),(4,18,22,'no'),(5,20,18,'no'),(8,26,18,'no'),(9,31,19,'no'),(10,32,19,'no'),(11,30,19,'no'),(34,19,18,'no');
/*!40000 ALTER TABLE `friends` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `friends_movement`
--

DROP TABLE IF EXISTS `friends_movement`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `friends_movement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `marker_user_id` int(11) DEFAULT NULL,
  `marker_nick_name` varchar(45) DEFAULT NULL,
  `marker_login_name` varchar(45) DEFAULT NULL,
  `be_marked_user_id` varchar(45) DEFAULT NULL COMMENT '同marked_photo里的be_marked_user_id',
  `photo_path` varchar(5245) DEFAULT NULL COMMENT '这里和photowall_movement里的one_of_photo_path是类似的',
  `date` datetime DEFAULT NULL,
  `photo_uploaded_amount` int(11) DEFAULT NULL,
  `all_photo_id` varchar(45) DEFAULT NULL COMMENT '存所有被圈照片的photo_id, 以豆号隔开 比如:23,34,21',
  `show_to_fans` varchar(45) DEFAULT NULL,
  `marked_description` varchar(245) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8 COMMENT='存储贴友墙动态的新鲜事';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `friends_movement`
--

LOCK TABLES `friends_movement` WRITE;
/*!40000 ALTER TABLE `friends_movement` DISABLE KEYS */;
INSERT INTO `friends_movement` VALUES (26,18,'songyu','songyu','19,26','18_705950001373686124_event2.jpg|18_707379001373686124_event4.jpg|18_709009001373686124_20090121032512631273.jpg|18_710637001373686124_3965390_133005734467_2.png','2013-07-13 03:07:53',4,'78,79,80,81','no','dfsgsafsdgfdsafsdfrasafef'),(27,19,'dulala','dulala','18,31','19_946804001373686244_jisuxz_pokemon-card09.jpg|19_948013001373686244_2729d62af1ffef67d52af1a6.jpg|19_949390001373686244_20090121032951997871.jpg|19_950676001373686244_20090121033105592899.jpg','2013-07-13 03:07:01',4,'82,83,84,85','yes','sdgdsffsafsdafsd'),(28,18,'songyu','songyu','19','18_254272001373894695_event4.jpg|18_255614001373894695_ab9e6eb5988ea1f7b4be838c19d9bc85.jpg|18_256941001373894695_pein.jpg','2013-07-15 01:07:05',3,'86,87,88','no','wfwfw'),(29,19,'nichengdulala','dulala','18','19_952035001374203499_1252414536051_000.jpg','2013-07-19 03:07:44',1,'89','no',''),(30,18,'songyu','songyu','19','18_938976001374204908_609c4f5d15c57369b1351d8d.jpg|18_726536001374204918_2457387_093735835000_2.jpg|18_728538001374204918_2457387_130824625000_2.jpg','2013-07-19 03:07:29',3,'90,91,92','no',''),(31,18,'songyu','songyu','19','18_365275001374206295_10149900_095859183114_2.jpg','2013-07-19 03:07:19',1,'93','no',''),(32,18,'songyu','songyu','22','18_806685001374327779_2729d62af1ffef67d52af1a6.jpg|18_267794001374327785_10149900_095859183114_2.jpg|18_236901001374327794_1252414536051_000.jpg','2013-07-20 01:07:19',3,'94,95,96','no','wocao'),(33,18,'songyu','songyu','26','18_624818001374329026_264391_155841237147_2.jpg|18_626125001374329026_393778.jpg|18_627877001374329026_1642933_124009892000_2.jpg','2013-07-20 02:07:59',3,'97,98,99','no','wocao, haha!');
/*!40000 ALTER TABLE `friends_movement` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `marked_photo`
--

DROP TABLE IF EXISTS `marked_photo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `marked_photo` (
  `marked_photo_id` int(11) NOT NULL AUTO_INCREMENT,
  `marker_user_id` varchar(45) NOT NULL COMMENT 'person who mark someone',
  `marker_username` varchar(45) DEFAULT NULL COMMENT 'marker\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\''s username, the same as in user table',
  `be_marked_user_id` varchar(45) NOT NULL COMMENT 'person who is marked by someone else',
  `be_marked_nickname` varchar(45) DEFAULT NULL,
  `photo_path` varchar(245) NOT NULL COMMENT 'photo\\\\\\''s path in server',
  `group_hobby` varchar(45) DEFAULT NULL,
  `show_to_fans` varchar(45) DEFAULT NULL COMMENT '这个列只有yes  和 no两个值',
  `date` datetime DEFAULT NULL,
  `marked_description` varchar(245) DEFAULT NULL,
  `photo_original_name` varchar(245) DEFAULT NULL COMMENT '这个和photos表的那列是一样的',
  `description_for_all` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`marked_photo_id`)
) ENGINE=InnoDB AUTO_INCREMENT=100 DEFAULT CHARSET=utf8 COMMENT='this  table is to specially store the photos that used to mark people!';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `marked_photo`
--

LOCK TABLES `marked_photo` WRITE;
/*!40000 ALTER TABLE `marked_photo` DISABLE KEYS */;
INSERT INTO `marked_photo` VALUES (78,'18','songyu','19,26','dulala,大刚','18_705950001373686124_event2.jpg','food','no','2013-07-13 03:07:51','sdfd','event2.jpg',NULL),(79,'18','songyu','19,26','dulala,大刚','18_707379001373686124_event4.jpg','food','no','2013-07-13 03:07:52','fdsgs','event4.jpg',NULL),(80,'18','songyu','19,26','dulala,大刚','18_709009001373686124_20090121032512631273.jpg','food','no','2013-07-13 03:07:52','gdfgdf','20090121032512631273.jpg',NULL),(81,'18','songyu','19,26','dulala,大刚','18_710637001373686124_3965390_133005734467_2.png','food','no','2013-07-13 03:07:53','gdfgsd','3965390_133005734467_2.png',NULL),(82,'19','dulala','18,31','songyu,杨熙','19_946804001373686244_jisuxz_pokemon-card09.jpg','food','yes','2013-07-13 03:07:57','dfgdfgd','jisuxz_pokemon-card09.jpg',NULL),(83,'19','dulala','18,31','songyu,杨熙','19_948013001373686244_2729d62af1ffef67d52af1a6.jpg','food','yes','2013-07-13 03:07:58','sfsgsg','2729d62af1ffef67d52af1a6.jpg',NULL),(84,'19','dulala','18,31','songyu,杨熙','19_949390001373686244_20090121032951997871.jpg','food','yes','2013-07-13 03:07:59',' dfgdfg','20090121032951997871.jpg',NULL),(85,'19','dulala','18,31','songyu,杨熙','19_950676001373686244_20090121033105592899.jpg','food','yes','2013-07-13 03:07:00','dfgdfgdfg','20090121033105592899.jpg',NULL),(86,'18','songyu','19','dulala','18_254272001373894695_event4.jpg','food','no','2013-07-15 01:07:03','dff','event4.jpg',NULL),(87,'18','songyu','19','dulala','18_255614001373894695_ab9e6eb5988ea1f7b4be838c19d9bc85.jpg','food','no','2013-07-15 01:07:04','wrgrege','ab9e6eb5988ea1f7b4be838c19d9bc85.jpg',NULL),(88,'18','songyu','19','dulala','18_256941001373894695_pein.jpg','food','no','2013-07-15 01:07:04','ge','pein.jpg',NULL),(89,'19','nichengdulala','18','songyu','19_952035001374203499_1252414536051_000.jpg','food','no','2013-07-19 03:07:43','','1252414536051_000.jpg',NULL),(90,'18','songyu','19','nichengdulala','18_938976001374204908_609c4f5d15c57369b1351d8d.jpg','food','no','2013-07-19 03:07:27','','609c4f5d15c57369b1351d8d.jpg',NULL),(91,'18','songyu','19','nichengdulala','18_726536001374204918_2457387_093735835000_2.jpg','food','no','2013-07-19 03:07:27','','2457387_093735835000_2.jpg',NULL),(92,'18','songyu','19','nichengdulala','18_728538001374204918_2457387_130824625000_2.jpg','food','no','2013-07-19 03:07:28','','2457387_130824625000_2.jpg',NULL),(93,'18','songyu','19','nichengdulala','18_365275001374206295_10149900_095859183114_2.jpg','food','no','2013-07-19 03:07:19','','10149900_095859183114_2.jpg',NULL),(94,'18','songyu','22','WangErXiao','18_806685001374327779_2729d62af1ffef67d52af1a6.jpg','food','no','2013-07-20 01:07:17','','2729d62af1ffef67d52af1a6.jpg',NULL),(95,'18','songyu','22','WangErXiao','18_267794001374327785_10149900_095859183114_2.jpg','food','no','2013-07-20 01:07:18','','10149900_095859183114_2.jpg',NULL),(96,'18','songyu','22','WangErXiao','18_236901001374327794_1252414536051_000.jpg','food','no','2013-07-20 01:07:19','','1252414536051_000.jpg',NULL),(97,'18','songyu','26','大刚','18_624818001374329026_264391_155841237147_2.jpg','food','no','2013-07-20 02:07:57','','264391_155841237147_2.jpg','wocao, haha!'),(98,'18','songyu','26','大刚','18_626125001374329026_393778.jpg','food','no','2013-07-20 02:07:58','','393778.jpg','wocao, haha!'),(99,'18','songyu','26','大刚','18_627877001374329026_1642933_124009892000_2.jpg','food','no','2013-07-20 02:07:58','','1642933_124009892000_2.jpg','wocao, haha!');
/*!40000 ALTER TABLE `marked_photo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `marked_photo_comment`
--

DROP TABLE IF EXISTS `marked_photo_comment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `marked_photo_comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` varchar(500) DEFAULT NULL,
  `sender_id` int(11) DEFAULT NULL,
  `marked_photo_id` int(11) DEFAULT NULL,
  `sender_name` varchar(45) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `sender_head_photo` varchar(245) DEFAULT NULL,
  `receiver_username` varchar(45) DEFAULT NULL,
  `receiver_user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COMMENT='转门存贴人的照片的评论';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `marked_photo_comment`
--

LOCK TABLES `marked_photo_comment` WRITE;
/*!40000 ALTER TABLE `marked_photo_comment` DISABLE KEYS */;
INSERT INTO `marked_photo_comment` VALUES (15,'哈哈, 北京!',19,78,'dulala','2013-07-13 03:07:51','../Project_Images/head_photo/19_2012-09-29 11.42.10.jpg','songyu',18),(16,'我大帝都!',19,79,'dulala','2013-07-13 03:07:03','../Project_Images/head_photo/19_2012-09-29 11.42.10.jpg','songyu',18),(17,'sdfsdfs',18,89,'songyu','2013-07-19 03:07:08','../Project_Images/head_photo/18_original_ta1F_0c9e0000723a1191.jpg','nichengdulala',19),(18,'gfhdfhd',18,89,'songyu','2013-07-19 03:07:13','../Project_Images/head_photo/18_original_ta1F_0c9e0000723a1191.jpg','nichengdulala',19),(19,'评论自己!',18,93,'songyu','2013-07-19 03:07:41','../Project_Images/head_photo/18_original_ta1F_0c9e0000723a1191.jpg','songyu',18);
/*!40000 ALTER TABLE `marked_photo_comment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `normal_photo_comment`
--

DROP TABLE IF EXISTS `normal_photo_comment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `normal_photo_comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` varchar(500) NOT NULL,
  `sender_id` varchar(15) NOT NULL COMMENT '就是发回复的user_id',
  `photo_id` int(11) NOT NULL,
  `sender_name` varchar(45) NOT NULL,
  `date` datetime DEFAULT NULL,
  `sender_head_photo` varchar(245) DEFAULT NULL COMMENT '发起评论的人的头像',
  `receiver_username` varchar(45) DEFAULT NULL,
  `receiver_user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='专门存普通照片的评论';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `normal_photo_comment`
--

LOCK TABLES `normal_photo_comment` WRITE;
/*!40000 ALTER TABLE `normal_photo_comment` DISABLE KEYS */;
/*!40000 ALTER TABLE `normal_photo_comment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `photos`
--

DROP TABLE IF EXISTS `photos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `photos` (
  `photo_id` int(11) NOT NULL AUTO_INCREMENT,
  `photo_name` varchar(245) DEFAULT NULL COMMENT 'photo\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\''s name, can also be called photo\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\''s file name, generally, it\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\''s the same as the file name that users uploaded',
  `photo_description` varchar(245) DEFAULT NULL,
  `photo_path` varchar(245) NOT NULL COMMENT '存取图片路径',
  `album_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `photo_big_thumbnail` varchar(245) DEFAULT NULL,
  `photo_small_thumbnail` varchar(245) DEFAULT NULL,
  `photo_original_name` varchar(245) DEFAULT NULL COMMENT '存用户上传时的照片的原名， 这个是可以重的',
  `uploader_username` varchar(45) DEFAULT NULL COMMENT '上传者的nick_name',
  `uploader_user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`photo_id`)
) ENGINE=InnoDB AUTO_INCREMENT=141 DEFAULT CHARSET=utf8 COMMENT='to store all user''s pictures that they uploaded';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `photos`
--

LOCK TABLES `photos` WRITE;
/*!40000 ALTER TABLE `photos` DISABLE KEYS */;
INSERT INTO `photos` VALUES (124,'18_517276001373686095_01300001310128131053780591655.jpg','fsdsdfdsf','../Project_Images/photos/18_517276001373686095_01300001310128131053780591655.jpg',2,'2013-07-13 03:07:21','../Project_Images/photo_big_thumbnail/18_517276001373686095_01300001310128131053780591655.jpg','../Project_Images/photo_small_thumbnail/18_517276001373686095_01300001310128131053780591655.jpg','01300001310128131053780591655.jpg','songyu',18),(125,'18_552021001373686095_81VqMdIoLuL._SX385_.jpg','dss','../Project_Images/photos/18_552021001373686095_81VqMdIoLuL._SX385_.jpg',2,'2013-07-13 03:07:21','../Project_Images/photo_big_thumbnail/18_552021001373686095_81VqMdIoLuL._SX385_.jpg','../Project_Images/photo_small_thumbnail/18_552021001373686095_81VqMdIoLuL._SX385_.jpg','81VqMdIoLuL._SX385_.jpg','songyu',18),(126,'18_553294001373686095_pythonlogo_thumb2_thumb.png','sdfds','../Project_Images/photos/18_553294001373686095_pythonlogo_thumb2_thumb.png',2,'2013-07-13 03:07:21','../Project_Images/photo_big_thumbnail/18_553294001373686095_pythonlogo_thumb2_thumb.png','../Project_Images/photo_small_thumbnail/18_553294001373686095_pythonlogo_thumb2_thumb.png','pythonlogo_thumb2_thumb.png','songyu',18),(127,'18_554965001373686095_264391_155841237147_2.jpg','gsdgsd','../Project_Images/photos/18_554965001373686095_264391_155841237147_2.jpg',2,'2013-07-13 03:07:21','../Project_Images/photo_big_thumbnail/18_554965001373686095_264391_155841237147_2.jpg','../Project_Images/photo_small_thumbnail/18_554965001373686095_264391_155841237147_2.jpg','264391_155841237147_2.jpg','songyu',18),(128,'18_536404001373686150_1642933_124009892000_2.jpg','','../Project_Images/photos/18_536404001373686150_1642933_124009892000_2.jpg',3,'2013-07-13 03:07:14','../Project_Images/photo_big_thumbnail/18_536404001373686150_1642933_124009892000_2.jpg','../Project_Images/photo_small_thumbnail/18_536404001373686150_1642933_124009892000_2.jpg','1642933_124009892000_2.jpg','songyu',18),(129,'18_537682001373686150_ccc.ccc.jpg','','../Project_Images/photos/18_537682001373686150_ccc.ccc.jpg',3,'2013-07-13 03:07:14','../Project_Images/photo_big_thumbnail/18_537682001373686150_ccc.ccc.jpg','../Project_Images/photo_small_thumbnail/18_537682001373686150_ccc.ccc.jpg','ccc.ccc.jpg','songyu',18),(130,'18_539226001373686150_20080514124625578.jpg','','../Project_Images/photos/18_539226001373686150_20080514124625578.jpg',3,'2013-07-13 03:07:14','../Project_Images/photo_big_thumbnail/18_539226001373686150_20080514124625578.jpg','../Project_Images/photo_small_thumbnail/18_539226001373686150_20080514124625578.jpg','20080514124625578.jpg','songyu',18),(131,'18_424484001373686169_EP2313.jpg','','../Project_Images/photos/18_424484001373686169_EP2313.jpg',12,'2013-07-13 03:07:31','../Project_Images/photo_big_thumbnail/18_424484001373686169_EP2313.jpg','../Project_Images/photo_small_thumbnail/18_424484001373686169_EP2313.jpg','EP2313.jpg','songyu',18),(132,'18_425707001373686169_20090121032512631273.jpg','','../Project_Images/photos/18_425707001373686169_20090121032512631273.jpg',12,'2013-07-13 03:07:31','../Project_Images/photo_big_thumbnail/18_425707001373686169_20090121032512631273.jpg','../Project_Images/photo_small_thumbnail/18_425707001373686169_20090121032512631273.jpg','20090121032512631273.jpg','songyu',18),(133,'18_426917001373686169_854558029294376872.jpg','','../Project_Images/photos/18_426917001373686169_854558029294376872.jpg',12,'2013-07-13 03:07:31','../Project_Images/photo_big_thumbnail/18_426917001373686169_854558029294376872.jpg','../Project_Images/photo_small_thumbnail/18_426917001373686169_854558029294376872.jpg','854558029294376872.jpg','songyu',18),(134,'18_428185001373686169_1_20110219133948-1260378853.jpg','','../Project_Images/photos/18_428185001373686169_1_20110219133948-1260378853.jpg',12,'2013-07-13 03:07:31','../Project_Images/photo_big_thumbnail/18_428185001373686169_1_20110219133948-1260378853.jpg','../Project_Images/photo_small_thumbnail/18_428185001373686169_1_20110219133948-1260378853.jpg','1_20110219133948-1260378853.jpg','songyu',18),(135,'19_206562001373686223_20090121033105592899.jpg','','../Project_Images/photos/19_206562001373686223_20090121033105592899.jpg',9,'2013-07-13 03:07:26','../Project_Images/photo_big_thumbnail/19_206562001373686223_20090121033105592899.jpg','../Project_Images/photo_small_thumbnail/19_206562001373686223_20090121033105592899.jpg','20090121033105592899.jpg','dulala',19),(136,'19_207943001373686223_393778.jpg','','../Project_Images/photos/19_207943001373686223_393778.jpg',9,'2013-07-13 03:07:26','../Project_Images/photo_big_thumbnail/19_207943001373686223_393778.jpg','../Project_Images/photo_small_thumbnail/19_207943001373686223_393778.jpg','393778.jpg','dulala',19),(137,'19_209224001373686223_19562429_1290326650_271.jpg','','../Project_Images/photos/19_209224001373686223_19562429_1290326650_271.jpg',9,'2013-07-13 03:07:26','../Project_Images/photo_big_thumbnail/19_209224001373686223_19562429_1290326650_271.jpg','../Project_Images/photo_small_thumbnail/19_209224001373686223_19562429_1290326650_271.jpg','19562429_1290326650_271.jpg','dulala',19),(138,'18_394960001373894646_2457387_093735835000_2.jpg','frtertre','../Project_Images/photos/18_394960001373894646_2457387_093735835000_2.jpg',3,'2013-07-15 01:07:25','../Project_Images/photo_big_thumbnail/18_394960001373894646_2457387_093735835000_2.jpg','../Project_Images/photo_small_thumbnail/18_394960001373894646_2457387_093735835000_2.jpg','2457387_093735835000_2.jpg','songyu',18),(139,'18_435181001373894646_2729d62af1ffef67d52af1a6.jpg','egerer','../Project_Images/photos/18_435181001373894646_2729d62af1ffef67d52af1a6.jpg',3,'2013-07-15 01:07:25','../Project_Images/photo_big_thumbnail/18_435181001373894646_2729d62af1ffef67d52af1a6.jpg','../Project_Images/photo_small_thumbnail/18_435181001373894646_2729d62af1ffef67d52af1a6.jpg','2729d62af1ffef67d52af1a6.jpg','songyu',18),(140,'18_436496001373894646_20090121033105592899.jpg','trteter','../Project_Images/photos/18_436496001373894646_20090121033105592899.jpg',3,'2013-07-15 01:07:25','../Project_Images/photo_big_thumbnail/18_436496001373894646_20090121033105592899.jpg','../Project_Images/photo_small_thumbnail/18_436496001373894646_20090121033105592899.jpg','20090121033105592899.jpg','songyu',18);
/*!40000 ALTER TABLE `photos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `photowall_movement`
--

DROP TABLE IF EXISTS `photowall_movement`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `photowall_movement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` datetime DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL COMMENT '谁引起的这件新鲜事的id',
  `album_id` int(11) DEFAULT NULL COMMENT '哪个相册被更新了',
  `photo_uploaded_amount` int(11) DEFAULT NULL COMMENT '本次上传照片的数量',
  `one_of_photo_path` varchar(5024) DEFAULT NULL COMMENT '这里改成存所有照片的名字',
  `nick_name` varchar(45) DEFAULT NULL COMMENT '谁引起的这件新鲜事的nick_name',
  `all_photo_id` varchar(245) DEFAULT NULL COMMENT '存所有被圈照片的photo_id, 以豆号隔开 比如:23,34,21, 和friends_movement的all_photo_id是一样的',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8 COMMENT='专门存储照片墙动态的表，每一条记录(提醒)是已相册为单位的';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `photowall_movement`
--

LOCK TABLES `photowall_movement` WRITE;
/*!40000 ALTER TABLE `photowall_movement` DISABLE KEYS */;
INSERT INTO `photowall_movement` VALUES (40,'2013-07-13 03:07:24',18,2,4,'18_517276001373686095_01300001310128131053780591655.jpg|18_552021001373686095_81VqMdIoLuL._SX385_.jpg|18_553294001373686095_pythonlogo_thumb2_thumb.png|18_554965001373686095_264391_155841237147_2.jpg','songyu','124,125,126,127'),(41,'2013-07-13 03:07:16',18,3,3,'18_536404001373686150_1642933_124009892000_2.jpg|18_537682001373686150_ccc.ccc.jpg|18_539226001373686150_20080514124625578.jpg','songyu','128,129,130'),(42,'2013-07-13 03:07:32',18,12,4,'18_424484001373686169_EP2313.jpg|18_425707001373686169_20090121032512631273.jpg|18_426917001373686169_854558029294376872.jpg|18_428185001373686169_1_20110219133948-1260378853.jpg','songyu','131,132,133,134'),(43,'2013-07-13 03:07:27',19,9,3,'19_206562001373686223_20090121033105592899.jpg|19_207943001373686223_393778.jpg|19_209224001373686223_19562429_1290326650_271.jpg','dulala','135,136,137'),(44,'2013-07-15 01:07:27',18,3,3,'18_394960001373894646_2457387_093735835000_2.jpg|18_435181001373894646_2729d62af1ffef67d52af1a6.jpg|18_436496001373894646_20090121033105592899.jpg','songyu','138,139,140');
/*!40000 ALTER TABLE `photowall_movement` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `remember_user`
--

DROP TABLE IF EXISTS `remember_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `remember_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `login_name` varchar(45) NOT NULL,
  `nick_name` varchar(45) NOT NULL,
  `remember_date` datetime NOT NULL,
  `remember_for_days` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `remember_user`
--

LOCK TABLES `remember_user` WRITE;
/*!40000 ALTER TABLE `remember_user` DISABLE KEYS */;
INSERT INTO `remember_user` VALUES (1,'songyu','songyu','2013-05-24 08:05:46',7,18),(2,'songyu','songyu','2013-05-24 09:05:47',7,18),(3,'songyu','songyu','2013-05-24 09:05:47',7,18);
/*!40000 ALTER TABLE `remember_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `login_name` varchar(45) NOT NULL,
  `real_name` varchar(45) DEFAULT NULL,
  `password` varchar(45) NOT NULL,
  `email` varchar(45) DEFAULT NULL,
  `recommended_by` varchar(45) DEFAULT NULL,
  `nick_name` varchar(45) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `province` varchar(15) NOT NULL,
  `city` varchar(15) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `birthday` datetime DEFAULT NULL,
  `blood_type` varchar(5) DEFAULT NULL,
  `profile` varchar(145) DEFAULT NULL,
  `QQ` varchar(15) DEFAULT NULL,
  `MSN` varchar(45) DEFAULT NULL,
  `introduction` varchar(145) DEFAULT NULL,
  `head_photo` varchar(245) DEFAULT NULL,
  `head_photo_big_thumbnail` varchar(245) DEFAULT NULL,
  `head_photo_small_thumbnail` varchar(245) DEFAULT NULL,
  `chinese_pinyin` varchar(45) DEFAULT NULL COMMENT '如果有汉字， 则存拼音，即这一列只存英文字母(拼音)',
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_id` (`user_id`),
  UNIQUE KEY `login_name` (`login_name`(10))
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (18,'songyu','songyu','4297f44b13955235245b2497399d7a93','asds@12.com','','songyu','aomen','fds','male','1988-01-01 00:00:00','ab','','234235','','对自己简短的介绍','original_ta1F_0c9e0000723a1191.jpg','original_ta1F_0c9e0000723a1191.jpg','original_ta1F_0c9e0000723a1191.jpg','songyu'),(19,'dulala','nichengdulala','4297f44b13955235245b2497399d7a93','wdsfd@123.com','','nichengdulala','shanghai','ds','male','1988-01-01 00:00:00','','','345253453','sdfsgfd','对自己简短的介绍','2012-09-29 11.42.10.jpg','2012-09-29 11.42.10.jpg','2012-09-29 11.42.10.jpg','nichengdulala'),(20,'谢飞','谢飞','4297f44b13955235245b2497399d7a93','sjdkls@128.com','谢飞','谢飞','beijing','谢飞','male','2011-01-01 00:00:00','ab','卢萨卡解放军大四','3252','232322','对自己简短的介绍','20090121032512631273.jpg','20090121032512631273.jpg','20090121032512631273.jpg','xiefei'),(21,'王建华','王建华','4297f44b13955235245b2497399d7a93','bjslxxx@126.com','dfsdfds','王建华','shanghai','王建华','male','2011-01-01 00:00:00','ab','http://www.baidu.com','24143','2131241412','对自己简短的介绍','EP2313.jpg','EP2313.jpg','EP2313.jpg','wangjianhua'),(22,'wangErxiao','wangErxiao','4297f44b13955235245b2497399d7a93','bjslxxx@126.com','fdgd','WangErXiao','anhui','wocao','female','2011-01-01 00:00:00','o','http://www.baidu.com','24143','gdfgdfg','对自己简短的介绍','3965390_133005734467_2.png',NULL,NULL,'WangErXiao'),(23,'我是谁','我是谁','4297f44b13955235245b2497399d7a93','bjslxxx@126.com','123123','我是谁','aomen','我是谁','female','2011-01-01 00:00:00','b','http://www.baidu.com','1241412','2131241412','对自己简短的介绍','pein.jpg','pein.jpg','pein.jpg','woshishui'),(24,'牛晓光','牛晓光','4297f44b13955235245b2497399d7a93','bjslxxx@126.com','dfsdfds','牛晓光','guangxi','牛晓光','male','2011-01-01 00:00:00','o','http://www.baidu.com','24143','2131241412','对自己简短的介绍','2729d62af1ffef67d52af1a6.jpg',NULL,NULL,'niuxiaoguang'),(25,'韩寅翀','韩寅翀','4297f44b13955235245b2497399d7a93','hanyinchong@gwu.edu','142352523','阿翀','山东','青岛','male','2011-01-01 00:00:00','ab','','213452525','','就那么回事','7c8d8ccb0a46f21f6182aff2f6246b600d33aea2.jpg','7c8d8ccb0a46f21f6182aff2f6246b600d33aea2.jpg','7c8d8ccb0a46f21f6182aff2f6246b600d33aea2.jpg','achong'),(26,'大刚','大刚','123123','hanyinchong@gwu.edu','fdgd','大刚','beijing','的萨','male','1988-05-14 00:00:00','ab','http://www.baidu.com','1223532','2131241412','对自己简短的介绍','128753280000169022.jpg','128753280000169022.jpg','128753280000169022.jpg','dagang'),(27,'王二嘎','王二嘎','4297f44b13955235245b2497399d7a93','bjslxxx@126.com','从先贤祠','niubi','','','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'niubi'),(28,'宋勇野','宋勇野','4297f44b13955235245b2497399d7a93','hanyinchong@gwu.edu','fdgd','宋勇野','beijing','Arlington','male','2011-01-01 00:00:00','b','http://www.baidu.com','143252','2131241412','对自己简短的介绍','738929180330606023.jpg','738929180330606023.jpg','738929180330606023.jpg','songyongye'),(29,'刘毅嵩','刘毅嵩','4297f44b13955235245b2497399d7a93','bjslxxx@126.com','1241','刘毅嵩','aomen','苏丹','male','2011-01-01 00:00:00','ab','http://www.baidu.com','24143','2131241412','对自己简短的介绍','37f2208715.jpg','37f2208715.jpg','37f2208715.jpg','liuyisong'),(30,'高任卢','高任卢','4297f44b13955235245b2497399d7a93','hufoh123@163.com','从先贤祠','高任卢','anhui','fdsgsdg','male','2011-01-01 00:00:00','ab','http://www.baidu.com','124325','3252','对自己简短的介绍','645863.jpg','645863.jpg','645863.jpg','gaorenlu'),(31,'杨熙','杨熙','4297f44b13955235245b2497399d7a93','bjslxxx@126.com','1241','杨熙','anhui','as','male','2011-01-01 00:00:00','ab','http://www.baidu.com','124325','524352','对自己简短的介绍','1331879153_xh82uh98rg.jpg','1331879153_xh82uh98rg.jpg','1331879153_xh82uh98rg.jpg','yangxi'),(32,'刘童亮','刘童亮','4297f44b13955235245b2497399d7a93','hufoh123@163.com','从先贤祠','刘童亮','guangxi','safsfs','male','2011-01-01 00:00:00','o','http://www.baidu.com','143252','3252','对自己简短的介绍','e113243920.jpg','e113243920.jpg','e113243920.jpg','liutongliang'),(33,'tester','tester','4297f44b13955235245b2497399d7a93','bjbslxx@129.com','kdsldlsfd','','','','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(34,'test2','test2','4297f44b13955235245b2497399d7a93','kdsjslk@129.com','slkjjlf','','','','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(35,'tester3','tester3','4297f44b13955235245b2497399d7a93','asds@123.com','','tester3','aomen','asa','female','1988-05-14 00:00:00','ab','','3452414235','14','对自己简短的介绍','event3.jpg','event3.jpg','event3.jpg','tester3'),(36,'魏征','魏征','4297f44b13955235245b2497399d7a93','dsf@129.com','','魏征','anhui','afs','male','1988-01-01 00:00:00','a','','21232525','','对自己简短的介绍','393778.jpg','393778.jpg','393778.jpg','weizheng');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2013-07-20 10:14:24
