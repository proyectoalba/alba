SET CHARACTER SET utf8;
SET FOREIGN_KEY_CHECKS = 0;

INSERT INTO `menu` ( `id` , `nombre` , `link` , `perm` , `fk_padre_menu_id` , `orden` , `target` )
VALUES (
'96', 'Biblioteca de contenidos', 'sfMediaLibrary', 'informes', '9', '0', ''
);

SET FOREIGN_KEY_CHECKS = 1;