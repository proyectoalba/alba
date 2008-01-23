#!/bin/bash

CONFIGURACIONDB="../../config/databases.yml"
SCHEMA="lib.model.schema.sql"
EJEMPLO="datos_desde_cero.sql"
DSNARCHIVO=`cat ../../config/databases.yml | grep dsn: | tr -d " "`
DSN=${DSNARCHIVO#dsn:*}

#DSN="mysql://root:master@localhost/alba"

DSNs=${DSN#mysql://*}
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

ENCODING="--default-character-set=utf8"

mysqladmin --force -u $USER $OPTION  -h $SERVER drop $DB
mysqladmin $ENCODING  --force -u $USER $OPTION  -h $SERVER create $DB
mysql $ENCODING -u $USER $OPTION  -h $SERVER $DB < $SCHEMA
mysql $ENCODING -u $USER $OPTION  -h $SERVER $DB < $EJEMPLO
echo "DB Actualizada!"
