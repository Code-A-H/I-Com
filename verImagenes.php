<?php

session_start();
include("conexion.php");
$CP = $_SESSION['CodPerfil'];
$result = $conexion -> query("SELECT * FROM profile_pictures WHERE ImgCodigo = '$CP'");
$buscar = mysqli_fetch_array($result);
$conexion -> close();
header("Content-type:".$buscar["extension"]);
echo $buscar["archivo"];

?>