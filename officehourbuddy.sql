-- MySQL dump 10.13  Distrib 5.5.40, for debian-linux-gnu (i686)
--
-- Host: localhost    Database: pset7
-- ------------------------------------------------------
-- Server version	5.5.40-0ubuntu0.14.04.1-log

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
-- Table structure for table `history`
--

DROP TABLE IF EXISTS `history`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `history` (
  `id` int(10) unsigned NOT NULL,
  `transaction` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `datetime` text COLLATE utf8_unicode_ci NOT NULL,
  `symbol` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `shares` int(11) NOT NULL,
  `price` decimal(65,4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `history`
--

LOCK TABLES `history` WRITE;
/*!40000 ALTER TABLE `history` DISABLE KEYS */;
INSERT INTO `history` VALUES (17,'BUY','2014-11-07 01:16:03','11/6/2014, 8:16pm','AAPL',3,108.7000),(17,'SELL','2014-11-07 01:16:18','11/6/2014, 8:16pm','AAPL',1,108.7000),(18,'BUY','2014-11-07 01:23:50','11/6/2014, 8:23pm','TWI',50,10.6600),(18,'BUY','2014-11-07 01:31:19','11/6/2014, 8:31pm','AER',3,44.5800),(17,'SELL','2014-11-07 03:47:45','11/6/2014, 10:47pm','AAPL',1,108.7000),(17,'BUY','2014-11-07 03:48:02','11/6/2014, 10:48pm','GOOG',3,542.0400),(17,'SELL','2014-11-07 03:55:43','11/6/2014, 10:55pm','GOOG',1,542.0400),(17,'SELL','2014-11-07 03:56:19','11/6/2014, 10:56pm','GOOG',2,542.0400),(17,'BUY','2014-11-07 03:56:54','11/6/2014, 10:56pm','AAPL',4,108.7000),(17,'BUY','2014-11-07 03:57:01','11/6/2014, 10:57pm','GOOG',3,542.0400),(17,'SELL','2014-11-07 03:57:07','11/6/2014, 10:57pm','AAPL',4,108.7000),(17,'SELL','2014-11-07 03:57:12','11/6/2014, 10:57pm','GOOG',3,542.0400),(17,'BUY','2014-11-07 03:59:05','11/6/2014, 10:59pm','FREE',3,0.1500),(17,'BUY','2014-11-07 03:59:13','11/6/2014, 10:59pm','GOOG',3,542.0400),(17,'SELL','2014-11-07 03:59:18','11/6/2014, 10:59pm','FREE',3,0.1500),(17,'SELL','2014-11-07 03:59:23','11/6/2014, 10:59pm','GOOG',3,542.0400),(17,'BUY','2014-11-07 04:32:18','11/6/2014, 11:32pm','GOOG',4,542.0400),(17,'BUY','2014-11-07 04:32:27','11/6/2014, 11:32pm','FREE',5,0.1500),(17,'BUY','2014-11-07 04:32:32','11/6/2014, 11:32pm','AAPL',6,108.7000),(17,'SELL','2014-11-07 04:32:39','11/6/2014, 11:32pm','AAPL',5,108.7000),(17,'SELL','2014-11-07 04:35:42','11/6/2014, 11:35pm','FREE',5,0.1500),(17,'SELL','2014-11-07 04:41:00','11/6/2014, 11:40pm','AAPL',1,108.7000),(17,'BUY','2014-11-07 16:23:05','11/7/2014, 11:23am','ING',60,14.1100),(17,'BUY','2014-11-07 16:23:36','11/7/2014, 11:23am','PFG',50,52.5200),(17,'BUY','2014-11-07 16:23:50','11/7/2014, 11:23am','KORS',50,71.0200),(17,'SELL','2014-11-07 16:26:29','11/7/2014, 11:26am','KORS',11,71.0500);
/*!40000 ALTER TABLE `history` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `stocks`
--

DROP TABLE IF EXISTS `stocks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `stocks` (
  `id` int(10) unsigned NOT NULL,
  `symbol` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `shares` int(11) NOT NULL,
  PRIMARY KEY (`id`,`symbol`),
  KEY `id` (`id`),
  KEY `id_2` (`id`),
  KEY `id_3` (`id`),
  KEY `symbol` (`symbol`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stocks`
--

LOCK TABLES `stocks` WRITE;
/*!40000 ALTER TABLE `stocks` DISABLE KEYS */;
INSERT INTO `stocks` VALUES (13,'AAPL',6),(13,'FB',17),(13,'GOOG',2042),(17,'GOOG',4),(17,'ING',60),(17,'KORS',39),(17,'PFG',50),(18,'AER',3),(18,'TWI',50);
/*!40000 ALTER TABLE `stocks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cash` decimal(65,4) unsigned NOT NULL DEFAULT '0.0000',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'belindazeng','$1$50$oxJEDBo9KDStnrhtnSzir0',10000.0000),(2,'caesar','$1$50$GHABNWBNE/o4VL7QjmQ6x0',10000.0000),(3,'jharvard','$1$50$RX3wnAMNrGIbgzbRYrxM1/',10000.0000),(4,'malan','$1$50$lJS9HiGK6sphej8c4bnbX.',10000.0000),(5,'rob','$1$HA$l5llES7AEaz8ndmSo5Ig41',10000.0000),(7,'zamyla','$1$50$uwfqB45ANW.9.6qaQ.DcF.',10000.0000),(17,'gab','$1$GyAzSPy/$XBKr5TuOXihVdYjvfE/Ts1',1479.7400),(18,'skroob','$1$lvlwPApN$tFM.A2XjM9rnV4SrLThoQ0',9333.2600);
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

-- Dump completed on 2014-12-07  8:09:05
