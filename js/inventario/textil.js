//^ ************* VARIABLES DE MANEJO DEL DOM *************
const buscador_insumo = document.getElementById("buscador-textil")
const contenedor_principal = document.querySelector(".contenedorCajaInventario")
const cantida = document.getElementById("cantidad")
const contenedor = document.getElementById("contenido")
const fondo = document.querySelector(".fondo")
const editar = document.querySelector(".contenedorCajaInventario")
const marca = document.getElementById("marca")
const tipo_material = document.getElementById("tipo_material")
const todo = document.getElementById("todo")

//^ ********************* FUNCIONES ******************

function editar_eliminar(action,id) {
    //^ proceso de eliminar
    if(action == "eliminar"){
        Swal.fire({
            title: 'Esta seguro de eliminarlo?',
            icon: 'warning',
            showDenyButton: true,
            confirmButtonText: `Eliminar`,
            denyButtonText: `No eliminar`,
        }).then(res => {
            
            if(res.isConfirmed){

                fetch("../php/inventario/textil/eliminar.php",{
                    method:"POST",
                    body:JSON.stringify({
                        "accion":action,
                        "identificador":id
                    })
            }).then(res => res.text()).then(info => {
                if (info == 1) {
                    Swal.fire({
                        title: `El textil ${id} se elimino`,
                        icon: 'warning',
                        showDenyButton: false,
                        confirmButtonText: `Aceptar`,
                       
                    }).then(res => {
                        if (res.isConfirmed) {
                            window.location = "materialTextil.php"
                        } else {
                            
                        }
                    })
                }
            })
        }
        })

    //^ proceso de editar
    }else if (action == "editar") {
        /* fondo2.style.display="flex"
        obser.textContent = mensaje
        option.value = condiccion
        option.textContent = condiccion

        //^ dar click en boton de editar
        enviar_edicion.addEventListener("click", (e) => {
            e.preventDefault()
            const estado = estado_edicion.value 
            const observa = obser.value
            
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
                            window.location = "maquinaria.php"
                        }
                    })
                    
                }else {
                    alert(info)
                }
            })
           
       
        
        })  */
    
        
    }
}

function buscador_tipo (accion,dato) {
    console.log(accion + dato)

    fetch("../php/inventario/textil/tipos.php",{
        method:"POST",
        body:JSON.stringify({
            "marca_accion":accion,
            "tipo_marca":dato
        })
        
    }).then(res => res.text()).then(info => {
        console.log(info)
        contenedor_principal.innerHTML = `${info}`
    })
}

//^ **************** BUSCADOR DE TEXTIL ********************* 
 
buscador_insumo.addEventListener("keyup", () => {
    const dato = buscador_insumo.value 
    console.log(dato)
    fetch("../php/inventario/textil/buscador.php",{
        method:"POST",
        body:JSON.stringify({
            "textil":dato
        })
    }).then(res => res.text()).then(info => {
        console.log(info)
        contenedor_principal.innerHTML=`${info}`
    })
})

//^ *************** BTN CANTIDAD ********** 

cantida.addEventListener("click", (e) => {
    e.preventDefault()
    fondo.style.display="flex"

    fetch("../php/inventario/textil/cantidad.php", {
        method:"GET"
    }).then(res => res.text()).then(info => {
        contenedor.innerHTML = `${info}`
    })
})

fondo.addEventListener("click", () => {
    fondo.style.display="none"
})

//^ *************************** ELIMINAR  **********************

editar.addEventListener("click", (e) => {
    e.preventDefault()
    //^ identificar el boton para la accion de eliminar o editar
    const accion = e.target.classList[0]
    
    if (accion == "editar" || accion == "eliminar") {

        //^ obtener los datos para para el proceso de eliminar y editar
        const identificador = e.path[4].firstElementChild.childNodes[1].lastChild.innerText
       
        
        
        //^ funcion donde se hace el proceso indicado 
        editar_eliminar(accion,identificador) 
    } 

  
})

//^ ************************  buscador por la marca ****************

marca.addEventListener("click", () => {
    const dato = marca.value
    console.log(dato)
    buscador_tipo("marca",dato)
})

//^ **************************** buscador por tipo de material **************

tipo_material.addEventListener("click", () => {
    const dato = tipo_material.value
    buscador_tipo("tipo_material",dato)
})

//^ ******************** TODO ******************

todo.addEventListener("click", (e) => {
    e.preventDefault()

    fetch("../php/inventario/textil/todo.php",{method:"GET"}).then(res => res.text()).then(info => {
        contenedor_principal.innerHTML=`${info}`
    })
})