// FORMULARIOS DE CREAR MATERIAL TEXTIL
const crear_tela = document.getElementById("crear_tela")
const btn_crear_tela = document.getElementById("btn_crear_tela")

// PREOVVERDOR

const form_proveedor = document.getElementById("form_proveedor")
const factura = document.getElementById("factura")


//Registro De Ingreso De Insumos
$(document).ready(function(){
    recargarLista();
    $('#categoria').change(function(){
        recargarLista();
    });
})

function recargarLista(){
    $.ajax({
        type:"POST",
        url: '../../php/admin/categorias.php',
        data: "ingreso_insumo=" + $('#categoria').val(),
        success: function(r){
            $('#nom_catego').html(r);
        }
    });
}

const datos = [];
var id_datos = 0;
var can_edi = 0;
var cantidad;
var canti_edi;
var id_row;
var fila;
// var boton_envia = document.getElementById("envia_ing_ins");
// boton_envia.addEventListener("click", guardar);
$(document).ready(function(){
    $('#btn_productos').click(function(){
        agregar();
    });
    $(document).on("click", ".edit_btn", editarInsumo);  
    $(document).on("click", "#envia_ing_ins", guardarInsumo);  
});

function agregar(){
    const cate = document.getElementById('categoria');
    const categorias = cate.options[cate.selectedIndex].text;
    const nombre= document.getElementById('nom_catego').value;
    const nom = document.getElementById('nom_catego');
    const name = nom.options[nom.selectedIndex].text;
    cantidad = document.getElementById('cantidad').value;
    var respon = document.getElementById('respon').value;
    var proveedor = document.getElementById("proveedor").value;
    var fec =  $("#fecha").text();
    var hor =  $("#hora").text();
    // console.log(proveedor)
    
    if(cate != 0 && cate != '' && nombre != 0 && nombre != '' && cantidad != 0 && cantidad != ''){
        datos.push(
            {
                "id_datos": id_datos,
                "responsable": respon,
                "proveedor": proveedor,
                "categorias": categorias,
                "name": name,
                "cantidad": cantidad,
                "fecha": fec,
                "hora": hor
            }
        );
        console.log(datos);
        id_datos++;
        can_edi++;
        id_row = "row"+id_datos;
        canti_edi = "canti" + can_edi;
        const deleteButton = "<button class='deleteButton'>Eliminar</button>";
        var editButton = `<button class='edit_btn'>Editar</button>`;
        console.log(editButton);
        fila='<tr id="'+ id_row +'" class="tr_val"><td>'+ categorias +'</td><td>'+ name +'</td><td id="'+ canti_edi +'" class="cant_ed">'+ cantidad +'</td><td>'+ editButton + deleteButton +'</td></tr>';
        console.log(editButton);
        console.log(fila);
        $('#tabla_ing_insu').append(fila);
        $('#categoria option:first').prop('selected', true); //Vacia los campos de los selects cuando agrega
        $('#nom_catego').find('option').not(':first').remove(); //Vacia los campos de los selects cuando agrega
        $('input[type="number"]').val(''); //Vacia el campo del input 
    }
    else{
        Swal.fire({
            title: 'Datos Vacios',
            text: 'Ingrese datos por favor',
            icon: 'warning',
            confirmButtonText: 'Continuar'
        })
    }
}  
function guardarInsumo(e){
    e.preventDefault();
    var json = JSON.stringify(datos);//Convierte el array en una cadena de caracteres
    $.ajax({
        url: '../../php/admin/ingreso_insumos.php',
        type: "POST",
        data: "json="+json,
        success: function(r){
            console.log("HolA sI LO hIzO");
            console.log(r);
            const envia = JSON.parse(r);
            console.log(envia.status);
            if(envia.status === 200){
                alert("Se Registro Tu Prestamo Con Exito");
                document.getElementById('mostrar_insumos').innerHTML = '';
            }
            else {  
                // $('#estado').html('<hr><p>Error al guardar los datos.</p><hr>');
                alert("No Se Registro Tu Prestamo Con Exito");
            }
        }
    });
    console.log(json);
}
$(document).on("click", ".deleteButton", function(e){
    e.preventDefault();
    $(this).parents('tr').eq(0).remove();
    datos.splice(id_row, 1);
    console.log(datos)
    Swal.fire({
        title: 'Eliminado!',
        text: 'El insumo se elimino',
        icon: 'success',
        confirmButtonText: 'Continuar'
    })
});
function editarInsumo(e){
    e.preventDefault();
    var canti_edi = parseInt(prompt("Cantidad Nueva"));
    if(canti_edi){
        var _this = this;//Esta linea recupera el elemento o lugar el cual se llamo esta funcion
        var cantid = editarSelec(_this).innerHTML = canti_edi;//Llama a la funcion y recibe el objeto el cual es donde se llama la funcion
        $(this).parent().parent().find("td:eq(2)").html(cantid);  
        // console.log(fila);
    }
    else{
        Swal.fire({
            title: 'Cancelado!',
            text: 'Se canceló la edicion',
            icon: 'warning',
            confirmButtonText: 'Continuar'
        });
    }
}

function editarSelec(objetoPresionado){
    var can_ed = objetoPresionado.parentNode.parentNode;//Se obtiene en donde se presiono
    var cantidades = can_ed.getElementsByTagName("td")[2].innerHTML;//Se obtiene la etiqueta y la posicion de la celda

    return cantidades;//Retornara esta vble y viajara en la funcion llamada
}


// $(document).on('ready', principal());

// function principal(){
//     $("#btn_productos").on('click', agregarRow);
//     $(document).on("click", ".btn_borrar", borrarInsumo);  
//     $(document).on("click", ".edit_btn", editarInsumo);  
// }

// function agregarRow(){
//     var cate = document.getElementById('categoria');
//     var categorias = cate.options[cate.selectedIndex].text;
//     var nombre= document.getElementById('nom_catego').value;
//     var nom = document.getElementById('nom_catego');
//     var name = nom.options[nom.selectedIndex].text;
//     var cantidad = document.getElementById('cantidad').value;
//     var deleteButton = "<button class='btn_borrar'>Eliminar</button>";
//     var editButton = "<button class='edit_btn'>Editar</button>";
//     if(cate != 0 && cate != '' && nombre != 0 && nombre != '' && cantidad != 0 && cantidad != ''){
//         const nombre_tabla = document.getElementById("tabla_ing_insu");
//         const fila = nombre_tabla.insertRow(1);
    
//         var celda = fila.insertCell(0);
//         var celda2 = fila.insertCell(1);
//         var celda3 = fila.insertCell(2);
//         var celda4 = fila.insertCell(3);
    
//         celda.innerHTML = categorias;
//         celda2.innerHTML = name;
//         celda3.innerHTML = cantidad;
//         celda4.innerHTML = deleteButton + editButton;  
        
//         celda.style.border="1px solid #23ad9dc5";
//         celda2.style.border="1px solid #23ad9dc5";
//         celda3.style.border="1px solid #23ad9dc5";
//         celda4.style.border="1px solid #23ad9dc5";
//         celda.style.padding="1%";
//         celda2.style.padding="1%";
//         celda3.style.padding="1%";
//         celda4.style.padding="1%";
    
//         $('#categoria option:first').prop('selected', true); //Vacia los campos de los selects cuando agrega
//         $('#nom_catego').find('option').not(':first').remove(); //Vacia los campos de los selects cuando agrega
//         $('input[type="number"]').val(''); //Vacia el campo del input 
//     }
//     else{
//         Swal.fire({
//             title: 'Datos Vacios',
//             text: 'Ingrese datos por favor',
//             icon: 'warning',
//             confirmButtonText: 'Continuar'
//         });
//     }
//     $(document).submit('#envia_ing_ins', function(e){
//         e.preventDefault();
//         var cate_ins = document.getElementById('categoria').value;
//         var nom_ins = document.getElementById('nom_catego').value;
//         var proveedor = document.getElementById("proveedor").value;
//         var cant = document.getElementById("cantidad").value;
//         // var prov = document.getElementById('categoria').value;
//         // var cate = cate_ins;
//         // var nome = nom_ins;
//         // console.log(cantid)
//         var can = cant;    
//         var prove = proveedor;
//         var fec =  $("#fecha").text();
//         var hor =  $("#hora").text();
    
//         $.ajax({
//             url: '../../php/admin/ingreso_insumos.php',
//             method: "POST",
//             data: { categoria:cate_ins, nombre: nom_ins, canti: can, provee: prove, fecha: fec, hora: hor },
//             success: function(r){
//                 const envia = JSON.parse(r);
//                 console.log(envia.status);
//                 if(envia.status === 200){
//                     alert("Se Registro Tu Prestamo Con Exito");
//                     document.getElementById('mostrar_insumos').innerHTML = '';
//                 }
//                 else {  
//                     // $('#estado').html('<hr><p>Error al guardar los datos.</p><hr>');
//                     alert("No Se Registro Tu Prestamo Con Exito");
//                 }
//             }
//         });
//     });
// }
// // console.log(agregarRow);
// function editarInsumo(e){
//     e.preventDefault();
//     var canti_edi = parseInt(prompt("Cantidad Nueva"));
//     if(canti_edi){
//         var _this = this;//Esta linea recupera el elemento o lugar el cual se llamo esta funcion
//         var cantid = editarSelec(_this).innerHTML = canti_edi;//Llama a la funcion y recibe el objeto el cual es donde se llama la funcion
//         $(this).parent().parent().find("td:eq(2)").html(cantid);  
//         // console.log(cantid);
//     }
//     else{
//         Swal.fire({
//             title: 'Cancelado!',
//             text: 'Se canceló la edicion',
//             icon: 'warning',
//             confirmButtonText: 'Continuar'
//         });
//     }
// }

// function editarSelec(objetoPresionado){
//     var can_ed = objetoPresionado.parentNode.parentNode;//Se obtiene en donde se presiono
//     var cantidades = can_ed.getElementsByTagName("td")[2].innerHTML;//Se obtiene la etiqueta y la posicion de la celda

//     return cantidades;//Retornara esta vble y viajara en la funcion llamada
// }
// function borrarInsumo(e){
//     e.preventDefault();
//     var _this = this; //Esta linea recupera el elemento o lugar el cual se llamo esta funcion
// 	var array_f= obtenerSelec(_this); //Llama a la funcion y recibe el objeto el cual es donde se llama la funcion
//     // console.log(array_f[0] + " - " + array_f[1] + " - " + array_f[2] + " - " + array_f[3]);//Muestra en consola el array returnado en la otra funcion
// 	$(this).parent().parent().remove();//Elimina la fila en el cual se da click
//     Swal.fire({
//         title: 'Eliminado!',
//         text: 'El insumo se elimino',
//         icon: 'success',
//         confirmButtonText: 'Continuar'
//     })
// }
// function obtenerSelec(objectPressed){
//     var filas = objectPressed.parentNode.parentNode; //Se obtiene en donde se presiono
// 	var categorias = filas.getElementsByTagName("td")[0].innerHTML;
// 	var name = filas.getElementsByTagName("td")[1].innerHTML;
// 	var cantidad = filas.getElementsByTagName("td")[2].innerHTML;
// 	var botones = filas.getElementsByTagName("td")[3].innerHTML;
// 	var array_fila = [categorias, name, cantidad, botones];

// 	return array_fila;//Retornara este arreglo y viajara en la funcion llamada
// }
