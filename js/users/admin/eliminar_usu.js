const formul = document.getElementById('form-elim');
const docu_elim = document.getElementById('docu-elim');
const nom_eli = document.getElementById('nom-elim');
const apel_eli = document.getElementById('apel-elim');
const sel_use_eli = document.getElementById('tip_usu_elim');
const sel_docu_eli = document.getElementById('tip_docu_elim');
const edad_eli = document.getElementById('edad-elim');
const celu_eli = document.getElementById('tele-elim');
const correo_eli = document.getElementById('cor-elim');
const docmen_eli = document.getElementById('docume-elim');

// FUNCION DE ACTUALIZAR 
const conteActi = document.getElementById("conte-user")

function actualizar(params) {

    fetch("../../php/admin/actualizar.php", {
        method:"POST"
    }).then(res => res.text()).then(info => {
        conteActi.innerHTML = `${info}`
    })

}

document.addEventListener('keypress', (e)=>{
    if(e.keyCode === 13){
        if(e.target === docu_elim){
            e.preventDefault();
            console.log("hola no refresque");
            if(docu_elim.value === ""){
                Swal.fire({
                    title: 'Error!',
                    text: 'Digite el documento de un usuario existente por favor',
                    icon: 'error',
                    confirmButtonText: 'Continuar'
                });
            }  
            else{
                const option = {
                    method: "POST",
                    headers: {
                        'Content-type': 'application/json',
                    },
                    body: JSON.stringify({
                        docum: docu_elim.value,
                    })
                }
                fetch('../../php/admin/eliminar_users.php', option)
                    .then(res => res.ok ? res.json() : Promise.reject(res))
                    .then(datos => {
                    console.log(datos);
                    const {err, status, statusText, data} = datos;
                    if(data.lenght !== 0 && err != true){
                        const {DOCUMENTO, ID_TIP_DOCU, ID_TIP_USU, NOMBRE, APELLIDO, PASSWORD, FECHA_NACIMIENTO, CELULAR, CORREO} = data;
                        docmen_eli.value = DOCUMENTO;
                        docu_elim.disabled = true;
                        nom_eli.value = NOMBRE;
                        nom_eli.disabled = true;
                        apel_eli.value = APELLIDO;
                        apel_eli.disabled = true;
                        sel_use_eli.value = ID_TIP_USU;
                        sel_use_eli.disabled = true;
                        sel_docu_eli.value = ID_TIP_DOCU;
                        sel_docu_eli.disabled = true;
                        edad_eli.value = FECHA_NACIMIENTO;
                        edad_eli.disabled = true;
                        celu_eli.value = CELULAR;
                        celu_eli.disabled = true;
                        correo_eli.value = CORREO;
                        correo_eli.disabled = true;
                    }
                    else{
                        Swal.fire({
                            title: 'Error!',
                            text: 'No se encontro el usuario',
                            icon: 'error',
                            confirmButtonText: 'Continuar'
                        });
                    }
                })
                .catch(error => console.error(error));
            }
        }
    } 
            
    
})
document.addEventListener('submit', (e)=>{
    if(e.target === formul){
        e.preventDefault();
        const option = {
            method: "DELETE",
            headers: {
                'Content-type': 'application/json',
            },
            body: JSON.stringify({
                docum: docmen_eli.value,
            })
        }
        Swal.fire({
            title: 'Esta seguro de eliminarlo?',
            icon: 'warning',
            showDenyButton: true,
            confirmButtonText: `Eliminar`,
            denyButtonText: `No eliminar`,
        }).then(result => {
            if (result.isConfirmed) {
            fetch('../../php/admin/eliminar_users.php', option)
                .then(res => res.ok ? res.json() : Promise.reject(res))
                .then(datos => {
                const {err, status, statusText} = datos;
                if(status >= 200 && status < 300){
                    Swal.fire('Eliminado!', 'Se ha eliminado con exito', 'success');
                    formul.reset();
                    docu_elim.disabled = false;
                    actualizar();
                }
                else{
                    Swal.fire('No eliminado', 'No se elimino el usuario', 'info');
                    formul.reset();
                }
                console.log(datos);
                })
                .catch(error => console.error(error));
            }
            else{
                Swal.fire({
                    title: 'Error!',
                    text: 'Se cancelo la eliminacion',
                    icon: 'error',
                    confirmButtonText: 'Continuar'
                });
                docu_elim.disabled = false;
                formul.reset();
            }
            
        });
    }
})
