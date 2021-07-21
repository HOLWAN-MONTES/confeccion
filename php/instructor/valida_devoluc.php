<?php
require_once('../conections/conexion.php');

$devols = $_POST['devols'];
$cadena="<select id='lista2' name='lista2'>";
echo $cadena."<option value='0'>SELECCIONAR</option>";
if($devols == 2){
    $sql = "SELECT * FROM insumo";
    $query = mysqli_query($connection, $sql);
    $cadena="<select id='lista2' name='lista2'>";
    while($row=mysqli_fetch_array($query)){
        $cadena=$cadena.'<option value='. $row[0] .'>'.utf8_encode($row[1]).'</option>';
    }
    echo $cadena."</select>";
}

