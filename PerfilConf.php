<?php
session_start();
include("conexion.php");


if(isset($_POST["actualizarInfo"])){
    if(!empty($perfil_FotoTMP = $_FILES['fileImg']['tmp_name'])){
        $perfil_Foto = $_FILES['fileImg']['name'];
        $perfil_Foto_Tipo = $_FILES['fileImg']['type'];
        $perfil_Foto_Tamaño = $_FILES['fileImg']['size'];
        $user = $_POST["user"];
        //echo "<script> alert('$user');</script>";
        //
        $perfil_FotoData = addslashes(file_get_contents($perfil_FotoTMP));
        //
        $perfil_Foto = substr_replace($perfil_Foto, $user, 4, -1);
        echo "<script> alert('$perfil_Foto') </script>";
        //
        $insertar = $conexion -> query("INSERT into profile_pictures(nombre,extension,archivo) 
        values('$perfil_Foto','$perfil_Foto_Tipo','$perfil_FotoData')");
        if($insertar){
            $insertar = mysqli_query($conexion,"SELECT * FROM profile_pictures WHERE nombre = '$perfil_Foto'");
            $insertar = mysqli_fetch_array($insertar);
            $ImgCod = $insertar["ImgCodigo"];
            
            $insertar = $conexion -> query("UPDATE login SET CodPerfil = '$ImgCod' WHERE usuario = '$user'");
            
        }else{
            echo("<script> alert('error con la integracion'); </script>");
        }
        
    }else{
        $archivo = real_escape_string(file_get_contents('iconoPerfil_default.png'));
        $user = $_POST["user"];

        $insertar = $conexion -> query("INSERT into profile_pictures(nombre,extension,archivo)
        values('iconoPerfil_default','image/png','$archivo')");
        if($insertar){
            //iconoPerfil_default
            $insertar = mysqli_query($conexion, "SELECT MAX(ImgCodigo) AS ImgCodigo FROM profile_pictures GROUP BY date(ImgCodigo)");
            $insertar = mysqli_fetch_array($insertar);
            $ImgCod = $insertar["ImgCodigo"];
            //echo("<script> alert('$ImgCod') </script>");
            $insertar = $conexion -> query("UPDATE login SET CodPerfil = '$ImgCod' WHERE usuario = '$user'");
            
        }
        
    }
    $nombre = $_POST["Nombre"];
    if($_POST["Nombre2"]!=null){
        $nombre2 = $_POST["Nombre2"];
    }
    $apellido = $_POST["Apellido"];
    if($_POST["Apellido2"]!=null){
        $apellido2 = $_POST["Apellido2"];
    }
    if($_POST["telefono"]!=null){
        $telefono = $_POST["telefono"];
    }

    $insertar = $conexion -> query("INSERT into infousuario(idInfo,nombre,apellido,nombre2,apellido2,Telefono)
    values('$ImgCod','$nombre','$apellido','$nombre2','$apellido2','$telefono')");
    //
    $est=true;
	$queri = "UPDATE login SET EstadoDeConexion = '$est' WHERE usuario = '$user'";
    $conexion -> query($queri);
    //
    $_SESSION['Usuario'] = $user;
    //
    echo("<script> window.location='principal.php'</script>");
    exit;
}
if(isset($_POST["ver"])){
    //echo("<script> alert('nice'); window.location='PerfilConf.html'</script>");

}
$conexion -> close();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <title>Datos Iniciales</title>
    <meta charset="UTF-8">
    <meta http-equiv="Expires" content="0">
    <meta http-equiv="Last-Modified" content="0">
    <meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
    <meta http-equiv="Pragma" content="no-cache">

    <link rel="stylesheet" href="estilos.css">
    <link rel="shortcut icon" type="image/x-icon" href="icon.ico" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="shortcut icon" type="image/x-icon" href="icon.ico" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!--===============================================================================================-->
</head>

<body>

    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login200">
                <div class="login100-pic js-tilt" data-tilt>
                    <img src="I-COM-B.gif" alt="Funny image">
                </div>

                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data" class="login100-form validate-form">
                    <span class="login100-form-title">
                        Datos Iniciales
                    </span>

                    <div class="wrap-input100 validate-input" data-validate="Se Requiere El Usuario">
                        <input type="text" style="display: none;" name="user" value="<?php echo $_GET['usuar']; ?>" >
                        <label style="color:black;" class="let">Seleccione su imagen de perfil: </label>
                        <input type="file" id="fileImg" name="fileImg"> <br>
                        <label style="color:black;" class="let">Primer nombre: </label>
                        <input type="text" id="Nom" name="Nombre" required><p>*</p>
                        <label style="color:black;" class="let">Segundo nombre: </label>
                        <input type="text" id="Nom2" name="Nombre2">
                        <br><br>
                        <label style="color:black;" class="let">primer apellido: </label>
                        <input type="text" id="Ape" name="Apellido" required><p>*</p>
                        <label style="color:black;" class="let">segundo apellido: </label>
                        <input type="text" id="Ape2" name="Apellido2">
                        <br><br>
                        <label style="color:black;" class="let">telefono: </label>
                        <input type="text" id="tel" name="telefono">
                        <br><br>
                        <input class="login100-form-btn" type="submit" value="Actualizar Info" name="actualizarInfo">
                    </div>

                    <!--<div class="text-center p-t-12">
						<span class="txt1">
							Forgot
						</span>
						<a class="txt2" href="#">
							Username / Password?
						</a>
					</div>-->

                    <div class="text-center p-t-136">
                        <a class="txt2" href="index.html">
                            Volver Atras
                            <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
                        </a>
                    </div>
                </form>

            </div>
        </div>
    </div>




    <!--===============================================================================================-->
    <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/bootstrap/js/popper.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/tilt/tilt.jquery.min.js"></script>
    <script>
        $('.js-tilt').tilt({
            scale: 1.1
        })
    </script>
    <!--===============================================================================================-->
    <script src="js/main.js"></script>

</body>

</html>


<!--<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
            para evitar errores con el cache
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
             enctype=“multipart/form-data” 
            <form action="" method="POST" enctype="multipart/form-data">
                <input type="text" style="display: none;" name="user" value="" >
                <label class="let">Seleccione su imagen de perfil: </label>
                <input type="file" id="fileImg" name="fileImg"> <br>
                <label class="let">Primer nombre: </label>
                <input type="text" id="Nom" name="Nombre" required><p>*</p>
                <label class="let">Segundo nombre: </label>
                <input type="text" id="Nom2" name="Nombre2">
                <br><br>
                <label class="let">primer apellido: </label>
                <input type="text" id="Ape" name="Apellido" required><p>*</p>
                <label class="let">segundo apellido: </label>
                <input type="text" id="Ape2" name="Apellido2">
                <br><br>
                <label class="let">telefono: </label>
                <input type="text" id="tel" name="telefono">
                <br><br>
                <input type="submit" value="actualizar Info" name="actualizarInfo">
            </form>
            <br>
            <form action="PerfilConf.php" method="POST">
                <input type="submit" value="ver" name="ver">
            </form>
        </div>
    </body>
</html>-->