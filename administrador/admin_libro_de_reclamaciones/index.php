<?php
session_start();

if (!isset($_SESSION['id_admin'])) {
    header("Location: ../../login.php");
    exit();
}

include("../../conexion_bd.php");

include("../../cabecera_cuenta.php");


include("form_eliminar.php");

// Volver a realizar la consulta después de eliminar o agregar un nuevo registro

$consulta_usuario = "SELECT id_libro_de_reclamaciones, nombres, apellidos, domicilio, telefono, correo_electronico, descripcion_reclamo, fecha_agregada FROM libro_de_reclamaciones";
$stmt_usuario = mysqli_prepare($conexion, $consulta_usuario);
mysqli_stmt_execute($stmt_usuario);
$resultado_director = mysqli_stmt_get_result($stmt_usuario);

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

    <link rel="stylesheet" href="../../assets_completo/css/estilos_directorio.css">
    <link rel="stylesheet" href="../../assets_completo/css/estilos_libro_reclamaciones.css">
  <title>Página de inicio</title>
  <script>
    function llenarCampoID(id) {
      document.getElementById("id").value = id;
      mostrarFormEliminar()
    }

    function llenarTextoReclamacion(id, nombres, apellidos, domicilio, telefono, correo, descripcion) {
        console.log("LLENADO CORRECTO")
      document.getElementById("nombres_mostrar").innerHTML = nombres;
      document.getElementById("apellidos_mostrar").innerHTML= apellidos;
      document.getElementById("domicilio_mostrar").innerHTML = domicilio;
      document.getElementById("telefono_mostrar").innerHTML = telefono;
      document.getElementById("correo_electronico_mostrar").innerHTML = correo;
      document.getElementById("descripcion_reclamo_mostrar").innerHTML= descripcion;
      console.log("LLENADO CORRECTO")
      mostrarReclamo();
    }

  </script>
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
        <div class="cabecera_contenido">
            <h1>LIBRO DE RECLAMACIONES</h1>
            <div class="logo_salud_2"></div>
        </div>

<!-- wwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwww -->
<div class="contenedor_tabla">
            <table>
                <tr>
                    <th colspan="7" class="cabecera_tabla">LISTA RECLAMACIONES</th>
                </tr>

                <?php while ($row_chat = mysqli_fetch_assoc($resultado_director)) : ?>
                <tr>
                  <td><?php echo $row_chat['id_libro_de_reclamaciones']; ?></td>
                  <td><?php echo $row_chat['nombres']; ?></td>
                  <td><?php echo $row_chat['apellidos']; ?></td>
                  <td><div class="botones_modificacion_tabla">
                    <button class="boton_normal" onclick="llenarTextoReclamacion(
                        '<?php echo $row_chat['id_libro_de_reclamaciones']; ?>',
                        '<?php echo $row_chat['nombres']; ?>',
                        '<?php echo $row_chat['apellidos']; ?>',
                        '<?php echo $row_chat['domicilio']; ?>',
                        '<?php echo $row_chat['telefono']; ?>',
                        '<?php echo $row_chat['correo_electronico']; ?>',
                        '<?php echo $row_chat['descripcion_reclamo']; ?>'
                    )">Ver</button>
                    <button class="boton_normal" onclick="llenarCampoID(<?php echo $row_chat['id_libro_de_reclamaciones']; ?>)">Eliminar</button>
                  </div></td>
                </tr>
                <?php endwhile; ?>

              </table>
        </div>
        </div>       

<!-- wwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwww -->

<div class="contenedor_form_eliminar superpuesto" id="sup_eliminar">
        <div class="pregunta_2_opciones ">
            <div class="cabecera_pregunta">
                <h2>¿Estás seguro de que deseas eliminar?</h2>
            </div>
            <form action="index.php" method="post">
            <input type="text" name="id" id="id" style="display:none">
                <div class="cuerpo_pregunta">
                    
                    <button class="boton_normal" type="submit" value="Eliminar">
                        <p>SI</p>
                    </button>
                    <button class="boton_normal" type="button" onclick="ocultarFormEliminar()">
                        <p>NO</p>
                    </button>
                </div>
            </form>
        </div>
    </div>

    <div class="reclamo_conten superpuesto" id="sup_reclamo"">
        <div class="contenedor_reclamo">
            <div class="cabecera_reclamo">
                <h1>RECLAMO</h1>
                <button onclick="ocultarReclamo()"><span class="material-symbols-outlined">cancel</span></button>
            </div>
            <div class="el_reclamo"><p>Nombre y Apellidos:
                <span id="nombres_mostrar"> Juan García Perez</span>
                <span id="apellidos_mostrar"> Juan García Perez</span>
            </p></div>
            <div class="el_reclamo"><p>Domicilio:
                <span id="domicilio_mostrar">Av. Perú-Huancayo</span>
            </p></div>
            <div class="el_reclamo"><p>Teléfono:
                <span id="telefono_mostrar"> 959955344</span>
            </p></div>
            <div class="el_reclamo"><p>Correo Eléctrónico: 
                <span id="correo_electronico_mostrar"> 959955344</span>
            </p></div>
            <div class="el_reclamo_descripcion">
                <p>Descripción Reclamo:
                <span id="descripcion_reclamo_mostrar">Lorem ipsum dolor sit amet consectetur adipisicing elit. Maiores iste aperiam veritatis tenetur excepturi nesciunt animi? Commodi perspiciatis delectus adipisci doloremque aspernatur fugit dolore, facilis aliquid quidem tempora voluptate iste, omnis eligendi molestias numquam quo possimus laudantium explicabo impedit sed dolorem reprehenderit suscipit veniam! Ipsam deleniti quidem sequi blanditiis eum.s</span></p>
            </div>
        </div>
    </div>
  <!-- <a href="acceso/logout.php">Cerrar sesión</a> -->

  <script src="../../assets_completo/js/script.js"></script>
    <script src="../../assets_completo/js/script_admin_directorio.js"></script>
</body>
</html>
