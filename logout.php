<?php
session_start();
require("conexion.php");
session_destroy();
header("location: registrouno.php");
?>
