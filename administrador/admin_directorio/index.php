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
  <title>Página de inicio</title>
  <script>
    function llenarCampoID(id) {
      document.getElementById("id").value = id;
      mostrarFormEliminar();
    }

    function llenarFormularioModificar(id, puesto, servidor, profesion, correo, telefono, descripcion, archivo) {
    document.getElementById("id_modificar").value = id;
    document.getElementById("puesto_trabajo_modificar").value = puesto;
    document.getElementById("nombres_modificar").value = servidor;
    document.getElementById("apellidos_modificar").value = profesion;
    document.getElementById("correo_electronico_modificar").value = correo;
    document.getElementById("telefono_modificar").value = telefono;
    document.getElementById("descripcion_modificar").value = descripcion;

    // Llenar el campo de archivo si hay un archivo existente
    if (archivo) {
        var fileInput = document.getElementById("imagen_modificar");
        fileInput.value = ""; // Borra el valor actual del campo de archivo
        fileInput.parentNode.innerHTML += '<input type="hidden" name="archivo_existente" value="' + archivo + '">'; // Agrega un campo oculto con el nombre del archivo existente
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
    </button>
  </div>

  <div class="contenido">
    <div class="cabecera_contenido">
      <h1>DIRECTORIO</h1>
      <div class="logo_salud_2"></div>
    </div>

    <div class="contenedor_tabla">
      <table class="dir_t">
        <tr>
          <div class="contenedor_boton_add">
            <button class="boton_normal" onclick="mostrarFormAgregar()">
              <p>AGREGAR</p>
            </button>
          </div>
        </tr>
        <tr>
          <th colspan="7" class="cabecera_tabla">DIRECTOR</th>
        </tr>
        <tr>
          <th>FOTO</th>
          <th>SERVIDOR PUBLICO</th>
          <th>PROFESIÓN</th>
          <th>CORREO ELECTRÓNICO</th>
          <th>TELÉFONO</th>
          <th>DESCRIPCIÓN</th>

        </tr>

        <?php while ($row_chat = mysqli_fetch_assoc($resultado_director)): ?>
          <tr>
            <td>
              <div class="imagen_foto_tabla">
                <?php echo "<img src='imagenes/{$row_chat['enlace_foto']}' width='50'>"; ?>
              </div>
            </td>
            <td>
              <?php echo $row_chat['nombre_servidor_publico']; ?>
            </td>
            <td>
              <?php echo $row_chat['profesion']; ?>
            </td>
            <td>
              <?php echo $row_chat['correo_electronico']; ?>
            </td>
            <td>
              <?php echo $row_chat['telefono']; ?>
            </td>
            <td class="casilla_descripcion">
              <?php echo $row_chat['descripcion']; ?>
            </td>
            <td>
              <div class="botones_modificacion_tabla">
                <buttton class="boton_normal" onclick="llenarFormularioModificar(
                          <?php echo $row_chat['id_trabajador']; ?>,
                          '<?php echo $row_chat['puesto_trabajo']; ?>',
                          '<?php echo $row_chat['nombre_servidor_publico']; ?>',
                          '<?php echo $row_chat['profesion']; ?>',
                          '<?php echo $row_chat['correo_electronico']; ?>',
                          '<?php echo $row_chat['telefono']; ?>',
                          '<?php echo $row_chat['descripcion']; ?>',
                          '<?php echo $row_chat['enlace_foto']; ?>'
                      )">Editar</buttton>
                <buttton class="boton_normal" onclick="llenarCampoID(<?php echo $row_chat['id_trabajador']; ?>)">Eliminar
                </buttton>
              </div>
            </td>
          </tr>
        <?php endwhile; ?>
      </table>
    </div>

    <div class="contenedor_tabla">
      <table class="dir_t">
        <tr>
          <th colspan="7" class="cabecera_tabla">PSICOLOGOS-MÉDICOS</th>
        </tr>
        <tr>
          <th>FOTO</th>
          <th>SERVIDOR PUBLICO</th>
          <th>PROFESIÓN</th>
          <th>CORREO ELECTRÓNICO</th>
          <th>TELÉFONO</th>
          <th>DESCRIPCIÓN</th>

        </tr>

        <!-- AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA -->
        <?php while ($row_chat = mysqli_fetch_assoc($resultado_psicologo)): ?>
          <tr>
            <td>
              <div class="imagen_foto_tabla">
                <?php echo "<img src='imagenes/{$row_chat['enlace_foto']}' width='50'>"; ?>
              </div>
            </td>
            <td>
              <?php echo $row_chat['nombre_servidor_publico']; ?>
            </td>
            <td>
              <?php echo $row_chat['profesion']; ?>
            </td>
            <td>
              <?php echo $row_chat['correo_electronico']; ?>
            </td>
            <td>
              <?php echo $row_chat['telefono']; ?>
            </td>
            <td  class="casilla_descripcion">
              <?php echo $row_chat['descripcion']; ?>
            </td>
            <td>
              <div class="botones_modificacion_tabla">
                <buttton class="boton_normal" onclick="llenarFormularioModificar(
                          <?php echo $row_chat['id_trabajador']; ?>,
                          '<?php echo $row_chat['puesto_trabajo']; ?>',
                          '<?php echo $row_chat['nombre_servidor_publico']; ?>',
                          '<?php echo $row_chat['profesion']; ?>',
                          '<?php echo $row_chat['correo_electronico']; ?>',
                          '<?php echo $row_chat['telefono']; ?>',
                          '<?php echo $row_chat['descripcion']; ?>',
                          '<?php echo $row_chat['enlace_foto']; ?>'
                      )">Editar</buttton>
                <buttton class="boton_normal" onclick="llenarCampoID(<?php echo $row_chat['id_trabajador']; ?>)">Eliminar
                </buttton>
              </div>
            </td>
          </tr>
        <?php endwhile; ?>
        <!-- AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA -->
      </table>
    </div>

    <div class="contenedor_tabla">
      <table class="dir_t">
        <tr>
          <th colspan="7" class="cabecera_tabla">TRABAJADORES-SOCIALES</th>
        </tr>
        <tr>
          <th>FOTO</th>
          <th>SERVIDOR PUBLICO</th>
          <th>PROFESIÓN</th>
          <th>CORREO ELECTRÓNICO</th>
          <th>TELÉFONO</th>
          <th>DESCRIPCIÓN</th>

        </tr>


        <?php while ($row_chat = mysqli_fetch_assoc($resultado_trabajador)): ?>
          <tr>
            <td>
              <div class="imagen_foto_tabla">
                <?php echo "<img src='imagenes/{$row_chat['enlace_foto']}' width='50'>"; ?>
              </div>
            </td>
            <td>
              <?php echo $row_chat['nombre_servidor_publico']; ?>
            </td>
            <td>
              <?php echo $row_chat['profesion']; ?>
            </td>
            <td>
              <?php echo $row_chat['correo_electronico']; ?>
            </td>
            <td>
              <?php echo $row_chat['telefono']; ?>
            </td>
            <td   class="casilla_descripcion">
              <?php echo $row_chat['descripcion']; ?>
            </td>
            <td>
              <div class="botones_modificacion_tabla">
                <buttton class="boton_normal" onclick="llenarFormularioModificar(
                          <?php echo $row_chat['id_trabajador']; ?>,
                          '<?php echo $row_chat['puesto_trabajo']; ?>',
                          '<?php echo $row_chat['nombre_servidor_publico']; ?>',
                          '<?php echo $row_chat['profesion']; ?>',
                          '<?php echo $row_chat['correo_electronico']; ?>',
                          '<?php echo $row_chat['telefono']; ?>',
                          '<?php echo $row_chat['descripcion']; ?>',
                          '<?php echo $row_chat['enlace_foto']; ?>'
                      )">Editar</buttton>
                <buttton class="boton_normal" onclick="llenarCampoID(<?php echo $row_chat['id_trabajador']; ?>)">Eliminar
                </buttton>
              </div>
            </td>
          </tr>
        <?php endwhile; ?>
      </table>
    </div>



  </div>


  <div class="fondo_opaco" id="fondo_opaco"> </div>

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
              <input type="file" name="imagen" id="imagen">
            </div>
          </div>
          <div class="campo_texto">
            <label for="puesto_trabajo">Puesto Trabajo:</label>
            <input type="text" name="puesto_trabajo" id="puesto_trabajo">
          </div>
          <div class="campo_texto">
            <label for="nombres">Servidor Público:</label>
            <input type="text" name="nombres" id="nombres">
          </div>
          <div class="campo_texto">
            <label for="apellidos">Profesión:</label>
            <input type="text" name="apellidos" id="apellidos">
          </div>
          <div class="campo_texto">
            <label for="correo_electronico">Correo electrónico:</label>
            <input type="email" name="correo_electronico" id="correo_electronico">
          </div>
          <div class="campo_texto">
            <label for="telefono">Teléfono:</label>
            <input type="text" name="telefono" id="telefono">
          </div>
          <div class="campo_texto">
            <label for="descripcion">Descripción:</label>
            <input type="text" name="descripcion" id="descripcion">
          </div>
          <button class="boton_normal" type="submit" name="agregar" value="Agregar">
            <p>Guardar</p>
          </button>
        </form>


      </div>
    </div>
  </div>

  <div class="contenedor_form_eliminar superpuesto" id="sup_eliminar">
    <div class="pregunta_2_opciones ">
      <div class="cabecera_pregunta">
        <h2>¿Estás seguro de que deseas eliminar?</h2>
      </div>
      <form action="index.php" method="post">
        <input type="text" name="id" id="id" style="display:none">
        <div class="cuerpo_pregunta">
          <button class="boton_normal" type="submit">
            <p>SI</p>
          </button>
          <button class="boton_normal" type="button" onclick="ocultarFormEliminar()">
            <p>NO</p>
          </button>
        </div>
      </form>
    </div>
  </div>
  

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
        <input type="file" name="imagen_modificar" id="imagen_modificar">
        <?php if(isset($foto_modificar) && $foto_modificar != ""): ?>
            <input type="hidden" name="archivo_existente" value="<?php echo $foto_modificar; ?>">
        <?php endif; ?>
    </div>
</div>
          <div class="campo_texto">
            <input type="text" name="id_modificar" id="id_modificar" style="display:none">
          </div>
          <div class="campo_texto">
            <label for="puesto_trabajo_modificar">Puesto Trabajo:</label>
            <input type="text" name="puesto_trabajo_modificar" id="puesto_trabajo_modificar">
          </div>
          <div class="campo_texto">
            <label for="nombres_modificar">Servidor Público:</label>
            <input type="text" name="nombres_modificar" id="nombres_modificar">
          </div>
          <div class="campo_texto">
            <label for="apellidos_modificar">Profesión:</label>
            <input type="text" name="apellidos_modificar" id="apellidos_modificar">
          </div>
          <div class="campo_texto">
            <label for="correo_electronico_modificar">Correo electrónico:</label>
            <input type="text" name="correo_electronico_modificar" id="correo_electronico_modificar">
          </div>
          <div class="campo_texto">
            <label for="telefono_modificar">Teléfono:</label>
            <input type="text" name="telefono_modificar" id="telefono_modificar">
          </div>
          <div class="campo_texto">
            <label for="descripcion_modificar">Descripción:</label>
            <input type="text" name="descripcion_modificar" id="descripcion_modificar">
          </div>
          <button class="boton_normal" type="submit" value="Modificar">
            <p>Guardar</p>
          </button>
        </form>



      </div>
    </div>
  </div>


  <!-- <a href="../../logout.php">Cerrar sesión</a> -->

  <script src="../../assets_completo/js/script.js"></script>
  <script src="../../assets_completo/js/script_directorio.js"></script>
  <script src="../../assets_completo/js/script_admin_directorio.js"></script>
</body>

</html>