-- MariaDB dump 10.19  Distrib 10.4.28-MariaDB, for osx10.10 (x86_64)
--
-- Host: localhost    Database: ete
-- ------------------------------------------------------
-- Server version	10.4.28-MariaDB

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
-- Current Database: `ete`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `ete` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;

USE `ete`;

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
  `id_activo` int(11) NOT NULL,
  PRIMARY KEY (`nocta`),
  KEY `grupo` (`grupo`),
  KEY `plantel` (`plantel`),
  KEY `fk_alumno_ete` (`ete`),
  KEY `fk_id_activo` (`id_activo`),
  CONSTRAINT `fk_alumno_ete` FOREIGN KEY (`ete`) REFERENCES `etes` (`id_ete`),
  CONSTRAINT `fk_id_activo` FOREIGN KEY (`id_activo`) REFERENCES `usuario_activo` (`id_usuario_activo`),
  CONSTRAINT `grupo` FOREIGN KEY (`grupo`) REFERENCES `grupos` (`id_grupo`),
  CONSTRAINT `plantel` FOREIGN KEY (`plantel`) REFERENCES `planteles` (`num_plantel`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `alumnos`
--

LOCK TABLES `alumnos` WRITE;
/*!40000 ALTER TABLE `alumnos` DISABLE KEYS */;
INSERT INTO `alumnos` VALUES (234567891,'pompompurin','2468',1,NULL,5,2),(324569876,'Jaimito VII','910',2,5,10,1),(325273994,'Jaimito VI','JaimitoProf',1,NULL,NULL,1),(326897645,'Jaimito VIII','8',1,9,8,1),(345678912,'chikawa','6789',2,7,9,1),(456789123,'Keroppi','6789',1,NULL,NULL,1);
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
INSERT INTO `docentes` VALUES (876543219,'Jaimito','ProJaimito',NULL),(987654321,'Isaac Urrutia','IsaacGOD',NULL);
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
  `nombre_ete` varchar(65) DEFAULT NULL,
  PRIMARY KEY (`id_ete`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `etes`
--

LOCK TABLES `etes` WRITE;
/*!40000 ALTER TABLE `etes` DISABLE KEYS */;
INSERT INTO `etes` VALUES (1,'Computación'),(2,'Auxiliar fotógrafo laboratorista y prensa'),(3,'Agencia de viajes y hotelería'),(4,'Auxiliar en contabilidad'),(5,'Enseñanza de inglés'),(6,'Auxiliar laboratorista químico'),(7,'Auxiliar en dibujo arquitectónico'),(8,'Auxiliar bancario'),(9,'Histopatología'),(10,'Auxiliar museógrafo restaurador'),(11,'Auxiliar nutriólogo');
/*!40000 ALTER TABLE `etes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `formulario`
--

DROP TABLE IF EXISTS `formulario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `formulario` (
  `id_form` int(11) NOT NULL AUTO_INCREMENT,
  `turno` varchar(10) DEFAULT NULL,
  `pa1` varchar(500) DEFAULT NULL,
  `pa2_0` varchar(500) DEFAULT NULL,
  `pa2_1` varchar(500) DEFAULT NULL,
  `pa3_0` varchar(500) DEFAULT NULL,
  `pa3_1` varchar(500) DEFAULT NULL,
  `pa3_2` varchar(500) DEFAULT NULL,
  `pa4` varchar(500) DEFAULT NULL,
  `pa5` varchar(500) DEFAULT NULL,
  `pa6` varchar(500) DEFAULT NULL,
  `pa7_0` varchar(500) DEFAULT NULL,
  `pa7_1` varchar(500) DEFAULT NULL,
  `pa7_2` varchar(500) DEFAULT NULL,
  `pa7_3` varchar(500) DEFAULT NULL,
  `pa7_4` varchar(500) DEFAULT NULL,
  `pa0` varchar(500) DEFAULT NULL,
  `nocta` int(9) NOT NULL,
  PRIMARY KEY (`id_form`),
  KEY `nocta` (`nocta`),
  CONSTRAINT `formulario_ibfk_1` FOREIGN KEY (`nocta`) REFERENCES `alumnos` (`nocta`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `formulario`
--

LOCK TABLES `formulario` WRITE;
/*!40000 ALTER TABLE `formulario` DISABLE KEYS */;
INSERT INTO `formulario` VALUES (1,'Vespertino','a','Sí','a','Sí','1, 2','','1','Sí','Sí','2','','1, 2','a','','789',326897645),(2,'Vespertino','4','Sí','ddd','Sí','1, 2','','1','Sí','No','1','aaaaa',NULL,'ni modo','','4684',456789123);
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
  `docente` int(11) NOT NULL,
  PRIMARY KEY (`id_grupo`),
  KEY `fk_docente` (`docente`),
  CONSTRAINT `fk_docente` FOREIGN KEY (`docente`) REFERENCES `docentes` (`notra`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `grupos`
--

LOCK TABLES `grupos` WRITE;
/*!40000 ALTER TABLE `grupos` DISABLE KEYS */;
INSERT INTO `grupos` VALUES (1,'61B',876543219),(2,'61D',987654321);
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
  `nombre_plantel` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`num_plantel`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `planteles`
--

LOCK TABLES `planteles` WRITE;
/*!40000 ALTER TABLE `planteles` DISABLE KEYS */;
INSERT INTO `planteles` VALUES (1,'1 Gabino Barreda'),(2,'2 Erasmo Castellanos Quinto'),(3,'3 Justo Sierra'),(4,'4 Vidal Castañeda y Nájera'),(5,'5 José Vasconcelos'),(6,'6 Antonio Caso'),(7,'7 Ezequiel A. Chávez'),(8,'8 Miguel E. Schulz'),(9,'9 Pedro de Alba');
/*!40000 ALTER TABLE `planteles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario_activo`
--

DROP TABLE IF EXISTS `usuario_activo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario_activo` (
  `id_usuario_activo` int(11) NOT NULL AUTO_INCREMENT,
  `estado` varchar(50) NOT NULL,
  PRIMARY KEY (`id_usuario_activo`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario_activo`
--

LOCK TABLES `usuario_activo` WRITE;
/*!40000 ALTER TABLE `usuario_activo` DISABLE KEYS */;
INSERT INTO `usuario_activo` VALUES (1,'activo'),(2,'inactivo');
/*!40000 ALTER TABLE `usuario_activo` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2026-06-16 11:38:07
