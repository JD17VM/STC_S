<?php
// Procesar el formulario de modificación
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['nombre_documento_modificar'])) {
    // Recoger los datos del formulario

    $nombre_documento_modificar = $_POST["nombre_documento_modificar"];
    $id_modificar = $_POST["id_modificar"];


    if (isset($_FILES['archivo_modificar']) && $_FILES['archivo_modificar']['error'] !== UPLOAD_ERR_NO_FILE) {
        $foto_modificar = $_FILES['archivo_modificar']['name'];
        $tipo = $_FILES['archivo_modificar']['type'];
        $temp = $_FILES['archivo_modificar']['tmp_name'];
        
        // Generar un nombre de archivo único basado en la marca de tiempo actual
        $foto_modificar = time() . '_' . $foto_modificar;
    
        $consulta_modificar = "UPDATE documentos SET enlace_documento = ?, nombre_documento = ? WHERE id_documento = ?";
        $stmt_modificar = mysqli_prepare($conexion, $consulta_modificar);
        mysqli_stmt_bind_param($stmt_modificar, "ssi", $foto_modificar, $nombre_documento_modificar, $id_modificar);
        
        move_uploaded_file($_FILES['archivo_modificar']['tmp_name'], 'archivos/'.$foto_modificar);
    } else {
        $consulta_modificar = "UPDATE documentos SET nombre_documento = ? WHERE id_documento = ?";
        $stmt_modificar = mysqli_prepare($conexion, $consulta_modificar);
        mysqli_stmt_bind_param($stmt_modificar, "si", $nombre_documento_modificar, $id_modificar);
    }
    
    
    // Consulta SQL para modificar el registro
    
    $resultado_modificar = mysqli_stmt_execute($stmt_modificar);


    // if ($resultado_modificar) {
    //     echo "El registro se modificó correctamente.";
    // } else {
    //     echo "Error al modificar el registro: " . mysqli_error($conexion);
    // }

    
}
?>