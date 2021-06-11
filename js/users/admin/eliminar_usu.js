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
document.addEventListener('keypress', (e)=>{
    if(e.keyCode === 13){
        if(e.target === docu_elim){
            e.preventDefault();
            console.log("hola no refresque");
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
                if(data.lenght !== 0){
                    const {DOCUMENTO, ID_TIPO_DOCU, ID_TIPO_USU, NOMBRE, APELLIDO, PASSWORD, EDAD, TELEFONO, CORREO} = data;
                    docmen_eli.value = DOCUMENTO;
                    docu_elim.disabled = true;
                    nom_eli.value = NOMBRE;
                    nom_eli.disabled = true;
                    apel_eli.value = APELLIDO;
                    apel_eli.disabled = true;
                    sel_use_eli.value = ID_TIPO_USU;
                    sel_use_eli.disabled = true;
                    sel_docu_eli.value = ID_TIPO_DOCU;
                    sel_docu_eli.disabled = true;
                    edad_eli.value = EDAD;
                    edad_eli.disabled = true;
                    celu_eli.value = TELEFONO;
                    celu_eli.disabled = true;
                    correo_eli.value = CORREO;
                    correo_eli.disabled = true;
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
        fetch('../../php/admin/eliminar_users.php', option)
            .then(res => res.ok ? res.json() : Promise.reject(res))
            .then(datos => {
            const {err, status, statusText} = datos;
            if(status >= 200 && status < 300){
                alert("Se ha eliminado correctamente");
                window.location.href="../../users/admin/admin.php";
            }
            else{
                alert("No se ha eliminado correctamente");
                window.location.href="../../users/admin/admin.php";
            }
            console.log(datos);
            })
            .catch(error => console.error(error));
            
    }
})