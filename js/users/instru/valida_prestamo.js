var input=  document.getElementById('cantid_pres');
input.addEventListener('input',function(){
  if (this.value.length > 3) 
     this.value = this.value.slice(0,5); 
})
// registro de peticion de materiales a prestar 
$(document).ready(function(){ //se asigna una funcion 
    recargarLista();
    $('#categ').change(function(){ //se trae el id y se asigna al evento
        recargarLista(); // al dar click llama la funcion
    });
})

function recargarLista(){
    $.ajax({
        type:"POST", //metodo por el cual se envian los datos
        url: '../../php/instructor/valida_prestamo.php', // direcciona al archivo y ejecuta lo que tiene 
        data: "prestamo=" + $('#categ').val(), // creamos una vble que se le asigna el valor que tenga el select
        success: function(r){
            $('#nom_categ').html(r); //mostramos el select
        }
    });
}

//llamar la funcion para agregar a la tabla

$(document).ready(function(){
    $('#agregar_lista').click(function(){
        agregarPres();
    });
    $(document).on("click", ".editar_btn", editarMaterial); // llamar a la funcion para editar cantidad
    $(document).on("click", "#solicitar_prest", guardarMateriales); // llamar la funcion para enviar a la BD
    $(document).on("click", "#btn_cancelar_material", cancelarMaterial); //llamar la funcion para cancelar lo que tenga en la tabla

});

// registro de materiales

var datosPre = [];
var id_dato = 1;
var cant_edi = 0;
var can;
var canti_edit;
var ids_row;
var filas;

//funcion que trae el valor que contenga los select para agregarlos a la tabla
function agregarPres(){
    const catego = document.getElementById('categ');
    const cates = document.getElementById('categ').value;
    const categ_pres = catego.options[catego.selectedIndex].text;
    const nomb = document.getElementById('nom_categ').value;
    const nom = document.getElementById('nom_categ');
    const names = nom.options[nom.selectedIndex].text;
    cant_pres = document.getElementById('cantid_pres').value;
    var respons = document.getElementById('responsable').value;
    var fecha = $("#fecha").text();
    var hora = $("#hora").text();

    if(catego != 0 && catego != '' && nomb != 0 && nomb != '' && cant_pres != 0 && cant_pres != ''){
        if(check_id(names)) {
            Swal.fire({
                title: 'Datos Repetidos!',
                text: 'Ingrese otro material, este ya se encuentra en la tabla.',
                icon: 'warning',
                confirmButtonText: 'Continuar'
            });
            $('#categ option:first').prop('selected', true);
            $('#nom_categ').find('option').not(':first').remove();
            $('input[type="number"]').val('');
        }
        else{
            // agregar elementos al arreglo
            datosPre.push(
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
            const deleteButton = "<button class='delete_button'>ELIMINAR</button>";
            var editButton = `<button class='editar_btn ${id_dato}'>EDITAR</button>`;
            filas='<tr id="'+ ids_row +'" class="tr_val" ><td class="td_cat">'+ categ_pres +'</td><td for="nombr" class="td_nom" id="no_categ">'+ names +'</td><td id="'+ canti_edit +'" class="cant_ed" >'+ cant_pres +'</td><td class="td_botones">'+ editButton + deleteButton +'</td></tr>';
            
            $('#tablaInfo').append(filas); // agrega los datos capturados a la tabla
            
            // vaciar los campos de los select cuando se agrega un valor
            $('#categ option:first').prop('selected', true);
            $('#nom_categ').find('option').not(':first').remove();
            $('input[type="number"]').val('');
    

        }
       
        
    }else{
        Swal.fire({
            title: '¡Advertencia!',
            text: 'Por favor rellene el formulario correctamente.',
            icon: 'warning',
            confirmButtonText: 'Continuar'
        })
    }
}
console.log(datosPre);

function check_id(names){
    let idss = document.querySelectorAll('#tablaInfo td[for="nombr"]');
    console.log(idss);
    return [].filter.call(idss, td => td.textContent === names).length === 1;
}
console.log(datosPre);

// borrar la fila de la tabla 
$(document).on("click", ".delete_button", function(e){
    e.preventDefault();
    Swal.fire({
        title: '¿Esta seguro de eliminar el material?',
        icon: 'warning',
        showDenyButton: true,
        confirmButtonText: `Eliminar`,
        denyButtonText: `No eliminar`,
    }).then(result => {
        if(result.isConfirmed) {
            $(this).parents('tr').eq(0).remove(); //obtenemos el elemento y eliminamos
            datosPre.splice(ids_row, 1);
            Swal.fire({
                title: '¡Eliminado!',
                text: 'El material se elimino de la tabla.',
                icon: 'success',
                confirmButtonText: 'Continuar'
            })
        }
        else{
            Swal.fire({
                title: '¡No eliminado!',
                text: 'No se elimino el material.',
                icon: 'info',
                confirmButtonText: 'Continuar'
            })
        }
    })

})


//editar la cantidad del material seleccionados 
function editarMaterial(e){
    e.preventDefault();
    Swal.fire({
        title: '¡Editar!',
        text: 'Edite la cantidad por una nueva',
        html: '<input type="number" class="nuevas" id="nuevas" placeholder="Digite la nueva cantidad" required>',
        icon: 'question',
        showDenyButton: true,
        confirmButtonText: `Actualizar`,
        denyButtonText: `No actualizar`,
    })
    .then(resul =>{
        const orden = e.target.classList[1]; //traemos el identificador el boton
        console.log(orden);
        const compra = orden-2 //restamos 2 para igualarlos a index de la lista
        console.log(compra);
        if(resul.isConfirmed){
            var nueva_canti = document.getElementById("nuevas").value;
            if(nueva_canti != '' && nueva_canti != 0){
                var _this = this;//Esta linea recupera el elemento el cual se llamo esta funcion
                var canti_nueva = editContenido(_this).innerHTML = parseInt(nueva_canti);//Llama a la funcion y recibe el objeto el cual es donde se llama la funcion
                console.log(canti_nueva);
                $(this).parent().parent().find("td:eq(2)").html(parseInt(nueva_canti));//Reemplaza el valor actual html por valor editado y lo muestra en el html
                console.log(datosPre)
                datosPre[compra]['cantidad'] = canti_nueva; //Asigno el valor nuevo al arreglo
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

function editContenido(opciones){
    var cant_up = opciones.parentNode.parentNode; // se obtiene en donde se preciono
    var cant_real = cant_up.getElementsByTagName("td")[2].innerHTML; //se obtiene la etiqueta y la posicion de la celda

    return cant_real; // retorna la vble y viajara en la funcion llamada
}


//funcion para guardar datos de los materiales en la BD


function guardarMateriales(e){
    e.preventDefault();

    var json = JSON.stringify(datosPre); //convierte el array en una cadena de caracteres
    if(datosPre != ""){
        $.ajax({
            url:'../../php/instructor/registro_prestamo.php',
            method:"POST",
            data: "json="+json,
            success: function(a){
                console.log(a);
                // const envios = JSON.parse(a);
                // console.log(envios);
                // if(envios.status === 200){
                    datosPre = [];
                    Swal.fire({
                        title: '¡Enviado!',
                        text: 'Se registro el prestamo del material.',
                        icon: 'success',
                        confirmButtonText: 'Continuar'
                    });
                    console.log(datosPre);
                    //limpiamos los datos que esten en la tabla
                    document.getElementById('agregado').innerHTML = '';
                    $('#categ option:first').prop('selected', true);
                    $('#nom_categ').find('option').not(':first').remove();
                    $('input[type="number"]').val('');
                    var actual = new Date();
                    var hor_ac = actual.getHours();
                    var minutes = actual.getMinutes()
                    var second = actual.getSeconds()
                    if(hor_ac < 10) { hor_ac = '0' + hor_ac; }
                    if(minutes < 10) { minutes = '0' + minutes; }
                    if(second < 10) { second = '0' + second; }
                    var hora_actual = hor_ac + ':' + minutes + ':' + second;
                   
                    document.getElementById("hora").innerHTML = hora_actual;

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

// funcion para cancelar el prestamo del material

function cancelarMaterial(e){
    e.preventDefault();
    if(datosPre != ""){
        
        Swal.fire({
            title: '¿Esta seguro de cancelar el prestamo?',
            icon: 'warning',
            showDenyButton: true,
            confirmButtonText: `Cancelar`,
            denyButtonText: `No Cancelar`,
        })
        .then(resulta =>{
            if(resulta.isConfirmed){
                datosPre = [];
                Swal.fire({
                    title: '¡Cancelado!',
                    text: 'Se cancelo el prestamo del material.',
                    icon: 'info',
                    confirmButtonText: 'Continuar'
                });
                //limpiamos lo que tenga en la tabla
                document.getElementById('agregado').innerHTML = '';
                $('#categ option:first').prop('selected', true);
                $('#nom_categ').find('option').not(':first').remove();
                $('input[type="number"]').val('');
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
                    text: 'No se cancelo el prestamo del material.',
                    icon: 'error',
                    confirmButtonText: 'Continuar'
                }); 
            }
        })
        
    }
    else{
        Swal.fire({
            title: '¡Error!',
            text: 'No puede cancelar datos vacios.',
            icon: 'error',
            confirmButtonText: 'Continuar'
        });
    }
    
}
