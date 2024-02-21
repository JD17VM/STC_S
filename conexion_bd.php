<?php
  // Conectarse a la base de datos
  $conexion = mysqli_connect("localhost", "root", "", "salud_tc");

  // Verificar la conexión
  if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
  }
?>