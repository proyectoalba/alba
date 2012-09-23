#!/bin/bash

config="../../config/databases.yml"
dbname=`grep dsn $config |awk '{print $2}' |cut -d: -f2 |cut -d";" -f1|cut -d"=" -f2 |tail -n1`
host=`grep dsn $config |awk '{print $2}' |cut -d: -f2 |cut -d";" -f2|cut -d"=" -f2 |tail -n1`
port=`grep dsn $config |awk '{print $2}' |cut -d: -f2 |cut -d";" -f3|cut -d"=" -f2 |tail -n1`
DB_USER=`grep username $config |awk '{print $2}' |tail -n1`
DB_PASSWORD=`grep password $config |awk '{print $2}' |tail -n1`

php_bin=`which php`
mysqldump_bin=`which mysqldump`
dot_bin=`which dot`

tmp_dump=`tempfile`

if [ ! -x $php_bin ]; then
  echo "No se encuentra el ejecutable: $php_bin - instalar php5-cli"
  exit 1
fi
if [ ! -x $mysqldump_bin ]; then
  echo "No se encuentra el ejecutable: $mysqldump_bin - instalar mysql-client"
  exit 1
fi
if [ ! -x $dot_bin ]; then
  echo "No se encuentra el ejecutable: $dot_bin - instalar graphviz"
  exit 1
fi
echo "+ DUMP la base"
$mysqldump_bin -h $host -u $DB_USER --password=$DB_PASSWORD $dbname > $tmp_dump
echo "+ Generando DOT"
$php_bin mysqlviz -f $tmp_dump > "$dbname.dot"
echo "+ Exportando a PNG"
$dot_bin -Tpng "$dbname.dot" > "$dbname.png"
echo "+ limpiando archivos temporales"
rm $tmp_dump
rm "$dbname.dot"
echo "+ finalizado"