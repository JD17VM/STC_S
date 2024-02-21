<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <?php
        $ruta_base_estilos = "";
        include("nav_footer/contenido_head.php");
    ?>
    <link rel="stylesheet" href="assets_completo/css/estilos_navegador_footer_usuario.css">
    <link rel="stylesheet" href="assets_completo/css/estilos_login.css">
    <title>Login</title>
</head>
<body>

    <?php
        $ruta_base="usuario/";
        $ruta_login="";
        include("nav_footer/navegador_usuario.php");
    ?>



    <div class="contenedor_login_completo">

        <div class="contenedor_login">
            <div class="logo_login logo_salud_1"></div>


            <form action="" method="post">
                <p>Ingrese sus datos para iniciar sesión</p>
                <div class="campo_texto_entrada">
                    <div class="logo_campo_texto"><span class="material-symbols-outlined">person</span></div>
                    <input type="email" id="correo_electronico" name="correo_electronico" placeholder="Email">
                </div>
                <div class="campo_texto_entrada">
                    <div class="logo_campo_texto"><span class="material-symbols-outlined">key</span></div>
                    <input type="password" id="password" name="password" placeholder="Contraseña" required>
                </div>
                <input type="submit" value="Iniciar Sesión" class="boton_normal">
                <input type="hidden" name="redirect" value="administrador/admin_inicio/">
            </form>


        </div>

    </div>


    <?php
        $ruta_base_libro ="usuario/";
        include("nav_footer/footer_usuario.php");
  ?>

    <?php
    session_start();
  
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $correo_electronico = $_POST["correo_electronico"];
        $password = $_POST["password"];
  
        include("conexion_bd.php");
  
        $consulta = "SELECT * FROM administrador WHERE correo_electronico = ? LIMIT 1";
        $stmt = mysqli_prepare($conexion, $consulta);
        mysqli_stmt_bind_param($stmt, "s", $correo_electronico);
        mysqli_stmt_execute($stmt);
        $resultado = mysqli_stmt_get_result($stmt);
  
        if ($row = mysqli_fetch_assoc($resultado)) {
            if (isset($row['password'])) {
                echo $row['password'];
                echo $row['correo_electronico'];
                echo "<br>";
                echo $password;
                echo $correo_electronico;
                if ($password == $row['password']) {
                    $_SESSION['id_admin'] = $row['id_administrador'];
                    header("Location: " . $_POST['redirect']);
                    exit();
                } else {
                    echo "Contraseña incorrecta.";
                }
            } else {
                echo "Error en la base de datos.";
            }
        } else {
            echo "Usuario no encontrado.";
        }
  
        mysqli_close($conexion);
    }
    ?>

</body>
</html>
