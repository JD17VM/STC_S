<?php

include("../conexion_bd.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['agregar'])) {
    // Recoger los datos del formulario
    $nombres = $_POST["nombres"];
    $apellidos = $_POST["apellidos"];
    $domicilio = $_POST["domicilio"];
    $telefono = $_POST["telefono"];
    $correo_electronico = $_POST["correo_electronico"];
    $descripcion_reclamo = $_POST["descripcion_reclamo"];

    $id_administrador = 2;
    // Consulta SQL para agregar el nuevo registro
    $consulta_agregar = "INSERT INTO libro_de_reclamaciones (nombres, apellidos, domicilio, telefono, correo_electronico, descripcion_reclamo, id_administrador,fecha_agregada) VALUES (?, ?, ?, ?, ?, ?, ?, NOW())";
    $stmt_agregar = mysqli_prepare($conexion, $consulta_agregar);
    mysqli_stmt_bind_param($stmt_agregar, "sssssss",  $nombres, $apellidos, $domicilio, $telefono, $correo_electronico, $descripcion_reclamo, $id_administrador);
    $resultado_agregar = mysqli_stmt_execute($stmt_agregar);
  

  }
    

mysqli_close($conexion);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Página de inicio</title>

  <?php
        $ruta_base_estilos = "../";
        include("../nav_footer/contenido_head.php");
  ?>
  <link rel="stylesheet" href="../assets_completo/css/estilos_navegador_footer_usuario.css">
  <link rel="stylesheet" href="../assets_completo/css/estilos_llenar_libro_reclamaciones.css">
</head>
<body>

<?php
        $ruta_base="";
        $ruta_login="../";
        include("../nav_footer/navegador_usuario.php");
    ?>

<div class="contenedor_llenar_libro_reclamaciones_completo">
        <form action="libro_de_reclamaciones.php" method="post" >
            <h1>LIBRO DE RECLAMACIONES</h1>
            <p>Registre su reclamo aquí</p>
            <div class="contenedor_formulario_doble">
                <div class="campo_texto_form_libro_reclamaciones">
                    <label for="nombres">NOMBRES:</label>
                    <input type="text" name="nombres" id="nombres">
                </div>
                <div class="campo_texto_form_libro_reclamaciones">
                    <label for="apellidos">Apellidos:</label>
                    <input type="text" name="apellidos" id="apellidos">
                </div>
            </div>
            <div class="contenedor_formulario_doble">
                <div class="campo_texto_form_libro_reclamaciones">
                    <label for="domicilio">Domicilio:</label>
                    <input type="text" name="domicilio" id="domicilio">
                </div>
                <div class="campo_texto_form_libro_reclamaciones">
                    <label for="telefono">Teléfono:</label>
                    <input type="text" name="telefono" id="telefono">
                </div>
            </div>
            <div class="campo_texto_form_libro_reclamaciones">
                <label for="correo_electronico">Correo Electronico:</label>
                <input type="email" name="correo_electronico" id="correo_electronico">
            </div>

            <div class="campo_texto_form_libro_reclamaciones">
                <label for="descripcion_reclamo">Descripción Reclamo:</label>
                <input type="text" name="descripcion_reclamo" id="descripcion_reclamo">
            </div>
            <input type="submit" name="agregar" value="ENVIAR">
          </form> 
    </div>

    <?php
        $ruta_base_libro ="";
        include("../nav_footer/footer_usuario.php");
  ?>


</body>
</html>
