//VARIABLES DEL FORMULARIO DE REGISTRO DEL PRESTAMO
const contenedor_one = document.getElementById('ventana_one');
const btn_ventana_one = document.getElementById('one');
const btn_cerrar = document.getElementById('cerrar1');

//VARIABLES DEL FORMULARIO DE REGISTRO DE LAS DEVOLUCIONES
const contenedor_two = document.getElementById('ventana_two');
const btn_ventana_two = document.getElementById('two');
const btn_cerrar2 = document.getElementById('cerrar2');

//variables donde aparecen los prestamos pendientes
const contenedor_tres = document.getElementById('ventana_cuatro');
const btn_ventana_tres = document.getElementById('tres');
const btn_cerrar3 = document.getElementById('cerrar4')

//variables donde aparecen las devoluciones pendientes
// const contenedor_cuatro = document.getElementById('ventana_cuatro');
// const btn_ventana_cuatro = document.getElementById('cuatro');
// const btn_cerrar4 = document.getElementById('cerrar4')

// Ventana modal 1 y formulario de peticion de prestamos
btn_ventana_one.addEventListener('click', function(){
    contenedor_one.style.display="block";
})

// cerrar formulario de peticion de prestamo
btn_cerrar.addEventListener('click', function(e){
    e.preventDefault();
    // vaciar campos de los select cuando se cierra el formulario
    $('#categ option:first').prop('selected', true);
    $('#nom_categ').find('option').not(':first').remove();
    $('input[type="number"]').val('');
    //vaciar la tabla cuando se cierra el formulario
    document.getElementById('agregado').innerHTML = '';

    contenedor_one.style.display = 'none';
    // vaciar la tabla con su contenido
    // var tablaPrestamo = document.getElementById('tablaInfo');
    // var fila_tabla = tablaPrestamo.getElementsByTagName('tr');
    // var celda_tabla = fila_tabla.length;
    // for (var x=celda_tabla-1; x>0; x--) {
    //     tablaPrestamo.removeChild(fila_tabla[x]);
    // }
   
    // var elemento = document.getElementById('agregado');
    // var filas_tabla = elemento.getElementsByTagName('tr');
    // var contador_celd = filas_tabla.length;
    // for (var x=contador_celd-1; x>0; x--) {
    //     elemento.removeChild(filas_tabla[x]);
    // }
})


//Ventana modal 2 y formulario de las devoluciones
btn_ventana_two.addEventListener("click",function(){
    contenedor_two.style.display="block";
})
//cerrar la ventana de las devoluciones
btn_cerrar2.addEventListener('click', function(e){
    e.preventDefault();
    //vaciar los campos o select del formualrio
    $('#cate_dev option:first').prop('selected', true);
    $('#devolucion').find('option').not(':first').remove();
    $('input[type="number"]').val('');
    //vaciar la tabla
    document.getElementById('ver_devol').innerHTML = '';

    contenedor_two.style.display="none";
})

//Ventana modal 3, donde aparecen los pestamos pendientes
btn_ventana_tres.addEventListener("click",function(){
    contenedor_tres.style.display="block";
})

// //cerrar ventana
btn_cerrar3.addEventListener('click', function(e){
    e.preventDefault();

    contenedor_tres.style.display="none";
})

//Ventana modal 4, donde van las devoluciones pendientes
// btn_ventana_cuatro.addEventListener("click",function(){
//     contenedor_cuatro.style.display="block";  
// })

// btn_cerrar4.addEventListener('click', function(e){
//     e.preventDefault();

//     contenedor_cuatro.style.display="none";
// })




//Boton para poder agregar el listado del prestamo
// const btn_agregar = document.getElementById('agregar');
// btn_agregar.addEventListener('click', function(e){
//     e.preventDefault();
//     //Declaracion De variables para capturar valores de los inputs
//     var selec_cat = document.getElementById('ti_pres').value;
//     const sel_cat = document.getElementById('ti_pres');
//     const val_op = sel_cat.options[sel_cat.selectedIndex].text; //Selecciona el indice el cual escogamos y mostrara el texto
//     var nomb = document.getElementById('pres').value;
//     const nam = document.getElementById('pres');
//     const val_pres = nam.options[nam.selectedIndex].text;//Selecciona el indice el cual escogamos y mostrara el texto
//     var cant = document.getElementById('cant').value;
//     //Valida que los campos sean diferentes a vacios
//     if(selec_cat != 0 && selec_cat != '' && nomb != 0 && nomb != '' && cant != 0 && cant != ''){
//         const tabla = document.getElementById('tab_info');
//         const agre_tab = tabla.insertRow(-1);//Inserta una fila automaticamente cada vez que agreguemos algo
//         const celd = agre_tab.insertCell(0);//Inserta una celda automaticamente cada vez que agreguemos algo
//         celd.textContent = val_op;
//         const celd1 = agre_tab.insertCell(1);
//         celd1.textContent = val_pres;
//         const celd2 = agre_tab.insertCell(2);
//         celd2.textContent = cant;
//         const espacio = document.createTextNode('        ');//Espacio para botones
//         const suma = document.createElement("button");//Creamos un boton
//         suma.textContent = "+"; //Le asignamos lo que queremos que se vea, el +
//         const resta = document.createElement("button");//Creamos un boton
//         resta.textContent = "-";//Le asignamos lo que queremos que se vea, el -
//         const celd3 = agre_tab.insertCell(3);
//         const deleteButton = document.createElement("button");
//         deleteButton.textContent = "Eliminar";
//         celd3.appendChild(deleteButton);
//         deleteButton.addEventListener('click', (e)=>{//Funcion para eliminar las filas agregadas
//             e.preventDefault();
//             e.target.parentNode.parentNode.remove();//Elimina las filas que han sido agregadas
//             alert("Insumo Eliminado");//Envia alerta
//         });
//         celd3.appendChild(suma); //Lo agregamos a la tabla, indicandole en que celda
//         celd3.appendChild(espacio);//Lo agregamos a la tabla, indicandole en que celda
//         celd3.appendChild(resta);//Lo agregamos a la tabla, indicandole en que celda

//         suma.addEventListener('click', function(e){//Hacemos que sume de 1 en 1 y aumenta la cantidad
//             e.preventDefault();
//             cant++;
//             celd2.textContent = cant;
//             if(cant >= 1){ //Si la cantidad es mayo a 2 el boton resta se vuelva habilitar
//                 resta.disabled = false;
//             }
//         })
//         resta.addEventListener('click', function(e){//Hacemos que reste de 1 en 1 y aumenta la cantidad
//             e.preventDefault();
//             num = 1;
//             cant--;
//             celd2.textContent = cant;
//             if(cant == num || cant == 0){//Valida para que no muestre valores negativos
//                 alert("No Puede Restar Mas"); 
//                 resta.disabled = true; //Desabilita el boton
//             }
//         })  
//         $('option:selected').removeAttr("selected"); //Vacia los campos de los selects cuando agrega
//         $('input[type="number"]').val(''); //Vacia el campo del input 
//         //Estilos de la tabla
//         celd.style.border="1px solid #23ad9dc5";
//         celd1.style.border="1px solid #23ad9dc5";
//         celd2.style.border="1px solid #23ad9dc5";
//         celd3.style.border="1px solid #23ad9dc5";
        
//         $(document).submit('#envia_prest', function(e){
//             e.preventDefault();
//             var nome = nomb;
//                 can = cant;
//                 cate = selec_cat;
//                 var fec =  $("#fecha").text();
//                 var hor =  $("#hora").text();
        
//             $.ajax({
//                 url: '../../php/instructor/registro_presta.php',
//                 method: "POST",
//                 data: { categoria:cate, nombre: nome, canti: can, fecha: fec, hora: hor },
//                 success: function(r){
//                     const alde = JSON.parse(r);
//                     console.log(alde.status);
//                     if(alde.status === 200){
//                         alert("Se Registro Tu Prestamo Con Exito");
//                         document.getElementById('agregado').innerHTML = '';
//                     }
//                     else {  
//                         // $('#estado').html('<hr><p>Error al guardar los datos.</p><hr>');
//                         alert("No Se Registro Tu Prestamo Con Exito");
//                     }
//                 }
//             });
//         });
//     }
//     else{
//         alert("Datos Vacios, Por Favor Selecciona Una Opción");
//     }
    
    
// });
// //Boton para agregar el listado de devoluaciones
// const btn_devolucion = document.getElementById('agregar_dev');
// btn_devolucion.addEventListener('click', function(e){
//     e.preventDefault();
//      //Declaracion De variables para capturar valores de los inputs
//     const sel_cat = document.getElementById('ti_dev');
//     const val_dev = sel_cat.options[sel_cat.selectedIndex].text; //Selecciona el indice el cual escogamos y mostrara el texto
//     const nomb_dev = document.getElementById('dev_insu');
//     const valu_dev = nomb_dev.options[nomb_dev.selectedIndex].text;//Selecciona el indice el cual escogamos y mostrara el texto
//     var cant_dev = document.getElementById('cant_dev').value;
//     //Valida que los campos sean diferentes a vacios
//     if(sel_cat != 0 && sel_cat != '' && nomb_dev != 0 && nomb_dev != '' && cant_dev != 0 && cant_dev != ''){
//         const tab_dev = document.getElementById('tab_dev');
//         const agre_dev = tab_dev.insertRow(-1);//Inserta una fila automaticamente cada vez que agreguemos algo
//         const celda = agre_dev.insertCell(0);//Inserta una celda automaticamente cada vez que agreguemos algo
//         celda.textContent = val_dev;
//         const celda1 = agre_dev.insertCell(1);
//         celda1.textContent = valu_dev;
//         const celda2 = agre_dev.insertCell(2);
//         celda2.textContent = cant_dev;
//         const espacio = document.createTextNode('        ');//Espacio para botones
//         const suma = document.createElement("button");//Creamos un boton
//         suma.textContent = "+"; //Le asignamos lo que queremos que se vea, el +
//         const resta = document.createElement("button");//Creamos un boton
//         resta.textContent = "-";//Le asignamos lo que queremos que se vea, el -
//         celda2.appendChild(suma); //Lo agregamos a la tabla, indicandole en que celda
//         celda2.appendChild(espacio);//Lo agregamos a la tabla, indicandole en que celda
//         celda2.appendChild(resta);//Lo agregamos a la tabla, indicandole en que celda

//         suma.addEventListener('click', function(e){//Hacemos que sume de 1 en 1 y aumenta la cantidad
//             e.preventDefault();
//             cant_dev++;
//             celda2.textContent = cant_dev;
//             if(cant >= 1){ //Si la cantidad es mayo a 2 el boton resta se vuelva habilitar
//                 resta.disabled = false;
//             }
//         })
//         resta.addEventListener('click', function(e){//Hacemos que reste de 1 en 1 y aumenta la cantidad
//             e.preventDefault();
//             cant_dev--;
//             celda2.textContent = cant_dev;
//             if(cant == num || cant == 0){//Valida para que no muestre valores negativos
//                 alert("No Puede Restar Mas"); 
//                 resta.disabled = true; //Desabilita el boton
//             }
//         })  
//         const celda3 = agre_dev.insertCell(3);
//         const borrarButton = document.createElement("button");
//         borrarButton.textContent = "Eliminar";
//         celda3.appendChild(borrarButton);
//         borrarButton.addEventListener('click', (e)=>{//Funcion para eliminar las filas agregadas
//             e.preventDefault();
//             e.target.parentNode.parentNode.remove();//Elimina las filas que han sido agregadas
//             alert("Devolucion Eliminado");//Envia alerta
//         });
//         $('option:selected').removeAttr("selected"); //Vacia los campos de los selects cuando agrega
//         $('input[type="number"]').val(''); //Vacia el campo del input 
//         //Estilos de la tabla
//         celda.style.border="1px solid #23ad9dc5";
//         celda1.style.border="1px solid #23ad9dc5";
//         celda2.style.border="1px solid #23ad9dc5";
//         celda3.style.border="1px solid #23ad9dc5";

//         $(document).submit('#envia_dev', function(event){
//             event.preventDefault();
//             var nom_dev = nomb_dev;
//                 can_dev = cant_dev;
//                 cate_dev = sel_cat;
//                 fec_dev =  $("#fecha_dev").text();
//                 var hor_dev =  $("#hora_dev").text();
        
//             $.ajax({
//                 url: '../../php/instructor/registro_dev.php',
//                 method: "POST",
//                 data: { categoria_dev:cate_dev, nombre_dev: nom_dev, canti_dev: can_dev, fecha_dev: fec_dev, hora_dev: hor_dev },
//                 success: function(g){
//                     const dev = JSON.parse(g);
//                     console.log(dev.status);
//                     if(dev.status === 200){
//                         alert("Se Registro Tu Devolucion Con Exito");
//                         document.getElementById('agregado_dev').innerHTML = '';
//                     }
//                     else {
//                         alert("No Se Registro Tu Devolucion Con Exito");
//                     }
//                 }
//             });
//         });
//     }
// })