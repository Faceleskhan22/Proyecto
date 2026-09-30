<?php

session_start();
include("conexion.php");

// Verificar que haya una sesión iniciada
if (!isset($_SESSION['user']) || $_SESSION['user'] == "") {
    header("Location: inicio.html");
    exit();
}


// Obtener el usuario que inició sesión
$user = $_SESSION['user'];


// Buscar el ID del usuario
$sql_usuario = "SELECT id_usuario FROM usuarios WHERE nom_usuario = ?";
$stmt_usuario = $conexion->prepare($sql_usuario);
$stmt_usuario->bind_param("s", $user);
$stmt_usuario->execute();

$resultado_usuario = $stmt_usuario->get_result();
$fila_usuario = $resultado_usuario->fetch_assoc();

if (!$fila_usuario) {
    echo "No se encontró el usuario.";
    exit();
}

$id_usuario = $fila_usuario['id_usuario'];


// Recibir los datos del formulario
$id_tecnico = $_POST['id_tecnico'] ?? "";
$servicio = $_POST['servicio'] ?? "";
$titulo = $_POST['titulo'] ?? "";
$descripcion = $_POST['descripcion'] ?? "";
$fecha = $_POST['fecha'] ?? "";


// Verificar que estén todos los datos necesarios
if (
    $id_tecnico == "" ||
    $servicio == "" ||
    $titulo == "" ||
    $descripcion == "" ||
    $fecha == ""
) {
    echo "Faltan datos para realizar la contratación.";
    exit();
}


// Verificar que el técnico exista
$sql_tecnico = "SELECT id_tecnico FROM tecnicos WHERE id_tecnico = ?";
$stmt_tecnico = $conexion->prepare($sql_tecnico);
$stmt_tecnico->bind_param("i", $id_tecnico);
$stmt_tecnico->execute();

$resultado_tecnico = $stmt_tecnico->get_result();

if ($resultado_tecnico->num_rows == 0) {
    echo "El técnico seleccionado no existe.";
    exit();
}


// Estado inicial del pedido
$id_estado = 1;


// Crear el pedido
$sql = "INSERT INTO pedidos 
        (id_tecnico, id_usuario, nombre_pedido, decri_pedido, tipo_pedido, fecha, id_estado)
        VALUES (?, ?, ?, ?, ?, ?, ?)";

$stmt = $conexion->prepare($sql);

$stmt->bind_param(
    "iissssi",
    $id_tecnico,
    $id_usuario,
    $titulo,
    $descripcion,
    $servicio,
    $fecha,
    $id_estado
);


// Ejecutar
if ($stmt->execute()) {
    echo "Contratación realizada correctamente.";
    header("location: pedidos.php");
} else {
    echo "Error al realizar la contratación: " . $stmt->error;
}


// Cerrar
$stmt->close();
$stmt_tecnico->close();
$stmt_usuario->close();
$conexion->close();

?>