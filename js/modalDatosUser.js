let modal = document.getElementById('Mimodal');
let flex = document.getElementById('flex');
let abrir = document.getElementById('btn-editarDatos');
let cerrar = document.getElementById('close');
let btn_cerrar = document.getElementById('btn_cerrar');


abrir.addEventListener('click', function(){

    modal.style.display = 'block';
    
});

cerrar.addEventListener('click', function(){

    modal.style.display = 'none';
});

btn_cerrar.addEventListener('click', function(){

    modal.style.display = 'none';
});







