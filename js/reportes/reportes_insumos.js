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
            $('.contenedorCajaInventario').html('');
            $('.contenedorCajaInventario').append(data);
        }
        
    })
})

function imprimir(id){
    const div = document.createElement('div');
    fetch(`../php/reportes_consuls/repor_impresion_insu.php?id=${id}`, {
        method:"GET",

    })
    .then(res => res.ok ? res.json():Promise.reject(res))
    .then(data =>{
        console.log(data);
        div.innerHTML = `
        <div class="documentosotras" id="documentosotras">
        <div>NUM. RECIBO :<p id="ingre_mat"> ${data.dato2[1]}</p></div>
                        
        <div>NOMBRE RESPONSABLE:<p> ${data.dato2[25]}</p></div>
        
        <div>PROVEEDOR :<p style="text-transform: uppercase;"> ${data.dato2.NOM_EMPLEADO} </p></div>
        
        <div>FECHA :<p>${data.dato2[12]}</p></div>
        
        <div>HORA :<p> ${data.dato2[13]}</p></div>

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
                    <td class="tab_rep"> ${data.consu2[3]}</td>
                    <td class="tab_rep"> ${data.consu2[0]}</td>
                    <td class="tab_rep"> ${data.consu2[2]}</td>
                    <td class="tab_rep"> ${data.consu2[1]}</td>
                    <td class="tab_rep"> ${data.dato[0]}</td>
                </tr>
            </tbody>
        </table>
    </div>   
        `;
        console.log(div);
        // const div = document.getElementById("documentosotras");
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
