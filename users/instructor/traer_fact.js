
document.addEventListener('click',(e) => {
    if(e.target.matches('.traer_fact')){
        e.preventDefault();
        const num_factura = e.target.getAttribute('data-id');
        console.log (num_factura);
        window.open(`devoluciones.php?trayendo_fact=${num_factura}`,'','width= 600,height=500, toolbar=NO');void(null);
    }
})
