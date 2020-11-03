<?php
include("conexion.php");

$nombre = $_POST["usuario"];
$contraseña = $_POST["contraseña"];
$Estudiante = $_POST["Estudiante"];
$Trabajo = $_POST["Trabajo"];

if(isset($_POST["btnRegistrar"]))
{
    if($Estudiante=="on"){
        $Est = true;
    }else{
        $Est = false;
    }
    if($Trabajo=="on"){
        $Tra = true;
    }else{
        $Tra = false;
    }

    $sqlVerQ = "SELECT * FROM login WHERE usuario = '$nombre'";
    $sqlVer = mysqli_query($conn, $sqlVerQ);
    $sqlVer = mysqli_fetch_array($sqlVer);
    //if($sqlVer["usuario"] ==  $nombre)
    echo "<script> alert('$sqlVer('usuario')');</script>";

	$sqlComands = "INSERT INTO login(usuario,contraseña,Estudiante,Trabajo) values ('$nombre','$contraseña','$Est','$Tra')";
	
	if(mysqli_query($conn,$sqlComands))
	{
		echo "<script> alert('Usuario registrado con exito: $nombre');  </script>";
	}else 
	{
		echo "Error: ".$sql."<br>".mysql_error($conn);
	}
}



?>