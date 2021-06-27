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
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-06-27 18:15:50
