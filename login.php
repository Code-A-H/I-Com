<?php

include("conexion.php");

$nombre = $_POST["usuario"];
$contraseña   = $_POST["contraseña"];

if(isset($_POST["btnIngresar"]))
{
	$query = mysqli_query($conn,"SELECT * FROM login WHERE usuario = '$nombre' AND contraseña='$contraseña'");
	$nr = mysqli_num_rows($query);
	echo "<script> alert('Bienvenido'); </script>";
	
	if($nr==1)
	{
		$est=true;
		$query = mysqli_query($conn, "UPDATE login SET EstadoDeConexion = '$est'");
		echo "<script> alert('Bienvenido $nombre'); window.location='principal.html' </script>";
	}else
	{
		echo "<script> alert('Usuario o contraseña incorrectos'); window.location='index.html' </script>";
    }///y

}else{
    //
}
?>
