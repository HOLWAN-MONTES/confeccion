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
const foto = document.getElementById('imagen');
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
                    console.log(datos);
                    const {err, status, statusText, data} = datos;
                    if(data.lenght !== 0 && err != true){
                        const {DOCUMENTO, ID_TIP_DOCU, ID_TIP_USU, NOMBRE, APELLIDO, PASSWORD, FECHA_NACIMIENTO, CELULAR, CORREO, FOTO} = data;
                        docmen.value = DOCUMENTO;
                        documento.disabled = true;
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
                        // foto.value = FOTO;
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
    if(e.target === formu){
        e.preventDefault();
        const option = {
            method: "PUT",
            headers: {
                'Content-type': 'application/json',
            },
            body: JSON.stringify({
                docum: docmen.value,
                tele: celu.value,
                cor: correo.value,
                contra: contra.value,
                foto: foto.value,
            })
        }
        fetch('../../php/admin/editar_user.php', option)
         .then(res => res.ok ? res.json() : Promise.reject(res))
         .then(datos => {
            const {err, status, statusText} = datos;
            if(status >= 200 && status < 300){
                Swal.fire({
                    title: 'Actualizado!',
                    text: 'Se actualizo el usuario',
                    icon: 'success',
                    confirmButtonText: 'Continuar'
                })
                formu.reset()
                documento.disabled = false
            }
            else{
                Swal.fire({
                    title: 'Error!',
                    text: 'No se pudo actualizar el usuario',
                    icon: 'error',
                    confirmButtonText: 'Continuar'  
                })
                formu.reset()
                documento.disabled = false
            }
            console.log(datos);
         })
         .catch(error => console.error(error));
         
    }
})