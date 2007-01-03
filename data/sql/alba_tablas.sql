-- MySQL dump 10.10
--
-- Host: localhost    Database: alba
-- ------------------------------------------------------
-- Server version	5.0.24a-Debian_9-log
-- mysqldump -u alba -p -d alba > alba_tablas.sql

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8_bin;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8_bin;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8_bin;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8_bin;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8_bin;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8_bin;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8_bin;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8_bin;

--
-- Table structure for table `cargobaja`
--

DROP TABLE IF EXISTS `cargobaja`;
CREATE TABLE `cargobaja` (
  `id` int(11) NOT NULL auto_increment,
  `nombre` varchar(128) NOT NULL,
  `descripcion` varchar(255) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8_bin;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8_bin;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8_bin;

--
-- Table structure for table `conceptobaja`
--

DROP TABLE IF EXISTS `conceptobaja`;
CREATE TABLE `conceptobaja` (
  `id` int(11) NOT NULL auto_increment,
  `nombre` varchar(128) NOT NULL,
  `descripcion` varchar(255) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8_bin;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8_bin;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8_bin;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8_bin;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8_bin;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8_bin;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8_bin;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8_bin;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8_bin;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8_bin;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8_bin;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8_bin;

--
-- Table structure for table `horarioescolartipo`
--

DROP TABLE IF EXISTS `horarioescolartipo`;
CREATE TABLE `horarioescolartipo` (
  `id` int(11) NOT NULL auto_increment,
  `nombre` varchar(128) NOT NULL,
  `descripcion` varchar(255) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8_bin;

--
-- Table structure for table `legajoadjunto`
--

DROP TABLE IF EXISTS `legajoadjunto`;
CREATE TABLE `legajoadjunto` (
  `fk_legajopedagogico_id` int(11) NOT NULL,
  `fk_adjunto_id` int(11) NOT NULL,
  KEY `adjunto_FI_1` (`fk_adjunto_id`),
  KEY `legajopedagogico_FI_1` (`fk_legajopedagogico_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8_bin;

--
-- Table structure for table `legajocategoria`
--

DROP TABLE IF EXISTS `legajocategoria`;
CREATE TABLE `legajocategoria` (
  `id` int(11) NOT NULL auto_increment,
  `descripcion` varchar(255) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8_bin;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8_bin;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8_bin;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8_bin;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8_bin;

--
-- Table structure for table `niveltipo`
--

DROP TABLE IF EXISTS `niveltipo`;
CREATE TABLE `niveltipo` (
  `id` int(11) NOT NULL auto_increment,
  `nombre` varchar(128) NOT NULL default '',
  `descripcion` varchar(255) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8_bin;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8_bin;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8_bin;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8_bin;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8_bin;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8_bin;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8_bin;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8_bin;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8_bin;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8_bin;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8_bin;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8_bin;

--
-- Table structure for table `rel_docente_establecimiento`
--

DROP TABLE IF EXISTS `rel_docente_establecimiento`;
CREATE TABLE `rel_docente_establecimiento` (
  `fk_docente_id` int(11) NOT NULL,
  `fk_establecimiento_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8_bin;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8_bin;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8_bin;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8_bin;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8_bin;

--
-- Table structure for table `repeticion`
--

DROP TABLE IF EXISTS `repeticion`;
CREATE TABLE `repeticion` (
  `id` int(11) NOT NULL auto_increment,
  `descripcion` varchar(255) NOT NULL default '',
  `orden` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8_bin;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8_bin;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8_bin;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8_bin;

--
-- Table structure for table `tipodocente`
--

DROP TABLE IF EXISTS `tipodocente`;
CREATE TABLE `tipodocente` (
  `id` int(11) NOT NULL auto_increment,
  `nombre` varchar(128) NOT NULL,
  `descripcion` varchar(255) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8_bin;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8_bin;

--
-- Table structure for table `tipoespacio`
--

DROP TABLE IF EXISTS `tipoespacio`;
CREATE TABLE `tipoespacio` (
  `id` int(11) NOT NULL auto_increment,
  `nombre` varchar(128) NOT NULL,
  `descripcion` varchar(255) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8_bin;

--
-- Table structure for table `tipoiva`
--

DROP TABLE IF EXISTS `tipoiva`;
CREATE TABLE `tipoiva` (
  `id` int(11) NOT NULL,
  `nombre` varchar(128) NOT NULL,
  `descripcion` varchar(255) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8_bin;

--
-- Table structure for table `tipolocacion`
--

DROP TABLE IF EXISTS `tipolocacion`;
CREATE TABLE `tipolocacion` (
  `id` int(11) NOT NULL auto_increment,
  `nombre` varchar(128) NOT NULL,
  `descripcion` varchar(255) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8_bin;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8_bin;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8_bin;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

