<?php
session_start();
include("conexion.php");
$user=$_POST['usuario'];
$pass=$_POST['clave'];
$sql1="SELECT * FROM usuarios where (nom_usuario)=('$user')";
$sql2="SELECT * FROM usuarios where (nom_usuario)=('$user') and (clave)=('$pass')";
$resultado=mysqli_query($conexion,$sql1);
if(mysqli_num_rows($resultado)>0){
    $resultado2=mysqli_query($conexion,$sql2);
	if(mysqli_num_rows($resultado2)>0){
        header("Location: index.php");
        $_SESSION['user']=$user;
        $_SESSION['pass']=$pass;
    }
    else{
        echo "Contraseña incorrecta";
     }
}
else{
    echo "Usuario inexistente";
}
?>