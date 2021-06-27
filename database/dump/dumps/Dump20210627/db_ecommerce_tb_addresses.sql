-- MariaDB dump 10.19  Distrib 10.4.19-MariaDB, for Win64 (AMD64)
--
-- Host: 127.0.0.1    Database: db_ecommerce
-- ------------------------------------------------------
-- Server version	10.4.19-MariaDB

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
-- Table structure for table `tb_addresses`
--

DROP TABLE IF EXISTS `tb_addresses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_addresses` (
  `idaddress` int(11) NOT NULL AUTO_INCREMENT,
  `idperson` int(11) NOT NULL,
  `desaddress` varchar(128) NOT NULL,
  `descomplement` varchar(32) DEFAULT NULL,
  `descity` varchar(32) NOT NULL,
  `desstate` varchar(32) NOT NULL,
  `descountry` varchar(32) NOT NULL,
  `deszipcode` char(8) NOT NULL,
  `desdistrict` varchar(32) NOT NULL,
  `dtregister` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`idaddress`),
  KEY `fk_addresses_persons_idx` (`idperson`),
  CONSTRAINT `fk_addresses_persons` FOREIGN KEY (`idperson`) REFERENCES `tb_persons` (`idperson`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_addresses`
--

LOCK TABLES `tb_addresses` WRITE;
/*!40000 ALTER TABLE `tb_addresses` DISABLE KEYS */;
INSERT INTO `tb_addresses` VALUES (1,1,'Rua Pércio Freitas','','Estrela','RS','Brasil','95880-00','Alto da Bronze','2021-06-21 07:07:05'),(2,1,'Rua Pércio Freitas','','Estrela','RS','Brasil','95880-00','Alto da Bronze','2021-06-21 07:07:27'),(3,1,'Rua Pércio Freitas','','Estrela','RS','Brasil','95880-00','Alto da Bronze','2021-06-21 07:07:58'),(4,1,'Rua Pércio Freitas','','Estrela','RS','Brasil','95880-00','Alto da Bronze','2021-06-21 07:08:21'),(5,1,'Rua Pércio Freitas','','Estrela','RS','Brasil','95880-00','Alto da Bronze','2021-06-21 07:11:08'),(6,1,'Rua Arnaldo Fre','','Criumau','BH','Brasil','93445-00','Karlos do Céu','2021-06-21 07:14:20'),(7,1,'Rua Querbs','','Joca','JS','Brasil','33334-00','Bairro Clerto','2021-06-21 07:16:41'),(8,1,'Rua Querbs','','Joca','JS','Brasil','33334-00','Bairro Clerto','2021-06-21 07:18:35'),(9,1,'Rua Querbs','','Joca','JS','Brasil','33334-00','Bairro Clerto','2021-06-21 07:18:43'),(10,1,'Rua Carlos',NULL,'Lajeado','RN','Brasil','67546234','Eroald','2021-06-21 07:41:26'),(11,1,'Rua Carlos',NULL,'Lajeado','RN','Brasil','67546234','Eroald','2021-06-21 07:42:09'),(12,14,'Rua Clovenir',NULL,'Alberto','RJ','Brasil','87860444','Frozen','2021-06-21 08:06:44'),(13,1,'Rua Miranda',NULL,'Guaíba','RS','Brasil','99999876','Eroald','2021-06-21 20:10:03'),(14,1,'Rua Pércio Freitas',NULL,'Estrela','RS','Brasil','95880-00','Bairro Clerto','2021-06-22 00:00:10'),(15,1,'Rua Pércio Freitas',NULL,'Estrela','RS','Brasil','95880-00','Alto da Bronze','2021-06-22 00:03:35'),(16,1,'',NULL,'','','','','','2021-06-22 00:07:02'),(17,19,'Rua Pércio Freitas',NULL,'Estrela','RS','Brasil','95880-00','Karlos do Céu','2021-06-22 00:30:29');
/*!40000 ALTER TABLE `tb_addresses` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-06-27 18:15:50
