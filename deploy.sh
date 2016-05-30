#!/bin/bash
echo '---------------------------------------------------------------------'
echo 'Script para hacer despliegue de nueva version al ambiente produccion'
echo '---------------------------------------------------------------------'
###################################################################
#Como usar y sintaxis: 
#user@system:$ sh deploy.sh <nombre_archivo.zip>
# autor: matias.tokar@gmail.com
# fecha creacion: 2013-05-13 22:40
##################################################################
# archivo generador de despligue 

# incluye:
# - realizar backup de codigo actual
# - realizar backup del estado de la base de datos actual
# - mover directorios a un nuevo directorio con nombre <@deprecated_AAAMMDD>
# - descomprimir archivo de despliegue
# - resta actualizar la base de datos al modelo de datos de la nueva version (se realiza manualmente)

###################################################################
if [ $1 ]; then 	
FILE=$1
if [ -f $FILE ]; then

#DIA=$(date | awk '{print $3}')

#MES=$(date | awk '{print $2}')
DIA_SEMANA=$(date | awk '{print $1}')
#HHMM=$(date '+%H.%M')
TIME=$(date +%k%M)
DAY=`/bin/date +%Y%m%d`
TIMESTAMP=$(date)

NOMBREARCHIVO="@deprecated_"$DAY"_"$TIME
#detener servidor web
sh /etc/init.d/apache2 stop

sh /root/scripts/generar_backup.sh

mkdir "/var/www/policlinica/"$NOMBREARCHIVO
echo "Directorio" $NOMBREARCHIVO "creado."

mv apps/ htdocs/ lib/ views/ "/var/www/policlinica/"$NOMBREARCHIVO
echo "Directorios /apps/ htdocs/ lib/ views/ movidos a "$NOMBREARCHIVO

echo "Decomprimir archivo de despliegue."
unzip $1
# dar permiso de escritura a directorios
chmod -R 777 lib/ var/
echo "Otorgar permisos de escritura a directorios /lib /var."

# copiar archivo que al generarlos con /localhost/Config/ModelImport
cp /var/www/policlinica/lib/Models/Pago.php /var/www/policlinica/lib/Models/pago.php
cp /var/www/policlinica/lib/Models/PagoTable.php /var/www/policlinica/lib/Models/pagoTable.php
# habilitar servidor web
sh /etc/init.d/apache2 start
echo "PENDIENTE: se podria hacer request a /localhost/Config/ModelImport para generar modelos."
exit

else
echo ERROR: el fichero $FILE no existe.
exit
fi
	echo $1
else
	echo "user@system:$ sh deploy.sh <archivo.zip>"
	exit 1
fi	

