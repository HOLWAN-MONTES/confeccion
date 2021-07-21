// VARIABLES PARA EL FORMULARIO DE CREAR MAQUINARIA
const formMaqui = document.getElementById("form_crear_maqui")
const enviarMaqui = document.getElementById("enviar_maqui")

//  CONEXION AL ARCHIVO PHP PARA EL formMaqui DE CREAR INSUMOS 
enviarMaqui.addEventListener("click", (e) => {
    e.preventDefault();

    const dato = new FormData(formMaqui);

    fetch("../../php/admin/created_maquinaria.php", {
        method:"POST",
        body:dato

    }).then(res => res.text()).then(info => {
        /* alert(info) */
        if(info == 1){
            Swal.fire({
                title: 'Error!',
                text: 'La maquina ya existe.',
                icon: 'error',
                confirmButtonText: 'Continuar'
            })
            formMaqui.reset()

        }else if(info == 2){
            Swal.fire({
                title: 'Error!',
                text: 'La maquina ya existe.',
                icon: 'error',
                confirmButtonText: 'Continuar'
            })

        }else if(info == 3){
            Swal.fire({
                title: 'Registrado!',
                text: 'Se registro la maquina.',
                icon: 'success',
                confirmButtonText: 'Continuar'
                
            })
            formMaqui.reset()
        }else if(info == 4){
            Swal.fire({
                title: 'Advertencia!',
                text: 'El serial esta repetido.',
                icon: 'warning',
                confirmButtonText: 'Continuar'
                
            })
            formMaqui.reset()
        }else if(info == 5){
            Swal.fire({
                title: 'Advertencia!',
                text: 'Campos vacios, llena los campos correctamente',
                icon: 'warning',
                confirmButtonText: 'Continuar'
                
            })
            formMaqui.reset()
        }
        else{
            Swal.fire({
                title: 'Ups algo salio mal!',
                text: 'Verifica que no hallan datos vacios.',
                icon: 'warning',
                confirmButtonText: 'Continuar'
                
            })
            formMaqui.reset()
        }
        
    })
})