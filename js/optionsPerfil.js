$(document).ready(function(){


    //$('ul.btn-options li a:first').addClass('active'); //Añadir nueva Clase


    $('.option-datosBasicosUser article').hide(); //Ocultar los Article
    //$('.option-datosBasicosUser article:first').show(); //Mostrar el Primer Article

    $('ul.btn-options li a').click(function(){

        $('ul.btn-options li a').removeClass('active');
        $(this).addClass('active');
        $('.option-datosBasicosUser article').hide();

        //Mostrar los Article
        var activeArticle = $(this).attr('href');
        $(activeArticle).show();
        return false;

    });

});