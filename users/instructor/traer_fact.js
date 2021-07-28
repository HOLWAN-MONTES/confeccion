
document.addEventListener('click',(e) => {
    if(e.target.matches('.traer_fact')){
        e.preventDefault();
        const num_factura = e.target.getAttribute('data-id');
        console.log (num_factura);
        window.open(`devoluciones.php?trayendo_fact=${num_factura}`,'','width= 600,height=500, toolbar=NO');void(null);
    }
})

document.addEventListener('click', (e) =>{
    if(e.target.matches('.envio_dev')){
        e.preventDefault()
        const id = document.getElementById('cantidad_dev').value;
        console.log (id);
        var json = document.getElementById('num_fac').innerText;
        const can = document.getElementById('canti').innerText;
        var form = $(this);
        $.ajax({
            type: 'GET',
            url: `validar_devol.php?id=${id}&num=${json}&cant=${can}`,
            data: form.serialize(),
            success: function(data){
                console.log(data);
                alert("Si se cambio");
                window.close();
                id.innerHTML = ''
                // $('.contenedorCajaInventario').html('');
                // $('.contenedorCajaInventario').append(data);
            }
        })
    }
})
