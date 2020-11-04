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
		$est=true;
		$queri = mysqli_query($conn, "UPDATE login SET EstadoDeConexion = '$est'");
		$queriNum = mysqli_num_rows($queri);
		echo "<script> alert('Bienvenido $nombre, columnas: $queriNum'); window.location='principal.html' </script>";
	}else
	{
		echo "<script> alert('Usuario o contraseña incorrectos'); window.location='index.html' </script>";
    }///y

}else{
    //
}
?>
