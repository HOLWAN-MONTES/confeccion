//^ variables para e manejo del DOM 
const cantida = document.getElementById("cantidad")
const contenedor = document.getElementById("contenido")
const fondo = document.querySelector(".fondo")
const todo = document.getElementById("todo")
const contenedor_principal = document.querySelector(".contenedorCajaInventario")
const buen_estado = document.getElementById("buen_estado")
const reparacion = document.getElementById("reparacion")
const mal_estado = document.getElementById("mal_estado")
const buscador_serial = document.getElementById("buscador_serial")
const serial = document.getElementById("serial")
const editar = document.querySelector(".contenedorCajaInventario")
const fondo2 = document.querySelector(".fondo2")
const btn_cerrar_Edicion = document.getElementById("cerrar_Edicion")
const estado_edicion = document.getElementById("estado")
const obser = document.getElementById("obser")
const enviar_edicion = document.getElementById("enviar_edicion")
const option = document.getElementById("option")

//^ FUNCIONES

function consulta (numero) {
    console.log(numero)
    fetch("../php/inventario/maquinaria/consulta.php",{
        method:"POST",
        body:JSON.stringify({
            dato:numero
        })
        
    }).then(res => res.text()).then(info => {
        console.log(info)
        contenedor_principal.innerHTML=`${info}`
    })
}

function editar_eliminar(action,id,mensaje,condiccion) {
    if(action == "eliminar"){
        Swal.fire({
            title: 'Esta seguro de eliminarlo?',
            icon: 'warning',
            showDenyButton: true,
            confirmButtonText: `Eliminar`,
            denyButtonText: `No eliminar`,
        }).then(res => {
            
            if(res.isConfirmed){

                fetch("../php/inventario/maquinaria/eliminar_editar.php",{
                    method:"POST",
                    body:JSON.stringify({
                        "accion":action,
                        "identificador":id
                    })
            }).then(res => res.text()).then(info => {
                if (info == 1) {
                    Swal.fire({
                        title: `La maquinaria ${id} se elimino`,
                        icon: 'warning',
                        showDenyButton: false,
                        confirmButtonText: `Aceptar`,
                       
                    }).then(res => {
                        if (res.isConfirmed) {
                            window.location = "maquinaria.php"
                        } else {
                            
                        }
                    })
                }
            })
        }
        })
    }else if (action == "editar") {
        fondo2.style.display="flex"
        obser.textContent = mensaje
        option.value = condiccion
        option.textContent = condiccion
        enviar_edicion.addEventListener("click", (e) => {
            e.preventDefault()
            const estado = estado_edicion.value 
            const observa = obser.value
            console.log(`1 ${estado} 2 ${observa}`)
            fetch("../php/inventario/maquinaria/eliminar_editar.php",{
                method:"POST",
                body:JSON.stringify({
                    "accion":action,
                    "identificador":id,
                    "estado":estado,
                    "observacion":observa
                })
            }).then(res => res.text()).then(info => {
                if (info == 1) {
                    Swal.fire({
                        title: `La maquinaria ${id} se actualizo los datos`,
                        icon: 'warning',
                        showDenyButton: false,
                        confirmButtonText: `Aceptar`,
                       
                    }).then(res => {
                        if (res.isConfirmed) {
                            window.location = "maquinaria.php"
                        } else {
                            
                        }
                    })
                    
                }else {
                    alert(info)
                }
            })
           
       
        
        }) 
    
        
    }
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
    //^ todas las tablas
    e.preventDefault()

    consulta(0)
    
})

buen_estado.addEventListener("click", (e) => {
    //^ estado bueno
    e.preventDefault()
    console.log("bueno")
    consulta(5)
    
})

reparacion.addEventListener("click", (e) => {
    //^ En reparacion
    e.preventDefault()
    console.log("reparacion")

    consulta(6)
    
})

mal_estado.addEventListener("click", (e) => {
    //^ mal estado
    e.preventDefault()
    console.log("mal estado")

    consulta(7)
    
})

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

//^ botones de editar y eliminar

editar.addEventListener("click", (e) => {
    e.preventDefault()

    const accion = e.target.classList[0]
    
    if (accion == "editar" || accion == "eliminar") {
        console.log(accion)
        const identificador = e.path[4].firstElementChild.childNodes[1].lastChild.innerText
        console.log(identificador)
        const mensaje_observa = e.path[4].childNodes[1].children[7].lastChild.innerText
        const mensaje_estado = e.path[4].childNodes[1].children[6].lastChild.innerText
        console.log(mensaje_estado)
        console.log(mensaje_observa)
        
        
        editar_eliminar(accion,identificador,mensaje_observa,mensaje_estado) 
    } 

  
})

btn_cerrar_Edicion.addEventListener("click", (e) => {
    e.preventDefault()
    fondo2.style.display="none"
})