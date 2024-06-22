CREATE DATABASE  IF NOT EXISTS `db_pontoeletronico` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `db_pontoeletronico`;
-- MySQL dump 10.13  Distrib 8.0.36, for Win64 (x86_64)
--
-- Host: localhost    Database: db_pontoeletronico
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.32-MariaDB

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
-- Table structure for table `tbl_ferias`
--

DROP TABLE IF EXISTS `tbl_ferias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_ferias` (
  `id_ferias` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `data_inicio` date NOT NULL,
  `data_fim` date NOT NULL,
  `data_registro` timestamp NOT NULL DEFAULT current_timestamp(),
  `excluido` tinyint(1) DEFAULT 0,
  PRIMARY KEY (`id_ferias`),
  KEY `id_usuario` (`id_usuario`),
  CONSTRAINT `tbl_ferias_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `tbl_usuario` (`id_usuario`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_ferias`
--

LOCK TABLES `tbl_ferias` WRITE;
/*!40000 ALTER TABLE `tbl_ferias` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_ferias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_registros_ponto`
--

DROP TABLE IF EXISTS `tbl_registros_ponto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_registros_ponto` (
  `id_registro` int(11) NOT NULL,
  `localizacao` varchar(255) NOT NULL,
  `hora` varchar(255) NOT NULL,
  `data` varchar(255) NOT NULL,
  `tipo` varchar(50) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `justificativa` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_registros_ponto`
--

LOCK TABLES `tbl_registros_ponto` WRITE;
/*!40000 ALTER TABLE `tbl_registros_ponto` DISABLE KEYS */;
INSERT INTO `tbl_registros_ponto` VALUES (0,'R. PROF. CEVANES MONTEIRO, 163 - RIO MADEIRA, PORTO VELHO - RO, 76821-350, BRAZIL','12:12','2024-06-01','ENTRADA',1,'TESTE 01'),(0,'\n                    Av. Aqui vai aparecer meu Endereço, 1234\n                ','19:36:20','19/06/2024','Entrada',1,''),(0,'R. Prof. Cevanes Monteiro, 163 - Rio Madeira, Porto Velho - RO, 76821-350, Brasil','19:36:48','19/06/2024','Saída',1,''),(0,'R. PROF. CEVANES MONTEIRO, 163 - RIO MADEIRA, PORTO VELHO - RO, 76821-350, BRASIL','19:37:59','2024-06-19','ENTRADA',1,''),(0,'R. PROF. CEVANES MONTEIRO, 163 - RIO MADEIRA, PORTO VELHO - RO, 76821-350, BRASIL','19:46:01','2024-06-19','SAIDA',1,''),(0,'R. PROF. CEVANES MONTEIRO, 163 - RIO MADEIRA, PORTO VELHO - RO, 76821-350, BRASIL','19:46:21','2024-06-19','ENTRADA',1,''),(0,'R. PROF. CEVANES MONTEIRO, 163 - RIO MADEIRA, PORTO VELHO - RO, 76821-350, BRASIL','19:46:40','2024-06-19','SAIDA',1,''),(0,'R. PROF. CEVANES MONTEIRO, 163 - RIO MADEIRA, PORTO VELHO - RO, 76821-350, BRASIL','23:05:59','2024-06-19','ENTRADA',1,'');
/*!40000 ALTER TABLE `tbl_registros_ponto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_usuario`
--

DROP TABLE IF EXISTS `tbl_usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_usuario` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `primeiro_nome` varchar(255) NOT NULL,
  `ultimo_nome` varchar(255) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `senha` varchar(255) NOT NULL,
  PRIMARY KEY (`id_usuario`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_usuario`
--

LOCK TABLES `tbl_usuario` WRITE;
/*!40000 ALTER TABLE `tbl_usuario` DISABLE KEYS */;
INSERT INTO `tbl_usuario` VALUES (1,'João','Silva','joao.silva@example.com','senha123'),(2,'Maria','Oliveira','maria.oliveira@example.com','senha456');
/*!40000 ALTER TABLE `tbl_usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'db_pontoeletronico'
--

--
-- Dumping routines for database 'db_pontoeletronico'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-06-22 15:33:26
