<?php
  // Conectarse a la base de datos
  $servername = "localhost";  
  $username = "c2081645_salud_t";       
  $password = "beze24siPA";           
  $database = "c2081645_salud_t"; 

  $conexion = new mysqli($servername, $username, $password, $database);
  // $conexion = mysqli_connect("localhost", "root", "", "salud_tc");

  // Verificar la conexión
  if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
  }
?>


  
