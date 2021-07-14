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

//Registro De insumos
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
        console.log(datos[0]);
        console.log(datos)
        id_datos++;
        can_edi++;
        id_row = "row"+id_datos;
        canti_edi = "canti" + can_edi;
        const deleteButton = "<button class='deleteButton'>Eliminar</button>";
        var editButton = `<button class='edit_btn'>Editar</button>`;
        fila='<tr id="'+ id_row +'" class="tr_val" name="fila_tb_din[]"><td name="row_cat[]">'+ categorias +'</td><td name="row_name[]">'+ name +'</td><td id="'+ canti_edi +'" class="cant_ed" name="row_canti[]">'+ cantidad +'</td><td>'+ editButton + deleteButton +'</td></tr>';

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
        console.log(datos);         
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

function guardarInsumo(e){
    e.preventDefault();
    var json = JSON.stringify(datos);//Convierte el array en una cadena de caracteres
    $.ajax({
        url: './../../php/admin/ingreso_insumos.php',
        method: "POST",
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