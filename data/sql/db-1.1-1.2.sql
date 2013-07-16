ALTER TABLE alumno ADD COLUMN `email_padre` VARCHAR(128);
ALTER TABLE alumno ADD COLUMN  `celular_padre`  VARCHAR(20);
ALTER TABLE alumno ADD COLUMN  `celular_madre` VARCHAR(20);

CREATE TABLE config (
  id int auto_increment not null,
  nombre varchar(200),
  valor text,
  primary key (id)
);

INSERT INTO config (nombre,valor) VALUES ('db_version','1.2');

ALTER TABLE legajopedagogico MODIFY resumen TEXT NOT NULL;
ALTER TABLE legajopedagogico MODIFY texto TEXT NOT NULL;

ALTER TABLE boletin_conceptual MODIFY observacion TEXT;
ALTER TABLE boletin_actividades MODIFY observacion TEXT;
ALTER TABLE examen MODIFY observacion TEXT;
ALTER TABLE legajosalud MODIFY descripcion TEXT NOT NULL;
