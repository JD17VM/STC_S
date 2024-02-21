<?php


include("../conexion_bd.php");


// Volver a realizar la consulta después de eliminar o agregar un nuevo registro

$consulta_usuario = "SELECT id_videos, nombre_video, direccion_url FROM videos";
$stmt_usuario = mysqli_prepare($conexion, $consulta_usuario);
mysqli_stmt_execute($stmt_usuario);
$resultado_director = mysqli_stmt_get_result($stmt_usuario);


$puesto_trabajo_director = 'director';
$consulta_usuario = "SELECT id_trabajador, puesto_trabajo, nombre_servidor_publico, profesion, correo_electronico, telefono, descripcion, enlace_foto FROM trabajadores WHERE puesto_trabajo = ?";
$stmt_usuario = mysqli_prepare($conexion, $consulta_usuario);
mysqli_stmt_bind_param($stmt_usuario, "s", $puesto_trabajo_director);
mysqli_stmt_execute($stmt_usuario);
$resultado_director_d = mysqli_stmt_get_result($stmt_usuario);

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
  <link rel="stylesheet" href="../assets_completo/css/estilos_inicio.css">
  <title>Página de inicio</title>
  <script>
    function insertarVideo(youtubeLink) {
            const videoID = obtenerIDYouTube(youtubeLink);
            if (videoID) {
                const iframeSrc = `https://www.youtube.com/embed/${videoID}?si=-vor97hIAxhUsWAo`;
                videoContainer_texto = `<iframe width="100%" height="auto" src="${iframeSrc}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>`;
            } else {
                // alert('Por favor, ingrese un enlace de YouTube válido.');
            }

            function obtenerIDYouTube(url) {
            const regExp = /^.*(youtu\.be\/|v\/|u\/\w\/|embed\/|watch\?v=|\&v=)([^#\&\?]*).*/;
            const match = url.match(regExp);
            if (match && match[2].length === 11) {
                return match[2];
            } else {
                return null;
            }
            }

            return videoContainer_texto
        }
   </script>
</head>
<body>

    <?php
        $ruta_base="";
        $ruta_login="../";
        include("../nav_footer/navegador_usuario.php");
    ?>

    <div class="inspira_salud_mental">
        <a href="#"class="boton_comunicar_whatsapp">
            <div><img src="https://upload.wikimedia.org/wikipedia/commons/5/5e/WhatsApp_icon.png" alt=""></IMG></div>
            <p>PIDE TU CITA YA!!</p>
        </a>
    </div>

    <?php while ($row_chat = mysqli_fetch_assoc($resultado_director_d)): ?>
    <div class="mensaje_centro">
        <div class="texto_centro">
            <div class="contenedor_centrado">
                <h1>CENTRO DE SALUD MENTAL COMUNITARIO</h1>
                <p>
                    “Los Centros de Salud Mental Comunitario ofrecen atención ambulatoria especializada a usuarios con trastornos mentales o problemas psicosociales graves o complejos.
                    Cuentan con profesionales multidisciplinarios como médicos psiquiatras, psicólogos, enfermeros, trabajadores sociales, tecnólogos médicos y técnicos en enfermería.”
                </p>
                <a href="#">Leer má<s class=""></s></a>

                <a href="libro_de_reclamaciones.php"class="boton_comunicar_whatsapp">
                    <div><img src="https://w7.pngwing.com/pngs/263/582/png-transparent-open-book-book-icon-open-book-light-fixture-furniture-comic-book.png" alt=""></IMG></div>
                    <p>Libro de Reclamaciones</p>
                </a>
            </div> 
        </div>
        <div class="director_centro">
            <div class="foto_director_centro"><?php echo "<img src='../administrador/admin_directorio/imagenes/{$row_chat['enlace_foto']}' width='50'>"; ?></div>
            <p>Director(a) <br><?php echo $row_chat['nombre_servidor_publico']; ?></p>
        </div>
    </div>
    <?php endwhile; ?>

    <div class="nuestros_servicios">
        <h1>NUESTROS SERVICIOS</h1>
        <div class="espacio_secciones_nuestros_servicios">
            
            <div class="seccion_nuestras_secciones">
                <div class="imagen"><img src="../assets_completo/img/servicios/imagen_servicio_1.png" alt=""></div>
                <p>SERVICIO DE PREVENCION Y CONTROL DE PROBLEMAS Y TRANSTORNOS DE LA INFANCIA Y LA ADOLESCENCIA</p>
                <a href="servicios.php#servicio_1">Leer más...</a>
            </div>
            <div class="seccion_nuestras_secciones">
                <div class="imagen"><img src="../assets_completo/img/servicios/imagen_servicio_2.png" alt=""></div>
                <p>SERVICIO DE PREVENCION Y CONTROL DE PROBLEMAS Y TRANSTORNOS DE LA INFANCIA Y LA ADOLESCENCIA</p>
                <a href="servicios.php#servicio_2">Leer más...</a>
            </div>
            <div class="seccion_nuestras_secciones">
                <div class="imagen"><img src="../assets_completo/img/servicios/imagen_servicio_3.png" alt=""></div>
                <p>SERVICIO DE PREVENCION Y CONTROL DE PROBLEMAS Y TRANSTORNOS DE LA INFANCIA Y LA ADOLESCENCIA</p>
                <a href="servicios.php#servicio_3">Leer más...</a>
            </div>
            <div class="seccion_nuestras_secciones">
                <div class="imagen"><img src="../assets_completo/img/servicios/imagen_servicio_4.png" alt=""></div>
                <p>SERVICIO DE PREVENCION Y CONTROL DE PROBLEMAS Y TRANSTORNOS DE LA INFANCIA Y LA ADOLESCENCIA</p>
                <a href="servicios.php#servicio_4">Leer más...</a>
            </div>
            <div class="seccion_nuestras_secciones">
                <div class="imagen"><img src="../assets_completo/img/servicios/imagen_servicio_5.png" alt=""></div>
                <p>SERVICIO DE PREVENCION Y CONTROL DE PROBLEMAS Y TRANSTORNOS DE LA INFANCIA Y LA ADOLESCENCIA</p>
                <a href="servicios.php#servicio_5">Leer más...</a>
            </div>
        </div>
    </div>


    <div class="contenedor_slider">
            <div class="boton_slide cont_boton_prev"><span class="material-symbols-outlined">arrow_back_ios</span></div>
            <div class="contenedor_secciones_videos">

            <?php while ($row_chat = mysqli_fetch_assoc($resultado_director)) : ?>
                <div class="seccion_video">
                    <div class="imagen_video">
                        <script>
                        document.write(insertarVideo("<?php echo $row_chat['direccion_url']; ?>"));
                    </script>
                    </div>
                    <p><?php echo $row_chat['nombre_video']; ?></p>
                    <a href="<?php echo $row_chat['direccion_url']; ?>" target="_blank">VER VIDEO</a>
                </div>
                <?php endwhile; ?>
                
            </div>
            <div class="boton_slide cont_boton_next"><span class="material-symbols-outlined">arrow_forward_ios</span></div>
      </div>

      
  <?php
        $ruta_base_libro ="";
        include("../nav_footer/footer_usuario.php");
  ?>

   <script src="../assets_completo/js/script_inicio.js"></script>
   
                
</body>
</html>
