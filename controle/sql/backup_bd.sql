-- MySQL dump 10.16  Distrib 10.1.26-MariaDB, for Win32 (AMD64)
--
-- Host: localhost    Database: bdBanco
-- ------------------------------------------------------
-- Server version	10.1.26-MariaDB

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
-- Table structure for table `alertas`
--

DROP TABLE IF EXISTS `alertas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `alertas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_cliente` int(50) NOT NULL,
  `divida` varchar(40) NOT NULL,
  `data_vencimento` varchar(13) NOT NULL,
  `idBal` int(50) NOT NULL,
  `id_banco` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idBal` (`idBal`),
  KEY `id_banco` (`id_banco`),
  CONSTRAINT `alertas_ibfk_1` FOREIGN KEY (`idBal`) REFERENCES `balanco` (`idBal`),
  CONSTRAINT `alertas_ibfk_2` FOREIGN KEY (`id_banco`) REFERENCES `ibancarias` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `alertas`
--

LOCK TABLES `alertas` WRITE;
/*!40000 ALTER TABLE `alertas` DISABLE KEYS */;
/*!40000 ALTER TABLE `alertas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `balanco`
--

DROP TABLE IF EXISTS `balanco`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `balanco` (
  `idBal` int(11) NOT NULL AUTO_INCREMENT,
  `id_banco` int NOT NULL,
  `Gastos` decimal(10,0) NOT NULL,
  `Ganhos` decimal(10,0) NOT NULL,
  `balanco` decimal(10,0) NOT NULL,
  `tipo` varchar(9) NOT NULL,
  `id_cliente` int(50) NOT NULL,
  PRIMARY KEY (`idBal`),
  KEY `id_cliente` (`id_cliente`),
  KEY `id_banco` (`id_banco`),
  CONSTRAINT `balanco_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `conta` (`id`),
  CONSTRAINT `balanco_ibfk_2` FOREIGN KEY (`id_banco`) REFERENCES `ibancarias` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `balanco`
--

LOCK TABLES `balanco` WRITE;
/*!40000 ALTER TABLE `balanco` DISABLE KEYS */;
INSERT INTO `balanco` VALUES (15,'ItaÃº',100,200,100,'Semanal',1),(16,'ItaÃº',1000,1000,0,'Mensal',1),(17,'ItaÃº',2000,30000,28000,'Semestral',1),(19,'ItaÃº',3,4,1,'Semestral',1);
/*!40000 ALTER TABLE `balanco` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `conta`
--

DROP TABLE IF EXISTS `conta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `conta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(16) NOT NULL,
  `cpf` varchar(30) NOT NULL,
  `cod` varchar(10) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `login` varchar(30) NOT NULL,
  `senha` varchar(20) NOT NULL,
  `tipo` char(1) NOT NULL DEFAULT 'C',
  PRIMARY KEY (`id`),
  UNIQUE KEY `cod` (`cod`),
  UNIQUE KEY `login` (`login`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `conta`
--

LOCK TABLES `conta` WRITE;
/*!40000 ALTER TABLE `conta` DISABLE KEYS */;
INSERT INTO `conta` VALUES (1,'Lucas','083.069.083-25','911-HOG','(85) 8888-1424','lulu134','lucas123','G'),(2,'Lucas','083.069.083-25','948-UXS','(85) 8888-1424','Lucasjoao85@gmail.com','admin50u3u','C');
/*!40000 ALTER TABLE `conta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ibancarias`
--

DROP TABLE IF EXISTS `ibancarias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ibancarias` (
  `id`  int,
  `Nomebanco` varchar(50) NOT NULL,
  `Saque` decimal(10,0) NOT NULL DEFAULT '0',
  `Deposito` decimal(10,0) NOT NULL DEFAULT '0',
  `Saldo` decimal(10,0) NOT NULL DEFAULT '0',
  `nmrConta` varchar(13) NOT NULL DEFAULT '0',
  `id_cliente` int(50) DEFAULT NULL,
  `tipo` char(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nmrConta` (`nmrConta`),
  KEY `id_cliente` (`id_cliente`),
  CONSTRAINT `ibancarias_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `conta` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ibancarias`
--



--
-- Table structure for table `icredito`
--

DROP TABLE IF EXISTS `icredito`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `icredito` (
  `idCre` int(11) NOT NULL AUTO_INCREMENT,
  `Cartao` varchar(50) NOT NULL,
  `data_vencimento` varchar(13) NOT NULL,
  `limite` decimal(10,0) NOT NULL,
  `id_cliente` int(50) NOT NULL,
  PRIMARY KEY (`idCre`),
  KEY `id_cliente` (`id_cliente`),
  CONSTRAINT `icredito_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `conta` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `icredito`
--

LOCK TABLES `icredito` WRITE;
/*!40000 ALTER TABLE `icredito` DISABLE KEYS */;
/*!40000 ALTER TABLE `icredito` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-04-06 18:58:47
