const formu = document.getElementById('form-edi');
const documento = document.getElementById('docu-edi');
const nomb = document.getElementById('nom-edi');
const apel = document.getElementById('apel-edi');
const sel_use = document.getElementById('tip_usu_edi');
const sel_docu = document.getElementById('tip_docu_edi');
const edad = document.getElementById('edad-edi');
const contra = document.getElementById('contra-edi');
const celu = document.getElementById('tele-edi');
const correo = document.getElementById('cor-edi');
const docmen = document.getElementById('docume-edi');
var foto = document.getElementById('imagen_edi');

// FUNCION DE ACTUALIZAR 



const conteAct = document.getElementById("conte-user")

function actualizar() {

    fetch("../../php/admin/actualizar.php", {
        method:"POST"
    }).then(res => res.text()).then(info => {
        console.log(info)
        conteAct.innerHTML = `${info}`
    })

}

document.addEventListener('keypress', (e)=>{
    if(e.keyCode === 13){
        if(e.target === documento){
            e.preventDefault();
            console.log("hola no refresque");
            if(documento.value === ""){
                Swal.fire({
                    title: 'Error!',
                    text: 'Digite el documento de un usuario por favor',
                    icon: 'error',
                    confirmButtonText: 'Continuar'
                })
            }   
            else{
                const option = {
                    method: "POST",
                    headers: {
                        'Content-type': 'application/json',
                    },
                    body: JSON.stringify({
                        docum: documento.value,
                    })
                }
                fetch('../../php/admin/editar_user.php', option)
                 .then(res => res.ok ? res.json() : Promise.reject(res))
                 .then(datos => {
                    // console.log(datos);
                    const {err, status, statusText, data} = datos;
                    if(data.lenght !== 0 && err != true){
                        const {DOCUMENTO, ID_TIP_DOCU, ID_TIP_USU, NOMBRE, APELLIDO, PASSWORD, FECHA_NACIMIENTO, CELULAR, CORREO, FOTO} = data;
                        docmen.value = DOCUMENTO;
                        documento.disabled = false;
                        nomb.value = NOMBRE;
                        nomb.disabled = true;
                        apel.value = APELLIDO;
                        apel.disabled = true;
                        sel_use.value = ID_TIP_USU;
                        sel_use.disabled = true;
                        sel_docu.value = ID_TIP_DOCU;
                        sel_docu.disabled = true;
                        edad.value = FECHA_NACIMIENTO;
                        edad.disabled = true;
                        celu.value = CELULAR;
                        correo.value = CORREO;
                        correo.disabled = true;
                        
                        // contra.value = PASSWORD;
                       
                        // console.log(foto.value);
                    }
                    else{
                        Swal.fire({
                            title: 'Error!',
                            text: 'El usuario no existe',
                            icon: 'error',
                            confirmButtonText: 'Continuar'
                        })
                    }
                    })
                    .catch(error => console.error(error));
            }
             
        }
    }
    
})

document.addEventListener('submit', (e)=>{
    
        e.preventDefault();
        const option = new FormData(formu)
        Swal.fire({
            title: 'Esta seguro de actualizar?',
            icon: 'warning',
            showDenyButton: true,
            confirmButtonText: `Actualizar`,
            denyButtonText: `No actualizar`,
        }).then(result => {
            if (result.isConfirmed) {
                fetch('../../php/admin/editarUsuario.php', {
                    method:"POST",
                    body:option
                })
                .then(res => res.json())
                .then(datos => {
                    console.log(datos)
                    const {err, status, statusText} = datos;
                    if(status >= 200 && status < 300){
                        Swal.fire('Actualizado!', 'Se actualizo con exito', 'success')
                        formu.reset()
                        documento.disabled = false
                        document.querySelectorAll('.formulario_grupo_correcto_editar').forEach((icono_edi) => {
                            icono_edi.classList.remove('formulario_grupo_correcto_editar');
                        });
                        actualizar()
                    }
                    else{
                        Swal.fire('No actualizado', 'No se actualizo el usuario', 'info')
                        documento.disabled = false 
                    }
                    console.log(datos);
                    
                })
                .catch(error => console.error(error));git 
            } 
            else{
                Swal.fire({
                    title: 'Error!',
                    text: 'No se actualizo el usuario',
                    icon: 'error',
                    confirmButtonText: 'Continuar'
                });
                documento.disabled = false
            }
        })   
    
})
