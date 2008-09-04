-- 
-- Volcar la base de datos para la tabla 'tipodocumento'
-- 

INSERT INTO tipodocumento (id, descripcion, orden, nombre) VALUES (1, 'Documento Nacional de Identidad', 1, 'DNI');
INSERT INTO tipodocumento (id, descripcion, orden, nombre) VALUES (2, 'Libreta Cívica', 2, 'LC');
INSERT INTO tipodocumento (id, descripcion, orden, nombre) VALUES (3, 'Libreta de enrolamiento', 3, 'LE');
INSERT INTO tipodocumento (id, descripcion, orden, nombre) VALUES (6, 'Cédula de Identidad', 0, 'CI');
INSERT INTO tipodocumento (id, descripcion, orden, nombre) VALUES (7, 'Pasaporte', 0, 'Pasaporte');


-- 
-- Volcar la base de datos para la tabla 'tipoiva'
-- 

INSERT INTO tipoiva (id, nombre, descripcion) VALUES (1, 'Exento', 'Exento de IVA');
INSERT INTO tipoiva (id, nombre, descripcion) VALUES (2, 'Responsable Inscripto', 'Responsable inscripto');
INSERT INTO tipoiva (id, nombre, descripcion) VALUES (3, 'Monotributo', 'Monotributo');
INSERT INTO tipoiva (id, nombre, descripcion) VALUES (4, 'CF', 'Consumidor Final');



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
-- Volcar la base de datos para la tabla 'calendariovacunacion'
-- 
INSERT INTO calendariovacunacion (id, nombre, descripcion, periodo, observacion) VALUES (3, 'BCG (1era Dosis)', 'Tuberculosis', 'Recién nacido', '');
INSERT INTO calendariovacunacion (id, nombre, descripcion, periodo, observacion) VALUES (4, 'BCG (refuerzo)', 'Tuberculosis', '6 años', NULL);
INSERT INTO calendariovacunacion (id, nombre, descripcion, periodo, observacion) VALUES (6, 'HA (dosis)', 'Hepatitis A', '12 meses', NULL);
INSERT INTO calendariovacunacion (id, nombre, descripcion, periodo, observacion) VALUES (7, 'HB (1era Dosis)', 'Hepatitis B', 'Recién nacido', NULL);
INSERT INTO calendariovacunacion (id, nombre, descripcion, periodo, observacion) VALUES (8, 'HB (2da Dosis)', 'Hepatitis B', '2 meses', NULL);
INSERT INTO calendariovacunacion (id, nombre, descripcion, periodo, observacion) VALUES (9, 'HB (3ra Dosis)', 'Hepatitis B', '6 meses', NULL);
INSERT INTO calendariovacunacion (id, nombre, descripcion, periodo, observacion) VALUES (10, 'HB (Iniciar o completar esquema de tres dosis)', 'Hepatitis B', '11 años', NULL);
INSERT INTO calendariovacunacion (id, nombre, descripcion, periodo, observacion) VALUES (11, 'Cuádruple (1era Dosis)', '(DTP-Hib) difteria, tétanos, pertussis, Haemophilus influenzae b.', '2 meses', '');
INSERT INTO calendariovacunacion (id, nombre, descripcion, periodo, observacion) VALUES (12, 'Cuádruple (2da Dosis)', '(DTP-Hib) difteria, tétanos, pertussis, Haemophilus influenzae b.', '4 meses', NULL);
INSERT INTO calendariovacunacion (id, nombre, descripcion, periodo, observacion) VALUES (13, 'Cuádruple (3ra Dosis)', '(DTP-Hib) difteria, tétanos, pertussis, Haemophilus influenzae b.', '6 meses', NULL);
INSERT INTO calendariovacunacion (id, nombre, descripcion, periodo, observacion) VALUES (14, 'Cuádruple (4ta Dosis)', '(DTP-Hib) difteria, tétanos, pertussis, Haemophilus influenzae b.', '18 meses', NULL);
INSERT INTO calendariovacunacion (id, nombre, descripcion, periodo, observacion) VALUES (15, 'Sabin (1era Dosis)', '(OPV) Vacuna Poliomelítica Oral', '2 meses', NULL);
INSERT INTO calendariovacunacion (id, nombre, descripcion, periodo, observacion) VALUES (16, 'Sabin (2da Dosis)', '(OPV) Vacuna Poliomelítica Oral', '4 meses', NULL);
INSERT INTO calendariovacunacion (id, nombre, descripcion, periodo, observacion) VALUES (17, 'Sabin (3ra Dosis)', '(OPV) Vacuna Poliomelítica Oral', '6 meses', NULL);
INSERT INTO calendariovacunacion (id, nombre, descripcion, periodo, observacion) VALUES (18, 'Sabin (4ta Dosis)', '(OPV) Vacuna Poliomelítica Oral', '18 meses', NULL);
INSERT INTO calendariovacunacion (id, nombre, descripcion, periodo, observacion) VALUES (19, 'Sabin (Refuerzo)', '(OPV) Vacuna Poliomelítica Oral', '6 años', NULL);
INSERT INTO calendariovacunacion (id, nombre, descripcion, periodo, observacion) VALUES (20, 'Triple bacteriana (Refuerzo)', '(DTP) Difteria, tétanos, pertussis', '6 años', NULL);
INSERT INTO calendariovacunacion (id, nombre, descripcion, periodo, observacion) VALUES (21, 'Triple Viral (1era Dosis)', '(SRP) Sarampión, rubéola, parotiditis', '12 meses', NULL);
INSERT INTO calendariovacunacion (id, nombre, descripcion, periodo, observacion) VALUES (22, 'Triple Viral (2da Dosis)', '(SRP) Sarampión, rubéola, parotiditis', '6 años', NULL);
INSERT INTO calendariovacunacion (id, nombre, descripcion, periodo, observacion) VALUES (23, 'Triple Viral (Refuerzo)', '(SRP) Sarampión, rubéola, parotiditis', '11 años', NULL);
INSERT INTO calendariovacunacion (id, nombre, descripcion, periodo, observacion) VALUES (24, 'Doble Viral (dosis)', '(SR) Sarampión, Rubéola.', 'Puerperio o post-aborto inmediato.', NULL);
INSERT INTO calendariovacunacion (id, nombre, descripcion, periodo, observacion) VALUES (25, 'Doble Bacteriana (Refuerzo 1)', '(dT) Difteria, Tétanos.', '16 años', NULL);
INSERT INTO calendariovacunacion (id, nombre, descripcion, periodo, observacion) VALUES (26, 'Doble Bacteriana (Refuerzos)', '(dT) Difteria, Tétanos.', 'Cada 10 años', NULL);

-- 
-- Volcar la base de datos para la tabla 'distritoescolar'
-- 
INSERT INTO distritoescolar ( id , nombre , direccion , telefono , ciudad ) 
VALUES (1 , 'Distrito de prueba', '-', '-', '-');


-- 
-- Volcar la base de datos para la tabla 'organizacion'
-- 

INSERT INTO organizacion (id, nombre, descripcion, razon_social, cuit, direccion, ciudad, codigo_postal, fk_provincia_id, fk_tipoiva_id, telefono) 
VALUES (1, 'Organización Tu Nombre', 'Organización Tu Descripción', 'Organización Tu Razón Social', '', 'Tu Dirección', 'Tu ciudad', 'Tu CP', 1, 1, '');


-- 
-- Volcar la base de datos para la tabla 'establecimiento'
-- 

INSERT INTO establecimiento (id, nombre, descripcion, fk_organizacion_id, fk_niveltipo_id, fk_distritoescolar_id) 
VALUES (1, 'Establecimiento Tu nombre', 'Establecimiento Tu descripcion',1,1,1);


-- 
-- Volcar la base de datos para la tabla 'usuario'
-- 

INSERT INTO usuario (id, usuario, clave, correo_publico, email, activo, fecha_creado, fecha_actualizado, seguridad_pregunta, seguridad_respuesta, fk_establecimiento_id, borrado) 
VALUES (1, 'admin', '21232f297a57a5a743894a0e4a801fc3', true, 'admin@midominio.com', true, '2006-12-03 00:00:00', '2006-12-03 00:00:00', 'usuario por defecto', 'adminsitrador', 1, false);

-- 
-- Volcar la base de datos para la tabla 'modulo'
-- 

INSERT INTO modulo (id, nombre, titulo, descripcion, activo) VALUES (1, 'Usuario', 'Usuarios', 'Administracion de usuarios', true);
INSERT INTO modulo (id, nombre, titulo, descripcion, activo) VALUES (2, 'Actividad', 'Actividades', '', true);
INSERT INTO modulo (id, nombre, titulo, descripcion, activo) VALUES (3, 'Alumno', '', '', true);
INSERT INTO modulo (id, nombre, titulo, descripcion, activo) VALUES (4, 'Anio', '', '', true);
INSERT INTO modulo (id, nombre, titulo, descripcion, activo) VALUES (5, 'Calendario', '', '', true);
INSERT INTO modulo (id, nombre, titulo, descripcion, activo) VALUES (6, 'Calendariovacunacion', '', '', true);
INSERT INTO modulo (id, nombre, titulo, descripcion, activo) VALUES (7, 'Ciclolectivo', '', '', true);
INSERT INTO modulo (id, nombre, titulo, descripcion, activo) VALUES (8, 'Concepto', '', '', true);
INSERT INTO modulo (id, nombre, titulo, descripcion, activo) VALUES (9, 'Creditos', '', '', true);
INSERT INTO modulo (id, nombre, titulo, descripcion, activo) VALUES (10, 'Cuenta', '', '', true);
INSERT INTO modulo (id, nombre, titulo, descripcion, activo) VALUES (11, 'Division', '', '', true);
INSERT INTO modulo (id, nombre, titulo, descripcion, activo) VALUES (12, 'Docente', '', '', true);
INSERT INTO modulo (id, nombre, titulo, descripcion, activo) VALUES (13, 'DocenteHorario', '', '', true);
INSERT INTO modulo (id, nombre, titulo, descripcion, activo) VALUES (14, 'Escalanota', '', '', true);
INSERT INTO modulo (id, nombre, titulo, descripcion, activo) VALUES (15, 'Establecimiento', '', '', true);
INSERT INTO modulo (id, nombre, titulo, descripcion, activo) VALUES (16, 'Feriado', '', '', true);
INSERT INTO modulo (id, nombre, titulo, descripcion, activo) VALUES (17, 'Legajocategoria', '', '', true);
INSERT INTO modulo (id, nombre, titulo, descripcion, activo) VALUES (18, 'Locacion', '', '', true);
INSERT INTO modulo (id, nombre, titulo, descripcion, activo) VALUES (19, 'Modulo', '', '', true);
INSERT INTO modulo (id, nombre, titulo, descripcion, activo) VALUES (20, 'Organizacion', '', '', true);
INSERT INTO modulo (id, nombre, titulo, descripcion, activo) VALUES (21, 'Pais', '', '', true);
INSERT INTO modulo (id, nombre, titulo, descripcion, activo) VALUES (22, 'Permiso', '', '', true);
INSERT INTO modulo (id, nombre, titulo, descripcion, activo) VALUES (23, 'Preferencia', '', '', true);
INSERT INTO modulo (id, nombre, titulo, descripcion, activo) VALUES (24, 'Provincia', '', '', true);
INSERT INTO modulo (id, nombre, titulo, descripcion, activo) VALUES (25, 'RelActividadDocente', '', '', true);
INSERT INTO modulo (id, nombre, titulo, descripcion, activo) VALUES (26, 'RelAnioActividad', '', '', true);
INSERT INTO modulo (id, nombre, titulo, descripcion, activo) VALUES (27, 'RelCalendariovacunacionAlumno', '', '', true);
INSERT INTO modulo (id, nombre, titulo, descripcion, activo) VALUES (28, 'Responsable', '', '', true);
INSERT INTO modulo (id, nombre, titulo, descripcion, activo) VALUES (29, 'Rol', '', '', true);
INSERT INTO modulo (id, nombre, titulo, descripcion, activo) VALUES (30, 'Seguridad', '', '', true);
INSERT INTO modulo (id, nombre, titulo, descripcion, activo) VALUES (31, 'Tipoiva', '', '', true);
INSERT INTO modulo (id, nombre, titulo, descripcion, activo) VALUES (32, 'Turno', '', '', true);
INSERT INTO modulo (id, nombre, titulo, descripcion, activo) VALUES (33, 'Default', '', '', true);
INSERT INTO modulo (id, nombre, titulo, descripcion, activo) VALUES (34, 'Tipolocacion', '', '', true);
INSERT INTO modulo (id, nombre, titulo, descripcion, activo) VALUES (35, 'Espacios', '', '', true);
INSERT INTO modulo (id, nombre, titulo, descripcion, activo) VALUES (36, 'Tipoespacio', '', '', true);
INSERT INTO modulo (id, nombre, titulo, descripcion, activo) VALUES (37, 'Cargoabaja', '', '', true);
INSERT INTO modulo (id, nombre, titulo, descripcion, activo) VALUES (38, 'Conceptobaja', '', '', true);
INSERT INTO modulo (id, nombre, titulo, descripcion, activo) VALUES (39, 'Distritoescolar', '', '', true);
INSERT INTO modulo (id, nombre, titulo, descripcion, activo) VALUES (40, 'Horarioescolar', '', '', true);
INSERT INTO modulo (id, nombre, titulo, descripcion, activo) VALUES (41, 'Horarioescolartipo', '', '', true);
INSERT INTO modulo (id, nombre, titulo, descripcion, activo) VALUES (42, 'Tipodocente', '', '', true);
INSERT INTO modulo (id, nombre, titulo, descripcion, activo) VALUES (43, 'tipoasistencia', 'tipoasistencia', 'Asistencia', true);
INSERT INTO modulo (id, nombre, titulo, descripcion, activo) VALUES (44, 'legajopedagogico', 'legajopdagogico', '', true);
INSERT INTO modulo (id, nombre, titulo, descripcion, activo) VALUES (45, 'Boletin', 'Boletin', '', true);
INSERT INTO modulo (id, nombre, titulo, descripcion, activo) VALUES (46, 'tipodocumento', 'Tipo Documento', 'Tipo Documento', true);
INSERT INTO modulo (id, nombre, titulo, descripcion, activo) VALUES (47, 'informes', 'informes', 'informes', true);
INSERT INTO modulo (id, nombre, titulo, descripcion, activo) VALUES (48, 'rolResponsable','Rol Responsables','Roles de los Resposables de Alumos', true);
INSERT INTO modulo (id, nombre, titulo, descripcion, activo) VALUES (49, 'orientacion','Orientacion','Orientacion de los grados', true);
INSERT INTO modulo (id, nombre, titulo, descripcion, activo) VALUES (50, 'tiponivel','Tipo de Nivel','', true);

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
INSERT INTO permiso (id, nombre, descripcion, credencial, fk_modulo_id) VALUES (35, 'turno', '', 'turno', 32);
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
INSERT INTO permiso (id, nombre, descripcion, credencial, fk_modulo_id) VALUES (61, 'orientacion', 'Orientacion', 'orientacion', 49);
INSERT INTO permiso (id, nombre, descripcion, credencial, fk_modulo_id) VALUES (62, 'tiponivel', 'Tipo de Nivel', 'niveltipo', 50);

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
INSERT INTO rel_usuario_permiso (id, fk_usuario_id, fk_permiso_id) VALUES (55, 1, 61);
INSERT INTO rel_usuario_permiso (id, fk_usuario_id, fk_permiso_id) VALUES (56, 1, 62);

-- 
-- Volcar la base de datos para la tabla tipoinforme
-- 

INSERT INTO tipoinforme (id ,nombre ,descripcion) VALUES (1 , 'Alumnos', 'Informes relacionados a los alumnos');

INSERT INTO tipoinforme (id, nombre, descripcion) VALUES (2, 'General', '');


INSERT INTO adjunto (id, descripcion, titulo, nombre_archivo, tipo_archivo, ruta, fecha) VALUES (1, NULL, NULL, 'constancia_alumno_regular.odt', 'application/vnd.oasis.opendocument.text', 'constancia_alumno_regular.odt', '2007-10-17 00:00:00');

INSERT INTO adjunto (id, descripcion, titulo, nombre_archivo, tipo_archivo, ruta, fecha) VALUES (2, NULL, NULL, 'certificado_de_terminacion_de_estudios_primarios.odt', 'application/vnd.oasis.opendocument.text', 'certificado_de_terminacion_de_estudios_primarios.odt', '2007-10-17 00:00:00');

INSERT INTO adjunto (id, descripcion, titulo, nombre_archivo, tipo_archivo, ruta, fecha) VALUES (3, NULL, NULL, 'solicitud_legajo.odt', 'application/vnd.oasis.opendocument.text', 'solicitud_legajo.odt', '2007-10-17 00:00:00');

INSERT INTO adjunto (id, descripcion, titulo, nombre_archivo, tipo_archivo, ruta, fecha) VALUES (4, NULL, NULL, 'certificado_de_estudios.odt', 'application/vnd.oasis.opendocument.text', 'certificado_de_estudios.odt', '2007-10-17 00:00:00');

INSERT INTO adjunto (id, descripcion, titulo, nombre_archivo, tipo_archivo, ruta, fecha) VALUES (5, NULL, NULL, 'alumnos_por_division.odt', 'application/vnd.oasis.opendocument.text', 'alumnos_por_division.odt', '2007-10-17 00:00:00');

INSERT INTO adjunto (id, descripcion, titulo, nombre_archivo, tipo_archivo, ruta, fecha) VALUES (6, NULL, NULL, 'locacion.odt', 'application/vnd.oasis.opendocument.text', 'locacion.odt', '2007-10-17 00:00:00');

INSERT INTO adjunto (id, descripcion, titulo, nombre_archivo, tipo_archivo, ruta, fecha) VALUES (7, NULL, NULL, 'docente.odt', 'application/vnd.oasis.opendocument.text', 'docente.odt', '2007-10-17 00:00:00');

INSERT INTO adjunto (id, descripcion, titulo, nombre_archivo, tipo_archivo, ruta, fecha) VALUES (8, NULL, NULL, 'organizacion.odt', 'application/vnd.oasis.opendocument.text', 'organizacion.odt', '2007-10-17 00:00:00');

INSERT INTO adjunto (id, descripcion, titulo, nombre_archivo, tipo_archivo, ruta, fecha) VALUES (9, NULL, NULL, 'cuenta.odt', 'application/vnd.oasis.opendocument.text', 'cuenta.odt', '2007-10-17 00:00:00');

INSERT INTO adjunto (id, descripcion, titulo, nombre_archivo, tipo_archivo, ruta, fecha) VALUES (10, NULL, NULL, 'responsable.odt', 'application/vnd.oasis.opendocument.text', 'responsable.odt', '2007-10-17 00:00:00');


INSERT INTO informe (id, nombre, descripcion, fk_adjunto_id, fk_tipoinforme_id, listado, variables) VALUES (1, 'Constancia de alumno regular', 'Constancia de alumno regular', 1, 1, false, '');

INSERT INTO informe (id, nombre, descripcion, fk_adjunto_id, fk_tipoinforme_id, listado, variables) VALUES (2, 'Certificado fin de estudios primarios', 'Certificado fin de estudios primarios', 2, 1, false, '');

INSERT INTO informe (id, nombre, descripcion, fk_adjunto_id, fk_tipoinforme_id, listado, variables) VALUES (3, 'Solicitud de legajo', 'Solicitud de legajo', 3, 1, false, 'origen');

INSERT INTO informe (id, nombre, descripcion, fk_adjunto_id, fk_tipoinforme_id, listado, variables) VALUES (4, 'Certificado de estudios', 'Certificado de estudios', 4, 1, false, 'grado;año');

INSERT INTO informe (id, nombre, descripcion, fk_adjunto_id, fk_tipoinforme_id, listado, variables) VALUES (5, 'Alumnos por división', 'Alumnos por división', 5, 1, true, '');

INSERT INTO informe (id, nombre, descripcion, fk_adjunto_id, fk_tipoinforme_id, listado, variables) VALUES (6, 'Locacion', 'Locacion', 6, 2, true, '');

INSERT INTO informe (id, nombre, descripcion, fk_adjunto_id, fk_tipoinforme_id, listado, variables) VALUES (7, 'Docente', 'Docente', 7, 2, true, '');

INSERT INTO informe (id, nombre, descripcion, fk_adjunto_id, fk_tipoinforme_id, listado, variables) VALUES (8, 'Organizaci&oacute;n', 'Organizaci&oacute;n', 8, 2, false, '');

INSERT INTO informe (id, nombre, descripcion, fk_adjunto_id, fk_tipoinforme_id, listado, variables) VALUES (9, 'Cuenta', 'Cuenta', 9, 2, true, '');

INSERT INTO informe (id, nombre, descripcion, fk_adjunto_id, fk_tipoinforme_id, listado, variables) VALUES (10, 'Responsable', 'Responsable', 10, 2, true, '');

