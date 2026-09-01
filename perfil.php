 <html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="perfil.css">
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
                <li><img src="imagenes/perfil.png" alt=""><a href="">Perfil</a></li>
            </ul>
        </nav>
        </aside>

        <div class="content">
            
           
    <main>
        <?php
        session_start();
        include("conexion.php");
        if($_SESSION['user']==""){
           header("Location: registro.html");
           session_unset();
        }
        else{
           $user=$_SESSION['user'];
           $sql1="SELECT * FROM usuarios WHERE nom_usuario = ('$user')";
           $res1=mysqli_query($conexion,$sql1);
           $fila1=mysqli_fetch_assoc($res1);
           $_SESSION['id_usuario']=$fila1['id_usuario'];
           $sql2="SELECT * FROM direccion WHERE id_usuario = {$fila1['id_usuario']}";
           $res2=mysqli_query($conexion,$sql2);
           $fila2=mysqli_fetch_assoc($res2);
           echo "
           <div class='perfil'>
           <div class='datosnom'>
              <img src='imagenes/perfil.png'>
              <div class='nomuser'>
              <h2 class='nomusuario'>".$fila1['nom_usuario']."</h2>
              <p>email</p>
              </div>
           </div>
           <div class='separar'></div>
           <div class='datos'>
           <div class='dato'>
           <p>Direccion: </p>
           <p>".$fila2['calle']." ".$fila2['numero'].", ".$fila2['localidad']."</p>
           </div>
           <div class='dato-dos'>
           <p>Pedidos realizados: </p>
           <p>numero </p>
           </div>
           </div>
           </div>
           ";
        }
        ?>
           <a href='registro.html'><button class="perfil-bot">Cerrar Sesion</button></a>
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
