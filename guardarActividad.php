<?php
include("conexion.php");

$name = $_GET["name"];
$profesor = $_GET["curso"];
$insertExchange = 'INSERT INTO pro_actividad VALUES(null, "'.$profesor.'", "'.$name.'")';
$resultadoInsert = $conexion->exec($insertExchange);

if ($resultadoInsert === False){
    header("Location: proceso.php?mensaje=5");
    exit();
}else{
    header("Location: proceso.php?mensaje=6");
    exit();
}
?>
