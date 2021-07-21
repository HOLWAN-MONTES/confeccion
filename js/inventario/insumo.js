//^ ************* VARIABLES DE MANEJO DEL DOM *************
const buscador_insumo = document.getElementById("buscador-insumo")
const contenedor_principal = document.querySelector(".contenedorCajaInventario")
const cantida = document.getElementById("cantidad")
const contenedor = document.getElementById("contenido")
const fondo = document.querySelector(".fondo")

//^ **************** BUSCADOR DE INSUMO ********************* 
 
buscador_insumo.addEventListener("keyup", () => {
    const dato = buscador_insumo.value 
    console.log(dato)
    fetch("../php/inventario/insumos/buscador.php",{
        method:"POST",
        body:JSON.stringify({
            "insumo":dato
        })
    }).then(res => res.text()).then(info => {
        contenedor_principal.innerHTML=`${info}`
    })
})

//^ *************** BTN CANTIDAD ********** 

cantida.addEventListener("click", (e) => {
    e.preventDefault()
    fondo.style.display="flex"

    fetch("../php/inventario/insumos/cantidad.php", {
        method:"GET"
    }).then(res => res.text()).then(info => {
        contenedor.innerHTML = `${info}`
    })
})

fondo.addEventListener("click", () => {
    fondo.style.display="none"
})