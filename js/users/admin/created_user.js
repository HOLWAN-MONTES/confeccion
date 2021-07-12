// VARIABLES PARA EL FORMULARIO DE REGISTRO DE USUARIO
const formulario = document.getElementById("crear_usuario")
const documento_user = document.getElementById("docu")

const enviar = document.getElementById("reg")


//  CONEXION AL ARCHIVO PHP PARA EL FORMULARIO CREAR USUARIO
enviar.addEventListener("click", (e) => {
    e.preventDefault()

    const formulario_reg = new FormData(formulario)

    fetch("../../php/admin/created.php", {
        method:"POST",
        body:formulario_reg
    })
    .then(res => res.text()).then(info => {
        if (info == 1) {
            Swal.fire({
                title: 'Registrado!',
                text: 'Se registro el usuario',
                icon: 'success',
                confirmButtonText: 'Continuar'
            })
            formulario.reset()
            documento_user.disabled = false
        }else if(info == 2){
            Swal.fire({
                title: 'Error!',
                text: 'El usuario con este documento ya existe',
                icon: 'error',
                confirmButtonText: 'Continuar'
            })
            formulario.reset()
        }else{
            Swal.fire({
                title: 'Advertencia!',
                text: 'Por favor rellena el formulario correctamente.',
                icon: 'warning',
                confirmButtonText: 'Continuar'
            })
            
        }
    })   
})


//  CONEXION AL ARCHIVO PHP PARA EL FORMULARIO CREAR DOCUMENTO
const registrando = document.getElementById("usuario_docu")
const insertar = document.getElementById("insertar")
const docum = document.getElementById("tip_docum")

insertar.addEventListener("click", (e) => {
    e.preventDefault()

    const dato = new FormData(registrando)

    fetch("../../php/admin/tipo_documento.php", {
        method:"POST",
        body:dato
    })
    .then(res => res.text()).then(info => {
        if (info == 1) {
            Swal.fire({
                title: 'Registrado!',
                text: 'Se registro el tipo de documeto',
                icon: 'success',
                confirmButtonText: 'Continuar'
            })
            registrando.reset()
            docum.disabled = false
        }else if(info == 2){
            Swal.fire({
                title: 'Advertencia!',
                text: 'Por favor rellena el formulario.',
                icon: 'warning',
                confirmButtonText: 'Continuar'
            })

        }
        else if(info == 3){
            Swal.fire({
                title: 'Advertencia!',
                text: 'Por favor rellena el formulario correctamente.',
                icon: 'warning',
                confirmButtonText: 'Continuar'
            })

        }
    })   
})


//   VALIDACION DEL FORMULARIO

const crear_usuario = document.getElementById('crear_usuario');
const inputs = document.querySelectorAll('#crear_usuario input');

const expresiones = {
    documento: /^\d{8,10}$/, // 7 a 14 numeros.
	nombre: /^[a-zA-ZÀ-ÿ\s]{2,40}$/, // Letras y espacios, pueden llevar acentos.
    apellido: /^[a-zA-ZÀ-ÿ\s]{2,40}$/, // Letras y espacios, pueden llevar acentos.
	clave: /^(?=.*\d)(?=.*[\u0021-\u002b\u003c-\u0040])(?=.*[A-Z])(?=.*[a-z])\S{8,16}$/, //Letras minusculas, mayusculas, numeros y caracter alfanumerico
    correo: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
	telefono: /^\d{9,10}$/ // 7 a 14 numeros.
}

const campos = {
    documento: false,
    nombre: false,
    apellido: false,
    clave: false,
    correo: false,
    telefono: false
}

const validarFormulario = (e) =>{
    switch (e.target.name){
        case "docu":
            validarCampo(expresiones.documento, e.target, 'documento');
        break;
        case "nom":
            validarCampo(expresiones.nombre, e.target, 'nombres');
            
        break;
        case "apel":
            validarCampo(expresiones.apellido, e.target, 'apellidos');
        break;
        case "contra":
            validarCampo(expresiones.clave, e.target, 'contra');
        break;
        case "tele":
            validarCampo(expresiones.telefono, e.target, 'telefono');
        break;
        case "cor":
            validarCampo(expresiones.correo, e.target, 'correo'); 
        break;
    }
}

const validarCampo = (expresion, input, campo) => {
	if(expresion.test(input.value)){
		document.getElementById(`grupo__${campo}`).classList.remove('formulario__grupo-incorrecto');
		document.getElementById(`grupo__${campo}`).classList.add('formulario__grupo-correcto');
		document.querySelector(`#grupo__${campo} i`).classList.add('fa-check-circle');
		document.querySelector(`#grupo__${campo} i`).classList.remove('fa-times-circle');
		document.querySelector(`#grupo__${campo} .formulario__input-error`).classList.remove('formulario__input-error-activo');
		campos[campo] = true;
	} else {
		document.getElementById(`grupo__${campo}`).classList.add('formulario__grupo-incorrecto');
		document.getElementById(`grupo__${campo}`).classList.remove('formulario__grupo-correcto');
		document.querySelector(`#grupo__${campo} i`).classList.add('fa-times-circle');
		document.querySelector(`#grupo__${campo} i`).classList.remove('fa-check-circle');
		document.querySelector(`#grupo__${campo} .formulario__input-error`).classList.add('formulario__input-error-activo');
		campos[campo] = false;
	}
}

inputs.forEach((input) => {
    input.addEventListener('keyup', validarFormulario);
    input.addEventListener('blur', validarFormulario);
});

crear_usuario.addEventListener("submit", (e) =>{
    e.preventDefault();

    const tipo_usu = document.getElementById("tip_us_crea");
    const tipo_doc = document.getElementById("tip_docu");

    if(campos.documento && campos.nombre && campos.apellido && campos.clave && campos.telefono && campos.correo && tipo_usu.selected && tipo_doc.selected){
        crear_usuario.reset();
        console.log("exito");

        document.querySelectorAll('.formulario__grupo-correcto').forEach((icono) => {
            icono.classList.remove('formulario__grupo-correcto');
        });

    }else {
        console.log("error");
        return false;
       
    }

});




