<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Formulario de registro</title>
</head>
<body>
  <form action="registro.php" method="post">
    <label for="nombres">Nombres:</label>
    <input type="text" name="nombres" id="nombres">
    <br>
    <label for="apellidos">Apellidos:</label>
    <input type="text" name="apellidos" id="apellidos">
    <br>
    <label for="correo_electronico">Correo electrónico:</label>
    <input type="email" name="correo_electronico" id="correo_electronico">
    <br>
    <label for="password">Contraseña:</label>
    <input type="password" name="password" id="password">
    <br>
    <input type="submit" value="Registrar">
  </form>
</body>
</html>


<?php
  include("../conexion_bd.php");

  // Verificar si se ha enviado el formulario
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recoger los datos del formulario
    $nombres = $_POST["nombres"];
    $apellidos = $_POST["apellidos"];
    $correo_electronico = $_POST["correo_electronico"];
    $password = $_POST["password"]; // Hash de la contraseña

    // Insertar los datos en la base de datos utilizando sentencia preparada
    $consulta = "INSERT INTO administrador (nombres, apellidos, correo_electronico, password, fecha_registro) VALUES (?, ?, ?, ?, NOW())";

    // Preparar la consulta
    $stmt = mysqli_prepare($conexion, $consulta);

    // Vincular parámetros
    mysqli_stmt_bind_param($stmt, "ssss", $nombres, $apellidos, $correo_electronico, $password);

    // Ejecutar la consulta
    $resultado = mysqli_stmt_execute($stmt);

    // Verificar si la consulta se realizó correctamente
    if ($resultado) {
      // El registro se realizó correctamente
      echo "El registro se realizó correctamente.";
    } else {
      // Se produjo un error al realizar el registro
      echo "Error al realizar el registro: " . mysqli_error($conexion);
    }

    // Cerrar la conexión a la base de datos
    mysqli_close($conexion);
  }
?>
