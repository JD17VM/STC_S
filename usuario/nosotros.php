<?php


include("../conexion_bd.php");


// Volver a realizar la consulta después de eliminar o agregar un nuevo registro

$consulta_usuario = "SELECT id_videos, nombre_video, direccion_url FROM videos";
$stmt_usuario = mysqli_prepare($conexion, $consulta_usuario);
mysqli_stmt_execute($stmt_usuario);
$resultado_director = mysqli_stmt_get_result($stmt_usuario);

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
  <link rel="stylesheet" href="../assets_completo/css/estilos_nosotros.css">
  <title>Página de inicio</title>
</head>
<body>

    <?php
        $ruta_base="";
        $ruta_login="../";
        include("../nav_footer/navegador_usuario.php");
    ?>

    <div class="contenedor_informacion_general">
        <div class="informacion_general">
            <div class="titulo_informacion_general">
                <h1>INFORMACIÓN GENERAL</h1>
            </div>
            <div class="contenedor_texto_foto">
                <div class="contenedor_texto">
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Autem numquam iste tenetur dolore dolores ipsum quia nulla sapiente porro. Debitis sapiente magni, reiciendis porro reprehenderit voluptatibus omnis suscipit delectus provident perferendis dolorum ipsam quas maiores perspiciatis exercitationem nam accusantium, doloremque voluptas aut. Neque adipisci, veniam tempora velit reiciendis necessitatibus a. Lorem ipsum dolor sit amet consectetur adipisicing elit. Dignissimos nobis odit enim placeat quasi hic eum iste porro! Ab, sed.</p>
                </div>
                <div class="contenedor_foto">
                    <div class="cont_imagen"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="contenedor_nuestra_mision">
        <div class="contenedor_titulo_nuestra_mision">
            <h2>NUESTRA MISIÓN Y VISIÓN</h2>
        </div>
        <div class="contenedor_triple">
            <div class="cont_vision">
                <h3>VISIÓN</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquid recusandae tempore molestiae facilis dignissimos vel perferendis, accusamus temporibus aut sed.</p>
            </div>
            <div class="cont_imagen_medio">
                
            </div>
            <div class="cont_vision">
                <h3>MISIÓN</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquid recusandae tempore molestiae facilis dignissimos vel perferendis, accusamus temporibus aut sed.</p>
            </div>
        </div>
    </div>


    <div class="contenedor_documentos_de_gestion">
        <div class="contenedor_titulo_documentos">
            <h2>DOCUMENTOS DE GESTIÓN</h2>
        </div>
        <div class="contenedor_documentos"></div>
    </div>

    <?php
        $ruta_base_libro ="";
        include("../nav_footer/footer_usuario.php");
  ?>
</body>
</html>
