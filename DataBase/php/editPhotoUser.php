<?php

session_start();
include 'conexionDB.php';

if(isset($_POST['ActualizarPH'])){


    $tmp_name = $_FILES['photoProfile']['type'];
    $archivo = $_FILES['photoProfile']['tmp_name'];
    $nombreArchivo =$_FILES['photoProfile']['name'];
    
    $ruta = '../../DataBase/img/userPhoto/'.$nombreArchivo;
    
    move_uploaded_file($archivo,$ruta);
    $array = explode('.',$ruta);
    
    
        $query2 = "UPDATE users SET
                   photoProfile=\"$nombreArchivo\" WHERE id =".$_SESSION['idUser'];
    
        $ejecutar2 = mysqli_query($conexionDB, $query2);
    
        if($ejecutar2){
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

?>