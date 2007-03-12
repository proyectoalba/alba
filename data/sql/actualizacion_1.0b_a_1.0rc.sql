SET CHARACTER SET utf8;
SET FOREIGN_KEY_CHECKS = 0;

update tipoiva set id=4 where id=3;update tipoiva set id=3 where id=2;update tipoiva set id=2 where id=1;update tipoiva set id=1 where id=0;
ALTER TABLE `tipoiva` CHANGE `id` `id` INT( 11 ) NOT NULL AUTO_INCREMENT ;

ALTER TABLE `responsable` ADD `observacion` VARCHAR( 255 ) NULL AFTER `relacion` ;

ALTER TABLE `adjunto` CHANGE `ruta` `ruta` VARCHAR(255) NOT NULL;

INSERT INTO permiso (nombre, descripcion, credencial, fk_modulo_id) VALUES ('tipodocumento', 'tipodocumento', 'tipodocumento', 46);
INSERT INTO permiso (nombre, descripcion, credencial, fk_modulo_id) VALUES ('informes', 'informes', 'informes', 47);

ALTER TABLE menu ADD `target` VARCHAR(255) NOT NULL DEFAULT '';

--
-- Dumping data for table `menu`
--
DELETE FROM menu;

INSERT INTO `menu` (`id`, `nombre`, `link`, `perm`, `fk_padre_menu_id`, `orden`, `target`) VALUES (1, '-- Menu Raiz --', '#', '', 1, 0, '');
INSERT INTO `menu` (`id`, `nombre`, `link`, `perm`, `fk_padre_menu_id`, `orden`, `target`) VALUES (2, 'General', '#', '', 10, 0, '');
INSERT INTO `menu` (`id`, `nombre`, `link`, `perm`, `fk_padre_menu_id`, `orden`, `target`) VALUES (3, 'Cuentas', '#', '', 1, 10, '');
INSERT INTO `menu` (`id`, `nombre`, `link`, `perm`, `fk_padre_menu_id`, `orden`, `target`) VALUES (4, 'Alumnos', '#', '', 1, 20, '');
INSERT INTO `menu` (`id`, `nombre`, `link`, `perm`, `fk_padre_menu_id`, `orden`, `target`) VALUES (5, 'Docentes', '#', '', 1, 30, '');
INSERT INTO `menu` (`id`, `nombre`, `link`, `perm`, `fk_padre_menu_id`, `orden`, `target`) VALUES (6, 'Gesti&oacute;n Escolar', '#', '', 1, 40, '');
INSERT INTO `menu` (`id`, `nombre`, `link`, `perm`, `fk_padre_menu_id`, `orden`, `target`) VALUES (7, 'Calendarios y Horarios', '#', '', 1, 50, '');
INSERT INTO `menu` (`id`, `nombre`, `link`, `perm`, `fk_padre_menu_id`, `orden`, `target`) VALUES (8, 'Locaciones y Espacios', '#', '', 1, 60, '');
INSERT INTO `menu` (`id`, `nombre`, `link`, `perm`, `fk_padre_menu_id`, `orden`, `target`) VALUES (9, 'Informes y Consultas', '#', '', 1, 70, '');
INSERT INTO `menu` (`id`, `nombre`, `link`, `perm`, `fk_padre_menu_id`, `orden`, `target`) VALUES (10, 'Administraci&oacute;n', '#', '', 1, 0, '');
INSERT INTO `menu` (`id`, `nombre`, `link`, `perm`, `fk_padre_menu_id`, `orden`, `target`) VALUES (11, 'Preferencias Generales', 'preferencia', 'preferencia', 10, 100, '');
INSERT INTO `menu` (`id`, `nombre`, `link`, `perm`, `fk_padre_menu_id`, `orden`, `target`) VALUES (12, 'Seguridad', '#', 'usuario', 10, 200, '');
INSERT INTO `menu` (`id`, `nombre`, `link`, `perm`, `fk_padre_menu_id`, `orden`, `target`) VALUES (13, 'Usuario', 'usuario/', 'usuario', 12, 0, '');
INSERT INTO `menu` (`id`, `nombre`, `link`, `perm`, `fk_padre_menu_id`, `orden`, `target`) VALUES (14, 'Rol', 'rol/', 'rol', 12, 0, '');
INSERT INTO `menu` (`id`, `nombre`, `link`, `perm`, `fk_padre_menu_id`, `orden`, `target`) VALUES (15, 'Permiso', 'permiso/', 'permiso', 12, 0, '');
INSERT INTO `menu` (`id`, `nombre`, `link`, `perm`, `fk_padre_menu_id`, `orden`, `target`) VALUES (16, 'M&oacute;dulo', 'modulo/', 'modulo', 12, 0, '');
INSERT INTO `menu` (`id`, `nombre`, `link`, `perm`, `fk_padre_menu_id`, `orden`, `target`) VALUES (18, 'Definir Organizaci&oacute;n', 'organizacion/edit?id=1', 'organizacion', 2, 0, '');
INSERT INTO `menu` (`id`, `nombre`, `link`, `perm`, `fk_padre_menu_id`, `orden`, `target`) VALUES (19, 'Definir Establecimiento', 'establecimiento', 'establecimiento', 2, 0, '');
INSERT INTO `menu` (`id`, `nombre`, `link`, `perm`, `fk_padre_menu_id`, `orden`, `target`) VALUES (20, 'Definir Distritos Escolares', 'distritoescolar', 'distrito', 83, 30, '');
INSERT INTO `menu` (`id`, `nombre`, `link`, `perm`, `fk_padre_menu_id`, `orden`, `target`) VALUES (21, 'Definir Provincias', 'provincia', 'provincia', 83, 20, '');
INSERT INTO `menu` (`id`, `nombre`, `link`, `perm`, `fk_padre_menu_id`, `orden`, `target`) VALUES (22, 'Definir Pa&iacute;ses', 'pais/', 'pais', 83, 10, '');
INSERT INTO `menu` (`id`, `nombre`, `link`, `perm`, `fk_padre_menu_id`, `orden`, `target`) VALUES (23, 'Definir Categor&iacute;a de IVA', 'tipoiva/', 'tipoiva', 83, 40, '');
INSERT INTO `menu` (`id`, `nombre`, `link`, `perm`, `fk_padre_menu_id`, `orden`, `target`) VALUES (24, 'Administrar', 'cuenta/', 'cuenta', 3, 0, '');
INSERT INTO `menu` (`id`, `nombre`, `link`, `perm`, `fk_padre_menu_id`, `orden`, `target`) VALUES (26, 'Responsables', 'responsable/', 'responsable', 3, 10, '');
INSERT INTO `menu` (`id`, `nombre`, `link`, `perm`, `fk_padre_menu_id`, `orden`, `target`) VALUES (27, 'Boletines', '#', '', 4, 50, '');
INSERT INTO `menu` (`id`, `nombre`, `link`, `perm`, `fk_padre_menu_id`, `orden`, `target`) VALUES (29, '-', '#', '', 10, 50, '');
INSERT INTO `menu` (`id`, `nombre`, `link`, `perm`, `fk_padre_menu_id`, `orden`, `target`) VALUES (30, 'Salir', 'seguridad/logout', '', 1, 90, '');
INSERT INTO `menu` (`id`, `nombre`, `link`, `perm`, `fk_padre_menu_id`, `orden`, `target`) VALUES (31, 'Definir Escala de notas', 'escalanota', 'escalanota', 84, 30, '');
INSERT INTO `menu` (`id`, `nombre`, `link`, `perm`, `fk_padre_menu_id`, `orden`, `target`) VALUES (32, 'Definir Categor&iacute;as del Bolet&iacute;n de Concepto', 'concepto', 'concepto', 84, 50, '');
INSERT INTO `menu` (`id`, `nombre`, `link`, `perm`, `fk_padre_menu_id`, `orden`, `target`) VALUES (33, 'Buscar Alumno para...', 'legajopedagogico', 'legajopedagogico', 4, 20, '');
INSERT INTO `menu` (`id`, `nombre`, `link`, `perm`, `fk_padre_menu_id`, `orden`, `target`) VALUES (34, 'Tipos de entrada al legajo pedag&oacute;gico', 'legajocategoria', 'legajocategoria', 84, 40, '');
INSERT INTO `menu` (`id`, `nombre`, `link`, `perm`, `fk_padre_menu_id`, `orden`, `target`) VALUES (35, 'Ingresar Nuevo', 'alumno/create', 'alumno', 4, 0, '');
INSERT INTO `menu` (`id`, `nombre`, `link`, `perm`, `fk_padre_menu_id`, `orden`, `target`) VALUES (37, 'Administrar', 'docente', '', 5, 0, '');
INSERT INTO `menu` (`id`, `nombre`, `link`, `perm`, `fk_padre_menu_id`, `orden`, `target`) VALUES (39, 'Tipos de docentes', 'tipodocente', 'tipodocente', 85, 10, '');
INSERT INTO `menu` (`id`, `nombre`, `link`, `perm`, `fk_padre_menu_id`, `orden`, `target`) VALUES (40, 'Motivos de baja', 'cargobaja', 'cargobaja', 85, 20, '');
INSERT INTO `menu` (`id`, `nombre`, `link`, `perm`, `fk_padre_menu_id`, `orden`, `target`) VALUES (41, 'Ingresar Materias/Actividades', 'actividad', '', 6, 40, '');
INSERT INTO `menu` (`id`, `nombre`, `link`, `perm`, `fk_padre_menu_id`, `orden`, `target`) VALUES (42, 'Definir Grados/A&ntilde;os', 'anio', '', 6, 0, '');
INSERT INTO `menu` (`id`, `nombre`, `link`, `perm`, `fk_padre_menu_id`, `orden`, `target`) VALUES (43, 'Actividades por Grado/A&ntilde;o', 'relAnioActividad', '', 6, 50, '');
INSERT INTO `menu` (`id`, `nombre`, `link`, `perm`, `fk_padre_menu_id`, `orden`, `target`) VALUES (44, 'Definir Secciones/Divisiones', 'division', '', 6, 10, '');
INSERT INTO `menu` (`id`, `nombre`, `link`, `perm`, `fk_padre_menu_id`, `orden`, `target`) VALUES (45, 'Definir feriados del a&ntilde;o', 'feriado', 'feriado', 86, 40, '');
INSERT INTO `menu` (`id`, `nombre`, `link`, `perm`, `fk_padre_menu_id`, `orden`, `target`) VALUES (46, 'Definir Ciclos Lectivos', 'ciclolectivo', '', 86, 0, '');
INSERT INTO `menu` (`id`, `nombre`, `link`, `perm`, `fk_padre_menu_id`, `orden`, `target`) VALUES (47, 'Horario Escolar', '#', '', 7, 50, '');
INSERT INTO `menu` (`id`, `nombre`, `link`, `perm`, `fk_padre_menu_id`, `orden`, `target`) VALUES (48, 'Tipos de intevalos de horario escolar', 'horarioescolartipo', 'horarioescolartipo', 86, 30, '');
INSERT INTO `menu` (`id`, `nombre`, `link`, `perm`, `fk_padre_menu_id`, `orden`, `target`) VALUES (49, 'Calendario de vacunas', 'calendariovacunacion', 'calendariovacunacion', 86, 50, '');
INSERT INTO `menu` (`id`, `nombre`, `link`, `perm`, `fk_padre_menu_id`, `orden`, `target`) VALUES (50, '¿Horario seg&uacute;n...?', '#', '', 7, 100, '');
INSERT INTO `menu` (`id`, `nombre`, `link`, `perm`, `fk_padre_menu_id`, `orden`, `target`) VALUES (51, '...docentes', 'calendario/busquedaDocente', '', 50, 0, '');
INSERT INTO `menu` (`id`, `nombre`, `link`, `perm`, `fk_padre_menu_id`, `orden`, `target`) VALUES (52, '...secci&oacute;n/divisi&oacute;n', 'calendario/busquedaDivision', '', 50, 0, '');
INSERT INTO `menu` (`id`, `nombre`, `link`, `perm`, `fk_padre_menu_id`, `orden`, `target`) VALUES (53, 'Listado de Locaciones', 'locacion', '', 8, 0, '');
INSERT INTO `menu` (`id`, `nombre`, `link`, `perm`, `fk_padre_menu_id`, `orden`, `target`) VALUES (54, 'Definir tipos de Locaciones', 'tipolocacion', 'tipolocacion', 87, 10, '');
INSERT INTO `menu` (`id`, `nombre`, `link`, `perm`, `fk_padre_menu_id`, `orden`, `target`) VALUES (55, 'Listado de Espacios x Locaci&oacute;n', 'espacios', '', 8, 10, '');
INSERT INTO `menu` (`id`, `nombre`, `link`, `perm`, `fk_padre_menu_id`, `orden`, `target`) VALUES (56, 'Definir tipos de Espacios', 'tipoespacio', 'tipoespacio', 87, 20, '');
INSERT INTO `menu` (`id`, `nombre`, `link`, `perm`, `fk_padre_menu_id`, `orden`, `target`) VALUES (57, 'Definir horario clases', 'horarioescolar', '', 47, 0, '');
INSERT INTO `menu` (`id`, `nombre`, `link`, `perm`, `fk_padre_menu_id`, `orden`, `target`) VALUES (58, 'Constancia Alumno Regular', 'informes/constanciaAlumnoRegularFormulario?vista=imprimir', 'informes', 9, 0, '_blank');
INSERT INTO `menu` (`id`, `nombre`, `link`, `perm`, `fk_padre_menu_id`, `orden`, `target`) VALUES (60, 'Constancia Egreso 7mo', 'informes/certificadoPrimariaFormulario?vista=imprimir', 'informes', 9, 0, '_blank');
INSERT INTO `menu` (`id`, `nombre`, `link`, `perm`, `fk_padre_menu_id`, `orden`, `target`) VALUES (65, 'Ayuda', '#', '', 1, 80, '');
INSERT INTO `menu` (`id`, `nombre`, `link`, `perm`, `fk_padre_menu_id`, `orden`, `target`) VALUES (67, 'Indice...', 'ayuda/', '', 65, 0, '');
INSERT INTO `menu` (`id`, `nombre`, `link`, `perm`, `fk_padre_menu_id`, `orden`, `target`) VALUES (68, 'Cr&eacute;ditos', 'creditos/', '', 65, 0, '');
INSERT INTO `menu` (`id`, `nombre`, `link`, `perm`, `fk_padre_menu_id`, `orden`, `target`) VALUES (69, 'Generar Horario por secci&oacute;n/divisi&oacute;n', 'calendario', 'calendario', 47, 0, '');
INSERT INTO `menu` (`id`, `nombre`, `link`, `perm`, `fk_padre_menu_id`, `orden`, `target`) VALUES (71, 'Configuraciones Previas', '#', '', 10, 10, '');
INSERT INTO `menu` (`id`, `nombre`, `link`, `perm`, `fk_padre_menu_id`, `orden`, `target`) VALUES (72, 'Definir tipo de bajas', 'conceptobaja', 'conceptobaja', 84, 10, '');
INSERT INTO `menu` (`id`, `nombre`, `link`, `perm`, `fk_padre_menu_id`, `orden`, `target`) VALUES (73, 'Asistencia por Secci&oacute;n/Divisi&oacute;n', 'asistencia', 'asistencia', 4, 40, '');
INSERT INTO `menu` (`id`, `nombre`, `link`, `perm`, `fk_padre_menu_id`, `orden`, `target`) VALUES (74, 'Definir tipo de asistencia', 'tipoasistencia', 'tipoasistencia', 84, 20, '');
INSERT INTO `menu` (`id`, `nombre`, `link`, `perm`, `fk_padre_menu_id`, `orden`, `target`) VALUES (75, 'Definir turnos', 'turnos', 'turnos', 86, 10, '');
INSERT INTO `menu` (`id`, `nombre`, `link`, `perm`, `fk_padre_menu_id`, `orden`, `target`) VALUES (78, 'Asignar Alumno a Secci&oacute;n/Divisi&oacute;n', 'relAlumnoDivision/create', 'relAlumnoDivision', 6, 20, '');
INSERT INTO `menu` (`id`, `nombre`, `link`, `perm`, `fk_padre_menu_id`, `orden`, `target`) VALUES (79, 'Actividad/Materia por Docente', 'relActividadDocente', 'relActividadDocente', 5, 300, '');
INSERT INTO `menu` (`id`, `nombre`, `link`, `perm`, `fk_padre_menu_id`, `orden`, `target`) VALUES (81, 'Concepto', 'boletin/listConcepto', 'boletinconcepto', 27, 0, '');
INSERT INTO `menu` (`id`, `nombre`, `link`, `perm`, `fk_padre_menu_id`, `orden`, `target`) VALUES (82, 'Notas', 'boletin/list', 'boletinnotas', 27, 1, '');
INSERT INTO `menu` (`id`, `nombre`, `link`, `perm`, `fk_padre_menu_id`, `orden`, `target`) VALUES (83, 'Generales', '#', '', 71, 10, '');
INSERT INTO `menu` (`id`, `nombre`, `link`, `perm`, `fk_padre_menu_id`, `orden`, `target`) VALUES (84, 'Alumnos', '#', '', 71, 20, '');
INSERT INTO `menu` (`id`, `nombre`, `link`, `perm`, `fk_padre_menu_id`, `orden`, `target`) VALUES (85, 'Docentes', '#', '', 71, 30, '');
INSERT INTO `menu` (`id`, `nombre`, `link`, `perm`, `fk_padre_menu_id`, `orden`, `target`) VALUES (86, 'Calendarios y Horarios', '#', '', 71, 40, '');
INSERT INTO `menu` (`id`, `nombre`, `link`, `perm`, `fk_padre_menu_id`, `orden`, `target`) VALUES (87, 'Locaciones y Espacios', '#', '', 71, 50, '');
INSERT INTO `menu` (`id`, `nombre`, `link`, `perm`, `fk_padre_menu_id`, `orden`, `target`) VALUES (88, 'Listar Todos', 'alumno/list', 'alumno', 4, 2, '');
INSERT INTO `menu` (`id`, `nombre`, `link`, `perm`, `fk_padre_menu_id`, `orden`, `target`) VALUES (89, 'Tipo Documento', 'tipodocumento', '', 83, 40, '');
INSERT INTO `menu` (`id`, `nombre`, `link`, `perm`, `fk_padre_menu_id`, `orden`, `target`) VALUES (90, 'Alumnos por divsi&oacute;n', 'informes/alumnosPorDivisionFormulario?vista=imprimir', 'informes', 9, 0, '_blank');
INSERT INTO `menu` (`id`, `nombre`, `link`, `perm`, `fk_padre_menu_id`, `orden`, `target`) VALUES (91, 'Boletines', 'informes/boletinFormulario', 'informes', 9, 0, '_blank');
INSERT INTO `menu` (`id`, `nombre`, `link`, `perm`, `fk_padre_menu_id`, `orden`, `target`) VALUES (92, 'Certificado de Estudios', 'informes/certificadoEstudiosBusquedaFormulario', 'informes', '9', '0', '_blank');
INSERT INTO `menu` (`id`, `nombre`, `link`, `perm`, `fk_padre_menu_id`, `orden`, `target`) VALUES (93, 'Solicitud de Legajo', 'informes/solicitudLegajoBusquedaFormulario', 'informes', '9', '0', '_blank');
INSERT INTO `menu` (`id`, `nombre`, `link`, `perm`, `fk_padre_menu_id`, `orden`, `target`) VALUES (94, 'Definir Per&iacute;odos', '#', 'ciclolectivo', 86, 10, '');
INSERT INTO `menu` (`id`, `nombre`, `link`, `perm`, `fk_padre_menu_id`, `orden`, `target`) VALUES (95, 'Ir a Ciclo Lectivo Actual', 'ciclolectivo/agregarTurnosYPeriodos', 'ciclolectivo', 7, 0, '');


ALTER TABLE locacion ADD `principal` TINYINT(1) NOT NULL DEFAULT '0';

ALTER TABLE `alumno` ADD `lugar_nacimiento` VARCHAR( 128 ) NOT NULL AFTER `id` ,
ADD `fk_pais_id` INT NOT NULL AFTER `lugar_nacimiento` ;

ALTER TABLE `alumno` CHANGE `fk_conceptobaja_id` `fk_conceptobaja_id` INT NULL;
ALTER TABLE `division` ADD `orden` INT NOT NULL DEFAULT '0';


SET FOREIGN_KEY_CHECKS = 1;