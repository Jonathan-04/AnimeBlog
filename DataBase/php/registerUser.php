<?php

    include 'conexionDB.php';

    $USER = $_POST["user"];
    $EMAIL = $_POST["email"];
    $PASSWORD = $_POST["password"];

    $password_encryp = password_hash($PASSWORD, PASSWORD_DEFAULT);


    $query = "INSERT INTO users (userName, email, passwordUser) VALUES ('$USER','$EMAIL','$password_encryp')";
    
    $ejecutar = mysqli_query($conexionDB, $query);

    if($ejecutar){

        echo'
        <script>
            alert("Se ha registrado correctamente");
            window.location = "../../login.php";
        </script>
    ';
    } else{

        echo'
        <script>
            alert("No se ha registrado, intentalo nuevamente");
            window.location = "../../register.html";
        </script>
    ';

    }

    mysqli_close($conexionDB);

?>