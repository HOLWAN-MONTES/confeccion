// VARIABLES PARA EL FORMULARIO DE CREAR MAQUINARIA
const formMaqui = document.getElementById("form_crear_maqui")
const enviarMaqui = document.getElementById("enviar_maqui")

//  CONEXION AL ARCHIVO PHP PARA EL formMaqui DE CREAR INSUMOS 
enviarMaqui.addEventListener("click", (e) => {
    e.preventDefault()

    const dato = new FormData(formMaqui)

    fetch("../../php/admin/created_maquinaria.php", {
        method:"POST",
        body:dato
    }).then(res => res.text()).then(info => {
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
                title: 'Advertencia!',
                text: 'Por favor rellena el formulario correctamente o verifica que no hallan datos vacios.',
                icon: 'warning',
                confirmButtonText: 'Continuar'
            })

        }
        else{
            Swal.fire({
                title: 'Registrado!',
                text: 'Se registro la maquina.',
                icon: 'success',
                confirmButtonText: 'Continuar'
                
            })
            formMaqui.reset()
        }
    })
})