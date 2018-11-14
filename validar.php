<?php
include("conexion.php");

$usuario = $_POST["usuario"];
$clave = $_POST["clave"];

$query     = 'SELECT * FROM pro_usuario WHERE usuario= "'.$usuario.'" AND password="'.$clave.'"';
$resultado = $conexion->query($query);
$columnas  = $resultado->fetch(PDO::FETCH_ASSOC);
$total     = $resultado->rowCount();

if($total==1){
	session_start();
	$_SESSION["perfil"]= $columnas['id_perfil'];
	$_SESSION["id"]    = $columnas['id'];
	header("Location: proceso.php");
	exit();
}else{
	header("Location: index.php?mensaje=1");
	exit();
}
?>
