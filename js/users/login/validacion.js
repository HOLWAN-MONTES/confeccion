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
    if (this.value.length > 1) 
       this.value = this.value.slice(0,3); 
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

            //direccionamiento para el aprendiz
            window.location = "../users/aprendiz/aprendiz.php"
        }else if(info == 4){
            $(mostrarAnuncio).html(
                '<p id="nada" style="color:red;font-size:20px;text-align: center; background-color:#fffff;">Llene los campos correctamente</p>'
            )
            setTimeout(() => {

                $('.agregoF').html('<p></p>')
                
            }, 2000);
        }else if(info == 5){
            $(mostrarAnuncio).html(
                '<p id="nada" style="color:red;font-size:20px;text-align: center; background-color:#fffff;">La ficha ya esta creada </p>'
            )
            setTimeout(() => {

                $('.agregoF').html('<p></p>')
            }, 2000);
        }else if(info == 6){
            $(mostrarAnuncio).html(
                '<p id="nada" style="color:red;font-size:20px;text-align: center; background-color:#fffff;">Llene los campos</p>'
            )
            setTimeout(() => {

                $('.agregoF').html('<p></p>')
                formularioenviar.reset()
            }, 2000);
        }

    })

})












