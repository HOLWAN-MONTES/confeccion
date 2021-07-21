// VARIABLES PARA EL FORMULARIO DE CREAR MAQUINARIA
const formcrearEmpresa = document.getElementById("formcrearEmpresa")
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
                text: 'Verifica que no hallan datos vacios',
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