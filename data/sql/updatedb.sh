#!/bin/bash

DB="$1"
if [ "$DB"  = "" ]; then
    clear
    echo "Uso: $0 <database> "
    exit 0
fi

mysqladmin drop $DB
mysqladmin create $DB
mysql $DB < schema.sql
mysql $DB < datos_ejemplo.sql
echo "DB Actualizada!"
