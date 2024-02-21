<?php
// Procesar el formulario de modificación
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id_modificar'])) {
    // Recoger los datos del formulario
    $id_modificar = $_POST["id_modificar"];
    $puesto_trabajo = $_POST["puesto_trabajo_modificar"];
    $nombres_mod = $_POST["nombres_modificar"];
    $profesion = $_POST["apellidos_modificar"];
    $correo_electronico = $_POST["correo_electronico_modificar"];
    $telefono = $_POST["telefono_modificar"];
    $descripcion = $_POST["descripcion_modificar"];

    // Verificar si se seleccionó una nueva imagen
    if (isset($_FILES['imagen_modificar']) && $_FILES['imagen_modificar']['error'] !== UPLOAD_ERR_NO_FILE) {
        // Recoger los datos de la nueva imagen
        $foto_modificar = $_FILES['imagen_modificar']['name'];
        $tipo = $_FILES['imagen_modificar']['type'];
        $temp = $_FILES['imagen_modificar']['tmp_name'];

        // Consulta SQL para modificar el registro con la nueva imagen
        $consulta_modificar = "UPDATE trabajadores SET puesto_trabajo = ?, nombre_servidor_publico = ?, profesion = ?, correo_electronico = ?, telefono = ?, descripcion = ?, enlace_foto = ? WHERE id_trabajador = ?";
        $stmt_modificar = mysqli_prepare($conexion, $consulta_modificar);
        mysqli_stmt_bind_param($stmt_modificar, "sssssssi", $puesto_trabajo, $nombres_mod, $profesion, $correo_electronico, $telefono, $descripcion, $foto_modificar, $id_modificar);

        // Mover la nueva imagen al directorio de imágenes
        move_uploaded_file($temp, 'imagenes/'.$foto_modificar);

    } else {
        // Consulta SQL para modificar el registro sin cambiar la imagen
        $consulta_modificar = "UPDATE trabajadores SET puesto_trabajo = ?, nombre_servidor_publico = ?, profesion = ?, correo_electronico = ?, telefono = ?, descripcion = ? WHERE id_trabajador = ?";
        $stmt_modificar = mysqli_prepare($conexion, $consulta_modificar);
        mysqli_stmt_bind_param($stmt_modificar, "ssssssi", $puesto_trabajo, $nombres_mod, $profesion, $correo_electronico, $telefono, $descripcion, $id_modificar);
    }

    // Ejecutar la consulta de modificación
    $resultado_modificar = mysqli_stmt_execute($stmt_modificar);

    // if ($resultado_modificar) {
    //     echo "El registro se modificó correctamente.";
    // } else {
    //     echo "Error al modificar el registro: " . mysqli_error($conexion);
    // }
}
?>
