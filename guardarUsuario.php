<?php
include("conexion.php");

$name = $_GET["name"];
$name2 = $_GET["name2"];
$apellido = $_GET["apellido"];
$apellido2 = $_GET["apellido2"];
$telefono = $_GET["telefono"];
$direccion = $_GET["direccion"];
$tipo = $_GET["tipo"];
$documento = $_GET["documento"];
$usuario = $_GET["usuario"];
$password = $_GET["password"];
$perfil = $_GET["perfil"];

$insertExchange = 'INSERT INTO pro_usuario VALUES(null, "'.$usuario.'", "'.$password.'" , "'.$perfil.'" , "'.$tipo.'" , "'.$documento.'" , "'.$name.'" , "'.$name2.'" , "'.$apellido.'" , "'.$apellido2.'" , "'.$telefono.'" , "'.$direccion.'")';
$resultadoInsert = $conexion->exec($insertExchange);

if ($resultadoInsert === False){
    header("Location: proceso.php?mensaje=5");
    exit();
}else{
    header("Location: proceso.php?mensaje=6");
    exit();
}
?>
