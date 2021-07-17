// registro de peticion de materiales a prestar 
$(document).ready(function(){
    recargarLista();
    $('#categ').change(function(){
        recargarLista();
    });
})

function recargarLista(){
    $.ajax({
        type:"POST",
        url: '../../php/instructor/valida_prestamo.php',
        data: "prestamo=" + $('#categ').val(),
        success: function(r){
            $('#nom_categ').html(r);
        }
    });
}

// funcion para agregar los materiales a la tabla 

$(document).ready(function(){
    $('#agregar_lista').click(function(){
        agregarPres();
    });
    $(document).on("click", ".editar_btn", editarMaterial); // llamar a la funcion para editar cantidad
    $(document).on("click", "#solicitar_prest", guardarMateriales); // llamar la funcion para enviar a la BD

});

const datos = [];
var id_dato = 1;
var cant_edi = 0;
var can;
var canti_edit;
var ids_row;
var fila;

function agregarPres(){
    const catego = document.getElementById('categ');
    const cates = document.getElementById('categ').value;
    const categ_pres = catego.options [catego.selectedIndex].text;
    const nomb = document.getElementById('nom_categ').value;
    const nom = document.getElementById('nom_categ');
    const names = nom.options[nom.selectedIndex].text;
    cant_pres = document.getElementById('cantid_pres').value;
    var respons = document.getElementById('responsable').value;
    var fecha = $("#fecha").text();
    var hora = $("#hora").text();

    if(catego != 0 && catego != '' && nomb != 0 && nomb != '' && cant_pres != 0 && cant_pres != ''){
        // agregar elementos al arreglo
        datos.push(
            {
                "id_dato": id_dato,
                "responsable": respons,
                "categorias": cates,
                "names": nomb,
                "cantidad": cant_pres,
                "fecha": fecha,
                "hora": hora
            }
        );
        id_dato++;
        cant_edi++;
        ids_row = "row"+id_dato;
        canti_edit = "canti" + cant_edi;
        const deleteButton = "<button class='delete_button'>Eliminar</button>";
        var editButton = `<button class='editar_btn'>Editar</button>`;
        fila='<tr id="'+ ids_row +'" class="tr_val" name="fila_tb_din[]"><td>'+ categ_pres +'</td><td name="row_name[]">'+ names +'</td><td id="'+ canti_edit +'" class="cant_ed" name="row_canti[]">'+ cant_pres +'</td><td>'+ editButton + deleteButton +'</td></tr>';
        
        $('#tablaInfo').append(fila); // agrega los datos capturados a la tabla
        console.log(datos);
        // vaciar los campos de los select cuando se agrega un valor
        $('#categ option:first').prop('selected', true);
        $('#nom_categ').find('option').not(':first').remove();
        $('input[type="number"]').val('');

    }else{
        Swal.fire({
            title: 'Advertencia!',
            text: 'Por favor rellene el formulario correctamente.',
            icon: 'warning',
            confirmButtonText: 'Continuar'
        })
    }
}

// borrar la fila de la tabla 
$(document).on("click", ".delete_button", function(e){
    e.preventDefault();
    $(this).parents('tr').eq(0).remove();
    datos.splice(ids_row, 1);
    console.log(datos);
    Swal.fire({
        title: 'Eliminado!',
        text: 'El material se elimino de la tabla',
        icon: 'success',
        confirmButtonText: 'Continuar'
    })

})


// editar la cantidad del producto seleccionado
function editarMaterial(e){
    e.preventDefault();
    var canti_edit = parseInt(prompt("Cantidad Nueva"));
    if(canti_edit){
        var _this = this; // esta linea recupera el elemento el cual se llama en la funcion
        var cantida = editContenido(_this).innerHTML = canti_edit; // llama la funcion y recibe el objeto del cual se llama la funcion
        $(this).parent().parent().find("td:eq(2)").html(canti_edit);
        var asigna = Object.keys(datos);

        for(i = 0; i < datos.length; i++){
            console.log(asigna);
            console.log(asigna.length);
        }
        datos[0]['cantidad'] = cantida;
        console.log(datos);
        datos[asigna].cantidad = cantida;
    }
    else{
        Swal.fire({
            title: 'Cancelado!',
            text: 'Se canceló la edición de la cantidad',
            icon: 'warning',
            confirmButtonText: 'Continuar'
        }); 
    }
}

function editContenido(opciones){
    var cant_up = opciones.parentNode.parentNode; // se obtiene en donde se preciono
    var cant_real = cant_up.getElementsByTagName("td")[2].innerHTML; //se obtiene la etiqueta y la posicion de la celda

    return cant_real; // retorna la vble y viajara en la funcion llamada
}


// funcion para guardar datos de los materiales en la BD
function guardarMateriales(e){
    e.preventDefault();
    console.log(datos);
    var json = JSON.stringify(datos); //convierte el array en una cadena de caracteres
    $.ajax({
        url:'../../php/instructor/registro_prestamo.php',
        type:"POST",
        data: "json="+json,
        success: function(r){
            console.log(r);
            const envios = JSON.parse(r);
            console.log(envios.status);
            if(envios.status === 200){
                datos = [];
                console.log(datos);
                alert("se registro el prestamo exitosamente")
                document.getElementById('agregado').innerHTML = '';
            }else{
                alert("no se registro el prestamo")
            }
        }
    });
    console.log(json);
}
