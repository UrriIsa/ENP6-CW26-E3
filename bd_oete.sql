-- MariaDB dump 10.19  Distrib 10.4.32-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: bd_oete
-- ------------------------------------------------------
-- Server version	10.4.32-MariaDB

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
-- Table structure for table `alumnos`
--

DROP TABLE IF EXISTS `alumnos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `alumnos` (
  `nocta` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `contraseña` varchar(16) NOT NULL,
  `grupo` int(11) DEFAULT NULL,
  `plantel` int(11) DEFAULT NULL,
  `ete` int(11) DEFAULT NULL,
  PRIMARY KEY (`nocta`),
  KEY `grupo` (`grupo`),
  KEY `plantel` (`plantel`),
  KEY `fk_alumno_ete` (`ete`),
  CONSTRAINT `fk_alumno_ete` FOREIGN KEY (`ete`) REFERENCES `etes` (`id_ete`),
  CONSTRAINT `grupo` FOREIGN KEY (`grupo`) REFERENCES `grupos` (`id_grupo`),
  CONSTRAINT `plantel` FOREIGN KEY (`plantel`) REFERENCES `planteles` (`num_plantel`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `alumnos`
--

LOCK TABLES `alumnos` WRITE;
/*!40000 ALTER TABLE `alumnos` DISABLE KEYS */;
/*!40000 ALTER TABLE `alumnos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `docentes`
--

DROP TABLE IF EXISTS `docentes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `docentes` (
  `notra` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `contraseña` varchar(16) NOT NULL,
  `ete` int(11) DEFAULT NULL,
  PRIMARY KEY (`notra`),
  KEY `fK_dete` (`ete`),
  CONSTRAINT `fK_dete` FOREIGN KEY (`ete`) REFERENCES `etes` (`id_ete`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `docentes`
--

LOCK TABLES `docentes` WRITE;
/*!40000 ALTER TABLE `docentes` DISABLE KEYS */;
/*!40000 ALTER TABLE `docentes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `etes`
--

DROP TABLE IF EXISTS `etes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `etes` (
  `id_ete` int(11) NOT NULL,
  `nombre_ete` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_ete`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `etes`
--

LOCK TABLES `etes` WRITE;
/*!40000 ALTER TABLE `etes` DISABLE KEYS */;
/*!40000 ALTER TABLE `etes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `formulario`
--

DROP TABLE IF EXISTS `formulario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `formulario` (
  `id_form` varchar(500) NOT NULL,
  `nocta` int(11) NOT NULL,
  `turno` varchar(10) DEFAULT NULL,
  `pa1` varchar(500) DEFAULT NULL,
  `pa2_0` varchar(500) DEFAULT NULL,
  `pa2_1` varchar(500) DEFAULT NULL,
  `pa3_0` varchar(500) DEFAULT NULL,
  `pa3_1` varchar(500) DEFAULT NULL,
  `pa4` varchar(500) DEFAULT NULL,
  `pa5` varchar(500) DEFAULT NULL,
  `pa6` varchar(500) DEFAULT NULL,
  `pa7_0` varchar(500) DEFAULT NULL,
  `pa7_1` varchar(500) DEFAULT NULL,
  `pa7_2` varchar(500) DEFAULT NULL,
  `pa7_3` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id_form`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `formulario`
--

LOCK TABLES `formulario` WRITE;
/*!40000 ALTER TABLE `formulario` DISABLE KEYS */;
/*!40000 ALTER TABLE `formulario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `grupos`
--

DROP TABLE IF EXISTS `grupos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `grupos` (
  `id_grupo` int(11) NOT NULL,
  `grupo` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`id_grupo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `grupos`
--

LOCK TABLES `grupos` WRITE;
/*!40000 ALTER TABLE `grupos` DISABLE KEYS */;
/*!40000 ALTER TABLE `grupos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `planteles`
--

DROP TABLE IF EXISTS `planteles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `planteles` (
  `num_plantel` int(11) NOT NULL,
  `nombre_plantel` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`num_plantel`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `planteles`
--

LOCK TABLES `planteles` WRITE;
/*!40000 ALTER TABLE `planteles` DISABLE KEYS */;
/*!40000 ALTER TABLE `planteles` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2026-06-09 20:25:44
INSERT INTO alumnos (nocta, nombre, contraseña) 
VALUES (123456789,'Jaimito','JaimitoProf');