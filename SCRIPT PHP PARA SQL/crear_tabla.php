<?php
$server= "dbXX.1und1.es"; /* Dirección del servidor de bases de datos de IONOS */
$user= "xxxxxx"; /* Nombre de usuario de la base de datos */
$contrasena= "yyyyyyy"; /* Contraseña */
$basededatos= "dbxxxxxx"; /* Nombre de la base de datos */
$tabla= "test"; /* Nombre de la tabla de su elección */

/* Acceso al servidor SQL y creación de la tabla */
if ((!$link = mysqli_connect($server, $user, $contrasena, $basededatos))) 
  die(printf("<H3>No se puede conectar a la base de datos: [%d] %s</H3>", mysqli_connect_errno(), mysqli_connect_error())); 

if (!mysqli_query($link, "CREATE TABLE " . $tabla . "(name varchar(25),email varchar(25),id int(11))")) 
  die(printf("<H3>No se puede crear la tabla: [%d] %s</H3>", mysqli_connect_errno(), mysqli_connect_error()));

mysqli_close($link);
?>