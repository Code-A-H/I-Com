<?php

session_start();


include("conexion.php");

$est=false;
$id = $_SESSION['CodPerfil'];
$actualizar = $conexion -> query("UPDATE login SET EstadoDeConexion = '$est' WHERE CodPerfil = '$id'");
$conexion -> close();
session_unset();
header("Location: index.html");
?>