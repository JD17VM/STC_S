<?php



// Procesar el formulario de agregar
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['agregar'])) {
    // Recoger los datos del formulario
    $foto = $_FILES['imagen']['name'];
    if(isset($foto) && $foto != "") {
        $tipo = $_FILES['imagen']['type'];
        $temp = $_FILES['imagen']['tmp_name'];
    }else {
        $_SESSION['mensaje'] = 'Por favor, selecciona una imagen';
    }
    $puesto_trabajo = $_POST["puesto_trabajo"];
    $nombre_servidor_publico = $_POST["nombres"];
    $profesion = $_POST["apellidos"];
    $correo_electronico = $_POST["correo_electronico"];
    $telefono = $_POST["telefono"];
    $descripcion = $_POST["descripcion"];
    // $foto = "hola";
    $id_administrador = $_SESSION['id_admin'];
    // Consulta SQL para agregar el nuevo registro
    $consulta_agregar = "INSERT INTO trabajadores (puesto_trabajo, nombre_servidor_publico, profesion, correo_electronico, telefono, descripcion, enlace_foto, id_administrador) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt_agregar = mysqli_prepare($conexion, $consulta_agregar);
    mysqli_stmt_bind_param($stmt_agregar, "ssssssss", $puesto_trabajo, $nombre_servidor_publico, $profesion, $correo_electronico, $telefono, $descripcion, $foto, $id_administrador);
    $resultado_agregar = mysqli_stmt_execute($stmt_agregar);
  
    if ($resultado_agregar) {
        // echo "El nuevo trabajador se agregó correctamente.";
        move_uploaded_file($_FILES['imagen']['tmp_name'], 'imagenes/'.$foto);
    } else {
        // echo "Error al agregar el nuevo trabajador: " . mysqli_error($conexion);
    }
  }
    

?>