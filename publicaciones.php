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
    <title>Publicaciones</title>

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/publicaciones.css">
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
            <li><a href="DataBase/php/logout.php">Cerrar Sesion</a></li>
        </ul>

    </div>
</nav>    

<!-- Sub Menu 2 -->
<div class="container-subMenu2">
    <div class="items-subMenu2">
        <ul>
            <li><a href=""><p>INICIO</p></a></li>
            <li><a href=""><p>PUBLICACIONES</p></a></li>
            <li><a href="perfil.php"><p>MI PERFIL</p></a></li>
        </ul>
    </div>
</div>

<!-- SECCION DE LAS PUBLICACIONES -->
<div class="container-publicaciones">

    <!-- Publicaciones de los Usuarios -->
    <section class="container-publicUser">
        <!-- Info del Usuario-->
        <div class="myPublicar">

            <?php

            /* Traer información del Usuario al que inició la Session */
            if (isset($_SESSION['idUser'])){

            $query = " SELECT id, userName, photoProfile FROM users WHERE id = '".$_SESSION['idUser']."'";
            $resultado = mysqli_query($conexionDB, $query);

            $filas = mysqli_fetch_array($resultado);

            ?>

            <ul>
                <li><img src="DataBase/img/userPhoto/<?php echo $filas['photoProfile']; ?>"></li>
                <li><p><?php echo $filas['userName']; ?></p></li>
            </ul>
            <?php
            }
            ?>

            <!-- Caja para realizar el comentario -->
            <form method="POST" enctype="multipart/form-data" action="DataBase/php/publicationUser.php">
                <textarea name="description" id="comentUser" placeholder="Haz tu publicación..." required></textarea>

                <!-- Botones -->
                <div class="options-user">
                    <div class="file-icon" id="attachment"><i class="fas fa-image"></i></div>
                        <input name="imagePublication" id="file-input" type="file" style="display:none" multiple/>

                        <input type="submit" name="Publicar" value="PUBLICAR">
                </div>
            </form>

        </div>
        
        <?php
        /* Traer todas la Publicaciones Realizadas */

        $queryPublications = "SELECT * FROM publications";

        $ejecutar = mysqli_query($conexionDB, $queryPublications);

        while($filasPublication = mysqli_fetch_array($ejecutar)){


        ?>
        
        <!-- PUBLICACIONES DE USUARIOS -->
        <!-- Info del Usuario -->
        <div class="publicaciones-users">

            <div class="info-user-publicacion">

                <?php 
                /* Traer nombre y foto del usuario que realizó la publicación */

                    $sql = "SELECT userName, photoProfile FROM users 
                            INNER JOIN publications 
                            WHERE '".$filasPublication['id_users']."' = users.id ";

                    $ejecutarsql = mysqli_query($conexionDB, $sql);

                    $userData = mysqli_fetch_array($ejecutarsql);

                ?>

                <img src="DataBase/img/userPhoto/<?php echo $userData['photoProfile']; ?>">
                <ul>
                    <li><p><?php echo $userData['userName']; ?></p></li>
                    <li><p>Hace 40 min.</p></li>
                </ul>
                <ul class="user-insignias">
                    <li><i class="fab fa-sketch"></i></li>
                    <li><i class="fab fa-jedi-order"></i></li>
                    <li><i class="fab fa-galactic-senate"></i></li>
                </ul>
            </div>
            <!-- Texto de la Publicacion -->
            <div class="descripcion-public">
                <p><?php echo $filasPublication['descriptionPublication']; ?></p>
            </div>
            <!-- Imagen de la Publicacion -->
            <div class="image-public">

                <img src="DataBase/img/publicationUser/<?php echo $filasPublication['imagePublication']; ?>">
            </div>

            <!-- Opciones de la publicacion-->
            <div class="opciones-public">
                <ul>
                    <li><i class="far fa-heart"></i><p>12</p></li>

                    <!-- BOTON PARA ABRIR LA CAJA DE COMENTARIOS DE LA PUBLICACION -->
                    <li><button id="btnComments" onclick="mostrarComment()"><i class="far fa-comment"></i></button><p>4</p></li>
                </ul>
            </div>

        </div>

        <!-- CONTENEDOR DE LOS COMENTARIOS-->
        <div class="container-comment" id="comments-users">
            <div class="myComment-user">

                <!-- BOTON PARA CERRAR LOS COMENTARIOS CUANDO ESTA EN RESPONSIVE -->
                <button id="btnCerrar-comments" onclick="cerrarCommentsInResponsive()"><i class="fas fa-chevron-up"></i></button>
                
                <!-- CAJA PARA REALIZAR EL COMENTARIO -->
                <ul>
                    <li><img src="img/f8de62d1757fea74c38e5ec4a53d8e04.jpg" alt=""></li>
                    <li><textarea name="" id="comment-user" placeholder="Escribe tu comentario..."></textarea></li>
                    
                    <li><a href="#"><i class="fas fa-paper-plane"></i></a></li>
                </ul>   
                
                <!-- COMENTARIOS DE OTROS USUARIOS -->
                <div class="othersComment-user">
                    <ul>
                        <li><img src="img/uwp1350848.jpeg" alt=""></li>
                        <ul>
                            <li>Koalita</li>
                            <li>Lorem ipsum dolor sit amet consectetur adipisicing elit.</li>
                        </ul>

                    </ul>
                </div>
                <div class="othersComment-user">
                    <ul>
                        <li><img src="img/uwp1350848.jpeg" alt=""></li>
                        <ul>
                            <li>Koalita</li>
                            <li>Lorem ipsum dolor sit amet consectetur adipisicing elit.</li>
                        </ul>

                    </ul>
                </div>
                <div class="othersComment-user">
                    <ul>
                        <li><img src="img/f8de62d1757fea74c38e5ec4a53d8e04.jpg" alt=""></li>
                        <ul>
                            <li>lrDemon</li>
                            <li>Lorem ipsum dolor sit amet consectetur adipisicing elit.</li>
                        </ul>

                    </ul>
                </div>            
            </div>
        </div>
        <?php 
        };
        ?>

    </section>


    <aside class="container-rankingWaifu"></aside>
</div>

<!-- FOOTER -->
<footer>

    <div class="container-footer">
        <div class="items-footer">

            <div class="textItems-footer">
                <ul>
                    <li><h2>Información Relacionada</h2></li>
                    <li><a href=""><p>Política de Privacidad</p></a></li>
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
                    <li><p>© 2022 Todos los Derechos Reservados</p></li>
                </ul>
            </div>
        </div>
        

    </div>

</footer>


    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/fileIcon.js"></script>
    <script src="js/displayComments.js"></script>
</body>
</html>