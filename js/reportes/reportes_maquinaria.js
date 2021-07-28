const btn_imprime = document.querySelector("#ver_mas");

const btn_bus = document.getElementById("buscar");

$('#form_repo_maq').submit(function (e) {
    e.preventDefault();
    const fec_ini = document.getElementById("fecha_ini").value;
    const fec_fin = document.getElementById("fecha_fin").value;
    var form = $(this);
    var url = form.attr('action');
    $.ajax({
        type:"GET",
        url:`../php/reportes_consuls/repor_fechas.php?fec_ini=${fec_ini}&fec_fin=${fec_fin}`,
        data: form.serialize(),
        success: function(data){
            console.log(data);
            $('#documentosotras').html('');
            $('#documentosotras').append(data);
        }
        
    })
})
// btn_bus.addEventListener("click", (e) =>{
//     e.preventDefault();
//     const fec_ini = document.getElementById("fecha_ini").value;
//     const fec_fin = document.getElementById("fecha_fin").value;
//     console.log(fec_ini)
//     console.log(fec_fin)
//     fetch(`../php/reportes_consuls/repor_fechas.php?fec_ini=${fec_ini}&fec_fin=${fec_fin}`, {
//         method:"GET"
//     })
//      .then(res => res.ok ? res.json() : Promise.reject(res))
//      .then(datos => {
//         console.log(datos);
//      })
// })

btn_imprime.addEventListener('click', (e) =>{
    e.preventDefault();
    imprimir();
    // console.log("Hola si entra");
    // const btn = btn_imprime.getAttribute('data-id')
    // console.log(btn)
})

function imprimir(){
    const div = document.getElementById("documentosotras");
    var ventana = window.open('', 'PRINT', 'height=400,width=600');
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
// action="../php/reportes_consuls/repor_fechas.php"