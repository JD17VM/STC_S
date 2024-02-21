<?php
session_start();

if (!isset($_SESSION['id_admin'])) {
  header("Location: ../../login.php");
  exit();
}

include("../../conexion_bd.php");

include("../../cabecera_cuenta.php");


include("form_agregar.php");
include("form_eliminar.php");
include("form_modificacion.php");

// Volver a realizar la consulta después de eliminar o agregar un nuevo registro

$consulta_usuario = "SELECT id_documento, nombre_documento, enlace_documento, extension,fecha_agregado FROM documentos";
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
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
  <link rel="stylesheet" href="../../assets_completo/css/estilos_iconos.css">
  <link rel="stylesheet" href="../../assets_completo/css/estilos.css">
  <link rel="stylesheet" href="../../assets_completo/css/estilos_navegador.css">

  <link rel="stylesheet" href="../../assets_completo/css/estilos_directorio.css">
  <link rel="stylesheet" href="../../assets_completo/css/estilos_documentos.css">
  <title>Página de inicio</title>
  <script>
    function llenarCampoID(id) {
      document.getElementById("id").value = id;
      mostrarFormEliminar();
    }

    function llenarFormularioModificar(id, nombre, enlace) {
      document.getElementById("id_modificar").value = id;
      document.getElementById("nombre_documento_modificar").value = nombre;
      // document.getElementById("archivo_modificar").value = enlace;
      if (enlace) {
        var fileInput = document.getElementById("archivo_modificar");
        fileInput.value = ""; // Borra el valor actual del campo de archivo
        fileInput.parentNode.innerHTML += '<input type="hidden" name="archivo_existente" value="' + enlace + '">'; // Agrega un campo oculto con el nombre del archivo existente
    }
      
      mostrarFormModificar();
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
            <!-- <a href="acceso/logout.php">Cerrar sesión</a> -->
        </button>
    </div>

  <div class="contenido">
    <div class="cabecera_contenido">
      <h1>DOCUMENTOS</h1>
      <div class="logo_salud_2"></div>
    </div>

    <div class="contenedor_tabla">
      <table>
        <tr>
          <div class="contenedor_boton_add">
            <button class="boton_normal" onclick="mostrarFormAgregar()">
              <p>AGREGAR</p>
            </button>
          </div>
        </tr>
        <tr>
          <th colspan="7" class="cabecera_tabla">DOCUMENTOS</th>
        </tr>
        <tr>
          <th>NUM</th>
          <th>NOMBRE DOCUMENTO</th>
          <th>CORREO ELECTRÓNICO</th>
          <th>ARCHIVO</th>
        </tr>

        <?php while ($row_chat = mysqli_fetch_assoc($resultado_director)): ?>
          <tr>
            <td>
              <?php echo $row_chat['id_documento']; ?>
            </td>
            <td>
              <?php echo $row_chat['nombre_documento']; ?>
            </td>
            <td>
              <?php echo $row_chat['enlace_documento']; ?>
            </td>
            <td><a href="archivos/<?php echo $row_chat['enlace_documento']; ?>" target="_blank">archivo</a></td>
            <td>
              <div class="botones_modificacion_tabla">
                <button class="boton_normal" onclick="llenarFormularioModificar(
                        <?php echo $row_chat['id_documento']; ?>,
                        '<?php echo $row_chat['nombre_documento']; ?>',
                        // '<?php echo $row_chat['enlace_documento']; ?>'
                    )">Editar</button>
                <button class="boton_normal" onclick="llenarCampoID(<?php echo $row_chat['id_documento']; ?>)">Eliminar
                </button>
              </div>
            </td>
          </tr>
        <?php endwhile; ?>
      </table>
    </div>
  </div>


  <div class="fondo_opaco" id="fondo_opaco"></div>

  
  <div class="superpuesto" id="sup_agregar">
    <div class="formulario_agregar">
      <div class="cabecera_formulario">
        <div></div>
        <h2>DATOS PERSONALES</h2>
        <button onclick="ocultarFormAgregar()"><span class="material-symbols-outlined">cancel</span></button>
      </div>
      <div class="cuerpo_formulario">


        <form action="index.php" method="post" enctype="multipart/form-data">
          <div class="campo_texto">
            <div>
              <input type="file" name="archivo" id="archivo">
            </div>
          </div>
          <div class="campo_texto">
            <label for="nombre_documento">Nombre del documento:</label>
            <input type="text" name="nombre_documento" id="nombre_documento">
          </div>
          <button class="boton_normal" type="submit" name="agregar" value="Agregar">
            <p>Guardar</p>
          </button>
        </form>


      </div>
    </div>
  </div>

  
<!-- WWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWW -->
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

  <!-- WWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWW -->
  
  <div class="superpuesto" id="sup_modificar">
        <div class="formulario_agregar">
            <div class="cabecera_formulario">
                <div></div>
                <h2>DATOS PERSONALES MOD</h2>
                <button onclick="ocultarFormModificar()"><span class="material-symbols-outlined">cancel</span></button>
            </div>
            <div class="cuerpo_formulario">



                <form action="index.php" method="post" enctype="multipart/form-data">
                    <div class="campo_texto">
                        <div>
                            <input type="file" name="archivo_modificar" id="archivo_modificar">
                            <?php if(isset($foto_modificar) && $foto_modificar != ""): ?>
                              <input type="hidden" name="archivo_existente" value="<?php echo $foto_modificar; ?>">
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="campo_texto">
                        <input type="text" name="id_modificar" id="id_modificar" style="display:none;">
                    </div>
                    <div class="campo_texto">
                        <label for="nombre_documento_modificar">Nombre del documento:</label>
                        <input type="text" name="nombre_documento_modificar" id="nombre_documento_modificar">
                    </div>
                    <button class="boton_normal" type="submit" value="Modificar">
                        <p>Guardar</p>
                    </button>
                </form>



            </div>
        </div>
    </div>

  

  

  <script src="../../assets_completo/js/script.js"></script>
  <script src="../../assets_completo/js/script_admin_directorio.js"></script>
</body>

</html>