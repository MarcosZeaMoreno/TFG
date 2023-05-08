#!/bin/bash

USERDB="debianDB"
PASSDB="debianDB"
HOST=$(hostname -I)
DATOS="Datos.sql"
BBDD="gestor_notas"

if [ $# = 2 ];
then
   USERDB=$1
   PASSDB=$2
fi

cp -r ../Codigo/ /var/www/html
mysqladmin -u $USERDB -p$USERDB create $BBDD
mysql -u $USERDB -p$USERDB $BBDD < ../DataBase/$DATOS

echo "http://$HOST/Codigo/index.php"