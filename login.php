<?php
session_start();
include("conexion.php");

$nombre = $_POST["usuario"];
$contraseña   = $_POST["contraseña"];



if(isset($_POST["btnIngresar"]))
{
	$query = mysqli_query($conexion,"SELECT * FROM login WHERE usuario = '$nombre' AND contrasena='$contraseña'");
	$nr = mysqli_num_rows($query);
	
	if($nr==1)
	{
		
		//$queriNum = mysqli_num_rows($queri);
		
		$query = mysqli_fetch_array($query);
		$CP = $query["CodPerfil"];
		
		if($CP==null) header("Location: PerfilConf.php?usuar=".$nombre);
		else {
			$est=true;
			$queri = "UPDATE login SET EstadoDeConexion = '$est' WHERE usuario = '$nombre'";
			$conexion -> query($queri);
			$_SESSION['Usuario'] = $nombre;
			header("Location: principal.php");
		}

		//header("Location: PerfilConf.php?usuario=".$nombre);

		//echo "<script> alert('Bienvenido $nombre'); window.location='PerfilConf.php' </script>";
	}else
	{
		echo "<script> alert('Usuario o contraseña incorrectos'); window.location='index.html' </script>";
    }///y

}
$conexion -> close();
?>
