<?php

include("conexion.php");


if(isset($_POST["actualizarInfo"])){
    if(!empty($perfil_FotoTMP = $_FILES['fileImg']['tmp_name'])){
        $perfil_Foto = $_FILES['fileImg']['name'];
        $perfil_Foto_Tipo = $_FILES['fileImg']['type'];
        $perfil_Foto_Tamaño = $_FILES['fileImg']['size'];
        $user = $_POST["user"];
        echo "<script> alert('$user');</script>";
        //
        $perfil_FotoData = addslashes(file_get_contents($perfil_FotoTMP));
        $insertar = $conexion -> query("INSERT into profile_pictures(nombre,extension,archivo) 
        values('$perfil_Foto','$perfil_Foto_Tipo','$perfil_FotoData')");
        if($insertar){
            $insertar = mysqli_query($conexion,"SELECT * FROM profile_pictures WHERE nombre = '$perfil_Foto'");
            $insertar = mysqli_fetch_array($insertar);
            $ImgCod = $insertar["ImgCodigo"];
            //echo "<script> alert('$ImgCod');</script>";
            //$user = $_GET['usuar'];
            //echo "<script> alert('$user');</script>";
            $insertar = $conexion -> query("UPDATE login SET CodPerfil = '$ImgCod' WHERE usuario = '$user'");
            //$insertar = mysqli_num_rows($insertar);
            echo("<script> alert('ok'); window.location='principal.html'</script>");
            exit;
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
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <!--para evitar errores con el cache-->
        <meta http-equiv="Expires" content="0">
        <meta http-equiv="Last-Modified" content="0">
        <meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
        <meta http-equiv="Pragma" content="no-cache">

        <title>PerfilConf</title>
        <link rel="stylesheet" href="estilos.css">
        <link rel="shortcut icon" type="image/x-icon" href="icon.ico" />
    </head>
    <body>
        <div class="contenedor"></div>
        <div class="inner1">
            <img src="I-COM.gif" alt="Funny image"> 
        </div>
        <div class="inner2">
            <!-- enctype=“multipart/form-data” -->
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
                <input type="text" style="display: none;" name="user" value="<?php echo $_GET['usuar']; ?>" >
                <label class="let">Seleccione su imagen de perfil: </label>
                <input type="file" id="fileImg" name="fileImg"> <br>
                <label class="let">Nombre: </label>
                <input type="text" id="Nom" name="Nombre" required><p>*</p>
                <br>
                <label class="let">apellido: </label>
                <input type="text" id="Ape" name="Apellido" required><p>*</p>
                <br><br>
                <input type="submit" value="actualizar Info" name="actualizarInfo">
            </form>
            <br>
            <form action="PerfilConf.php" method="POST">
                <input type="submit" value="ver" name="ver">
            </form>
        </div>
    </body>
</html>