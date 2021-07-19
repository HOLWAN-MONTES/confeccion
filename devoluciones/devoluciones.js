const aceptar= document.getElementById("aceptar")

aceptar.addEventListener('click', (e)=>{
    e.preventDefault(); 
    console.log(aceptar) ;
      let xhr = new XMLHttpRequest();
      xhr.open("get","aceptar.php",true)
      xhr.onreadystatechange = function () {
          if(xhr.readyState == 4 && xhr.status == 200){
              console.log("correcto")
          }
          else{
              console.log("fallaste")
          }
      }
      xhr.send()
  })