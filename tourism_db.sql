-- MySQL dump 10.13  Distrib 9.2.0, for Win64 (x86_64)
--
-- Host: localhost    Database: tourism_db
-- ------------------------------------------------------
-- Server version	9.2.0

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `domestic_tourists`
--

DROP TABLE IF EXISTS `domestic_tourists`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `domestic_tourists` (
  `id` int NOT NULL AUTO_INCREMENT,
  `component` varchar(100) NOT NULL,
  `year2010` int NOT NULL,
  `year2011` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `domestic_tourists`
--

LOCK TABLES `domestic_tourists` WRITE;
/*!40000 ALTER TABLE `domestic_tourists` DISABLE KEYS */;
INSERT INTO `domestic_tourists` VALUES (1,'Food & beverages',6448,7756),(2,'Transport',6220,7417),(3,'Accommodation',6096,4985),(4,'Shopping',2603,3801),(5,'Pre-Trip Expenses',595,801),(6,'Other activities',1722,2249);
/*!40000 ALTER TABLE `domestic_tourists` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `domestic_visitors`
--

DROP TABLE IF EXISTS `domestic_visitors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `domestic_visitors` (
  `id` int NOT NULL AUTO_INCREMENT,
  `component` varchar(100) NOT NULL,
  `year2010` int NOT NULL,
  `year2011` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `domestic_visitors`
--

LOCK TABLES `domestic_visitors` WRITE;
/*!40000 ALTER TABLE `domestic_visitors` DISABLE KEYS */;
INSERT INTO `domestic_visitors` VALUES (1,'Shopping',8914,13149),(2,'Transport',8098,10019),(3,'Food & beverages',7975,9691),(4,'Accommodation',6130,5028),(5,'Pre-Trip Expenses',894,1097),(6,'Other activities',2667,3362);
/*!40000 ALTER TABLE `domestic_visitors` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-07-05  1:07:28
