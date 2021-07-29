<?php
require_once("../conections/conexion.php");

$numFicha = $_POST['numFicha'];
$formacionFi = $_POST['formacionFi'];
$jornadaFi = $_POST['jornadaFi'];
$instructorFi = $_POST['instructorFi'];



    

    if($numFicha !=="" && $formacionFi !=="" && $jornadaFi !=="" && $instructorFi !=="" ){
       
        if(strlen($numFicha) >= 7 && strlen($numFicha) <= 11){   
                
            $sql ="INSERT INTO `ficha` (`NUM_FICHA`, `ID_FORMACION`, `ID_JORNADA`, `DOCUMENTO`) VALUES ('$numFicha', '$formacionFi', '$jornadaFi', '$instructorFi')";
        
            $verificarNumficha = mysqli_query($connection, "SELECT * FROM ficha WHERE NUM_FICHA='$numFicha'");
        

            if(mysqli_num_rows($verificarNumficha) > 0){
             /* echo '
                <script>
                alert("la ficha esta repetida ");
                </script>
                '; */
                echo 4;
        
                exit();
            }
        
            $consul = mysqli_query($connection,$sql);
            
            if($consul){
            /*  echo "insertado en la db"; */
            echo 3;
            }
            else{
                /* echo "verifica que el nit no este repetido"; */
                echo 5;
            }
            
        }else{
           /*  echo " menor a 11 mayor a 8"; */
            echo 2;
        }
            
    }else{
        /* llene los campos  */
        echo 1;
       /*  echo "LLENE LOS CAMPOS "; */
    }
        






?>


