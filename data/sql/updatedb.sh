#!/bin/bash

CONFIGURACIONDB="../../config/databases.yml"
SCHEMA="lib.model.schema.sql"
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

USERANDPASS=${DSNs%@*}
USER=${USERANDPASS%:*}
PASS=${USERANDPASS#*:}
SERVERANDDB=${DSNs#*@}
SERVER=${SERVERANDDB%/*}
DB=${SERVERANDDB#*/}

#if [ $# != 1 ]; then
#    clear
#    echo "Uso: $0 <dsn>, Ejemplo: $0 mysql://user:pass@server/base"
#    exit 0
#fi

if [ $USER != $PASS ]; then 
    OPTION="-p$PASS"
fi


if [ $DBSERVER == "mysql" ]; then
    ENCODING="--default-character-set=utf8"
    mysqladmin --force -u $USER -p$PASS -h $SERVER drop $DB
    mysqladmin $ENCODING --force -u $USER -p$PASS -h $SERVER create $DB
    mysql $ENCODING -u $USER -p$PASS -h $SERVER $DB < $SCHEMA
    mysql $ENCODING -u $USER -p$PASS -h $SERVER $DB < $EJEMPLO
fi

if [ $DBSERVER == "pgsql" ]; then
    dropdb $DB -U $USER
    createdb $DB -U $USER
    psql $DB -U $USER < $SCHEMA
    #psql $DB -U $USER < $EJEMPLO
    ../../symfony alba-load-data principal data/fixtures/datos_desde_cero.yml
fi

