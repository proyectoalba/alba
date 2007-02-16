SET FOREIGN_KEY_CHECKS = 0;
SET CHARACTER SET utf8;


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
INSERT INTO `menu` (`id`, `nombre`, `link`, `perm`, `fk_padre_menu_id`, `orden`, `target`) VALUES 
(1, '-- Menu Raiz --', '#', '', 1, 0, ''),
(2, 'General', '#', '', 10, 0, ''),
(3, 'Cuentas', '#', '', 1, 10, ''),
(4, 'Alumnos', '#', '', 1, 20, ''),
(5, 'Docentes', '#', '', 1, 30, ''),
(6, 'Gesti&oacute;n Escolar', '#', '', 1, 40, ''),
(7, 'Calendarios y Horarios', '#', '', 1, 50, ''),
(8, 'Locaciones y Espacios', '#', '', 1, 60, ''),
(9, 'Informes y Consultas', '#', '', 1, 70, ''),
(10, 'Administraci&oacute;n', '#', '', 1, 0, ''),
(11, 'Preferencias Generales', 'preferencia', 'preferencia', 10, 100, ''),
(12, 'Seguridad', '#', 'usuario', 10, 200, ''),
(13, 'Usuario', 'usuario/', 'usuario', 12, 0, ''),
(14, 'Rol', 'rol/', 'rol', 12, 0, ''),
(15, 'Permiso', 'permiso/', 'permiso', 12, 0, ''),
(16, 'M&oacute;dulo', 'modulo/', 'modulo', 12, 0, ''),
(18, 'Definir Organizaci&oacute;n', 'organizacion/edit?id=1', 'organizacion', 2, 0, ''),
(19, 'Definir Establecimiento', 'establecimiento', 'establecimiento', 2, 0, ''),
(20, 'Definir Distritos Escolares', 'distritoescolar', 'distrito', 83, 30, ''),
(21, 'Definir Provincias', 'provincia', 'provincia', 83, 20, ''),
(22, 'Definir Pa&iacute;ses', 'pais/', 'pais', 83, 10, ''),
(23, 'Definir Categor&iacute;a de IVA', 'tipoiva/', 'tipoiva', 83, 40, ''),
(24, 'Administrar', 'cuenta/', 'cuenta', 3, 0, ''),
(26, 'Responsables', 'responsable/', 'responsable', 3, 10, ''),
(27, 'Boletines', '#', '', 4, 50, ''),
(29, '-', '#', '', 10, 50, ''),
(30, 'Salir', 'seguridad/logout', '', 1, 90, ''),
(31, 'Definir Escala de notas', 'escalanota', 'escalanota', 84, 30, ''),
(32, 'Definir Categor&iacute;as del Bolet&iacute;n de Concepto', 'concepto', 'concepto', 84, 50, ''),
(33, 'Buscar Alumno para...', 'legajopedagogico', 'legajopedagogico', 4, 20, ''),
(34, 'Tipos de entrada al legajo pedag&oacute;gico', 'legajocategoria', 'legajocategoria', 84, 40, ''),
(35, 'Ingresar Nuevo', 'alumno/create', 'alumno', 4, 0, ''),
(37, 'Administrar', 'docente', '', 5, 0, ''),
(39, 'Tipos de docentes', 'tipodocente', 'tipodocente', 85, 10, ''),
(40, 'Motivos de baja', 'cargobaja', 'cargobaja', 85, 20, ''),
(41, 'Ingresar Materias/Actividades', 'actividad', '', 6, 40, ''),
(42, 'Definir Grados/A&ntilde;os', 'anio', '', 6, 0, ''),
(43, 'Actividades por Grado/A&ntilde;o', 'relAnioActividad', '', 6, 50, ''),
(44, 'Definir Secciones/Divisiones', 'division', '', 6, 10, ''),
(45, 'Definir feriados del a&ntilde;o', 'feriado', 'feriado', 86, 40, ''),
(46, 'Ciclo lectivo (actual)', 'ciclolectivo', '', 86, 0, ''),
(47, 'Horario Escolar', '#', '', 7, 50, ''),
(48, 'Tipos de intevalos de horario escolar', 'horarioescolartipo', 'horarioescolartipo', 86, 20, ''),
(49, 'Calendario de vacunas', 'calendariovacunacion', 'calendariovacunacion', 86, 30, ''),
(50, 'Horario segun...?', '#', '', 7, 100, ''),
(51, '...docentes', 'calendario/busquedaDocente', '', 50, 0, ''),
(52, '...secci&oacute;n/divisi&oacute;n', 'calendario/busquedaDivision', '', 50, 0, ''),
(53, 'Listado de Locaciones', 'locacion', '', 8, 0, ''),
(54, 'Definir tipos de Locaciones', 'tipolocacion', 'tipolocacion', 87, 10, ''),
(55, 'Listado de Espacios x Locaci&oacute;n', 'espacios', '', 8, 10, ''),
(56, 'Definir tipos de Espacios', 'tipoespacio', 'tipoespacio', 87, 20, ''),
(57, 'Definir horario clases', 'horarioescolar', '', 47, 0, ''),
(58, 'Constancia Alumno Regular', 'informes/constanciaAlumnoRegularFormulario?vista=imprimir', 'informes', 9, 0, '_blank'),
(60, 'Constancia Egreso 7mo', 'informes/certificadoPrimariaFormulario?vista=imprimir', 'informes', 9, 0, '_blank'),
(61, '-', '', '', 9, 10, ''),
(63, 'Matr&iacute;cula Inicial?', '', '', 9, 100, ''),
(64, 'Matr&iacute;cula Final?', '', '', 9, 100, ''),
(65, 'Ayuda', '#', '', 1, 80, ''),
(67, 'Indice...', 'ayuda/', '', 65, 0, ''),
(68, 'Cr&eacute;ditos', 'creditos/', '', 65, 0, ''),
(69, 'Generar Horario por secci&oacute;n/divisi&oacute;n', 'calendario', 'calendario', 47, 0, ''),
(71, 'Configuraciones Previas', '#', '', 10, 10, ''),
(72, 'Definir tipo de bajas', 'conceptobaja', 'conceptobaja', 84, 10, ''),
(73, 'Asistencia por Secci&oacute;n/Divisi&oacute;n', 'asistencia', 'asistencia', 4, 40, ''),
(74, 'Definir tipo de asistencia', 'tipoasistencia', 'tipoasistencia', 84, 20, ''),
(75, 'Definir turnos', 'turnos', 'turnos', 86, 10, ''),
(78, 'Asignar Alumno a Secci&oacute;n/Divisi&oacute;n', 'relAlumnoDivision/create', 'relAlumnoDivision', 6, 20, ''),
(79, 'Actividad/Materia por Docente', 'relActividadDocente', 'relActividadDocente', 5, 300, ''),
(81, 'Concepto', 'boletin/listConcepto', 'boletinconcepto', 27, 0, ''),
(82, 'Notas', 'boletin/list', 'boletinnotas', 27, 1, ''),
(83, 'Generales', '#', '', 71, 10, ''),
(84, 'Alumnos', '#', '', 71, 20, ''),
(85, 'Docentes', '#', '', 71, 30, ''),
(86, 'Calendarios y Horarios', '#', '', 71, 40, ''),
(87, 'Locaciones y Espacios', '#', '', 71, 50, ''),
(88, 'Listar Todos', 'alumno/list', 'alumno', 4, 2, ''),
(89, 'Tipo Documento', 'tipodocumento', '', 83, 40, ''),
(90, 'Alumnos por divsi&oacute;n', 'informes/alumnosPorDivisionFormulario?vista=imprimir', 'informes', 9, 0, '_blank'),
(91, 'Boletines', 'informes/boletinFormulario', 'informes', 9, 0, '_blank'),
(92, 'Certificado de Estudios', 'informes/certificadoEstudiosBusquedaFormulario', 'informes', 9, 0, '_blank');


ALTER TABLE locacion ADD `principal` TINYINT(1) NOT NULL DEFAULT '0';

ALTER TABLE `alumno` ADD `lugar_nacimiento` VARCHAR( 128 ) NOT NULL AFTER `id` ,
ADD `fk_pais_id` INT NOT NULL AFTER `lugar_nacimiento` ;

SET FOREIGN_KEY_CHECKS = 1;
