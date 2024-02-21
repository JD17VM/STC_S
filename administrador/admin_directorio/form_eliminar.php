<?php

// Procesar el formulario de eliminación
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    // Recoger el ID del formulario
    $id = $_POST["id"];

    // Consulta SQL para eliminar el registro
    $consulta_eliminar = "DELETE FROM trabajadores WHERE id_trabajador = ?";
    $stmt_eliminar = mysqli_prepare($conexion, $consulta_eliminar);
    mysqli_stmt_bind_param($stmt_eliminar, "i", $id);
    $resultado_eliminar = mysqli_stmt_execute($stmt_eliminar);

    if ($resultado_eliminar) {
        // echo "El registro se eliminó correctamente.";
    } else {
        // echo "Error al eliminar el registro: " . mysqli_error($conexion);
    }
}

?>