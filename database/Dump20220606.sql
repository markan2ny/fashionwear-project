-- MySQL dump 10.13  Distrib 8.0.29, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: fashionwear
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
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cart` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_name` varchar(45) DEFAULT NULL,
  `item_image` varchar(45) DEFAULT NULL,
  `item_price` double DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `order_qty` int(11) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `item_size` varchar(45) DEFAULT NULL,
  `is_approve` tinyint(4) DEFAULT '0',
  `is_claimed` tinyint(4) DEFAULT '0',
  `reservee` varchar(45) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_idx` (`user_id`),
  CONSTRAINT `id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cart`
--

LOCK TABLES `cart` WRITE;
/*!40000 ALTER TABLE `cart` DISABLE KEYS */;
INSERT INTO `cart` VALUES (19,'Black Dress','SOFIA-629c7aaf76dca5.76377838.png',100,70,10,NULL,'Medium',1,1,'Orlando Gallagher',28),(20,'Black Dress','SOFIA-629c7aaf76dca5.76377838.png',100,70,20,NULL,'Medium',1,0,'Orlando Gallagher',28);
/*!40000 ALTER TABLE `cart` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_code` varchar(122) DEFAULT NULL,
  `item_name` varchar(122) DEFAULT NULL,
  `item_size` varchar(45) DEFAULT NULL,
  `item_price` float DEFAULT NULL,
  `item_qty` int(11) DEFAULT NULL,
  `item_variant` varchar(45) DEFAULT NULL,
  `is_visible` tinyint(4) DEFAULT '0',
  `item_image` varchar(122) DEFAULT NULL,
  `item_cat` varchar(45) DEFAULT NULL,
  `item_sold` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (28,'Black Jacket','Black Dress','Medium',100,10,'Blue Jacket',0,'SOFIA-629c7aaf76dca5.76377838.png','women',NULL),(30,'LB Dress','Long Blue Dress with Semi Blue Colar','Large',100,10,'LB BLUE',0,'SOFIA-629cbfa4158b10.10603897.png','women',NULL),(31,'BL dress','Black Long Dress With Free Tissue','Small',100,100,'BL Dress',0,'SOFIA-629cbf5b502ad7.85526119.png','women',NULL);
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` char(32) NOT NULL,
  `role` tinyint(1) NOT NULL DEFAULT '0',
  `address` varchar(45) NOT NULL,
  `contact` varchar(15) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `username` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=77 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (25,'Administrator','admin@gmail.com','21232f297a57a5a743894a0e4a801fc3',1,'Lipana St. Parulan Plaridel Bulacan','09222222222',1,'admin'),(59,'Clementine Meadows','feceqep@mailinator.com','f3ed11bbdb94fd9ebdefbaf646ab94d3',0,'Impedit ut rerum ve','940',0,'zakeker'),(60,'Zenaida Jacobs','cysu@mailinator.com','5f4dcc3b5aa765d61d8327deb882cf99',0,'Et illum hic mollit','853',0,'sample1'),(61,'Portia Church','magun@mailinator.com','f3ed11bbdb94fd9ebdefbaf646ab94d3',0,'Inventore temporibus','123',0,'ruhylyliw'),(62,'Shaeleigh Shelton','fovakeqote@mailinator.com','f3ed11bbdb94fd9ebdefbaf646ab94d3',0,'Qui aliquid aperiam ','53',0,'xesybop'),(63,'Gretchen Barry','hixy@mailinator.com','5f4dcc3b5aa765d61d8327deb882cf99',1,'Et et repellendus V','40',0,'mekesuwe'),(64,'Oprah Bartlett','cevodycywa@mailinator.com','f3ed11bbdb94fd9ebdefbaf646ab94d3',0,'Laudantium numquam ','651',0,'wefupoj'),(65,'Rinah Gates','lavega@mailinator.com','f3ed11bbdb94fd9ebdefbaf646ab94d3',0,'Qui quia sint sunt','468',0,'lixuze'),(66,'Kylie Keller','folotizi@mailinator.com','f3ed11bbdb94fd9ebdefbaf646ab94d3',0,'Quo error deleniti a','801',0,'rewyxi'),(67,'Lucian Craft','xosoz@mailinator.com','f3ed11bbdb94fd9ebdefbaf646ab94d3',0,'Sed quia ut dolores ','88',0,'bubas'),(68,'Armando Good','kagewy@mailinator.com','f3ed11bbdb94fd9ebdefbaf646ab94d3',0,'Laborum cupiditate i','354',0,'mezysuzup'),(69,'Hashim Clemons','mazewani@mailinator.com','f3ed11bbdb94fd9ebdefbaf646ab94d3',0,'Expedita enim numqua','890',0,'faqyc'),(70,'Orlando Gallagher','laxovex@mailinator.com','ee11cbb19052e40b07aac0ca060c23ee',0,'Rerum labore at nisi','157',0,'user'),(71,'Knox Yates','fixum@mailinator.com','f3ed11bbdb94fd9ebdefbaf646ab94d3',0,'Qui rerum doloremque','594',0,'rujataso'),(72,'Harriet Blanchard','dylybyquru@mailinator.com','f3ed11bbdb94fd9ebdefbaf646ab94d3',0,'Enim sint quia eum ','611',0,'dateq'),(73,'Angelica Serrano','fasapasafi@mailinator.com','f3ed11bbdb94fd9ebdefbaf646ab94d3',0,'Exercitation accusam','571',0,'lateqaqa'),(74,'Angelica Serrano','fasapasafi@mailinator.com','f3ed11bbdb94fd9ebdefbaf646ab94d3',0,'Exercitation accusam','571',0,'lateqaqa'),(75,'Katelyn Reid','leposyho@mailinator.com','f3ed11bbdb94fd9ebdefbaf646ab94d3',0,'Minima et quis enim ','896',0,'zogudurol'),(76,'Deirdre Schwartz','hole@mailinator.com','f3ed11bbdb94fd9ebdefbaf646ab94d3',0,'Dolor atque velit s','146',0,'nuvuto');
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

-- Dump completed on 2022-06-06 12:41:06
