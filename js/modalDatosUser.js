let modal = document.getElementById('Mimodal');
let flex = document.getElementById('flex');
let abrir = document.getElementById('btn-editarDatos');
let cerrar = document.getElementById('close');

// APARIENCIA
let modal2 = document.getElementById('Mimodal2');
let abrir2 = document.getElementById('btn-editarApariencia');


abrir.addEventListener('click', function(){

    modal.style.display = 'block';
    
});

cerrar.addEventListener('click', function(){

    modal.style.display = 'none';
});

// APARIENCIA

abrir2.addEventListener('click', function(){

    modal2.style.display = 'block';
    
});






