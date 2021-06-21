const categoria = document.getElementById("categoria")

categoria.addEventListener("blur", () => {
    
    const dato = new FormData(categoria)

    fetch("../../php/admin/categorias.php", {
        method:"POST",
        body:dato
    }).then(res => res.text()).then(info => {
        alert(info)
    })
})