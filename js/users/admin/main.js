// administrador de usuarios --------------------------------------

//____btn y contenedor de crear usuario
const contentCrearUsuario = document.getElementById('contentCrearUsuario');
const btnregistroUsu = document.getElementById('registroUsu');

/* mini contenedores */
/* usuario */
const containerCrearUsuario = document.getElementById('containerCrearUsuario');
//const btn_tipo_usuario = document.getElementById('btn_tipo_usuario');
const btn_esconder_containerCrearUsuario = document.getElementById('btn_esconder_containerCrearUsuario')
/* documento */
const containerCrearTipDocumento = document.getElementById('containerCrearTipDocumento');
const btn_tipo_documento = document.getElementById('btn_tipo_documento')
const btn_esconder_containerCrearTipDocumento = document.getElementById('btn_esconder_containerCrearTipDocumento');

//btn-mostrar todos los usuarios que estan registrados
const btnUsuariosRegistrados = document.getElementById('UsuariosRegistrados');
const todosLosusuarios = document.getElementById('todosLosusuarios');
/*BTN cerrar tabla */
const desaparecerTodosUsers = document.getElementById('desaparecerTodosUsers');

/* MOSTRAR TODOS LOS USUARIOS */
btnUsuariosRegistrados.addEventListener('click',function(){
    todosLosusuarios.style.display = "block";
})

/* cerrar todos los usuarios */
desaparecerTodosUsers.addEventListener('click',function(){
    todosLosusuarios.style.display = "none";
})


//______btn y contenedor de editar usuario
const contentEditarUsuario = document.getElementById('contentEditarUsuario');
const btneditarUsu = document.getElementById('editarUsu');


//_______btn y contenedor de eliminar usuario
const contentEliminarUsuario = document.getElementById('contentEliminarUsuario');
const btneliminarUsu = document.getElementById('eliminarUsu');

//ingreso INSUMOS--------------------------
const contentIngresoDeInsumos = document.getElementById('contentIngresoDeInsumos');
const btningreso = document.getElementById('ingreso');

//devoluciones-----------------
const btndevoluciones = document.getElementById('devoluciones');

//reportes
const btnreportes = document.getElementById('reportes');

/// inventario 
const btninvMaquinaria = document.getElementById('invMaquinaria');
const btninvMaterialText = document.getElementById('invMaterialText');
const btninvInsumo = document.getElementById('invInsumo');



// --------fromularios de administrador de usuarios ------------------------------------------------
//___btn registro de usuario
btnregistroUsu.addEventListener('click',function(){
    contentCrearUsuario.style.display = "block";
    contentEditarUsuario.style.display = "none";
    contentEliminarUsuario.style.display = "none";
    contentIngresoDeInsumos.style.display = "none"
    
    containerCrearUsuario.style.display = "none";
    containerCrearTipDocumento.style.display = "none"
})



/* crear tipo de usuario */
/* crear tipo de documento */
btn_tipo_documento.addEventListener('click',function(){
    containerCrearTipDocumento.style.display = "block"
    containerCrearUsuario.style.display = "none";

})

btn_esconder_containerCrearTipDocumento.addEventListener('click',function(){
    containerCrearTipDocumento.style.display = "none";
   
})


//_____btn editar usuario--------------------------------------------------------------------------
btneditarUsu.addEventListener('click',function(){
    contentEditarUsuario.style.display = "block";
    contentCrearUsuario.style.display = "none";
    contentEliminarUsuario.style.display = "none";
    contentIngresoDeInsumos.style.display = "none"

    containerCrearUsuario.style.display = "none";
    containerCrearTipDocumento.style.display = "none"
})

//____btn eliminar usuario-----------------------------------------------------------------------
btneliminarUsu.addEventListener('click',function(){
    contentEliminarUsuario.style.display = "block";
    contentCrearUsuario.style.display = "none";
    contentEditarUsuario.style.display = "none";
    contentIngresoDeInsumos.style.display = "none";

    containerCrearUsuario.style.display = "none";
    containerCrearTipDocumento.style.display = "none";
})


//ingreso de insumos----------------------------------------------------------------------------
btningreso.addEventListener('click',function(){
    contentIngresoDeInsumos.style.display = "block"
    contentEliminarUsuario.style.display = "none";
    contentCrearUsuario.style.display = "none";
    contentEditarUsuario.style.display = "none";
    
    containerCrearUsuario.style.display = "none";
    containerCrearTipDocumento.style.display = "none";
})

//devoluciones-------------------------------------------------------------------------------
btndevoluciones.addEventListener('click',function(){
    alert('devoluciones')

    
    containerCrearUsuario.style.display = "none";
    containerCrearTipDocumento.style.display = "none";
})


//reportes-----------------------------------------------------------------------------------------
btnreportes.addEventListener('click',function(){
    alert('reportes')

    
    containerCrearUsuario.style.display = "none";
    containerCrearTipDocumento.style.display = "none";
})




//------------------------------ tablas de inventarios --------------------------------
btninvMaquinaria.addEventListener('click',function(){
    alert('invMaquinaria')

    
    containerCrearUsuario.style.display = "none";
    containerCrearTipDocumento.style.display = "none";
})

btninvMaterialText.addEventListener('click',function(){
    alert('invMaterialTextil')

    
    containerCrearUsuario.style.display = "none";
    containerCrearTipDocumento.style.display = "none";
})

btninvInsumo.addEventListener('click',function(){
    alert('invInsumo')


    
    containerCrearUsuario.style.display = "none";
    containerCrearTipDocumento.style.display = "none";
})


