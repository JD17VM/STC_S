<?php
session_start();

if (!isset($_SESSION['id_admin'])) {
    header("Location: ../../login.php");
    exit();
}

include("../../conexion_bd.php");

include("../../cabecera_cuenta.php");

$consulta_documentos = "SELECT COUNT(*) AS cantidad_documentos FROM documentos";
$resultado_documentos = mysqli_query($conexion, $consulta_documentos);
$row_documentos = mysqli_fetch_assoc($resultado_documentos);
$cantidad_documentos = $row_documentos['cantidad_documentos'];

$consulta_trabajadores = "SELECT COUNT(*) AS cantidad_trabajadores FROM trabajadores";
$resultado_trabajadores = mysqli_query($conexion, $consulta_trabajadores);
$row_trabajadores = mysqli_fetch_assoc($resultado_trabajadores);
$cantidad_trabajadores = $row_trabajadores['cantidad_trabajadores'];

$consulta_videos = "SELECT COUNT(*) AS cantidad_videos FROM videos";
$resultado_videos = mysqli_query($conexion, $consulta_videos);
$row_videos = mysqli_fetch_assoc($resultado_videos);
$cantidad_videos = $row_videos['cantidad_videos'];

$consulta_libro_reclamaciones = "SELECT COUNT(*) AS cantidad_libro_reclamaciones FROM libro_de_reclamaciones";
$resultado_libro_reclamaciones = mysqli_query($conexion, $consulta_libro_reclamaciones);
$row_libro_reclamaciones = mysqli_fetch_assoc($resultado_libro_reclamaciones);
$cantidad_libro_reclamaciones = $row_libro_reclamaciones['cantidad_libro_reclamaciones'];

mysqli_close($conexion);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://necolas.github.io/normalize.css/8.0.1/normalize.css">
    <link rel="stylesheet" href="../../assets_completo/css/reset.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet" href="../../assets_completo/css/estilos_iconos.css">
    <link rel="stylesheet" href="../../assets_completo/css/estilos.css">
    <link rel="stylesheet" href="../../assets_completo/css/estilos_navegador.css">

    <link rel="stylesheet" href="../../assets_completo/css/estilos_principal.css">
    <title>Document</title>
</head>
<body>
    <div class="navegador_izquierda">
        <div class="logo_salud_1"></div>
        <div class="contenedor_enlaces_navegador">
            <button class="botones_navegador" id="boton_navegador_inicio">
                <span class="material-symbols-outlined">home</span>
                <p>Inicio</p>
            </button>

            <button class="botones_navegador" id="boton_navegador_directorio">
                <span class="material-symbols-outlined">person</span>
                <p>Directorio</p>
            </button>

            <button class="botones_navegador" id="boton_navegador_videos">
                <span class="material-symbols-outlined">play_circle</span>
                <p>Videos</p>
            </button>

            <button class="botones_navegador" id="boton_navegador_documentos">
                <span class="material-symbols-outlined">description</span>
                <p>Documentos</p>
            </button>

            <button class="botones_navegador" id="boton_navegador_libro_reclamaciones">
                <span class="material-symbols-outlined">menu_book</span>
                <p>Libro de reclamaciones</p>
            </button>
        </div>
        <button class="botones_navegador" id="boton_cerrar_sesion">
            <span class="material-symbols-outlined">logout</span>
            <p>Cerrar Sesión</p>
        </button>
    </div>

    <div class="contenido">
        <div class="cabecera_inicio">
            <h1>CENTRO DE SALUD MENTAL<br> COMUNITARIO-TAYACATA</h1>
            <div class="logo_salud_2"></div>
        </div>
        <div class="resto_contenido">
            <div class="contenedor_datos">
                <div class="contenedor_contador_datos">
                    <div>
                        <span class="material-symbols-outlined">person</span>
                        <p><?php echo $cantidad_trabajadores; ?></p>
                    </div>
                    <h3>DIRECTORIO</h3>
                </div>
            </div>
            <div class="contenedor_datos">
                <div class="contenedor_contador_datos">
                    <div>
                        <span class="material-symbols-outlined">menu_book</span>
                        <p><?php echo $cantidad_documentos; ?></p>
                    </div>
                    <h3>DOCUMENTOS</h3>
                </div>
            </div>
            <div class="contenedor_datos">
                <div class="contenedor_contador_datos">
                    <div>
                        <span class="material-symbols-outlined">play_circle</span>
                        <p><?php echo $cantidad_videos; ?></p>
                    </div>
                    <h3>VIDEOS</h3>
                </div>
            </div>
            <div class="contenedor_datos">
                <div class="contenedor_contador_datos">
                    <div>
                        <span class="material-symbols-outlined">person_book</span>
                        <p><?php echo $cantidad_libro_reclamaciones; ?></p>
                    </div>
                    <h3>LIBRO DE RECLAMACIONES</h3>
                </div>
            </div>
        </div>
    </div>

    
    <script src="../../assets_completo/js/script.js"></script>
</body>
</html>