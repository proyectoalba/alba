SET CHARACTER SET utf8;
SET FOREIGN_KEY_CHECKS = 0;
SET FOREIGN_KEY_CHECKS = 1;

CREATE TABLE `rol_responsable`
(
    `id` INTEGER  NOT NULL AUTO_INCREMENT,
    `nombre` VARCHAR(128) default '' NOT NULL,
    `descripcion` VARCHAR(255) default '',
    `activo` INTEGER default 1 NOT NULL,
    PRIMARY KEY (`id`)
)Type=InnoDB;

INSERT INTO modulo (id,nombre,titulo,descripcion) VALUES ( 48, 'rolResponsable', 'Rol Responsables', 'Roles de los Resposables de Alumos');
INSERT INTO permiso (nombre,descripcion,fk_modulo_id,credencial) VALUES ( 'rolResponsable', 'Rol de Responsables', 48, 'rolResponsable');

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

CREATE TABLE `rel_rolresponsable_responsable` 
(      
    `id` INTEGER  NOT NULL AUTO_INCREMENT,      
    `fk_rolresponsable_id` INTEGER default 0 NOT NULL,      
    `fk_responsable_id` INTEGER default 0 NOT NULL,
    `fk_alumno_id` INTEGER default 0 NOT NULL,
    `descripcion` VARCHAR(255) default "" NOT NULL,      
    PRIMARY KEY (`id`),      
    INDEX `rel_rolresponsable_responsable_FI_1` (`fk_rolresponsable_id`),      
        CONSTRAINT `rel_rolresponsable_responsable_FK_1`         
        FOREIGN KEY (`fk_rolresponsable_id`)         
        REFERENCES `rol_responsable` (`id`),    
    INDEX `rel_rolresponsable_responsable_FI_2` (`fk_responsable_id`),      
        CONSTRAINT `rel_rolresponsable_responsable_FK_2`         
        FOREIGN KEY (`fk_responsable_id`)       
        REFERENCES `responsable` (`id`),
    INDEX `rel_rolresponsable_responsable_FI_3` (`fk_alumno_id`),      
        CONSTRAINT `rel_rolresponsable_responsable_FK_3`         
        FOREIGN KEY (`fk_alumno_id`)       
        REFERENCES `alumno` (`id`)
)Type=InnoDB;

ALTER TABLE responsable ADD COLUMN fk_rolresponsable_id INT NOT NULL DEFAULT 1;

ALTER TABLE `rel_division_actividad_docente` ADD `fk_evento_id` INT NULL ;

ALTER TABLE responsable DROP COLUMN relacion;

ALTER TABLE tipoiva ADD COLUMN orden INT DEFAULT 0 NOT NULL;

ALTER TABLE `rel_actividad_docente` DROP COLUMN id;
ALTER TABLE `rel_actividad_docente` ADD PRIMARY KEY ( `fk_actividad_id` , `fk_docente_id` ) ;

ALTER TABLE `docente_horario` DROP `id` , DROP `fk_repeticion_id` , DROP `hora_inicio` , DROP `hora_fin` , DROP `dia` ;
ALTER TABLE `docente_horario` ADD `fk_evento_id` INT NOT NULL ;
ALTER TABLE `docente_horario` ADD PRIMARY KEY ( `fk_docente_id` , `fk_evento_id` );
ALTER TABLE `docente_horario` ADD INDEX `fk_evento_FI_1` ( `fk_evento_id` );

DROP TABLE `menu`;


ALTER TABLE `horarioescolar` DROP `dia` , DROP `hora_inicio` , DROP `hora_fin` ;
ALTER TABLE `horarioescolar` ADD `fk_evento_id` INT NOT NULL ;
ALTER TABLE `horarioescolar` ADD INDEX `fk_evento_FI_1` ( `fk_evento_id` );

ALTER TABLE `rel_division_actividad_docente` DROP `fk_repeticion_id` , DROP `fecha_inicio`, DROP `fecha_fin`, DROP `hora_inicio`, DROP `hora_fin`;

ALTER TABLE rel_division_actividad_docente DROP FOREIGN KEY `fk_evento_id`;
ALTER TABLE horarioescolar DROP FOREIGN KEY `fk_evento_id`;
ALTER TABLE docente_horario DROP FOREIGN KEY `fk_evento_id`;
  
ALTER TABLE `rel_division_actividad_docente` ADD CONSTRAINT `rel_division_actividad_docente_FK_4`                FOREIGN KEY (`fk_evento_id`) REFERENCES `evento` (`id`) ON DELETE CASCADE;

ALTER TABLE `horarioescolar` ADD CONSTRAINT `horarioescolar_FK_1` FOREIGN KEY (`fk_evento_id`) REFERENCES `evento` (`id`) ON DELETE CASCADE;

ALTER TABLE `docente_horario` ADD CONSTRAINT `docente_horario_FK_2` FOREIGN KEY (`fk_evento_id`) REFERENCES `evento` (`id`) ON DELETE CASCADE;

SET FOREIGN_KEY_CHECKS = 1;
    