
<?php

/* Puede modificar las entradas de una tabla existente actualizando la tabla. 

Con la solicitud de actualización, todas las entradas del campo email, que aquí es ionos.es, se cambian por mail@example.com.*/


$server= "dbXX.1und1.es"; /* Dirección del servidor de bases de datos de IONOS */
$user= "xxxxxx"; /* Nombre de usuario de la base de datos */
$contrasena= "yyyyyyy"; /* Contraseña */
$basededatos= "dbxxxxxx"; /* Nombre de la base de datos */
$tabla= "test"; /* Nombre de la tabla de su elección */

/* Acceso al servidor SQL y creación de una tabla */
if ((!$link = mysqli_connect($server, $user, $contrasena, $basededatos))) 
  die(printf("<H3>No se puede conectar a la base de datos: [%d] %s</H3>", mysqli_connect_errno(), mysqli_connect_error())); 

if (!mysqli_query($link, "UPDATE " . $tabla 
	  . " SET email = 'mail@example.com' WHERE INSTR(LCASE(email), 'ionos.es')")) 
  die(printf("<H3>No se puede actualizar la base de datos: [%d] %s</H3>", mysqli_connect_errno(), mysqli_connect_error())); 

$cantidad = mysqli_affected_rows($link); 
printf("Se han actualizado " . $cantidad . " conjuntos de datos<BR />");

mysqli_close($link);
?>