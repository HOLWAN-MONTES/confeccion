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
            // console.log(data);
            $('.contenedorCajaInventario').html('');
            $('.contenedorCajaInventario').append(data);
        }
        
    })
})

function imprimir(id){
    const div = document.createElement('div');
    fetch(`../php/reportes_consuls/repor_impresion.php?id=${id}`, {
        method:"GET",

    })
    .then(res => res.ok ? res.json():Promise.reject(res))
    .then(data =>{
        console.log(data);
        div.innerHTML = `
        <div class="documentosotras" id="documentosotras">
        <div>NUM. RECIBO :<p id="ingre_mat"> ${data.dato3[1]}</p></div>
                        
        <div>NOMBRE RESPONSABLE:<p> ${data.dato3[25]}</p></div>
        
        <div>PROVEEDOR :<p style="text-transform: uppercase;"> ${data.dato3.NOM_EMPLEADO} </p></div>
        
        <div>FECHA :<p>${data.dato3[12]}</p></div>
        
        <div>HORA :<p> ${data.dato3[13]}</p></div>

        <table>
            <thead>
                <tr>
                    <td class="tab_rep">TIPO DE INGRESO</td>
                    <td class="tab_rep">NOMBRE DE MAQUINARIA</td>
                    <td class="tab_rep">CANTIDAD</td>
                    <td class="tab_rep">BODEGA</td>
                    <td class="tab_rep">CANTIDAD TOTAL</td>
                </tr>
            </thead>
            <tbody>
                <tr class="todo">
                    <td class="tab_rep"> ${data.consu3[3]}</td>
                    <td class="tab_rep"> ${data.consu3[0]}</td>
                    <td class="tab_rep"> ${data.consu3[2]}</td>
                    <td class="tab_rep"> ${data.consu3[1]}</td>
                    <td class="tab_rep"> ${data.dato[0]}</td>
                </tr>
            </tbody>
        </table>
    </div>   
        `;
        console.log(div);
        // const div = document.getElementById("documentosotras");
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
    })
    
}

document.addEventListener('click',(e) => {
    if(e.target.matches('.ver_mas')){
        e.preventDefault();
        const impresion = e.target.getAttribute('data-id');
        console.log (impresion);
        imprimir(impresion);
    }
})

// action="../php/reportes_consuls/repor_fechas.php