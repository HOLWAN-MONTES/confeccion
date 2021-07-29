$('#form_repo_insu').submit(function (e) {
    e.preventDefault();
    const fec_ini = document.getElementById("fecha_ini_insu").value;
    const fec_fin = document.getElementById("fecha_fin_insu").value;
    var form = $(this);
    var url = form.attr('action');
    $.ajax({
        type:"GET",
        url:`../php/reportes_consuls/repor_fechas_insu.php?fec_ini=${fec_ini}&fec_fin=${fec_fin}`,
        data: form.serialize(),
        success: function(data){
            // console.log(data);
            if (data == ""){
                Swal.fire({
                    title: 'Advertencia!',
                    text: 'No hay reportes con estas fechas',
                    icon: 'warning',
                    confirmButtonText: 'Continuar'
                })
                $("input[type=date]").val("");
            }
            else{
                $('.contenedorCajaInventario').html('');
                $('.contenedorCajaInventario').append(data);
                $("input[type=date]").val("");
            }
        }
        
    })
})

function imprimir(id){
    const div = id;
    var ventana = window.open('', 'PRINT', 'height=800,width=1000');
    ventana.document.write('<html><head><title>' + document.title + '</title>');
    ventana.document.write('<link rel="stylesheet" href="../../css/impresion/print_maq.css" type="text/css">');  
    ventana.document.write('</head><body >');
    ventana.document.write(div.innerHTML);
    ventana.document.write('</body></html>');
    ventana.document.close();
    ventana.print();
    ventana.close();
    
    return true;
}

document.addEventListener('click',(e) => {
    if(e.target.matches('.ver_mas')){
        e.preventDefault();
        const impresion = e.path[4].firstElementChild;
        imprimir(impresion);
    }
})
