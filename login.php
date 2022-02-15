<?php

include 'DataBase/php/conexionDB.php';
session_start();
if(isset($_SESSION['sessionUser'])){

    header("Location: publicaciones.php");
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/login.css">

</head>
<body>

<!-- CONTAINER DEL LOGIN -->
<div class="container-login">
    <!-- IMAGEN DE FONDO -->
    <div class="container-image-login">
        <p class="image-login"></p>
    </div>
    <!-- FORMULARIO -->
    <form method="POST" enctype="multipart/form-data" action="DataBase/php/loginUser.php">
        <div class="form-login">
            <h2>LOGIN</h2>

            <div class="items-login">
            
                <!-- INPUTS DE DATOS -->
                <h2>USUARIO</h2>
                <input type="text" id="user" name="user">

                <h2>CONTRASEÑA</h2>
                <input type="password" id="password" name="password">

            </div>

            <input type="submit" value="ENTRAR" id="Ingresar" name="Ingresar">

            <p>¿No tienes una cuenta? <a href="register.html">Registrate aquí!</a></p>

        </div>
    </form>
</div>


</body>
</html>