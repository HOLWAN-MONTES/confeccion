//VARIABLES PARA EL FORMULARIO DE MATERIAL TEXTIL
const formMaterial = document.getElementById("crear_material")
const enviarMate = document.getElementById("material_tex")

//CONEXION AL ARCHIVO PHP PARA EL FORMULARIO DE MATERIAL TEXTIL
enviarMate.addEventListener('click', (e)=>{
    e.preventDefault()
    
    const formular = new FormData(formMaterial)
    fetch("../../php/admin/crear_tela.php", {
        method:"POST",
        body:formular
    })
    .then(res => res.text()).then(info => {
        if(info == 1){
            Swal.fire({
                title: 'Registrado!',
                text: 'Se registro el material textil',
                icon: 'success',
                confirmButtonText: 'Continuar'
            })
            document.querySelectorAll('.formulario__grupo-correcto_mate').forEach((icono_mate) => {
                icono_mate.classList.remove('formulario__grupo-correcto_mate');
            });
            formMaterial.reset()
        }else if(info == 2){
            Swal.fire({
                title: 'Error!',
                text: 'El material textil ya existe',
                icon: 'error',
                confirmButtonText: 'Continuar'
            })
           
        }else if(info == 3){
            
            Swal.fire({
                title: 'Advertencia!',
                text: 'Por favor rellena el formulario correctamente.',
                icon: 'warning',
                confirmButtonText: 'Continuar'
            })
          
        }
    })
})

//VARIABLES PARA EL FORMULARIO DE TIPO DE TELA
const formTipo_tela = document.getElementById("crear_tela_textil")
const enviarTipo = document.getElementById("reg_telas")

//CONEXION AL ARCHIVO PHP PARA EL FORMULARIO DE TIPO DE TELA
enviarTipo.addEventListener("click", (e) => {
    e.preventDefault()
    
    const inserta = new FormData(formTipo_tela)
    fetch("../../php/admin/tipo_tela.php",{
        method:"POST",
        body:inserta
    })
    .then(res => res.text()).then(info => {
        if(info == 1){
            Swal.fire({
                title: 'Error!',
                text: 'El tipo de tela ya existe.',
                icon: 'error',
                confirmButtonText: 'Continuar'
            })
            formTipo_tela.reset()
        }else if(info == 2){
            Swal.fire({
                title: 'Advertencia!',
                text: 'Por favor rellena el formulario correctamente.',
                icon: 'warning',
                confirmButtonText: 'Continuar'
            })

        }
        else{
            Swal.fire({
                title: 'Registrado!',
                text: 'Se registro el tipo de tela.',
                icon: 'success',
                confirmButtonText: 'Continuar'
                
            })
            formTipo_tela.reset()
        }
    })
})

//CONEXION AL ARCHIVO PHP CON EL FORMLARIO DE COLOR
const registrarColor = document.getElementById('registrarColor') 
const btnColor = document.getElementById('ingresar_color')

btnColor.addEventListener('click', (e) => {
    e.preventDefault()
    
    const formul_color = new FormData(registrarColor)

    fetch("../../php/admin/color.php", {
        method:"POST",
        body:formul_color
    })
    .then(res => res.text()).then(info => {
        if(info == 1){
            Swal.fire({
                title: 'Error!',
                text: 'El color ya existe.',
                icon: 'error',
                confirmButtonText: 'Continuar'
            })
            registrarColor.reset()
        }else if(info == 2){
            Swal.fire({
                title: 'Advertencia!',
                text: 'Por favor rellena el formulario correctamente.',
                icon: 'warning',
                confirmButtonText: 'Continuar'
            })
        }
        else{
            Swal.fire({
                title: 'Registrado!',
                text: 'Se registro el color.',
                icon: 'success',
                confirmButtonText: 'Continuar'
                
            })
            registrarColor.reset()
        }
    })

})

//CONEXION AL ARCHIVO PHP CON EL FORMLARIO DE TIPO DE MAQUINARIAS
const registrarMaquina = document.getElementById('crearTipo_maquinaria')
const btnMaquinaria = document.getElementById('reg_maquina')

btnMaquinaria.addEventListener('click', (e) => {
    e.preventDefault()

    const formMaqui = new FormData(registrarMaquina)

    fetch("../../php/admin/tipo_maquinaria.php", {
        method:"POST",
        body:formMaqui
    })
    .then(res => res.text()).then(info => {
        if(info == 1){
            Swal.fire({
                title: 'Error!',
                text: 'El tipo de maquinaria ya existe.',
                icon: 'error',
                confirmButtonText: 'Continuar'
            })
            registrarMaquina.reset()

        }else if(info == 2){
            Swal.fire({
                title: 'Advertencia!',
                text: 'Por favor rellena el formulario correctamente.',
                icon: 'warning',
                confirmButtonText: 'Continuar'
            })

        }
        else{
            Swal.fire({
                title: 'Registrado!',
                text: 'Se registro el tipo de maquinaria.',
                icon: 'success',
                confirmButtonText: 'Continuar'
                
            })
            registrarMaquina.reset()
        }
    })
})

//CONEXION AL ARCHIVO PHP CON EL FORMLARIO DE MARCA DEL MATERIAL TEXTIL
const crearMarca_textil = document.getElementById('regMarcaMate')
const regisMarca_tex = document.getElementById('enviar_marcaMater')

regisMarca_tex.addEventListener('click', (e) => {
    e.preventDefault()

    const formMarcaM = new FormData(crearMarca_textil)

    fetch("../../php/admin/marca_textil.php", {
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
            crearMarca_textil.reset()
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
            crearMarca_textil.reset()
        }
    })

})


//VALIDACION DEL FORMULARIO DE MATERIAL TEXTIL

const ingre_material = document.getElementById("crear_material")
const inputs_mate = document.querySelectorAll("#crear_material input")

const expresiones_mate = {
    nombre_mate: /^[a-zA-Z0-9\s]{4,16}$/, // Letras y espacios, pueden llevar acentos.
    metraje: /^\d{2,5}$/ // 2 a 5 numeros.  
}

const formularioTela = (e) =>{
    switch (e.target.name){
        case "nombre_tela":
            if(expresiones_mate.nombre_mate.test(e.target.value)){
                document.getElementById('grupo__nombre_mate').classList.remove('formulario__grupo-incorrecto_mate');
                document.getElementById('grupo__nombre_mate').classList.add('formulario__grupo-correcto_mate');
                document.querySelector('#grupo__nombre_mate i').classList.add('fa-check-circle');
                document.querySelector('#grupo__nombre_mate i').classList.remove('fa-times-circle');
                document.querySelector('#grupo__nombre_mate .formulario__input-error_mate').classList.remove('formulario__input-error-activo_mate');
                enviarMate.disabled = false;
            }else{
                document.getElementById('grupo__nombre_mate').classList.add('formulario__grupo-incorrecto_mate');
                document.getElementById('grupo__nombre_mate').classList.remove('formulario__grupo-correcto_mate');
                document.querySelector('#grupo__nombre_mate i').classList.add('fa-times-circle');
                document.querySelector('#grupo__nombre_mate i').classList.remove('fa-check-circle');
                document.querySelector('#grupo__nombre_mate .formulario__input-error_mate').classList.add('formulario__input-error-activo_mate');
                enviarMate.disabled = true;
            }
        break;
        case "metraje":
            if(expresiones_mate.metraje.test(e.target.value)){
                document.getElementById('grupo__metraje_mate').classList.remove('formulario__grupo-incorrecto_mate');
                document.getElementById('grupo__metraje_mate').classList.add('formulario__grupo-correcto_mate');
                document.querySelector('#grupo__metraje_mate i').classList.add('fa-check-circle');
                document.querySelector('#grupo__metraje_mate i').classList.remove('fa-times-circle');
                document.querySelector('#grupo__metraje_mate .formulario__input-error_mate').classList.remove('formulario__input-error-activo_mate');
                enviarMate.disabled = false;
            }else{
                document.getElementById('grupo__metraje_mate').classList.add('formulario__grupo-incorrecto_mate');
                document.getElementById('grupo__metraje_mate').classList.remove('formulario__grupo-correcto_mate');
                document.querySelector('#grupo__metraje_mate i').classList.add('fa-times-circle');
                document.querySelector('#grupo__metraje_mate i').classList.remove('fa-check-circle');
                document.querySelector('#grupo__metraje_mate .formulario__input-error_mate').classList.add('formulario__input-error-activo_mate');
                enviarMate.disabled = true;
            }
        break;
    }
}

inputs_mate.forEach((input) => {
    input.addEventListener('keyup', formularioTela);
    input.addEventListener('blur', formularioTela);
});





