-- MySQL dump 10.13  Distrib 8.0.29, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: capstonedb
-- ------------------------------------------------------
-- Server version	5.7.33

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `image_location`
--

DROP TABLE IF EXISTS `image_location`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `image_location` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `account_id` int(11) NOT NULL,
  `image` text NOT NULL,
  `permit` varchar(45) NOT NULL,
  `title` varchar(255) NOT NULL,
  `name` varchar(128) NOT NULL,
  `location` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `status` varchar(128) NOT NULL,
  `thumbnail` varchar(45) NOT NULL,
  `contact` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `dentrance` longtext NOT NULL,
  `nentrance` longtext NOT NULL,
  `cottage` longtext NOT NULL,
  `roompackage` longtext NOT NULL,
  `rules` longtext NOT NULL,
  `business` longtext NOT NULL,
  `adult` varchar(45) NOT NULL,
  `senior` varchar(45) NOT NULL,
  `etc` varchar(45) NOT NULL,
  `isDeleted` tinyint(1) NOT NULL,
  `address` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=77 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `image_location`
--

LOCK TABLES `image_location` WRITE;
/*!40000 ALTER TABLE `image_location` DISABLE KEYS */;
/*!40000 ALTER TABLE `image_location` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `inbox`
--

DROP TABLE IF EXISTS `inbox`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `inbox` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `receiver_id` varchar(128) NOT NULL,
  `message` text NOT NULL,
  `time` datetime DEFAULT NULL,
  `status` int(11) NOT NULL,
  `email` varchar(45) NOT NULL,
  `name` varchar(45) NOT NULL,
  `sender_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inbox`
--

LOCK TABLES `inbox` WRITE;
/*!40000 ALTER TABLE `inbox` DISABLE KEYS */;
INSERT INTO `inbox` VALUES (10,'52','pareserve po','2019-05-11 06:58:48',1,'maricar@gmail.com','maricar sanchez',51),(11,'48','hi po','2019-05-11 08:07:02',0,'maricar@gmail.com','maricar sanchez',51),(12,'52','helloooooo','2019-05-11 09:32:04',1,'rosnil@gmail.com','rosnil',54),(13,'51','sige mag book ka lang.','2019-05-11 09:38:30',0,'kirsten@gmail.com','Kirsten Gail A. Santos',52),(14,'47','hi po','2019-05-11 11:04:55',1,'maricar@gmail.com','maricar sanchez',51),(15,'51','hello','2019-05-11 11:15:33',0,'claudine@gmail.com','Claudine De Guzman',47),(16,'52','hello world','2019-05-18 06:39:58',1,'claudine@gmail.com','Claudine De Guzman',47),(17,'47','helllllllooooow','2019-05-18 06:41:32',0,'kirsten@gmail.com','Kirsten Gail A. Santos',52);
/*!40000 ALTER TABLE `inbox` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `post_entry`
--

DROP TABLE IF EXISTS `post_entry`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `post_entry` (
  `entry_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(45) NOT NULL,
  `publisher` varchar(45) NOT NULL,
  `img` tinytext NOT NULL,
  `location` varchar(45) NOT NULL,
  `description` tinytext NOT NULL,
  `date_posted` date NOT NULL,
  PRIMARY KEY (`entry_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `post_entry`
--

LOCK TABLES `post_entry` WRITE;
/*!40000 ALTER TABLE `post_entry` DISABLE KEYS */;
/*!40000 ALTER TABLE `post_entry` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_code` varchar(45) DEFAULT NULL,
  `item_name` varchar(45) DEFAULT NULL,
  `item_size` varchar(45) DEFAULT NULL,
  `item_price` varchar(45) DEFAULT NULL,
  `item_stocks` varchar(45) DEFAULT NULL,
  `item_variation` varchar(45) DEFAULT NULL,
  `is_visible` tinyint(4) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,'1001','Jacket','10cm','100.00','10','Black Jacket',NULL);
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reservation`
--

DROP TABLE IF EXISTS `reservation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `reservation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `senderID` int(11) NOT NULL,
  `receiverID` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `address` varchar(45) NOT NULL,
  `contact` varchar(45) NOT NULL,
  `dateFrom` date NOT NULL,
  `dateTo` date NOT NULL,
  `rooms` varchar(45) NOT NULL,
  `cottage` varchar(45) NOT NULL,
  `resort_name` varchar(45) NOT NULL,
  `roomType` varchar(45) NOT NULL,
  `cottageType` varchar(45) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `adult` varchar(45) NOT NULL,
  `senior` varchar(45) NOT NULL,
  `children` varchar(45) NOT NULL,
  `isRead` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reservation`
--

LOCK TABLES `reservation` WRITE;
/*!40000 ALTER TABLE `reservation` DISABLE KEYS */;
/*!40000 ALTER TABLE `reservation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` char(32) NOT NULL,
  `role` tinyint(1) NOT NULL DEFAULT '0',
  `account_id` varchar(45) NOT NULL,
  `address` varchar(45) NOT NULL,
  `contact` varchar(15) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `username` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (25,'Administrator','admin@gmail.com','21232f297a57a5a743894a0e4a801fc3',1,'1555251803','Lipana St. Parulan Plaridel Bulacan','09222222222',0,'admin'),(59,'Clementine Meadows','feceqep@mailinator.com','f3ed11bbdb94fd9ebdefbaf646ab94d3',0,'1653440921','Impedit ut rerum ve','940',0,'zakeker');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-05-25 18:54:10
