function mostrarComment(){

    var cajaComments = document.getElementById("comments-users");

    if (cajaComments.style.display === "block") {

        cajaComments.style.display = "none";

    } else {

        cajaComments.style.display = "block";

    }
}

/* CERRAR CAJA DE COMENTARIOS EN RESPONSIVE */
function cerrarCommentsInResponsive(){

    var cerrarComments = document.getElementById("comments-users");

    cerrarComments.style.display = "none";

}

