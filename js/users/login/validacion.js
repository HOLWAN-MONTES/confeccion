const formularioenviar = document.getElementById('formularioenviar');
const mostrarAnuncio = document.querySelectorAll('.agregoF');

const crear = document.getElementById('crear');

/* input de login en usuario */
const input=  document.getElementById('usuario');
const password = document.getElementById('password')


input.addEventListener('input',function(){
  if (this.value.length > 10) 
     this.value = this.value.slice(0,10); 
})

password.addEventListener('input',function(){
    if (this.value.length > 16) 
       this.value = this.value.slice(0,16); 
  })



crear.addEventListener('click',(a)=>{
    a.preventDefault();

    //traigo el formulario
    let formulario = new FormData(formularioenviar);
    fetch('../php/login/login.php',{
        method:'POST',
        body:formulario
    }).then(ress => ress.text()).then(info =>{

     /*    console.log(info) */
        if(info == 1){

            //direccionamiento para el administrador
            window.location = "../users/admin/admin.php"
        }else if(info == 2){

            //direccionamiento para el instructor
            window.location = "../users/instructor/instructor.php"
        }else if(info == 3){
            $(mostrarAnuncio).html(
                '<p id="nada" style="color:red;font-size:20px;text-align: center; background-color:#fffff;">Llene los campos</p>'
            )
            setTimeout(() => {

                $('.agregoF').html('<p></p>')
                
            }, 2000);

        }else if(info == 4){
            $(mostrarAnuncio).html(
                '<p id="nada" style="color:red;font-size:20px;text-align: center; background-color:#fffff;">El documento es incorrecto</p>'
            )
            setTimeout(() => {

                $('.agregoF').html('<p></p>')
                
            }, 2000);

        }else if(info == 5){
            $(mostrarAnuncio).html(
                '<p id="nada" style="color:red;font-size:20px;text-align: center; background-color:#fffff;">La clave es incorrecta</p>'
            )
            setTimeout(() => {

                $('.agregoF').html('<p></p>')
                
            }, 2000);

        }else if(info == 6){
            $(mostrarAnuncio).html(
                '<p id="nada" style="color:red;font-size:20px;text-align: center; background-color:#fffff;"> Cargo de usuario incorrecto</p>'
            )
            setTimeout(() => {

                $('.agregoF').html('<p></p>')
                
            }, 2000);

        }else if(info == 7){
            $(mostrarAnuncio).html(
                '<p id="nada" style="color:red;font-size:20px;text-align: center; background-color:#fffff;"> Ups algo salio mal, no existe el dato ingresado</p>'
            )
            setTimeout(() => {

                $('.agregoF').html('<p></p>')
                
            }, 2000);

        }else if(info == 8){
            $(mostrarAnuncio).html(
                '<p id="nada" style="color:red;font-size:20px;text-align: center; background-color:#fffff;"> El usuario ingresado no existe</p>'
            )
            setTimeout(() => {

                $('.agregoF').html('<p></p>')
                
            }, 2000);

        }

    })

})












