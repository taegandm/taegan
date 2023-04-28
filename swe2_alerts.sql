-- MySQL dump 10.13  Distrib 8.0.32, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: swe2
-- ------------------------------------------------------
-- Server version	8.0.32

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
-- Table structure for table `alerts`
--

DROP TABLE IF EXISTS `alerts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `alerts` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(30) NOT NULL,
  `details` varchar(256) NOT NULL,
  `dt` varchar(64) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=96 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `alerts`
--

LOCK TABLES `alerts` WRITE;
/*!40000 ALTER TABLE `alerts` DISABLE KEYS */;
INSERT INTO `alerts` VALUES (1,'DELAY','There is a 15 minute delay on Clove Road due to traffic','2023-04-11 06:39:00'),(2,'DELAY','There is a 15 minute delay on Clove Road due to traffic','2023-04-11 06:39:00'),(3,'DELAY','There is a 15 minute delay on Clove Road due to traffic','2023-04-11 06:39:00'),(4,'DELAY','there is a delay on the route','04/12/23 15:38:14'),(5,'DELAY','there is a delay on the route','04/12/23 15:38:37'),(6,'DELAY','there is a delay','04/12/23 15:38:48'),(7,'ALERT TEST','this is a test for sending alerts','04/12/23 15:39:45'),(8,'Hello!','Hi','04/12/23 15:40:19'),(9,'Hello!','Hi','04/12/23 03:41:02'),(10,'heyo','hi','04/12/23 03:41:07'),(11,'hello','this is a test to see if changing the names changed the output','04/12/23 07:04:44'),(12,'hello','this is a test to see if changing the names changed the output','04/12/23 07:05:26'),(13,'hello','gello','04/12/23 07:05:32'),(14,'hello','gello','04/12/23 07:06:04'),(15,'yo','yo','04/12/23 07:06:09'),(16,'hey!','','04/12/23 07:06:16'),(17,'hey!','','04/12/23 07:14:12'),(18,'hey!','','04/12/23 07:14:36'),(19,'hey!','','04/12/23 07:17:31'),(20,'hey!','','04/12/23 07:18:58'),(21,'hey!','','04/12/23 07:21:16'),(22,'hey!','','04/12/23 07:22:47'),(23,'','','04/12/23 07:47:50'),(24,'','','04/12/23 07:47:56'),(25,'','','04/12/23 07:48:24'),(26,'hello!','hi','04/12/23 07:49:12'),(27,'Hey','hi','04/15/23 02:21:23'),(28,'da','da','04/15/23 02:21:29'),(29,'','','04/15/23 02:21:54'),(30,'','','04/15/23 02:28:11'),(31,'s','s','04/15/23 2:36:50'),(32,'s','s','04/14/23  8:42:10'),(33,'s','s','04/14/23   8:43 pm'),(34,'DELAY','delayed','04/14/23   9:18 pm'),(35,'DELAY BUS 552','there is a delay','04/23/23   3:10 pm'),(36,'da','da','04/23/23   3:13 pm'),(37,'DELAY Clove Road','There is a delay on clove road due to weather. Bus 555 will be aproximately 7 minutes late','04/23/23   3:23 pm'),(38,'Uh oh','this is an alert','04/23/23   3:30 pm'),(39,'hi','hi','04/23/23   3:59 pm'),(40,'d','d','04/23/23   4:51 pm'),(41,'d','d','04/23/23   4:51 pm'),(42,'d','d','04/23/23   4:54 pm'),(43,'d','d','04/23/23   4:54 pm'),(44,'2','3','04/23/23   4:55 pm'),(45,'2','3','04/23/23   4:56 pm'),(46,'ds','ds','04/23/23   4:58 pm'),(47,'d','d','04/23/23   5:03 pm'),(48,'d','d','04/23/23   5:05 pm'),(49,'a','a','04/23/23   5:06 pm'),(50,'d','d','04/23/23   5:06 pm'),(51,'d','d','04/23/23   5:07 pm'),(52,'d','d','04/23/23   5:09 pm'),(53,'d','d','04/23/23   5:10 pm'),(54,'d','d','04/23/23   5:11 pm'),(55,'d','d','04/23/23   5:13 pm'),(56,'d','d','04/23/23   5:14 pm'),(57,'d','d','04/23/23   5:15 pm'),(58,'DELAY','theres a delay','04/23/23   5:16 pm'),(59,'gh','ga','04/23/23   5:17 pm'),(60,'DELAY','Bus 678 delayed by 10 minutes','04/23/23   6:36 pm'),(61,'BREAKDOWN','Bus 8 is out of service','04/23/23   6:37 pm'),(62,'DELAY','There is a delay on Clove Road due to traffic','04/23/23   6:38 pm'),(63,'DELAY','Bus 68 is delayed. It should take 10 minutes to reach the next stop','04/23/23   6:38 pm'),(64,'ACCIDENT','There has been an accident on Clove Road. Delay should be about 7 minutes','04/23/23   6:42 pm'),(65,'haha','fart','04/23/23   8:33 pm'),(66,'wadha','sdsajh','04/23/23   8:35 pm'),(67,'hey!','hey','04/23/23   8:39 pm'),(68,'hi','hi','04/24/23   12:47 pm'),(69,'hi','hi','04/24/23   1:43 pm'),(70,'j','j','04/24/23   4:10 pm'),(71,'h','h','04/24/23   4:13 pm'),(72,'new alert','hi','04/24/23   4:27 pm'),(73,'another new one','check if this works','04/24/23   4:54 pm'),(74,'sending alert!','p','04/24/23   4:56 pm'),(75,'see','it','04/24/23   4:56 pm'),(76,'fart','shit','04/24/23   4:56 pm'),(77,'hey','hey','04/24/23   4:58 pm'),(78,'hi','hi','04/24/23   4:58 pm'),(79,'hi','hey','04/24/23   5:00 pm'),(80,'hi','hi','04/24/23   5:07 pm'),(81,'a','a','04/24/23   5:07 pm'),(82,'yo!','hi','04/24/23   5:08 pm'),(83,'a','a','04/24/23   5:10 pm'),(84,'hi','hi','04/24/23   5:16 pm'),(85,'uo','al','04/24/23   5:16 pm'),(86,'hi!','he','04/24/23   5:17 pm'),(87,'h','e','04/24/23   5:17 pm'),(88,'test','test','04/24/23   5:28 pm'),(89,'2','3','04/24/23   5:29 pm'),(90,'hu','test','04/24/23   5:29 pm'),(91,'hi','hi','04/25/23   5:17 pm'),(92,'test','alert','04/25/23   8:16 pm'),(93,'hi','hi','04/27/23   1:53 am'),(94,'hey','hey','04/27/23   1:53 am'),(95,'y','y','04/27/23   1:53 am');
/*!40000 ALTER TABLE `alerts` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-04-27  1:57:42
