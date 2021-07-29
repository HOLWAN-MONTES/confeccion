serial.addEventListener("keyup", (e) => {
    
    const dato = new FormData(buscador_serial)
    console.log("si entra")
    fetch("../php/inventario/maquinaria/buscador.php",{
        method:"POST",
        body:dato
    }).then(res => res.text()).then(info => {
        console.log(info)
        contenedor_principal.innerHTML = `${info}`
    })
})
