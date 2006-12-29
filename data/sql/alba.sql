-- MySQL dump 10.10
--
-- Host: localhost    Database: alba
-- ------------------------------------------------------
-- Server version	5.0.24a-Debian_9-log

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
-- Table structure for table `actividad`
--

DROP TABLE IF EXISTS `actividad`;
CREATE TABLE `actividad` (
  `id` int(11) NOT NULL auto_increment,
  `fk_establecimiento_id` int(11) NOT NULL default '0',
  `nombre` varchar(128) NOT NULL,
  `descripcion` text,
  PRIMARY KEY  (`id`),
  KEY `establecimiento_FI_1` (`fk_establecimiento_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `actividad`
--


/*!40000 ALTER TABLE `actividad` DISABLE KEYS */;
LOCK TABLES `actividad` WRITE;
INSERT INTO `actividad` VALUES (1,3,'Expresion Corporal','Expresion Corporal'),(2,2,'MÃºsica','MÃºsica'),(3,2,'Idioma extranjero','InglÃ©s'),(5,2,'Lengua','Lengua'),(6,2,'MatemÃ¡tica','MatemÃ¡tica'),(7,2,'Ciencias Sociales','Ciencias Sociales'),(8,2,'Ciencias Naturales','Ciencias Naturales'),(9,2,'TeconologÃ­a','TecnologÃ­a'),(10,2,'EducaciÃ³n PlÃ¡stica','EducaciÃ³n PlÃ¡stica'),(11,2,'EducaciÃ³n FÃ­sica','EducaciÃ³n FÃ­sica'),(12,2,'FormaciÃ³n Ã©tica y cuidadana','FormaciÃ³n Ã©tica y ciudadana'),(13,2,'Artesanal','Artesanal'),(14,2,'InformÃ¡tica','InformÃ¡tica');
UNLOCK TABLES;
/*!40000 ALTER TABLE `actividad` ENABLE KEYS */;

--
-- Table structure for table `adjunto`
--

DROP TABLE IF EXISTS `adjunto`;
CREATE TABLE `adjunto` (
  `id` int(11) NOT NULL auto_increment,
  `descripcion` varchar(255) default NULL,
  `titulo` varchar(255) default NULL,
  `ruta` varchar(255) NOT NULL,
  `fecha` datetime NOT NULL,
  `nombre_archivo` varchar(255) NOT NULL,
  `tipo_archivo` varchar(64) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `adjunto`
--


/*!40000 ALTER TABLE `adjunto` DISABLE KEYS */;
LOCK TABLES `adjunto` WRITE;
INSERT INTO `adjunto` VALUES (4,NULL,NULL,'1855678483454222c4857a1.jpg','2006-10-27 00:00:00','DSC00416.JPG','image/jpeg'),(10,NULL,NULL,'2146388489454254d185439.jpg','2006-10-27 00:00:00','alba-chico.jpg','image/jpeg'),(11,NULL,NULL,'880397828456d95b82efae.jpg','2006-11-29 00:00:00','av-1011.jpg','image/jpeg'),(12,NULL,NULL,'14961608174586afaf60a84.exe','2006-12-18 00:00:00','INSTALL','application/octet-stream');
UNLOCK TABLES;
/*!40000 ALTER TABLE `adjunto` ENABLE KEYS */;

--
-- Table structure for table `alumno`
--

DROP TABLE IF EXISTS `alumno`;
CREATE TABLE `alumno` (
  `id` int(11) NOT NULL auto_increment,
  `nombre` varchar(128) NOT NULL default '',
  `apellido` varchar(128) NOT NULL,
  `fecha_nacimiento` datetime NOT NULL,
  `nro_documento` varchar(16) NOT NULL,
  `direccion` varchar(128) NOT NULL default '',
  `ciudad` varchar(128) NOT NULL,
  `codigo_postal` varchar(20) NOT NULL,
  `fk_provincia_id` int(11) NOT NULL default '0',
  `telefono` varchar(20) default NULL,
  `sexo` char(1) NOT NULL default '',
  `email` varchar(128) default NULL,
  `certificado_medico` tinyint(1) NOT NULL default '0',
  `distancia_escuela` int(11) NOT NULL default '0',
  `hermanos_escuela` tinyint(1) NOT NULL default '0',
  `hijo_maestro_escuela` tinyint(1) NOT NULL default '0',
  `fk_establecimiento_id` int(11) NOT NULL default '0',
  `fk_cuenta_id` int(11) NOT NULL default '0',
  `fk_tipodocumento_id` int(11) NOT NULL default '0',
  `fk_conceptobaja_id` int(11) NOT NULL,
  `activo` tinyint(1) NOT NULL default '1',
  PRIMARY KEY  (`id`),
  KEY `cuenta_FI_1` (`fk_cuenta_id`),
  KEY `establecimiento_FI_1` (`fk_establecimiento_id`),
  KEY `provincia_FI_1` (`fk_provincia_id`),
  KEY `tipodocumento_Fl_1` (`fk_tipodocumento_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `alumno`
--


/*!40000 ALTER TABLE `alumno` DISABLE KEYS */;
LOCK TABLES `alumno` WRITE;
INSERT INTO `alumno` VALUES (1,'HÃ©ctor','GÃ³mez','1996-03-20 00:00:00','22345666','corodoba 2222','LanÃºs','1822',1,'4323-2663','M','hsanchez@tes.com',1,400,1,1,2,6,1,1,1),(5,'Bubi','Gonzalez','0000-00-00 00:00:00','121244','salta 522','cap. fed','1871',1,'1546778673','M','bubi@dalerojo.com',0,1000,0,0,2,3,0,0,1),(6,'Vladimir','Di Fiore','2006-10-09 00:00:00','22345654','salta 522','cap. fed','',1,'43224333','M','',0,0,0,0,2,4,0,1,1),(7,'Veronica','Xhardez','1977-10-07 00:00:00','25345768','moreno 432','cap. fed','2234',1,'5435-532423','F','verox@verox.com.ar',0,1000,1,0,2,5,0,1,1),(8,'Laura','Xhardez','1980-10-09 00:00:00','27345654','moreno 432','cap. fed','1822',1,'4332323232','F','laura@verox.com.ar',0,1000,1,0,2,5,0,1,1),(10,'Mariana','GÃ³mez','1995-05-15 00:00:00','39.598.50','Salta 522 1ero','Buenos Aires','C1074AAL',1,'4383-2876','F','mgomez@gmail.com',1,400,1,1,2,6,0,0,1),(11,'Daniel Alejandro','Blazquez','1995-08-31 00:00:00','96.369.24','JosÃ© MartÃ­ 1655','Buenos Aires','-',1,'4637-4045','M','-',1,500,0,0,2,7,0,0,1),(12,'JosÃ© MarÃ­a','Rosa','0000-00-00 00:00:00','222222222','333333333333','333333333333','311111111111',1,'','M','',0,0,0,0,2,3,0,0,1),(13,'Juan Raul','Solano','0000-00-00 00:00:00','','','','',1,'','M','',0,0,0,0,2,0,0,0,1),(14,'JosÃ© Luis','Di Biase','0000-00-00 00:00:00','22345666','aaaaaaaaa','wwwwwwwwwww','22222222222',2,'','M','',0,0,0,0,2,0,0,0,0),(15,'Marcelo','Tinelli','1970-11-06 00:00:00','10104367','','','',0,'','M','',0,0,0,0,2,0,0,0,1),(16,'jorge','gomez','1975-12-12 00:00:00','23456654','','','',1,'','M','',0,0,0,0,2,5,0,0,1);
UNLOCK TABLES;
/*!40000 ALTER TABLE `alumno` ENABLE KEYS */;

--
-- Table structure for table `anio`
--

DROP TABLE IF EXISTS `anio`;
CREATE TABLE `anio` (
  `id` int(11) NOT NULL auto_increment,
  `fk_establecimiento_id` int(11) NOT NULL default '0',
  `descripcion` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`id`),
  KEY `establecimiento_FI_1` (`fk_establecimiento_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `anio`
--


/*!40000 ALTER TABLE `anio` DISABLE KEYS */;
LOCK TABLES `anio` WRITE;
INSERT INTO `anio` VALUES (1,2,'Sala de 2 aÃ±os'),(2,2,'Sala de 3 aÃ±os'),(3,2,'Sala de 4 aÃ±os'),(4,2,'Preescolar'),(5,2,'Primer grado'),(6,2,'Segundo Grado '),(7,2,'Tercer Grado'),(8,2,'Cuarto Grado'),(9,2,'Quinto grado'),(10,2,'Sexto Grado'),(11,2,'SÃ©ptimo grado');
UNLOCK TABLES;
/*!40000 ALTER TABLE `anio` ENABLE KEYS */;

--
-- Table structure for table `asistencia`
--

DROP TABLE IF EXISTS `asistencia`;
CREATE TABLE `asistencia` (
  `id` int(11) NOT NULL auto_increment,
  `fk_alumno_id` int(11) NOT NULL,
  `fk_tipoasistencia_id` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `alumno_FI_1` (`fk_alumno_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `asistencia`
--


/*!40000 ALTER TABLE `asistencia` DISABLE KEYS */;
LOCK TABLES `asistencia` WRITE;
INSERT INTO `asistencia` VALUES (1241,5,1,'2006-12-02 00:00:00'),(1242,1,2,'2006-12-02 00:00:00'),(1243,1,2,'2006-12-03 00:00:00'),(1246,5,1,'2006-12-01 00:00:00'),(1247,1,1,'2006-12-01 00:00:00'),(1248,8,3,'2006-12-01 00:00:00'),(1250,7,3,'2006-12-18 00:00:00'),(1251,7,1,'2006-12-31 00:00:00'),(1252,7,2,'2007-01-01 00:00:00');
UNLOCK TABLES;
/*!40000 ALTER TABLE `asistencia` ENABLE KEYS */;

--
-- Table structure for table `boletin_actividades`
--

DROP TABLE IF EXISTS `boletin_actividades`;
CREATE TABLE `boletin_actividades` (
  `id` int(11) NOT NULL auto_increment,
  `fk_escalanota_id` int(11) NOT NULL default '0',
  `fk_alumno_id` int(11) NOT NULL default '0',
  `fk_actividad_id` int(11) NOT NULL default '0',
  `fk_periodo_id` int(11) NOT NULL default '0',
  `observacion` longblob NOT NULL,
  `fecha` datetime NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `escalanota_FI_1` (`fk_escalanota_id`),
  KEY `alumno_FI_1` (`fk_alumno_id`),
  KEY `actividad_FI_1` (`fk_actividad_id`),
  KEY `periodo_FI_1` (`fk_periodo_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `boletin_actividades`
--


/*!40000 ALTER TABLE `boletin_actividades` DISABLE KEYS */;
LOCK TABLES `boletin_actividades` WRITE;
INSERT INTO `boletin_actividades` VALUES (33,1,1,1,1,'','2006-11-01 00:00:00'),(34,4,1,1,2,'','2006-11-01 00:00:00'),(35,4,1,1,5,'','2006-11-01 00:00:00'),(36,6,1,1,6,'','2006-11-01 00:00:00'),(37,7,1,1,7,'','2006-11-01 00:00:00'),(38,1,5,1,1,'','2006-11-01 00:00:00'),(39,4,5,1,2,'','2006-11-01 00:00:00'),(40,0,5,1,5,'','2006-11-01 00:00:00'),(41,6,5,1,6,'','2006-11-01 00:00:00'),(42,7,5,1,7,'','2006-11-01 00:00:00'),(55,1,1,2,1,'','2006-11-01 00:00:00'),(56,4,5,2,1,'','2006-11-01 00:00:00'),(57,1,1,3,1,'','2006-11-08 00:00:00'),(58,1,1,3,2,'','2006-11-08 00:00:00'),(59,1,1,3,5,'','2006-11-08 00:00:00'),(60,1,1,3,6,'','2006-11-08 00:00:00'),(61,1,1,3,7,'','2006-11-08 00:00:00'),(62,0,5,3,1,'','2006-11-08 00:00:00'),(63,0,5,3,2,'','2006-11-08 00:00:00'),(64,0,5,3,5,'','2006-11-08 00:00:00'),(65,0,5,3,6,'','2006-11-08 00:00:00'),(66,0,5,3,7,'','2006-11-08 00:00:00'),(67,1,6,1,1,'','2006-11-22 00:00:00'),(68,0,6,1,2,'','2006-11-22 00:00:00'),(69,0,6,1,5,'','2006-11-22 00:00:00'),(70,0,6,1,6,'','2006-11-22 00:00:00'),(71,0,6,1,7,'','2006-11-22 00:00:00'),(72,4,7,1,1,'','2006-11-22 00:00:00'),(73,0,7,1,2,'','2006-11-22 00:00:00'),(74,0,7,1,5,'','2006-11-22 00:00:00'),(75,0,7,1,6,'','2006-11-22 00:00:00'),(76,0,7,1,7,'','2006-11-22 00:00:00');
UNLOCK TABLES;
/*!40000 ALTER TABLE `boletin_actividades` ENABLE KEYS */;

--
-- Table structure for table `boletin_conceptual`
--

DROP TABLE IF EXISTS `boletin_conceptual`;
CREATE TABLE `boletin_conceptual` (
  `id` int(11) NOT NULL auto_increment,
  `fk_escalanota_id` int(11) NOT NULL default '0',
  `fk_alumno_id` int(11) NOT NULL default '0',
  `fk_concepto_id` int(11) NOT NULL default '0',
  `fk_periodo_id` int(11) NOT NULL default '0',
  `observacion` longblob NOT NULL,
  `fecha` datetime NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `escalanota_FI_1` (`fk_escalanota_id`),
  KEY `alumno_FI_1` (`fk_alumno_id`),
  KEY `concepto_FI_1` (`fk_concepto_id`),
  KEY `periodo_FI_1` (`fk_periodo_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `boletin_conceptual`
--


/*!40000 ALTER TABLE `boletin_conceptual` DISABLE KEYS */;
LOCK TABLES `boletin_conceptual` WRITE;
INSERT INTO `boletin_conceptual` VALUES (35,1,1,1,1,'','2006-11-01 00:00:00'),(36,0,1,1,2,'','2006-11-01 00:00:00'),(37,0,1,1,5,'','2006-11-01 00:00:00'),(38,0,1,1,6,'','2006-11-01 00:00:00'),(39,0,1,1,7,'','2006-11-01 00:00:00'),(40,1,5,1,1,'','2006-11-01 00:00:00'),(41,0,5,1,2,'','2006-11-01 00:00:00'),(42,0,5,1,5,'','2006-11-01 00:00:00'),(43,0,5,1,6,'','2006-11-01 00:00:00'),(44,0,5,1,7,'','2006-11-01 00:00:00'),(156,5,6,1,2,'yyyyyyyyyyyy','2006-11-01 00:00:00'),(157,0,6,1,5,'','2006-11-01 00:00:00'),(158,0,6,1,6,'','2006-11-01 00:00:00'),(159,0,6,1,7,'','2006-11-01 00:00:00'),(161,0,7,1,2,'','2006-11-01 00:00:00'),(162,0,7,1,5,'','2006-11-01 00:00:00'),(163,0,7,1,6,'','2006-11-01 00:00:00'),(164,0,7,1,7,'','2006-11-01 00:00:00'),(165,1,6,1,1,'swsss22222222','2006-11-01 00:00:00'),(166,1,7,1,1,'vvvvvvvvvvvvvvvvv3333333','2006-11-01 00:00:00'),(167,1,1,3,1,'','2006-11-01 00:00:00'),(168,1,5,3,1,'','2006-11-01 00:00:00'),(171,5,1,4,1,'','2006-11-08 00:00:00'),(172,0,1,4,2,'aaaaa','2006-11-08 00:00:00'),(173,4,1,4,5,'','2006-11-08 00:00:00'),(174,0,1,4,6,'bbbbbb','2006-11-08 00:00:00'),(175,7,1,4,7,'','2006-11-08 00:00:00'),(176,0,5,4,1,'','2006-11-08 00:00:00'),(177,0,5,4,2,'','2006-11-08 00:00:00'),(178,0,5,4,5,'','2006-11-08 00:00:00'),(179,0,5,4,6,'','2006-11-08 00:00:00'),(180,0,5,4,7,'','2006-11-08 00:00:00'),(181,0,1,5,1,'Nada','2006-11-08 00:00:00'),(182,0,1,5,2,'Nada','2006-11-08 00:00:00'),(183,0,1,5,5,'Nada','2006-11-08 00:00:00'),(184,0,1,5,6,'Nada','2006-11-08 00:00:00'),(185,0,1,5,7,'Nada','2006-11-08 00:00:00'),(186,0,5,5,1,'','2006-11-08 00:00:00'),(187,0,5,5,2,'','2006-11-08 00:00:00'),(188,0,5,5,5,'','2006-11-08 00:00:00'),(189,0,5,5,6,'','2006-11-08 00:00:00'),(190,0,5,5,7,'','2006-11-08 00:00:00'),(191,0,1,6,1,'Basicamente en todo','2006-11-08 00:00:00'),(192,0,1,6,2,'Basicamente en todo','2006-11-08 00:00:00'),(193,0,1,6,5,'Basicamente en todo','2006-11-08 00:00:00'),(194,0,1,6,6,'Basicamente en todo','2006-11-08 00:00:00'),(195,0,1,6,7,'Basicamente en todo','2006-11-08 00:00:00'),(196,0,5,6,1,'Uso de Linux','2006-11-08 00:00:00'),(197,0,5,6,2,'','2006-11-08 00:00:00'),(198,0,5,6,5,'','2006-11-08 00:00:00'),(199,0,5,6,6,'','2006-11-08 00:00:00'),(200,0,5,6,7,'','2006-11-08 00:00:00');
UNLOCK TABLES;
/*!40000 ALTER TABLE `boletin_conceptual` ENABLE KEYS */;

--
-- Table structure for table `calendariovacunacion`
--

DROP TABLE IF EXISTS `calendariovacunacion`;
CREATE TABLE `calendariovacunacion` (
  `id` int(11) NOT NULL auto_increment,
  `nombre` varchar(128) NOT NULL,
  `descripcion` varchar(255) default NULL,
  `periodo` varchar(128) default NULL,
  `observacion` varchar(255) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `calendariovacunacion`
--


/*!40000 ALTER TABLE `calendariovacunacion` DISABLE KEYS */;
LOCK TABLES `calendariovacunacion` WRITE;
INSERT INTO `calendariovacunacion` VALUES (3,'BCG (1era Dosis)','Tuberculosis','ReciÃ©n nacido',''),(4,'BCG (refuerzo)','Tuberculosis','6 aÃ±os',NULL),(6,'HA (dosis)','Hepatitis A','12 meses',NULL),(7,'HB (1era Dosis)','Hepatitis B','ReciÃ©n nacido',NULL),(8,'HB (2da Dosis)','Hepatitis B','2 meses',NULL),(9,'HB (3ra Dosis)','Hepatitis B','6 meses',NULL),(10,'HB (Iniciar o completar esquema de tres dosis)','Hepatitis B','11 aÃ±os',NULL),(11,'CuÃ¡druple (1era Dosis)','(DTP-Hib) difteria, tÃ©tanos, pertussis, Haemophilus influenzae b.','2 meses',''),(12,'CuÃ¡druple (2da Dosis)','(DTP-Hib) difteria, tÃ©tanos, pertussis, Haemophilus influenzae b.','4 meses',NULL),(13,'CuÃ¡druple (3ra Dosis)','(DTP-Hib) difteria, tÃ©tanos, pertussis, Haemophilus influenzae b.','6 meses',NULL),(14,'CuÃ¡druple (4ta Dosis)','(DTP-Hib) difteria, tÃ©tanos, pertussis, Haemophilus influenzae b.','18 meses',NULL),(15,'Sabin (1era Dosis)','(OPV) Vacuna PoliomelÃ­tica Oral','2 meses',NULL),(16,'Sabin (2da Dosis)','(OPV) Vacuna PoliomelÃ­tica Oral','4 meses',NULL),(17,'Sabin (3ra Dosis)','(OPV) Vacuna PoliomelÃ­tica Oral','6 meses',NULL),(18,'Sabin (4ta Dosis)','(OPV) Vacuna PoliomelÃ­tica Oral','18 meses',NULL),(19,'Sabin (Refuerzo)','(OPV) Vacuna PoliomelÃ­tica Oral','6 aÃ±os',NULL),(20,'Triple bacteriana (Refuerzo)','(DTP) Difteria, tÃ©tanos, pertussis','6 aÃ±os',NULL),(21,'Triple Viral (1era Dosis)','(SRP) SarampiÃ³n, rubÃ©ola, parotiditis','12 meses',NULL),(22,'Triple Viral (2da Dosis)','(SRP) SarampiÃ³n, rubÃ©ola, parotiditis','6 aÃ±os',NULL),(23,'Triple Viral (Refuerzo)','(SRP) SarampiÃ³n, rubÃ©ola, parotiditis','11 aÃ±os',NULL),(24,'Doble Viral (dosis)','(SR) SarampiÃ³n, RubÃ©ola.','Puerperio o post-aborto inmediato.',NULL),(25,'Doble Bacteriana (Refuerzo 1)','(dT) Difteria, TÃ©tanos.','16 aÃ±os',NULL),(26,'Doble Bacteriana (Refuerzos)','(dT) Difteria, TÃ©tanos.','Cada 10 aÃ±os',NULL);
UNLOCK TABLES;
/*!40000 ALTER TABLE `calendariovacunacion` ENABLE KEYS */;

--
-- Table structure for table `cargobaja`
--

DROP TABLE IF EXISTS `cargobaja`;
CREATE TABLE `cargobaja` (
  `id` int(11) NOT NULL auto_increment,
  `nombre` varchar(128) NOT NULL,
  `descripcion` varchar(255) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cargobaja`
--


/*!40000 ALTER TABLE `cargobaja` DISABLE KEYS */;
LOCK TABLES `cargobaja` WRITE;
INSERT INTO `cargobaja` VALUES (1,'JubilaciÃ³n','JubilaciÃ³n'),(2,'Ascenso','ascenso');
UNLOCK TABLES;
/*!40000 ALTER TABLE `cargobaja` ENABLE KEYS */;

--
-- Table structure for table `ciclolectivo`
--

DROP TABLE IF EXISTS `ciclolectivo`;
CREATE TABLE `ciclolectivo` (
  `id` int(11) NOT NULL auto_increment,
  `fk_establecimiento_id` int(11) NOT NULL,
  `fecha_inicio` datetime NOT NULL,
  `fecha_fin` datetime NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `actual` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`id`),
  KEY `establecimiento_FI_1` (`fk_establecimiento_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ciclolectivo`
--


/*!40000 ALTER TABLE `ciclolectivo` DISABLE KEYS */;
LOCK TABLES `ciclolectivo` WRITE;
INSERT INTO `ciclolectivo` VALUES (1,2,'2006-01-02 00:00:00','2006-12-12 00:00:00','2005',1),(2,2,'2006-07-04 00:00:00','2006-07-11 00:00:00','2006',0),(3,2,'2006-09-04 00:00:00','2007-02-05 00:00:00','2002',0),(4,2,'2006-10-18 00:00:00','2006-10-18 00:00:00','2007',0),(5,2,'0000-00-00 00:00:00','0000-00-00 00:00:00','2008',0);
UNLOCK TABLES;
/*!40000 ALTER TABLE `ciclolectivo` ENABLE KEYS */;

--
-- Table structure for table `concepto`
--

DROP TABLE IF EXISTS `concepto`;
CREATE TABLE `concepto` (
  `id` int(11) NOT NULL auto_increment,
  `fk_establecimiento_id` int(11) NOT NULL default '0',
  `descripcion` varchar(255) default NULL,
  `nombre` varchar(128) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `establecimiento_FI_1` (`fk_establecimiento_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `concepto`
--


/*!40000 ALTER TABLE `concepto` DISABLE KEYS */;
LOCK TABLES `concepto` WRITE;
INSERT INTO `concepto` VALUES (1,2,'Colaboracion','Colaboracion'),(2,2,'Responsabilidad',''),(3,2,'Comportamiento',''),(4,2,'Aseo y presentacion',''),(5,2,'Se destaca en',''),(6,2,'Tiene dificultades en','');
UNLOCK TABLES;
/*!40000 ALTER TABLE `concepto` ENABLE KEYS */;

--
-- Table structure for table `conceptobaja`
--

DROP TABLE IF EXISTS `conceptobaja`;
CREATE TABLE `conceptobaja` (
  `id` int(11) NOT NULL auto_increment,
  `nombre` varchar(128) NOT NULL,
  `descripcion` varchar(255) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `conceptobaja`
--


/*!40000 ALTER TABLE `conceptobaja` DISABLE KEYS */;
LOCK TABLES `conceptobaja` WRITE;
INSERT INTO `conceptobaja` VALUES (1,'Enfermedad','Enfermedad'),(2,'Cambio de escuela','Cambio de escuela'),(3,'EnviÃ³ a Escuela Especial','EnviÃ³ a Escuela Especial');
UNLOCK TABLES;
/*!40000 ALTER TABLE `conceptobaja` ENABLE KEYS */;

--
-- Table structure for table `cuenta`
--

DROP TABLE IF EXISTS `cuenta`;
CREATE TABLE `cuenta` (
  `id` int(11) NOT NULL auto_increment,
  `nombre` varchar(128) NOT NULL default '',
  `razon_social` varchar(128) NOT NULL default '',
  `cuit` varchar(20) NOT NULL default '',
  `direccion` varchar(128) NOT NULL default '',
  `ciudad` varchar(128) NOT NULL,
  `codigo_postal` varchar(20) NOT NULL,
  `fk_provincia_id` int(11) NOT NULL default '0',
  `fk_tipoiva_id` int(11) NOT NULL default '0',
  `telefono` varchar(20) default NULL,
  PRIMARY KEY  (`id`),
  KEY `iva_FI_1` (`fk_tipoiva_id`),
  KEY `provincia_FI_1` (`fk_provincia_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cuenta`
--


/*!40000 ALTER TABLE `cuenta` DISABLE KEYS */;
LOCK TABLES `cuenta` WRITE;
INSERT INTO `cuenta` VALUES (3,'KaruchaCta','KaruchaRS','254455654','Salta 3333','Cap. Fed.','1833',1,2,'43212218'),(4,'Vlad','Di Fiore','34-343434355-9','Belgrano 2355','cap. fed','1899',1,1,'43210987'),(5,'Cta TEST2','cta de prueba','34-4343535353-9','av. de mayo 533','cap. fed','',1,1,''),(6,'Flia GÃ³mez','-','-','Salta 522 1ero','Ciudad de Buenos Aires','C1074AAL',1,1,'4383-2876'),(7,'Flia BlÃ¡zquez','-','-','JosÃ© MartÃ­ 1655','Buenos Aires','-',1,1,'4637-4045'),(8,'Flia Bragado Rivero','-','-','San Pedrito 1284','Buenos Aires','-',1,3,'4611-6845');
UNLOCK TABLES;
/*!40000 ALTER TABLE `cuenta` ENABLE KEYS */;

--
-- Table structure for table `distritoescolar`
--

DROP TABLE IF EXISTS `distritoescolar`;
CREATE TABLE `distritoescolar` (
  `id` int(11) NOT NULL auto_increment,
  `nombre` varchar(128) NOT NULL,
  `direccion` varchar(128) default NULL,
  `telefono` varchar(20) default NULL,
  `ciudad` varchar(128) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `distritoescolar`
--


/*!40000 ALTER TABLE `distritoescolar` DISABLE KEYS */;
LOCK TABLES `distritoescolar` WRITE;
INSERT INTO `distritoescolar` VALUES (1,'N-8','Aguirre 3345','4321-2134','Buenos Aires'),(2,'NÂº 4','Suarez 1131','4302-2823 / 4301-355','Buenos Aires'),(3,'NÂº 5','Avda. M. A. Montes de Oca 439 - 1er Piso','4307-4676 / 6753 / 4','Buenos Aires'),(4,'NÂº 6','Humberto Primo 3187','4957-1563','Buenos Aires'),(5,'NÂº 9','GÃ¼emes 4615','4773-7453','Buenos Aires'),(6,'NÂº 11','','','Buenos Aires'),(7,'NÂº 13','Manuel Artigas 5951','4682-9849/0566','Buenos Aires'),(8,'NÂº 14','Bolivia 2571','4581-6248','Buenos Aires'),(9,'NÂº 15','GalvÃ¡n 3463 ',' 4541-0212 / 4541-26','Buenos Aires'),(10,'NÂº 16','JosÃ© Cubas 3789 ',' 4502-0182/6664/2165','Buenos Aires'),(11,'NÂº 19','Cnel. Pagola 4181','4923-1276 / 6228','Buenos Aires'),(12,'NÂº 20','Fonrouge 346','4641-1796 / 7247','Buenos Aires'),(13,'NÂº 21','Cnel. M. Chilavert 6090','4605-1597 / 5860','Buenos Aires');
UNLOCK TABLES;
/*!40000 ALTER TABLE `distritoescolar` ENABLE KEYS */;

--
-- Table structure for table `division`
--

DROP TABLE IF EXISTS `division`;
CREATE TABLE `division` (
  `id` int(11) NOT NULL auto_increment,
  `fk_anio_id` int(11) NOT NULL default '0',
  `descripcion` varchar(255) NOT NULL default '',
  `fk_turnos_id` int(11) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `anio_FI_1` (`fk_anio_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `division`
--


/*!40000 ALTER TABLE `division` DISABLE KEYS */;
LOCK TABLES `division` WRITE;
INSERT INTO `division` VALUES (1,5,'B',14),(2,1,'Rojo',1),(3,2,'Verde',1),(4,2,'Amarillo',1),(5,3,'Violeta',1),(6,3,'Pardo',1),(7,4,'MarrÃ³n',1),(8,4,'Pardo',1),(9,2,'Azul',14);
UNLOCK TABLES;
/*!40000 ALTER TABLE `division` ENABLE KEYS */;

--
-- Table structure for table `docente`
--

DROP TABLE IF EXISTS `docente`;
CREATE TABLE `docente` (
  `id` int(11) NOT NULL auto_increment,
  `apellido` varchar(128) NOT NULL,
  `nombre` varchar(128) NOT NULL,
  `fk_tipodocumento_id` int(11) NOT NULL default '0',
  `nro_documento` varchar(16) NOT NULL,
  `direccion` varchar(128) default NULL,
  `ciudad` varchar(128) default NULL,
  `codigo_postal` varchar(20) default NULL,
  `email` varchar(128) default NULL,
  `fk_provincia_id` int(11) NOT NULL default '0',
  `libreta_sanitaria` tinyint(1) NOT NULL default '0',
  `titulo` varchar(128) NOT NULL,
  `psicofisico` tinyint(1) NOT NULL default '0',
  `activo` tinyint(1) NOT NULL default '1',
  `telefono` varchar(20) default NULL,
  `sexo` char(1) NOT NULL default 'U',
  `fecha_nacimiento` datetime NOT NULL,
  `telefono_movil` varchar(20) default NULL,
  PRIMARY KEY  (`id`),
  KEY `tipodocumento_FI_1` (`fk_tipodocumento_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `docente`
--


/*!40000 ALTER TABLE `docente` DISABLE KEYS */;
LOCK TABLES `docente` WRITE;
INSERT INTO `docente` VALUES (1,'Di Biase','JosÃ© Luis',1,'26604711','Esquiu 1584 1','Lanus','1824','josx@interorganic.com.ar',1,1,'Carpintero en la UDL (Universidad de la Calle)',1,1,'4299-2345/2346','M','0000-00-00 00:00:00',''),(2,'Sanchez','Hector',1,'23456789','Salta 111','Marmol','1789','hsanchez@pressenter.com.ar',1,0,'zzzzzzzz',0,0,'155-160-3492','F','2006-11-15 00:00:00',''),(4,'zzzzzz','zzzzz',1,'11111112','22222','222222','2222','josx@interorganic.com.ar',1,1,'222',1,1,'','','0000-00-00 00:00:00',NULL),(5,'ffff','fffffff',1,'333333','ddddd','dddddd','3333','josx@interorganic.com.ar',2,1,'2222',1,1,'','','0000-00-00 00:00:00',NULL),(8,'rrrrr','rrrrrrr',1,'rrrr','rrrrrr','rrrrrr','333333','',1,1,'',1,1,'','','0000-00-00 00:00:00',NULL);
UNLOCK TABLES;
/*!40000 ALTER TABLE `docente` ENABLE KEYS */;

--
-- Table structure for table `docente_horario`
--

DROP TABLE IF EXISTS `docente_horario`;
CREATE TABLE `docente_horario` (
  `id` int(11) NOT NULL auto_increment,
  `fk_docente_id` int(11) NOT NULL,
  `fk_repeticion_id` int(11) NOT NULL,
  `hora_inicio` time NOT NULL,
  `hora_fin` time NOT NULL,
  `dia` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `docente_horario`
--


/*!40000 ALTER TABLE `docente_horario` DISABLE KEYS */;
LOCK TABLES `docente_horario` WRITE;
INSERT INTO `docente_horario` VALUES (1,0,1,'10:00:00','13:00:00',1),(2,0,2,'13:00:00','14:00:00',2),(3,0,3,'13:00:00','15:00:00',3),(4,0,4,'11:00:00','00:00:00',6),(12,2,1,'04:00:00','12:00:00',1),(14,2,1,'07:00:00','12:00:00',2),(15,2,1,'19:00:00','12:00:00',3),(16,2,4,'07:00:00','12:00:00',4),(17,1,1,'07:00:00','11:00:00',1),(18,1,1,'07:00:00','11:00:00',2),(19,1,1,'07:00:00','11:00:00',3),(20,1,1,'07:00:00','11:00:00',4),(21,1,1,'07:00:00','11:00:00',5),(22,2,1,'07:00:00','00:00:00',5),(30,1,3,'01:00:00','02:00:00',5);
UNLOCK TABLES;
/*!40000 ALTER TABLE `docente_horario` ENABLE KEYS */;

--
-- Table structure for table `escalanota`
--

DROP TABLE IF EXISTS `escalanota`;
CREATE TABLE `escalanota` (
  `id` int(11) NOT NULL auto_increment,
  `fk_establecimiento_id` int(11) NOT NULL default '0',
  `nombre` varchar(128) NOT NULL,
  `orden` int(11) NOT NULL,
  `aprobado` tinyint(1) NOT NULL default '0',
  `descripcion` varchar(255) default NULL,
  PRIMARY KEY  (`id`),
  KEY `establecimiento_FI_1` (`fk_establecimiento_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `escalanota`
--


/*!40000 ALTER TABLE `escalanota` DISABLE KEYS */;
LOCK TABLES `escalanota` WRITE;
INSERT INTO `escalanota` VALUES (1,2,'R',2,0,'qwwww'),(4,2,'B',3,1,NULL),(5,2,'M',1,0,NULL),(6,2,'MB',4,1,NULL),(7,2,'S',5,1,NULL),(8,3,'1',1,0,NULL),(9,3,'2',2,0,NULL),(10,3,'3',3,0,NULL),(11,3,'4',4,1,NULL),(12,3,'5',5,1,NULL),(13,3,'6',6,1,NULL),(14,3,'7',7,1,NULL),(15,3,'8',8,1,NULL),(16,3,'9',9,1,NULL),(17,3,'10',10,1,NULL);
UNLOCK TABLES;
/*!40000 ALTER TABLE `escalanota` ENABLE KEYS */;

--
-- Table structure for table `espacio`
--

DROP TABLE IF EXISTS `espacio`;
CREATE TABLE `espacio` (
  `id` int(11) NOT NULL auto_increment,
  `nombre` varchar(128) NOT NULL default '',
  `m2` float default NULL,
  `capacidad` varchar(255) default NULL,
  `descripcion` varchar(255) default NULL,
  `estado` varchar(255) default NULL,
  `fk_tipoespacio_id` int(11) default NULL,
  `fk_locacion_id` int(11) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `espacio_FI_1` (`fk_tipoespacio_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `espacio`
--


/*!40000 ALTER TABLE `espacio` DISABLE KEYS */;
LOCK TABLES `espacio` WRITE;
INSERT INTO `espacio` VALUES (2,'Aula 1er grado',25,'40','Aula de grado','Bueno',1,2),(3,'Laboratorio 1',30,'25','Laboratorio de fÃ­sica y quÃ­mica','Bueno',4,2),(5,'Patio cubierto',60,'300','Patio de formaciÃ³n y actividades comunes.','Muy bueno.',2,2),(6,'333333333',3333,'333','33333333','3333',1,3);
UNLOCK TABLES;
/*!40000 ALTER TABLE `espacio` ENABLE KEYS */;

--
-- Table structure for table `establecimiento`
--

DROP TABLE IF EXISTS `establecimiento`;
CREATE TABLE `establecimiento` (
  `id` int(11) NOT NULL auto_increment,
  `nombre` varchar(128) NOT NULL default '',
  `descripcion` varchar(255) default NULL,
  `fk_organizacion_id` int(11) NOT NULL,
  `fk_niveltipo_id` int(11) NOT NULL,
  `fk_distritoescolar_id` int(11) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `nivel_FI_1` (`fk_organizacion_id`),
  KEY `nivel_FI_2` (`fk_niveltipo_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `establecimiento`
--


/*!40000 ALTER TABLE `establecimiento` DISABLE KEYS */;
LOCK TABLES `establecimiento` WRITE;
INSERT INTO `establecimiento` VALUES (2,'JardÃ­n Mi Tortuguita','JardÃ­n Maternal y de Infantes',1,1,1),(3,'Escuela General Manuel Savio NÂº 23','Escuela Primaria (EGB 1 y 2)',1,2,1);
UNLOCK TABLES;
/*!40000 ALTER TABLE `establecimiento` ENABLE KEYS */;

--
-- Table structure for table `examen`
--

DROP TABLE IF EXISTS `examen`;
CREATE TABLE `examen` (
  `id` int(11) NOT NULL auto_increment,
  `fk_escalanota_id` int(11) NOT NULL default '0',
  `fk_alumno_id` int(11) NOT NULL default '0',
  `fk_actividad_id` int(11) NOT NULL default '0',
  `fk_periodo_id` int(11) NOT NULL default '0',
  `nombre` varchar(255) NOT NULL default '',
  `observacion` longblob NOT NULL,
  `fecha` datetime NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `escalanota_FI_1` (`fk_escalanota_id`),
  KEY `alumno_FI_1` (`fk_alumno_id`),
  KEY `actividad_FI_1` (`fk_actividad_id`),
  KEY `periodo_FI_1` (`fk_periodo_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `examen`
--


/*!40000 ALTER TABLE `examen` DISABLE KEYS */;
LOCK TABLES `examen` WRITE;
UNLOCK TABLES;
/*!40000 ALTER TABLE `examen` ENABLE KEYS */;

--
-- Table structure for table `feriado`
--

DROP TABLE IF EXISTS `feriado`;
CREATE TABLE `feriado` (
  `id` int(11) NOT NULL auto_increment,
  `fecha` datetime NOT NULL,
  `nombre` varchar(128) NOT NULL,
  `repeticion_anual` tinyint(1) NOT NULL default '0',
  `inamovible` tinyint(1) NOT NULL default '0',
  `fk_ciclolectivo_id` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feriado`
--


/*!40000 ALTER TABLE `feriado` DISABLE KEYS */;
LOCK TABLES `feriado` WRITE;
INSERT INTO `feriado` VALUES (1,'2006-01-01 00:00:00','Inicio de aÃ±o',0,1,1),(2,'2006-05-01 00:00:00','DÃ­a del trabajador',1,0,1),(3,'1976-03-24 00:00:00','Feriado Nacional - Cumple Karucha',1,0,1),(4,'2006-12-08 00:00:00','DÃ­a de la Virgen',1,1,2);
UNLOCK TABLES;
/*!40000 ALTER TABLE `feriado` ENABLE KEYS */;

--
-- Table structure for table `horarioescolar`
--

DROP TABLE IF EXISTS `horarioescolar`;
CREATE TABLE `horarioescolar` (
  `id` int(11) NOT NULL auto_increment,
  `nombre` varchar(128) NOT NULL,
  `descripcion` varchar(255) default NULL,
  `dia` int(11) NOT NULL,
  `hora_inicio` time NOT NULL,
  `hora_fin` time NOT NULL,
  `fk_horarioescolartipo_id` int(11) NOT NULL,
  `fk_establecimiento_id` int(11) NOT NULL,
  `fk_turnos_id` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `horarioescolar`
--


/*!40000 ALTER TABLE `horarioescolar` DISABLE KEYS */;
LOCK TABLES `horarioescolar` WRITE;
INSERT INTO `horarioescolar` VALUES (1,'1er Recreo','1er Recreo',8,'09:05:00','09:20:00',1,2,1),(2,'1ra','1ra',8,'08:20:00','09:05:00',2,2,1),(3,'2da','2da',8,'09:20:00','10:05:00',2,2,1),(4,'3a','3a',1,'10:05:00','10:50:00',2,2,1),(5,'2do recreo','2do recreo',8,'10:50:00','11:05:00',1,2,1),(6,'4ta Hora','4ta Hora',1,'11:05:00','11:50:00',2,2,1),(7,'3er recreo','3er recreo',1,'11:50:00','12:05:00',1,2,1),(8,'5ta Hora','5ta  Hora',1,'12:05:00','12:50:00',2,2,1),(9,'6ta Hora','6ta Hora',1,'12:50:00','13:30:00',2,2,1),(10,'Bandera','aaaaaaaaa',1,'14:00:00','14:30:00',1,2,15),(11,'aaa','bbbb',1,'10:28:00','14:28:00',1,3,17),(12,'7ma','7ma',1,'13:45:00','14:45:00',2,2,1);
UNLOCK TABLES;
/*!40000 ALTER TABLE `horarioescolar` ENABLE KEYS */;

--
-- Table structure for table `horarioescolartipo`
--

DROP TABLE IF EXISTS `horarioescolartipo`;
CREATE TABLE `horarioescolartipo` (
  `id` int(11) NOT NULL auto_increment,
  `nombre` varchar(128) NOT NULL,
  `descripcion` varchar(255) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `horarioescolartipo`
--


/*!40000 ALTER TABLE `horarioescolartipo` DISABLE KEYS */;
LOCK TABLES `horarioescolartipo` WRITE;
INSERT INTO `horarioescolartipo` VALUES (1,'Recreo','Recreo'),(2,'Horas cÃ¡tedra','Horas catedra'),(3,'Comedor','');
UNLOCK TABLES;
/*!40000 ALTER TABLE `horarioescolartipo` ENABLE KEYS */;

--
-- Table structure for table `legajoadjunto`
--

DROP TABLE IF EXISTS `legajoadjunto`;
CREATE TABLE `legajoadjunto` (
  `fk_legajopedagogico_id` int(11) NOT NULL,
  `fk_adjunto_id` int(11) NOT NULL,
  KEY `adjunto_FI_1` (`fk_adjunto_id`),
  KEY `legajopedagogico_FI_1` (`fk_legajopedagogico_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `legajoadjunto`
--


/*!40000 ALTER TABLE `legajoadjunto` DISABLE KEYS */;
LOCK TABLES `legajoadjunto` WRITE;
INSERT INTO `legajoadjunto` VALUES (1,4),(7,11),(1,10),(9,12);
UNLOCK TABLES;
/*!40000 ALTER TABLE `legajoadjunto` ENABLE KEYS */;

--
-- Table structure for table `legajocategoria`
--

DROP TABLE IF EXISTS `legajocategoria`;
CREATE TABLE `legajocategoria` (
  `id` int(11) NOT NULL auto_increment,
  `descripcion` varchar(255) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `legajocategoria`
--


/*!40000 ALTER TABLE `legajocategoria` DISABLE KEYS */;
LOCK TABLES `legajocategoria` WRITE;
INSERT INTO `legajocategoria` VALUES (1,'Gabinete - EOE (Equipo de OrientaciÃ³n Escolar)'),(2,'Seguimiento docente.');
UNLOCK TABLES;
/*!40000 ALTER TABLE `legajocategoria` ENABLE KEYS */;

--
-- Table structure for table `legajopedagogico`
--

DROP TABLE IF EXISTS `legajopedagogico`;
CREATE TABLE `legajopedagogico` (
  `id` int(11) NOT NULL auto_increment,
  `fk_alumno_id` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `resumen` longblob NOT NULL,
  `texto` longblob NOT NULL,
  `fecha` datetime NOT NULL,
  `fk_usuario_id` int(11) NOT NULL,
  `fk_legajocategoria_id` int(11) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `legajocategoria_FI_1` (`fk_legajocategoria_id`),
  KEY `alumno_FI_1` (`fk_alumno_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `legajopedagogico`
--


/*!40000 ALTER TABLE `legajopedagogico` DISABLE KEYS */;
LOCK TABLES `legajopedagogico` WRITE;
INSERT INTO `legajopedagogico` VALUES (1,6,'Test titulo','aaa4444444','No cumplio con la norma de conducta establecida por el establecimiento','2006-10-12 00:00:00',5,1),(3,6,'3333','3333','3333','2006-10-03 00:00:00',5,1),(4,6,'5','232323','232323','2006-10-03 00:00:00',5,2),(5,6,'11111','222222','3333333','2006-10-02 00:00:00',5,2),(7,1,'Entrada a direccion','Escupio a la maestra de lengua','dsdsajkoajsidasjaisjd\r\ndsadsadsadsa\r\nSDASdasadsdasadsasadsadasdsadsad','2006-11-14 00:00:00',5,1),(8,1,'Test33','Test::111','prueba','2006-12-05 00:00:00',5,2),(9,1,'zzzz','333333','333333','2006-12-04 00:00:00',5,1),(11,6,'222222222222','','','2006-12-19 00:00:00',5,0);
UNLOCK TABLES;
/*!40000 ALTER TABLE `legajopedagogico` ENABLE KEYS */;

--
-- Table structure for table `locacion`
--

DROP TABLE IF EXISTS `locacion`;
CREATE TABLE `locacion` (
  `id` int(11) NOT NULL auto_increment,
  `nombre` varchar(128) NOT NULL default '',
  `descripcion` varchar(255) default NULL,
  `direccion` varchar(128) NOT NULL default '',
  `ciudad` varchar(128) NOT NULL default '',
  `codigo_postal` varchar(20) default NULL,
  `telefono` varchar(20) default NULL,
  `fax` varchar(20) default NULL,
  `encargado` varchar(32) default NULL,
  `encargado_telefono` varchar(20) default NULL,
  `fk_provincia_id` int(11) NOT NULL,
  `fk_tipolocacion_id` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `locacion`
--


/*!40000 ALTER TABLE `locacion` DISABLE KEYS */;
LOCK TABLES `locacion` WRITE;
INSERT INTO `locacion` VALUES (1,'Sede','Edificio de tres pisos.','San Pedrito 1137','Ciudad de Buenos Aires','1406','4612-6188','4612-6188','Enrique Samar ','desconocido',1,2),(2,'Planta Fija Capital federal','Planta Fija Capital federal','Salta 451','Buenos Aires','1403','4444-4444','5555-5555','Bubi','2222-2222',1,1),(3,'Anexo Rosario','Anexo en la Ciudad de Rosario','Bulevard OroÃ±o 2234','Rosario','S2000GHS','0341-421155','0341-421155','Gomez Flores MIlton','9999-9999',2,1),(5,'33333333','33333','3333333','3333333333','33333','3333','33333','33333','3333333',1,1);
UNLOCK TABLES;
/*!40000 ALTER TABLE `locacion` ENABLE KEYS */;

--
-- Table structure for table `menu`
--

DROP TABLE IF EXISTS `menu`;
CREATE TABLE `menu` (
  `id` int(11) NOT NULL auto_increment,
  `nombre` varchar(255) NOT NULL default '',
  `link` varchar(255) NOT NULL default '',
  `perm` varchar(255) NOT NULL default '',
  `fk_padre_menu_id` int(11) default NULL,
  `orden` int(11) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `fi_nombre` (`nombre`),
  KEY `padre_menu_FI_1` (`fk_padre_menu_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--


/*!40000 ALTER TABLE `menu` DISABLE KEYS */;
LOCK TABLES `menu` WRITE;
INSERT INTO `menu` VALUES (1,'-- Menu Raiz --','#','',0,0),(2,'General','#','',10,0),(3,'Familia','#','',1,10),(4,'Alumnos','#','',1,20),(5,'Docentes','#','',1,30),(6,'Gesti&oacute;n Escolar','#','',1,40),(7,'Calendarios y Horarios','#','',1,50),(8,'Locaciones y Espacios','#','',1,60),(9,'Informes y Consultas','#','',1,70),(10,'AdministraciÃ³n','#','',1,0),(11,'Preferencias Generales','preferencia','preferencia',10,100),(12,'Seguridad','#','usuario',10,200),(13,'Usuario','usuario/','usuario',12,0),(14,'Rol','rol/','rol',12,0),(15,'Permiso','permiso/','permiso',12,0),(16,'MÃ³dulo','modulo/','modulo',12,0),(18,'Definir OrganizaciÃ³n','organizacion/edit?id=1','organizacion',2,0),(19,'Definir Establecimiento','establecimiento','establecimiento',2,0),(20,'Definir Distritos Escolares','distritoescolar','distrito',71,0),(21,'Definir Provincias','provincia','provincia',71,0),(22,'Definir PaÃ­ses','pais/','pais',71,0),(23,'Definir CategorÃ­a de IVA','tipoiva/','tipoiva',71,0),(24,'Cuentas','cuenta/','cuenta',3,0),(25,'Ir a cuenta desde alumno','alumno/','alumno',3,0),(26,'Responsables','responsable/','responsable',3,0),(27,'EvaluaciÃ³n','#','',4,50),(29,'-','#','',10,50),(30,'Salir','seguridad/logout','',1,90),(31,'Definir Escala de notas','escalanota','',27,0),(32,'Definir items a evaluar (conceptos)','concepto','',27,0),(33,'Legajos de alumnos','#','',4,20),(34,'Items de Legajo PedagÃ³gico','legajocategoria','legajocategoria',33,10),(35,'Ingresar Alumno','alumno/create','alumno',4,0),(36,'Ver legajo completo por alumno','legajopedagogico','legajopedagogico',33,0),(37,'Legajos de Docentes','docente','',5,0),(38,'Configuraciones previas','#','',5,100),(39,'Tipos de docentes','tipodocente','tipodocente',38,0),(40,'Motivos de baja','cargobaja','cargobaja',38,0),(41,'Ingresar Materias/Actividades','actividad','',6,10),(42,'Definir Grados/AÃ±os','anio','',6,0),(43,'Actividades por grado/aÃ±o','relAnioActividad','',6,20),(44,'Definir Secciones/Divisiones','division','',6,30),(45,'Definir feriados del aÃ±o','feriado','',7,20),(46,'Ciclo lectivo (actual)','ciclolectivo','',7,10),(47,'Horario Escolar','#','',7,0),(48,'Tipos de intevalos de horario escolar','horarioescolartipo','',47,0),(49,'Calendario de vacunas','calendariovacunacion','',7,30),(50,'Horario segun...?','#','',7,100),(51,'...docentes','calendario/busquedaDocente','',50,0),(52,'...secciÃ³n/divisiÃ³n','calendario/busquedaDivision','',50,0),(53,'Listado de Locaciones','locacion','',8,0),(54,'Definir tipos de Locaciones','tipolocacion','',76,0),(55,'Listado de Espacios x LocaciÃ³n','espacios','',8,10),(56,'Definir tipos de Espacios','tipoespacio','',76,10),(57,'Definir horario clases','horarioescolar','',47,0),(58,'Constancia Alumno Regular','#','',9,0),(59,'Constancia para Salario Familiar','#','',9,0),(60,'Constancia Egreso 7mo','#','',9,0),(61,'-','','',9,10),(62,'Asistencias','#','',4,100),(63,'MatrÃ­cula Inicial?','','',9,100),(64,'MatrÃ­cula Final?','','',9,100),(65,'Ayuda','#','',1,80),(67,'Indice...','ayuda/','',65,0),(68,'CrÃ©ditos','creditos/','',65,0),(69,'Generar Horario por secciÃ³n/divisiÃ³n','calendario','calendario',47,0),(71,'Configuraciones Previas','#','',10,10),(72,'Definir tipo de bajas','conceptobaja','conceptobaja',33,30),(73,'Ingresar ausentes por secciÃ³n/divisiÃ³n','asistencia','asistencia',62,10),(74,'Definir tipo de asistencia','tipoasistencia','tipoasistencia',62,20),(75,'Definir turnos','turnos','turnos',47,50),(76,'Configuraciones previas','#','',8,200),(78,'Asignar alumno a divisiÃ³n','relAlumnoDivision/create','relAlumnoDivision',6,0),(79,'Listado de Materias por docente','relActividadDocente','relActividadDocente',5,300),(80,'Boletines','#','',27,100),(81,'Conepto','boletin/listConcepto','boletinconcepto',80,0),(82,'Notas','boletin/list','boletinnotas',80,1),(83,'Definir tipo de documentos','tipodocumento','tipodocumento',71,100);
UNLOCK TABLES;
/*!40000 ALTER TABLE `menu` ENABLE KEYS */;

--
-- Table structure for table `modulo`
--

DROP TABLE IF EXISTS `modulo`;
CREATE TABLE `modulo` (
  `id` int(11) NOT NULL auto_increment,
  `nombre` varchar(128) NOT NULL default '',
  `titulo` varchar(128) default NULL,
  `descripcion` varchar(255) default NULL,
  `activo` tinyint(1) NOT NULL default '1',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `modulo`
--


/*!40000 ALTER TABLE `modulo` DISABLE KEYS */;
LOCK TABLES `modulo` WRITE;
INSERT INTO `modulo` VALUES (1,'Usuario','Usuarios','Administracion de usuarios',1),(2,'Actividad','Actividades','',1),(3,'Alumno','','',1),(4,'Anio','','',1),(5,'Calendario','','',1),(6,'Calendariovacunacion','','',1),(7,'Ciclolectivo','','',1),(8,'Concepto','','',1),(9,'Creditos','','',1),(10,'Cuenta','','',1),(11,'Division','','',1),(12,'Docente','','',1),(13,'DocenteHorario','','',1),(14,'Escalanota','','',1),(15,'Establecimiento','','',1),(16,'Feriado','','',1),(17,'Legajocategoria','','',1),(18,'Locacion','','',1),(19,'Modulo','','',1),(20,'Organizacion','','',1),(21,'Pais','','',1),(22,'Permiso','','',1),(23,'Preferencia','','',1),(24,'Provincia','','',1),(25,'RelActividadDocente','','',1),(26,'RelAnioActividad','','',1),(27,'RelCalendariovacunacionAlumno','','',1),(28,'Responsable','','',1),(29,'Rol','','',1),(30,'Seguridad','','',1),(31,'Tipoiva','','',1),(32,'Turnos','','',1),(33,'Default','','',1),(34,'Tipolocacion','','',1),(35,'Espacios','','',1),(36,'Tipoespacio','','',1),(37,'Cargoabaja','','',1),(38,'Conceptobaja','','',1),(39,'Distritoescolar','','',1),(40,'Horarioescolar','','',1),(41,'Horarioescolartipo','','',1),(42,'Tipodocente','','',1),(43,'tipoasistencia','tipoasistencia','Asistencia',1),(44,'legajopedagogico','legajopdagogico','',1),(45,'Boletin','Boletin','',1),(46,'tipodocumento','Tipo de Documento','Tipo de Documento',1);
UNLOCK TABLES;
/*!40000 ALTER TABLE `modulo` ENABLE KEYS */;

--
-- Table structure for table `niveltipo`
--

DROP TABLE IF EXISTS `niveltipo`;
CREATE TABLE `niveltipo` (
  `id` int(11) NOT NULL auto_increment,
  `nombre` varchar(128) NOT NULL default '',
  `descripcion` varchar(255) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `niveltipo`
--


/*!40000 ALTER TABLE `niveltipo` DISABLE KEYS */;
LOCK TABLES `niveltipo` WRITE;
INSERT INTO `niveltipo` VALUES (1,'JardÃ­n','JardÃ­n'),(2,'Primaria','Primaria'),(3,'Secundaria','Secundaria');
UNLOCK TABLES;
/*!40000 ALTER TABLE `niveltipo` ENABLE KEYS */;

--
-- Table structure for table `organizacion`
--

DROP TABLE IF EXISTS `organizacion`;
CREATE TABLE `organizacion` (
  `id` int(11) NOT NULL auto_increment,
  `nombre` varchar(128) NOT NULL default '',
  `descripcion` varchar(255) default NULL,
  `razon_social` varchar(128) NOT NULL default '',
  `cuit` varchar(20) NOT NULL default '',
  `direccion` varchar(128) NOT NULL default '',
  `ciudad` varchar(128) NOT NULL,
  `codigo_postal` varchar(20) NOT NULL,
  `fk_provincia_id` int(11) NOT NULL default '0',
  `fk_tipoiva_id` int(11) NOT NULL default '0',
  `telefono` varchar(20) default NULL,
  PRIMARY KEY  (`id`),
  KEY `iva_FI_1` (`fk_tipoiva_id`),
  KEY `provincia_FI_1` (`fk_provincia_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `organizacion`
--


/*!40000 ALTER TABLE `organizacion` DISABLE KEYS */;
LOCK TABLES `organizacion` WRITE;
INSERT INTO `organizacion` VALUES (1,'Educaciones','Empresa privada de educaciÃ³n. ','Educacione$ S.A.','27-25598709-2','Salta 522 1er piso','Buenos Aires','C1074AAL',1,1,'4383-2876');
UNLOCK TABLES;
/*!40000 ALTER TABLE `organizacion` ENABLE KEYS */;

--
-- Table structure for table `pais`
--

DROP TABLE IF EXISTS `pais`;
CREATE TABLE `pais` (
  `id` int(11) NOT NULL auto_increment,
  `nombre_largo` varchar(128) NOT NULL default '',
  `nombre_corto` varchar(32) NOT NULL default '',
  `orden` int(2) unsigned NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pais`
--


/*!40000 ALTER TABLE `pais` DISABLE KEYS */;
LOCK TABLES `pais` WRITE;
INSERT INTO `pais` VALUES (1,'Argentina','ARG',1),(2,'Brasil','BRA',2);
UNLOCK TABLES;
/*!40000 ALTER TABLE `pais` ENABLE KEYS */;

--
-- Table structure for table `periodo`
--

DROP TABLE IF EXISTS `periodo`;
CREATE TABLE `periodo` (
  `id` int(11) NOT NULL auto_increment,
  `fk_ciclolectivo_id` int(11) NOT NULL,
  `fecha_inicio` datetime NOT NULL,
  `fecha_fin` datetime NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `ciclolectivo_FI_1` (`fk_ciclolectivo_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `periodo`
--


/*!40000 ALTER TABLE `periodo` DISABLE KEYS */;
LOCK TABLES `periodo` WRITE;
INSERT INTO `periodo` VALUES (1,1,'2006-07-17 00:00:00','2006-07-18 00:00:00','Primer Trimestre'),(2,1,'2006-07-12 00:00:00','2006-07-29 00:00:00','Segundo Trimestre'),(3,2,'2006-07-04 00:00:00','2006-07-18 00:00:00','aaaaaaaa'),(4,2,'2006-07-04 00:00:00','2006-07-18 00:00:00','aaaaaaaa'),(5,1,'2006-08-28 00:00:00','2006-08-30 00:00:00','Tercer Trimestre'),(6,1,'2006-07-13 00:00:00','2006-07-27 00:00:00','Vacaciones de Invierno'),(7,1,'2006-11-27 00:00:00','2007-03-05 00:00:00','Vacaciones de Verano'),(8,3,'2006-03-12 00:00:00','2006-06-12 00:00:00','Primer Cuatrimestre'),(9,3,'2006-07-15 00:00:00','2006-07-30 00:00:00','Vacaciones de Invierno');
UNLOCK TABLES;
/*!40000 ALTER TABLE `periodo` ENABLE KEYS */;

--
-- Table structure for table `permiso`
--

DROP TABLE IF EXISTS `permiso`;
CREATE TABLE `permiso` (
  `id` int(11) NOT NULL auto_increment,
  `nombre` varchar(128) NOT NULL default '',
  `descripcion` varchar(255) default NULL,
  `credencial` varchar(32) default NULL,
  `fk_modulo_id` int(11) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `permiso_FI_1` (`fk_modulo_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `permiso`
--


/*!40000 ALTER TABLE `permiso` DISABLE KEYS */;
LOCK TABLES `permiso` WRITE;
INSERT INTO `permiso` VALUES (1,'usuario','Modulo de usuario','usuario',1),(2,'permiso','Administrar permisos de usuario','permiso',22),(5,'modulo','AdministraciÃ³n de mÃ³dulos','modulo',1),(6,'actividad','','actividad',2),(7,'alumno','','alumno',3),(8,'anio','','anio',4),(9,'calendario','','calendario',5),(10,'calendariovacunacion','','calendariovacunacion',6),(11,'ciclolectivo','','ciclolectivo',7),(12,'concepto','','concepto',8),(13,'creditos','','creditos',9),(14,'cuenta','','cuenta',10),(15,'division','','division',11),(16,'docente','','docente',12),(17,'docenteHorario','','docenteHorario',13),(18,'escalanota','','escalanota',14),(19,'establecimiento','','establecimiento',15),(20,'feriado','','feriado',16),(21,'legajocategoria','','legajocategoria',17),(22,'locacion','','locacion',18),(25,'pais','','pais',21),(27,'preferencia','','preferencia',23),(28,'provincia','','provincia',24),(29,'relActividadDocente','','relActividadDocente',25),(30,'relAnioActividad','','relAnioActividad',26),(31,'relCalendariovacunacionAlumno','','relCalendariovacunacionAlumno',27),(32,'responsable','','responsable',28),(33,'rol','','rol',29),(34,'tipoiva','','tipoiva',31),(35,'turnos','','turnos',32),(36,'tipolocacion','','tipolocacion',34),(37,'tipoespacio','','tipoespacio',36),(38,'espacio','','espacio',35),(40,'cargoabaja','','cargobaja',37),(41,'conceptobaja','','conceptobaja',38),(42,'distritoescolar','','distritoescolar',39),(43,'horarioescolar','','horarioescolar',40),(44,'horarioescolartipo','','horarioescolartipo',41),(45,'tipodocente','','tipodocente',42),(46,'organizacion','','organizacion',20),(47,'Asistencia','Asistencia','asistencia',43),(48,'distrito','distrito','distrito',39),(49,'distritoescolar','Distrito Escolar','distritoescolar',39),(50,'legajopedagogico','','legajopedagogico',1),(51,'tipoasistencia','','tipoasistencia',43),(52,'formatofecha','','formatofecha',1),(53,'relLocacionEspacio','','relLocacionEspacio',1),(54,'relAlumnoDivision','','relAlumnoDivision',1),(55,'boletin','','boletin',1),(56,'boletinconcepto','boletinconcepto','boletinconcepto',45),(57,'boletinnotas','boletinnotas','boletinnotas',45),(58,'tipodocumento','tipodocumento','tipodocumento',46);
UNLOCK TABLES;
/*!40000 ALTER TABLE `permiso` ENABLE KEYS */;

--
-- Table structure for table `preferencia`
--

DROP TABLE IF EXISTS `preferencia`;
CREATE TABLE `preferencia` (
  `id` int(11) NOT NULL auto_increment,
  `nombre` varchar(128) NOT NULL default '',
  `valor_por_defecto` varchar(128) default NULL,
  `activo` tinyint(1) NOT NULL default '1',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `preferencia`
--


/*!40000 ALTER TABLE `preferencia` DISABLE KEYS */;
LOCK TABLES `preferencia` WRITE;
INSERT INTO `preferencia` VALUES (1,'Fecha','DDMMYYYY',1),(2,'Moneda ','$ (pesos)',1);
UNLOCK TABLES;
/*!40000 ALTER TABLE `preferencia` ENABLE KEYS */;

--
-- Table structure for table `provincia`
--

DROP TABLE IF EXISTS `provincia`;
CREATE TABLE `provincia` (
  `id` int(11) NOT NULL auto_increment,
  `nombre_corto` varchar(32) NOT NULL,
  `nombre_largo` varchar(128) NOT NULL,
  `fk_pais_id` int(11) NOT NULL,
  `orden` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `provincia`
--


/*!40000 ALTER TABLE `provincia` DISABLE KEYS */;
LOCK TABLES `provincia` WRITE;
INSERT INTO `provincia` VALUES (1,'Bs. As.','Buenos Aires',1,0),(2,'Sta Fe','Santa Fe',1,0);
UNLOCK TABLES;
/*!40000 ALTER TABLE `provincia` ENABLE KEYS */;

--
-- Table structure for table `rel_actividad_docente`
--

DROP TABLE IF EXISTS `rel_actividad_docente`;
CREATE TABLE `rel_actividad_docente` (
  `id` int(11) NOT NULL auto_increment,
  `fk_actividad_id` int(11) NOT NULL default '0',
  `fk_docente_id` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id`),
  KEY `docente_FI_1` (`fk_docente_id`),
  KEY `actividad_FI_1` (`fk_actividad_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rel_actividad_docente`
--


/*!40000 ALTER TABLE `rel_actividad_docente` DISABLE KEYS */;
LOCK TABLES `rel_actividad_docente` WRITE;
INSERT INTO `rel_actividad_docente` VALUES (1,1,2),(2,2,2),(4,3,2),(5,3,1),(6,2,1);
UNLOCK TABLES;
/*!40000 ALTER TABLE `rel_actividad_docente` ENABLE KEYS */;

--
-- Table structure for table `rel_alumno_division`
--

DROP TABLE IF EXISTS `rel_alumno_division`;
CREATE TABLE `rel_alumno_division` (
  `id` int(11) NOT NULL auto_increment,
  `fk_division_id` int(11) NOT NULL default '0',
  `fk_alumno_id` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id`),
  KEY `alumno_FI_1` (`fk_alumno_id`),
  KEY `division_FI_1` (`fk_division_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rel_alumno_division`
--


/*!40000 ALTER TABLE `rel_alumno_division` DISABLE KEYS */;
LOCK TABLES `rel_alumno_division` WRITE;
INSERT INTO `rel_alumno_division` VALUES (1,1,1),(2,1,5),(3,3,8),(4,2,6),(5,2,7),(6,8,1),(7,1,8),(8,7,7),(9,1,6),(10,6,6);
UNLOCK TABLES;
/*!40000 ALTER TABLE `rel_alumno_division` ENABLE KEYS */;

--
-- Table structure for table `rel_anio_actividad`
--

DROP TABLE IF EXISTS `rel_anio_actividad`;
CREATE TABLE `rel_anio_actividad` (
  `id` int(11) NOT NULL auto_increment,
  `fk_anio_id` int(11) NOT NULL default '0',
  `fk_actividad_id` int(11) NOT NULL default '0',
  `horas` decimal(10,2) NOT NULL default '0.00',
  PRIMARY KEY  (`id`),
  KEY `establecimiento_FI_1` (`fk_actividad_id`),
  KEY `anio_FI_1` (`fk_anio_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rel_anio_actividad`
--


/*!40000 ALTER TABLE `rel_anio_actividad` DISABLE KEYS */;
LOCK TABLES `rel_anio_actividad` WRITE;
INSERT INTO `rel_anio_actividad` VALUES (1,1,1,'10.00'),(2,1,2,'20.00'),(3,1,3,'30.00'),(4,2,1,'5.00'),(5,2,2,'10.00'),(6,3,3,'10.00'),(7,4,3,'30.00'),(8,5,1,'10.00'),(9,1,1,'20.00'),(10,0,0,'10.00'),(11,0,0,'-2.00'),(12,1,2,'0.00');
UNLOCK TABLES;
/*!40000 ALTER TABLE `rel_anio_actividad` ENABLE KEYS */;

--
-- Table structure for table `rel_calendariovacunacion_alumno`
--

DROP TABLE IF EXISTS `rel_calendariovacunacion_alumno`;
CREATE TABLE `rel_calendariovacunacion_alumno` (
  `id` int(11) NOT NULL auto_increment,
  `fk_alumno_id` int(11) NOT NULL,
  `fk_calendariovacunacion_id` int(11) NOT NULL,
  `observacion` varchar(255) default NULL,
  `comprobante` tinyint(1) default '0',
  `fecha` datetime default NULL,
  PRIMARY KEY  (`id`),
  KEY `calendariovacunacion_FI_1` (`fk_calendariovacunacion_id`),
  KEY `alumno_FI_1` (`fk_alumno_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rel_calendariovacunacion_alumno`
--


/*!40000 ALTER TABLE `rel_calendariovacunacion_alumno` DISABLE KEYS */;
LOCK TABLES `rel_calendariovacunacion_alumno` WRITE;
INSERT INTO `rel_calendariovacunacion_alumno` VALUES (2,5,3,'xxxxx',1,'2006-09-04 00:00:00'),(3,1,3,'ok',1,'2006-09-01 00:00:00'),(4,6,11,'debe comprobante',0,'0000-00-00 00:00:00'),(5,1,3,'',1,'0000-00-00 00:00:00');
UNLOCK TABLES;
/*!40000 ALTER TABLE `rel_calendariovacunacion_alumno` ENABLE KEYS */;

--
-- Table structure for table `rel_division_actividad_docente`
--

DROP TABLE IF EXISTS `rel_division_actividad_docente`;
CREATE TABLE `rel_division_actividad_docente` (
  `id` int(11) NOT NULL auto_increment,
  `fk_division_id` int(11) default '0',
  `fk_actividad_id` int(11) NOT NULL default '0',
  `fk_repeticion_id` int(11) default '0',
  `fecha_inicio` datetime NOT NULL,
  `fecha_fin` datetime NOT NULL,
  `hora_inicio` time NOT NULL,
  `hora_fin` time NOT NULL,
  `fk_docente_id` int(11) default NULL,
  `fk_cargobaja_id` int(11) default NULL,
  `fk_tipodocente_id` int(11) default NULL,
  PRIMARY KEY  (`id`),
  KEY `division_FI_1` (`fk_division_id`),
  KEY `actividad_FI_1` (`fk_actividad_id`),
  KEY `repeticion_FI_1` (`fk_repeticion_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rel_division_actividad_docente`
--


/*!40000 ALTER TABLE `rel_division_actividad_docente` DISABLE KEYS */;
LOCK TABLES `rel_division_actividad_docente` WRITE;
INSERT INTO `rel_division_actividad_docente` VALUES (25,7,3,1,'0000-00-00 00:00:00','0000-00-00 00:00:00','00:00:00','00:00:00',1,NULL,NULL),(26,7,3,1,'2006-09-12 00:00:00','2006-09-12 00:00:00','09:20:00','10:05:00',1,NULL,NULL),(32,1,2,1,'2006-09-15 00:00:00','2006-09-15 00:00:00','09:20:00','10:05:00',1,NULL,NULL),(33,7,3,1,'2006-09-11 00:00:00','2006-09-11 00:00:00','11:05:00','11:50:00',2,NULL,NULL),(35,7,3,1,'2006-09-11 00:00:00','2006-09-11 00:00:00','12:50:00','13:30:00',2,NULL,NULL),(36,7,3,1,'2006-09-11 00:00:00','2006-09-11 00:00:00','08:20:00','09:05:00',1,NULL,NULL),(39,7,3,1,'2006-09-11 00:00:00','2006-09-11 00:00:00','09:20:00','10:05:00',2,NULL,NULL);
UNLOCK TABLES;
/*!40000 ALTER TABLE `rel_division_actividad_docente` ENABLE KEYS */;

--
-- Table structure for table `rel_docente_establecimiento`
--

DROP TABLE IF EXISTS `rel_docente_establecimiento`;
CREATE TABLE `rel_docente_establecimiento` (
  `fk_docente_id` int(11) NOT NULL,
  `fk_establecimiento_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rel_docente_establecimiento`
--


/*!40000 ALTER TABLE `rel_docente_establecimiento` DISABLE KEYS */;
LOCK TABLES `rel_docente_establecimiento` WRITE;
INSERT INTO `rel_docente_establecimiento` VALUES (1,2),(2,2),(6,2),(7,2);
UNLOCK TABLES;
/*!40000 ALTER TABLE `rel_docente_establecimiento` ENABLE KEYS */;

--
-- Table structure for table `rel_establecimiento_locacion`
--

DROP TABLE IF EXISTS `rel_establecimiento_locacion`;
CREATE TABLE `rel_establecimiento_locacion` (
  `id` int(11) NOT NULL auto_increment,
  `fk_establecimiento_id` int(11) NOT NULL,
  `fk_locacion_id` int(11) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `rel_nivel_locacion_FI_1` (`fk_establecimiento_id`),
  KEY `rel_nivel_locacion_FI_2` (`fk_locacion_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rel_establecimiento_locacion`
--


/*!40000 ALTER TABLE `rel_establecimiento_locacion` DISABLE KEYS */;
LOCK TABLES `rel_establecimiento_locacion` WRITE;
INSERT INTO `rel_establecimiento_locacion` VALUES (37,2,3),(38,2,2),(39,2,1),(40,3,3),(41,3,2),(42,3,1);
UNLOCK TABLES;
/*!40000 ALTER TABLE `rel_establecimiento_locacion` ENABLE KEYS */;

--
-- Table structure for table `rel_rol_permiso`
--

DROP TABLE IF EXISTS `rel_rol_permiso`;
CREATE TABLE `rel_rol_permiso` (
  `id` int(11) NOT NULL auto_increment,
  `fk_rol_id` int(11) NOT NULL,
  `fk_permiso_id` int(11) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `rel_rol_permiso_FI_1` (`fk_rol_id`),
  KEY `rel_rol_permiso_FI_2` (`fk_permiso_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rel_rol_permiso`
--


/*!40000 ALTER TABLE `rel_rol_permiso` DISABLE KEYS */;
LOCK TABLES `rel_rol_permiso` WRITE;
INSERT INTO `rel_rol_permiso` VALUES (1,0,1),(2,0,3),(3,0,2),(19,1,1),(20,1,2),(21,1,5),(22,1,6),(23,1,7),(24,1,8),(25,1,9),(26,1,10),(27,1,11),(28,1,12),(29,1,13),(30,1,14),(31,1,15),(32,1,16),(33,1,17),(34,1,18),(35,1,19),(36,1,20),(37,1,21),(38,1,22),(39,1,23),(40,1,24),(41,1,25),(42,1,26),(43,1,27),(44,1,28),(45,1,29),(46,1,30),(47,1,31),(48,1,32),(49,1,33),(50,1,34),(51,1,35),(52,2,6),(53,2,7),(54,2,8),(55,2,9),(56,2,10),(57,2,11),(58,2,12),(59,2,13),(60,2,14),(61,2,15),(62,2,17),(63,2,16),(64,2,18),(65,2,19),(66,2,20),(67,2,21),(68,2,22),(69,2,24),(70,2,25),(71,2,27),(72,2,28),(73,2,29),(74,2,30),(75,2,31),(76,2,32),(77,2,34),(78,2,35);
UNLOCK TABLES;
/*!40000 ALTER TABLE `rel_rol_permiso` ENABLE KEYS */;

--
-- Table structure for table `rel_usuario_permiso`
--

DROP TABLE IF EXISTS `rel_usuario_permiso`;
CREATE TABLE `rel_usuario_permiso` (
  `id` int(11) NOT NULL auto_increment,
  `fk_usuario_id` int(11) NOT NULL,
  `fk_permiso_id` int(11) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `rel_usuario_permiso_FI_1` (`fk_usuario_id`),
  KEY `rel_usuario_permiso_FI_2` (`fk_permiso_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rel_usuario_permiso`
--


/*!40000 ALTER TABLE `rel_usuario_permiso` DISABLE KEYS */;
LOCK TABLES `rel_usuario_permiso` WRITE;
INSERT INTO `rel_usuario_permiso` VALUES (1734,8,47),(1735,8,6),(1736,8,7),(1737,8,8),(1738,8,55),(1739,8,9),(1740,8,10),(1741,8,40),(1742,8,11),(1743,8,12),(1744,8,41),(1745,8,13),(1746,8,14),(1747,8,48),(1748,8,42),(1749,8,49),(1750,8,15),(1751,8,17),(1752,8,16),(1753,8,18),(1754,8,38),(1755,8,19),(1756,8,20),(1757,8,52),(1758,8,43),(1759,8,44),(1760,8,21),(1761,8,50),(1762,8,22),(1763,8,5),(1764,8,46),(1765,8,25),(1766,8,2),(1767,8,27),(1768,8,28),(1769,8,29),(1770,8,54),(1771,8,30),(1772,8,31),(1773,8,53),(1774,8,32),(1775,8,33),(1776,8,51),(1777,8,45),(1778,8,37),(1779,8,34),(1780,8,36),(1781,8,35),(1782,8,1),(1936,10,47),(1937,10,6),(1938,10,7),(1939,10,8),(1940,10,55),(1941,10,56),(1942,10,57),(1943,10,9),(1944,10,10),(1945,10,40),(1946,10,11),(1947,10,12),(1948,10,41),(1949,10,13),(1950,10,14),(1951,10,48),(1952,10,42),(1953,10,49),(1954,10,15),(1955,10,17),(1956,10,16),(1957,10,18),(1958,10,38),(1959,10,19),(1960,10,20),(1961,10,52),(1962,10,43),(1963,10,44),(1964,10,21),(1965,10,50),(1966,10,22),(1967,10,5),(1968,10,46),(1969,10,25),(1970,10,2),(1971,10,27),(1972,10,28),(1973,10,29),(1974,10,54),(1975,10,30),(1976,10,31),(1977,10,53),(1978,10,32),(1979,10,33),(1980,10,51),(1981,10,45),(1982,10,37),(1983,10,34),(1984,10,36),(1985,10,35),(1986,10,1),(1987,11,47),(1988,11,6),(1989,11,7),(1990,11,8),(1991,11,55),(1992,11,56),(1993,11,57),(1994,11,9),(1995,11,10),(1996,11,40),(1997,11,11),(1998,11,12),(1999,11,41),(2000,11,13),(2001,11,14),(2002,11,48),(2003,11,42),(2004,11,49),(2005,11,15),(2006,11,17),(2007,11,16),(2008,11,18),(2009,11,38),(2010,11,19),(2011,11,20),(2012,11,52),(2013,11,43),(2014,11,44),(2015,11,21),(2016,11,50),(2017,11,22),(2018,11,46),(2019,11,25),(2020,11,27),(2021,11,28),(2022,11,29),(2023,11,54),(2024,11,30),(2025,11,31),(2026,11,53),(2027,11,32),(2028,11,33),(2029,11,51),(2030,11,45),(2031,11,37),(2032,11,34),(2033,11,36),(2034,11,35),(2035,5,47),(2036,5,6),(2037,5,7),(2038,5,8),(2039,5,55),(2040,5,56),(2041,5,57),(2042,5,9),(2043,5,10),(2044,5,40),(2045,5,11),(2046,5,12),(2047,5,41),(2048,5,13),(2049,5,14),(2050,5,48),(2051,5,42),(2052,5,49),(2053,5,15),(2054,5,17),(2055,5,16),(2056,5,18),(2057,5,38),(2058,5,19),(2059,5,20),(2060,5,52),(2061,5,43),(2062,5,44),(2063,5,21),(2064,5,50),(2065,5,22),(2066,5,5),(2067,5,46),(2068,5,25),(2069,5,2),(2070,5,27),(2071,5,28),(2072,5,29),(2073,5,54),(2074,5,30),(2075,5,31),(2076,5,53),(2077,5,32),(2078,5,33),(2079,5,51),(2080,5,45),(2081,5,58),(2082,5,37),(2083,5,34),(2084,5,36),(2085,5,35),(2086,5,1),(2087,1,47),(2088,1,6),(2089,1,7),(2090,1,8),(2091,1,55),(2092,1,56),(2093,1,57),(2094,1,9),(2095,1,10),(2096,1,40),(2097,1,11),(2098,1,12),(2099,1,41),(2100,1,13),(2101,1,14),(2102,1,48),(2103,1,42),(2104,1,49),(2105,1,15),(2106,1,17),(2107,1,16),(2108,1,18),(2109,1,38),(2110,1,19),(2111,1,20),(2112,1,52),(2113,1,43),(2114,1,44),(2115,1,21),(2116,1,50),(2117,1,22),(2118,1,5),(2119,1,46),(2120,1,25),(2121,1,2),(2122,1,27),(2123,1,28),(2124,1,29),(2125,1,54),(2126,1,30),(2127,1,31),(2128,1,53),(2129,1,32),(2130,1,33),(2131,1,51),(2132,1,45),(2133,1,58),(2134,1,37),(2135,1,34),(2136,1,36),(2137,1,35),(2138,1,1),(2139,4,47),(2140,4,6),(2141,4,7),(2142,4,8),(2143,4,55),(2144,4,56),(2145,4,57),(2146,4,9),(2147,4,10),(2148,4,40),(2149,4,11),(2150,4,12),(2151,4,41),(2152,4,13),(2153,4,14),(2154,4,48),(2155,4,42),(2156,4,49),(2157,4,15),(2158,4,17),(2159,4,16),(2160,4,18),(2161,4,38),(2162,4,19),(2163,4,20),(2164,4,52),(2165,4,43),(2166,4,44),(2167,4,21),(2168,4,50),(2169,4,22),(2170,4,5),(2171,4,46),(2172,4,25),(2173,4,2),(2174,4,27),(2175,4,28),(2176,4,29),(2177,4,54),(2178,4,30),(2179,4,31),(2180,4,53),(2181,4,32),(2182,4,33),(2183,4,51),(2184,4,45),(2185,4,58),(2186,4,37),(2187,4,34),(2188,4,36),(2189,4,35),(2190,4,1);
UNLOCK TABLES;
/*!40000 ALTER TABLE `rel_usuario_permiso` ENABLE KEYS */;

--
-- Table structure for table `rel_usuario_preferencia`
--

DROP TABLE IF EXISTS `rel_usuario_preferencia`;
CREATE TABLE `rel_usuario_preferencia` (
  `id` int(11) NOT NULL auto_increment,
  `fk_usuario_id` int(11) NOT NULL,
  `fk_preferencia_id` int(11) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `rel_usuario_preferencia_FI_1` (`fk_usuario_id`),
  KEY `rel_usuario_preferencia_FI_2` (`fk_preferencia_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rel_usuario_preferencia`
--


/*!40000 ALTER TABLE `rel_usuario_preferencia` DISABLE KEYS */;
LOCK TABLES `rel_usuario_preferencia` WRITE;
UNLOCK TABLES;
/*!40000 ALTER TABLE `rel_usuario_preferencia` ENABLE KEYS */;

--
-- Table structure for table `repeticion`
--

DROP TABLE IF EXISTS `repeticion`;
CREATE TABLE `repeticion` (
  `id` int(11) NOT NULL auto_increment,
  `descripcion` varchar(255) NOT NULL default '',
  `orden` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `repeticion`
--


/*!40000 ALTER TABLE `repeticion` DISABLE KEYS */;
LOCK TABLES `repeticion` WRITE;
INSERT INTO `repeticion` VALUES (1,'Semanal',1),(2,'Semanal Intercalado',2),(3,'Quincenal',3),(4,'Mensual',4);
UNLOCK TABLES;
/*!40000 ALTER TABLE `repeticion` ENABLE KEYS */;

--
-- Table structure for table `responsable`
--

DROP TABLE IF EXISTS `responsable`;
CREATE TABLE `responsable` (
  `id` int(11) NOT NULL auto_increment,
  `nombre` varchar(128) NOT NULL default '',
  `apellido` varchar(128) NOT NULL,
  `direccion` varchar(128) default NULL,
  `ciudad` varchar(128) default NULL,
  `codigo_postal` varchar(20) default NULL,
  `fk_provincia_id` int(11) NOT NULL default '0',
  `telefono` varchar(20) default NULL,
  `nro_documento` varchar(16) NOT NULL,
  `sexo` char(1) NOT NULL default '',
  `email` varchar(128) default NULL,
  `telefono_movil` varchar(20) default NULL,
  `relacion` varchar(128) NOT NULL,
  `autorizacion_retiro` tinyint(1) NOT NULL default '0',
  `fk_cuenta_id` int(11) NOT NULL default '0',
  `fk_tipodocumento_id` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id`),
  KEY `cuenta_FI_1` (`fk_cuenta_id`),
  KEY `provincia_FI_1` (`fk_provincia_id`),
  KEY `tipodocumento_Fl_1` (`fk_tipodocumento_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `responsable`
--


/*!40000 ALTER TABLE `responsable` DISABLE KEYS */;
LOCK TABLES `responsable` WRITE;
INSERT INTO `responsable` VALUES (1,'Jorge','Gonzalez','chacabuco 2233','Cap.Fed.','1122',1,'12321321321','44455566','M','gonzalezbubi@ciudadinternet.com.ar','1554346578','Baby Sister',0,3,1),(3,'Juan MartÃ­n','Capristo','AzcuÃ©naga 280','Ciudad de Buenos Aires','1870',1,'4220-1329','25.590.789','M','juancapristo@hotmail.com','155 444 1156','Primo',0,4,1),(4,'Mauricio ','BlÃ¡zquez','JosÃ© MartÃ­ 1655','Buenos Aires','--',1,'4637-4045','20.256.255','M','mblazquez@gmail.com','155 515 3799','Padre',0,7,1);
UNLOCK TABLES;
/*!40000 ALTER TABLE `responsable` ENABLE KEYS */;

--
-- Table structure for table `rol`
--

DROP TABLE IF EXISTS `rol`;
CREATE TABLE `rol` (
  `id` int(11) NOT NULL auto_increment,
  `nombre` varchar(128) NOT NULL default '',
  `descripcion` varchar(255) default NULL,
  `activo` tinyint(1) NOT NULL default '1',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rol`
--


/*!40000 ALTER TABLE `rol` DISABLE KEYS */;
LOCK TABLES `rol` WRITE;
INSERT INTO `rol` VALUES (1,'Administrador','Administrador del sistema',1),(2,'Usuario Todo','Comun',1);
UNLOCK TABLES;
/*!40000 ALTER TABLE `rol` ENABLE KEYS */;

--
-- Table structure for table `tipoasistencia`
--

DROP TABLE IF EXISTS `tipoasistencia`;
CREATE TABLE `tipoasistencia` (
  `id` int(11) NOT NULL auto_increment,
  `nombre` varchar(10) NOT NULL,
  `descripcion` varchar(255) default NULL,
  `grupo` varchar(30) default NULL,
  `defecto` int(11) NOT NULL default '0',
  `valor` decimal(4,2) NOT NULL default '0.99',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tipoasistencia`
--


/*!40000 ALTER TABLE `tipoasistencia` DISABLE KEYS */;
LOCK TABLES `tipoasistencia` WRITE;
INSERT INTO `tipoasistencia` VALUES (1,'P','Presente','Asistencia',1,'1.00'),(2,'A','Ausente','Inasistencia',0,'1.00'),(3,'I','Impuntualidad','Asistencia',0,'0.00');
UNLOCK TABLES;
/*!40000 ALTER TABLE `tipoasistencia` ENABLE KEYS */;

--
-- Table structure for table `tipodocente`
--

DROP TABLE IF EXISTS `tipodocente`;
CREATE TABLE `tipodocente` (
  `id` int(11) NOT NULL auto_increment,
  `nombre` varchar(128) NOT NULL,
  `descripcion` varchar(255) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tipodocente`
--


/*!40000 ALTER TABLE `tipodocente` DISABLE KEYS */;
LOCK TABLES `tipodocente` WRITE;
INSERT INTO `tipodocente` VALUES (1,'Titular','Titular'),(2,'Suplente','Suplente');
UNLOCK TABLES;
/*!40000 ALTER TABLE `tipodocente` ENABLE KEYS */;

--
-- Table structure for table `tipodocumento`
--

DROP TABLE IF EXISTS `tipodocumento`;
CREATE TABLE `tipodocumento` (
  `id` int(11) NOT NULL auto_increment,
  `descripcion` varchar(255) default NULL,
  `orden` int(11) NOT NULL default '0',
  `nombre` varchar(128) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tipodocumento`
--


/*!40000 ALTER TABLE `tipodocumento` DISABLE KEYS */;
LOCK TABLES `tipodocumento` WRITE;
INSERT INTO `tipodocumento` VALUES (1,'Documento Nacional de Identidad',1,'DNI'),(2,'Libreta Civica',2,'LC'),(3,'Libreta de enrolamiento',3,'LE');
UNLOCK TABLES;
/*!40000 ALTER TABLE `tipodocumento` ENABLE KEYS */;

--
-- Table structure for table `tipoespacio`
--

DROP TABLE IF EXISTS `tipoespacio`;
CREATE TABLE `tipoespacio` (
  `id` int(11) NOT NULL auto_increment,
  `nombre` varchar(128) NOT NULL,
  `descripcion` varchar(255) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tipoespacio`
--


/*!40000 ALTER TABLE `tipoespacio` DISABLE KEYS */;
LOCK TABLES `tipoespacio` WRITE;
INSERT INTO `tipoespacio` VALUES (1,'Aula de grado/curso','Aula de dictado de materias bÃ¡sicas'),(2,'Patio ','Espacio de formacion y uso comÃºn.'),(3,'Aula especial','Aulas de dictado de materias especiales'),(4,'Laboratorio','Aula destinada a materias con infraestrucura especifica.'),(5,'Biblioteca ','Biblioteca del establecimiento.');
UNLOCK TABLES;
/*!40000 ALTER TABLE `tipoespacio` ENABLE KEYS */;

--
-- Table structure for table `tipoiva`
--

DROP TABLE IF EXISTS `tipoiva`;
CREATE TABLE `tipoiva` (
  `id` int(11) NOT NULL,
  `nombre` varchar(128) NOT NULL,
  `descripcion` varchar(255) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tipoiva`
--


/*!40000 ALTER TABLE `tipoiva` DISABLE KEYS */;
LOCK TABLES `tipoiva` WRITE;
INSERT INTO `tipoiva` VALUES (1,'Responsable Inscripto','responsable inscripto'),(2,'Monotributo','monotributo'),(3,'No inscripto','No inscrito al IVA');
UNLOCK TABLES;
/*!40000 ALTER TABLE `tipoiva` ENABLE KEYS */;

--
-- Table structure for table `tipolocacion`
--

DROP TABLE IF EXISTS `tipolocacion`;
CREATE TABLE `tipolocacion` (
  `id` int(11) NOT NULL auto_increment,
  `nombre` varchar(128) NOT NULL,
  `descripcion` varchar(255) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tipolocacion`
--


/*!40000 ALTER TABLE `tipolocacion` DISABLE KEYS */;
LOCK TABLES `tipolocacion` WRITE;
INSERT INTO `tipolocacion` VALUES (1,'Anexo','LocalizaciÃ³n dependiente de la sede, pero geogrÃ¡ficamente distinta.'),(2,'Sede','LocalizaciÃ³n donde se encuentra la mÃ¡xima autoridad pedagÃ³gica administrativa.');
UNLOCK TABLES;
/*!40000 ALTER TABLE `tipolocacion` ENABLE KEYS */;

--
-- Table structure for table `turnos`
--

DROP TABLE IF EXISTS `turnos`;
CREATE TABLE `turnos` (
  `id` int(11) NOT NULL auto_increment,
  `fk_ciclolectivo_id` int(11) NOT NULL,
  `hora_inicio` time NOT NULL,
  `hora_fin` time NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `ciclolectivo_FI_1` (`fk_ciclolectivo_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `turnos`
--


/*!40000 ALTER TABLE `turnos` DISABLE KEYS */;
LOCK TABLES `turnos` WRITE;
INSERT INTO `turnos` VALUES (1,1,'08:00:00','13:30:00','MaÃ±ana'),(4,0,'00:00:00','00:00:00',''),(5,0,'00:00:00','00:00:00',''),(7,0,'00:00:00','00:00:00',''),(8,0,'00:00:00','00:00:00',''),(9,0,'00:00:00','00:00:00',''),(14,1,'16:00:00','17:00:00','Tarde'),(15,1,'14:00:00','19:00:00','Noche'),(17,2,'01:00:00','02:00:00','tttttttttttt'),(21,2,'03:00:00','04:00:00','zzzzzzzzzz'),(22,2,'04:00:00','08:00:00','xxxx'),(24,3,'08:00:00','10:00:00','MaÃ±ana');
UNLOCK TABLES;
/*!40000 ALTER TABLE `turnos` ENABLE KEYS */;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE `usuario` (
  `id` int(11) NOT NULL auto_increment,
  `usuario` varchar(32) NOT NULL,
  `clave` varchar(48) NOT NULL default '',
  `correo_publico` tinyint(1) NOT NULL default '1',
  `email` varchar(128) default NULL,
  `activo` tinyint(1) NOT NULL default '1',
  `fecha_creado` datetime NOT NULL,
  `fecha_actualizado` datetime NOT NULL,
  `seguridad_pregunta` varchar(128) default NULL,
  `seguridad_respuesta` varchar(128) default NULL,
  `fk_establecimiento_id` int(11) NOT NULL,
  `borrado` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`id`),
  KEY `usuario_FI_1` (`fk_establecimiento_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usuario`
--


/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
LOCK TABLES `usuario` WRITE;
INSERT INTO `usuario` VALUES (1,'karucha','520e7dd06aa52cd0c89b8c03146120d3',1,'hsanchez@pressenter.com.ar',1,'2006-05-03 00:00:00','2006-05-31 09:52:26','hola','chau',2,0),(3,'borrar','a220b31002a71d456f5c5d3b6a122111',1,'popo@popo.com.ar',1,'2006-05-17 00:00:00','2006-06-28 13:08:26','aaaaaaaa','bbbbbbbb',2,0),(4,'ftoledo','e961b2ac40aac4cc36a8bf65bca9177e',1,'ftoledo@docksud.com.ar',1,'2006-05-17 00:00:00','2006-08-14 15:12:11','','',2,0),(5,'josxjosx','b7dd8c5890d63122949b02cfa06391fa',1,'josx@interorganic.com.ar',1,'2006-05-17 00:00:00','2006-05-26 12:13:40','josx','josx',2,0),(8,'vdifiore','62c8c8b86c464fd38d1d18100449b204',1,'vdifiore@gmail.com',1,'2006-05-19 00:00:00','2006-05-19 11:50:41','','',2,0),(10,'verox','c893bad68927b457dbed39460e6afd62',1,'vero@verox.com.ar',1,'2006-05-19 00:00:00','2006-10-09 09:56:07','','',2,0),(11,'albademo','f50cd6c159227729c16102e92aae5b0e',1,'ftoledo@docksud.com.ar',1,'2006-10-12 00:00:00','2006-10-25 10:34:36','','',2,0);
UNLOCK TABLES;
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

