SET CHARACTER SET utf8;
SET FOREIGN_KEY_CHECKS = 0;

INSERT INTO `menu` ( `id` , `nombre` , `link` , `perm` , `fk_padre_menu_id` , `orden` , `target` )
VALUES (
'96', 'Biblioteca de contenidos', 'sfMediaLibrary', 'informes', '9', '0', ''
);
INSERT INTO `menu` ( `id` , `nombre` , `link` , `perm` , `fk_padre_menu_id` , `orden` , `target` )
VALUES (
'97', 'Definir Roles de responsables', 'rolResponsable', 'rolResponsable', '84', '0', '');


SET FOREIGN_KEY_CHECKS = 1;

CREATE TABLE `rol_responsable`
(
    `id` INTEGER  NOT NULL AUTO_INCREMENT,
    `nombre` VARCHAR(128) default '' NOT NULL,
    `descripcion` VARCHAR(255) default '',
    `activo` INTEGER default 1 NOT NULL,
    PRIMARY KEY (`id`)
)Type=InnoDB;

INSERT INTO modulo (id,nombre,titulo,descripcion) VALUES (48,'rolResponsable','Rol Responsables','Roles de los Resposables de Alumos');
INSERT INTO permiso (nombre,descripcion,fk_modulo_id,credencial) VALUES ('rolResponsable','Rol de Responsables',48,'rolResponsable');=======

CREATE TABLE `evento`
(
    `id` INTEGER  NOT NULL AUTO_INCREMENT,
    `titulo` VARCHAR(128)  NOT NULL,
    `fecha_inicio` DATETIME  NOT NULL,
    `fecha_fin` DATETIME  NOT NULL,
    `tipo` INTEGER default 0 NOT NULL,
    `frecuencia` INTEGER default 0 NOT NULL,
    `frecuencia_intervalo` INTEGER default 0 NOT NULL,
    `recurrencia_fin` VARCHAR(16) default '',
    `recurrencia_dias` INTEGER default 0 NOT NULL,
    `estado` INTEGER default 0 NOT NULL,
    PRIMARY KEY (`id`)
)Type=InnoDB;

SET FOREIGN_KEY_CHECKS = 1;

