CREATE TABLE `estadosalumnos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `alumno_salud` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_alumno_id` int(11) NOT NULL,
  `cobertura_medica` varchar(255) DEFAULT NULL,
  `pediatra_apellido` varchar(255) DEFAULT NULL,
  `pediatra_nombre` varchar(255) DEFAULT NULL,
  `pediatra_domicilio` varchar(255) DEFAULT NULL,
  `pediatra_telefono` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `alumno_salud_FI_1` (`fk_alumno_id`),
  CONSTRAINT `alumno_salud_FK_1` FOREIGN KEY (`fk_alumno_id`) REFERENCES `alumno` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `carrera` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_establecimiento_id` int(11) NOT NULL DEFAULT '0',
  `descripcion` varchar(255) NOT NULL,
  `orden` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `carrera_FI_1` (`fk_establecimiento_id`),
  CONSTRAINT `carrera_FK_1` FOREIGN KEY (`fk_establecimiento_id`) REFERENCES `establecimiento` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `tipoinforme` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(128) NOT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `informe` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(128) NOT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `fk_adjunto_id` int(11) NOT NULL,
  `fk_tipoinforme_id` int(11) NOT NULL,
  `listado` tinyint(4) NOT NULL DEFAULT '0',
  `variables` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `informe_FI_1` (`fk_adjunto_id`),
  KEY `informe_FI_2` (`fk_tipoinforme_id`),
  CONSTRAINT `informe_FK_1` FOREIGN KEY (`fk_adjunto_id`) REFERENCES `adjunto` (`id`),
  CONSTRAINT `informe_FK_2` FOREIGN KEY (`fk_tipoinforme_id`) REFERENCES `tipoinforme` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `legajosalud` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_alumno_id` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `descripcion` longblob NOT NULL,
  `fecha` datetime NOT NULL,
  `fk_usuario_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `legajosalud_FI_1` (`fk_alumno_id`),
  KEY `legajosalud_FI_2` (`fk_usuario_id`),
  CONSTRAINT `legajosalud_FK_1` FOREIGN KEY (`fk_alumno_id`) REFERENCES `alumno` (`id`),
  CONSTRAINT `legajosalud_FK_2` FOREIGN KEY (`fk_usuario_id`) REFERENCES `usuario` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `rol_permiso` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_rol_id` int(11) NOT NULL DEFAULT '0',
  `fk_permiso_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `rol_permiso_FI_1` (`fk_rol_id`),
  KEY `rol_permiso_FI_2` (`fk_permiso_id`),
  CONSTRAINT `rol_permiso_FK_1` FOREIGN KEY (`fk_rol_id`) REFERENCES `rol` (`id`),
  CONSTRAINT `rol_permiso_FK_2` FOREIGN KEY (`fk_permiso_id`) REFERENCES `permiso` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE `usuario_permiso` (
  `fk_usuario_id` int(11) NOT NULL DEFAULT '0',
  `fk_permiso_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`fk_usuario_id`,`fk_permiso_id`),
  KEY `usuario_permiso_FI_2` (`fk_permiso_id`),
  CONSTRAINT `usuario_permiso_FK_1` FOREIGN KEY (`fk_usuario_id`) REFERENCES `usuario` (`id`),
  CONSTRAINT `usuario_permiso_FK_2` FOREIGN KEY (`fk_permiso_id`) REFERENCES `permiso` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE `usuario_rol` (
  `fk_usuario_id` int(11) NOT NULL,
  `fk_rol_id` int(11) NOT NULL,
  PRIMARY KEY (`fk_usuario_id`,`fk_rol_id`),
  KEY `usuario_rol_FI_2` (`fk_rol_id`),
  CONSTRAINT `usuario_rol_FK_1` FOREIGN KEY (`fk_usuario_id`) REFERENCES `usuario` (`id`),
  CONSTRAINT `usuario_rol_FK_2` FOREIGN KEY (`fk_rol_id`) REFERENCES `rol` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `alumno` ADD `legajo_prefijo` VARCHAR (10) NOT NULL;
ALTER TABLE `alumno` ADD `legajo_numero` INT (11) NOT NULL;
ALTER TABLE `alumno` ADD `apellido_materno` VARCHAR (128) DEFAULT NULL;
alter table alumno modify fecha_nacimiento datetime default null;
alter table alumno modify direccion varchar(128) default null;
alter table alumno modify ciudad varchar(128) default null;
alter table alumno modify codigo_postal varchar(20) default null;
alter table alumno modify nro_documento varchar(16) default null;
alter table alumno modify sexo char(1) default null;
alter table alumno modify email varchar(128) default null;
alter table alumno modify hermanos_escuela tinyint(4) default '0';
alter table alumno modify hijo_maestro_escuela tinyint(4) default '0';
alter table alumno modify certificado_medico tinyint(4) default '0';
alter table alumno modify activo tinyint(4) default '1';
ALTER TABLE `alumno` ADD `procedencia` varchar(128) DEFAULT NULL;
ALTER TABLE `alumno` ADD `fk_estadoalumno_id` int(11) NOT NULL default '1';
ALTER TABLE alumno ADD FOREIGN KEY(fk_estadoalumno_id) REFERENCES estadosalumnos(id);
ALTER TABLE `alumno` ADD `observacion` varchar(255) DEFAULT NULL;

alter table anio add fk_carrera_id int(11) not null default '0';
alter table anio add foreign key(fk_carrera_id) references carrera(id);
alter table anio add orden int(11) default '0';

alter table boletin_actividades modify observacion longblob default null;
alter table boletin_conceptual modify observacion longblob default null;

alter table ciclolectivo modify actual tinyint(4) not null default '0'; 

alter table cuenta modify cuit varchar(20) default null;

alter table docente add apellido_materno varchar(128) default null;
alter table docente add estado_civil char(1) not null;
alter table docente modify libreta_sanitaria tinyint(4) default '0';
alter table docente modify psicofisico tinyint(4) default '0';
alter table docente add observacion varchar(255) default null;
alter table docente modify activo tinyint(4) default '1';

alter table escalanota modify aprobado tinyint(4) not null default '0';

alter table establecimiento add cuit varchar(20) default null;
alter table establecimiento add legajoprefijo varchar(10) not null;
alter table establecimiento add legajosiguiente int(11) default null;
alter table establecimiento add direccion varchar(128) default null;
alter table establecimiento add ciudad varchar(128) default null;
alter table establecimiento add codigo_postal varchar(20) default null;
alter table establecimiento add telefono varchar(20) default null;
alter table establecimiento add fk_provincia_id int(11) not null default '0';
alter table establecimiento add rector varchar(255) default null;
alter table establecimiento add foreign key(fk_provincia_id) references provincia(id);

alter table evento modify recurrencia_fin varchar(32) default null;

alter table feriado modify repeticion_anual tinyint(4) default '0';
alter table feriado modify inamovible tinyint(4) default '0';

alter table locacion modify principal tinyint(4) default '0';

alter table periodo add calcular tinyint(4) not null default '0';
alter table formula varchar(1000) default null;

alter table permiso modify fk_modulo_id int default null;
alter table permiso drop fk_modulo_id;
alter table permiso drop foreign key permiso_FK_1;
alter table permiso drop fk_modulo_id;
alter table permiso drop credencial;

alter table preferencia modify activo tinyint(4) not null default '1';

alter table rel_calendariovacunacion_alumno modify comprobante tinyint(4) not null default '0';

alter table rel_docente_establecimiento modify id int not null auto_increment first;

alter table responsable add apellido_materno varchar(128) default null;
alter table responsable add direccion_laboral varchar(128) default null;
alter table responsable add telefono_laboral varchar(20) default null;
alter table responsable modify autorizacion_retiro tinyint(4) not null default '0';
alter table responsable add llamar_emergencia tinyint(4) not null default '0';
alter table responsable add opcupacion varchar(255) default null;
alter table responsable add fecha_nacimiento datetime default null;
alter table rol modify activo tinyint(4) not null default '1';
alter table rol_responsable modify activo tinyint(4) not null default '1';
alter table tipoasistencia modify defecto tinyint(4) not null default '0';

alter table usuario modify correo_publico tinyint(4) default '1';
alter table usuario modify activo tinyint(4) not null default '1';
alter table usuario modify borrado tinyint(4) not null default '0';

DROP TABLE IF EXISTS `modulo`;
DROP TABLE IF EXISTS `rel_rol_permiso`;
DROP TABLE IF EXISTS `rel_usuario_permiso`;
