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

--
-- Table structure for table `tb_carts`
--

DROP TABLE IF EXISTS `tb_carts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_carts` (
  `idcart` int(11) NOT NULL AUTO_INCREMENT,
  `dessessionid` varchar(64) NOT NULL,
  `iduser` int(11) DEFAULT NULL,
  `dtregister` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`idcart`),
  KEY `FK_carts_users_idx` (`iduser`),
  CONSTRAINT `fk_carts_users` FOREIGN KEY (`iduser`) REFERENCES `tb_users` (`iduser`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_carts`
--

LOCK TABLES `tb_carts` WRITE;
/*!40000 ALTER TABLE `tb_carts` DISABLE KEYS */;
INSERT INTO `tb_carts` VALUES (1,'8hcko3j7hmgp8sv7ggnseueupv',NULL,'2017-09-04 18:50:50'),(2,'m8iq807es95o2hj1a30772df1d',NULL,'2017-09-06 13:12:50'),(4,'a8frnbabuqu60gguivlmrpagin',NULL,'2017-09-08 11:39:01'),(5,'51jglmd9n3cdirc1ah75m31pt1',NULL,'2017-09-14 11:26:39'),(6,'tlvjs3tas1bml5uit8b5qgjn9l',NULL,'2017-09-21 13:18:21'),(7,'s31qgi0hnhvl11prr8d6sq79cs',11,'2021-06-20 21:35:25'),(8,'ladabh67u5gm80miidh4g6fufa',1,'2021-06-20 21:55:32');
/*!40000 ALTER TABLE `tb_carts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_cartsproducts`
--

DROP TABLE IF EXISTS `tb_cartsproducts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_cartsproducts` (
  `idcartproduct` int(11) NOT NULL AUTO_INCREMENT,
  `idcart` int(11) NOT NULL,
  `idproduct` int(11) NOT NULL,
  `dtremoved` datetime DEFAULT NULL,
  `dtregister` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`idcartproduct`),
  KEY `FK_cartsproducts_carts_idx` (`idcart`),
  KEY `fk_cartsproducts_products_idx` (`idproduct`),
  CONSTRAINT `fk_cartsproducts_carts` FOREIGN KEY (`idcart`) REFERENCES `tb_carts` (`idcart`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_cartsproducts_products` FOREIGN KEY (`idproduct`) REFERENCES `tb_products` (`idproduct`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_cartsproducts`
--

LOCK TABLES `tb_cartsproducts` WRITE;
/*!40000 ALTER TABLE `tb_cartsproducts` DISABLE KEYS */;
INSERT INTO `tb_cartsproducts` VALUES (17,7,6,NULL,'2021-06-20 21:35:25'),(18,8,8,'2021-06-21 17:09:30','2021-06-20 21:55:32'),(19,8,6,'2021-06-20 21:42:31','2021-06-20 21:55:34'),(20,8,6,'2021-06-21 04:15:37','2021-06-20 21:55:56'),(21,8,7,'2021-06-21 04:13:26','2021-06-20 21:55:59'),(22,8,6,'2021-06-21 04:15:37','2021-06-20 23:10:17'),(23,8,9,'2021-06-21 04:13:29','2021-06-21 06:42:33'),(24,8,9,'2021-06-21 04:13:29','2021-06-21 06:42:40'),(25,8,9,'2021-06-21 04:13:29','2021-06-21 06:42:44'),(26,8,9,'2021-06-21 04:13:29','2021-06-21 06:42:47'),(28,8,8,'2021-06-21 17:09:30','2021-06-21 07:15:39'),(29,8,8,'2021-06-21 17:09:30','2021-06-21 07:15:41'),(30,8,11,'2021-06-21 05:05:03','2021-06-21 07:40:19'),(31,8,10,'2021-06-21 19:21:23','2021-06-21 07:40:25'),(32,8,9,'2021-06-21 17:09:29','2021-06-21 07:40:27'),(33,8,13,'2021-06-21 17:09:32','2021-06-21 07:40:30'),(34,8,6,'2021-06-21 17:09:26','2021-06-21 07:40:38'),(35,8,14,'2021-06-21 17:09:27','2021-06-21 07:40:43'),(36,8,9,'2021-06-21 17:09:29','2021-06-21 08:05:10'),(37,8,6,'2021-06-21 17:09:26','2021-06-21 08:05:13'),(38,8,10,'2021-06-21 19:21:23','2021-06-21 08:05:14'),(39,8,10,'2021-06-21 19:21:23','2021-06-21 08:05:15'),(40,8,8,'2021-06-21 17:09:30','2021-06-21 08:05:17'),(41,8,13,'2021-06-21 17:09:32','2021-06-21 08:05:19'),(42,8,13,'2021-06-21 17:09:32','2021-06-21 08:05:21'),(43,8,13,'2021-06-21 17:09:32','2021-06-21 08:05:24'),(44,8,14,'2021-06-21 17:09:27','2021-06-21 08:05:26'),(45,8,10,'2021-06-21 19:21:23','2021-06-21 08:05:27'),(46,8,14,'2021-06-21 17:09:27','2021-06-21 08:05:34'),(47,8,13,'2021-06-21 17:09:32','2021-06-21 08:05:38'),(48,8,10,'2021-06-21 19:21:23','2021-06-21 20:09:23'),(49,8,10,'2021-06-21 20:53:44','2021-06-21 23:53:42'),(50,8,7,'2021-06-21 21:18:43','2021-06-21 23:59:35'),(51,8,7,'2021-06-21 21:18:43','2021-06-22 00:07:39'),(52,8,7,'2021-06-21 21:18:43','2021-06-22 00:09:39'),(53,8,10,'2021-06-21 21:19:35','2021-06-22 00:19:26'),(54,8,10,'2021-06-21 21:27:58','2021-06-22 00:27:22'),(55,8,10,'2021-06-21 21:28:05','2021-06-22 00:27:27'),(56,8,18,'2021-06-21 21:27:56','2021-06-22 00:27:36'),(57,8,10,NULL,'2021-06-22 00:28:12'),(58,8,10,NULL,'2021-06-22 00:28:13'),(59,8,14,NULL,'2021-06-22 00:28:41');
/*!40000 ALTER TABLE `tb_cartsproducts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_categories`
--

DROP TABLE IF EXISTS `tb_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_categories` (
  `idcategory` int(11) NOT NULL AUTO_INCREMENT,
  `descategory` varchar(32) NOT NULL,
  `dtregister` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`idcategory`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_categories`
--

LOCK TABLES `tb_categories` WRITE;
/*!40000 ALTER TABLE `tb_categories` DISABLE KEYS */;
INSERT INTO `tb_categories` VALUES (4,'Action','2021-06-20 21:47:19'),(5,'Battle Royale','2021-06-20 21:47:33'),(6,'MMO','2021-06-20 21:47:37'),(7,'MOBA','2021-06-20 21:47:40'),(8,'RPG','2021-06-20 21:47:45'),(9,'RTS','2021-06-20 21:47:49'),(10,'Simulation','2021-06-20 21:47:54'),(11,'Racing','2021-06-21 19:29:26');
/*!40000 ALTER TABLE `tb_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_orders`
--

DROP TABLE IF EXISTS `tb_orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_orders` (
  `idorder` int(11) NOT NULL AUTO_INCREMENT,
  `idcart` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `idstatus` int(11) NOT NULL,
  `idaddress` int(11) NOT NULL,
  `vltotal` decimal(10,2) NOT NULL,
  `dtregister` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`idorder`),
  KEY `FK_orders_users_idx` (`iduser`),
  KEY `fk_orders_ordersstatus_idx` (`idstatus`),
  KEY `fk_orders_carts_idx` (`idcart`),
  KEY `fk_orders_addresses_idx` (`idaddress`),
  CONSTRAINT `fk_orders_addresses` FOREIGN KEY (`idaddress`) REFERENCES `tb_addresses` (`idaddress`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_orders_carts` FOREIGN KEY (`idcart`) REFERENCES `tb_carts` (`idcart`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_orders_ordersstatus` FOREIGN KEY (`idstatus`) REFERENCES `tb_ordersstatus` (`idstatus`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_orders_users` FOREIGN KEY (`iduser`) REFERENCES `tb_users` (`iduser`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_orders`
--

LOCK TABLES `tb_orders` WRITE;
/*!40000 ALTER TABLE `tb_orders` DISABLE KEYS */;
INSERT INTO `tb_orders` VALUES (4,8,1,4,4,1000.00,'2021-06-21 07:08:21'),(5,8,1,1,5,1000.00,'2021-06-21 07:11:08'),(6,8,1,1,6,659.00,'2021-06-21 07:14:20'),(8,8,1,1,8,1647.00,'2021-06-21 07:18:35'),(9,8,1,1,9,1647.00,'2021-06-21 07:18:43'),(10,8,1,1,10,1936.90,'2021-06-21 07:41:26'),(11,8,1,1,11,1936.90,'2021-06-21 07:42:09'),(12,8,14,3,12,3076.50,'2021-06-21 08:06:44'),(13,8,1,1,13,165.00,'2021-06-21 20:10:03'),(14,8,1,1,14,333.00,'2021-06-22 00:00:10'),(15,8,1,1,15,333.00,'2021-06-22 00:03:35'),(16,8,1,3,16,333.00,'2021-06-22 00:07:02'),(17,8,19,3,17,111.00,'2021-06-22 00:30:29');
/*!40000 ALTER TABLE `tb_orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_ordersstatus`
--

DROP TABLE IF EXISTS `tb_ordersstatus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_ordersstatus` (
  `idstatus` int(11) NOT NULL AUTO_INCREMENT,
  `desstatus` varchar(32) NOT NULL,
  `dtregister` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`idstatus`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_ordersstatus`
--

LOCK TABLES `tb_ordersstatus` WRITE;
/*!40000 ALTER TABLE `tb_ordersstatus` DISABLE KEYS */;
INSERT INTO `tb_ordersstatus` VALUES (1,'Open','2017-03-13 03:00:00'),(2,'Waiting Payment','2017-03-13 03:00:00'),(3,'Paid','2017-03-13 03:00:00'),(4,'Done','2017-03-13 03:00:00');
/*!40000 ALTER TABLE `tb_ordersstatus` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_persons`
--

DROP TABLE IF EXISTS `tb_persons`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_persons` (
  `idperson` int(11) NOT NULL AUTO_INCREMENT,
  `desperson` varchar(64) NOT NULL,
  `desemail` varchar(128) DEFAULT NULL,
  `nrphone` bigint(20) DEFAULT NULL,
  `dtregister` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`idperson`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_persons`
--

LOCK TABLES `tb_persons` WRITE;
/*!40000 ALTER TABLE `tb_persons` DISABLE KEYS */;
INSERT INTO `tb_persons` VALUES (1,'Administrator','admin@guiboyecommerce.com',123456789,'2017-03-01 03:00:00'),(11,'Gui','guikb@gmail.com',123,'2021-06-20 21:26:27'),(12,'Gustavo','guba@gmail.com',123546,'2021-06-20 23:37:44'),(13,'Azarel','azarel@gmail.com',123,'2021-06-20 23:38:24'),(14,'Guilherme','guibange@gmail.com',123123123,'2021-06-21 08:06:03'),(15,'Gabriel','ww2gg@gmail.com',123123123,'2021-06-21 09:29:27'),(16,'Hemington Carlos','hemington@hotmail.com',5543419992,'2021-06-21 20:54:42'),(17,'Jota','jota@outlook.com',5198882323,'2021-06-21 22:24:08'),(18,'Carlos','carlos@outlook.com',5193382323,'2021-06-21 22:27:08'),(19,'Juca Carlos','juca@gmail.com',123123123,'2021-06-22 00:29:09');
/*!40000 ALTER TABLE `tb_persons` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_products`
--

DROP TABLE IF EXISTS `tb_products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_products` (
  `idproduct` int(11) NOT NULL AUTO_INCREMENT,
  `desproduct` varchar(64) NOT NULL,
  `vlprice` decimal(10,2) NOT NULL,
  `desurl` varchar(128) NOT NULL,
  `dtregister` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`idproduct`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_products`
--

LOCK TABLES `tb_products` WRITE;
/*!40000 ALTER TABLE `tb_products` DISABLE KEYS */;
INSERT INTO `tb_products` VALUES (6,'Battlefield 4',55.00,'bfv','2021-06-20 21:29:40'),(7,'Arma 3',333.00,'arma3','2021-06-20 21:50:33'),(8,'Red Dead Redemption 2',549.00,'rdr2','2021-06-20 21:55:01'),(9,'League Of Legends',2.00,'lol','2021-06-20 23:12:03'),(10,'Age of Empires',33.00,'aoe','2021-06-20 23:13:18'),(11,'Dota 2',55.00,'dota2','2021-06-20 23:13:25'),(12,'World Of Warcraft',66.00,'wow','2021-06-20 23:14:14'),(13,'The Elder Scrolls V: Skyrim',99.90,'skyrim','2021-06-20 23:14:34'),(14,'Playerunknown\'s Battlegrounds',45.00,'pubg','2021-06-20 23:20:45'),(15,'Farming Simulator 19',21.00,'fmst19','2021-06-21 18:11:47'),(16,'CS:GO',12.00,'csgo','2021-06-21 19:25:35'),(17,'Forza Horizon 5',765.52,'forzah5','2021-06-21 19:27:27'),(18,'Battlefield 2042',424.00,'bf2042','2021-06-21 20:58:03'),(19,'Battlefield 5',333.00,'bfv','2021-06-21 20:58:13'),(20,'Battlefield 3',150.33,'bf3','2021-06-21 20:58:29');
/*!40000 ALTER TABLE `tb_products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_productscategories`
--

DROP TABLE IF EXISTS `tb_productscategories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_productscategories` (
  `idcategory` int(11) NOT NULL,
  `idproduct` int(11) NOT NULL,
  PRIMARY KEY (`idcategory`,`idproduct`),
  KEY `fk_productscategories_products_idx` (`idproduct`),
  CONSTRAINT `fk_productscategories_categories` FOREIGN KEY (`idcategory`) REFERENCES `tb_categories` (`idcategory`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_productscategories_products` FOREIGN KEY (`idproduct`) REFERENCES `tb_products` (`idproduct`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_productscategories`
--

LOCK TABLES `tb_productscategories` WRITE;
/*!40000 ALTER TABLE `tb_productscategories` DISABLE KEYS */;
INSERT INTO `tb_productscategories` VALUES (4,6),(4,7),(4,8),(4,13),(4,14),(4,16),(4,18),(4,19),(4,20),(5,14),(6,12),(7,9),(7,11),(8,13),(9,10),(10,15),(11,17);
/*!40000 ALTER TABLE `tb_productscategories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_users`
--

DROP TABLE IF EXISTS `tb_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_users` (
  `iduser` int(11) NOT NULL AUTO_INCREMENT,
  `idperson` int(11) NOT NULL,
  `deslogin` varchar(64) NOT NULL,
  `despassword` varchar(256) NOT NULL,
  `inadmin` tinyint(4) NOT NULL DEFAULT 0,
  `dtregister` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`iduser`),
  KEY `FK_users_persons_idx` (`idperson`),
  CONSTRAINT `fk_users_persons` FOREIGN KEY (`idperson`) REFERENCES `tb_persons` (`idperson`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_users`
--

LOCK TABLES `tb_users` WRITE;
/*!40000 ALTER TABLE `tb_users` DISABLE KEYS */;
INSERT INTO `tb_users` VALUES (1,1,'admin','$2y$12$lrLCiKI6JXcWP6m8/AqbA.JG6lgO6SjEzEspjHUMTbkU52YIaBqVi',1,'2017-03-13 03:00:00'),(11,11,'guikb','$2y$12$KbqaWPnKlNe9/n1RwA/TIuB3utM9bE.LcqSdvx1iAfCOku0rAQvF.',1,'2021-06-20 21:26:27'),(12,12,'gubao','$2y$12$vL8m94NTR9RhshXaQRp6Pu7lAnUBB7naePwz2Bqr/QjqoIqq6mVca',0,'2021-06-20 23:37:44'),(13,13,'azarel','$2y$12$5FWEKPw.WBSMUP4aMcjse.pOtsjNnibpC4rEBbQ1mIvOBCRr0yvNu',0,'2021-06-20 23:38:24'),(14,14,'guibange@gmail.com','$2y$12$qq9bbNz1jdOt/WTiRwIXLOQGSyZ3SV0Yx32XXPmisG4BMpvPqrlge',0,'2021-06-21 08:06:03'),(15,15,'gabriel','$2y$12$LhfzzeGz6hrB288i3PecSOL5cA6XwF/1L9dcDmvz7xBdOf4kPnEuy',1,'2021-06-21 09:29:27'),(16,16,'hemington@hotmail.com','$2y$12$7AhEB2arigJu2bkXVp4UPOA4DHJzhYUlr6b4a9r5na.Nk6yp0mYyq',1,'2021-06-21 20:54:42'),(17,17,'jota@outlook.com','$2y$12$XwPFMOrcCxc76iY9RiSvieGYjBOUeZ76f5BLYgpGROOuwCP4ArWWO',0,'2021-06-21 22:24:08'),(18,18,'carlos@outlook.com','$2y$12$xmxKez5EBgDrCuu56yzLs.vH0mZOqImvIzamyXp7IOOGg/23tGWdK',0,'2021-06-21 22:27:08'),(19,19,'juca@gmail.com','$2y$12$aJSUvAh6PjjE6dWHeDyN7OqtF11pd3GvCzbUghP0Dv3JxkZSFP3Ee',0,'2021-06-22 00:29:09');
/*!40000 ALTER TABLE `tb_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_userslogs`
--

DROP TABLE IF EXISTS `tb_userslogs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_userslogs` (
  `idlog` int(11) NOT NULL AUTO_INCREMENT,
  `iduser` int(11) NOT NULL,
  `deslog` varchar(128) NOT NULL,
  `desip` varchar(45) NOT NULL,
  `desuseragent` varchar(128) NOT NULL,
  `dessessionid` varchar(64) NOT NULL,
  `desurl` varchar(128) NOT NULL,
  `dtregister` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`idlog`),
  KEY `fk_userslogs_users_idx` (`iduser`),
  CONSTRAINT `fk_userslogs_users` FOREIGN KEY (`iduser`) REFERENCES `tb_users` (`iduser`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_userslogs`
--

LOCK TABLES `tb_userslogs` WRITE;
/*!40000 ALTER TABLE `tb_userslogs` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_userslogs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_userspasswordsrecoveries`
--

DROP TABLE IF EXISTS `tb_userspasswordsrecoveries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_userspasswordsrecoveries` (
  `idrecovery` int(11) NOT NULL AUTO_INCREMENT,
  `iduser` int(11) NOT NULL,
  `desip` varchar(45) NOT NULL,
  `dtrecovery` datetime DEFAULT NULL,
  `dtregister` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`idrecovery`),
  KEY `fk_userspasswordsrecoveries_users_idx` (`iduser`),
  CONSTRAINT `fk_userspasswordsrecoveries_users` FOREIGN KEY (`iduser`) REFERENCES `tb_users` (`iduser`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_userspasswordsrecoveries`
--

LOCK TABLES `tb_userspasswordsrecoveries` WRITE;
/*!40000 ALTER TABLE `tb_userspasswordsrecoveries` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_userspasswordsrecoveries` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-06-27 18:24:24
