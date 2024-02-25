<?php
  // Conectarse a la base de datos
  $servername = "localhost";  // Reemplaza con el nombre del servidor de tu base de datos
  $username = "c2081645_salud_t";       // Reemplaza con tu nombre de usuario de la base de datos
  $password = "xbeze24siPAx";           // Reemplaza con tu contraseña de la base de datos
  $database = "c2081645_salud_t"; // Reemplaza con el nombre de tu base de datos

  // $conexion = new mysqli($servername, $username, $password, $database);
  $conexion = mysqli_connect("localhost", "root", "", "salud_tc");

  // Verificar la conexión
  if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
  }
?>


  
