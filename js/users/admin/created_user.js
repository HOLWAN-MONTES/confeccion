// VARIABLES PARA EL PRIMER FORMULARIO
const formulario = document.getElementById("crear_usuario")
const enviar = document.getElementById("reg")

// VARIABLES PARA EL FORMULARIO DE CREAR TIPO DE DOCUMENTO 
const from_tip = document.getElementById("tipo_usuario")
const btn_crear = document.getElementById("crear_btn")

//  CONEXION AL ARCHIVO PHP PARA EL FORMULARIO CREAR USUARIO
enviar.addEventListener("click", (e) => {
    e.preventDefault()

    const dato = new FormData(formulario)

    fetch("../../php/admin/created.php", {
        method:"POST",
        body:dato
    }).then(res => res.text()).then(info => {
        if (info == 1) {
            alert("Usuario creado existosamente")
            formulario.reset()
        }else if(info == 2){
            alert("EL usuario ya existe,verifica tu documento")
            formulario.reset()
        }else {
            alert('Llene los campos correctamente ');
        }
    })
})

// CONEXION AL ARCHIVO PHP PARA EL FORMULARIO CREAR TIPO USUARIO

btn_crear.addEventListener("click", (e) => {
    e.preventDefault()

    const dato = new FormData(from_tip)

    fetch("../../php/admin/tipo_usuario.php", {
        method:"POST",
        body:dato
    }).then(res => res.text).then(info => {

        if ( info == 1){
            alert("Tipo de usuario se creo existosamente")
            from_tip.reset()
        }else {

            alert("error al crear el tipo de usuario ")
        }
    })
})