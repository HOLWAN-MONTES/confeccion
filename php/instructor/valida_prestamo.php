<?php
require_once('../conections/conexion.php');

$presta = $_POST['prestamo'];
$cadena="<select id='lista2' name='lista2'>";
echo $cadena."<option value='0'>SELECCIONAR</option>";
if($presta == 1){
    $sql = "SELECT * FROM material_textil WHERE ID_MATERIAL_TEXTIL != 7";
    $query = mysqli_query($connection, $sql);
    $cadena="<select id='lista2' name='lista2'>";
    while($row=mysqli_fetch_array($query)){
        $cadena=$cadena.'<option value='. $row[0] .'>'.utf8_encode($row[1]).'</option>';
    }
    echo $cadena."</select>";
}
elseif($presta == 2){
    $sql = "SELECT * FROM insumo WHERE ID_INSUMO != 7";
    $query = mysqli_query($connection, $sql);
    $cadena="<select id='lista2' name='lista2'>";
    while($row=mysqli_fetch_array($query)){
        $cadena=$cadena.'<option value='. $row[0] .'>'.utf8_encode($row[1]).'</option>';
    }
    echo $cadena."</select>";
}

?>
