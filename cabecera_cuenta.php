<?php

$usuario_id = $_SESSION['id_admin'];
$consulta_usuario = "SELECT nombres, apellidos FROM administrador WHERE id_administrador = ?";
$stmt_usuario = mysqli_prepare($conexion, $consulta_usuario);
mysqli_stmt_bind_param($stmt_usuario, "i", $usuario_id);
mysqli_stmt_execute($stmt_usuario);
$resultado_usuario = mysqli_stmt_get_result($stmt_usuario);

if ($row_usuario = mysqli_fetch_assoc($resultado_usuario)) {
    $nombres = $row_usuario['nombres'];
    $apellidos = $row_usuario['apellidos'];
} else {
    header("Location: login.php");
    exit();
}

?>