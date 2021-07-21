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

//______btn y contenedor de editar usuario
const contentEditarUsuario = document.getElementById('contentEditarUsuario');
const btneditarUsu = document.getElementById('editarUsu');


//_______btn y contenedor de eliminar usuario
const contentEliminarUsuario = document.getElementById('contentEliminarUsuario');
const btneliminarUsu = document.getElementById('eliminarUsu');

//ingreso INSUMOS--------------------------
const contentIngresoDeInsumos = document.getElementById('contentIngresoDeInsumos');
const btningreso = document.getElementById('ingreso');

/* sub-crear */
const content_general_form = document.getElementById('content_general_form');



/* otras opciones de ingreso -crear insumo-crear maquinaria- crear material textil*/
const menusañedidos = document.getElementById('menusañedidos');
const btncrearInsumoa = document.getElementById('crearInsumoa');
const btncrearmaterialtext = document.getElementById('crearmaterialtext');
const btncrearMaquinaria = document.getElementById('crearMaquinaria');

/* CREAR EMPRESA Y TODO LO DE EMPRESA */
const crearempresa = document.getElementById('crearempresa');

/*Reportes opciones*/
const btnrepMaquinaria = document.getElementById("repMaquinaria");
const btnrepMatTex = document.getElementById("repMaterialText");
const btnrepInsumo = document.getElementById("repMaquinaria");

crearempresa.addEventListener('click',function(){
    alert('HOLAAAAA ESTO ES CREAR EMPRESA')
})


/* content */
const containerCrearInsumo = document.getElementById('containerCrearInsumo');
const containerCrearMaterialTextil = document.getElementById('containerCrearMaterialTextil');
const containerCrearmaquinaria = document.getElementById('containerCrearmaquinaria');
/* cerrarinsumos-maquinaria-materiaTextil */
const insumo_cerrar = document.getElementById('insumo_cerrar');

const CrearInsumoForm = document.getElementById('CrearInsumoForm');

const cerrarmaterialTex = document.getElementById('cerrarmaterialTex');
/* MAQUINARIA */
const cerrarMaquinaria = document.getElementById('cerrarMaquinaria');

/* crear tipo de insumo */
const btn_tipo_insumo = document.getElementById('btn_tipo_insumo');
const cerrartipoinsumo =document.getElementById('cerrartipoinsumo');
const crearTipoDeInsumo = document.getElementById('crearTipoDeInsumo');

/* marca */
const btn_marca_insumo = document.getElementById('btn_marca_insumo')
const cerrarmarcac = document.getElementById('cerrarmarcac');
const CrearMarca = document.getElementById('CrearMarca');
const bntcrearmarcamaqui = document.getElementById('bntcrearmarcamaqui')
const btnmarcaTextil = document.getElementById('btnmarcaTex')

/* color */
const btn_crear_color = document.getElementById('btn_crear_color');
const CrearColor = document.getElementById('CrearColor');
const crearcolorb = document.getElementById('crearcolorb');
const crearcolormaqui = document.getElementById('crearcolormaqui');
const registrarcolorTex = document.getElementById('crearcolorMate')


/* crearTipoDeTele */
const btncerrartipodetela = document.getElementById('btncerrartipodetela');
const crearTipoDeTele = document.getElementById('crearTipoDeTele');

/* material textil */
const btncrearmaterialtextf = document.getElementById('btncrearmaterialtextf');
const crearMarcaMaterialTextil = document.getElementById('crearMarcaMaterialTextil')


/* tipo de maquinaria */
const crearTipoDeMaquinaria = document.getElementById('crearTipoDeMaquinaria');
const btncerrartipodemaqui = document.getElementById('btncerrartipodemaqui')
const creartipodemaquinarr = document.getElementById('creartipodemaquinarr')
btncerrartipodemaqui.addEventListener('click',function(){
    crearTipoDeMaquinaria.style.display = "none"
})

creartipodemaquinarr.addEventListener('click',function(){
    crearTipoDeMaquinaria.style.display = "block"
})






//devoluciones-----------------
const btndevoluciones = document.getElementById('devoluciones');

//reportes
const btnreportes = document.getElementById('reportes');

/// inventario 
const btninvMaquinaria = document.getElementById('invMaquinaria');
const btninvMaterialText = document.getElementById('invMaterialText');
const btninvInsumo = document.getElementById('invInsumo');



/* MOSTRAR TODOS LOS USUARIOS */
btnUsuariosRegistrados.addEventListener('click',function(){
    todosLosusuarios.style.display = "block";
    menusañedidos.style.display = "none";
})

/* cerrar todos los usuarios */
desaparecerTodosUsers.addEventListener('click',function(){
    todosLosusuarios.style.display = "none";
    menusañedidos.style.display = "none";
})


// --------fromularios de administrador de usuarios ------------------------------------------------
//___btn registro de usuario
btnregistroUsu.addEventListener('click',function(){
    contentCrearUsuario.style.display = "block";
    contentEditarUsuario.style.display = "none";
    contentEliminarUsuario.style.display = "none";
    contentIngresoDeInsumos.style.display = "none"
    
    containerCrearUsuario.style.display = "none";
    containerCrearTipDocumento.style.display = "none"
    menusañedidos.style.display = "none";
})



/* crear tipo de usuario */
/* crear tipo de documento */
btn_tipo_documento.addEventListener('click',function(){
    containerCrearTipDocumento.style.display = "block"
    containerCrearUsuario.style.display = "none";
    menusañedidos.style.display = "none";

})

btn_esconder_containerCrearTipDocumento.addEventListener('click',function(){
    containerCrearTipDocumento.style.display = "none";
    menusañedidos.style.display = "none";
   
})


//_____btn editar usuario--------------------------------------------------------------------------
btneditarUsu.addEventListener('click',function(){
    contentEditarUsuario.style.display = "block";
    contentCrearUsuario.style.display = "none";
    contentEliminarUsuario.style.display = "none";
    contentIngresoDeInsumos.style.display = "none"

    containerCrearUsuario.style.display = "none";
    menusañedidos.style.display = "none";
    containerCrearTipDocumento.style.display = "none"
})

//____btn eliminar usuario-----------------------------------------------------------------------
btneliminarUsu.addEventListener('click',function(){
    contentEliminarUsuario.style.display = "block";
    contentCrearUsuario.style.display = "none";
    contentEditarUsuario.style.display = "none";
    contentIngresoDeInsumos.style.display = "none";
    menusañedidos.style.display = "none";

    containerCrearUsuario.style.display = "none";
    containerCrearTipDocumento.style.display = "none";
})


//ingreso de insumos----------------------------------------------------------------------------
btningreso.addEventListener('click',function(){
    contentIngresoDeInsumos.style.display = "block"
    menusañedidos.style.display = "grid";
    contentEliminarUsuario.style.display = "none";
    contentCrearUsuario.style.display = "none";
    contentEditarUsuario.style.display = "none";
    
    containerCrearUsuario.style.display = "none";
    containerCrearTipDocumento.style.display = "none";
    
})



/* ------------------------------------------------------------- */
btncrearInsumoa.addEventListener('click',function(){
    containerCrearInsumo.style.display = "block";
})



insumo_cerrar.addEventListener('click',function(){
    containerCrearInsumo.style.display = "none";
    CrearInsumoForm.reset();

})

//CERRAR EL FORMULARIO DE MATERIAL TEXTIL
const form_materialTex = document.getElementById('crear_material')

cerrarmaterialTex.addEventListener('click',function(){
    containerCrearMaterialTextil.style.display = 'none';
    form_materialTex.reset();
    document.querySelectorAll('.formulario__grupo-correcto_mate').forEach((icono_mate) => {
        icono_mate.classList.remove('formulario__grupo-correcto_mate');
    });
})


/* formulario maquinaria */
cerrarMaquinaria.addEventListener('click',function(){
    containerCrearmaquinaria.style.display = "none"
})


/* ------------------------------------------------------------- */
btncrearmaterialtext.addEventListener('click',function(){
    containerCrearMaterialTextil.style.display = "block";
})
/* ------------------------------------------------------------- */
btncrearMaquinaria.addEventListener('click',function(){
    containerCrearmaquinaria.style.display = "block";
})



/* -FORMULARIOS PEQUEÑOS PARA CREAR TIPOS 'COLOR-MARCA-ETC...'  */ 
cerrartipoinsumo.addEventListener('click',function(){
    crearTipoDeInsumo.style.display = 'none'
})

btn_tipo_insumo.addEventListener('click',function(){
    crearTipoDeInsumo.style.display = 'block'
})


/* crear marca */
cerrarmarcac.addEventListener('click',function(){
    CrearMarca.style.display = "none"
})
btn_marca_insumo.addEventListener('click',function(){
    CrearMarca.style.display = "block"
})
bntcrearmarcamaqui.addEventListener('click',function(){
    CrearMarca.style.display = "block"
})

/* crear marca de material textil*/
const cerrarMarcaTex = document.getElementById('cerrarmarcaTex')

cerrarMarcaTex.addEventListener('click',function(){
    CrearMarcaTextil.style.display = "none"
})


const CrearMarcaTextil = document.getElementById('CrearMarcaTextil')
btnmarcaTextil.addEventListener('click',function(){
    CrearMarcaTextil.style.display = "block"
})



/* color */
crearcolorb.addEventListener('click',function(){
    CrearColor.style.display = "none"
})
btn_crear_color.addEventListener('click',function(){
    CrearColor.style.display = "block"
})
crearcolormaqui.addEventListener('click',function(){
    CrearColor.style.display = "block"
})

registrarcolorTex.addEventListener('click', function(){
    CrearColor.style.display = "block"
})



const crartipodetela = document.getElementById('crartipodetela')

/* tipotela */
btncerrartipodetela.addEventListener('click',function(){
    crearTipoDeTele.style.display = "none"
})

crartipodetela.addEventListener('click',function(){
    crearTipoDeTele.style.display = "block"
})

//devoluciones-------------------------------------------------------------------------------
btndevoluciones.addEventListener('click',function(){
    alert('devoluciones')
    menusañedidos.style.display = "none";
    
    containerCrearUsuario.style.display = "none";
    containerCrearTipDocumento.style.display = "none";
})


//reportes-----------------------------------------------------------------------------------------
btnreportes.addEventListener('click',function(){
    // alert('reportes')
    menusañedidos.style.display = "none";
    
    containerCrearUsuario.style.display = "none";
    containerCrearTipDocumento.style.display = "none";
})
btnrepMaquinaria.addEventListener('click', function(){
    menusañedidos.style.display = "none";
    containerCrearUsuario.style.display = "none";
    containerCrearTipDocumento.style.display = "none";
})
btnrepMatTex.addEventListener('click', function(){
    menusañedidos.style.display = "none";
    containerCrearUsuario.style.display = "none";
    containerCrearTipDocumento.style.display = "none";
})
btnrepInsumo.addEventListener('click', function(){
    menusañedidos.style.display = "none";
    containerCrearUsuario.style.display = "none";
    containerCrearTipDocumento.style.display = "none";
})



//------------------------------ tablas de inventarios --------------------------------
btninvMaquinaria.addEventListener('click',function(){
    menusañedidos.style.display = "none";
    containerCrearUsuario.style.display = "none";
    containerCrearTipDocumento.style.display = "none";
})

btninvMaterialText.addEventListener('click',function(){

    menusañedidos.style.display = "none";
    containerCrearUsuario.style.display = "none";
    containerCrearTipDocumento.style.display = "none";
})


btninvInsumo.addEventListener('click',function(){
    menusañedidos.style.display = "none";
    containerCrearUsuario.style.display = "none";
    containerCrearTipDocumento.style.display = "none";
})


