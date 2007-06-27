SET CHARACTER SET utf8;
SET FOREIGN_KEY_CHECKS = 0;
 
-- Volcar la base de datos para la tabla 'niveltipo'
-- 

INSERT INTO niveltipo (id, nombre, descripcion) VALUES (1, 'Jardín', 'Jardín');
INSERT INTO niveltipo (id, nombre, descripcion) VALUES (2, 'Primaria', 'Primaria');
INSERT INTO niveltipo (id, nombre, descripcion) VALUES (3, 'Secundaria', 'Secundaria');
INSERT INTO niveltipo (id, nombre, descripcion) VALUES (4, 'Universitario', 'Universitario');
INSERT INTO niveltipo (id, nombre, descripcion) VALUES (5, 'Terciario', 'Terciario');
INSERT INTO niveltipo (id, nombre, descripcion) VALUES (6, 'Institutos', 'Institutos');
INSERT INTO niveltipo (id, nombre, descripcion) VALUES (7, 'Otros', 'Otros');

-- 
-- Volcar la base de datos para la tabla 'pais'
-- 

INSERT INTO pais (id, nombre_largo, nombre_corto, orden) VALUES (1, 'Argentina', 'ARG', 100);

-- 
-- Volcar la base de datos para la tabla 'provincia'
-- 

INSERT INTO provincia (id, nombre_corto, nombre_largo, fk_pais_id) VALUES (1, 'Bs. As.', 'Buenos Aires', 1);
INSERT INTO provincia (id, nombre_corto, nombre_largo, fk_pais_id) VALUES (6, 'La Pampa', 'La Pampa', 1);
INSERT INTO provincia (id, nombre_corto, nombre_largo, fk_pais_id) VALUES (7, 'Chaco', 'Chaco', 1);
INSERT INTO provincia (id, nombre_corto, nombre_largo, fk_pais_id) VALUES (8, 'Córdoba', 'Córdoba', 1);
INSERT INTO provincia (id, nombre_corto, nombre_largo, fk_pais_id) VALUES (9, 'Misiones', 'Misiones', 1);
INSERT INTO provincia (id, nombre_corto, nombre_largo, fk_pais_id) VALUES (10, 'Mendoza', 'Mendoza', 1);
INSERT INTO provincia (id, nombre_corto, nombre_largo, fk_pais_id) VALUES (11, 'E.Ríos', 'Entre Ríos', 1);
INSERT INTO provincia (id, nombre_corto, nombre_largo, fk_pais_id) VALUES (12, 'Jujuy', 'Jujuy', 1);
INSERT INTO provincia (id, nombre_corto, nombre_largo, fk_pais_id) VALUES (13, 'Chubut', 'Chubut', 1);
INSERT INTO provincia (id, nombre_corto, nombre_largo, fk_pais_id) VALUES (14, 'Salta', 'Salta', 1);
INSERT INTO provincia (id, nombre_corto, nombre_largo, fk_pais_id) VALUES (15, 'Santa Cruz', 'Santa Cruz', 1);
INSERT INTO provincia (id, nombre_corto, nombre_largo, fk_pais_id) VALUES (16, 'San Juan', 'San Juan', 1);
INSERT INTO provincia (id, nombre_corto, nombre_largo, fk_pais_id) VALUES (17, 'San Luis', 'San Luis', 1);
INSERT INTO provincia (id, nombre_corto, nombre_largo, fk_pais_id) VALUES (18, 'R.Negro', 'Río Negro', 1);
INSERT INTO provincia (id, nombre_corto, nombre_largo, fk_pais_id) VALUES (19, 'Neuquén', 'Neuquén', 1);
INSERT INTO provincia (id, nombre_corto, nombre_largo, fk_pais_id) VALUES (20, 'Formosa', 'Formosa', 1);
INSERT INTO provincia (id, nombre_corto, nombre_largo, fk_pais_id) VALUES (21, 'La Rioja', 'La Rioja', 1);
INSERT INTO provincia (id, nombre_corto, nombre_largo, fk_pais_id) VALUES (22, 'Catamarca', 'Catamarca', 1);
INSERT INTO provincia (id, nombre_corto, nombre_largo, fk_pais_id) VALUES (23, 'T.del Fuego', 'Tierra Del Fuego', 1);
INSERT INTO provincia (id, nombre_corto, nombre_largo, fk_pais_id) VALUES (24, 'S. del Estero', 'Santiago del Estero', 1);
INSERT INTO provincia (id, nombre_corto, nombre_largo, fk_pais_id) VALUES (25, 'Santa Fe', 'Santa Fe', 1);
INSERT INTO provincia (id, nombre_corto, nombre_largo, fk_pais_id) VALUES (26, 'Corrientes', 'Corrientes', 1);
INSERT INTO provincia (id, nombre_corto, nombre_largo, fk_pais_id) VALUES (27, 'Tucumán', 'Tucumán', 1);

-- 
-- Volcar la base de datos para la tabla 'repeticion'
-- 

INSERT INTO `repeticion` (`descripcion`, `orden`) VALUES ('Semanal', 1);
INSERT INTO `repeticion` (`descripcion`, `orden`) VALUES ('Semanal Intercalado', 2);
INSERT INTO `repeticion` (`descripcion`, `orden`) VALUES ('Quincenal', 3);
INSERT INTO `repeticion` (`descripcion`, `orden`) VALUES ('Mensual', 4);

-- 
-- Volcar la base de datos para la tabla 'tipoiva'
-- 

INSERT INTO tipoiva (id, nombre, descripcion) VALUES (1, 'Exento', 'Exento de IVA');
INSERT INTO tipoiva (id, nombre, descripcion) VALUES (2, 'Responsable Inscripto', 'Responsable inscripto');
INSERT INTO tipoiva (id, nombre, descripcion) VALUES (3, 'Monotributo', 'Monotributo');
INSERT INTO tipoiva (id, nombre, descripcion) VALUES (4, 'CF', 'Consumidor Final');

-- 
-- Volcar la base de datos para la tabla 'tipodocumento'
-- 

INSERT INTO `tipodocumento` (`id`, `descripcion`, `orden`, `nombre`) VALUES (1, 'Documento Nacional de Identidad', 1, 'DNI');
INSERT INTO `tipodocumento` (`id`, `descripcion`, `orden`, `nombre`) VALUES (2, 'Libreta Cívica', 2, 'LC');
INSERT INTO `tipodocumento` (`id`, `descripcion`, `orden`, `nombre`) VALUES (3, 'Libreta de enrolamiento', 3, 'LE');
INSERT INTO `tipodocumento` (`id`, `descripcion`, `orden`, `nombre`) VALUES (6, 'Cédula de Identidad', 0, 'CI');
INSERT INTO `tipodocumento` (`id`, `descripcion`, `orden`, `nombre`) VALUES (7, 'Pasaporte', 0, 'Pasaporte');

-- 
-- Volcar la base de datos para la tabla 'calendariovacunacion'
-- 
INSERT INTO `calendariovacunacion` (`id`, `nombre`, `descripcion`, `periodo`, `observacion`) VALUES 
(3, 'BCG (1era Dosis)', 'Tuberculosis', 'Recién nacido', ''),
(4, 'BCG (refuerzo)', 'Tuberculosis', '6 años', NULL),
(6, 'HA (dosis)', 'Hepatitis A', '12 meses', NULL),
(7, 'HB (1era Dosis)', 'Hepatitis B', 'Recién nacido', NULL),
(8, 'HB (2da Dosis)', 'Hepatitis B', '2 meses', NULL),
(9, 'HB (3ra Dosis)', 'Hepatitis B', '6 meses', NULL),
(10, 'HB (Iniciar o completar esquema de tres dosis)', 'Hepatitis B', '11 años', NULL),
(11, 'Cuádruple (1era Dosis)', '(DTP-Hib) difteria, tétanos, pertussis, Haemophilus influenzae b.', '2 meses', ''),
(12, 'Cuádruple (2da Dosis)', '(DTP-Hib) difteria, tétanos, pertussis, Haemophilus influenzae b.', '4 meses', NULL),
(13, 'Cuádruple (3ra Dosis)', '(DTP-Hib) difteria, tétanos, pertussis, Haemophilus influenzae b.', '6 meses', NULL),
(14, 'Cuádruple (4ta Dosis)', '(DTP-Hib) difteria, tétanos, pertussis, Haemophilus influenzae b.', '18 meses', NULL),
(15, 'Sabin (1era Dosis)', '(OPV) Vacuna Poliomelítica Oral', '2 meses', NULL),
(16, 'Sabin (2da Dosis)', '(OPV) Vacuna Poliomelítica Oral', '4 meses', NULL),
(17, 'Sabin (3ra Dosis)', '(OPV) Vacuna Poliomelítica Oral', '6 meses', NULL),
(18, 'Sabin (4ta Dosis)', '(OPV) Vacuna Poliomelítica Oral', '18 meses', NULL),
(19, 'Sabin (Refuerzo)', '(OPV) Vacuna Poliomelítica Oral', '6 años', NULL),
(20, 'Triple bacteriana (Refuerzo)', '(DTP) Difteria, tétanos, pertussis', '6 años', NULL),
(21, 'Triple Viral (1era Dosis)', '(SRP) Sarampión, rubéola, parotiditis', '12 meses', NULL),
(22, 'Triple Viral (2da Dosis)', '(SRP) Sarampión, rubéola, parotiditis', '6 años', NULL),
(23, 'Triple Viral (Refuerzo)', '(SRP) Sarampión, rubéola, parotiditis', '11 años', NULL),
(24, 'Doble Viral (dosis)', '(SR) Sarampión, Rubéola.', 'Puerperio o post-aborto inmediato.', NULL),
(25, 'Doble Bacteriana (Refuerzo 1)', '(dT) Difteria, Tétanos.', '16 años', NULL),
(26, 'Doble Bacteriana (Refuerzos)', '(dT) Difteria, Tétanos.', 'Cada 10 años', NULL);

-- 
-- Volcar la base de datos para la tabla 'distritoescolar'
-- 
INSERT INTO `distritoescolar` ( `id` , `nombre` , `direccion` , `telefono` , `ciudad` ) 
VALUES (1 , 'Distrito de prueba', '-', '-', '-');


-- 
-- Volcar la base de datos para la tabla 'organizacion'
-- 

INSERT INTO organizacion (id, nombre, descripcion, razon_social, cuit, direccion, ciudad, codigo_postal, fk_provincia_id, fk_tipoiva_id, telefono) 
VALUES (1, 'Organización Tu Nombre', 'Organización Tu Descripción', 'Organización Tu Razón Social', '', '', '', '', 1, 1, '');


-- 
-- Volcar la base de datos para la tabla 'establecimiento'
-- 

INSERT INTO establecimiento (id, nombre, descripcion, fk_organizacion_id, fk_niveltipo_id, fk_distritoescolar_id) 
VALUES (1, 'Establecimiento Tu nombre', 'Establecimiento Tu descripcion',1,1,1);


-- 
-- Volcar la base de datos para la tabla 'usuario'
-- 

INSERT INTO usuario (id, usuario, clave, correo_publico, email, activo, fecha_creado, fecha_actualizado, seguridad_pregunta, seguridad_respuesta, fk_establecimiento_id, borrado) 
VALUES (1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 1, 'admin@localhost', 1, '2006-12-03 00:00:00', '2006-12-03 00:00:00', 'usuario por defecto', 'adminsitrador', 1, 0);

-- 
-- Volcar la base de datos para la tabla 'menu'
-- 
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
INSERT INTO `menu` (`id`, `nombre`, `link`, `perm`, `fk_padre_menu_id`, `orden`, `target`) VALUES (32, 'Definir Categor&iacute;­as del Bolet&iacute;acute;n de Concepto', 'concepto', 'concepto', 84, 50, '');
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
INSERT INTO `menu` (`id`, `nombre`, `link`, `perm`, `fk_padre_menu_id`, `orden`, `target`) VALUES (68, 'Cr&eacute;ditos', 'default', '', 65, 0, '');
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
INSERT INTO `menu` (`id`, `nombre`, `link`, `perm`, `fk_padre_menu_id`, `orden`, `target`) VALUES (96, 'Biblioteca de contenidos', 'sfMediaLibrary', 'informes', 9, 0, ''); 
INSERT INTO `menu` (`id`, `nombre`, `link`, `perm`, `fk_padre_menu_id`, `orden`, `target`) VALUES (97, 'Definir Roles de responsables', 'rolResponsable', 'rolResponsable', 84, 0, '');
INSERT INTO `menu` (`id`, `nombre`, `link`, `perm`, `fk_padre_menu_id`, `orden`, `target`) VALUES (98, 'Per&iacute;odos','ciclolectivo/agregarTurnosYPeriodos','ciclolectivo', 86, 0, '');



-- 
-- Volcar la base de datos para la tabla 'modulo'
-- 

INSERT INTO modulo (id, nombre, titulo, descripcion, activo) VALUES (1, 'Usuario', 'Usuarios', 'Administracion de usuarios', 1);
INSERT INTO modulo (id, nombre, titulo, descripcion, activo) VALUES (2, 'Actividad', 'Actividades', '', 1);
INSERT INTO modulo (id, nombre, titulo, descripcion, activo) VALUES (3, 'Alumno', '', '', 1);
INSERT INTO modulo (id, nombre, titulo, descripcion, activo) VALUES (4, 'Anio', '', '', 1);
INSERT INTO modulo (id, nombre, titulo, descripcion, activo) VALUES (5, 'Calendario', '', '', 1);
INSERT INTO modulo (id, nombre, titulo, descripcion, activo) VALUES (6, 'Calendariovacunacion', '', '', 1);
INSERT INTO modulo (id, nombre, titulo, descripcion, activo) VALUES (7, 'Ciclolectivo', '', '', 1);
INSERT INTO modulo (id, nombre, titulo, descripcion, activo) VALUES (8, 'Concepto', '', '', 1);
INSERT INTO modulo (id, nombre, titulo, descripcion, activo) VALUES (9, 'Creditos', '', '', 1);
INSERT INTO modulo (id, nombre, titulo, descripcion, activo) VALUES (10, 'Cuenta', '', '', 1);
INSERT INTO modulo (id, nombre, titulo, descripcion, activo) VALUES (11, 'Division', '', '', 1);
INSERT INTO modulo (id, nombre, titulo, descripcion, activo) VALUES (12, 'Docente', '', '', 1);
INSERT INTO modulo (id, nombre, titulo, descripcion, activo) VALUES (13, 'DocenteHorario', '', '', 1);
INSERT INTO modulo (id, nombre, titulo, descripcion, activo) VALUES (14, 'Escalanota', '', '', 1);
INSERT INTO modulo (id, nombre, titulo, descripcion, activo) VALUES (15, 'Establecimiento', '', '', 1);
INSERT INTO modulo (id, nombre, titulo, descripcion, activo) VALUES (16, 'Feriado', '', '', 1);
INSERT INTO modulo (id, nombre, titulo, descripcion, activo) VALUES (17, 'Legajocategoria', '', '', 1);
INSERT INTO modulo (id, nombre, titulo, descripcion, activo) VALUES (18, 'Locacion', '', '', 1);
INSERT INTO modulo (id, nombre, titulo, descripcion, activo) VALUES (19, 'Modulo', '', '', 1);
INSERT INTO modulo (id, nombre, titulo, descripcion, activo) VALUES (20, 'Organizacion', '', '', 1);
INSERT INTO modulo (id, nombre, titulo, descripcion, activo) VALUES (21, 'Pais', '', '', 1);
INSERT INTO modulo (id, nombre, titulo, descripcion, activo) VALUES (22, 'Permiso', '', '', 1);
INSERT INTO modulo (id, nombre, titulo, descripcion, activo) VALUES (23, 'Preferencia', '', '', 1);
INSERT INTO modulo (id, nombre, titulo, descripcion, activo) VALUES (24, 'Provincia', '', '', 1);
INSERT INTO modulo (id, nombre, titulo, descripcion, activo) VALUES (25, 'RelActividadDocente', '', '', 1);
INSERT INTO modulo (id, nombre, titulo, descripcion, activo) VALUES (26, 'RelAnioActividad', '', '', 1);
INSERT INTO modulo (id, nombre, titulo, descripcion, activo) VALUES (27, 'RelCalendariovacunacionAlumno', '', '', 1);
INSERT INTO modulo (id, nombre, titulo, descripcion, activo) VALUES (28, 'Responsable', '', '', 1);
INSERT INTO modulo (id, nombre, titulo, descripcion, activo) VALUES (29, 'Rol', '', '', 1);
INSERT INTO modulo (id, nombre, titulo, descripcion, activo) VALUES (30, 'Seguridad', '', '', 1);
INSERT INTO modulo (id, nombre, titulo, descripcion, activo) VALUES (31, 'Tipoiva', '', '', 1);
INSERT INTO modulo (id, nombre, titulo, descripcion, activo) VALUES (32, 'Turnos', '', '', 1);
INSERT INTO modulo (id, nombre, titulo, descripcion, activo) VALUES (33, 'Default', '', '', 1);
INSERT INTO modulo (id, nombre, titulo, descripcion, activo) VALUES (34, 'Tipolocacion', '', '', 1);
INSERT INTO modulo (id, nombre, titulo, descripcion, activo) VALUES (35, 'Espacios', '', '', 1);
INSERT INTO modulo (id, nombre, titulo, descripcion, activo) VALUES (36, 'Tipoespacio', '', '', 1);
INSERT INTO modulo (id, nombre, titulo, descripcion, activo) VALUES (37, 'Cargoabaja', '', '', 1);
INSERT INTO modulo (id, nombre, titulo, descripcion, activo) VALUES (38, 'Conceptobaja', '', '', 1);
INSERT INTO modulo (id, nombre, titulo, descripcion, activo) VALUES (39, 'Distritoescolar', '', '', 1);
INSERT INTO modulo (id, nombre, titulo, descripcion, activo) VALUES (40, 'Horarioescolar', '', '', 1);
INSERT INTO modulo (id, nombre, titulo, descripcion, activo) VALUES (41, 'Horarioescolartipo', '', '', 1);
INSERT INTO modulo (id, nombre, titulo, descripcion, activo) VALUES (42, 'Tipodocente', '', '', 1);
INSERT INTO modulo (id, nombre, titulo, descripcion, activo) VALUES (43, 'tipoasistencia', 'tipoasistencia', 'Asistencia', 1);
INSERT INTO modulo (id, nombre, titulo, descripcion, activo) VALUES (44, 'legajopedagogico', 'legajopdagogico', '', 1);
INSERT INTO modulo (id, nombre, titulo, descripcion, activo) VALUES (45, 'Boletin', 'Boletin', '', 1);
INSERT INTO modulo (id, nombre, titulo, descripcion, activo) VALUES (46, 'tipodocumento', 'Tipo Documento', 'Tipo Documento', 1);
INSERT INTO modulo (id, nombre, titulo, descripcion, activo) VALUES (47, 'informes', 'informes', 'informes', 1);
INSERT INTO modulo (id, nombre, titulo, descripcion, activo) VALUES (48, 'rolResponsable','Rol Responsables','Roles de los Resposables de Alumos', 1);

-- 
-- Volcar la base de datos para la tabla 'permiso'
-- 

INSERT INTO permiso (id, nombre, descripcion, credencial, fk_modulo_id) VALUES (1, 'usuario', 'Modulo de usuario', 'usuario', 1);
INSERT INTO permiso (id, nombre, descripcion, credencial, fk_modulo_id) VALUES (2, 'permiso', 'Administrar permisos de usuario', 'permiso', 22);
INSERT INTO permiso (id, nombre, descripcion, credencial, fk_modulo_id) VALUES (5, 'modulo', 'AdministraciÃ³n de mÃ³dulos', 'modulo', 1);
INSERT INTO permiso (id, nombre, descripcion, credencial, fk_modulo_id) VALUES (6, 'actividad', '', 'actividad', 2);
INSERT INTO permiso (id, nombre, descripcion, credencial, fk_modulo_id) VALUES (7, 'alumno', '', 'alumno', 3);
INSERT INTO permiso (id, nombre, descripcion, credencial, fk_modulo_id) VALUES (8, 'anio', '', 'anio', 4);
INSERT INTO permiso (id, nombre, descripcion, credencial, fk_modulo_id) VALUES (9, 'calendario', '', 'calendario', 5);
INSERT INTO permiso (id, nombre, descripcion, credencial, fk_modulo_id) VALUES (10, 'calendariovacunacion', '', 'calendariovacunacion', 6);
INSERT INTO permiso (id, nombre, descripcion, credencial, fk_modulo_id) VALUES (11, 'ciclolectivo', '', 'ciclolectivo', 7);
INSERT INTO permiso (id, nombre, descripcion, credencial, fk_modulo_id) VALUES (12, 'concepto', '', 'concepto', 8);
INSERT INTO permiso (id, nombre, descripcion, credencial, fk_modulo_id) VALUES (13, 'creditos', '', 'creditos', 9);
INSERT INTO permiso (id, nombre, descripcion, credencial, fk_modulo_id) VALUES (14, 'cuenta', '', 'cuenta', 10);
INSERT INTO permiso (id, nombre, descripcion, credencial, fk_modulo_id) VALUES (15, 'division', '', 'division', 11);
INSERT INTO permiso (id, nombre, descripcion, credencial, fk_modulo_id) VALUES (16, 'docente', '', 'docente', 12);
INSERT INTO permiso (id, nombre, descripcion, credencial, fk_modulo_id) VALUES (17, 'docenteHorario', '', 'docenteHorario', 13);
INSERT INTO permiso (id, nombre, descripcion, credencial, fk_modulo_id) VALUES (18, 'escalanota', '', 'escalanota', 14);
INSERT INTO permiso (id, nombre, descripcion, credencial, fk_modulo_id) VALUES (19, 'establecimiento', '', 'establecimiento', 15);
INSERT INTO permiso (id, nombre, descripcion, credencial, fk_modulo_id) VALUES (20, 'feriado', '', 'feriado', 16);
INSERT INTO permiso (id, nombre, descripcion, credencial, fk_modulo_id) VALUES (21, 'legajocategoria', '', 'legajocategoria', 17);
INSERT INTO permiso (id, nombre, descripcion, credencial, fk_modulo_id) VALUES (22, 'locacion', '', 'locacion', 18);
INSERT INTO permiso (id, nombre, descripcion, credencial, fk_modulo_id) VALUES (25, 'pais', '', 'pais', 21);
INSERT INTO permiso (id, nombre, descripcion, credencial, fk_modulo_id) VALUES (27, 'preferencia', '', 'preferencia', 23);
INSERT INTO permiso (id, nombre, descripcion, credencial, fk_modulo_id) VALUES (28, 'provincia', '', 'provincia', 24);
INSERT INTO permiso (id, nombre, descripcion, credencial, fk_modulo_id) VALUES (29, 'relActividadDocente', '', 'relActividadDocente', 25);
INSERT INTO permiso (id, nombre, descripcion, credencial, fk_modulo_id) VALUES (30, 'relAnioActividad', '', 'relAnioActividad', 26);
INSERT INTO permiso (id, nombre, descripcion, credencial, fk_modulo_id) VALUES (31, 'relCalendariovacunacionAlumno', '', 'relCalendariovacunacionAlumno', 27);
INSERT INTO permiso (id, nombre, descripcion, credencial, fk_modulo_id) VALUES (32, 'responsable', '', 'responsable', 28);
INSERT INTO permiso (id, nombre, descripcion, credencial, fk_modulo_id) VALUES (33, 'rol', '', 'rol', 29);
INSERT INTO permiso (id, nombre, descripcion, credencial, fk_modulo_id) VALUES (34, 'tipoiva', '', 'tipoiva', 31);
INSERT INTO permiso (id, nombre, descripcion, credencial, fk_modulo_id) VALUES (35, 'turnos', '', 'turnos', 32);
INSERT INTO permiso (id, nombre, descripcion, credencial, fk_modulo_id) VALUES (36, 'tipolocacion', '', 'tipolocacion', 34);
INSERT INTO permiso (id, nombre, descripcion, credencial, fk_modulo_id) VALUES (37, 'tipoespacio', '', 'tipoespacio', 36);
INSERT INTO permiso (id, nombre, descripcion, credencial, fk_modulo_id) VALUES (38, 'espacio', '', 'espacio', 35);
INSERT INTO permiso (id, nombre, descripcion, credencial, fk_modulo_id) VALUES (40, 'cargoabaja', '', 'cargobaja', 37);
INSERT INTO permiso (id, nombre, descripcion, credencial, fk_modulo_id) VALUES (41, 'conceptobaja', '', 'conceptobaja', 38);
INSERT INTO permiso (id, nombre, descripcion, credencial, fk_modulo_id) VALUES (42, 'distritoescolar', '', 'distritoescolar', 39);
INSERT INTO permiso (id, nombre, descripcion, credencial, fk_modulo_id) VALUES (43, 'horarioescolar', '', 'horarioescolar', 40);
INSERT INTO permiso (id, nombre, descripcion, credencial, fk_modulo_id) VALUES (44, 'horarioescolartipo', '', 'horarioescolartipo', 41);
INSERT INTO permiso (id, nombre, descripcion, credencial, fk_modulo_id) VALUES (45, 'tipodocente', '', 'tipodocente', 42);
INSERT INTO permiso (id, nombre, descripcion, credencial, fk_modulo_id) VALUES (46, 'organizacion', '', 'organizacion', 20);
INSERT INTO permiso (id, nombre, descripcion, credencial, fk_modulo_id) VALUES (47, 'Asistencia', 'Asistencia', 'asistencia', 43);
INSERT INTO permiso (id, nombre, descripcion, credencial, fk_modulo_id) VALUES (48, 'distrito', 'distrito', 'distrito', 39);
INSERT INTO permiso (id, nombre, descripcion, credencial, fk_modulo_id) VALUES (49, 'distritoescolar', 'Distrito Escolar', 'distritoescolar', 39);
INSERT INTO permiso (id, nombre, descripcion, credencial, fk_modulo_id) VALUES (50, 'legajopedagogico', '', 'legajopedagogico', 1);
INSERT INTO permiso (id, nombre, descripcion, credencial, fk_modulo_id) VALUES (51, 'tipoasistencia', '', 'tipoasistencia', 43);
INSERT INTO permiso (id, nombre, descripcion, credencial, fk_modulo_id) VALUES (52, 'formatofecha', '', 'formatofecha', 1);
INSERT INTO permiso (id, nombre, descripcion, credencial, fk_modulo_id) VALUES (53, 'relLocacionEspacio', '', 'relLocacionEspacio', 1);
INSERT INTO permiso (id, nombre, descripcion, credencial, fk_modulo_id) VALUES (54, 'relAlumnoDivision', '', 'relAlumnoDivision', 1);
INSERT INTO permiso (id, nombre, descripcion, credencial, fk_modulo_id) VALUES (55, 'boletin', '', 'boletin', 1);
INSERT INTO permiso (id, nombre, descripcion, credencial, fk_modulo_id) VALUES (56, 'boletinconcepto', 'boletinconcepto', 'boletinconcepto', 45);
INSERT INTO permiso (id, nombre, descripcion, credencial, fk_modulo_id) VALUES (57, 'boletinnotas', 'boletinnotas', 'boletinnotas', 45);
INSERT INTO permiso (id, nombre, descripcion, credencial, fk_modulo_id) VALUES (58, 'tipodocumento', 'tipodocumento', 'tipodocumento', 46);
INSERT INTO permiso (id, nombre, descripcion, credencial, fk_modulo_id) VALUES (59, 'informes', 'informes', 'informes', 47);
INSERT INTO permiso (id, nombre, descripcion, credencial, fk_modulo_id) VALUES (60, 'rolResponsable', 'Rol de Responsables', 'rolResponsable', 48);

-- 
-- Volcar la base de datos para la tabla 'rel_usuario_permiso'
-- 

INSERT INTO rel_usuario_permiso (id, fk_usuario_id, fk_permiso_id) VALUES (1, 1, 47);
INSERT INTO rel_usuario_permiso (id, fk_usuario_id, fk_permiso_id) VALUES (2, 1, 6);
INSERT INTO rel_usuario_permiso (id, fk_usuario_id, fk_permiso_id) VALUES (3, 1, 7);
INSERT INTO rel_usuario_permiso (id, fk_usuario_id, fk_permiso_id) VALUES (4, 1, 8);
INSERT INTO rel_usuario_permiso (id, fk_usuario_id, fk_permiso_id) VALUES (5, 1, 55);
INSERT INTO rel_usuario_permiso (id, fk_usuario_id, fk_permiso_id) VALUES (6, 1, 56);
INSERT INTO rel_usuario_permiso (id, fk_usuario_id, fk_permiso_id) VALUES (7, 1, 57);
INSERT INTO rel_usuario_permiso (id, fk_usuario_id, fk_permiso_id) VALUES (8, 1, 9);
INSERT INTO rel_usuario_permiso (id, fk_usuario_id, fk_permiso_id) VALUES (9, 1, 10);
INSERT INTO rel_usuario_permiso (id, fk_usuario_id, fk_permiso_id) VALUES (10, 1, 40);
INSERT INTO rel_usuario_permiso (id, fk_usuario_id, fk_permiso_id) VALUES (11, 1, 11);
INSERT INTO rel_usuario_permiso (id, fk_usuario_id, fk_permiso_id) VALUES (12, 1, 12);
INSERT INTO rel_usuario_permiso (id, fk_usuario_id, fk_permiso_id) VALUES (13, 1, 41);
INSERT INTO rel_usuario_permiso (id, fk_usuario_id, fk_permiso_id) VALUES (14, 1, 13);
INSERT INTO rel_usuario_permiso (id, fk_usuario_id, fk_permiso_id) VALUES (15, 1, 14);
INSERT INTO rel_usuario_permiso (id, fk_usuario_id, fk_permiso_id) VALUES (16, 1, 48);
INSERT INTO rel_usuario_permiso (id, fk_usuario_id, fk_permiso_id) VALUES (17, 1, 42);
INSERT INTO rel_usuario_permiso (id, fk_usuario_id, fk_permiso_id) VALUES (18, 1, 49);
INSERT INTO rel_usuario_permiso (id, fk_usuario_id, fk_permiso_id) VALUES (19, 1, 15);
INSERT INTO rel_usuario_permiso (id, fk_usuario_id, fk_permiso_id) VALUES (20, 1, 17);
INSERT INTO rel_usuario_permiso (id, fk_usuario_id, fk_permiso_id) VALUES (21, 1, 16);
INSERT INTO rel_usuario_permiso (id, fk_usuario_id, fk_permiso_id) VALUES (22, 1, 18);
INSERT INTO rel_usuario_permiso (id, fk_usuario_id, fk_permiso_id) VALUES (23, 1, 38);
INSERT INTO rel_usuario_permiso (id, fk_usuario_id, fk_permiso_id) VALUES (24, 1, 19);
INSERT INTO rel_usuario_permiso (id, fk_usuario_id, fk_permiso_id) VALUES (25, 1, 20);
INSERT INTO rel_usuario_permiso (id, fk_usuario_id, fk_permiso_id) VALUES (26, 1, 52);
INSERT INTO rel_usuario_permiso (id, fk_usuario_id, fk_permiso_id) VALUES (27, 1, 43);
INSERT INTO rel_usuario_permiso (id, fk_usuario_id, fk_permiso_id) VALUES (28, 1, 44);
INSERT INTO rel_usuario_permiso (id, fk_usuario_id, fk_permiso_id) VALUES (29, 1, 21);
INSERT INTO rel_usuario_permiso (id, fk_usuario_id, fk_permiso_id) VALUES (30, 1, 50);
INSERT INTO rel_usuario_permiso (id, fk_usuario_id, fk_permiso_id) VALUES (31, 1, 22);
INSERT INTO rel_usuario_permiso (id, fk_usuario_id, fk_permiso_id) VALUES (32, 1, 5);
INSERT INTO rel_usuario_permiso (id, fk_usuario_id, fk_permiso_id) VALUES (33, 1, 46);
INSERT INTO rel_usuario_permiso (id, fk_usuario_id, fk_permiso_id) VALUES (34, 1, 25);
INSERT INTO rel_usuario_permiso (id, fk_usuario_id, fk_permiso_id) VALUES (35, 1, 2);
INSERT INTO rel_usuario_permiso (id, fk_usuario_id, fk_permiso_id) VALUES (36, 1, 27);
INSERT INTO rel_usuario_permiso (id, fk_usuario_id, fk_permiso_id) VALUES (37, 1, 28);
INSERT INTO rel_usuario_permiso (id, fk_usuario_id, fk_permiso_id) VALUES (38, 1, 29);
INSERT INTO rel_usuario_permiso (id, fk_usuario_id, fk_permiso_id) VALUES (39, 1, 54);
INSERT INTO rel_usuario_permiso (id, fk_usuario_id, fk_permiso_id) VALUES (40, 1, 30);
INSERT INTO rel_usuario_permiso (id, fk_usuario_id, fk_permiso_id) VALUES (41, 1, 31);
INSERT INTO rel_usuario_permiso (id, fk_usuario_id, fk_permiso_id) VALUES (42, 1, 53);
INSERT INTO rel_usuario_permiso (id, fk_usuario_id, fk_permiso_id) VALUES (43, 1, 32);
INSERT INTO rel_usuario_permiso (id, fk_usuario_id, fk_permiso_id) VALUES (44, 1, 33);
INSERT INTO rel_usuario_permiso (id, fk_usuario_id, fk_permiso_id) VALUES (45, 1, 51);
INSERT INTO rel_usuario_permiso (id, fk_usuario_id, fk_permiso_id) VALUES (46, 1, 45);
INSERT INTO rel_usuario_permiso (id, fk_usuario_id, fk_permiso_id) VALUES (47, 1, 37);
INSERT INTO rel_usuario_permiso (id, fk_usuario_id, fk_permiso_id) VALUES (48, 1, 34);
INSERT INTO rel_usuario_permiso (id, fk_usuario_id, fk_permiso_id) VALUES (49, 1, 36);
INSERT INTO rel_usuario_permiso (id, fk_usuario_id, fk_permiso_id) VALUES (50, 1, 35);
INSERT INTO rel_usuario_permiso (id, fk_usuario_id, fk_permiso_id) VALUES (51, 1, 1);
INSERT INTO rel_usuario_permiso (id, fk_usuario_id, fk_permiso_id) VALUES (52, 1, 58);
INSERT INTO rel_usuario_permiso (id, fk_usuario_id, fk_permiso_id) VALUES (53, 1, 59);
INSERT INTO rel_usuario_permiso (id, fk_usuario_id, fk_permiso_id) VALUES (54, 1, 60);

SET FOREIGN_KEY_CHECKS = 1;

