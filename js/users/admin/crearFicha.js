const formcrearficha = document.getElementById("formcrearficha")
const btnEnviarficha = document.getElementById("btnEnviarficha")

//  CONEXION AL ARCHIVO PHP PARA EL formcrearficha DE CREAR INSUMOS 
btnEnviarficha.addEventListener("click", (e) => {
    e.preventDefault();

    const dato = new FormData(formcrearficha);

    fetch("../../php/admin/crearFicha.php", {
        method:"POST",
        body:dato

    }).then(res => res.text()).then(info => {
        /* alert(info) */
        if(info == 1){
            Swal.fire({
                title: 'Advertencia!',
                text: 'Llene los campos correctamente.',
                icon: 'warning',
                confirmButtonText: 'Continuar'
            })
            /* formcrearficha.reset() */

        }else if(info == 2){
            Swal.fire({
                title: 'Advertencia!',
                text: 'El campo NIT-DOCUMENTO debe ser mayor a 8 digitos y menor a 10',
                icon: 'warning',
                confirmButtonText: 'Continuar'
            })

        }else if(info == 3){
            Swal.fire({
                title: 'Registrado!',
                text: 'LA FICHA FUE CREADA CORRECTAMENTE',
                icon: 'success',
                confirmButtonText: 'Continuar'
                
            })
            formcrearficha.reset()
        }else if(info == 4){
            Swal.fire({
                title: 'Advertencia!',
                text: 'LA FICHA YA ESTA CREADA',
                icon: 'warning',
                confirmButtonText: 'Continuar'
            })

        }else if(info == 5){
            Swal.fire({
                title: 'Advertencia!',
                text: 'VERIFICA QUE NO HAYA NADA CREADO',
                icon: 'warning',
                confirmButtonText: 'Continuar'
            })

        }else{
            Swal.fire({
                title: 'Ups algo salio mal!',
                text: 'El nit ya esta creado',
                icon: 'warning',
                confirmButtonText: 'Continuar'
                
            })
            formcrearficha.reset()
        }
        
    })
})




var InpNumFicha=  document.getElementById('InpNumFicha');
InpNumFicha.addEventListener('input',function(){
  if (this.value.length > 11) 
     this.value = this.value.slice(0,11); 
})