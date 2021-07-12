// FORMULARIOS DE CREAR MATERIAL TEXTIL
const crear_tela = document.getElementById("crear_tela")
const btn_crear_tela = document.getElementById("btn_crear_tela")

// PREOVVERDOR
const proveedor = document.getElementById("proveedor")
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

//Tabla de registro de entrada de los insumos
const datos = [];
var id_datos = 0;
var can_edi = 0;
var cantidad;
var canti_edi;
var id_row;
var fila;
$(document).ready(function(){
    $('#btn_productos').click(function(){
        agregar();
    });
});

function agregar(){
    const cate = document.getElementById('categoria');
    const categorias = cate.options[cate.selectedIndex].text;
    const nombre= document.getElementById('nom_catego').value;
    const nom = document.getElementById('nom_catego');
    const name = nom.options[nom.selectedIndex].text;
    cantidad = document.getElementById('cantidad').value;
    
    if(cate != 0 && cate != '' && nombre != 0 && nombre != '' && cantidad != 0 && cantidad != ''){
        datos.push(
            {
                "id_datos": id_datos,
                "categorias": categorias,
                "name": name,
                "cantidad": cantidad
            }
        );
        // console.log(numero);
        
        id_datos++;
        can_edi++;
        // console.log(id_datos);
        id_row = "row"+id_datos;
        canti_edi = "canti" + can_edi;
        console.log(id_row);
        const deleteButton = "<button class='deleteButton'>Eliminar</button>";
        var editButton = `<button id='${id_row}' onclick="cantida()" class='edit_btn'>Editar</button>`;
        console.log(editButton);
        // var sumaButton = `<button id='${id_row}' class='suma_btn'>+</button>`;
        // const restaButton = `<button id='${id_row}' class='resta_btn'>-</button>`;
        fila=`<tr id="`+ id_row +`" class="tr_val"><td>`+ categorias +`</td><td>`+ name +`</td><td id="${canti_edi}" class="cant_ed">`+ cantidad +`</td><td>`+ editButton + deleteButton +`</td></tr>`;
        console.log(editButton);
        console.log(fila);
        $('#tabla_ing_insu').append(fila);
        

        
        // $(document).on("click", ".suma_btn", function(e){
        //     e.preventDefault();
        //     canti++;
        //     console.log(canti);
        //     $("#tabla_ing_insu").find("tbody").find("tr").each(function(){ //Recorres las filas
        //         $(this).find("td:eq(2)").html(canti); 
        //     });
        //     // $($('#tabla_ing_insu').find('tbody > tr')).children('td')[2].innerHTML = canti;
        //     // if(canti >= 1){ //Si la cantidad es mayo a 2 el boton resta se vuelva habilitar
        //     //     restaButton.disabled = false;
        //     // }
        // });
        // $(document).on("click", ".resta_btn", function(e){
        //     e.preventDefault();
        //     canti--;
        //     console.log(canti);
        //     $("#tabla_ing_insu").find("tbody").find("tr").each(function(){ //Recorres las filas
        //         $(this).find("td:eq(2)").html(canti);
        //     });
        //     // $($('#tabla_ing_insu').find('tbody > tr')).children('td')[2].replace(canti);
        //     // if(canti == 1 || canti == 0){ //Si la cantidad es mayo a 2 el boton resta se vuelva habilitar
        //     //     alert("No restare mas");
        //     //     restaButton.disabled = true;
        //     // }
        // });
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
function cantida(){
    var canti_edi = parseInt(prompt("Cantidad Nueva"));
    if(canti_edi){
        datos.cantidad = canti_edi;
        console.log(cantidad)
        var filas_id = document.getElementById("canti" + can_edi);
        console.log(filas_id)
        filas_id.value(canti_edi)
        // celda = filas_id.getElementsByTagName("td");
        // celda[2].innerHTML = canti_edi;
        // in_can = document.getElementsByClassName("cant_ed");
        // console.log(in_can);
        // // var numero = datos.find(datos_encon => datos_encon.cantidad);
        // // console.log(numero);
        // var fila_aidy = document.getElementsByClassName("tr_val");
        // console.log(fila_aidy);
        // cantidad.innerHTML = canti_edi;
        // console.log(datos);
        // // for(fila_aidy of fila){
        // //     $($('#tabla_ing_insu').find('tbody > tr')).children('td')[2].innerHTML = canti_edi; 
        // // }
    }
    else{
        console.log("Nonas");
    }
    
};  
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


// $(document).on("click", ".resta_btn", function(e){
//     e.preventDefault();
//     canti--;
//     console.log(canti);
//     $($('#tabla_ing_insu').find('tbody > tr')).children('td')[2].innerHTML = canti;
//     e.preventDefault();
//         canti++;
//         console.log(canti);
//         $("#tabla_ing_insu").find("tbody").find("tr").find(`#${e.target.id}`).each(function(){ //Recorres las filas
//             $($('#tabla_ing_insu').find(`#${e.target.id}`)).children('td')[2].innerHTML = canti; 
//         });
//         // $($('#tabla_ing_insu').find(`tbody > #${e.target.id}`)).children('td')[2].innerHTML = canti;
//         console.log(e.target.id);
//         // if(canti >= 1){ //Si la cantidad es mayo a 2 el boton resta se vuelva habilitar
//         //     restaButton.disabled = false;
//         // } 
//     // $("#tabla_ing_insu").find("tbody").find("tr").each(function(){ //Recorres las filas
//     //     $(this).find("td:eq(2)").html(canti);
//     // });
//     // $($('#tabla_ing_insu').find('tbody > tr')).children('td')[2].replace(canti);
//     // if(canti == 1 || canti == 0){ //Si la cantidad es mayo a 2 el boton resta se vuelva habilitar
//     //     alert("No restare mas");
//     //     restaButton.disabled = true;
//     // }
// });