const aceptar= document.getElementById("aceptar")
const acep= document.getElementById("acep")

aceptar.addEventListener('click', (e)=>{
    e.preventDefault(); 
    console.log(acep) ;
    const docuBase = acep.value 
      let xhr = new XMLHttpRequest();
      xhr.open("get","aceptar.php?documento=" + docuBase,true)
      xhr.onreadystatechange = function () {
          if(xhr.readyState == 4 && xhr.status == 200){
              console.log("correcto")
          }else{
              console.log("fallaste")
          }
      }
      xhr.send()
  })

