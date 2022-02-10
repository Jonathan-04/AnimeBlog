<?php

/* Iniciar Session */
require_once 'conexionDB.php';

if(isset($_SESSION['sessionUser'])){

    header("Location: ../../publicaciones.php");
}



    /* Crear variables para traer los Datos ingresados por el Usuario */
    $USER = $_POST['user'];
    $PASSWORD = $_POST['password'];

    /* Realizar consulta en la BD para traer el nombre del Usuario ingresado */
    $query = "SELECT * FROM users WHERE userName = '". $USER. "' ";

    /* Ejecutar consulta */
    $ejecutar = $conexionDB->query($query);

    $filas = mysqli_fetch_assoc($ejecutar);

    /* Tomar la contraseña Hash del usuario en la Consulta */
    $passwordHash = $filas['passwordUser'];

        /* Verificar la contraseña ingresada con la contraseña Hash en la BD */
        if(password_verify($PASSWORD, $passwordHash)){

            $_SESSION['sessionUser'] = true;
            $_SESSION['idUser'] = $filas['id'];

            header("Location: ../../publicaciones.php");

        } else{
            
            echo'
            <script>
                alert("El Correo y/o Contraseña es incorrecto");
                window.location = "../../login.html";
            </script>
        ';
        }

    //mysqli_free_result($ejecutar);
    //mysqli_close($conexionDB);




?>