# halfegg 0.0.2
Login/logout

Este sistema de login / logout no tiene registro todavia

Sera necesario crear la base de datos y al menos un usuario en la base de  datos. Las credenciales para conectar con la base de datos se encuentran en dos archivos:

archivo config.php

 Nombre de base de  datos

define('NAMBDAT','/* NOMBRE DE TU BASE DE DATOS*/');

 Host de la base de datos
 
define('HOSBDAT','/* HOST (localhost en la mayoria de los casos)*/');

archivo class-mod-db.php

linea 13 - usuario y contraseña de la base de datos

$dbh = new PDO($dsn, '/*usuario*/','/*contraseña*/'); // user & pasword


