<?php 

/* Verificar si hay una Session iniciada */
include 'DataBase/php/conexionDB.php';
session_start();

if(!isset($_SESSION['sessionUser']) || !$_SESSION['sessionUser'] ){

    header("Location: login.php");
}

?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Perfil</title>

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/perfil.css">
    <link rel="stylesheet" href="css/opcionesDatosUser.css">
    <link rel="stylesheet" href="css/modalDatosUser.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

</head>
<body>

<!-- NAVBAR -->
<nav class="navbar">
    <div class="container-navbar">
        <h2>AnimeBlog</h2>
        <ul>
            <li><a href="#"><i class="far fa-bell"></i></a></li>
            <li><a href=""><i class="far fa-comments"></i></a></li>
            <li><a href="index.html">Cerrar Sesion</a></li>
        </ul>
    </div>
</nav>    

<!-- Sub Menu 2 -->
<div class="container-subMenu2">
    <div class="items-subMenu2">
        <ul>
            <li><a href=""><p>INICIO</p></a></li>
            <li><a href="publicaciones.html"><p>PUBLICACIONES</p></a></li>
            <li><a href="perfil.html"><p>MI PERFIL</p></a></li>
        </ul>
    </div>
</div>    

<!-- CONTAINER PERFIL DEL USUARIO -->
<div class="container-userPerfil">
    <div class="image-userPerfil">
        <img src="img/userAccount.png">
    </div>

    <!-- OPCIONES DEL PERFIL USUARIO -->
    <div class="opciones-userPerfil">
        <h2>HOLA! LRDEMON</h2>
        <ul class="btn-options">
            <li><a class="desActive" href="#option1">DATOS BASICOS</a></li>
            <li><a class="desActive" href="#option2">APARIENCIA</a></li>
            <li><a class="desActive" href="#option3">LINKS</a></li>
        </ul>
    </div>
</div>

<!-- SECCIONES DE LAS OPCIONES DESPLEGABLES -->
<div class="option-datosBasicosUser">

    <?php 
    
    if (isset($_SESSION['idUser'])){

    $query = "SELECT * FROM users WHERE id = '".$_SESSION['idUser']."' ";

    $ejecutar = mysqli_query($conexionDB, $query);

    $filas = mysqli_fetch_array($ejecutar);
    
    ?>
    <!-- SECCION DE LA OPCION 1 : DATOS BASICOS -->
    <article id="option1">

    <h2>MIS DATOS</h2>
    <div class="data-optionUser">
        <div class="data-sectionUser">
            <div class="data-User">
                <ul>
                    <li><label>NOMBRE: <?php echo $filas['nameUser']; ?></label></li>
                    <li><label>APELLIDOS: <?php echo $filas['surNames']; ?></label></li>
                </ul>
            </div>
    
            <div class="data-User">
                <ul>
                    <li><label>USUARIO: <?php echo $filas['userName']; ?></label></li>
                    <li><label>EMAIL: <?php echo $filas['email']; ?></label></li>

                    <button id="btn-cambiarContrase??a">Cambiar Contrase??a</button>
                </ul>

                
            </div>
        </div>

        <div class="data-sectionUser">
            <div class="data-User">
                <ul>
                    <li><label>FECHA NACIMIENTO: <?php echo $filas['birthDate']; ?></label></li>
                    <li><label>GENERO: <?php echo $filas['gender']; ?></label></li>
                </ul>

            <div class="data-User">
                <button id="btn-editarDatos">Editar Datos</button>
                
            </div>
            
            </div>
        </div>

    </div>
    </article>

            <!-- MODAL PARA EDITAR INFORMACION DE LA CUENTA -->

            <div id="Mimodal" class="modal">
                <div class="flex" class="flex">
                    <div class="contenido-modal">
                    
                        <div class="modal-header flex">
                            <h1>EDITAR INFORMACION DE LA CUENTA</h1>
                            <span class="close" id="close"><i class="far fa-times-circle"></i></span>
                        </div>
                    
                        <div class="modal-body">
                            <form action="DataBase/php/editInfoUser.php" method="POST">
                                            
                                <div class="infoPersonal">
                    
                                    <h2>DATOS BASICOS</h2>
                    
                                    <div class="datosCuenta">
                    
                                        <ul>
                                            <li>NOMBRE: <input type="text" name="nameUser" value="<?php echo $filas['nameUser']; ?>"></li>
                                            <li>APELLIDOS: <input type="text" name="surNames" value="<?php echo $filas['surNames']; ?>"></li>
                                        </ul>
    
                                        <ul>
                                            <li>USUARIO: <input type="text" name="userName" value="<?php echo $filas['userName']; ?>"></li>
                                            <li>EMAIL <input type="email" name="email" value="<?php echo $filas['email']; ?>"></li>
                                        </ul>
    
                                        <ul>
                                            <li>GENERO: <select name="gender" id="selectGeneroUser">
                                                <option value="Masculino">Masculino</option>
                                                <option value="Femenino">Femenino</option>
                                            </select></li>
                                        </ul>
                    
                                    </div>
                                            
                                    <div class="btn-formulario">
                    
                                        <input type="submit" value="Cancelar" id="btn_cerrar">
                                        <input type="submit" value="Actualizar" id="btn_actualizar" name="ActualizarDB">
                                                    
                                    </div>
                    
                    
                                </div>
                            </form>
                        </div>
                    
                    
                    </div>
                </div>
            </div> 




    <!-- SECCION DE LA OPCION 2 : APARIENCIA -->
    <article id="option2">

        <h2>MI APARIENCIA</h2>

        <div class="data-optionUser">
            <div class="data-sectionUser">
                <div class="data-User">
                    <ul>
                        <!-- FOTO DE PERFIL -->
                        <p>FOTO DE PERFIL</p>
                        <img src="DataBase/img/userPhoto/<?php echo $filas['photoProfile']; ?>">
                    </ul>
                </div>
        
                <!-- INSIGNIAS -->
                <div class="data-User">
                    <p class="insignia-title">INSIGNIAS</p>
                    <ul class="insignias-user">
                        <li><i class="fab fa-sketch"></i></li>
                        <li><i class="fab fa-jedi-order"></i></li>
                        <li><i class="fab fa-galactic-senate"></i></li>
                        <li><i class="fas fa-biohazard"></i></li>
                        <li><i class="fas fa-dice-d20"></i></li>
                        <li><i class="fas fa-hat-wizard"></i></li>
                    </ul>
    
                    <button id="btn-editarApariencia">Editar</button>
                </div>
            </div>
        </div>

    </article>

                <!-- MODAL PARA EDITAR INFORMACION DE LA CUENTA -->

                <div id="Mimodal2" class="modal">
                    <div class="flex" class="flex">
                        <div class="contenido-modal">
                        
                            <div class="modal-header flex">
                                <h1>EDITAR APARIENCIA DE LA CUENTA</h1>
                                <span class="close" id="close"><i class="far fa-times-circle"></i></span>
                            </div>
                        
                            <div class="modal-body">
                                <form action="DataBase/php/editPhotoUser.php" enctype="multipart/form-data" method="POST">
                                                
                                    <div class="infoPersonal">
                        
                                        <h2>APARIENCIA</h2>
                        
                                        <div class="datosCuenta">
                        
                                            <ul>
                                                <li>SELECCIONA TU FOTO: <input id='input-file' name="photoProfile" type='file'/></li>
                                                <li><div id="previewImageUser"></div></li>
                                                <hr>
                                            
                                            </ul>
     
                                        </div>
                                                
                                        <div class="btn-formulario">
                        
                                            <input type="submit" value="Cancelar" id="btn_cerrar">
                                            <input type="submit" value="Actualizar" id="btn_actualizar" name="ActualizarPH">
                                                        
                                        </div>
                        
                        
                                    </div>
                                </form>
                            </div>
                        
                        
                        </div>
                    </div>
                </div> 


    <!-- SECCION DE LA OPCION 3 : LINKS -->
    <article id="option3">
        <h2>MIS LINKS</h2>

        <div class="data-optionUser">
            <div class="data-sectionUser">
                <div class="data-User">
                    <ul class="container-links">
                        <!-- IMAGENES DE LOS LINKS -->
                        <li><label>DISCORD:</label><a href="#"><img src="img/8176530d621c6cc2b8700e67cc7b602e.png"></a></li>
                        <li><label>TELEGRAM:</label><a href="#"><img src="img/736917106a7762fdfc31bd3bc8c9ce74.jpg"></a></li>
                        <li><label>FACEBOOK:</label><a href="#"><img src="img/f01696df929c2f1f2d3373dab334f5b3.jpg"></a></li>
                        
                    </ul>
                    <button id="btn-editarLinks">Editar</button>
                </div>
            </div>
        </div>

    </article>

    <?php 
    }
    ?>

</div>
    

<!-- FOOTER -->
<footer>

    <div class="container-footer">
        <div class="items-footer">

            <div class="textItems-footer">
                <ul>
                    <li><h2>Informaci??n Relacionada</h2></li>
                    <li><a href=""><p>Pol??tica de Privacidad</p></a></li>
                    <li><a href=""><p>Tratamiento de Datos</p></a></li>
                    <li><a href=""><p>Terminos y Condiciones</p></a></li>
                </ul>
            </div>

            <div class="textItems-footer">
                <ul>
                    <li><h2>Redes / Contacto</h2></li>
                    <li><a href="#"><p><i class="fab fa-instagram"></i> @jonathan04_8</p></a></li>
                    <li><p><i class="far fa-envelope"></i> animeblog@gmail.com</p></li>
                </ul>
            </div>

            <div class="image-footer">
                <img src="img/anime_girl_PNG32.png">
            </div>

        </div>

        <div class="end-footer">
            <div class="items-end-footer">
                <ul>
                    <li><p>AnimeBlog</p></li>
                    <li><p>?? 2022 Todos los Derechos Reservados</p></li>
                </ul>
            </div>
        </div>
        

    </div>

</footer>


    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/optionsPerfil.js"></script>
    <script src="js/modalDatosUser.js"></script>
    <script src="js/previweIMG.js"></script>

</body>
</html>