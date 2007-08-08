
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

#-----------------------------------------------------------------------------
#-- locacion
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `locacion`;


CREATE TABLE `locacion`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`nombre` VARCHAR(128)  NOT NULL,
	`descripcion` VARCHAR(255),
	`direccion` VARCHAR(128)  NOT NULL,
	`ciudad` VARCHAR(128)  NOT NULL,
	`codigo_postal` VARCHAR(20),
	`fk_provincia_id` INTEGER default 0 NOT NULL,
	`fk_tipolocacion_id` INTEGER default 0 NOT NULL,
	`telefono` VARCHAR(20),
	`fax` VARCHAR(20),
	`encargado` VARCHAR(128),
	`encargado_telefono` VARCHAR(20),
	`principal` INTEGER default 0 NOT NULL,
	PRIMARY KEY (`id`),
	INDEX `locacion_FI_1` (`fk_provincia_id`),
	CONSTRAINT `locacion_FK_1`
		FOREIGN KEY (`fk_provincia_id`)
		REFERENCES `provincia` (`id`),
	INDEX `locacion_FI_2` (`fk_tipolocacion_id`),
	CONSTRAINT `locacion_FK_2`
		FOREIGN KEY (`fk_tipolocacion_id`)
		REFERENCES `tipolocacion` (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- modulo
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `modulo`;


CREATE TABLE `modulo`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`nombre` VARCHAR(128)  NOT NULL,
	`titulo` VARCHAR(128),
	`descripcion` VARCHAR(255),
	`activo` INTEGER default 1 NOT NULL,
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- espacio
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `espacio`;


CREATE TABLE `espacio`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`nombre` VARCHAR(128)  NOT NULL,
	`m2` FLOAT,
	`capacidad` VARCHAR(255),
	`descripcion` VARCHAR(255),
	`estado` VARCHAR(255),
	`fk_tipoespacio_id` INTEGER(11),
	`fk_locacion_id` INTEGER default 0 NOT NULL,
	PRIMARY KEY (`id`),
	INDEX `espacio_FI_1` (`fk_tipoespacio_id`),
	CONSTRAINT `espacio_FK_1`
		FOREIGN KEY (`fk_tipoespacio_id`)
		REFERENCES `tipoespacio` (`id`),
	INDEX `espacio_FI_2` (`fk_locacion_id`),
	CONSTRAINT `espacio_FK_2`
		FOREIGN KEY (`fk_locacion_id`)
		REFERENCES `locacion` (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- tipoespacio
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `tipoespacio`;


CREATE TABLE `tipoespacio`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`nombre` VARCHAR(128)  NOT NULL,
	`descripcion` VARCHAR(255),
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- tipolocacion
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `tipolocacion`;


CREATE TABLE `tipolocacion`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`nombre` VARCHAR(128)  NOT NULL,
	`descripcion` VARCHAR(255),
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- distritoescolar
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `distritoescolar`;


CREATE TABLE `distritoescolar`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`nombre` VARCHAR(128)  NOT NULL,
	`direccion` VARCHAR(128),
	`telefono` VARCHAR(20),
	`ciudad` VARCHAR(128),
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- establecimiento
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `establecimiento`;


CREATE TABLE `establecimiento`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`nombre` VARCHAR(128)  NOT NULL,
	`descripcion` VARCHAR(255),
	`fk_distritoescolar_id` INTEGER default 0 NOT NULL,
	`fk_organizacion_id` INTEGER default 0 NOT NULL,
	`fk_niveltipo_id` INTEGER default 0 NOT NULL,
	PRIMARY KEY (`id`),
	INDEX `establecimiento_FI_1` (`fk_distritoescolar_id`),
	CONSTRAINT `establecimiento_FK_1`
		FOREIGN KEY (`fk_distritoescolar_id`)
		REFERENCES `distritoescolar` (`id`),
	INDEX `establecimiento_FI_2` (`fk_organizacion_id`),
	CONSTRAINT `establecimiento_FK_2`
		FOREIGN KEY (`fk_organizacion_id`)
		REFERENCES `organizacion` (`id`),
	INDEX `establecimiento_FI_3` (`fk_niveltipo_id`),
	CONSTRAINT `establecimiento_FK_3`
		FOREIGN KEY (`fk_niveltipo_id`)
		REFERENCES `niveltipo` (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- niveltipo
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `niveltipo`;


CREATE TABLE `niveltipo`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`nombre` VARCHAR(128)  NOT NULL,
	`descripcion` VARCHAR(255),
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- organizacion
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `organizacion`;


CREATE TABLE `organizacion`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`nombre` VARCHAR(128)  NOT NULL,
	`descripcion` VARCHAR(255),
	`razon_social` VARCHAR(128)  NOT NULL,
	`cuit` VARCHAR(20)  NOT NULL,
	`direccion` VARCHAR(128)  NOT NULL,
	`ciudad` VARCHAR(128)  NOT NULL,
	`codigo_postal` VARCHAR(20)  NOT NULL,
	`telefono` VARCHAR(20),
	`fk_provincia_id` INTEGER default 0 NOT NULL,
	`fk_tipoiva_id` INTEGER default 0 NOT NULL,
	PRIMARY KEY (`id`),
	INDEX `organizacion_FI_1` (`fk_provincia_id`),
	CONSTRAINT `organizacion_FK_1`
		FOREIGN KEY (`fk_provincia_id`)
		REFERENCES `provincia` (`id`),
	INDEX `organizacion_FI_2` (`fk_tipoiva_id`),
	CONSTRAINT `organizacion_FK_2`
		FOREIGN KEY (`fk_tipoiva_id`)
		REFERENCES `tipoiva` (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- pais
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `pais`;


CREATE TABLE `pais`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`nombre_largo` VARCHAR(128)  NOT NULL,
	`nombre_corto` VARCHAR(32)  NOT NULL,
	`orden` INTEGER default 0,
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- permiso
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `permiso`;


CREATE TABLE `permiso`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`nombre` VARCHAR(128)  NOT NULL,
	`descripcion` VARCHAR(255),
	`fk_modulo_id` INTEGER default 0 NOT NULL,
	`credencial` VARCHAR(32),
	PRIMARY KEY (`id`),
	INDEX `permiso_FI_1` (`fk_modulo_id`),
	CONSTRAINT `permiso_FK_1`
		FOREIGN KEY (`fk_modulo_id`)
		REFERENCES `modulo` (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- preferencia
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `preferencia`;


CREATE TABLE `preferencia`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`nombre` VARCHAR(128)  NOT NULL,
	`valor_por_defecto` VARCHAR(128),
	`activo` INTEGER default 1 NOT NULL,
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- rel_establecimiento_locacion
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `rel_establecimiento_locacion`;


CREATE TABLE `rel_establecimiento_locacion`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`fk_establecimiento_id` INTEGER default 0 NOT NULL,
	`fk_locacion_id` INTEGER default 0 NOT NULL,
	PRIMARY KEY (`id`),
	INDEX `rel_establecimiento_locacion_FI_1` (`fk_establecimiento_id`),
	CONSTRAINT `rel_establecimiento_locacion_FK_1`
		FOREIGN KEY (`fk_establecimiento_id`)
		REFERENCES `establecimiento` (`id`),
	INDEX `rel_establecimiento_locacion_FI_2` (`fk_locacion_id`),
	CONSTRAINT `rel_establecimiento_locacion_FK_2`
		FOREIGN KEY (`fk_locacion_id`)
		REFERENCES `locacion` (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- rel_rol_permiso
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `rel_rol_permiso`;


CREATE TABLE `rel_rol_permiso`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`fk_rol_id` INTEGER default 0 NOT NULL,
	`fk_permiso_id` INTEGER default 0 NOT NULL,
	PRIMARY KEY (`id`),
	INDEX `rel_rol_permiso_FI_1` (`fk_rol_id`),
	CONSTRAINT `rel_rol_permiso_FK_1`
		FOREIGN KEY (`fk_rol_id`)
		REFERENCES `rol` (`id`),
	INDEX `rel_rol_permiso_FI_2` (`fk_permiso_id`),
	CONSTRAINT `rel_rol_permiso_FK_2`
		FOREIGN KEY (`fk_permiso_id`)
		REFERENCES `permiso` (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- rel_usuario_permiso
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `rel_usuario_permiso`;


CREATE TABLE `rel_usuario_permiso`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`fk_usuario_id` INTEGER default 0 NOT NULL,
	`fk_permiso_id` INTEGER default 0 NOT NULL,
	PRIMARY KEY (`id`),
	INDEX `rel_usuario_permiso_FI_1` (`fk_usuario_id`),
	CONSTRAINT `rel_usuario_permiso_FK_1`
		FOREIGN KEY (`fk_usuario_id`)
		REFERENCES `usuario` (`id`),
	INDEX `rel_usuario_permiso_FI_2` (`fk_permiso_id`),
	CONSTRAINT `rel_usuario_permiso_FK_2`
		FOREIGN KEY (`fk_permiso_id`)
		REFERENCES `permiso` (`id`)
		ON DELETE CASCADE
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- rel_usuario_preferencia
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `rel_usuario_preferencia`;


CREATE TABLE `rel_usuario_preferencia`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`fk_usuario_id` INTEGER default 0 NOT NULL,
	`fk_preferencia_id` INTEGER default 0 NOT NULL,
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- rol
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `rol`;


CREATE TABLE `rol`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`nombre` VARCHAR(128)  NOT NULL,
	`descripcion` VARCHAR(255),
	`activo` INTEGER default 1 NOT NULL,
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- usuario
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `usuario`;


CREATE TABLE `usuario`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`usuario` VARCHAR(32)  NOT NULL,
	`clave` VARCHAR(48)  NOT NULL,
	`correo_publico` INTEGER default 1,
	`activo` INTEGER default 1 NOT NULL,
	`fecha_creado` DATETIME  NOT NULL,
	`fecha_actualizado` DATETIME  NOT NULL,
	`seguridad_pregunta` VARCHAR(128),
	`seguridad_respuesta` VARCHAR(128),
	`email` VARCHAR(128),
	`fk_establecimiento_id` INTEGER default 0 NOT NULL,
	`borrado` INTEGER default 0 NOT NULL,
	PRIMARY KEY (`id`),
	INDEX `usuario_FI_1` (`fk_establecimiento_id`),
	CONSTRAINT `usuario_FK_1`
		FOREIGN KEY (`fk_establecimiento_id`)
		REFERENCES `establecimiento` (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- orientacion
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `orientacion`;


CREATE TABLE `orientacion`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`nombre` VARCHAR(128)  NOT NULL,
	`descripcion` VARCHAR(255),
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- tipoiva
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `tipoiva`;


CREATE TABLE `tipoiva`
(
	`id` INTEGER  NOT NULL,
	`nombre` VARCHAR(128)  NOT NULL,
	`descripcion` VARCHAR(255),
	`orden` INTEGER default 0,
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- provincia
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `provincia`;


CREATE TABLE `provincia`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`nombre_corto` VARCHAR(32)  NOT NULL,
	`nombre_largo` VARCHAR(128)  NOT NULL,
	`fk_pais_id` INTEGER default 0 NOT NULL,
	`orden` INTEGER default 0,
	PRIMARY KEY (`id`),
	INDEX `provincia_FI_1` (`fk_pais_id`),
	CONSTRAINT `provincia_FK_1`
		FOREIGN KEY (`fk_pais_id`)
		REFERENCES `pais` (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- cuenta
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `cuenta`;


CREATE TABLE `cuenta`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`nombre` VARCHAR(128)  NOT NULL,
	`razon_social` VARCHAR(128)  NOT NULL,
	`cuit` VARCHAR(20)  NOT NULL,
	`direccion` VARCHAR(128)  NOT NULL,
	`ciudad` VARCHAR(128)  NOT NULL,
	`codigo_postal` VARCHAR(20)  NOT NULL,
	`telefono` VARCHAR(20),
	`fk_provincia_id` INTEGER default 0 NOT NULL,
	`fk_tipoiva_id` INTEGER default 0 NOT NULL,
	PRIMARY KEY (`id`),
	INDEX `cuenta_FI_1` (`fk_provincia_id`),
	CONSTRAINT `cuenta_FK_1`
		FOREIGN KEY (`fk_provincia_id`)
		REFERENCES `provincia` (`id`),
	INDEX `cuenta_FI_2` (`fk_tipoiva_id`),
	CONSTRAINT `cuenta_FK_2`
		FOREIGN KEY (`fk_tipoiva_id`)
		REFERENCES `tipoiva` (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- alumno
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `alumno`;


CREATE TABLE `alumno`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`nombre` VARCHAR(128)  NOT NULL,
	`apellido` VARCHAR(128)  NOT NULL,
	`fecha_nacimiento` DATETIME  NOT NULL,
	`direccion` VARCHAR(128)  NOT NULL,
	`ciudad` VARCHAR(128)  NOT NULL,
	`codigo_postal` VARCHAR(20)  NOT NULL,
	`fk_provincia_id` INTEGER default 0 NOT NULL,
	`telefono` VARCHAR(20),
	`lugar_nacimiento` VARCHAR(128),
	`fk_tipodocumento_id` INTEGER(11) default 0 NOT NULL,
	`nro_documento` VARCHAR(16)  NOT NULL,
	`sexo` CHAR(1)  NOT NULL,
	`email` VARCHAR(128)  NOT NULL,
	`distancia_escuela` INTEGER default 0,
	`hermanos_escuela` INTEGER default 0 NOT NULL,
	`hijo_maestro_escuela` INTEGER default 0 NOT NULL,
	`fk_establecimiento_id` INTEGER default 0 NOT NULL,
	`fk_cuenta_id` INTEGER default 0 NOT NULL,
	`certificado_medico` INTEGER default 0 NOT NULL,
	`activo` INTEGER default 1 NOT NULL,
	`fk_conceptobaja_id` INTEGER,
	`fk_pais_id` INTEGER default 0 NOT NULL,
	PRIMARY KEY (`id`),
	INDEX `alumno_FI_1` (`fk_provincia_id`),
	CONSTRAINT `alumno_FK_1`
		FOREIGN KEY (`fk_provincia_id`)
		REFERENCES `provincia` (`id`),
	INDEX `alumno_FI_2` (`fk_tipodocumento_id`),
	CONSTRAINT `alumno_FK_2`
		FOREIGN KEY (`fk_tipodocumento_id`)
		REFERENCES `tipodocumento` (`id`),
	INDEX `alumno_FI_3` (`fk_establecimiento_id`),
	CONSTRAINT `alumno_FK_3`
		FOREIGN KEY (`fk_establecimiento_id`)
		REFERENCES `establecimiento` (`id`),
	INDEX `alumno_FI_4` (`fk_cuenta_id`),
	CONSTRAINT `alumno_FK_4`
		FOREIGN KEY (`fk_cuenta_id`)
		REFERENCES `cuenta` (`id`),
	INDEX `alumno_FI_5` (`fk_conceptobaja_id`),
	CONSTRAINT `alumno_FK_5`
		FOREIGN KEY (`fk_conceptobaja_id`)
		REFERENCES `conceptobaja` (`id`),
	INDEX `alumno_FI_6` (`fk_pais_id`),
	CONSTRAINT `alumno_FK_6`
		FOREIGN KEY (`fk_pais_id`)
		REFERENCES `pais` (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- responsable
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `responsable`;


CREATE TABLE `responsable`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`nombre` VARCHAR(128)  NOT NULL,
	`apellido` VARCHAR(128)  NOT NULL,
	`direccion` VARCHAR(128),
	`ciudad` VARCHAR(128),
	`codigo_postal` VARCHAR(20),
	`fk_provincia_id` INTEGER default 0 NOT NULL,
	`telefono` VARCHAR(20),
	`telefono_movil` VARCHAR(20),
	`nro_documento` VARCHAR(20)  NOT NULL,
	`fk_tipodocumento_id` INTEGER default 0 NOT NULL,
	`sexo` CHAR(1)  NOT NULL,
	`email` VARCHAR(128),
	`observacion` VARCHAR(255),
	`autorizacion_retiro` INTEGER default 0 NOT NULL,
	`fk_cuenta_id` INTEGER default 0 NOT NULL,
	`fk_rolresponsable_id` INTEGER default 1 NOT NULL,
	PRIMARY KEY (`id`),
	INDEX `responsable_FI_1` (`fk_provincia_id`),
	CONSTRAINT `responsable_FK_1`
		FOREIGN KEY (`fk_provincia_id`)
		REFERENCES `provincia` (`id`),
	INDEX `responsable_FI_2` (`fk_tipodocumento_id`),
	CONSTRAINT `responsable_FK_2`
		FOREIGN KEY (`fk_tipodocumento_id`)
		REFERENCES `tipodocumento` (`id`),
	INDEX `responsable_FI_3` (`fk_cuenta_id`),
	CONSTRAINT `responsable_FK_3`
		FOREIGN KEY (`fk_cuenta_id`)
		REFERENCES `cuenta` (`id`),
	INDEX `responsable_FI_4` (`fk_rolresponsable_id`),
	CONSTRAINT `responsable_FK_4`
		FOREIGN KEY (`fk_rolresponsable_id`)
		REFERENCES `rol_responsable` (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- ciclolectivo
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `ciclolectivo`;


CREATE TABLE `ciclolectivo`
(
	`id` INTEGER(11)  NOT NULL AUTO_INCREMENT,
	`fk_establecimiento_id` INTEGER(11)  NOT NULL,
	`fecha_inicio` DATETIME  NOT NULL,
	`fecha_fin` DATETIME  NOT NULL,
	`descripcion` VARCHAR(255)  NOT NULL,
	`actual` INTEGER default 0 NOT NULL,
	PRIMARY KEY (`id`),
	INDEX `ciclolectivo_FI_1` (`fk_establecimiento_id`),
	CONSTRAINT `ciclolectivo_FK_1`
		FOREIGN KEY (`fk_establecimiento_id`)
		REFERENCES `establecimiento` (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- turno
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `turno`;


CREATE TABLE `turno`
(
	`id` INTEGER(11)  NOT NULL AUTO_INCREMENT,
	`fk_ciclolectivo_id` INTEGER(11)  NOT NULL,
	`hora_inicio` TIME  NOT NULL,
	`hora_fin` TIME  NOT NULL,
	`descripcion` VARCHAR(255)  NOT NULL,
	PRIMARY KEY (`id`),
	INDEX `turno_FI_1` (`fk_ciclolectivo_id`),
	CONSTRAINT `turno_FK_1`
		FOREIGN KEY (`fk_ciclolectivo_id`)
		REFERENCES `ciclolectivo` (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- periodo
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `periodo`;


CREATE TABLE `periodo`
(
	`id` INTEGER(11)  NOT NULL AUTO_INCREMENT,
	`fk_ciclolectivo_id` INTEGER(11)  NOT NULL,
	`fecha_inicio` DATETIME  NOT NULL,
	`fecha_fin` DATETIME  NOT NULL,
	`descripcion` VARCHAR(255)  NOT NULL,
	PRIMARY KEY (`id`),
	INDEX `periodo_FI_1` (`fk_ciclolectivo_id`),
	CONSTRAINT `periodo_FK_1`
		FOREIGN KEY (`fk_ciclolectivo_id`)
		REFERENCES `ciclolectivo` (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- conceptobaja
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `conceptobaja`;


CREATE TABLE `conceptobaja`
(
	`id` INTEGER(11)  NOT NULL AUTO_INCREMENT,
	`nombre` VARCHAR(128)  NOT NULL,
	`descripcion` VARCHAR(255),
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- tipodocente
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `tipodocente`;


CREATE TABLE `tipodocente`
(
	`id` INTEGER(11)  NOT NULL AUTO_INCREMENT,
	`nombre` VARCHAR(128)  NOT NULL,
	`descripcion` VARCHAR(255),
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- cargobaja
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `cargobaja`;


CREATE TABLE `cargobaja`
(
	`id` INTEGER(11)  NOT NULL AUTO_INCREMENT,
	`nombre` VARCHAR(128)  NOT NULL,
	`descripcion` VARCHAR(255),
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- calendariovacunacion
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `calendariovacunacion`;


CREATE TABLE `calendariovacunacion`
(
	`id` INTEGER(11)  NOT NULL AUTO_INCREMENT,
	`nombre` VARCHAR(128)  NOT NULL,
	`descripcion` VARCHAR(255),
	`periodo` VARCHAR(128),
	`observacion` VARCHAR(255),
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- rel_calendariovacunacion_alumno
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `rel_calendariovacunacion_alumno`;


CREATE TABLE `rel_calendariovacunacion_alumno`
(
	`id` INTEGER(11)  NOT NULL AUTO_INCREMENT,
	`fk_alumno_id` INTEGER(11)  NOT NULL,
	`fk_calendariovacunacion_id` INTEGER(11)  NOT NULL,
	`observacion` VARCHAR(255),
	`comprobante` INTEGER default 0 NOT NULL,
	`fecha` DATETIME,
	PRIMARY KEY (`id`),
	INDEX `rel_calendariovacunacion_alumno_FI_1` (`fk_alumno_id`),
	CONSTRAINT `rel_calendariovacunacion_alumno_FK_1`
		FOREIGN KEY (`fk_alumno_id`)
		REFERENCES `alumno` (`id`),
	INDEX `rel_calendariovacunacion_alumno_FI_2` (`fk_calendariovacunacion_id`),
	CONSTRAINT `rel_calendariovacunacion_alumno_FK_2`
		FOREIGN KEY (`fk_calendariovacunacion_id`)
		REFERENCES `calendariovacunacion` (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- legajopedagogico
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `legajopedagogico`;


CREATE TABLE `legajopedagogico`
(
	`id` INTEGER(11)  NOT NULL AUTO_INCREMENT,
	`fk_alumno_id` INTEGER(11)  NOT NULL,
	`titulo` VARCHAR(255)  NOT NULL,
	`resumen` LONGBLOB  NOT NULL,
	`texto` LONGBLOB  NOT NULL,
	`fecha` DATETIME  NOT NULL,
	`fk_usuario_id` INTEGER(11)  NOT NULL,
	`fk_legajocategoria_id` INTEGER(11)  NOT NULL,
	PRIMARY KEY (`id`),
	INDEX `legajopedagogico_FI_1` (`fk_alumno_id`),
	CONSTRAINT `legajopedagogico_FK_1`
		FOREIGN KEY (`fk_alumno_id`)
		REFERENCES `alumno` (`id`),
	INDEX `legajopedagogico_FI_2` (`fk_usuario_id`),
	CONSTRAINT `legajopedagogico_FK_2`
		FOREIGN KEY (`fk_usuario_id`)
		REFERENCES `usuario` (`id`),
	INDEX `legajopedagogico_FI_3` (`fk_legajocategoria_id`),
	CONSTRAINT `legajopedagogico_FK_3`
		FOREIGN KEY (`fk_legajocategoria_id`)
		REFERENCES `legajocategoria` (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- legajocategoria
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `legajocategoria`;


CREATE TABLE `legajocategoria`
(
	`id` INTEGER(11)  NOT NULL AUTO_INCREMENT,
	`descripcion` VARCHAR(255)  NOT NULL,
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- legajoadjunto
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `legajoadjunto`;


CREATE TABLE `legajoadjunto`
(
	`fk_legajopedagogico_id` INTEGER(11)  NOT NULL,
	`fk_adjunto_id` INTEGER(11)  NOT NULL,
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	PRIMARY KEY (`id`),
	INDEX `legajoadjunto_FI_1` (`fk_legajopedagogico_id`),
	CONSTRAINT `legajoadjunto_FK_1`
		FOREIGN KEY (`fk_legajopedagogico_id`)
		REFERENCES `legajopedagogico` (`id`),
	INDEX `legajoadjunto_FI_2` (`fk_adjunto_id`),
	CONSTRAINT `legajoadjunto_FK_2`
		FOREIGN KEY (`fk_adjunto_id`)
		REFERENCES `adjunto` (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- adjunto
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `adjunto`;


CREATE TABLE `adjunto`
(
	`id` INTEGER(11)  NOT NULL AUTO_INCREMENT,
	`descripcion` VARCHAR(255),
	`titulo` VARCHAR(255),
	`nombre_archivo` VARCHAR(255)  NOT NULL,
	`tipo_archivo` VARCHAR(64)  NOT NULL,
	`ruta` VARCHAR(255)  NOT NULL,
	`fecha` DATETIME  NOT NULL,
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- asistencia
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `asistencia`;


CREATE TABLE `asistencia`
(
	`id` INTEGER(11)  NOT NULL AUTO_INCREMENT,
	`fk_alumno_id` INTEGER(11)  NOT NULL,
	`fk_tipoasistencia_id` INTEGER(11)  NOT NULL,
	`fecha` DATETIME  NOT NULL,
	PRIMARY KEY (`id`),
	INDEX `asistencia_FI_1` (`fk_alumno_id`),
	CONSTRAINT `asistencia_FK_1`
		FOREIGN KEY (`fk_alumno_id`)
		REFERENCES `alumno` (`id`),
	INDEX `asistencia_FI_2` (`fk_tipoasistencia_id`),
	CONSTRAINT `asistencia_FK_2`
		FOREIGN KEY (`fk_tipoasistencia_id`)
		REFERENCES `tipoasistencia` (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- concepto
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `concepto`;


CREATE TABLE `concepto`
(
	`id` INTEGER(11)  NOT NULL AUTO_INCREMENT,
	`fk_establecimiento_id` INTEGER(11) default 0 NOT NULL,
	`nombre` VARCHAR(128)  NOT NULL,
	`descripcion` VARCHAR(255),
	PRIMARY KEY (`id`),
	INDEX `concepto_FI_1` (`fk_establecimiento_id`),
	CONSTRAINT `concepto_FK_1`
		FOREIGN KEY (`fk_establecimiento_id`)
		REFERENCES `establecimiento` (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- escalanota
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `escalanota`;


CREATE TABLE `escalanota`
(
	`id` INTEGER(11)  NOT NULL AUTO_INCREMENT,
	`fk_establecimiento_id` INTEGER(11) default 0 NOT NULL,
	`nombre` VARCHAR(128)  NOT NULL,
	`descripcion` VARCHAR(255),
	`orden` INTEGER(11)  NOT NULL,
	`aprobado` INTEGER default 0 NOT NULL,
	PRIMARY KEY (`id`),
	INDEX `escalanota_FI_1` (`fk_establecimiento_id`),
	CONSTRAINT `escalanota_FK_1`
		FOREIGN KEY (`fk_establecimiento_id`)
		REFERENCES `establecimiento` (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- boletin_conceptual
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `boletin_conceptual`;


CREATE TABLE `boletin_conceptual`
(
	`id` INTEGER(11)  NOT NULL AUTO_INCREMENT,
	`fk_escalanota_id` INTEGER(11) default 0 NOT NULL,
	`fk_alumno_id` INTEGER(11) default 0 NOT NULL,
	`fk_concepto_id` INTEGER(11) default 0 NOT NULL,
	`fk_periodo_id` INTEGER(11) default 0 NOT NULL,
	`observacion` LONGBLOB  NOT NULL,
	`fecha` DATETIME  NOT NULL,
	PRIMARY KEY (`id`),
	INDEX `boletin_conceptual_FI_1` (`fk_escalanota_id`),
	CONSTRAINT `boletin_conceptual_FK_1`
		FOREIGN KEY (`fk_escalanota_id`)
		REFERENCES `escalanota` (`id`),
	INDEX `boletin_conceptual_FI_2` (`fk_alumno_id`),
	CONSTRAINT `boletin_conceptual_FK_2`
		FOREIGN KEY (`fk_alumno_id`)
		REFERENCES `alumno` (`id`),
	INDEX `boletin_conceptual_FI_3` (`fk_concepto_id`),
	CONSTRAINT `boletin_conceptual_FK_3`
		FOREIGN KEY (`fk_concepto_id`)
		REFERENCES `concepto` (`id`),
	INDEX `boletin_conceptual_FI_4` (`fk_periodo_id`),
	CONSTRAINT `boletin_conceptual_FK_4`
		FOREIGN KEY (`fk_periodo_id`)
		REFERENCES `periodo` (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- boletin_actividades
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `boletin_actividades`;


CREATE TABLE `boletin_actividades`
(
	`id` INTEGER(11)  NOT NULL AUTO_INCREMENT,
	`fk_escalanota_id` INTEGER(11) default 0 NOT NULL,
	`fk_alumno_id` INTEGER(11) default 0 NOT NULL,
	`fk_actividad_id` INTEGER(11) default 0 NOT NULL,
	`fk_periodo_id` INTEGER(11) default 0 NOT NULL,
	`observacion` LONGBLOB  NOT NULL,
	`fecha` DATETIME  NOT NULL,
	PRIMARY KEY (`id`),
	INDEX `boletin_actividades_FI_1` (`fk_escalanota_id`),
	CONSTRAINT `boletin_actividades_FK_1`
		FOREIGN KEY (`fk_escalanota_id`)
		REFERENCES `escalanota` (`id`),
	INDEX `boletin_actividades_FI_2` (`fk_alumno_id`),
	CONSTRAINT `boletin_actividades_FK_2`
		FOREIGN KEY (`fk_alumno_id`)
		REFERENCES `alumno` (`id`),
	INDEX `boletin_actividades_FI_3` (`fk_actividad_id`),
	CONSTRAINT `boletin_actividades_FK_3`
		FOREIGN KEY (`fk_actividad_id`)
		REFERENCES `actividad` (`id`),
	INDEX `boletin_actividades_FI_4` (`fk_periodo_id`),
	CONSTRAINT `boletin_actividades_FK_4`
		FOREIGN KEY (`fk_periodo_id`)
		REFERENCES `periodo` (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- examen
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `examen`;


CREATE TABLE `examen`
(
	`id` INTEGER(11)  NOT NULL AUTO_INCREMENT,
	`fk_escalanota_id` INTEGER(11) default 0 NOT NULL,
	`fk_alumno_id` INTEGER(11) default 0 NOT NULL,
	`fk_actividad_id` INTEGER(11) default 0 NOT NULL,
	`fk_periodo_id` INTEGER(11) default 0 NOT NULL,
	`nombre` VARCHAR(255)  NOT NULL,
	`observacion` LONGBLOB  NOT NULL,
	`fecha` DATETIME  NOT NULL,
	PRIMARY KEY (`id`),
	INDEX `examen_FI_1` (`fk_escalanota_id`),
	CONSTRAINT `examen_FK_1`
		FOREIGN KEY (`fk_escalanota_id`)
		REFERENCES `escalanota` (`id`),
	INDEX `examen_FI_2` (`fk_alumno_id`),
	CONSTRAINT `examen_FK_2`
		FOREIGN KEY (`fk_alumno_id`)
		REFERENCES `alumno` (`id`),
	INDEX `examen_FI_3` (`fk_actividad_id`),
	CONSTRAINT `examen_FK_3`
		FOREIGN KEY (`fk_actividad_id`)
		REFERENCES `actividad` (`id`),
	INDEX `examen_FI_4` (`fk_periodo_id`),
	CONSTRAINT `examen_FK_4`
		FOREIGN KEY (`fk_periodo_id`)
		REFERENCES `periodo` (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- anio
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `anio`;


CREATE TABLE `anio`
(
	`id` INTEGER(11)  NOT NULL AUTO_INCREMENT,
	`fk_establecimiento_id` INTEGER(11) default 0 NOT NULL,
	`descripcion` VARCHAR(255)  NOT NULL,
	PRIMARY KEY (`id`),
	INDEX `anio_FI_1` (`fk_establecimiento_id`),
	CONSTRAINT `anio_FK_1`
		FOREIGN KEY (`fk_establecimiento_id`)
		REFERENCES `establecimiento` (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- division
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `division`;


CREATE TABLE `division`
(
	`id` INTEGER(11)  NOT NULL AUTO_INCREMENT,
	`fk_anio_id` INTEGER(11) default 0 NOT NULL,
	`descripcion` VARCHAR(255)  NOT NULL,
	`fk_turno_id` INTEGER(11) default 0 NOT NULL,
	`fk_orientacion_id` INTEGER(11),
	`orden` INTEGER default 0,
	PRIMARY KEY (`id`),
	INDEX `division_FI_1` (`fk_anio_id`),
	CONSTRAINT `division_FK_1`
		FOREIGN KEY (`fk_anio_id`)
		REFERENCES `anio` (`id`),
	INDEX `division_FI_2` (`fk_turno_id`),
	CONSTRAINT `division_FK_2`
		FOREIGN KEY (`fk_turno_id`)
		REFERENCES `turno` (`id`),
	INDEX `division_FI_3` (`fk_orientacion_id`),
	CONSTRAINT `division_FK_3`
		FOREIGN KEY (`fk_orientacion_id`)
		REFERENCES `orientacion` (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- repeticion
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `repeticion`;


CREATE TABLE `repeticion`
(
	`id` INTEGER(11)  NOT NULL AUTO_INCREMENT,
	`descripcion` VARCHAR(255)  NOT NULL,
	`orden` INTEGER(11) default 0 NOT NULL,
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- actividad
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `actividad`;


CREATE TABLE `actividad`
(
	`id` INTEGER(11)  NOT NULL AUTO_INCREMENT,
	`fk_establecimiento_id` INTEGER(11) default 0 NOT NULL,
	`nombre` VARCHAR(128)  NOT NULL,
	`descripcion` VARCHAR(255),
	PRIMARY KEY (`id`),
	INDEX `actividad_FI_1` (`fk_establecimiento_id`),
	CONSTRAINT `actividad_FK_1`
		FOREIGN KEY (`fk_establecimiento_id`)
		REFERENCES `establecimiento` (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- rel_anio_actividad
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `rel_anio_actividad`;


CREATE TABLE `rel_anio_actividad`
(
	`id` INTEGER(11)  NOT NULL AUTO_INCREMENT,
	`fk_anio_id` INTEGER(11) default 0 NOT NULL,
	`fk_actividad_id` INTEGER(11) default 0 NOT NULL,
	`horas` DECIMAL(10,2) default 0 NOT NULL,
	PRIMARY KEY (`id`),
	INDEX `rel_anio_actividad_FI_1` (`fk_anio_id`),
	CONSTRAINT `rel_anio_actividad_FK_1`
		FOREIGN KEY (`fk_anio_id`)
		REFERENCES `anio` (`id`),
	INDEX `rel_anio_actividad_FI_2` (`fk_actividad_id`),
	CONSTRAINT `rel_anio_actividad_FK_2`
		FOREIGN KEY (`fk_actividad_id`)
		REFERENCES `actividad` (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- rel_alumno_division
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `rel_alumno_division`;


CREATE TABLE `rel_alumno_division`
(
	`id` INTEGER(11)  NOT NULL AUTO_INCREMENT,
	`fk_division_id` INTEGER(11) default 0 NOT NULL,
	`fk_alumno_id` INTEGER(11) default 0 NOT NULL,
	PRIMARY KEY (`id`),
	INDEX `rel_alumno_division_FI_1` (`fk_division_id`),
	CONSTRAINT `rel_alumno_division_FK_1`
		FOREIGN KEY (`fk_division_id`)
		REFERENCES `division` (`id`),
	INDEX `rel_alumno_division_FI_2` (`fk_alumno_id`),
	CONSTRAINT `rel_alumno_division_FK_2`
		FOREIGN KEY (`fk_alumno_id`)
		REFERENCES `alumno` (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- rel_division_actividad_docente
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `rel_division_actividad_docente`;


CREATE TABLE `rel_division_actividad_docente`
(
	`id` INTEGER(11)  NOT NULL AUTO_INCREMENT,
	`fk_division_id` INTEGER(11) default 0,
	`fk_actividad_id` INTEGER(11) default 0 NOT NULL,
	`fk_docente_id` INTEGER(11) default 0,
	`fk_evento_id` INTEGER(11) default 0,
	PRIMARY KEY (`id`),
	INDEX `rel_division_actividad_docente_FI_1` (`fk_division_id`),
	CONSTRAINT `rel_division_actividad_docente_FK_1`
		FOREIGN KEY (`fk_division_id`)
		REFERENCES `division` (`id`),
	INDEX `rel_division_actividad_docente_FI_2` (`fk_actividad_id`),
	CONSTRAINT `rel_division_actividad_docente_FK_2`
		FOREIGN KEY (`fk_actividad_id`)
		REFERENCES `actividad` (`id`),
	INDEX `rel_division_actividad_docente_FI_3` (`fk_docente_id`),
	CONSTRAINT `rel_division_actividad_docente_FK_3`
		FOREIGN KEY (`fk_docente_id`)
		REFERENCES `docente` (`id`),
	INDEX `rel_division_actividad_docente_FI_4` (`fk_evento_id`),
	CONSTRAINT `rel_division_actividad_docente_FK_4`
		FOREIGN KEY (`fk_evento_id`)
		REFERENCES `evento` (`id`)
		ON DELETE CASCADE
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- docente
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `docente`;


CREATE TABLE `docente`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`apellido` VARCHAR(128)  NOT NULL,
	`nombre` VARCHAR(128)  NOT NULL,
	`sexo` CHAR(1)  NOT NULL,
	`fecha_nacimiento` DATETIME  NOT NULL,
	`fk_tipodocumento_id` INTEGER(11) default 0 NOT NULL,
	`nro_documento` VARCHAR(16)  NOT NULL,
	`direccion` VARCHAR(128),
	`ciudad` VARCHAR(128),
	`codigo_postal` VARCHAR(20),
	`email` VARCHAR(255),
	`telefono` VARCHAR(20),
	`telefono_movil` VARCHAR(20),
	`titulo` VARCHAR(128)  NOT NULL,
	`libreta_sanitaria` INTEGER default 0,
	`psicofisico` INTEGER default 0,
	`activo` INTEGER default 1,
	`fk_provincia_id` INTEGER(11) default 0 NOT NULL,
	PRIMARY KEY (`id`),
	INDEX `docente_FI_1` (`fk_tipodocumento_id`),
	CONSTRAINT `docente_FK_1`
		FOREIGN KEY (`fk_tipodocumento_id`)
		REFERENCES `tipodocumento` (`id`),
	INDEX `docente_FI_2` (`fk_provincia_id`),
	CONSTRAINT `docente_FK_2`
		FOREIGN KEY (`fk_provincia_id`)
		REFERENCES `provincia` (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- rel_docente_establecimiento
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `rel_docente_establecimiento`;


CREATE TABLE `rel_docente_establecimiento`
(
	`fk_establecimiento_id` INTEGER(11) default 0 NOT NULL,
	`fk_docente_id` INTEGER(11) default 0 NOT NULL,
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	PRIMARY KEY (`id`),
	INDEX `rel_docente_establecimiento_FI_1` (`fk_establecimiento_id`),
	CONSTRAINT `rel_docente_establecimiento_FK_1`
		FOREIGN KEY (`fk_establecimiento_id`)
		REFERENCES `establecimiento` (`id`),
	INDEX `rel_docente_establecimiento_FI_2` (`fk_docente_id`),
	CONSTRAINT `rel_docente_establecimiento_FK_2`
		FOREIGN KEY (`fk_docente_id`)
		REFERENCES `docente` (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- tipodocumento
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `tipodocumento`;


CREATE TABLE `tipodocumento`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`nombre` VARCHAR(128)  NOT NULL,
	`descripcion` VARCHAR(255),
	`orden` INTEGER(11) default 0,
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- rel_actividad_docente
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `rel_actividad_docente`;


CREATE TABLE `rel_actividad_docente`
(
	`fk_actividad_id` INTEGER(11)  NOT NULL,
	`fk_docente_id` INTEGER(11)  NOT NULL,
	PRIMARY KEY (`fk_actividad_id`,`fk_docente_id`),
	CONSTRAINT `rel_actividad_docente_FK_1`
		FOREIGN KEY (`fk_actividad_id`)
		REFERENCES `actividad` (`id`),
	INDEX `rel_actividad_docente_FI_2` (`fk_docente_id`),
	CONSTRAINT `rel_actividad_docente_FK_2`
		FOREIGN KEY (`fk_docente_id`)
		REFERENCES `docente` (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- docente_horario
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `docente_horario`;


CREATE TABLE `docente_horario`
(
	`fk_docente_id` INTEGER(11)  NOT NULL,
	`fk_evento_id` INTEGER(11)  NOT NULL,
	PRIMARY KEY (`fk_docente_id`,`fk_evento_id`),
	CONSTRAINT `docente_horario_FK_1`
		FOREIGN KEY (`fk_docente_id`)
		REFERENCES `docente` (`id`),
	INDEX `docente_horario_FI_2` (`fk_evento_id`),
	CONSTRAINT `docente_horario_FK_2`
		FOREIGN KEY (`fk_evento_id`)
		REFERENCES `evento` (`id`)
		ON DELETE CASCADE
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- feriado
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `feriado`;


CREATE TABLE `feriado`
(
	`id` INTEGER(11)  NOT NULL AUTO_INCREMENT,
	`nombre` VARCHAR(128)  NOT NULL,
	`fecha` DATETIME  NOT NULL,
	`repeticion_anual` INTEGER default 0,
	`inamovible` INTEGER default 0,
	`fk_ciclolectivo_id` INTEGER(11) default 0 NOT NULL,
	PRIMARY KEY (`id`),
	INDEX `feriado_FI_1` (`fk_ciclolectivo_id`),
	CONSTRAINT `feriado_FK_1`
		FOREIGN KEY (`fk_ciclolectivo_id`)
		REFERENCES `ciclolectivo` (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- horarioescolar
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `horarioescolar`;


CREATE TABLE `horarioescolar`
(
	`id` INTEGER(11)  NOT NULL AUTO_INCREMENT,
	`nombre` VARCHAR(128)  NOT NULL,
	`descripcion` VARCHAR(255),
	`fk_evento_id` INTEGER default 0 NOT NULL,
	`fk_establecimiento_id` INTEGER default 0 NOT NULL,
	`fk_turno_id` INTEGER default 0 NOT NULL,
	`fk_horarioescolartipo_id` INTEGER default 0 NOT NULL,
	PRIMARY KEY (`id`),
	INDEX `horarioescolar_FI_1` (`fk_evento_id`),
	CONSTRAINT `horarioescolar_FK_1`
		FOREIGN KEY (`fk_evento_id`)
		REFERENCES `evento` (`id`)
		ON DELETE CASCADE,
	INDEX `horarioescolar_FI_2` (`fk_establecimiento_id`),
	CONSTRAINT `horarioescolar_FK_2`
		FOREIGN KEY (`fk_establecimiento_id`)
		REFERENCES `establecimiento` (`id`),
	INDEX `horarioescolar_FI_3` (`fk_turno_id`),
	CONSTRAINT `horarioescolar_FK_3`
		FOREIGN KEY (`fk_turno_id`)
		REFERENCES `turno` (`id`),
	INDEX `horarioescolar_FI_4` (`fk_horarioescolartipo_id`),
	CONSTRAINT `horarioescolar_FK_4`
		FOREIGN KEY (`fk_horarioescolartipo_id`)
		REFERENCES `horarioescolartipo` (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- horarioescolartipo
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `horarioescolartipo`;


CREATE TABLE `horarioescolartipo`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`nombre` VARCHAR(128)  NOT NULL,
	`descripcion` VARCHAR(255),
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- tipoasistencia
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `tipoasistencia`;


CREATE TABLE `tipoasistencia`
(
	`id` INTEGER(11)  NOT NULL AUTO_INCREMENT,
	`nombre` VARCHAR(10)  NOT NULL,
	`descripcion` VARCHAR(255),
	`valor` DECIMAL(4,2) default 1 NOT NULL,
	`grupo` VARCHAR(30),
	`defecto` INTEGER default 0 NOT NULL,
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- rol_responsable
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `rol_responsable`;


CREATE TABLE `rol_responsable`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`nombre` VARCHAR(128)  NOT NULL,
	`descripcion` VARCHAR(255),
	`activo` INTEGER default 1 NOT NULL,
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- evento
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `evento`;


CREATE TABLE `evento`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`titulo` VARCHAR(128)  NOT NULL,
	`fecha_inicio` DATETIME  NOT NULL,
	`fecha_fin` DATETIME  NOT NULL,
	`tipo` INTEGER default 0 NOT NULL,
	`frecuencia` INTEGER default 0 NOT NULL,
	`frecuencia_intervalo` INTEGER default 0 NOT NULL,
	`recurrencia_fin` VARCHAR(16),
	`recurrencia_dias` INTEGER default 0 NOT NULL,
	`estado` INTEGER default 0 NOT NULL,
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- rel_rolresponsable_responsable
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `rel_rolresponsable_responsable`;


CREATE TABLE `rel_rolresponsable_responsable`
(
	`id` INTEGER(11)  NOT NULL AUTO_INCREMENT,
	`fk_rolresponsable_id` INTEGER(11) default 0 NOT NULL,
	`fk_responsable_id` INTEGER(11) default 0 NOT NULL,
	`fk_alumno_id` INTEGER(11) default 0 NOT NULL,
	`descripcion` VARCHAR(255),
	PRIMARY KEY (`id`),
	INDEX `rel_rolresponsable_responsable_FI_1` (`fk_rolresponsable_id`),
	CONSTRAINT `rel_rolresponsable_responsable_FK_1`
		FOREIGN KEY (`fk_rolresponsable_id`)
		REFERENCES `rol_responsable` (`id`),
	INDEX `rel_rolresponsable_responsable_FI_2` (`fk_responsable_id`),
	CONSTRAINT `rel_rolresponsable_responsable_FK_2`
		FOREIGN KEY (`fk_responsable_id`)
		REFERENCES `responsable` (`id`),
	INDEX `rel_rolresponsable_responsable_FI_3` (`fk_alumno_id`),
	CONSTRAINT `rel_rolresponsable_responsable_FK_3`
		FOREIGN KEY (`fk_alumno_id`)
		REFERENCES `alumno` (`id`)
)Type=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
