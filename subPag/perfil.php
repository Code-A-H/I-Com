<?php 
session_start();

?>

<!DOCTYPE html>

<html lang="es">
    <head>
        <meta charset="utf-8" />
        <title>Perfil I-COM</title>
        <link href="perf.css" rel="stylesheet" />
    </head>
    <body>
        <img src="" >
        <div>
            <h2>visualizacion del perfil</h2><br>
            <form>
                <label>nombre de usuario: </label>
                <input type="text" value = <?php echo $_SESSION['Usuario']; ?> >
                <br>
                <label>Telefono actual: </label>
                <input type="tel" value = <?php echo $_SESSION['telefono']; ?> >
                <div class="inst">
                    <label>Correo institucional:</label>
                    <input type="email" value= <?php echo $_SESSION['correoIns'] ?> />
                </div>
                <div class="emp">
                    <label>Correo empresarial:</label>
                    <input type="email" value= <?php echo $_SESSION['correoEmp'] ?> />
                </div>
                <button type="submit">Actualizar info</button>
            </form>
        </div>
    </body>
</html>