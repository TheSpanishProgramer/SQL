<?php
$server= "dbXX.1und1.es"; /* Dirección del servidor de bases de datos de IONOS */
$user= "xxxxxx"; /* Nombre de la base de datos */
$contrasena= "yyyyyyy"; /* Contraseña */
$basededatos= "dbxxxxxx"; /* Nombre de la base de datos */
$tabla= "test"; /* Nombre de la tabla de su elección */

/* Acceso al servidor SQL y creación de la tabla */
if ((!$link = mysqli_connect($server, $user, $contrasena, $basededatos))) 
  die(printf("<H3>No se pudo conectar la base de datos: [%d] %s</H3>", mysqli_connect_errno(), mysqli_connect_error())); 

$cantidad = 0; 
/* Introducir valores */ 
if (!mysqli_query($link, "INSERT INTO " . $tabla . " VALUES('Juana Pérez','juana@perez.es', 1)")) 
 die(printf("<H3>El conjunto de datos 1 no puede ser introducido: [%d] %s</H3>", mysqli_connect_errno(), mysqli_connect_error())); 
$cantidad += mysqli_affected_rows($link); 
if (!mysqli_query($link, "INSERT INTO " . $tabla . " VALUES('Paco Pérez','paco@perez.es', 2)")) 
 die(printf("<H3>El conjunto de datos 2 no puede ser introducido: [%d] %s</H3>", mysqli_connect_errno(), mysqli_connect_error())); 
$cantidad += mysqli_affected_rows($link); 
if (!mysqli_query($link, "INSERT INTO " . $tanla . " VALUES('Fulano Detal','fulano@detal.es', 3)")) 
 die(printf("<H3>El conjunto de datos 3 no puede ser introducido: [%d] %s</H3>", mysqli_connect_errno(), mysqli_connect_error())); 
$cantidad += mysqli_affected_rows($link); 
if (!mysqli_query($link, "INSERT INTO " . $tabla . " VALUES('united.domain','info@united.domain', 4)")) 
 die(printf("<H3>El conjunto de datos 4 no puede ser introducido: [%d] %s</H3>", mysqli_connect_errno(), mysqli_connect_error())); 
$cantidad += mysqli_affected_rows($link); 
if (!mysqli_query($link, "INSERT INTO " . $tabla . " VALUES('IONOS','soporte@hosting.1und1.es', 5)")) 
  die(printf("<H3>El conjunto de datos 5 no puede ser introducido: [%d] %s</H3>", mysqli_connect_errno(), mysqli_connect_error())); 
$cantidad += mysqli_affected_rows($link); 

/* Mostrar la cantidad de valores introducidos */ 
printf("Se han introducido " . $cantidad . " conjunto de datos<BR />");

mysqli_close($link);
?>