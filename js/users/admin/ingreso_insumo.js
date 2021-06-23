const categoria = document.getElementById("categoria")

// FORMULARIOS DE CREAR MATERIAL TEXTIL
const crear_tela = document.getElementById("crear_tela")
const btn_crear_tela = document.getElementById("btn_crear_tela")

// PREOVVERDOR
const proveedor = document.getElementById("proveedor")
const form_proveedor = document.getElementById("form_proveedor")
const factura = document.getElementById("factura")

// PRODUCTO 

const form_producto = document.getElementById("productos")
const btn_producto = document.getElementById("btn_productos")

// CATEGORIA

const categoria = document.getElementById("categoria")
const form_categoria = document.getElementById("form_categoria")

categoria.addEventListener("blur", () => {
    
    const dato = new FormData(categoria)

    fetch("../../php/admin/categorias.php", {
        method:"POST",
        body:dato
    }).then(res => res.text()).then(info => {
        alert(info)
        proveedor.disabled = true
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


// proveedor

proveedor.addEventListener("blur", () => {

    const dato = new FormData(form_proveedor)

    fetch("../../php/admin/proveedor.php", {
        method:"POST",
        body:dato
    }).then(res => res.text()).then(info => {
        factura.innerHTML = info
    })
})


// PRODUCTO 

btn_producto.addEventListener("click", (e) => {
     
    e.preventDefault()

    const dato = new FormData(form_producto)

    fetch("../../php/admin/producto.php",{
        method:"POST",
        body:dato
    }).then(res => res.text()).then(info => {
        alert("alerta")
    })


})

