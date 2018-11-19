<?php
include("conexion.php");

$name = $_GET["tipo"];
$profesor = $_GET["tipo2"];
$insertExchange = 'INSERT INTO pro_relacion_parental VALUES(null, "'.$name.'", "'.$profesor.'")';
$resultadoInsert = $conexion->exec($insertExchange);

if ($resultadoInsert === False){
    header("Location: proceso.php?mensaje=5");
    exit();
}else{
    header("Location: proceso.php?mensaje=6");
    exit();
}
?>
