

//FUNCION DE ACTUALIZAR 





//Validacion Del Form De Editar 

const editar_usuario = document.getElementById('form-edi');
const inputs_edi = document.querySelectorAll('#form-edi input');

const expresiones_edi = {
	clave_edi: /^(?=.*\d)(?=.*[\u0021-\u002b\u003c-\u0040])(?=.*[A-Z])(?=.*[a-z])\S{8,16}$/, //Letras minusculas, mayusculas, numeros y caracter alfanumerico
	telefono_edi: /^\d{9,10}$/ // 7 a 14 numeros.
}

const campos_edi = {
    clave_edi: false,
    telefono_edi: false
}

const FormularioEditar = (e) =>{
    switch (e.target.name){
        case "contra_edi":
            EditarCampo(expresiones_edi.clave_edi, e.target, 'clave_edi');//El ultimo parametro tendra que llevar el id de div que almacena todo
        break;
        case "tele_edi":
            EditarCampo(expresiones_edi.telefono_edi, e.target, 'telefono_edi');//El ultimo parametro tendra que llevar el id de div que almacena todo
        break;
    }
}

const EditarCampo = (expresion_ed, input_ed, campo_ed) => {
	if(expresion_ed.test(input_ed.value)){
		document.getElementById(`grupo__${campo_ed}`).classList.remove('formulario_grupo_incorrecto_editar');
		document.getElementById(`grupo__${campo_ed}`).classList.add('formulario_grupo_correcto_editar');
        document.querySelector(`#grupo__${campo_ed} i`).classList.remove('fa-times-circle');
		document.querySelector(`#grupo__${campo_ed} i`).classList.add('fa-check-circle');
		document.querySelector(`#grupo__${campo_ed} .formulario_input_error_editar `).classList.remove('formulario_input-error_activo_editar');
		campos_edi[campo_ed] = true;
	} else {
		document.getElementById(`grupo__${campo_ed}`).classList.add('formulario_grupo_incorrecto_editar');
		document.getElementById(`grupo__${campo_ed}`).classList.remove('formulario_grupo_correcto_editar');
		document.querySelector(`#grupo__${campo_ed} i`).classList.add('fa-times-circle');
		document.querySelector(`#grupo__${campo_ed} i`).classList.remove('fa-check-circle');
		document.querySelector(`#grupo__${campo_ed} .formulario_input_error_editar `).classList.add('formulario_input-error_activo_editar');
		campos_edi[campo_ed] = false;
	}
}

inputs_edi.forEach((input) => {
    input.addEventListener('keyup', FormularioEditar);
    input.addEventListener('blur', FormularioEditar);
});

// valida_edi.addEventListener("submit", (e) =>{
//     e.preventDefault();

//     if(campos_edi.clave_edi && campos_edi.telefono_edi){
//         editar_usuario.reset();

//         document.querySelectorAll('.formulario_grupo_correcto_editar').forEach((icono_edi) => {
//             icono_edi.classList.remove('formulario_grupo_correcto_editar');
//         });

//     }else {
//         return false;
       
//     }

// });
