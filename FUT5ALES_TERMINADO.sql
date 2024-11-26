-- MySQL dump 10.13  Distrib 8.0.40, for Linux (x86_64)
--
-- Host: 127.0.0.1    Database: fut5ales2024
-- ------------------------------------------------------
-- Server version	8.0.40-0ubuntu0.22.04.1

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
-- Table structure for table `compra`
--

DROP TABLE IF EXISTS `compra`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `compra` (
  `id` int NOT NULL,
  `fecha` date DEFAULT NULL,
  `precio` varchar(45) DEFAULT NULL,
  `usuario_idusuario` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_compra_1_idx` (`usuario_idusuario`),
  CONSTRAINT `fk_compra_1` FOREIGN KEY (`usuario_idusuario`) REFERENCES `usuario` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `compra`
--

LOCK TABLES `compra` WRITE;
/*!40000 ALTER TABLE `compra` DISABLE KEYS */;
/*!40000 ALTER TABLE `compra` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `compra_has_producto`
--

DROP TABLE IF EXISTS `compra_has_producto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `compra_has_producto` (
  `compra_idcompra` int NOT NULL,
  `producto_idproducto` int NOT NULL,
  PRIMARY KEY (`compra_idcompra`,`producto_idproducto`),
  KEY `fk_compra_has_producto_producto1_idx` (`producto_idproducto`),
  KEY `fk_compra_has_producto_compra1_idx` (`compra_idcompra`),
  CONSTRAINT `fk_compra_has_producto_compra1` FOREIGN KEY (`compra_idcompra`) REFERENCES `compra` (`id`),
  CONSTRAINT `fk_compra_has_producto_producto1` FOREIGN KEY (`producto_idproducto`) REFERENCES `producto` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `compra_has_producto`
--

LOCK TABLES `compra_has_producto` WRITE;
/*!40000 ALTER TABLE `compra_has_producto` DISABLE KEYS */;
/*!40000 ALTER TABLE `compra_has_producto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `producto`
--

DROP TABLE IF EXISTS `producto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `producto` (
  `id` int NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `color` varchar(45) DEFAULT NULL,
  `precio` varchar(45) DEFAULT NULL,
  `talle` varchar(45) CHARACTER SET armscii8 COLLATE armscii8_general_ci DEFAULT NULL,
  `marca` varchar(45) DEFAULT NULL,
  `stock` tinyint DEFAULT NULL,
  `categoria` varchar(45) DEFAULT NULL,
  `imagen` varchar(100) DEFAULT NULL,
  `destacado` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `producto`
--

LOCK TABLES `producto` WRITE;
/*!40000 ALTER TABLE `producto` DISABLE KEYS */;
INSERT INTO `producto` VALUES (1,'Joma top flex','negro','139000','43','joma',1,'futsal','botines/jomatopflexrebound.jpg','1'),(2,'Joma top flex','blanco','139000','44','joma',1,'futsal','botines/jomatopflexblanco.jpg','1'),(3,'Umbro sala pro5 bump dragon year','rojo','160000','43','Umbro',1,'futsal','botines/umbrosalapro5bumpdragonyear.jpeg','1'),(4,'Nike Premier II','negro','129999','43','nike',1,'futsal','botines/Botines Nike Premier.jpeg','1'),(5,'Nike Tiempo Legend 9','blanco','120000','44','nike',0,'futsal','botines/Botines Nike Tiempo Legend 9.jpeg','0'),(6,'Adidas Copa Pure II','blanco','73999','42','adidas',1,'futsal','botines/copa2.webp','0'),(100,'Adidas Predator24','negro','159999','43','adidas',1,'futbol_5','botines/F5adidas_predator24.webp','0'),(101,'Adidas Copa pure II','blanco','749999','44','adidas',1,'futbol_5','botines/F5_Copa_pure.webp','0'),(102,'Nike tiempo Legend 10 academy','amarillo','123999','44','nike',1,'futbol_5','botines/F5nike_tiempo_legend10_academy.webp','1'),(103,'Nike Mercurial Vapor 15','rosa','229999','43','nike',1,'futbol_5','botines/F5nike_mercurial_vapor15.webp','1'),(104,'Umbro Society Xcomfort','blanco','94999','42','Umbro',1,'futbol_5','botines/F5Umbro_society_xcomfort.webp','0'),(105,'Joma Liga W230','blanco','139999','43','Joma',1,'futbol_5','botines/F5Botin_Liga_w2302.webp','0'),(200,'Adidas-Pureagility','azul','159999','44','adidas',1,'futbol_11','botines/Adidas-Pureagility-Messi-FG-PIloboots.webp','0'),(201,'Joma Aguila','negro','94999','40','Joma',1,'futbol_11','botines/F11Joma_aguila.webp','1'),(202,'Nike Premier Lii Emerald','turquesa','399999','43','nike',1,'futbol_11','botines/F11Nike_premier_lii.webp','0'),(1001,'Medias Negro Antidezlizante','negro','5599',NULL,NULL,1,'accesorios','fotos_logos/mediasnegras.jpg','0'),(1002,'Medias Rojas Antidezlizante','rojo','5599',NULL,NULL,1,'accesorios','fotos_logos/mediasrojas.jpg','0'),(1003,'Medias Azules Antidezlizante','azul','5599',NULL,NULL,1,'accesorios','fotos_logos/mediasazules.webp','0'),(1004,'Medias Blancas Antidezlizante','blanco','5599',NULL,NULL,1,'accesorios','fotos_logos/mediasblancas.jpg','0');
/*!40000 ALTER TABLE `producto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `proveedor`
--

DROP TABLE IF EXISTS `proveedor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `proveedor` (
  `id` int NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `tel` varchar(45) DEFAULT NULL,
  `dir` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `proveedor`
--

LOCK TABLES `proveedor` WRITE;
/*!40000 ALTER TABLE `proveedor` DISABLE KEYS */;
/*!40000 ALTER TABLE `proveedor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuario` (
  `id` int NOT NULL AUTO_INCREMENT,
  `Usuario` varchar(45) DEFAULT NULL,
  `Email` varchar(45) DEFAULT NULL,
  `Contraseña` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,'juan','juan@gmail.com','juan1'),(2,'juan','juan@gmail.com','juan1'),(3,'juan','manutodorov@gmail.com','1234'),(4,'santino','santino.cantale@gmail.com','luciacantale'),(5,'juan','juan@gmail.com','1234'),(6,'juan','mati@gmail.com','kiki'),(7,'juan','joaoco@gmail.com','987'),(8,'matias','matias@gmail.com','cami'),(9,'maga','maga@gmail.com','magamaga');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-11-26 17:37:52
