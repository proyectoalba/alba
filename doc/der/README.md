# make_der.sh #

Este script genera el DER desde la base de datos actual, toma 
los datos de conexión de config/databases.yml y genera el dot
para graphviz con mysqlviz[1].

Uso:

    ./make_der.sh

[1] http://code.google.com/p/mysqlviz/