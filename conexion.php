<?php
$dbname       = "localdb";
$dbusuario    = "azure";
$dbcontrasena = "6#vWHD_$";

try{
	$conexion = new PDO("mysql:host=127.0.0.1;dbname=".$dbname, $dbusuario, $dbcontrasena);
}catch(PDOexception $e){
	echo "error".$e->getMessage();
	die();
}
?>
