const btn_info = document.getElementById("ver_mas");
const contenedor_rep_maq = document.getElementById("deta_ingre_mat");

btn_info.addEventListener("click", (e) => {
    console.log("Si funciono el click");
    e.preventDefault();
    const ingre_mat = document.querySelector("#ingre_mat").textContent;
    fetch("../php/reportes_consuls/reportes_maqui.php",{
        method:"POST",
        body:JSON.stringify({
            "ingre_mat":ingre_mat
        })
    }).then(res => res.text()).then(info => {
        console.log(info);
        contenedor_rep_maq.innerHTML = `${info}`
    })
    // const ing_mat = ingre_mat.value;
    
});