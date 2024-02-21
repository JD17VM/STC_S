<?php

include("../conexion_bd.php");



// Volver a realizar la consulta después de eliminar o agregar un nuevo registro
$puesto_trabajo_director = 'director';
$consulta_usuario = "SELECT id_trabajador, puesto_trabajo, nombre_servidor_publico, profesion, correo_electronico, telefono, descripcion, enlace_foto FROM trabajadores WHERE puesto_trabajo = ?";
$stmt_usuario = mysqli_prepare($conexion, $consulta_usuario);
mysqli_stmt_bind_param($stmt_usuario, "s", $puesto_trabajo_director);
mysqli_stmt_execute($stmt_usuario);
$resultado_director = mysqli_stmt_get_result($stmt_usuario);


$puesto_trabajo_psicologo = 'psicologo';
$consulta_usuario = "SELECT id_trabajador, puesto_trabajo, nombre_servidor_publico, profesion, correo_electronico, telefono, descripcion, enlace_foto FROM trabajadores WHERE puesto_trabajo = ?";
$stmt_usuario = mysqli_prepare($conexion, $consulta_usuario);
mysqli_stmt_bind_param($stmt_usuario, "s", $puesto_trabajo_psicologo);
mysqli_stmt_execute($stmt_usuario);
$resultado_psicologo = mysqli_stmt_get_result($stmt_usuario);


$puesto_trabajo_trabajador = 'trabajador';
$consulta_usuario = "SELECT id_trabajador, puesto_trabajo, nombre_servidor_publico, profesion, correo_electronico, telefono, descripcion, enlace_foto FROM trabajadores WHERE puesto_trabajo = ?";
$stmt_usuario = mysqli_prepare($conexion, $consulta_usuario);
mysqli_stmt_bind_param($stmt_usuario, "s", $puesto_trabajo_trabajador);
mysqli_stmt_execute($stmt_usuario);
$resultado_trabajador = mysqli_stmt_get_result($stmt_usuario);

mysqli_close($conexion);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <?php
        $ruta_base_estilos = "../";
        include("../nav_footer/contenido_head.php");
  ?>
  <link rel="stylesheet" href="../assets_completo/css/estilos_navegador_footer_usuario.css">
  <link rel="stylesheet" href="../assets_completo/css/estilos_login.css">
  <link rel="stylesheet" href="../assets_completo/css/estilos_navegador_footer_usuario.css">
  <link rel="stylesheet" href="../assets_completo/css/estilos_directorio_institucional.css">
  <title>Página de inicio</title>

</head>
<body>

    <?php
        $ruta_base="";
        $ruta_login="../";
        include("../nav_footer/navegador_usuario.php");
    ?>

<div class="contenedor_servicios">
        <div class="cabecera_nuestros_servicios"></div>

        <div class="lista_directores">
            <h2>DIRECTOR DEL CENTRO DE SALUD MENTAL</h2>
            <?php while ($row_chat = mysqli_fetch_assoc($resultado_director)) : ?>
            <div class="contenedor_trabajador">
                <div class="contenedor_imagen_trabajador">
                  <?php echo "<img src='../administrador/admin_directorio/imagenes/{$row_chat['enlace_foto']}' width='50'>"; ?>
                </div>
                <div class="contenedor_informacion_trabajador">
                    <h4><?php echo $row_chat['nombre_servidor_publico']; ?></h4>
                    <p><?php echo $row_chat['profesion']; ?></p>
                    <p><?php echo $row_chat['correo_electronico']; ?></p>
                    <p><?php echo $row_chat['telefono']; ?></p>
                    <hr>
                    <p><?php echo $row_chat['descripcion']; ?></p>
                </div>
            </div>
            <?php endwhile; ?>

        </div>

        <div class="lista_directores">
            <h2>PSICOLOGOS</h2>
            <?php while ($row_chat = mysqli_fetch_assoc($resultado_psicologo)) : ?>
            <div class="contenedor_trabajador">
                <div class="contenedor_imagen_trabajador">
                <?php echo "<img src='../administrador/admin_directorio/imagenes/{$row_chat['enlace_foto']}' width='50'>"; ?>
                </div>
                <div class="contenedor_informacion_trabajador">
                    <h4><?php echo $row_chat['nombre_servidor_publico']; ?></h4>
                    <p><?php echo $row_chat['profesion']; ?></p>
                    <p><?php echo $row_chat['correo_electronico']; ?></p>
                    <p><?php echo $row_chat['telefono']; ?></p>
                    <hr>
                    <p><?php echo $row_chat['descripcion']; ?></p>
                </div>
            </div>
            <?php endwhile; ?>

        </div>


        <div class="lista_directores">
            <h2>TRABAJADORES-SOCIALES</h2>
            <?php while ($row_chat = mysqli_fetch_assoc($resultado_trabajador)) : ?>
            <div class="contenedor_trabajador">
                <div class="contenedor_imagen_trabajador">
                <?php echo "<img src='../administrador/admin_directorio/imagenes/{$row_chat['enlace_foto']}' width='50'>"; ?>
                </div>
                <div class="contenedor_informacion_trabajador">
                    <h4><?php echo $row_chat['nombre_servidor_publico']; ?></h4>
                    <p><?php echo $row_chat['profesion']; ?></p>
                    <p><?php echo $row_chat['correo_electronico']; ?></p>
                    <p><?php echo $row_chat['telefono']; ?></p>
                    <hr>
                    <p><?php echo $row_chat['descripcion']; ?></p>
                </div>
            </div>
            <?php endwhile; ?>

        </div>

</div>



    <?php
        $ruta_base_libro ="";
        include("../nav_footer/footer_usuario.php");
  ?>
</body>
</html>
