<?php

include("conexion.php");



if(isset($_POST["actualizarInfo"])){
    if(!empty($perfil_FotoTMP = $_FILES['fileImg']['tmp_name'])){
        $perfil_Foto = $_FILES['fileImg']['name'];
        $perfil_Foto_Tipo = $_FILES['fileImg']['type'];
        $perfil_Foto_Tamaño = $_FILES['fileImg']['size'];
        //
        $perfil_FotoData = addslashes(file_get_contents($perfil_FotoTMP));
        $insertar = $conexion -> query("INSERT into profile_pictures(nombre,extension,archivo) 
        values('$perfil_Foto','$perfil_Foto_Tipo','$perfil_FotoData')");
        if($insertar){
            $insertar = mysqli_query($conexion,"SELECT * FROM profile_pictures WHERE nombre = '$perfil_Foto'");
            $insertar = mysqli_fetch_array($insertar);
            $ImgCod = $insertar["ImgCodigo"];
            $insertar = $conexion -> query("UPDATE login SET CodPerfil = '$ImgCod' WHERE usuario = 'harvys'");
            echo("<script> alert('ok'); window.location='PerfilConf.html'</script>");
        }else{
            echo("<script> alert('error con la integracion'); </script>");
        }
        
    }else{
        echo("<script> alert('no foto'); window.location='PerfilConf.html'</script>");
    }
}
if(isset($_POST["ver"])){
    echo("<script> alert('nice'); window.location='PerfilConf.html'</script>");

}

?>