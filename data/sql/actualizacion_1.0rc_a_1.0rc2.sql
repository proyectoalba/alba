SET CHARACTER SET utf8;
SET FOREIGN_KEY_CHECKS = 0;

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


CREATE TABLE `orientacion`
(
    `id` INTEGER  NOT NULL AUTO_INCREMENT,
    `nombre` VARCHAR(128)  NOT NULL,
    `descripcion` VARCHAR(255),
    PRIMARY KEY (`id`)
)Type=InnoDB;



ALTER TABLE `division` ADD `fk_orientacion_id` INT;
ALTER TABLE `division` ADD CONSTRAINT `orientacion_FK_4` FOREIGN KEY (`fk_orientacion_id`) REFERENCES `orientacion` (`id`);

ALTER TABLE `rel_anio_actividad` ADD `fk_orientacion_id` INT;
ALTER TABLE `rel_anio_actividad` ADD CONSTRAINT `orientacion_FK_4` FOREIGN KEY (`fk_orientacion_id`) REFERENCES `orientacion` (`id`);


CREATE TABLE `rel_anio_actividad_docente`
(
       `fk_anio_actividad_id` INTEGER(11)  NOT NULL,
       `fk_docente_id` INTEGER(11)  NOT NULL,
       PRIMARY KEY (`fk_anio_actividad_id`,`fk_docente_id`),
       CONSTRAINT `rel_anio_actividad_docente_FK_1`
               FOREIGN KEY (`fk_anio_actividad_id`)
               REFERENCES `rel_anio_actividad` (`id`),
       INDEX `rel_anio_actividad_docente_FI_2` (`fk_docente_id`),
       CONSTRAINT `rel_anio_actividad_docente_FK_2`
               FOREIGN KEY (`fk_docente_id`)
               REFERENCES `docente` (`id`)
)Type=InnoDB;



INSERT INTO rel_anio_actividad_docente (fk_anio_actividad_id , fk_docente_id)  
SELECT id, fk_docente_id
FROM rel_actividad_docente, rel_anio_actividad
WHERE rel_anio_actividad.fk_actividad_id = rel_actividad_docente.fk_actividad_id;

DROP TABLE `rel_actividad_docente`;

ALTER TABLE `docente` ADD `lugar_nacimiento` VARCHAR(128) NULL;
ALTER TABLE `docente` ADD CONSTRAINT `pais_FK_4` FOREIGN KEY (`fk_pais_id`) REFERENCES `pais` (`id`);

SET FOREIGN_KEY_CHECKS = 1;


## modificacion del cambio de nombre de turnos a turno

RENAME TABLE `turnos` to `turno`;
ALTER TABLE `turno` DROP FOREIGN KEY `turnos_FK_1`;
ALTER TABLE `turno` ADD CONTRAINT `turno_FK_1` FOREING KEY (`fk_ciclolectivo_id`) REFERENCES `cilolectivo` (`id`);

ALTER TABLE DROP FOREINGN KEY `division_FK_2`;
ALTER TABLE `division` CHANGE `fk_turnos_id` `fk_turno_id` INTEGER(11) default 0 NOT NULL;
ALTER TABLE ADD CONSTRAINT `division_FK_2`
		FOREIGN KEY (`fk_turno_id`)
		REFERENCES `turno` (`id`);

ALTER TABLE `horarioescolar` DROP FOREINGN KEY `horarioescolar_FK_3`;
ALTER TABLE `horarioescolar` CHANGE `fk_turnos_id` `fk_turno_id` INTEGER default 0 NOT NULL;
ALTER TABLE `horarioescolar` CONSTRAINT `horarioescolar_FK_3`
		FOREIGN KEY (`fk_turnos_id`)
		REFERENCES `turnos` (`id`);

