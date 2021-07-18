// FORMULARIOS DE CREAR MATERIAL TEXTIL
const crear_tela = document.getElementById("crear_tela")
const btn_crear_tela = document.getElementById("btn_crear_tela")

// PREOVVERDOR

const form_proveedor = document.getElementById("form_proveedor")
const factura = document.getElementById("factura")


//Registro De Ingreso De Insumos
$(document).ready(function(){//Se lee el documento y se asigna una funcion
    recargarLista();
    $('#categoria').change(function(){//Traemos el id del select y asignamos el evento change 
        recargarLista();//Cuando se de cambio en o click en ese select llamara la funcion
    });
})

function recargarLista(){
    $.ajax({
        type:"POST",//Metodo post
        url: '../../php/admin/categorias.php',//Direccionamiento de archivo
        data: "ingreso_insumo=" + $('#categoria').val(),//Se le asigna a una vble el valor que trae el select 
        success: function(r){
            $('#nom_catego').html(r);//Lo mostramos en pantalla
        }
    });
}

//Registro De insumos

var datos = [];
var id_datos = 1;
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
    $(document).on("click", "#cancel", cancelarInsumo);  
});

function agregar(){
    const cate = document.getElementById('categoria');
    const cates = document.getElementById('categoria').value;
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
        if(proveedor != '' && proveedor != 0){
            datos.push(
                {
                    "id_datos": id_datos,
                    "responsable": respon,
                    "proveedor": proveedor,
                    "categorias": cates,
                    "name": nombre,
                    "cantidad": cantidad,
                    "fecha": fec,
                    "hora": hor
                }
            );
            id_datos++;
            can_edi++;
            id_row = "row"+id_datos;
            canti_edi = "canti" + can_edi;
            const deleteButton = "<button class='deleteButton'>ELIMINAR</button>";
            var editButton = `<button class='edit_btn ${id_datos}'>EDITAR</button>`;
            fila ='<tr id="'+ id_row +'" class="tr_val" ><td class="td_cat" style="border:1px solid #23ad9dc5;">'+ categorias +'</td><td class="td_nom" style="border:1px solid #23ad9dc5;">'+ name +'</td><td id="'+ canti_edi +'" class="cant_ed" style="border:1px solid #23ad9dc5;">'+ cantidad +'</td><td class="td_botones" style="border:1px solid #23ad9dc5;">'+ editButton + deleteButton +'</td></tr>';
            
            $('#tabla_ing_insu').append(fila);
            $('#categoria option:first').prop('selected', true); //Vacia los campos de los selects cuando agrega
            $('#nom_catego').find('option').not(':first').remove(); //Vacia los campos de los selects cuando agrega
            $('input[type="number"]').val(''); //Vacia el campo del input 
        }
        else{
            Swal.fire({
                title: 'Dato Vacio',
                text: 'Ingrese el proveedor por favor',
                icon: 'warning',
                confirmButtonText: 'Continuar'
            })
            
        }
        // datos.forEach(elemento =>{
        //    const tbod = document.getElementById("mostrar_insumos");
        //    tbod.style.border = "1px solid #23ad9dc5";
        //    fila.style.border = "1px solid #23ad9dc5";
        // })
        // const cattegori = document.getElementsByTagName("tbody");
        // console.log(cattegori);
        // const nommb = document.getElementsByTagName("tbody td")[0];
        // console.log(nommb);
        // const cantti = document.getElementsByClassName("cant_ed");
        // // console.log(cantti);
        // const botones = document.getElementsByClassName("td_botones");
        // cattegori.style.border = "1px solid #23ad9dc5";
        // console.log(botones);
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
console.log(datos);
$(document).on("click", ".deleteButton", function(e){
    e.preventDefault();
    Swal.fire({
        title: 'Esta seguro de eliminarlo?',
        icon: 'warning',
        showDenyButton: true,
        confirmButtonText: `Eliminar`,
        denyButtonText: `No eliminar`,
    }).then(result => {
        if (result.isConfirmed) {
            $(this).parents('tr').eq(0).remove();
            datos.splice(id_row, 1);
            Swal.fire({
                title: 'Eliminado!',
                text: 'El insumo se elimino',
                icon: 'success',
                confirmButtonText: 'Continuar'
            });
        }
        else{
            Swal.fire({
                title: 'No Eliminó!',
                text: 'No se elimino el insumo',
                icon: 'info',
                confirmButtonText: 'Continuar'
            });
        }
    })
    
});

function editarInsumo(e){
    e.preventDefault();
    // var canti_edi = parseInt(prompt("Cantidad Nueva"));
    Swal.fire({
        title: 'Edicion!',
        text: 'Ingrese una nueva cantidad',
        html: '<input type="number" class="num_cant" id="num_cant" placeholder="Ingrese La Cantidad Nueva" required>',
        icon: 'question',
        showDenyButton: true,
        confirmButtonText: `Actualizar`,
        denyButtonText: `No actualizar`,
    }).then(result =>{
        const id = e.target.classList[1] //^ me trae el identificador del botn
        console.log(id);
        const id_lista = id-2 //^ le resto 2 para igualarlo a index de la lista
        console.log(id_lista);
    
        if (result.isConfirmed){
            var nume = document.getElementById("num_cant").value;
            if(nume != '' && nume != 0){
                
                var _this = this;//Esta linea recupera el elemento o lugar el cual se llamo esta funcion
                var cantid = editarSelec(_this).innerHTML = parseInt(nume);//Llama a la funcion y recibe el objeto el cual es donde se llama la funcion
                console.log(cantid);
                $(this).parent().parent().find("td:eq(2)").html(parseInt(nume));//Reemplaza el valor actual html por valor editado y lo muestra en el html
                console.log(datos)
                datos[id_lista]['cantidad'] = cantid; //Asigno el valor nuevo al arreglo
                Swal.fire({
                    title: 'Editado :)',
                    text: 'Ha sido editado con exito',
                    icon: 'success',
                    confirmButtonText: 'Continuar'
                });
            }
            else{
                Swal.fire({
                    title: 'Ingrese una cantidad!',
                    text: 'Digite una nueva cantidad',
                    icon: 'error',
                    confirmButtonText: 'Continuar'
                });
            }
            
            }
        else{
            Swal.fire({
                title: 'Cancelado!',
                text: 'Se canceló la edicion',
                icon: 'warning',
                confirmButtonText: 'Continuar'
            });
        }
        
    });
}    
    
function editarSelec(objetoPresionado){
    var can_ed = objetoPresionado.parentNode.parentNode;//Se obtiene en donde se presiono
    var cantidades = can_ed.getElementsByTagName("td")[2].innerHTML;//Se obtiene la etiqueta y la posicion de la celda
    
    return cantidades;//Retornara esta vble y viajara en la funcion llamada
}
function guardarInsumo(e){
    e.preventDefault();
    // console.log(datos);
    var json = JSON.stringify(datos);//Convierte el array en una cadena de caracteres
    if(datos != ""){
        $.ajax({
            url: '../../php/admin/ingreso_insumos.php',
            method: "POST",
            data: "json="+json,
            success: function(r){
                const envia = JSON.parse(r);
                if(envia.status === 200){
                    datos = [];
                    Swal.fire({
                        title: 'Agregado!',
                        text: 'Se registro el ingreso del insumo',
                        icon: 'success',
                        confirmButtonText: 'Continuar'
                    });
                    document.getElementById('mostrar_insumos').innerHTML = '';
                    $('#proveedor option:first').prop('selected', true);
                    var actual = new Date();
                    var hor_ac = actual.getHours();
                    var minutes = actual.getMinutes()
                    var second = actual.getSeconds()
                    if(hor_ac < 10) { hor_ac = '0' + hor_ac; }
                    if(minutes < 10) { minutes = '0' + minutes; }
                    if(second < 10) { second = '0' + second; }
                    var hora_actual = hor_ac + ':' + minutes + ':' + second;
                    console.log(hora_actual); 
                    document.getElementById("hora").innerHTML = hora_actual;
                }
                else {  
                    // $('#estado').html('<hr><p>Error al guardar los datos.</p><hr>');
                    Swal.fire({
                        title: 'No agregado!',
                        text: 'No se registro el insumo',
                        icon: 'warning',
                        confirmButtonText: 'Continuar'
                    });
                }
            }
        });
    }
    else {
        Swal.fire({
            title: 'Error!',
            text: 'Eliga una opcion para el proveedor y/o ingrese valores',
            icon: 'error',
            confirmButtonText: 'Continuar'
        });
    }
}
function cancelarInsumo(e){
    e.preventDefault();
    if(datos != ""){
        Swal.fire({
            title: 'Esta seguro de eliminarlo?',
            icon: 'warning',
            showDenyButton: true,
            confirmButtonText: `Cancelar`,
            denyButtonText: `No Cancelar`,
        }).then(result => {
            if(result.isConfirmed){
                datos = [];
                Swal.fire({
                    title: 'Cancelado!',
                    text: 'Se cancelo el ingreso del insumo',
                    icon: 'info',
                    confirmButtonText: 'Continuar'
                });
                document.getElementById('mostrar_insumos').innerHTML = '';
                $('#proveedor option:first').prop('selected', true);
                var actual = new Date();
                var hor_ac = actual.getHours();
                var minutes = actual.getMinutes()
                var second = actual.getSeconds()
                if(hor_ac < 10) { hor_ac = '0' + hor_ac; }
                if(minutes < 10) { minutes = '0' + minutes; }
                if(second < 10) { second = '0' + second; }
                var hora_actual = hor_ac + ':' + minutes + ':' + second;
                console.log(hora_actual); 
                document.getElementById("hora").innerHTML = hora_actual;
            }
            else{
                Swal.fire({
                    title: 'Error!',
                    text: 'No se cancelo el ingreso del insumo',
                    icon: 'error',
                    confirmButtonText: 'Continuar'
                });
            }
        })
    }
    else{
        Swal.fire({
            title: 'Error!',
            text: 'No puede cancelar valores vacios',
            icon: 'error',
            confirmButtonText: 'Continuar'
        });
    }
    
    
}