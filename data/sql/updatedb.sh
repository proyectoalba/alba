#!/bin/bash

CONFIGURACIONDB="../../config/databases.yml"
SCHEMA="ib.model.schema.sql"
EJEMPLO="datos_ejemplo.sql"
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

mysqladmin --force -u $USER -p$PASS -h $SERVER drop $DB
mysqladmin --force -u $USER -p$PASS -h $SERVER create $DB
mysql -u $USER -p$PASS -h $SERVER $DB < $SCHEMA
mysql -u $USER -p$PASS -h $SERVER $DB < $EJEMPLO
echo "DB Actualizada!"
