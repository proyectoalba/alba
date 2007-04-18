SET CHARACTER SET utf8;
SET FOREIGN_KEY_CHECKS = 0;

INSERT INTO `menu` ( `id` , `nombre` , `link` , `perm` , `fk_padre_menu_id` , `orden` , `target` )
VALUES (
'96', 'Biblioteca de contenidos', 'sfMediaLibrary', 'informes', '9', '0', ''
);

SET FOREIGN_KEY_CHECKS = 1;

CREATE TABLE `rol_responsable`
(
    `id` INTEGER  NOT NULL AUTO_INCREMENT,
    `nombre` VARCHAR(128) default '' NOT NULL,
    `descripcion` VARCHAR(255) default '',
    `activo` INTEGER default 1 NOT NULL,
    PRIMARY KEY (`id`)
)Type=InnoDB;
