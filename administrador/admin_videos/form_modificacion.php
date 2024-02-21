<?php
// Procesar el formulario de modificación
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['nombre_video_modificar'])) {
    // Recoger los datos del formulario
    $nombre_video_modificar = $_POST["nombre_video_modificar"];
    $direccion_url_modificar = $_POST["direccion_url_modificar"];
    $id_modificar = $_POST["id_modificar"];
    

    // Consulta SQL para modificar el registro
    $consulta_modificar = "UPDATE videos SET nombre_video = ?, direccion_url = ? WHERE id_videos = ?";
    $stmt_modificar = mysqli_prepare($conexion, $consulta_modificar);
    mysqli_stmt_bind_param($stmt_modificar, "ssi", $nombre_video_modificar, $direccion_url_modificar, $id_modificar);
    $resultado_modificar = mysqli_stmt_execute($stmt_modificar);

    // if ($resultado_modificar) {
    //     echo "El registro se modificó correctamente.";
    // } else {
    //     echo "Error al modificar el registro: " . mysqli_error($conexion);
    // }
}
?>