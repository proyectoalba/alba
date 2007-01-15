ALTER TABLE `tipoiva` CHANGE `id` `id` INT( 11 ) NOT NULL AUTO_INCREMENT ;

ALTER TABLE `responsable` ADD `observacion` VARCHAR( 255 ) NULL AFTER `relacion` ;