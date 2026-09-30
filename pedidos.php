<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="pedidos2.css">
    <title>TECHNICIAN MARKET-TECNICO</title>
</head>
<body>

    <div class="container">
        <aside>
        <nav>
            <div class="logo">
                <img src="imagenes/logo.png" alt="">
            </div>
            <ul>
                <li><img src="imagenes/inicio.png" alt=""><a href="index.php">Inicio</a></li>
                <li><img src="imagenes/pedidos.png" alt=""><a href="">Pedidos</a></li>
                <li><img src="imagenes/perfil.png" alt=""><a href="perfil.php">Perfil</a></li>
            </ul>
        </nav>
        </aside>

        


            <main>
                <div class="pedidos">
                        <?php
                        ini_set('display_errors', 0);
                        error_reporting(0);
                        session_start();
                        include("conexion.php");
                    if($_SESSION['user']==""){
                     echo '<p class="error">NO se detecta usuario, Registrese o Inicie seción</p>';
                    }
                    else{
                        $id_usuario=$_SESSION["id_usuario"];
                        $sql="SELECT * FROM pedidos WHERE id_usuario = '$id_usuario'";
                        $resultado=mysqli_query($conexion,$sql) or die("Error en SQL: " . mysqli_error($conexion));
                        if(mysqli_num_rows($resultado) == 0) {
                            echo "no se encontraron pedidos para el usuario: ".$id_usuario;
                        }          
                        while($fila = mysqli_fetch_assoc($resultado)){
                        $sql1="SELECT nom_estado FROM estados WHERE id_estado={$fila['id_estado']}";
                        $res1=mysqli_query($conexion,$sql1);
                        $fila1 = mysqli_fetch_assoc($res1);
                        $sql2="SELECT * FROM tecnicos WHERE id_tecnico = {$fila['id_tecnico']}";
                        $res2=mysqli_query($conexion,$sql2);
                        $fila2 = mysqli_fetch_assoc($res2);
                        $sql3="SELECT nom_especialidad FROM especialidades WHERE id_especialidad = {$fila2['id_especialidad']}";
                        $res3=mysqli_query($conexion, $sql3);
                        $fila_especialidad=mysqli_fetch_assoc($res3);
                        echo ('
                            <div class="pedido">
                           <div class="pedido-info">
                            <div class="data">
                            <img class="pedido-ima" src="imagenes/perfil.png" alt="">
                            </div>
                            <div class="data">
                            <h2>'.$fila2["nombre"].' '.$fila2["apellido"].
                            '</h2>
                            <p>'.$fila_especialidad["nom_especialidad"].'</p>
                            </div>
                            <div class="data-dos">
                                <p>'.$fila1["nom_estado"].'</p>
                                <p>'.$fila["fecha"].'</p>
                            </div>
                            </div>
                             <div class="separar">
                                </div>
                               <div class="info-pedido">
                               <p> Problema: <span class="info">'.$fila["nombre_pedido"].'</span></p>
                               <p> Tipo: <span class="info">'.$fila["tipo_pedido"].'</span></p>
                               <p> Descripcion: <span class="info">'.$fila["decri_pedido"].'</span></p>
                               </div>
                            
                            ');
                            if($fila['id_estado']== 2){
                                echo ('
                                <div class="boton">
                                <a href=""><button> Calificar</button></a>
                                <a href=""><button> borrar</button></a>
                                </div>
                                ');

                            }
                               
                            echo('</div>');
                        }
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