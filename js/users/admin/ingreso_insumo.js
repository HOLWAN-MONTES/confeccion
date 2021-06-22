const categoria = document.getElementById("categoria")

// FORMULARIOS DE CREAR MATERIAL TEXTIL
const crear_tela = document.getElementById("crear_tela")
const btn_crear_tela = document.getElementById("btn_crear_tela")


categoria.addEventListener("blur", () => {
    
    const dato = new FormData(categoria)

    fetch("../../php/admin/categorias.php", {
        method:"POST",
        body:dato
    }).then(res => res.text()).then(info => {
        alert(info)
    })
})

// ENVIO DE LOS DATOS AL ARCHIVO PHP, FORMULARIO MATERIAL TEXTIL

btn_crear_tela.addEventListener("click", (e) => {
    e.preventDefault()
    const dato = new FormData(crear_tela)

    fetch("../../php/admin/crear_tela.php",{
        method:"POST",
        body:dato
    }).then(res => res.text()).then(info => {
        
        if (info == 1) {
            alert("tela creada")
        } else if(info == 2) {
            alert(info)
        }else {
            alert (`La tela ya ${info}`)
        }
    })
})