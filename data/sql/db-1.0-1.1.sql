alter table permiso modify fk_modulo_id int default null;
alter table permiso drop fk_modulo_id;
alter table permiso drop foreign key permiso_FK_1;
alter table permiso drop fk_modulo_id;
alter table permiso drop credencial;
truncate table permiso;

INSERT INTO `permiso` VALUES(1, 'usuario', 'Modulo de usuario');
INSERT INTO `permiso` VALUES(2, 'actividad', NULL);
INSERT INTO `permiso` VALUES(3, 'alumno', NULL);
INSERT INTO `permiso` VALUES(4, 'anio', NULL);
INSERT INTO `permiso` VALUES(5, 'calendario', NULL);
INSERT INTO `permiso` VALUES(6, 'calendariovacunacion', NULL);
INSERT INTO `permiso` VALUES(7, 'ciclolectivo', NULL);
INSERT INTO `permiso` VALUES(8, 'concepto', NULL);
INSERT INTO `permiso` VALUES(9, 'cuenta', NULL);
INSERT INTO `permiso` VALUES(10, 'division', NULL);
INSERT INTO `permiso` VALUES(11, 'docente', NULL);
INSERT INTO `permiso` VALUES(12, 'docentehorario', NULL);
INSERT INTO `permiso` VALUES(13, 'escalanota', NULL);
INSERT INTO `permiso` VALUES(14, 'establecimiento', NULL);
INSERT INTO `permiso` VALUES(15, 'feriado', NULL);
INSERT INTO `permiso` VALUES(16, 'legajocategoria', NULL);
INSERT INTO `permiso` VALUES(17, 'locacion', NULL);
INSERT INTO `permiso` VALUES(18, 'pais', NULL);
INSERT INTO `permiso` VALUES(19, 'preferencia', NULL);
INSERT INTO `permiso` VALUES(20, 'provincia', NULL);
INSERT INTO `permiso` VALUES(21, 'relactividaddocente', NULL);
INSERT INTO `permiso` VALUES(22, 'relactividad', NULL);
INSERT INTO `permiso` VALUES(23, 'relcalendariovacunacionalumno', NULL);
INSERT INTO `permiso` VALUES(24, 'responsable', NULL);
INSERT INTO `permiso` VALUES(25, 'rol', NULL);
INSERT INTO `permiso` VALUES(26, 'tipoiva', NULL);
INSERT INTO `permiso` VALUES(27, 'turno', NULL);
INSERT INTO `permiso` VALUES(28, 'tipolocacion', NULL);
INSERT INTO `permiso` VALUES(29, 'tipoespacio', NULL);
INSERT INTO `permiso` VALUES(30, 'espacio', NULL);
INSERT INTO `permiso` VALUES(31, 'cargobaja', NULL);
INSERT INTO `permiso` VALUES(32, 'conceptobaja', NULL);
INSERT INTO `permiso` VALUES(33, 'distritoescolar', NULL);
INSERT INTO `permiso` VALUES(34, 'horarioescolar', NULL);
INSERT INTO `permiso` VALUES(35, 'horarioescolartipo', NULL);
INSERT INTO `permiso` VALUES(36, 'tipodocente', NULL);
INSERT INTO `permiso` VALUES(37, 'organizacion', NULL);
INSERT INTO `permiso` VALUES(38, 'asistencia', 'Asistencias');
INSERT INTO `permiso` VALUES(39, 'legajopedagogico', NULL);
INSERT INTO `permiso` VALUES(40, 'tipoasistencia', NULL);
INSERT INTO `permiso` VALUES(41, 'formatofecha', NULL);
INSERT INTO `permiso` VALUES(42, 'rellocacionespacio', NULL);
INSERT INTO `permiso` VALUES(43, 'relalumnodivision', NULL);
INSERT INTO `permiso` VALUES(44, 'boletin', NULL);
INSERT INTO `permiso` VALUES(45, 'boletinconcepto', 'boletinconcepto');
INSERT INTO `permiso` VALUES(46, 'boletinnotas', 'boletinnotas');
INSERT INTO `permiso` VALUES(47, 'tipodocumento', 'tipodocumento');
INSERT INTO `permiso` VALUES(48, 'informes', 'informes');
INSERT INTO `permiso` VALUES(49, 'rolresponsable', 'Rol de Responsables');
INSERT INTO `permiso` VALUES(50, 'orientacion', 'Orientacion');
INSERT INTO `permiso` VALUES(51, 'tiponivel', 'Tipo de Nivel');
INSERT INTO `permiso` VALUES(52, 'carrera', 'Carreras');
INSERT INTO `permiso` VALUES(53, 'legajosalud', 'Legajo de Salud');
INSERT INTO `permiso` VALUES(54, 'relanioactividad', 'Modulo de Años y Actividades');

CREATE TABLE `estadosalumnos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

insert into estadosalumnos (id,nombre) values (1,'Regular');
insert into estadosalumnos (id,nombre) values (2,'Libre');
insert into estadosalumnos (id,nombre) values (3,'Egresado');
insert into estadosalumnos (id,nombre) values (4,'Ex-alumno');

CREATE TABLE `alumno_salud` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_alumno_id` int(11) NOT NULL,
  `cobertura_medica` varchar(255) DEFAULT NULL,
  `cobertura_telefono` varchar(40) DEFAULT NULL,
  `cobertura_observaciones` varchar(255) DEFAULT NULL,
  `medico_nombre` varchar(255) DEFAULT NULL,
  `medico_domicilio` varchar(255) DEFAULT NULL,
  `medico_telefono` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `alumno_salud_FI_1` (`fk_alumno_id`),
  CONSTRAINT `alumno_salud_FK_1` FOREIGN KEY (`fk_alumno_id`) REFERENCES `alumno` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `nivel_instruccion` (
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`descripcion` VARCHAR(60),
	PRIMARY KEY (`id`)
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

insert into tipoinforme (id,nombre,descripcion) values (1,'Alumnos','Informes relacionados a los alumnos');
insert into tipoinforme (id,nombre,descripcion) values (2,'General','Informes de datos generales');

INSERT INTO `adjunto` VALUES(1, NULL, 'constancia_alumno_regular', 'constancia_alumno_regular.odt', 'application/vnd.oasis.opendocument.text', 'constancia_alumno_regular.odt', '2007-10-17 00:00:00');
INSERT INTO `adjunto` VALUES(2, NULL, 'certificado_de_terminacion_de_estudios_primarios', 'certificado_de_terminacion_de_estudios_primarios.odt\n', 'application/vnd.oasis.opendocument.text', 'certificado_de_terminacion_de_estudios_primarios.odt\n', '2007-10-17 00:00:00');
INSERT INTO `adjunto` VALUES(3, NULL, 'solicitud_legajo', 'solicitud_legajo.odt', 'application/vnd.oasis.opendocument.text', 'solicitud_legajo.odt', '2007-10-17 00:00:00');
INSERT INTO `adjunto` VALUES(4, NULL, 'certificado_de_estudios', 'certificado_de_estudios.odt', 'application/vnd.oasis.opendocument.text', 'certificado_de_estudios.odt', '2007-10-17 00:00:00');
INSERT INTO `adjunto` VALUES(5, NULL, 'alumnos_por_division', 'alumnos_por_division.odt', 'application/vnd.oasis.opendocument.text', 'alumnos_por_division.odt', '2007-10-17 00:00:00');
INSERT INTO `adjunto` VALUES(6, NULL, 'locacion', 'locacion.odt', 'application/vnd.oasis.opendocument.text', 'locacion.odt', '2007-10-17 00:00:00');
INSERT INTO `adjunto` VALUES(7, NULL, 'docente', 'docente.odt', 'application/vnd.oasis.opendocument.text', 'docente.odt', '2007-10-17 00:00:00');
INSERT INTO `adjunto` VALUES(8, NULL, 'organizacion', 'organizacion.odt', 'application/vnd.oasis.opendocument.text', 'organizacion.odt', '2007-10-17 00:00:00');
INSERT INTO `adjunto` VALUES(9, NULL, 'cuenta', 'cuenta.odt', 'application/vnd.oasis.opendocument.text', 'cuenta.odt', '2007-10-17 00:00:00');
INSERT INTO `adjunto` VALUES(10, NULL, 'responsable', 'responsable.odt', 'application/vnd.oasis.opendocument.text', 'responsable.odt', '2007-10-17 00:00:00');
INSERT INTO `adjunto` VALUES(11, NULL, 'constancia_alumno_regular', 'constancia_alumno_regular.odt', 'application/vnd.oasis.opendocument.text', 'constancia_alumno_regular.odt', '2007-10-17 00:00:00');
INSERT INTO `adjunto` VALUES(12, NULL, 'certificado_de_terminacion_de_estudios_primarios', 'certificado_de_terminacion_de_estudios_primarios.odt\n', 'application/vnd.oasis.opendocument.text', 'certificado_de_terminacion_de_estudios_primarios.odt\n', '2007-10-17 00:00:00');
INSERT INTO `adjunto` VALUES(13, NULL, 'solicitud_legajo', 'solicitud_legajo.odt', 'application/vnd.oasis.opendocument.text', 'solicitud_legajo.odt', '2007-10-17 00:00:00');
INSERT INTO `adjunto` VALUES(14, NULL, 'certificado_de_estudios', 'certificado_de_estudios.odt', 'application/vnd.oasis.opendocument.text', 'certificado_de_estudios.odt', '2007-10-17 00:00:00');
INSERT INTO `adjunto` VALUES(15, NULL, 'alumnos_por_division', 'alumnos_por_division.odt', 'application/vnd.oasis.opendocument.text', 'alumnos_por_division.odt', '2007-10-17 00:00:00');
INSERT INTO `adjunto` VALUES(16, NULL, 'locacion', 'locacion.odt', 'application/vnd.oasis.opendocument.text', 'locacion.odt', '2007-10-17 00:00:00');
INSERT INTO `adjunto` VALUES(17, NULL, 'docente', 'docente.odt', 'application/vnd.oasis.opendocument.text', 'docente.odt', '2007-10-17 00:00:00');
INSERT INTO `adjunto` VALUES(18, NULL, 'organizacion', 'organizacion.odt', 'application/vnd.oasis.opendocument.text', 'organizacion.odt', '2007-10-17 00:00:00');
INSERT INTO `adjunto` VALUES(19, NULL, 'cuenta', 'cuenta.odt', 'application/vnd.oasis.opendocument.text', 'cuenta.odt', '2007-10-17 00:00:00');
INSERT INTO `adjunto` VALUES(20, NULL, 'responsable', 'responsable.odt', 'application/vnd.oasis.opendocument.text', 'responsable.odt', '2007-10-17 00:00:00');


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

INSERT INTO `informe` VALUES(1, 'Constancia de alumno regular', 'Constancia de alumno regular', 1, 1, 0, NULL);
INSERT INTO `informe` VALUES(2, 'Certificado fin de estudios primarios', 'Certificado fin de estudios primarios', 2, 1, 0, NULL);
INSERT INTO `informe` VALUES(3, 'Solicitud de legajo', 'Solicitud de legajo', 3, 1, 0, 'origen');
INSERT INTO `informe` VALUES(4, 'Certificado de estudios', 'Certificado de estudios', 4, 1, 0, 'grado;año');
INSERT INTO `informe` VALUES(5, 'Alumnos por división', 'Alumnos por división', 5, 1, 1, NULL);
INSERT INTO `informe` VALUES(6, 'Locacion', 'Locacion', 6, 2, 1, NULL);
INSERT INTO `informe` VALUES(7, 'Docente', 'Docente', 7, 2, 1, NULL);
INSERT INTO `informe` VALUES(8, 'Organizaci&oacute;n', 'Organizaci&oacute;n', 8, 2, 0, NULL);
INSERT INTO `informe` VALUES(9, 'Cuenta', 'Cuenta', 9, 2, 1, NULL);
INSERT INTO `informe` VALUES(10, 'Responsable', 'Responsable', 10, 2, 1, NULL);

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

alter table rel_rol_permiso rename rol_permiso;

insert into rol (nombre,descripcion) values ('upgrade_admin', 'Administrador (upgrade)');

<<<<<<< HEAD
INSERT INTO `rol_permiso` (fk_rol_id, fk_permiso_id) VALUES(1, 2);
INSERT INTO `rol_permiso` (fk_rol_id, fk_permiso_id) VALUES(1, 3);
INSERT INTO `rol_permiso` (fk_rol_id, fk_permiso_id) VALUES(1, 4);
INSERT INTO `rol_permiso` (fk_rol_id, fk_permiso_id) VALUES(1, 38);
INSERT INTO `rol_permiso` (fk_rol_id, fk_permiso_id) VALUES(1, 44);
INSERT INTO `rol_permiso` (fk_rol_id, fk_permiso_id) VALUES(1, 45);
INSERT INTO `rol_permiso` (fk_rol_id, fk_permiso_id) VALUES(1, 46);
INSERT INTO `rol_permiso` (fk_rol_id, fk_permiso_id) VALUES(1, 5);
INSERT INTO `rol_permiso` (fk_rol_id, fk_permiso_id) VALUES(1, 6);
INSERT INTO `rol_permiso` (fk_rol_id, fk_permiso_id) VALUES(1, 31);
INSERT INTO `rol_permiso` (fk_rol_id, fk_permiso_id) VALUES(1, 52);
INSERT INTO `rol_permiso` (fk_rol_id, fk_permiso_id) VALUES(1, 7);
INSERT INTO `rol_permiso` (fk_rol_id, fk_permiso_id) VALUES(1, 32);
INSERT INTO `rol_permiso` (fk_rol_id, fk_permiso_id) VALUES(1, 8);
INSERT INTO `rol_permiso` (fk_rol_id, fk_permiso_id) VALUES(1, 9);
INSERT INTO `rol_permiso` (fk_rol_id, fk_permiso_id) VALUES(1, 33);
INSERT INTO `rol_permiso` (fk_rol_id, fk_permiso_id) VALUES(1, 10);
INSERT INTO `rol_permiso` (fk_rol_id, fk_permiso_id) VALUES(1, 11);
INSERT INTO `rol_permiso` (fk_rol_id, fk_permiso_id) VALUES(1, 12);
INSERT INTO `rol_permiso` (fk_rol_id, fk_permiso_id) VALUES(1, 13);
INSERT INTO `rol_permiso` (fk_rol_id, fk_permiso_id) VALUES(1, 30);
INSERT INTO `rol_permiso` (fk_rol_id, fk_permiso_id) VALUES(1, 14);
INSERT INTO `rol_permiso` (fk_rol_id, fk_permiso_id) VALUES(1, 15);
INSERT INTO `rol_permiso` (fk_rol_id, fk_permiso_id) VALUES(1, 41);
INSERT INTO `rol_permiso` (fk_rol_id, fk_permiso_id) VALUES(1, 34);
INSERT INTO `rol_permiso` (fk_rol_id, fk_permiso_id) VALUES(1, 35);
INSERT INTO `rol_permiso` (fk_rol_id, fk_permiso_id) VALUES(1, 48);
INSERT INTO `rol_permiso` (fk_rol_id, fk_permiso_id) VALUES(1, 16);
INSERT INTO `rol_permiso` (fk_rol_id, fk_permiso_id) VALUES(1, 39);
INSERT INTO `rol_permiso` (fk_rol_id, fk_permiso_id) VALUES(1, 53);
INSERT INTO `rol_permiso` (fk_rol_id, fk_permiso_id) VALUES(1, 17);
INSERT INTO `rol_permiso` (fk_rol_id, fk_permiso_id) VALUES(1, 37);
INSERT INTO `rol_permiso` (fk_rol_id, fk_permiso_id) VALUES(1, 50);
INSERT INTO `rol_permiso` (fk_rol_id, fk_permiso_id) VALUES(1, 18);
INSERT INTO `rol_permiso` (fk_rol_id, fk_permiso_id) VALUES(1, 19);
INSERT INTO `rol_permiso` (fk_rol_id, fk_permiso_id) VALUES(1, 20);
INSERT INTO `rol_permiso` (fk_rol_id, fk_permiso_id) VALUES(1, 22);
INSERT INTO `rol_permiso` (fk_rol_id, fk_permiso_id) VALUES(1, 21);
INSERT INTO `rol_permiso` (fk_rol_id, fk_permiso_id) VALUES(1, 43);
INSERT INTO `rol_permiso` (fk_rol_id, fk_permiso_id) VALUES(1, 23);
INSERT INTO `rol_permiso` (fk_rol_id, fk_permiso_id) VALUES(1, 42);
INSERT INTO `rol_permiso` (fk_rol_id, fk_permiso_id) VALUES(1, 24);
INSERT INTO `rol_permiso` (fk_rol_id, fk_permiso_id) VALUES(1, 25);
INSERT INTO `rol_permiso` (fk_rol_id, fk_permiso_id) VALUES(1, 49);
INSERT INTO `rol_permiso` (fk_rol_id, fk_permiso_id) VALUES(1, 40);
INSERT INTO `rol_permiso` (fk_rol_id, fk_permiso_id) VALUES(1, 36);
INSERT INTO `rol_permiso` (fk_rol_id, fk_permiso_id) VALUES(1, 47);
INSERT INTO `rol_permiso` (fk_rol_id, fk_permiso_id) VALUES(1, 29);
INSERT INTO `rol_permiso` (fk_rol_id, fk_permiso_id) VALUES(1, 26);
INSERT INTO `rol_permiso` (fk_rol_id, fk_permiso_id) VALUES(1, 28);
INSERT INTO `rol_permiso` (fk_rol_id, fk_permiso_id) VALUES(1, 51);
INSERT INTO `rol_permiso` (fk_rol_id, fk_permiso_id) VALUES(1, 27);
INSERT INTO `rol_permiso` (fk_rol_id, fk_permiso_id) VALUES(1, 1);
INSERT INTO `rol_permiso` (fk_rol_id, fk_permiso_id) VALUES(1, 54);


=======
INSERT INTO `rol_permiso` VALUES(1, 1, 2);
INSERT INTO `rol_permiso` VALUES(2, 1, 3);
INSERT INTO `rol_permiso` VALUES(3, 1, 4);
INSERT INTO `rol_permiso` VALUES(4, 1, 38);
INSERT INTO `rol_permiso` VALUES(5, 1, 44);
INSERT INTO `rol_permiso` VALUES(6, 1, 45);
INSERT INTO `rol_permiso` VALUES(7, 1, 46);
INSERT INTO `rol_permiso` VALUES(8, 1, 5);
INSERT INTO `rol_permiso` VALUES(9, 1, 6);
INSERT INTO `rol_permiso` VALUES(10, 1, 31);
INSERT INTO `rol_permiso` VALUES(11, 1, 52);
INSERT INTO `rol_permiso` VALUES(12, 1, 7);
INSERT INTO `rol_permiso` VALUES(13, 1, 32);
INSERT INTO `rol_permiso` VALUES(14, 1, 8);
INSERT INTO `rol_permiso` VALUES(15, 1, 9);
INSERT INTO `rol_permiso` VALUES(16, 1, 33);
INSERT INTO `rol_permiso` VALUES(17, 1, 10);
INSERT INTO `rol_permiso` VALUES(18, 1, 11);
INSERT INTO `rol_permiso` VALUES(19, 1, 12);
INSERT INTO `rol_permiso` VALUES(20, 1, 13);
INSERT INTO `rol_permiso` VALUES(21, 1, 30);
INSERT INTO `rol_permiso` VALUES(22, 1, 14);
INSERT INTO `rol_permiso` VALUES(23, 1, 15);
INSERT INTO `rol_permiso` VALUES(24, 1, 41);
INSERT INTO `rol_permiso` VALUES(25, 1, 34);
INSERT INTO `rol_permiso` VALUES(26, 1, 35);
INSERT INTO `rol_permiso` VALUES(27, 1, 48);
INSERT INTO `rol_permiso` VALUES(28, 1, 16);
INSERT INTO `rol_permiso` VALUES(29, 1, 39);
INSERT INTO `rol_permiso` VALUES(30, 1, 53);
INSERT INTO `rol_permiso` VALUES(31, 1, 17);
INSERT INTO `rol_permiso` VALUES(32, 1, 37);
INSERT INTO `rol_permiso` VALUES(33, 1, 50);
INSERT INTO `rol_permiso` VALUES(34, 1, 18);
INSERT INTO `rol_permiso` VALUES(35, 1, 19);
INSERT INTO `rol_permiso` VALUES(36, 1, 20);
INSERT INTO `rol_permiso` VALUES(37, 1, 22);
INSERT INTO `rol_permiso` VALUES(38, 1, 21);
INSERT INTO `rol_permiso` VALUES(39, 1, 43);
INSERT INTO `rol_permiso` VALUES(40, 1, 23);
INSERT INTO `rol_permiso` VALUES(41, 1, 42);
INSERT INTO `rol_permiso` VALUES(42, 1, 24);
INSERT INTO `rol_permiso` VALUES(43, 1, 25);
INSERT INTO `rol_permiso` VALUES(44, 1, 49);
INSERT INTO `rol_permiso` VALUES(45, 1, 40);
INSERT INTO `rol_permiso` VALUES(46, 1, 36);
INSERT INTO `rol_permiso` VALUES(47, 1, 47);
INSERT INTO `rol_permiso` VALUES(48, 1, 29);
INSERT INTO `rol_permiso` VALUES(49, 1, 26);
INSERT INTO `rol_permiso` VALUES(50, 1, 28);
INSERT INTO `rol_permiso` VALUES(51, 1, 51);
INSERT INTO `rol_permiso` VALUES(52, 1, 27);
INSERT INTO `rol_permiso` VALUES(53, 1, 1);
INSERT INTO `rol_permiso` VALUES(54, 1, 54);

ALTER TABLE `rol_permiso`
  ADD CONSTRAINT `rol_permiso_FK_1` FOREIGN KEY (`fk_rol_id`) REFERENCES `rol` (`id`),
  ADD CONSTRAINT `rol_permiso_FK_2` FOREIGN KEY (`fk_permiso_id`) REFERENCES `permiso` (`id`);

>>>>>>> cf0303652b911387256c8c7a16e6e824b0dc734b
drop table rel_usuario_permiso;

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
alter table responsable add fk_nivel_instruccion_id integer null;

ALTER TABLE `responsable`
	ADD CONSTRAINT `responsable_FK_5` FOREIGN KEY (`fk_nivel_instruccion_id`) REFERENCES `nivel_instruccion` (`id`);

alter table rol modify activo tinyint(4) not null default '1';
alter table rol_responsable modify activo tinyint(4) not null default '1';
alter table tipoasistencia modify defecto tinyint(4) not null default '0';

alter table usuario modify correo_publico tinyint(4) default '1';
alter table usuario modify activo tinyint(4) not null default '1';
alter table usuario modify borrado tinyint(4) not null default '0';

DROP TABLE IF EXISTS `modulo`;
DROP TABLE IF EXISTS `rel_rol_permiso`;
DROP TABLE IF EXISTS `rel_usuario_permiso`;

--

INSERT INTO nivel_instruccion (descripcion) VALUES ('Inicial'),('Primario'),('Primario (incompleto)'), ('Secundario'),('Secundario (incompleto)'), ('Terciario'),('Terciario (incompleto)'), ('Universitario'),('Universitario (incompleto)');
INSERT INTO rol_responsable (nombre, descripcion, activo) VALUES ('Hermano/a', 'Hermano/a del alumno', 1);
