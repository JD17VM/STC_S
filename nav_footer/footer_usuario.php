<div class="footer_usuario">
        <div class="footer_usuario_lado_izquierdo"><p>Av. Perú</p> <a href="<?php echo $ruta_base_libro; ?>libro_de_reclamaciones.php">Libro Reclamaciones</a></div>
        <div class="footer_usuario_lado_derecho">
            <ul>
                <li><a href="#"><img src="https://upload.wikimedia.org/wikipedia/commons/archive/6/6b/20210929162744%21WhatsApp.svg" alt=""></a></li>
                <li><a href="#"><img src="https://upload.wikimedia.org/wikipedia/commons/b/b9/2023_Facebook_icon.svg" alt=""></a></li>
                <li><a href="#"><img src="https://upload.wikimedia.org/wikipedia/commons/archive/7/7e/20201017164718%21Gmail_icon_%282020%29.svg" alt=""></a></li>
            </ul>
        </div>
</div>


<script>
    var navegador = document.getElementById("nav_usuario");
    var altura = navegador.offsetHeight;
    var espaciado = document.getElementById("separador_nav");
    console.log(altura);
    espaciado.style.height = altura.toString()+ "px"
    console.log(altura.toString()+ "px")
</script>