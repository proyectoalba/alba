#!/bin/bash

CONFIGURACIONDB="../../config/databases.yml"
EJEMPLO="datos_ejemplo.sql"
DSNARCHIVO=`cat $CONFIGURACIONDB | grep dsn: | tr -d " "`
DSN=${DSNARCHIVO#dsn:*}
DSNs=${DSN#mysql://*}

if [ $DSN == $DSNs ]; then
    DBSERVER="pgsql"
    DSNs=${DSN#pgsql://*}
else
    DBSERVER="mysql"    
fi

SCHEMA="lib.model.schema.sql"
USERANDPASS=${DSNs%@*}
USER=${USERANDPASS%:*}
PASS=${USERANDPASS#*:}
SERVERANDDB=${DSNs#*@}
SERVER=${SERVERANDDB%/*}
DB=${SERVERANDDB#*/}

DOSPUNTOS=`expr index "$USERANDPASS" :`
OPTION=""
if [ $DOSPUNTOS != 0 ]; then 
    OPTION="-p$PASS"
fi

if [ $DBSERVER == "mysql" ]; then
    ENCODING="--default-character-set=utf8"
    mysqladmin --force -u $USER $OPTION -h $SERVER drop $DB
    mysqladmin $ENCODING --force -u $USER $OPTION -h $SERVER create $DB
    mysql $ENCODING -u $USER $OPTION -h $SERVER $DB < $SCHEMA
    mysql $ENCODING -u $USER $OPTION -h $SERVER $DB < $EJEMPLO
fi

if [ $DBSERVER == "pgsql" ]; then
    dropdb $DB -U $USER
    createdb $DB -U $USER
    psql $DB -U $USER < $SCHEMA
    psql $DB -U $USER < $EJEMPLO
#    ../../symfony alba-load-data principal data/fixtures/datos_desde_cero.yml
fi

