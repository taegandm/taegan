CREATE DATABASE  IF NOT EXISTS `swe2` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `swe2`;
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
-- Table structure for table `waittime`
--

DROP TABLE IF EXISTS `waittime`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `waittime` (
  `id` int NOT NULL AUTO_INCREMENT,
  `current_stop` varchar(100) NOT NULL,
  `next_stop` varchar(100) NOT NULL,
  `wait_time` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `waittime`
--

LOCK TABLES `waittime` WRITE;
/*!40000 ALTER TABLE `waittime` DISABLE KEYS */;
INSERT INTO `waittime` VALUES (1,'University Hall','Lot 60',10),(2,'University Hall','Transit',2),(3,'University Hall','The Village',4),(4,'University Hall','Russ Hall',12),(5,'University Hall','Red Hawk Deck',18),(6,'University Hall','The Heights',15),(7,'Lot 60','University Hall',10),(8,'Lot 60','Transit',10),(9,'Lot 60','The Village',5),(10,'Lot 60','Russ Hall',10),(11,'Lot 60','Red Hawk Deck',23),(12,'Lot 60','The Heights',13),(13,'Transit','University Hall',8),(14,'Transit','Lot 60',2),(15,'Transit','The Village',2),(16,'Transit','Russ Hall',6),(17,'Transit','Red Hawk Deck',10),(18,'Transit','The Heights',14),(19,'The Village','Russ Hall',8),(20,'The Village','Red Hawk Deck',5),(21,'The Village','Lot 60',0),(22,'The Village','Transit',5),(23,'The Village','University Hall',5),(24,'The Village','The Heights',5),(25,'Russ Hall','Red Hawk Deck',10),(26,'Russ Hall','The Heights',2),(27,'Russ Hall','Transit',10),(28,'Russ Hall','The Village',2),(29,'Russ Hall','University Hall',5),(30,'Russ Hall','Lot 60',14),(31,'Red Hawk Deck','The Heights',7),(32,'Red Hawk Deck','University Hall',4),(33,'Red Hawk Deck','Lot 60',10),(34,'Red Hawk Deck','Transit',13),(35,'Red Hawk Deck','The Village',17),(36,'Red Hawk Deck','Russ Hall',11),(37,'The Heights','University Hall',20),(38,'The Heights','Lot 60',15),(39,'The Heights','Transit',7),(40,'The Heights','The Village',12),(41,'The Heights','Russ Hall',18),(42,'The Heights','Red Hawk Deck',17);
/*!40000 ALTER TABLE `waittime` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-05-03 12:44:41
