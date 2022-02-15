<?php 

include 'conexionDB.php';
session_start();


if($_POST['insertComment']){

    $comment = $_POST['commentUser'];
    $IDUSER = $_SESSION['idUser'];

$query = "INSERT INTO comments_users (comment, dateComment, id_users, id_publications) 
          VALUES ('$comment', now(), '$IDUSER', '".$_GET['idPublic']."' ) ";

$ejecutar = mysqli_query($conexionDB, $query);

if($ejecutar){

    echo'
        <script>
            alert("Comentario Realizado");
            window.location = "../../publicaciones.php";
        </script>
    ';
}else{

    echo'
        <script>
            alert("No se pudo realizar el Comentario");
            window.location = "../../publicaciones.php";
        </script>
    ';

    }
}
?>