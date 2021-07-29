const formcrearEmpresa = document.getElementById("formEmpresa")
const btnEnviarempre = document.getElementById("btnEnviarempre")

//  CONEXION AL ARCHIVO PHP PARA EL formcrearEmpresa DE CREAR INSUMOS 
btnEnviarempre.addEventListener("click", (e) => {
    e.preventDefault();

    const dato = new FormData(formcrearEmpresa);

    fetch("../../php/admin/crearEmpresa.php", {
        method:"POST",
        body:dato

    }).then(res => res.text()).then(info => {
        /* alert(info) */
        if(info == 1){
            Swal.fire({
                title: 'Advertencia!',
                text: 'El correo ya existe.',
                icon: 'warning',
                confirmButtonText: 'Continuar'
            })
            /* formcrearEmpresa.reset() */

        }else if(info == 2){
            Swal.fire({
                title: 'Advertencia!',
                text: 'El telefono ya esta registrado',
                icon: 'warning',
                confirmButtonText: 'Continuar'
            })

        }else if(info == 3){
            Swal.fire({
                title: 'Registrado!',
                text: 'LA EMPRESA FUE REGISTRADA CORRECTAMENTE.',
                icon: 'success',
                confirmButtonText: 'Continuar'
                
            })
            formcrearEmpresa.reset()
        }else if(info == 4){
            Swal.fire({
                title: 'Advertencia!',
                text: 'EL NIT YA EXISTE',
                icon: 'warning',
                confirmButtonText: 'Continuar'
            })

        }else if(info == 5){
            Swal.fire({
                title: 'Advertencia!',
                text: 'Llena el formulario correctamente',
                icon: 'warning',
                confirmButtonText: 'Continuar'
            })

        }else if(info == 6){
            Swal.fire({
                title: 'Advertencia!',
                text: 'Verifica que el correo este correctamente',
                icon: 'warning',
                confirmButtonText: 'Continuar'
            })

        }else if(info == 7){
            Swal.fire({
                title: 'Advertencia!',
                text: 'El campo NIT-DOCUMENTO debe ser mayor a 8 digitos y menor a 10',
                icon: 'warning',
                confirmButtonText: 'Continuar'
            })

        }else{
            Swal.fire({
                title: 'Ups algo salio mal!',
                text: 'Verifica que no hallan datos vacios.',
                icon: 'warning',
                confirmButtonText: 'Continuar'
                
            })
            formcrearEmpresa.reset()
        }
        
    })
})





/* nit documento */
var nitDocument=  document.getElementById('nitDocumentE');
nitDocument.addEventListener('input',function(){
  if (this.value.length > 11) 
     this.value = this.value.slice(0,11); 
})

/* nombre empresa */
var nombreEmpresa = document.getElementById('nombreEmpresa');
nombreEmpresa.addEventListener('input',function(){
    if (this.value.length > 15) 
       this.value = this.value.slice(0,15); 
})

/* nombre empleado */
var nomEmpleEmple = document.getElementById('nomEmpleEmple');
nomEmpleEmple.addEventListener('input',function(){
    if (this.value.length > 15) 
       this.value = this.value.slice(0,15); 
})

/* telefono empresa */
var telefonoempre = document.getElementById('telefonoempre');
telefonoempre.addEventListener('input',function(){
    if (this.value.length > 10) 
       this.value = this.value.slice(0,10); 
})


/* correo empresa */
var correoempre = document.getElementById('correoempre');
correoempre.addEventListener('input',function(){
    if (this.value.length > 60) 
       this.value = this.value.slice(0,60); 
})





function soloLetras(e) {
var key = e.keyCode || e.which,
    tecla = String.fromCharCode(key).toLowerCase(),
    letras = " áéíóúabcdefghijklmnñopqrstuvwxyz",
    especiales = [8, 37, 39, 46],
    tecla_especial = false;

for (var i in especiales) {
    if (key == especiales[i]) {
    tecla_especial = true;
    break;
    }
}

if (letras.indexOf(tecla) == -1 && !tecla_especial) {
    return false;
}
}
