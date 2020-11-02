<?php

include("conexion.php");

$nombre = $_POST["usuario"];
$pass   = $_POST["contraseña"];

//Login
if(isset($_POST["btningresar"]))
{
	$query = mysqli_query($conn,"SELECT * FROM login WHERE usuario = '$nombre' AND contraseña='$pass'");
	$nr = mysqli_num_rows($query);
	echo "<script> alert('Bienvenido'); </script>";
	
	if($nr==1)
	{
		echo "<script> alert('Bienvenido $nombre'); </script>";
	}else
	{
		echo "<script> alert('Usuario no existe'); </script>";
    }

}else{
    
}

//Registrar
if(isset($_POST["btnregistrar"]))
{
	$sqlgrabar = "INSERT INTO login(usuario,contraseña) values ('$nombre','$pass')";
	
	if(mysqli_query($conn,$sqlgrabar))
	{
		echo "<script> alert('Usuario registrado con exito: $nombre'); </script>";
	}else 
	{
		echo "Error: ".$sql."<br>".mysql_error($conn);
	}
}


?>
