
// VARIABLES PARA EL FORMULARIO DE CREAR INSUMOS
const formInsu = document.getElementById("CrearInsumoForm")
const enviarInsu = document.getElementById("BtnCrearInsumo")

//^ variables para el buscador
const datoBuscador = document.getElementById("buscador-user")
const formBuscador = document.getElementById("form-buscador-user")
const conte_user = document.getElementById("conte-user")

//^ variables para el tipo de usuario de los botones
const admin = document.getElementById("btn_Admin")
const formusuario = document.getElementById("for_Usuario")
const instructor = document.getElementById("bt_instru")
const forminstructor = document.getElementById("form_instructor")
const todos = document.getElementById("todo")
const btn_empresa = document.getElementById("btn_empresa")
const form_empresa = document.getElementById("form_empresa")

//  CONEXION AL ARCHIVO PHP PARA EL FORmInsu DE CREAR INSUMOS 
enviarInsu.addEventListener("click", (e) => {
    e.preventDefault()

    const dato = new FormData(formInsu)

    fetch("../../php/admin/created_insu.php", {
        method:"POST",
        body:dato
    }).then(res => res.text()).then(info => {
        if(info == 1){
            Swal.fire({
                title: 'Error!',
                text: 'El insumo ya existe.',
                icon: 'error',
                confirmButtonText: 'Continuar'
            })
            formInsu.reset()

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
                text: 'Se registro el insumo.',
                icon: 'success',
                confirmButtonText: 'Continuar'
                
            })
            formInsu.reset()
        }
    })
})
const ingre_insumo = document.getElementById("CrearInsumoForm")
const inputs_insu = document.querySelectorAll("#CrearInsumoForm input")

const expresiones_insu = {
    nombre_insu: /^[a-zA-Z0-9\s]{4,16}$/, // Letras y espacios, pueden llevar acentos.
    metraje: /^\d{2,5}$/ // 2 a 5 numeros.  
}

const formularioInsu = (e) =>{
    switch (e.target.name){
        case "nombre_tela":
            if(expresiones_insu.nombre_insu.test(e.target.value)){
                document.getElementById('grupo__nombre_insu').classList.remove('formulario__grupo-incorrecto_insu');
                document.getElementById('grupo__nombre_insu').classList.add('formulario__grupo-correcto_insu');
                document.querySelector('#grupo__nombre_insu i').classList.add('fa-check-circle');
                document.querySelector('#grupo__nombre_insu i').classList.remove('fa-times-circle');
                document.querySelector('#grupo__nombre_insu .formulario__input-error_insu').classList.remove('formulario__input-error-activo_insu');
               
            }else{
                document.getElementById('grupo__nombre_insu').classList.add('formulario__grupo-incorrecto_insu');
                document.getElementById('grupo__nombre_insu').classList.remove('formulario__grupo-correcto_insu');
                document.querySelector('#grupo__nombre_insu i').classList.add('fa-times-circle');
                document.querySelector('#grupo__nombre_insu i').classList.remove('fa-check-circle');
                document.querySelector('#grupo__nombre_insu .formulario__input-error_insu').classList.add('formulario__input-error-activo_insu');
               
            }
        break;
    }
}
inputs_mate.forEach((input) => {
    input.addEventListener('keyup', formularioInsu);
    input.addEventListener('blur', formularioInsu);
});

//^ buscador 

datoBuscador.addEventListener("keyup", (e) => {
    e.preventDefault()  
    const dato = new FormData(formBuscador)

    fetch("../../php/admin/buscador.php", {
        method:"POST",
        body:dato
    }).then(res => res.text()).then(info => {
        console.log(info)
        conte_user.innerHTML=`${info}`
    })
})

//^ busacar por el tipo de usuario

admin.addEventListener("click", (e) => {
    e.preventDefault()

    const dato = new FormData(formusuario)

    fetch("../../php/admin/tipoUsuario.php", {
        method:"POST",
        body:dato
    }).then(res => res.text()).then(info => {
        console.log(info)
        conte_user.innerHTML=`${info}`
    })
})

instructor.addEventListener("click", (e) => {
    e.preventDefault()

    const dato = new FormData(forminstructor)

    fetch("../../php/admin/tipoUsuario.php", {
        method:"POST",
        body:dato
    }).then(res => res.text()).then(info => {
        conte_user.innerHTML=`${info}`
    })
})

btn_empresa.addEventListener("click", (e) => {
    e.preventDefault()

    const dato = new FormData(form_empresa)

    fetch("../../php/admin/tipoUsuario.php", {
        method:"POST",
        body:dato
    }).then(res => res.text()).then(info => {
        conte_user.innerHTML=`${info}`
    })
})

// FUNCION DE ACTUALIZAR 
 
function actualizar() {

    fetch("../../php/admin/actualizar.php", {
        method:"POST"
    }).then(res => res.text()).then(info => {
        conteAct.innerHTML = `${info}`
    })
 
}

todos.addEventListener("click", (e) => {
    
    e.preventDefault()
    actualizar()
})



//CONEXION AL ARCHIVO PHP CON EL FORMLARIO DE TIPO DE INSUMO
const formTipInsu = document.getElementById('fomrTipinsu')
const enviarTipInsu = document.getElementById('btnTipinsu')

enviarTipInsu.addEventListener('click', (e) => {
    e.preventDefault()

    const formMarcaM = new FormData(formTipInsu)

    fetch("../../php/admin/tipo_insumo.php", {
        method:"POST",
        body:formMarcaM
    })
    .then(res => res.text()).then(info => {
        if(info == 1){
            Swal.fire({
                title: 'Error!',
                text: 'La marca del material textil ya existe.',
                icon: 'error',
                confirmButtonText: 'Continuar'
            })
            formTipInsu.reset()
        }else if(info == 2){
            Swal.fire({
                title: 'Advertencia!',
                text: 'Por favor rellena el formulario correctamente.',
                icon: 'warning',
                confirmButtonText: 'Continuar'
            })
            
        }else{
            Swal.fire({
                title: 'Registrado!',
                text: 'Se registro la marca del material textil.',
                icon: 'success',
                confirmButtonText: 'Continuar'
                
            })
            formTipInsu.reset()
        }
    })

})
