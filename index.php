
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <title>TECHNICIAN MARKET</title>
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
                <li><img src="imagenes/inicio.png" alt=""><a href="#Inicio">Inicio</a></li>
                <li><img src="imagenes/pedidos.png" alt=""><a href="pedidos.php">Pedidos</a></li>
                <li><img src="imagenes/perfil.png" alt=""><a href="perfil.php">Perfil</a></li>
            </ul>
        </nav>
        </aside>

        <div class="content">
            <header id="Inicio">
                <h1>Technician Market</h1>
            </header>

            <div class="categorias">
            <div class="categorias-ul">
            <h2>Categorias</h2>
            <ul>
                <li>Todos</li>
                <li>Hardware</li>
                <li>Software</li>
                <li>Plomeria</li>
                <li>Electricidad</li>
                <li>Pintura</li>
            </ul>
            </div>
            <div class="filtrar">
            <label for="categoria">Filtrar:</label>
                <select id="categoria">
                    <option value="todos">Todos</option>
                    <option value="precio">Precio</option>
                    <option value="calificacion">Calificacion</option>
                    <option value="ubicacion">Ubicacion</option>
                </select>
            </div>
            </div>

            <main>
                <div class="grid-container">
                        <?php
                           include("conexion.php");
                           $sql="SELECT * FROM tecnicos";
                           $resultado=mysqli_query($conexion,$sql);
                           while($fila = mysqli_fetch_assoc($resultado)){
                            $sql1="SELECT nom_especialidad FROM especialidades WHERE id_especialidad = {$fila['id_especialidad']}";
                            $res=mysqli_query($conexion, $sql1);
                            $fila_especialidad=mysqli_fetch_assoc($res);
                            echo ('
                            <div class="grid-item">
                            <div class="info-tecnico">
                            <img class="tecnico-icon" src="imagenes/perfil.png" alt="">
                            <div><h2>'.$fila["nombre"].' '.$fila["apellido"].
                            '</h2></div>
                            </div>
                            <div class="linea"></div>
                            <div class="info-tecnico">
                                <p>'.$fila["valoracion_media"].'
                            </p>
                            </div>
                            <div class="info-tecnico">
                                <p>'.$fila["zona"].'</p>
                            </div>
                            <div class="info-tecnico">
                                <p>'
                                .$fila_especialidad["nom_especialidad"].'</p>
                            </div>
                            <div class="info-tecnico" id="valor-boton">
                            <h4>valor</h4>
                            <a href="tecnicos.php?id='.$fila["id_tecnico"].'">
                            <button>Ver Tecnico</button>
                            </a>
                            </div>
                            </div>
                            ');
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