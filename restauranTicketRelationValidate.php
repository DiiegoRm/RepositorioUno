<?php
include("conexion.php");
$idRestaurant = $_POST['IdRestaurante'];
$total = 0;
if (is_numeric($idRestaurant)){
$query     = 'SELECT * FROM restaurant WHERE id= '.$idRestaurant;
$resultado = $conexion->query($query);
$columnas  = $resultado->fetch(PDO::FETCH_ASSOC);
$total     = $resultado->rowCount();
}

if($total >=1)
{
	header("Location: restaurantRelacionated.php?IdRestaurante=$idRestaurant");
	exit();
}
else
{
	header("Location: restauranTicketRelation.php?mensaje=6");
	exit();
}
?>
