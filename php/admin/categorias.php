<?php
require_once("../conections/conexion.php");

$ingre_insu = $_POST['ingreso_insumo'];
$cadena="<select id='lista2' name='lista2'>";
echo $cadena."<option value='0'>SELECCIONAR</option>";
if($ingre_insu == 1){
    $sql = "SELECT * FROM material_textil";
    $query = mysqli_query($connection, $sql);
    $cadena="<select id='lista2' name='lista2'>";
    while($row=mysqli_fetch_array($query)){
        $cadena=$cadena.'<option value='. $row[0] .'>'.utf8_encode($row[1]).'</option>';
    }
    echo $cadena."</select>";
}
elseif($ingre_insu == 2){
    $sql = "SELECT * FROM insumo";
    $query = mysqli_query($connection, $sql);
    $cadena="<select id='lista2' name='lista2'>";
    while($row=mysqli_fetch_array($query)){
        $cadena=$cadena.'<option value='. $row[0] .'>'.utf8_encode($row[1]).'</option>';
    }
    echo $cadena."</select>";
}