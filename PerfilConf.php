<?php

include("conexion.php");

$perfil = $_POST["perfilImagen"];
$contImage = addslashes(file_get_contents($perfil));



?>