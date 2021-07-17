//^ variables para e manejo del DOM 
const cantida = document.getElementById("cantidad")
const contenedor = document.getElementById("contenido")
const fondo = document.querySelector(".fondo")
const todo = document.getElementById("todo")
const contenedor_principal = document.querySelector(".contenedorCajaInventario")
const buen_estado = document.getElementById("buen_estado")
const reparacion = document.getElementById("reparacion")
const mal_estado = document.getElementById("mal_estado")

//^ FUNCIONES

function consulta (numero) {
    fetch("../php/inventario/maquinaria/consulta.php",{
        method:"POST",
        
        body:JSON.stringify({
            dato:numero
        })
        
    }).then(res => res.text()).then(info => {
        contenedor_principal.innerHTML=`${info}`
    })
}

//^ CANTIDAD 

cantida.addEventListener("click", (e) => {
    e.preventDefault()
    fondo.style.display="flex"

    fetch("../php/inventario/maquinaria/cantidad.php", {
        method:"GET"
    }).then(res => res.text()).then(info => {
        contenedor.innerHTML = `${info}`
    })
})

fondo.addEventListener("click", () => {
    fondo.style.display="none"
})

//^ TODOS LOS MAQUINARIAS

todo.addEventListener("click", (e) => {
    e.preventDefault()

    consulta(0)
    
})

buen_estado.addEventListener("click", (e) => {
    e.preventDefault()

    consulta(5)
    
})

reparacion.addEventListener("click", (e) => {
    e.preventDefault()

    consulta(6)
    
})

mal_estado.addEventListener("click", (e) => {
    e.preventDefault()

    consulta(4)
    
})