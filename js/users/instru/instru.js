const contenedor_one = document.getElementById('ventana_one');
const btn_ventana_one = document.getElementById('one');

const contenedor_two = document.getElementById('ventana_two');
const btn_ventana_two = document.getElementById('two');

const contenedor_tres = document.getElementById('ventana_tres');
const btn_ventana_tres = document.getElementById('tres');

const contenedor_cuatro = document.getElementById('ventana_cuatro');
const btn_ventana_cuatro = document.getElementById('cuatro');

btn_ventana_one.addEventListener("click",function(){
    contenedor_one.style.display="block";
})

btn_ventana_two.addEventListener("click",function(){
    contenedor_two.style.display="block";
})

btn_ventana_tres.addEventListener("click",function(){
    contenedor_tres.style.display="block";
})

btn_ventana_cuatro.addEventListener("click",function(){
    contenedor_cuatro.style.display="block";  
})