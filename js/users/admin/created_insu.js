// VARIABLES PARA EL FORMULARIO DE CREAR INSUMOS
const formInsu = document.getElementById("CrearInsumoForm")
const enviarInsu = document.getElementById("BtnCrearInsumo")

//  CONEXION AL ARCHIVO PHP PARA EL FORmInsu DE CREAR INSUMOS 
enviarInsu.addEventListener("click", (e) => {
    e.preventDefault()

    const dato = new FormData(formInsu)

    fetch("../../php/admin/created_insu.php", {
        method:"POST",
        body:dato
    }).then(res => res.text()).then(info => {
        if (info == 1) {
            alert("Usuario creado existosamente")
            formInsu.reset()
        }else if (info == 2){
            alert('Lle correctamente el formulario');
        }
        else if (info == 3){
            alert('El insumo ya ha sido creado')
        } 
    })
})