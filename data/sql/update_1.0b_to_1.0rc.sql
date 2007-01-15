ALTER TABLE `tipoiva` CHANGE `id` `id` INT( 11 ) NOT NULL AUTO_INCREMENT ;

INSERT INTO `tipodocumento` ( `id` , `descripcion` , `orden` , `nombre` ) VALUES (NULL , 'Documento Nacional de Identidad', '0', 'DNI'), (NULL , 'Libreta de Enrolamiento', '0', 'LE');
INSERT INTO `tipodocumento` ( `id` , `descripcion` , `orden` , `nombre` ) VALUES (NULL , 'Cedula de Identidad', '0', 'CI'), (NULL , 'Pasaporte', '0', 'Pasaporte');