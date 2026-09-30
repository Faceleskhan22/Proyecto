<?php
$server="localhost";
$user="root";
$pass="";
$base="proyecto";

$conexion= new mysqli($server, $user, $pass, $base);
if ($conexion->connect_errno) {
	die("La conexion no se realizo correctamente". $conexion->connect_errno);
}

?>