// administrador de usuarios --------------------------------------

//____btn y contenedor de crear usuario
const contentCrearUsuario = document.getElementById('contentCrearUsuario');
const btnregistroUsu = document.getElementById('registroUsu');

//______btn y contenedor de editar usuario
const contentEditarUsuario = document.getElementById('contentEditarUsuario');
const btneditarUsu = document.getElementById('editarUsu');


//_______btn y contenedor de eliminar usuario
const contentEliminarUsuario = document.getElementById('contentEliminarUsuario');
const btneliminarUsu = document.getElementById('eliminarUsu');



//ingreso--------------------------
const btningreso = document.getElementById('ingreso');

//devoluciones-----------------
const btndevoluciones = document.getElementById('devoluciones');


//reportes
const btnreportes = document.getElementById('reportes');

/// inventario 
const btninvMaquinaria = document.getElementById('invMaquinaria');
const btninvMaterialText = document.getElementById('invMaterialText');
const btninvInsumo = document.getElementById('invInsumo');




// --------fromularios de administrador de usuarios 
//___btn registro de usuario
btnregistroUsu.addEventListener('click',function(){
    contentCrearUsuario.style.display = "block";
    contentEditarUsuario.style.display = "none";
    contentEliminarUsuario.style.display = "none";
})

//_____btn editar usuario
btneditarUsu.addEventListener('click',function(){
    contentEditarUsuario.style.display = "block";
    contentCrearUsuario.style.display = "none";
    contentEliminarUsuario.style.display = "none";
})

//____btn eliminar usuario
btneliminarUsu.addEventListener('click',function(){
    contentEliminarUsuario.style.display = "block";
    contentCrearUsuario.style.display = "none";
    contentEditarUsuario.style.display = "none";
})


//ingreso-------------------------------------------------
btningreso.addEventListener('click',function(){
    alert('ingreso')
})

//devoluciones------------------------------------------------
btndevoluciones.addEventListener('click',function(){
    alert('devoluciones')
})


//reportes-----------------------------------------------------------
btnreportes.addEventListener('click',function(){
    alert('reportes')
})




//------------------------------ tablas de inventarios ---------
btninvMaquinaria.addEventListener('click',function(){
    alert('invMaquinaria')
})

btninvMaterialText.addEventListener('click',function(){
    alert('invMaterialTextil')
})

btninvInsumo.addEventListener('click',function(){
    alert('invInsumo')
})


