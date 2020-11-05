<?php

include("conexion.php");

$nombre = $_POST["usuario"];
$contraseña = $_POST["contraseña"];
$Estudiante = $_POST["Estudiante"];
$Trabajo = $_POST["Trabajo"];
$CEst=null;
$CTra=null;
if(isset($_POST["btnRegistrar"]))
{   
    if($Estudiante=="on"){
        $Est = true;
        $CEst = $_POST["EstEmail"];
    }else{
        $Est = false;
    }
    if($Trabajo=="on"){
        $Tra = true;
        $CTra = $_POST["TraEmail"];
    }else{
        $Tra = false;
    }

    $sqlVerQ = "SELECT * FROM login WHERE usuario = '$nombre'";
    $sqlVer = mysqli_query($conexion, $sqlVerQ) or die(mysqli_error());
    $sqlVer = mysqli_fetch_array($sqlVer);
    
    $text=$sqlVer['usuario'];
    if($text==$nombre){
        echo "<script>alert('Error: el usuario ya existe'); window.location='registrar.html' </script>";
    }else{
        $sqlComands = "INSERT INTO login(usuario,contrasena,Estudiante,C_Institucional,Trabajo,C_Empresarial) 
        values ('$nombre','$contraseña','$Est','$CEst','$Tra','$CTra')";
	
	    if(mysqli_query($conexion,$sqlComands))
	    {
		    echo "<script> alert('Usuario registrado con exito: $nombre');  window.location='PerfilConf.html'</script>";
	    }else 
	    {
		    echo "Error: ".$sql."<br>".mysqli_error($conexion);
	    }
    }
}



?>