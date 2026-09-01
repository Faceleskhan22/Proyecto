<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="tecnicos.css">
    <title>TECHNICIAN MARKET-TECNICO</title>
</head>
<body>
    <div class="top-bar">
        <div class="busqueda">
            <img src="" alt="">
            <input type="text" placeholder="Buscar técnicos">
        </div>
    </div>

    <div class="container">
        <aside>
        <nav>
            <div class="logo">
                <img src="imagenes/logo.png" alt="">
            </div>
            <ul>
                <li><img src="imagenes/inicio.png" alt=""><a href="index.php">Inicio</a></li>
                <li><img src="imagenes/pedidos.png" alt=""><a href="pedidos.php">Pedidos</a></li>
                <li><img src="imagenes/perfil.png" alt=""><a href="perfil.php">Perfil</a></li>
            </ul>
        </nav>
        </aside>

        


            <main>
                
                        <?php
                        include("conexion.php");
                        $id_tecnico=$_GET["id"];
                        $sql="SELECT * FROM tecnicos WHERE id_tecnico = '$id_tecnico'";
                        $resultado=mysqli_query($conexion,$sql) or die("Error en SQL: " . mysqli_error($conexion));
                        $fila = mysqli_fetch_assoc($resultado);
                        $sql1="SELECT nom_especialidad FROM especialidades WHERE id_especialidad = {$fila['id_especialidad']}";
                        $res=mysqli_query($conexion, $sql1);
                        $fila_especialidad=mysqli_fetch_assoc($res);
                        $sql2="SELECT mensaje FROM descripcion WHERE id_tecnico = $id_tecnico";
                        $res2=mysqli_query($conexion, $sql2);
                        $fila_descripcion=mysqli_fetch_assoc($res2);
                        echo ('
                        <div class="tecnico">
                            <div class="data">
                            <img class="tecnico-ima" src="imagenes/perfil.png" alt="">
                            </div>
                            <div class="data">
                            <h2>'.$fila["nombre"].' '.$fila["apellido"].
                            '</h2>
                            <p>'.$fila_especialidad["nom_especialidad"].'</p>
                            <div class="tecnico-bot">
                            <button>Contratar</button>
                            <button>Enviar mensaje</button>
                            </div>
                            </div>
                            <div class="data-dos">
                                <p>'.$fila["valoracion_media"].'</p>
                                <p>'.$fila["zona"].'</p>
                            </div>
                        </div>
                        <div class="descripcion">
                            <h3>Descripcion</h3>
                            <p>'.$fila_descripcion["mensaje"].'</p>
                        </div>
                            ');
                        ?>
                        <div class="reseñas">
                            <h3>Reseñas</h3>
                        <?php
                        include("conexion.php");
                        $sql3="SELECT * FROM reseñas WHERE id_tecnico = $id_tecnico order by fecha desc";
                        $res3=mysqli_query($conexion, $sql3) or die("Error en la consulta de reseñas: " . mysqli_error($conexion));
                        while($fila_reseña= mysqli_fetch_assoc($res3)){
                        $sql4="SELECT nom_usuario FROM usuarios WHERE id_usuario = {$fila_reseña['id_usuario']}";
                        $res4=mysqli_query($conexion, $sql4);
                        $nombre=mysqli_fetch_assoc($res4);
                        echo '
                            <div class="reseña">
                            <div class="separar"></div>
                            <div class="info">
                            <p>'.$fila_reseña["valoracion"].'</p>
                            <p>'.$fila_reseña["fecha"].'</p>
                            </div>
                            <p>'.$fila_reseña["mensaje"].'</p>
                            <div class="info-dos">
                            <img src="imagenes/perfil.png">
                            <p>'.$nombre["nom_usuario"].'</p>
                            </div>
                            </div>
                        ';
                        }
                        ?>
                        </div>
            </main>

            <footer>
        <div class="footer-links">
            <ul>
                <li><a href="">Terminos y condiciones</a></li>
                <li><a href="">Politica de privacidad</a></li>
                <li><a href="">Contacto</a></li>
                <li><a href="">Acerca de</a></li>
            </ul>
        </div>
        <div class="footer-media">
            <ul>
                <li><a target="_blank" href="https://www.facebook.com/"><img src="imagenes\facebook.png" alt=""></a></li>
                <li><a target="_blank" href="https://x.com/"><img src="imagenes\twitter.png" alt=""></a></li>
                <li><a target="_blank" href="https://www.instagram.com/"><img src="imagenes\instagram.png" alt=""></a></li>
            </ul>
        </div>
        <p>© 2025 TechnianMarket. Todos los derechos reservados.</p>
        </footer>
        </div>
    </div>

</body>
</html>