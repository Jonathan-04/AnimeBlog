<?php

include 'conexionDB.php';
session_start();

$DESCRIPTION = $_POST['description'];
$IDUSER = $_SESSION['idUser'];

$tmp_name = $_FILES['imagePublication']['type'];
$archivo = $_FILES['imagePublication']['tmp_name'];
$nombreArchivo =$_FILES['imagePublication']['name'];

$ruta = '../../DataBase/img/publicationUser/'.$nombreArchivo;

move_uploaded_file($archivo,$ruta);

$array = explode('.',$ruta);

$query = "INSERT INTO publications (descriptionPublication, imagePublication, datetimePublication, id_users) 
          VALUES ('$DESCRIPTION', '$nombreArchivo', now(), $IDUSER )";

$ejecutar = mysqli_query($conexionDB, $query);

if($ejecutar){

    echo'
        <script>
            alert("Se ha realizado la Publicación");
            window.location = "../../publicaciones.php";
        </script>
    ';
} else{

    echo'
    <script>
        alert("No se publico");
        window.location = "../../publicaciones.php";
    </script>
';
}

?>