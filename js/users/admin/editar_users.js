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
                if(data.lenght !== 0){
                    const {DOCUMENTO, ID_TIPO_DOCU, ID_TIPO_USU, NOMBRE, APELLIDO, PASSWORD, EDAD, TELEFONO, CORREO, FOTO} = data;
                    docmen.value = DOCUMENTO;
                    documento.disabled = true;
                    nomb.value = NOMBRE;
                    nomb.disabled = true;
                    apel.value = APELLIDO;
                    apel.disabled = true;
                    sel_use.value = ID_TIPO_USU;
                    sel_use.disabled = true;
                    sel_docu.value = ID_TIPO_DOCU;
                    sel_docu.disabled = true;
                    edad.value = EDAD;
                    edad.disabled = true;
                    celu.value = TELEFONO;
                    correo.value = CORREO;
                    correo.disabled = true;
                    foto.value = FOTO;
                }
                else{
                    alert('No se encontro usuario');
                }
             })
             .catch(error => console.error(error));
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
                alert("Se ha actualizado correctamente");
                window.location.href="../../users/admin/admin.php";
            }
            else{
                alert("No se ha actualizado correctamente");
                window.location.href="../../users/admin/admin.php";
            }
            console.log(datos);
         })
         .catch(error => console.error(error));
         
    }
})