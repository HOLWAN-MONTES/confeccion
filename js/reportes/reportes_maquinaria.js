const btn_info = document.querySelector("#contentdocumentosotras");
const contenedor_rep_maq = document.getElementById("deta_ingre_mat");

// btn_info.addEventListener("click", (e) => {
//     e.preventDefault()
//     //^ identificar el boton para la accion de eliminar o editar
//     const accion = e.target.classList[0]
    
//     if (accion == "ver_mas") {

//         //^ obtener los datos para para el proceso de eliminar y editar
//         const identificador = e.path[4].firstElementChild.childNodes[1].lastChild.innerText
//         const mensaje_observa = e.path[4].childNodes[1].children[7].lastChild.innerText
//         const mensaje_estado = e.path[4].childNodes[1].children[6].lastChild.innerText
        
        
//         //^ funcion donde se hace el proceso indicado 
//         ver_mas(accion,identificador,mensaje_observa,mensaje_estado) 
//     } 

  
// })

window.addEventListener("click", (e) => {
    if (e.target.matches("#ver_mas")) {
        console.log("Si funciono el click");
        console.log(e.target.parentNode.parentNode);
        e.preventDefault();
        const id = e.target.getAttribute("data-id");
        console.log(id)
        // const div = e.target.parentNode.parentNode.parentNode.parentNode;
        // console.log(div)
        fetch(`../php/reportes_consuls/reportes_maqui.php?id=${id}`,{
            method:"GET",
        })
        .then(res => res.ok? res.json(): Promise.reject(res))
        .then(({data}) => {
            console.log(data);

            btn_info.innerHTML += `
                <div>CANTIDAD :<p> ${data[6]}</p></div>
                <div>CANTIDAD TOTAL :<p> ${data[8]}</p></div>
                <div>TIPO DE INGRESO :<p> ${data[10]}</p></div>
                <div>MARCA DE MAQUINARIA:<p> ${data[13]}</p></div>
                <div>NOMBRE DE LA BODEGA:<p> ${data[20]}</p></div>
                
            `;
        })
    }
    
    // const ing_mat = ingre_mat.value;
});