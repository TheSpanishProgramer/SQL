<?php
$server= "dbXX.1und1.es"; /* Dirección del sevidor de bases de datos de IONOS */
$user= "xxxxxx"; /* Nombre del usuario de la base de datos */
$contrasena= "yyyyyyy"; /* Contraseña */
$basededatos= "dbxxxxxx"; /* Nombre de la base de datos */
$tabla= "test"; /* Nombre de la tabla de su elección */

/* Acceso al servidor SQL y creación de la tabla */
if ((!$link = mysqli_connect($server, $user, $contrasena, $basededatos))) 
  die(printf("<H3>No se ha conectado la base de datos: [%d] %s</H3>", mysqli_connect_errno(), mysqli_connect_error())); 

$result=mysqli_query($link, "SELECT * FROM " . $tabla . " ORDER BY name"); 
$row_cnt = mysqli_num_rows($result); 
printf("Se han encontrado " . $row_cnt . " conjuntos de datos<BR />"); 

/* Ver la tabla en formato HTML */ 
echo "<table><tr>"; 

while ($field = mysqli_fetch_field($result)) { 
  echo "<th>$field->name</th>"; 
} 
$field_cnt = mysqli_field_count($link); 
echo "</tr>"; 
while($row = mysqli_fetch_row($result)) { 
  echo "<tr>"; 
  for($i = 0; $i < $field_cnt; $i++) { 
	echo "<td>$row[$i]</td>"; 
  } 
  echo "</tr>\n"; 
} 
echo "</table>"; 

/* close result set */ 
mysqli_free_result($result);
mysqli_close($link);
?>