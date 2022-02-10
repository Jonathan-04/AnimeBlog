<?php 

session_start();
include 'conexionDB.php';

if(!empty($_POST['ActualizarDB'])){

    if(isset($_POST['nameUser'])
    &&isset($_POST['surNames'])
    &&isset($_POST['userName'])
    &&isset($_POST['email'])
    &&isset($_POST['gender'])){

        if(
            $_POST['nameUser']!=""&&
            $_POST['surNames']!=""&&
            $_POST['userName']!=""&&
            $_POST['email']!=""&&
            $_POST['gender']!=""){

                $query = "UPDATE users SET
                nameUser=\"$_POST[nameUser]\",
                surNames=\"$_POST[surNames]\",
                userName=\"$_POST[userName]\",
                email=\"$_POST[email]\",
                gender=\"$_POST[gender]\"
                WHERE id =".$_SESSION['idUser'];

            $ejecutar = mysqli_query($conexionDB, $query);
            
            if($ejecutar!=null){
                echo'
                    <script>
                        alert("Se actualizaron tus Datos");
                        window.location = "../../perfil.php";
                    </script>
                ';

            }else{

                echo'
                    <script>
                        alert("No se pudo cambiar los Datos");
                        window.location = "../../perfil.php";
                    </script>
                ';
            }
        }
    }
}

?>