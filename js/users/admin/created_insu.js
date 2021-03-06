
//^ VARIABLES PARA EL FORMULARIO DE CREAR INSUMOS
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

//^ ********************** EMPRESA VARIABLES *********************
const form_empresa = document.getElementById("form_empresa")
const empresa = document.getElementById("form_empresa")
const conte_empresa = document.getElementById("conte_empresa")





//  CONEXION AL ARCHIVO PHP PARA EL FORmInsu DE CREAR INSUMOS 
enviarInsu.addEventListener('click', (e) => {
    e.preventDefault()
    const nom_insu = document.getElementById('NombreInsumo').value;
    const tip_insumo = document.getElementById('tip_insumo').value;
    const marca_insumo = document.getElementById('marca_insumo').value;
    const color_insumo = document.getElementById('color_insumo').value;
    const formInsumo = new FormData(formInsu)

    fetch("../../php/admin/created_insu.php", {
        method:"POST",
        body:JSON.stringify({
            "nombre_insu" : nom_insu,
            "tipo_insumo" : tip_insumo,
            "marcas_insumo" : marca_insumo,
            "colores_insumo" : color_insumo,
            "formu":formInsumo
        })
        // body:formInsumo
    })
    .then(res => res.text()).then(info => {
        console.log(info) 
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
                title: 'Registrado!',
                text: 'Se registro el insumo.',
                icon: 'success',
                confirmButtonText: 'Continuar'
                
            })
            formInsu.reset()
        }else if(info == 3){
            Swal.fire({
                title: 'Advertencia!',
                text: 'No se inserto el insumo',
                icon: 'warning',
                confirmButtonText: 'Continuar'
                
            })
            formInsu.reset()
        }else if(info == 4){
            Swal.fire({
                title: 'Advertencia!',
                text: 'Campos vacios, llena los campos correctamente',
                icon: 'warning',
                confirmButtonText: 'Continuar'
                
            })
            formInsu.reset()
        }
        else{
            Swal.fire({
                title: 'Ups algo salio mal!',
                text: 'Verifica los datos',
                icon: 'warning',
                confirmButtonText: 'Continuar'
                
            })
            formInsu.reset()
        }
        
    })
})
const ingre_insumo = document.getElementById("CrearInsumoForm")
const inputs_insu = document.querySelectorAll("#CrearInsumoForm input")

const expresiones_insu = {
    nombre_insu: /^[a-zA-Z\s]{4,16}$/, // Letras y espacios, pueden llevar acentos.
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
        console.log(info)
        conte_user.innerHTML=`${info}`
    })
})



//^ buscardor de la empresa de usuarios registrado

empresa.addEventListener("click", (e) => {
    e.preventDefault()

    fetch("../../php/admin/empresa.php",{method:"GET"}).then(res => res.text()).then(info => {
        
        conte_user.innerHTML = `${info}`
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
    const inpu_ing_insu = document.getElementById('Inptipinsu').value;
    console.log(inpu_ing_insu)
    const formtipinsumo = new FormData(formTipInsu)

    fetch("../../php/admin/tipo_insumo.php", {
        method:"POST",
        body:JSON.stringify({
            "inpu_tip_ins" : inpu_ing_insu,
            "formu":formtipinsumo
        })
        // body:formtipinsumo
    })
    .then(res => res.text()).then(info => {
        console.log(info) 
        if(info == 1){
            Swal.fire({
                title: 'Error!',
                text: 'EL tipo de insumo ya existe.',
                icon: 'error',
                confirmButtonText: 'Continuar'
            })
            formTipInsu.reset()

        }else if(info == 2){
            Swal.fire({
                title: 'Registrado!',
                text: 'Se registro el tipo de insumo.',
                icon: 'success',
                confirmButtonText: 'Continuar'
                
            })
            formTipInsu.reset()
        }else if(info == 3){
            Swal.fire({
                title: 'Advertencia!',
                text: 'No se inserto el tipo de insumo',
                icon: 'warning',
                confirmButtonText: 'Continuar'
                
            })
            formTipInsu.reset()
        }else if(info == 4){
            Swal.fire({
                title: 'Advertencia!',
                text: 'Campos vacios, llena los campos correctamente',
                icon: 'warning',
                confirmButtonText: 'Continuar'
                
            })
            formTipInsu.reset()
        }
        else{
            Swal.fire({
                title: 'Ups algo salio mal!',
                text: 'Verifica los datos',
                icon: 'warning',
                confirmButtonText: 'Continuar'
                
            })
            formTipInsu.reset()
        }
        
    })
})

const crearMarca_Insumo = document.getElementById('regMarcaInsu')
const regisMarca_insu = document.getElementById('enviar_marcaInsu')

regisMarca_insu.addEventListener('click', (e) => {
    e.preventDefault()

    const formMarcaInsu = new FormData(crearMarca_Insumo)

    fetch("../../php/admin/marca_insumo.php", {
        method:"POST",
        body:formMarcaInsu
    })
    .then(res => res.text()).then(info => {
        if(info == 1){
            Swal.fire({
                title: 'Error!',
                text: 'La marca del insumo ya existe.',
                icon: 'error',
                confirmButtonText: 'Continuar'
            })
            crearMarca_Insumo.reset()
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
                text: 'Se registro la marca del insumo.',
                icon: 'success',
                confirmButtonText: 'Continuar'
                
            })
            crearMarca_Insumo.reset()
        }
    })

})

//^ ******************** EDITAR Y ELIMINAR EMPRESA DE USUSARIOS REGISTRADOS ******************

conte_empresa.style.display="none"

conte_user.addEventListener("click", (e) => {
    e.preventDefault()
    
    const dato = e.path[1].children[0].firstElementChild.innerText
    const accion = e.target.classList[0]
    
    if (accion == "editar" || accion == "eliminar") {

        fetch("../../php/admin/editar_eliminar_empresa.php",{
            method:"POST",
            body:JSON.stringify({
                "documento":dato,
                "accion":accion
            })
        }).then(res => res.text()).then(info => {
            
            if(accion == "editar"){
                conte_empresa.style.display="block"
                conte_empresa.innerHTML = `${info}`
            }else {

                if(info != 2){
                    conte_user.innerHTML = `${info}`
                }else {
                    conte_empresa.style.display="block"
                    conte_empresa.innerHTML = `<h2>No se puede eliminar este esta empresa</h2>`
                    setTimeout(() => {
                        conte_empresa.style.display="none"
                    }, 2000);
                }
                
            }
            
        }) 
    }
    

    
})

//^ formulario de editar empresa en usuarios registrados

conte_empresa.addEventListener("click", (e) => {
    e.preventDefault()
    const boton = e.target.id
    console.log(boton)

    if( boton == "btn_cerrar_empresa"){
        conte_empresa.style.display="none"
    }else if (boton == "btn_actualizar_empresa"){
        const form_edi = e.path[1]

        const dato_form = new FormData(form_edi)

        fetch("../../php/admin/actualizar_empresa.php",{
            method:"POST",
            body:dato_form
        }).then(res => res.text()).then(info => {
            conte_empresa.style.display="none"
            console.log(info)
        })
    }
})