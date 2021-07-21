// registro de peticion de materiales a devolver 
$(document).ready(function(){ //se asigna una funcion 
    agregarLista();
    $('#cate_dev').change(function(){ //se trae el id y se asigna al evento
        agregarLista();
    });
})

function agregarLista(){
    $.ajax({
        type:"POST", //metodo por el cual se envian los datos
        url: '../../php/instructor/valida_devoluc.php', //direcciona al archivo y ejecuta lo que tiene
        data: "devols=" + $('#cate_dev').val(), // creamos una vble que se le asigna el valor que tenga el select
        success: function(r){
            $('#devolucion').html(r); //mostramos  en pantalla
        }
    });
}

// llamar la funcion para agregar a la tabla
$(document).ready(function(){
    $('#agre_devo').click(function(){
        agregarDevol();
    });
    $(document).on("click", ".editar_boton", editInsumo); // llamar a la funcion para editar cantidad
    $(document).on("click", "#cancelar_insumo", cancelarDevolucion);
    $(document).on("click", "#devolver_insu", guardarDevolucion); // llamar la funcion para enviar a la BD
});

// registro de insumos 
var datos_dev = [];
var id_datos = 1;
var cantid_edi = 0;
var cant;
var canti_editar;
var ids_rows;
var filas;

//funcion que trae el valor que contenga los select para agregarlos a la tabla
function agregarDevol(){
    const cat_dev = document.getElementById('cate_dev');
    const catego_in = document.getElementById('cate_dev').value;
    const cata_volver = cat_dev.options[cat_dev.selectedIndex].text;
    const nom_cat = document.getElementById('devolucion').value;
    const nombres = document.getElementById('devolucion');
    const name_devol = nombres.options[nombres.selectedIndex].text;
    cant_devol = document.getElementById('cant_devol').value;
    var responsables = document.getElementById('responsable_devol').value;
    var fecha = $("#fecha_dev").text();
    var hora = $("#hora_dev").text();

    if(cat_dev != 0 && cat_dev != '' && nom_cat != 0 && nom_cat != '' && cant_devol != 0 && cant_devol != ''){
        //agregar el elemento
        datos_dev.push(
            {
                "id_datos": id_datos,
                "responsables": responsables,
                "categoria": catego_in,
                "nombres": nom_cat,
                "cantidad": cant_devol,
                "fecha": fecha,
                "hora": hora
            }
        );
        id_datos++;
        cantid_edi++;
        ids_rows = "row"+id_datos;
        canti_editar = "canti" + cantid_edi;
        const eliminarButton = "<button class='eliminar_button'>Eliminar</button>";
        var editarButton = `<button class='editar_boton ${id_datos}'>Editar</button>`;
        filas='<tr id="'+ ids_rows +'" class="tr_val" ><td class="td_cat">'+ cata_volver +'</td><td class="td_nom">'+ name_devol +'</td><td id="'+ canti_editar +'" class="cant_ed" >'+ cant_devol +'</td><td class="td_botones">'+ editarButton + eliminarButton +'</td></tr>';
        
        $('#tabla_devol').append(filas); // agrega los datos capturados a la tabla
        
        // vaciar los campos de los select cuando se agrega un valor
        $('#cate_dev option:first').prop('selected', true);
        $('#devolucion').find('option').not(':first').remove();
        $('input[type="number"]').val('');
        
    }
    else{
        Swal.fire({
            title: 'Advertencia!',
            text: 'Por favor rellene el formulario correctamente.',
            icon: 'warning',
            confirmButtonText: 'Continuar'
        })
    }
}
console.log(datos_dev);

//funcion para borrar una fila de la tabla 
$(document).on("click", ".eliminar_button", function(e){
    e.preventDefault();
    Swal.fire({
        title: '¿Esta seguro de eliminar el insumo?',
        icon: 'warning',
        showDenyButton: true,
        confirmButtonText: `Eliminar`,
        denyButtonText: `No eliminar`,
    })
    .then(resultado => {
        if(resultado.isConfirmed) {
            $(this).parents('tr').eq(0).remove(); //obtenemos el elemento y eliminamos
            datos_dev.splice(ids_rows, 1);
            Swal.fire({
                title: '¡Eliminado!',
                text: 'El insumo se elimino de la tabla.',
                icon: 'success',
                confirmButtonText: 'Continuar'
            })
        }
        else{
            Swal.fire({
                title: 'No eliminado!',
                text: 'No se elimino el insumo.',
                icon: 'info',
                confirmButtonText: 'Continuar'
            })
        }
    }) 
})


//editar la catidad del insumo seleccionado
function editInsumo(e){
    e.preventDefault();
    Swal.fire({
        title: '¡Editar!',
        text: 'Edite la cantidad por una nueva',
        html: '<input type="number" class="cant_new" id="cant_new" placeholder="Digite la nueva cantidad" required>',
        icon: 'question',
        showDenyButton: true,
        confirmButtonText: `Actualizar`,
        denyButtonText: `No actualizar`,
    })
    .then(resultad =>{
        const iden = e.target.classList[1];  //traemos el identificador el boton
        console.log(iden);
        const nu_lista = iden-2  //restamos 2 para igualarlos a index de la lista
        console.log(nu_lista);
        if(resultad.isConfirmed){
            var cantida_new = document.getElementById("cant_new").value;
            if(cantida_new != '' && cantida_new != 0){
                var __this = this; //Esta linea recupera el elemento el cual se llamo esta funcion
                var nuevas = editarCantidades(__this).innerHTML = parseInt(cantida_new);//Llama a la funcion y recibe el objeto el cual es donde se llama la funcion
                console.log(nuevas);
                $(this).parent().parent().find("td:eq(2)").html(parseInt(cantida_new));//Reemplaza el valor actual html por valor editado y lo muestra en el html
                console.log(datos_dev);
                datos_dev[nu_lista]['cantidad'] = nuevas; //Asigno el valor nuevo al arreglo
                Swal.fire({
                    title: '¡editado!',
                    text: 'La edicion se realizo exitosamente.',
                    icon: 'success',
                    confirmButtonText: 'Continuar'
                });
            }
            else{
                Swal.fire({
                    title: '¡Digite una cantidad valida!',
                    text: 'Digite una nueva cantidad del material.',
                    icon: 'error',
                    confirmButtonText: 'Continuar'
                }); 
            }

        }else{
            Swal.fire({
                title: '¡Cancelado!',
                text: 'Se canceló la edicion del material.',
                icon: 'warning',
                confirmButtonText: 'Continuar'
            }); 
        }
    });

}

function editarCantidades(operacion){
    var updat_cant = operacion.parentNode.parentNode; // se obtiene en donde se preciono
    var nueva_actual = updat_cant.getElementsByTagName("td")[2].innerHTML; //se obtiene la etiqueta y la posicion de la celda

    return nueva_actual; // retorna la vble y viajara en la funcion llamada
}

// funcion para guardar datos de la devolucion en la BD
function guardarDevolucion(e){
    e.preventDefault();

    var json = JSON.stringify(datos_dev); //convierte el array en una cadena de caracteres
    if(datos_dev != ""){
        $.ajax({
            url:'../../php/instructor/registro_dev.php',
            method:"POST",
            data: "json="+json,
            success: function(u){  
                datos_dev = [];
                Swal.fire({
                    title: '¡Enviado!',
                    text: 'Se registro la devolucion.',
                    icon: 'success',
                    confirmButtonText: 'Continuar'
                });
                console.log(datos_dev);
                //limpiamos los datos que esten en la tabla
                document.getElementById('ver_devol').innerHTML = '';
                var actual = new Date();
                var hor_ac = actual.getHours();
                var minutes = actual.getMinutes()
                var second = actual.getSeconds()
                if(hor_ac < 10) { hor_ac = '0' + hor_ac; }
                if(minutes < 10) { minutes = '0' + minutes; }
                if(second < 10) { second = '0' + second; }
                var hora_actual = hor_ac + ':' + minutes + ':' + second;
                    
                document.getElementById("hora").innerHTML = hora_actual;

                // var enviaa = JSON.parse(u);
                // if(enviaa.status === 200){
                    
                // }else{
                //     Swal.fire({
                //         title: '¡Advertencia!',
                //         text: 'No se registro el prestamo.',
                //         icon: 'warning',
                //         confirmButtonText: 'Continuar'
                //     });
                   
                // }
            }
        });

    }else{
        Swal.fire({
            title: '¡Error!',
            text: 'Ingrese los datos a la tabla para enviarlos.',
            icon: 'error',
            confirmButtonText: 'Continuar'
        }); 
    }
}

// funcion para cancelar la devolucion
function cancelarDevolucion(e){
    e.preventDefault();
    if(datos_dev != ""){
        Swal.fire({
            title: '¿Esta seguro de cancelar la devolucion?',
            icon: 'warning',
            showDenyButton: true,
            confirmButtonText: `Cancelar`,
            denyButtonText: `No Cancelar`,
        })
        .then(resul =>{
            if(resul.isConfirmed){
                Swal.fire({
                    title: '¡Cancelado!',
                    text: 'Se cancelo la entrega de la devolucion.',
                    icon: 'info',
                    confirmButtonText: 'Continuar'
                });
                datos_dev = [];
                document.getElementById('ver_devol').innerHTML = '';
                var actual = new Date();
                var hor_ac = actual.getHours();
                var minutes = actual.getMinutes()
                var second = actual.getSeconds()
                if(hor_ac < 10) { hor_ac = '0' + hor_ac; }
                if(minutes < 10) { minutes = '0' + minutes; }
                if(second < 10) { second = '0' + second; }
                var hora_actual = hor_ac + ':' + minutes + ':' + second;
                
                document.getElementById("hora").innerHTML = hora_actual;
            }
            else{
                Swal.fire({
                    title: '¡Error!',
                    text: 'No se cancelo la devolucion de los materiales.',
                    icon: 'error',
                    confirmButtonText: 'Continuar'
                }); 
            }

        })
    }else{
        Swal.fire({
            title: '¡Error!',
            text: 'No puede cancelar datos vacios.',
            icon: 'error',
            confirmButtonText: 'Continuar'
        });
    }
}

