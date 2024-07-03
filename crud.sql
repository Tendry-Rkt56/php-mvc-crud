-- MariaDB dump 10.19  Distrib 10.7.8-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: crud
-- ------------------------------------------------------
-- Server version	10.7.8-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `articles`
--

DROP TABLE IF EXISTS `articles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) NOT NULL,
  `prix` int(11) NOT NULL,
  `image` varchar(250) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_category_id` (`category_id`),
  CONSTRAINT `fk_category_id` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `articles`
--

LOCK TABLES `articles` WRITE;
/*!40000 ALTER TABLE `articles` DISABLE KEYS */;
INSERT INTO `articles` VALUES
(40,'Aiguillette de poulet au curry',1000,'image/articles/Aiguillettes-de-poulet-au-curry.jpg',2),
(41,'Vary @anana',500,NULL,5),
(42,'Gratin de choux fleur',5000,'image/articles/Gratin-de-chou-fleur-allege.jpg',2),
(43,'Brownies sans beurre',4000,'image/articles/Brownies-sans-beurre.jpg',8),
(44,'Vary sy laoka',1000,NULL,2),
(45,'Vary sy tsaramaso',1500,NULL,5),
(46,'Légume vapeur',1200,'image/articles/Legumes-vapeur-a-l-huile-d-olive.png',6),
(47,'Tartare de tomate',2540,'image/articles/Tartare-de-tomate.jpg',2),
(48,'Gratin provencial',4500,'image/articles/Gratin-provencal.png',4),
(49,'Vinaigrette mince',1200,'image/articles/Vinaigrette-minceur.jpg',7),
(50,'Moussaka facile',5000,'image/articles/Moussaka-facile.jpg',4),
(51,'Soupe d\'aubergine',2000,'image/articles/Soupe-d-aubergine-tomatee-a-l-ail.jpg',4),
(52,'Glace au chocolat',6000,'image/articles/glacechocolat3.jpg',2),
(53,'Bavaroise au fraise',6500,'image/articles/bavaroisfraise.jpg',7),
(54,'Glace à la vanille',5500,'image/articles/glacevanille4.jpg',2),
(55,'Endive au jomban',10000,'image/articles/Endives-au-jambon-facon-regime.jpg',6),
(56,'Tarte au pomme',4000,'image/articles/images (15).jpg',8),
(57,'Vary sy petit pois',2500,'image/articles/téléchargement (35).jpg',2);
/*!40000 ALTER TABLE `articles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` VALUES
(2,'Déjeuner'),
(4,'Dîner'),
(5,'Petit-déjeuner'),
(6,'Appéritif'),
(7,'Entrée'),
(8,'Desserts');
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-07-03  7:25:20
