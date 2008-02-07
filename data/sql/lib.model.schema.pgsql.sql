
-----------------------------------------------------------------------------
-- conceptobaja
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "conceptobaja" CASCADE;

DROP SEQUENCE IF EXISTS "conceptobaja_seq";

CREATE SEQUENCE "conceptobaja_seq";


CREATE TABLE "conceptobaja"
(
	"id" INTEGER  NOT NULL,
	"nombre" VARCHAR(128)  NOT NULL,
	"descripcion" VARCHAR(255),
	PRIMARY KEY ("id")
);

COMMENT ON TABLE "conceptobaja" IS '';


SET search_path TO public;
-----------------------------------------------------------------------------
-- tipodocumento
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "tipodocumento" CASCADE;

DROP SEQUENCE IF EXISTS "tipodocumento_seq";

CREATE SEQUENCE "tipodocumento_seq";


CREATE TABLE "tipodocumento"
(
	"id" INTEGER  NOT NULL,
	"nombre" VARCHAR(128)  NOT NULL,
	"descripcion" VARCHAR(255),
	"orden" INTEGER default 0,
	PRIMARY KEY ("id")
);

COMMENT ON TABLE "tipodocumento" IS '';


SET search_path TO public;
-----------------------------------------------------------------------------
-- tipoiva
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "tipoiva" CASCADE;

DROP SEQUENCE IF EXISTS "tipoiva_seq";

CREATE SEQUENCE "tipoiva_seq";


CREATE TABLE "tipoiva"
(
	"id" INTEGER  NOT NULL,
	"nombre" VARCHAR(128)  NOT NULL,
	"descripcion" VARCHAR(255),
	"orden" INTEGER default 0,
	PRIMARY KEY ("id")
);

COMMENT ON TABLE "tipoiva" IS '';


SET search_path TO public;
-----------------------------------------------------------------------------
-- pais
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "pais" CASCADE;

DROP SEQUENCE IF EXISTS "pais_seq";

CREATE SEQUENCE "pais_seq";


CREATE TABLE "pais"
(
	"id" INTEGER  NOT NULL,
	"nombre_largo" VARCHAR(128)  NOT NULL,
	"nombre_corto" VARCHAR(32)  NOT NULL,
	"orden" INTEGER default 0,
	PRIMARY KEY ("id")
);

COMMENT ON TABLE "pais" IS '';


SET search_path TO public;
-----------------------------------------------------------------------------
-- tipoespacio
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "tipoespacio" CASCADE;

DROP SEQUENCE IF EXISTS "tipoespacio_seq";

CREATE SEQUENCE "tipoespacio_seq";


CREATE TABLE "tipoespacio"
(
	"id" INTEGER  NOT NULL,
	"nombre" VARCHAR(128)  NOT NULL,
	"descripcion" VARCHAR(255),
	PRIMARY KEY ("id")
);

COMMENT ON TABLE "tipoespacio" IS '';


SET search_path TO public;
-----------------------------------------------------------------------------
-- provincia
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "provincia" CASCADE;

DROP SEQUENCE IF EXISTS "provincia_seq";

CREATE SEQUENCE "provincia_seq";


CREATE TABLE "provincia"
(
	"id" INTEGER  NOT NULL,
	"nombre_corto" VARCHAR(32)  NOT NULL,
	"nombre_largo" VARCHAR(128)  NOT NULL,
	"fk_pais_id" INTEGER default 0 NOT NULL,
	"orden" INTEGER default 0,
	PRIMARY KEY ("id")
);

COMMENT ON TABLE "provincia" IS '';


SET search_path TO public;
ALTER TABLE "provincia" ADD CONSTRAINT "provincia_FK_1" FOREIGN KEY ("fk_pais_id") REFERENCES "pais" ("id") INITIALLY DEFERRED ;

-----------------------------------------------------------------------------
-- tipolocacion
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "tipolocacion" CASCADE;

DROP SEQUENCE IF EXISTS "tipolocacion_seq";

CREATE SEQUENCE "tipolocacion_seq";


CREATE TABLE "tipolocacion"
(
	"id" INTEGER  NOT NULL,
	"nombre" VARCHAR(128)  NOT NULL,
	"descripcion" VARCHAR(255),
	PRIMARY KEY ("id")
);

COMMENT ON TABLE "tipolocacion" IS '';


SET search_path TO public;
-----------------------------------------------------------------------------
-- locacion
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "locacion" CASCADE;

DROP SEQUENCE IF EXISTS "locacion_seq";

CREATE SEQUENCE "locacion_seq";


CREATE TABLE "locacion"
(
	"id" INTEGER  NOT NULL,
	"nombre" VARCHAR(128)  NOT NULL,
	"descripcion" VARCHAR(255),
	"direccion" VARCHAR(128)  NOT NULL,
	"ciudad" VARCHAR(128)  NOT NULL,
	"codigo_postal" VARCHAR(20),
	"fk_provincia_id" INTEGER default 0 NOT NULL,
	"fk_tipolocacion_id" INTEGER default 0 NOT NULL,
	"telefono" VARCHAR(20),
	"fax" VARCHAR(20),
	"encargado" VARCHAR(128),
	"encargado_telefono" VARCHAR(20),
	"principal" BOOLEAN default 'f' NOT NULL,
	PRIMARY KEY ("id")
);

COMMENT ON TABLE "locacion" IS '';


SET search_path TO public;
ALTER TABLE "locacion" ADD CONSTRAINT "locacion_FK_1" FOREIGN KEY ("fk_provincia_id") REFERENCES "provincia" ("id") INITIALLY DEFERRED ;

ALTER TABLE "locacion" ADD CONSTRAINT "locacion_FK_2" FOREIGN KEY ("fk_tipolocacion_id") REFERENCES "tipolocacion" ("id") INITIALLY DEFERRED ;

-----------------------------------------------------------------------------
-- modulo
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "modulo" CASCADE;

DROP SEQUENCE IF EXISTS "modulo_seq";

CREATE SEQUENCE "modulo_seq";


CREATE TABLE "modulo"
(
	"id" INTEGER  NOT NULL,
	"nombre" VARCHAR(128)  NOT NULL,
	"titulo" VARCHAR(128),
	"descripcion" VARCHAR(255),
	"activo" BOOLEAN default 't' NOT NULL,
	PRIMARY KEY ("id")
);

COMMENT ON TABLE "modulo" IS '';


SET search_path TO public;
-----------------------------------------------------------------------------
-- espacio
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "espacio" CASCADE;

DROP SEQUENCE IF EXISTS "espacio_seq";

CREATE SEQUENCE "espacio_seq";


CREATE TABLE "espacio"
(
	"id" INTEGER  NOT NULL,
	"nombre" VARCHAR(128)  NOT NULL,
	"m2" FLOAT,
	"capacidad" VARCHAR(255),
	"descripcion" VARCHAR(255),
	"estado" VARCHAR(255),
	"fk_tipoespacio_id" INTEGER,
	"fk_locacion_id" INTEGER default 0 NOT NULL,
	PRIMARY KEY ("id")
);

COMMENT ON TABLE "espacio" IS '';


SET search_path TO public;
ALTER TABLE "espacio" ADD CONSTRAINT "espacio_FK_1" FOREIGN KEY ("fk_tipoespacio_id") REFERENCES "tipoespacio" ("id") INITIALLY DEFERRED ;

ALTER TABLE "espacio" ADD CONSTRAINT "espacio_FK_2" FOREIGN KEY ("fk_locacion_id") REFERENCES "locacion" ("id") INITIALLY DEFERRED ;

-----------------------------------------------------------------------------
-- distritoescolar
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "distritoescolar" CASCADE;

DROP SEQUENCE IF EXISTS "distritoescolar_seq";

CREATE SEQUENCE "distritoescolar_seq";


CREATE TABLE "distritoescolar"
(
	"id" INTEGER  NOT NULL,
	"nombre" VARCHAR(128)  NOT NULL,
	"direccion" VARCHAR(128),
	"telefono" VARCHAR(20),
	"ciudad" VARCHAR(128),
	PRIMARY KEY ("id")
);

COMMENT ON TABLE "distritoescolar" IS '';


SET search_path TO public;
-----------------------------------------------------------------------------
-- niveltipo
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "niveltipo" CASCADE;

DROP SEQUENCE IF EXISTS "niveltipo_seq";

CREATE SEQUENCE "niveltipo_seq";


CREATE TABLE "niveltipo"
(
	"id" INTEGER  NOT NULL,
	"nombre" VARCHAR(128)  NOT NULL,
	"descripcion" VARCHAR(255),
	PRIMARY KEY ("id")
);

COMMENT ON TABLE "niveltipo" IS '';


SET search_path TO public;
-----------------------------------------------------------------------------
-- organizacion
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "organizacion" CASCADE;

DROP SEQUENCE IF EXISTS "organizacion_seq";

CREATE SEQUENCE "organizacion_seq";


CREATE TABLE "organizacion"
(
	"id" INTEGER  NOT NULL,
	"nombre" VARCHAR(128)  NOT NULL,
	"descripcion" VARCHAR(255),
	"razon_social" VARCHAR(128)  NOT NULL,
	"cuit" VARCHAR(20)  NOT NULL,
	"direccion" VARCHAR(128)  NOT NULL,
	"ciudad" VARCHAR(128)  NOT NULL,
	"codigo_postal" VARCHAR(20)  NOT NULL,
	"telefono" VARCHAR(20),
	"fk_provincia_id" INTEGER default 0 NOT NULL,
	"fk_tipoiva_id" INTEGER default 0 NOT NULL,
	PRIMARY KEY ("id")
);

COMMENT ON TABLE "organizacion" IS '';


SET search_path TO public;
ALTER TABLE "organizacion" ADD CONSTRAINT "organizacion_FK_1" FOREIGN KEY ("fk_provincia_id") REFERENCES "provincia" ("id") INITIALLY DEFERRED ;

ALTER TABLE "organizacion" ADD CONSTRAINT "organizacion_FK_2" FOREIGN KEY ("fk_tipoiva_id") REFERENCES "tipoiva" ("id") INITIALLY DEFERRED ;

-----------------------------------------------------------------------------
-- establecimiento
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "establecimiento" CASCADE;

DROP SEQUENCE IF EXISTS "establecimiento_seq";

CREATE SEQUENCE "establecimiento_seq";


CREATE TABLE "establecimiento"
(
	"id" INTEGER  NOT NULL,
	"nombre" VARCHAR(128)  NOT NULL,
	"descripcion" VARCHAR(255),
	"fk_distritoescolar_id" INTEGER default 0 NOT NULL,
	"fk_organizacion_id" INTEGER default 0 NOT NULL,
	"fk_niveltipo_id" INTEGER default 0 NOT NULL,
	PRIMARY KEY ("id")
);

COMMENT ON TABLE "establecimiento" IS '';


SET search_path TO public;
ALTER TABLE "establecimiento" ADD CONSTRAINT "establecimiento_FK_1" FOREIGN KEY ("fk_distritoescolar_id") REFERENCES "distritoescolar" ("id") INITIALLY DEFERRED ;

ALTER TABLE "establecimiento" ADD CONSTRAINT "establecimiento_FK_2" FOREIGN KEY ("fk_organizacion_id") REFERENCES "organizacion" ("id") INITIALLY DEFERRED ;

ALTER TABLE "establecimiento" ADD CONSTRAINT "establecimiento_FK_3" FOREIGN KEY ("fk_niveltipo_id") REFERENCES "niveltipo" ("id") INITIALLY DEFERRED ;

-----------------------------------------------------------------------------
-- permiso
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "permiso" CASCADE;

DROP SEQUENCE IF EXISTS "permiso_seq";

CREATE SEQUENCE "permiso_seq";


CREATE TABLE "permiso"
(
	"id" INTEGER  NOT NULL,
	"nombre" VARCHAR(128)  NOT NULL,
	"descripcion" VARCHAR(255),
	"fk_modulo_id" INTEGER default 0 NOT NULL,
	"credencial" VARCHAR(32),
	PRIMARY KEY ("id")
);

COMMENT ON TABLE "permiso" IS '';


SET search_path TO public;
ALTER TABLE "permiso" ADD CONSTRAINT "permiso_FK_1" FOREIGN KEY ("fk_modulo_id") REFERENCES "modulo" ("id") INITIALLY DEFERRED ;

-----------------------------------------------------------------------------
-- preferencia
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "preferencia" CASCADE;

DROP SEQUENCE IF EXISTS "preferencia_seq";

CREATE SEQUENCE "preferencia_seq";


CREATE TABLE "preferencia"
(
	"id" INTEGER  NOT NULL,
	"nombre" VARCHAR(128)  NOT NULL,
	"valor_por_defecto" VARCHAR(128),
	"activo" BOOLEAN default 't' NOT NULL,
	PRIMARY KEY ("id")
);

COMMENT ON TABLE "preferencia" IS '';


SET search_path TO public;
-----------------------------------------------------------------------------
-- rol
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "rol" CASCADE;

DROP SEQUENCE IF EXISTS "rol_seq";

CREATE SEQUENCE "rol_seq";


CREATE TABLE "rol"
(
	"id" INTEGER  NOT NULL,
	"nombre" VARCHAR(128)  NOT NULL,
	"descripcion" VARCHAR(255),
	"activo" BOOLEAN default 't' NOT NULL,
	PRIMARY KEY ("id")
);

COMMENT ON TABLE "rol" IS '';


SET search_path TO public;
-----------------------------------------------------------------------------
-- usuario
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "usuario" CASCADE;

DROP SEQUENCE IF EXISTS "usuario_seq";

CREATE SEQUENCE "usuario_seq";


CREATE TABLE "usuario"
(
	"id" INTEGER  NOT NULL,
	"usuario" VARCHAR(32)  NOT NULL,
	"clave" VARCHAR(48)  NOT NULL,
	"correo_publico" BOOLEAN default 't',
	"activo" BOOLEAN default 't' NOT NULL,
	"fecha_creado" TIMESTAMP  NOT NULL,
	"fecha_actualizado" TIMESTAMP  NOT NULL,
	"seguridad_pregunta" VARCHAR(128),
	"seguridad_respuesta" VARCHAR(128),
	"email" VARCHAR(128),
	"fk_establecimiento_id" INTEGER default 0 NOT NULL,
	"borrado" BOOLEAN default 'f' NOT NULL,
	PRIMARY KEY ("id")
);

COMMENT ON TABLE "usuario" IS '';


SET search_path TO public;
ALTER TABLE "usuario" ADD CONSTRAINT "usuario_FK_1" FOREIGN KEY ("fk_establecimiento_id") REFERENCES "establecimiento" ("id") INITIALLY DEFERRED ;

-----------------------------------------------------------------------------
-- rel_establecimiento_locacion
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "rel_establecimiento_locacion" CASCADE;

DROP SEQUENCE IF EXISTS "rel_establecimiento_locacion_seq";

CREATE SEQUENCE "rel_establecimiento_locacion_seq";


CREATE TABLE "rel_establecimiento_locacion"
(
	"id" INTEGER  NOT NULL,
	"fk_establecimiento_id" INTEGER default 0 NOT NULL,
	"fk_locacion_id" INTEGER default 0 NOT NULL,
	PRIMARY KEY ("id")
);

COMMENT ON TABLE "rel_establecimiento_locacion" IS '';


SET search_path TO public;
ALTER TABLE "rel_establecimiento_locacion" ADD CONSTRAINT "rel_establecimiento_locacio_FK_1" FOREIGN KEY ("fk_establecimiento_id") REFERENCES "establecimiento" ("id") INITIALLY DEFERRED ;

ALTER TABLE "rel_establecimiento_locacion" ADD CONSTRAINT "rel_establecimiento_locacio_FK_2" FOREIGN KEY ("fk_locacion_id") REFERENCES "locacion" ("id") INITIALLY DEFERRED ;

-----------------------------------------------------------------------------
-- rel_rol_permiso
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "rel_rol_permiso" CASCADE;

DROP SEQUENCE IF EXISTS "rel_rol_permiso_seq";

CREATE SEQUENCE "rel_rol_permiso_seq";


CREATE TABLE "rel_rol_permiso"
(
	"id" INTEGER  NOT NULL,
	"fk_rol_id" INTEGER default 0 NOT NULL,
	"fk_permiso_id" INTEGER default 0 NOT NULL,
	PRIMARY KEY ("id")
);

COMMENT ON TABLE "rel_rol_permiso" IS '';


SET search_path TO public;
ALTER TABLE "rel_rol_permiso" ADD CONSTRAINT "rel_rol_permiso_FK_1" FOREIGN KEY ("fk_rol_id") REFERENCES "rol" ("id") INITIALLY DEFERRED ;

ALTER TABLE "rel_rol_permiso" ADD CONSTRAINT "rel_rol_permiso_FK_2" FOREIGN KEY ("fk_permiso_id") REFERENCES "permiso" ("id") INITIALLY DEFERRED ;

-----------------------------------------------------------------------------
-- rel_usuario_permiso
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "rel_usuario_permiso" CASCADE;

DROP SEQUENCE IF EXISTS "rel_usuario_permiso_seq";

CREATE SEQUENCE "rel_usuario_permiso_seq";


CREATE TABLE "rel_usuario_permiso"
(
	"id" INTEGER  NOT NULL,
	"fk_usuario_id" INTEGER default 0 NOT NULL,
	"fk_permiso_id" INTEGER default 0 NOT NULL,
	PRIMARY KEY ("id")
);

COMMENT ON TABLE "rel_usuario_permiso" IS '';


SET search_path TO public;
ALTER TABLE "rel_usuario_permiso" ADD CONSTRAINT "rel_usuario_permiso_FK_1" FOREIGN KEY ("fk_usuario_id") REFERENCES "usuario" ("id") INITIALLY DEFERRED ;

ALTER TABLE "rel_usuario_permiso" ADD CONSTRAINT "rel_usuario_permiso_FK_2" FOREIGN KEY ("fk_permiso_id") REFERENCES "permiso" ("id") ON DELETE CASCADE INITIALLY DEFERRED ;

-----------------------------------------------------------------------------
-- rel_usuario_preferencia
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "rel_usuario_preferencia" CASCADE;

DROP SEQUENCE IF EXISTS "rel_usuario_preferencia_seq";

CREATE SEQUENCE "rel_usuario_preferencia_seq";


CREATE TABLE "rel_usuario_preferencia"
(
	"id" INTEGER  NOT NULL,
	"fk_usuario_id" INTEGER default 0 NOT NULL,
	"fk_preferencia_id" INTEGER default 0 NOT NULL,
	PRIMARY KEY ("id")
);

COMMENT ON TABLE "rel_usuario_preferencia" IS '';


SET search_path TO public;
-----------------------------------------------------------------------------
-- orientacion
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "orientacion" CASCADE;

DROP SEQUENCE IF EXISTS "orientacion_seq";

CREATE SEQUENCE "orientacion_seq";


CREATE TABLE "orientacion"
(
	"id" INTEGER  NOT NULL,
	"nombre" VARCHAR(128)  NOT NULL,
	"descripcion" VARCHAR(255),
	PRIMARY KEY ("id")
);

COMMENT ON TABLE "orientacion" IS '';


SET search_path TO public;
-----------------------------------------------------------------------------
-- cuenta
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "cuenta" CASCADE;

DROP SEQUENCE IF EXISTS "cuenta_seq";

CREATE SEQUENCE "cuenta_seq";


CREATE TABLE "cuenta"
(
	"id" INTEGER  NOT NULL,
	"nombre" VARCHAR(128)  NOT NULL,
	"razon_social" VARCHAR(128)  NOT NULL,
	"cuit" VARCHAR(20)  NOT NULL,
	"direccion" VARCHAR(128)  NOT NULL,
	"ciudad" VARCHAR(128)  NOT NULL,
	"codigo_postal" VARCHAR(20)  NOT NULL,
	"telefono" VARCHAR(20),
	"fk_provincia_id" INTEGER,
	"fk_tipoiva_id" INTEGER default 0 NOT NULL,
	PRIMARY KEY ("id")
);

COMMENT ON TABLE "cuenta" IS '';


SET search_path TO public;
ALTER TABLE "cuenta" ADD CONSTRAINT "cuenta_FK_1" FOREIGN KEY ("fk_provincia_id") REFERENCES "provincia" ("id") INITIALLY DEFERRED ;

ALTER TABLE "cuenta" ADD CONSTRAINT "cuenta_FK_2" FOREIGN KEY ("fk_tipoiva_id") REFERENCES "tipoiva" ("id") INITIALLY DEFERRED ;

-----------------------------------------------------------------------------
-- alumno
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "alumno" CASCADE;

DROP SEQUENCE IF EXISTS "alumno_seq";

CREATE SEQUENCE "alumno_seq";


CREATE TABLE "alumno"
(
	"id" INTEGER  NOT NULL,
	"nombre" VARCHAR(128)  NOT NULL,
	"apellido" VARCHAR(128)  NOT NULL,
	"fecha_nacimiento" TIMESTAMP  NOT NULL,
	"direccion" VARCHAR(128)  NOT NULL,
	"ciudad" VARCHAR(128)  NOT NULL,
	"codigo_postal" VARCHAR(20)  NOT NULL,
	"fk_provincia_id" INTEGER default 0 NOT NULL,
	"telefono" VARCHAR(20),
	"lugar_nacimiento" VARCHAR(128),
	"fk_tipodocumento_id" INTEGER default 0 NOT NULL,
	"nro_documento" VARCHAR(16)  NOT NULL,
	"sexo" CHAR(1)  NOT NULL,
	"email" VARCHAR(128)  NOT NULL,
	"distancia_escuela" INTEGER default 0,
	"hermanos_escuela" BOOLEAN default 'f' NOT NULL,
	"hijo_maestro_escuela" BOOLEAN default 'f' NOT NULL,
	"fk_establecimiento_id" INTEGER default 0 NOT NULL,
	"fk_cuenta_id" INTEGER default 0 NOT NULL,
	"certificado_medico" BOOLEAN default 'f' NOT NULL,
	"activo" BOOLEAN default 't' NOT NULL,
	"fk_conceptobaja_id" INTEGER,
	"fk_pais_id" INTEGER default 0 NOT NULL,
	PRIMARY KEY ("id")
);

COMMENT ON TABLE "alumno" IS '';


SET search_path TO public;
ALTER TABLE "alumno" ADD CONSTRAINT "alumno_FK_1" FOREIGN KEY ("fk_provincia_id") REFERENCES "provincia" ("id") INITIALLY DEFERRED ;

ALTER TABLE "alumno" ADD CONSTRAINT "alumno_FK_2" FOREIGN KEY ("fk_tipodocumento_id") REFERENCES "tipodocumento" ("id") INITIALLY DEFERRED ;

ALTER TABLE "alumno" ADD CONSTRAINT "alumno_FK_3" FOREIGN KEY ("fk_establecimiento_id") REFERENCES "establecimiento" ("id") INITIALLY DEFERRED ;

ALTER TABLE "alumno" ADD CONSTRAINT "alumno_FK_4" FOREIGN KEY ("fk_cuenta_id") REFERENCES "cuenta" ("id") INITIALLY DEFERRED ;

ALTER TABLE "alumno" ADD CONSTRAINT "alumno_FK_5" FOREIGN KEY ("fk_conceptobaja_id") REFERENCES "conceptobaja" ("id") INITIALLY DEFERRED ;

ALTER TABLE "alumno" ADD CONSTRAINT "alumno_FK_6" FOREIGN KEY ("fk_pais_id") REFERENCES "pais" ("id") INITIALLY DEFERRED ;

-----------------------------------------------------------------------------
-- rol_responsable
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "rol_responsable" CASCADE;

DROP SEQUENCE IF EXISTS "rol_responsable_seq";

CREATE SEQUENCE "rol_responsable_seq";


CREATE TABLE "rol_responsable"
(
	"id" INTEGER  NOT NULL,
	"nombre" VARCHAR(128)  NOT NULL,
	"descripcion" VARCHAR(255),
	"activo" BOOLEAN default 't' NOT NULL,
	PRIMARY KEY ("id")
);

COMMENT ON TABLE "rol_responsable" IS '';


SET search_path TO public;
-----------------------------------------------------------------------------
-- responsable
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "responsable" CASCADE;

DROP SEQUENCE IF EXISTS "responsable_seq";

CREATE SEQUENCE "responsable_seq";


CREATE TABLE "responsable"
(
	"id" INTEGER  NOT NULL,
	"nombre" VARCHAR(128)  NOT NULL,
	"apellido" VARCHAR(128)  NOT NULL,
	"direccion" VARCHAR(128),
	"ciudad" VARCHAR(128),
	"codigo_postal" VARCHAR(20),
	"fk_provincia_id" INTEGER default 0 NOT NULL,
	"telefono" VARCHAR(20),
	"telefono_movil" VARCHAR(20),
	"nro_documento" VARCHAR(20)  NOT NULL,
	"fk_tipodocumento_id" INTEGER default 0 NOT NULL,
	"sexo" CHAR(1)  NOT NULL,
	"email" VARCHAR(128),
	"observacion" VARCHAR(255),
	"autorizacion_retiro" BOOLEAN default 'f' NOT NULL,
	"fk_cuenta_id" INTEGER default 0 NOT NULL,
	"fk_rolresponsable_id" INTEGER default 1 NOT NULL,
	PRIMARY KEY ("id")
);

COMMENT ON TABLE "responsable" IS '';


SET search_path TO public;
ALTER TABLE "responsable" ADD CONSTRAINT "responsable_FK_1" FOREIGN KEY ("fk_provincia_id") REFERENCES "provincia" ("id") INITIALLY DEFERRED ;

ALTER TABLE "responsable" ADD CONSTRAINT "responsable_FK_2" FOREIGN KEY ("fk_tipodocumento_id") REFERENCES "tipodocumento" ("id") INITIALLY DEFERRED ;

ALTER TABLE "responsable" ADD CONSTRAINT "responsable_FK_3" FOREIGN KEY ("fk_cuenta_id") REFERENCES "cuenta" ("id") INITIALLY DEFERRED ;

ALTER TABLE "responsable" ADD CONSTRAINT "responsable_FK_4" FOREIGN KEY ("fk_rolresponsable_id") REFERENCES "rol_responsable" ("id") INITIALLY DEFERRED ;

-----------------------------------------------------------------------------
-- ciclolectivo
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "ciclolectivo" CASCADE;

DROP SEQUENCE IF EXISTS "ciclolectivo_seq";

CREATE SEQUENCE "ciclolectivo_seq";


CREATE TABLE "ciclolectivo"
(
	"id" INTEGER  NOT NULL,
	"fk_establecimiento_id" INTEGER  NOT NULL,
	"fecha_inicio" TIMESTAMP  NOT NULL,
	"fecha_fin" TIMESTAMP  NOT NULL,
	"descripcion" VARCHAR(255)  NOT NULL,
	"actual" BOOLEAN default 'f' NOT NULL,
	PRIMARY KEY ("id")
);

COMMENT ON TABLE "ciclolectivo" IS '';


SET search_path TO public;
ALTER TABLE "ciclolectivo" ADD CONSTRAINT "ciclolectivo_FK_1" FOREIGN KEY ("fk_establecimiento_id") REFERENCES "establecimiento" ("id") INITIALLY DEFERRED ;

-----------------------------------------------------------------------------
-- turno
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "turno" CASCADE;

DROP SEQUENCE IF EXISTS "turno_seq";

CREATE SEQUENCE "turno_seq";


CREATE TABLE "turno"
(
	"id" INTEGER  NOT NULL,
	"fk_ciclolectivo_id" INTEGER  NOT NULL,
	"hora_inicio" TIME  NOT NULL,
	"hora_fin" TIME  NOT NULL,
	"descripcion" VARCHAR(255)  NOT NULL,
	PRIMARY KEY ("id")
);

COMMENT ON TABLE "turno" IS '';


SET search_path TO public;
ALTER TABLE "turno" ADD CONSTRAINT "turno_FK_1" FOREIGN KEY ("fk_ciclolectivo_id") REFERENCES "ciclolectivo" ("id") INITIALLY DEFERRED ;

-----------------------------------------------------------------------------
-- periodo
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "periodo" CASCADE;

DROP SEQUENCE IF EXISTS "periodo_seq";

CREATE SEQUENCE "periodo_seq";


CREATE TABLE "periodo"
(
	"id" INTEGER  NOT NULL,
	"fk_ciclolectivo_id" INTEGER  NOT NULL,
	"fecha_inicio" TIMESTAMP  NOT NULL,
	"fecha_fin" TIMESTAMP  NOT NULL,
	"descripcion" VARCHAR(255)  NOT NULL,
	PRIMARY KEY ("id")
);

COMMENT ON TABLE "periodo" IS '';


SET search_path TO public;
ALTER TABLE "periodo" ADD CONSTRAINT "periodo_FK_1" FOREIGN KEY ("fk_ciclolectivo_id") REFERENCES "ciclolectivo" ("id") INITIALLY DEFERRED ;

-----------------------------------------------------------------------------
-- tipodocente
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "tipodocente" CASCADE;

DROP SEQUENCE IF EXISTS "tipodocente_seq";

CREATE SEQUENCE "tipodocente_seq";


CREATE TABLE "tipodocente"
(
	"id" INTEGER  NOT NULL,
	"nombre" VARCHAR(128)  NOT NULL,
	"descripcion" VARCHAR(255),
	PRIMARY KEY ("id")
);

COMMENT ON TABLE "tipodocente" IS '';


SET search_path TO public;
-----------------------------------------------------------------------------
-- cargobaja
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "cargobaja" CASCADE;

DROP SEQUENCE IF EXISTS "cargobaja_seq";

CREATE SEQUENCE "cargobaja_seq";


CREATE TABLE "cargobaja"
(
	"id" INTEGER  NOT NULL,
	"nombre" VARCHAR(128)  NOT NULL,
	"descripcion" VARCHAR(255),
	PRIMARY KEY ("id")
);

COMMENT ON TABLE "cargobaja" IS '';


SET search_path TO public;
-----------------------------------------------------------------------------
-- calendariovacunacion
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "calendariovacunacion" CASCADE;

DROP SEQUENCE IF EXISTS "calendariovacunacion_seq";

CREATE SEQUENCE "calendariovacunacion_seq";


CREATE TABLE "calendariovacunacion"
(
	"id" INTEGER  NOT NULL,
	"nombre" VARCHAR(128)  NOT NULL,
	"descripcion" VARCHAR(255),
	"periodo" VARCHAR(128),
	"observacion" VARCHAR(255),
	PRIMARY KEY ("id")
);

COMMENT ON TABLE "calendariovacunacion" IS '';


SET search_path TO public;
-----------------------------------------------------------------------------
-- rel_calendariovacunacion_alumno
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "rel_calendariovacunacion_alumno" CASCADE;

DROP SEQUENCE IF EXISTS "rel_calendariovacunacion_a_seq_1";

CREATE SEQUENCE "rel_calendariovacunacion_a_seq_1";


CREATE TABLE "rel_calendariovacunacion_alumno"
(
	"id" INTEGER  NOT NULL,
	"fk_alumno_id" INTEGER  NOT NULL,
	"fk_calendariovacunacion_id" INTEGER  NOT NULL,
	"observacion" VARCHAR(255),
	"comprobante" BOOLEAN default 'f' NOT NULL,
	"fecha" TIMESTAMP,
	PRIMARY KEY ("id")
);

COMMENT ON TABLE "rel_calendariovacunacion_alumno" IS '';


SET search_path TO public;
ALTER TABLE "rel_calendariovacunacion_alumno" ADD CONSTRAINT "rel_calendariovacunacion_al_FK_1" FOREIGN KEY ("fk_alumno_id") REFERENCES "alumno" ("id") INITIALLY DEFERRED ;

ALTER TABLE "rel_calendariovacunacion_alumno" ADD CONSTRAINT "rel_calendariovacunacion_al_FK_2" FOREIGN KEY ("fk_calendariovacunacion_id") REFERENCES "calendariovacunacion" ("id") INITIALLY DEFERRED ;

-----------------------------------------------------------------------------
-- legajocategoria
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "legajocategoria" CASCADE;

DROP SEQUENCE IF EXISTS "legajocategoria_seq";

CREATE SEQUENCE "legajocategoria_seq";


CREATE TABLE "legajocategoria"
(
	"id" INTEGER  NOT NULL,
	"descripcion" VARCHAR(255)  NOT NULL,
	PRIMARY KEY ("id")
);

COMMENT ON TABLE "legajocategoria" IS '';


SET search_path TO public;
-----------------------------------------------------------------------------
-- legajopedagogico
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "legajopedagogico" CASCADE;

DROP SEQUENCE IF EXISTS "legajopedagogico_seq";

CREATE SEQUENCE "legajopedagogico_seq";


CREATE TABLE "legajopedagogico"
(
	"id" INTEGER  NOT NULL,
	"fk_alumno_id" INTEGER  NOT NULL,
	"titulo" VARCHAR(255)  NOT NULL,
	"resumen" BYTEA  NOT NULL,
	"texto" BYTEA  NOT NULL,
	"fecha" TIMESTAMP  NOT NULL,
	"fk_usuario_id" INTEGER  NOT NULL,
	"fk_legajocategoria_id" INTEGER  NOT NULL,
	PRIMARY KEY ("id")
);

COMMENT ON TABLE "legajopedagogico" IS '';


SET search_path TO public;
ALTER TABLE "legajopedagogico" ADD CONSTRAINT "legajopedagogico_FK_1" FOREIGN KEY ("fk_alumno_id") REFERENCES "alumno" ("id") INITIALLY DEFERRED ;

ALTER TABLE "legajopedagogico" ADD CONSTRAINT "legajopedagogico_FK_2" FOREIGN KEY ("fk_usuario_id") REFERENCES "usuario" ("id") INITIALLY DEFERRED ;

ALTER TABLE "legajopedagogico" ADD CONSTRAINT "legajopedagogico_FK_3" FOREIGN KEY ("fk_legajocategoria_id") REFERENCES "legajocategoria" ("id") INITIALLY DEFERRED ;

-----------------------------------------------------------------------------
-- adjunto
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "adjunto" CASCADE;

DROP SEQUENCE IF EXISTS "adjunto_seq";

CREATE SEQUENCE "adjunto_seq";


CREATE TABLE "adjunto"
(
	"id" INTEGER  NOT NULL,
	"descripcion" VARCHAR(255),
	"titulo" VARCHAR(255),
	"nombre_archivo" VARCHAR(255)  NOT NULL,
	"tipo_archivo" VARCHAR(64)  NOT NULL,
	"ruta" VARCHAR(255)  NOT NULL,
	"fecha" TIMESTAMP  NOT NULL,
	PRIMARY KEY ("id")
);

COMMENT ON TABLE "adjunto" IS '';


SET search_path TO public;
-----------------------------------------------------------------------------
-- legajoadjunto
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "legajoadjunto" CASCADE;

DROP SEQUENCE IF EXISTS "legajoadjunto_seq";

CREATE SEQUENCE "legajoadjunto_seq";


CREATE TABLE "legajoadjunto"
(
	"fk_legajopedagogico_id" INTEGER  NOT NULL,
	"fk_adjunto_id" INTEGER  NOT NULL,
	"id" INTEGER  NOT NULL,
	PRIMARY KEY ("id")
);

COMMENT ON TABLE "legajoadjunto" IS '';


SET search_path TO public;
ALTER TABLE "legajoadjunto" ADD CONSTRAINT "legajoadjunto_FK_1" FOREIGN KEY ("fk_legajopedagogico_id") REFERENCES "legajopedagogico" ("id") INITIALLY DEFERRED ;

ALTER TABLE "legajoadjunto" ADD CONSTRAINT "legajoadjunto_FK_2" FOREIGN KEY ("fk_adjunto_id") REFERENCES "adjunto" ("id") INITIALLY DEFERRED ;

-----------------------------------------------------------------------------
-- tipoasistencia
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "tipoasistencia" CASCADE;

DROP SEQUENCE IF EXISTS "tipoasistencia_seq";

CREATE SEQUENCE "tipoasistencia_seq";


CREATE TABLE "tipoasistencia"
(
	"id" INTEGER  NOT NULL,
	"nombre" VARCHAR(10)  NOT NULL,
	"descripcion" VARCHAR(255),
	"valor" DECIMAL(4,2) default 1 NOT NULL,
	"grupo" VARCHAR(30),
	"defecto" BOOLEAN default 'f' NOT NULL,
	PRIMARY KEY ("id")
);

COMMENT ON TABLE "tipoasistencia" IS '';


SET search_path TO public;
-----------------------------------------------------------------------------
-- asistencia
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "asistencia" CASCADE;

DROP SEQUENCE IF EXISTS "asistencia_seq";

CREATE SEQUENCE "asistencia_seq";


CREATE TABLE "asistencia"
(
	"id" INTEGER  NOT NULL,
	"fk_alumno_id" INTEGER  NOT NULL,
	"fk_tipoasistencia_id" INTEGER  NOT NULL,
	"fecha" TIMESTAMP  NOT NULL,
	PRIMARY KEY ("id")
);

COMMENT ON TABLE "asistencia" IS '';


SET search_path TO public;
ALTER TABLE "asistencia" ADD CONSTRAINT "asistencia_FK_1" FOREIGN KEY ("fk_alumno_id") REFERENCES "alumno" ("id") INITIALLY DEFERRED ;

ALTER TABLE "asistencia" ADD CONSTRAINT "asistencia_FK_2" FOREIGN KEY ("fk_tipoasistencia_id") REFERENCES "tipoasistencia" ("id") INITIALLY DEFERRED ;

-----------------------------------------------------------------------------
-- concepto
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "concepto" CASCADE;

DROP SEQUENCE IF EXISTS "concepto_seq";

CREATE SEQUENCE "concepto_seq";


CREATE TABLE "concepto"
(
	"id" INTEGER  NOT NULL,
	"fk_establecimiento_id" INTEGER default 0 NOT NULL,
	"nombre" VARCHAR(128)  NOT NULL,
	"descripcion" VARCHAR(255),
	PRIMARY KEY ("id")
);

COMMENT ON TABLE "concepto" IS '';


SET search_path TO public;
ALTER TABLE "concepto" ADD CONSTRAINT "concepto_FK_1" FOREIGN KEY ("fk_establecimiento_id") REFERENCES "establecimiento" ("id") INITIALLY DEFERRED ;

-----------------------------------------------------------------------------
-- escalanota
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "escalanota" CASCADE;

DROP SEQUENCE IF EXISTS "escalanota_seq";

CREATE SEQUENCE "escalanota_seq";


CREATE TABLE "escalanota"
(
	"id" INTEGER  NOT NULL,
	"fk_establecimiento_id" INTEGER default 0 NOT NULL,
	"nombre" VARCHAR(128)  NOT NULL,
	"descripcion" VARCHAR(255),
	"orden" INTEGER  NOT NULL,
	"aprobado" BOOLEAN default 'f' NOT NULL,
	PRIMARY KEY ("id")
);

COMMENT ON TABLE "escalanota" IS '';


SET search_path TO public;
ALTER TABLE "escalanota" ADD CONSTRAINT "escalanota_FK_1" FOREIGN KEY ("fk_establecimiento_id") REFERENCES "establecimiento" ("id") INITIALLY DEFERRED ;

-----------------------------------------------------------------------------
-- boletin_conceptual
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "boletin_conceptual" CASCADE;

DROP SEQUENCE IF EXISTS "boletin_conceptual_seq";

CREATE SEQUENCE "boletin_conceptual_seq";


CREATE TABLE "boletin_conceptual"
(
	"id" INTEGER  NOT NULL,
	"fk_escalanota_id" INTEGER,
	"fk_alumno_id" INTEGER default 0 NOT NULL,
	"fk_concepto_id" INTEGER default 0 NOT NULL,
	"fk_periodo_id" INTEGER default 0 NOT NULL,
	"observacion" BYTEA  NOT NULL,
	"fecha" TIMESTAMP  NOT NULL,
	PRIMARY KEY ("id")
);

COMMENT ON TABLE "boletin_conceptual" IS '';


SET search_path TO public;
ALTER TABLE "boletin_conceptual" ADD CONSTRAINT "boletin_conceptual_FK_1" FOREIGN KEY ("fk_escalanota_id") REFERENCES "escalanota" ("id") INITIALLY DEFERRED ;

ALTER TABLE "boletin_conceptual" ADD CONSTRAINT "boletin_conceptual_FK_2" FOREIGN KEY ("fk_alumno_id") REFERENCES "alumno" ("id") INITIALLY DEFERRED ;

ALTER TABLE "boletin_conceptual" ADD CONSTRAINT "boletin_conceptual_FK_3" FOREIGN KEY ("fk_concepto_id") REFERENCES "concepto" ("id") INITIALLY DEFERRED ;

ALTER TABLE "boletin_conceptual" ADD CONSTRAINT "boletin_conceptual_FK_4" FOREIGN KEY ("fk_periodo_id") REFERENCES "periodo" ("id") INITIALLY DEFERRED ;

-----------------------------------------------------------------------------
-- actividad
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "actividad" CASCADE;

DROP SEQUENCE IF EXISTS "actividad_seq";

CREATE SEQUENCE "actividad_seq";


CREATE TABLE "actividad"
(
	"id" INTEGER  NOT NULL,
	"fk_establecimiento_id" INTEGER default 0 NOT NULL,
	"nombre" VARCHAR(128)  NOT NULL,
	"descripcion" VARCHAR(255),
	PRIMARY KEY ("id")
);

COMMENT ON TABLE "actividad" IS '';


SET search_path TO public;
ALTER TABLE "actividad" ADD CONSTRAINT "actividad_FK_1" FOREIGN KEY ("fk_establecimiento_id") REFERENCES "establecimiento" ("id") INITIALLY DEFERRED ;

-----------------------------------------------------------------------------
-- boletin_actividades
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "boletin_actividades" CASCADE;

DROP SEQUENCE IF EXISTS "boletin_actividades_seq";

CREATE SEQUENCE "boletin_actividades_seq";


CREATE TABLE "boletin_actividades"
(
	"id" INTEGER  NOT NULL,
	"fk_escalanota_id" INTEGER,
	"fk_alumno_id" INTEGER default 0 NOT NULL,
	"fk_actividad_id" INTEGER default 0 NOT NULL,
	"fk_periodo_id" INTEGER default 0 NOT NULL,
	"observacion" BYTEA  NOT NULL,
	"fecha" TIMESTAMP  NOT NULL,
	PRIMARY KEY ("id")
);

COMMENT ON TABLE "boletin_actividades" IS '';


SET search_path TO public;
ALTER TABLE "boletin_actividades" ADD CONSTRAINT "boletin_actividades_FK_1" FOREIGN KEY ("fk_escalanota_id") REFERENCES "escalanota" ("id") INITIALLY DEFERRED ;

ALTER TABLE "boletin_actividades" ADD CONSTRAINT "boletin_actividades_FK_2" FOREIGN KEY ("fk_alumno_id") REFERENCES "alumno" ("id") INITIALLY DEFERRED ;

ALTER TABLE "boletin_actividades" ADD CONSTRAINT "boletin_actividades_FK_3" FOREIGN KEY ("fk_actividad_id") REFERENCES "actividad" ("id") INITIALLY DEFERRED ;

ALTER TABLE "boletin_actividades" ADD CONSTRAINT "boletin_actividades_FK_4" FOREIGN KEY ("fk_periodo_id") REFERENCES "periodo" ("id") INITIALLY DEFERRED ;

-----------------------------------------------------------------------------
-- examen
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "examen" CASCADE;

DROP SEQUENCE IF EXISTS "examen_seq";

CREATE SEQUENCE "examen_seq";


CREATE TABLE "examen"
(
	"id" INTEGER  NOT NULL,
	"fk_escalanota_id" INTEGER default 0 NOT NULL,
	"fk_alumno_id" INTEGER default 0 NOT NULL,
	"fk_actividad_id" INTEGER default 0 NOT NULL,
	"fk_periodo_id" INTEGER default 0 NOT NULL,
	"nombre" VARCHAR(255)  NOT NULL,
	"observacion" BYTEA  NOT NULL,
	"fecha" TIMESTAMP  NOT NULL,
	PRIMARY KEY ("id")
);

COMMENT ON TABLE "examen" IS '';


SET search_path TO public;
ALTER TABLE "examen" ADD CONSTRAINT "examen_FK_1" FOREIGN KEY ("fk_escalanota_id") REFERENCES "escalanota" ("id") INITIALLY DEFERRED ;

ALTER TABLE "examen" ADD CONSTRAINT "examen_FK_2" FOREIGN KEY ("fk_alumno_id") REFERENCES "alumno" ("id") INITIALLY DEFERRED ;

ALTER TABLE "examen" ADD CONSTRAINT "examen_FK_3" FOREIGN KEY ("fk_actividad_id") REFERENCES "actividad" ("id") INITIALLY DEFERRED ;

ALTER TABLE "examen" ADD CONSTRAINT "examen_FK_4" FOREIGN KEY ("fk_periodo_id") REFERENCES "periodo" ("id") INITIALLY DEFERRED ;

-----------------------------------------------------------------------------
-- anio
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "anio" CASCADE;

DROP SEQUENCE IF EXISTS "anio_seq";

CREATE SEQUENCE "anio_seq";


CREATE TABLE "anio"
(
	"id" INTEGER  NOT NULL,
	"fk_establecimiento_id" INTEGER default 0 NOT NULL,
	"descripcion" VARCHAR(255)  NOT NULL,
	"orden" INTEGER default 0,
	PRIMARY KEY ("id")
);

COMMENT ON TABLE "anio" IS '';


SET search_path TO public;
ALTER TABLE "anio" ADD CONSTRAINT "anio_FK_1" FOREIGN KEY ("fk_establecimiento_id") REFERENCES "establecimiento" ("id") INITIALLY DEFERRED ;

-----------------------------------------------------------------------------
-- division
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "division" CASCADE;

DROP SEQUENCE IF EXISTS "division_seq";

CREATE SEQUENCE "division_seq";


CREATE TABLE "division"
(
	"id" INTEGER  NOT NULL,
	"fk_anio_id" INTEGER default 0 NOT NULL,
	"descripcion" VARCHAR(255)  NOT NULL,
	"fk_turno_id" INTEGER default 0 NOT NULL,
	"fk_orientacion_id" INTEGER,
	"orden" INTEGER default 0,
	PRIMARY KEY ("id")
);

COMMENT ON TABLE "division" IS '';


SET search_path TO public;
ALTER TABLE "division" ADD CONSTRAINT "division_FK_1" FOREIGN KEY ("fk_anio_id") REFERENCES "anio" ("id") INITIALLY DEFERRED ;

ALTER TABLE "division" ADD CONSTRAINT "division_FK_2" FOREIGN KEY ("fk_turno_id") REFERENCES "turno" ("id") INITIALLY DEFERRED ;

ALTER TABLE "division" ADD CONSTRAINT "division_FK_3" FOREIGN KEY ("fk_orientacion_id") REFERENCES "orientacion" ("id") INITIALLY DEFERRED ;

-----------------------------------------------------------------------------
-- repeticion
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "repeticion" CASCADE;

DROP SEQUENCE IF EXISTS "repeticion_seq";

CREATE SEQUENCE "repeticion_seq";


CREATE TABLE "repeticion"
(
	"id" INTEGER  NOT NULL,
	"descripcion" VARCHAR(255)  NOT NULL,
	"orden" INTEGER default 0 NOT NULL,
	PRIMARY KEY ("id")
);

COMMENT ON TABLE "repeticion" IS '';


SET search_path TO public;
-----------------------------------------------------------------------------
-- rel_anio_actividad
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "rel_anio_actividad" CASCADE;

DROP SEQUENCE IF EXISTS "rel_anio_actividad_seq";

CREATE SEQUENCE "rel_anio_actividad_seq";


CREATE TABLE "rel_anio_actividad"
(
	"id" INTEGER  NOT NULL,
	"fk_anio_id" INTEGER default 0 NOT NULL,
	"fk_actividad_id" INTEGER default 0 NOT NULL,
	"fk_orientacion_id" INTEGER,
	"horas" DECIMAL(10,2) default 0 NOT NULL,
	PRIMARY KEY ("id")
);

COMMENT ON TABLE "rel_anio_actividad" IS '';


SET search_path TO public;
ALTER TABLE "rel_anio_actividad" ADD CONSTRAINT "rel_anio_actividad_FK_1" FOREIGN KEY ("fk_anio_id") REFERENCES "anio" ("id") INITIALLY DEFERRED ;

ALTER TABLE "rel_anio_actividad" ADD CONSTRAINT "rel_anio_actividad_FK_2" FOREIGN KEY ("fk_actividad_id") REFERENCES "actividad" ("id") INITIALLY DEFERRED ;

ALTER TABLE "rel_anio_actividad" ADD CONSTRAINT "rel_anio_actividad_FK_3" FOREIGN KEY ("fk_orientacion_id") REFERENCES "orientacion" ("id") INITIALLY DEFERRED ;

-----------------------------------------------------------------------------
-- rel_alumno_division
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "rel_alumno_division" CASCADE;

DROP SEQUENCE IF EXISTS "rel_alumno_division_seq";

CREATE SEQUENCE "rel_alumno_division_seq";


CREATE TABLE "rel_alumno_division"
(
	"id" INTEGER  NOT NULL,
	"fk_division_id" INTEGER default 0 NOT NULL,
	"fk_alumno_id" INTEGER default 0 NOT NULL,
	PRIMARY KEY ("id")
);

COMMENT ON TABLE "rel_alumno_division" IS '';


SET search_path TO public;
ALTER TABLE "rel_alumno_division" ADD CONSTRAINT "rel_alumno_division_FK_1" FOREIGN KEY ("fk_division_id") REFERENCES "division" ("id") INITIALLY DEFERRED ;

ALTER TABLE "rel_alumno_division" ADD CONSTRAINT "rel_alumno_division_FK_2" FOREIGN KEY ("fk_alumno_id") REFERENCES "alumno" ("id") INITIALLY DEFERRED ;

-----------------------------------------------------------------------------
-- docente
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "docente" CASCADE;

DROP SEQUENCE IF EXISTS "docente_seq";

CREATE SEQUENCE "docente_seq";


CREATE TABLE "docente"
(
	"id" INTEGER  NOT NULL,
	"apellido" VARCHAR(128)  NOT NULL,
	"nombre" VARCHAR(128)  NOT NULL,
	"sexo" CHAR(1)  NOT NULL,
	"fecha_nacimiento" TIMESTAMP  NOT NULL,
	"fk_tipodocumento_id" INTEGER default 0 NOT NULL,
	"nro_documento" VARCHAR(16)  NOT NULL,
	"lugar_nacimiento" VARCHAR(128),
	"direccion" VARCHAR(128),
	"ciudad" VARCHAR(128),
	"codigo_postal" VARCHAR(20),
	"email" VARCHAR(255),
	"telefono" VARCHAR(20),
	"telefono_movil" VARCHAR(20),
	"titulo" VARCHAR(128)  NOT NULL,
	"libreta_sanitaria" BOOLEAN default 'f',
	"psicofisico" BOOLEAN default 'f',
	"activo" BOOLEAN default 't',
	"fk_provincia_id" INTEGER default 0 NOT NULL,
	"fk_pais_id" INTEGER default 0 NOT NULL,
	PRIMARY KEY ("id")
);

COMMENT ON TABLE "docente" IS '';


SET search_path TO public;
ALTER TABLE "docente" ADD CONSTRAINT "docente_FK_1" FOREIGN KEY ("fk_tipodocumento_id") REFERENCES "tipodocumento" ("id") INITIALLY DEFERRED ;

ALTER TABLE "docente" ADD CONSTRAINT "docente_FK_2" FOREIGN KEY ("fk_provincia_id") REFERENCES "provincia" ("id") INITIALLY DEFERRED ;

ALTER TABLE "docente" ADD CONSTRAINT "docente_FK_3" FOREIGN KEY ("fk_pais_id") REFERENCES "pais" ("id") INITIALLY DEFERRED ;

-----------------------------------------------------------------------------
-- horarioescolartipo
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "horarioescolartipo" CASCADE;

DROP SEQUENCE IF EXISTS "horarioescolartipo_seq";

CREATE SEQUENCE "horarioescolartipo_seq";


CREATE TABLE "horarioescolartipo"
(
	"id" INTEGER  NOT NULL,
	"nombre" VARCHAR(128)  NOT NULL,
	"descripcion" VARCHAR(255),
	PRIMARY KEY ("id")
);

COMMENT ON TABLE "horarioescolartipo" IS '';


SET search_path TO public;
-----------------------------------------------------------------------------
-- evento
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "evento" CASCADE;

DROP SEQUENCE IF EXISTS "evento_seq";

CREATE SEQUENCE "evento_seq";


CREATE TABLE "evento"
(
	"id" INTEGER  NOT NULL,
	"titulo" VARCHAR(128)  NOT NULL,
	"fecha_inicio" TIMESTAMP  NOT NULL,
	"fecha_fin" TIMESTAMP  NOT NULL,
	"tipo" INTEGER default 0 NOT NULL,
	"frecuencia" INTEGER default 0 NOT NULL,
	"frecuencia_intervalo" INTEGER default 0 NOT NULL,
	"recurrencia_fin" VARCHAR(16),
	"recurrencia_dias" INTEGER default 0 NOT NULL,
	"estado" INTEGER default 0 NOT NULL,
	PRIMARY KEY ("id")
);

COMMENT ON TABLE "evento" IS '';


SET search_path TO public;
-----------------------------------------------------------------------------
-- rel_division_actividad_docente
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "rel_division_actividad_docente" CASCADE;

DROP SEQUENCE IF EXISTS "rel_division_actividad_doc_seq_2";

CREATE SEQUENCE "rel_division_actividad_doc_seq_2";


CREATE TABLE "rel_division_actividad_docente"
(
	"id" INTEGER  NOT NULL,
	"fk_division_id" INTEGER default 0,
	"fk_actividad_id" INTEGER default 0 NOT NULL,
	"fk_docente_id" INTEGER default 0,
	"fk_evento_id" INTEGER default 0,
	PRIMARY KEY ("id")
);

COMMENT ON TABLE "rel_division_actividad_docente" IS '';


SET search_path TO public;
ALTER TABLE "rel_division_actividad_docente" ADD CONSTRAINT "rel_division_actividad_doce_FK_1" FOREIGN KEY ("fk_division_id") REFERENCES "division" ("id") INITIALLY DEFERRED ;

ALTER TABLE "rel_division_actividad_docente" ADD CONSTRAINT "rel_division_actividad_doce_FK_2" FOREIGN KEY ("fk_actividad_id") REFERENCES "actividad" ("id") INITIALLY DEFERRED ;

ALTER TABLE "rel_division_actividad_docente" ADD CONSTRAINT "rel_division_actividad_doce_FK_3" FOREIGN KEY ("fk_docente_id") REFERENCES "docente" ("id") INITIALLY DEFERRED ;

ALTER TABLE "rel_division_actividad_docente" ADD CONSTRAINT "rel_division_actividad_doce_FK_4" FOREIGN KEY ("fk_evento_id") REFERENCES "evento" ("id") ON DELETE CASCADE INITIALLY DEFERRED ;

-----------------------------------------------------------------------------
-- rel_docente_establecimiento
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "rel_docente_establecimiento" CASCADE;

DROP SEQUENCE IF EXISTS "rel_docente_establecimiento_seq";

CREATE SEQUENCE "rel_docente_establecimiento_seq";


CREATE TABLE "rel_docente_establecimiento"
(
	"fk_establecimiento_id" INTEGER default 0 NOT NULL,
	"fk_docente_id" INTEGER default 0 NOT NULL,
	"id" INTEGER  NOT NULL,
	PRIMARY KEY ("id")
);

COMMENT ON TABLE "rel_docente_establecimiento" IS '';


SET search_path TO public;
ALTER TABLE "rel_docente_establecimiento" ADD CONSTRAINT "rel_docente_establecimiento_FK_1" FOREIGN KEY ("fk_establecimiento_id") REFERENCES "establecimiento" ("id") INITIALLY DEFERRED ;

ALTER TABLE "rel_docente_establecimiento" ADD CONSTRAINT "rel_docente_establecimiento_FK_2" FOREIGN KEY ("fk_docente_id") REFERENCES "docente" ("id") INITIALLY DEFERRED ;

-----------------------------------------------------------------------------
-- docente_horario
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "docente_horario" CASCADE;


CREATE TABLE "docente_horario"
(
	"fk_docente_id" INTEGER  NOT NULL,
	"fk_evento_id" INTEGER  NOT NULL,
	PRIMARY KEY ("fk_docente_id","fk_evento_id")
);

COMMENT ON TABLE "docente_horario" IS '';


SET search_path TO public;
ALTER TABLE "docente_horario" ADD CONSTRAINT "docente_horario_FK_1" FOREIGN KEY ("fk_docente_id") REFERENCES "docente" ("id") INITIALLY DEFERRED ;

ALTER TABLE "docente_horario" ADD CONSTRAINT "docente_horario_FK_2" FOREIGN KEY ("fk_evento_id") REFERENCES "evento" ("id") ON DELETE CASCADE INITIALLY DEFERRED ;

-----------------------------------------------------------------------------
-- feriado
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "feriado" CASCADE;

DROP SEQUENCE IF EXISTS "feriado_seq";

CREATE SEQUENCE "feriado_seq";


CREATE TABLE "feriado"
(
	"id" INTEGER  NOT NULL,
	"nombre" VARCHAR(128)  NOT NULL,
	"fecha" TIMESTAMP  NOT NULL,
	"repeticion_anual" BOOLEAN default 'f',
	"inamovible" BOOLEAN default 'f',
	"fk_ciclolectivo_id" INTEGER default 0 NOT NULL,
	PRIMARY KEY ("id")
);

COMMENT ON TABLE "feriado" IS '';


SET search_path TO public;
ALTER TABLE "feriado" ADD CONSTRAINT "feriado_FK_1" FOREIGN KEY ("fk_ciclolectivo_id") REFERENCES "ciclolectivo" ("id") INITIALLY DEFERRED ;

-----------------------------------------------------------------------------
-- horarioescolar
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "horarioescolar" CASCADE;

DROP SEQUENCE IF EXISTS "horarioescolar_seq";

CREATE SEQUENCE "horarioescolar_seq";


CREATE TABLE "horarioescolar"
(
	"id" INTEGER  NOT NULL,
	"nombre" VARCHAR(128)  NOT NULL,
	"descripcion" VARCHAR(255),
	"fk_evento_id" INTEGER,
	"fk_establecimiento_id" INTEGER default 0 NOT NULL,
	"fk_turno_id" INTEGER default 0 NOT NULL,
	"fk_horarioescolartipo_id" INTEGER default 0 NOT NULL,
	PRIMARY KEY ("id")
);

COMMENT ON TABLE "horarioescolar" IS '';


SET search_path TO public;
ALTER TABLE "horarioescolar" ADD CONSTRAINT "horarioescolar_FK_1" FOREIGN KEY ("fk_evento_id") REFERENCES "evento" ("id") ON DELETE CASCADE INITIALLY DEFERRED ;

ALTER TABLE "horarioescolar" ADD CONSTRAINT "horarioescolar_FK_2" FOREIGN KEY ("fk_establecimiento_id") REFERENCES "establecimiento" ("id") INITIALLY DEFERRED ;

ALTER TABLE "horarioescolar" ADD CONSTRAINT "horarioescolar_FK_3" FOREIGN KEY ("fk_turno_id") REFERENCES "turno" ("id") INITIALLY DEFERRED ;

ALTER TABLE "horarioescolar" ADD CONSTRAINT "horarioescolar_FK_4" FOREIGN KEY ("fk_horarioescolartipo_id") REFERENCES "horarioescolartipo" ("id") INITIALLY DEFERRED ;

-----------------------------------------------------------------------------
-- rel_rolresponsable_responsable
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "rel_rolresponsable_responsable" CASCADE;

DROP SEQUENCE IF EXISTS "rel_rolresponsable_respons_seq_3";

CREATE SEQUENCE "rel_rolresponsable_respons_seq_3";


CREATE TABLE "rel_rolresponsable_responsable"
(
	"id" INTEGER  NOT NULL,
	"fk_rolresponsable_id" INTEGER default 0 NOT NULL,
	"fk_responsable_id" INTEGER default 0 NOT NULL,
	"fk_alumno_id" INTEGER default 0 NOT NULL,
	"descripcion" VARCHAR(255),
	PRIMARY KEY ("id")
);

COMMENT ON TABLE "rel_rolresponsable_responsable" IS '';


SET search_path TO public;
ALTER TABLE "rel_rolresponsable_responsable" ADD CONSTRAINT "rel_rolresponsable_responsa_FK_1" FOREIGN KEY ("fk_rolresponsable_id") REFERENCES "rol_responsable" ("id") INITIALLY DEFERRED ;

ALTER TABLE "rel_rolresponsable_responsable" ADD CONSTRAINT "rel_rolresponsable_responsa_FK_2" FOREIGN KEY ("fk_responsable_id") REFERENCES "responsable" ("id") INITIALLY DEFERRED ;

ALTER TABLE "rel_rolresponsable_responsable" ADD CONSTRAINT "rel_rolresponsable_responsa_FK_3" FOREIGN KEY ("fk_alumno_id") REFERENCES "alumno" ("id") INITIALLY DEFERRED ;

-----------------------------------------------------------------------------
-- rel_anio_actividad_docente
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "rel_anio_actividad_docente" CASCADE;


CREATE TABLE "rel_anio_actividad_docente"
(
	"fk_anio_actividad_id" INTEGER  NOT NULL,
	"fk_docente_id" INTEGER  NOT NULL,
	PRIMARY KEY ("fk_anio_actividad_id","fk_docente_id")
);

COMMENT ON TABLE "rel_anio_actividad_docente" IS '';


SET search_path TO public;
ALTER TABLE "rel_anio_actividad_docente" ADD CONSTRAINT "rel_anio_actividad_docente_FK_1" FOREIGN KEY ("fk_anio_actividad_id") REFERENCES "rel_anio_actividad" ("id") INITIALLY DEFERRED ;

ALTER TABLE "rel_anio_actividad_docente" ADD CONSTRAINT "rel_anio_actividad_docente_FK_2" FOREIGN KEY ("fk_docente_id") REFERENCES "docente" ("id") INITIALLY DEFERRED ;

-----------------------------------------------------------------------------
-- tipoinforme
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "tipoinforme" CASCADE;

DROP SEQUENCE IF EXISTS "tipoinforme_seq";

CREATE SEQUENCE "tipoinforme_seq";


CREATE TABLE "tipoinforme"
(
	"id" INTEGER  NOT NULL,
	"nombre" VARCHAR(128)  NOT NULL,
	"descripcion" VARCHAR(255),
	PRIMARY KEY ("id")
);

COMMENT ON TABLE "tipoinforme" IS '';


SET search_path TO public;
-----------------------------------------------------------------------------
-- informe
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "informe" CASCADE;

DROP SEQUENCE IF EXISTS "informe_seq";

CREATE SEQUENCE "informe_seq";


CREATE TABLE "informe"
(
	"id" INTEGER  NOT NULL,
	"nombre" VARCHAR(128)  NOT NULL,
	"descripcion" VARCHAR(255),
	"fk_adjunto_id" INTEGER  NOT NULL,
	"fk_tipoinforme_id" INTEGER  NOT NULL,
	"listado" BOOLEAN default 'f' NOT NULL,
	"variables" VARCHAR(128),
	PRIMARY KEY ("id")
);

COMMENT ON TABLE "informe" IS '';


SET search_path TO public;
ALTER TABLE "informe" ADD CONSTRAINT "informe_FK_1" FOREIGN KEY ("fk_adjunto_id") REFERENCES "adjunto" ("id") INITIALLY DEFERRED ;

ALTER TABLE "informe" ADD CONSTRAINT "informe_FK_2" FOREIGN KEY ("fk_tipoinforme_id") REFERENCES "tipoinforme" ("id") INITIALLY DEFERRED ;
