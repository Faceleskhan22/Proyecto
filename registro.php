<?php
session_start();
include("conexion.php");
$user=$_POST['usuario'];
$pass=$_POST['clave'];
$calle=$_POST['calle'];
$num=$_POST['num'];
$local=$_POST['local'];


$sql="INSERT INTO usuarios(nom_usuario, clave)VALUES('$user','$pass')";
if(mysqli_query($conexion,$sql)){
	$sql1="SELECT id_usuario FROM usuarios WHERE nom_usuario = ('$user')";
	$res1=mysqli_query($conexion,$sql1) or die("Error en la consulta de reseñas: " . mysqli_error($conexion));
	$id=mysqli_fetch_assoc($res1);
	$sql2="INSERT INTO direccion(id_usuario, localidad, calle, numero) VALUES ({$id['id_usuario']}, '$local', '$calle', '$num' )";
	$res2=mysqli_query($conexion,$sql2);
	$_SESSION['user']=$user;
    $_SESSION['pass']=$pass;
	header("Location:index.php ");
}else{
	echo "No se pudo registrar el usuario";
}

?>