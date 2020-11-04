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
            echo("<script> alert('ok') </script>");
        }else{
            echo("<script> alert('error con la integracion') </script>");
        }
        
    }else{
        echo("<script> alert('no foto') </script>");
    }
}else{
    echo("<script> alert('error') </script>");
}

?>