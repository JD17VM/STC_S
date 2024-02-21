<?php



// Procesar el formulario de agregar
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['agregar'])) {
    // Recoger los datos del formulario
    $archivo = $_FILES['archivo']['name'];
    if(isset($archivo) && $archivo != "") {
        $tipo = $_FILES['archivo']['type'];
        $temp = $_FILES['archivo']['tmp_name'];
    }else {
        $_SESSION['mensaje'] = 'Por favor, selecciona una documento';
    }
    $nombre_documento = $_POST["nombre_documento"];
    $extension = " ";
    // $archivo = "hola";
    $id_administrador = $_SESSION['id_admin'];
    // Consulta SQL para agregar el nuevo registro
    $consulta_agregar = "INSERT INTO documentos (nombre_documento, enlace_documento, extension, id_administrador, fecha_agregado) VALUES (?, ?, ?, ?, NOW())";
    $stmt_agregar = mysqli_prepare($conexion, $consulta_agregar);
    mysqli_stmt_bind_param($stmt_agregar, "ssss", $nombre_documento, $archivo, $extension, $id_administrador);
    $resultado_agregar = mysqli_stmt_execute($stmt_agregar);
  
    if ($resultado_agregar) {
        // echo "El nuevo trabajador se agregó correctamente.";
        move_uploaded_file($_FILES['archivo']['tmp_name'], 'archivos/'.$archivo);
    } else {
        // echo "Error al agregar el nuevo trabajador: " . mysqli_error($conexion);
    }
  }
    

?>