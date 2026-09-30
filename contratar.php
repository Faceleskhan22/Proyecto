
<?php
session_start();
include("conexion.php");

/* Comprobar si el usuario inició sesión */
if (!isset($_SESSION['user']) || $_SESSION['user'] == "") {
    header("Location: inicio.html");
    exit();
}

$id_tecnico = $_POST['id_tecnico'] ?? "";

if ($id_tecnico == "") {
    echo "No se seleccionó ningún técnico.";
    exit();
}

/* Usuario que inició sesión */
$user = $_SESSION['user'];


/* Buscar los datos del usuario */
$sql1 = "SELECT * FROM usuarios WHERE nom_usuario = '$user'";
$res1 = mysqli_query($conexion, $sql1);

$fila1 = mysqli_fetch_assoc($res1);


/* Comprobar que el usuario exista */
if (!$fila1) {
    session_unset();
    session_destroy();

    header("Location: inicio.html");
    exit();
}


/* Obtener ID del usuario */
$id_usuario = $fila1['id_usuario'];


/* Guardar ID en la sesión */
$_SESSION['id_usuario'] = $id_usuario;


/* Buscar la dirección del usuario */
$sql2 = "SELECT * FROM direccion WHERE id_usuario = $id_usuario";
$res2 = mysqli_query($conexion, $sql2);

$fila2 = mysqli_fetch_assoc($res2);


/* Si no tiene dirección registrada */
if (!$fila2) {

    $tiene_direccion = false;

} else {

    $tiene_direccion = true;

}

?>

<!DOCTYPE html>

<html lang="es">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Contratación</title>

    <link rel="stylesheet" href="contratacion.css">

</head>


<body>


    <!-- BARRA SUPERIOR -->

    <div class="top-bar">

        <div class="busqueda">

            <img src="" alt="">

            <input
                type="text"
                placeholder="Buscar técnicos"
            >

        </div>

    </div>



    <!-- CONTENEDOR PRINCIPAL -->

    <div class="container">


        <!-- SIDEBAR -->

        <aside>

            <nav>

                <div class="logo">

                    <img
                        src="imagenes/logo.png"
                        alt="Logo"
                    >

                </div>


                <ul>

                    <li>

                        <img
                            src="imagenes/inicio.png"
                            alt=""
                        >

                        <a href="index.php">
                            Inicio
                        </a>

                    </li>


                    <li>

                        <img
                            src="imagenes/pedidos.png"
                            alt=""
                        >

                        <a href="pedidos.php">
                            Pedidos
                        </a>

                    </li>


                    <li>

                        <img
                            src="imagenes/perfil.png"
                            alt=""
                        >

                        <a href="perfil.php">
                            Perfil
                        </a>

                    </li>

                </ul>

            </nav>

        </aside>



        <!-- CONTENIDO -->

        <div class="content">


            <main>


                <!-- TÍTULO -->

                <div class="titulo">

                    <h1>
                        Solicitar contratación
                    </h1>

                    <p>
                        Completá los datos para solicitar el servicio del técnico.
                    </p>

                </div>



                <?php

                /*
                 * Si el usuario no tiene dirección,
                 * mostramos un mensaje.
                 */

                if (!$tiene_direccion) {

                    echo "

                    <div class='mensaje-error'>

                        <h2>
                            No tenés una dirección registrada
                        </h2>

                        <p>
                            Para realizar una contratación primero tenés que registrar una dirección.
                        </p>

                        <a href='perfil.php'>
                            <button type='button'>
                                Ir al perfil
                            </button>
                        </a>

                    </div>

                    ";

                } else {

                ?>


                    <!-- FORMULARIO -->

                    <form
                        class="form-contratacion"
                        action="procesar_contratacion.php"
                        method="POST"
                    >


                        <!-- ID DEL USUARIO -->

                        <input
                            type="hidden"
                            name="id_usuario"
                            value="<?php echo $id_usuario; ?>"
                        >

                        <input type="hidden" name="id_tecnico" value="<?php echo $id_tecnico; ?>">



                        <!-- SECCIÓN 1 -->

                        <section class="seccion-contratacion">


                            <h2>
                                1. Información del servicio
                            </h2>


                            <div class="campo">

                                <label for="servicio">
                                    Tipo de servicio
                                </label>


                                <select
                                    name="servicio"
                                    id="servicio"
                                    required
                                >

                                    <option value="">
                                        Seleccioná un servicio
                                    </option>

                                    <option value="informatica">
                                        Informática
                                    </option>

                                    <option value="electricidad">
                                        Electricidad
                                    </option>

                                    <option value="plomeria">
                                        Plomería
                                    </option>

                                    <option value="aire_acondicionado">
                                        Aire acondicionado
                                    </option>

                                    <option value="reparaciones">
                                        Reparaciones
                                    </option>

                                    <option value="otros">
                                        Otros
                                    </option>

                                </select>

                            </div>



                            <div class="campo">

                                <label for="titulo">
                                    Título del problema
                                </label>


                                <input
                                    type="text"
                                    name="titulo"
                                    id="titulo"
                                    placeholder="Ej: Mi computadora no enciende"
                                    required
                                >

                            </div>



                            <div class="campo">

                                <label for="descripcion">
                                    Descripción del problema
                                </label>


                                <textarea
                                    name="descripcion"
                                    id="descripcion"
                                    placeholder="Explicá qué problema tenés..."
                                    required
                                ></textarea>

                            </div>


                        </section>



                        <!-- SECCIÓN 2 -->

                        <section class="seccion-contratacion">


                            <h2>
                                2. Ubicación del servicio
                            </h2>


                            <p class="texto-ayuda">
                                Esta es la dirección registrada en tu cuenta.
                            </p>



                            <div class="fila">


                                <div class="campo">

                                    <label>
                                        Calle
                                    </label>

                                    <input
                                        type="text"
                                        value="<?php echo htmlspecialchars($fila2['calle']); ?>"
                                        readonly
                                    >

                                </div>



                                <div class="campo campo-numero">

                                    <label>
                                        Número
                                    </label>

                                    <input
                                        type="text"
                                        value="<?php echo htmlspecialchars($fila2['numero']); ?>"
                                        readonly
                                    >

                                </div>


                            </div>



                            <div class="fila">


                                <div class="campo">

                                    <label>
                                        Localidad
                                    </label>

                                    <input
                                        type="text"
                                        value="<?php echo htmlspecialchars($fila2['localidad']); ?>"
                                        readonly
                                    >

                                </div>



                                <div class="campo">

                                    <label>
                                        Código postal
                                    </label>

                                    <input
                                        type="number"
                                        placeholder="1879"
                                        name="cod"
                                    >

                                </div>


                            </div>



                            <!-- Estos valores también se mandan al PHP -->

                            <input
                                type="hidden"
                                name="calle"
                                value="<?php echo htmlspecialchars($fila2['calle']); ?>"
                            >

                            <input
                                type="hidden"
                                name="numero"
                                value="<?php echo htmlspecialchars($fila2['numero']); ?>"
                            >

                            <input
                                type="hidden"
                                name="localidad"
                                value="<?php echo htmlspecialchars($fila2['localidad']); ?>"
                            >

                     


                        </section>



                        <!-- SECCIÓN 3 -->

                        <section class="seccion-contratacion">


                            <h2>
                                3. Fecha y horario
                            </h2>


                            <div class="fila">


                                <div class="campo">

                                    <label for="fecha">
                                        Fecha
                                    </label>


                                    <input
                                        type="date"
                                        name="fecha"
                                        id="fecha"
                                        required
                                    >

                                </div>



                                <div class="campo">

                                    <label for="hora">
                                        Horario preferido
                                    </label>


                                    <input
                                        type="time"
                                        name="hora"
                                        id="hora"
                                        required
                                    >

                                </div>


                            </div>


                        </section>



                        <!-- RESUMEN -->

                        <section class="resumen">


                            <h2>
                                Resumen de la solicitud
                            </h2>


                            <div class="resumen-dato">

                                <span>
                                    Usuario:
                                </span>

                                <strong>
                                    <?php echo htmlspecialchars($fila1['nom_usuario']); ?>
                                </strong>

                            </div>


                            <div class="resumen-dato">

                                <span>
                                    Dirección:
                                </span>

                                <strong>

                                    <?php

                                    echo htmlspecialchars(
                                        $fila2['calle'] .
                                        " " .
                                        $fila2['numero'] .
                                        ", " .
                                        $fila2['localidad']
                                    );

                                    ?>

                                </strong>

                            </div>


                            <p class="texto-resumen">

                                Revisá los datos antes de enviar la solicitud.

                            </p>


                        </section>



                        <!-- BOTÓN -->

                        <div class="boton-contenedor">

                            <button
                                type="submit"
                                class="boton-contratar"
                            >
                                Solicitar contratación
                            </button>

                        </div>


                    </form>


                <?php

                }

                ?>


            </main>



            <!-- FOOTER -->

            <footer>


                <div class="footer-links">

                    <ul>

                        <li>
                            <a href="">
                                Terminos y condiciones
                            </a>
                        </li>

                        <li>
                            <a href="">
                                Politica de privacidad
                            </a>
                        </li>

                        <li>
                            <a href="">
                                Contacto
                            </a>
                        </li>

                        <li>
                            <a href="">
                                Acerca de
                            </a>
                        </li>

                    </ul>

                </div>



                <div class="footer-media">

                    <ul>

                        <li>
                            <a
                                target="_blank"
                                href="https://www.facebook.com/"
                            >

                                <img
                                    src="imagenes/facebook.png"
                                    alt=""
                                >

                            </a>
                        </li>


                        <li>
                            <a
                                target="_blank"
                                href="https://x.com/"
                            >

                                <img
                                    src="imagenes/twitter.png"
                                    alt=""
                                >

                            </a>
                        </li>


                        <li>
                            <a
                                target="_blank"
                                href="https://www.instagram.com/"
                            >

                                <img
                                    src="imagenes/instagram.png"
                                    alt=""
                                >

                            </a>
                        </li>

                    </ul>

                </div>



                <p>
                    © 2025 TechnianMarket. Todos los derechos reservados.
                </p>


            </footer>


        </div>

    </div>


</body>

</html>

