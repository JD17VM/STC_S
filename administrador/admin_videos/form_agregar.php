<?php

// Procesar el formulario de agregar
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['agregar'])) {
    // Recoger los datos del formulario
    
    $nombre_video = $_POST["nombre_video"];
    $direccion_url = $_POST["direccion_url"];
    // $archivo = "hola";
    $id_administrador = $_SESSION['id_admin'];
    // Consulta SQL para agregar el nuevo registro
    $consulta_agregar = "INSERT INTO videos (nombre_video, direccion_url, id_administrador, fecha_agregado) VALUES (?, ?, ?, NOW())";
    $stmt_agregar = mysqli_prepare($conexion, $consulta_agregar);
    mysqli_stmt_bind_param($stmt_agregar, "sss", $nombre_video, $direccion_url, $id_administrador);
    $resultado_agregar = mysqli_stmt_execute($stmt_agregar);
  
    // if ($resultado_agregar) {
    //     echo "El nuevo trabajador se agregó correctamente.";
    // } else {
    //     echo "Error al agregar el nuevo trabajador: " . mysqli_error($conexion);
    // }
  }
    

?>