<?php

include("conexion.php");

$nombre = $_POST["usuario"];
$contraseña   = $_POST["contraseña"];

if(isset($_POST["btnIngresar"]))
{
	$query = mysqli_query($conexion,"SELECT * FROM login WHERE usuario = '$nombre' AND contrasena='$contraseña'");
	$nr = mysqli_num_rows($query);
	
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
?>
