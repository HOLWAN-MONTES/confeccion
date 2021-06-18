const formulario = document.getElementById("crear_usuario")
const enviar = document.getElementById("reg")

enviar.addEventListener("click", (e) => {
    e.preventDefault()

    const dato = new FormData(formulario)

    fetch("../../php/admin/created.php", {
        method:"POST",
        body:dato
    }).then(res => res.text()).then(info => {
        if (info == 1) {
            alert("Usuario creado existosamente")
            formulario.reset()
        } else {
            alert(info)
        }
    })
})