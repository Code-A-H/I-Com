<?php

include("conexion.php");

$nombre = $_POST["usuario"];
$contraseña   = $_POST["contraseña"];

//Login
if(isset($_POST["btnIngresar"]))
{
	$query = mysqli_query($conn,"SELECT * FROM login WHERE usuario = '$nombre' AND contraseña='$contraseña'");
	$nr = mysqli_num_rows($query);
	echo "<script> alert('Bienvenido'); </script>";
	
	if($nr==1)
	{
		echo "<script> alert('Bienvenido $nombre'); window.location='principal.html' </script>";
	}else
	{
		echo "<script> alert('Usuario no existe'); window.location='index.html' </script>";
    }///y

}else{
    //
}

//Registrar



?>
