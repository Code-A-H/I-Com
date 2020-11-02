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
		echo "<script> alert('Bienvenido $nombre'); </script>";
	}else
	{
		echo "<script> alert('Usuario no existe'); </script>";
    }///y

}else{
    
}

//Registrar
if(isset($_POST["btnRegistrar"]))
{
	$sqlgrabar = "INSERT INTO login(usuario,contraseña) values ('$nombre','$contraseña')";
	
	if(mysqli_query($conn,$sqlgrabar))
	{
		echo "<script> alert('Usuario registrado con exito: $nombre'); </script>";
	}else 
	{
		echo "Error: ".$sql."<br>".mysql_error($conn);
	}
}


?>
