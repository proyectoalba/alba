ALTER TABLE `tipoiva` CHANGE `id` `id` INT( 11 ) NOT NULL AUTO_INCREMENT ;

ALTER TABLE `responsable` ADD `observacion` VARCHAR( 255 ) NULL AFTER `relacion` ;

ALTER TABLE `adjunto` CHANGE `ruta` `ruta` VARCHAR(255) NOT NULL;

INSERT INTO permiso (id, nombre, descripcion, credencial, fk_modulo_id) VALUES (58, 'tipodocumento', 'tipodocumento', 'tipodocumento', 46);
INSERT INTO permiso (id, nombre, descripcion, credencial, fk_modulo_id) VALUES (59, 'informes', 'informes', 'informes', 47);