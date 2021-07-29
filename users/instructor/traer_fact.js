
document.addEventListener('click', (e) =>{
    
    if(e.target.matches('.envio_dev')){
        e.preventDefault()
        console.log(e)
        const dato = e.path[2].children[0].innerText
        const accion = e.target.classList[0]
        console.log(dato)
            if (accion == "notocar"){
                
                const id = e.path[2].children[3].children[0].value
                const observa =  e.path[2].children[4].children[0].value
                console.log(id)
                console.log(observa)
    
                fetch("validar_devol.php",{
                    method:"POST",
                    body:JSON.stringify({
                        "id":dato,
                        "cantidad":id,
                        "observacion":observa

                    })
                }).then(res => res.text()).then(info => {
                    console.log(info)
                    if( info != 2){
                        
                        alert("Su devolucion fue existosa")
                        window.location ="devoluciones.php"
                    }else {
                        alert("campos vacios o incorrectos")
                    }
                })
            }
       
         
    }
})
